<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $helper = [
        'helper_fname' => $_POST['helperFname'],
        'helper_mname' => $_POST['helperMname'],
        'helper_lname' => $_POST['helperLname'],
        'helper_phone' => $_POST['helperPhone']
    ];

    $sql = "INSERT INTO helper (helper_fname, helper_mname, helper_lname, helper_phone) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE helper_id = LAST_INSERT_ID(helper_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $helper['helper_fname'], $helper['helper_mname'], $helper['helper_lname'], $helper['helper_phone']);
    $stmt->execute();
    $stmt->close();

    echo "Helper added successful";

    $conn->close();
} else {
    echo "Invalid request";
}
