-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2013 at 08:51 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `AID` int(255) NOT NULL AUTO_INCREMENT,
  `ID` int(255) DEFAULT NULL,
  `JID` int(255) DEFAULT NULL,
  `CID` int(255) DEFAULT NULL,
  `applied` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cover_letter` varchar(1000) DEFAULT NULL,
  `resume` varchar(1000) DEFAULT 'default',
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`AID`, `ID`, `JID`, `CID`, `applied`, `cover_letter`, `resume`) VALUES
(1, 5, 44, 14, '2013-05-28 08:52:49', NULL, NULL),
(2, 8, 36, 14, '2013-05-28 04:55:41', NULL, NULL),
(3, 8, 44, 14, '2013-05-28 04:55:34', NULL, NULL),
(4, 8, 49, 14, '2013-05-28 04:55:29', NULL, NULL),
(5, 8, 55, 14, '2013-05-28 08:55:34', NULL, NULL),
(6, 8, 415, 14, '2013-05-28 04:55:46', NULL, NULL),
(7, 8, 416, 14, '2013-05-28 04:55:24', NULL, NULL),
(8, 13, 44, 14, '2013-05-28 05:15:48', NULL, NULL),
(9, 13, 417, 14, '2013-05-28 05:15:41', NULL, NULL),
(10, 14, 418, 48, '2013-05-30 04:46:52', NULL, NULL),
(11, 14, 48, 14, '2013-06-10 06:29:49', '', '14-08CHAONANZHENGZHUAN.wma');

-- --------------------------------------------------------

--
-- Table structure for table `application1`
--

CREATE TABLE IF NOT EXISTS `application1` (
  `AID` int(255) NOT NULL AUTO_INCREMENT,
  `EID` int(255) DEFAULT NULL,
  `JID` int(255) DEFAULT NULL,
  `CID` int(255) DEFAULT NULL,
  `offered` int(1) DEFAULT '0',
  `shortlist` int(1) DEFAULT '0',
  `onhold` int(1) DEFAULT '0',
  `applied` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `JID` (`JID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE IF NOT EXISTS `approve` (
  `ANo` int(255) NOT NULL AUTO_INCREMENT,
  `CID` int(255) DEFAULT NULL,
  `submitted` timestamp NULL DEFAULT NULL,
  `approved` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ANo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `approve`
--

INSERT INTO `approve` (`ANo`, `CID`, `submitted`, `approved`) VALUES
(2, 18, '2013-05-23 01:35:55', '2013-05-27 06:00:49'),
(26, 48, '2013-05-27 09:00:18', '2013-06-11 05:03:12'),
(30, 52, '2013-06-11 12:31:15', '2013-07-04 07:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(45) DEFAULT NULL,
  `ID` varchar(45) DEFAULT NULL,
  `cemail` varchar(45) DEFAULT NULL,
  `address` text,
  `image` varchar(150) DEFAULT 'default.jpg',
  `contact` int(19) DEFAULT NULL,
  `job_count` int(11) DEFAULT '0',
  `status` varchar(45) DEFAULT NULL,
  `started` timestamp NULL DEFAULT NULL,
  `awards` text,
  `summary` text,
  `coverpicture` varchar(150) DEFAULT NULL,
  `mission` text,
  `culture` text,
  `benefits` text,
  `location` text,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `unique_views` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CID`, `cname`, `ID`, `cemail`, `address`, `image`, `contact`, `job_count`, `status`, `started`, `awards`, `summary`, `coverpicture`, `mission`, `culture`, `benefits`, `location`, `twitter`, `facebook`, `website`, `created`, `modified`, `unique_views`, `views`) VALUES
(14, 'Facebook Inc', '5', 'admin@facebook.com', 'Changi Village road<br />\r\nSingapore<br />\r\n354654', '14-facebook.jpg', 91234566, 0, '1', NULL, NULL, NULL, 'cover3.jpg', 'Artsicle is a company with a mission - to make art happen. We intend to break down the barriers that are restricting innovation and growth in the art market. We intend to support today''s artists as they grow their careers. We intend to open the doors for everyone to become a collector of original, contemporary art. ', 'Here at Artsicle, our backgrounds are as diverse as the neighborhood we call home, but we''re all passionate about building a truly transformative product. On a team this small, we can''t afford to pigeonhole ourselves to one role, and be honest, we like it that way.', 'We offer competitive salaries, stock options, and full benefits.  Oh, and some fun perks:<br />\r\n<br />\r\n    Artsicle stipend = original art in your home<br />\r\n    Shiny Apple equipment<br />\r\n    Team adventures & outings<br />\r\n    Office snacks<br />\r\n    ZipCar membership, and more...', 'Singapore', NULL, NULL, NULL, NULL, '2013-07-09 08:01:14', 0, 0),
(48, 'Google Inc', '8', 'mail@google.com', 'Blk 255 <br />\r\nAnson road<br />\r\nSingapore 1', '48-url.jpg', 91234567, 0, '1', NULL, NULL, NULL, 'Cover_google.jpg', 'Barrel is a focused and nimble team of designers, developers, and strategists. Our passion for design, technology, and content fuels our desire to create inventive solutions. We love fresh ideas and obsess over execution, consistently delivering strong results. We''ve worked with startups and established organizations across various industries, gaining a broad perspective on how digital strategy can impact a client''s goals.', 'At Barrel, we follow a core belief: care about what you do and find ways to keep on getting better. If you think the same way, you''re looking in the right place.', 'ELEVEN REASONS WHY YOU''LL LOVE WORKING AT BARREL<br />\r\nTeam Chemistry -- We believe that we''re only as strong as the bonds of our team members. We help each other, teach each other, and always have each others'' backs.<br />\r\nChallenging Work -- Whether it''s learning new technologies or solving difficult design problems, we constantly seek new challenges that will keep us fully engaged.<br />\r\nFood & Drink -- We provide lunch five times a week and we''re always stocked with snacks, fresh coffee, loose leaf tea, draught beers, and a liquor cabinet for serious cocktail enthusiasts.<br />\r\nProfessional Development -- We''re all about learning and growing. We''re happy to foot the bill for conferences, workshops, and events that''ll help you become better at what you do.<br />\r\nHealth, Dental, and Vision Benefits -- We''re serious about your health. We cover 50% of your health insurance premiums and 100% of vision and dental.<br />\r\nTools -- We''ll make sure that you have a comfortable Aeron chair, a fast Mac, the latest software, and whatever else you need (fonts, plug-ins, Wacom tablet, etc.) to be productive. If you think there''s a tool you can build to help your job, we''ll give you time to do that as well!<br />\r\nTime Off -- We offer 8 days of vacation right off the bat, and you gain an extra vacation day every year you''re with us. We also offer flexible time-off arrangements if you need to go away for an extended period of time or work-at-home arrangements if you feel very product', 'Singapore', NULL, NULL, NULL, NULL, '2013-07-09 13:05:54', 0, 0),
(52, 'Microsoft Inc', '13', 'hello@microsoft.com', 'One Microsoft Way,California.USA', '52-MSFT_logo_png.png', 91234567, 0, '1', NULL, NULL, NULL, 'cover2.jpg', 'Barrel is a focused and nimble team of designers, developers, and strategists. Our passion for design, technology, and content fuels our desire to create inventive solutions. We love fresh ideas and obsess over execution, consistently delivering strong results. We''ve worked with startups and established organizations across various industries, gaining a broad perspective on how digital strategy can impact a client''s goals.', 'At Barrel, we follow a core belief: care about what you do and find ways to keep on getting better. If you think the same way, you''re looking in the right place.', 'We offer competitive salaries, stock options, and full benefits.  Oh, and some fun perks:<br />\r\n<br />\r\n    Artsicle stipend = original art in your home<br />\r\n    Shiny Apple equipment<br />\r\n    Team adventures & outings<br />\r\n    Office snacks<br />\r\n    ZipCar membership, and more...', 'America', NULL, NULL, NULL, '2013-06-11 06:31:15', '2013-07-09 08:00:03', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company1`
--

CREATE TABLE IF NOT EXISTS `company1` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` varchar(45) DEFAULT NULL,
  `cname` varchar(45) DEFAULT NULL,
  `cemail` varchar(45) DEFAULT NULL,
  `address` text,
  `image` varchar(150) DEFAULT 'default.jpg',
  `contact` int(19) DEFAULT NULL,
  `job_count` int(11) DEFAULT '0',
  `status` varchar(45) DEFAULT NULL,
  `started` timestamp NULL DEFAULT NULL,
  `awards` text,
  `summary` text,
  `coverpicture` varchar(150) DEFAULT NULL,
  `mission` text,
  `culture` text,
  `benefits` text,
  `location` text,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `unique_views` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `birthDate` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EID`, `username`, `email`, `password`, `birthDate`, `gender`, `name`) VALUES
(1, NULL, NULL, 'ab39e471c2e2f0b01974efc207b57a0548320930fee46', NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, 'asfdasfa'),
(4, 'andrew123', 'abc123@hotmail.com', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d9', '19/03/2013', 'M', 'andrew'),
(5, 'andrew', 'abc123@hotmail.com', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', '13/03/2013', 'M', 'andrew'),
(6, 'andrewy', 'abc123@hotmail.com', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', '27/03/2013', 'M', 'andrew'),
(7, 'parth999', 'parth.vivacious@gmail.com', 'parthviv', '09/04/1990', 'Male', 'Parth');

-- --------------------------------------------------------

--
-- Table structure for table `employee1`
--

CREATE TABLE IF NOT EXISTS `employee1` (
  `EID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(10) DEFAULT NULL,
  `registered` int(1) DEFAULT '0',
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `contact` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `coverletter` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `lastjob` varchar(250) NOT NULL,
  `edu` varchar(250) NOT NULL,
  `work_exp` int(10) NOT NULL,
  `curr_salary` int(10) NOT NULL,
  `exp_salary` int(10) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `resume` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `source` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `acc_status` varchar(20) NOT NULL,
  `views` int(10) NOT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`EID`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `UID` (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employee1`
--

INSERT INTO `employee1` (`EID`, `UID`, `registered`, `fname`, `lname`, `contact`, `email`, `photo`, `coverletter`, `gender`, `dob`, `location`, `country`, `lastjob`, `edu`, `work_exp`, `curr_salary`, `exp_salary`, `availability`, `resume`, `content`, `source`, `ip`, `acc_status`, `views`, `last_modified`) VALUES
(1, 1, 0, 'rohansh', 'hdfh', 0, 'rohan@vivacious.co.in', 'hsdhs', 'dshds', 'fghj', '0000-00-00', 'sdhd', 'dsh', 'sdhds', 'sdh', 0, 0, 0, 'sdhds', 'sdhds', 'dshdsh', 'sdfh', 'dhdshd', 'hdhdhdsh', 0, '0000-00-00 00:00:00'),
(2, 7, 0, 'ashish', '', 0, 'ashish@vivacious.co.in', '', '', '', '0000-00-00', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(3, 8, 0, 'kunal', '', 0, 'kunal@gmail.com', '', '', '', '0000-00-00', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '2013-07-31 06:23:52'),
(4, 9, 1, 'maitrey', '', 0, 'maitrey@vivacious.co.in', '', '', '', '0000-00-00', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '2013-07-31 07:11:29'),
(7, 10, 1, 'parths', '', 0, 'parth.webatease@gmail.com', '', '', '', '0000-00-00', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '2013-07-31 09:40:35'),
(9, 15, 1, 'rohan', 'patel', 0, 'rohan.vivacious@gmail.com', '101010', '', '', '0000-00-00', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '2013-07-31 12:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `feedID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `category` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `copyright` varchar(1000) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `author` varchar(1000) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `JID` int(11) DEFAULT NULL,
  PRIMARY KEY (`feedID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`feedID`, `title`, `description`, `category`, `image`, `copyright`, `created`, `author`, `url`, `JID`) VALUES
(1, 'ASFAS Facebook Pte Ltd Singapore', 'ASFASD', 'Job Post', '14-facebook-logo.jpg', NULL, '2013-06-12 06:59:50', 'Facebook Pte Ltd', 'ASFAS Facebook Pte Ltd Singapore', 458),
(2, 'asfasfasdf Facebook Pte Ltd Singapore', 'asfasdfasfasa', 'Job Post', '14-facebook-logo.jpg', NULL, '2013-06-12 07:29:09', 'Facebook Pte Ltd', 'asfasfasdf Facebook Pte Ltd Singapore', 460),
(3, 'asfd Facebook Pte Ltd Singapore', 'asfaas', 'Job Post', '14-facebook-logo.jpg', NULL, '2013-06-12 10:50:05', 'Facebook Pte Ltd', 'asfd Facebook Pte Ltd Singapore', 461),
(4, 'Ruby on Rails Developer Facebook Inc Singapore', 'Position Description & Responsibilities\r\n\r\nOn a daily basis our develo', 'Job Post', '14-ntu_logo.jpg', NULL, '2013-07-04 07:38:49', 'Facebook Inc', 'Ruby on Rails Developer Facebook Inc Singapore', 462),
(5, 'PHP King with HTML5 and CSS3 Facebook Inc Korea, South', 'Working independently or with a team, you should have extensive experi', 'Job Post', '14-ntu_logo.jpg', NULL, '2013-07-09 06:09:33', 'Facebook Inc', 'PHP King with HTML5 and CSS3 Facebook Inc Korea, South', 463),
(6, 'PHP King with HTML5 and CSS3 Facebook Inc Korea, South', 'Working independently or with a team, you should have extensive experi', 'Job Post', '14-ntu_logo.jpg', NULL, '2013-07-09 06:11:03', 'Facebook Inc', 'PHP King with HTML5 and CSS3 Facebook Inc Korea, South', 464),
(7, 'PHP King with HTML5 and CSS3 Facebook Inc Japan', 'Job Scopes:\r\nWorking independently or with a team, you should have ext', 'Job Post', '14-ntu_logo.jpg', NULL, '2013-07-09 07:12:58', 'Facebook Inc', 'PHP King with HTML5 and CSS3 Facebook Inc Japan', 465),
(8, 'Android Developer Facebook Inc Taiwan', 'About the job\r\n\r\n    Write beautiful and performant code for the Andro', 'Feature', '14-ntu_logo.jpg', NULL, '2013-07-09 07:18:52', 'Facebook Inc', 'Android Developer Facebook Inc Taiwan', 466),
(9, 'Java Developer Cum Web Administrator Facebook Inc Singapore', 'Java , Unix , SQL , Shell , Clearing , Calypso , Banking , Singapore ,', 'Technical', '14-facebook.jpg', NULL, '2013-07-11 13:26:09', 'Facebook Inc', 'Java Developer Cum Web Administrator Facebook Inc Singapore', 467),
(10, 'Dot NET Developer For Fresh startup Google Inc Asia', 'Click here to send your resume.\r\nIf this link does not work, you do no', 'Technical', '48-url.jpg', NULL, '2013-07-11 14:28:12', 'Google Inc', 'Dot NET Developer For Fresh startup Google Inc Asia', 468),
(11, 'google IO Developr in App Engine using php Google Inc Asia', '\r\n-Significant global career growth opportunities in a fast-growing bu', 'Marketing', '48-url.jpg', NULL, '2013-07-16 11:34:25', 'Google Inc', 'google IO Developr in App Engine using php Google Inc Asia', 469),
(12, 'vivacious Google Inc India', 'this is job description', 'Technical', '48-url.jpg', NULL, '2013-07-30 09:10:55', 'Google Inc', 'vivacious Google Inc India', 470);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `JID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `CID` varchar(45) DEFAULT NULL,
  `description` text,
  `responsibility` text NOT NULL,
  `requirement` text NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `types` varchar(254) NOT NULL,
  `full_time` varchar(10) NOT NULL,
  `part_time` varchar(10) NOT NULL,
  `freelance` varchar(10) NOT NULL,
  `internship` varchar(10) NOT NULL,
  `temporary` varchar(10) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `howtoapply` text NOT NULL,
  `post` datetime DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `expire` timestamp NULL DEFAULT NULL,
  `premium` tinyint(1) DEFAULT '0',
  `tags` varchar(150) DEFAULT NULL,
  `meta` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `unique_views` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`JID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=471 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JID`, `title`, `CID`, `description`, `responsibility`, `requirement`, `type`, `types`, `full_time`, `part_time`, `freelance`, `internship`, `temporary`, `category`, `location`, `salary`, `howtoapply`, `post`, `created`, `modified`, `expire`, `premium`, `tags`, `meta`, `status`, `unique_views`, `views`) VALUES
(36, 'Mentor/Counsultant', '48', '	Key officer for all web related matters, which include working with faculty, staff and students to meet their web requests/requirements\r\n• Set up technical infrastructures for university web projects, provide technical assistance to development teams, monitor site performance, and troubleshoot server issues as they arise\r\n• Implement technical architecture of the SMU web sites\r\n• Design, implement and maintain SMU’s websites\r\n• Enforces university-wide web policies and university Web Style Guidelines\r\n• Assist supervisor to oversee projects, lead, coach and guide team members in project management and technical design\r\n• Assist the IT team with integrating new technologies into the web sites\r\n• Verify the security of all SMU’s web sites to ensure best practices for developing web sites in a secure fashion\r\n• Help to establish, improve and ensure compliance with web content information architecture, taxonomy design, content policy and guidelines\r\n• Play a project manager role for in-house system development / maintenance/enhancements and help the manager to supervise a team of software analysts/developers\r\n• Review and maintain system documentation according to the Project Development Methodology\r\n• Conduct post implementation reviews to gather user feedback and schedule for enhancements and modifications', '', '', 'Part-time', '', '', '', '', '', '', NULL, 'Singapore', '1000-2000', 'email', NULL, '0000-00-00 00:00:00', '2013-07-09 07:40:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Account Executive', '48', 'sure compliance to Group and Company’s accounting policies and procedures\nEnsure that master files are properly updated prior to month end closing\nMonitor interface of ERS idoc file to SAP and perform reconciliation\nMonitor and follow up on overdue debts with relevant personnel\nAssist with the credit control monitoring\nConduct regular meetings with commercial ship repair to follow up on the status of long outstanding debts\nReview invoices/credit notes raised, including accounting distribution, to ensure correctness\nReview of receipt vouchers and journals prepared by executive for correctness\nReview debtors ageing to identify bad and provide for specific doubtful debts\nReview and process consultancy fee payments\nMonitor staff traveling claims payment\nReview monthly trade debtors schedule prepared by executive\nPreparation of Marine Sector AR reports for submission to Group HQ', '', '', 'Internship', '', '', '', '', '', '', NULL, 'Singapore', '1000-2000', 'hit apply now', NULL, '0000-00-00 00:00:00', '2013-07-09 07:41:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Sales Manager (Pioneer role)', '52', 'sure compliance to Group and Company’s accounting policies and procedures\nEnsure that master files are properly updated prior to month end closing\nMonitor interface of ERS idoc file to SAP and perform reconciliation\nMonitor and follow up on overdue debts with relevant personnel\nAssist with the credit control monitoring\nConduct regular meetings with commercial ship repair to follow up on the status of long outstanding debts\nReview invoices/credit notes raised, including accounting distribution, to ensure correctness\nReview of receipt vouchers and journals prepared by executive for correctness\nReview debtors ageing to identify bad and provide for specific doubtful debts\nReview and process consultancy fee payments\nMonitor staff traveling claims payment\nReview monthly trade debtors schedule prepared by executive\nPreparation of Marine Sector AR reports for submission to Group HQ', '', '', 'Internship', '', '', '', '', '', '', NULL, 'Singapore', NULL, '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Web & Graphic Designer', '48', 'Cost Management\r\n\r\n    Perform month-end closing of costing system\r\n    Preparation of monthly cost of sales and work-in-progress reports for shipbuilding, ship repair and engineering projects\r\n    Monitor and provide for additional cost and warranty for completed projects\r\n    Monitor and preparation of monthly detailed project costing reports\r\n\r\nRequirements:\r\n\r\n    Degree in Accountancy\r\n    Minimum 3 years relevant experience in Accounts Receivables or full sets.\r\n    Preferably with supervisory experience.\r\n    Good working knowledge of accepted accounting practices and principles.\r\n    Familiar with SAP will be advantageous.\r\n    Able to cope in a fast paced environment and ever changing priorities.\r\n    Willing to commit to long hours.\r\n', '', '', 'Internship', '', '', '', '', '', '', NULL, 'Singapore', '1000-2000', 'hit apply now', NULL, '0000-00-00 00:00:00', '2013-07-09 07:44:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Chief Creative Officer (User Experience and Campaign Design)', '14', 'sure compliance to Group and Company’s accounting policies and procedures\nEnsure that master files are properly updated prior to month end closing\nMonitor interface of ERS idoc file to SAP and perform reconciliation\nMonitor and follow up on overdue debts with relevant personnel\nAssist with the credit control monitoring\nConduct regular meetings with commercial ship repair to follow up on the status of long outstanding debts\nReview invoices/credit notes raised, including accounting distribution, to ensure correctness\nReview of receipt vouchers and journals prepared by executive for correctness\nReview debtors ageing to identify bad and provide for specific doubtful debts\nReview and process consultancy fee payments\nMonitor staff traveling claims payment\nReview monthly trade debtors schedule prepared by executive\nPreparation of Marine Sector AR reports for submission to Group HQ', '', '', 'Internship', '', '', '', '', '', '', NULL, 'Singapore', '1000-2000', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Art Director', '48', 'The job\r\n• Manage project implementation within scope, timeline and resources.\r\n• Support existing systems in place\r\n• Continuous improvement of systems and processes within the Web & Integration CC and in particular Bangalore development center (framework, best practices and tools to improve the development and maintenance efficiency).\r\n• Evaluate and drive new technologies to create values for business.\r\n• To work effectively with project stakeholders of various regions to resolve any project-related issues.\r\n• Coordinating actions with other project members for project-related work.\r\n\r\n\r\nThe Person:\r\n• Diploma/Degree in Computer Science or other related IT discipline.\r\n• At least 3 years of working experience in the related field is required for this position.\r\n• Experience in managing mid-to-large scale IT projects with project life cycle of minimum 3 months and above.\r\n• A good hands-on experience in Web technologies and in particular Sharepoint, Java and Web services.\r\n• Experience in Microsoft SQL and Oracle databases.\r\n• Knowledge of Agile Methodology, WEM, eCommerce Portal, SOA, LAMP and/or Mobile technologies would be a plus.\r\n• Good project management skills with a remote development team and project stakeholders; manages risk and negotiates to move project forward.\r\n• Ability to understand business processes and translate them into IT solution.\r\n• Must be a good team player\r\n• Possess good inter-personal communication and written skills\r\n• High degree of enthusiasm, commitment and initiative\r\n• Passion on all new technologies\r\n• Possess positive attitude to learn new skills', '', '', 'Part-time', '', '', '', '', '', '', NULL, 'Singapore', '>6000', 'apply now', NULL, '0000-00-00 00:00:00', '2013-07-09 07:45:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Mac OS X Developer', '52', 'sure compliance to Group and Company’s accounting policies and procedures\nEnsure that master files are properly updated prior to month end closing\nMonitor interface of ERS idoc file to SAP and perform reconciliation\nMonitor and follow up on overdue debts with relevant personnel\nAssist with the credit control monitoring\nConduct regular meetings with commercial ship repair to follow up on the status of long outstanding debts\nReview invoices/credit notes raised, including accounting distribution, to ensure correctness\nReview of receipt vouchers and journals prepared by executive for correctness\nReview debtors ageing to identify bad and provide for specific doubtful debts\nReview and process consultancy fee payments\nMonitor staff traveling claims payment\nReview monthly trade debtors schedule prepared by executive\nPreparation of Marine Sector AR reports for submission to Group HQ', '', '', 'Freelance', '', '', '', '', '', '', NULL, 'Singapore', NULL, '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Chief Creative Officer (User Experience and Campaign Design)', '14', 'Office Management\n\n    Organisation and coordination of internal and external meetings and appointments\n    Purchasing of stationery supply, postage supply and related goods\n    Research about cheap flights and booking of business trips for the management\n    Obtaining Visa´s for visits abroad of the management\n    Accounting of the managements travel expenses\n    Documentation and fostering of the managements contacts\n    Processing of internal and external requests\n    Preparing and sending of documents and packages \n    Maintenance of incoming mail\n    Organisation of daily business operations\n    Processing of own projects for the management\n    Documentation of written processes\n\nAccounting\n\n    Creating of outgoing invoices (with regards to contractual agreements or guidelines of the management)\n    Examination of correct- and completeness of incoming invoices\n    Documentation of invoices and transferring via online-banking\n    Examination and documentation of incoming and outgoing transfers\n    Communication with the accountancy firm\n    Preparation of the monthly bookkeeping for the accountancy firm\n    ü Examination of credit card statements and allocation of receipts\n\nOffer:\n\n    Earn a competitive salary\n    Become an essential member of our creative, passionate and international team\n    Work in an office in the CBD with an awesome view\n    Be surrounded by great infrastructure and restaurants\n    Be part of a tech start-up on the edge of internationalization', '', '', 'Temporary', '', '', '', '', '', '', NULL, 'Singapore', NULL, '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Mentor/Counsultant', '48', 'Your Opportunity at Intuit\r\n•           As driver and owner of a key channel, you will collaborate with internal and external colleagues/partners across geographies and time zones.  With high focus on accelerating new customer growth within the web channel;\r\n•           Own weekly, monthly and quarterly revenue/customer goals – from influencing forecasting to reporting on weekly results including the how/why we’re meeting/missing projections. • Drive key priorities/focus area to continue growth trajectories (partnering with marketing leaders), prioritising against competing business requests and driving contingencies to rapidly mitigate shortfalls.\r\n•           Manage the production of online content and experiences from product concept through to completion (working within a CMS).\r\n•           Coordinate and lead cross-functional teams of creative/interaction designers, copywriters and engineers to deliver web marketing projects on schedule, on budget and on brand.\r\n•           Work with Analytics to understand and clearly communicate project/test results and implications. Report into the business and outline next steps accordingly.\r\n•           Lead and participate in customer-based research as applicable.\r\n \r\nQualifications\r\n \r\nExpert in Web Marketing across the web funnel with proven ability to drive channel growth\r\n•         The candidate has excelled in roles that significantly shaped the consumer Web experience and drove both customer and revenue growth - such as Online Acquisition Manager, Web Conversion Manager, Website Optimisation Manager, Product Marketing Manager, or User Experience.\r\n•         Working understanding of Online Acquisition channels (SEO, PPC, Display, Retargeting etc.) with experience in collaborating with digital agency or experts to deliver across these channels.\r\n•         Exceptional understanding of Web site design; solid understanding of technical requirements (inc. basic Adobe CQ, HTML, JavaScript, CSS, Google Analytics enterprise), usability testing, split (or multivariate) and A/B testing, Web analytics, and Web marketing\r\n \r\nAmbitious entrepreneur at heart - comfortable with ambiguity and has infectious ‘can do’ attitude\r\n•         Demonstrated ability and passion to excel within an environment of change, start up mentality and a drive for continuous improvement\r\n•         Self motivating, tenacious and balanced individual who brings ‘can do’ motivation to work everyday\r\n•         Above all has a growing passion for all things Web with the ability to flex from deep technical knowledge to business strategy discussions\r\n \r\nData driven, resourceful and efficient – with courage to make hard decisions\r\n•         Strong analytical and problem solving mindset with clear examples of using data for target setting, measurement, ROI analysis and recommendations\r\n•         Demonstrates an ability to formulate business questions, seek solutions and articulate recommendations based on a combination of inputs including data analysis and user research.\r\n•         Bachelor''s degree a minimum requirement', '', '', 'Part-time', '', '', '', '', '', '', NULL, 'Singapore', '4000-6000', 'send us yur resume', NULL, '0000-00-00 00:00:00', '2013-07-09 07:39:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Web & Graphic Designer', '48', '\r\n    Degree in Computer Science or related fields\r\n    More than 2 years of web programming and relevant working experience Up-to-date knowledge of web technologies and Content Management System (CMS), especially Drupal CMS\r\n    Proficient in web scripting (HTML5, CSS, Javascript, XML, Ajax)\r\n    Will be involved in the design, development, testing, maintenance and support of mobile and web-based applications.\r\n    Knowledge of LAMP (Linux, Apache, MySQL, PHP) is essential\r\n    Proficient in web scripting (HTML5, CSS, Javascript, XML, Ajax)\r\n    Ability to work independently and possess good problem solving skills\r\n', '', '', 'Full-time', '', '', '', '', '', '', NULL, 'Singapore', '1000-2000', 'email us', NULL, '0000-00-00 00:00:00', '2013-07-09 07:38:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 'Web & Graphic Designer', '14', 'Office Management\n\n    Organisation and coordination of internal and external meetings and appointments\n    Purchasing of stationery supply, postage supply and related goods\n    Research about cheap flights and booking of business trips for the management\n    Obtaining Visa´s for visits abroad of the management\n    Accounting of the managements travel expenses\n    Documentation and fostering of the managements contacts\n    Processing of internal and external requests\n    Preparing and sending of documents and packages \n    Maintenance of incoming mail\n    Organisation of daily business operations\n    Processing of own projects for the management\n    Documentation of written processes\n\nAccounting\n\n    Creating of outgoing invoices (with regards to contractual agreements or guidelines of the management)\n    Examination of correct- and completeness of incoming invoices\n    Documentation of invoices and transferring via online-banking\n    Examination and documentation of incoming and outgoing transfers\n    Communication with the accountancy firm\n    Preparation of the monthly bookkeeping for the accountancy firm\n    ü Examination of credit card statements and allocation of receipts\n\nOffer:\n\n    Earn a competitive salary\n    Become an essential member of our creative, passionate and international team\n    Work in an office in the CBD with an awesome view\n    Be surrounded by great infrastructure and restaurants\n    Be part of a tech start-up on the edge of internationalization', '', '', 'Full-time', '', '', '', '', '', '', NULL, 'Singapore', NULL, '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(414, 'Mac OS X Developer', '52', 'Office Management\n\n    Organisation and coordination of internal and external meetings and appointments\n    Purchasing of stationery supply, postage supply and related goods\n    Research about cheap flights and booking of business trips for the management\n    Obtaining Visa´s for visits abroad of the management\n    Accounting of the managements travel expenses\n    Documentation and fostering of the managements contacts\n    Processing of internal and external requests\n    Preparing and sending of documents and packages \n    Maintenance of incoming mail\n    Organisation of daily business operations\n    Processing of own projects for the management\n    Documentation of written processes\n\nAccounting\n\n    Creating of outgoing invoices (with regards to contractual agreements or guidelines of the management)\n    Examination of correct- and completeness of incoming invoices\n    Documentation of invoices and transferring via online-banking\n    Examination and documentation of incoming and outgoing transfers\n    Communication with the accountancy firm\n    Preparation of the monthly bookkeeping for the accountancy firm\n    ü Examination of credit card statements and allocation of receipts\n\nOffer:\n\n    Earn a competitive salary\n    Become an essential member of our creative, passionate and international team\n    Work in an office in the CBD with an awesome view\n    Be surrounded by great infrastructure and restaurants\n    Be part of a tech start-up on the edge of internationalization', '', '', 'Part-time', '', '', '', '', '', '', NULL, 'Singapore', '1000-2000', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(415, 'Banker', '14', 'POLARIS (Personalised OMIC Lattice for Advanced Research and Improving Stratification) is an A-star supported initiative where a consortium of scientists   \r\n\r\nand clinicians across Singapore will work together to move cutting-edge science such as genomics and metabolomics directly into the clinic and patient care.  POLARIS\r\n\r\n\r\n will form a central enabling infrastructure for national programs in stratified medicine, where these methods will be used to identify appropriate therapies for patient', '', '', 'Full-time', '', '', '', '', '', '', NULL, 'Singapore', '2000-4000', 'email here', NULL, '2013-05-22 10:06:12', '2013-07-09 06:32:37', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(416, 'Co founder ', '52', 'Office Management\n\n    Organisation and coordination of internal and external meetings and appointments\n    Purchasing of stationery supply, postage supply and related goods\n    Research about cheap flights and booking of business trips for the management\n    Obtaining Visa´s for visits abroad of the management\n    Accounting of the managements travel expenses\n    Documentation and fostering of the managements contacts\n    Processing of internal and external requests\n    Preparing and sending of documents and packages \n    Maintenance of incoming mail\n    Organisation of daily business operations\n    Processing of own projects for the management\n    Documentation of written processes\n\nAccounting\n\n    Creating of outgoing invoices (with regards to contractual agreements or guidelines of the management)\n    Examination of correct- and completeness of incoming invoices\n    Documentation of invoices and transferring via online-banking\n    Examination and documentation of incoming and outgoing transfers\n    Communication with the accountancy firm\n    Preparation of the monthly bookkeeping for the accountancy firm\n    ü Examination of credit card statements and allocation of receipts\n\nOffer:\n\n    Earn a competitive salary\n    Become an essential member of our creative, passionate and international team\n    Work in an office in the CBD with an awesome view\n    Be surrounded by great infrastructure and restaurants\n    Be part of a tech start-up on the edge of internationalization', '', '', 'Freelance', '', '', '', '', '', '', NULL, 'Singapore', '4000-6000', '', NULL, '2013-05-22 10:11:06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(417, 'Experienced UI-UX Developer', '14', 'Salarium Limited has already developed first Alpha and Beta of our system with the help of a part-time UX/UI Developer.\r\n\r\nRight now, we are looking for a Full-Time Developer to join our team\r\n\r\n- Must be creative and visual,\r\n\r\n- Preferably with experience designing enterprise solutions in the past.', '', '', 'Full-time', '', '', '', '', '', '', NULL, 'Singapore', '1000-2000', '', NULL, '2013-05-27 06:46:20', '2013-05-28 02:38:21', NULL, 1, NULL, NULL, NULL, NULL, NULL),
(418, 'Back-End Ruby on Rails Developer', '48', 'We’re looking for senior application developers or young and very capable developers who:\r\n\r\nBuild stuff that ‘just(somehow)works’\r\nGenuinely loves to code\r\nWant to be in a fast-moving and hands-on start-up environment\r\nHas experience in developing software\r\nShares passion for food and cultures\r\nScope of work:\r\n\r\nBuild and maintain back-end system for data management and analytics\r\nContribute ideas of how shape the product and new features, systems architecture and processes.\r\nWrite high-quality', '', '', 'Full-time', '', '', '', '', '', '', NULL, 'Singapore', '2000-4000', '', NULL, '2013-05-28 03:49:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(421, 'Director', '48', '\r\n    Candidate must possess strong project management/leadership background and proven track record of delivering on large scale or multiple projects.\r\n    Should have technical knowledge in managing all aspects of the project, including planning, resource allocation, budget, project design and execution.\r\n    Possessing exceptional leadership, people management, interpersonal, organizational and communication skills, both written and verbal.\r\n    Experience working in a fast moving environment and the ability to handle multiple tasks at once.\r\n    Must have the capacity to successfully plan and manage large-scale enterprise based program implementations through all stages of the program development life-cycle, from requirements gathering to production.\r\n    Candidates must be willing to work in Ayala Alabang, Muntinlupa City.\r\n', '', '', 'Freelance', '', '', '', '', '', '', 'Coporate Support', 'India', '>6000', 'hit apply now', NULL, '2013-06-10 01:08:52', '2013-07-09 07:41:09', NULL, 1, NULL, NULL, NULL, NULL, NULL),
(429, 'Systems Engineer, Global Service', '14', '- Gather and analyze requirements from development teams to design, deploy and support of various enterprise middleware technologies.\r\n- Provide technology leadership in tcServer, WebSphere Application Server, MQ, WebSphere Message Broker, Actuate reporting and DB2 database.\r\n- Architect, integrate and configure applications to fully utilize the above technologies as well as Datapower, LDAP, Siteminder and other Middleware technologies.\r\n- Provide level 3 (engineering) production support for int', '', '', 'Full-time', '', '', '', '', '', '', '', 'Singapore', '4000-6000', '', NULL, '2013-06-11 02:30:08', '2013-07-04 09:03:01', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(430, 'HTML Developer', '52', 'asfa', '', '', 'Internship', '', '', '', '', '', '', '', 'Singapore', '', '', NULL, '2013-06-11 02:37:20', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(431, 'Chief of Business Development', '48', 'Arcstone Pte. Ltd. is developing the next generation of enterprise software solutions for the manufacturing industry.\r\n\r\nWe are looking for a business partner as our Chief of Business Development:\r\n\r\n- to head up client interactions, engagement, business modeling, strategic development etc.\r\n\r\n- Experience in the manufacturing industry is highly preferred.\r\n\r\nThis position will begin with a 3 month paid full time internship/trial period and is intended to continue with a full offer and equity st', '', '', 'Full-time', '', '', '', '', '', '', '', 'Singapore', '', '', NULL, '2013-06-11 02:38:33', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(435, 'HTML 5 Developer', '14', 'Core e-commerce web development skills in HTML5, CSS3, JavaScript\r\nFamiliar working on Linux with CLI tools, file system, dev tool chain and APIs\r\nDevelopment of scalable web services in technologies such as SOAP, JSON, XML, REST, HTTP, AJAX in Java, JavaScript, PHP, Python or C++ on Linux\r\n \r\nRole and Responsibilities\r\nPrimary responsibilities of the position include develop web and mobile trading applications .\r\n\r\nAbility to transform wireframes into a working UI, understanding of responsive d', '', '', 'Full-time', '', '', '', '', '', '', '', 'Singapore', '1000-2000', '', NULL, '2013-06-11 02:58:00', '2013-07-04 09:02:29', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(437, 'Software Engineer in Test', '14', 'Want to define the future of TV? The Viki team, with the help of its dedicated volunteer community from around the world, is breaking down language and cultural barriers that stand between great entertainment and fans everywhere. It’s a big challenge, but the opportunity is bigger - we need you to help us reach our first 100 million viewers and first million volunteers.\r\n\r\nBacked by Silicon Valley’s leading VCs and winning some impressive awards from Google, TechCrunch, DLD and SXSW, Viki is a u', '', '', 'Freelance', '', '', '', '', '', '', '', 'Singapore', '2000-4000', '', NULL, '2013-06-11 03:51:36', '2013-07-04 09:01:31', NULL, 1, NULL, NULL, NULL, NULL, NULL),
(439, 'Senior Software Engineer', '14', 'We’re looking for enthusiastic people who want to change the face of the Singapore health system.   You will be part of a multidisciplinary bioinformatics group that is responsible for the next generation sequencing pipeline and software integration with clinics.  There are multiple positions available.  PhD-level positions would have more senior responsibilities including project management and directing clinical standards.\r\n\r\n \r\n\r\nRequirements\r\n\r\n \r\n\r\n·         A PhD/Master’s/Bachelor’s Degree', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '1000-2000', '', NULL, '2013-06-11 01:47:30', '2013-07-04 09:04:03', '2013-06-11 01:47:30', 0, NULL, NULL, NULL, NULL, NULL),
(440, 'Executive Assistant to the Management', '52', 'Office Management\n\n    Organisation and coordination of internal and external meetings and appointments\n    Purchasing of stationery supply, postage supply and related goods\n    Research about cheap flights and booking of business trips for the management\n    Obtaining Visa´s for visits abroad of the management\n    Accounting of the managements travel expenses\n    Documentation and fostering of the managements contacts\n    Processing of internal and external requests\n    Preparing and sending of documents and packages \n    Maintenance of incoming mail\n    Organisation of daily business operations\n    Processing of own projects for the management\n    Documentation of written processes\n\nAccounting\n\n    Creating of outgoing invoices (with regards to contractual agreements or guidelines of the management)\n    Examination of correct- and completeness of incoming invoices\n    Documentation of invoices and transferring via online-banking\n    Examination and documentation of incoming and outgoing transfers\n    Communication with the accountancy firm\n    Preparation of the monthly bookkeeping for the accountancy firm\n    ü Examination of credit card statements and allocation of receipts\n\nOffer:\n\n    Earn a competitive salary\n    Become an essential member of our creative, passionate and international team\n    Work in an office in the CBD with an awesome view\n    Be surrounded by great infrastructure and restaurants\n    Be part of a tech start-up on the edge of internationalization', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '1000-2000', 'apply now', NULL, '2013-07-11 02:02:13', '2013-07-09 07:47:08', '2013-07-11 02:02:13', 0, NULL, NULL, NULL, NULL, NULL),
(441, 'Ruby on Rails Developer - PHP Developer', '14', 'Position Description & Responsibilities\r\n\r\nOn a daily basis our developers design, develop, test, document and deploy programs to support distributed software systems using latest technologies. These individuals develop applications based on solid industry standards that support scalability as well as integrate with a client''s enterprise systems at a variety of levels.  While in between projects, there is time for development and training or internal project work. \r\n\r\n       Primary Roles/Respon', 'On a daily basis our developers design, develop, test, document and deploy programs to support distributed software systems using latest technologies. These individuals develop applications based on solid industry standards that support scalability as well as integrate with a client''s enterprise systems at a variety of levels.  While in between projects, there is time for development and training or internal project work. \r\n\r\n       Primary Roles/Respon', 'On a daily basis our developers design, develop, test, document and deploy programs to support distributed software systems using latest technologies. These individuals develop applications based on solid industry standards that support scalability as well as integrate with a client''s enterprise systems at a variety of levels.  While in between projects, there is time for development and training or internal project work. \r\n\r\n       Primary Roles/Respon', 'Full-time', '', '', '', '', '', '', 'Public Relations', 'Singapore', '2000-4000', 'On a daily basis our developers design, develop, test, document and deploy programs to support distributed software systems using latest technologies. These individuals develop applications based on solid industry standards that support scalability as well as integrate with a client''s enterprise systems at a variety of levels.  While in between projects, there is time for development and training or internal project work. \r\n\r\n       Primary Roles/Respon', NULL, '2013-07-11 02:04:47', '2013-07-11 11:01:07', '2013-07-11 02:04:47', 0, NULL, NULL, NULL, NULL, NULL),
(442, 'asdfasWeb Application Developer - UI', '48', 'The Web Application Developer – UI is responsible for the design and implementation of critical software components in a sophisticated web 2.0 financial application; in full control of all aspects of the software life-cycle.\r\n\r\nDuties and Responsibilities for Web Application Developer – UI:\r\n\r\n    Drive multiple component design sessions parallel, and creating design artifacts according to specifications\r\n    Deliver one or more critical software solutions on time and on or under budget\r\n    Utilize new software methodologies to be able to adapt to changes in\r\n    Job Requirements\r\n    Seeking new ways of solving problems, increasing efficiency\r\n    Use tools available in the market to improve quality, performance and speed of development\r\n    Conduct design and code review session\r\n    Enforce code quality and performance\r\n    Analyze feasibility by presenting proof-of-concepts (POCs)\r\n    Support service delivery teams and evaluate service level issues, providing guidance on implementation fixes\r\n    Work closely with third party vendors\r\n    Ability to apply design patterns to solve problems\r\n    The right candidate will have a strong background in research and development, new development.\r\n\r\nSkills and Knowledge for Web Application Developer – UI:\r\n\r\n    Experience developing rich UI web based user interfaces including experience writing Object-Oriented JavaScript\r\n    Expertise in hand-coded Semantic HTML / CSS / JavaScript\r\n    Expertise in cross browser idiosyncrasies\r\n    Strong Core Java skills with knowledge of JQuery, AJAX, Spring MVC, JOSN or other rich UI based frameworks\r\n    Expertise in new (and old) software technologies including distributed caching, WebLogic Server, Tomcat, messaging platforms (MQ and webMethods), MS SQL, and continuous integration technologies (Maven, Hudson, and Sonar)\r\n    Knowledge of design with Photoshop, iRise, and other UI development tools\r\n    Ability to drive multiple initiatives at once\r\n    Team building skills\r\n    Strong software development language skill set\r\n    Languages must include, but not limited to Java, PL/SQL and JS\r\n    Broad knowledge of data exchange formats\r\n    Formats must include, but not limited to XML and JSON\r\n    Must be a powerful communicator – be able to get his/her point through\r\n    Strong problem solving and analytical skills\r\n    Experience to apply software design, implementation, testing, and debugging techniques\r\n\r\nEducation and Specifications for Web Application Developer – UI:\r\n\r\n    A Degree in Computer Science or related field\r\n    Minimum 5-7 years of software development experience\r\n    Only Singaporean / PR need to apply\r\n    Please state current / expected salary\r\n', '', '', 'Temporary', '', '', '', '', '', '', '', 'Singapore', '2000-4000', 'click on applu now button', NULL, '2013-06-11 02:07:20', '2013-07-09 07:38:25', '2013-07-11 02:07:20', 0, NULL, NULL, NULL, NULL, NULL),
(443, 'Technical Assistant ', '14', ' 	The Technical Assistant (TA) is responsible for providing front line tool and development support to the software development team and productions. Additionally, the TA is responsible for tracking and managing all digital information through the CG pipeline. Serves as the liaison for digital resources and data pipeline information between Production, CG Supervisors, Artists, and Technical Support Staff.\r\n\r\n    Primary Responsibilities:\r\n    Responsible for maintaining and updating department s', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '4000-6000', '', NULL, '2013-06-11 02:10:05', '2013-07-04 09:03:32', '2013-07-11 02:10:05', 0, NULL, NULL, NULL, NULL, NULL),
(444, 'asdfsd', '52', 'asdfas', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '', '', NULL, '2013-06-11 05:25:45', '2013-06-11 05:25:45', '2013-09-09 05:25:45', 0, NULL, NULL, NULL, NULL, NULL),
(445, 'Co-founder ', '14', 'We are a social dating website located in Singapore looking for a co-founder. The idea revolves around creating a more fun, casual atmosphere for our customers that eliminates the awkwardness and intimidation of traditional online dating. We are looking for a co-founding partner ideally familiar with web design(eg HTML5, CSS, Javascript, JQuery, Python, MongoDB)  but other applicants with broad skillsets including design, marketing,  sales, and business will be considered as well. Both fresh gra', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '2000-4000', '', NULL, '2013-06-11 06:13:23', '2013-07-04 09:00:52', '2013-09-09 06:13:23', 0, NULL, NULL, NULL, NULL, NULL),
(446, 'Integration Engineer – Mobile Development', '48', 'You will be responsible for developing, enhancing and maintaining new and existing mobile applications, and mobile web-friendly sites for our MNC clients. You will design and seek out new innovative solutions to meet user demands, and perform unit and integration testing of applications. You should be able to maintain a high level of application and data integrity.\r\n\r\nA strong background in mobile development and familiarity with both phones and tablets development is fundamental to this position.\r\n\r\n\r\nRequirements\r\n\r\n    Degree/Diploma in Computer Science, Computer Engineering or equivalent\r\n    Minimum 1 year of relevant experience in mobile development\r\n    Experience in developing native iOS, native Android, and HTML5-based applications\r\n    Experience in developing mobile web-friendly sites, and converting traditional websites into web-friendly ones\r\n    Relevant experience in database programming, deployment and integration\r\n    Completed at least one full cycle of SDLC for mobile development\r\n    Experience in all other major programming/scripting languages such as .net, ASP, JavaScript, AJAX, Java Applets, iQuery, PHP, HTML, XML, DHTML, CSS is an advantage\r\n    Able to work independently and efficiently to meet deadlines\r\n', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '1000-2000', 'click apply to send your resume', NULL, '2013-06-11 12:14:34', '2013-07-09 07:37:14', '2013-09-09 12:14:34', 1, NULL, NULL, NULL, NULL, NULL),
(450, 'Full-stack Web Developer', '14', '\r\nRequirements\r\n\r\n    Able to work at all levels of the technical stack, from back-end coding to front-end styling.\r\n    Proficiency in creating applications in at least one server-side framework: Ruby on Rails (preferred), Node.js, Python, Scala. PHP frameworks are not applicable.\r\n    Experience building distributed systems.\r\n    Experience with JVM languages such as Java and Scala, while not required, is an advantage.\r\n    JavaScript. If you’ve used JavaScript with Node.js, also an advantage.', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '1000-2000', '', NULL, '2013-06-12 06:52:50', '2013-07-04 09:00:17', '2013-09-10 06:52:50', 0, NULL, NULL, NULL, 0, 0),
(451, 'Web Developer', '14', 'We are seeking an exceptionally self-driven and well-rounded individual to join TransferTo’s Product Team in Singapore as Web Developer and help us build amazing web applications. Are you naturally curious? Are you passionate about creating ‘things’? Are you obsessed about getting the user experience just right?\r\n\r\nIf so, we’d love to hear from you. To be considered for this position, please send us a cover letter and resume, along with examples of projects you’ve led or worked on (in pdf format', '', '', 'Temporary', '', '', '', '', '', '', '', 'Singapore', '2000-4000', '', NULL, '2013-06-12 06:53:01', '2013-07-04 08:59:27', '2013-09-10 06:53:01', 0, NULL, NULL, NULL, 0, 0),
(453, 'Senior Software Engineer', '14', 'Responsibilities:\r\n• Analyze and initiate configurations and other changes within the system per user\r\n\r\n   business needs. Analyze existing programs or formulate logic for new   \r\n\r\n   systems, devise logic procedures, prepare flowcharting, perform coding,\r\n\r\n   test/debug programs and rolls out to business users.\r\n• Test solutions and ensure it meets specifications. Present and validate solution\r\n\r\n   with user.\r\n• Balance business requirements with technical feasibility and set expectations o', '', '', 'Internship', '', '', '', '', '', '', '', 'Singapore', '2000-4000', '', NULL, '2013-06-12 06:54:09', '2013-07-04 08:58:49', '2013-09-10 06:54:09', 0, NULL, NULL, NULL, 0, 0),
(454, 'SEO Engineer', '14', 'Job Description:\r\n\r\n    Responsible for the upkeep and back-end programming to keep all the Asia Pacific sites up and running as well as to create new internet appearances for specific countries, industries and products.\r\n    Ensure integrity of corporate identity is maintained throughout the site.\r\n    Maintain high visibility on Internet through use of search engines, paid services, third-party websites.\r\n    Collect, analyze report and suggest ways to improve website traffic using various dat', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '1000-2000', '', NULL, '2013-06-12 06:54:31', '2013-07-04 08:56:02', '2013-09-10 06:54:31', 0, NULL, NULL, NULL, 0, 0),
(456, 'Senior Manager - Application Developement', '48', 'RESPONSIBILITIES:\r\n\r\n    Plan and manage projects, gather user requirements, conduct feasibility study, design and develop solutions\r\n    Report and resolve problems for existing applications\r\n    Enhance and maintain existing applications\r\n    Create and update technical documentations and user manuals according to standards and guidelines set\r\n    Act as solution architect for in-house developments\r\n    Act as Project Manager for outsourced projects\r\n    Manage vendors and student helpers\r\n    Work independently or with other members to develop and implement applications.\r\n    Conduct user training and provide user support\r\n    Ensure timely completion and quality output from development resources\r\n    Provide integration support to other systems\r\n    Measure usage and effectiveness of solutions\r\n\r\n \r\n\r\nREQUIREMENTS:\r\n\r\n    Degree in Computer Science or Information Technology or equivalent qualifications\r\n    Relevant certification like MCPD, MCTS, MCAD, MCSD, CITPM/PMP, ITIL, CoBiT\r\n    Experience in various languages such as Objective-C, J2EE/Java, C#, NHibernate, Active Record, HTML 4 & above, XML, ASP.NET 2.0 & above, JavaScript, jQuery, PHP, CSS, visual Basic, Oracle, SQL Server, MySQL, Visual Basic, Report Generation Tools and other technologies\r\n    Familiar with common version control system such as SVN and Git\r\n    Knowledge of testing frameworks and terminologies such as TDD, NUnit and MbUnit\r\n    Hands-on experience in team foundation server environment\r\n    Some knowledge of IT Governance is desirable\r\n    Ability to analyze and solve problems with innovative solutions, produce proper documentation, strong organizational skills, ability to multi-task and meticulous\r\n    Experience in mobile applications development, web services development, open source program development, website design, application maintenance, data interfaces and XML development, JSON and AJAX technology, hardware & software setup and ability to deal with database problems is desirable\r\n    Completed at least 3 software development life cycles; actively involved in all phases of the life cycles and have experience in user support\r\n    Ability to resolve web and mobile application vulnerabilities and have experience in penetration tests will be advantages', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '2000-4000', 'send your resume to our email addess', NULL, '2013-06-12 06:55:03', '2013-07-09 07:36:21', '2013-09-10 06:55:03', 0, NULL, NULL, NULL, 0, 0),
(457, 'HTML CSS Expert', '14', 'Rich Internet Application (RIA) Web Developer\r\n• Developer who can transform user interface designs expressed as use cases, wireframes, etc. into a rich internet application (RIA) using HTML5, CSS3 and JavaScript.\r\n• Candidates should have 3 years of commercial web development.\r\n• Candidates should have at least 1 year of commercial RIA development  using HTML5, CSS3 and JavaScript\r\n \r\nRequired Skills/Technology\r\n• HTML5\r\n• CSS3\r\n• JavaScript\r\n• Experience developing and consuming web services', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '<1000', '', NULL, '2013-06-12 06:55:20', '2013-07-04 08:54:40', '2013-09-10 06:55:20', 0, NULL, NULL, NULL, 0, 0),
(458, 'Visual Designer ', '52', 'We are looking for a visual designer with experience and passion for visual design for web and mobile to work on development of flagship product for a start-up in Tokyo. We are a team of technology and business professionals trying to revolutionize knowledge market, hope you have heard of yahoo answers, quora, and others.  You will be expected to help develop the web product, working together with other engineers and designers on the team. You will report directly into the CEO/Founder. You are expected to have the following skills:\r\n\r\n• Top notch visual design skills with caliberated sense for typography for web and mobile\r\n\r\n• Experience in creating designs which look consisitent across devices from pc to mobile\r\n\r\n• Experience creating social media projects\r\n\r\n• Not an excellent GPA but an excellent drive for creating meaningful and inspirational products\r\n\r\n• If possible, General skill sets : HTML5/JS/CSS3 but not mandatory\r\n\r\n• Preferably based in Japan. If you are not based in Japan, an arrangement can be worked out to work during the beginning months.', '', '', 'Freelance', '', '', '', '', '', '', '', 'Singapore', '1000-2000', 'Apply with your resume and your portfolio using the apply button and we will respnd you at the earliest.', NULL, '2013-06-12 06:59:50', '2013-07-09 07:55:53', '2013-09-10 06:59:50', 0, NULL, NULL, NULL, 0, 0),
(459, 'Web Developer – eCommerce', '52', 'We are looking for a PHP developer to join the IT team based in Singapore.  The candidate will be responsible for PHP coding, linking PHP codes with HTML and JavaScript, manage web contents and helps with server maintenance whenever required.  Successful candidates will be exposed to ecommerce technologies and know-hows across the globe. We are established in the developed markets like UK, US and Europe and is expanding rapidly into Asia. You will have a chance to work with and learn from experts that are on the cutting edge in their fields of expertise. Responsibilities and Duties\r\n\r\n    Develop the programming code from scratch or by adapting existing website graphics packages and software to meet business requirements\r\n    Testing the website and identifying any technical problems and hitches\r\n    Identifying the content type the site will host and ensuring compatibility with the PHP programming requirements\r\n    Provide support to existing systems\r\n    Produce system & user documentation during system development or support.\r\n\r\nSkills and specifications\r\n\r\n    Knowledge of PHP and MySQL required\r\n    Knowledge of HTML/Javascript (jQuery) and CSS is preferred\r\n    Knowledge of Object Oriented Programming concepts is preferred\r\n    Understanding of MVC models is an added advantage\r\n    Experience and or knowledge in Linux server administration is an added advantage\r\n\r\nEducation and Qualifications\r\n\r\n    Diploma and above in computer science, IT, software engineering or equivalent\r\n    Good command of written and verbal English skills\r\n\r\nImmediate availability is preferred. Flexible working environment. Option to work from home', '', '', 'Freelance', '', '', '', '', '', '', '', 'Singapore', '2000-4000', 'apply online', NULL, '2013-06-12 07:28:35', '2013-07-09 07:54:25', '2013-09-10 07:28:35', 0, NULL, NULL, NULL, 0, 0),
(460, 'Senior-Web Developer (Rubyist)', '48', 'Proceed only if you say YES to all questions, otherwise application is meaningless.\r\n\r\nKEY FUNCTIONS & WEB DEVELOPMENT REQUIREMENT\r\n\r\n    Work directly with company founders and development team to produce and maintain a number of web applications\r\n    Work with Ruby based platform, in conjunction with MySQL or PostgreSQL\r\n    Work with Ajax and JavaScript code to deliver seamless user interactions (we also use jQuery framework)\r\n    Must be comfortable with MVC design pattern\r\n    Demonstrate experience in reading and modifying the code written by other developers\r\n    Demonstrate experience in test driven development, or at a minimum, maintain a suite of developer unit tests\r\n    Experience in delivering scalable application (both the frontend load balancing and backend expansion)\r\n    Proficient in using source control tools (like Git)\r\n    Have e-commerce experience, such as secure financial transaction\r\n    Passionate for software development and Object Oriented design\r\n    Familiarity with social networking sites and best practices for integrating with them Proficient in Linux system (predominantly ubuntu)\r\n\r\n\r\nATTITUDES AND VALUES\r\n\r\n    Exercise your design creativities to get things done, driven by results\r\n    Be a self-motivator (independent) who can take direction, and more importantly, initiator who comes with plausible solutions for problems\r\n    Possess communication and interpersonal skills that encourage growth and foster team development\r\n    Be flexible and can handle multiple tasks\r\n\r\n\r\nA STRONG ADVANTAGE FOR APPLICANTS, who possess one or all of the followings:\r\n\r\n    Experience in Ruby gems and apply them to our products (essentially, build your code on top of work contributed by open community / plugins / gems)\r\n    SEO experience\r\n    Working knowledge of building iPhone / Android apps using cross platform mobile framework\r\n    Working knowledge of building RESTful web services to enable unified digital experiences across mobile, social and web platforms\r\n    Speak and write Japanese\r\n\r\nWork and become friends with a positive team of passionate people\r\nEnjoy an exciting, fast-paced, demanding environment\r\nBeing a significant part of building something great\r\nPlay pool when a break is needed\r\nChill with a breezer after work\r\nEasily accessible to our office @ 71 Ayer Rajah Crescent (via One-North MRT station)', '', '', 'Freelance', '', '', '', '', '', '', '', 'Singapore', '4000-6000', 'email your resume to our email address', NULL, '2013-06-12 07:29:09', '2013-07-09 07:34:13', '2013-09-10 07:29:09', 0, NULL, NULL, NULL, 0, 0);
INSERT INTO `job` (`JID`, `title`, `CID`, `description`, `responsibility`, `requirement`, `type`, `types`, `full_time`, `part_time`, `freelance`, `internship`, `temporary`, `category`, `location`, `salary`, `howtoapply`, `post`, `created`, `modified`, `expire`, `premium`, `tags`, `meta`, `status`, `unique_views`, `views`) VALUES
(461, 'IOS Developer', '48', '\r\nResponsibilities\r\n\r\n    Responsible for the design and maintainence of mobile applications\r\n    Review and perform a technical analysis of requirements\r\n    Produce a solid, detailed technical design\r\n    Write clean, modular, robust code to implement the desired requirements\r\n    Contribute ideas for making the application(s) to be better and easier to use.\r\n\r\nRequirements\r\n\r\n    Minimum 3 years of  experience in mobile application development\r\n    Good working knowledge of ipad and iphone iOS 6 Programming, iPhone API/graphics, Objective-C, Xcode storybaord, J2EE\r\n    Experience in development on other mobile platform such as Android or Symbian would be advantageous\r\n    Good Diploma or Degree in Computer Science/IT or related discipline\r\n     Good oral and written communication skills\r\n\r\nInterested candidates pls email your MS word format resume to csc_recruit_sg@csc.com.  Pls indicate your:\r\n- current and expected salary\r\n- date of availability\r\n \r\nWe regret that only shortlisted candidates will be notified.', '', '', 'Part-time', '', '', '', '', '', '', '', 'Singapore', '2000-4000', 'just email your resume', NULL, '2013-06-12 10:50:05', '2013-07-09 07:33:05', '2013-09-10 10:50:05', 1, NULL, NULL, NULL, 0, 0),
(462, 'Ruby on Rails Programmer', '14', 'Position Description & Responsibilities\r\n\r\nOn a daily basis our developers design, develop, test, document and deploy programs to support distributed software systems using latest technologies. These individuals develop applications based on solid industry standards that support scalability as well as integrate with a client''s enterprise systems at a variety of levels.  While in between projects, there is time for development and training or internal project work. \r\n\r\n       Primary Roles/Respon', '', '', 'Full-time', '', '', '', '', '', '', 'Technical', 'Singapore', '', '', NULL, '2013-07-04 07:38:49', '2013-07-04 09:01:47', '2013-10-02 07:38:49', 0, NULL, NULL, NULL, 0, 0),
(463, 'PHP King with HTML5 and CSS3', '14', 'Working independently or with a team, you should have extensive experience with Drupal & Wordpress.\r\n\r\nWorking on interactive websites and rich media applications\r\n\r\nRequirements:\r\nStrong experience in PHP, Drupal and Wordpress(at least 2 years), ability to work in a closely knitted team, and extremely self motivated.\r\nAble to create custom modules in Drupal that plays well with other modules.\r\nAble to create custom Plugins and Widgets in Wordpress.\r\nFamiliarity with Releational Databases - MySql.\r\nCustom Drupal and Wordpress Themes.\r\nAbility to stay flexible in day-to-day work and meet deadlines.\r\nStrong knowledge in Facebook APIs.\r\nStrong knowledge in JavaScript frameworks (such as: ExtJS, JQuery mobile, Sencha)\r\nA good attitude with proven experience of working in a small team.\r\nExcellent communication skills and attention to detail', '', '', 'Temporary', '', '', '', '', '', '', 'Technical', 'Korea, South', '2000-4000', 'email to mmmm@mmm.com    also click here to apply', NULL, '2013-07-09 06:09:33', '2013-07-09 07:19:18', '2013-10-07 06:09:33', 0, NULL, NULL, NULL, 0, 0),
(466, 'Android Developer', '14', 'About the job\r\n\r\n    Write beautiful and performant code for the Android platform.\r\n    Design and develop high-performance, high-availability solutions to meet product requirements.\r\n    Take ownership in projects and see them from conception to release.\r\n\r\nOur Engineering Philosophy\r\n\r\nWe are engineers who love technology and solving hard problems. We use Ruby on Rails, Node.js and\r\nSinatra in the backend and Javascript/JQuery, iOS, Android in frontend to name a few technologies. We believe in TDD, continuous integration and pair programming. With us you will be doing real agile development while caring obsessively about building high-quality software.\r\n\r\nTo thrive as a member of team Viki, you must embrace our exciting work-hard, play-hard environment. We''re not afraid to move fast and break things as we release, launch, iterate, update and announce -- sometimes all in the same day.\r\n\r\n\r\nQualifications\r\n\r\nJob Requirements\r\n\r\n            2+ years of Android/Java development\r\n            REST APIs / JSON web services\r\n            Great logic and problem solving skill\r\n            Great communication skills.\r\n            Good to have: experience with web development – Ruby on Rails\r\n            Good to have: have an application submitted on Google Play.\r\n            Willing to work in Singapore', '', '', 'Internship', '', '', '', '', '', '', 'Feature', 'Taiwan', '2001-4000', 'just send your resume to our email address lissted above the job post', NULL, '2013-07-09 07:18:52', '2013-07-09 07:18:52', '2013-10-07 07:18:52', 0, NULL, NULL, NULL, 0, 0),
(467, 'Java Developer Cum Web Administrator', '14', 'Java , Unix , SQL , Shell , Clearing , Calypso , Banking , Singapore , Developer , Analyst\r\n\r\nCore Java Support/Developer required to work in a major financial institution in Singapore. My client are looking for someone that has very good core Java skills to come on board and work on a clearing system. You will be required to lead system changes, perform code reviews, act as the technical authority on new business lines and also mentor some of the junior members of the team.\r\n\r\nThis is an excellent opportunity for the right individual to come on board and make a telling difference to the direction of an exciting initiative.\r\n\r\nPlease call Adil Mohammad for more details.', 'Java , Unix , SQL , Shell , Clearing , Calypso , Banking , Singapore , Developer , Analyst\r\n\r\nCore Java Support/Developer required to work in a major financial institution in Singapore. My client are looking for someone that has very good core Java skills to come on board and work on a clearing system. You will be required to lead system changes, perform code reviews, act as the technical authority on new business lines and also mentor some of the junior members of the team.\r\n\r\nThis is an excellent opportunity for the right individual to come on board and make a telling difference to the direction of an exciting initiative.\r\n\r\nPlease call Adil Mohammad for more details.', 'Java , Unix , SQL , Shell , Clearing , Calypso , Banking , Singapore , Developer , Analyst\r\n\r\nCore Java Support/Developer required to work in a major financial institution in Singapore. My client are looking for someone that has very good core Java skills to come on board and work on a clearing system. You will be required to lead system changes, perform code reviews, act as the technical authority on new business lines and also mentor some of the junior members of the team.\r\n\r\nThis is an excellent opportunity for the right individual to come on board and make a telling difference to the direction of an exciting initiative.\r\n\r\nPlease call Adil Mohammad for more details.', 'Freelance', '', 'Array', '', '', '', '', 'Technical', 'Singapore', '4000-6000', 'Java , Unix , SQL , Shell , Clearing , Calypso , Banking , Singapore , Developer , Analyst\r\n\r\nCore Java Support/Developer required to work in a major financial institution in Singapore. My client are looking for someone that has very good core Java skills to come on board and work on a clearing system. You will be required to lead system changes, perform code reviews, act as the technical authority on new business lines and also mentor some of the junior members of the team.\r\n\r\nThis is an excellent opportunity for the right individual to come on board and make a telling difference to the direction of an exciting initiative.\r\n\r\nPlease call Adil Mohammad for more details.', NULL, '2013-07-11 13:26:08', '2013-07-11 13:30:01', '2013-10-09 13:26:08', 0, NULL, NULL, NULL, 0, 0),
(468, 'Dot NET Developer For Fresh startup', '48', 'Click here to send your resume.\r\nIf this link does not work, you do not have an email client configured, in which case you may copy and paste this address along with the subject below into your favorite email program. Email: sandy@jobsbridge.com\r\nYour email subject must be "Lucky Dog Jobs Application for Dot Net Developer." All applicants are welcome.', 'Click here to send your resume.\r\nIf this link does not work, you do not have an email client configured, in which case you may copy and paste this address along with the subject below into your favorite email program. Email: sandy@jobsbridge.com\r\nYour email subject must be "Lucky Dog Jobs Application for Dot Net Developer." All applicants are welcome.', 'Skill	ASP.NET MVC, HTML ,C#,and AJAX,\r\nLocation	New York, NY\r\nTotal Experience	8 yrs.\r\nMax Salary	$ DOE Per Hour\r\nEmployment Type	Contract Jobs (Temp/Consulting)\r\nDomain	Any', 'Internship', '', 'Array', '', '', '', '', 'Technical', 'Asia', 'Above 10000', 'Please send your resume at sandy@jobsbridge.com\r\n\r\nClick here to send your resume via email now.\r\nIf this link does not work, you do not have an email client configured, in which case you may copy and paste this address along with the subject below into your favorite email program. Email: sandy@jobsbridge.com', NULL, '2013-07-11 14:28:12', '2013-07-11 14:28:12', '2013-10-09 14:28:12', 0, 'Skill	ASP.NET MVC, HTML ,C#,and AJAX,', NULL, NULL, 0, 0),
(469, 'google IO Developr in App Engine using php', '48', '-Significant global career growth opportunities in a fast-growing business\r\n\r\n\r\n-Fun & casual working atmosphere\r\n\r\n\r\n-International mindset, close collaboration with management\r\n\r\n\r\n-Opportunities to work internationally in other company ventures', 'Participate in development for multiple large scale e-commerce platforms.\r\n\r\n\r\n-Participate in design meetings.\r\n\r\n\r\n-Participate in our agile development model to plan, estimate, and work deliverable.\r\n\r\n\r\n-Write high quality code.\r\n\r\n\r\n-Communicate with product managers, quality engineers, and web designers to deliver the best possible product', '3-5 years of hands-on development experience with PHP\r\n\r\n\r\n-Profound knowledge of all the following: HTML, CSS, JavaScript, AJAX + JQuery\r\n\r\n\r\n-Strong communication skills\r\n\r\n\r\n-Ability to operate effectively in a team-oriented and collaborative environment\r\n\r\n\r\n-Basic knowledge on ZendFramework or YII would be a strong plus\r\n\r\n\r\n-Bachelor in Computer Science or related fields.\r\n', 'Freelance', 'Array', '', '', '', '', '', 'Marketing', 'Korea South', '2000-4000', 'send by email', NULL, '2013-07-16 11:34:25', '2013-07-16 14:51:27', '2013-10-14 11:34:25', 0, 'php', NULL, NULL, 0, 0),
(470, 'vivacious', '48', 'this is job description', 'web developer', 'employee with minumum 1 year of experience in PHP', 'Full-time', '', '', '', '', '', '', 'Technical', 'India', '1001-2000', 'online', NULL, '2013-07-30 09:10:55', '2013-07-30 09:10:55', '2013-10-28 09:10:55', 0, 'Wordpress, Yii, PHP', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job1`
--

CREATE TABLE IF NOT EXISTS `job1` (
  `JID` int(11) NOT NULL AUTO_INCREMENT,
  `CID` varchar(45) DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `description` text,
  `responsibility` text NOT NULL,
  `requirement` text NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `types` varchar(254) NOT NULL,
  `full_time` varchar(10) NOT NULL,
  `part_time` varchar(10) NOT NULL,
  `freelance` varchar(10) NOT NULL,
  `internship` varchar(10) NOT NULL,
  `temporary` varchar(10) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `howtoapply` text NOT NULL,
  `post` datetime DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `expire` timestamp NULL DEFAULT NULL,
  `premium` tinyint(1) DEFAULT '0',
  `tags` varchar(150) DEFAULT NULL,
  `meta` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `unique_views` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`JID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NID` int(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `author` int(255) DEFAULT NULL,
  PRIMARY KEY (`NID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `JID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  PRIMARY KEY (`JID`,`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(256) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `coverletter` text NOT NULL,
  `dob` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(110) NOT NULL,
  `edu` varchar(256) NOT NULL,
  `national` varchar(256) NOT NULL,
  `lastjob` varchar(256) DEFAULT NULL,
  `resume` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `source` varchar(255) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `datee` datetime NOT NULL,
  `viewed` int(1) NOT NULL,
  `verifyCode` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `fullname`, `photo`, `coverletter`, `dob`, `gender`, `email`, `location`, `contact`, `edu`, `national`, `lastjob`, `resume`, `content`, `source`, `IP`, `datee`, `viewed`, `verifyCode`) VALUES
(20, 'Alvi', '', 'blah', '2013-07-02', 'Female', 'nilo1@nilo.net', '+44', '76357567', 'Doctorate', 'American', NULL, 'Alvi-suj.doc', 'httptestingstartupjobssgftphosttestingstartupjobssgusernamestartupjobssgtestpwtes0110DatabasetestingstartupjobssgpadminftpstartupjobsasiastartupjobsasiasvSUJa2014httpwwwstartupjobsasiapadminstartupjobsasiasvSUJa2014IhavealsosetupanemailaccountforyounilojanstartupjobsasiasvSUJa2012WebmailaccessmailstartupjobsasiaPleasechangeyouremailpasswordhttpsmailstartupjobsasia20001httpswebcp1webhostsgcomtbchrctbCh1224WordpressAdmintbcareersconnect00Previewhttptbchrpreviewsd42webhostsgcomFTPhost2021725479FTPloginwebonlytbchrcomMySQLDBnametbchrwpMySQLusernamewebonlytbchrcoPasswordweb0418DBphpmyadminhttptbchrpreviewsd42webhostsgcompadminblogstartupjobsasiafindusstartupjobsasiaconnect00Teststartupjobssghttpsteststartupjobssg10001WebAdminLoginteststartupjobssgAdminpasswordteSt0307httpteststartupjobssgpadminDatabaseteststartupjobssgDBloginteststartupjobssgDBpasswordteSt0307sujadminsujtestsujtest1sujtest2', '', '', '2013-07-16 15:34:46', 0, ''),
(21, 'Alvi', '', 'blah', '2013-07-02', 'Female', 'nilo2@nilo.net', '+44', '76357567', 'Doctorate', 'American', NULL, 'Alvi-suj.doc', 'httptestingstartupjobssg\r\n\r\nftp host  testingstartupjobssg\r\n\r\nusername  startupjobssgtest\r\n\r\npw  tes0110\r\n\r\nDatabase  testingstartupjobssgpadmin\r\n\r\nftpstartupjobsasia\r\nstartupjobsasia\r\nsvSUJa2014\r\n\r\nhttpwwwstartupjobsasiapadmin\r\nstartupjobsasia\r\nsvSUJa2014\r\n\r\nI have also set up an email account for you\r\n\r\nnilojanstartupjobsasia\r\nsvSUJa2012\r\n\r\nWebmail access  mailstartupjobsasia\r\n\r\nPlease change your email password  httpsmailstartupjobsasia20001\r\n\r\nhttpswebcp1webhostsgcom\r\n\r\ntbchrc\r\n\r\ntbCh1224\r\n\r\nWordpress Admin\r\n\r\ntbcareers\r\n\r\nconnect00\r\n\r\nPreview  httptbchrpreviewsd42webhostsgcom\r\nFTP host  2021725479\r\nFTP login     webonlytbchrcom\r\nMySQL DB name  tbchrwp\r\nMySQL username     webonlytbchrco\r\nPassword  web0418\r\n\r\nDB phpmyadmin  httptbchrpreviewsd42webhostsgcompadmin\r\n\r\nblogstartupjobsasia\r\nfindusstartupjobsasia\r\nconnect00\r\n\r\nTeststartupjobssg\r\n\r\nhttpsteststartupjobssg10001\r\nWeb Admin Login teststartupjobssg\r\nAdmin password teSt0307\r\n\r\nhttpteststartupjobssgpadmin\r\nDatabase  teststartupjobssg\r\nDB login  teststartupjobssg\r\nDB password teSt0307\r\n\r\n\r\nsujadmin\r\nsujtest\r\nsujtest1\r\nsujtest2', '', '', '2013-07-16 15:40:05', 0, ''),
(22, 'Alvi', '', 'blah', '2013-07-02', 'Female', 'nilo@nilo.net', '+44', '76357567', 'Doctorate', 'American', NULL, 'Alvi-suj.doc', 'http testing startupjobs sg \r\n\r\nftp host   testing startupjobs sg\r\n\r\nusername   startupjobssgtest\r\n\r\npw   tes0110 \r\n\r\nDatabase   testing startupjobs sg padmin\r\n\r\nftp startupjobs asia\r\nstartupjobsasia\r\nsvSUJa2014 \r\n\r\nhttp www startupjobs asia padmin\r\nstartupjobsasia\r\nsvSUJa2014 \r\n\r\nI have also set up an email account for you \r\n\r\nnilojan startupjobs asia\r\nsvSUJa2012 \r\n\r\nWebmail access   mail startupjobs asia\r\n\r\nPlease change your email password   https mail startupjobs asia 20001\r\n\r\nhttps webcp1 webhostsg com\r\n\r\ntbchrc\r\n\r\ntbCh1224 \r\n\r\nWordpress Admin\r\n\r\ntbcareers\r\n\r\nconnect00\r\n\r\nPreview   http tbchr preview sd42 webhostsg com\r\nFTP host   202 172 54 79\r\nFTP login      webonly tbchr com\r\nMySQL DB name   tbchr wp\r\nMySQL username      webonly tbchr co\r\nPassword   web0418 \r\n\r\nDB phpmyadmin   http tbchr preview sd42 webhostsg com padmin \r\n\r\nblog startupjobs asia\r\nfindus startupjobs asia\r\nconnect00\r\n\r\nTest startupjobs sg\r\n\r\nhttps test startupjobs sg 10001\r\nWeb Admin Login  teststartupjobssg\r\nAdmin password  teSt 0307\r\n\r\nhttp test startupjobs sg padmin\r\nDatabase   teststartupjobssg\r\nDB login   teststartupjobssg\r\nDB password  teSt 0307\r\n\r\n\r\nsujadmin\r\nsujtest\r\nsujtest1\r\nsujtest2', '', '', '2013-07-16 15:41:03', 0, ''),
(25, 'Alvi', '', 'blah', '2013-07-03', 'Male', 'niloh@nilo.net', '+44', '756735675', 'Master', 'American', NULL, 'Alvi-suj.doc', 'http testing startupjobs sg \r\n\r\nftp host   testing startupjobs sg\r\n\r\nusername   startupjobssgtest\r\n\r\npw   tes0110 \r\n\r\nDatabase   testing startupjobs sg padmin\r\n\r\nftp startupjobs asia\r\nstartupjobsasia\r\nsvSUJa2014 \r\n\r\nhttp www startupjobs asia padmin\r\nstartupjobsasia\r\nsvSUJa2014 \r\n\r\nI have also set up an email account for you \r\n\r\nnilojan startupjobs asia\r\nsvSUJa2012 \r\n\r\nWebmail access   mail startupjobs asia\r\n\r\nPlease change your email password   https mail startupjobs asia 20001\r\n\r\nhttps webcp1 webhostsg com\r\n\r\ntbchrc\r\n\r\ntbCh1224 \r\n\r\nWordpress Admin\r\n\r\ntbcareers\r\n\r\nconnect00\r\n\r\nPreview   http tbchr preview sd42 webhostsg com\r\nFTP host   202 172 54 79\r\nFTP login      webonly tbchr com\r\nMySQL DB name   tbchr wp\r\nMySQL username      webonly tbchr co\r\nPassword   web0418 \r\n\r\nDB phpmyadmin   http tbchr preview sd42 webhostsg com padmin \r\n\r\nblog startupjobs asia\r\nfindus startupjobs asia\r\nconnect00\r\n\r\nTest startupjobs sg\r\n\r\nhttps test startupjobs sg 10001\r\nWeb Admin Login  teststartupjobssg\r\nAdmin password  teSt 0307\r\n\r\nhttp test startupjobs sg padmin\r\nDatabase   teststartupjobssg\r\nDB login   teststartupjobssg\r\nDB password  teSt 0307\r\n\r\n\r\nsujadmin\r\nsujtest\r\nsujtest1\r\nsujtest2', '', '', '2013-07-16 17:38:38', 0, ''),
(26, 'Nilojan Alvis', '', 'blah', '2013-07-01', 'Female', 'nilohu@nilo.net', '+44', '65464', 'Master', 'Singaporean', NULL, 'Nilojan-Alvis-suj.doc', 'http testing startupjobs sg \r\n\r\nftp host   testing startupjobs sg\r\n\r\nusername   startupjobssgtest\r\n\r\npw   tes0110 \r\n\r\nDatabase   testing startupjobs sg padmin\r\n\r\nftp startupjobs asia\r\nstartupjobsasia\r\nsvSUJa2014 \r\n\r\nhttp www startupjobs asia padmin\r\nstartupjobsasia\r\nsvSUJa2014 \r\n\r\nI have also set up an email account for you \r\n\r\nnilojan startupjobs asia\r\nsvSUJa2012 \r\n\r\nWebmail access   mail startupjobs asia\r\n\r\nPlease change your email password   https mail startupjobs asia 20001\r\n\r\nhttps webcp1 webhostsg com\r\n\r\ntbchrc\r\n\r\ntbCh1224 \r\n\r\nWordpress Admin\r\n\r\ntbcareers\r\n\r\nconnect00\r\n\r\nPreview   http tbchr preview sd42 webhostsg com\r\nFTP host   202 172 54 79\r\nFTP login      webonly tbchr com\r\nMySQL DB name   tbchr wp\r\nMySQL username      webonly tbchr co\r\nPassword   web0418 \r\n\r\nDB phpmyadmin   http tbchr preview sd42 webhostsg com padmin \r\n\r\nblog startupjobs asia\r\nfindus startupjobs asia\r\nconnect00\r\n\r\nTest startupjobs sg\r\n\r\nhttps test startupjobs sg 10001\r\nWeb Admin Login  teststartupjobssg\r\nAdmin password  teSt 0307\r\n\r\nhttp test startupjobs sg padmin\r\nDatabase   teststartupjobssg\r\nDB login   teststartupjobssg\r\nDB password  teSt 0307\r\n\r\n\r\nsujadmin\r\nsujtest\r\nsujtest1\r\nsujtest2', '', '', '2013-07-16 17:39:25', 0, ''),
(27, 'Jano', '', 'blah', '2013-07-06', 'Male', 'jano@jano.com', '+65', '654634', 'Diploma', 'Singaporean', NULL, 'Jano-System_Administrator_RESUME_Udhayakumar.doc', 'Udhayakumar M											 			\nSystem Administrator\nEmail     HYPERLINK  mailto udhayakumar58 gmail com   udhayakumar58 gmail com \n                                                             Phone    601 46388226 \n						                                           \n\n5 years of experience in IT Infrastructure Industry organizations to efficiently use their networks ensuring that the design of an organization s computer site allows all of the components  including Servers  computers  the network and software to fit together and work properly \n       Installing  Configuring  Managing  Monitor and adjust the performance of existing networks and continually survey the current computer site to determine future network needs as well as troubleshoot problems reported by users and by automated network monitoring systems and make recommendations for enhancements in the implementation of future servers and networks \nProfessional Experience \n\nUniversal IT Resources   Jun  2008 Onwards \nPrestigious Universal IT Resources Company  IT Planning  Implementation  Maintaining company    \n\nFrom June  08 to June 13  5 Years 	  Universal IT Resources  Coimbatore 641012 \nPosition held  System Administrator\n\nVisa status \n\nHolding visa    Social visit pass\nExpect            Employment Pass\n\nExtensive hands on experience in System Administration  Network  Technical Support for Server and Client\n\nDesigned  installed  configured  Troubleshoot and Administrated Operating System  \nActive Directory  Storage  Firewalls and Backup  Networking for LAN and RF  Backup  Virus Scanner  Trouble shoots  System Monitoring and Data Security  SCCM \n\n\n\n\n\nRole   Responsibilities  Server\nManaging MS Windows network environment  Implementing  administering and designing Data security for MS Windows 2008 network \nImplementing and controlling the Information Security Management \nRecord and maintain hardware and software inventories  server licensing  and user access and security \nAnalyze  log  track and complex software and hardware matters of significance pertaining to networking connectivity issues  printer  server  and application to meet business needs \nCoordinate hardware and software installations and upgrades to ensure work is performed in accordance with company policy  Recommends resolutions to complex matters of significance and coordinate the implementation of the approved course of action  \nAssisted in hardware installation and maintenance of workstations  servers  networking equipment  and other supporting hardware  \nProvided complete IT support  including planning  network design  software and hardware configuration  user training and help desk services to 170 staffs of  large non profit organization  Performed user account creation  deletion  and configuration  \nAdministered Network of Four Windows Servers  Red hat Zimbra Mail server and Supporting for More than 100   Windows   Linux Workstations \nFormed IT committee to develop policies and guidelines for use of LAN and implementation of WAN maximized efficiency by creating and maintaining accurate inventory of hardware and software \nPerformed occasional off hours and remote support and Help desk support and user training \nCoordinating for ERP Implementation and Technical   Bargaining IT Related Items Purchasing  Updating Software Life Cycle \nRole   Responsibilities  Network\n\n3 years hands on experience planning  designing  and implementing Cisco s wireless product line\nExtensive hands on experience with Cisco Wireless Access Points  such as Aironet  Cisco wireless controllers  such as the 5500 series  point to point wireless bridges  and related technologies\nExperience configuring ACS  LDAP  and other authentication technologies to support a wireless infrastructure\n3 years  experience with core Cisco routing and switching technologies  2900 routers  3900 routers  7200 routers  Catalyst 2960  3560  3750  4500 and 6500 switches \nExperience with network security technologies  with a focus on Cisco firewalls  IPS  and IDS\n\nCertification  Completed \nMCITP            Certification Number  6915905 \nCCNA             Certification Number  401674167490JSXN\n\nOperating Systems \nWindows 2008 Enterprise  Standard   Storage Server  Small Business Server 2003  Red Hat Linux \nWindows XP  Windows 7  Red Hat Linux L5  Macintosh OS X  SCCM \n\n\nImplemented Projects done by myself \n\nMicrosoft Windows Server for Domain Controller   up to 300 Users \nHyper v  citrix server \nFileserver  Zimbra Red hat Mail Server  \nPrint Server Monitoring  Even we can open the snapshot of printed document \nWatch Guard Firewall  Fiber Optic Networking \nWindows Server Update Server for Patch Management \nGroup Policy Management for Security and Application Life Cycle \nInternet   E Mail Restriction based on rules \nIntrusion Deduction and Preventing System \nReplication Server for Domain Controller and Database Server \nAll IT Related Policy \nDisaster Recovery for Database Server \n\nKnowledge s in Linux\nSystem Initialization  Package Management  Kernel Services  System Services \nUser Administration  File system Management  Network Configuration  Installation \nAccount Management  System and Server Troubleshooting \n\nServers  NFS  NIS  DNS  DHCP  Samba  FTP  Web server  send mail  Squid \n\nSecurity  iptables  SELINUX \n\n\nPersonal Profile\n\n	Name			 	Udhayakumar M\n\n	Certification		 	MCITP  CCNA\n\n	Qualification		 	Diploma in EEE   2008\nSankara Institute of Technology  \nB SC Computer Science   2011   Correspondant course \nAnnamalai University \n\n	Fathers  Name	 	Muthukrishnan  T\n\nDate of Birth		 	27 07 1990\n\nGender		 	Male\n\nMarital Status		 	Single\n\nNationality		 	Indian\n\nLanguage  Abilities	 	English  Tamil   Telugu\n\nAddress                    	No 59  Jalan pulai 3 Taman pulai utama Skudai 81300 Johor  Malaysia ', '', '', '2013-07-16 17:59:45', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `resume` varchar(100) DEFAULT NULL,
  `role` varchar(2) DEFAULT '0',
  `CID` int(255) DEFAULT NULL,
  `activation_key` varchar(100) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `resume2` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `coverLetter` varchar(1500) DEFAULT NULL,
  `resumeUploaded` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `name`, `resume`, `role`, `CID`, `activation_key`, `last_login`, `registered`, `resume2`, `photo`, `coverLetter`, `resumeUploaded`, `modified`) VALUES
(1, NULL, 'ab39e471c2e2f0b01974efc207b57a0548320930fee46', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'andrew123', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d9', 'abc123@hotmail.com', '19/03/2013', NULL, '0', 0, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'andrew', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'abc123@hotmail.com', '13/03/2013', NULL, '2', 14, 'M', '2013-07-16 11:30:46', NULL, NULL, NULL, NULL, NULL, '2013-06-12 10:49:50'),
(6, 'andrewy', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'abc123@hotmail.com', '27/03/2013', NULL, '0', 0, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'sujadmin', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'abcasfd@gmail.com', 'SUJ', NULL, '1', NULL, NULL, '2013-07-29 07:59:09', NULL, NULL, NULL, NULL, NULL, '2013-06-11 12:40:17'),
(8, 'sujtest', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'abcasfd@gmail.com', 'suj', NULL, '2', 48, NULL, '2013-07-30 06:35:51', NULL, NULL, '8-2381_2011512015344271374.jpg', '', NULL, '2013-06-11 12:39:02'),
(9, 'testing', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'abcasfd@gmail.com', 'andrew', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'testing1', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'abcasfd@gmail.com', 'andrew', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'andrew1', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'abcasfd@gmail.com', 'andrew', NULL, '0', NULL, NULL, NULL, '2013-05-22 09:25:41', NULL, NULL, NULL, NULL, NULL),
(12, 'andrew', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'asf2as@asdfas.saf', 'asfas', NULL, '0', NULL, NULL, NULL, '2013-05-23 08:01:14', NULL, NULL, NULL, NULL, NULL),
(13, 'sujtest1', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'asd@asf.asdf', 'asfsa', '13-print.pdf', '2', 52, NULL, '2013-07-15 09:10:36', '2013-05-27 09:30:50', '13-print.pdf', '13-6a0133f3a4072c970b0153910e98b6970b-800wi.jpg', 'asdfadasdfasfasfasd<br />\r\na<br />\r\na<br />\r\naaasfaasaAA', '2013-05-31 03:04:03', '2013-06-11 12:35:52'),
(14, 'sujtest2', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'asd@asf.asdf', 'aasfs', '14-finalResume.docx', '0', 51, NULL, '2013-07-17 06:14:16', '2013-05-28 05:46:12', '14-bill1.docx', NULL, NULL, NULL, '2013-06-11 12:25:08'),
(15, 'abc123', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'aasdf@asdf.asfa', 'asf', NULL, '0', NULL, NULL, NULL, '2013-06-11 02:42:00', NULL, NULL, NULL, NULL, NULL),
(16, 'abc123', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'aasdf@asdf.asfa', 'asf', NULL, '0', NULL, NULL, NULL, '2013-06-11 02:43:13', NULL, NULL, NULL, NULL, NULL),
(17, 'abc123', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'aasdf@asdf.asfa', 'asf', NULL, '0', NULL, NULL, NULL, '2013-06-11 02:43:38', NULL, NULL, NULL, NULL, NULL),
(18, 'asfasasfsa', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'as@asd.asfsas', 'asfas', NULL, '0', NULL, NULL, NULL, '2013-06-11 02:44:23', NULL, NULL, NULL, NULL, NULL),
(19, 'uetyuetyu', '996c0bb21a37acf5f8071f71b7c554ff838a109cd80aacbd74e4400097d5981fe802eb5bf4da7e8ad96d00a7ad157b490fd7', 'nilojan@live.com', 'nilojan', NULL, '0', NULL, NULL, NULL, '2013-07-02 15:04:59', NULL, NULL, NULL, NULL, NULL),
(20, 'nilojan', '9b109eea1bc5e2210e91dcea4f287d32c5e374e499dc77d9e293342ebe8929171919fc5bcf787b0d8daa6731ae069ff8954d', 'tamilnilo@gmail.com', 'Nilojan', '20-System_Administrator_RESUME_Udhayakumar.doc', '0', NULL, NULL, '2013-07-10 12:21:51', '2013-07-09 08:37:11', '20-System_Administrator_RESUME_Udhayakumar.doc', '20-935341_424884017610394_968143190_n.jpg', 'thi is my cov er lett er', NULL, NULL),
(21, 'railsmax', 'fcc75a8f3147cfb70f92b15ee8e219fa3cfa3ea55541b0385e2a93b58e4e7c847a0d65321975c72ea781978b1aec4049469c', 'railsmax@gmail.com', 'Maksim', NULL, '0', NULL, NULL, '2013-07-14 18:20:39', '2013-07-14 18:20:28', NULL, NULL, NULL, NULL, NULL),
(22, 'parth999', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'parth@gmail.com', 'parth', NULL, '0', NULL, NULL, '2013-07-30 06:44:37', '2013-07-23 16:14:02', NULL, '22-androidmarker.png', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE IF NOT EXISTS `user1` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(2) DEFAULT '0',
  `activation_key` varchar(100) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`ID`, `username`, `password`, `email`, `name`, `role`, `activation_key`, `last_login`, `registered`) VALUES
(1, 'parth999', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'parth@vivacious.co.in', 'parth', '0', NULL, '2013-08-05 08:39:03', '2013-07-30 11:11:03'),
(2, 'nisarg999', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'nisarg@vivacious.co.in', 'nisarg', '0', NULL, '2013-07-30 11:32:05', '2013-07-30 11:28:46'),
(3, 'jay999', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'jay@vivacious.co.in', 'jay', '0', NULL, NULL, '2013-07-30 13:02:38'),
(6, 'rohan999', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'rohan@vivacious.co.in', 'rohan', '0', NULL, NULL, '2013-07-31 06:19:39'),
(7, 'ashish999', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'ashish@vivacious.co.in', 'ashish', '0', NULL, NULL, '2013-07-31 06:21:50'),
(8, 'kunal999', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'kunal@gmail.com', 'kunal', '0', NULL, NULL, '2013-07-31 06:23:52'),
(9, 'maitrey99', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'maitrey@vivacious.co.in', 'maitrey', '0', '0', NULL, '2013-07-31 07:11:29'),
(13, 'parthshah', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'parth.webatease@gmail.com', 'parths', '0', '8795871122809474775582624921827725083', '2013-07-31 12:22:14', '2013-07-31 09:40:35'),
(15, 'rohan11', '7be60a3eee4f4ced30e5f2ace52b3fd5af02270e9e1d929a912dcfcc47fd39a4b4a1ad10023f1bbea83ba948c6a22a769bb1', 'rohan.vivacious@gmail.com', 'rohan11', '0', '1186263919946991823532791054167536586', '2013-08-01 13:34:34', '2013-07-31 12:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `ud_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `contact` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `last_job` varchar(250) NOT NULL,
  `h_edu` varchar(250) NOT NULL,
  `work_exp` int(10) NOT NULL,
  `curr_salary` int(10) NOT NULL,
  `exp_salary` int(10) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `resume1` varchar(250) NOT NULL,
  `resume2` varchar(250) NOT NULL,
  `resume_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(250) NOT NULL,
  `cover_letter` varchar(1500) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE IF NOT EXISTS `view` (
  `JID` int(11) NOT NULL,
  `EID` int(11) NOT NULL,
  PRIMARY KEY (`JID`,`EID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
