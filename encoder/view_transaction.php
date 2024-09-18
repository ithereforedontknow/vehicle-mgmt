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
    <title>Vehicle Transactions</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">Transactions (Departed)</h1>
            <button class="btn btn-primary float-end mb-2" data-bs-toggle="offcanvas" data-bs-target="#addTransactionOffcanvas">
                <i class="fa-solid fa-plus fa-lg me-2" style="color: #ffffff;"></i> New Transaction
            </button>
            <div class="mb-3">
                <input type="text" id="search-input" class="form-control w-25" placeholder="Search Transactions">
            </div>
            <div class="table-responsive">
                <table class="table table-hover text-center table-light" id="transactions-table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">TO Reference</th>
                            <th class="text-center" scope="col">No. Of Bales</th>
                            <th class="text-center" scope="col">Kilos</th>
                            <th class="text-center" scope="col">Origin</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">...</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-data">
                        <?php
                        $sql = "SELECT * FROM Transaction WHERE status = 'departed' ORDER BY transaction_id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr onclick="editTransaction(<?= $row['transaction_id'] ?>)" style="cursor: pointer;">
                                    <td class='text-center'><?= $row['transaction_id'] ?></td>
                                    <td class='text-center'><?= $row['to_reference'] ?></td>
                                    <td class='text-center'><?= $row['no_of_bales'] ?></td>
                                    <td class='text-center'><?= $row['kilos'] ?></td>
                                    <td class='text-center'><?= $row['origin'] ?></td>
                                    <td class='text-center'><?= $row['status'] ?></td>
                                    <td class='text-center'><i class="fa-solid fa-arrow-right"></i></td>
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
        include_once('includes/edit/edit-transaction-offcanvas.php');
        include_once('includes/add/add-transaction-offcanvas.php');
        ?>
        <script src="../public/js/jquery.min.js"></script>
        <script src="../public/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
        <script src="js/admin.js"></script>
        <script src="js/transaction.js"></script>
    </div>

</body>

</html>