<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION["recid"]) && !isset($_SESSION["userid"])) {
    // User is not logged in, redirect to the login page
    header("Location: login_seeker_recruiter.php");
    exit(); 
}

// Include the database connection file
require_once("dbh.inc.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    //user ID based on the session data
    $userId = isset($_SESSION["userid"]) ? $_SESSION["userid"] : null;
    $recId = isset($_SESSION["recid"]) ? $_SESSION["recid"] : null;

    //SQL statement to insert data into the contact_us table
    $sql = "INSERT INTO Project_db.contact_us (name, email, subject, message, userId, recId) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ssssii", $name, $email, $subject, $message, $userId, $recId);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Data inserted successfully
        header("Location: contactus.php?status=success");
        exit();
    } else {
        // Error occurred while inserting data
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
