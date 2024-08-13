<?php
set_time_limit(300); // Set a 5-minute timeout

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['backupPath']) && !empty($_POST['backupPath'])) {
        // Base directory for backups (adjust this to a directory where your web server has write access)
        $baseDir = 'C:/xampp/htdocs/vehicle/api/backups';

        // Combine base directory with user-selected directory
        $backupDir = $baseDir . basename($_POST['backupPath']);

        // Ensure the directory exists
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0777, true);
        }

        // Generate a unique filename for the backup
        $backupFile = $backupDir . DIRECTORY_SEPARATOR . 'backup_' . date('Y-m-d_H-i-s') . '.sql';

        // Your database credentials
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'db_inhouse_vehicle';

        try {
            // Connect to the database
            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Open the backup file for writing
            $file = fopen($backupFile, 'w');

            if ($file === false) {
                throw new Exception("Unable to open file for writing.");
            }

            // Get all table names
            $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

            foreach ($tables as $table) {
                // Write table structure
                $createTable = $pdo->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
                fwrite($file, $createTable['Create Table'] . ";\n\n");

                // Write table data
                $rows = $pdo->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                    $values = array_map(function ($value) use ($pdo) {
                        return $value === null ? 'NULL' : $pdo->quote($value);
                    }, $row);
                    fwrite($file, "INSERT INTO `$table` VALUES (" . implode(", ", $values) . ");\n");
                }
                fwrite($file, "\n");
            }

            fclose($file);
            echo "Backup created successfully: $backupFile";
        } catch (Exception $e) {
            echo "Backup failed. Error: " . $e->getMessage();
        }
    } else {
        echo "No backup path provided.";
    }
} else {
    echo "Invalid request method.";
}
