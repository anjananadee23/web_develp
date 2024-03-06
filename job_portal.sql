-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 04:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `type`, `address`) VALUES
(1, 'MyDynamica', 'Software Company', 'Jaffna'),
(2, 'Wappsat', 'Software Company', 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `app_Id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `job_Id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`app_Id`, `userId`, `job_Id`, `name`, `email`, `phoneNo`, `dateCreated`) VALUES
(8, 5, '40', 'Anjana Nadeeshan Upasena', 'nadeeshan.an23@gmail.com', 2147483647, '2024-02-28 07:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `jobId` int(11) NOT NULL,
  `jobCategory` varchar(100) NOT NULL,
  `jobCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`jobId`, `jobCategory`, `jobCount`) VALUES
(1, 'Administration/Office Support', 0),
(2, 'Accounting/Finance', 0),
(3, 'Arts/Entertainment', 0),
(4, 'Banking/Insurance', 1),
(5, 'Customer Service/Call Center', 0),
(6, 'Education/Training', 0),
(7, 'Engineering/Architecture', 1),
(8, 'Healthcare/Medical', 1),
(9, 'Hospitality/Travel', 0),
(10, 'Human Resource', 0),
(11, 'Information Technology/Software', 2),
(12, 'Legal', 1),
(13, 'Management/Executive', 1),
(14, 'Manufacturing/Production', 0),
(15, 'Marketing/Advertising', 1),
(16, 'Media/Communication', 0),
(17, 'Real Estate/Property Management', 2),
(18, 'Retail/Wholesale', 1),
(19, 'Sales/Business Development', 0),
(20, 'Social Services/Non-profit', 0),
(21, 'Sports/Fitness', 1),
(22, 'Transportation/Logistics', 0),
(23, 'Writing/Editing/Publishing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_data`
--

CREATE TABLE `job_data` (
  `jobId` int(11) NOT NULL,
  `recId` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `companyWeb` varchar(255) NOT NULL,
  `companyDesc` varchar(255) NOT NULL,
  `jobCategory` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobDesc` varchar(500) NOT NULL,
  `jobLoc` varchar(255) NOT NULL,
  `jobType` varchar(255) NOT NULL,
  `salary` decimal(20,0) NOT NULL,
  `benefit` varchar(500) NOT NULL,
  `empStatus` varchar(255) NOT NULL,
  `recName` varchar(255) NOT NULL,
  `recEmail` varchar(255) NOT NULL,
  `recPhone` int(20) NOT NULL,
  `minSkill` varchar(255) NOT NULL,
  `minEdu` varchar(255) NOT NULL,
  `appIns` varchar(500) NOT NULL,
  `reqAppMat` varchar(255) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_data`
--

INSERT INTO `job_data` (`jobId`, `recId`, `companyName`, `companyWeb`, `companyDesc`, `jobCategory`, `jobTitle`, `jobDesc`, `jobLoc`, `jobType`, `salary`, `benefit`, `empStatus`, `recName`, `recEmail`, `recPhone`, `minSkill`, `minEdu`, `appIns`, `reqAppMat`, `createdTime`) VALUES
(45, 21, 'ABC Hospital', 'http://www.abchospital.com', 'ABC Hospital is a leading healthcare provider known for its exceptional patient care.', 'Healthcare/Medical', 'Registered Nurse', 'We are seeking registered nurses to provide compassionate and skilled patient care.', 'New York', 'Full-Time', 75000, 'Health insurance, retirement plan', 'Open', 'Emily Rodriguez', 'emily@example.com', 1, 'Patient assessment, medication administration', 'Bachelor of Science in Nursing (BSN)', 'Candidates must have a valid RN license.', 'Resume, Nursing License', '2024-02-29 18:30:00'),
(46, 22, 'XYZ Bank', 'http://www.xyzbank.com', 'XYZ Bank is a reputable financial institution offering a wide range of banking services.', 'Banking/Insurance', 'Financial Analyst', 'We are hiring financial analysts to conduct financial research and analysis.', 'Chicago', 'Full-Time', 90000, '401(k) matching, tuition reimbursement', 'Open', 'Michael Brown', 'michael@example.com', 1, 'Financial modeling, data analysis', 'Bachelor\'s degree in Finance or related field', 'Candidates should have strong analytical skills.', 'Resume, Cover Letter', '2024-03-01 18:30:00'),
(47, 23, 'ABC Marketing Agency', 'http://www.abcmarketing.com', 'ABC Marketing Agency specializes in digital marketing strategies and campaigns.', 'Marketing/Advertising', 'Digital Marketing Specialist', 'We are seeking digital marketing specialists to develop and implement online marketing campaigns.', 'Los Angeles', 'Full-Time', 80000, 'Flexible work hours, performance bonuses', 'Open', 'Jessica Taylor', 'jessica@example.com', 1, 'SEO, SEM, social media marketing', 'Bachelor\'s degree in Marketing or related field', 'Candidates should have experience with digital marketing tools.', 'Resume, Portfolio', '2024-03-02 18:30:00'),
(48, 24, 'XYZ Law Firm', 'http://www.xyzlawfirm.com', 'XYZ Law Firm provides legal services to individuals and businesses with a focus on client satisfaction.', 'Legal', 'Paralegal', 'We are hiring paralegals to support attorneys with legal research and document preparation.', 'San Francisco', 'Part-Time', 50000, 'Paid time off, professional development', 'Open', 'David Martinez', 'david@example.com', 1, 'Legal research, case management', 'Paralegal certificate or equivalent experience', 'Candidates should have excellent organizational skills.', 'Resume, References', '2024-03-03 18:30:00'),
(49, 25, 'ABC Fitness Club', 'http://www.abcfitnessclub.com', 'ABC Fitness Club offers state-of-the-art facilities and personalized fitness programs.', 'Sports/Fitness', 'Fitness Instructor', 'We are seeking fitness instructors to lead group fitness classes and provide personal training sessions.', 'New York', 'Part-Time', 40000, 'Gym membership, employee discounts', 'Open', 'Sarah Johnson', 'sarah@example.com', 1, 'Group fitness instruction, personal training', 'Certification in Personal Training or Group Fitness', 'Candidates should have strong communication skills.', 'Resume, Certifications', '2024-03-04 18:30:00'),
(50, 26, 'XYZ Consulting Group', 'http://www.xyzconsulting.com', 'XYZ Consulting Group offers strategic consulting services to businesses across industries.', 'Management/Executive', 'Management Consultant', 'We are hiring management consultants to analyze business processes and recommend improvements.', 'Chicago', 'Full-Time', 100000, 'Remote work option, performance bonuses', 'Open', 'Daniel Garcia', 'daniel@example.com', 1, 'Business analysis, project management', 'Bachelor\'s degree in Business Administration or related field', 'Candidates should have consulting experience.', 'Resume, Cover Letter', '2024-03-05 18:30:00'),
(51, 27, 'ABC Publishing House', 'http://www.abcpublishing.com', 'ABC Publishing House is a leading publisher of fiction and non-fiction books.', 'Writing/Editing/Publishing', 'Editorial Assistant', 'We are seeking editorial assistants to support the editorial team in manuscript review and editing.', 'Los Angeles', 'Full-Time', 55000, 'Health insurance, paid time off', 'Open', 'Emily Wilson', 'emily@example.com', 1, 'Manuscript editing, proofreading', 'Bachelor\'s degree in English or related field', 'Candidates should have strong writing skills.', 'Resume, Writing Samples', '2024-03-06 18:30:00'),
(52, 28, 'XYZ Construction Company', 'http://www.xyzconstruction.com', 'XYZ Construction Company specializes in commercial and residential construction projects.', 'Engineering/Architecture', 'Civil Engineer', 'We are hiring civil engineers to design and oversee construction projects.', 'San Francisco', 'Full-Time', 95000, '401(k) matching, paid holidays', 'Open', 'Emma Brown', 'emma@example.com', 1, 'Structural design, project management', 'Bachelor\'s degree in Civil Engineering', 'Candidates should be licensed Professional Engineers.', 'Resume, Portfolio', '2024-03-07 18:30:00'),
(53, 29, 'ABC Fashion Boutique', 'http://www.abcfashionboutique.com', 'ABC Fashion Boutique offers a curated selection of trendy clothing and accessories.', 'Retail/Wholesale', 'Sales Associate', 'We are seeking sales associates to provide excellent customer service and drive sales.', 'New York', 'Part-Time', 35000, 'Employee discounts, flexible schedule', 'Open', 'Olivia Martinez', 'olivia@example.com', 1, 'Customer service, product knowledge', 'High school diploma or equivalent', 'Candidates should have retail experience.', 'Resume, References', '2024-03-08 18:30:00'),
(54, 6, 'Anjana Laptop Solution', 'https://translate.google.com/?sl=en&tl=si&text=Required%20qualifications%20%20%0A&op=translate', 'dfsdg dfghsdg gsdfhsdgsd', 'Information Technology/Software', 'Software Engineer', 'dfgsdg ergsdfgsd sergdfgbd sertgs serg', 'Anuradhapura', 'Internship', 250, 'gsdg sdgsdhhtr dxcvbdfghs njyhsdfg 4gsegsgrgh', 'Temporary', 'Anjana', 'anlaptopsolution@gmail.com', 2147483647, 'HTML, JS, MYSQL, PHP', 'Undergraduate', 'fdgsegs gbdfbhhn gnyjhgjghsdfgdf dfhgdfghdrh', 'CV, Photo, Certificate', '2024-03-03 09:21:07'),
(55, 6, 'AN TECH', 'https://www.youtube.com/results?search_query=normalization', 'sgfsdrf drhgdfg fghfgh hgrtd', 'Real Estate/Property Management', 'Property Manager', 'fsdffghdf fgjhdfgh df', 'Colombo', 'Full-Time', 34555, 'dfghdfhtd hgfh cgb thdg', 'Permanent', 'gsdgfsg', 'maleehiru@gmail.com', 716425974, 'dfgdsfg', 'dfgdgertg', 'fghfhgf dfbhcvbnvnc tgjkguyj', 'gbdsfgsd', '2024-03-03 09:33:56'),
(56, 6, 'Lanka House', 'https://www.youtube.com/results?search_query=normalization', 'asdfgsdgt sreghfdjhfgx cfghtfgyujguy', 'Real Estate/Property Management', 'House Keeper', 'sgdfgh hfghsd gfghfgdfh vbdsgsd', 'Galle', 'Part-Time', 34545, 'gdfgsdgsdgdx hfghdgseg ', 'Permanent', 'fgvbh', 'maleehiru@gmail.com', 716425974, 'dfgdsfg', 'dfgdgertg', 'gherhgb dbhdfg ghxd', 'gbdsfgsd', '2024-03-03 09:35:43'),
(57, 6, 'Anjana Laptop Solution', 'https://www.youtube.com/results?search_query=normalization', 'fgyujh  tgdg', 'Information Technology/Software', 'Web Developer', 'dfgd hg dfgds gery cbvbdfgh', 'Galle', 'Part-Time', 34545, 'fghfchfgh ghdf', 'Temporary', 'fgvbh', 'nadeeshan.an23@gmail.com', 716425974, 'dfgdsfg', 'dfgdgertg', 'fghf bcvnbvcgjm ', 'gbdsfgsd', '2024-03-03 09:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `jobId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistId`, `userId`, `jobId`, `created_at`) VALUES
(12, 5, 41, '2024-03-02 16:19:29'),
(13, 5, 44, '2024-03-03 08:25:33'),
(14, 5, 44, '2024-03-03 08:28:18'),
(16, 5, 49, '2024-03-03 09:19:18'),
(17, 5, 45, '2024-03-03 09:19:25'),
(18, 5, 53, '2024-03-03 10:33:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`app_Id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `job_data`
--
ALTER TABLE `job_data`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `app_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `job_data`
--
ALTER TABLE `job_data`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
