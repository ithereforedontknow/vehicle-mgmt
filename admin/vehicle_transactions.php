<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <style>
        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }

        main {
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow-x: auto;
            overflow-y: hidden;
        }
    </style>
</head>

<body>
    <main class="d-flex flex-nowrap" style="height: 100svh">
        <h1 class="visually-hidden">Universal Leaf</h1>

        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img class="mb-4 text-center" src="../assets/universal_corporation_logo.jpg" alt="" width="240" />
            </a>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="user_mgmt.php" class="nav-link text-white">

                        Users
                    </a>
                </li>
                <li>
                    <a href="vehicle_profiles.php" class="nav-link text-white">
                        Vehicle Profiles
                    </a>
                </li>
                <li>
                    <a href="vehicle_transactions.php" class="nav-link active" aria-current="page">
                        Vehicle Transactions
                    </a>
                </li>
                <li>
                    <a href="report_generation.php" class="nav-link text-white">
                        Report Generation
                    </a>
                </li>
            </ul>
        </div>

        <div class="container-fluid p-0 border-start">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <h1 class="navbar-brand">Integrated In-house Vehicle Management System</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="btn btn-primary float-end" type="button" onclick="logout_user()">
                        Logout
                    </button>
                </div>
            </nav>
            <div class="container w-75">
                <h1 class="display-3 text-center">Vehicle Transactions</h1>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="admin.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "pageLength": 5,
                "lengthChange": false,
            });
        });
    </script>
</body>

</html>