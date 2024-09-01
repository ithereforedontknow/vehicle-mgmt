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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .notification-item {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .notification-item:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
        }

        .notification-icon {
            color: #007bff;
            margin-right: 10px;
        }
    </style>
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
                                <h5><i class="fas fa-truck notification-icon"></i><?= htmlspecialchars($transaction['to_reference']) ?> has departed from <?= htmlspecialchars($transaction['origin']) ?></h5> <small class="text-muted">Transaction ID: <?= htmlspecialchars($transaction['transaction_id']) ?></small>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
</body>

</html>