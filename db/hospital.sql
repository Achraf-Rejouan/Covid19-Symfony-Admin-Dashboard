-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 09:09 AM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250505042450', '2025-05-05 06:25:39', 98);

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE `medecin` (
  `id_medecin` int(11) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom_prenom`, `code`) VALUES
(2, 'Mourad ben Abdallah', '123450'),
(3, 'Achraf Rejouan', '123456'),
(4, 'Sami Ben Ahmed', '812349'),
(5, 'Nadia Trabelsi', '924137'),
(6, 'Karim Jlassi', '307521'),
(7, 'Henda Gharbi', '190834'),
(8, 'Firas Messaoud', '673298'),
(9, 'Rim Bouzid', '548213'),
(10, 'Yassine Chebbi', '732905'),
(11, 'Ameni Chérif', '128495'),
(12, 'Omar Guesmi', '604712'),
(13, 'Nour Mhiri', '930184'),
(14, 'Mahdi Khemiri', '517029'),
(15, 'Imen Saidi', '893164'),
(16, 'Walid Jebali', '245971'),
(17, 'Sana Kallel', '678230'),
(18, 'Tarek Zarrouk', '159382'),
(19, 'Leila Baccar', '762401'),
(20, 'Anis Ben Romdhane', '331847'),
(21, 'Rania Oueslati', '486925'),
(22, 'Chokri Marzouki', '904173'),
(23, 'Yasmine Sassi', '718352'),
(24, 'Nizar Frikha', '246893'),
(25, 'Mouna Jelassi', '538026');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `medecin_id` int(11) DEFAULT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `date_naiss` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `date_entree` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id_patient`, `medecin_id`, `nom_prenom`, `date_naiss`, `genre`, `date_entree`) VALUES
(2, 3, 'Nour Ben Youssef', '1998-04-30', 'femme', '2025-05-21'),
(3, 5, 'Hichem Ben Salah', '1984-07-19', 'homme', '2024-11-10'),
(4, 12, 'Syrine Dridi', '1992-03-05', 'femme', '2025-01-24'),
(5, 7, 'Nader Jaziri', '1978-09-14', 'homme', '2023-07-30'),
(6, 21, 'Lina Ktari', '2001-12-02', 'femme', '2025-04-18'),
(7, 3, 'Fathi Ayari', '1965-01-22', 'homme', '2024-03-09'),
(8, 14, 'Imen Chouchene', '1989-05-11', 'femme', '2023-08-25'),
(9, 9, 'Youssef Laaroussi', '2005-10-06', 'homme', '2025-05-02'),
(10, 18, 'Nesrine Baccour', '1973-02-27', 'femme', '2024-12-15'),
(11, 24, 'Walid Zoghlami', '1980-06-01', 'homme', '2023-10-06'),
(12, 6, 'Sabrine Hammami', '1995-11-23', 'femme', '2024-02-14'),
(13, 17, 'Adel Mbarek', '1969-08-09', 'homme', '2023-11-20'),
(14, 2, 'Aicha Rekik', '2000-04-03', 'femme', '2025-03-29'),
(15, 11, 'Khaled Mejri', '1958-12-17', 'homme', '2024-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`),
  ADD KEY `IDX_1ADAD7EB4F31A84` (`medecin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_1ADAD7EB4F31A84` FOREIGN KEY (`medecin_id`) REFERENCES `medecin` (`id_medecin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
