<?php
if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $comname = $_POST['comname'];
    $comaddress = $_POST['comaddress'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyRecInputSignup($fname, $lname, $comname, $comaddress, $username, $email, $pwd, $pwdrepeat);
    $invalidUname = invalidUname($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdrepeat);
    $recunameExists = recunameExists($conn, $username, $email);
    
    if ($emptyInput !== false){
        header("Location:../recruitersignup.php?error=emptyinput");
        exit();
    }
    if ($invalidUname !== false){
        header("Location:../recruitersignup.php?error=invalidUname");
        exit();
    }
    if ($invalidEmail !== false){
        header("Location:../recruitersignup.php?error=invalidEmail");
        exit();
    }
    if ($pwdMatch !== false){
        header("Location:../recruitersignup.php?error=passwordsdontmatch");
        exit();
    }
    if ($recunameExists !== false){
        header("Location:../recruitersignup.php?error=usernametaken");
        exit();
    }

    createRecruiter($conn, $fname, $lname, $comname, $comaddress, $username, $email, $pwd);
    
} 
else {
    header('Location:../reclogin.php');
    exit();
}