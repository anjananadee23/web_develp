<html>
<head>
    <title>Seeker Registration</title>
    <link rel="stylesheet"
    href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/signup.css">

</head>

<body>

    <center>
    <div class="signupbox">
            <img src="./images/logo.png" alt="Logo">
            <br>
        <font style="font-family: 'Bahnschrift', sans-serif; font-size: 30px; color: white;"><b>JOB SEEKER SIGN UP</b></font>

        <form action="./includes/seekersignup.inc.php" method="post">

        <table style="width:70%;">
            <tr> 
                <td style="width:40%"><label>First Name</label></th>
                <td><input width="30px" class="inputfield" name="fname" type="text"></td>
            </tr>
            <tr>
                <td style="width:40%"><label>Last Name</label></td>
                <td><input class="inputfield" name="lname" type="text"></td>
            </tr>
            <tr>
                <td><label>Address</label></td>
                <td><input class="inputfield" name="address" type="text"></td>
            </tr>
            <tr>
                <td><label>Username</label></td>
                <td><input class="inputfield" name="username" type="text"></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><input class="inputfield" name="email" type="text"></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input class="inputfield" name="pwd" type="password"></td>
            </tr>
            <tr>
                <td><label>Repeat Password</label></td>
                <td><input class="inputfield" name="pwdrepeat" type="password"></td>
            </tr>
        </table>
            <br>
            <button class="submit" type="submit" name="submit"><b>Register</b></button>
            <br>
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo '<div class="error">Please Fill All Fields !</div>';
                } elseif ($_GET["error"] == "invalidUname"){
                    echo '<div class="error">Invalid Username !</div>';
                } elseif ($_GET["error"] == "invalidEmail"){
                    echo '<div class="error">Invalid Email !</div>';
                } elseif ($_GET["error"] == "passwordsdontmatch"){
                    echo '<div class="error">Password Not Matching !</div>';
                } elseif ($_GET["error"] == "stmtfailed"){
                    echo '<div class="error">Something Went Wrong !</div>';
                } elseif ($_GET["error"] == "none"){
                    echo '<div class="error">Account Created.</div>';
                } elseif ($_GET["error"] == "usernametaken"){
                    echo '<div class="error">Username or Email Already Taken !</div>';
                }
            }
            ?>
            <br>
            <font style="color:white">Already have an account? <a href="seekerlogin.php">Log In</a></font>
    
        </form>
    </div>
    </center>

</body>
</html>
