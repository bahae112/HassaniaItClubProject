<!-- add_sponsor.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Sponsor</title>
    <!-- Lien Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter un Sponsor</h2>

        <form action="" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom du sponsor <span class="text-danger">*</span></label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="evenementnom" class="form-label">Événement associé <span class="text-danger">*</span></label>
                <input type="text" name="evenementnom" id="evenementnom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo du sponsor (image) <span class="text-danger">*</span></label>
                <input type="file" name="logo" id="logo" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="siteweb" class="form-label">Site web (optionnel)</label>
                <input type="url" name="siteweb" id="siteweb" class="form-control" placeholder="https://exemple.com">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description (optionnelle)</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Quelques mots sur le sponsor..."></textarea>
            </div>

            <div class="text-center">
                <input type="submit" value="Ajouter le sponsor" class="btn btn-success px-4">
                <a href="index.php?action=listSponsors" class="btn btn-secondary ms-2">Retour</a>
            </div>
        </form>
    </div>

    <!-- Lien Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
