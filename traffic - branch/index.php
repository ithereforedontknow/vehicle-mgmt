<?php
require_once '../api/db_connection.php';
session_start();
if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] !== 'traffic(branch)') {
    header("location: ../" . $_SESSION['userlevel'] . "/index.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Transactions</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body class="bg-light">

    <?php
    include_once('./navbar/navbar.php');
    ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">User Management</h1>
            <form id="add-transaction">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="to-reference" name="to-reference" required>
                            <label for="to-reference" class="form-label">TO Reference #</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select" name="hauler_id" id="hauler_id" required>
                                <?php
                                $sql = "SELECT * FROM `hauler`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['hauler_id'] . '">' . $row['hauler_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="hauler" class="form-label">Hauler</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select" name="vehicle_id" id="vehicle_id" required>
                                <?php
                                $sql = "SELECT * FROM `vehicle`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['vehicle_id'] . '">' . $row['plate_number'] . ' : ' . $row['truck_type'] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="plate-number" class="form-label">Plate Number</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select" name="driver_id" id="driver_id" required>
                                <?php
                                $sql = "SELECT * FROM `driver`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['driver_id'] . '">' . $row['driver_fname'] . ' ' . $row['driver_lname'] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="driver-name" class="form-label">Driver Name</label>
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-floating mb-4">
                            <select class="form-select" name="project_id" id="project_id" required>
                                <?php
                                $sql = "SELECT * FROM `project`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['project_id'] . '">' . $row['project_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="project" class="form-label">Project</label>

                        </div>

                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" id="no-of-bales" name="no-of-bales" required>
                            <label for="no-of-bales" class="form-label">No of Bales</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" id="kilos" name="kilos" required>
                            <label for="kilos" class="form-label">Kilos</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select name="origin" id="origin_id" class="form-select">
                                <?php
                                $sql = "SELECT * FROM `origin`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['origin_id'] . '">' . $row['origin_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="origin" class="form-label">Origin</label>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include_once('help.php');
    ?>
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>
</body>

</html>