<?php
require '../../api/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to_ref_no = htmlspecialchars($_POST['to_ref_no']);
    $hauler = $_POST['hauler'];
    $plate_no = $_POST['plate_no'];
    $driver_name = htmlspecialchars($_POST['driver_name']);
    $truck_type = $_POST['truck_type'];
    $project = $_POST['project'];

    // Check if id is unique
    $sql = "SELECT * FROM tbl_vehicles WHERE to_ref_no='$to_ref_no'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing vehicle");
    }

    // Insert the user into the database
    $sql = "INSERT INTO tbl_vehicles (to_ref_no, hauler, plate_no, driver_name, truck_type, project) VALUES ('$to_ref_no', '$hauler', '$plate_no', '$driver_name', '$truck_type', '$project')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
