<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="./../css/admin_users.css">
    <link rel="stylesheet" href="./../css/admin.css">
    <link rel="icon" href="./../images/logo1.png">
</head>
<body>

    <?php
include("admin_header.php");

// Include database connection
include("./../includes/dbh.inc.php");

// Initialize variables
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'seekers';

// Add User
if(isset($_POST['add_user'])) {
    // Handle form submission
    // Retrieve form data
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    // Other fields...
    
    // Check if the tab is set to Seekers or Recruiters
    if ($tab == 'recruiters') {
        // Perform insertion for recruiters
        $sql = "INSERT INTO recruiter_data (firstName, lastName, ...) VALUES ('$firstName', '$lastName', ...)";
    } else {
        // Perform insertion for seekers
        $sql = "INSERT INTO seeker_data (firstName, lastName, ...) VALUES ('$firstName', '$lastName', ...)";
    }
    
    // Execute SQL
    $result = $conn->query($sql);
    // Handle success/failure
}

// Edit User
if(isset($_POST['edit_user'])) {
    // Handle form submission
    // Retrieve form data
    $userId = isset($_POST['userId']) ? $_POST['userId'] : '';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    // Other fields...
    
    // Check if the tab is set to Seekers or Recruiters
    if ($tab == 'recruiters') {
        // Perform update for recruiters
        $sql = "UPDATE recruiter_data SET firstName='$firstName', lastName='$lastName', ... WHERE recId=$userId";
    } else {
        // Perform update for seekers
        $sql = "UPDATE seeker_data SET firstName='$firstName', lastName='$lastName', ... WHERE userId=$userId";
    }
    
    // Execute SQL
    $result = $conn->query($sql);
    // Handle success/failure
}

// Delete User
if(isset($_GET['delete_user'])) {
    // Retrieve user ID
    $userId = isset($_GET['delete_user']) ? $_GET['delete_user'] : '';
    
    // Check if the tab is set to Seekers or Recruiters
    if ($tab == 'recruiters') {
        // Perform deletion for recruiters
        $sql = "DELETE FROM recruiter_data WHERE recId=$userId";
    } else {
        // Perform deletion for seekers
        $sql = "DELETE FROM seeker_data WHERE userId=$userId";
    }
    
    // Execute SQL
    $result = $conn->query($sql);
    // Handle success/failure
}

// Fetch data based on the selected tab (Seekers or Recruiters)
if ($tab == 'seekers') {
    $sql = "SELECT userId, firstName, lastName, address, userName, email, dateCreated FROM seeker_data ORDER BY userId ASC";
    $idColumn = "userId"; // Column name for user ID
    $addressCol = "address";
} elseif ($tab == 'recruiters') {
    $sql = "SELECT recId, firstName, lastName, companyName, userName, email, dateCreated FROM recruiter_data ORDER BY recId ASC";
    $idColumn = "recId"; // Column name for recruiter ID
    $addressCol = "companyName";
}

?>

<main>
    <h1>Users</h1>

    <!-- Tabs for Seekers and Recruiters -->
    <div class="tabs">
        <a href="?tab=seekers" class="<?php echo ($tab == 'seekers') ? 'active' : ''; ?>">Seekers</a>
        <a href="?tab=recruiters" class="<?php echo ($tab == 'recruiters') ? 'active' : ''; ?>">Recruiters</a>
    </div>

    <!-- Recent Jobs -->
    <div class="recent_jobs">
        <h2><?php echo ucfirst($tab); ?> Data</h2>

        <table> 
            <thead>
                <tr>
                    <th><?php echo ucfirst($idColumn); ?></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th><?php echo ucfirst($addressCol); ?></th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch users from database
                $result = $conn->query($sql);
                if (!$result) {
                    echo "Error: " . $sql . "<br>" . $conn->error; // Display error message if query fails
                } elseif ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row[$idColumn]."</td>"; // Displaying user ID or recruiter ID based on the tab
                        echo "<td>".$row["firstName"]."</td>";
                        echo "<td>".$row["lastName"]."</td>";
                        echo "<td>".$row["$addressCol"]."</td>";
                        echo "<td>".$row["userName"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["dateCreated"]."</td>";
                        echo "<td>
                                <a href='edit_user.php?id=".$row[$idColumn]."&tab=".$tab."'>Update</a>
                                <a href='?delete_user=".$row[$idColumn]."&tab=".$tab."'>Delete</a>
                                <a href='view_user.php?id=".$row[$idColumn]."&tab=".$tab."'>Details</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>"; // Display message if no data found
                }
                ?>
            </tbody>
        </table>
    </div>
            </div>
</main>
</body>
<?php include("admin_footer.php"); ?>
</html>
