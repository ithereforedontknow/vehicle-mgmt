<?php
require '../api/db_connection.php';

function restoreDatabase($host, $user, $pass, $dbname, $filePath)
{
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = file_get_contents($filePath);
    if ($sql === false) {
        die("Error reading SQL file");
    }

    $queries = explode(';', $sql);
    foreach ($queries as $query) {
        $query = trim($query);
        if (!empty($query)) {
            if ($conn->query($query) === false) {
                die("Error executing query: " . $conn->error);
            }
        }
    }

    echo "Database restored successfully.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["backupFile"])) {
    $targetFile = "uploads/" . basename($_FILES["backupFile"]["name"]);
    if (move_uploaded_file($_FILES["backupFile"]["tmp_name"], $targetFile)) {
        restoreDatabase('localhost', 'root', '', 'db_inhouse_vehicle', $targetFile);
    } else {
        echo "Error uploading file.";
    }
}
