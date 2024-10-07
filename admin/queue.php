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
                    <div class="p-4 shadow-sm bg-body rounded">
                        <h1 class="display-5 fw-bold text-center">Queue</h1>
                        <a class="btn btn-primary" href="view-queue.php">View on Tv or sum</a>
                        <div class="row my-3">
                            <div class="col">
                                <select id="ordinalFilter" class="form-select">
                                    <option value="">Ordinal</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="3rd/1st">3rd/1st</option>
                                </select>
                            </div>
                            <div class="col">
                                <select id="shiftFilter" class="form-select">
                                    <option value="">Shift</option>
                                    <option value="day">Day</option>
                                    <option value="night">Night</option>
                                    <option value="day/night">Day/Night</option>
                                </select>
                            </div>
                            <div class="col">
                                <select id="scheduleFilter" class="form-select">
                                    <option value="">Schedule</option>
                                    <option value="6am-2pm">6am-2pm</option>
                                    <option value="2pm-6am">2pm-6am</option>
                                    <option value="6am-2pm/2pm-6am">6am-2pm/2pm-6am</option>
                                </select>
                            </div>
                            <div class="col">
                                <select id="lineFilter" class="form-select">
                                    <option value="">Line</option>
                                    <option value="Line 3">Line 3</option>
                                    <option value="Line 4">Line 4</option>
                                    <option value="Line 5">Line 5</option>
                                    <option value="Line 6">Line 6</option>
                                    <option value="GLAD WHSE">GLAD WHSE</option>
                                    <option value="WHSE 2-BAY 2">WHSE 2-BAY 2</option>
                                    <option value="WHSE 2-BAY 3">WHSE 2-BAY 3</option>
                                </select>
                            </div>
                        </div>

                        <table class="table table-hover text-center" id="queue-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Vehicle Pass</th>
                                    <th class="text-center">Plate Number</th>
                                    <th class="text-center">Order</th>
                                    <th class="text-center">Shift</th>
                                    <th class="text-center">Schedule</th>
                                    <th class="text-center">Line</th>
                                    <th class="text-center">Priority</th>
                                    <th class="text-center">...</th>
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
                                        <td class="text-center" scope="row"><?= $row['queue_number'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['ordinal'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['shift'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['schedule'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['transfer_in_line'] ?></td>
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
    <script src="../public/js/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>
    <script src="js/queue.js"></script>
</body>

</html>