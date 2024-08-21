<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
  header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'admin') {

  if ($_SESSION['userlevel'] == 'traffic(main)') {
    header("location: ../traffic(main)/index.php");
  } elseif ($_SESSION['userlevel'] == 'encoder') {
    header("location: ../encoder/index.php");
  } elseif ($_SESSION['userlevel'] == 'traffic(branch)') {
    header("location: ../traffic(branch)/index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
  <?php include_once('./navbar/navbar.php'); ?>
  <div class="content" id="content">
    <div class="container shadow-sm p-3 mb-5 bg-body rounded">
      <h2 class="display-3 text-center">User Management</h2>
      <div class="container">
        <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-user-modal">
          <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Add User
        </button>
        <label for="column-search">Search Name:</label>
        <input type="text" class="form-control w-25 my-2" id="column-search" placeholder="John Doe">
        <table class="table table-hover table-bordered text-center" id="users-table">
          <thead>
            <tr>
              <th class="text-center" scope="col" style="width: 5%;">ID</th>
              <th class="text-center" scope="col" style="width: 15%;">Name</th>
              <th class="text-center" scope="col" style="width: 15%;">Username</th>
              <th class="text-center" scope="col" style="width: 15%;">Userlevel</th>
              <th class="text-center" scope="col" style="width: 5%;">Status</th>
              <th class="text-center" scope="col" style="width: 15%;">Action</th>
            </tr>
          </thead>
          <tbody id="user-data">
            <!-- User data will be injected here by JavaScript -->
          </tbody>
        </table>
        <nav>
          <ul class="pagination" id="pagination">
            <!-- Pagination controls will be injected here by JavaScript -->
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <?php
  include_once('./includes/add/add-user-modal.php');
  include_once('./includes/edit/edit-user-modal.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
  <script src="js/admin.js"></script>
  <script src="js/users.js"></script>
</body>

</html>