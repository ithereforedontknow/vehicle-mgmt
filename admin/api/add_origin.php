<?php
require '../../api/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST['origin'];

    // Check if id is unique
    $sql = "SELECT * FROM tbl_origin WHERE origin = '$origin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing origin");
    }
    $sql = "INSERT INTO tbl_origin (origin) VALUES ('$origin')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
