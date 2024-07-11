<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['backupPath']) && !empty($_POST['backupPath'])) {
        $backupDir = $_POST['backupPath'];

        // Generate a unique filename for the backup
        $backupFile = $backupDir . DIRECTORY_SEPARATOR . 'backup_' . date('Y-m-d_H-i-s') . '.sql';

        // Your database credentials
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'db_inhouse_vehicle';

        // Full path to mysqldump (adjust this as needed)
        $mysqldump = '/usr/bin/mysqldump';

        // Backup command
        $command = escapeshellcmd("$mysqldump --opt -h $dbHost -u $dbUser -p$dbPass $dbName > \"$backupFile\" 2>&1");

        // Execute the backup command
        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            echo "Backup created successfully: $backupFile";
        } else {
            echo "Backup failed. Error details:<br>";
            echo "Return code: $returnVar<br>";
            echo "Error output:<br>" . implode("<br>", $output);

            // Additional debugging information
            echo "<br><br>Debug info:<br>";
            echo "Backup directory: $backupDir<br>";
            echo "PHP version: " . phpversion() . "<br>";
            echo "Web server user: " . exec('whoami') . "<br>";
            echo "Directory writable: " . (is_writable($backupDir) ? 'Yes' : 'No') . "<br>";
        }
    } else {
        echo "No backup path provided.";
    }
} else {
    echo "Invalid request method.";
}
