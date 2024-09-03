<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];
    $arrival_date = date('Y-m-d');
    $arrival_time = date('Y-m-d H:i:s');
    $status = $_POST['status'];

    // Update the status in the database
    $sql = "UPDATE transaction SET arrival_date='$arrival_date', arrival_time='$arrival_time', status='$status' WHERE transaction_id=$transaction_id";

    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
