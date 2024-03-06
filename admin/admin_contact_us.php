<!DOCTYPE html>
<html>
<head>
    <title>Admin Contact Us</title>
    <link rel="stylesheet" href="./../css/admin_contact_us.css">
    <link rel="icon" href="./../images/logo1.png">
    
</head>
<body>
<?php include("admin_header.php"); ?>
    
    <?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION["admin"])) {
    // User is not logged in, redirect to the login page
    header("Location: adminlogin.php");
    exit(); // Stop further execution
}

// Include the database connection file
require_once("./../includes/dbh.inc.php");

// Determine if the user is a seeker or a recruiter
$userType = isset($_SESSION["recid"]) ? "recruiter" : "seeker";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $userId = $userType === "seeker" ? $_SESSION["userid"] : null;
    $recId = $userType === "recruiter" ? $_SESSION["recid"] : null;

    // Prepare the SQL statement to insert data into the contact_us table
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

//delete message
if(isset($_GET['delete_msg'])) {
    // Retrieve message ID
    $msgId = isset($_GET['delete_msg']) ? $_GET['delete_msg'] : '';

    // Prepare the SQL statement to delete the message
    $sql = "DELETE FROM Project_db.contact_us WHERE msgId = ?";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $msgId);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Message deleted successfully
        header("Location:?status=success");
        exit();
    } else {
        // Error occurred while deleting message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Fetch data from the contact_us table
$sql = "SELECT * FROM Project_db.contact_us";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Recruiter ID</th>
            <th>Seeker ID</th>
            <th>Action</th>
        </tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td>" . $row["recId"] . "</td>";
        echo "<td>" . $row["userId"] . "</td>";
        echo "<td><a href='?delete_msg=".$row["msgId"]."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</div>
<?php include './admin_footer.php';?>
</html>