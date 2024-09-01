<?php
require_once('db_connection.php');
header('Content-Type: application/json');

// Get the transaction ID from POST data
$transaction_id = $_POST['transaction_id'];

// Assume $db is your database connection
$stmt = $db->prepare("SELECT * FROM transactions WHERE transaction_id = ?");
$stmt->bind_param("i", $transaction_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $transaction = $result->fetch_assoc();
    echo json_encode($transaction);
} else {
    echo json_encode(["error" => "Transaction not found"]);
}

$stmt->close();
$db->close();
