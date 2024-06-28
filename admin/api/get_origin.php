<?php
require_once('db_connection.php');

if (isset($_GET['origin_id'])) {
    $origin_id = $_GET['origin_id'];

    $sql = "SELECT * FROM tbl_origin WHERE origin_id = :origin_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':origin_id', $origin_id, PDO::PARAM_INT);
    $stmt->execute();

    $origin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($origin) {
        // Return JSON response
        echo json_encode($origin);
    } else {
        // Return error response if user not found
        echo json_encode(array('error' => 'Transfer in charge not found'));
    }
}
