<?php
session_start();
require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the SQL query using prepared statements to prevent SQL injection
    $sql = "UPDATE users SET status = FALSE WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    if ($stmt->execute()) {
        echo "Account deactivated successfully";
    } else {
        echo "Error deactivating account";
    }

    $stmt->close();
    $conn->close();
}
