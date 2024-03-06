<!DOCTYPE html>
<html>
<head>
    <title>Transportation/Logistics</title>
    <link rel="stylesheet" href="./../css/job_category.css">

</head>
<body>
<?php include("job_header.php");

include("./../includes/job.dbh.inc.php") ?>

<main>
    <article>
        <!-- SEARCH SECTION -->
        <!-- RECENT JOB SECTION -->
        <div class="width-100 recent-job">
            <div class="jobcontainer">
                <h2 class="recent-job-heading">Transportation/Logistics</h2>

                <div>
                </div>
                
                <!-- JOB LIST -->
                <?php
                // SQL query to select all jobs ordered by created_at in ascending order
                $sql = "SELECT * FROM job_data WHERE jobCategory='Transportation/Logistics' ORDER BY createdTime Desc";
                // Execute the query
                $result = $conn->query($sql);
                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="width-50">
                            <div class="recent-job-list">
                                <div class="width-100">
                                    <h4 class="job-title"><?php echo $row["jobTitle"]; ?></h4>
                                    <p class="job-company"><?php echo $row["companyName"]; ?><i class="fa fa-star" aria-hidden="true"></i> | <?php echo$row["createdTime"]; ?> Posted </p>
                                </div>
                                <div class="width-33">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $row["jobType"]; ?>
                                </div>
                                <div class="width-33">
                                    <i class="fas fa-dollar-sign" aria-hidden="true"></i> <?php echo $row["salary"]; ?>
                                </div>
                                <div class="width-33">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $row["jobLoc"]; ?>
                                </div>
                                <div class="width-100">
                                    <p class="job-skill">
                                        <b>Skills : </b><?php echo $row["minSkill"]; ?>
                                    </p>
                                </div>
                                <div class="width-100">
                                        <!-- Button to show job details in popup/modal -->
                                        <div class="width-100">
                                        <!-- Button to redirect to job details page -->
                                        <a href="./../job_details.php?job_Id=<?php echo $row['jobId']; ?>" class="job-apply-button">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='width-100'>No jobs found.</p>";
                }
                // Close the connection
                $conn->close();
                ?>
            </div>
        </div>
    </article>
</main>


</body>
<?php include("job_footer.php"); ?>
</html>