<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hauler_id = $_POST['hauler_id'];
    $hauler_name = $_POST['hauler_name'];
    $hauler_address = $_POST['hauler_address'];

    // Update the status in the database
    $sql = "UPDATE hauler 
        SET hauler_name = '$hauler_name', hauler_address = '$hauler_address'
        WHERE hauler_id = $hauler_id";

    if ($conn->query($sql) === TRUE) {
        echo "Hauler updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
