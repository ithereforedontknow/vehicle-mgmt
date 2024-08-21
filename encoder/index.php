<?php
require '../api/db_connection.php';
session_start();
if (!isset($_SESSION['id'])) {
  header("location: ../index.php");
}
if (isset($_SESSION['id']) && $_SESSION['userlevel'] != 'encoder') {

  if ($_SESSION['userlevel'] == 'admin') {
    header("location: ../admin/index.php");
  } elseif ($_SESSION['userlevel'] == 'traffic(main)') {
    header("location: ../traffic(main)/index.php");
  } else {
    header("location: ../traffic(branch)/index.php");
  }
}

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
    <div class="row mb-4">
      <div class="col">
        <div class="card text-center" id="todayCard" style="cursor: pointer;">
          <div class="card-body">
            <h5 class="card-title">Transactions Today</h5>
            <p class="card-text display-4"><?php echo $total_transactions; ?></p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card text-center" id="monthCard" style="cursor: pointer;">
          <div class="card-body">
            <h5 class="card-title">Transactions This Month</h5>
            <p class="card-text display-4"><?php echo $month_transactions; ?></p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card text-center" id="yearCard" style="cursor: pointer;">
          <div class="card-body">
            <h5 class="card-title">Transactions This Year</h5>
            <p class="card-text display-4"><?php echo $year_transactions; ?></p>
          </div>
        </div>
      </div>

    </div>

    <div class="d-flex justify-content-center">
      <div class="card w-75">
        <div class="card-body">
          <canvas id="transactionChart"></canvas>
        </div>
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
        var chart;

        function updateChart(period) {
          $.ajax({
            url: 'fetch_transaction_data.php',
            type: 'GET',
            data: {
              period: period
            },
            dataType: 'json',
            success: function(data) {
              var ctx = document.getElementById('transactionChart').getContext('2d');

              var labels = data.map(function(item) {
                return item.label;
              });

              var counts = data.map(function(item) {
                return item.transaction_count;
              });

              if (chart) {
                chart.destroy();
              }

              chart = new Chart(ctx, {
                type: 'line',
                data: {
                  labels: labels,
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
                    tension: 0.4
                  }]
                },
                options: {
                  responsive: true,
                  plugins: {
                    title: {
                      display: true,
                      text: 'Transaction Count - ' + period.charAt(0).toUpperCase() + period.slice(1),
                      font: {
                        size: 24
                      },
                      color: '#007bff' // Set title color to blue
                    },
                    legend: {
                      labels: {
                        font: {
                          size: 16
                        }
                      }
                    }
                  },
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: period === 'today' ? 'Hour' : (period === 'month' ? 'Day' : 'Month'),
                        font: {
                          size: 18
                        },
                        color: '#007bff' // Set title color to blue
                      },
                      grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                      },
                      ticks: {
                        font: {
                          size: 14
                        }
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of Transactions',
                        font: {
                          size: 18
                        }
                      },
                      beginAtZero: true,
                      grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                      },
                      ticks: {
                        font: {
                          size: 14
                        }
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
        }

        // The rest of your code remains unchanged

        // Initial chart load
        updateChart('year');

        // Add click event listeners to the cards
        $('#todayCard').click(function() {
          updateChart('today');
        });

        $('#monthCard').click(function() {
          updateChart('month');
        });

        $('#yearCard').click(function() {
          updateChart('year');
        });
      });
    </script>
</body>

</html>