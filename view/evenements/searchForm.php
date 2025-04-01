<!-- searchForm.php -->
<h2>Recherche d'Événements</h2>

<form method="POST" action="index.php?action=searchEvenements">
    <label for="titre">Titre :</label>
    <input type="text" name="titre"><br>

    <label for="typeEvenement">Type d'événement :</label>
    <input type="text" name="typeEvenement"><br>

    <label for="date">Date :</label>
    <input type="date" name="date"><br>

    <label for="statut">Statut :</label>
    <input type="text" name="statut"><br>

    <button type="submit">Rechercher</button>
</form>
