<?php
// Include your database connection file
require_once "./db_connection.php";

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize variables to store form data
    $toReference = $_POST['toReference'];
    $hauler_id = $_POST['hauler_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $driver_id = $_POST['driver_id'];
    $project_id = $_POST['project_id'];
    $noOfBales = $_POST['noOfBales'];
    $kilos = $_POST['kilos'];
    $origin = $_POST['origin'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO transaction (to_reference, hauler_id, vehicle_id, driver_id, project_id, no_of_bales, kilos, origin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiiiis", $toReference, $hauler_id, $vehicle_id, $driver_id, $project_id, $noOfBales, $kilos, $origin);
    // Execute the statement
    if ($stmt->execute()) {
        echo "Transaction added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, handle accordingly (optional)
    echo "Invalid request method";
}
