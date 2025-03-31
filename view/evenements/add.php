<!-- add.php -->
<h2>Ajouter un Événement</h2>

<form method="POST" action="index.php?action=saveEvenement">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" required><br>

    <label for="typeEvenement">Type d'événement :</label>
    <input type="text" name="typeEvenement" required><br>

    <label for="date">Date :</label>
    <input type="date" name="date" required><br>

    <label for="heureDebut">Heure de début :</label>
    <input type="time" name="heureDebut" required><br>

    <label for="heureFin">Heure de fin :</label>
    <input type="time" name="heureFin" required><br>

    <label for="lieu">Lieu :</label>
    <input type="text" name="lieu" required><br>

    <label for="clubOrganisateur">Club organisateur :</label>
    <input type="text" name="clubOrganisateur" required><br>

    <label for="ecoleOrganisatrice">École organisatrice :</label>
    <input type="text" name="ecoleOrganisatrice" required><br>

    <label for="statut">Statut :</label>
    <input type="text" name="statut" required><br>

    <label for="imageUrl">URL de l'image :</label>
    <input type="text" name="imageUrl" required><br>

    <button type="submit">Ajouter</button>
</form>

<a href="index.php?action=listEvenements">Retour à la liste</a>
