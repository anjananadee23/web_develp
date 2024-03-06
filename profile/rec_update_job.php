<?php
// Include necessary files
require_once("./../includes/dbh.inc.php");
require_once("./../includes/job.dbh.inc.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update-submit"])) {
    // Retrieve the job ID from the form
    $jobId = $_POST["job_Id"];

    // Fetch the job data from the database based on the job ID
    $sql = "SELECT * FROM job_data WHERE jobId = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $jobId);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                // Fetch the job data
                $row = mysqli_fetch_assoc($result);
                
                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                echo "No job found with that ID.";
            }
        } else {
            echo "Error executing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Job</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file -->
</head>
<body>
    <h2>Update Job</h2>
    <!-- Update job form -->
    <form action="" method="post">
        <!-- Input fields for job data -->
        <input type="text" name="jobTitle" value="<?php echo $row['jobTitle']; ?>">
        <!-- Add more input fields for other job data -->
        <button type="submit" name="update-job">Update Job</button>
    </form>
</body>
</html>
