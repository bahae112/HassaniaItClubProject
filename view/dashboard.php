<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Admin</title>
    
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center text-primary">Tableau de bord de l'Administrateur</h2>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h3 class="card-title text-dark">Gestion des Événements</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="../index.php?action=listEvenements" class="text-decoration-none">Liste des Événements</a></li>
                        <li class="list-group-item"><a href="../index.php?action=addEvenement" class="text-decoration-none">Ajouter un Événement</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h3 class="card-title text-dark">Gestion des Utilisateurs</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="../index.php?action=listUtilisateurs" class="text-decoration-none">Liste des Utilisateurs</a></li>
                        <li class="list-group-item"><a href="../index.php?action=addUtilisateur" class="text-decoration-none">Ajouter un Utilisateur</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h3 class="card-title text-dark">Gestion des Messages</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="../index.php?action=listMessages" class="text-decoration-none">Liste des Messages</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton de déconnexion -->
    <div class="text-center mt-4">
        <a href="authentification/logout.php" class="btn btn-danger btn-lg">Se déconnecter</a>
    </div>
</div>

<!-- Inclure Bootstrap JS -->
<script src="../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
