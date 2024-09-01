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
    $transferInLine = $_POST['transferInLine'];
    $ordinal = $_POST['ordinal'];
    $shift = $_POST['shift'];
    $schedule = $_POST['schedule'];
    $noOfBales = $_POST['noOfBales'];
    $kilos = $_POST['kilos'];
    $origin = $_POST['origin'];
    $arrivalDate = $_POST['arrivalDate'];
    $arrivalTime = $_POST['arrivalTime'];
    $backlog = $_POST['backlog'];
    $unloadingDate = $_POST['unloadingDate'];
    $timeOfEntry = $_POST['timeOfEntry'];
    $unloadingTimeStart = $_POST['unloadingTimeStart'];
    $unloadingTimeEnd = $_POST['unloadingTimeEnd'];
    $timeOfDeparture = $_POST['timeOfDeparture'];
    $status = 'departed'; // Added status parameter

    // Check if arrival time is unique
    $sql = "SELECT * FROM transaction WHERE arrival_time = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $arrivalTime);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Conflict scheduled arrival time.";
        exit();
    }


    // Prepare INSERT query
    $sql = "INSERT INTO transaction (to_reference, hauler_id, vehicle_id, driver_id, project_id, transfer_in_line, ordinal, shift, schedule, no_of_bales, kilos, origin, arrival_date, arrival_time, backlog, unloading_date, time_of_entry, unloading_time_start, unloading_time_end, time_of_departure, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "siiissssssissssssssss", // Update the parameter types string to match the number and type of columns
        $toReference,
        $hauler_id,
        $vehicle_id,
        $driver_id,
        $project_id,
        $transferInLine,
        $ordinal,
        $shift,
        $schedule,
        $noOfBales,
        $kilos,
        $origin,
        $arrivalDate,
        $arrivalTime,
        $backlog,
        $unloadingDate,
        $timeOfEntry,
        $unloadingTimeStart,
        $unloadingTimeEnd,
        $timeOfDeparture,
        $status
    );

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
