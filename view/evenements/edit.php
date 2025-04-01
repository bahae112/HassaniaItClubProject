<!-- edit.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Événement</title>

    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Modifier l'Événement</h2>

        <!-- Formulaire de modification d'événement -->
        <form action="index.php?action=updateEvenement&id=<?= $evenement->getId() ?>" method="post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" name="titre" class="form-control" value="<?= htmlspecialchars($evenement->getTitre()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" class="form-control" required><?= htmlspecialchars($evenement->getDescription()) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="typeEvenement" class="form-label">Type :</label>
                <input type="text" name="typeEvenement" class="form-control" value="<?= htmlspecialchars($evenement->getTypeEvenement()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date :</label>
                <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($evenement->getDate()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="heureDebut" class="form-label">Heure de début :</label>
                <input type="time" name="heureDebut" class="form-control" value="<?= htmlspecialchars($evenement->getHeureDebut()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="heureFin" class="form-label">Heure de fin :</label>
                <input type="time" name="heureFin" class="form-control" value="<?= htmlspecialchars($evenement->getHeureFin()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="lieu" class="form-label">Lieu :</label>
                <input type="text" name="lieu" class="form-control" value="<?= htmlspecialchars($evenement->getLieu()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="clubOrganisateur" class="form-label">Club organisateur :</label>
                <input type="text" name="clubOrganisateur" class="form-control" value="<?= htmlspecialchars($evenement->getClubOrganisateur()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="ecoleOrganisatrice" class="form-label">École organisatrice :</label>
                <input type="text" name="ecoleOrganisatrice" class="form-control" value="<?= htmlspecialchars($evenement->getEcoleOrganisatrice()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut :</label>
                <select name="statut" class="form-select">
                    <option value="prévu" <?= $evenement->getStatut() == "prévu" ? "selected" : "" ?>>Prévu</option>
                    <option value="terminé" <?= $evenement->getStatut() == "terminé" ? "selected" : "" ?>>Terminé</option>
                    <option value="annulé" <?= $evenement->getStatut() == "annulé" ? "selected" : "" ?>>Annulé</option>
                </select>
            </div>

            <!-- Champ pour modifier l'image -->
            <div class="mb-3">
                <label for="image" class="form-label">Modifier l'image :</label>
                <input type="file" name="image" class="form-control">
                <?php if ($evenement->getImageUrl()): ?>
                    <p>Image actuelle : <img src="<?= $evenement->getImageUrl() ?>" alt="Image actuelle" width="100"></p>
                <?php endif; ?>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="index.php?action=listEvenements" class="btn btn-secondary">Retour à la liste des événements</a>
            <a href="view/dashboard.php" class="btn btn-secondary ms-2">Retour au Tableau de Bord</a>
        </div>
    </div>

    <!-- Lien CDN vers le fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
