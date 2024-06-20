<?php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $id = $_POST['edit-user-id'];
    $fname = $_POST['edit-fname'];
    $lname = $_POST['edit-lname'];
    $userlevel = $_POST['edit-userlevel'];

    // Update user in the database
    $sql = "UPDATE tbl_user SET fname = :fname, lname = :lname, userlevel = :userlevel WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':userlevel', $userlevel, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(array('success' => true));
    } else {
        // Return error response
        echo json_encode(array('error' => 'Failed to update user'));
    }
}
