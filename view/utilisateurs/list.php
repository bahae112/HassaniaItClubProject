<!-- list.php -->
<h2>Liste des Utilisateurs</h2>
<a href="index.php?action=addUtilisateur">Ajouter un utilisateur</a>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Rôle</th>
        <th>Action</th>
    </tr>
    <?php foreach ($utilisateurs as $utilisateur): ?>
        <tr>
            <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
            <td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
            <td><?= htmlspecialchars($utilisateur['role']) ?></td>
            <td>
                <a href="index.php?action=editUtilisateur&id=<?= $utilisateur['id'] ?>">Modifier</a>
                <a href="index.php?action=deleteUtilisateur&id=<?= $utilisateur['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
