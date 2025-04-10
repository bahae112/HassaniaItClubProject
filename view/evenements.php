<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Événement</title>

    <!-- Lien vers les fichiers CSS -->
    <link href="/HassaniaItClubProject/public/assets/css/main.css" rel="stylesheet">
    <link href="/HassaniaItClubProject/public/assets/css/styles.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="/HassaniaItClubProject/public/assets/img/favicon.png" rel="icon">
    <link href="/HassaniaItClubProject/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/HassaniaItClubProject/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/HassaniaItClubProject/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/HassaniaItClubProject/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/HassaniaItClubProject/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/HassaniaItClubProject/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>
    ul li a {
    text-decoration: none;
    }

    ul li a:hover {
        text-decoration: none; /* S'assure que le lien ne soit pas souligné au survol */
    }
    #stats {
    margin-bottom: 50px; /* Ajustez la valeur en fonction de l'espacement souhaité */
}
/* Ajouter de l'espace sous le footer */
#footer {
    padding-bottom: 30px; /* Ajustez la valeur pour un espacement supplémentaire */
}
#video-section {
    padding-top: 70px; /* Ajuste cette valeur pour l'espacement voulu */
}


/* Animation de type "machine à écrire" */
@keyframes typing {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}

/* Effet de clignotement de la ligne */
@keyframes blink {
    50% {
        background-color: transparent;
    }
}

/* Section vidéo : ajustez la position pour que la vidéo ne soit pas cachée par le header fixe */
#video-section {
    margin-top: -70px; /* Retirer l'espacement supplémentaire */
    position: relative;
    z-index: 1; /* Assurez-vous que la vidéo soit visible sous le header */
}

/* Style de la vidéo */
#event-video {
    width: 100%;
    height: auto;
    margin-bottom: 0; /* Aucun espacement sous la vidéo */
}

/* Le header doit avoir une position fixe */
#header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Assure que le header est toujours au-dessus de la vidéo */
    background-color: rgba(0, 0, 0, 0.8); /* Ajoute un fond semi-transparent si nécessaire */
}

/* Titre de l'événement animé */
.event-title-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    font-size: 3rem;
    z-index: 10;
    font-family: 'Poppins', sans-serif;
}

/* Animation du texte comme une machine à écrire */
#event-title {
    display: inline-block;
    font-size: 3.5rem;
    white-space: nowrap;
    overflow: hidden;
    border-right: .15em solid #fff;
    width: 0;
    animation: typing 3s steps(30) 1s forwards, blink 0.75s step-end infinite;
}


    </style>
</head>
<body>

<!-- Vidéo juste avant le contenu principal -->
<section id="video-section" class="video-section">
    
    <video autoplay muted loop id="event-video" class="event-video video-section">
        <source src="public/assets/video/itHassaniaClub.mp4" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo.
    </video>

    <!-- Titre de l'événement animé -->
    <div class="event-title-container">
        <h1 id="event-title"><?= htmlspecialchars($evenement->getTitre()) ?></h1>
        <div class="title-line"></div>
    </div>
</section>

<!-- Header -->
<header id="header" class="header d-flex align-items-center fixed-top">

    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">KnightOne</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/HassaniaItClubProject/index.php?action=Home#hero" class="active">Home</a></li>
                <li><a href="/HassaniaItClubProject/index.php?action=Home#about">About</a></li>
                <li><a href="/HassaniaItClubProject/index.php?action=Home#services">Interesting</a></li>
                <li><a href="/HassaniaItClubProject/index.php?action=Home#clients">Sponsors</a></li>
                <li><a href="/HassaniaItClubProject/index.php?action=Home#portfolio">Events</a></li>
                <li><a href="/HassaniaItClubProject/index.php?action=Home#Cells">Cells</a></li>
                <li><a href="/HassaniaItClubProject/index.php?action=Home#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
    
</header>


<!-- Contenu principal de l'événement -->
<div class="container section-title" data-aos="fade-up">
    <h2>About The Event</h2>
    <p><?= htmlspecialchars($evenement->getDescription()) ?></p>
</div>

