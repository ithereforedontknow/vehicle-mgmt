<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

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
          <a href="user_mgmt.php" class="nav-link active" aria-current="page">
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
          <a href="admin.php" class="nav-link text-white">
            <i class="fa-solid fa-user-tie fa-xl me-2"></i> Administrator
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content" id="content">
    <div class="container w-75 shadow-sm p-3 mb-5 bg-body rounded">
      <h1 class="display-3 text-center">User Management</h1>
      <div class="container">
        <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-user-modal">
          <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i>
          Add User</button>
        <label for="column-search">Search Name:</label>
        <input type="text" class="form-control w-25 my-2" id="column-search" placeholder="John Doe">
        <table class="table table-hover table-bordered  text-center" id="users-table">
          <thead>
            <tr>
              <th class="text-center" scope="col" style="width: 5%;">ID</th>
              <th class="text-center" scope="col" style="width: 15%;">Name</th>
              <th class="text-center" scope="col" style="width: 15%;">Userlevel</th>
              <th class="text-center" scope="col" style="width: 5%;">Status</th>
              <th class="text-center" scope="col" style="width: 15%;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("./api/db_connection.php");
            $sql = "SELECT * FROM tbl_user";
            $result = $conn->query($sql);
            $result_set = $result->fetchAll();
            if ($result_set) {
              $i = 1;
              foreach ($conn->query($sql) as $row) {
            ?> <tr>
                  <td class="text-center"><?= $row["id"]; ?></td>
                  <td class="text-center"><?= $row["fname"], " ", $row["lname"]; ?></td>
                  <td class="text-center"><?= $row["userlevel"]; ?></td>
                  <td class="text-center"><?= $row["active"] == 1 ? "Active" : "Inactive" ?></td>
                  <td class="exclude-print">
                    <button class="btn btn-primary px-2" onclick="edit_user(<?= $row['id']; ?>)">
                      <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffffff;"></i>
                      Edit
                    </button>
                    <?php
                    if ($row["active"] == 1) {
                    ?>
                      <button class="btn btn-danger px-1" onclick="deactivate_user(<?= $row['id']; ?>)">
                        <i class="fa-solid fa-user-xmark fa-lg" style="color: #ffffff;"></i>
                        Deactivate
                      </button>
                    <?php
                    } else {
                    ?>
                      <button class="btn btn-success" onclick="activate_user(<?= $row['id']; ?>)">
                        <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Activate
                      </button>
                    <?php
                    }

                    ?>
                  </td>
                </tr>
              <?php
              }
            } else {
              ?>
              <td colspan="6">
                <center>
                  <h2 class="text-muted">No Record</h2>
                  <center>
              </td>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  include_once('./includes/add-user-modal.php');
  include_once('./includes/edit-user-modal.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
  <script>
    $(document).ready(function() {
      $('#users-table').DataTable({
        "pageLength": 5,
        "lengthChange": false,
        sDom: 'lrtip'
      });
      var table = $('#users-table').DataTable();

      // Apply the search on the specified column (index 1 in this case)
      $('#column-search').on('keyup', function() {
        table
          .column(1) // The index of the column to search (0-based)
          .search(this.value)
          .draw();
      });
    });
  </script>
</body>

</html>