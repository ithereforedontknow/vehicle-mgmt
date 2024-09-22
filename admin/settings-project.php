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
    <title>Settings - Project</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">
    <?php
    include_once('navbar/navbar.php');
    ?>
    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 fw-bold">Manage Project</h1>
            <button class="btn btn-primary float-end mb-2 ms-2" data-bs-toggle="modal" data-bs-target="#add-project-modal">
                <i class="fa-solid fa-plus fa-lg me-2" style="color: #ffffff;"></i> New
            </button>
            <a href="settings.php" class="text-decoration-none" style="color:inherit">
                <button class="btn btn-primary float-end mb-2">
                    <i class="fa-solid fa-arrow-left fa-lg me-2" style="color: #ffffff;"></i> Back
                </button>
            </a>
            <table class="table table-hover text-center table-light" id="hauler-table">
                <thead>
                    <th class="text-center" scope="col">Project</th>
                    <th class="text-center" scope="col">Description</th>
                    <th class="text-center" scope="col">...</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `project`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr onclick="editProject(<?= $row['project_id'] ?>)" style="cursor: pointer;">
                            <td class="text-center" scope="row"><?= $row['project_name'] ?></td>
                            <td class="text-center" scope="row"><?= $row['project_description'] ?></td>
                            <td class="text-center"><i class="fa-solid fa-arrow-right"></i></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include_once('includes/add/add-project-modal.php');
    include_once('includes/edit/edit-project-modal.php');
    ?>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/settings.js"></script>
</body>

</html>