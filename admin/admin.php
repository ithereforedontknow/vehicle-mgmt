<?php
require_once("./api/db_connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top px-3">
        <button class="btn btn-dark" id="sidebarToggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="">Integrated In-house Vehicle Management System</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-primary float-end" type="button" onclick="logout_user()">
                        Logout
                    </button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="sidebar" id="sidebar">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100svh">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">

                    <a href="index.php" class="nav-link text-white">
                        <i class="fa-solid fa-chart-line fa-lg me-2" style="color: #ffffff;"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="user_mgmt.php" class="nav-link text-white">
                        <i class="fa-solid fa-users fa-lg me-2" style="color: #ffffff;"></i>
                        Users
                    </a>
                </li>
                <li>
                    <a href="vehicle_profiles.php" class="nav-link text-white">
                        <i class="fa-solid fa-truck fa-lg me-2" style="color: #ffffff;"></i>
                        Vehicle Profiles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="vehicleTransactionsDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#vehicleTransactionsSubmenu" aria-expanded="true">
                        <i class="fa-solid fa-scroll fa-lg me-2" style="color: #ffffff;"></i>
                        Vehicle Transactions
                    </a>
                    <div class="collapse show" id="vehicleTransactionsSubmenu">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                            <li><a href="add_transaction.php" class="nav-link text-white"><i class="fa-solid fa-circle fa-2xs me-2" style="color: #6f6f6f;"></i>Add Transaction</a></li>
                            <li><a href="view_transaction.php" class="nav-link text-white"><i class="fa-solid fa-circle fa-2xs me-2" style="color: #6f6f6f;"></i>View Transactions</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="report_generation.php" class="nav-link text-white">
                        <i class="fa-solid fa-print fa-lg me-2" style="color: #ffffff;"></i>
                        Report Generation
                    </a>
                </li>
                <li>
                    <a href="admin.php" class="nav-link active" aria-current="page">
                        <i class="fa-solid fa-user-tie fa-xl me-2"></i> Administrator
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="content" id="content">
        <div class="row">
            <div class="col-sm">
                <div class="shadow-sm p-5 mb-5 bg-body rounded">
                    <h1>Add Transfer In Charge</h1>
                    <form id="transferInChargeForm" class="mb-4">
                        <div class="form-row mb-3">
                            <div class="form-group ">
                                <label for="employeeFirstName">First Name</label>
                                <input type="text" class="form-control" id="employeeFirstName" placeholder="John" required>
                                <label for="employeeLastName">Last Name</label>
                                <input type="text" class="form-control" id="employeeLastName" placeholder="Doe" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                    <table class="table table-hover table-bordered  text-center" id="transfer-in-charge-table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_transfer_in_charge";
                            $result = $conn->query($sql);
                            $result_set = $result->fetchAll();
                            if ($result_set) {
                                foreach ($result_set as $row) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $row["first_name"], " ", $row["last_name"]; ?></td>
                                        <td class="text-center"><?= $row["status"] == 1 ? "Active" : "Inactive" ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary px-2" onclick="edit_transfer_in_charge(<?= $row['transfer_in_charge_id']; ?>)">
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffffff;"></i>
                                                Edit
                                            </button>
                                            <?php
                                            if ($row["status"] == 1) {
                                            ?>
                                                <button class="btn btn-danger px-1" onclick="deactivate_transfer_in_charge(<?= $row['transfer_in_charge_id']; ?>)">
                                                    <i class="fa-solid fa-user-xmark fa-lg" style="color: #ffffff;"></i>
                                                    Deactivate
                                                </button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-success" onclick="activate_transfer_in_charge(<?= $row['transfer_in_charge_id']; ?>)">
                                                    <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Activate
                                                </button>
                                            <?php
                                            }

                                            ?>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?> <?php
                                }
                                    ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm">
                <div class="shadow-sm p-5 mb-5 bg-body rounded">
                    <h1>Add Origin</h1>
                    <form id="originForm" class="mb-4">
                        <div class="form-row mb-3">
                            <div class="form-group ">
                                <input type=" text" class="form-control" id="origin" placeholder="Origin" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                    <table class="table table-hover table-bordered  text-center" id="origin-table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Origin</th>
                                <th class="text-center" scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_origin";
                            $result = $conn->query($sql);
                            $result_set = $result->fetchAll();
                            if ($result_set) {
                                foreach ($result_set as $row) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $row["origin"] ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary px-2" onclick="edit_origin(<?= $row['origin_id']; ?>)">
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffffff;"></i>
                                                Edit
                                            </button>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?> <?php
                                }
                                    ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php

    include('./includes/edit-transfer-in-charge-modal.php');
    include('./includes/edit-origin-modal.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <script src="admin.js"></script>
    <script>
        $(document).ready(function() {
            $('#transfer-in-charge-table').DataTable({
                "pageLength": 5,
                "lengthChange": false,

            });
            $("#origin-table").DataTable({
                "pageLength": 5,
                "lengthChange": false,

            });
        });
    </script>
</body>

</html>