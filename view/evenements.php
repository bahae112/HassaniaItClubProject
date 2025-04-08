<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .event-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
        }
        .info-box {
            display: inline-block;
            background: #f8f9fa;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            margin: 2px;
        }
        .container {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }
        .main-section {
            width: 75%;
        }
        .premium-section {
            width: 25%;
            position: sticky;
            top: 20px;
            max-height: 90vh;
            overflow-y: auto;
        }
        .pagination {
            display: flex;
            justify-content: center;
            padding: 0;
            gap: 0;
        }
        .modal-body {
            font-family: 'Arial', sans-serif;
            line-height: 1.5;
        }
        .modal-body p {
            margin: 10px 0;
        }
        .modal-body strong {
            font-weight: bold;
        }
        .modal-header, .modal-footer {
            background-color: #f1f1f1;
        }
        .modal-header h5 {
            font-weight: bold;
        }
        .modal-footer button {
            width: 100px;
        }
        .info-section {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- Formulaire de Recherche -->
    <div class="container mt-4">
        <div class="mb-4">
            <h4>Rechercher un Événement</h4>
            <form method="POST" action="/HassaniaItClubProject/index.php?action=evenements" class="p-3 bg-light rounded shadow-sm">
    <div class="row g-3 align-items-center">
        <div class="col-md-3">
            <label class="form-label"><i class="fas fa-heading"></i> Titre</label>
            <input type="text" class="form-control" name="titre" placeholder="Entrez un titre" value="<?= isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : '' ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label"><i class="fas fa-calendar-alt"></i> Type d'Événement</label>
            <input type="text" class="form-control" name="typeEvenement" placeholder="Ex: Conférence, Hackathon..." value="<?= isset($_POST['typeEvenement']) ? htmlspecialchars($_POST['typeEvenement']) : '' ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label"><i class="fas fa-calendar-day"></i> Date</label>
            <input type="date" class="form-control" name="date" value="<?= isset($_POST['date']) ? htmlspecialchars($_POST['date']) : '' ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label"><i class="fas fa-map-marker-alt"></i> Lieu</label>
            <input type="text" class="form-control" name="lieu" placeholder="Ex: Casablanca" value="<?= isset($_POST['lieu']) ? htmlspecialchars($_POST['lieu']) : '' ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label"><i class="fas fa-users"></i> Club Organisateur</label>
            <input type="text" class="form-control" name="clubOrganisateur" placeholder="Nom du club" value="<?= isset($_POST['clubOrganisateur']) ? htmlspecialchars($_POST['clubOrganisateur']) : '' ?>">
        </div>
    </div>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary px-4">
            <i class="fas fa-search"></i> Rechercher
        </button>
    </div>
</form>

<!-- Ajout de Font Awesome pour les icônes -->
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>

        </div>
    </div>

    <div class="container">
        <!-- Liste des Événements -->
        <div class="main-section">
            <h2 class="text-center mb-4">Liste des Événements</h2>
            <div class="row">
                <?php foreach ($evenements as $event): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header d-flex align-items-center">
                                <img src="public/uploads/images/hassaniaItClub.jpeg" class="profile-img me-2" alt="Organisateur">
                                <h6 class="mb-0"><?= htmlspecialchars($event['titre']) ?></h6>
                            </div>
                            <img src="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" class="event-img" alt="Événement">
                            <div class="card-body">
                                <p><?= htmlspecialchars($event['description']) ?></p>
                                <div>
                                    <span class="info-box"><?= htmlspecialchars($event['typeEvenement']) ?></span>
                                    <span class="info-box"><?= htmlspecialchars($event['date']) ?></span>
                                    <span class="info-box"><?= htmlspecialchars($event['statut']) ?></span>
                                </div>
                                <!-- Bouton pour ouvrir le modal -->
                                <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#eventModal<?= $event['id'] ?>">Voir Détails</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal pour afficher les détails de l'événement -->
                    <div class="modal fade" id="eventModal<?= $event['id'] ?>" tabindex="-1" aria-labelledby="eventModalLabel<?= $event['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eventModalLabel<?= $event['id'] ?>"><?= htmlspecialchars($event['titre']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" class="event-img mb-3" alt="Événement">
                                    <div class="info-section">
                                        <p><strong>Description:</strong> <?= htmlspecialchars($event['description']) ?></p>
                                        <p><strong>Type d'Événement:</strong> <?= htmlspecialchars($event['typeEvenement']) ?></p>
                                    </div>
                                    <div class="info-section">
                                        <p><strong>Date:</strong> <?= htmlspecialchars($event['date']) ?></p>
                                        <p><strong>Heure de Début:</strong> <?= htmlspecialchars($event['heureDebut']) ?></p>
                                        <p><strong>Heure de Fin:</strong> <?= htmlspecialchars($event['heureFin']) ?></p>
                                    </div>
                                    <div class="info-section">
                                        <p><strong>Lieu:</strong> <?= htmlspecialchars($event['lieu']) ?></p>
                                        <p><strong>Club Organisateur:</strong> <?= htmlspecialchars($event['clubOrganisateur']) ?></p>
                                    </div>
                                    <div class="info-section">
                                        <p><strong>École Organisatrice:</strong> <?= htmlspecialchars($event['ecoleOrganisatrice']) ?></p>
                                    </div>
                                    <div class="info-section">
                                        <p><strong>Statut:</strong> <?= htmlspecialchars($event['statut']) ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination mt-4">
                    <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?action=evenements&page=<?= max(1, $page - 1) ?>">«</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="index.php?action=evenements&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($page == $totalPages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?action=evenements&page=<?= min($totalPages, $page + 1) ?>">»</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Événements Premium -->
        <div class="premium-section">
            <h4 class="text-center mb-3">
                <i class="fas fa-eye" style="color: blue;"></i> Intéressants
            </h4>
            <?php foreach ($premiumEvenements as $event): ?>
                <div class="card mb-3 shadow-sm">
                    <img src="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" class="event-img" alt="Événement">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($event['titre']) ?></h5>
                        <p class="info-box"><?= htmlspecialchars($event['date']) ?></p>
                        <p class="info-box"><?= htmlspecialchars($event['statut']) ?></p>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#eventModal<?= $event['id'] ?>">Voir Détails</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Ajout de Bootstrap JS pour activer le modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
