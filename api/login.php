<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    if (!$id) {
        die("Invalid username");
    }

    // Check user credentials
    $sql = "SELECT * FROM tbl_user WHERE id ='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['userlevel'] = $row['userlevel'];
        if (password_verify($password, $row['password'])) {
            if ($row['active'] == 1) {
                if ($_SESSION['userlevel'] == 'admin') {
                    echo "admin";
                } elseif ($_SESSION['userlevel'] == 'tech assoc') {
                    echo "tech assoc";
                } else {
                    echo "no userlevel";
                }
            } else {
                echo "Account is deactivated";
            }
            $_SESSION['id'] = $id;
            // echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that ID";
    }

    $conn->close();
}
