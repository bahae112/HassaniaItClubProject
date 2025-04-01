<!-- list.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements</title>
    
    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center my-4">Liste des Événements</h2>

        <!-- Formulaire de recherche -->
        <form method="GET" action="index.php" class="mb-4">
            <input type="hidden" name="action" value="listEvenements">
            
            <div class="row">
                <div class="col-md-4">
                    <label for="search_titre" class="form-label">Titre :</label>
                    <input type="text" name="search_titre" id="search_titre" class="form-control" value="<?= isset($_GET['search_titre']) ? htmlspecialchars($_GET['search_titre']) : '' ?>">
                </div>

                <div class="col-md-4">
                    <label for="search_date" class="form-label">Date :</label>
                    <input type="date" name="search_date" id="search_date" class="form-control" value="<?= isset($_GET['search_date']) ? htmlspecialchars($_GET['search_date']) : '' ?>">
                </div>

                <div class="col-md-4">
                    <label for="search_type" class="form-label">Type d'événement :</label>
                    <select name="search_type" id="search_type" class="form-select">
                        <option value="">Tous</option>
                        <option value="Conférence" <?= (isset($_GET['search_type']) && $_GET['search_type'] == 'Conférence') ? 'selected' : '' ?>>Conférence</option>
                        <option value="Atelier" <?= (isset($_GET['search_type']) && $_GET['search_type'] == 'Atelier') ? 'selected' : '' ?>>Atelier</option>
                        <option value="Hackathon" <?= (isset($_GET['search_type']) && $_GET['search_type'] == 'Hackathon') ? 'selected' : '' ?>>Hackathon</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Rechercher</button>
                    <a href="index.php?action=listEvenements" class="btn btn-secondary mt-3 ms-2">Réinitialiser</a>
                </div>
            </div>
        </form>

        <a href="index.php?action=addEvenement" class="btn btn-success mb-3">Ajouter un événement</a>

        <!-- Tableau des événements -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type d'événement</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Appliquer les filtres
                $searchTitre = isset($_GET['search_titre']) ? trim($_GET['search_titre']) : '';
                $searchDate = isset($_GET['search_date']) ? trim($_GET['search_date']) : '';
                $searchType = isset($_GET['search_type']) ? trim($_GET['search_type']) : '';

                $filteredEvenements = array_filter($evenements, function ($evenement) use ($searchTitre, $searchDate, $searchType) {
                    return 
                        ($searchTitre === '' || stripos($evenement['titre'], $searchTitre) !== false) &&
                        ($searchDate === '' || $evenement['date'] === $searchDate) &&
                        ($searchType === '' || $evenement['typeEvenement'] === $searchType);
                });

                // Pagination: définir le nombre d'événements par page
                $eventsPerPage = 6;
                $totalEvents = count($filteredEvenements);
                $totalPages = ceil($totalEvents / $eventsPerPage);

                // Obtenir la page actuelle, par défaut page 1
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $currentPage = max(1, min($currentPage, $totalPages));  // S'assurer que la page est dans les limites

                // Calculer les indices des événements à afficher pour la page courante
                $startIndex = ($currentPage - 1) * $eventsPerPage;
                $paginatedEvents = array_slice($filteredEvenements, $startIndex, $eventsPerPage);

                // Afficher les événements de la page courante
                foreach ($paginatedEvents as $evenement): ?>
                    <tr>
                        <td><?= htmlspecialchars($evenement['titre']) ?></td>
                        <td><?= htmlspecialchars($evenement['typeEvenement']) ?></td>
                        <td><?= htmlspecialchars($evenement['date']) ?></td>
                        <td><?= htmlspecialchars($evenement['lieu']) ?></td>
                        <td><?= htmlspecialchars($evenement['statut']) ?></td>
                        <td>
                            <a href="index.php?action=showEvenement&id=<?= $evenement['id'] ?>" class="btn btn-info btn-sm">Voir</a>
                            <a href="index.php?action=editEvenement&id=<?= $evenement['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="index.php?action=deleteEvenement&id=<?= $evenement['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <!-- Page précédente -->
                <li class="page-item <?= $currentPage == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="index.php?action=listEvenements&page=<?= $currentPage - 1 ?>" aria-label="Précédent">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <!-- Pages -->
                <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                    <li class="page-item <?= $currentPage == $page ? 'active' : '' ?>">
                        <a class="page-link" href="index.php?action=listEvenements&page=<?= $page ?>"><?= $page ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Page suivante -->
                <li class="page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="index.php?action=listEvenements&page=<?= $currentPage + 1 ?>" aria-label="Suivant">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <a href="view/dashboard.php" class="btn btn-secondary">Retour au Tableau de Bord</a>
    </div>

    <!-- Lien CDN vers le fichier JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
