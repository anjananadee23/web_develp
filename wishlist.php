<html>
<head>
    <title>Wishlist</title>
    <link rel="stylesheet" href="./css/wishlist.css">
    <link rel="icon" href="./images/logo1.png">

</head>

<body>
    <?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: seekerlogin.php");
    exit();
}

include_once './includes/dbh.inc.php'; // Include seeker details database connection
include_once './includes/job.dbh.inc.php'; // Include job details database connection
include_once './includes/wishlist.inc.php'; // Include wishlist functions

// Check for both GET and POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'save') {
        // Add job to wishlist
        $job_Id = $_REQUEST['job_Id'];
        if (addToWishlist($_SESSION['userid'], $job_Id)) {
            echo "Job successfully added to wishlist.";
        } else {
            echo "Error adding job to wishlist.";
        }
    }
}

if (isset($_GET['job_Id'])) {
    $job_Id = $_GET['job_Id'];

    if (isset($_GET['action']) && $_GET['action'] === 'remove') {
        // Remove job from wishlist
        if (removeFromWishlist($_SESSION['userid'], $job_Id)) {
            echo "Job successfully removed from wishlist.";
        } else {
            echo "Error removing job from wishlist.";
        }
    }
}

// Fetch saved jobs from the wishlist
$savedJobs = getSavedJobs($_SESSION['userid']);

// Display saved jobs
echo "<h2>Saved Jobs</h2>";
echo "<table border='1'>";
echo "<tr><th>Job Title</th><th>Job Category</th><th>Job Type</th><th>Employment Status</th><th>Salary</th><th>Job Location</th><th>Action</th></tr>";
foreach ($savedJobs as $job) {
    echo "<tr>";
    echo "<td>{$job['jobTitle']}</td>";
    echo "<td>{$job['jobCategory']}</td>";
    echo "<td>{$job['jobType']}</td>";
    echo "<td>{$job['empStatus']}</td>";
    echo "<td>{$job['salary']}</td>";
    echo "<td>{$job['jobLoc']}</td>";
    echo "<td>";
    echo "<a href='job_app_form.php?job_Id={$job['jobId']}'>Apply</a> | "; // Apply button with redirection to job_app_form.php
    echo "<a href='wishlist.php?job_Id={$job['jobId']}&action=remove'>Remove</a>"; // Remove button
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</body>
</html>