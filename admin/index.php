<?php

require_once '../api/db_connection.php';

session_start();

if (!isset($_SESSION['id']) || $_SESSION['userlevel'] !== 'admin') {
  header('Location: ../index.php');
  exit;
}

$sql = "SELECT DISTINCT truck_type FROM Vehicle";
$result = $conn->query($sql);

$truckTypes = [];
while ($row = $result->fetch_assoc()) {
  $truckTypes[] = $row['truck_type'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="../assets/Untitled-1.png" />
</head>

<body class="bg-light">

  <?php
  include_once('./navbar/navbar.php');
  ?>

  <div class="content" id="content">
    <div class="container">
      <h1 class="display-5 mb-3 fw-bold">Dashboard</h1>
      <div class="row">
        <div class="col">
          <div class="greetings-item p-4 shadow-sm bg-body rounded">
            <h5><i class="fas fa-hand greetings-icon"></i>Welcome, <?php echo $_SESSION['username']; ?>! <small class="text-muted">You are logged in as <?php echo $_SESSION['userlevel']; ?>.</small>
          </div>
        </div>
        <div class="col">
          <div class="greetings-item p-4 shadow-sm bg-body rounded">
            <h5><i class="fas fa-exclamation greetings-icon"></i>Need Help? <small class="text-muted">Click <a href="help.php" target="_blank">here</a> for more information.</small"></a>. </small>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="container shadow-sm p-3 mb-5 bg-white rounded text-center">
            <div class="row">
              <div class="col">
              </div>
              <div class="col-md-4">
                <div>
                  <select id="transactionPeriodSelect" class="form-select">
                    <option value="today">Today</option>
                    <option value="month">This Month</option>
                    <option value="year" selected>This Year</option>
                  </select>
                </div>
              </div>
            </div>
            <div>
              <canvas id="transactionChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="container shadow-sm p-3 mb-5 bg-white rounded text-center">
            <div class="row">
              <div class="col">

              </div>
              <div class="col-md-4">
                <select id="truckTypeDropdown" class="form-select">
                  <option value="">All Truck Types</option>
                  <?php foreach ($truckTypes as $type) { ?>
                    <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                  <?php } ?>
                </select>
              </div>
              <div>
                <canvas id="vehicleEntryChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/74741ba830.js" crossorigin="anonymous"></script>
  <script src="../public/js/chart.umd.js"></script>p
  <script src="js/admin.js"></script>
  <script>
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
                  },
                  legend: {
                    display: false,

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
                        size: 16
                      }
                    },
                    beginAtZero: true,

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

      // Initial chart load
      updateChart('year');

      // Add event listener for the select dropdown
      $('#transactionPeriodSelect').change(function() {
        var period = $(this).val();
        updateChart(period);
      });

      var vehicleChart;

      function updateVehicleEntryChart(period, truckType) {
        $.ajax({
          url: 'fetch_vehicle_entry_data.php',
          type: 'GET',
          data: {
            period: period,
            truck_type: truckType
          },
          dataType: 'json',
          success: function(data) {
            var ctx = document.getElementById('vehicleEntryChart').getContext('2d');

            var labels = data.map(function(item) {
              return item.plate_number;
            });

            var counts = data.map(function(item) {
              return item.entry_count;
            });

            if (vehicleChart) {
              vehicleChart.destroy();
            }

            vehicleChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: labels,
                datasets: [{
                  label: 'Number of Entries',
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 2,
                  pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                  pointBorderColor: '#fff',
                  pointHoverBackgroundColor: '#fff',
                  pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
                  data: counts
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  title: {
                    display: true,
                    text: 'Vehicle Entry Count - ' + period.charAt(0).toUpperCase() + period.slice(1),
                    font: {
                      size: 24
                    }
                  },
                  legend: {
                    display: false
                  }
                },
                scales: {
                  x: {
                    title: {
                      display: true,
                      text: 'Plate Number',
                      font: {
                        size: 18
                      }
                    }
                  },
                  y: {
                    beginAtZero: true,
                    title: {
                      display: true,
                      text: 'Number of Entries',
                      font: {
                        size: 16
                      }
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
            console.error('Error fetching vehicle data:', error);
          }
        });
      }

      // Initialize the vehicle entry chart
      updateVehicleEntryChart('year', '');

      // Add event listeners for select dropdown selections
      $('#transactionPeriodSelect').change(function() {
        var period = $(this).val();
        var truckType = $('#truckTypeDropdown').val(); // Get the selected truck type
        updateVehicleEntryChart(period, truckType);
      });

      $('#truckTypeDropdown').change(function() {
        var period = $('#transactionPeriodSelect').val(); // Get the selected period
        var truckType = $(this).val();
        updateVehicleEntryChart(period, truckType);
      });

    });
  </script>
</body>

</html>