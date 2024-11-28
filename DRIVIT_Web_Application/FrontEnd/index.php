<?php
//session_start();
//$con = mysqli_connect("localhost", "root", "", "isga_web") or die('erreur cnx');

if (isset($_POST['login'])) {
  


  //$infouser = $user->fetch_assoc();
  //$_SESSION['infouser'] = $infouser;
  header('location:http://localhost/drivit/login.php#');
  if ($infouser['id']) {
    
  } else {
    header('location:index.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DRIVIT-Page-1</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SoftLand - v4.10.0
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">DRIVIT</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="index.php">Accueil</a></li>
          <li><a href="features.html">Caractéristiques</a></li>
          <li><a href="blog.html">Blog</a></li>   
          <li><a href="../login.php" >admin</a></li>          
          <li><a href="contact.html">Contactez-Nous</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-8 text-center text-lg-start">
              <h1 data-aos="fade-right">Réservez Votre Voiture En Quelques Clics Grâce à Notre Application DRIVIT</h1>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Application Disponible Sur Le Play Store.</p>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="https://play.google.com/store/games?hl=fr&gl=US&pli=1" class="btn btn-outline-white">Télécharger</a></p>
            </div>
            <div class="col-lg-4 iphone-wrap">
              
              <img src="assets/img/imgp1.png" alt="Image" class="phone-1" data-aos="fade-right">
              <img src="assets/img/imgP2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Home Section ======= -->
    <section class="section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-5" data-aos="fade-up">
            <h2 class="section-heading">Économisez Votre Temps Avec DRIVIT</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <i class="bi bi-people"></i>
              </div>
              <h3 class="mb-3">Réservez en un rien de temps avec DRIVIT</h3>
              <p>Réservez votre voiture en un rien de temps avec DRIVIT et profitez de votre voyage sans stress.</p>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <i class="bi bi-brightness-high"></i>
              </div>
              <h3 class="mb-3">La location de voitures rapide et pratique avec DRIVIT</h3>
              <p>Économisez du temps et de l'argent en louant votre voiture avec DRIVIT, la solution de location de voitures rapide et pratique.</p>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <i class="bi bi-bar-chart"></i>
              </div>
              <h3 class="mb-3">Maximisez votre temps de voyage avec DRIVIT</h3>
              <p>DRIVIT vous aide à maximiser votre temps de voyage en vous offrant des options de location de voitures flexibles et des services personnalisés adaptés à vos besoins.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 me-auto">
            <h2 class="mb-4">Téléchargez DRIVIT aujourd'hui !</h2>
            <p class="mb-4">Téléchargez dès aujourd'hui notre application de location de voitures et rejoignez des milliers d'utilisateurs satisfaits qui ont bénéficié de nos services de location de voitures haut de gamme. Avec DRIVIT, vous avez accès à une large sélection de voitures de qualité supérieure, une assistance clientèle 24h/24 et 7j/7, et des tarifs compétitifs pour une expérience de location de voitures inoubliable.</p>
            <p><a href="#" class="btn btn-primary">Télécharger Maintenant</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-left">
            <img src="assets/img/undraw_svg_2.svg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 ms-auto order-2">
            <h2 class="mb-4">Voyagez dès Maintenant Avec DRIVIT !</h2>
            <p class="mb-4">Réalisez votre rêve de voyage en louant une voiture en un rien de temps grâce à notre application facile à utiliser. Profitez d'une expérience de location de voitures de qualité supérieure avec des tarifs compétitifs, une assistance clientèle disponible 24h/24 et 7j/7, et une large sélection de voitures de qualité supérieure. Téléchargez notre application dès maintenant et préparez-vous à vivre une aventure inoubliable.</p>
            <p><a href="#" class="btn btn-primary">Télécharger Maintenant</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="assets/img/undraw_svg_3.svg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Testimonials Section ======= -->
    <section class="section border-top border-bottom">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-4">
            <h2 class="section-heading">Avis de nos utilisateurs</h2>
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div class="col-md-7">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="review text-center">
                    <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p>
                    <h3>Excellente Appli !</h3>
                    <blockquote>
                      <p>Je suis extrêmement satisfait de DRIVIT ! L'application est facile à utiliser et la sélection de voitures de qualité supérieure est incroyable. Les tarifs sont compétitifs et le service client est disponible 24h/24 et 7j/7. Je recommande vivement DRIVIT à tous ceux qui cherchent à louer une voiture de qualité pour leur voyage.</p>
                    </blockquote>

                    <p class="review-user">
                      <img src="assets/img/person_1.jpg" alt="Image" class="img-fluid rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Enas Yaktine</span>, &mdash; Utilisateur de l'application
                      </span>
                    </p>

                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="review text-center">
                    <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                    </p>
                    <h3>Cette Application Est Facile à Utiliser !</h3>
                    <blockquote>
                      <p>DRIVIT est la meilleure application de location de voitures que j'ai utilisée jusqu'à présent. J'ai loué une voiture en un rien de temps et j'ai été impressionné par la qualité de service. Les tarifs sont compétitifs et le processus de réservation est facile et rapide. Je recommande DRIVIT à tous ceux qui cherchent à louer une voiture pour leur voyage</p>
                    </blockquote>

                    <p class="review-user">
                      <img src="assets/img/person_2.jpg" alt="Image" class="img-fluid rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Wasim Al-Fassi</span>, &mdash; Utilisateur de l'application
                      </span>
                    </p>

                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="review text-center">
                    <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p>
                    <h3>Fonctionnalité Géniale!</h3>
                    <blockquote>
                      <p>Je suis un utilisateur régulier de DRIVIT et je suis toujours satisfait de mes expériences de location de voitures. L'application est facile à utiliser et j'ai toujours eu accès à une large sélection de voitures de qualité supérieure. Le service client est également excellent et est disponible 24h/24 et 7j/7 pour répondre à toutes mes questions. Je recommande vivement DRIVIT à tous ceux qui cherchent à louer une voiture pour leur voyage.</p>
                    </blockquote>

                    <p class="review-user">
                      <img src="assets/img/person_3.jpg" alt="Image" class="img-fluid rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Aalia Serhane</span>, &mdash; Utilisateur de l'application
                      </span>
                    </p>

                  </div>
                </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= CTA Section ======= -->
    <section class="section cta-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
            <h2>Vous pouvez télécharger notre application sur le Google Play Store dès maintenant.</h2>
          </div>
          <div class="col-md-5 text-center text-md-end">
            <p>
              <a href="https://play.google.com/store/games?hl=fr&gl=US&pli=1" class="btn d-inline-flex align-items-center"><i class="bx bxl-play-store"></i><span>Google play<span></a></p>
          </div>
        </div>
      </div>
    </section><!-- End CTA Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <h3>À propos du DRIVIT</h3>
          <p>DRIVIT est une application de location de voitures de qualité supérieure qui vous permet de louer une voiture rapidement et facilement. Nous offrons des tarifs compétitifs et un service client disponible 24h/24 et 7j/7 pour garantir votre satisfaction. Nous sommes déterminés à offrir une expérience de conduite confortable et sûre avec des voitures bien entretenues et propres. Téléchargez notre application dès aujourd'hui pour une expérience de location de voitures exceptionnelle avec DRIVIT.</p>
          <p class="social">
            <a href="#"><span class="bi bi-twitter"></span></a>
            <a href="#"><span class="bi bi-facebook"></span></a>
            <a href="#"><span class="bi bi-instagram"></span></a>
            <a href="#"><span class="bi bi-linkedin"></span></a>
          </p>
        </div>
        <div class="col-md-7 ms-auto">
          <div class="row site-section pt-0">
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>La Navigation</h3>
              <ul class="list-unstyled">
                <li><a href="#">Caractéristiques</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Prestations de service</h3>
              <ul class="list-unstyled">
                <li><a href="#">Équipe</a></li>
                <li><a href="#">Collaboration</a></li>
                <!-- <li><a href="#">Todos</a></li>
                <li><a href="#">Events</a></li> -->
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Téléchargements</h3>
              <ul class="list-unstyled">
                <li><a href="#">Obtenir du Play Store</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <p class="copyright">&copy; Copyright DRIVIT. All Rights Reserved</p>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=SoftLand
          -->
            Designed by <a href="https://www.isga.ma/">3ISI.ma</a>
          </div>
        </div>
      </div>

    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>