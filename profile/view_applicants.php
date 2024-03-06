<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="./../css/applicants.css">
</head>
<body>
    <?php
// Include necessary files
require_once("./../includes/dbh.inc.php");
require_once("./../includes/job.dbh.inc.php");

// Check if the job ID is set in the URL
if(isset($_GET['job_Id'])) {
    $jobId = $_GET['job_Id'];

    // Retrieve applicants for the specified job from the database
    $sql = "SELECT * FROM job_applications WHERE job_Id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $jobId);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            // Display applicants in a table
            echo '<table>';
            echo '<tr><th>Applicant Name</th><th>Email</th><th>Contact No.</th><th>Applied Date</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phoneNo'] . '</td>';
                echo '<td>' . $row['dateCreated'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "Error executing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
?>

</body>
</html>


