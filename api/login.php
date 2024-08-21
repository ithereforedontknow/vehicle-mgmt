<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$username) {
        die("Invalid username");
    }

    // Check user credentials
    $sql = "SELECT * FROM tbl_user WHERE username ='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['userlevel'] = $row['userlevel'];
        if (password_verify($password, $row['password'])) {
            if ($row['active'] == 1) {
                if ($_SESSION['userlevel'] == 'admin') {
                    echo "admin";
                } elseif ($_SESSION['userlevel'] == 'traffic(main)') {
                    echo "traffic(main)";
                } elseif ($_SESSION['userlevel'] == 'traffic(branch)') {
                    echo "traffic(branch)";
                } elseif ($_SESSION['userlevel'] == 'encoder') {
                    echo "encoder";
                } else {
                    echo "no userlevel";
                }
            } else {
                echo "Account is deactivated";
            }
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            $_SESSION['userlevel'] = $row['userlevel'];

            // echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that username";
    }

    $conn->close();
}
