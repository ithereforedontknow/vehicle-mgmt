<?php
require_once "db_connection.php";

if (isset($_POST['helper_id'])) {
    $helper_id = $_POST['helper_id'];
    $sql = "SELECT * FROM helper WHERE helper_id = '$helper_id'";
    $result = $conn->query($sql);
    $response = array();
    foreach ($conn->query($sql) as $row) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200; //200 means ok
    $response['message'] = "Invalid or data not found";
}
