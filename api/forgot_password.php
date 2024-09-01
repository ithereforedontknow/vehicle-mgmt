<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "SELECT * FROM `tbl_user` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // If ID is found, return success and the reset password URL
        echo json_encode(['success' => true, 'redirect_url' => "reset_password.php?id=" . $id]);
    } else {
        // If ID is not found, return an error message
        echo json_encode(['success' => false, 'message' => "ID not found. Please check and try again."]);
    }
    exit();
}
