<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $id = $_POST['edit-user-id'];
    $username = $_POST['edit-username'];
    $fname = $_POST['edit-fname'];
    $mname = $_POST['edit-mname'];
    $lname = $_POST['edit-lname'];
    $password = $_POST['edit-password'];
    $userlevel = $_POST['edit-userlevel'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    // Update user in the database
    $sql = "UPDATE tbl_user SET username = :username, fname = :fname, mname = :mname, lname = :lname, userlevel = :userlevel, password = :password WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':mname', $mname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':userlevel', $userlevel, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(array('success' => true));
    } else {
        // Return error response
        echo json_encode(array('error' => 'Failed to update user'));
    }
}
