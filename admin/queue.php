<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'admin') {

    if ($_SESSION['userlevel'] == 'traffic(main)') {
        header("location: ../traffic(main)/index.php");
    } elseif ($_SESSION['userlevel'] == 'encoder') {
        header("location: ../encoder/index.php");
    } elseif ($_SESSION['userlevel'] == 'traffic(branch)') {
        header("location: ../traffic(branch)/index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Queue Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">

</head>

<body class="bg-light">
    <?php
    include_once('./navbar/navbar.php');
    ?>


    <div class="content" id="content">
        <div class="row">
            <div class="col-sm">
                <div class="container shadow-sm p-5 mb-5 bg-body rounded">
                    <h2 class="display-5 text-center mb-3">Add to Queue</h2>
                    <table class="table table-hover table-bordered text-center" id="transactions-table">
                        <thead>
                            <th class="text-center" scope="col">Transaction ID</th>
                            <th class="text-center" scope="col">To Reference</th>
                            <th class="text-center" scope="col">Hauler</th>
                            <th class="text-center" scope="col">Plate Number</th>
                            <th class="text-center" scope="col">Driver</th>
                            <th class="text-center" scope="col">Project</th>
                            <th class="text-center" scope="col">Action</th>
                        </thead>

                        <tbody id="transaction-data">
                            <?php
                            $sql = "SELECT t.transaction_id, t.to_reference, h.hauler_name AS hauler, v.plate_number, v.truck_type, d.driver_name, p.project_name AS project, t.status, t.transfer_in_line, t.ordinal, t.shift, t.schedule, t.no_of_bales, t.kilos, t.origin, t.arrival_date, t.arrival_time, t.unloading_date, t.time_of_entry, t.unloading_time_start, t.unloading_time_end, t.time_of_departure FROM Transaction t 
                            INNER JOIN hauler h ON t.hauler_id = h.hauler_id 
                            INNER JOIN vehicle v ON t.vehicle_id = v.vehicle_id 
                            INNER JOIN driver d ON t.driver_id = d.driver_id 
                            INNER JOIN project p ON t.project_id = p.project_id";
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
                                        <td class='text-center'>
                                            <button class='btn btn-primary px-2 add-to-queue' data-id="<?= $row['transaction_id'] ?>" data-plate="<?= $row['plate_number'] ?>">
                                                Add
                                            </button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='7'><center><h2 class='text-muted'>No Record</h2></center></td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm">
                <div class="container shadow-sm p-5 mb-5 bg-body rounded">
                    <h2 class="display-5 text-center mb-3">Queue</h2>
                    <table class="table table-hover table-bordered text-center" id="queue-table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Plate Number</th>
                            </tr>
                        </thead>
                        <tbody id="queue-data">
                            <!-- Queue items will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script>
        $(document).ready(function() {
            // transactions-table to datatable
            $('#transactions-table').DataTable();
            // Function to add item to queue
            function addToQueue(id, plateNumber) {
                // Check if the item is already in the queue
                if ($('#queue-data').find(`[data-id="${id}"]`).length === 0) {
                    $('#queue-data').append(`
                <tr data-id="${id}">
                    <td class="text-center">${plateNumber}</td>
                </tr>
            `);
                    // Disable the "Add" button for this item
                    $(`button[data-id="${id}"]`).prop('disabled', true).text('Added');
                }
            }

            // Event listener for "Add to Queue" buttons
            $(document).on('click', '.add-to-queue', function() {
                var id = $(this).data('id');
                var plateNumber = $(this).data('plate');
                addToQueue(id, plateNumber);
            });
        });
    </script>
</body>

</html>