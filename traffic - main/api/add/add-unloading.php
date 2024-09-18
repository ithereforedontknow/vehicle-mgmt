<?php
require 'db_connection.php';

if (isset($_POST['transaction_id'])) {

    $transaction_id = $_POST['transaction_id'];
    $status = $_POST['status'];
    $time_of_entry = date('Y-m-d H:i:s');
    $unloading_time_start = date('Y-m-d H:i:s');

    $sql = "INSERT INTO unloading (transaction_id, time_of_entry, unloading_time_start) VALUES ('$transaction_id', '$time_of_entry', '$unloading_time_start') ";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        $sql = "UPDATE transaction SET status = '$status' WHERE transaction_id = $transaction_id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo "Added to unloading";
        } else {
            echo "Error updating status: ";
        }
    } else {
        echo "Error unload: ";
    }

    $conn->close();
} else {
    echo "Invalid request";
}
