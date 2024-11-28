<?php
session_start();

// Variables de session pour stocker les véhicules et les options
if (!isset($_SESSION['vehicles'])) {
    $_SESSION['vehicles'] = [];
}

if (!isset($_SESSION['options'])) {
    $_SESSION['options'] = [];
}

// Fonction pour ajouter un véhicule
function addVehicle($vehicle)
{
    $_SESSION['vehicles'][] = $vehicle;
}

// Fonction pour supprimer un véhicule
function removeVehicle($index)
{
    if (isset($_SESSION['vehicles'][$index])) {
        unset($_SESSION['vehicles'][$index]);
    }
}

// Fonction pour ajouter une option pour un véhicule
function addOption($vehicleIndex, $option)
{
    if (isset($_SESSION['vehicles'][$vehicleIndex])) {
        $_SESSION['vehicles'][$vehicleIndex]['options'][] = $option;
    }
}

// Fonction pour supprimer une option d'un véhicule
function removeOption($vehicleIndex, $optionIndex)
{
    if (isset($_SESSION['vehicles'][$vehicleIndex]['options'][$optionIndex])) {
        unset($_SESSION['vehicles'][$vehicleIndex]['options'][$optionIndex]);
    }
}

// Fonction pour modifier la description d'un véhicule
function updateDescription($vehicleIndex, $description)
{
    if (isset($_SESSION['vehicles'][$vehicleIndex])) {
        $_SESSION['vehicles'][$vehicleIndex]['description'] = $description;
    }
}

// Fonction pour insérer un véhicule dans la base de données
function insertVehicleToDatabase($vehicleName, $vehicleType, $vehicleMarque, $vehicleModele, $vehicleAnnee, $vehicleMatricule, $vehiclePuissance, $vehicleDisponible)
{
    // Connexion à la base de données
    $user = "root";
    $pass = "";
    $db = "location_voiture";

    // Création de la connexion
    $conn = new mysqli('localhost', $user, $pass, $db);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données: " . $conn->connect_error);
    }

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $vehicleName = $conn->real_escape_string($vehicleName);
    $vehicleType = $conn->real_escape_string($vehicleType);
    $vehicleMarque = $conn->real_escape_string($vehicleMarque);
    $vehicleModele = $conn->real_escape_string($vehicleModele);
    $vehicleAnnee = $conn->real_escape_string($vehicleAnnee);
    $vehicleMatricule = $conn->real_escape_string($vehicleMatricule);
    $vehiclePuissance = $conn->real_escape_string($vehiclePuissance);
    $vehicleDisponible = $conn->real_escape_string($vehicleDisponible);

    // Requête d'insertion
    $sql = "INSERT INTO voitures (Nom, Type, Marque, Modele, Annee, Matricule, Puissance, Disponible) VALUES ('$vehicleName', '$vehicleType', '$vehicleMarque', '$vehicleModele', '$vehicleAnnee', '$vehicleMatricule', '$vehiclePuissance', '$vehicleDisponible')";

    if ($conn->query($sql) === TRUE) {
        echo "Véhicule inséré avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion du véhicule dans la base de données: " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}

// Fonction pour récupérer les véhicules depuis la base de données
function getVehiclesFromDatabase()
{
    // Connexion à la base de données
    $user = "root";
    $pass = "";
    $db = "location_voiture";

    // Création de la connexion
    $conn = new mysqli('localhost', $user, $pass, $db);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données: " . $conn->connect_error);
    }

    // Requête de récupération des véhicules
    $sql = "SELECT * FROM voitures";
    $result = $conn->query($sql);

    $vehicles = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $vehicles[] = $row;
        }
    }

    // Fermer la connexion
    $conn->close();

    return $vehicles;
    
}

