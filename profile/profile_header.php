<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./../images/logo1.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="./../css/profile.css">
  <link rel="stylesheet" href="./../css/home.css">
  <link rel="stylesheet" href="./css/footer.css">

  <title>My Profile</title>
  
</head>
<body>

<div class="homecontainer">
  <br>
  <div class="navbar">
        <img src="./../images/logo.png" class="logo">
        <nav>
            <ul>
                <li><a class="tab active" href="./../index.php">Home</a></li>
                <li><a href="./../index.php#jobs">Jobs</a></li>
                <li><a href="./../aboutus.php">About Us</a></li>
                <li><a href="./../contactus.php">Contact Us</a></li>
                <li><a href="./../faq.php">Help</a></li>
                <li><a href="./../adminlogin.php">Administration</a></li>
            </ul>
        </nav>

        <?php if(isset($_SESSION["fname"])): ?>
    <?php
    // Determine the profile page based on the user's role
    $profilePage = "";
    $wishlistPage = ""; // Add wishlist page variable
    if (isset($_SESSION["userid"])) {
        $profilePage = "seekerprofile.php";
        $wishlistPage = "./../wishlist.php"; // Define wishlist page for seeker
    } elseif (isset($_SESSION["recid"])) {
        $profilePage = "recruiterprofile.php";
    }
    ?>
    <i class="fa fa-user-circle-o icon" style="font-size:20px"></i>
    <?php if(!empty($profilePage)): ?>
        <a href="<?php echo $profilePage; ?>"><?php echo $_SESSION['fname']; ?></a>
        <?php if(!empty($wishlistPage)): ?>
            <a href="<?php echo $wishlistPage; ?>">Wishlist</a> <!-- Add wishlist link for seeker -->
        <?php endif; ?>
    <?php else: ?>
        <span><?php echo $_SESSION['fname']; ?></span>
    <?php endif; ?>
    <a href="./../includes/logout.inc.php">Logout</a>
<?php else: ?>
    <i class="fa fa-user-circle-o icon" style="font-size:20px"></i>
    <a href="./../login_seeker_recruiter.php">Log In</a>
    <a href="./../signup_seeker_recruiter.php">Sign Up</a>
<?php endif; ?>

      </div>

   <div class="container">
      <aside>
         
         <!-- end top -->
          <!-- --------------
    end asid
-------------------- -->
<div class="sidebar">
<?php if(isset($_SESSION["userid"])): ?>
        <a href="seekerprofile.php">
            <span class="material-symbols-sharp">grid_view </span>
            <h2>Dashbord</h2> <!-- Display for Seeker -->
        </a>
    <?php elseif(isset($_SESSION["recid"])): ?>
        <a href="recruiterprofile.php">
            <span class="material-symbols-sharp">grid_view </span>
            <h2>Dashbord</h2> <!-- Display for Recruiter -->
        </a>
        <?php endif; ?>

    <?php if(isset($_SESSION["userid"])): ?>
        <a href="./../wishlist.php">
            <span class="material-symbols-sharp">receipt_long </span>
            <h2>My Job Details</h2> <!-- Display for Seeker -->
        </a>
    <?php elseif(isset($_SESSION["recid"])): ?>
        <a href="#">
            <span class="material-symbols-sharp">receipt_long </span>
            <h2>Job Applied</h2> <!-- Display for Recruiter -->
        </a>
    <?php endif; ?>
    <a href="settings.php">
        <span class="material-symbols-sharp">settings </span>
        <h2>Settings</h2>
    </a>
    <a href="seekerprofile.php">
        <span class=""> </span>
        <h2> </h2>
    </a>
</div>


      </aside>
      <!-- --------------
        end asid
      -------------------- -->
