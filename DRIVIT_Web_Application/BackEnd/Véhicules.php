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


// Fonction pour mettre à jour les informations d'un véhicule dans la base de données
// function updateVehicle($vehicleId)
// {
    
//     // Connexion à la base de données
//     $user = "root";
//     $pass = "";
//     $db = "location_voiture";

//     // Création de la connexion
//     $conn = new mysqli('localhost', $user, $pass, $db);

//     // Vérification de la connexion
//     if ($conn->connect_error) {
//         die("Erreur de connexion à la base de données: " . $conn->connect_error);
//     }

// if(isset($_POST["modifier"])) {
//     // Échapper les caractères spéciaux pour éviter les injections SQL
//     $vehicleId = $conn->real_escape_string($vehicleId);

//     // Requête de modification du véhicule
//     $query = "SELECT Nom FROM voitures WHERE ID_V = '$vehicleId'"; // Adjust the query according to your database structure
//     $result = mysqli_query($conn, $query);
//     $row = mysqli_fetch_assoc($result);
//     $defaultValue = $row['Nom'];

//     if ($conn->query($query) === TRUE) {
//         $newValue = $_POST["vehicle_name"];
//         <script>
//             var inputnamevehicle=document.queryselector("#v_name");
//             inputnamevehicle.value = $defaultValue;
//         </script>
//     } else {
//         echo "Erreur lors de la modification du véhicule dans la base de données: " . $conn->error;
//     }

//     // Fermer la connexion
//     $conn->close();
// }
// }


function Setinput($vehicleId) {
    // Code pour se connecter à la base de données et effectuer la mise à jour
    // Remplacez les valeurs de connexion à la base de données par les vôtres
    $user = "root";
    $pass = "";
    $db = "location_voiture";

    // Créer une connexion
    $conn = new mysqli('localhost', $user, $pass, $db);
    
    // Vérifier si la connexion a réussi
    if ($conn->connect_error ) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
if (isset($_POST["modifier"])){
    // Préparer la requête SQL pour la mise à jour
    $sql= "SELECT Nom, Type, Marque, Modele, Annee, Matricule, Puissance, Disponible FROM voitures WHERE ID_V = '$vehicleId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $vehicle_name = $row['Nom'];
    $vehicle_type = $row['Type'];
    $vehicle_marque = $row['Marque'];
    $vehicle_modele = $row['Modele'];
    $vehicle_annee = $row['Annee'];
    $vehicle_matricule = $row['Matricule'];
    $vehicle_puissance = $row['Puissance'];
    $vehicle_disponible = $row['Disponible'];

    $array1[0] = $vehicle_name;
    $array1[1] = $vehicle_type;
    $array1[2] = $vehicle_marque;
    $array1[3] = $vehicle_modele;
    $array1[4] = $vehicle_annee;
    $array1[5] = $vehicle_matricule;
    $array1[6] = $vehicle_puissance;
    $array1[7] = $vehicle_disponible;

    //$sql = "UPDATE `voitures` SET `Nom`='[$array1[0]]',`Type`='[$array1[1]]',`Marque`='[$array1[2]]',`Modele`='[$array1[3]]',`Annee`='[$array1[4]]',`Matricule`='[$array1[5]]',`Puissance`='[$array1[6]]',`Disponible`='[$array1[7]]' WHERE `ID_V`='$vehicleId'";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        // La mise à jour a réussi
        $success = true;
    } else {
        // La mise à jour a échoué
        $success = false;
        echo "Erreur lors de la mise à jour du véhicule : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();

    // Retourner le statut de la mise à jour (true si réussie, false sinon)
    return $array1;
}
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
            case 'update_vehicle':
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
                    updateVehicle($vehicleName, $vehicleType, $vehicleMarque, $vehicleModele, $vehicleAnnee, $vehicleMatricule, $vehiclePuissance, $vehicleDisponible);
                    refreshVehicleList(); // Actualiser la liste des véhicules après l'ajout
                }
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>DRIVIT - Gestion des véhicules</title>
    <!-- Inclure les liens CSS et les styles personnalisés -->
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<style>
    .hidden {
        display: none;
    }
</style>

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
        <input type="text" name="vehicle_annee" required>
        <br><br>
        <label>Matricule du véhicule:</label>
        <input type="text" name="vehicle_matricule" required>
        <br><br>
        <label>Puissance du véhicule:</label>
        <input type="text" name="vehicle_puissance" required>
        <br><br>
        <label>Disponibilité du véhicule:</label>
        <input type="text" name="vehicle_disponible" required>
        <br><br>
        <?php if (isset($errorMessage)) : ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <button type="submit">Ajouter</button>
    </form>

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
            <td>
            <form method="post" action="modifier_vehicule.php">
                <input type="hidden" name="vehicleId" value="<?php echo $vehicle['ID_V']; ?>">
                <button type="submit" name="modifier">Modifier</button>
            </form>
        </td>
        </td>
    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun véhicule inséré dans la base de données.</p>
    <?php endif; ?>

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