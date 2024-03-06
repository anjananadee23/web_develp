<!DOCTYPE html>
<html>
<head>
    <title>Job Category Count</title>
    <link rel="stylesheet" href="./../css/job_category_count.css">
</head>
<body>

    <?php

// Include the database connection file
require_once 'job.dbh.inc.php';

// Prepare SQL query to update jobCount in job_categories table
$updateSql = "UPDATE job_categories jc
              LEFT JOIN (
                  SELECT jobCategory, COUNT(*) AS jobCount FROM job_data GROUP BY jobCategory
              ) jd ON jc.jobCategory = jd.jobCategory
              SET jc.jobCount = IFNULL(jd.jobCount, 0)";

// Execute the query to update jobCount
if (mysqli_query($conn, $updateSql)) {
    echo "<center>Job counts updated successfully.</center>";
} else {
    echo "Error updating job counts: " . mysqli_error($conn);
}

// Prepare SQL query to select job categories and their counts
$sql = "SELECT jobCategory, jobCount FROM job_categories";

// Execute the query to fetch updated job counts
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Job Category</th><th>Job Count</th></tr>";

    // Loop through each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve job category and count
        $jobCategory = $row['jobCategory'];
        $jobCount = $row['jobCount'];

        // Output data in table rows
        echo "<tr>";
        echo "<td>$jobCategory</td>";
        echo "<td>$jobCount</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No job categories found.";
}

// Close the database connection
mysqli_close($conn);

?>

<?php include"./../admin/admin_job.php"; ?>
</body>
</html>