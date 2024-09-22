<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];
    $unloading_time_end = $_POST['unloading_time_end'];
    $time_of_departure = $_POST['time_of_departure'];

    // Update the status in the database
    $sql = "UPDATE unloading SET unloading_time_end = '$unloading_time_end', time_of_departure = '$time_of_departure' WHERE transaction_id = '$transaction_id'";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $sql = "UPDATE transaction SET status = 'done' WHERE transaction_id = $transaction_id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: ";
        }
    } else {
        echo "Error inserting status: ";
    }
}
