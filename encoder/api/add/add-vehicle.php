<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $hauler = $_POST['hauler'];
    $plate_no = $_POST['plateNumber'];
    $truck_type = $_POST['truckType'];


    // Check if id is unique
    $sql = "SELECT * FROM vehicle WHERE plate_number = '$plate_no'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing vehicle");
    }
    // Insert the user into the database
    $sql = "INSERT INTO vehicle (plate_number, truck_type, hauler_id) VALUES ('$plate_no', '$truck_type', '$hauler')";
    if ($conn->query($sql) === TRUE) {
        echo "Vehicle added successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
