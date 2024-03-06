<?php

// Include database connection
include("./../includes/dbh.inc.php");

if(isset($_POST['update_user'])) {
    // Retrieve form data
    $userId = isset($_POST['userId']) ? $_POST['userId'] : '';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Hash the new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Determine the table and ID column based on the tab
    if(isset($_POST['tab'])) {
        $tab = $_POST['tab'];
        $table = ($tab === 'seekers') ? 'seeker_data' : 'recruiter_data';
        $idColumn = ($tab === 'seekers') ? 'userId' : 'recId';
    } else {
        echo "Tab parameter is missing";
        exit();
    }

    // Check if address or companyName is set based on the tab
    $additionalFields = '';
    if($tab === 'seekers') {
        if(isset($_POST['address'])) {
            $additionalFields = ", address='{$_POST['address']}'";
        }
    } else {
        if(isset($_POST['companyName'])) {
            $additionalFields = ", companyName='{$_POST['companyName']}'";
        }
    }

    // Perform SQL update
    $sql = "UPDATE $table SET firstName='$firstName', lastName='$lastName', userName='$username', email='$email', password='$hashedPassword' $additionalFields WHERE $idColumn=$userId";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

// Redirect back to the previous page
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
