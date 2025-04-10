<!-- sponsors.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsors de l'événement</title>
    <!-- Lien Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Liste des sponsors :</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Logo</th>
                        <th>Nom</th>
                        <th>Site Web</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sponsors as $sponsor): ?>
                        <tr>
                            <td>
                                <img src="uploads/<?= htmlspecialchars($sponsor['logo']) ?>" alt="<?= htmlspecialchars($sponsor['nom']) ?>" style="width: 100px; height: auto;">
                            </td>
                            <td><?= htmlspecialchars($sponsor['nom']) ?></td>
                            <td>
                                <?php if ($sponsor['siteweb']): ?>
                                    <a href="<?= htmlspecialchars($sponsor['siteweb']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">Visiter</a>
                                <?php else: ?>
                                    <span class="text-muted">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-start"><?= nl2br(htmlspecialchars($sponsor['description'])) ?></td>
                            <td>
                                <a href="index.php?action=editSponsor&id=<?= $sponsor['id'] ?>" class="btn btn-sm btn-warning mb-1">Modifier</a>
                                <a href="index.php?action=deleteSponsor&id=<?= $sponsor['id'] ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce sponsor ?');">
                                   Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
        <a href="/HassaniaItClubProject/view/dashboard.php" class="btn btn-secondary">Retour au dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
