<?php

require_once '../includes/DbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        isset($_POST['Nom']) and isset($_POST['Prenom']) and isset($_POST['CIN']) and isset($_POST['Mail'])
    ) {

        $db = new DbOperations();

        $result = $db->Update(
            $_POST['Nom'],
            $_POST['Prenom'],
            $_POST['CIN'],
            $_POST['Mail'],
            $_POST['ID_C'],
            $_POST['ID_P'],
            $_POST['Username']
        );
        if ($result == 1) {
            $response['error'] = false;
            $response['message'] = "User Info successefully Updated";
        } elseif ($result == 2) {
            $response['error'] = true;
            $response['message'] = "Some error occurred please try again";
        } elseif ($result == 0) {
            $response['error'] = true;
            $response['message'] = "It seems you are Not registered";
        }
    } else {
        $response['error'] = true;
        $response['message'] = "Required fields are missing";
    }
} else {
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);
