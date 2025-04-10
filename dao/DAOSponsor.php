<?php

include_once(__DIR__ . '/../model/Sponsor.php');

class DAOSponsor {
    private $db;

    public function __construct() {
        try {
            $host = 'localhost';
            $port = 3306; // Remplacez par votre port MySQL (ex: 3307 si différent)
            $dbname = 'HassaniaItClub';
            $username = 'root';
            $password = '';
        
            $this->db= new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            throw new Exception("Database Connection Error");
        }
        
    }

    public function addSponsor(Sponsor $sponsor) {
        $stmt = $this->db->prepare("INSERT INTO sponsors (nom, logo, evenementnom, siteweb, description) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $sponsor->getNom(),
            $sponsor->getLogo(),
            $sponsor->getEvenementNom(),
            $sponsor->getSiteWeb(),
            $sponsor->getDescription()
        ]);
    }

    public function getSponsorsByEvent($evenementNom) {
        $stmt = $this->db->prepare("SELECT * FROM sponsors WHERE evenementnom = ?");
        $stmt->execute([$evenementNom]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSponsors() {
        $stmt = $this->db->query("SELECT * FROM sponsors");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSponsor($id, $nom, $logo, $evenementnom, $siteweb, $description) {
        $stmt = $this->db->prepare("UPDATE sponsors SET nom = ?, logo = ?, evenementnom = ?, siteweb = ?, description = ? WHERE id = ?");
        $stmt->execute([$nom, $logo, $evenementnom, $siteweb, $description, $id]);
    }

    public function deleteSponsor($id) {
        $stmt = $this->db->prepare("DELETE FROM sponsors WHERE id = ?");
        $stmt->execute([$id]);
    }
      // Méthode pour récupérer un sponsor par son ID
    public function getSponsorById($id) {
        $query = "SELECT * FROM sponsors WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Récupérer le sponsor
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Renvoie le sponsor sous forme de tableau associatif
    }
}
