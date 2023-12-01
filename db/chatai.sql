-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 01:51 PM
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
-- Database: `chatai`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatId` int(11) NOT NULL,
  `chatName` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `roomId` int(11) NOT NULL,
  `chatId` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`roomId`, `chatId`, `question`, `answer`) VALUES
(1, 1, 'How Are you ', 'I\'m an AI language model, so I don\'t have feelings, but I\'m here to help. How can I assist you today?'),
(2, 1, 'create prime number in php', 'Here\'s an example of a PHP code that generates prime numbers:\n\n,php\n<?php\nfunction isPrime($num) {\n    if ($num < 2) {\n        return false;\n    }\n    for ($i = 2; $i <= sqrt($num); $i++) {\n        if ($num % $i === 0) {\n            return false;\n        }\n    }\n    return true;\n}\n\nfunction generatePrimes($count) {\n    $primes = [];\n    $num = 2;\n    while (count($primes) < $count) {\n        if (isPrime($num)) {\n            $primes[] = $num;\n        }\n        $num++;\n    }\n    return $primes;\n}\n\n$primeCount = 10;\n$primeNumbers = generatePrimes($primeCount);\n\necho \"First $primeCount prime numbers are: \" . implode(\", \", $primeNumbers);\n?>\n,\n\nIn this code, there are two functions. `isPrime()` checks if a number is prime or not by iterating from 2 up to the square root of the number. `generatePrimes()` generates the required number of prime numbers by using the `isPrime()` function.\n\nYou can modify the `$primeCount` variable to generate a different number of prime numbers as per your requirement. The code then prints the generated prime numbers using the `implode()` function.'),
(3, 1, 'hsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjkhsakdhksadhksadhjksadhsakjdhsakjdhjk', 'I\'m an AI, so I don\'t have feelings. But I\'m here to help you with any questions you have. How can I assist you today?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatId`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`roomId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
