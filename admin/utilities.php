<?php

require_once '../api/db_connection.php';

session_start();

if (!isset($_SESSION['id']) || $_SESSION['userlevel'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['backupAction'])) {
        // Backup Process
        $dbName = "db_inhouse_vehicle"; // Replace with your database name
        $dbUser = "root"; // Replace with your database user
        $dbPass = ""; // Replace with your database password
        $dbHost = "localhost"; // Replace with your database host

        $backupFile = 'backup_' . date('Ymd_His') . '.sql';

        $command = "mysqldump --user={$dbUser} --password={$dbPass} --host={$dbHost} {$dbName} > {$backupFile}";
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            header('Content-Type: application/sql');
            header('Content-Disposition: attachment; filename="' . basename($backupFile) . '"');
            readfile($backupFile);
            unlink($backupFile); // Delete the backup file after sending it to the user
            exit;
        } else {
            echo "<script>alert('Failed to create backup');</script>";
        }
    } elseif (isset($_FILES['backupFile'])) {
        // Restore Process
        $backupFile = $_FILES['backupFile']['tmp_name'];
        $dbName = "db_inhouse_vehicle"; // Replace with your database name
        $dbUser = "root"; // Replace with your database user
        $dbPass = ""; // Replace with your database password
        $dbHost = "localhost"; // Replace with your database host

        $command = "mysql --user={$dbUser} --password={$dbPass} --host={$dbHost} {$dbName} < {$backupFile}";
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            echo "<script>alert('Database restored successfully');</script>";
        } else {
            echo "<script>alert('Failed to restore database');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Utilities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">Database Utilities</h1>
            <div class="row">
                <div class="col">
                    <div class="container shadow-sm p-5 mb-5 bg-white rounded text-center">
                        <h2>Backup Database</h2>
                        <form action="" method="post" id="backupForm">
                            <div class="mb-3">
                                <label for="backupPath" class="form-label">Backup Folder Path</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="backupPath" name="backupPath" readonly>
                                    <button type="button" class="btn btn-secondary" id="browseButton">Browse</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Backup</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="container shadow-sm p-5 mb-5 bg-white rounded text-center">
                        <h2>Restore Database</h2>
                        <form action="" method="post" enctype="multipart/form-data" id="restoreForm">
                            <div class="mb-3">
                                <label for="backupFile" class="form-label">Select Backup File</label>
                                <input type="file" class="form-control" id="backupFile" name="backupFile" accept=".sql" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Restore Backup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script>
        // (Your existing JavaScript code here)

        $("#backupForm").submit(function(e) {
            e.preventDefault();
            if (!backupPath.value) {
                alert("Please select a backup folder");
                return;
            }
            // Submit the form via POST to trigger the backup
            this.submit();
        });

        $("#restoreForm").submit(function(e) {
            e.preventDefault();
            // Submit the form via POST to trigger the restore
            this.submit();
        });
    </script>

</body>

</html>