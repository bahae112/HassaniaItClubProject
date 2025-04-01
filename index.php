<?php
session_start();

// Vérifier si l'utilisateur est connecté sauf pour l'action par défaut
$action = $_GET['action'] ?? 'dashboard';

// Empêcher l'accès à toutes les actions sauf 'dashboard' et 'Authenticate' (car c'est l'action de connexion)
// Si l'utilisateur n'est pas connecté et que l'action est autre que 'dashboard' ou 'Authenticate', il sera redirigé
if ( $action !== 'Authenticate' && !isset($_SESSION['user'])) {
    header("Location: view/authentification/login.php");
    exit();
}

// Vérifier si l'utilisateur est authentifié et a le rôle 'admin'
if (isset($_SESSION['user']) && $_SESSION['role'] !== 'admin') {
    // Si l'utilisateur n'a pas le rôle admin, il ne peut accéder à aucune action
    $_SESSION['error'] = "Accès refusé. Vous n'avez pas les permissions nécessaires.";
    header("Location: view/authentification/login.php");  // Rediriger vers login si l'utilisateur n'est pas admin
    exit();
}

// Chargement des contrôleurs
include_once 'controller/EvenementController.php';
include_once 'controller/UtilisateurController.php';
include_once 'controller/MessageController.php';
include_once 'controller/authController.php';

// Définition de l'action à effectuer (par défaut, l'action est 'dashboard')
$action = $_GET['action'] ?? 'dashboard';

// Initialisation des contrôleurs
$evenementController = new EvenementController();
$utilisateurController = new UtilisateurController();
$messageController = new MessageController();

// Routeur pour gérer les différentes actions en fonction de l'URL
switch ($action) {
    // Actions pour les événements
    case 'listEvenements':
        $evenements = $evenementController->listEvenements();
        break;

    case 'showEvenement':
        $evenementId = $_GET['id'];
        $evenement = $evenementController->afficherDetailsEvenement($evenementId);
        break;

    case 'addEvenement':
        include 'view/evenements/add.php';
        break;

    case 'saveEvenement':
        $evenementController->createEvenement();
        break;

    case 'editEvenement':
        if (isset($_GET['id'])) {
            $evenementId = (int) $_GET['id']; // Sécurisation de l'ID
            $evenementController->getevenementById($evenementId); // Appel du contrôleur
        } else {
            echo "ID de l'evenement non spécifié.";
        }
        break;

    case 'updateEvenement':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $typeEvenement = $_POST['typeEvenement'];
            $date = $_POST['date'];
            $heureDebut = $_POST['heureDebut'];
            $heureFin = $_POST['heureFin'];
            $lieu = $_POST['lieu'];
            $clubOrganisateur = $_POST['clubOrganisateur'];
            $ecoleOrganisatrice = $_POST['ecoleOrganisatrice'];
            $statut = $_POST['statut'];
            
            $evenementController->updateEvenement($id, $titre, $description, $typeEvenement, $date, $heureDebut, $heureFin, $lieu, $clubOrganisateur, $ecoleOrganisatrice, $statut);
        }
        break;

    case 'deleteEvenement':
        $evenementId = $_GET['id'];
        $evenementController->deleteEvenement($evenementId);
        header('Location: index.php?action=listEvenements');
        break;

    // Actions pour les utilisateurs
    case 'listUtilisateurs':
        $utilisateurs = $utilisateurController->getAllUtilisateurs();
        include 'view/utilisateurs/list.php';
        break;

    case 'showUtilisateur':
        $utilisateurId = $_GET['id'];
        $utilisateur = $utilisateurController->getUtilisateurById($utilisateurId);
        include 'view/utilisateurs/show.php';
        break;

    case 'addUtilisateur':
        include 'view/utilisateurs/add.php';
        break;
    
    case 'saveUtilisateur':
        $utilisateurController->saveUtilisateur();
        break;

    case 'editUtilisateur':
        if (isset($_GET['id'])) {
            $utilisateurId = (int) $_GET['id']; // Sécurisation de l'ID
            $utilisateurController->getUtilisateurById($utilisateurId); // Appel du contrôleur
        } else {
            echo "ID de l'utilisateur non spécifié.";
        }
        break;

    case 'updateUtilisateur':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $role = $_POST['role'];
            $telephone = $_POST['telephone'];
            $datePriseDeFonction = $_POST['datePriseDeFonction'];
            $email = $_POST['email'];
            $motDePasse = !empty($_POST['motDePasse']) ? password_hash($_POST['motDePasse'], PASSWORD_DEFAULT) : null;
    
            $utilisateurController->updateUtilisateur($id, $nom, $prenom, $role, $telephone, $datePriseDeFonction, $email, $motDePasse);
        }
        break;
        
    case 'deleteUtilisateur':
        $utilisateurId = $_GET['id'];
        $utilisateurController->deleteUtilisateur($utilisateurId);
        header('Location: index.php?action=listUtilisateurs');
        break;

    case 'searchUtilisateurs':
        include 'view/utilisateurs/searchForm.php';
        break;

    // Actions pour les messages
    case 'listMessages':
        $messages = $messageController->listMessages();
        break;

    case 'showMessage':
        $messageId = $_GET['id'];
        $message = $messageController->showMessage($messageId);
        break;

    case 'deleteMessage':
        $messageId = $_GET['id'];
        $messageController->deleteMessage($messageId);
        header('Location: index.php?action=listMessages');
        break;
    
    case 'Authenticate':
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $authController = new authController();
            $authController->authenticate($email, $password);
        }
        break;

    // Tableau de bord (admin dashboard par défaut)
    // case 'dashboard':
    default:
        include 'view/layout.php';  // Page principale pour l'admin
        break;
}
?>
