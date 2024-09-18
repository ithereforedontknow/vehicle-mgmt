<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top px-3 shadow">
    <img src="../assets/Untitled-1.png" style="width: 40px;">
    <a class="navbar-brand ms-3 fw-bold">Integrated In-house Vehicle Management System</a>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav ml-auto">
            <!-- Notification Dropdown -->
            <li class="nav-item dropdown ">
                <a class="nav-link" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bell fa-lg"></i>
                    <!-- Badge showing the number of notifications -->
                    <span class="badge bg-danger rounded-circle">
                        <?php
                        $currentTime = date('Y-m-d H:i:s');
                        $transactionCountQuery = "SELECT COUNT(*) FROM `transaction` WHERE created_at >= '$currentTime' AND status = 'arrived'";
                        $result = mysqli_query($conn, $transactionCountQuery);
                        $transactionCount = mysqli_fetch_array($result)[0];
                        echo $transactionCount;
                        ?>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end bg-dark dropdown-menu-dark shadow" aria-labelledby="notificationDropdown">
                    <?php
                    $currentTime = date('Y-m-d H:i:s');
                    $query = "SELECT * FROM `transaction` WHERE created_at >= '$currentTime' AND status = 'arrived' ORDER BY transaction_id DESC";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($transaction = mysqli_fetch_assoc($result)) {

                    ?>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <?= "{$transaction['to_reference']} has arrived from {$transaction['origin']}" ?>
                                    <div>
                                        <?= date('F j, Y, g:i a', strtotime($transaction['created_at'])) ?>
                                    </div>
                                </a>
                            </li>
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
                    <li><a class="dropdown-item" data-bs-toggle="offcanvas" role="button" href="#viewNotificationsOffcanvas">View all notifications</a></li>
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