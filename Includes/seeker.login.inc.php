<?php
session_start();

if (isset($_POST["submit"])) {
    $username = $_POST["uname"];
    $password = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $password) !== false) {
        header('Location: ../seekerlogin.php?error=emptyinput');
        exit();
    }

    loginSeeker($conn, $username, $password);
    
} else {
    header('Location:../seekerlogin.php');
    exit();
}
?>