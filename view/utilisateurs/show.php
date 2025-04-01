<!-- show.php -->
<h2>Détails de l'Utilisateur</h2>

<p><strong>Nom :</strong> <?= htmlspecialchars($utilisateur['nom']) ?></p>
<p><strong>Prénom :</strong> <?= htmlspecialchars($utilisateur['prenom']) ?></p>
<p><strong>Rôle :</strong> <?= htmlspecialchars($utilisateur['role']) ?></p>
<p><strong>Téléphone :</strong> <?= htmlspecialchars($utilisateur['telephone']) ?></p>
<p><strong>Date de prise de fonction :</strong> <?= htmlspecialchars($utilisateur['datePriseDeFonction']) ?></p>
<p><strong>Email :</strong> <?= htmlspecialchars($utilisateur['email']) ?></p>

<a href="index.php?action=editUtilisateur&id=<?= $utilisateur['id'] ?>">Modifier</a>
<a href="index.php?action=deleteUtilisateur&id=<?= $utilisateur['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>

<a href="index.php?action=listUtilisateurs">Retour à la liste</a>

<a href="view/dashboard.php">Retour au Tableau de Bord</a>