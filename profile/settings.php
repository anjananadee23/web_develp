<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="./../css/recprofile.css">
    <link rel="stylesheet" href="./../css/settings.css">
</head>
<body>
    <?php
// Include database connection
include("./../includes/dbh.inc.php");

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["userid"]) && !isset($_SESSION["recid"])) {
    header("Location: seekerlogin.php"); // Redirect to the appropriate login page
    exit();
}

// Initialize variables
$userData = [];
$idField = ""; // Define the idField variable
$tableName = ""; // Define the tableName variable
$userType = ""; // Define the user type variable

// Fetch user data based on the user's role (seeker or recruiter)
if (isset($_SESSION["userid"])) { // Seeker
    $userId = $_SESSION["userid"];
    $tableName = "seeker_data";
    $idField = "userId"; // Define the idField for the seeker table
    $userType = "Seeker"; // Define the user type
    $updateFile = "seeker.profile.inc.php"; // Define the update file for seeker
} elseif (isset($_SESSION["recid"])) { // Recruiter
    $userId = $_SESSION["recid"];
    $tableName = "recruiter_data";
    $idField = "recId"; // Define the idField for the recruiter table
    $userType = "Recruiter"; // Define the user type
    $updateFile = "rec.profile.inc.php"; // Define the update file for recruiter
}

// Prepare and execute SQL query to fetch user data
$query = "SELECT * FROM $tableName WHERE $idField = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $userId); // Bind the parameter
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch the user data as an associative array
if ($row = mysqli_fetch_assoc($result)) {
    $userData = $row;
} else {
    // Handle case where user data is not found
    echo "User data not found!";
}

// Include header
include("profile_header.php");
?>

<main>
    <h1>Settings</h1>
    <h2><?php echo $userType; ?> Details</h2>
    <table>
        <tr>
            <th>Attribute</th>
            <th>Value</th>
        </tr>
        <?php foreach ($userData as $key => $value): ?>
            <?php if ($key !== 'password'): ?> <!-- Exclude password field from display -->
                <tr>
                    <td><?php echo ucwords(str_replace('_', ' ', $key)); ?></td>
                    <td>
                        <?php 
                        // Display attribute value based on the attribute key
                        echo $value;
                        ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <h2>Update Details</h2>
    <form id="update_form" action="./../includes/<?php echo $updateFile; ?>" method="post"> <!-- Updated form action -->
        <input type="hidden" name="userId" value="<?php echo $userId; ?>"> <!-- Include userId as a hidden field -->
        <input type="hidden" name="tab" value="<?php echo isset($_SESSION["userid"]) ? 'seekers' : 'recruiters'; ?>"> <!-- Include tab as a hidden field -->
        
        <!-- Include fields for updating common details -->
        <label for="new_first_name">New First Name:</label>
        <input type="text" id="new_first_name" name="firstName" placeholder="<?php echo isset($userData['first_name']) ? $userData['first_name'] : ''; ?>">
        <label for="new_last_name">New Last Name:</label>
        <input type="text" id="new_last_name" name="lastName" placeholder="<?php echo isset($userData['last_name']) ? $userData['last_name'] : ''; ?>">
        <label for="new_password">New Password:</label>
        <input type="text" id="new_password" name="newPassword" placeholder="Enter New Password">

        <!-- Include fields for updating specific details -->
        <?php if ($tableName === "seeker_data"): ?>
            <label for="new_address">New Address:</label>
            <input type="text" id="new_address" name="address" placeholder="<?php echo isset($userData['address']) ? $userData['address'] : ''; ?>">
        <?php elseif ($tableName === "recruiter_data"): ?>
            <label for="new_company_name">New Company Name:</label>
            <input type="text" id="new_company_name" name="companyName" placeholder="<?php echo isset($userData['company_name']) ? $userData['company_name'] : ''; ?>">
            <label for="new_company_address">New Company Address:</label>
            <input type="text" id="new_company_address" name="comAddress" placeholder="<?php echo isset($userData['contact_person']) ? $userData['contact_person'] : ''; ?>">
        <?php endif; ?>
        
        <!-- Add more fields for other information to be updated -->
        <button type="submit" name="update_user">Update</button> <!-- Updated button name -->
    </form>
</main>
</div>

</body>
</html>

<?phpinclude("./pro_footer.php");
?>
