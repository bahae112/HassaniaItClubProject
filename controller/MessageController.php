<?php
require_once 'dao/DAOMessage.php';

class MessageController {
    private $messageDAO;

    public function __construct() {
        $this->messageDAO = new DAOMessage();
    }

    // Afficher la liste des messages
    public function listMessages() {
        $messages = $this->messageDAO->allMessages();
        require 'view/messages/list.php';
    }

    // Afficher les détails d'un message
    public function showMessage($id) {
        $message = $this->messageDAO->getMessageById($id);
        if ($message) {
            require 'view/messages/show.php';
        } else {
            echo "Message introuvable.";
        }
    }

    public function addMessage() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? null;
        $email = $_POST['email'] ?? null;
        $objet = $_POST['objet'] ?? null;
        $contenu = $_POST['message'] ?? null;

        if ($nom && $email && $objet && $contenu) {
            $message = new Message($nom, $email, $objet, $contenu, date('Y-m-d H:i:s'));
            $this->messageDAO->saveMessage($message);

            // On renvoie juste une réponse brute pour JS
            echo "success-message";
        } else {
            echo "error";
        }
        exit; // Important ! Pour éviter d'inclure d'autres fichiers PHP ou du HTML
    }
}





    // Supprimer un message
    public function deleteMessage($id) {
        $this->messageDAO->deleteMessage($id);
        header("Location: index.php?action=listMessages");
    }

    // Rechercher des messages
    public function searchMessages() {
        $nom = $_POST['nom'] ?? '';
        $objet = $_POST['objet'] ?? '';
        
        $messages = $this->messageDAO->searchMessages($nom, $objet);
        
        require 'view/messages/searchResults.php';
    }
}
?>
