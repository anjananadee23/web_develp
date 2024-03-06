<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Categories</title>
  <!-- Include Font Awesome CSS -->
  <link rel="icon" href="./images/logo1.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Style for the job icons */

    .catcontainer {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      padding: 20px;
      width: 70%;
    }

    .job-icon {
      text-align: center;
      margin: 2px;
      border: 2px solid black;
      cursor: pointer;
      border-radius: 30px;
      text-decoration: none; /* Remove underline from anchor tags */
      color: #333; /* Set color of text */
      display: block; /* Make the anchor tags block-level elements */
    }

    .job-icon i {
      font-size: 90px;
      margin-bottom: 10px;
      margin-top: 30px;
      color: #333;
      margin-bottom: 30px;
    }

    .job-icon p {
      font-size: 15px; /* Set font size of words to 12px */
      padding-bottom: 20px;
      color: #333;
      color: black;
    }

    .job-icon:hover i{
      color: #28B463; /* Change icon color on hover */
    }
  </style>
</head>
<body>

<center>

<h1><u>Job Categories</u></h1>
  <hr>

<div class="catcontainer">

  <a href="./job/administration.php" class="job-icon"><i class="fas fa-laptop"></i><br><p>Administration/Office Support</p></a>
  
  <!-- Accounting/Finance -->
  <a href="./job/accounting_finance.php" class="job-icon"><i class="fas fa-chart-line"></i><br><p>Accounting/Finance</p></a>
  
  <!-- Arts/Entertainment -->
  <a href="./job/arts_entertainment.php" class="job-icon"><i class="fas fa-paint-brush"></i><br><p>Arts/Entertainment</p></a>
  
  <!-- Banking/Insurance -->
  <a href="./job/banking_insurance.php" class="job-icon"><i class="fas fa-coins"></i><br><p>Banking/Insurance</p></a>
  
  <!-- Customer Service/Call Center -->
  <a href="./job/customer_service.php" class="job-icon"><i class="fas fa-headset"></i><br><p>Customer Service/Call Center</p></a>
  
  <!-- Education/Training -->
  <a href="./job/education_training.php" class="job-icon"><i class="fas fa-graduation-cap"></i><br><p>Education/Training</p></a>
  
  <!-- Engineering/Architecture -->
  <a href="./job/engineering_architecture.php" class="job-icon"><i class="fas fa-cogs"></i><br><p>Engineering/Architecture</p></a>
  
  <!-- Healthcare/Medical -->
  <a href="./job/healthcare_medical.php" class="job-icon"><i class="fas fa-hospital"></i><br><p>Healthcare/Medical</p></a>
  
  <!-- Hospitality/Travel -->
  <a href="./job/hospitality_travel.php" class="job-icon"><i class="fas fa-plane"></i><br><p>Hospitality/Travel</p></a>
  
  <!-- HR -->
  <a href="./job/hr.php" class="job-icon"><i class="fas fa-users"></i><br><p>HR</p></a>
  
  <!-- IT/Software -->
  <a href="./job/it_software.php" class="job-icon"><i class="fas fa-laptop-code"></i><br><p>IT/Software</p></a>
  
  <!-- Legal -->
  <a href="./job/legal.php" class="job-icon"><i class="fas fa-balance-scale"></i><br><p>Legal</p></a>
  
  <!-- Management/Executive -->
  <a href="./job/management_executive.php" class="job-icon"><i class="fas fa-briefcase"></i><br><p>Management/Executive</p></a>
  
  <!-- Manufacturing/Production -->
  <a href="./job/manufacturing_production.php" class="job-icon"><i class="fas fa-industry"></i><br><p>Manufacturing/Production</p></a>
  
  <!-- Marketing/Advertising -->
  <a href="./job/marketing_advertising.php" class="job-icon"><i class="fas fa-ad"></i><br><p>Marketing/Advertising</p></a>
  
  <!-- Media/Communication -->
  <a href="./job/media_communication.php" class="job-icon"><i class="fas fa-globe"></i><br><p>Media/Communication</p></a>
  
  <!-- Real Estate/Property Management -->
  <a href="./job/real_estate_property.php" class="job-icon"><i class="fas fa-home"></i><br><p>Real Estate/Property Management</p></a>
  
  <!-- Retail/Wholesale -->
  <a href="./job/retail_wholesale.php" class="job-icon"><i class="fas fa-shopping-bag"></i><br><p>Retail/Wholesale</p></a>
  
  <!-- Sales/Business Development -->
  <a href="./job/sales_business.php" class="job-icon"><i class="fas fa-handshake"></i><br><p>Sales/Business Development</p></a>
  
  <!-- Social Services/Non-profit -->
  <a href="./job/social_services.php" class="job-icon"><i class="fas fa-hands-helping"></i><br><p>Social Services/Non-profit</p></a>
  
  <!-- Sports/Fitness -->
  <a href="./job/sports_fitness.php" class="job-icon"><i class="fas fa-dumbbell"></i><br><p>Sports/Fitness</p></a>
  
  <!-- Transportation/Logistics -->
  <a href="./job/transportation_logistics.php" class="job-icon"><i class="fas fa-truck"></i><br><p>Transportation/Logistics</p></a>
  
  <!-- Writing/Editing/Publishing -->
  <a href="./job/writing_editing_publishing.php" class="job-icon"><i class="fas fa-pencil-alt"></i><br><p>Writing/Editing/Publishing</p></a>

</div>

  </center>

</body>
</html>
