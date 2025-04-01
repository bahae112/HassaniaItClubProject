<!-- searchResults.php -->
<h2>Résultats de la Recherche</h2>

<?php if (empty($evenements)): ?>
    <p>Aucun événement trouvé.</p>
<?php else: ?>
    <ul>
        <?php foreach ($evenements as $evenement): ?>
            <li>
                <?= htmlspecialchars($evenement['titre']) ?> - 
                <a href="index.php?action=showEvenement&id=<?= $evenement['id'] ?>">Voir</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
