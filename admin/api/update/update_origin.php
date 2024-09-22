<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $origin_id = $_POST['origin_id'];
    $origin_name = $_POST['origin_name'];

    $sql = "UPDATE origin SET origin_name = '$origin_name' WHERE origin_id = $origin_id";

    if ($conn->query($sql) === TRUE) {
        echo "Origin updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
