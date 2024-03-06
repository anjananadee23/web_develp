<?php

require_once './../includes/job.dbh.inc.php';

$sql = "SELECT jobCategory, jobCount FROM job_categories";

$result = mysqli_query($conn, $sql);

// Initialize arrays to store labels and data for the chart
$jobCategories = [];
$jobCounts = [];

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        $jobCategories[] = $row['jobCategory'];
        $jobCounts[] = $row['jobCount'];
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Category Chart</title>
  
  <!-- Include Chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <!-- Container for the bar chart -->
  <div style="width: 800px; margin: auto;">
    <canvas id="jobCategoryChart"></canvas>
  </div>

  <!-- JavaScript code to create the bar chart -->
  <script>
    // Get job categories and counts from PHP
    var jobCategories = <?php echo json_encode($jobCategories); ?>;
    var jobCounts = <?php echo json_encode($jobCounts); ?>;

    // Create the bar chart using Chart.js
    var ctx = document.getElementById('jobCategoryChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: jobCategories,
        datasets: [{
          label: 'Job Count',
          data: jobCounts,
          backgroundColor: ['rgba(54, 162, 235, 0.5)', //(Blue)
                            'rgba(235, 54, 162, 0.5)', //(Magenta)
                            'rgba(162, 235, 54, 0.5)', //(Lime)
                            'rgba(54, 235, 162, 0.5)', //(Turquoise)
                            'rgba(162, 54, 235, 0.5)', //(Purple)
                            'rgba(235, 162, 54, 0.5)', //(Orange)
                            'rgba(162, 235, 235, 0.5)', //(Light Blue)
                            'rgba(235, 162, 162, 0.5)', //(Light Red)
                            'rgba(162, 162, 235, 0.5)', //(Light Purple)
                            'rgba(235, 235, 162, 0.5)', //(Light Yellow)
                            'rgba(162, 235, 162, 0.5)', //(Light Green)
                            'rgba(235, 162, 235, 0.5)', //(Light Magenta)
                            'rgba(162, 235, 235, 0.5)', //(Light Cyan)
                            'rgba(200, 200, 200, 0.5)', //(Gray)
                            'rgba(255, 0, 0, 0.5)', //(Red)
                            'rgba(0, 255, 0, 0.5)', //(Green)
                            'rgba(0, 0, 255, 0.5)', //(Blue)
                            'rgba(255, 255, 0, 0.5)', //(Yellow)
                            'rgba(255, 0, 255, 0.5)', //(Magenta)
                            'rgba(0, 255, 255, 0.5)', //(Cyan)
                            'rgba(128, 0, 128, 0.5)', //(Purple)
                            'rgba(128, 128, 0, 0.5)', //(Olive)
                            'rgba(0, 128, 128, 0.5)'], //(Teal)

          borderColor: ['rgba(54, 162, 235, 1)', //(Blue)
                        'rgba(235, 54, 162, 1)', //(Magenta)
                        'rgba(162, 235, 54, 1)', //(Lime)
                        'rgba(54, 235, 162, 1)', //(Turquoise)
                        'rgba(162, 54, 235, 1)', //(Purple)
                        'rgba(235, 162, 54, 1)', //(Orange)
                        'rgba(162, 235, 235, 1)', //(Light Blue)
                        'rgba(235, 162, 162, 1)', //(Light Red)
                        'rgba(162, 162, 235, 1)', //(Light Purple)
                        'rgba(235, 235, 162, 1)', //(Light Yellow)
                        'rgba(162, 235, 162, 1)', //(Light Green)
                        'rgba(235, 162, 235, 1)', //(Light Magenta)
                        'rgba(162, 235, 235, 1)', //(Light Cyan)
                        'rgba(200, 200, 200, 1)', //(Gray)
                        'rgba(255, 0, 0, 1)', //(Red)
                        'rgba(0, 255, 0, 1)', //(Green)
                        'rgba(0, 0, 255, 1)', //(Blue)
                        'rgba(255, 255, 0, 1)', //(Yellow)
                        'rgba(255, 0, 255, 1)', //(Magenta)
                        'rgba(0, 255, 255, 1)', //(Cyan)
                        'rgba(128, 0, 128, 1)', //(Purple)
                        'rgba(128, 128, 0, 1)', //(Olive)
                        'rgba(0, 128, 128, 1)'], //(Teal)
                        
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1,
              precision: 0
            }
          }
        }
      }
    });
  </script>
</body>
</html>
