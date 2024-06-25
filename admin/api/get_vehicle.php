<?php
require_once('db_connection.php');

if (isset($_GET['to_ref_no'])) {
    $to_ref_no = $_GET['to_ref_no'];

    $sql = "SELECT * FROM tbl_vehicles WHERE to_ref_no = :to_ref_no";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':to_ref_no', $to_ref_no, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Return JSON response
        echo json_encode($user);
    } else {
        // Return error response if user not found
        echo json_encode(array('error' => 'User not found'));
    }
}
