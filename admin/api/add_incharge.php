<?php
require '../../api/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeFirstName = $_POST['employeeFirstName'];
    $employeeLastName = $_POST['employeeLastName'];

    // Check if id is unique
    $sql = "SELECT * FROM tbl_transfer_in_charge WHERE first_name='$employeeFirstName' and last_name='$employeeLastName'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing employee");
    }
    $sql = "INSERT INTO tbl_transfer_in_charge (first_name, last_name) VALUES ('$employeeFirstName', '$employeeLastName')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
