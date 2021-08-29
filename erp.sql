-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 11:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_accounttype`
--

CREATE TABLE `accounting_accounttype` (
  `id` int(11) NOT NULL,
  `parent_accounting_accounttype_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_accounttype`
--

INSERT INTO `accounting_accounttype` (`id`, `parent_accounting_accounttype_id`, `name`, `slug`) VALUES
(1, 0, ' Balance Sheet Accounts', ''),
(2, 1, 'Assets', ''),
(3, 2, 'Cash', ''),
(4, 2, 'Account Receiveable', ''),
(5, 2, 'Equipment', ''),
(6, 2, 'Inventory', ''),
(7, 2, 'Prepaid Expenses', ''),
(8, 1, 'Liablities', ''),
(9, 8, 'Accounts Payable', ''),
(10, 8, ' Accured Expenses', ''),
(11, 8, 'Notes Payable', ''),
(12, 8, 'Unearned Revenue', ''),
(13, 8, 'Deferred Taxes', ''),
(14, 1, 'Owners Equity', ''),
(15, 14, 'Capital', ''),
(16, 14, 'Retained Earnings', ''),
(17, 0, 'Income Statements Accounts ', ''),
(18, 17, 'Revenue', ''),
(19, 18, 'Income', ''),
(20, 17, 'Expense', ''),
(21, 20, 'Salaries', ''),
(22, 20, 'Selling Expenses', ''),
(23, 20, 'Depreciation', ''),
(24, 20, 'Rent', ''),
(25, 20, 'Interest Expense', '');

-- --------------------------------------------------------

--
-- Table structure for table `accounting_accountyear`
--

CREATE TABLE `accounting_accountyear` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_accountyear`
--

