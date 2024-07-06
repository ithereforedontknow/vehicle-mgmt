<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top px-3">
    <button class="btn btn-dark" id="sidebarToggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand ms-3" href="">Integrated In-house Vehicle Management System</h1>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn btn-primary float-end" type="button" onclick="logout_user()">
                    Logout
                </button>
            </li>
        </ul>
    </div>
</nav>
<div class="sidebar" id="sidebar">
    <div class="d-flex flex-column flex-shrink-0 p-3 " style="width: 280px; height: 100svh">
        <ul class="nav nav-pills flex-column mb-auto">
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
            <li>
                <a href="help.php" class="nav-link text-white">
                    <i class="fa-solid fa-question fa-lg me-2"></i> Help
                </a>
            </li>
        </ul>
    </div>
</div>