-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table repo_db.staff_db
CREATE TABLE IF NOT EXISTS `staff_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `staff_no` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `images` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table repo_db.staff_db: ~1 rows (approximately)
/*!40000 ALTER TABLE `staff_db` DISABLE KEYS */;
INSERT INTO `staff_db` (`id`, `fullname`, `staff_no`, `designation`, `password`, `faculty`, `department`, `images`) VALUES
	(1, 'bolo lo', '123456781', 'senior lecturer', '$2y$10$yMSApe76sZ0doIzwgxDdleVH1JppTkK5LesfD.MzxAXCGxyF/rlZa', 'Sciences', 'computer science', NULL);
/*!40000 ALTER TABLE `staff_db` ENABLE KEYS */;

-- Dumping structure for table repo_db.student_db
CREATE TABLE IF NOT EXISTS `student_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(250) NOT NULL,
  `matric_no` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table repo_db.student_db: ~5 rows (approximately)
/*!40000 ALTER TABLE `student_db` DISABLE KEYS */;
INSERT INTO `student_db` (`id`, `fullname`, `matric_no`, `level`, `password`, `faculty`, `department`) VALUES
	(3, 'Owoseni Ayobami', '170404082', '400', '71b2d944eb038d3e232f98e316a65c17', NULL, NULL),
	(4, 'isaac jude', '1345032', '200', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
	(5, 'dey joke', '13456', '200', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
	(6, 'layi wasabi', '170404080', '100', '$2y$10$vqJirmc1KXqf1HUwpAguK.aqI.B1qZMxcWXZ3qwPDEyIUfdwAXhzO', NULL, NULL),
	(7, 'Akinpelumi Uche', '170404086', '400', '$2y$10$JZAzudvDV8zpRJcYGi5Id.EDdEP39g90vPIxhKWyfC36TW.gd2.D2', NULL, NULL);
/*!40000 ALTER TABLE `student_db` ENABLE KEYS */;

-- Dumping structure for table repo_db.uploads
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pro_title` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `authur` varchar(255) NOT NULL,
  `material` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table repo_db.uploads: ~17 rows (approximately)
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` (`id`, `pro_title`, `faculty`, `department`, `authur`, `material`) VALUES
	(18, 'polytechnic status nigga', 'Environmental Design', 'agric extension', 'oladapo victor', '../upload_file/polytechnic status nigga.docx'),
	(19, 'Design and implementation of net-centric computing device', 'Environmental Design', 'agric extension', 'dunkein gejl', '../upload_file/Design and implementation of net-centric computing device.docx'),
	(20, 'phase two developmernt', 'Law', 'computer science', 'Owoseni Ayobami', '../upload_file/materials/phase two developmernt.pdf'),
	(21, 'Design and implementation of net-centric computing device', 'Education', 'agric extension', 'bill', '../upload_fileDesign and implementation of net-centric computing device.pdf'),
	(22, 'Design and implementation of net-centric computing device', 'Arts', 'computer science edu', 'oladapo victor', '../upload_fileDesign and implementation of net-centric computing device.doc'),
	(24, 'Design and implementation of net-centric computing device', 'Arts', 'computer science', 'billy graham', '../upload_fileDesign and implementation of net-centric computing device.pdf'),
	(27, 'polytechnic status nigga', 'Law', 'psb', 'bill', '../upload_filepolytechnic status nigga.docx'),
	(28, 'polytechnic status nigga', 'Law', 'computer science edu', 'oladapo victor', '../upload_filepolytechnic status nigga.pdf'),
	(29, 'polytechnic status nigga', 'Management Science', 'computer science edu', 'Owoseni Ayobami', '../upload_filepolytechnic status nigga.pdf'),
	(30, 'Stephen\'s project', 'Sciences', 'computer science', 'oladapo victor', '../upload_fileStephen\'s project.pdf'),
	(31, 'phase two developmernt', 'Law', 'psb', 'bill', '../upload_filephase two developmernt.pdf'),
	(32, 'polytechnic status nigga', 'Arts', 'agric extension', 'bill', '../upload_filepolytechnic status nigga.pdf'),
	(33, 'Design and implementation of net-centric computing device', 'Arts', 'agric extension', 'billy graham', '../upload_fileDesign and implementation of net-centric computing device.pdf'),
	(34, 'phase two developmernt', 'Arts', 'agric extension', 'billy graham', '../upload_filephase two developmernt.pdf'),
	(35, 'phase two developmernt', 'Arts', 'agric extension', 'billy graham', '../upload_filephase two developmernt.pdf'),
	(36, 'smart attendance management using face recognition', 'Environmental Design', 'computer science', 'bill', '../upload_filesmart attendance management using face recognition.pdf'),
	(39, 'Stephen\'s project', 'Law', 'computer science', 'oladapo victor', '../upload_fileStephen\'s project.pdf');
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
