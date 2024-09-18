<?php
require_once('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project_id = $_POST['project_id'];
    $project_name = $_POST['project_name'];
    $project_description = $_POST['project_description'];

    $sql = "UPDATE project SET project_name = '$project_name', project_description = '$project_description' WHERE project_id = $project_id";

    if ($conn->query($sql) === TRUE) {
        echo "Project updated successfully";
    } else {
        echo "Error updating status: ";
    }
}
