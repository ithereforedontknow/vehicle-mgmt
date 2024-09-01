<?php
// Include database connection
require_once('../db_connection.php');

// Set response header to JSON
header('Content-Type: application/json');

$response = array();

// Check if the required data is present
if (isset($_POST['transaction_id'])) {
    // Sanitize and assign POST variables
    $transaction_id = intval($_POST['transaction_id']);
    $arrival_date = $_POST['arrival_date'];
    $arrival_time = $_POST['arrival_time'];
    $unloading_date = $_POST['unloading_date'];
    $time_of_entry = $_POST['time_of_entry'];
    $unloading_time_start = $_POST['unloading_time_start'];
    $unloading_time_end = $_POST['unloading_time_end'];
    $time_of_departure = $_POST['time_of_departure'];

    // Prepare the SQL update statement
    $query = "UPDATE transactions SET 
                arrival_date = ?, 
                arrival_time = ?, 
                unloading_date = ?, 
                time_of_entry = ?, 
                unloading_time_start = ?, 
                unloading_time_end = ?, 
                time_of_departure = ?, 
              WHERE transaction_id = ?";

    if ($stmt = $db->prepare($query)) {
        // Bind parameters
        $stmt->bind_param(
            'ssssssssi',
            $arrival_date,
            $arrival_time,
            $unloading_date,
            $time_of_entry,
            $unloading_time_start,
            $unloading_time_end,
            $time_of_departure,
            $transaction_id
        );

        // Execute the statement
        if ($stmt->execute()) {
            $response['message'] = 'Transaction updated successfully';
        } else {
            $response['message'] = 'Failed to update transaction: ' . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $response['message'] = 'Failed to prepare the update statement: ' . $db->error;
    }
} else {
    $response['message'] = 'Required data missing';
}

// Close the database connection
$db->close();

// Return the response as JSON
echo json_encode($response);
