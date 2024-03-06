<?php

// Include the database connection file
require_once 'job.dbh.inc.php';

// Check if the user is logged in and get their recId
session_start();
if (!isset($_SESSION['recid'])) {
    // Redirect the user to the login page if not logged in
    header("Location: reclogin.php");
    exit();
}

// Assuming the recruiter ID is stored in the session
$recId = $_SESSION['recid'];

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Retrieve form data
    $companyName = $_POST['company_name'];
    $companyWeb = $_POST['company_website'];
    $companyDesc = $_POST['company_description'];
    $jobCategory = $_POST['job_category'];
    $jobTitle = $_POST['job_title'];
    $jobDesc = $_POST['job_description'];
    $jobLoc = $_POST['job_location'];
    $jobType = $_POST['job_type'];
    $salary = $_POST['job_salary'];
    $benefit = $_POST['benefit'];
    $empStatus = $_POST['employment_status'];
    $recName = $_POST['recruiter_name'];
    $recEmail = $_POST['recruiter_email'];
    $recPhone = $_POST['recruiter_phone'];
    $minSkill = $_POST['skills'];
    $minEdu = $_POST['education'];
    $appIns = $_POST['application_instructions'];
    $reqAppMat = $_POST['required_materials'];


    // Prepare the SQL query
    $sql = "INSERT INTO job_data (recId, companyName, companyWeb, companyDesc, jobCategory, jobTitle, jobDesc, jobLoc, jobType, salary, benefit, empStatus, recName, recEmail, recPhone, minSkill, minEdu, appIns, reqAppMat)
            VALUES ('$recId', '$companyName', '$companyWeb', '$companyDesc', '$jobCategory', '$jobTitle', '$jobDesc', '$jobLoc', '$jobType', '$salary', '$benefit', '$empStatus', '$recName', '$recEmail', '$recPhone', '$minSkill', '$minEdu', '$appIns', '$reqAppMat')";
    
    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        // Handle database error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
$conn->close();

?>
