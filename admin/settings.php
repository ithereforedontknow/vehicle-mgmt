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
    <title>Settings</title>
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
        <div class="row">
            <div class="col-sm">
                <div class="container shadow-sm p-5 mb-5 bg-body rounded">
                    <h2 class="display-5 text-center">Add Hauler</h2>
                    <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-hauler-modal">
                        <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Add
                    </button>
                    <table class="table table-hover table-bordered text-center" id="hauler-table">
                        <thead>
                            <th class="text-center" scope="col">Hauler</th>
                            <th class="text-center" scope="col">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `hauler`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $row['hauler_name'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary px-2 edit-hauler" data-id="<?= $row['hauler_id'] ?>">
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
            <div class="col-sm">
                <div class="container shadow-sm p-5 mb-5 bg-body rounded">
                    <h2 class="display-5 text-center">Add Vehicle</h2>
                    <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-vehicle-modal">
                        <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Add
                    </button>
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
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="container shadow-sm p-5 mb-5 bg-body rounded">
                    <h2 class="display-5 text-center">Add Driver</h2>
                    <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-driver-modal">
                        <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Add
                    </button>
                    <table class="table table-hover table-bordered text-center" id="driver-table">
                        <thead>
                            <th class="text-center" scope="col">Driver Name</th>
                            <th class="text-center" scope="col">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `driver`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $row['driver_name'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary px-2 edit-driver" data-id="<?= $row['driver_id'] ?>">
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
            <div class="col-sm">
                <div class="container shadow-sm p-5 mb-5 bg-body rounded">
                    <h2 class="display-5 text-center">Add Project</h2>
                    <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-project-modal">
                        <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Add
                    </button>
                    <table class="table table-hover table-bordered text-center" id="project-table">
                        <thead>
                            <th class="text-center" scope="col">Project</th>
                            <th class="text-center" scope="col">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `project`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $row['project_name'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary px-2 edit-project" data-id="<?= $row['project_id'] ?>">
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
        </div>
    </div>
    <?php
    include('./includes/add/add-driver-modal.php');
    include_once('./includes/add/add-hauler-modal.php');
    include_once('./includes/add/add-project-modal.php');
    include_once('./includes/add/add-vehicle-modal.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/settings.js"></script>


</body>

</html>