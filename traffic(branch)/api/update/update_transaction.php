<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $transaction_id = $_POST['transaction_id'];
    $status = $_POST['status'];


    // Update user in the database
    $sql = "UPDATE transaction SET status = :status WHERE transaction_id = :transaction_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':transaction_id', $transaction_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Return success response
        echo "Updated successfully";
    } else {
        // Return error response
        echo json_encode(array('error' => 'Failed to update user'));
    }
}
