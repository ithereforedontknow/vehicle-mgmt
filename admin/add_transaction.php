<?php
require_once("./api/db_connection.php");
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
                            <li><a href="add_transaction.php" class="nav-link active" aria-current="page"><i class="fa-solid fa-circle fa-2xs me-2" style="color: #6f6f6f;"></i>Add Transaction</a></li>
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
                    <a href="admin.php" class="nav-link text-white">
                        <i class="fa-solid fa-user-tie fa-xl me-2"></i> Administrator
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="content" id="content">
        <div class="container w-75 shadow-sm p-5 mb-5 bg-body rounded">
            <h2 class="display-3 text-center">Vehicle Transaction</h2>
            <div class="container mt-5">
                <form>
                    <div class="mb-3">
                        <label for="vehicleProfile" class="form-label">Vehicle Profile</label>
                        <select class="form-select" name="vehicleProfile" id="vehicleProfile">
                            <option selected disabled>Select driver</option>
                            <?php
                            $sql = "SELECT * FROM tbl_vehicles";
                            $result = $conn->query($sql);
                            $result_set = $result->fetchAll();
                            if ($result_set) {
                                $i = 1;
                                foreach ($conn->query($sql) as $row) {
                            ?>
                                    <option value="<?= $row['driver_name'] ?>"><?= $row['driver_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="transferLineNo" class="form-label">Transfer Line No</label>
                        <select class="form-select" name="transferLineNo" id="transferLineNo">
                            <option selected disabled>Select transfer line no</option>
                            <option value="Line 1">Line 1</option>
                            <option value="Line 2">Line 2</option>
                            <option value="Line 3">Line 3</option>
                            <option value="Line 4">Line 4</option>
                            <option value="Line 5">Line 5</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="order" class="form-label">Ordinal</label>
                        <select class="form-select" name="order" id="order">
                            <option value="1ST">1ST</option>
                            <option value="2ND">2ND</option>
                            <option value="3RD">3RD</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="shift" class="form-label">Shift</label>
                        </div>
                        <button type="button" class="btn btn-primary">Day</button>
                        <button type="button" class="btn btn-primary">Night</button>
                        <button type="button" class="btn btn-primary">Day/Night</button>
                    </div>
                    <div class="mb-3">
                        <label for="transferInCharge" class="form-label">Transfer In Charge</label>
                        <select class="form-select" name="transferInCharge" id="transferInCharge">
                            <?php
                            $sql = "SELECT * FROM tbl_transfer_in_charge";
                            $result = $conn->query($sql);
                            $result_set = $result->fetchAll();
                            if ($result_set) {
                                $i = 1;
                                foreach ($conn->query($sql) as $row) {
                            ?>
                                    <option value="<?= $row['first_name'] . " " . $row['last_name'] ?>"><?= $row['first_name'] . " " . $row['last_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="noOfBales" class="form-label">Number of Bales</label>
                        <input type="number" class="form-control" id="noOfBales" placeholder="Enter number of bales">
                    </div>
                    <div class="mb-3">
                        <label for="kilos" class="form-label">Kilos</label>
                        <input type="number" class="form-control" id="kilos" placeholder="Enter kilos">
                    </div>
                    <div class="mb-3">
                        <label for="origin" class="form-label">Origin</label>
                        <select class="form-select" name="origin" id="origin">
                            <?php
                            $sql = "SELECT * FROM tbl_origin";
                            $result = $conn->query($sql);
                            $result_set = $result->fetchAll();
                            if ($result_set) {
                                $i = 1;
                                foreach ($conn->query($sql) as $row) {
                            ?>
                                    <option value="<?= $row['origin'] ?>"><?= $row['origin'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>

    <script src="admin.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "pageLength": 5,
                "lengthChange": false,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#addRow').on('click', function() {
                var newRow = `
        <tr>
          <td><input type="text" class="table-input" value=""></td>
          <td><input type="text" class="table-input" value=""></td>
          <td><input type="text" class="table-input" value=""></td>
        </tr>
      `;
                $('table tbody').append(newRow);
            });
        });
    </script>
</body>

</html>