<!-- searchResults.php -->
<h2>Résultats de la Recherche</h2>

<?php if (empty($utilisateurs)): ?>
    <p>Aucun utilisateur trouvé.</p>
<?php else: ?>
    <ul>
        <?php foreach ($utilisateurs as $utilisateur): ?>
            <li>
                <?= htmlspecialchars($utilisateur['nom']) ?> <?= htmlspecialchars($utilisateur['prenom']) ?> - 
                <a href="index.php?action=showUtilisateur&id=<?= $utilisateur['id'] ?>">Voir</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
