<?php

?>

<html>
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Job Post Application</title>
     <link rel="stylesheet" href="./css/job_post_form.css">
</head>
<body>

<div class="formBox">
    <div class="formtitle">
        <h1>JOB VACANCY FORM</h1>
        <hr>
</br></br>
    </div>
    <form id="job_post_form" action="./includes/postjob.inc.php" method="post">

        <input type="hidden" name="recId" value="<?php echo $_SESSION['recid']; ?>">

        <h2>Company Details</h2>
        </br>
        <div class="form-group">
            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" required>
        </div>

        <div class="form-group">
            <label for="company_website">Company Website:</label>
            <input type="url"  name="company_website">
        </div>

        <div class="form-group">
            <label for="company_description">Company Description:</label>
            <textarea name="company_description" rows="4" cols="50" required></textarea>
        </div>

        <h2>Job Details</h2>
        </br>
        <div class="form-group">
            <label for="job_category">Job Category:</label>
            <select name="job_category">
                <option value="" disabled selected>Select a job category</option>
                <option value="Administration/Office Support">Administration/Office Support</option>
                <option value="Accounting/Finance">Accounting/Finance</option>
                <option value="Arts/Entertainment">Arts/Entertainment</option>
                <option value="Banking/Insurance">Banking/Insurance</option>
                <option value="Customer Service/Call Center">Customer Service/Call Center</option>
                <option value="Education/Training">Education/Training</option>
                <option value="Engineering/Architecture">Engineering/Architecture</option>
                <option value="Healthcare/Medical">Healthcare/Medical</option>
                <option value="Hospitality/Travel">Hospitality/Travel</option>
                <option value="Human Resources">Human Resources</option>
                <option value="Information Technology/Software">Information Technology/Software</option>
                <option value="Legal">Legal</option>
                <option value="Management/Executive">Management/Executive</option>
                <option value="Manufacturing/Production">Manufacturing/Production</option>
                <option value="Marketing/Advertising">Marketing/Advertising</option>
                <option value="Media/Communication">Media/Communication</option>
                <option value="Real Estate/Property Management">Real Estate/Property Management</option>
                <option value="Retail/Wholesale">Retail/Wholesale</option>
                <option value="Sales/Business Development">Sales/Business Development</option>
                <option value="Science/Research">Science/Research</option>
                <option value="Social Services/Non-profit">Social Services/Non-profit</option>
                <option value="Sports/Fitness">Sports/Fitness</option>
                <option value="Transportation/Logistics">Transportation/Logistics</option>
                <option value="Writing/Editing/Publishing">Writing/Editing/Publishing</option>
            </select>
        </div>

        <div class="form-group">
            <label for="job_title">Job Title:</label>
            <input type="text" name="job_title" required>
        </div>

        <div class="form-group">
            <label for="job_description">Job Description:</label>
            <textarea name="job_description" rows="4" cols="50" required></textarea>
        </div>

        <div class="form-group">
            <label for="job_location">Job Location:</label>
            <input type="text" name="job_location" required>
        </div>

        <div class="form-group">
            <label for="job_type">Job Type:</label>
            <select name="job_type">
                <option value="" disabled selected>Select a job type</option>
                <option value="Full-Time">Full-time</option>
                <option value="Part-Time">Part-time</option>
                <option value="Contract">Contract</option>
                <option value="Internship">Internship</option>
            </select>
        </div>

        <div class="form-group">
            <label for="job_salary">Job Salary or Salary Range:</label>
            <input type="text" name="job_salary" required>
        </div>

        <div class="form-group">
            <label for="benefit">Benefits:</label>
            <textarea name="benefit" rows="4" cols="50" required></textarea>
        </div>

        <div class="form-group">
            <label for="employment_status">Employment Status:</label>
            <select name="employment_status">
                <option value="" disabled selected>Select an employment status</option>
                <option value="Permanent">Permanent</option>
                <option value="Temporary">Temporary</option>
            </select>
        </div>

        <h2>Contact Details</h2>
        </br>
        <div class="form-group">
            <label for="recruiter_name">Recruiter's Name:</label>
            <input type="text" name="recruiter_name" required>
        </div>

        <div class="form-group">
            <label for="recruiter_email">Recruiter's Email:</label>
            <input type="email" name="recruiter_email" required>
        </div>

        <div class="form-group">
            <label for="recruiter_phone">Recruiter's Phone Number:</label>
            <input type="tel" name="recruiter_phone" required>
        </div>

        <h2>Minimum Required Qualifications</h2>
        </br>
        <div class="form-group">
            <label for="skills">Skills:</label>
            <input type="text" name="skills" required>
        </div>

        <div class="form-group">
            <label for="education">Education:</label>
            <input type="text" name="education" required>
        </div>

        <h2>Application Instructions</h2>
        </br>
        <div class="form-group">
            <label for="application_instructions">Application Instructions:</label>
            <textarea name="application_instructions" rows="4" cols="50" required></textarea>
        </div>

        <div class="form-group">
            <label for="required_materials">Required Application Materials:</label>
            <input type="text" name="required_materials" required>
        </div>

        <!-- Add more fields for deadline, additional information, etc. -->

        <button class="submit" name="submit" type="submit">Post Now</button>
    </form>
</div>

</body>
</html>


