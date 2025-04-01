<?php

include_once(__DIR__ . '/../model/Evenement.php');

class DAOEvenement {
    private $dbh;

    public function __construct() {
        try {
            $host = 'localhost';
            $port = 3306; // Remplacez par votre port MySQL (ex: 3307 si différent)
            $dbname = 'HassaniaItClub';
            $username = 'root';
            $password = '';
        
            $this->dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            throw new Exception("Database Connection Error");
        }
    }

    // Récupérer tous les événements
    public function allEvenements() {
        $stm = $this->dbh->prepare("SELECT * FROM evenements ORDER BY date");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Rechercher les événements selon des critères
    public function rechercherEvenements($titre, $date, $typeEvenement) {
        $sql = "SELECT * FROM evenements WHERE 1=1";
        
        if ($titre) {
            $sql .= " AND titre LIKE :titre";
        }
        if ($date) {
            $sql .= " AND date = :date";
        }
        if ($typeEvenement) {
            $sql .= " AND typeEvenement LIKE :typeEvenement";
        }
        
        $stm = $this->dbh->prepare($sql);
        
        if ($titre) {
            $stm->bindValue(':titre', '%' . $titre . '%');
        }
        if ($date) {
            $stm->bindValue(':date', $date);
        }
        if ($typeEvenement) {
            $stm->bindValue(':typeEvenement', '%' . $typeEvenement . '%');
        }
        
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Récupérer un événement par son ID
    public function getEvenementById($id) {
        $stm = $this->dbh->prepare("SELECT * FROM evenements WHERE id = ?");
        $stm->execute([$id]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            // Créer l'objet Evenement sans l'ID, puis l'assigner après
            $evenement = new Evenement(
                $result['titre'],
                $result['description'],
                $result['typeEvenement'],
                $result['date'],
                $result['heureDebut'],
                $result['heureFin'],
                $result['lieu'],
                $result['clubOrganisateur'],
                $result['ecoleOrganisatrice'],
                $result['statut']
            );
    
            // Assigner l'ID après la création
            $evenement->setId((int)$result['id']);
            return $evenement;
        }
    
        return null; // Retourne null si aucun événement n'est trouvé
    }
    

    public function saveEvenement(Evenement $evenement) {
        try {
            // Préparer la requête SQL pour insérer un événement dans la base de données
            $stm = $this->dbh->prepare(
                "INSERT INTO evenements (titre, description, typeEvenement, date, heureDebut, heureFin, lieu, clubOrganisateur, ecoleOrganisatrice, statut, imageUrl) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );

            // Lier les valeurs des propriétés de l'objet Evenement aux paramètres de la requête
            $stm->bindValue(1, $evenement->getTitre());
            $stm->bindValue(2, $evenement->getDescription());
            $stm->bindValue(3, $evenement->getTypeEvenement());
            $stm->bindValue(4, $evenement->getDate());
            $stm->bindValue(5, $evenement->getHeureDebut());
            $stm->bindValue(6, $evenement->getHeureFin());
            $stm->bindValue(7, $evenement->getLieu());
            $stm->bindValue(8, $evenement->getClubOrganisateur());
            $stm->bindValue(9, $evenement->getEcoleOrganisatrice());
            $stm->bindValue(10, $evenement->getStatut());

            // Lier l'URL de l'image (si elle existe)
            $imageUrl = $evenement->getImageUrl(); // Peut être null si aucune image n'est téléchargée
            $stm->bindValue(11, $imageUrl);

            // Exécuter la requête pour insérer les données dans la base de données
            $stm->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, afficher un message d'erreur
            echo "Erreur lors de l'enregistrement de l'événement : " . $e->getMessage();
        }
    }
    
    public function updateEvenement($id, $titre, $description, $typeEvenement, $date, $heureDebut, $heureFin, $lieu, $clubOrganisateur, $ecoleOrganisatrice, $statut) {
        // Construire la requête SQL pour la mise à jour de l'événement
        $sql = "UPDATE evenements SET titre = ?, description = ?, typeEvenement = ?, date = ?, heureDebut = ?, heureFin = ?, lieu = ?, 
                clubOrganisateur = ?, ecoleOrganisatrice = ?, statut = ? WHERE id = ?";
    
        // Paramètres pour la requête SQL
        $params = [
            $titre,
            $description,
            $typeEvenement,
            $date,
            $heureDebut,
            $heureFin,
            $lieu,
            $clubOrganisateur,
            $ecoleOrganisatrice,
            $statut
        ];
    
        // Ajouter l'ID de l'événement à la fin de la liste des paramètres
        $params[] = $id;
    
        // Préparer et exécuter la requête SQL
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($params);
    }
    

    public function deleteEvenement($id) {
        $stm = $this->dbh->prepare("DELETE FROM evenements WHERE id = ?");
        return $stm->execute([$id]);
    }
}

?>
