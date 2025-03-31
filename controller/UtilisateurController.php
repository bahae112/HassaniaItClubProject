<?php
require_once 'dao/DAOUtilisateur.php';

class UtilisateurController {
    private $utilisateurDAO;

    public function __construct() {
        $this->utilisateurDAO = new DAOUtilisateur();
    }

    // Afficher les utilisateurs par rôle
    public function showUtilisateursByRole($role) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByRole($role);
        require 'views/utilisateurs/list.php';
    }

    // Afficher les utilisateurs par date de prise de fonction
    public function showUtilisateursByDatePriseDeFonction($datePriseDeFonction) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByDatePriseDeFonction($datePriseDeFonction);
        require 'views/utilisateurs/list.php';
    }

    // Afficher les utilisateurs par nom
    public function showUtilisateursByNom($nom) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByNom($nom);
        require 'views/utilisateurs/list.php';
    }

    // Afficher les utilisateurs par prénom
    public function showUtilisateursByPrenom($prenom) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByPrenom($prenom);
        require 'views/utilisateurs/list.php';
    }

    // Rechercher des utilisateurs par plusieurs critères
    public function searchUtilisateurs() {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $role = $_POST['role'] ?? '';
        $datePriseDeFonction = $_POST['datePriseDeFonction'] ?? '';

        $utilisateurs = $this->utilisateurDAO->searchUtilisateurs($nom, $prenom, $role, $datePriseDeFonction);

        require 'views/utilisateurs/searchResults.php';
    }
}
?>
