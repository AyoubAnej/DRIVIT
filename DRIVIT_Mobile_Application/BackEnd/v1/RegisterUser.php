<?php

require_once '../includes/DbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        isset($_POST['Nom']) and isset($_POST['Prenom']) and isset($_POST['CIN'])
        and isset($_POST['Username']) and isset($_POST['PassWordd']) and isset($_POST['Mail'])
    ) {

        $db = new DbOperations();

        $result = $db->CreateCompte(
            $_POST['Nom'],
            $_POST['Prenom'],
            $_POST['CIN'],
            $_POST['Username'],
            $_POST['PassWordd'],
            $_POST['Mail']
        );
        if ($result == 1) {
            $response['error'] = false;
            $response['message'] = "User registered successefully";
        } elseif ($result == 2) {
            $response['error'] = true;
            $response['message'] = "Some error occurred please try again";
        } elseif ($result == 0) {
            $response['error'] = true;
            $response['message'] = "It seems you are already registered";
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
