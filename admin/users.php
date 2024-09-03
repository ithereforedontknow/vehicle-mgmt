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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
  <?php include_once('./navbar/navbar.php'); ?>
  <div class="content" id="content">
    <div class="container">
      <h1 class="display-5 mb-3 fw-bold">User Management</h1>
      <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-user-modal">
        <i class="fa-solid fa-user-plus fa-lg" style="color: #ffffff;"></i> Add User
      </button>
      <input type="text" class="form-control w-25 my-2" id="column-search" placeholder="Search Name:">
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
  <?php
  include_once('./includes/add/add-user-modal.php');
  include_once('./includes/edit/edit-user-modal.php');
  ?>
  <script src="../public/js/bootstrap.bundle.min.js"></script>
  <script src="../public/js/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
  <script src="js/admin.js"></script>
  <script src="js/users.js"></script>
</body>

</html>