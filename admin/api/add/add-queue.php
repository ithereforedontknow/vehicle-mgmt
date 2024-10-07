<?php
require 'db_connection.php';

if (isset($_POST['transaction_id'])) {

    $transaction_id = $_POST['transaction_id'];
    $transfer_in_line = $_POST['transfer_in_line'];
    $ordinal = $_POST['ordinal'];
    $shift = $_POST['shift'];
    $schedule = $_POST['schedule'];
    $queue_number = $_POST['queue_number'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $existingQueueQuery = "SELECT * FROM queue WHERE transaction_id = ?";
    $stmt = $conn->prepare($existingQueueQuery);
    $stmt->bind_param("i", $transaction_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Transaction is already in queue";
        exit;
    }

    $currentDate = date('Y-m-d');
    $existingQueueNumberQuery = "SELECT * 
                                FROM queue  
                                WHERE queue_number = ? 
                                AND created_at > '$currentDate'";
    $stmt = $conn->prepare($existingQueueNumberQuery);
    $stmt->bind_param("i", $queue_number);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Queue number is already in use";
        exit;
    }

    $sql = "INSERT INTO queue (transaction_id, queue_number, transfer_in_line, ordinal, shift, schedule, priority) VALUES ('$transaction_id', '$queue_number', '$transfer_in_line', '$ordinal', '$shift', '$schedule', '$priority') ";
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
