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
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
  <?php include_once('./navbar/navbar.php'); ?>
  <div class="content" id="content">
    <div class="container">
      <h1 class="display-5 mb-3 fw-bold">User Management</h1>
      <button class="btn btn-primary float-end mb-2" data-bs-toggle="offcanvas" data-bs-target="#addUserOffcanvas">
        <i class="fa-solid fa-plus fa-lg me-2" style="color: #ffffff;"></i> New User
      </button>
      <input type="text" class="form-control w-25 my-2" id="column-search" placeholder="Search Name:">
      <table class="table table-hover text-center table-light" id="users-table">
        <thead>
          <tr>
            <th class="text-center" scope="col" style="width: 5%;">ID</th>
            <th class="text-center" scope="col" style="width: 15%;">Name</th>
            <th class="text-center" scope="col" style="width: 15%;">Username</th>
            <th class="text-center" scope="col" style="width: 15%;">Userlevel</th>
            <th class="text-center" scope="col" style="width: 5%;">Status</th>
            <th class="text-center" scope="col" style="width: 1%;">...</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM users";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr onclick="editUser(<?= $row['id'] ?>)" style="cursor: pointer;">
                <td class='text-center'><?= $row['id'] ?></td>
                <td class='text-center'><?= $row['fname'] . ' ' . $row['lname'] ?></td>
                <td class='text-center'><?= $row['username'] ?></td>
                <td class='text-center'><?= $row['userlevel'] ?></td>
                <td class='text-center'><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></td>
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
  include_once('./includes/edit/edit-user-offcanvas.php');
  include_once('./includes/add/add-user-offcanvas.php');
  ?>
  <script src="../public/js/bootstrap.bundle.min.js"></script>
  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/sweetalert2.all.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
  <script src="js/admin.js"></script>
  <script src="js/users.js"></script>
</body>

</html>