<?php
// Include necessary files
include("./../includes/dbh.inc.php");

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if seeker is logged in
if (!isset($_SESSION["userid"])) {
    header("Location: ./../seekerlogin.php");
    exit();
}

// Fetch seeker data from session
$userId = $_SESSION["userid"];
$seekerUsername = $_SESSION["username"];
$seekerFirstName = $_SESSION["fname"];

// Fetch seeker data from database
$query = "SELECT * FROM seeker_data WHERE userId = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$seeker = mysqli_fetch_assoc($result);


// Include header after starting the session and performing necessary checks
include("profile_header.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seeker Profile</title>
    <link rel="stylesheet" href="./../css/recprofile.css">

</head>
<body>
    <main>

    <h1>Seeker Profile</h1>
    <p>Username: <?php echo ($seekerUsername); ?></p>
    <p>First Name: <?php echo ($seekerFirstName); ?></p>

    <center>

            <h2>Hello <?php echo isset($_SESSION["fname"]) ? $_SESSION["fname"] . ' !' : 'User!'; ?></h2>
            <br>
            <p>"Welcome to HOT JOB !!! "</p>
            <br> 

            <?php if(isset($_SESSION["userid"])): ?>
                <a href="./../#jobs">
                <button class="submit" type="button" name="submit"><b>FIND JOB</b></button>
                </a>
            <?php else: ?>
                <a href="./../#jobs">
                <button class="submit" type="button" name="submit"><b>FIND JOB</b></button>
                </a>
            <?php endif; ?>  
    
    </center>
    <!-- Add more sections or forms for other profile management features -->

    <script src="./js/admindash.js"></script>
            </div>
</div>
</main>
</body>
</html>

<?php include("./pro_footer.php"); ?>
