<?php
// session_start();
require_once 'dao/DAOUtilisateur.php';

class AuthController {
    private $dao;

    public function __construct() {
        $this->dao = new DAOUtilisateur();
    }

    public function authenticate($email, $password) {
        $utilisateur = $this->dao->getUtilisateurByEmail($email);
        


        if ($utilisateur && $password === $utilisateur->getMotDePasse()) {
            
            $_SESSION['user'] = $utilisateur->getEmail();
            $_SESSION['role'] = $utilisateur->getRole();

            
            if ($utilisateur->getRole() === 'admin') {
                header("Location: view/dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Accès refusé.";
                header("Location: view/authentification/login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Email ou mot de passe incorrect.";
            header("Location: view/authentification/login.php");  // Rediriger vers login avec l'erreur
            exit();
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>
