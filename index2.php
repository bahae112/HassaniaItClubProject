<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - KnightOne Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="public/assets/img/favicon.png" rel="icon">
  <link href="public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="public/assets/css/main.css" rel="stylesheet">
  <style>
    .services-carousel-container {
      overflow-x: auto;
      overflow-y: hidden;
      padding-bottom: 1rem;
    }
    
    .services-carousel {
      display: flex;
      gap: 1rem;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      padding: 1rem 0;
      min-width: 100%;
    }
    
    .service-card {
      flex: 0 0 auto;
      width: calc(100% / 3 - 1rem); /* 3 cards per view */
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      scroll-snap-align: start;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .service-card .icon {
      font-size: 2rem;
      color: #0d6efd;
      margin-bottom: 10px;
    }
    
    /* Optional: Hide scrollbar on WebKit */
    .services-carousel-container::-webkit-scrollbar {
      display: none;
    }

    #hero {
  position: relative;
  height: 100vh;
  overflow: hidden;
  margin-top: -70px; /* comme tu l’as précisé */
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

#hero video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
}

.video-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.4); /* rend le texte plus lisible */
  z-index: 1.5;
}

.hero-content {
  position: relative;
  z-index: 2;
  color: white;
  text-align: center;
  top: 40%;
  transform: translateY(-40%);
}

    
  </style>

  <!-- =======================================================
  * Template Name: KnightOne
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Updated: Oct 16 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class=" fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">KnightOne</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Interesting</a></li>
          <li><a href="#clients">Sponsors</a></li>
          <li><a href="#portfolio">Events</a></li>
          <li><a href="#Cells">Cells</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

  <!-- Hero Section -->
<section id="hero" class="hero section dark-background position-relative">

  <!-- Vidéo de fond -->
  <video id="heroVideo" class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" autoplay muted playsinline>
    <source src="public/assets/video/itHassaniaClub.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Contenu par-dessus la vidéo -->
  <div class="container d-flex flex-column align-items-center justify-content-center text-center position-relative" style="z-index: 2; min-height: 100vh;">
    <h2 data-aos="fade-up" data-aos-delay="100" style="color: white; font-size: 3rem;">
      <span id="typewriter-text"></span><span class="cursor">|</span>
    </h2>
  </div>

</section>

<!-- Style du curseur clignotant -->
<style>
  .cursor {
    display: inline-block;
    animation: blink 1s infinite;
    color: white;
  }
  

  @keyframes blink {
    0%   { opacity: 1; }
    50%  { opacity: 0; }
    100% { opacity: 1; }
  }
</style>

<!-- Script -->
<script>
  const video = document.getElementById('heroVideo');

  // Boucle de 0 à 10s
  video.addEventListener('timeupdate', function () {
    if (video.currentTime >= 10) {
      video.currentTime = 0;
      video.play();
    }
  });

  video.addEventListener('loadedmetadata', () => {
    video.currentTime = 0;
  });

  // Typewriter effect
  const text = "Hassania IT Club \n Your gateway to the tech universe!";
  const typewriter = document.getElementById("typewriter-text");
  let index = 0;

  function typeText() {
    if (index < text.length) {
      typewriter.innerHTML += text.charAt(index);
      index++;
      setTimeout(typeText, 100);
    }
  }

  window.addEventListener("DOMContentLoaded", () => {
    setTimeout(typeText, 1000);
  });
</script>



    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

<!-- Section Événements Intéressants -->
<section id="services" class="portfolio section">
  <!-- Titre de section -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Événements Intéressants</h2>
    <p>Découvrez nos événements les plus intéressants</p>
  </div>

  <!-- Cartes scrollables -->
  <div class="container">
    <div class="scroll-container">
      <?php foreach ($premiumEvenements as $event): ?>
        <div class="event-card" data-aos="fade-up">
          <img src="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" alt="<?= htmlspecialchars($event['titre']) ?>">
          <div class="event-card-body">
            <h5><?= htmlspecialchars($event['titre']) ?></h5>
            <p><strong>Date :</strong> <?= htmlspecialchars($event['date']) ?></p>
            <p><strong>Statut :</strong> <?= htmlspecialchars($event['statut']) ?></p>
          </div>
          <div class="event-card-footer">
            <a href="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" data-glightbox>Preview</a>
            <a href="index.php?action=details&id=<?= $event['id'] ?>" class="">Détails</a>
            
            </div>
        </div>

        <!-- Modal Détails -->
        <div class="modal fade" id="eventModal<?= $event['id'] ?>" tabindex="-1" aria-labelledby="eventModalLabel<?= $event['id'] ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel<?= $event['id'] ?>"><?= htmlspecialchars($event['titre']) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
              </div>
              <div class="modal-body">
                <img src="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" class="event-img mb-3" alt="Image Événement" style="width:100%; border-radius:10px;">
                <p><strong>Description:</strong> <?= htmlspecialchars($event['description']) ?></p>
                <p><strong>Type:</strong> <?= htmlspecialchars($event['typeEvenement']) ?></p>
                <p><strong>Date:</strong> <?= htmlspecialchars($event['date']) ?></p>
                <p><strong>Heure Début:</strong> <?= htmlspecialchars($event['heureDebut']) ?></p>
                <p><strong>Heure Fin:</strong> <?= htmlspecialchars($event['heureFin']) ?></p>
                <p><strong>Lieu:</strong> <?= htmlspecialchars($event['lieu']) ?></p>
                <p><strong>Club Organisateur:</strong> <?= htmlspecialchars($event['clubOrganisateur']) ?></p>
                <p><strong>École Organisatrice:</strong> <?= htmlspecialchars($event['ecoleOrganisatrice']) ?></p>
                <p><strong>Statut:</strong> <?= htmlspecialchars($event['statut']) ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CSS pour la section -->
