<!-- list.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Messages</title>

    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center my-4">Liste des Messages</h2>

        <!-- Formulaire de recherche -->
        <form method="GET" action="index.php" class="mb-4">
            <input type="hidden" name="action" value="listMessages">

            <div class="row">
                <div class="col-md-3">
                    <label for="search_nom" class="form-label">Nom :</label>
                    <input type="text" name="search_nom" id="search_nom" class="form-control" value="<?= isset($_GET['search_nom']) ? htmlspecialchars($_GET['search_nom']) : '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="search_email" class="form-label">Email :</label>
                    <input type="email" name="search_email" id="search_email" class="form-control" value="<?= isset($_GET['search_email']) ? htmlspecialchars($_GET['search_email']) : '' ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Rechercher</button>
                    <a href="index.php?action=listMessages" class="btn btn-secondary mt-3 ms-2">Réinitialiser</a>
                </div>
            </div>
        </form>

        <!-- Liste des messages -->
        <ul class="list-group">
            <?php
            // Appliquer les filtres
            $searchNom = isset($_GET['search_nom']) ? trim($_GET['search_nom']) : '';
            $searchEmail = isset($_GET['search_email']) ? trim($_GET['search_email']) : '';

            $filteredMessages = array_filter($messages, function ($msg) use ($searchNom, $searchEmail) {
                return 
                    ($searchNom === '' || stripos($msg['nom'], $searchNom) !== false) &&
                    ($searchEmail === '' || stripos($msg['email'], $searchEmail) !== false);
            });

            // Pagination: définir le nombre de messages par page
            $messagesPerPage = 6;
            $totalMessages = count($filteredMessages);
            $totalPages = ceil($totalMessages / $messagesPerPage);

            // Obtenir la page actuelle, par défaut page 1
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $currentPage = max(1, min($currentPage, $totalPages));  // S'assurer que la page est dans les limites

            // Calculer les indices des messages à afficher pour la page courante
            $startIndex = ($currentPage - 1) * $messagesPerPage;
            $paginatedMessages = array_slice($filteredMessages, $startIndex, $messagesPerPage);

            // Afficher les messages de la page courante
            foreach ($paginatedMessages as $msg): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><?= htmlspecialchars($msg['nom']) ?></strong> (<?= htmlspecialchars($msg['email']) ?>)
                    <div>
                        <a href="index.php?action=showMessage&id=<?= $msg['id'] ?>" class="btn btn-info btn-sm me-2">Voir</a>
                        <form method="POST" action="index.php?action=deleteMessage&id=<?= $msg['id'] ?>" style="display:inline;">
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <!-- Page précédente -->
                <li class="page-item <?= $currentPage == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="index.php?action=listMessages&page=<?= $currentPage - 1 ?>" aria-label="Précédent">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <!-- Pages -->
                <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                    <li class="page-item <?= $currentPage == $page ? 'active' : '' ?>">
                        <a class="page-link" href="index.php?action=listMessages&page=<?= $page ?>"><?= $page ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Page suivante -->
                <li class="page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="index.php?action=listMessages&page=<?= $currentPage + 1 ?>" aria-label="Suivant">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <a href="view/dashboard.php" class="btn btn-secondary mt-4">Retour au Tableau de Bord</a>
    </div>

    <!-- Lien CDN vers le fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
