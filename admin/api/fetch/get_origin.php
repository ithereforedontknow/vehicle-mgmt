<?php
require_once "db_connection.php";

if (isset($_POST['origin_id'])) {
    $origin_id = $_POST['origin_id'];
    $sql = "SELECT * FROM origin WHERE origin_id = '$origin_id'";
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
