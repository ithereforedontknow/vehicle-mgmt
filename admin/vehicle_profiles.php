<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Profiles</title>
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
                    <a href="vehicle_profiles.php" class="nav-link active" aria-current="page">
                        Vehicle Profiles
                    </a>
                </li>
                <li>
                    <a href="vehicle_transactions.php" class="nav-link text-white">
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

            <div class="container ">
                <h1 class="display-3 text-center">Vehicle Profiles</h1>
                <div class="container">
                    <button class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-vehicle-modal"><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>Add Vehicle</button>
                    <table class="table table-hover table-bordered  text-center" id="vehicles-table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col" style="width: 10%;">TO Reference #</th>
                                <th class="text-center" scope="col" style="width: 10%;">Hauler</th>
                                <th class="text-center" scope="col" style="width: 10%;">Plate #</th>
                                <th class="text-center" scope="col" style="width: 10%;">Driver Name</th>
                                <th class="text-center" scope="col" style="width: 5%;">Truck Type</th>
                                <th class="text-center" scope="col" style="width: 1%;">Project</th>
                                <th class="text-center" scope="col" style="width: 5%;">Status</th>
                                <th class="text-center" scope="col" style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("./api/db_connection.php");
                            $sql = "SELECT * FROM tbl_vehicles";
                            $result = $conn->query($sql);
                            $result_set = $result->fetchAll();
                            if ($result_set) {
                                foreach ($conn->query($sql) as $row) {
                            ?> <tr>
                                        <td class="text-center"><?= $row["to_ref_no"]; ?></td>
                                        <td class="text-center"><?= $row["hauler"], " " ?></td>
                                        <td class="text-center"><?= $row["plate_no"]; ?></td>
                                        <td class="text-center"><?= $row["driver_name"]; ?></td>
                                        <td class="text-center"><?= $row["truck_type"]; ?></td>
                                        <td class="text-center"><?= $row["project"]; ?></td>
                                        <td class="text-center"><?= $row["status"] == 1 ? "Active" : "Inactive" ?></td>
                                        <td class="exclude-print">
                                            <button class="btn btn-primary px-2" onclick="edit_vehicle('<?= $row['to_ref_no']; ?>')">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg> Edit
                                            </button>
                                            <?php
                                            if ($row["status"] == 1) {
                                            ?>
                                                <button class="btn btn-danger px-1" onclick="deactivate_vehicle('<?= $row['to_ref_no']; ?>')">
                                                    <svg width=" 24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M15 16L20 21M20 16L15 21M11 14C7.13401 14 4 17.134 4 21H11M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg> Deactivate
                                                </button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-success" onclick="activate_vehicle('<?= $row['to_ref_no']; ?>')">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M4 21C4 17.134 7.13401 14 11 14M18.5 20.2361C17.9692 20.7111 17.2684 21 16.5 21C14.8431 21 13.5 19.6569 13.5 18C13.5 16.3431 14.8431 15 16.5 15C17.8062 15 18.9175 15.8348 19.3293 17M20 14.5V17.5H17M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg> Activate
                                                </button>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <td colspan="8">
                                    <center>
                                        <h2 class="text-muted">No Record</h2>
                                        <center>
                                </td>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php
    include('./includes/add-vehicle-modal.php');
    include('./includes/edit-vehicle-modal.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="admin.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
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