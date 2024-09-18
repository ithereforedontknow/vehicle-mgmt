<?php
require_once "db_connection.php";

if (isset($_POST['vehicle_id'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $sql = "SELECT *FROM vehicle inner join hauler on vehicle.hauler_id = hauler.hauler_id WHERE vehicle_id = '$vehicle_id'";
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
