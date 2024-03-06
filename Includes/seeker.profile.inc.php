<?php
include("../includes/dbh.inc.php");

if(isset($_POST['update_user'])) {
    // Retrieve form data
    $userId = isset($_POST['userId']) ? $_POST['userId'] : '';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $newPassword = isset($_POST['newPassword']) ? password_hash($_POST['newPassword'], PASSWORD_DEFAULT) : ''; // Hash the password
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // Initialize an array to store the fields to update
    $fields = [];
    $params = [];
    $types = '';

    // Prepare SQL statement
    $sql = "UPDATE seeker_data SET ";

    // Check each field for updates
    if (!empty($firstName)) {
        $fields[] = "firstName=?";
        $params[] = $firstName;
        $types .= 's';
    }
    if (!empty($lastName)) {
        $fields[] = "lastName=?";
        $params[] = $lastName;
        $types .= 's';
    }
    if (!empty($newPassword)) {
        $fields[] = "password=?";
        $params[] = $newPassword;
        $types .= 's';
    }
    if (!empty($address)) {
        $fields[] = "address=?";
        $params[] = $address;
        $types .= 's';
    }

    // Concatenate the fields to update into the SQL query
    $sql .= implode(", ", $fields);

    // Add the WHERE clause
    $sql .= " WHERE userId=?";

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Bind parameters
        $paramTypes = $types . "i"; // Assuming userId is an integer
        array_push($params, $userId);
        mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "User updated successfully";
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Redirect back to the previous page
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
