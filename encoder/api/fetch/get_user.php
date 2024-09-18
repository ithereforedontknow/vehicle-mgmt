<?php
require_once "db_connection.php";

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
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