INSERT INTO `accounting_accountyear` (`id`, `name`, `start_date`, `end_date`, `slug`) VALUES
(1, 'June 2021-Dec 2021', '2021-08-29', '2021-08-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `accounting_journalentry`
--

CREATE TABLE `accounting_journalentry` (
  `id` int(11) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `accounting_accounttype_id` int(10) DEFAULT NULL,
  `accounting_accountyear_id` int(10) DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `debit` decimal(12,2) NOT NULL,
  `credit` decimal(12,2) NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_emailaddress`
--

CREATE TABLE `account_emailaddress` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `primary` tinyint(1) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_emailconfirmation`
--

CREATE TABLE `account_emailconfirmation` (
  `id` int(11) NOT NULL,
  `created` datetime(6) NOT NULL,
  `sent` datetime(6) DEFAULT NULL,
  `key` varchar(64) NOT NULL,
  `account_emailaddress_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_attendance`
--

CREATE TABLE `attendance_attendance` (
  `id` int(11) NOT NULL,
  `enterance_date` date DEFAULT NULL,
  `enterance_time` time(6) DEFAULT NULL,
  `deperature_date` date DEFAULT NULL,
  `deperature_time` time(6) DEFAULT NULL,
  `entry_card_status` varchar(32) NOT NULL,
  `comments` longtext DEFAULT NULL,
  `hr_employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_in_out_track`
--

CREATE TABLE `attendance_in_out_track` (
  `id` int(11) NOT NULL,
  `time_occure` time(6) DEFAULT NULL,
  `in_out` varchar(32) NOT NULL,
  `entry_card_status` varchar(32) NOT NULL,
  `comments` longtext DEFAULT NULL,
  `attendance_attendance_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_leave`
--

CREATE TABLE `attendance_leave` (
  `id` int(11) NOT NULL,
  `leave_type` varchar(32) NOT NULL,
  `date_from` date DEFAULT NULL,
  `time_from` time(6) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time(6) DEFAULT NULL,
  `total_in_hrs` varchar(255) DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `attendance_leaveapplication_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_leaveapplication`
--

CREATE TABLE `attendance_leaveapplication` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `time_from` time(6) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time(6) DEFAULT NULL,
  `total_in_hrs` varchar(255) DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `manager_hr_employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_leaveapplicationdetails`
--

CREATE TABLE `attendance_leaveapplicationdetails` (
  `id` int(11) NOT NULL,
  `comments` longtext DEFAULT NULL,
  `comment_by_users_id` int(11) DEFAULT NULL,
  `attendance_leaveapplication_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(127) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'PArk', 'NY', '1212', 'uploads/images/company/1.jpg', 'uploads/images/company/3.jpg', 'uploads/images/company/10.jpg', 'footer content XXXXXXXXX XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D\'Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People\'s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `crm_billingaddress`
--

CREATE TABLE `crm_billingaddress` (
  `id` int(11) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_customer`
--

CREATE TABLE `crm_customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(32) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationalid` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `name_spouse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `land_phone` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `permanent_address` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `contact_details` longtext DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL,
  `date_joining` date DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `archive_status` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `crm_billingaddress_id` int(11) DEFAULT NULL,
  `crm_shippingaddress_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_lead`
--

CREATE TABLE `crm_lead` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(32) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationalid` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `name_spouse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `land_phone` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `permanent_address` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `contact_details` longtext DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL,
  `date_entry` date DEFAULT NULL,
  `archive_status` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_shippingaddress`
--

CREATE TABLE `crm_shippingaddress` (
  `id` int(11) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_supplier`
--

CREATE TABLE `crm_supplier` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(32) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationalid` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `name_spouse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `land_phone` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `permanent_address` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `contact_details` longtext DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL,
  `license_number` varchar(127) NOT NULL,
  `utility_businesstype_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `crm_billingaddress_id` int(11) DEFAULT NULL,
  `crm_shippingaddress_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_address`
--

CREATE TABLE `hr_address` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `road_village` varchar(255) DEFAULT NULL,
  `postoffice` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `flat_no` varchar(255) DEFAULT NULL,
  `police_station_thana` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `address_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_children`
--

CREATE TABLE `hr_children` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(32) NOT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_disciplinaryaction`
--

CREATE TABLE `hr_disciplinaryaction` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `nature_offence` varchar(255) DEFAULT NULL,
  `punishment` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_district`
--

CREATE TABLE `hr_district` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_education`
--

CREATE TABLE `hr_education` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `name_institution` varchar(255) DEFAULT NULL,
  `principals_subject` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee`
--

CREATE TABLE `hr_employee` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(32) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationalid` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `name_spouse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `land_phone` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `permanent_address` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `contact_details` longtext DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `home_district` varchar(255) DEFAULT NULL,
  `spouse_occupation` varchar(255) DEFAULT NULL,
  `spouse_district` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `date_joining` date DEFAULT NULL,
  `entry_designation` varchar(255) DEFAULT NULL,
  `entry_scale` varchar(255) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `archive_status` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee`
--

INSERT INTO `hr_employee` (`id`, `users_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `nationalid`, `blood_group`, `marital_status`, `name_spouse`, `email`, `cell_phone`, `land_phone`, `country`, `state`, `city`, `zip_code`, `permanent_address`, `about`, `contact_details`, `latitude`, `longitude`, `fathers_name`, `mothers_name`, `home_district`, `spouse_occupation`, `spouse_district`, `religion`, `date_joining`, `entry_designation`, `entry_scale`, `picture`, `archive_status`, `status`) VALUES
(1, 9, 'Amirul', 'Momenin', '', '2021-08-29', '', '', '', 'Amirul Momenin', 'amirrucst@gmail.com', '066565656', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1207', 'C-20,JAkir Hossain Road,Block-E', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_achievement`
--

CREATE TABLE `hr_employee_achievement` (
  `id` int(11) NOT NULL,
  `points_to_hr_employee_id` int(11) DEFAULT NULL,
  `points_by_hr_employee_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `no_of_units_completed` decimal(12,2) NOT NULL,
  `points_on_unit_task` decimal(12,2) NOT NULL,
  `date_achivement` date DEFAULT NULL,
  `total_units_points` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_languages`
--

CREATE TABLE `hr_languages` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `read` varchar(255) DEFAULT NULL,
  `write` varchar(255) DEFAULT NULL,
  `speak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_promotions`
--

CREATE TABLE `hr_promotions` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `date_promotion` date DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `pay_scale` varchar(255) DEFAULT NULL,
  `nature_promotion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_rest_of_recreation`
--

CREATE TABLE `hr_rest_of_recreation` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `coming_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_retirement_year`
--

CREATE TABLE `hr_retirement_year` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_servicehistory`
--

CREATE TABLE `hr_servicehistory` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `office_name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_training`
--

CREATE TABLE `hr_training` (
  `id` int(11) NOT NULL,
  `hr_employee_id` int(11) DEFAULT NULL,
  `title_trainin` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `trining_type` varchar(32) NOT NULL,
  `date_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_buy`
--

CREATE TABLE `inventory_buy` (
  `id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `crm_billingaddress_id` int(11) DEFAULT NULL,
  `crm_customer_id` int(11) DEFAULT NULL,
  `seller_users_id` int(11) DEFAULT NULL,
  `crm_shippingaddress_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_buyproducts`
--

CREATE TABLE `inventory_buyproducts` (
  `id` int(11) NOT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `discount` decimal(12,2) NOT NULL,
  `tax` decimal(12,2) NOT NULL,
  `date_added` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `inventory_buy_id` int(11) DEFAULT NULL,
  `inventory_item_id` int(11) DEFAULT NULL,
  `utility_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_category`
--

CREATE TABLE `inventory_category` (
  `id` int(11) NOT NULL,
  `description` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_inventory_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--

CREATE TABLE `inventory_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `item_quantity` decimal(12,2) NOT NULL,
  `date_added` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `inventory_category_id` int(11) DEFAULT NULL,
  `item_utility_unit_id` int(11) DEFAULT NULL,
  `inventory_warehouse_id` int(11) DEFAULT NULL,
  `orginal_price` decimal(12,2) NOT NULL,
  `sale_price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_sale`
--

CREATE TABLE `inventory_sale` (
  `id` int(11) NOT NULL,
  `created_on` datetime(6) DEFAULT NULL,
  `modified_on` datetime(6) NOT NULL,
  `status` varchar(32) NOT NULL,
  `crm_billingaddress_id` int(11) DEFAULT NULL,
  `created_by_users_id` int(11) DEFAULT NULL,
  `crm_customer_id` int(11) DEFAULT NULL,
  `modified_by_users_id` int(11) DEFAULT NULL,
  `crm_supplier_id` int(11) DEFAULT NULL,
  `crm_shippingaddress_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_saleproducts`
--

CREATE TABLE `inventory_saleproducts` (
  `id` int(11) NOT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `discount` decimal(12,2) NOT NULL,
  `tax` decimal(12,2) NOT NULL,
  `date_added` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `inventory_item_id` int(11) DEFAULT NULL,
  `inventory_sale_id` int(11) DEFAULT NULL,
  `utility_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_warehouse`
--

CREATE TABLE `inventory_warehouse` (
  `id` int(11) NOT NULL,
  `created_on` datetime(6) DEFAULT NULL,
  `modified_on` datetime(6) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `created_by_users_id` int(11) DEFAULT NULL,
  `modified_by_users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_warehousemanager`
--

CREATE TABLE `inventory_warehousemanager` (
  `id` int(11) NOT NULL,
  `appointed_date` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `manager_hr_employee_id` int(11) DEFAULT NULL,
  `inventory_warehouse_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_leads`
--

CREATE TABLE `marketing_leads` (
  `id` int(10) NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `cell_phone` varchar(64) DEFAULT NULL,
  `land_phone` varchar(64) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_mail_group`
--

CREATE TABLE `marketing_mail_group` (
  `id` int(10) NOT NULL,
  `group_name` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_smtp`
--

CREATE TABLE `marketing_smtp` (
  `id` int(10) NOT NULL,
  `smtp_name` varchar(64) DEFAULT NULL,
  `host` varchar(127) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` varchar(127) DEFAULT NULL,
  `address` varchar(127) DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(127) DEFAULT NULL,
  `zip` varchar(127) DEFAULT NULL,
  `country_id` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type` enum('super','staff','client','visitor') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `file_picture`, `phone_no`, `dob`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, 'xx@xx.com', 'xx', 'Mr.', 'John', 'Smith', 'uploads/images/users/8.jpg', '', '2021-02-10', '', '', '', '', '', '231', '2011-10-19 00:00:00', '2021-02-10 06:48:43', 'super', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `utility_businesstype`
--

CREATE TABLE `utility_businesstype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_businesstype`
--

INSERT INTO `utility_businesstype` (`id`, `name`, `description`) VALUES
(1, 'IT', ''),
(2, 'Pharmachy', ''),
(3, 'Contruction', '');

-- --------------------------------------------------------

--
-- Table structure for table `utility_company`
--

CREATE TABLE `utility_company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `land_phone` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `contact_details` longtext DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL,
  `year_established` date DEFAULT NULL,
  `total_employees` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `main_products` varchar(255) DEFAULT NULL,
  `total_annual_revenue` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `social_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_companybranch`
--

CREATE TABLE `utility_companybranch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `land_phone` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `contact_details` longtext DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL,
  `year_established` date DEFAULT NULL,
  `total_employees` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `main_products` varchar(255) DEFAULT NULL,
  `total_annual_revenue` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `social_link` varchar(255) DEFAULT NULL,
  `utility_company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_companybranch`
--

INSERT INTO `utility_companybranch` (`id`, `name`, `description`, `email`, `cell_phone`, `land_phone`, `country`, `state`, `city`, `zip_code`, `about`, `contact_details`, `latitude`, `longitude`, `year_established`, `total_employees`, `business_type`, `main_products`, `total_annual_revenue`, `url`, `social_link`, `utility_company_id`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', 0),
(2, 'Amirul Momenin', '', 'amirrucst@gmail.com', '066565656', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1207', '', '', '', '', '0000-00-00', '', 'ddddddd', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utility_predfinedpointsrule`
--

CREATE TABLE `utility_predfinedpointsrule` (
  `id` int(11) NOT NULL,
  `created_on` datetime(6) DEFAULT NULL,
  `modified_on` datetime(6) NOT NULL,
  `units_points` decimal(12,2) NOT NULL,
  `task_description` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `created_by_users_id` int(11) DEFAULT NULL,
  `modified_by_users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_schedulebasemodel`
--

CREATE TABLE `utility_schedulebasemodel` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `time_from` time(6) DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `time_to` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_taskunitspointsbasemodel`
--

CREATE TABLE `utility_taskunitspointsbasemodel` (
  `id` int(11) NOT NULL,
  `total_units_task` decimal(12,2) NOT NULL,
  `unit_task_description` longtext DEFAULT NULL,
  `points_on_unit_task` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_taskunitspointsbasemodel`
--

INSERT INTO `utility_taskunitspointsbasemodel` (`id`, `total_units_task`, `unit_task_description`, `points_on_unit_task`) VALUES
(1, '100.00', '', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `utility_tax`
--

CREATE TABLE `utility_tax` (
  `id` int(11) NOT NULL,
  `tax` double DEFAULT NULL,
  `utility_businesstype_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_tax`
--

INSERT INTO `utility_tax` (`id`, `tax`, `utility_businesstype_id`) VALUES
(1, 15, 3),
(2, 10, 2),
(3, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utility_unit`
--

CREATE TABLE `utility_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_unit`
--

INSERT INTO `utility_unit` (`id`, `name`, `description`) VALUES
(1, 'KM', ''),
(2, 'KG', ''),
(3, 'L', '');

-- --------------------------------------------------------

--
-- Table structure for table `utility_userprofile`
--

CREATE TABLE `utility_userprofile` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(32) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationalid` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `name_spouse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `land_phone` varchar(255) DEFAULT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `permanent_address` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `contact_details` longtext DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_vat`
--

CREATE TABLE `utility_vat` (
  `id` int(11) NOT NULL,
  `vat` double DEFAULT NULL,
  `utility_businesstype_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_vat`
--

INSERT INTO `utility_vat` (`id`, `vat`, `utility_businesstype_id`) VALUES
(1, 10, 3),
(2, 10, 2),
(3, 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_accounttype`
--
ALTER TABLE `accounting_accounttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounting_accountyear`
--
ALTER TABLE `accounting_accountyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounting_journalentry`
--
ALTER TABLE `accounting_journalentry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_emailaddress`
--
ALTER TABLE `account_emailaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_emailconfirmation`
--
ALTER TABLE `account_emailconfirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_attendance`
--
ALTER TABLE `attendance_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_attendance_employee_id_63b4db5a_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `attendance_in_out_track`
--
ALTER TABLE `attendance_in_out_track`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_in__atendance_id_1faa24a5_fk_attendance_attendance_id` (`attendance_attendance_id`);

--
-- Indexes for table `attendance_leave`
--
ALTER TABLE `attendance_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_application_id_c21bd9e9_fk_attendance_leaveapplication_id` (`attendance_leaveapplication_id`);

--
-- Indexes for table `attendance_leaveapplication`
--
ALTER TABLE `attendance_leaveapplication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_leaveapplicati_employee_id_2eae1256_fk_hr_employee_id` (`hr_employee_id`),
  ADD KEY `attendance_leaveapplica_hr_manager_id_0c001264_fk_hr_employee_id` (`manager_hr_employee_id`);

--
-- Indexes for table `attendance_leaveapplicationdetails`
--
ALTER TABLE `attendance_leaveapplicationdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_leaveapplica_comment_by_id_2182dfda_fk_hr_employee_id` (`comment_by_users_id`),
  ADD KEY `leave_application_id_c3834596_fk_attendance_leaveapplication_id` (`attendance_leaveapplication_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_billingaddress`
--
ALTER TABLE `crm_billingaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_customer`
--
ALTER TABLE `crm_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`users_id`),
  ADD KEY `crm_customer_BillingAddress_id_1d748942_fk_crm_billingaddress_id` (`crm_billingaddress_id`),
  ADD KEY `crm_custom_ShippingAddress_id_f5c13d53_fk_crm_shippingaddress_id` (`crm_shippingaddress_id`);

--
-- Indexes for table `crm_lead`
--
ALTER TABLE `crm_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_shippingaddress`
--
ALTER TABLE `crm_shippingaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_supplier`
--
ALTER TABLE `crm_supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`users_id`),
  ADD KEY `crm_supplie_business_type_id_23573032_fk_utility_businesstype_id` (`utility_businesstype_id`),
  ADD KEY `crm_supplier_BillingAddress_id_eb2e25db_fk_crm_billingaddress_id` (`crm_billingaddress_id`),
  ADD KEY `crm_suppli_ShippingAddress_id_2d1072dd_fk_crm_shippingaddress_id` (`crm_shippingaddress_id`);

--
-- Indexes for table `hr_address`
--
ALTER TABLE `hr_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_address_employee_id_2ecfc945_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_children`
--
ALTER TABLE `hr_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_children_employee_id_336bfb45_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_disciplinaryaction`
--
ALTER TABLE `hr_disciplinaryaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_disciplinaryaction_employee_id_de621ab5_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_district`
--
ALTER TABLE `hr_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_district_employee_id_f0106495_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_education`
--
ALTER TABLE `hr_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_education_employee_id_e2ebc41b_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_employee`
--
ALTER TABLE `hr_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`users_id`);

--
-- Indexes for table `hr_employee_achievement`
--
ALTER TABLE `hr_employee_achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_employee_achievement_points_by_id_22900ce8_fk_hr_employee_id` (`points_by_hr_employee_id`),
  ADD KEY `hr_employee_achievement_points_to_id_4573f917_fk_hr_employee_id` (`points_to_hr_employee_id`);

--
-- Indexes for table `hr_languages`
--
ALTER TABLE `hr_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_languages_employee_id_fd8b4cb4_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_promotions`
--
ALTER TABLE `hr_promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_promotions_employee_id_265dc642_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_rest_of_recreation`
--
ALTER TABLE `hr_rest_of_recreation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_rest_of_recreation_employee_id_1fa0417d_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_retirement_year`
--
ALTER TABLE `hr_retirement_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_retirement_year_employee_id_4b812563_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_servicehistory`
--
ALTER TABLE `hr_servicehistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_servicehistory_employee_id_0a47cef7_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `hr_training`
--
ALTER TABLE `hr_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_training_employee_id_bb75c730_fk_hr_employee_id` (`hr_employee_id`);

--
-- Indexes for table `inventory_buy`
--
ALTER TABLE `inventory_buy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_b_billing_address_id_9854b11c_fk_crm_billingaddress_id` (`crm_billingaddress_id`),
  ADD KEY `inventory_buy_customer_id_28942ddc_fk_hr_employee_id` (`crm_customer_id`),
  ADD KEY `inventory_buy_seller_id_95c848aa_fk_crm_customer_id` (`seller_users_id`),
  ADD KEY `inventory_shipping_address_id_77c1dc11_fk_crm_shippingaddress_id` (`crm_shippingaddress_id`);

--
-- Indexes for table `inventory_buyproducts`
--
ALTER TABLE `inventory_buyproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_buyproducts_buy_id_2c2beceb_fk_inventory_buy_id` (`inventory_buy_id`),
  ADD KEY `inventory_buyproducts_item_id_23a77a5b_fk_inventory_item_id` (`inventory_item_id`),
  ADD KEY `inventory_buyproducts_unit_id_22592c4c_fk_utility_unit_id` (`utility_unit_id`);

--
-- Indexes for table `inventory_category`
--
ALTER TABLE `inventory_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_c_parent_category_id_4451fa1d_fk_inventory_category_id` (`parent_inventory_category_id`);

--
-- Indexes for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_item_category_id_44f2108d_fk_inventory_category_id` (`inventory_category_id`),
  ADD KEY `inventory_item_warehouse_id_2fcfacda_fk_inventory_warehouse_id` (`inventory_warehouse_id`),
  ADD KEY `inventory_item_item_unit_id_36c95a55_fk_utility_unit_id` (`item_utility_unit_id`);

--
-- Indexes for table `inventory_sale`
--
ALTER TABLE `inventory_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_s_billing_address_id_42772ee9_fk_crm_billingaddress_id` (`crm_billingaddress_id`),
  ADD KEY `inventory_sale_created_by_id_29ec299a_fk_auth_user_id` (`created_by_users_id`),
  ADD KEY `inventory_sale_customer_id_5fe0e67a_fk_crm_customer_id` (`crm_customer_id`),
  ADD KEY `inventory_sale_modified_by_id_4a212da9_fk_auth_user_id` (`modified_by_users_id`),
  ADD KEY `inventory_sale_seller_id_34dc813a_fk_hr_employee_id` (`crm_supplier_id`),
  ADD KEY `inventory_shipping_address_id_c858b679_fk_crm_shippingaddress_id` (`crm_shippingaddress_id`);

--
-- Indexes for table `inventory_saleproducts`
--
ALTER TABLE `inventory_saleproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_saleproducts_item_id_0e915172_fk_inventory_item_id` (`inventory_item_id`),
  ADD KEY `inventory_saleproducts_sale_id_cd85d7eb_fk_inventory_sale_id` (`inventory_sale_id`),
  ADD KEY `inventory_saleproducts_unit_id_eb1615a9_fk_utility_unit_id` (`utility_unit_id`);

--
-- Indexes for table `inventory_warehouse`
--
ALTER TABLE `inventory_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_warehouse_created_by_id_8df0f904_fk_auth_user_id` (`created_by_users_id`),
  ADD KEY `inventory_warehouse_modified_by_id_83517e17_fk_auth_user_id` (`modified_by_users_id`);

--
-- Indexes for table `inventory_warehousemanager`
--
ALTER TABLE `inventory_warehousemanager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_wareho_warehouse_id_66a4b143_fk_inventory_warehouse_id` (`inventory_warehouse_id`),
  ADD KEY `inventory_warehousemanager_manager_id_3f29c71b_fk_hr_employee_id` (`manager_hr_employee_id`);

--
-- Indexes for table `marketing_leads`
--
ALTER TABLE `marketing_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_mail_group`
--
ALTER TABLE `marketing_mail_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_smtp`
--
ALTER TABLE `marketing_smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_businesstype`
--
ALTER TABLE `utility_businesstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_company`
--
ALTER TABLE `utility_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_companybranch`
--
ALTER TABLE `utility_companybranch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utility_companybranch_company_id_a716bc1f_fk_utility_company_id` (`utility_company_id`);

--
-- Indexes for table `utility_predfinedpointsrule`
--
ALTER TABLE `utility_predfinedpointsrule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utility_predfinedpointsru_created_by_id_f5c34367_fk_auth_user_id` (`created_by_users_id`),
  ADD KEY `utility_predfinedpointsr_modified_by_id_bd82178d_fk_auth_user_id` (`modified_by_users_id`);

--
-- Indexes for table `utility_schedulebasemodel`
--
ALTER TABLE `utility_schedulebasemodel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_taskunitspointsbasemodel`
--
ALTER TABLE `utility_taskunitspointsbasemodel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_tax`
--
ALTER TABLE `utility_tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utility_tax_business_type_id_3b60d77c_fk_utility_businesstype_id` (`utility_businesstype_id`);

--
-- Indexes for table `utility_unit`
--
ALTER TABLE `utility_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_userprofile`
--
ALTER TABLE `utility_userprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_vat`
--
ALTER TABLE `utility_vat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utility_vat_business_type_id_fabe4c72_fk_utility_businesstype_id` (`utility_businesstype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_accounttype`
--
ALTER TABLE `accounting_accounttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `accounting_accountyear`
--
ALTER TABLE `accounting_accountyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounting_journalentry`
--
ALTER TABLE `accounting_journalentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_emailaddress`
--
ALTER TABLE `account_emailaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_emailconfirmation`
--
ALTER TABLE `account_emailconfirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_attendance`
--
ALTER TABLE `attendance_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_in_out_track`
--
ALTER TABLE `attendance_in_out_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_leave`
--
ALTER TABLE `attendance_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_leaveapplication`
--
ALTER TABLE `attendance_leaveapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_leaveapplicationdetails`
--
ALTER TABLE `attendance_leaveapplicationdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `crm_billingaddress`
--
ALTER TABLE `crm_billingaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_customer`
--
ALTER TABLE `crm_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_lead`
--
ALTER TABLE `crm_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_shippingaddress`
--
ALTER TABLE `crm_shippingaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_supplier`
--
ALTER TABLE `crm_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_address`
--
ALTER TABLE `hr_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_children`
--
ALTER TABLE `hr_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_disciplinaryaction`
--
ALTER TABLE `hr_disciplinaryaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_district`
--
ALTER TABLE `hr_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_education`
--
ALTER TABLE `hr_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_employee`
--
ALTER TABLE `hr_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_employee_achievement`
--
ALTER TABLE `hr_employee_achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_languages`
--
ALTER TABLE `hr_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_promotions`
--
ALTER TABLE `hr_promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_rest_of_recreation`
--
ALTER TABLE `hr_rest_of_recreation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_retirement_year`
--
ALTER TABLE `hr_retirement_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_servicehistory`
--
ALTER TABLE `hr_servicehistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_training`
--
ALTER TABLE `hr_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_buy`
--
ALTER TABLE `inventory_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_buyproducts`
--
ALTER TABLE `inventory_buyproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_category`
--
ALTER TABLE `inventory_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_item`
--
ALTER TABLE `inventory_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_sale`
--
ALTER TABLE `inventory_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_saleproducts`
--
ALTER TABLE `inventory_saleproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_warehouse`
--
ALTER TABLE `inventory_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_warehousemanager`
--
ALTER TABLE `inventory_warehousemanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing_leads`
--
ALTER TABLE `marketing_leads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing_mail_group`
--
ALTER TABLE `marketing_mail_group`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing_smtp`
--
ALTER TABLE `marketing_smtp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utility_businesstype`
--
ALTER TABLE `utility_businesstype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utility_company`
--
ALTER TABLE `utility_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utility_companybranch`
--
ALTER TABLE `utility_companybranch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utility_predfinedpointsrule`
--
ALTER TABLE `utility_predfinedpointsrule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utility_schedulebasemodel`
--
ALTER TABLE `utility_schedulebasemodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utility_taskunitspointsbasemodel`
--
ALTER TABLE `utility_taskunitspointsbasemodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utility_tax`
--
ALTER TABLE `utility_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utility_unit`
--
ALTER TABLE `utility_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utility_vat`
--
ALTER TABLE `utility_vat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
