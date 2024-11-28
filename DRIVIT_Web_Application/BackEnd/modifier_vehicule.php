<?php
// Inclure le fichier de configuration de la base de données et les fonctions nécessaires
require("Vehicles.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs modifiées du formulaire
    $vehicleId = $_POST['vehicleId'];
    $vehicle_name = $_POST['vehicle_name'] ?? '';
    $vehicle_type = $_POST['vehicle_type'] ?? '';
    $vehicle_marque = $_POST['vehicle_marque'] ?? '';
    $vehicle_modele = $_POST['vehicle_modele'] ?? '';
    $vehicle_annee = $_POST['vehicle_annee'] ?? '';
    $vehicle_matricule = $_POST['vehicle_matricule'] ?? '';
    $vehicle_puissance = $_POST['vehicle_puissance'] ?? '';
    $vehicle_disponible = $_POST['vehicle_disponible'] ?? '';

    // Valider les données du formulaire (vous pouvez ajouter vos propres validations ici)

    // Mettre à jour les informations du véhicule dans la base de données
    $success = updateVehicle($vehicleId, $vehicle_name, $vehicle_type, $vehicle_marque, $vehicle_modele, $vehicle_annee, $vehicle_matricule, $vehicle_puissance, $vehicle_disponible);

    if ($success) {
        // Rediriger vers la page principale après la modification
        header("Location: Vehicles.php");
        exit;
    } else {
        // Gérer l'erreur si la mise à jour a échoué
        echo "Erreur lors de la modification du véhicule.";
    }
} else {
    // Vérifier si l'ID du véhicule a été fourni en paramètre d'URL
    if (isset($_GET['vehicleId'])) {
        $vehicleId = $_GET['vehicleId'];

        // Récupérer les informations du véhicule à partir de la base de données
        $vehicle = getVehicleById($vehicleId);

        if ($vehicle) {
            // Afficher le formulaire de modification avec les informations du véhicule
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Modifier le véhicule</title>
            </head>
            <body>
                <h1>Modifier le véhicule</h1>
                <form method="post">
                    <input type="hidden" name="vehicleId" value="<?php echo $vehicle['ID_V']; ?>">
                    <label>Nom du véhicule:</label>
                    <input type="text" name="vehicle_name" value="<?php echo $vehicle['Nom']; ?>" required>
                    <br><br>
                    <label>Type du véhicule:</label>
                    <input type="text" name="vehicle_type" value="<?php echo $vehicle['Type']; ?>" required>
                    <br><br>
                    <label>Marque du véhicule:</label>
                    <input type="text" name="vehicle_marque" value="<?php echo $vehicle['Marque']; ?>" required>
                    <br><br>
                    <label>Modèle du véhicule:</label>
                    <input type="text" name="vehicle_modele" value="<?php echo $vehicle['Modele']; ?>" required>
                    <br><br>
                    <label>Année du véhicule:</label>
                    <input type="text" name="vehicle_annee" value="<?php echo $vehicle['Annee']; ?>" required>
                    <br><br>
                    <label>Matricule du véhicule:</label>
                    <input type="text" name="vehicle_matricule" value="<?php echo $vehicle['Matricule']; ?>" required>
                    <br><br>
                    <label>Puissance du véhicule:</label>
                    <input type="text" name="vehicle_puissance" value="<?php echo $vehicle['Puissance']; ?>" required>
                    <br><br>
                    <label>Disponible:</label>
                    <input type="checkbox" name="vehicle_disponible" <?php echo $vehicle['Disponible'] == 1 ? 'checked' : ''; ?>>
                    <br><br>
                    <input type="submit" value="Modifier">
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "Véhicule non trouvé.";
        }
    } else {
        echo "ID du véhicule non spécifié.";
    }
}