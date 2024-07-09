<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'tech assoc') {

    if ($_SESSION['userlevel'] == 'admin') {
        header("location: ../admin/index.php");
    } elseif ($_SESSION['userlevel'] == 'encoder') {
        header("location: ../encoder/index.php");
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body class="bg-light">

    <?php
    include_once('./navbar/navbar.php');
    ?>

    <div class="content" id="content">
        <div class="container w-75 shadow-sm p-5 mb-5 bg-body rounded">
            <h2 class="display-3 text-center">Add Transaction</h2>
            <div class="container mt-5">
                <form id="add-transaction">
                    <div class="mb-3">
                        <label for="to-reference" class="form-label">TO Reference #</label>
                        <input type="text" class="form-control" id="to-reference" name="to-reference">
                    </div>
                    <div class="mb-3">
                        <label for="hauler" class="form-label">Hauler</label>
                        <select class="form-select" name="hauler_id" id="hauler">
                            <?php
                            $sql = "SELECT * FROM `hauler`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['hauler_id'] . '">' . $row['hauler_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="plate-number" class="form-label">Plate Number</label>
                        <select class="form-select" name="vehicle_id" id="plate-number">
                            <?php
                            $sql = "SELECT * FROM `vehicle`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['vehicle_id'] . '">' . $row['plate_number'] . ' : ' . $row['truck_type'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="driver-name" class="form-label">Driver Name</label>
                        <select class="form-select" name="driver_id" id="driver-name">
                            <?php
                            $sql = "SELECT * FROM `driver`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['driver_id'] . '">' . $row['driver_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="project" class="form-label">Project</label>
                        <select class="form-select" name="project_id" id="project">
                            <?php
                            $sql = "SELECT * FROM `project`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['project_id'] . '">' . $row['project_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="transfer-in-line" class="form-label">Transfer in Line #</label>
                        <select class="form-select" id="transfer-in-line" name="transfer-in-line">
                            <option value="Line 3">Line 3</option>
                            <option value="Line 4">Line 4</option>
                            <option value="Line 5">Line 5</option>
                            <option value="Line 6">Line 6</option>
                            <option value="Line 7">Line 7</option>
                            <option value="GLAD">GLAD WHSE</option>
                            <option value="WHSE 2-BAY 2">WHSE 2-BAY 2</option>
                            <option value="WHSE 2-BAY 3">WHSE 2-BAY 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ordinal" class="form-label">Ordinal</label>
                        <select class="form-select" id="ordinal" name="ordinal">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="3rd/1st">3rd/1st</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="shift" class="form-label">Shift</label>
                        <select class="form-select" id="shift" name="shift">
                            <option value="day">Day</option>
                            <option value="night">Night</option>
                            <option value="day/night">Day/Night</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="schedule" class="form-label">Schedule</label>
                        <select class="form-select" id="schedule" name="schedule">
                            <option value="6am-2pm">6 am to 2 pm</option>
                            <option value="2pm-6am">2 pm to 6 am</option>
                            <option value="6am-2pm/2pm-6am">6 am to 2 pm/2 pm to 6 am</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no-of-bales" class="form-label">No of Bales</label>
                        <input type="number" class="form-control" id="no-of-bales" name="no-of-bales">
                    </div>
                    <div class="mb-3">
                        <label for="kilos" class="form-label">Kilos</label>
                        <input type="number" class="form-control" id="kilos" name="kilos">
                    </div>
                    <div class="mb-3">
                        <label for="origin" class="form-label">Origin</label>
                        <input type="text" class="form-control" id="origin" name="origin">
                    </div>
                    <div class="mb-3">
                        <label for="arrival-date" class="form-label">Arrival Date</label>
                        <input type="date" class="form-control" id="arrival-date" name="arrival-date">
                    </div>
                    <div class="mb-3">
                        <label for="arrival-time" class="form-label">Arrival Time</label>
                        <input type="datetime-local" class="form-control" id="arrival-time" name="arrival-time">
                    </div>
                    <div class="mb-3">
                        <label for="backlog" class="form-label">Backlog</label>
                        <input type="text" class="form-control" id="backlog" name="backlog">
                    </div>
                    <div class="mb-3">
                        <label for="unloading-date" class="form-label">Unloading Date</label>
                        <input type="date" class="form-control" id="unloading-date" name="unloading-date">
                    </div>
                    <div class="mb-3">
                        <label for="time-of-entry" class="form-label">Time of Entry</label>
                        <input type="datetime-local" class="form-control" id="time-of-entry" name="time-of-entry">
                    </div>
                    <div class="mb-3">
                        <label for="unloading-time-start" class="form-label">Unloading Time Start</label>
                        <input type="datetime-local" class="form-control" id="unloading-time-start" name="unloading-time-start">
                    </div>
                    <div class="mb-3">
                        <label for="unloading-time-end" class="form-label">Unloading Time End</label>
                        <input type="datetime-local" class="form-control" id="unloading-time-end" name="unloading-time-end">
                    </div>
                    <div class="mb-3">
                        <label for="time-of-departure" class="form-label">Time of Departure</label>
                        <input type="datetime-local" class="form-control" id="time-of-departure" name="time-of-departure">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="js/transaction.js"></script>

</body>

</html>