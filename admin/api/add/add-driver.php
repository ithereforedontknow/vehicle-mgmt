<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $driver = [
        'driver_fname' => $_POST['driverFname'],
        'driver_mname' => $_POST['driverMname'],
        'driver_lname' => $_POST['driverLname'],
        'driver_phone' => $_POST['driverPhone']
    ];

    $helper = [
        'helper_fname' => $_POST['helperFname'],
        'helper_mname' => $_POST['helperMname'],
        'helper_lname' => $_POST['helperLname'],
        'helper_phone' => $_POST['helperPhone']
    ];

    $sql = "INSERT INTO driver (driver_fname, driver_mname, driver_lname, driver_phone) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE driver_id = LAST_INSERT_ID(driver_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $driver['driver_fname'], $driver['driver_mname'], $driver['driver_lname'], $driver['driver_phone']);
    $stmt->execute();
    $stmt->close();

    $sql = "INSERT INTO helper (helper_fname, helper_mname, helper_lname, helper_phone) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE helper_id = LAST_INSERT_ID(helper_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $helper['helper_fname'], $helper['helper_mname'], $helper['helper_lname'], $helper['helper_phone']);
    $stmt->execute();
    $stmt->close();

    echo "Driver and helper added successful";

    $conn->close();
} else {
    echo "Invalid request";
}
