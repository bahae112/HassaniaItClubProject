<?php
require_once 'dao/DAOUtilisateur.php';

class UtilisateurController {
    private $utilisateurDAO;

    public function __construct() {
        $this->utilisateurDAO = new DAOUtilisateur();
    }

    // Récupérer tous les utilisateurs
    public function getAllUtilisateurs() {
        return $this->utilisateurDAO->getAll();  // Appel à la méthode DAO pour récupérer tous les utilisateurs
    }


    // Enregistrer un nouvel utilisateur en base
    public function saveUtilisateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $role = $_POST['role'] ?? '';
            $telephone = $_POST['telephone'] ?? '';
            $datePriseDeFonction = $_POST['datePriseDeFonction'] ?? '';
            $email = $_POST['email'] ?? '';
            $motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);  // Hachage du mot de passe

            // Création d'un nouvel utilisateur
            $utilisateur = new Utilisateur($nom, $prenom, $role, $telephone, $datePriseDeFonction, $email, $motDePasse);

            // Enregistrement via DAO
            $this->utilisateurDAO->saveUtilisateur($utilisateur);

            // Redirection après l'enregistrement
            header('Location: index.php?action=listUtilisateurs');
            exit();
        } else {
            // Si l'accès se fait sans POST, rediriger vers le formulaire
            header('Location: index.php?action=addUtilisateur');
            exit();
        }
    }


    // Afficher les utilisateurs par rôle
    public function showUtilisateursByRole($role) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByRole($role);
        require 'view/utilisateurs/list.php';
    }

    // Afficher les utilisateurs par date de prise de fonction
    public function showUtilisateursByDatePriseDeFonction($datePriseDeFonction) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByDatePriseDeFonction($datePriseDeFonction);
        require 'view/utilisateurs/list.php';
    }

    // Afficher les utilisateurs par nom
    public function showUtilisateursByNom($nom) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByNom($nom);
        require 'view/utilisateurs/list.php';
    }

    // Afficher les utilisateurs par prénom
    public function showUtilisateursByPrenom($prenom) {
        $utilisateurs = $this->utilisateurDAO->getUtilisateursByPrenom($prenom);
        require 'view/utilisateurs/list.php';
    }

    // Rechercher des utilisateurs par plusieurs critères
    public function searchUtilisateurs() {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $role = $_POST['role'] ?? '';
        $datePriseDeFonction = $_POST['datePriseDeFonction'] ?? '';

        $utilisateurs = $this->utilisateurDAO->searchUtilisateurs($nom, $prenom, $role, $datePriseDeFonction);

        require 'view/utilisateurs/searchResults.php';
    }

    // Supprimer un utilisateur par son ID
    public function deleteUtilisateur($id) {
        // Appel à la méthode DAO pour supprimer l'utilisateur
        $this->utilisateurDAO->deleteUtilisateur($id);
        // Redirection après suppression
        header('Location: index.php?action=listUtilisateurs');
    }


    public function getUtilisateurById($id) {
        $utilisateur = $this->utilisateurDAO->getUtilisateurById($id);
    
        if ($utilisateur) {
            echo "Le fichier edit.php va être inclus !<br>";
            include 'view/utilisateurs/edit.php';
        } else {
            echo "Utilisateur introuvable.";
        }
    }
    
    public function updateUtilisateur($id, $nom, $prenom, $role, $telephone, $datePriseDeFonction, $email, $motDePasse) {
        $this->utilisateurDAO->updateUtilisateur($id, $nom, $prenom, $role, $telephone, $datePriseDeFonction, $email, $motDePasse);
        
        // Rediriger après mise à jour
        header("Location: index.php?action=listUtilisateurs");
        exit();
    }

    
    
}
?>
