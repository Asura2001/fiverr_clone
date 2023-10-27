-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 07:31 AM
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
-- Database: `fiver_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Bilal Munir', 'bilalmunir23@gmail.com', 'Bilalmunir23', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `sub_category`) VALUES
(1, 'Logo & Brand Identity', 'Logo Design'),
(2, 'Logo & Brand Identity', 'Brand Style Guides'),
(3, 'Logo & Brand Identity', 'Business Cards & Stationery'),
(4, 'Art & Illustrations', 'Illustrations'),
(5, 'Art & Illustrations', 'AI Artists'),
(6, 'Art & Illustrations', 'Children\'s Book Illustrations'),
(7, 'Web & App Design', 'Website Design'),
(8, 'Web & App Design', 'App Design'),
(9, 'Web & App Design', 'UX Design'),
(10, 'Product & Gaming', 'Industrial & Product Design'),
(11, 'Product & Gaming', 'Character Modelling'),
(12, 'Product & Gaming', 'Game Art'),
(13, 'Visual Design', 'Image Editing'),
(14, 'Visual Design', 'Presentation Design'),
(15, 'Visual Design', 'Background Removal'),
(16, 'Marketting Design', 'Social Media Design'),
(17, 'Marketting Design', 'Social Posts & Banners'),
(18, 'Marketting Design', 'Email Design'),
(19, 'Architecture & Building Design', 'Architecture & Building Design'),
(20, 'Architecture & Building Design', 'Landscape Design'),
(21, 'Architecture & Building Design', 'Building Engineering'),
(22, 'Fashion & Merchandise', 'T-shirt & Merchandise'),
(23, 'Fashion & Merchandise', 'Fashion Design'),
(24, 'Fashion & Merchandise', 'Jewelry Design'),
(25, '3D Design', '3D Architecture'),
(26, '3D Design', '3D landscape'),
(27, '3D Design', '3D Industrial Design'),
(28, 'Website Development', 'Business Websites'),
(29, 'Website Development', 'E-Commerce Development'),
(30, 'Website Platform', 'WordPress'),
(31, 'Website Platform', 'Shopify'),
(32, 'Software Development', 'Web Applications'),
(33, 'Software Development', 'Desktop Applications'),
(34, 'Mobile App Development', 'Android Developers'),
(35, 'Mobile App Development', 'iOS Developers'),
(36, 'Game Development', 'PC Games'),
(37, 'Game Development', 'Mobile Games'),
(38, 'AI Developments', 'AI Integrations'),
(39, 'AI Developments', 'AI Websites'),
(40, 'Chatbot', 'Discord Chatbot'),
(41, 'Chatbot', 'Telegram Chatbot'),
(42, 'Miscellaneous', 'Electronic Engineering'),
(43, 'Miscellaneous', 'Crowd Funding'),
(44, 'Editing & Post-Production', 'Video Editing'),
(45, 'Editing & Post-Production', 'Visual Effects'),
(46, 'Animation', 'Logo Design'),
(47, 'Animation', 'Character Animation'),
(48, 'Filmed Video Production', 'Videographers'),
(49, 'Filmed Video Production', 'Filmed Video Production'),
(50, 'Explainer Videos', 'Animated Explainers'),
(51, 'Explainer Videos', 'Live Action Explainers'),
(52, 'Content Writing', 'Articles & Blog Posts'),
(53, 'Content Writing', 'Content Strategy'),
(54, 'Editing & Critique', 'Proofreading & Editing'),
(55, 'Editing & Critique', 'AI Content Editing'),
(56, 'Business & Marketing Copy', 'Brand Voice & Tone'),
(57, 'Business & Marketing Copy', 'Case Studies'),
(58, 'Translation & Transcription', 'Translation'),
(59, 'Translation & Transcription', 'Transcription'),
(60, 'Music Production & Writing', 'Producers & Composers'),
(61, 'Music Production & Writing', 'Beat Making'),
(62, 'Voice Over & Narration', 'Voice Over'),
(63, 'Voice Over & Narration', 'Female Voice Over'),
(64, 'Audio Engineering & Post Production', 'Mixing & Mastering'),
(65, 'Audio Engineering & Post Production', 'Audio Editing'),
(66, 'Streaming & Audio', 'Podcast Production'),
(67, 'Streaming & Audio', 'Audiobook Production'),
(68, 'DJing', 'DJ Drops & Tags'),
(69, 'DJing', 'DJ Mixing'),
(70, 'Sound & Design', 'Sound Design'),
(71, 'Sound & Design', 'Synth Presents'),
(72, 'Lessons & Transcriptions', 'Online Music Lessons'),
(73, 'Lessons & Transcriptions', 'Music Transcriptions'),
(74, 'Business Formation', 'Business Registration'),
(75, 'Business Formation', 'Business Plans'),
(76, 'Business Growth', 'Business Consulting'),
(77, 'Business Growth', 'Market Research'),
(78, 'General & Administrative', 'Virtual Assistant'),
(79, 'General & Administrative', 'HR Consulting'),
(80, 'Legal Services', 'Legal Documents & Contracts'),
(81, 'Legal Services', 'Legal Consulting'),
(82, 'Sales & Customer Care', 'Sales'),
(83, 'Sales & Customer Care', 'Lead Generation'),
(84, 'Professional Development', 'Interview Prep'),
(85, 'Professional Development', 'Life Coaching'),
(86, 'Accounting & Finance', 'Tax Consulting'),
(87, 'Accounting & Finance', 'Accounting & Bookkeeping'),
(88, 'Data Storage', 'NLP'),
(89, 'Data Storage', 'Deep Learning'),
(90, 'Data Collection', 'Data Entry'),
(91, 'Data Collection', 'Data Annotation'),
(92, 'Data Analysis', 'Data Analysis'),
(93, 'Data Analysis', 'Dashboards'),
(94, 'Data Management', 'Data Processing'),
(95, 'Data Management', 'Databases'),
(96, 'Products & Lifestyle', 'Product Photographers'),
(97, 'Products & Lifestyle', 'Food Photographers'),
(98, 'Local Photography', 'All Cities'),
(99, 'Local Photography', 'Photographs in Paris'),
(100, 'People & Scenes', 'Portrait Photographers'),
(101, 'People & Scenes', 'Event Photographers'),
(102, 'Build your AI app', 'AI Applications'),
(103, 'Build your AI app', 'AI Websites'),
(104, 'Refine AI with experts', 'Photo Manipulation'),
(105, 'Refine AI with experts', 'Fact Checking'),
(106, 'AI Artists', 'Midjourney Artists'),
(107, 'AI Artists', 'DALL-E Artists'),
(108, 'Get your data right', 'Data Annotation'),
(109, 'Get your data right', 'Data Analysis'),
(110, 'Creative services', 'AI Video Art'),
(111, 'Creative services', 'AI Music Videos');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `certified` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `user_id`, `certificate`, `certified`, `year`) VALUES
(1, 1, 'Award for exceptional skills', 'Tech Step, Sahiwal', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `country`, `education`, `title`, `major`, `year`) VALUES
(1, 1, 'Pakistan', 'Govt. College, Sahiwal', 'Associate', 'Mathematics', 'Graduated 2020'),
(2, 1, 'Pakistan', 'Boys College, Sahiwal', 'Other', 'Finance', 'Graduated 2023');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `user_id`, `gig_id`, `question`, `answer`) VALUES
(1, 1, 1, 'Do you Translate from English?', 'Yes, I do translate from English.'),
(2, 1, 2, 'Do you Translate to English?', 'Yes, I do translate to English.');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `document1` varchar(255) NOT NULL,
  `document2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `gig_id`, `image1`, `image2`, `image3`, `video`, `document1`, `document2`) VALUES
