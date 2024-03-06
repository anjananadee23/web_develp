<?php
include_once 'dbh.inc.php'; // Include the database connection

// Function to add a job to the wishlist
function addToWishlist($userId, $jobId) {
    global $conn;
    $sql = "INSERT INTO wishlist (userId, jobId) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ii", $userId, $jobId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        return false;
    }
}

// Function to retrieve saved jobs from the wishlist
function getSavedJobs($userId) {
    global $conn;
    $savedJobs = array();
    $sql = "SELECT j.* FROM wishlist w JOIN job_data j ON w.jobId = j.jobId WHERE w.userId = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind parameter and execute the statement
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $savedJobs[] = $row;
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $savedJobs;
}

// Function to remove a job from the wishlist
function removeFromWishlist($userId, $jobId) {
    global $conn;
    $sql = "DELETE FROM wishlist WHERE userId = ? AND jobId = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ii", $userId, $jobId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        return false;
    }
}
?>
