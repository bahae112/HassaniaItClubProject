<!-- add.php -->
<h2>Ajouter un Utilisateur</h2>

<form method="POST" action="index.php?action=saveUtilisateur">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required><br>

    <label for="role">Rôle :</label>
    <input type="text" name="role" required><br>

    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" required><br>

    <label for="datePriseDeFonction">Date de prise de fonction :</label>
    <input type="date" name="datePriseDeFonction" required><br>

    <label for="email">Email :</label>
    <input type="email" name="email" required><br>

    <label for="motDePasse">Mot de passe :</label>
    <input type="password" name="motDePasse" required><br>

    <button type="submit">Ajouter</button>
</form>

<a href="index.php?action=listUtilisateurs">Retour à la liste</a>
