<?php
require 'db_connection.php';

if (isset($_POST['to_reference'])) {

    $to_reference = $_POST['to_reference'];
    $hauler_id = $_POST['hauler_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $driver_id = $_POST['driver_id'];
    $helper_id = $_POST['helper_id'];
    $project_id = $_POST['project_id'];
    $no_of_bales = $_POST['no_of_bales'];
    $kilos = $_POST['kilos'];
    $origin = $_POST['origin'];
    $arrival_date = $_POST['arrival_date'];
    $arrival_time = $_POST['arrival_time'];
    $status = $_POST['status'];

    $sql = "INSERT INTO transaction (to_reference, hauler_id, vehicle_id, driver_id, helper_id, project_id, no_of_bales, kilos, origin, status) VALUES ('$to_reference','$hauler_id','$vehicle_id','$driver_id','$helper_id','$project_id','$no_of_bales','$kilos','$origin','$status')";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $sql = "INSERT INTO arrival (transaction_id, arrival_date, arrival_time) VALUES (LAST_INSERT_ID(), '$arrival_date', '$arrival_time')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo "Success";
        } else {
            echo "Error adding arrival: ";
        }
    } else {
        echo "Error adding to arrived: ";
    }

    $conn->close();
} else {
    echo "Invalid request";
}
