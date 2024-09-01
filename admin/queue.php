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
                                $sql = "SELECT * FROM `transaction` inner join vehicle on transaction.vehicle_id = vehicle.vehicle_id where status = 'arrived'";
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
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>
    <?php
    include_once('./includes/add/add-queue-modal.php');
    ?>
</body>

</html>