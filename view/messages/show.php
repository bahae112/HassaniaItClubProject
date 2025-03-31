<h2>Détails du message</h2>

<p><strong>Nom :</strong> <?= $message->getNom() ?></p>
<p><strong>Email :</strong> <?= $message->getEmail() ?></p>
<p><strong>Objet :</strong> <?= $message->getObjet() ?></p>
<p><strong>Message :</strong> <?= nl2br($message->getMessage()) ?></p>
<p><strong>Date d'envoi :</strong> <?= $message->getDateEnvoie() ?></p>
