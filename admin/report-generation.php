<?php
require_once '../api/db_connection.php'; // Include your DB connection here

session_start();

// Only allow admins to access the export feature
if (!isset($_SESSION['id']) || $_SESSION['userlevel'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

// Export data to Excel
if (isset($_GET['export']) && $_GET['export'] == 'true') {
    exportToExcel($conn);
}

function exportToExcel($conn)
{
    // SQL query to fetch data for export
    $query = "SELECT * FROM transaction "; // Replace with your actual query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Set headers for file download
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="report.xls"');
        header('Cache-Control: max-age=0');

        // Output table structure as the first row
        echo "Column1\tColumn2\tColumn3\t...\n"; // Replace with your actual column names

        // Loop through the data and output each row
        while ($row = $result->fetch_assoc()) {
            echo $row['column1'] . "\t" . $row['column2'] . "\t" . $row['column3'] . "\t...\n"; // Replace with your actual columns
        }
    } else {
        echo "No data available";
    }

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
</body>

</html>