-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 06. jun 2020 ob 14.14
-- Različica strežnika: 10.1.36-MariaDB
-- Različica PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `testna_naloga`
--

-- --------------------------------------------------------

--
-- Struktura tabele `tom_project`
--

CREATE TABLE `tom_project` (
  `id` int(11) NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `tom_project`
--

INSERT INTO `tom_project` (`id`, `name`) VALUES
(1, 'Projekt'),
(2, 'Projekt 2'),
(3, 'Projekt 3');

-- --------------------------------------------------------

--
-- Struktura tabele `tom_report`
--

CREATE TABLE `tom_report` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `percent_done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `tom_report`
--

INSERT INTO `tom_report` (`id`, `task_id`, `name`, `percent_done`) VALUES
(1, 1, 'Porocilo 1', 100),
(2, 2, 'Porocilo 2', 30),
(3, 2, 'Porocilo 3', 20),
(4, 5, 'Porocilo 1', 100),
(5, 4, 'Porocilo 1', 100);

-- --------------------------------------------------------

--
-- Struktura tabele `tom_task`
--

CREATE TABLE `tom_task` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `start_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `end_date` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `tom_task`
--

INSERT INTO `tom_task` (`id`, `project_id`, `name`, `start_date`, `end_date`) VALUES
(1, 1, 'Naloga 1', '2014-05-22 22:00:00.000000', '2014-05-25 21:00:00.000000'),
(2, 1, 'Naloga 2', '2014-05-22 22:00:00.000000', '2014-06-23 21:00:00.000000'),
(3, 1, 'Naloga 3', '2014-05-22 22:00:00.000000', '2014-05-26 21:00:00.000000'),
(4, 2, 'Naloga 1', '2014-05-22 22:00:00.000000', '2014-06-23 21:00:00.000000'),
(5, 3, 'Naloga 1', '2014-05-22 22:00:00.000000', '2014-05-23 21:00:00.000000');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `tom_project`
--
ALTER TABLE `tom_project`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `tom_report`
--
ALTER TABLE `tom_report`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `tom_task`
--
ALTER TABLE `tom_task`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
