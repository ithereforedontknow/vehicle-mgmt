<?php

require_once "./db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt = $conn->prepare("INSERT INTO transaction (
            to_reference,
            hauler_id,
            vehicle_id,
            driver_id,
            helper_id,
            project_id,
            no_of_bales,
            kilos,
            origin_id,
            time_of_departure
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['toReference'],
            $_POST['hauler_id'],
            $_POST['vehicle_id'],
            $_POST['driver_id'],
            $_POST['helper_id'],
            $_POST['project_id'],
            $_POST['noOfBales'],
            $_POST['kilos'],
            $_POST['origin_id'],
            $_POST['time_of_departure']
        ]);
        echo "Transaction added successfully";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
