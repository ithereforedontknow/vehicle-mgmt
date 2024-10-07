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
                            <th class="text-center" scope="col">Demurrage</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-data">
                        <?php
                        $sql = "SELECT * FROM Transaction
                        inner join unloading on transaction.transaction_id = unloading.transaction_id
                        WHERE status = 'standby' OR status = 'ongoing' ORDER BY time_of_entry DESC";
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
                                    <td class="text-center">
                                        <?php
                                        if ($row['status'] === 'standby') {
                                        ?>
                                            <form class="unloading-start-form d-flex justify-content-center align-items-center">
                                                <input type="hidden" name="unloading-start-id" value="<?= $row['transaction_id'] ?>">
                                                <input type="datetime-local" class="form-control" name="unloading-start-time" style="width: auto;" required>
                                                <button type="submit" class="btn btn-primary ms-2">Save</button>
                                            </form>
                                        <?php
                                        } else {
                                            echo $row['unloading_time_start'];
                                        }
                                        ?>
                                    </td>
                                    <td class='text-center'><?= $row['time_spent_waiting_area'] . " hours" ?></td>
                                    <td class='text-center'>&#8369;<?= $row['demurrage'] ?></td>
                                    <td class='text-center'><?= $row['status'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary" onclick="doneTransaction(<?= $row['transaction_id'] ?>)">Done</button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='10'>0 results</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        include_once('includes/edit/edit-transaction-modal.php');
        ?>
        <script src="../public/js/jquery.min.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
        <script src="../public/js/sweetalert2.all.min.js"></script>
        <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
        <script src="js/admin.js"></script>
        <script src="js/unloading.js"></script>
        <script src="js/transaction.js"></script>
    </div>
</body>

</html>