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
    <title>Queue Management</title>
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
            <h1 class="display-5 fw-bold mb-3">Queue Management</h1>
            <div class="row">
                <div class="col">
                    <div class="p-4 shadow-sm bg-body rounded text-center">
                        <h1 class="display-5 fw-bold">Arrived</h1>
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="">Plate Number</th>
                                    <th class="">Arrival Time</th>
                                    <th class="">Waiting Time (hours)</th>
                                    <th class="">Total Time On-Site (hours)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM transaction inner join vehicle on transaction.vehicle_id = vehicle.vehicle_id where status = 'arrived'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['arrival_time'] ?></td>
                                        <td class="text-center" scope="row"></td>
                                        <td class="text-center" scope="row"></td>
                                        <td><button class='btn btn-primary' onclick="addQueue(<?= $row['transaction_id'] ?>)">Queue</button></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div class="p-4 shadow-sm bg-body rounded text-center">
                        <h1 class="display-5 fw-bold">Queue</h1>
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Plate Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM transaction inner join vehicle on transaction.vehicle_id = vehicle.vehicle_id where status = 'arrived'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                                        <td><button class='btn btn-primary' onclick="viewQueue(<?= $row['transaction_id'] ?>)">View</button></td>
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
    </div>
    <?php
    include_once('./includes/add/add-queue-modal.php');
    ?>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>
</body>

</html>