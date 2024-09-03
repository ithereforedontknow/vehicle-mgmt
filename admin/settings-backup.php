<?php

require_once '../api/db_connection.php';

session_start();

if (!isset($_SESSION['id']) || $_SESSION['userlevel'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

$backupDir = 'backups/'; // Specify the backup directory

// Ensure the backup directory exists
if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

// Get all backup files
$backups = array_diff(scandir($backupDir), array('..', '.'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['backupAction'])) {
        // Backup Process
        $dbName = "db_inhouse_vehicle"; // Replace with your database name
        $backupFile = $backupDir . 'backup_' . date('Ymd_His') . '.sql';
        $backupHandle = fopen($backupFile, 'w');

        if ($backupHandle) {
            // Get all tables in the database
            $tables = [];
            $result = $conn->query("SHOW TABLES");
            while ($row = $result->fetch_row()) {
                $tables[] = $row[0];
            }

            // Iterate over each table
            foreach ($tables as $table) {
                // Get the CREATE TABLE statement
                $createTableResult = $conn->query("SHOW CREATE TABLE $table");
                $createTableRow = $createTableResult->fetch_row();
                fwrite($backupHandle, "\n\n" . $createTableRow[1] . ";\n\n");

                // Get all table data
                $tableDataResult = $conn->query("SELECT * FROM $table");
                $numColumns = $tableDataResult->field_count;

                while ($rowData = $tableDataResult->fetch_row()) {
                    $sqlInsert = "INSERT INTO $table VALUES(";
                    for ($i = 0; $i < $numColumns; $i++) {
                        $rowData[$i] = $rowData[$i] ? "'" . $conn->real_escape_string($rowData[$i]) . "'" : "NULL";
                        $sqlInsert .= ($i > 0 ? "," : "") . $rowData[$i];
                    }
                    $sqlInsert .= ");\n";
                    fwrite($backupHandle, $sqlInsert);
                }
            }

            fclose($backupHandle);
            echo "<script>alert('Backup created successfully');</script>";
        } else {
            echo "<script>alert('Failed to create backup file');</script>";
        }
        // Redirect after backup to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } elseif (isset($_FILES['backupFile'])) {
        // Restore Process
        $backupFile = $_FILES['backupFile']['tmp_name'];
        $query = file_get_contents($backupFile);

        if ($conn->multi_query($query)) {
            echo "<script>alert('Database restored successfully');</script>";
        } else {
            echo "<script>alert('Failed to restore database');</script>";
        }
        // Redirect after restore to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Utilities</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">Database Utilities</h1>

            <div class="container shadow-sm p-5 mb-5 bg-white rounded">
                <form action="" method="post" id="backupForm">
                    <button type="submit" name="backupAction" class="btn btn-primary mb-2 ms-2 float-end">Create Backup</button>
                </form>
                <a href="settings.php" class="text-decoration-none float-end" style="color:inherit">
                    <button class="btn btn-secondary mb-2">
                        <i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i> Back
                    </button>
                </a>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Backup File</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($backups as $backup): ?>
                            <tr>
                                <td><?= $backup ?></td>
                                <td><?= date("Y-m-d H:i:s", filemtime($backupDir . $backup)) ?></td>
                                <td>
                                    <a href="<?= $backupDir . $backup ?>" class="btn btn-primary" download>Download</a>
                                    <form action="" method="post" style="display:inline-block;">
                                        <input type="hidden" name="selectedBackup" value="<?= $backupDir . $backup ?>">
                                        <button type="submit" name="restoreAction" class="btn btn-secondary ms-2">Restore</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
</body>

</html>