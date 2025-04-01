<!-- list.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    
    <!-- Lien CDN vers le fichier CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center my-4">Liste des Utilisateurs</h2>

        <!-- Formulaire de recherche -->
        <form method="GET" action="index.php" class="mb-4">
            <input type="hidden" name="action" value="listUtilisateurs">
            
            <div class="row">
                <div class="col-md-3">
                    <label for="search_nom" class="form-label">Nom :</label>
                    <input type="text" name="search_nom" id="search_nom" class="form-control" value="<?= isset($_GET['search_nom']) ? htmlspecialchars($_GET['search_nom']) : '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="search_prenom" class="form-label">Prénom :</label>
                    <input type="text" name="search_prenom" id="search_prenom" class="form-control" value="<?= isset($_GET['search_prenom']) ? htmlspecialchars($_GET['search_prenom']) : '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="search_role" class="form-label">Rôle :</label>
                    <select name="search_role" id="search_role" class="form-select">
                        <option value="">Tous</option>
                        <option value="admin" <?= (isset($_GET['search_role']) && $_GET['search_role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="Membre" <?= (isset($_GET['search_role']) && $_GET['search_role'] == 'Membre') ? 'selected' : '' ?>>Membre</option>
                        <option value="Visiteur" <?= (isset($_GET['search_role']) && $_GET['search_role'] == 'Visiteur') ? 'selected' : '' ?>>Visiteur</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="search_date" class="form-label">Date de Prise de Fonction :</label>
                    <input type="date" name="search_date" id="search_date" class="form-control" value="<?= isset($_GET['search_date']) ? htmlspecialchars($_GET['search_date']) : '' ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Rechercher</button>
                    <a href="index.php?action=listUtilisateurs" class="btn btn-secondary mt-3 ms-2">Réinitialiser</a>
                </div>
            </div>
        </form>

        <a href="index.php?action=addUtilisateur" class="btn btn-success mb-3">Ajouter un utilisateur</a>

        <!-- Tableau des utilisateurs -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                    <th>Date de Prise de Fonction</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Appliquer les filtres
                $searchNom = isset($_GET['search_nom']) ? trim($_GET['search_nom']) : '';
                $searchPrenom = isset($_GET['search_prenom']) ? trim($_GET['search_prenom']) : '';
                $searchRole = isset($_GET['search_role']) ? trim($_GET['search_role']) : '';
                $searchDate = isset($_GET['search_date']) ? trim($_GET['search_date']) : '';

                $filteredUtilisateurs = array_filter($utilisateurs, function ($utilisateur) use ($searchNom, $searchPrenom, $searchRole, $searchDate) {
                    return 
                        ($searchNom === '' || stripos($utilisateur['nom'], $searchNom) !== false) &&
                        ($searchPrenom === '' || stripos($utilisateur['prenom'], $searchPrenom) !== false) &&
                        ($searchRole === '' || $utilisateur['role'] === $searchRole) &&
                        ($searchDate === '' || $utilisateur['datePriseDeFonction'] === $searchDate);
                });

                // Pagination: définir le nombre d'utilisateurs par page
                $usersPerPage = 6;
                $totalUsers = count($filteredUtilisateurs);
                $totalPages = ceil($totalUsers / $usersPerPage);

                // Obtenir la page actuelle, par défaut page 1
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $currentPage = max(1, min($currentPage, $totalPages));  // S'assurer que la page est dans les limites

                // Calculer les indices des utilisateurs à afficher pour la page courante
                $startIndex = ($currentPage - 1) * $usersPerPage;
                $paginatedUsers = array_slice($filteredUtilisateurs, $startIndex, $usersPerPage);

                // Afficher les utilisateurs de la page courante
                foreach ($paginatedUsers as $utilisateur): ?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['role']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['datePriseDeFonction']) ?></td>
                        <td>
                            <a href="index.php?action=editUtilisateur&id=<?= $utilisateur['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="index.php?action=deleteUtilisateur&id=<?= $utilisateur['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
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
                    <a class="page-link" href="index.php?action=listUtilisateurs&page=<?= $currentPage - 1 ?>" aria-label="Précédent">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <!-- Pages -->
                <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                    <li class="page-item <?= $currentPage == $page ? 'active' : '' ?>">
                        <a class="page-link" href="index.php?action=listUtilisateurs&page=<?= $page ?>"><?= $page ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Page suivante -->
                <li class="page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="index.php?action=listUtilisateurs&page=<?= $currentPage + 1 ?>" aria-label="Suivant">
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
