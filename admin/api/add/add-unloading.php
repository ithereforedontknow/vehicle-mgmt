<?php
require 'db_connection.php';

function handleError($message)
{
    error_log($message);
    return $message;
}

// Set the default timezone to your local timezone
date_default_timezone_set('Asia/Manila'); // replace with your local timezone

if (!isset($_POST['transaction_id'])) {
    echo handleError("Invalid request: Missing transaction_id");
    exit;
}

$transaction_id = $_POST['transaction_id'];
$status = $_POST['status'];
$time_of_entry = date('Y-m-d H:i:s');

echo "Current server time: " . $time_of_entry . "<br>";

try {
    $conn = new PDO('mysql:host=localhost;dbname=db_inhouse_vehicle', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();

    // Get arrival time
    $stmt = $conn->prepare("SELECT arrival_time FROM arrival WHERE transaction_id = ?");
    $stmt->execute([$transaction_id]);
    $arrivalTime = $stmt->fetchColumn();

    if (!$arrivalTime) {
        throw new Exception("Arrival time not found for this transaction");
    }

    echo "Arrival time: " . $arrivalTime . "<br>";

    $arrivalTimeTimestamp = strtotime($arrivalTime);
    $timeOfEntryTimestamp = strtotime($time_of_entry);

    if (is_numeric($arrivalTimeTimestamp) && is_numeric($timeOfEntryTimestamp)) {
        // Calculate the time difference in seconds
        $timeDifference = $timeOfEntryTimestamp - $arrivalTimeTimestamp;

        // Convert time difference to hours, minutes, and seconds
        $hours = floor($timeDifference / 3600);
        $minutes = floor(($timeDifference % 3600) / 60);
        $seconds = $timeDifference % 60;

        // Get demurrage rate
        $stmt = $conn->prepare("SELECT demurrage FROM demurrage LIMIT 1");
        $stmt->execute();
        $demurrage = $stmt->fetchColumn();

        if ($demurrage === false) {
            throw new Exception("Demurrage rate not found");
        }

        $totalDemurrage = 0;
        $demurrageRatePerSecond = $demurrage / 3600; // Convert the hourly rate to a per-second rate

        if ($timeDifference > (48 * 3600)) { // 48 hours in seconds
            $chargeableSeconds = $timeDifference - (48 * 3600); // Remove the first 48 hours from the calculation
            $totalDemurrage = $chargeableSeconds * $demurrageRatePerSecond;
        }

        // Insert into unloading
        $stmt = $conn->prepare("INSERT INTO unloading (transaction_id, time_of_entry) VALUES (?, ?)");
        $stmt->execute([$transaction_id, $time_of_entry]);

        // Update transaction with time spent in waiting area and demurrage
        $stmt = $conn->prepare("UPDATE transaction SET time_spent_waiting_area = ?, demurrage = ?, status = ? WHERE transaction_id = ?");
        $stmt->execute([$hours, $totalDemurrage, $status, $transaction_id]);

        $conn->commit();
        echo "<br>Transaction processed successfully";
    } else {
        throw new Exception("Invalid time format");
    }
} catch (Exception $e) {
    if (isset($conn)) {
        $conn->rollBack();
    }
    echo handleError("Error processing transaction: " . $e->getMessage());
} finally {
    if (isset($conn)) {
        $conn = null;
    }
}
