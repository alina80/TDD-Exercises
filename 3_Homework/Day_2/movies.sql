SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `Movies`
--

CREATE TABLE IF NOT EXISTS `Movies` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `Movies`
--

INSERT INTO `Movies` (`id`, `name`, `description`, `rating`) VALUES
(1, 'Insurgent (2015)', 'Beatrice Prior confronts the inner demons and continues the fight against the huge alliance that can cause the collapse of society.', 7),
(2, 'Tu veux... ou tu veux pas? (2014)', 'Lambert, a sex addict trying to break off the addiction, employs an insatiable nymphomaniac.', 5.00),
(3, 'Ex Machina (2015)', 'After winning the competition, a programmer of one of the largest online companies is invited to the estate of his boss. It turns out that he is part of an experiment.', 8),
(4, 'Clouds of Sils Maria (2014)', 'An outstanding actress rediscovers herself spending a few days in the Alps with her assistant.', 7.21),
(5, 'Chappie (2015)', 'Two gangsters steal a police android to use it for their own purposes. ', 8.32),
(6, 'Cinderella (2015)', 'After the death of her father,  Ella\'s evil stepmother turns the girl into a maid. The fate of Cinderella will be changed by the Good Fairy.', 8),
(7, 'Sąsiady (2014)', 'The priest visits a tenement house revealing the secrets of its tenants. ', 3.15),
(8, 'La jaula de oro (2013)', 'Sara, a teenager from Guatemala, embarks on a dangerous trip to Los Angeles in search of a better life.', 9),
(9, 'Body (2015)', 'Cynical prosecutor and his anorexic daughter are trying to get in terms with the tragic death of a close person.', 6),
(10, 'Gus, petit oiseau, grand voyage (2014)', 'A bird, which has never got out of the family nest before, becomes the guide of the herd by mistake.', 5),
(11, 'Disco Polo (2015)', 'Young country musicians are suddenly hitting tops of music charts.', 2),
(12, 'Asterix and Obelix: Mansion of the Gods (2014)', 'Julius Caesar decides to build a residential area for Roman owners and calls it the Mansion of the Gods.', 9),
(13, 'With Fire and Sword (1999)', 'Historic', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Movies`
--
ALTER TABLE `Movies`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Movies`
--
ALTER TABLE `Movies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
