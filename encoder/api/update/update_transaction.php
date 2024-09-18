<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];
    $arrival_date = $_POST['arrival_date'];
    $arrival_time = $_POST['arrival_time'];
    $status = 'arrived';

    // Update the status in the database
    $sql = "INSERT INTO arrival (transaction_id, arrival_date, arrival_time) VALUES ($transaction_id, '$arrival_date', '$arrival_time') ON DUPLICATE KEY UPDATE arrival_date='$arrival_date', arrival_time='$arrival_time'";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $sql = "UPDATE transaction SET status = 'arrived' WHERE transaction_id = $transaction_id";
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
