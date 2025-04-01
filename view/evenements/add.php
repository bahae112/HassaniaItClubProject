<!-- add.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Événement</title>
    
    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter un Événement</h2>

        <!-- Formulaire d'ajout d'événement -->
        <form method="POST" action="index.php?action=saveEvenement" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" name="titre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <input type="text" name="description" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="typeEvenement" class="form-label">Type d'événement :</label>
                <input type="text" name="typeEvenement" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date :</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="heureDebut" class="form-label">Heure de début :</label>
                <input type="time" name="heureDebut" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="heureFin" class="form-label">Heure de fin :</label>
                <input type="time" name="heureFin" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lieu" class="form-label">Lieu :</label>
                <input type="text" name="lieu" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="clubOrganisateur" class="form-label">Club organisateur :</label>
                <input type="text" name="clubOrganisateur" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ecoleOrganisatrice" class="form-label">École organisatrice :</label>
                <input type="text" name="ecoleOrganisatrice" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut :</label>
                <input type="text" name="statut" class="form-control" required>
            </div>

            <!-- Champ d'upload d'image -->
            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
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
