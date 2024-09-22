<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $origin = $_POST['origin'];

    // Check if id is unique
    $sql = "SELECT * FROM origin WHERE origin_name = '$origin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing origin");
    }
    // Insert the user into the database
    $sql = "INSERT INTO origin (origin_name) VALUES ('$origin')";
    if ($conn->query($sql) === TRUE) {
        echo "Origin added successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
