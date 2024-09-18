<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle_id = $_POST['vehicle_id'];
    $hauler_id = $_POST['hauler_id'];
    $plate_number = $_POST['plate_number'];
    $truck_type = $_POST['truck_type'];


    // Update the status in the database
    $sql = "UPDATE `vehicle` SET `hauler_id` = '$hauler_id', `plate_number` = '$plate_number', `truck_type` = '$truck_type' WHERE `vehicle_id` = '$vehicle_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Hauler updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
