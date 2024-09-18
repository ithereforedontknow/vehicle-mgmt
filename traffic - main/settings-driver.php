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
    <title>Settings - Driver</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php
    include_once('navbar/navbar.php');
    ?>
    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 fw-bold">Manage Driver & Helper</h1>
            <a href="settings.php" class="text-decoration-none " style="color:inherit">
                <button class="btn btn-primary mb-2">
                    <i class="fa-solid fa-arrow-left fa-lg me-2" style="color: #ffffff;"></i> Back
                </button>
            </a>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary float-end mb-2 ms-2" data-bs-toggle="modal" data-bs-target="#add-driver-modal">
                        <i class="fa-solid fa-plus fa-lg me-2" style="color: #ffffff;"></i> New
                    </button>
                    <table class="table table-hover table-light text-center" id="driver-table">
                        <thead>
                            <th class="text-center" scope="col">Driver Name</th>
                            <th class="text-center" scope="col">Phone</th>
                            <th class="text-center" scope="col">...</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `driver`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr onclick="editDriver(<?= $row['driver_id'] ?>)" style="cursor:pointer">
                                    <td class="text-center" scope="row"><?= $row['driver_fname'] ?> <?= $row['driver_lname'] ?></td>
                                    <td class="text-center"><?= $row['driver_phone'] ?></td>
                                    <td class="text-center"><i class="fa-solid fa-arrow-right"></i></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <button class="btn btn-primary float-end mb-2 ms-2" data-bs-toggle="modal" data-bs-target="#add-helper-modal">
                        <i class="fa-solid fa-plus fa-lg me-2" style="color: #ffffff;"></i> New
                    </button>
                    <table class="table table-hover table-light text-center" id="helper-table">
                        <thead>
                            <th class="text-center" scope="col">Helper Name</th>
                            <th class="text-center" scope="col">Phone</th>
                            <th class="text-center" scope="col">...</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `helper`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr onclick="editHelper(<?= $row['helper_id'] ?>)" style="cursor:pointer">
                                    <td class="text-center" scope="row"><?= $row['helper_fname'] ?> <?= $row['helper_lname'] ?></td>
                                    <td class="text-center"><?= $row['helper_phone'] ?></td>
                                    <td class="text-center"><i class="fa-solid fa-arrow-right"></i></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once('includes/add/add-driver-modal.php');
    include_once('includes/edit/edit-driver-modal.php');
    include_once('includes/add/add-helper-modal.php');
    include_once('includes/edit/edit-helper-modal.php');
    ?>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/settings.js"></script>
</body>

</html>