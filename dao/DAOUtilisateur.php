<?php

include_once(__DIR__ . '/../model/Utilisateur.php');

class DAOUtilisateur {
    private $dbh;

    public function __construct() {
        try {
            $host = 'localhost';
            $port = 3306; // Remplacez par le port réel de MySQL (ex: 3307 si modifié)
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

    // Récupérer tous les utilisateurs
    public function getAll() {
        $sql = "SELECT * FROM utilisateurs";
        $stmt = $this->dbh->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retourne tous les utilisateurs sous forme de tableau associatif
    }

    // Ajouter un utilisateur
    public function saveUtilisateur(Utilisateur $user) {
        $stm = $this->dbh->prepare("INSERT INTO utilisateurs (nom, prenom, role, telephone, datePriseDeFonction, email, motDePasse) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stm->bindValue(1, $user->getNom());
        $stm->bindValue(2, $user->getPrenom());
        $stm->bindValue(3, $user->getRole());
        $stm->bindValue(4, $user->getTelephone());
        $stm->bindValue(5, $user->getDatePriseDeFonction());
        $stm->bindValue(6, $user->getEmail());
        $stm->bindValue(7, $user->getMotDePasse());
        $stm->execute();
    }

    // Récupérer un utilisateur par son ID
    public function getUtilisateurById($id) {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stm->execute([$id]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            // Créer l'objet Utilisateur sans l'ID, et ensuite définir l'ID après la récupération
            $utilisateur = new Utilisateur(
                $result['nom'],
                $result['prenom'],
                $result['role'],
                $result['telephone'],
                $result['datePriseDeFonction'],
                $result['email'],
                $result['motDePasse']
            );
            // Assigner l'ID à l'objet Utilisateur
            $utilisateur->setId((int)$result['id']);
            return $utilisateur;
        }
        return null;
    }
    

    // Récupérer les utilisateurs par rôle
    public function getUtilisateursByRole($role) {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE role = ?");
        $stm->execute([$role]);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Récupérer les utilisateurs par date de prise de fonction
    public function getUtilisateursByDatePriseDeFonction($datePriseDeFonction) {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE datePriseDeFonction = ?");
        $stm->execute([$datePriseDeFonction]);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Récupérer les utilisateurs par nom
    public function getUtilisateursByNom($nom) {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE nom LIKE ?");
        $stm->execute(['%' . $nom . '%']);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Récupérer les utilisateurs par prénom
    public function getUtilisateursByPrenom($prenom) {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE prenom LIKE ?");
        $stm->execute(['%' . $prenom . '%']);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Supprimer un utilisateur
    public function deleteUtilisateur($id) {
        $stm = $this->dbh->prepare("DELETE FROM utilisateurs WHERE id = ?");
        return $stm->execute([$id]);
    }

    // Recherche par plusieurs critères
    public function searchUtilisateurs($nom = '', $prenom = '', $role = '', $datePriseDeFonction = '') {
        $sql = "SELECT * FROM utilisateurs WHERE 1=1";

        if ($nom) {
            $sql .= " AND nom LIKE :nom";
        }
        if ($prenom) {
            $sql .= " AND prenom LIKE :prenom";
        }
        if ($role) {
            $sql .= " AND role LIKE :role";
        }
        if ($datePriseDeFonction) {
            $sql .= " AND datePriseDeFonction = :datePriseDeFonction";
        }

        $stm = $this->dbh->prepare($sql);

        if ($nom) {
            $stm->bindValue(':nom', '%' . $nom . '%');
        }
        if ($prenom) {
            $stm->bindValue(':prenom', '%' . $prenom . '%');
        }
        if ($role) {
            $stm->bindValue(':role', '%' . $role . '%');
        }
        if ($datePriseDeFonction) {
            $stm->bindValue(':datePriseDeFonction', $datePriseDeFonction);
        }

        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function updateUtilisateur($id, $nom, $prenom, $role, $telephone, $datePriseDeFonction, $email, $motDePasse) {
        $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, role = ?, telephone = ?, datePriseDeFonction = ?, email = ?" . 
               ($motDePasse ? ", motDePasse = ?" : "") . 
               " WHERE id = ?";
    
        $params = [$nom, $prenom, $role, $telephone, $datePriseDeFonction, $email];
        if ($motDePasse) {
            $params[] = $motDePasse;
        }
        $params[] = $id;
    
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($params);
    }
    

    public function getUtilisateurByEmail($email) {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stm->execute([$email]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return new Utilisateur(
                $result['nom'],
                $result['prenom'],
                $result['role'],
                $result['telephone'],
                $result['datePriseDeFonction'],
                $result['email'],
                $result['motDePasse']
            );
        }
        return null;
    }
    
}
?>
