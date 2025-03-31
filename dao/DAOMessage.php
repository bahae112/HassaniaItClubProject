<?php
include "../model/Message.php";

class DAOMessage {
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

    // Sauvegarder un message dans la base de données
    public function saveMessage(Message $msg) {
        $stm = $this->dbh->prepare("INSERT INTO messages (nom, email, objet, message, dateEnvoie) VALUES (?, ?, ?, ?, ?)");
        $stm->bindValue(1, $msg->getNom());
        $stm->bindValue(2, $msg->getEmail());
        $stm->bindValue(3, $msg->getObjet());
        $stm->bindValue(4, $msg->getMessage());
        $stm->bindValue(5, $msg->getDateEnvoie());
        $stm->execute();
    }

    // Récupérer tous les messages
    public function allMessages() {
        $stm = $this->dbh->prepare("SELECT * FROM messages ORDER BY dateEnvoie DESC");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Récupérer un message par son ID
    public function getMessageById($id) {
        $stm = $this->dbh->prepare("SELECT * FROM messages WHERE id = ?");
        $stm->execute([$id]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result ? new Message($result['nom'], $result['email'], $result['objet'], $result['message'], $result['dateEnvoie']) : null;
    }

    // Supprimer un message
    public function deleteMessage($id) {
        $stm = $this->dbh->prepare("DELETE FROM messages WHERE id = ?");
        return $stm->execute([$id]);
    }

    // Rechercher des messages selon un critère (par exemple, nom ou objet)
    public function searchMessages($nom, $objet) {
        $sql = "SELECT * FROM messages WHERE 1=1";
        
        if ($nom) {
            $sql .= " AND nom LIKE :nom";
        }
        if ($objet) {
            $sql .= " AND objet LIKE :objet";
        }
        
        $stm = $this->dbh->prepare($sql);
        
        if ($nom) {
            $stm->bindValue(':nom', '%' . $nom . '%');
        }
        if ($objet) {
            $stm->bindValue(':objet', '%' . $objet . '%');
        }
        
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
