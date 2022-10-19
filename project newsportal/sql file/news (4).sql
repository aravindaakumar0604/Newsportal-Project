-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 09:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(100) NOT NULL,
  `ausername` varchar(250) NOT NULL,
  `apassword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `ausername`, `apassword`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `description`) VALUES
(1, 'Sports', 'All kinds of sports and athletics news\r\n\r\n'),
(11, 'Politics', 'Indian and international political issues'),
(13, 'Business', 'The business affairs of India and the World\r\n\r\n'),
(14, 'Health', 'News about diseases and cure\r\n'),
(15, 'National', 'The news of India\r\n'),
(16, 'International', 'The news of the world'),
(18, 'Science and Technology', 'The news about innovations in science and technology'),
(19, 'Entertainment', 'The news of film and music industry '),
(20, 'Music', 'The musicians and more news\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsid` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `day` date NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `thumbnails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsid`, `title`, `description`, `day`, `category`, `subcategory`, `thumbnails`) VALUES
(18, 'When India won 1983 WC, I knew then that&#039;s what I wanted to do: Sachin', 'Discussing India&#039;s triumph in the 1983 World Cup, Sachin Tendulkar tweeted, &quot;Some moments in life inspire you &amp; make you dream. On this day in 1983, we won the World Cup for the first time.&quot; &quot;I knew right then, that&#039;s what I wanted to do!&quot; added Sachin in his tweet. India beat two-time defending champions West Indies in the final.', '2022-06-25', 'Sports', 'Cricket', '274005-sachin-1983-wc-afp-bcci.webp'),
(19, 'Leave in 14 days: Burkina Faso to civilians ahead of military ops', 'Burkina Faso&#039;s Army has given civilians 14 days to evacuate about 13,000 sq km of area in the country&#039;s northern and southeastern regions ahead of military operations against Islamist insurgents. The military evacuation order comes after an attack on June 11 that killed at least 100 civilians. Burkina Faso has been battling Islamist militants active in the region since 2015.', '2022-06-25', 'International', '--', 'AAYQLWG.jpg'),
(20, 'Rebel Shiv Sena MLA Mangesh Kudalkar&#039;s office vandalised in Mumbai', 'The office of one of the rebel Shiv Sena MLAs, Mangesh Kudalkar, was allegedly vandalised in Mumbai on Friday by party workers amid the ongoing political crisis in Maharashtra. As per reports, Kudalkar is currently staying at a hotel in Assam&#039;s Guwahati along with other Sena MLAs, including Eknath Shinde, who have rebelled against Chief Minister Uddhav Thackeray.', '2022-06-25', 'Politics', '--', 'th.jpg'),
(21, 'Ashish Bhatia and Nandini win Sonu Sood-hosted MTV Roadies 18', 'Ashish Bhatia and Nandini have emerged winners of the Sonu Sood-hosted MTV Roadies 18. Apart from Ashish and Nandini, the other finalists included Kevin Almasifar-Moose Jattana, Yukti Arora-Jaswanth Bopanna and Gaurav Alugh-Simi Talsania. The season of the show was shot in South Africa&#039;s Cape Town. &quot;I cannot describe how amazing this is for me,&quot; Nandini said.', '2022-07-11', 'Entertainment', '--', 'img_1657543669852_236.jpg'),
(22, 'Sidhu Moosewala&#039;s killing shouldn&#039;t be given political colour: Supreme Court', 'The Supreme Court on Monday while hearing pleas linked to singer Sidhu Moosewala&#039;s killing, said, &quot;Our request is that such matters should not be connected politically.&quot; The bench said, &quot;We don&#039;t appreciate this. This court has to work openly for all the people. But it should not be given any political colour.&quot; It dismissed a plea seeking a CBI probe.', '2022-07-11', 'Politics', '--', 'img_1657545665003_968.jpg'),
(23, 'Rupee closes at new all-time low of 79.44 against US dollar', 'The rupee ended at a new all-time low of nearly 79.44 per US dollar on Monday. The currency on Monday opened at 79.30 against the US dollar and witnessed an intra-day high of 79.24 and a low of 79.49. Meanwhile, BSE Sensex ended 86.61 points lower at 54,395.23, while NSE Nifty declined 4.60 points on Monday.', '2022-07-11', 'Business', '--', 'img_1657537277607_805.jpg'),
(24, 'Vijay Mallya sentenced to 4 months in jail, fined ₹2,000 in 2017 contempt case by SC', 'The Supreme Court has sentenced fugitive businessman Vijay Mallya to four months in jail and imposed a fine of ₹2,000 on him after he was found guilty of contempt of court in 2017 for withholding information from the court. The court also reportedly ordered Mallya&#039;s family members to return $40 million transferred to them in violation of the court orders.', '2022-07-11', 'Business', '--', 'img_1657517261955_761.jpg'),
(25, 'Fabulous innings, shame it came in a losing cause: Giles on Suryakumar&#039;s 117', 'Ex-England spinner Ashley Giles called India batter Suryakumar Yadav&#039;s 55-ball 117 in the third T20I against England &quot;fabulous&quot;. He added, &quot;Just a shame it came in a losing cause.&quot; India lost by 17 runs. He further said that Suryakumar played classy innings under pressure after India were reduced to 31/3. He hit 14 fours and six sixes during his knock.', '2022-07-11', 'Sports', 'Cricket', 'img_1657545731307_724.jpg'),
(26, 'Djokovic is a bit of God, I&#039;m not gonna lie: Kyrgios after Wimbledon final', 'After suffering defeat in the Wimbledon final against Novak Djokovic, Australian tennis player Nick Kyrgios said the seven-time Wimbledon champion is a &quot;bit of God&quot;. He added, &quot;I played a Slam final against one of the greatest of all time...It was a hell of an occasion.&quot; Djokovic won the match 4-6, 6-3, 6-4, 7-6(7-3) in three hours.', '2022-07-11', 'Sports', '--', 'img_1657516057013_633.jpg'),
(27, 'China&#039;s Shanghai identifies new Omicron subvariant BA.5.2.1', 'A new subvariant of the COVID-19 Omicron virus has been found in China&#039;s Shanghai, a city official said on Sunday. Authorities identified an Omicron BA.5.2.1 case in the financial district of Pudong on July 8, Vice-Director of Shanghai&#039;s Health Commission Zhao Dandan said as per Reuters. It is linked to a case from overseas, Dandan has said.', '2022-07-11', 'Health', 'New Diseases', 'img_1657471940104_526.jpg'),
(28, '&#039;Don&#039;t talk to govt, be unresponsive,&#039; Uber Asia Head told India team: Leaked email', 'Uber&#039;s then Asia Head Allen Penn told its Indian team in August 2014 to not &quot;talk to government or folks close to the government&quot; about any regulatory issues that Uber faces in India. &quot;We&#039;ll generally stall, be unresponsive and often say no to what they want,&quot; Penn told the Indian team, as per leaked emails accessed by the Indian Express.', '2022-07-11', 'Science and Technology', '--', 'img_1657477904392_479.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(100) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `category_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Cricket', 1),
(7, 'Football', 1),
(8, 'Elections', 11),
(9, 'New Diseases', 14),
(10, 'research journals', 18),
(11, 'Hollywood', 19);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `username`, `password`) VALUES
('19BC4000', 'Student', 'Student', 'Student123', 'student'),
('19BC4010', 'Aravinda', 'Akumar', 'aravinda', 'aravinda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
