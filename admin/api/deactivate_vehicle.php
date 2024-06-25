<?php
session_start();
require '../../api/db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['to_ref_no'])) {
    $to_ref_no = $_POST['to_ref_no'];

    // Prepare and execute the SQL query using prepared statements to prevent SQL injection
    $sql = "UPDATE tbl_vehicles SET status = FALSE WHERE to_ref_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $to_ref_no);
    if ($stmt->execute()) {
        echo "Vehicle deactivated successfully";
    } else {
        echo "Error activating vehicle";
    }

    $stmt->close();
    $conn->close();
}
