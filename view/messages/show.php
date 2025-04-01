<!-- Détails du Message -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Message</title>
    
    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Détails du Message</h2>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">Informations sur le message</h5>
                <p><strong>Nom :</strong> <?= htmlspecialchars($message->getNom()) ?></p>
                <p><strong>Email :</strong> <?= htmlspecialchars($message->getEmail()) ?></p>
                <p><strong>Objet :</strong> <?= htmlspecialchars($message->getObjet()) ?></p>
                <p><strong>Message :</strong><br> <?= nl2br(htmlspecialchars($message->getMessage())) ?></p>
                <p><strong>Date d'envoi :</strong> <?= htmlspecialchars($message->getDateEnvoie()) ?></p>
            </div>
        </div>

        <div class="text-center">
            <a href="index.php?action=listMessages" class="btn btn-secondary me-2">Retour à la liste des messages</a>
            <a href="view/dashboard.php" class="btn btn-primary">Retour au Tableau de Bord</a>
        </div>
    </div>

    <!-- Lien CDN vers le fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
