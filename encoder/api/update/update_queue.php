<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];

    $status = $_POST['status'];
    $time_of_entry = date('Y-m-d H:i:s');
    $unloading_time_start = date('Y-m-d H:i:s');
    $unloading_date = date('Y-m-d');

    // Update the status in the database
    $sql = "UPDATE transaction 
        SET time_of_entry = '$time_of_entry', 
            unloading_time_start = '$unloading_time_start', 
            unloading_date = '$unloading_date', 
            time_spent_waiting_area = SEC_TO_TIME(TIMESTAMPDIFF(SECOND, arrival_time, time_of_entry)), 
            status = '$status' 
        WHERE transaction_id = $transaction_id";


    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
