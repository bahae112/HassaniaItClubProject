<!-- searchForm.php -->
<h2>Recherche d'Utilisateurs</h2>

<form method="POST" action="index.php?action=searchUtilisateurs">
    <label for="nom">Nom :</label>
    <input type="text" name="nom"><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom"><br>

    <label for="role">Rôle :</label>
    <input type="text" name="role"><br>

    <label for="datePriseDeFonction">Date de prise de fonction :</label>
    <input type="date" name="datePriseDeFonction"><br>

    <button type="submit">Rechercher</button>
</form>
