<?php
session_start();
require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the SQL query using prepared statements to prevent SQL injection
    $sql = "UPDATE users SET status = TRUE WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    if ($stmt->execute()) {
        echo "Account activated successfully";
    } else {
        echo "Error activating account";
    }

    $stmt->close();
    $conn->close();
}
