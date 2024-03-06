<?php include("header.php"); ?>

<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION["recid"]) && !isset($_SESSION["userid"])) {
    // User is not logged in, redirect to the login page
    header("Location: login_seeker_recruiter.php");
    exit(); // Stop further execution
}

// Include the database connection file
require_once("./includes/dbh.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/contactus.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/home.css">
  <title>Job Contact Form</title>
</head>
<body>

  <div class="container">
    <form action="./includes/contactus.inc.php" method="POST">
      <h2>Contact Us for Job Opportunities</h2>
      
      <label for="name">Your Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="email">Your Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="subject">Your Subject:</label>
      <input type="text" id="subject" name="subject" required>
      
      <label for="message">Your Message:</label>
      <textarea id="message" name="message" rows="4" required></textarea>
      
      <button type="submit">Submit</button>
    </form>
  </div>
<?php include("footer.php"); ?>
</body>
</html>
