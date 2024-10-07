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
    $arrival_time = $_POST['arrival_time'];
    $arrival_date = date('Y-m-d', strtotime($arrival_time));
    $status = $_POST['status'];

    // Adjust SQL query if 'origin' column doesn't exist in your table
    $sql = "INSERT INTO transaction (to_reference, hauler_id, vehicle_id, driver_id, helper_id, project_id, origin_id, no_of_bales, kilos, status) 
            VALUES ('$to_reference', '$hauler_id', '$vehicle_id', '$driver_id', '$helper_id', '$project_id', '$origin', '$no_of_bales', '$kilos', '$status')";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $sql = "INSERT INTO arrival (transaction_id, arrival_date, arrival_time) 
                VALUES (LAST_INSERT_ID(), '$arrival_date', '$arrival_time')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo "Success";
        } else {
            echo "Error adding arrival: " . $stmt->error;
        }
    } else {
        echo "Error adding to transaction: " . $stmt->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
