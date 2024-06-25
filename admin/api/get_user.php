<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_user WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($vehicle) {
        // Return JSON response
        echo json_encode($vehicle);
    } else {
        // Return error response if user not found
        echo json_encode(array('error' => 'Vehicle not found'));
    }
}
