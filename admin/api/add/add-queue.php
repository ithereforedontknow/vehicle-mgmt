<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $transaction_id = $_POST['transaction_id'];
    $ordinal = $_POST['ordinal'];
    $shift = $_POST['shift'];
    $schedule = $_POST['schedule'];
    $status = $_POST['status'];

    // Check if the status already exists in the queue for the given transaction_id
    $sql = "SELECT * FROM transaction WHERE transaction_id = '$transaction_id' AND status = '$status'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Already on queue");
    }

    // Insert into transaction table without the status
    $sql = "INSERT INTO transaction (ordinal, shift, schedule) VALUES ('$ordinal', '$shift', '$schedule')";
    if ($conn->query($sql) === TRUE) {
        // Update the status of the transaction based on transaction_id
        $update_sql = "UPDATE transaction SET status = '$status' WHERE transaction_id = '$transaction_id'";
        if ($conn->query($update_sql) === TRUE) {
            echo "Transaction updated successfully";
        } else {
            echo "Error updating transaction: " . $conn->error;
        }
    } else {
        echo "Error inserting transaction: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