(1, 1, 1, 'screencapture-localhost-Daraz-admin-index-php-2023-09-08-03_58_53.png', 'screencapture-localhost-Daraz-customer-index-php-2023-09-16-10_27_24.png', 'screencapture-localhost-Daraz-seller-login-php-2023-09-08-03_59_10.png', 'daraz_video - Made with Clipchamp.mp4', 'Acc_Maint_Cert_11-07-2023T17_28_29.pdf', 'Acc_Maint_Cert_11-07-2023T18_07_09.pdf'),
(2, 1, 2, 'business logo design-fiverr guide.webp', '', '', '', '', ''),
(3, 1, 3, 'ecommerce.webp', '', '', '', '', ''),
(4, 1, 4, 'growwithAI.webp', '', '', '', '', ''),
(5, 1, 5, 'productphotography.webp', '', '', '', '', ''),
(6, 1, 6, 'Howtobuildawebsitefromscratch.webp', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `taxation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`id`, `user_id`, `title`, `category`, `sub_category`, `description`, `taxation`) VALUES
(1, 1, 'I will make you a website from scratch', 'Software Development', 'Website Development', '<p>I can make you want a website that looks professional. I can also include as many functionalities as you need it to have as long as it does not exceed the number of functionalities I offer. I can make it responsive. I can also add a stripe payment method.</p>', 'no'),
(2, 1, 'I will design you a business logo', 'Software Development', 'Graphic Designing', 'I can edit for you images as per your need.\r\nI can design images for your website.\r\nI can retouch the image templates you already have.', 'no'),
(3, 1, 'I will build you an ecommerce website', 'Software Development', 'Website Development', 'I can make you an ecommerce website.\r\nIt can contain up to 4 plugins.\r\nIt can support up to 30 products.', 'no'),
(4, 1, 'I will make you an AI', 'Programming', 'Software Development', '', 'no'),
(5, 1, 'I will do product photography for you', 'Art', 'Photography', '', 'no'),
(6, 1, 'I will build you a website', 'Software Development', 'Website Development', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `user_id`, `language`, `level`) VALUES
(1, 1, 'Urdu', 'Native/Bilingual'),
(2, 1, 'English', 'Native/Bilingual');

-- --------------------------------------------------------

--
-- Table structure for table `optional_requirements`
--

CREATE TABLE `optional_requirements` (
  `id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `alt_id` int(255) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `question3` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `optional_requirements`
--

INSERT INTO `optional_requirements` (`id`, `gig_id`, `alt_id`, `question1`, `question2`, `question3`, `answer1`, `answer2`, `answer3`) VALUES
(1, 1, 1, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', 'Personal', 'IT', 'No'),
(2, 2, 0, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', '', '', ''),
(3, 3, 0, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', '', '', ''),
(4, 4, 0, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', '', '', ''),
(5, 5, 0, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', '', '', ''),
(6, 6, 0, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', '', '', ''),
(7, 1, 2, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', 'Personal', 'IT', 'No'),
(8, 1, 0, 'Is this order for personal use, business use, or a side project?', 'Which industry do you work in?', 'Is this order part of a bigger project you\'re working on?', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `dated` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `gig_id`, `package_type`, `quantity`, `price`, `status`, `dated`, `file`) VALUES
(1, 1, 1, 'basic', '1', '80', 'Completed', '2023-10-13 01:17:14', 'Annexure.docx'),
(2, 1, 2, 'standard', '2', '100', 'Paid', '2023-10-13 01:17:14', ''),
(3, 1, 5, 'premium', '3', '100', 'Paid', '2023-10-13 01:17:14', ''),
(4, 1, 4, 'standard', '2', '150', 'Paid', '2023-10-13 01:17:14', ''),
(5, 2, 1, 'basic', '1', '80', 'Paid', '2023-10-13 01:17:14', ''),
(6, 1, 3, 'premium', '1', '150', 'Unpaid', '2023-10-16 05:52:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_placed`
--

CREATE TABLE `orders_placed` (
  `id` int(255) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `card_exp_month` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_placed`
--

INSERT INTO `orders_placed` (`id`, `name`, `email`, `card_number`, `card_exp_month`, `card_exp_year`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(1, 'Bilal', 'bilalmunir23@gmail.com', 4242424242424242, '02', '24', 'I will make you a website from scratch', '', 8000.00, 'usd', '8000', 'usd', 'txn_3O0MTMFw9Yr1tkF717LwHB4R', 'succeeded', '2023-10-12 12:50:32', '2023-10-12 12:50:32'),
(2, 'Bilal', 'bilalmunir23@gmail.com', 4242424242424242, '01', '25', 'I will design you a business logo', '', 20000.00, 'usd', '20000', 'usd', 'txn_3O0NkmFw9Yr1tkF71GuIXQOr', 'succeeded', '2023-10-12 14:12:36', '2023-10-12 14:12:36'),
(3, 'Bilal', 'bilalmunir23@gmail.com', 4242424242424242, '02', '26', 'I will do product photography for you', '', 30000.00, 'usd', '30000', 'usd', 'txn_3O0NoyFw9Yr1tkF71EbaHtAp', 'succeeded', '2023-10-12 14:16:56', '2023-10-12 14:16:56'),
(4, 'Usama', 'usamamunir23@gmail.com', 4000056655665556, '02', '24', 'I will make you a website from scratch', '', 8000.00, 'usd', '8000', 'usd', 'txn_3O0O74Fw9Yr1tkF70okCSegI', 'succeeded', '2023-10-12 14:35:38', '2023-10-12 14:35:38'),
(5, 'Bilal', 'bilalmunir23@gmail.com', 4242424242424242, '01', '24', 'I will make you an AI', '', 30000.00, 'usd', '30000', 'usd', 'txn_3O0kZpFw9Yr1tkF71RTvKCOS', 'succeeded', '2023-10-13 14:34:49', '2023-10-13 14:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `price1`
--

CREATE TABLE `price1` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `details1` varchar(255) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `functional1` varchar(255) NOT NULL,
  `pages1` varchar(255) NOT NULL,
  `revisions1` varchar(255) NOT NULL,
  `responsive1` varchar(255) NOT NULL,
  `content1` varchar(255) NOT NULL,
  `plugins1` varchar(255) NOT NULL,
  `ecommerce1` varchar(255) NOT NULL,
  `products1` varchar(255) NOT NULL,
  `payment_processing1` varchar(255) NOT NULL,
  `in_form1` varchar(255) NOT NULL,
  `auto_responder1` varchar(255) NOT NULL,
  `speed1` varchar(255) NOT NULL,
  `hosting1` varchar(255) NOT NULL,
  `icons1` varchar(255) NOT NULL,
  `price1` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL DEFAULT 'basic'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price1`
--

INSERT INTO `price1` (`id`, `user_id`, `gig_id`, `name1`, `details1`, `time1`, `functional1`, `pages1`, `revisions1`, `responsive1`, `content1`, `plugins1`, `ecommerce1`, `products1`, `payment_processing1`, `in_form1`, `auto_responder1`, `speed1`, `hosting1`, `icons1`, `price1`, `package_type`) VALUES
(1, 1, 1, 'Basic', 'This is a basic package', '30 DAY DELIVERY', 'yes', '4', '0', '', '', '1', '', '1', '', '', 'yes', 'yes', '', '', '80', 'basic'),
(2, 1, 2, 'Basic', 'This is a basic package', '10 DAY DELIVERY', 'yes', '', '', '', '', '', '', '10', '', '', '', '', '', '', '80', 'basic'),
(3, 1, 3, 'Basic', 'This is a basic package', '45 DAY DELIVERY', 'yes', '3', '0', '', 'yes', '1', 'yes', '10', '', '', '', '', '', '', '100', 'basic'),
(4, 1, 4, 'Basic', 'This is a basic package', '21 DAY DELIVERY', 'yes', '3', '', '', '', '', '', '', '', '', '', '', '', '', '100', 'basic'),
(5, 1, 5, 'Basic', 'This is a basic package', '7 DAY DELIVERY', 'yes', '', '', '', '', '', '', '6', '', '', '', '', '', '', '80', 'basic'),
(6, 1, 6, 'Basic', 'This is a basic package', '30 DAY DELIVERY', 'yes', '3', '0', '', '', '', '', '', '', '', '', 'yes', '', '', '100', 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `price2`
--

CREATE TABLE `price2` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  `details2` varchar(255) NOT NULL,
  `time2` varchar(255) NOT NULL,
  `functional2` varchar(255) NOT NULL,
  `pages2` varchar(255) NOT NULL,
  `revisions2` varchar(255) NOT NULL,
  `responsive2` varchar(255) NOT NULL,
  `content2` varchar(255) NOT NULL,
  `plugins2` varchar(255) NOT NULL,
  `ecommerce2` varchar(255) NOT NULL,
  `products2` varchar(255) NOT NULL,
  `payment_processing2` varchar(255) NOT NULL,
  `in_form2` varchar(255) NOT NULL,
  `auto_responder2` varchar(255) NOT NULL,
  `speed2` varchar(255) NOT NULL,
  `hosting2` varchar(255) NOT NULL,
  `icons2` varchar(255) NOT NULL,
  `price2` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL DEFAULT 'standard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price2`
--

INSERT INTO `price2` (`id`, `user_id`, `gig_id`, `name2`, `details2`, `time2`, `functional2`, `pages2`, `revisions2`, `responsive2`, `content2`, `plugins2`, `ecommerce2`, `products2`, `payment_processing2`, `in_form2`, `auto_responder2`, `speed2`, `hosting2`, `icons2`, `price2`, `package_type`) VALUES
(1, 1, 1, 'Standard', 'This is a standard package', '21 DAY DELIVERY', 'yes', '5', '0', 'yes', '', '1', '', '1', '', 'yes', 'yes', 'yes', 'yes', '', '100', 'standard'),
(2, 1, 2, 'Standard', 'This is a standard package', '7 DAY DELIVERY', 'yes', '', '', '', '', '', '', '15', '', '', '', '', '', '', '100', 'standard'),
(3, 1, 3, 'Standard', 'This is a standard package', '30 DAY DELIVERY', 'yes', '5', '0', 'yes', 'yes', '2', 'yes', '20', '', 'yes', '', 'yes', 'yes', '', '120', 'standard'),
(4, 1, 4, 'Standard', 'This is a standard package', '10 DAY DELIVERY', 'yes', '4', '', 'yes', '', '', '', '', '', '', '', '', '', '', '150', 'standard'),
(5, 1, 5, 'Standard', 'This is a standard package', '4 DAY DELIVERY', 'yes', '', '', '', '', '', '', '10', '', '', '', '', '', '', '90', 'standard'),
(6, 1, 6, 'Standard', 'This is a standard package', '21 DAY DELIVERY', 'yes', '5', '0', 'yes', '', '', '', '', '', '', '', 'yes', '', '', '200', 'standard');

-- --------------------------------------------------------

--
-- Table structure for table `price3`
--

CREATE TABLE `price3` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `name3` varchar(255) NOT NULL,
  `details3` varchar(255) NOT NULL,
  `time3` varchar(255) NOT NULL,
  `functional3` varchar(255) NOT NULL,
  `pages3` varchar(255) NOT NULL,
  `revisions3` varchar(255) NOT NULL,
  `responsive3` varchar(255) NOT NULL,
  `content3` varchar(255) NOT NULL,
  `plugins3` varchar(255) NOT NULL,
  `ecommerce3` varchar(255) NOT NULL,
  `products3` varchar(255) NOT NULL,
  `payment_processing3` varchar(255) NOT NULL,
  `in_form3` varchar(255) NOT NULL,
  `auto_responder3` varchar(255) NOT NULL,
  `speed3` varchar(255) NOT NULL,
  `hosting3` varchar(255) NOT NULL,
  `icons3` varchar(255) NOT NULL,
  `price3` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL DEFAULT 'premium'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price3`
--

INSERT INTO `price3` (`id`, `user_id`, `gig_id`, `name3`, `details3`, `time3`, `functional3`, `pages3`, `revisions3`, `responsive3`, `content3`, `plugins3`, `ecommerce3`, `products3`, `payment_processing3`, `in_form3`, `auto_responder3`, `speed3`, `hosting3`, `icons3`, `price3`, `package_type`) VALUES
(1, 1, 1, 'Premium', 'This is a premium package', '14 DAY DELIVERY', 'yes', '8', '2', 'yes', 'yes', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '120', 'premium'),
(2, 1, 2, 'Premium', 'This is a premium package', '5 DAY DELIVERY', 'yes', '', '', '', '', '', '', '30', '', '', '', '', '', '', '120', 'premium'),
(3, 1, 3, 'Premium', 'This is a premium package', '21 DAY DELIVERY', 'yes', '8', '3', 'yes', 'yes', '4', 'yes', '30', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '150', 'premium'),
(4, 1, 4, 'Premium', 'This is a premium package', '7 DAY DELIVERY', 'yes', '8', '', 'yes', '', '', '', '', '', '', '', '', '', '', '200', 'premium'),
(5, 1, 5, 'Premium', 'This is a premium package', '2 DAY DELIVERY', 'yes', '', '', '', '', '', '', '20', '', '', '', '', '', '', '100', 'premium'),
(6, 1, 6, 'Premium', 'This is a premium package', '14 DAY DELIVERY', 'yes', '10', '2', 'yes', 'yes', '', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '', '', '300', 'premium');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `gig_id`, `customer_id`, `rating`) VALUES
(4, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(255) NOT NULL,
  `gig_id` int(255) NOT NULL,
  `alt_id` varchar(255) NOT NULL DEFAULT 'none',
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `gig_id`, `alt_id`, `question`, `answer`) VALUES
(3, 4, '0', 'Provide me the guidelines of your website.', NULL),
(4, 1, '1', 'Provide me the guidelines of your website.', 'Make it look nice'),
(5, 1, '1', 'What dimensions do you want your website to be?', 'The normal dimensions'),
(6, 1, '2', 'Provide me the guidelines of your website.', 'Make it look nice'),
(7, 1, '2', 'What dimensions do you want your website to be?', 'The normal dimensions'),
(8, 1, '0', 'Provide me the guidelines of your website.', NULL),
(9, 1, '0', 'What dimensions do you want your website to be?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller_register`
--

CREATE TABLE `seller_register` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_register`
--

INSERT INTO `seller_register` (`id`, `user_id`, `lname`, `occupation`, `phone`) VALUES
(1, 1, 'Munir', 'Web Developer', '11111111111');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill`, `level`) VALUES
(1, 1, 'HTML', 'Expert'),
(2, 1, 'CSS', 'Expert'),
(3, 1, 'Javascript', 'Intermediate');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `fname`, `email`, `password`, `image`, `d_name`, `title`, `description`) VALUES
(1, 'Bilal', 'bilalmunir23@gmail.com', 'Bilalmunir23', 'default1.png', 'Bilal M', 'I am a full-stack developer', 'I can make full stack websites in a short time'),
(2, 'Usama', 'usamamunir23@gmail.com', 'Usama235', '', '', '', ''),
(9, 'Kusuragi', 'dragonanimator4@gmail.com', NULL, '', '', '', ''),
(11, 'Bilal', 'bilalmunir232001@gmail.com', NULL, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optional_requirements`
--
ALTER TABLE `optional_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_placed`
--
ALTER TABLE `orders_placed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price1`
--
ALTER TABLE `price1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price2`
--
ALTER TABLE `price2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price3`
--
ALTER TABLE `price3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_register`
--
ALTER TABLE `seller_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `optional_requirements`
--
ALTER TABLE `optional_requirements`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_placed`
--
ALTER TABLE `orders_placed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `price1`
--
ALTER TABLE `price1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `price2`
--
ALTER TABLE `price2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `price3`
--
ALTER TABLE `price3`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seller_register`
--
ALTER TABLE `seller_register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
