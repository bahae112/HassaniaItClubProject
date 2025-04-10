<?php
require_once 'model/Sponsor.php';
require_once 'dao/DAOSponsor.php';


class SponsorController {
    private $sponsorDAO;

    public function __construct() {
        $this->sponsorDAO = new DAOSponsor();
    }

    public function ajouterSponsor() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $evenementnom = $_POST['evenementnom'];
            $siteweb = $_POST['siteweb'] ?? null;
            $description = $_POST['description'] ?? null;
    
            // Gestion du fichier image
            $logoFile = $_FILES['logo'];
    
            // Nettoyer le nom de l’événement pour créer un nom de fichier sûr
            $evenementSlug = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($evenementnom));
    
            // Extension du fichier
            $imageExtension = strtolower(pathinfo($logoFile['name'], PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    
            if (!in_array($imageExtension, $allowedExtensions)) {
                echo "<div class='alert alert-danger text-center'>Extension non autorisée.</div>";
                return;
            }
    
            // Nom de fichier basé sur l’événement
            $logoName = $evenementSlug . '.' . $imageExtension;
    
            // Dossier de destination
            $uploadDir = __DIR__ . '/../public/uploads/Sponsors/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            $uploadPath = $uploadDir . $logoName;
    
            if (move_uploaded_file($logoFile['tmp_name'], $uploadPath)) {
                // Stocker le chemin relatif
                $relativePath = 'Sponsors/' . $logoName;
    
                $sponsor = new Sponsor($nom, $relativePath, $evenementnom, $siteweb, $description);
                $this->sponsorDAO->addSponsor($sponsor);
                echo "<div class='alert alert-success text-center'>Sponsor ajouté avec succès.</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Erreur lors de l'upload du logo.</div>";
            }
        }
    
        include 'view/sponsors/add.php';
    }
    
    
    public function afficherSponsors($evenementnom) {
        $sponsors = $this->sponsorDAO->getSponsorsByEvent($evenementnom);
       return $sponsors;
    }

     // Afficher la liste des sponsors
     public function listSponsors() {
        $sponsors = $this->sponsorDAO->getAllSponsors();
        include 'view/sponsors/list.php';  // Afficher la vue de la liste des sponsors
    }

    


    public function editSponsor($id) {
        $sponsor = $this->sponsorDAO->getSponsorById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $evenementnom = $_POST['evenementnom'];
            $siteweb = $_POST['siteweb'] ?? null;
            $description = $_POST['description'] ?? null;

            $logo = $sponsor['logo'];

            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $logoFile = $_FILES['logo'];
                $extension = strtolower(pathinfo($logoFile['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($extension, $allowed)) {
                    $uploadDir = __DIR__ . '/../public/uploads/Sponsors/';
                    $logoName = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($evenementnom)) . '_' . time() . '.' . $extension;
                    $uploadPath = $uploadDir . $logoName;

                    if (move_uploaded_file($logoFile['tmp_name'], $uploadPath)) {
                        // Supprimer l’ancien logo
                        if (!empty($logo) && file_exists(__DIR__ . '/../public/uploads/' . $logo)) {
                            unlink(__DIR__ . '/../public/uploads/' . $logo);
                        }
                        $logo = 'Sponsors/' . $logoName;
                    }
                }
            }

            $this->sponsorDAO->updateSponsor($id, $nom, $logo, $evenementnom, $siteweb, $description);
            echo "<div class='alert alert-success text-center'>Sponsor mis à jour avec succès.</div>";
            $sponsor = $this->sponsorDAO->getSponsorById($id);
        }

        include 'view/sponsors/edit.php';
    }

    public function deleteSponsor($id) {
        $sponsor = $this->sponsorDAO->getSponsorById($id);
        if ($sponsor && file_exists(__DIR__ . '/../public/uploads/' . $sponsor['logo'])) {
            unlink(__DIR__ . '/../public/uploads/' . $sponsor['logo']);
        }
        $this->sponsorDAO->deleteSponsor($id);
        header("Location: index.php?action=listeSponsors");
    }
}
