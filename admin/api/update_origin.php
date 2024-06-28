<?php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $origin_id = $_POST['editOriginId'];
    $origin = $_POST['editOrigin'];

    // Update user in the database
    $sql = "UPDATE tbl_origin SET origin = :origin WHERE origin_id = :origin_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':origin', $origin, PDO::PARAM_STR);
    $stmt->bindParam(':origin_id', $origin_id, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(array('success' => true));
    } else {
        // Return error response
        echo json_encode(array('error' => 'Failed to update user'));
    }
}
