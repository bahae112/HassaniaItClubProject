<form method="POST" action="index.php?action=addMessage">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br>

    <label for="email">Email :</label>
    <input type="email" name="email" required><br>

    <label for="objet">Objet :</label>
    <input type="text" name="objet" required><br>

    <label for="message">Message :</label>
    <textarea name="message" required></textarea><br>

    <button type="submit">Envoyer</button>
</form>
