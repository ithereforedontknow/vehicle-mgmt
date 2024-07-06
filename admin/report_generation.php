<?php
require '../api/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report Generation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">

</head>

<body class="bg-light">
    <?php
    include_once('./navbar/navbar.php');
    ?>


    <div class="content" id="content">
        <div class="container w-75 shadow-sm p-5 mb-5 bg-body rounded">
            <h2 class="display-3 text-center">Report Generation</h2>
        </div>
        <div class="container w-75 shadow-sm p-5 mb-5 bg-body rounded">

            <div class="row">
                <div class="col-sm">
                    <h2 class="display-5 text-center">Tally In (Posted)</h2>
                    <button class="btn btn-success float-end mb-2" data-bs-toggle="modal" data-bs-target="#add-user-modal">
                        Export to Excel
                    </button>
                    <table class="table table-hover table-bordered text-center" id="transactions-table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col" style="width: 5%;">ID</th>
                                <th class="text-center" scope="col" style="width: 15%;">To Reference</th>
                                <th class="text-center" scope="col" style="width: 15%;">Hauler</th>
                                <th class="text-center" scope="col" style="width: 15%;">Plate Number</th>
                                <th class="text-center" scope="col" style="width: 15%;">Driver Name</th>
                                <th class="text-center" scope="col" style="width: 15%;">Project</th>

                            </tr>
                        </thead>
                        <tbody id="transaction-data">
                            <?php
                            $sql = "SELECT *    FROM Transaction t";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td class='text-center'><?= $row['transaction_id'] ?></td>
                                        <td class='text-center'><?= $row['to_reference'] ?></td>
                                        <td class='text-center'><?= $row['hauler'] ?></td>
                                        <td class='text-center'><?= $row['plate_number'] ?></td>
                                        <td class='text-center'><?= $row['driver_name'] ?></td>
                                        <td class='text-center'><?= $row['project'] ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan='22'>
                                        <center>
                                            <h2 class='text-muted'>No Record</h2>
                                        </center>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>

</body>

</html>