<?php
session_start();
require '../../api/db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the SQL query using prepared statements to prevent SQL injection
    $sql = "UPDATE tbl_transfer_in_charge SET status = FALSE WHERE transfer_in_charge_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    if ($stmt->execute()) {
        echo "Activated successfully";
    } else {
        echo "Error activating vehicle";
    }

    $stmt->close();
    $conn->close();
}
