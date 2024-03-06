<?php

include 'job.dbh.inc.php';

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $job_Id = $_POST['job_Id']; // Sanitized later in the SQL query
    $userId = $_POST['userId']; // Retrieve userId from the form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNo = mysqli_real_escape_string($conn, $_POST['phoneNo']);
    $preEmp = mysqli_real_escape_string($conn, $_POST['preEmp']);
    $datesEmp = mysqli_real_escape_string($conn, $_POST['datesEmp']);
    $jobTitle = mysqli_real_escape_string($conn, $_POST['jobTitle']);
    $resDuties = mysqli_real_escape_string($conn, $_POST['resDuties']);
    $resLeave = mysqli_real_escape_string($conn, $_POST['resLeave']);
    $eduIns = mysqli_real_escape_string($conn, $_POST['eduIns']);
    $areaStu = mysqli_real_escape_string($conn, $_POST['areaStu']);
    $eduQua = mysqli_real_escape_string($conn, $_POST['eduQua']);
    $relSkill = mysqli_real_escape_string($conn, $_POST['relSkill']);
    $softSkill = mysqli_real_escape_string($conn, $_POST['softSkill']);
    $proLic = mysqli_real_escape_string($conn, $_POST['proLic']);
    $cv = mysqli_real_escape_string($conn, $_POST['cv']);
    $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    // You can add more fields as needed and validate them

    // Insert the data into the database
    $sql = "INSERT INTO job_applications (job_Id, userId, name, email, phoneNo) VALUES ('$job_Id', '$userId', '$name', '$email', '$phoneNo')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted.";
}
?>
