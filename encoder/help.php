<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'encoder') {

    if ($_SESSION['userlevel'] == 'admin') {
        header("location: ../admin/index.php");
    } elseif ($_SESSION['userlevel'] == 'tech assoc') {
        header("location: ../staff/index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Help</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />

</head>

<body class="bg-light">
    <?php
    include_once('./navbar/navbar.php');
    ?>
    <div class="content" id="content">
        <label for="search">Search</label>
        <input type="text" class="form-control w-25 mb-3" name="search" id="search">
        <button class="btn btn-primary mb-3">User Manual</button>

        <div class="card mb-3">
            <div class="card-body p-5">
                <h2 class="card-title display-5 mb-3">Vehicle Transactions</h2>
                <h1>Adding Transactions:</h1>
                <ol>
                    <li>Go to the "Transactions" section.</li>
                    <li>Click on "Add Transaction".</li>
                    <li>Enter the transaction details, including vehicle information, date, and any relevant notes.</li>
                    <li> Click <button class="btn btn-primary">Submit</button>.</li>
                </ol>
                <h1>Viewing Transactions: </h1>
                <ol>
                    <li>Go to the "View Transactions" section.</li>
                    <li>You will see a list of all transactions.</li>
                    <li>You can use the search bar to filter transactions by date, vehicle, or other criteria.</li>
                </ol>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body p-5">
                <h2 class="card-title display-5 mb-3">Report Generation</h2>
                <ul>
                    <li> This section allows you to export vehicle transaction data to an Excel file for further analysis or record keeping.</li>
                    <li> Specific instructions on generating reports will be available within the report generation section itself.</li>
                </ul>

            </div>
        </div>

    </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script>
        $(document).ready(function() {
            $("#search").keyup(function() {
                var searchText = $(this).val().toLowerCase();
                $("#content .card").each(function() {
                    var cardContent = $(this).find(".card-body").text().toLowerCase();
                    if (cardContent.indexOf(searchText) !== -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>

</body>

</html>