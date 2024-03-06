
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet"
    href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/login.css">

</head>

<body>

    <center>
    <div class="loginbox">
            <img src="./images/logo.png" alt="Logo">
            <br>
        <font style="font-family: 'Bahnschrift', sans-serif; font-size: 30px; color: white;"><b>ADMIN SIGN IN</b></font>

        
        <form action="./includes/admin.login.inc.php" method="post">
            
            <div class="inputicon">
                <i class="fa fa-user icon"></i>
                <label for="username">Username</label>
                <input class="inputfield" type="text" name="uname" placeholder="Email or username">
            </div>

            <div class="inputicon">
                <i class="fa fa-lock icon"></i>
                <label for="password">Password</label>
                <input class="inputfield" type="password" name="pwd" placeholder="Password">
            </div>
            <br>
            <button class="submit" type="submit" name="submit"><b>SIGN IN</b></button>
            <br>
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo '<div class="error">Please Fill All Fields !</div>';
                } elseif ($_GET["error"] == "wronglogin"){
                    echo '<div class="error">Invalid Details !</div>';
                } elseif ($_GET["error"] == "stmtfailed"){
                    echo '<div class="error">Something Went Wrong !</div>';
                } elseif ($_GET["error"] == "none"){
                    echo '<div class="error">Account Created.</div>';
                }
            }
            ?>
            <br>
            <font style="color:white">Don't have an account? <a href="seekersignup.php">Sign Up</a></font>
    
        </form>
    </div>
    </center>

</body>
</html>

