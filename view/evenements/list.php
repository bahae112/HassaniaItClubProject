<!-- list.php -->
<h2>Liste des Événements</h2>
<a href="index.php?action=addEvenement">Ajouter un événement</a>

<table border="1">
    <tr>
        <th>Titre</th>
        <th>Type d'événement</th>
        <th>Date</th>
        <th>Lieu</th>
        <th>Statut</th>
        <th>Action</th>
    </tr>
    <?php foreach ($evenements as $evenement): ?>
        <tr>
            <td><?= htmlspecialchars($evenement['titre']) ?></td>
            <td><?= htmlspecialchars($evenement['typeEvenement']) ?></td>
            <td><?= htmlspecialchars($evenement['date']) ?></td>
            <td><?= htmlspecialchars($evenement['lieu']) ?></td>
            <td><?= htmlspecialchars($evenement['statut']) ?></td>
            <td>
                <a href="index.php?action=showEvenement&id=<?= $evenement['id'] ?>">Voir</a>
                <a href="index.php?action=editEvenement&id=<?= $evenement['id'] ?>">Modifier</a>
                <a href="index.php?action=deleteEvenement&id=<?= $evenement['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
