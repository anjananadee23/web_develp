<?php session_start(); ?>

<html>
<head>
    <title>Home</title>
    <link rel="icon" href="./images/logo1.png">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/job_category.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<div class="homecontainer">
    <div class="navbar">
        <img src="./images/logo1.png" class="logo">
        <nav>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="./index.php#jobs">Jobs</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="faq.php">Help</a></li>
                <li>
                    <?php if (isset($_SESSION["admin"])): ?> 
                    <a href="./admin/admindash.php">Administration</a>
                    <?php else: ?>
                        <a href="adminlogin.php">Administration</a>
                    <?php endif; ?>
                    </li>
            </ul>
        </nav>
        <?php if(isset($_SESSION["fname"])): ?>
            <?php
            // Determine the profile page based on the user's role
            $profilePage = "";
            if (isset($_SESSION["userid"])) {
                $profilePage = "./profile/seekerprofile.php";
            } elseif (isset($_SESSION["recid"])) {
                $profilePage = "./profile/recruiterprofile.php";
            }
            ?>
            <i class="fa fa-user-circle-o icon" style="font-size:20px"></i>
            <?php if(!empty($profilePage)): ?>
                <a href="<?php echo $profilePage; ?>"><?php echo $_SESSION['fname']; ?></a>
            <?php else: ?>
                <span><?php echo $_SESSION['fname']; ?></span>
            <?php endif; ?>
            <a href="./includes/logout.inc.php">Logout</a>
        <?php else: ?>
            <i class="fa fa-user-circle-o icon" style="font-size:20px"></i>
            <a href="login_seeker_recruiter.php">Log In</a>
            <a href="signup_seeker_recruiter.php">Sign Up</a>
        <?php endif; ?> 
    </div>

