<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $id = $_POST['id'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $userlevel = $_POST['userlevel'];
    $status = $_POST['status'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    // Update user in the database
    $sql = "UPDATE users SET username = :username, fname = :fname, mname = :mname, lname = :lname, userlevel = :userlevel, password = :password, status = :status WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':mname', $mname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':userlevel', $userlevel, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Return success response
        echo "User updated successfully";
    } else {
        // Return error response
        echo json_encode(array('error' => 'Failed to update user'));
    }
}
