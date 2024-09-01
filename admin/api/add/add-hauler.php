<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $haulerName = $_POST['haulerName'];
    $haulerAddress = $_POST['haulerAddress'];
    $haulerTypeTruck = $_POST['haulerTypeTruck'];

    // Check if id is unique
    $sql = "SELECT * FROM hauler WHERE hauler_name = '$haulerName'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing hauler");
    }
    // Insert the user into the database
    $sql = "INSERT INTO hauler (hauler_name, address, type_truck) VALUES ('$haulerName' , '$haulerAddress', '$haulerTypeTruck')";
    if ($conn->query($sql) === TRUE) {
        echo "Hauler added successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
