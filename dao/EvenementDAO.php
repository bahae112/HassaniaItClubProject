<?php

include "../model/Evenement.php";

class DAOEvenement {
    private $dbh;

    public function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=your_database', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
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
        return $result ? new Evenement(...array_values($result)) : null;
    }

    public function saveEvenement(Evenement $evenement) {
        $stm = $this->dbh->prepare("INSERT INTO evenements (titre, description, typeEvenement, date, heureDebut, heureFin, lieu, clubOrganisateur, ecoleOrganisatrice, statut, imageUrl) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
        $stm->bindValue(11, $evenement->getImageUrl());
        $stm->execute();
    }

    public function updateEvenement(Evenement $evenement) {
        $stm = $this->dbh->prepare("UPDATE evenements SET titre = ?, description = ?, typeEvenement = ?, date = ?, heureDebut = ?, heureFin = ?, lieu = ?, clubOrganisateur = ?, ecoleOrganisatrice = ?, statut = ?, imageUrl = ? WHERE id = ?");
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
        $stm->bindValue(11, $evenement->getImageUrl());
        $stm->bindValue(12, $evenement->getId());
        $stm->execute();
    }

    public function deleteEvenement($id) {
        $stm = $this->dbh->prepare("DELETE FROM evenements WHERE id = ?");
        return $stm->execute([$id]);
    }
}

?>
