<?php
require_once('db_connection.php');

if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];

    $sql = "SELECT * FROM transaction WHERE transaction_id = :transaction_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':transaction_id', $transaction_id, PDO::PARAM_INT);

    $stmt->execute();

    $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($transaction) {
        // Return JSON response
        echo json_encode($transaction);
    } else {
        // Return error response if user not found
        echo json_encode(array('error' => 'transaction not found'));
    }
}
