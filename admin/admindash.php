<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="icon" href="./../images/logo1.png">
</head>
<body>
  <?php include("admin_header.php"); ?>

<?php 
  require_once("./../includes/dbh.inc.php");
  require_once("./../includes/job.dbh.inc.php");

  // SQL query to count total jobs
  $totalJobSql = "SELECT COUNT(*) AS totalJob FROM job_portal.job_data";
  $totalJobResult = mysqli_query($conn, $totalJobSql);
  $totalJobRow = mysqli_fetch_assoc($totalJobResult);
  $totalJob = $totalJobRow['totalJob'];

  // SQL query to count total seekers
  $totalSeekerSql = "SELECT COUNT(*) AS totalSeeker FROM project_db.seeker_data";
  $totalSeekerResult = mysqli_query($conn, $totalSeekerSql);
  $totalSeekerRow = mysqli_fetch_assoc($totalSeekerResult);
  $totalSeeker = $totalSeekerRow['totalSeeker'];

  // SQL query to count total recruiters
  $totalRecSql = "SELECT COUNT(*) AS totalRec FROM project_db.recruiter_data";
  $totalRecResult = mysqli_query($conn, $totalRecSql);
  $totalRecRow = mysqli_fetch_assoc($totalRecResult);
  $totalRec = $totalRecRow['totalRec'];
?>

<main>
  <h1>ADMIN DASHBOARD</h1>

  <div class="insights">

    <!-- Total Jobs -->
    <div class="jobs">
      <span class="material-symbols-sharp">trending_up</span>
      <div class="middle">
        <div class="left">
          <h3>Total Jobs</h3>
          <h1>(<?php echo $totalJob; ?>)</h1>
        </div>
        <div class="progress">
          <svg>
            <circle r="30" cy="40" cx="40"></circle>
          </svg>
          <div class="number"><h2><?php echo $totalJob; ?></h2></div>
        </div>
      </div>
      <small>Last 24 Hours</small>
    </div>

    <!-- Total Recruiters -->
    <div class="recs">
      <span class="material-symbols-sharp">local_mall</span>
      <div class="middle">
        <div class="left">
          <h3>Total Recruiters</h3>
          <h1>(<?php echo $totalRec; ?>)</h1>
        </div>
        <div class="progress">
          <svg>
            <circle r="30" cy="40" cx="40"></circle>
          </svg>
          <div class="number"><h2><?php echo $totalRec; ?></h2></div>
        </div>
      </div>
      <small>Last 24 Hours</small>
    </div>

    <!-- Total Seekers -->
    <div class="seekers">
      <span class="material-symbols-sharp">stacked_line_chart</span>
      <div class="middle">
        <div class="left">
          <h3>Total Seekers</h3>
          <h1>(<?php echo $totalSeeker; ?>)</h1>
        </div>
        <div class="progress">
          <svg>
            <circle r="30" cy="40" cx="40"></circle>
          </svg>
          <div class="number"><h2><?php echo $totalSeeker; ?></h2></div>
        </div>
      </div>
      <small>Last 24 Hours</small>
    </div>
  </div>

  <!-- Chart -->
  <div class="chartbox">
    <div class="chart">
      <?php include("charts.php"); ?>
    </div>
  </div>
</main>

<!-- Recent Jobs -->

</body>
</div>
<?php include("./admin_footer.php"); ?>

</html>
