<?php
    require_once("./../includes/dbh.inc.php");
    require_once("./../includes/job.dbh.inc.php");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the job_Id parameter is set for delete operation
    $deleteMessage = "";

    if(isset($_GET['job_Id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
        $jobId = $_GET['job_Id'];
        $sql = "DELETE FROM job_portal.job_data WHERE jobId = ?";
        if($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $jobId);
            if(mysqli_stmt_execute($stmt)) {
                
            // Set delete message
            $deleteMessage = "Job deleted successfully.";
        } else {
            $deleteMessage = "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}

    // Fetch all jobs
    $sql = "SELECT * FROM job_portal.job_data ORDER BY createdTime DESC";
    $result = mysqli_query($conn, $sql);
?>

<!-- Recent Jobs -->
<div class="recent_jobs">

        <!-- Display delete message if set -->
    <?php if (!empty($deleteMessage)): ?>
        <div><?php echo $deleteMessage; ?></div>
    <?php endif; ?>

    <center><h2>Recent Jobs</h2></center>
    <table border="1">
        <thead>
            <tr>
                <th>Job ID</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Job Type</th>
                <th>Salary</th>
                <th>Location</th>
                <th>Skills</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row["jobId"]; ?></td>
                        <td><?php echo $row["jobTitle"]; ?></td>
                        <td><?php echo $row["companyName"]; ?></td>
                        <td><?php echo $row["jobType"]; ?></td>
                        <td><?php echo $row["salary"]; ?></td>
                        <td><?php echo $row["jobLoc"]; ?></td>
                        <td><?php echo $row["minSkill"]; ?></td>
                        <td>
                            <a href="./../job_details.php?job_Id=<?php echo $row['jobId']; ?>" class="job-apply-button">View</a><br>
                            
                            <a href="?job_Id=<?php echo $row['jobId']; ?>&action=delete" class="job-apply-button" onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No jobs found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</main>

<?php mysqli_close($conn); ?>
<!------------------
   end main
------------------->
    
</div>

</div>
</div>
</div>
</div>

</body>
</html>
