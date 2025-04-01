<!-- Détails de l'Événement -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Événement</title>
    
    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style CSS pour l'image circulaire -->
    <style>
        .profile-image {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
        }

        .image-container {
            position: absolute;
            top: 50px;
            right: 50px;
        }

        .card-body {
            padding-right: 120px; /* Assurez-vous qu'il y a de l'espace à droite pour l'image */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Détails de l'Événement</h2>

        <?php if ($evenement): ?>
            <div class="card shadow-sm mb-4 position-relative">
                <div class="image-container">
                    <?php 
                        // Nettoyer le titre pour l'utiliser comme nom de fichier d'image
                        $imageTitle = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($evenement->getTitre())); // Correctement exécuté
                        // Utilisez le bon chemin d'accès relatif depuis la racine du serveur
                        $imagePath = "/HassaniaItClubProject/public/uploads/images/" . $imageTitle . ".jpeg"; // Assurez-vous de la bonne extension

                        // Vérifiez si le fichier existe avec le bon chemin
                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)): ?>
                            <img src="<?= $imagePath ?>" alt="Image de l'événement" class="profile-image">
                        <?php else: ?>
                            <img src="/HassaniaItClubProject/public/uploads/images/default.jpg" alt="Image par défaut" class="profile-image"> <!-- Image par défaut -->
                        <?php endif; ?>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($evenement->getTitre()) ?></h5>
                    <p><strong>Description :</strong> <?= htmlspecialchars($evenement->getDescription()) ?></p>
                    <p><strong>Type :</strong> <?= htmlspecialchars($evenement->getTypeEvenement()) ?></p>
                    <p><strong>Date :</strong> <?= htmlspecialchars($evenement->getDate()) ?></p>
                    <p><strong>Heure de début :</strong> <?= htmlspecialchars($evenement->getHeureDebut()) ?></p>
                    <p><strong>Heure de fin :</strong> <?= htmlspecialchars($evenement->getHeureFin()) ?></p>
                    <p><strong>Lieu :</strong> <?= htmlspecialchars($evenement->getLieu()) ?></p>
                    <p><strong>Club organisateur :</strong> <?= htmlspecialchars($evenement->getClubOrganisateur()) ?></p>
                    <p><strong>École organisatrice :</strong> <?= htmlspecialchars($evenement->getEcoleOrganisatrice()) ?></p>
                    <p><strong>Statut :</strong> <?= htmlspecialchars($evenement->getStatut()) ?></p>
                </div>
            </div>

            <!-- Actions -->
            <div class="text-center">
                <a href="index.php?action=editEvenement&id=<?= $evenement->getId() ?>" class="btn btn-warning me-2">Modifier l'Événement</a>
                <a href="index.php?action=listEvenements" class="btn btn-secondary">Retour à la liste</a>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center mt-4">
                <p>Événement introuvable.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Lien CDN vers le fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
