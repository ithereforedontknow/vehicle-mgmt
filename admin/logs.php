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
    <title>Vehicle Logs</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <style>
        .details-control {
            cursor: pointer;
        }

        .hiddenRow {
            display: none;
        }
    </style>
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">Logs</h1>
            <div class="mb-3">
                <input type="text" id="search-input" class="form-control" placeholder="Search Transactions">
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center small-font" id="transactions-table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col"></th> <!-- Placeholder for child row control -->
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">No. Of Bales</th>
                            <th class="text-center" scope="col">Kilos</th>
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
                        $sql = "SELECT * FROM Transaction WHERE status = 'ongoing' ORDER BY transaction_id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td class="details-control">&#x25BA;</td>
                                    <td class='text-center'><?= $row['transaction_id'] ?></td>
                                    <td class='text-center'><?= $row['to_reference'] ?></td>
                                    <td class='text-center'><?= $row['arrival_time'] ?></td>
                                    <td class='text-center'><?= $row['time_of_entry'] ?></td>
                                    <td class='text-center'><?= $row['unloading_time_start'] ?></td>
                                    <td class='text-center'><?= $row['unloading_time_end'] ?></td>
                                    <td class='text-center'><?= $row['time_of_departure'] ?></td>
                                    <td class='text-center'><?= $row['status'] ?></td>
                                    <td class='text-center'>
                                        <button class="btn btn-primary" onclick="editTransaction(<?= $row['transaction_id'] ?>)">Done</button>
                                    </td>
                                </tr>
                                <tr class="hiddenRow">
                                    <td colspan="10">
                                        <div class="extra-details">
                                            <a>Transfer In Line:</a> <?= $row['transfer_in_line'] ?><br>
                                            <a>Ordinal:</a> <?= $row['ordinal'] ?><br>
                                            <a>Shift:</a> <?= $row['shift'] ?><br>
                                            <a>Schedule:</a> <?= $row['schedule'] ?><br>
                                            <a>No. of Bales:</a> <?= $row['no_of_bales'] ?><br>
                                            <a>Kilos:</a> <?= $row['kilos'] ?><br>
                                            <a>Origin:</a> <?= $row['origin'] ?>
                                        </div>
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
        <script src="../public/js/bootstrap.bundle.min.js"></script>
        <script src="../public/js/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
        <script src="js/admin.js"></script>
        <script src="js/transaction.js"></script>
        <script>
            $(document).ready(function() {
                // Filter functionality
                const rows = $('#transactions-table tbody tr').toArray();
                $('#search-input').on('keyup', function() {
                    const value = $(this).val().toLowerCase();
                    rows.forEach(row => row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none');
                });

                // Toggle child rows
                $('#transactions-table tbody').on('click', 'td.details-control', function() {
                    var tr = $(this).closest('tr');
                    var row = tr.next();
                    if (row.hasClass('hiddenRow')) {
                        row.toggle();
                        $(this).html(row.is(':visible') ? '&#x25BC;' : '&#x25BA;'); // Toggle icon
                    }
                });
            });
        </script>
    </div>
    <?php
    include_once('includes/edit/edit-transaction-modal.php');
    ?>
</body>

</html>