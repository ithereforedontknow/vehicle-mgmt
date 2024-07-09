<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $project = $_POST['project'];


    // Check if id is unique
    $sql = "SELECT * FROM project WHERE project_name = '$project'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        die("Existing project");
    }
    // Insert the user into the database
    $sql = "INSERT INTO project (project_name) VALUES ('$project')";
    if ($conn->query($sql) === TRUE) {
        echo "Project added successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
