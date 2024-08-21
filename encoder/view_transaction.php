<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'encoder') {

    if ($_SESSION['userlevel'] == 'admin') {
        header("location: ../admin/index.php");
    } elseif ($_SESSION['userlevel'] == 'traffic(main)') {
        header("location: ../traffic(main)/index.php");
    } else {
        header("location: ../traffic(branch)/index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>

    <div class="content" id="content">
        <div class="container w-75 shadow-sm p-5 mb-5 bg-body rounded">
            <h2 class="display-3 text-center">Transactions</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="transactions-table" class="display table table-borderless" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">To Reference</th>
                                <th class="text-center" scope="col">Arrival Time</th>
                                <th class="text-center" scope="col">Time of Entry</th>
                                <th class="text-center" scope="col">Unloading Time Start</th>
                                <th class="text-center" scope="col">Unloading Time End</th>
                                <th class="text-center" scope="col">Time of Departure</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="transaction-data">

                            <?php
                            $sql = "SELECT * FROM Transaction";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td></td>
                                        <td class='text-center'><?= $row['transaction_id'] ?></td>
                                        <td class='text-center'><?= $row['to_reference'] ?></td>
                                        <td class='text-center'><?= $row['arrival_time'] ?></td>
                                        <td class='text-center'><?= $row['time_of_entry'] ?></td>
                                        <td class='text-center'><?= $row['unloading_time_start'] ?></td>
                                        <td class='text-center'><?= $row['unloading_time_end'] ?></td>
                                        <td class='text-center'><?= $row['time_of_departure'] ?></td>
                                        <td class='text-center'><?= $row['status'] ?></td>
                                        <?php
                                        if ($row['status'] == 'ongoing') {
                                        ?>
                                            <td class='text-center'>
                                                <button class='btn btn-success' onclick="done_transaction(<?= $row['transaction_id'] ?>)">Done</button>
                                            </td>
                                        <?php
                                        } else {
                                        ?>
                                            <td class='text-center'>
                                                <button class='btn btn-secondary' onclick="ongoing_transaction(<?= $row['transaction_id'] ?>)">Ongoing</button>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>
    <script>
        $("#transactions-table").dataTable();
    </script>

</body>

</html>