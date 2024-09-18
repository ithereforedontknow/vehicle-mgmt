<?php
require_once('../db_connection.php');

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the demurrage value is set
    if (isset($_POST['demurrage']) && !empty($_POST['demurrage'])) {
        $demurrage = intval($_POST['demurrage']);  // Sanitize the input to ensure it's an integer

        // Update query
        $sql = "UPDATE demurrage SET demurrage = $demurrage WHERE id = 1";  // Ensure the WHERE clause targets the correct row
        $stmt = $conn->prepare($sql);

        // Execute the query
        if ($stmt->execute()) {
            echo "Demurrage updated successfully";
        } else {
            echo "Error updating demurrage: ";
        }
    } else {
        echo "Demurrage value is required";
    }
} else {
    echo "Invalid request method";
}
