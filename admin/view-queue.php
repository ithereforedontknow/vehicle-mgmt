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


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="p-4 shadow-sm bg-body rounded text-center">
                    <h1 class="display-5 fw-bold">Arrived</h1>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>Plate Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM transaction inner join vehicle on transaction.vehicle_id = vehicle.vehicle_id inner join arrival on transaction.transaction_id = arrival.transaction_id where status = 'arrived'";
                            $result = mysqli_query($conn, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $i++ ?></td>
                                    <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="p-4 shadow-sm bg-body rounded mb-4">
                    <h1 class="display-5 fw-bold text-center">To Enter</h1>
                    <?php

                    $sql = "SELECT 
                                queue.queue_id,
                                queue.queue_number,
                                queue.ordinal,
                                queue.shift,
                                queue.schedule,
                                queue.transfer_in_line,
                                queue.priority,
                                vehicle.plate_number,
                                vehicle.truck_type,
                                driver.driver_fname,
                                driver.driver_lname,
                                transaction.status
                            FROM 
                                queue 
                            INNER JOIN 
                                transaction ON queue.transaction_id = transaction.transaction_id 
                            INNER JOIN 
                                vehicle ON transaction.vehicle_id = vehicle.vehicle_id 
                            INNER JOIN 
                                driver ON transaction.driver_id = driver.driver_id
                            WHERE 
                                transaction.status = 'standby'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="text-center">
                        <h5 class="">Plate Number: <?php echo $row['plate_number'] ?> </h5>
                        <h5 class="">Driver: <?php echo $row['driver_fname'] . ' ' . $row['driver_lname'] ?> </h5>
                    </div>
                </div>
                <div class="p-4 shadow-sm bg-body rounded">
                    <div class="">
                        <h1 class="display-5 fw-bold text-center">On Queue</h1>

                        <table class="table table-hover text-center">
                            <thead>
                                <th class="text-center">Plate Number</th>
                                <th class="text-center">Line</th>
                                <th class="text-center">Ordinal</th>
                                <th class="text-center">Type</th>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT 
                                            queue.queue_id,
                                            queue.queue_number,
                                            queue.ordinal,
                                            queue.shift,
                                            queue.schedule,
                                            queue.transfer_in_line,
                                            queue.priority,
                                            vehicle.plate_number,
                                            vehicle.truck_type,
                                            transaction.status
                                        FROM 
                                            queue 
                                        INNER JOIN 
                                            transaction ON queue.transaction_id = transaction.transaction_id 
                                        INNER JOIN 
                                            vehicle ON transaction.vehicle_id = vehicle.vehicle_id 
                                        INNER JOIN 
                                            driver ON transaction.driver_id = driver.driver_id
                                        WHERE 
                                            transaction.status = 'queue'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td class="text-center" scope="row"><?= $row['plate_number'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['transfer_in_line'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['ordinal'] ?></td>
                                        <td class="text-center" scope="row"><?= $row['truck_type'] ?></td>
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