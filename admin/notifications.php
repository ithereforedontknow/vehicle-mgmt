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
    <title>Notifications</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>
    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 fw-bold mb-4">Notifications</h1>
            <div class="row">
                <div class="col-lg-5">
                    <?php
                    $query = "SELECT * FROM `transaction` ORDER BY transaction_id DESC";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($transaction = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="notification-item">
                                <h5><i class="fas fa-truck notification-icon"></i><?= $transaction['to_reference'] ?> has departed from <?= $transaction['origin'] ?></h5>
                                <small class="text-muted">Transaction ID: <?= $transaction['transaction_id'] ?></small>
                                <small class="text-muted float-end"><?= $transaction['created_at'] ?></small>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle mr-2"></i> No notifications at this time.
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
</body>

</html>