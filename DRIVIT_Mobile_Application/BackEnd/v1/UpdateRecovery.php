<?php

require_once '../includes/DbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        isset($_POST['PassWordd'])
    ) {

        $db = new DbOperations();

        $result = $db->Update_Recovery(
            $_POST['ID_C'],
            $_POST['PassWordd'],
            $_POST['Username'],
            $_POST['Mail']
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