// Fonction pour supprimer un véhicule de la base de données
function deleteVehicleFromDatabase($vehicleId)
{
    // Connexion à la base de données
    $user = "root";
    $pass = "";
    $db = "location_voiture";

    // Création de la connexion
    $conn = new mysqli('localhost', $user, $pass, $db);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données: " . $conn->connect_error);
    }

if(isset($_POST["supprimer"])) {
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $vehicleId = $conn->real_escape_string($vehicleId);

    // Requête de suppression du véhicule
    $sql = "DELETE FROM voitures WHERE ID_V = '$vehicleId'";

    if ($conn->query($sql) === TRUE) {
        echo "Véhicule supprimé avec succès de la base de données.";
    } else {
        echo "Erreur lors de la suppression du véhicule de la base de données: " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
}

// Récupérer les véhicules depuis la base de données
$vehicles = getVehiclesFromDatabase();

// Fonction pour rafraîchir la liste des véhicules depuis la base de données
function refreshVehicleList()
{
    $_SESSION['vehicles'] = getVehiclesFromDatabase();
}





function updateVehicle($vehicleId, $vehicleName, $vehicleType, $vehicleMarque, $vehicleModele, $vehicleAnnee, $vehicleMatricule, $vehiclePuissance, $vehicleDisponible) {
    // Code pour se connecter à la base de données et effectuer la mise à jour
    // Remplacez les valeurs de connexion à la base de données par les vôtres
    $user = "root";
    $pass = "";
    $db = "location_voiture";

    // Créer une connexion
    $conn = new mysqli('localhost', $user, $pass, $db);
    $query= "SELECT Nom FROM voitures WHERE ID_V = '$vehicleId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $vehicle_name = $row['Nom'];



    // Fermer la connexion à la base de données
    $conn->close();

    // Retourner le statut de la mise à jour (true si réussie, false sinon)
    return $success;
// }
}

// Traiter les soumissions de formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'add_vehicle':
                $vehicleName = $_POST['vehicle_name'];
                $vehicleType = $_POST['vehicle_type'];
                $vehicleMarque = $_POST['vehicle_marque'];
                $vehicleModele = $_POST['vehicle_modele'];
                $vehicleAnnee = $_POST['vehicle_annee'];
                $vehicleMatricule = $_POST['vehicle_matricule'];
                $vehiclePuissance = $_POST['vehicle_puissance'];
                $vehicleDisponible = $_POST['vehicle_disponible'];

                if (empty($vehicleName)) {
                    $errorMessage = "Veuillez entrer le nom de la voiture.";
                } else {
                    addVehicle($vehicleName);
                    insertVehicleToDatabase($vehicleName, $vehicleType, $vehicleMarque, $vehicleModele, $vehicleAnnee, $vehicleMatricule, $vehiclePuissance, $vehicleDisponible);
                    refreshVehicleList(); // Actualiser la liste des véhicules après l'ajout
                }
                break;
            case 'remove_vehicle':
                $vehicleIndex = $_POST['vehicle_index'];
                removeVehicle($vehicleIndex);
                break;
            case 'add_option':
                $vehicleIndex = $_POST['vehicle_index'];
                $option = $_POST['option_name'];
                addOption($vehicleIndex, $option);
                break;
            case 'remove_option':
                $vehicleIndex = $_POST['vehicle_index'];
                $optionIndex = $_POST['option_index'];
                removeOption($vehicleIndex, $optionIndex);
                break;
            case 'update_description':
                $vehicleIndex = $_POST['vehicle_index'];
                $description = $_POST['description'];
                updateDescription($vehicleIndex, $description);
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <li class="back">
  <a class="back-link" href="dashboard.php">
  <button class="login-button" type="submit" > </i>BACK </button>
  </a>
    <title>DRIVIT - Gestion des véhicules</title>
    <!-- Inclure les liens CSS et les styles personnalisés -->
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
        .error {
            color: red;
        }
        .hidden {
        display: none;
    }
    /* Main container */

    .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
          }



