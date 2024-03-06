<?php
function emptyInputSignup($fname, $lname, $username, $email, $address, $pwd, $pwdrepeat){
    $result;
    if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($address) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyRecInputSignup($fname, $lname, $comname, $username, $email, $comaddress, $pwd, $pwdrepeat){
    $result;
    if (empty($fname) || empty($comname)|| empty($lname) || empty($username) || empty($email) || empty($comaddress) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUname($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
    $result;
    if ($pwd !== $pwdrepeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function unameExists($conn, $username, $email){
    $sql = "SELECT * FROM seeker_data WHERE userName = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../seekersignup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function recunameExists($conn, $username, $email){
    $sql = "SELECT * FROM recruiter_data WHERE userName = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../recruitersignup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createSeeker($conn, $fname, $lname, $address, $username, $email, $pwd){
    $sql = "INSERT INTO seeker_data (firstName, lastName, address, userName, email, password) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../seekersignup.php?error=stmtfailed");
        exit();
    }
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $address, $username, $email, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../seekersignup.php?error=none");
    exit();
}

function createRecruiter($conn, $fname, $lname, $comname, $comaddress, $username, $email, $pwd){
    $sql = "INSERT INTO recruiter_data (firstName, lastName, companyName, comAddress, userName, email, password) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../recruitersignup.php?error=stmtfailed");
        exit();
    }
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $comname, $comaddress, $username, $email, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../recruitersignup.php?error=none");
    exit();
}

function emptyInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyRecInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginSeeker($conn, $username, $password){
    $unameExist = unameExists($conn, $username, $username);
    if ($unameExist === false){
        header("Location: ../seekerlogin.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $unameExist["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false){
        header("Location: ../seekerlogin.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $unameExist["userId"];
        $_SESSION["username"] = $unameExist["userName"];
        $_SESSION["fname"] = $unameExist["firstName"];

        // Check if there is a stored redirect URL in the session
        if(isset($_SESSION['redirect_url'])) {
            // Get the stored redirect URL
            $redirect_url = $_SESSION['redirect_url'];

            // Redirect the user to the stored URL
            header("Location: $redirect_url");
            exit();
        } else {
            // Redirect the user to the home page or any other default page
            header("Location: ../index.php");
            exit();
        }
    }
}

function loginRecruiter($conn, $username, $password){
    $recunameExist = recunameExists($conn, $username, $username);
    if ($recunameExist === false){
        header("Location: ../reclogin.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $recunameExist["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false){
        header("Location: ../reclogin.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true){
        session_start();
        $_SESSION["recid"] = $recunameExist["recId"];
        $_SESSION["username"] = $recunameExist["userName"];
        $_SESSION["fname"] = $recunameExist["firstName"];
        header("Location: ../index.php");
        exit();
    }
}

// In your login function
function loginAdmin($conn, $username, $password) {
    // Hardcoded admin credentials
    $adminUsername = 'admin';
    $adminPassword = '1234';

    // Check if provided credentials match admin credentials
    if ($username === $adminUsername && $password === $adminPassword) {
        // Admin login successful
        session_start(); // Start the session
        $_SESSION['admin'] = true; // Create a session variable to indicate admin login
        header("Location: ./../admin/admindash.php"); // Redirect to the admin dashboard
        exit(); // Exit to prevent further execution
    } else {
        header("Location: ./../adminlogin.php?error=wronglogin");
        return false;
    }
}
