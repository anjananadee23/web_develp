<?php
include("../includes/dbh.inc.php");

if(isset($_POST['update_user'])) {
    // Retrieve form data
    $userId = isset($_POST['userId']) ? $_POST['userId'] : '';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
    $companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
    $comAddress = isset($_POST['comAddress']) ? $_POST['comAddress'] : '';

    // Initialize an array to store the fields to update
    $fields = [];

    // Prepare SQL statement
    $sql = "UPDATE recruiter_data SET ";

    // Check each field for updates
    if (!empty($firstName)) {
        $fields[] = "firstName=?";
    }
    if (!empty($lastName)) {
        $fields[] = "lastName=?";
    }
    if (!empty($newPassword)) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $fields[] = "password=?";
    }
    if (!empty($companyName)) {
        $fields[] = "companyName=?";
    }
    if (!empty($comAddress)) {
        $fields[] = "comAddress=?";
    }

    // Concatenate the fields to update into the SQL query
    $sql .= implode(", ", $fields);

    // Add the WHERE clause
    $sql .= " WHERE recId=?";

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Bind parameters
        $paramTypes = str_repeat("s", count($fields)) . "i"; // Assuming recId is an integer
        $params = [$paramTypes]; // Initialize params array with paramTypes
        // Add each field value to the params array
        foreach([$firstName, $lastName, $hashedPassword, $companyName, $comAddress] as $value) {
            if (!empty($value)) {
                $params[] = $value;
            }
        }
        $params[] = $userId; // Add recId to the params array
        mysqli_stmt_bind_param($stmt, ...$params);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Recruiter updated successfully";
        } else {
            echo "Error updating recruiter: " . mysqli_error($conn);
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
