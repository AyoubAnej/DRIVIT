<?php
// Connexion à la base de données
//$bdd = new PDO('mysql:host=localhost;dbname=location_voiture', 'nom_utilisateur', 'mot_de_passe');
$user = 'root';
$pass = '';
$db = 'location_voiture';
$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
//echo ("connected");
// Récupération des statistiques
//$requeteVoituresDisponibles = $bdd->query("SELECT COUNT(*) AS total_voitures_disponibles FROM voitures WHERE disponible = oui");
//$resultatVoituresDisponibles = $requeteVoituresDisponibles->fetch();
//$totalVoituresDisponibles = $resultatVoituresDisponibles['total_voitures_disponibles'];

//$requeteReservationsEnCours = $bdd->query("SELECT COUNT(*) AS total_reservations_en_cours FROM reservations WHERE statut = 'en_cours'");
//$resultatReservationsEnCours = $requeteReservationsEnCours->fetch();
//$totalReservationsEnCours = $resultatReservationsEnCours['total_reservations_en_cours'];

// Affichage du dashboard avec interface graphique
?>
<!DOCTYPE html>
<html>
<head>
    <title>DRIVIT - Tableau de bord administrateur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <style>
           body {
     min-height: 100%;
     position: relative;
     padding-bottom: 3rem;
     margin: 0;
     padding: 0;
     text-align: center;
     width: 100%;
     background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
}

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            
        }

        .navbar-brand img {
            ackground: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
            height: 200px; /* Adjust the height as needed */
            margin-right: 20px;
            display:floatval;
            background-color:transparent;
            
            /* Add any additional styling for the logo image */
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            min-height: 50vh;
        }

        .sidebar-heading {
            font-size: 4rem;
            padding: 0.5rem 1rem;
            background-color: #343a40;
            color: #fff;
            font-weight: bold;   
        }



        .sidebar-menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar-menu li {
  margin-bottom: 10px;
}

.sidebar-menu li a {
  display: block;
  padding: 12px 20px;
  color: #fff;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.sidebar-menu li a:hover {
    border: 3px solid #2ecc71;
  background: transparent;
  color: #2ecc71;
  border-radius: 5px;
  
}



        .content-wrapper {
            
            margin-top:-70px;
            background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
            color : black;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            
        }

        .page-title {
            background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
            font-weight: bold;
            background-color:#ffff;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: white;

        }
        .bg-dark{
            background-color: #343a40;
            color: #fff;
            
        }
        .container-fluid{
            background-color: #ffff;
            background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
     
        }

     .page-description {
    font-size: 1.2rem; 
    color:white;
}
.nav-item {
  margin-bottom: 10px;
}

.nav-link {

  display: flex;
  align-items: center;
  padding: 10px 20px;
  color: #333;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.nav-link:hover {
  background-color: #f2f2f2;
  border-radius: 5px;
}

.nav-link i {
  margin-right: 10px;
}

.nav-link span {
  font-size: 1.5rem;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo_image.png" alt="Logo"> <!-- Replace "path/to/your/logo.png" with the actual path to your logo image --> <br>
               <!-- DRIVIT - Admin-->
            </a>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="content-wrapper">
                    <h1 class="page-title">Bienvenue sur le tableau de bord DRIVIT - Admin</h1>
                    <p class="page-description">Ici, vous pouvez gérer les véhicules et visualiser les réservations et les utilisateurs de l'application.</p>
                </div>
            </main>
          <!--  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                     <!--<li class="nav-item">-->
                       <!-- <a class="nav-link" href="#"><i class="fas fa-user"></i> Admin</a>-->
                    </li>
       
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 sidebar">
            
                <div class="sidebar-heading"><i class="fas fa-bars"></i>Menu</div>
                <ul class="sidebar-menu nav flex-column">
                    <!-- <li class="nav-item">-->
                       <!-- <a class="nav-link active" href="#"><i class="fas fa-home"></i> Accueil</a>-->
                       <li class="nav-item">
  <a class="nav-link" href="reservation.php">
    <i class="fas fa-calendar"></i> 
    <span>Réservations</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="utilisateur.php">
    <i class="fas fa-users"></i> 
    <span>Utilisateurs</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="vehicles.php">
    <i class="fas fa-car"></i> 
    <span>Véhicules</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="SoftLand/index.php">
    <i class="fas fa-sign-out-alt"></i> 
    <span>Déconnexion</span>
  </a>
</li>

                  
                </ul>
            </nav>

            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/js/all.min.js"></script>
</body>
</html>
