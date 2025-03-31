<!-- edit.php -->
<h2>Modifier l'Utilisateur</h2>

<form method="POST" action="index.php?action=updateUtilisateur">
    <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">

    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($utilisateur['nom']) ?>" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($utilisateur['prenom']) ?>" required><br>

    <label for="role">Rôle :</label>
    <input type="text" name="role" value="<?= htmlspecialchars($utilisateur['role']) ?>" required><br>

    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" value="<?= htmlspecialchars($utilisateur['telephone']) ?>" required><br>

    <label for="datePriseDeFonction">Date de prise de fonction :</label>
    <input type="date" name="datePriseDeFonction" value="<?= htmlspecialchars($utilisateur['datePriseDeFonction']) ?>" required><br>

    <label for="email">Email :</label>
    <input type="email" name="email" value="<?= htmlspecialchars($utilisateur['email']) ?>" required><br>

    <label for="motDePasse">Mot de passe :</label>
    <input type="password" name="motDePasse"><br>

    <button type="submit">Mettre à jour</button>
</form>

<a href="index.php?action=listUtilisateurs">Retour à la liste</a>
