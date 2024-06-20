<?php
require '../../api/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = htmlspecialchars($_POST['fname']);
    $mname = htmlspecialchars($_POST['mname']);
    $lname = htmlspecialchars($_POST['lname']);
    $password = $_POST['password'];
    $userlevel = htmlspecialchars($_POST['userlevel']);


    // Check if id is unique
    $sql = "SELECT * FROM tbl_user WHERE fname='$fname' and lname='$lname'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing user");
    }

    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the user into the database
    $sql = "INSERT INTO tbl_user (fname, mname, lname, password, userlevel) VALUES ('$fname', '$mname', '$lname', '$hashed_password', '$userlevel')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
