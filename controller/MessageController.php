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

    // Ajouter un message
    public function addMessage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = new Message(
                $_POST['nom'],
                $_POST['email'],
                $_POST['objet'],
                $_POST['message'],
                date('Y-m-d H:i:s')
            );

            $this->messageDAO->saveMessage($message);
            header("Location: index.php?action=listMessages");
        } else {
            require 'view/messages/add.php';
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
