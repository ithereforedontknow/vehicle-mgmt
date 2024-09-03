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
    <title>Settings - Vehicle</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php
    include_once('navbar/navbar.php');
    ?>
    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 fw-bold">Manage Vehicle</h1>
            <button class="btn btn-primary float-end mb-2 ms-2" data-bs-toggle="modal" data-bs-target="#add-vehicle-modal">
                <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Add
            </button>
            <a href="settings.php" class="text-decoration-none" style="color:inherit">
                <button class="btn btn-primary float-end mb-2">
                    <i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i> Back
                </button>
            </a>
            <table class="table table-hover table-bordered text-center" id="vehicle-table">
                <thead>
                    <th class="text-center" scope="col">Plate Number</th>
                    <th class="text-center" scope="col">Truck Type</th>
                    <th class="text-center" scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `vehicle`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                            <td class="text-center" scope="row"><?= $row['truck_type'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-primary px-2 edit-vehicle" data-id="<?= $row['vehicle_id'] ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php
    include_once('includes/add/add-vehicle-modal.php');
    ?>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/settings.js"></script>
</body>

</html>