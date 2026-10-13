-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 11:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alula`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ID`, `title`, `description`, `image`, `categoryID`) VALUES
(8, 'Tour of the Stone', 'A tour of Hegra, the first UNESCO World Heritage Site in Saudi Arabia, where we discover the tombs and archaeological remains of the Nabataean civilization.\r\n\r\nPrice : Starting from 95 SAR per person\r\n\r\n', 'https://s7g10.scene7.com/is/image/rcu/hegra-day-tour-things-to-do-card-05?$Responsive$', 2),
(9, 'Stargazing in Sharaan', 'Stargaze at Sharaan Nature Reserve, where the night sky holds the most wonderful tales and secrets about nature, history, and the universe. \r\n\r\nPrice : Starting from 350 SAR', 'https://s7g10.scene7.com/is/image/rcu/stargazing-at-sharaan-card-600x900-01?$Responsive$', 2),
(10, 'Paragliding Experience', 'Enjoy a unique experience as you soar above the towering mountains of AlUla, enjoying breathtaking views from above. This experience is ideal for adventure seekers who want to explore AlUla from a new perspective.price:400 sar per person', 'uploads/paragliding.jpg', 2),
(11, 'Desert Bike Tour', 'Enjoy an organized bike tour along fun and safe desert roads. This experience allows you to explore AlUla\'s stunning landscape, while taking in the beauty of the sandy mountains and the fresh air.\r\nprice:50 SAR for an hour', 'uploads/quad_bike_tour.jpg', 2),
(14, 'Maraya Hall Visit', 'Maraya is a modern architectural marvel nestled amidst the enchanting nature of AlUla. According to the Guinness Book of World Records, it is the largest mirror-covered building in the world. The building reflects the stunning desert terrain of AlUla, appearing as if it were part of the surrounding mountains.\r\nYou can book a ticket per person Adults: SAR 95\r\nChildren (5-12 years old): SAR 45\r\nThrough: TicketMX or Ticket.com.sa\r\n', 'uploads/maraya.webp', 2),
(15, 'Visit Elephant Rock (Jabal AlFil)', 'Visit the iconic Elephant Rock, a natural sandstone formation resembling an elephant. It\'s a popular spot for sunset views and outdoor gatherings.\r\nPrice: Free entry; no reservation required.', 'uploads/elephant_rock.jpg', 2),
(16, 'Walking through AlUla Old Town', 'A labyrinth of mudbrick houses dating back to the 12th century, AlUla Old Town offers a glimpse into the region\'s rich history. Visitors can explore ancient dwellings, mosques, and a bustling market.\r\nPrice: From SAR 70 per person.', 'uploads/alula_old_town.jpg', 2),
(17, 'Guided Tour of Jabal Ikmah', 'Guided Tour of Jabal Ikmah, known as the \"Open-Air Library\" due to its numerous inscriptions and writings on rock faces offering insights into the region\'s past civilizations.\r\nPrice: From SAR 60 per adult; SAR 30 for children aged 5–12', 'uploads/jabal_ikmah.webp', 2),
(18, 'Tour of Dadan ', 'Explore the ancient cities of Dadan and Jabal Ikmah in a vintage Land Rover, examining tombs, excavation sites, and thousands of early Arabic inscriptions.\r\nPrice: From SAR 700 per vehicle (up to 7 people).\r\nAdvanced booking required.', 'uploads/dadan_tour.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(1, 'Upcoming Events'),
(2, 'Festivals'),
(3, 'Exhibitions');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `event_type` enum('Upcoming Events','Festivals','Exhibitions') NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `title`, `description`, `image`, `event_type`, `categoryID`) VALUES
(4, 'Summer in AlUla', 'AlUla boasts mild summer evenings and low humidity, making it an ideal summer destination in the Arabian Peninsula.\r\n\r\n\r\nDate : From May 1 to August 31, 2025', 'https://s7g10.scene7.com/is/image/rcu/habitas-alula-tanveer-badal-pool-card-600x900?$Responsive$', 'Upcoming Events', 1),
(7, 'Athar Exhibition', 'Explore the finest contemporary Arab art at Athr Gallery, where inspiration stems from the past to embody the present.\r\n\r\nDuration : 30 to 45 minutes', 'https://s7g10.scene7.com/is/image/rcu/alamaat-exhibition-card-600x900?$Responsive$', 'Exhibitions', 1),
(10, 'Desert X AlUla', 'Desert X AlUla\r\nDesert X AlUla, now in its third edition, will feature contemporary artworks by Saudi and international artists, strategically placed within the extraordinary desert landscape. This site-responsive exhibition, open to all, encourages exchange between artists, curators, and local communities, drawing inspiration from the desert\'s vast beauty. Date Duration: Held annually during winter (dates to be announced)', 'uploads/desert_x_alula.jpg', 'Exhibitions', 1),
(11, 'AlUla Desert Polo 2025', 'Experience the world\'s first desert polo tournament, where elite players like Adolfo Cambiaso and his children, Poroto and Mia, compete amidst AlUla\'s stunning landscapes. The event features six teams, including AlUla, Richard Mille, Bentley, Budget SA, Dadan, and Ikmah, vying for the prestigious Desert Polo trophy. \r\nDates: june 17–18,2025', 'uploads/desert_polo.jpg', 'Upcoming Events', 1),
(12, 'AlUla Skies Festival 2025', 'Celebrate the skies with a festival that offers hot-air balloon flights, stargazing experiences, and the mesmerizing Balloon Glow Show. During the day, soar above AlUla\'s breathtaking scenery in hot-air balloons, and at night, witness the desert illuminated by glowing balloons. The festival also includes live concerts, cultural activations, and family-friendly experiences\r\nDates: April 18–27, 2025', 'uploads/alula_skies_festival.jpg', 'Festivals', 1),
(13, 'AlUla Wellness event 2025', 'Embark on a transformative journey at the AlUla Wellness event, designed to rejuvenate mind, body, and soul. The festival features celebrity-led workshops, immersive retreats, and unique experiences like the Five Senses Sanctuary. Attendees can participate in yoga sessions, meditation retreats, and desert sound healing, all set against the serene backdrop of AlUla\'s natural\r\nDates: October 17 – November 2, 2025\r\n', 'uploads/wellness_yoga.jpg', 'Upcoming Events', 1),
(14, 'Winter at Tantora ', 'Winter at Tantora is AlUla’s flagship cultural festival, celebrating the region’s rich heritage through a blend of music, art, gastronomy, and historical experiences. Named after the traditional sundial in AlUla\'s Old Town, the festival offers immersive theater shows, concerts by renowned artists\r\nDates: December 19, 2024 – January 9, 2025', 'uploads/winter_at_tantora.webp', 'Festivals', 1),
(15, 'AlUla Dates Festival ', 'The AlUla Dates Festival is a celebration of the region\'s iconic date fruit, featuring local markets, traditional performances, and cultural activities. Visitors can explore various date varieties, enjoy live music, and participate in workshops that highlight the significance of dates in Saudi culture\r\nDates: Exact dates for 2025 to be announced', 'uploads/date_palm_farm.jpg', 'Festivals', 1),
(16, 'Wadi AlFann', 'Wadi AlFann, meaning Valley of the Arts, is a visionary cultural destination in the heart of the AlUla desert. It will showcase monumental, permanent land art installations by globally renowned artists such as James Turrell, Agnes Denes, and Manal AlDowayan. The exhibition will blend contemporary creativity with the timeless desert landscape, inviting visitors into a new cultural era. It is one of the world’s most ambitious public art initiatives.\r\nDates:Opening in 2026', 'uploads/wadi_alfann.jpg', 'Exhibitions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `itemID`, `type`, `author_name`, `rating`, `body`, `created_at`) VALUES
(2, 4, 'event', 'H', 4, 'perfect', '2025-05-06 15:43:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
