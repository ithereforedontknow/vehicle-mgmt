<?php
require 'db_connection.php';

if (isset($_POST['transaction_id'])) {

    $transaction_id = $_POST['transaction_id'];
    $transfer_in_line = $_POST['transfer_in_line'];
    $ordinal = $_POST['ordinal'];
    $shift = $_POST['shift'];
    $schedule = $_POST['schedule'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $sql = "SELECT * FROM queue WHERE transaction_id = '$transaction_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Already on queue");
    }

    $sql = "INSERT INTO queue (transaction_id, transfer_in_line, ordinal, shift, schedule, priority) VALUES ('$transaction_id', '$transfer_in_line', '$ordinal', '$shift', '$schedule', '$priority') ";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $sql = "UPDATE transaction SET status = '$status' WHERE transaction_id = $transaction_id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo "Added to queue";
        } else {
            echo "Error updating status: ";
        }
    } else {
        echo "Error adding to queue: ";
    }

    $conn->close();
} else {
    echo "Invalid request";
}
