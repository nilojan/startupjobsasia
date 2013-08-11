-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2013 at 07:25 AM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
