<?php

require_once '../api/db_connection.php';

session_start();

if (!isset($_SESSION['id']) || $_SESSION['userlevel'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php
    include_once('./navbar/navbar.php');
    ?>


    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 fw-bold mb-4">Settings</h1>
            <hr>
            <div>
                <div class="row mb-4 mt-4">
                    <h4 class="fw-bold mb-5">Transaction Settings</h4>
                    <div class="col-2 text-center" id="haulers">
                        <a class="text-decoration-none" href="settings-hauler.php" style="color: #1b3667">
                            <i class="fa-solid fa-warehouse fa-2xl"></i>
                            <p class="mt-3">Haulers</p>
                        </a>
                    </div>
                    <div class="col-2 text-center" id="vehicles">
                        <a class="text-decoration-none" href="settings-hauler.php" style="color: #1b3667">
                            <i class="fa-solid fa-truck fa-2xl"></i>
                            <p class="mt-3">Vehicles</p>
                        </a>
                    </div>
                    <div class="col-2 text-center" id="drivers">
                        <a class="text-decoration-none" href="settings-hauler.php" style="color: #1b3667">
                            <i class="fa-regular fa-id-card fa-2xl"></i>
                            <p class="mt-3">Drivers</p>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row mb-4 mt-4">
                    <h4 class="fw-bold mb-5">Utilities</h4>
                    <div class="col-2 text-center">
                        <a class="text-decoration-none" href="settings-backup.php" style="color: #1b3667">
                            <i class="fa-solid fa-database fa-2xl"></i>
                            <p class="mt-3">Backup & Restore</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/settings.js"></script>


</body>

</html>