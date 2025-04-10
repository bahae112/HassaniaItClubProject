<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Sponsor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Modifier le sponsor : <?= htmlspecialchars($sponsor['nom']) ?></h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du sponsor</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($sponsor['nom']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="evenementnom" class="form-label">Nom de l'événement associé</label>
                <input type="text" class="form-control" id="evenementnom" name="evenementnom" value="<?= htmlspecialchars($sponsor['evenementnom']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="siteweb" class="form-label">Site Web (optionnel)</label>
                <input type="url" class="form-control" id="siteweb" name="siteweb" value="<?= htmlspecialchars($sponsor['siteweb']) ?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description (optionnel)</label>
                <textarea class="form-control" id="description" name="description"><?= htmlspecialchars($sponsor['description']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo (vous pouvez remplacer l'image actuelle)</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                <div class="mt-2">
                    <img src="uploads/<?= htmlspecialchars($sponsor['logo']) ?>" alt="Logo actuel" style="width: 150px; height: auto;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour le sponsor</button>
        </form>

        <div class="text-center mt-4">
            <a href="/HassaniaItClubProject/view/dashboard.php" class="btn btn-secondary">Retour au dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
