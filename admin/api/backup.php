<?php
require '../api/db_connection.php';

function backupDatabase($host, $user, $pass, $dbname, $tables = '*')
{
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($tables == '*') {
        $tables = array();
        $result = $conn->query("SHOW TABLES");
        while ($row = $result->fetch_row()) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    $output = '';
    foreach ($tables as $table) {
        $result = $conn->query("SELECT * FROM $table");
        $numFields = $result->field_count;

        $output .= "DROP TABLE IF EXISTS $table;";
        $row2 = $conn->query("SHOW CREATE TABLE $table")->fetch_row();
        $output .= "\n\n" . $row2[1] . ";\n\n";

        while ($row = $result->fetch_row()) {
            $output .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $numFields; $j++) {
                $row[$j] = addslashes($row[$j]);
                $row[$j] = preg_replace("/\n/", "\\n", $row[$j]);
                if (isset($row[$j])) {
                    $output .= '"' . $row[$j] . '"';
                } else {
                    $output .= '""';
                }
                if ($j < ($numFields - 1)) {
                    $output .= ',';
                }
            }
            $output .= ");\n";
        }
        $output .= "\n\n\n";
    }

    $backupFileName = 'db-backup-' . time() . '.sql';
    $file = fopen($backupFileName, 'w+');
    fwrite($file, $output);
    fclose($file);

    echo "Backup created successfully. File name: " . $backupFileName;
}

// Call the function with your database credentials
backupDatabase('localhost', 'root', '', 'db_inhouse_vehicle');
