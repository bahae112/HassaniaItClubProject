<!-- show.php -->
<h2>Détails de l'Événement</h2>

<p><strong>Titre :</strong> <?= htmlspecialchars($evenement['titre']) ?></p>
<p><strong>Type d'événement :</strong> <?= htmlspecialchars($evenement['typeEvenement']) ?></p>
<p><strong>Date :</strong> <?= htmlspecialchars($evenement['date']) ?></p>
<p><strong>Heure de début :</strong> <?= htmlspecialchars($evenement['heureDebut']) ?></p>
<p><strong>Heure de fin :</strong> <?= htmlspecialchars($evenement['heureFin']) ?></p>
<p><strong>Lieu :</strong> <?= htmlspecialchars($evenement['lieu']) ?></p>
<p><strong>Club organisateur :</strong> <?= htmlspecialchars($evenement['clubOrganisateur']) ?></p>
<p><strong>École organisatrice :</strong> <?= htmlspecialchars($evenement['ecoleOrganisatrice']) ?></p>
<p><strong>Statut :</strong> <?= htmlspecialchars($evenement['statut']) ?></p>
<p><strong>Image :</strong> <img src="<?= htmlspecialchars($evenement['imageUrl']) ?>" alt="Image de l'événement" /></p>

<a href="index.php?action=editEvenement&id=<?= $evenement['id'] ?>">Modifier</a>
<a href="index.php?action=deleteEvenement&id=<?= $evenement['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</a>

<a href="index.php?action=listEvenements">Retour à la liste</a>
