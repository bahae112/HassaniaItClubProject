<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f4f7fa;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Connexion</h2>

                        <!-- Affichage du message d'erreur -->
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger error-message"><?= $_SESSION['error']; ?></div>
                            <?php unset($_SESSION['error']); ?> <!-- Supprime l'erreur après affichage -->
                        <?php endif; ?>

                        <form action="../../index.php?action=Authenticate" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe :</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="../../index.php" class="btn btn-link">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lien CDN vers le fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
