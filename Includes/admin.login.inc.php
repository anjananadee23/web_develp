<?php
session_start();

if (isset($_POST["submit"])) {
    $username = $_POST["uname"];
    $password = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $password) !== false) {
        header('Location: ../adminlogin.php?error=emptyinput');
        exit();
    }

    loginAdmin($conn, $username, $password);
    
} else {
    header('Location:../adminlogin.php');
    exit();
}
?>