<?php
session_start(); // Start the session

// Check if admin is logged in
if (!isset($_SESSION["admin"])) {
    // Redirect to login page if not logged in
    header("Location: ./../adminlogin.php");
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Admin User Manage</title>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="./../images/logo1.png">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="./css/footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
   <link rel="stylesheet" href="./../css/admin.css">
   <link rel="icon" href="./../images/logo1.png">
</head>
<body>

<div class="admincontainer">
  <br>
  <div class="navbar">
         <a href="./../index.php">
        <img src="./../images/logo.png" class="logo">
         </a>
        <nav>
        <ul>
            <?php if(isset($_SESSION["fname"])): ?>
                <li><a href="#">ADMIN</a></li>
            <?php else: ?>
               <a href="">
                <li class="right-align">ADMIN</li>
                </a>
            <?php endif; ?> 
        </ul>
        </nav>
      </div>

   <div class="container">
      <aside>
         
         <!-- end top -->
          <div class="sidebar">

            <a href="admindash.php">
              <span class="material-symbols-sharp">grid_view </span>
              <h3>Dashboard</h3>
           </a>


           <a href="admin_users.php" class="">
              <span class="material-symbols-sharp">person_outline </span>
              <h3>Users</h3>
           </a>


            <?php
               require_once("./../includes/dbh.inc.php");
               ?>
               <?php
               $totalMsgSql = "SELECT COUNT(*) AS totalMsg FROM project_db.contact_us";
               $totalMsgResult = mysqli_query($conn, $totalMsgSql);
               $totalMsgRow = mysqli_fetch_assoc($totalMsgResult);
               $totalMsg = $totalMsgRow['totalMsg'];
            ?>

           <a href="admin_contact_us.php">
              <span class="material-symbols-sharp">mail_outline </span>
              <h3>Messages</h3>
              <span class="msg_count">(<?php echo $totalMsg; ?>)</span>
           </a>
           <a href="./job_category_count.inc.php">
              <span class="material-symbols-sharp">receipt_long </span>
              <h3>Jobs</h3>

           </a>
           <a href="./../includes/logout.inc.php">
              <span class="material-symbols-sharp">logout </span>
              <h3>Logout</h3>
           </a>

          </div>

      </aside>
      <!-- End aside -->
