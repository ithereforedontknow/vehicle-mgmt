<?php
require_once '../api/db_connection.php';
session_start();
if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] !== 'traffic(branch)') {
    header("location: ../" . $_SESSION['userlevel'] . "/index.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Monitor Vehicles</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body class="bg-light">

    <?php
    include_once('./navbar/navbar.php');
    ?>

    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 mb-3 fw-bold">Monitor Vehicles</h1>
            <table class="table table-light text-center">
                <thead>
                    <tr>
                        <th scope="col">Hauler</th>
                        <th scope="col">Plate Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include_once('help.php');
    ?>
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>
</body>

</html>