<?php

require_once '../includes/DbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        isset($_POST['Username']) and isset($_POST['PassWordd'])
    ) {
        $db = new DbOperations();

        if ($db->UserLogin($_POST['Username'], $_POST['PassWordd'])) {
            $user = $db->GetinfoUser($_POST['Username']);
            $response['error'] = false;
            $response['ID_C'] = $user['ID_C'];
            $response['ID_P'] = $user['ID_P'];
            $response['Prenom'] = $user['Prenom'];
            $response['Nom'] = $user['Nom'];
            $response['Username'] = $user['Username'];
            $response['Mail'] = $user['Mail'];
            $response['CIN'] = $user['CIN'];
        } else {
            $response['error'] = true;
            $response['message'] = "Invalid Username or Password";
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
