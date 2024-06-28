<?php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $transfer_in_charge_id = $_POST['editTransferInChargeId'];
    $first_name = $_POST['editEmployeeFirstName'];
    $last_name = $_POST['editEmployeeLastName'];

    // Update user in the database
    $sql = "UPDATE tbl_transfer_in_charge SET first_name = :first_name, last_name = :last_name WHERE transfer_in_charge_id = :transfer_in_charge_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':transfer_in_charge_id', $transfer_in_charge_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(array('success' => true));
    } else {
        // Return error response
        echo json_encode(array('error' => 'Failed to update user'));
    }
}
