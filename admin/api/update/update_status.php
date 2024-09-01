<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];
    $status = $_POST['status'];

    // Update the status in the database
    $sql = "UPDATE transaction SET status='$status' WHERE transaction_id=$transaction_id";

    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
