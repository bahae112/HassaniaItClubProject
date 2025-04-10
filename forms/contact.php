<?php
if (isset($_GET['messageEnvoye'])) {
    if ($_GET['messageEnvoye'] == 'success') {
        echo "<div class='alert alert-success'>Votre message a bien été envoyé !</div>";
    } elseif ($_GET['messageEnvoye'] == 'error') {
        echo "<div class='alert '>Tous les champs sont requis !</div>";
    }
}
?>
