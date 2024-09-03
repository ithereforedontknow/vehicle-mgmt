<?php
require 'db_connection.php';

if (isset($_POST['transaction_id'])) {

    $transaction_id = $_POST['transaction_id'];
    $transfer_in_line = $_POST['transfer_in_line'];
    $ordinal = $_POST['ordinal'];
    $shift = $_POST['shift'];
    $schedule = $_POST['schedule'];
    $status = $_POST['status'];

    $sql = "SELECT * FROM transaction WHERE transaction_id = '$transaction_id' AND status = 'queue'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Already on queue");
    }

    $sql = "UPDATE transaction SET transfer_in_line_id = '$transfer_in_line', ordinal = '$ordinal', shift = '$shift', schedule = '$schedule', status = '$status' WHERE transaction_id = '$transaction_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Queue added successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }


    $conn->close();
} else {
    echo "Invalid request";
}
