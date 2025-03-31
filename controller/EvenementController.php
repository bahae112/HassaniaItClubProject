<?php
require_once 'dao/DAOEvenement.php';

class EvenementController {
    private $evenementDAO;

    public function __construct() {
        $this->evenementDAO = new DAOEvenement();
    }

    public function listEvenements() {
        $evenements = $this->evenementDAO->allEvenements();
        require 'views/evenements/list.php';
    }

    // Afficher les détails d'un événement
    public function afficherDetailsEvenement($id) {
        $evenement = $this->evenementDAO->getEvenementById($id);
        if ($evenement) {
            require 'views/evenements/details.php';
        } else {
            echo "Événement introuvable.";
        }
    }

    // Rechercher des événements selon des critères de filtrage
    public function rechercherEvenements() {
        $critereTitre = $_POST['titre'] ?? '';
        $critereDate = $_POST['date'] ?? '';
        $critereType = $_POST['typeEvenement'] ?? '';
        
        $evenements = $this->evenementDAO->rechercherEvenements($critereTitre, $critereDate, $critereType);
        
        require 'views/evenements/searchResults.php';
    }

    public function createEvenement() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evenement = new Evenement(
                null,
                $_POST['titre'],
                $_POST['description'],
                $_POST['typeEvenement'],
                $_POST['date'],
                $_POST['heureDebut'],
                $_POST['heureFin'],
                $_POST['lieu'],
                $_POST['clubOrganisateur'],
                $_POST['ecoleOrganisatrice'],
                $_POST['statut'],
                $_POST['imageUrl']
            );

            $this->evenementDAO->saveEvenement($evenement);
            header("Location: index.php?action=list");
        } else {
            require 'views/evenements/create.php';
        }
    }

    public function editEvenement($id) {
        $evenement = $this->evenementDAO->getEvenementById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evenement = new Evenement(
                $id,
                $_POST['titre'],
                $_POST['description'],
                $_POST['typeEvenement'],
                $_POST['date'],
                $_POST['heureDebut'],
                $_POST['heureFin'],
                $_POST['lieu'],
                $_POST['clubOrganisateur'],
                $_POST['ecoleOrganisatrice'],
                $_POST['statut'],
                $_POST['imageUrl']
            );

            $this->evenementDAO->updateEvenement($evenement);
            header("Location: index.php?action=list");
        } else {
            require 'views/evenements/edit.php';
        }
    }

    public function deleteEvenement($id) {
        $this->evenementDAO->deleteEvenement($id);
        header("Location: index.php?action=list");
    }
}

?>
