<h2>Résultats de la recherche</h2>

<?php if (empty($messages)): ?>
    <p>Aucun message trouvé.</p>
<?php else: ?>
    <ul>
        <?php foreach ($messages as $msg): ?>
            <li>
                <strong><?= $msg['nom'] ?></strong> (<?= $msg['email'] ?>) - 
                <a href="index.php?action=showMessage&id=<?= $msg['id'] ?>">Voir</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
