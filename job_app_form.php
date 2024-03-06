<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['userid'])) {
    // Construct the redirect URL with the job_Id if provided
    $redirect_url = isset($_GET['job_Id']) ? "job_app_form.php?job_Id=".$_GET['job_Id'] : "job_app_form.php";
    
    // Store the redirect URL in a session variable
    $_SESSION['redirect_url'] = $redirect_url;

    // Redirect to the login page
    header('Location: seekerlogin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="./css/job_app_form.css">
</head>
<body>
<div class="container">

    <h1>JOB APPLICATION FORM</h1>
    
    <?php
    // Check if the job ID is provided in the URL parameter
    if(isset($_GET['job_Id'])) {
        // Retrieve the job ID from the URL parameter
        $job_Id = $_GET['job_Id'];
        ?>

        <form action="./includes/submit_job_app.php" method="post">

            <input type="hidden" name="job_Id" value="<?php echo $job_Id; ?>">
            <input type="hidden" name="userId" value="<?php echo $_SESSION['userid']; ?>"> <!-- Include userId -->

            <h2>Personal Information</h2>
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="name">Date of Birth:</label>
                <input type="text" id="dob" name="dob" required><br><br>
                <label for="name">Address:</label>
                <input type="text" id="address" name="address" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="phone">Contact No.:</label>
                <input type="text" id="phoneNo" name="phoneNo" required><br><br>

            <h2>Employment History</h2>
                <label for="name">Previous Employers:</label>
                <input type="text" id="preEmp" name="preEmp" required><br><br>
                <label for="name">Dates of Employment:</label>
                <input type="text" id="datesEmp" name="datesEmp" required><br><br>
                <label for="name">Job Titles:</label>
                <input type="text" id="jobTitle" name="jobTitle" required><br><br>
                <label for="email">Responsible and Duties:</label>
                <input type="text" id="resDuties" name="resDuties" required><br><br>
                <label for="phone">Reasons for Leaving:</label>
                <input type="text" id="resLeave" name="resLeave" required><br><br>
            
            <h2>Education Background</h2>
                <label for="name">Educational Institutions Attended:</label>
                <input type="text" id="eduIns" name="eduIns" required><br><br>
                <label for="name">Areas of Study:</label>
                <input type="text" id="areaStu" name="areaStu" required><br><br>
                <label for="name">Education Qualification:</label>
                <input type="text" id="eduQua" name="eduQua" required><br><br>
             
            <h2>Skills and Qualifications</h2>
                <label for="name">Relevant Skills:</label>
                <input type="text" id="relSkill" name="relSkill" required><br><br>
                <label for="name">Soft Skills:</label>
                <input type="text" id="softSkill" name="softSkill" required><br><br>
                <label for="name">Professional Licenses or Accreditations(Optional):</label>
                <input type="text" id="proLic" name="proLic"><br><br>

            <h2>Necessary Uploads Links</h2>
                <label for="name">CV:</label>
                <input type="text" id="cv" name="cv" placeholder="Upload your CV to the Google Drive and paste link here" required><br><br>
                <label for="name">LinkedIn:</label>
                <input type="text" id="linkedin" name="linkedin" placeholder="Upload your LinkedIn account link here" required><br><br>
                <label for="name">Facebook:</label>
                <input type="text" id="facebook" name="facebook" placeholder="Upload your Facebook account link here" required><br><br>
                
                <!-- Add more fields as needed -->
            <button type="submit">Submit Application</button>
        </form>
    <?php
    } else {
        echo "Job ID not provided.";
    }
    ?>
    </div>
</body>
</html>