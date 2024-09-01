<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top px-3 shadow">
    <button class="btn btn-dark" id="sidebarToggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <img src="../assets/Untitled-1.png" style="width: 40px;">
    <a class="navbar-brand ms-3 fw-bold">Integrated In-house Vehicle Management System</a>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav ml-auto">
            <!-- Notification Dropdown -->
            <li class="nav-item dropdown ">
                <a class="nav-link" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bell fa-lg"></i>
                    <!-- Badge showing the number of notifications -->
                    <span class="badge bg-danger rounded-circle">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end bg-dark dropdown-menu-dark shadow" aria-labelledby="notificationDropdown">
                    <?php
                    $query = "SELECT * FROM `transaction` ORDER BY transaction_id DESC LIMIT 3";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($transaction = mysqli_fetch_assoc($result)) {
                    ?>
                            <li><a class="dropdown-item" href="#"><?= $transaction['to_reference'] ?> has departed from <?= $transaction['origin'] ?></a></li>
                        <?php
                        }
                    } else {
                        ?>
                        <li><a class="dropdown-item" href="#">No Notifications</a></li>
                    <?php
                    }
                    ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="notifications.php">View all notifications</a></li>
                </ul>
            </li>

            <!-- User Information -->
            <!-- <a class="navbar-brand">You are logged in as <?php echo $_SESSION['userlevel']; ?></a> -->

            <div class="dropdown">
                <li class="nav-item dropdown bg">
                    <a href="#" class="nav-link " data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user fa-lg"></i>
                        <!-- <img src="../../assets/universal_corporation_logo.jpg" class="img-circle" alt="" width="32"> -->
                        <!-- <span><?php echo $_SESSION['username']; ?></span> -->
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow bg-dark">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><button class="dropdown-item" onclick="logout_user()">Sign out</button></li>
                    </ul>
                </li>
            </div>
        </ul>
    </div>
</nav>
<div class="sidebar bg-dark shadow" id="sidebar">
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100svh; ">
        <ul class="nav nav-pills flex-column mb-3">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-white">
                    <i class="fa-solid fa-chart-line fa-lg me-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="users.php" class="nav-link text-white">
                    <i class="fa-solid fa-users fa-lg me-2"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle text-white" href="#" id="vehicleTransactionsDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#vehicleTransactionsSubmenu" aria-expanded="true">
                    <i class="fa-solid fa-scroll fa-lg me-2"></i>
                    Vehicle Transactions
                </a>
                <div class="collapse show" id="vehicleTransactionsSubmenu">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                        <li><a href="add_transaction.php" class="nav-link text-white"><i class="fa-solid fa-circle fa-2xs me-2"></i>Add Transaction</a></li>
                        <li><a href="view_transaction.php" class="nav-link text-white"><i class="fa-solid fa-circle fa-2xs me-2"></i>View Transactions</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="queue.php" class="nav-link text-white">
                    <i class="fa-solid fa-clock fa-lg me-2"></i>
                    Queue Management
                </a>
            </li>
            <li>
                <a href="logs.php" class="nav-link text-white">
                    <i class="fa-solid fa-clipboard-list fa-lg me-2"></i> Vehicle Logs
                </a>
            </li>
            <li>
                <a href="report_generation.php" class="nav-link text-white">
                    <i class="fa-solid fa-print fa-lg me-2"></i>
                    Report Generation
                </a>
            </li>
            <li>
                <a href="settings.php" class="nav-link text-white">
                    <i class="fa-solid fa-gear fa-lg me-2"></i> Settings
                </a>
            </li>
            <li>
                <a href="utilities.php" class="nav-link text-white">
                    <i class="fa-solid fa-toolbox fa-lg me-2"></i>Utilities
                </a>
            </li>
        </ul>
    </div>
</div>