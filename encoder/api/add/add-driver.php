<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $driver = [
        'driver_fname' => $_POST['driverFname'],
        'driver_mname' => $_POST['driverMname'],
        'driver_lname' => $_POST['driverLname'],
        'driver_phone' => $_POST['driverPhone']
    ];

    $sql = "INSERT INTO driver (driver_fname, driver_mname, driver_lname, driver_phone) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE driver_id = LAST_INSERT_ID(driver_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $driver['driver_fname'], $driver['driver_mname'], $driver['driver_lname'], $driver['driver_phone']);
    $stmt->execute();
    $stmt->close();

    echo "Driver added successful";

    $conn->close();
} else {
    echo "Invalid request";
}
