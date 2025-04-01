<!-- edit.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Utilisateur</title>

    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Modifier l'Utilisateur</h2>

        <!-- Formulaire de modification d'utilisateur -->
        <form method="POST" action="index.php?action=updateUtilisateur" class="bg-light p-4 rounded shadow-sm">
            <input type="hidden" name="id" value="<?= $utilisateur->getId() ?>">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($utilisateur->getNom()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($utilisateur->getPrenom()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle :</label>
                <input type="text" name="role" class="form-control" value="<?= htmlspecialchars($utilisateur->getRole()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone :</label>
                <input type="text" name="telephone" class="form-control" value="<?= htmlspecialchars($utilisateur->getTelephone()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="datePriseDeFonction" class="form-label">Date de prise de fonction :</label>
                <input type="date" name="datePriseDeFonction" class="form-control" value="<?= htmlspecialchars($utilisateur->getDatePriseDeFonction()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($utilisateur->getEmail()) ?>" required>
            </div>

            <div class="mb-3">
                <label for="motDePasse" class="form-label">Mot de passe :</label>
                <input type="password" name="motDePasse" class="form-control">
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="index.php?action=listUtilisateurs" class="btn btn-secondary">Retour à la liste des utilisateurs</a>
            <a href="view/dashboard.php" class="btn btn-secondary ms-2">Retour au Tableau de Bord</a>
        </div>
    </div>

    <!-- Lien CDN vers le fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
