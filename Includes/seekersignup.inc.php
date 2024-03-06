<?php
if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSignup($fname, $lname, $username, $email, $address, $pwd, $pwdrepeat);
    $invalidUname = invalidUname($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdrepeat);
    $unameExists = unameExists($conn, $username, $email);
    
    if ($emptyInput !== false){
        header("Location:../seekersignup.php?error=emptyinput");
        exit();
    }
    if ($invalidUname !== false){
        header("Location:../seekersignup.php?error=invalidUname");
        exit();
    }
    if ($invalidEmail !== false){
        header("Location:../seekersignup.php?error=invalidEmail");
        exit();
    }
    if ($pwdMatch !== false){
        header("Location:../seekersignup.php?error=passwordsdontmatch");
        exit();
    }
    if ($unameExists !== false){
        header("Location:../seekersignup.php?error=usernametaken");
        exit();
    }

    createSeeker($conn, $fname, $lname, $address, $username, $email, $pwd);
    
} 
else {
    header('Location:../seekerlogin.php');
    exit();
}