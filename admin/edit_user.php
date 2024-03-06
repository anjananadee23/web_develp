<?php

include("admin_header.php");
// Include database connection
include("./../includes/dbh.inc.php");

// Check if user ID and tab are provided in the URL
if(isset($_GET['id']) && isset($_GET['tab'])) {
    $userId = $_GET['id'];
    $tab = $_GET['tab'];
    
    // Define the table and ID column based on the tab
    $table = ($tab === 'seekers') ? 'seeker_data' : 'recruiter_data';
    $idColumn = ($tab === 'seekers') ? 'userId' : 'recId';

    // Fetch user details from the database
    $sql = "SELECT * FROM $table WHERE $idColumn = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, display edit form
        $row = $result->fetch_assoc();
?>
<main>
    <div class="recent_jobs">
        <h1>Edit User</h1>
        <form method="post" action="./../includes/admin.update.user.inc.php">
            <label for="userId"><?php echo ucfirst($tab); ?> ID:</label>
            <?php echo $row[$idColumn]; ?><br>

            <input type="hidden" name="userId" value="<?php echo $row[$idColumn]; ?>"> <!-- Include userId parameter -->

            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>"><br>

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" value="<?php echo $row['lastName']; ?>"><br>

            <?php if ($tab === 'seekers') : ?>
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>

            <?php else : ?>
                <label for="companyName">Company Name:</label>
                <input type="text" name="companyName" value="<?php echo $row['companyName']; ?>"><br>

            <?php endif; ?>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $row['userName']; ?>"><br>

            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>

            <label for="password">Password:</label>
            <input type="text" name="password" placeholder="New Password"><br>

            <!-- Add more fields as needed -->
            <input type="hidden" name="tab" value="<?php echo $tab; ?>"> <!-- Include tab parameter -->
            <input type="submit" name="update_user" value="Update User">
        </form>
    </div>
</main>
<?php
    } else {
        echo "<p>User not found.</p>";
    }
} else {
    echo "<p>Tab parameter is missing.</p>";
}
?>
