<?php
require_once '../api/db_connection.php'; // Include your DB connection here

session_start();

// Only allow admins to access the export feature
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
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body class="bg-light">
    <?php include_once('./navbar/navbar.php'); ?>
    <div class="content" id="content">
        <div class="container">
            <h1 class="display-5 fw-bold mb-3">Report Generation</h1>
            <div class="row">
                <div class="col">
                    <div class="container shadow-sm p-5 mb-5 bg-white rounded">
                        <h4 class="fw-bold">Tally In (Posted)</h4>
                        <a href="report-generation.php?export=true" class="btn btn-primary mb-3">Export to Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="js/admin.js"></script>
    <script>
        // Function to fetch data from the server
        async function fetchData() {
            // In a real application, this would be an API call to your server
            // For this example, we'll use mock data based on your SQL structure
            return [{
                    to_reference: '000001-24',
                    plate_number: 'NAW 8716',
                    driver_name: 'ELVIN CRUZ',
                    truck_type: 'Trailer',
                    queue_number: 3,
                    transfer_in_line: 'LINE 3',
                    status: 'DONE',
                    origin_name: 'JG01',
                    shift: 'DAY',
                    schedule: '6AM-2PM',
                    project_name: 'Barangay Rufino'
                },
                {
                    to_reference: '000002-24',
                    plate_number: 'NAW 8726',
                    driver_name: 'Cesar San Juan',
                    truck_type: 'Forward',
                    queue_number: 2,
                    transfer_in_line: 'LINE 4',
                    status: 'ONGOING',
                    origin_name: 'JG02',
                    shift: 'NIGHT',
                    schedule: '2PM-6AM',
                    project_name: 'Cesar Project'
                },
                // Add more mock data as needed
            ];
        }

        // Function to export data to Excel
        async function exportToExcel() {
            const data = await fetchData();

            // Create a new workbook
            const wb = XLSX.utils.book_new();

            // Convert data to worksheet
            const ws = XLSX.utils.json_to_sheet(data);

            // Set column widths
            const colWidths = [{
                    wch: 15
                }, // TO Reference
                {
                    wch: 15
                }, // Plate Number
                {
                    wch: 20
                }, // Driver Name
                {
                    wch: 15
                }, // Truck Type
                {
                    wch: 10
                }, // Queue Number
                {
                    wch: 15
                }, // Transfer in Line
                {
                    wch: 10
                }, // Status
                {
                    wch: 10
                }, // Origin
                {
                    wch: 10
                }, // Shift
                {
                    wch: 15
                }, // Schedule
                {
                    wch: 20
                } // Project Name
            ];
            ws['!cols'] = colWidths;

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(wb, ws, "Tally In Report");

            // Generate Excel file
            const wbout = XLSX.write(wb, {
                bookType: 'xlsx',
                type: 'binary'
            });

            // Convert string to ArrayBuffer
            function s2ab(s) {
                const buf = new ArrayBuffer(s.length);
                const view = new Uint8Array(buf);
                for (let i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                return buf;
            }

            // Trigger file download
            saveAs(new Blob([s2ab(wbout)], {
                type: "application/octet-stream"
            }), "tally_in_report.xlsx");
        }

        // Add event listener to the export button
        document.addEventListener('DOMContentLoaded', () => {
            const exportButton = document.querySelector('a[href="report-generation.php?export=true"]');
            if (exportButton) {
                exportButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    exportToExcel();
                });
            }
        });
    </script>
</body>

</html>