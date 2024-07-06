<?php
require '../api/db_connection.php';
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

</head>

<body class="bg-light">
    <?php
    include_once('./navbar/navbar.php');
    ?>


    <div class="content" id="content">
        <div class="container mt-5">
            <h2>Database Utilities</h2>
            <div class="row">
                <div class="col-md-6">
                    <h3>Backup Database</h3>
                    <form action="api/backup.php" method="post">
                        <button type="submit" class="btn btn-primary">Create Backup</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Restore Database</h3>
                    <form action="api/restore.php" method="post" enctype="multipart/form-data">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>

</body>

</html>