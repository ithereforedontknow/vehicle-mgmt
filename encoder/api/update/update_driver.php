<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $driver_id = $_POST['driver_id'];
    $driver_fname = $_POST['driver_fname'];
    $driver_mname = $_POST['driver_mname'];
    $driver_lname = $_POST['driver_lname'];
    $driver_phone = $_POST['driver_phone'];

    $sql = "UPDATE driver SET driver_fname='$driver_fname', driver_mname='$driver_mname', driver_lname='$driver_lname', driver_phone='$driver_phone' WHERE driver_id=$driver_id";

    if ($conn->query($sql) === TRUE) {
        echo "Driver updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
