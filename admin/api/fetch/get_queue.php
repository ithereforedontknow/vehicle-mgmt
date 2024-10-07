<?php
require_once "db_connection.php";

header('Content-Type: application/json'); // Set the content type to JSON

$response = array();

if (isset($_POST['transaction_id'])) {
    $transaction_id = $_POST['transaction_id'];
    $sql = "SELECT * FROM queue INNER JOIN transaction ON queue.transaction_id = transaction.transaction_id inner join origin on transaction.origin_id = origin.origin_id inner join project on transaction.project_id = project.project_id WHERE transaction.transaction_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transaction_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $response = $row;
    } else {
        $response['status'] = 404; // 404 means not found
        $response['message'] = "Data not found";
    }
} else {
    $response['status'] = 400; // 400 means bad request
    $response['message'] = "Invalid or missing transaction_id";
}

echo json_encode($response);
exit;
