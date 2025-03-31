<h2>Liste des messages</h2>

<ul>
    <?php foreach ($messages as $msg): ?>
        <li>
            <strong><?= $msg['nom'] ?></strong> (<?= $msg['email'] ?>) - 
            <a href="index.php?action=showMessage&id=<?= $msg['id'] ?>">Voir</a>
            <form method="POST" action="index.php?action=deleteMessage&id=<?= $msg['id'] ?>" style="display:inline;">
                <button type="submit">Supprimer</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
