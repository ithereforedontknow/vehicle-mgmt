<?php
require_once('db_connection.php');

if (isset($_GET['transfer_in_charge_id'])) {
    $transfer_in_charge_id = $_GET['transfer_in_charge_id'];

    $sql = "SELECT * FROM tbl_transfer_in_charge WHERE transfer_in_charge_id = :transfer_in_charge_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':transfer_in_charge_id', $transfer_in_charge_id, PDO::PARAM_INT);
    $stmt->execute();

    $transfer_in_charge = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($transfer_in_charge) {
        // Return JSON response
        echo json_encode($transfer_in_charge);
    } else {
        // Return error response if user not found
        echo json_encode(array('error' => 'Transfer in charge not found'));
    }
}
