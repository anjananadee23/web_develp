<!DOCTYPE html>
<html>

<head>
  <title>Job Details</title>

  <!-- Link the external CSS file -->
  <link rel="stylesheet" href="./css/job_details.css">
  <link rel="stylesheet" href="./css/footer.css">

</head>
<body>

<?php include("header.php"); ?>

<div class="container">
<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

include ('./includes/job.dbh.inc.php');

// Check if the job ID is provided in the URL parameter
if(isset($_GET['job_Id'])) {
    // Sanitize the input to prevent SQL injection
    $job_Id = mysqli_real_escape_string($conn, $_GET['job_Id']); // Corrected variable name

    // Query to select job details based on the job ID
    $sql = "SELECT * FROM job_data WHERE jobId = $job_Id";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there is a result
    if ($result->num_rows > 0) {
        // Fetch job details
        $row = $result->fetch_assoc();

        // Display job details
        echo "<h1>JOB DETAILS</h1><hr></br>";
        echo "<h2>Job Details: </h2>";
        echo "<p>Job Title: " . $row["jobTitle"] . "</p>";
        echo "<p>Job Category: " . $row["jobCategory"] . "</p>";
        echo "<p>Job Type: " . $row["jobType"] . "</p>";
        echo "<p>Employment Status: " . $row["empStatus"] . "</p>";
        echo "<p>Salary: $" . $row["salary"] . "</p>";
        echo "<p>Job Location: " . $row["jobLoc"] . "</p>";
        echo "<p>Job Description: " . $row["jobDesc"] . "</p>";
        echo "<p>Benefits: " . $row["benefit"] . "</p></br>";
        echo "<h2>Company Details: </h2>";
        echo "<p>Company Name: " . $row["companyName"] . "</p>";
        echo "<p>Company Website: <a href=" . $row["companyWeb"] . ">" . $row["companyWeb"] . "</a></p>"; // Display as a clickable link
        echo "<p>Company Description: " . $row["companyDesc"] . "</p></br>";
        echo "<h2>Minimum Required Qualifications: </h2>";
        echo "<p>Skills: " . $row["minSkill"] . "</p>";
        echo "<p>Education: " . $row["minEdu"] . "</p></br>";
        echo "<h2>Contact Details of HR Manager: </h2>";
        echo "<p>Name: " . $row["recName"] . "</p>";
        echo "<p>Email: " . $row["recEmail"] . "</p>";
        echo "<p>Contact No.: " . $row["recPhone"] . "</p></br>";
        echo "<h2>Application Details: </h2>";
        echo "<p>Application Instructions: " . $row["appIns"] . "</p>";
        echo "<p>Required Application Materials: " . $row["reqAppMat"] . "</p></br>";
        
        // Display "APPLY" button based on user login status
        if (isset($_SESSION["userid"])) {
            echo "<form id='saveForm' method='post' action='./profile/wishlist.php?action=save'>";
            echo "<input type='hidden' name='job_Id' value='$job_Id'>";
            echo "<button class='submit' type='submit' name='save_job'><b>SAVE</b></button>"; // Change button type to submit
            echo "</form>";

            echo "<a href='job_app_form.php?job_Id=$job_Id'>";
            echo "<button class='submit' type='button' name='submit'><b>APPLY</b></button>";
            echo "</a>";

        } else {
            $_SESSION['redirect_url'] = "../job_app_form.php?job_Id=$job_Id"; // Store complete URL with job_Id
            echo "<a href='seekerlogin.php'>";
            echo "<button class='submit' type='button' name='submit'><b>APPLY</b></button>";
            echo "</a>";

            $_SESSION['redirect_url'] = "../job_details.php?job_Id=$job_Id"; // Store complete URL with job_Id
            echo "<a href='seekerlogin.php'>";
            echo "<button class='submit' type='submit' name='save_job'><b>SAVE</b></button>";
            echo "</a>";
        }

        // You can display additional job details here
    } else {
        echo "No job found with the provided ID.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Job ID not provided.";
}
?>

</div>

<?php include("footer.php"); ?>

</body>
</html>


