<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'admin') {

    if ($_SESSION['userlevel'] == 'tech assoc') {
        header("location: ../staff/index.php");
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
    <title>Report Generation</title>
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
        <div class="container w-75 shadow-sm p-5 mb-5 bg-body rounded">
            <h2 class="display-3 text-center">Report Generation</h2>
        </div>
        <div class="container w-75 shadow-sm p-5 mb-5 bg-body rounded">

            <div class="row">
                <div class="col-sm">
                    <h2 class="display-5 text-center">Tally In (Posted)</h2>
                    <button id="export-excel" class="btn btn-success float-end mb-2">
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    </script>
</body>

</html>