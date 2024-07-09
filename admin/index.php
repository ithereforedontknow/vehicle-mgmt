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
// $id = $_SESSION['id'];
// // $query = $conn->query("SELECT  FROM tbl_user WHERE id = '$id'");
// $name = $query->fetchColumn();

// Get total number of transactions for the current day
$sql_total = "SELECT COUNT(*) as total FROM Transaction WHERE DATE(time_of_entry) = CURDATE()";
$result_total = $conn->query($sql_total);
$total_transactions = $result_total->fetch_assoc()['total'];

// Get total number of transactions for the current month
$sql_month = "SELECT COUNT(*) as month_total FROM Transaction WHERE MONTH(time_of_entry) = MONTH(CURRENT_DATE()) AND YEAR(time_of_entry) = YEAR(CURRENT_DATE())";
$result_month = $conn->query($sql_month);
$month_transactions = $result_month->fetch_assoc()['month_total'];

// Get total number of transactions for the current year
$sql_year = "SELECT COUNT(*) as year_total FROM Transaction WHERE YEAR(time_of_entry) = YEAR(CURRENT_DATE())";
$result_year = $conn->query($sql_year);
$year_transactions = $result_year->fetch_assoc()['year_total'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">

  <?php
  include_once('./navbar/navbar.php');
  ?>

  <div class="content" id="content">
    <h2 class="display-3 text-center mb-3">Dashboard</h2>
    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Transactions Today</h5>
            <p class="card-text display-4"><?php echo $total_transactions; ?></p>
          </div>
        </div>
      </div>



      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Transactions This Month</h5>
            <p class="card-text display-4"><?php echo $month_transactions; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Transactions This Year</h5>
            <p class="card-text display-4"><?php echo $year_transactions; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="card text-center">

      <div class="card-body">
        <canvas id="transactionChart"></canvas>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="js/admin.js"></script>
    <script>
      // chart_script.js

      $(document).ready(function() {
        $.ajax({
          url: 'fetch_transaction_data.php',
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            var ctx = document.getElementById('transactionChart').getContext('2d');

            var months = data.map(function(item) {
              return item.year + '-' + item.month;
            });

            var counts = data.map(function(item) {
              return item.transaction_count;
            });

            var chart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: months,
                datasets: [{
                  label: 'Number of Transactions',
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 2,
                  pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                  pointBorderColor: '#fff',
                  pointHoverBackgroundColor: '#fff',
                  pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
                  data: counts,
                  fill: true,
                  tension: 0.4 // This creates a soft curve
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  title: {
                    display: true,
                    text: 'Transaction Count by Month'
                  }
                },
                scales: {
                  x: {
                    display: true,
                    title: {
                      display: true,
                      text: 'Month'
                    },
                    grid: {
                      color: 'rgba(0, 0, 0, 0.1)' // Softer grid lines
                    }
                  },
                  y: {
                    display: true,
                    title: {
                      display: true,
                      text: 'Number of Transactions'
                    },
                    beginAtZero: true,
                    grid: {
                      color: 'rgba(0, 0, 0, 0.1)' // Softer grid lines
                    }
                  }
                }
              }
            });
          },
          error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
          }
        });
      });
    </script>
</body>

</html>