<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $helper_id = $_POST['helper_id'];
    $helper_fname = $_POST['helper_fname'];
    $helper_mname = $_POST['helper_mname'];
    $helper_lname = $_POST['helper_lname'];
    $helper_phone = $_POST['helper_phone'];

    $sql = "UPDATE helper SET helper_fname='$helper_fname', helper_mname='$helper_mname', helper_lname='$helper_lname', helper_phone='$helper_phone' WHERE helper_id=$helper_id";

    if ($conn->query($sql) === TRUE) {
        echo "Helper updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
