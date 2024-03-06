<?php
// Include necessary files
require_once("./../includes/dbh.inc.php");
require_once("./../includes/job.dbh.inc.php");

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if recruiter is logged in
if (!isset($_SESSION["recid"])) {
    header("Location: ./../reclogin.php");
    exit();
}

// Fetch recruiter data from session
$recruiterId = $_SESSION["recid"];
$recruiterUsername = $_SESSION["username"];
$recruiterFirstName = $_SESSION["fname"];

// Fetch recruiter data from database
$query = "SELECT * FROM project_db.recruiter_data WHERE recId = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $recruiterId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$recruiter = mysqli_fetch_assoc($result);

// Handle form submissions for updating recruiter information
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        $jobIdToDelete = $_POST['jobIdToDelete'];
        // Delete the job record from the database
        $deleteQuery = "DELETE FROM job_portal.job_data WHERE jobId = ?";
        $deleteStmt = mysqli_prepare($conn, $deleteQuery);
        mysqli_stmt_bind_param($deleteStmt, "i", $jobIdToDelete);
        if (mysqli_stmt_execute($deleteStmt)) {
            // Redirect to the current page after successful deletion
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_stmt_close($deleteStmt);
    }
}

// Include header after starting the session and performing necessary checks
include("profile_header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="./../css/recprofile.css">

</head>
<body>
    <main>
    <h1>Recruiter Profile</h1>

    <?php
        // Fetch jobs posted by this recruiter
        $sql = "SELECT * FROM job_portal.job_data WHERE recId = ? ORDER BY createdTime DESC";

        if($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $recruiterId);
            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) > 0) {
                    echo '<div class="recent_jobs">';
                    echo '<h2>Jobs Posted by Recruiter ID: ' . $recruiterId . '</h2>';
                    echo '<br>';
                    echo '<table border="1">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Job Title</th>';
                    echo '<th>Company</th>';
                    echo '<th>Job Type</th>';
                    echo '<th>Salary</th>';
                    echo '<th>Location</th>';
                    echo '<th>Skills</th>';
                    echo '<th>Action</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row["jobTitle"] . '</td>';
                        echo '<td>' . $row["companyName"] . '</td>';
                        echo '<td>' . $row["jobType"] . '</td>';
                        echo '<td>' . $row["salary"] . '</td>';
                        echo '<td>' . $row["jobLoc"] . '</td>';
                        echo '<td>' . $row["minSkill"] . '</td>';
                        echo '<td>';
                        echo '<a href="./../job_details.php?job_Id=' . $row['jobId'] . '&action=view" class="job-apply-button">View Details</a>';
                        echo '<form method="post" style="display:inline-block;">';
                        echo '<input type="hidden" name="jobIdToDelete" value="' . $row['jobId'] . '">';
                        echo '<button type="submit" name="delete" onclick="return confirm(\'Are you sure you want to delete this job?\')" class="job-apply-button">Delete</button>';
                        echo '<a href="view_applicants.php?job_Id=' . $row['jobId'] . '&action=applicants" class="job-apply-button">View Applicants</a>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo '<div class="recent_jobs">';
                    echo '<p>No jobs found for this recruiter.</p>';
                    echo '</div>';
                }
            } else {
                echo "Error executing statement: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    ?>
    </div>
</main>
</body>
</html>

<?php
    // Close connection
    mysqli_close($conn);
?>
<?php include("./pro_footer.php"); ?>

  <script src="./js/admindash.js"></script>