<!-- Conteneur principal avec détails de l'événement -->
<div class="container my-5">
    <?php if (isset($evenement)): ?>
        <div class="row">
            <!-- Image de l'événement -->
            <div class="col-md-6">
                <img src="<?= 'public/uploads/images/' . $evenement->getTitre() . '.jpeg' ?>" alt="<?= htmlspecialchars($evenement->getTitre()) ?>" class="img-fluid">
            </div>
            <!-- Détails de l'événement -->
            <div class="col-md-6">
                <p><strong>Type:</strong> <?= htmlspecialchars($evenement->getTypeEvenement()) ?></p>
                <p><strong>Date:</strong> <?= htmlspecialchars($evenement->getDate()) ?></p>
                <p><strong>Heure Début:</strong> <?= htmlspecialchars($evenement->getHeureDebut()) ?></p>
                <p><strong>Heure Fin:</strong> <?= htmlspecialchars($evenement->getHeureFin()) ?></p>
                <p><strong>Lieu:</strong> <?= htmlspecialchars($evenement->getLieu()) ?></p>
                <p><strong>Club Organisateur:</strong> <?= htmlspecialchars($evenement->getClubOrganisateur()) ?></p>
                <p><strong>École Organisatrice:</strong> <?= htmlspecialchars($evenement->getEcoleOrganisatrice()) ?></p>
                <p><strong>Statut:</strong> <?= htmlspecialchars($evenement->getStatut()) ?></p>
            </div>
        </div>
    <?php else: ?>
        <p>Événement non trouvé.</p>
    <?php endif; ?>
</div>

<!-- Stats Section -->
<section id="stats" class="stats section dark-background">

<img src="public/assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

<div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

  <div class="subheading">
    <h3>What we have achieved so far</h3>
    <p>Iusto et labore modi qui sapiente xpedita tempora et aut non ipsum consequatur illo.</p>
  </div>

  <div class="row gy-4">

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
        <p>Clients</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
        <p>Projects</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
        <p>Hours Of Support</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
        <p>Workers</p>
      </div>
    </div><!-- End Stats Item -->

  </div>

</div>

</section><!-- /Stats Section -->
<!-- Section Sponsors dynamiques -->
<section id="clients" class="clients section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <!-- Titre de section -->
    <div class="section-title" data-aos="fade-up">
      <h2>Nos Sponsors</h2>
      <p>Voici les entreprises et organisations qui soutiennent notre événement.</p>
    </div>

    <div class="row gy-4 justify-content-center">
      <?php if (!empty($sponsors)): ?>
        <?php foreach ($sponsors as $sponsor): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
            <div class="sponsor-logo p-3 bg-white shadow-sm rounded text-center">
              <img src="public/uploads/<?= htmlspecialchars($sponsor['logo']) ?>"
                   alt="<?= htmlspecialchars($sponsor['nom']) ?>"
                   class="img-fluid" style="max-height: 120px;">
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <p class="text-muted">Aucun sponsor pour le moment.</p>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<!-- Style local optionnel -->
<style>
  .sponsor-logo {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .sponsor-logo:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }
</style>

<!-- Footer -->
<footer id="footer" class="footer dark-background">
    <div class="container">
        <h3 class="sitename">KnightOne</h3>
        <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
        <div class="social-links d-flex justify-content-center">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-skype"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
        <div class="container">
            <div class="copyright">
                <span>Copyright</span> <strong class="px-1 sitename">KnightOne</strong> <span>All Rights Reserved</span>
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="/HassaniaItClubProject/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/HassaniaItClubProject/public/assets/vendor/php-email-form/validate.js"></script>
<script src="/HassaniaItClubProject/public/assets/vendor/aos/aos.js"></script>
<script src="/HassaniaItClubProject/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/HassaniaItClubProject/public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/HassaniaItClubProject/public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="/HassaniaItClubProject/public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/HassaniaItClubProject/public/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="/HassaniaItClubProject/public/assets/js/main.js"></script>

<!-- Style pour la vidéo -->
<style>
    /* Style de la vidéo */
    #event-video {
        width: 100%;
        height: auto;
        margin-bottom: 30px; /* Espacement sous la vidéo */
    }

    /* Section de la vidéo */
    .video-section {
        position: relative;
        width: 100%;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Titre de l'événement animé */
    .event-title-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        font-size: 3rem;
        z-index: 10;
        font-family: 'Poppins', sans-serif;
    }

    #event-title {
        display: inline-block;
        font-size: 3.5rem;
        white-space: nowrap;
        overflow: hidden;
        border-right: .15em solid #fff;
        width: 0;
        animation: typing 3s steps(30) 1s forwards, blink 0.75s step-end infinite;
    }

    /* Effet de clignotement de la ligne */
    .title-line {
        width: 100%;
        height: 2px;
        background-color: white;
        animation: blink 1s infinite;
    }

    /* Animation du texte comme une machine à écrire */
    @keyframes typing {
        from {
            width: 0;
        }
        to {
            width: 100%;
        }
    }

    /* Effet de clignotement de la ligne */
    @keyframes blink {
        50% {
            background-color: transparent;
        }
    }
</style>

</body>
</html>
