<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hauler = $_POST['hauler'];


    // Check if id is unique
    $sql = "SELECT * FROM hauler WHERE hauler_name = '$hauler'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing hauler");
    }
    // Insert the user into the database
    $sql = "INSERT INTO hauler (hauler_name) VALUES ('$hauler')";
    if ($conn->query($sql) === TRUE) {
        echo "Hauler added successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
