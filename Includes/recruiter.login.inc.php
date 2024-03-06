<?php
if (isset($_POST["submit"])) {
    $username = $_POST["uname"];
    $password = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyRecInputLogin($username, $password) !== false) {
        header('Location: ../reclogin.php?error=emptyinput');
        exit();
    }

    loginRecruiter($conn, $username, $password);
}
else {
    header('Location:../reclogin.php');
    exit();
}
