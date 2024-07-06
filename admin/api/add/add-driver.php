<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $driver_name = $_POST['driverName'];


    // Check if id is unique
    $sql = "SELECT * FROM driver WHERE driver_name = '$driver_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing driver");
    }
    // Insert the user into the database
    $sql = "INSERT INTO driver (driver_name) VALUES ('$driver_name')";
    if ($conn->query($sql) === TRUE) {
        echo "Driver added successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
