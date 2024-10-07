<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top px-3 shadow">
    <img src="../assets/Untitled-1.png" style="width: 40px;">
    <a class="navbar-brand ms-3 fw-bold">Integrated In-house Vehicle Management System</a>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav ml-auto">

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