/* Form styles */
form {
  margin-bottom: 20px;
}
input[type="number"],
input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Button styles */
button {
    display: block;

line-height: 50px;
font-weight: bold;
text-decoration: none;
background: #333;
text-align: center;
color: #fff;
text-transform: uppercase;
letter-spacing: 1px;
border: 3px solid #333;
transition: all .35s;
}

button:hover {
    border: 3px solid #2ecc71;
  background: transparent;
  color: #2ecc71;

}
a:hover + .icon{
  border: 3px solid #2ecc71;
  
}
.icon svg{
  width: 30px;
  position: absolute;
  top: calc(50% - 15px);
  left: calc(50% - 15px);
  transform: rotate(-45deg);
  fill: #2ecc71;
  transition: all .35s;
}

/* Table styles */
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #4CAF50;
  color: white;
}

/* Success message */
.success {
  color: green;
  margin-bottom: 10px;
}

/* Error message */
.error {
  color: red;
  margin-bottom: 10px;
}
    </style>
</head>
<body>

<div class="container">
    <h1>Gestion des véhicules</h1>

    <h2>Ajouter un véhicule</h2>
    <form method="post">
        <input type="hidden" name="action" value="add_vehicle">
        <label>Nom du véhicule:</label>
        <input type="text" name="vehicle_name" id="v_name" required>
        <br><br>
        <label>Type du véhicule:</label>
        <input type="text" name="vehicle_type" required>
        <br><br>
        <label>Marque du véhicule:</label>
        <input type="text" name="vehicle_marque" required>
        <br><br>
        <label>Modèle du véhicule:</label>
        <input type="text" name="vehicle_modele" required>
        <br><br>
        <label>Année du véhicule:</label>
        <input type="number" name="vehicle_annee" required>
        <br><br>
        <label>Matricule du véhicule:</label>
        <input type="text" name="vehicle_matricule" required>
        <br><br>
        <label>Puissance du véhicule:</label>
        <input type="number" name="vehicle_puissance" required>
        <br><br>
        <label>Disponibilité du véhicule:</label>
        <input type="text" name="vehicle_disponible" required>
        <br><br>
        <?php if (isset($errorMessage)) : ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <button type="submit">Ajouter</button>
        </div>
    </form>
    <div class="container">
    <h3>Véhicules insérés</h3>
<?php if (!empty($_SESSION['vehicles'])) : ?>
    <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Année</th>
                    <th>Matricule</th>
                    <th>Puissance</th>
                    <th>Disponible</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['vehicles'] as $index => $vehicle) : ?>
                <tr class="<?php echo isset($_POST['vehicleId']) && $_POST['vehicleId'] == $vehicle['ID_V'] ? 'hidden' : ''; ?>">
        <td><?php echo $vehicle['Nom']; ?></td>
        <td><?php echo $vehicle['Type']; ?></td>
        <td><?php echo $vehicle['Marque']; ?></td>
        <td><?php echo $vehicle['Modele']; ?></td>
        <td><?php echo $vehicle['Annee']; ?></td>
        <td><?php echo $vehicle['Matricule']; ?></td>
        <td><?php echo $vehicle['Puissance']; ?></td>
        <td><?php echo $vehicle['Disponible']; ?></td>
        <td>
            <form method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                <input type="hidden" name="vehicleId" value="<?php echo $vehicle['ID_V']; ?>">
                <button type="submit" name="supprimer">Supprimer</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun véhicule inséré dans la base de données.</p>
    <?php endif; ?>
    </div>
    <?php
    
    

    // Traitement de la suppression du véhicule
    if (isset($_POST['vehicleId'])) {
    $vehicleId = $_POST['vehicleId'];
    deleteVehicleFromDatabase($vehicleId);
}

    // Mettre à jour la liste des véhicules depuis la base de données
    $_SESSION['vehicles'] = getVehiclesFromDatabase();

    ?>

</body>
</html>