<style>
/* Scroll horizontal */
.scroll-container {
  display: flex;
  overflow-x: auto;
  gap: 20px;
  padding-bottom: 1rem;
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none; /* Firefox */
}

.scroll-container::-webkit-scrollbar {
  display: none; /* Chrome, Safari, Opera */
}

/* Carte événement */
.event-card {
  flex: 0 0 auto;
  width: 300px;
  scroll-snap-align: start;
  border-radius: 10px;
  overflow: hidden;
  background: white;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.event-card:hover {
  transform: scale(1.05);
}

.event-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.event-card-body {
  padding: 15px;
}

.event-card-body h5 {
  font-size: 1.1rem;
  margin-bottom: 0.5rem;
}

.event-card-body p {
  font-size: 0.9rem;
  color: #333;
  margin: 0.3rem 0;
}

.event-card-footer {
  display: flex;
  justify-content: space-between;
  padding: 10px 15px 15px;
  align-items: center;
}

.event-card-footer a,
.event-card-footer button {
  font-size: 0.85rem;
  padding: 0.4rem 0.7rem;
  border: 1px solid #0d6efd;
  color: #0d6efd;
  background: none;
  border-radius: 5px;
  text-decoration: none;
  transition: 0.3s;
}

.event-card-footer a:hover,
.event-card-footer button:hover {
  background-color: #0d6efd;
  color: white;
}
</style>






    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="row gy-4">

          <div class="features-image col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="100"><img src="public/assets/img/features-bg.jpg" alt=""></div>

          <div class="col-lg-6 order-lg-1">

            <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-archive flex-shrink-0"></i>
              <div>
                <h4>Est labore ad</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-basket flex-shrink-0"></i>
              <div>
                <h4>Harum esse qui</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-broadcast flex-shrink-0"></i>
              <div>
                <h4>Aut occaecati</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-camera-reels flex-shrink-0"></i>
              <div>
                <h4>Beatae veritatis</h4>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
              </div>
            </div><!-- End Features Item-->

          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

   


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

<!-- Portfolio Section Dynamique -->
<section id="portfolio" class="portfolio section">
  <style>
    .scroll-container {
      display: flex;
      overflow-x: auto;
      gap: 1rem;
      padding-bottom: 1rem;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
    }

    .scroll-container::-webkit-scrollbar {
      display: none;
    }

    .event-card {
      flex: 0 0 auto;
      width: 300px;
      scroll-snap-align: start;
      border-radius: 1rem;
      overflow: hidden;
      background: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .event-card:hover {
      transform: scale(1.02);
    }

    .event-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .event-card-body {
      padding: 1rem;
    }

    .event-card-body h5 {
      font-size: 1.1rem;
      margin-bottom: 0.5rem;
    }

    .event-card-body p {
      font-size: 0.9rem;
      color: #555;
    }

    .event-card-footer {
      padding: 0 1rem 1rem;
      display: flex;
      justify-content: space-between;
    }

    .event-card-footer a,
    .event-card-footer button {
      font-size: 0.85rem;
      padding: 0.4rem 0.7rem;
      border: 1px solid #0d6efd;
      color: #0d6efd;
      border-radius: 5px;
      text-decoration: none;
      background: none;
      transition: 0.3s;
    }

    .event-card-footer a:hover,
    .event-card-footer button:hover {
      background-color: #0d6efd;
      color: white;
    }
  </style>

  <div class="container section-title" data-aos="fade-up">
    <h2>Événements</h2>
    <p>Découvrez nos événements passés et à venir.</p>
  </div>

  <div class="container">
    <div class="scroll-container">
      <?php foreach ($evenements as $event): ?>
        <div class="event-card">
          <img src="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" alt="<?= htmlspecialchars($event['titre']) ?>">
          <div class="event-card-body">
            <h5><?= htmlspecialchars($event['titre']) ?></h5>
            <p><?= htmlspecialchars($event['description']) ?></p>
          </div>
          <div class="event-card-footer">
            <a href="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" data-glightbox>Preview</a>
            <a href="index.php?action=details&id=<?= $event['id'] ?>" class="">Détails</a>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="eventModal<?= $event['id'] ?>" tabindex="-1" aria-labelledby="eventModalLabel<?= $event['id'] ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel<?= $event['id'] ?>"><?= htmlspecialchars($event['titre']) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
              </div>
              <div class="modal-body">
                <img src="<?= 'public/uploads/images/' . $event['titre'] . '.jpeg' ?>" class="event-img mb-3" alt="Image Événement" style="width:100%; border-radius:10px;">
                <p><strong>Description:</strong> <?= htmlspecialchars($event['description']) ?></p>
                <p><strong>Type:</strong> <?= htmlspecialchars($event['typeEvenement']) ?></p>
                <p><strong>Date:</strong> <?= htmlspecialchars($event['date']) ?></p>
                <p><strong>Heure Début:</strong> <?= htmlspecialchars($event['heureDebut']) ?></p>
                <p><strong>Heure Fin:</strong> <?= htmlspecialchars($event['heureFin']) ?></p>
                <p><strong>Lieu:</strong> <?= htmlspecialchars($event['lieu']) ?></p>
                <p><strong>Club Organisateur:</strong> <?= htmlspecialchars($event['clubOrganisateur']) ?></p>
                <p><strong>École Organisatrice:</strong> <?= htmlspecialchars($event['ecoleOrganisatrice']) ?></p>
                <p><strong>Statut:</strong> <?= htmlspecialchars($event['statut']) ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

    

    

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2">
            <img src="public/assets/img/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Recent Posts Section -->
    <section id="Cells" class="Cells recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Cells</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>

              <div class="post-img">
                <img src="public/assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Politics</p>

              <h2 class="title">
                <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="public/assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Maria Doe</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <article>

              <div class="post-img">
                <img src="public/assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Sports</p>

              <h2 class="title">
                <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="public/assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Allisa Mayer</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 5, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>

              <div class="post-img">
                <img src="public/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Entertainment</p>

              <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="public/assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Mark Dower</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>

              <div class="post-img">
                <img src="public/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Entertainment</p>

              <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="public/assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Mark Dower</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>

              <div class="post-img">
                <img src="public/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Entertainment</p>

              <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="public/assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Mark Dower</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>

              <div class="post-img">
                <img src="public/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Entertainment</p>

              <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="public/assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Mark Dower</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

        </div><!-- End recent posts list -->

      </div>

    </section><!-- /Recent Posts Section -->

   <!-- Contact Section -->
<section id="contact" class="contact section light-background">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Contact</h2>
  <p>.....</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade" data-aos-delay="100">
  <div class="row gy-4">

    <div class="col-lg-4">
      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
        <i class="bi bi-geo-alt flex-shrink-0"></i>
        <div>
          <h3>Address</h3>
          <p>A108 Adam Street, New York, NY 535022</p>
        </div>
      </div>

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
        <i class="bi bi-telephone flex-shrink-0"></i>
        <div>
          <h3>Call Us</h3>
          <p>+1 5589 55488 55</p>
        </div>
      </div>

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
        <i class="bi bi-envelope flex-shrink-0"></i>
        <div>
          <h3>Email Us</h3>
          <p>info@example.com</p>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <form id="contact-form" action="index.php?action=addMessage" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="nom" class="form-control" placeholder="Your Name" required>
          </div>

          <div class="col-md-6">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name="objet" placeholder="Subject" required>
          </div>

          <div class="col-md-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
          </div>

          <div class="col-md-12 text-center">
            <div class="loading" style="display: none;">Loading...</div>
            <div class="error-message" style="display: none; color: red;"></div>
            <div class="sent-message" style="display: none; color: green;">Votre message a bien été envoyé.</div>

            <button type="submit">Send Message</button>
          </div>

        </div>
      </form>
    </div><!-- End Contact Form -->

  </div>
</div>
</section><!-- /Contact Section -->

<!-- JavaScript AJAX Submission -->
<script>
document.getElementById('contact-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);

  const loading = form.querySelector('.loading');
  const errorMessage = form.querySelector('.error-message');
  const sentMessage = form.querySelector('.sent-message');

  // Reset messages
  loading.style.display = 'block';
  errorMessage.style.display = 'none';
  sentMessage.style.display = 'none';

  fetch(form.action, {
  method: 'POST',
  body: new FormData(form)
})
.then(response => response.text())
.then(data => {
  if (data.includes('success-message')) {
    sentMessage.style.display = 'block';
    form.reset();
  } else {
    errorMessage.innerHTML = "Une erreur est survenue. Merci de vérifier les champs.";
    errorMessage.style.display = 'block';
  }
})
.catch((error) => {
  errorMessage.innerHTML = "Erreur lors de l'envoi du formulaire.";
  errorMessage.style.display = 'block';
});
});
</script>


  </main>

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
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
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
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>
  <script src="public/assets/vendor/aos/aos.js"></script>
  <script src="public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="public/assets/js/main.js"></script>

</body>

</html>