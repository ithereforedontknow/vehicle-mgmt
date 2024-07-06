<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $userlevel = $_POST['userlevel'];


    // Check if id is unique
    $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing user");
    }

    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the user into the database
    $sql = "INSERT INTO tbl_user (username, fname, mname, lname, password, userlevel) VALUES ('$username','$fname', '$mname', '$lname', '$hashed_password', '$userlevel')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
