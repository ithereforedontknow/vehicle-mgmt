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
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Plate Number</th>
                                    <th>Arrival Time</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM transaction inner join vehicle on transaction.vehicle_id = vehicle.vehicle_id inner join arrival on transaction.transaction_id = arrival.transaction_id where status = 'arrived'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr onclick="addToQueue(<?= $row['transaction_id'] ?>)" style="cursor: pointer;">
                                        <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['arrival_time'] ?></td>
                                        <td class="text-center" scope="row"><i class="fa-solid fa-arrow-right"></i></td>

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
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Queue Number</th>
                                    <th>Plate Number</th>
                                    <th>Priority</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody id="queueTable">
                                <?php
                                $sql = "SELECT * FROM transaction inner join vehicle on transaction.vehicle_id = vehicle.vehicle_id inner join queue on transaction.transaction_id = queue.transaction_id where status = 'queue' order by priority desc";
                                $result = mysqli_query($conn, $sql);
                                $queue = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr onclick="viewQueue(<?= $row['transaction_id'] ?>)" style="cursor: pointer;">
                                        <td class="text-center" scope="row"><?= $queue++ ?></td>
                                        <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                                        <td class="text-center" scope="row">
                                            <?= $row['priority'] == 1 ? 'High' : 'Low' ?>
                                        </td>
                                        <td class="text-center" scope="row"><i class="fa-solid fa-arrow-right"></i></td>
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
    include_once('./includes/add/add-queue-offcanvas.php');
    include_once('./includes/view/view-queue-offcanvas.php');
    ?>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>
    <script src="js/queue.js"></script>


</body>

</html>