-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 09:25 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tss`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_num` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_num`, `date`, `time`, `details`, `department`, `section`, `status`) VALUES
(1, '2017-08-31', '10:00 am', 'Technical Presentation', '1', '1', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `callsreport`
--

CREATE TABLE `callsreport` (
  `callsreport_num` int(11) NOT NULL,
  `concern` varchar(300) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `callsreport`
--

INSERT INTO `callsreport` (`callsreport_num`, `concern`, `department`, `section`, `status`, `date`, `time`) VALUES
(1, 'Internet Connection / Printer Error', 'Nursing Service Department', '3A', 'Pending', '2017-08-23', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `calls_hardware`
--

CREATE TABLE `calls_hardware` (
  `ch_id` int(11) NOT NULL,
  `concern` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `status` enum('Done','Pending') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calls_others`
--

CREATE TABLE `calls_others` (
  `co_id` int(11) NOT NULL,
  `concern` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('Done','Pending') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calls_report`
--

CREATE TABLE `calls_report` (
  `id` int(11) NOT NULL,
  `type_of_report` enum('Hardware','Software','WiFi','Other') NOT NULL,
  `department_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `status` enum('Pending','Done') NOT NULL,
  `concern` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `admission_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calls_report`
--

INSERT INTO `calls_report` (`id`, `type_of_report`, `department_id`, `section_id`, `status`, `concern`, `name`, `admission_number`) VALUES
(1, 'Hardware', 1, 1, 'Pending', 'Computer Monitor', '9999', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `calls_software`
--

CREATE TABLE `calls_software` (
  `cs_id` int(11) NOT NULL,
  `concern` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `status` enum('Done','Pending') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calls_wifi`
--

CREATE TABLE `calls_wifi` (
  `cw_id` int(11) NOT NULL,
  `admission_number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('Done','Pending') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `abbr`, `name`) VALUES
(1, 'AD', 'Accounting Department'),
(2, 'HRD', 'Human Resource Department');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_count` int(11) NOT NULL,
  `payroll_number` varchar(100) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `department` int(11) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_count`, `payroll_number`, `employee_name`, `department`, `section`) VALUES
(1, '9999', 'Joshua Paras', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_assignment`
--

CREATE TABLE `inventory_assignment` (
  `id` int(11) NOT NULL,
  `building` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `inventory_computer_id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_assignment`
--

INSERT INTO `inventory_assignment` (`id`, `building`, `floor`, `inventory_computer_id`, `department`, `section`) VALUES
(1, 'Main Building', 'Ground Floor', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_avr`
--

CREATE TABLE `inventory_avr` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `inventory_number` varchar(100) NOT NULL,
  `sticker_number` varchar(100) NOT NULL,
  `date_of_purchased` date NOT NULL,
  `accountability` int(11) NOT NULL,
  `inventory_computer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_avr`
--

INSERT INTO `inventory_avr` (`id`, `brand`, `model`, `serial_number`, `inventory_number`, `sticker_number`, `date_of_purchased`, `accountability`, `inventory_computer_id`) VALUES
(1, 'SuperAVR', 'AVR-2007', '5197856', '326598451', '123454523', '2018-02-01', 9999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_computer`
--

CREATE TABLE `inventory_computer` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model_description` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `inventory_number` varchar(100) NOT NULL,
  `sticker_number` varchar(100) NOT NULL,
  `date_of_purchased` varchar(100) NOT NULL,
  `accountability` int(10) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `usb` enum('Enable','Disable') NOT NULL,
  `office_suite_version` varchar(100) NOT NULL,
  `office_suite_liscense_type` enum('Licensed','Free (Not Licensed)') NOT NULL,
  `office_suite_product_key` varchar(100) DEFAULT NULL,
  `operating_system_name_version` varchar(100) NOT NULL,
  `operating_system_license_type` enum('Licensed','Free (Not Licensed)') NOT NULL,
  `operating_system_product_key` varchar(100) DEFAULT NULL,
  `antivirus_name_version` varchar(100) NOT NULL,
  `antivirus_license_type` enum('Licensed','Free (Not Licensed)') NOT NULL,
  `antivirus_product_key` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_computer`
--

INSERT INTO `inventory_computer` (`id`, `brand`, `model_description`, `serial_number`, `inventory_number`, `sticker_number`, `date_of_purchased`, `accountability`, `storage`, `ram`, `ip_address`, `usb`, `office_suite_version`, `office_suite_liscense_type`, `office_suite_product_key`, `operating_system_name_version`, `operating_system_license_type`, `operating_system_product_key`, `antivirus_name_version`, `antivirus_license_type`, `antivirus_product_key`) VALUES
(1, 'ASUS', 'Sample Brand', '1234567891', '987564321', '123456789', '2018-02-01', 9999, '50 GB, 100 GB', '4 GB, 2 GB', '192.168.1.1', 'Enable', 'Libre Office', 'Free (Not Licensed)', '', 'Windows 7 Ultimate', 'Free (Not Licensed)', '', 'Norton', 'Free (Not Licensed)', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_computer_parts`
--

CREATE TABLE `inventory_computer_parts` (
  `inventory_computer_id` int(11) NOT NULL,
  `computer_part` enum('Computer','Monitor','Printer','UPS/AVR') NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `sticker_number` varchar(100) NOT NULL,
  `date_purchased` varchar(100) NOT NULL,
  `product_key` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_monitor`
--

CREATE TABLE `inventory_monitor` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `inventory_number` varchar(100) NOT NULL,
  `date_of_purchased` date NOT NULL,
  `accountability` int(11) NOT NULL,
  `inventory_computer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_monitor`
--

INSERT INTO `inventory_monitor` (`id`, `brand`, `model`, `description`, `serial_number`, `inventory_number`, `date_of_purchased`, `accountability`, `inventory_computer_id`) VALUES
(1, 'HP', 'HP-2018', 'HP LED Monitor 20\" inch ', '123654789', '987456321', '2018-02-02', 9999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_os`
--

CREATE TABLE `inventory_os` (
  `inventory_os_id` int(11) NOT NULL,
  `operating_system` varchar(100) NOT NULL,
  `bit` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `hard_disk` varchar(100) NOT NULL,
  `computer_name` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `IP_address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_printer`
--

CREATE TABLE `inventory_printer` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `type` enum('Ribbon','Ink','Toner') NOT NULL,
  `loan` enum('Yes','No') NOT NULL,
  `inventory_number` varchar(100) NOT NULL,
  `date_of_purchased` date NOT NULL,
  `accountability` int(11) NOT NULL,
  `inventory_computer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_printer`
--

INSERT INTO `inventory_printer` (`id`, `brand`, `model`, `serial_number`, `type`, `loan`, `inventory_number`, `date_of_purchased`, `accountability`, `inventory_computer_id`) VALUES
(1, 'Epson', 'Epson T60 Inkjet', '1564235', 'Ink', 'No', '132654', '2018-02-01', 9999, 1),
(2, 'Epson', 'Epson N100 Inkjet', '5162354', 'Ink', 'Yes', '132654121515', '2018-02-27', 9999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1505724176);

-- --------------------------------------------------------

--
-- Table structure for table `phone_locals`
--

CREATE TABLE `phone_locals` (
  `phone_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `localnum` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_locals`
--

INSERT INTO `phone_locals` (`phone_id`, `department`, `section`, `localnum`) VALUES
(1, '1', '1', '512'),
(2, '2', '', '613, 617, 623');

-- --------------------------------------------------------

--
-- Table structure for table `qmt_announcement`
--

CREATE TABLE `qmt_announcement` (
  `id_qmt` int(11) NOT NULL,
  `announcement` varchar(1000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `updatedby` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qmt_announcement`
--

INSERT INTO `qmt_announcement` (`id_qmt`, `announcement`, `date`, `updatedby`) VALUES
(10, 'The Latest Announcement', '2018-01-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `department_id`, `abbr`, `name`) VALUES
(1, 1, 'TSS', 'Technical Support Section');

-- --------------------------------------------------------

--
-- Table structure for table `servicereport`
--

CREATE TABLE `servicereport` (
  `servicereportnum` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `payroll_num` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `datereceived` varchar(50) NOT NULL,
  `datecomplete` varchar(50) DEFAULT NULL,
  `timereceived` varchar(50) NOT NULL,
  `timecomplete` varchar(50) DEFAULT NULL,
  `typeofservice` varchar(50) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `actiontaken` varchar(100) DEFAULT NULL,
  `status` enum('Pending','Done') NOT NULL,
  `signatureofuser` varchar(50) DEFAULT NULL,
  `tssrepresentative` varchar(50) DEFAULT NULL,
  `remarks` varchar(100) NOT NULL,
  `installation_report` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `installation_report_status` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tag_number_serial_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicereport`
--

INSERT INTO `servicereport` (`servicereportnum`, `name`, `payroll_num`, `department`, `section`, `datereceived`, `datecomplete`, `timereceived`, `timecomplete`, `typeofservice`, `problem`, `actiontaken`, `status`, `signatureofuser`, `tssrepresentative`, `remarks`, `installation_report`, `quantity`, `installation_report_status`, `description`, `tag_number_serial_number`) VALUES
(580, 'Joshua Paras', 9999, 'Accounting Department', 'Technical Support Section', '01/31/2018', NULL, '01:14:00 PM', NULL, 'Hardware', 'Blue Screen Monitor', '', 'Pending', '', '', '', '', NULL, '', '', ''),
(581, 'Joshua Paras', 9999, 'Accounting Department', 'Technical Support Section', '01/31/2018', NULL, '01:28:07 PM', NULL, 'Hardware', '11111', NULL, 'Pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `description`) VALUES
(1, 'Hardware'),
(2, 'Software'),
(3, 'Wi-Fi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `designation`, `email`) VALUES
(1, 'user1', 'pass1', 'admin', 'admin@email.com'),
(2, 'qmt', 'qmtpass', 'qmt_user', 'qmt@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `votd`
--

CREATE TABLE `votd` (
  `id_votd` int(11) NOT NULL,
  `bible_verse` varchar(100) NOT NULL,
  `bible_verse_desc` varchar(1000) NOT NULL,
  `totd` varchar(1000) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votd`
--

INSERT INTO `votd` (`id_votd`, `bible_verse`, `bible_verse_desc`, `totd`, `date`) VALUES
(1, 'Jeremiah 29:11', 'For I know the plans I have for you, decclares the Lord, plans to prosper you and not to harm you, plans to give you hope and a future', 'Do not stick only on your own plan, yes we have a good plan for our lives sometimes better but if we have faith with trust to God your plan will become the best.', '2017-08-18'),
(2, '2 Timothy 3:16', 'All Scripture is God-breathed and is useful for teaching, rebuking, correcting and training in righteousness', 'Tells us that ALL Scripture is inspired by God and useful for teaching, rebuking, correcting, and training in righteousness. The Bible is a work of God that was written by human men that were inspired by God. What better source of inspiration than our Creator! Whether you are looking for motivation, encouragement, reassurance, or peace, the Bible should be the first resource you turn to!', '2017-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `wifiacc`
--

CREATE TABLE `wifiacc` (
  `admissionnum` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `payrollnum` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wifiacc`
--

INSERT INTO `wifiacc` (`admissionnum`, `password`, `payrollnum`, `name`, `department`, `section`, `date`, `time`) VALUES
(1, 'wifipass', 9999, 'Joshua Paras', 'Accounting', 'Technical Support Section', '2017-08-23', '08:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `wifi_account`
--

CREATE TABLE `wifi_account` (
  `wifi_count` int(11) NOT NULL,
  `admission_number` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `payroll_number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wifi_account`
--

INSERT INTO `wifi_account` (`wifi_count`, `admission_number`, `password`, `payroll_number`) VALUES
(1, 8912, 'pass', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `wifi_accounts`
--

CREATE TABLE `wifi_accounts` (
  `admission_number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wifi_accounts`
--

INSERT INTO `wifi_accounts` (`admission_number`, `password`) VALUES
('8912', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `wifi_search_logs`
--

CREATE TABLE `wifi_search_logs` (
  `id` int(11) NOT NULL,
  `payroll_number` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `admission_number` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wifi_search_logs`
--

INSERT INTO `wifi_search_logs` (`id`, `payroll_number`, `employee_name`, `department`, `section`, `admission_number`, `date`) VALUES
(1, 9999, 'Joshua Paras', 'Accounting Department', 'Technical Support Section', '8912', '2018-01-31'),
(2, 9999, 'Joshua Paras', 'Accounting Department', 'Technical Support Section', '8912', '2018-02-01'),
(3, 9999, 'Joshua Paras', 'Accounting Department', 'Technical Support Section', '1212', '2018-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_num`);

--
-- Indexes for table `callsreport`
--
ALTER TABLE `callsreport`
  ADD PRIMARY KEY (`callsreport_num`);

--
-- Indexes for table `calls_hardware`
--
ALTER TABLE `calls_hardware`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `calls_others`
--
ALTER TABLE `calls_others`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `calls_report`
--
ALTER TABLE `calls_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls_software`
--
ALTER TABLE `calls_software`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `calls_wifi`
--
ALTER TABLE `calls_wifi`
  ADD PRIMARY KEY (`cw_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_count`),
  ADD UNIQUE KEY `payroll_number` (`payroll_number`);

--
-- Indexes for table `inventory_assignment`
--
ALTER TABLE `inventory_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_avr`
--
ALTER TABLE `inventory_avr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_computer`
--
ALTER TABLE `inventory_computer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_computer_parts`
--
ALTER TABLE `inventory_computer_parts`
  ADD PRIMARY KEY (`inventory_computer_id`);

--
-- Indexes for table `inventory_monitor`
--
ALTER TABLE `inventory_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_os`
--
ALTER TABLE `inventory_os`
  ADD PRIMARY KEY (`inventory_os_id`);

--
-- Indexes for table `inventory_printer`
--
ALTER TABLE `inventory_printer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `phone_locals`
--
ALTER TABLE `phone_locals`
  ADD PRIMARY KEY (`phone_id`);

--
-- Indexes for table `qmt_announcement`
--
ALTER TABLE `qmt_announcement`
  ADD PRIMARY KEY (`id_qmt`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicereport`
--
ALTER TABLE `servicereport`
  ADD PRIMARY KEY (`servicereportnum`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votd`
--
ALTER TABLE `votd`
  ADD PRIMARY KEY (`id_votd`);

--
-- Indexes for table `wifiacc`
--
ALTER TABLE `wifiacc`
  ADD PRIMARY KEY (`admissionnum`);

--
-- Indexes for table `wifi_account`
--
ALTER TABLE `wifi_account`
  ADD PRIMARY KEY (`wifi_count`);

--
-- Indexes for table `wifi_accounts`
--
ALTER TABLE `wifi_accounts`
  ADD UNIQUE KEY `admission_number` (`admission_number`);

--
-- Indexes for table `wifi_search_logs`
--
ALTER TABLE `wifi_search_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `callsreport`
--
ALTER TABLE `callsreport`
  MODIFY `callsreport_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calls_hardware`
--
ALTER TABLE `calls_hardware`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls_others`
--
ALTER TABLE `calls_others`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls_report`
--
ALTER TABLE `calls_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calls_software`
--
ALTER TABLE `calls_software`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls_wifi`
--
ALTER TABLE `calls_wifi`
  MODIFY `cw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_assignment`
--
ALTER TABLE `inventory_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_avr`
--
ALTER TABLE `inventory_avr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_computer`
--
ALTER TABLE `inventory_computer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_computer_parts`
--
ALTER TABLE `inventory_computer_parts`
  MODIFY `inventory_computer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_monitor`
--
ALTER TABLE `inventory_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_os`
--
ALTER TABLE `inventory_os`
  MODIFY `inventory_os_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_printer`
--
ALTER TABLE `inventory_printer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phone_locals`
--
ALTER TABLE `phone_locals`
  MODIFY `phone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qmt_announcement`
--
ALTER TABLE `qmt_announcement`
  MODIFY `id_qmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicereport`
--
ALTER TABLE `servicereport`
  MODIFY `servicereportnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votd`
--
ALTER TABLE `votd`
  MODIFY `id_votd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wifiacc`
--
ALTER TABLE `wifiacc`
  MODIFY `admissionnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wifi_account`
--
ALTER TABLE `wifi_account`
  MODIFY `wifi_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wifi_search_logs`
--
ALTER TABLE `wifi_search_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
