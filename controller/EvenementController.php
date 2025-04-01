<?php
require_once 'dao/DAOEvenement.php';

class EvenementController {
    private $evenementDAO;

    public function __construct() {
        $this->evenementDAO = new DAOEvenement();
    }

    public function getEvenementById($id) {
        $evenement = $this->evenementDAO->getEvenementById($id);
        
        if ($evenement) {
            // echo "Le fichier edit.php va être inclus !<br>";
            include 'view/evenements/edit.php';
        } else {
            echo "Événement non trouvé.";
        }
    }

    public function listEvenements() {
        $evenements = $this->evenementDAO->allEvenements();
        require 'view/evenements/list.php';
    }

    // Afficher les détails d'un événement
    public function afficherDetailsEvenement($id) {
        $evenement = $this->evenementDAO->getEvenementById($id);
        if ($evenement) {
            require 'view/evenements/show.php';
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
        
        require 'view/evenements/searchResults.php';
    }

    public function createEvenement() {
        // Variable pour stocker les erreurs
        $errors = [];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $typeEvenement = isset($_POST['typeEvenement']) ? $_POST['typeEvenement'] : '';
            $date = isset($_POST['date']) ? $_POST['date'] : '';
            $heureDebut = isset($_POST['heureDebut']) ? $_POST['heureDebut'] : '';
            $heureFin = isset($_POST['heureFin']) ? $_POST['heureFin'] : '';
            $lieu = isset($_POST['lieu']) ? $_POST['lieu'] : '';
            $clubOrganisateur = isset($_POST['clubOrganisateur']) ? $_POST['clubOrganisateur'] : '';
            $ecoleOrganisatrice = isset($_POST['ecoleOrganisatrice']) ? $_POST['ecoleOrganisatrice'] : '';
            $statut = isset($_POST['statut']) ? $_POST['statut'] : '';
    
            // Vérification des champs obligatoires
            if (empty($titre)) { $errors[] = "Le titre est obligatoire."; }
            if (empty($description)) { $errors[] = "La description est obligatoire."; }
    
            // Traitement de l'upload de l'image
            $imageUrl = null;
    
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                // Informations sur l'image téléchargée
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    
                // Vérification de l'extension du fichier
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($imageExtension, $allowedExtensions)) {
                    $errors[] = "Extension de fichier non autorisée.";
                } else {
                    // Nettoyer le titre pour l'utiliser comme nom de fichier
                    $cleanedTitle = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($titre)); // Remplacer les caractères spéciaux et espaces par des underscores
    
                    // Ajouter une extension à l'image
                    $newImageName = $cleanedTitle . '.' . $imageExtension;
    
                    $uploadDirectory = __DIR__ . '/../public/uploads/images/';
    
                    // Créer le répertoire s'il n'existe pas
                    if (!file_exists($uploadDirectory)) {
                        if (!mkdir($uploadDirectory, 0777, true)) {
                            $errors[] = "Impossible de créer le dossier d'uploads.";
                        }
                    }
    
                    if (empty($errors) && !move_uploaded_file($imageTmpPath, $uploadDirectory . $newImageName)) {
                        $errors[] = "Erreur lors du déplacement du fichier vers le dossier.";
                    } else {
                        // Si l'image est uploadée avec succès, définir l'URL de l'image
                        $imageUrl = 'uploads/images/' . $newImageName;
                    }
                }
            } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                $errors[] = "Une erreur est survenue lors de l'upload de l'image.";
            }
    
            // Si aucune erreur, enregistrement en base de données
            if (empty($errors)) {
                $evenement = new Evenement(
                    $titre,
                    $description,
                    $typeEvenement,
                    $date,
                    $heureDebut,
                    $heureFin,
                    $lieu,
                    $clubOrganisateur,
                    $ecoleOrganisatrice,
                    $statut,
                    $imageUrl
                );
    
                try {
                    if ($this->evenementDAO->saveEvenement($evenement)) {
                        header("Location: index.php?action=listEvenements");
                        exit();
                    } else {
                        header("Location: index.php?action=listEvenements");
                    }
                } catch (PDOException $e) {
                    $errors[] = "Erreur de base de données : " . $e->getMessage();
                }
            }
        }
    
        // Afficher les erreurs si elles existent
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='error'>$error</div>";
            }
        }
    
        // Afficher le formulaire d'ajout d'événement
    }
    
    
    
    

    public function editEvenement($id) {
        // Récupérer l'événement actuel depuis la base de données
        $evenement = $this->evenementDAO->getEvenementById($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
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
            
            // Garder l'ancienne image par défaut
            $imageUrl = $evenement->getImageUrl();
            
            // Vérifier si une nouvelle image a été uploadée
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    
                // Vérification des extensions autorisées
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($imageExtension, $allowedExtensions)) {
                    echo "<div class='error'>Extension de fichier non autorisée.</div>";
                } else {
                    // Nettoyer le titre pour générer un nom de fichier unique
                    $cleanedTitle = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($titre));
                    $newImageName = $cleanedTitle . '_' . time() . '.' . $imageExtension;
    
                    $uploadDirectory = __DIR__ . '/../public/uploads/images/';
    
                    // Créer le répertoire si nécessaire
                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true);
                    }
    
                    // Déplacer le fichier uploadé
                    if (move_uploaded_file($imageTmpPath, $uploadDirectory . $newImageName)) {
                        // Supprimer l'ancienne image si elle existe
                        if (!empty($imageUrl) && file_exists(__DIR__ . '/../public/' . $imageUrl)) {
                            unlink(__DIR__ . '/../public/' . $imageUrl);
                        }
    
                        // Mettre à jour l'URL de l'image
                        $imageUrl = 'uploads/images/' . $newImageName;
                    } else {
                        echo "<div class='error'>Erreur lors de l'upload de l'image.</div>";
                    }
                }
            }
    
            // Création de l'objet Evenement mis à jour
            $evenement = new Evenement(
                $id,
                $titre,
                $description,
                $typeEvenement,
                $date,
                $heureDebut,
                $heureFin,
                $lieu,
                $clubOrganisateur,
                $ecoleOrganisatrice,
                $statut,
                $imageUrl
            );
    
            // Mettre à jour l'événement dans la base de données
            if ($this->evenementDAO->updateEvenement($evenement)) {
                header("Location: index.php?action=listEvenements");
                exit();
            } else {
                echo "<div class='error'>Erreur lors de la mise à jour de l'événement.</div>";
            }
        } else {
            // Afficher la vue de modification
            require 'view/evenements/edit.php';
        }
    }


    public function updateEvenement($id, $titre, $description, $typeEvenement, $date, $heureDebut, $heureFin, $lieu, $clubOrganisateur, $ecoleOrganisatrice, $statut) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer l'ID de l'événement depuis l'URL
            $id = $_GET['id'];
            
            // Récupérer les autres données du formulaire
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
    
            // Récupérer l'événement actuel pour conserver l'ancienne image si aucune nouvelle image n'est envoyée
            $evenementActuel = $this->evenementDAO->getEvenementById($id); // Remplacer par la méthode qui récupère l'événement par ID
            $imageUrl = null; // Garder l'ancienne image par défaut
    
            // Vérification de l'upload de la nouvelle image
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                // Informations sur l'image téléchargée
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                
                // Vérification de l'extension de l'image
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($imageExtension, $allowedExtensions)) {
                    // Nettoyer le titre pour l'utiliser comme nom de fichier
                    $cleanedTitle = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($titre)); // Remplacer les caractères spéciaux et espaces par des underscores
                    $newImageName = $cleanedTitle . '.' . $imageExtension;
                    $uploadDirectory = __DIR__ . '/../public/uploads/images/';
                    
                    // Créer le répertoire s'il n'existe pas
                    if (!file_exists($uploadDirectory)) {
                        if (!mkdir($uploadDirectory, 0777, true)) {
                            $errors[] = "Impossible de créer le dossier d'uploads.";
                        }
                    }
                    
                    // Déplacer l'image téléchargée vers le répertoire cible
                    if (empty($errors) && !move_uploaded_file($imageTmpPath, $uploadDirectory . $newImageName)) {
                        $errors[] = "Erreur lors du déplacement du fichier vers le dossier.";
                    } else {
                        // Définir l'URL de la nouvelle image
                        $imageUrl = 'uploads/images/' . $newImageName;
                    }
                } else {
                    $errors[] = "Extension de fichier non autorisée.";
                }
            }
    
            // Si aucune erreur, mettre à jour l'événement dans la base de données
            if (empty($errors)) {
                // Appeler la méthode pour mettre à jour l'événement sans changer la structure de l'appel
                $this->evenementDAO->updateEvenement($id, $titre, $description, $typeEvenement, $date, $heureDebut, $heureFin, $lieu, $clubOrganisateur, $ecoleOrganisatrice, $statut, $imageUrl);
    
                // Rediriger après mise à jour
                header("Location: index.php?action=listEvenements");
                exit();
            } else {
                // Gérer les erreurs s'il y en a
                foreach ($errors as $error) {
                    echo "<div class='error'>$error</div>";
                }
            }
        }
    }

    public function deleteEvenement($id) {
        if ($this->evenementDAO->deleteEvenement($id)) {
            // Redirection après suppression
            header("Location: index.php?action=listEvenements");
            exit();
        } else {
            echo "<div class='error'>Erreur lors de la suppression de l'événement.</div>";
        }
    }
    
    
    
    
}

?>
