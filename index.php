<?php 
include 'header.php';
include './includes/job.dbh.inc.php'; 
?>
    <center>
        <div class="row">
            <div class="col">

            <h1>Hello <?php echo isset($_SESSION["fname"]) ? $_SESSION["fname"] . ' !' : 'User!'; ?></h1>
            <p>"Welcome to HOT JOB !!! "</br> Your Gateway to Exciting Career Opportunities! Discover a World of Possibilities with Our Premier Job Recruitment Platform. Whether You're a Seasoned Professional Seeking Your Next Challenge or a Company Looking to Hire Top Talent, HOT JOB Connects You with the Perfect Match. Explore Our Curated Listings, Personalized Job Recommendations, and Cutting-Edge Recruitment Tools to Streamline Your Hiring Process. Join HOT JOB Today and Unlock the Potential of Your Career or Business!"</p>

            <?php if(isset($_SESSION["recid"])): ?>
                <a href="job_post_form.php">
                <button class="submit" type="button" name="submit"><b>POST JOB</b></button>
                </a>
            <?php else: ?>
                <a href="reclogin.php">
                <button class="submit" type="button" name="submit"><b>POST JOB</b></button>
                </a>
            <?php endif; ?>  

            <?php if(isset($_SESSION["userid"])): ?>
                <a href="jobcategory.php">
                <button class="submit" type="button" name="submit"><b>FIND JOB</b></button>
                </a>
            <?php else: ?>
                <a href="jobcategory.php">
                <button class="submit" type="button" name="submit"><b>FIND JOB</b></button>
                </a>
            <?php endif; ?>  
        </div>
    </div>
    </center>

    
</div>
</div>
</div>

<div class="jobCat">
<?php include 'jobcategory.php';?>
</div>
<?php include 'recentjob.php';?>
<?php include 'footer.php';?>

<script src="js/script.js"></script>

</body>
</html>




