<!-- edit.php -->
<h2>Modifier l'Événement</h2>

<form method="POST" action="index.php?action=updateEvenement">
    <input type="hidden" name="id" value="<?= $evenement['id'] ?>">

    <label for="titre">Titre :</label>
    <input type="text" name="titre" value="<?= htmlspecialchars($evenement['titre']) ?>" required><br>

    <label for="typeEvenement">Type d'événement :</label>
    <input type="text" name="typeEvenement" value="<?= htmlspecialchars($evenement['typeEvenement']) ?>" required><br>

    <label for="date">Date :</label>
    <input type="date" name="date" value="<?= htmlspecialchars($evenement['date']) ?>" required><br>

    <label for="heureDebut">Heure de début :</label>
    <input type="time" name="heureDebut" value="<?= htmlspecialchars($evenement['heureDebut']) ?>" required><br>

    <label for="heureFin">Heure de fin :</label>
    <input type="time" name="heureFin" value="<?= htmlspecialchars($evenement['heureFin']) ?>" required><br>

    <label for="lieu">Lieu :</label>
    <input type="text" name="lieu" value="<?= htmlspecialchars($evenement['lieu']) ?>" required><br>

    <label for="clubOrganisateur">Club organisateur :</label>
    <input type="text" name="clubOrganisateur" value="<?= htmlspecialchars($evenement['clubOrganisateur']) ?>" required><br>

    <label for="ecoleOrganisatrice">École organisatrice :</label>
    <input type="text" name="ecoleOrganisatrice" value="<?= htmlspecialchars($evenement['ecoleOrganisatrice']) ?>" required><br>

    <label for="statut">Statut :</label>
    <input type="text" name="statut" value="<?= htmlspecialchars($evenement['statut']) ?>" required><br>

    <label for="imageUrl">URL de l'image :</label>
    <input type="text" name="imageUrl" value="<?= htmlspecialchars($evenement['imageUrl']) ?>" required><br>

    <button type="submit">Mettre à jour</button>
</form>

<a href="index.php?action=listEvenements">Retour à la liste</a>
