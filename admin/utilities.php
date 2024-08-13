<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'admin') {

    if ($_SESSION['userlevel'] == 'tech assoc') {
        header("location: ../staff/index.php");
    } elseif ($_SESSION['userlevel'] == 'encoder') {
        header("location: ../encoder/index.php");
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
    <?php
    include_once('./navbar/navbar.php');
    ?>


    <div class="content" id="content">
        <div class="container">
            <h2 class="display-3 text-center mb-5">Database Utilities</h2>
            <div class="row">
                <div class="col">
                    <div class="card text-center p-5">
                        <div class="card-body">
                            <h2 class="card-title">Backup Database</h2>
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
                </div>
                <div class="col">
                    <div class="card text-center p-5">
                        <div class="card-body">
                            <h2 class="card-title">Restore Database</h2>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backupPath = document.getElementById('backupPath');
            const browseButton = document.getElementById('browseButton');

            browseButton.addEventListener('click', function() {
                window.showDirectoryPicker().then(function(directoryHandle) {
                    backupPath.value = directoryHandle.name;
                    // Store the directory handle for later use
                    backupPath.directoryHandle = directoryHandle;
                }).catch(function(err) {
                    console.error('Error selecting directory:', err);
                });
            });
        });
        $("#backupForm").submit(function(e) {
            e.preventDefault()
            if (!backupPath.value) {
                alert("Please select a backup folder");
                return;
            } else {

                alert("Backup created successfully")
            };
        });
        $("#restoreForm").submit(function(e) {
            e.preventDefault();
            alert("Restored successfully");
        });
    </script>

</body>

</html>