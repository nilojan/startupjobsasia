-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2013 at 08:14 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbillacrous`
--

-- --------------------------------------------------------

--
-- Table structure for table `apns_devices`
--

CREATE TABLE IF NOT EXISTS `apns_devices` (
  `pid` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` varchar(64) NOT NULL,
  `appname` varchar(255) NOT NULL,
  `appversion` varchar(25) DEFAULT NULL,
  `deviceuid` char(40) NOT NULL,
  `devicetoken` varchar(500) NOT NULL,
  `devicename` varchar(255) NOT NULL,
  `devicemodel` varchar(100) NOT NULL,
  `deviceversion` varchar(25) NOT NULL,
  `pushbadge` enum('disabled','enabled') DEFAULT 'disabled',
  `pushalert` enum('disabled','enabled') DEFAULT 'disabled',
  `pushsound` enum('disabled','enabled') DEFAULT 'disabled',
  `development` enum('production','sandbox') CHARACTER SET latin1 NOT NULL DEFAULT 'production',
  `status` enum('active','uninstalled') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `appname` (`appname`,`deviceuid`),
  KEY `clientid` (`clientid`),
  KEY `devicetoken` (`devicetoken`(333)),
  KEY `devicename` (`devicename`),
  KEY `devicemodel` (`devicemodel`),
  KEY `deviceversion` (`deviceversion`),
  KEY `pushbadge` (`pushbadge`),
  KEY `pushalert` (`pushalert`),
  KEY `pushsound` (`pushsound`),
  KEY `development` (`development`),
  KEY `status` (`status`),
  KEY `created` (`created`),
  KEY `modified` (`modified`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Store unique devices' AUTO_INCREMENT=183 ;

--
-- Dumping data for table `apns_devices`
--

INSERT INTO `apns_devices` (`pid`, `clientid`, `appname`, `appversion`, `deviceuid`, `devicetoken`, `devicename`, `devicemodel`, `deviceversion`, `pushbadge`, `pushalert`, `pushsound`, `development`, `status`, `created`, `modified`) VALUES
(176, '', 'Saterra', '1.0', '2ff64df390d311e3', 'APA91bGASnlwpm6R-3MhvFUTCJfya4dwJGpfPDKq32xNDEYIAsGI7-knplhVFdC3KcVkrDfpHXllPFwfO6LHJTCfSg7TcLkkKHp6D2Y5bSgExowRUu9ZxWdx_2nOWCOx7ozqAKdyW3Tx', 'samsung', 'GT-S6802', '2.3.6', 'enabled', 'enabled', 'enabled', 'production', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, '', 'saterra', '1.0', 'd17ec6461090a89fc78cb738a5637f47c4b77255', 'e0aef9b5563d0df1f6722fa65fa0389a9c3db7421c29fc0d5223430e61d60042', 'iphone', 'iPod4,1', '5.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, '', 'Saterra', '1.0', 'f21162c905155794', 'APA91bH8dyHc0GGgHHCJpP9iCCkn7Zpdk3SDbYiO93Np-8ImiYE-tyVfJY6ZPD10pE-A3mr8v8w13fKDrK7HRQ-qSalYMJbp7eMaRhHrF039MA4he6FeYGblVL2S6XQp8Pa0m1SBRBxq', 'alps', 'Micromax A110', '4.0.4', 'enabled', 'enabled', 'enabled', 'production', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Triggers `apns_devices`
--
DROP TRIGGER IF EXISTS `Archive`;
DELIMITER //
CREATE TRIGGER `Archive` BEFORE UPDATE ON `apns_devices`
 FOR EACH ROW INSERT INTO `apns_device_history` VALUES (
	NULL,
	OLD.`clientid`,
	OLD.`appname`,
	OLD.`appversion`,
	OLD.`deviceuid`,
	OLD.`devicetoken`,
	OLD.`devicename`,
	OLD.`devicemodel`,
	OLD.`deviceversion`,
	OLD.`pushbadge`,
	OLD.`pushalert`,
	OLD.`pushsound`,
	OLD.`development`,
	OLD.`status`,
	NOW()
)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `apns_device_history`
--

CREATE TABLE IF NOT EXISTS `apns_device_history` (
  `pid` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` varchar(64) NOT NULL,
  `appname` varchar(255) NOT NULL,
  `appversion` varchar(25) DEFAULT NULL,
  `deviceuid` char(40) NOT NULL,
  `devicetoken` char(64) NOT NULL,
  `devicename` varchar(255) NOT NULL,
  `devicemodel` varchar(100) NOT NULL,
  `deviceversion` varchar(25) NOT NULL,
  `pushbadge` enum('disabled','enabled') DEFAULT 'disabled',
  `pushalert` enum('disabled','enabled') DEFAULT 'disabled',
  `pushsound` enum('disabled','enabled') DEFAULT 'disabled',
  `development` enum('production','sandbox') CHARACTER SET latin1 NOT NULL DEFAULT 'production',
  `status` enum('active','uninstalled') NOT NULL DEFAULT 'active',
  `archived` datetime NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `clientid` (`clientid`),
  KEY `devicetoken` (`devicetoken`),
  KEY `devicename` (`devicename`),
  KEY `devicemodel` (`devicemodel`),
  KEY `deviceversion` (`deviceversion`),
  KEY `pushbadge` (`pushbadge`),
  KEY `pushalert` (`pushalert`),
  KEY `pushsound` (`pushsound`),
  KEY `development` (`development`),
  KEY `status` (`status`),
  KEY `appname` (`appname`),
  KEY `appversion` (`appversion`),
  KEY `deviceuid` (`deviceuid`),
  KEY `archived` (`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Store unique device history' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `apns_device_history`
--

INSERT INTO `apns_device_history` (`pid`, `clientid`, `appname`, `appversion`, `deviceuid`, `devicetoken`, `devicename`, `devicemodel`, `deviceversion`, `pushbadge`, `pushalert`, `pushsound`, `development`, `status`, `archived`) VALUES
(1, '1', 'saterra', '1.0', '123456789012345678901234', '9fa589c52f3c21b24471576da12c11fbcc1f6ef3fd9839798861485da891b6e3', 'iphone', '4s', '1.9', 'disabled', 'disabled', 'disabled', 'production', 'active', '2013-05-10 00:27:21'),
(2, '1', 'saterra', '1.0', '011808d8482ee45ef37516a2ad71456d171d8ee1', '9fa589c52f3c21b24471576da12c11fbcc1f6ef3fd9839798861485da891b6e3', 'iphone', '4s', '1.9', 'disabled', 'disabled', 'disabled', 'production', 'active', '2013-05-10 00:27:43'),
(3, '', 'saterra', '1.0', '2a59d73a2a8615ab914a0ec669f82baec01bea50', 'e0aef9b5563d0df1f6722fa65fa0389a9c3db7421c29fc0d5223430e61d60042', 'iphone', '4s', '1.0', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-05-10 05:21:55'),
(4, '', 'saterra', '1.0', 'd17ec6461090a89fc78cb738a5637f47c4b77255', 'e0aef9b5563d0df1f6722fa65fa0389a9c3db7421c29fc0d5223430e61d60042', 'iphone', 'iPod4,1', '5.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-05-23 04:20:33'),
(5, '', 'saterra', '1.0', 'd17ec6461090a89fc78cb738a5637f47c4b77255', 'e0aef9b5563d0df1f6722fa65fa0389a9c3db7421c29fc0d5223430e61d60042', 'iphon', 'iPo', '5.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-05-23 04:24:29'),
(6, '', 'Saterra', '1.0', 'f21162c905155794', 'null', 'alps', 'Micromax A110', '4.0.4', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-18 00:09:40'),
(7, '', 'Saterra', '1.0', '1c7dc44efeadd9b8', '', 'HTC', 'HTC Desire S', '2.3.5', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-18 00:09:40'),
(8, '', 'saterra', '1.0', '1c265112a73d7a80acade5add2aaeb30339110c7', 'b2752f2143f1fa7653232e94cb9cc2b0e7d1e9d0a8f717585c27269769cbacab', 'ipad', 'iPad1,1', '5.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 12:57:59'),
(9, '', 'Saterra', '1.0', '77f6c6033b519f8b', 'APA91bFweWAnIXB6L_7_aaWG44tnr5U9zd31LDcRbyNpjdh2TWzZh2OMgfDcVpYx', 'rockchip', 'SpiceMi1010', '4.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 13:00:21'),
(10, '', 'Saterra', '1.0', '77f6c6033b519f8b', 'b2752f2143f1fa7653232e94cb9cc2b0e7d1e9d0a8f717585c27269769cbacab', 'rockchip', 'SpiceMi1010', '4.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 13:00:31'),
(11, '', 'Saterra', '1.0', '77f6c6033b519f8b', 'b2752f2143f1fa7653232e94cb9cc2b0e7d1e9d0a8f717585c27269769cbacab', 'rockchip', 'SpiceMi1010', '4.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 13:00:36'),
(12, '', 'Saterra', '1.0', '77f6c6033b519f8b', 'b2752f2143f1fa7653232e94cb9cc2b0e7d1e9d0a8f717585c27269769cbacab', 'rockchip', 'SpiceMi1010', '4.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 13:00:38'),
(13, '', 'Saterra', '1.0', '77f6c6033b519f8b', 'b2752f2143f1fa7653232e94cb9cc2b0e7d1e9d0a8f717585c27269769cbacab', 'rockchip', 'SpiceMi1010', '4.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 13:00:47'),
(14, '', 'Saterra', '1.0', '1c265112a73d7a80acade5add2aaeb30339110c', 'b2752f2143f1fa7653232e94cb9cc2b0e7d1e9d0a8f717585c27269769cbacab', 'rockchip', 'SpiceMi1010', '4.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 13:01:03'),
(15, '', 'Saterra', '1.0', '1c265112a73d7a80acade5add2aaeb30339110c', 'b2752f2143f1fa7653232e94cb9cc2b0e7d1e9d0a8f717585c27269769cbacab', 'ipad', 'SpiceMi1010', '4.1.1', 'enabled', 'enabled', 'enabled', 'production', 'active', '2013-06-21 13:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `apns_messages`
--

CREATE TABLE IF NOT EXISTS `apns_messages` (
  `pid` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` varchar(64) NOT NULL,
  `fk_device` int(9) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `delivery` datetime NOT NULL,
  `status` enum('queued','delivered','failed') CHARACTER SET latin1 NOT NULL DEFAULT 'queued',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pid`),
  KEY `clientid` (`clientid`),
  KEY `fk_device` (`fk_device`),
  KEY `status` (`status`),
  KEY `created` (`created`),
  KEY `modified` (`modified`),
  KEY `message` (`message`),
  KEY `delivery` (`delivery`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Messages to push to APNS' AUTO_INCREMENT=112 ;

--
-- Dumping data for table `apns_messages`
--

INSERT INTO `apns_messages` (`pid`, `clientid`, `fk_device`, `message`, `delivery`, `status`, `created`, `modified`) VALUES
(86, '', 163, '{"aps":{"alert":"Testing iPad2","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:46', 'delivered', '2013-07-02 11:08:46', '2013-07-02 05:38:53'),
(85, '', 162, '{"aps":{"alert":"Testing iPad2","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:46', 'delivered', '2013-07-02 11:08:46', '2013-07-02 05:38:52'),
(84, '', 158, '{"aps":{"alert":"Testing iPad2","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:46', 'delivered', '2013-07-02 11:08:46', '2013-07-02 05:38:51'),
(83, '', 159, '{"aps":{"alert":"Testing iPad2","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:46', 'delivered', '2013-07-02 11:08:46', '2013-07-02 05:38:50'),
(82, '', 163, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:05', 'delivered', '2013-07-02 11:08:05', '2013-07-02 05:38:12'),
(81, '', 162, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:05', 'delivered', '2013-07-02 11:08:05', '2013-07-02 05:38:11'),
(80, '', 158, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:05', 'delivered', '2013-07-02 11:08:05', '2013-07-02 05:38:10'),
(75, '', 158, '{"aps":{"alert":"Hi testing","sound":"chime"},"acme2":["bang","whiz"]}', '2013-06-26 12:47:17', 'delivered', '2013-06-26 12:47:17', '2013-06-26 07:18:01'),
(76, '', 162, '{"aps":{"alert":"Hi testing","sound":"chime"},"acme2":["bang","whiz"]}', '2013-06-26 12:47:17', 'delivered', '2013-06-26 12:47:17', '2013-06-26 07:18:00'),
(77, '', 158, '{"aps":{"alert":"Hi testing","sound":"chime"},"acme2":["bang","whiz"]}', '2013-06-26 12:47:52', 'delivered', '2013-06-26 12:47:52', '2013-07-02 05:39:34'),
(78, '', 162, '{"aps":{"alert":"Hi testing","sound":"chime"},"acme2":["bang","whiz"]}', '2013-06-26 12:47:52', 'delivered', '2013-06-26 12:47:52', '2013-07-02 05:39:33'),
(79, '', 159, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:08:05', 'delivered', '2013-07-02 11:08:05', '2013-07-02 05:38:09'),
(101, '', 175, '{"aps":{"alert":"hi how are khana khake jana ho!!!","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-15 17:16:06', 'delivered', '2013-07-15 17:16:06', '2013-07-15 11:46:09'),
(100, '', 175, '{"aps":{"alert":"testing 1\\r\\n","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-15 17:15:06', 'delivered', '2013-07-15 17:15:06', '2013-07-15 11:45:08'),
(90, '', 163, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:09:24', 'delivered', '2013-07-02 11:09:24', '2013-07-02 05:39:36'),
(91, '', 175, '{"aps":{"alert":"hello","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 14:49:10', 'delivered', '2013-07-12 14:49:10', '2013-07-12 09:19:16'),
(92, '', 175, '{"aps":{"alert":"hii","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 15:13:27', 'delivered', '2013-07-12 15:13:27', '2013-07-12 09:43:32'),
(93, '', 175, '{"aps":{"alert":"adf","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 15:34:12', 'delivered', '2013-07-12 15:34:12', '2013-07-12 10:04:15'),
(94, '', 175, '{"aps":{"alert":"adf","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 15:35:11', 'delivered', '2013-07-12 15:35:11', '2013-07-12 10:05:14'),
(95, '', 175, '{"aps":{"alert":"adf","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 15:39:23', 'delivered', '2013-07-12 15:39:23', '2013-07-12 10:09:26'),
(96, '', 175, '{"aps":{"alert":"xzcv","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 15:41:51', 'delivered', '2013-07-12 15:41:51', '2013-07-12 10:15:03'),
(97, '', 175, '{"aps":{"alert":"hii","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 15:44:50', 'delivered', '2013-07-12 15:44:50', '2013-07-12 10:54:47'),
(98, '', 175, '{"aps":{"alert":"Promotion Text","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 16:24:45', 'delivered', '2013-07-12 16:24:45', '2013-07-12 10:57:09'),
(99, '', 175, '{"aps":{"alert":"asdfghjkl","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-12 16:27:07', 'delivered', '2013-07-12 16:27:07', '2013-07-15 11:47:00'),
(89, '', 162, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:09:24', 'queued', '2013-07-02 11:09:24', '2013-07-02 05:39:24'),
(88, '', 158, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:09:24', 'queued', '2013-07-02 11:09:24', '2013-07-02 05:39:24'),
(87, '', 159, '{"aps":{"alert":"Testing iPad","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-02 11:09:24', 'delivered', '2013-07-02 11:09:24', '2013-07-02 05:39:35'),
(72, '', 159, '{"aps":{"alert":"Testing for maitrey","sound":"chime"},"acme2":["bang","whiz"]}', '2013-06-26 12:28:46', 'queued', '2013-06-26 12:28:46', '2013-06-26 06:58:46'),
(73, '', 158, '{"aps":{"alert":"Testing for maitrey","sound":"chime"},"acme2":["bang","whiz"]}', '2013-06-26 12:28:46', 'queued', '2013-06-26 12:28:46', '2013-06-26 06:58:46'),
(74, '', 161, '{"aps":{"alert":"Testing for maitrey","sound":"chime"},"acme2":["bang","whiz"]}', '2013-06-26 12:28:46', 'delivered', '2013-06-26 12:28:46', '2013-06-26 06:58:54'),
(102, '', 175, '{"aps":{"alert":"hi hardik","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-15 17:16:58', 'delivered', '2013-07-15 17:16:58', '2013-07-15 12:04:13'),
(103, '', 175, '{"aps":{"alert":"testing","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-15 17:34:10', 'delivered', '2013-07-15 17:34:10', '2013-07-15 12:40:30'),
(104, '', 175, '{"aps":{"alert":"Promotion Text","sound":"chime"},"MessageType":"PRODUCT","ProductID":"3","long_description":"Our high quality ruby necklace is available in various sizes and is widely demanded in various sizes and is widely demanded in various parts of t', '2013-07-15 18:10:27', 'delivered', '2013-07-15 18:10:27', '2013-07-15 12:42:23'),
(105, '', 175, '{"aps":{"alert":"adsf","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-15 18:12:20', 'delivered', '2013-07-15 18:12:20', '2013-07-15 12:43:03'),
(106, '', 175, '{"aps":{"alert":"Promotion Textt","sound":"chime"},"MessageType":"PRODUCT","long_description":"Our Classical Dance Set is used by various parts of the world. These jewellery sets are available in different sizes and designs. Our Classical Dance Set is ava', '2013-07-15 18:12:59', 'delivered', '2013-07-15 18:12:59', '2013-07-15 12:44:03'),
(107, '', 175, '{"aps":{"alert":"hii","sound":"chime"},"MessageType":"PRODUCT","long_description":"asdf"}', '2013-07-15 18:14:00', 'delivered', '2013-07-15 18:14:00', '2013-07-15 14:26:22'),
(108, '', 175, '{"aps":{"alert":"Noves ofertes , no te les perdis !!","sound":"chime"},"MessageType":"PRODUCT","ProductID":"1","long_description":"aixo es una prova d''en Gregori"}', '2013-07-15 19:56:20', 'delivered', '2013-07-15 19:56:20', '2013-07-15 14:27:19'),
(109, '', 175, '{"aps":{"alert":"Promotion Text","sound":"chime"},"MessageType":"PRODUCT","ProductID":"5","long_description":"Silver Handmade Jewellery is manufactured using superior grade of raw material."}', '2013-07-15 19:57:16', 'delivered', '2013-07-15 19:57:16', '2013-07-15 14:37:31'),
(110, '', 175, '{"aps":{"alert":"Promotion Textt","sound":"chime"},"MessageType":"PRODUCT","ProductID":"3","long_description":"Our high quality ruby necklace is available in various sizes and is widely demanded in various sizes and is widely demanded in various parts of ', '2013-07-15 20:07:29', 'delivered', '2013-07-15 20:07:29', '2013-07-15 14:39:02'),
(111, '', 175, '{"aps":{"alert":"local","sound":"chime"},"acme2":["bang","whiz"]}', '2013-07-15 20:09:00', 'queued', '2013-07-15 20:09:00', '2013-07-15 14:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE IF NOT EXISTS `demo` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gcm_users`
--

CREATE TABLE IF NOT EXISTS `gcm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gcm_regid` text,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`id`, `gcm_regid`, `name`, `email`, `created_at`) VALUES
(2, 'APA91bGi6gL9tfjshTpwtHpmbpNFg3RDYE4WRaEM0LfTWOfgl1Jl71C8I_RynZTqNxte8ynZGw2o_CfwU3x2ULloGkaYsl8yRjP5bcREzF39zZYQznaUJiNkR3m5j9E_SKuSRAAGz2Z-', 'Narendrabhai', 'testwebatease@gmail.com', '2013-05-16 12:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(25) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(101, 'Silver'),
(102, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE IF NOT EXISTS `tbl_contactus` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_title` varchar(150) NOT NULL,
  `con_address` varchar(250) NOT NULL,
  `con_phoneno` varchar(50) NOT NULL,
  `con_extra` varchar(500) NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`con_id`, `con_title`, `con_address`, `con_phoneno`, `con_extra`) VALUES
(1, 'MATARO', 'Address', '9898214099', 'abcd'),
(2, 'Saterra Granollers', 'Carrer Central', '93658797', 'En el centre de granollers');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inci`
--

CREATE TABLE IF NOT EXISTS `tbl_inci` (
  `inci_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `image` varchar(400) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `gas_std_title` varchar(100) NOT NULL,
  `gas_std_price` float(10,3) NOT NULL,
  `gas_prem_title` varchar(100) NOT NULL,
  `gas_prem_price` float(10,3) NOT NULL,
  `sp_95_title` varchar(100) NOT NULL,
  `sp_95_price` float(10,3) NOT NULL,
  `sp_98_title` varchar(100) NOT NULL,
  `sp_98_price` float(10,3) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`inci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_inci`
--

INSERT INTO `tbl_inci` (`inci_id`, `title`, `image`, `description`, `gas_std_title`, `gas_std_price`, `gas_prem_title`, `gas_prem_price`, `sp_95_title`, `sp_95_price`, `sp_98_title`, `sp_98_price`, `last_updated`) VALUES
(1, 'Sorteig mensual Gasoil per calefacció', 'http://www.illacrous.com/img/galeria/1366984705-0-0.jpg', ' La promoció es denomina SORTEIG DE 10 PREMIS DE 200 LITRES DE CARBURANT CADA MES a ILLA CROUS ( d`ara en endavant LA PROMOCIÓ ), i està organitzada per ILLA CROUS, SL – ESTACIÓ DE SERVEI LLINARS ( en endavant ESTACIÓ DE SERVEILLINARS ), amb domicili social a Avda Mas Bagà nº 1 de Llinars del Vallès ( CP 08450 ),Barcelona, amb CIF nº B-60.437.191.', 'Gasoli Estandard', 1.379, 'Gasoli Premium', 1.419, 'Sense Plom 95', 1.499, 'Sense Plom 98', 1.609, '2013-08-03 06:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_username` varchar(25) NOT NULL,
  `login_password` varchar(25) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `login_username`, `login_password`) VALUES
(1, 'hardik', 'hardik'),
(2, 'shah', 'shah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_onlinestore`
--

CREATE TABLE IF NOT EXISTS `tbl_onlinestore` (
  `os_id` int(11) NOT NULL AUTO_INCREMENT,
  `os_title` varchar(500) NOT NULL,
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_onlinestore`
--

INSERT INTO `tbl_onlinestore` (`os_id`, `os_title`) VALUES
(1, 'Saterra, amb altres botiguers, hem creat ViaComercia, un e-commerce que ofereix els nostres productes per internet al mateix preu.'),
(3, 'Without image- title'),
(4, 'Onlins Store online check'),
(5, 'Demo online'),
(6, 'Demo online1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_onlinestoreimage`
--

CREATE TABLE IF NOT EXISTS `tbl_onlinestoreimage` (
  `osi_id` int(11) NOT NULL AUTO_INCREMENT,
  `os_id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  PRIMARY KEY (`osi_id`),
  KEY `os_id` (`os_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_onlinestoreimage`
--

INSERT INTO `tbl_onlinestoreimage` (`osi_id`, `os_id`, `path`) VALUES
(1, 1, 'mataro1.jpg'),
(2, 1, '212-mainma_thumb.jpg'),
(3, 1, 'granollers2.jpg'),
(6, 5, 'jeans1.jpg'),
(7, 6, 'jeans1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_onlinestores`
--

CREATE TABLE IF NOT EXISTS `tbl_onlinestores` (
  `os_id` int(11) NOT NULL AUTO_INCREMENT,
  `os_title` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_onlinestores`
--

INSERT INTO `tbl_onlinestores` (`os_id`, `os_title`, `image`) VALUES
(19, 'Title1', 'granollers1.jpg'),
(20, 'Title2', 'granollers2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `short_description` varchar(70) NOT NULL,
  `long_description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `offer` tinyint(1) NOT NULL,
  `push_notification` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `promotion_text` varchar(100) NOT NULL,
  `prominent` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `title`, `short_description`, `long_description`, `image`, `offer`, `push_notification`, `active`, `promotion_text`, `prominent`) VALUES
(1, 'gregroi', 'One Gram Jewellery One Gram Jewellery  One Gram Jewellery ', 'aixo es una prova d''en Gregori', 'onegram.jpg', 1, 1, 1, 'Noves ofertes , no te les perdis !!', 1),
(2, 'Classical Dance Set', 'Classical Dance Set Classical Dance Set Classical Dance Set', 'Our Classical Dance Set is used by various parts of the world. These jewellery sets are available in different sizes and designs. Our Classical Dance Set is available for rental at reasonable prices.', 'classicaldance.jpg', 0, 1, 1, 'Promotion Textt', 0),
(3, 'Ruby Jewellery Set', 'Ruby Jewellery Set Ruby Jewellery Set Ruby Jewellery Set', 'Our high quality ruby necklace is available in various sizes and is widely demanded in various sizes and is widely demanded in various parts of the world.', 'rubyjewellery.jpg', 0, 1, 1, 'Promotion Textt', 1),
(4, 'Ruby Necklace', 'Ruby Necklace Ruby Necklace Ruby Necklace', 'Our high quality ruby necklace is available in various sizes and is widely demanded in various sizes and is widely demanded in various parts of the world.', 'tshirt3.jpg', 0, 1, 1, 'Promotion Text', 1),
(5, 'Silver Handmade Jewellery', 'Silver Handmade Jewellery Silver Handmade Jewellery Silver Handmade Je', 'Silver Handmade Jewellery is manufactured using superior grade of raw material.', 'Silverhandmadejewellery.jpg', 1, 1, 1, 'Promotion Text', 1),
(6, 'Silver Dollar', 'Silver Dollar Silver Dollar Silver Dollar Silver Dollar Silver Dollar', 'Our silver dollar is available in different specifications.', 'silverdollar.jpg', 1, 1, 1, 'Promotion text', 0),
(72, 'axe', 'axe', 'axe', '', 0, 0, 0, 'axe', 0),
(73, 'asdfghjkl', 'asdfghjkl', 'asdfghjkl', '', 0, 1, 0, 'asdfghjkl', 0),
(74, 'Sorteig mensual Gasoil per calefacció', 'sdfgfg', 'La promoció es denomina SORTEIG DE 10 PREMIS DE 200 LITRES DE CARBURANT CADA MES a ILLA CROUS ( d`ara en endavant LA PROMOCIÓ ), i està organitzada per ILLA CROUS, SL – ESTACIÓ DE SERVEI LLINARS ( en endavant ESTACIÓ DE SERVEILLINARS ), amb domicili social a Avda Mas Bagà nº 1 de Llinars del Vallès ( CP 08450 ),Barcelona, amb CIF nº B-60.437.191.', 'http://www.illacrous.com/img/galeria/1366984705-0-0.jpg', 0, 1, 0, 'asdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productimage`
--

CREATE TABLE IF NOT EXISTS `tbl_productimage` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `desription` varchar(500) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_productimage`
--

INSERT INTO `tbl_productimage` (`image_id`, `product_id`, `desription`, `image_path`) VALUES
(0, 2, '', 'classicaldance.jpg'),
(3, 6, 'Silver dollar description Silver dollar description Silver dollar description Silver dollar description', 'silverdollar2.jpg'),
(4, 4, '', 'tshirt2.jpg'),
(5, 5, 'another description another description another description another description', 'p5.jpg'),
(6, 1, 'extra image1', 'p7.jpg'),
(7, 1, 'extra image2', 'p6.jpg'),
(8, 4, 'ruby necklace extra image1', 'p4.jpg'),
(9, 4, 'ruby necklace extra image1', 'p3.jpg'),
(12, 3, 'ruby jwellery extra image1', 'p3.jpg'),
(21, 72, '', 'barimage - Copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE IF NOT EXISTS `tbl_promotion` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(1000) NOT NULL,
  `pro_item1` varchar(500) NOT NULL,
  `pro_value1` varchar(50) NOT NULL,
  `pro_item2` varchar(500) NOT NULL,
  `pro_value2` varchar(50) NOT NULL,
  `pro_item3` varchar(500) NOT NULL,
  `pro_value3` varchar(50) NOT NULL,
  `pro_item4` varchar(500) NOT NULL,
  `pro_value4` varchar(50) NOT NULL,
  `pro_image` varchar(500) NOT NULL,
  `pro_desc` varchar(2000) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`pro_id`, `pro_name`, `pro_item1`, `pro_value1`, `pro_item2`, `pro_value2`, `pro_item3`, `pro_value3`, `pro_item4`, `pro_value4`, `pro_image`, `pro_desc`) VALUES
(1, 'Items', 'Gasoil estàndard', '1.379', 'Gasoil premium', '1.419', 'Sense Plom 95', '1.499', 'Sense Plom 98', '1.609', 'dsfgdsg', 'a gsa dsfg dsg dsfg ds gds f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screen`
--

CREATE TABLE IF NOT EXISTS `tbl_screen` (
  `screen_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`screen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1007 ;

--
-- Dumping data for table `tbl_screen`
--

INSERT INTO `tbl_screen` (`screen_id`, `title`, `image`) VALUES
(1001, 'SERVEI TÈCNIC', 'http://vivacious.co.in/demo/saterra/images/product/screen1.png'),
(1002, 'PRODUCTS', 'http://vivacious.co.in/demo/saterra/images/product/screen1.png'),
(1003, 'online screen', '144-otheronegram.jpg'),
(1004, 'local screen', '4998-other'),
(1005, 'online screenn', '6158-other'),
(1006, 'online screenn', '9845-other7757-otherp1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_technicalimage`
--

CREATE TABLE IF NOT EXISTS `tbl_technicalimage` (
  `techimage_id` int(11) NOT NULL AUTO_INCREMENT,
  `tech_id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  PRIMARY KEY (`techimage_id`),
  KEY `tech_id` (`tech_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_technicalimage`
--

INSERT INTO `tbl_technicalimage` (`techimage_id`, `tech_id`, `path`) VALUES
(1, 1, '5719-mainte_thumb.jpg'),
(2, 2, 'tecnic4.jpg'),
(7, 4, 'jeans2.jpg'),
(8, 5, 'jeans2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_technicalservice`
--

CREATE TABLE IF NOT EXISTS `tbl_technicalservice` (
  `tech_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `long_description` varchar(500) NOT NULL,
  PRIMARY KEY (`tech_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_technicalservice`
--

INSERT INTO `tbl_technicalservice` (`tech_id`, `title`, `long_description`) VALUES
(1, 'Arreglem Joies', 'Portans les teves joies i les arreglem'),
(2, 'Servei de neteja', 'Porta''ns les teves joies , i les deixarem com a noves.'),
(3, 'Technical service online check', 'Technical service online check'),
(4, 'Demo Tech Service', 'Demo Technical service online check'),
(5, 'Demo Technicall', 'Demo Technical service online checkk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_technicalservices`
--

CREATE TABLE IF NOT EXISTS `tbl_technicalservices` (
  `tech_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `long_description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`tech_id`),
  UNIQUE KEY `tech_id` (`tech_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_technicalservices`
--

INSERT INTO `tbl_technicalservices` (`tech_id`, `title`, `long_description`, `image`) VALUES
(11, 'Title1', 'Long Description1', '5991-other7757-otherp1.jpg'),
(13, 'Title2', 'Long Description2', '7085-othertecnic3.jpg'),
(15, 'Title3', 'Long Description3', '7194-main9596-mainp2.jpg'),
(18, 'Title4', 'Long Description4', '7489-maingranollers1.jpg'),
(21, 'Title5', 'Long Description5', 'noimage.jpg'),
(22, 'Title6', 'Long Description6', 'tecnic4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nif` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `region` varchar(20) NOT NULL,
  `city` varchar(25) NOT NULL,
  `direction` varchar(25) NOT NULL,
  `cp` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `nif`, `name`, `surname`, `region`, `city`, `direction`, `cp`, `email`, `password`) VALUES
(1, 'NIF', 'Stephen', 'Wilson', 'Alsace', 'Strasbourg', 'direction', 'cp', 'email1@yahoo.com', 'abcd1234'),
(2, 'NIF', 'Nicolaa', 'Bracton', 'Limousin', 'Limoges', 'direction', 'cp', 'email2@gmail.com', 'xyz123'),
(3, 'NIF', 'Wil', 'Yannacoulias', 'Picardie', 'Amiens', 'direction', 'cp', 'email3@gmail.com', 'asdfg1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
