<?php

require_once '../api/db_connection.php';

session_start();

if (!isset($_SESSION['id']) || $_SESSION['userlevel'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report Generation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body class="bg-light">
    <?php
    include_once('./navbar/navbar.php');
    ?>


    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 fw-bold mb-3">Report Generation</h1>
            <div class="row">
                <div class="col">
                    <div class="container shadow-sm p-5 mb-5 bg-white rounded">

                        <h2 class="">Tally In (Posted)</h1>

                            <!-- Export to Excel Dropdown -->
                            <button id="export-excel" class="btn btn-primary mb-3">
                                Export to Excel
                            </button>
                            <div class="btn-group mb-3">
                                <button id="" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select date
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-type="day">Day</a>
                                    <a class="dropdown-item" href="#" data-type="month">Month</a>
                                    <a class="dropdown-item" href="#" data-type="year">Year</a>
                                </div>
                            </div><!-- Table -->
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
                                    $sql = "SELECT * FROM Transaction t INNER JOIN hauler h 
                    ON t.hauler_id = h.hauler_id inner join vehicle v on 
                    t.vehicle_id = v.vehicle_id inner join driver d on 
                    t.driver_id = d.driver_id inner join project p on 
                    t.project_id = p.project_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td class='text-center'><?= $row['transaction_id'] ?></td>
                                                <td class='text-center'><?= $row['to_reference'] ?></td>
                                                <td class='text-center'><?= $row['hauler_name'] ?></td>
                                                <td class='text-center'><?= $row['plate_number'] ?></td>
                                                <td class='text-center'><?= $row['driver_name'] ?></td>
                                                <td class='text-center'><?= $row['project_name'] ?></td>
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
                <div class="col">

                </div>
            </div>
            <!-- Day Modal -->
            <div class="modal fade" id="dayModal" tabindex="-1" aria-labelledby="dayModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dayModalLabel">Select Day</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="daypicker"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirm-day">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Month Modal -->
            <div class="modal fade" id="monthModal" tabindex="-1" aria-labelledby="monthModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="monthModalLabel">Select Month</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="monthpicker"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirm-month">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Year Modal -->
            <div class="modal fade" id="yearModal" tabindex="-1" aria-labelledby="yearModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="yearModalLabel">Select Year</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="yearpicker"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirm-year">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <script src="js/admin.js"></script>
    <script>
        document.getElementById('export-excel').addEventListener('click', function() {
            fetch('api/export_transactions.php')
                .then(response => response.json())
                .then(data => {
                    // Create a worksheet
                    var ws = XLSX.utils.json_to_sheet(data);

                    // Auto-fit columns
                    var range = XLSX.utils.decode_range(ws['!ref']);
                    for (var C = range.s.c; C <= range.e.c; ++C) {
                        var max_width = 0;
                        for (var R = range.s.r; R <= range.e.r; ++R) {
                            var cell_address = {
                                c: C,
                                r: R
                            };
                            var cell_ref = XLSX.utils.encode_cell(cell_address);
                            if (!ws[cell_ref]) continue;
                            var cell_value = ws[cell_ref].v;
                            var cell_text_length = cell_value ? cell_value.toString().length : 0;
                            if (cell_text_length > max_width) {
                                max_width = cell_text_length;
                            }
                        }
                        ws['!cols'] = ws['!cols'] || [];
                        ws['!cols'][C] = {
                            wch: max_width + 2
                        }; // Add some padding
                    }

                    // Create a workbook and add the worksheet
                    var wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, "Transactions");

                    // Generate the Excel file
                    XLSX.writeFile(wb, "tally In (Posted).xlsx");
                })
                .catch(error => console.error('Error:', error));
        });

        $(document).ready(function() {
            var selectedType;

            // Handle dropdown item click
            $('.dropdown-item').on('click', function() {
                selectedType = $(this).data('type');
                $('#' + selectedType + 'Modal').modal('show');
            });

            // Initialize the daypicker
            function initializeDayPicker() {
                var days = [];
                var date = new Date();
                var year = date.getFullYear();
                var month = date.getMonth();
                var currentDay = date.getDate();
                var daysInMonth = new Date(year, month + 1, 0).getDate();

                for (var i = 1; i <= daysInMonth; i++) {
                    days.push({
                        value: i,
                        selected: i === currentDay
                    });
                }

                $('#daypicker').html('<select class="form-control">' + days.map(function(day) {
                    return '<option value="' + day.value + '"' + (day.selected ? ' selected' : '') + '>' + day.value + '</option>';
                }).join('') + '</select>');
            }

            // Initialize the monthpicker
            function initializeMonthPicker() {
                var months = [];
                var date = new Date();
                var currentMonth = date.getMonth();

                for (var i = 0; i < 12; i++) {
                    var monthName = new Date(0, i).toLocaleString('en', {
                        month: 'long'
                    });
                    months.push({
                        value: i + 1,
                        selected: i === currentMonth
                    });
                }

                $('#monthpicker').html('<select class="form-control">' + months.map(function(month) {
                    return '<option value="' + month.value + '"' + (month.selected ? ' selected' : '') + '>' + monthName + '</option>';
                }).join('') + '</select>');
            }

            // Initialize the yearpicker
            function initializeYearPicker() {
                var years = [];
                var date = new Date();
                var currentYear = date.getFullYear();

                for (var i = currentYear - 50; i <= currentYear + 10; i++) {
                    years.push({
                        value: i,
                        selected: i === currentYear
                    });
                }

                $('#yearpicker').html('<select class="form-control">' + years.map(function(year) {
                    return '<option value="' + year.value + '"' + (year.selected ? ' selected' : '') + '>' + year.value + '</option>';
                }).join('') + '</select>');
            }

            initializeDayPicker();
            initializeMonthPicker();
            initializeYearPicker();

            // Handle confirm buttons
            $('#confirm-day').on('click', function() {
                var selectedDay = $('#daypicker select').val();
                $('#dayModal').modal('hide');
                exportToExcel('day', selectedDay);
            });

            $('#confirm-month').on('click', function() {
                var selectedMonth = $('#monthpicker select').val();
                $('#monthModal').modal('hide');
                exportToExcel('month', selectedMonth);
            });

            $('#confirm-year').on('click', function() {
                var selectedYear = $('#yearpicker select').val();
                $('#yearModal').modal('hide');
                exportToExcel('year', selectedYear);
            });

            function exportToExcel(type, value) {
                fetch('api/export_transactions.php')
                    .then(response => response.json())
                    .then(data => {
                        var ws = XLSX.utils.json_to_sheet(data);

                        var range = XLSX.utils.decode_range(ws['!ref']);
                        for (var C = range.s.c; C <= range.e.c; ++C) {
                            var max_width = 0;
                            for (var R = range.s.r; R <= range.e.r; ++R) {
                                var cell_address = {
                                    c: C,
                                    r: R
                                };
                                var cell_ref = XLSX.utils.encode_cell(cell_address);
                                if (!ws[cell_ref]) continue;
                                var cell_value = ws[cell_ref].v;
                                var cell_text_length = cell_value ? cell_value.toString().length : 0;
                                if (cell_text_length > max_width) {
                                    max_width = cell_text_length;
                                }
                            }
                            ws['!cols'] = ws['!cols'] || [];
                            ws['!cols'][C] = {
                                wch: max_width + 2
                            };
                        }

                        var wb = XLSX.utils.book_new();
                        XLSX.utils.book_append_sheet(wb, ws, "Transactions");

                        var fileName = `Tally_In_Posted_${type}_${value}.xlsx`;
                        XLSX.writeFile(wb, fileName);
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>

</body>

</html>