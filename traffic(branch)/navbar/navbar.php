<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top px-3">
    <a class="navbar-brand ms-3" href="index.php">Integrated In-house Vehicle Management System</a>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav ml-auto">
            <a class="navbar-brand"> You are logged in as <?php echo $_SESSION['userlevel']; ?></a>

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./../assets/universal_corporation_logo.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION['username']; ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#help-modal">Help</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><button class="dropdown-item" onclick="logout_user()">Sign out</button></li>
                </ul>
            </div>
        </ul>
    </div>
</nav>