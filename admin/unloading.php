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
    <title>Vehicle Unloading</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">Unloading Vehicles</h1>
            <div class="mb-3">
                <input type="text" id="search-input" class="form-control w-25" placeholder="Search Transactions">
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-light text-center small-font" id="transactions-table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">To Reference</th>
                            <th class="text-center" scope="col">No. Of Bales</th>
                            <th class="text-center" scope="col">Kilos</th>
                            <th class="text-center" scope="col">Time of Entry</th>
                            <th class="text-center" scope="col">Unloading Time Start</th>
                            <th class="text-center" scope="col">Time in waiting area</th>
                            <!-- <th class="text-center" scope="col">Demurrage</th> -->
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-data">
                        <?php
                        $sql = "SELECT * FROM Transaction 
                        inner join unloading on transaction.transaction_id = unloading.transaction_id 
                        inner join arrival on transaction.transaction_id = arrival.transaction_id
                        join demurrage
                        WHERE status = 'ongoing' ORDER BY transaction.transaction_id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td class='text-center'><?= $row['transaction_id'] ?></td>
                                    <td class='text-center'><?= $row['to_reference'] ?></td>
                                    <td class='text-center'><?= $row['no_of_bales'] ?></td>
                                    <td class='text-center'><?= $row['kilos'] ?></td>
                                    <td class='text-center'><?= $row['time_of_entry'] ?></td>
                                    <td class='text-center'><?= $row['unloading_time_start'] ?></td>
                                    <td class='text-center'>
                                        <?php
                                        // TODO : mali ang computation
                                        $arrival_time = strtotime($row['arrival_time']);  // Convert to timestamp
                                        $time_of_entry = strtotime($row['time_of_entry']);  // Convert to timestamp

                                        if (is_numeric($arrival_time) && is_numeric($time_of_entry)) {
                                            $time_difference = $time_of_entry - $arrival_time;

                                            // Calculate hours, minutes, and seconds
                                            $hours = floor($time_difference / 3600);
                                            $minutes = floor(($time_difference % 3600) / 60);
                                            $seconds = $time_difference % 60;

                                            echo "{$hours}h {$minutes}m {$seconds}s";
                                        } else {
                                            echo "Invalid time format";
                                        }
                                        ?>
                                    </td>
                                    <!-- <td class='text-center'>&#8369;
                                        <?php
                                        $transactionCreatedAt = strtotime($row['created_at']);
                                        $timeOfEntry = strtotime($row['time_of_entry']);

                                        if (is_numeric($transactionCreatedAt) && is_numeric($timeOfEntry)) {
                                            // Calculate the time difference in seconds
                                            $timeDifference = $timeOfEntry - $transactionCreatedAt;
                                            // Convert time difference to hours
                                            $hours = floor($timeDifference / 3600);
                                            echo "Total Hours: " . $hours . "<br>";
                                            if ($hours > 48) {
                                                $hours -= 48; // Remove the first 48 hours from the calculation
                                                $demurrage = $row['demurrage']; // Assuming demurrage is 102 per hour
                                                $total = $hours * $demurrage;
                                                echo "Demurrage Total: " . $total;
                                            } else {
                                                echo "Demurrage Total: 0";
                                            }
                                        } else {
                                            echo "Invalid time format";
                                        }
                                        ?>

                                    </td> -->
                                    <td class='text-center'><?= $row['status'] ?></td>
                                    <td class="text-center"><button class="btn btn-primary" onclick="doneTransaction(<?= $row['transaction_id'] ?>)">Done</button></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        include_once('includes/edit/edit-transaction-modal.php');
        ?>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
        <script src="../public/js/jquery.min.js"></script>
        <script src="../public/js/sweetalert2.all.min.js"></script>
        <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
        <script src="js/admin.js"></script>
        <script src="js/transaction.js"></script>

    </div>
</body>

</html>