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
    <title>Finished Transactions</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">Finished Transactions</h1>
            <div class="mb-3">
                <input type="text" id="search-input" class="form-control w-25" placeholder="Search Transactions">
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-light text-center small-font" id="transactions-table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">To Reference</th>
                            <th class="text-center" scope="col">Time of Departure</th>
                            <th class="text-center" scope="col">Unloading Time End</th>
                            <th class="text-center" scope="col">Demurrage</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-data">
                        <?php
                        $sql = "SELECT * FROM Transaction 
                        inner join unloading on transaction.transaction_id = unloading.transaction_id 
                        inner join arrival on transaction.transaction_id = arrival.transaction_id
                        join demurrage
                        WHERE status = 'done' ORDER BY time_of_departure DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td class='text-center'><?= $row['transaction_id'] ?></td>
                                    <td class='text-center'><?= $row['to_reference'] ?></td>
                                    <td class='text-center'><?= $row['time_of_departure'] ?></td>
                                    <td class='text-center'><?= $row['unloading_time_end'] ?></td>

                                    <td class='text-center'>&#8369;
                                        <?php
                                        $transactionCreatedAt = strtotime($row['created_at']);
                                        $timeOfEntry = strtotime($row['time_of_entry']);

                                        if (is_numeric($transactionCreatedAt) && is_numeric($timeOfEntry)) {
                                            // Calculate the time difference in seconds
                                            $timeDifference = $timeOfEntry - $transactionCreatedAt;
                                            // Convert time difference to hours
                                            $hours = floor($timeDifference / 3600);
                                            // echo "Total Hours: " . $hours . "<br>";
                                            if ($hours > 48) {
                                                $hours -= 48; // Remove the first 48 hours from the calculation
                                                $demurrage = $row['demurrage']; // Assuming demurrage is 102 per hour
                                                $total = $hours * $demurrage;
                                                echo $total;
                                            } else {
                                                echo "0";
                                            }
                                        } else {
                                            echo "Invalid time format";
                                        }
                                        ?>

                                    </td>
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