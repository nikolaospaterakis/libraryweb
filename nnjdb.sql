-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 16 Ιουν 2020 στις 22:08:21
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `nnjdb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books`
--

CREATE TABLE `books` (
  `book_id` int(3) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `author` varchar(40) NOT NULL,
  `image` varbinary(150) NOT NULL,
  `category` varchar(16) NOT NULL,
  `isbn` varchar(16) NOT NULL,
  `numitems` int(3) DEFAULT NULL,
  `abstract` text NOT NULL,
  `shelf` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `image`, `category`, `isbn`, `numitems`, `abstract`, `shelf`) VALUES
(1, 'VAN GOGH THE COMPLETE PAINTING', 'Vincent van Gogh', '', 'Art', '9783836557153', 5, 'Considered a founding father of modern painting,\nVincent van Gogh is also one of the most famed tragic figures in art history.\nThis comprehensive introduction brings together a detailed account of the artist\'s life with\na complete catalog of his 871 paintings.', 0),
(2, 'The Thirty-six Views of Mount Fuji', 'Hokusai', 0x433a78616d70706874646f637364617368626f6172646533616d657267617274626f6f6b31302e6a7067, 'Art', '9783836557153', 3, 'In the early nineteenth century, the pigment known as Berlin or Prussian blue (bero) became more widely available and affordable – thanks to it the famous Great Wave  has such vibrant colors. Here Hokusai proved he was a virtuoso of composition. Not only do the surging breakers seem to swamp the boaters, but -to the Japanese eye, accustomed to reading from right to left – the great claw of a wave appears almost to tumble into the viewer’s face.', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(3) UNSIGNED NOT NULL,
  `user_id` int(3) UNSIGNED NOT NULL,
  `book_id` int(3) UNSIGNED NOT NULL,
  `status_id` int(3) UNSIGNED NOT NULL,
  `loandate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `loans`
--

INSERT INTO `loans` (`loan_id`, `user_id`, `book_id`, `status_id`, `loandate`) VALUES
(29, 3, 2, 2, '2020-06-16 22:43:19'),
(30, 3, 1, 2, '2020-06-15 17:39:51'),
(31, 3, 1, 2, '2020-06-16 22:31:48'),
(33, 3, 1, 4, '2020-06-16 16:18:10'),
(34, 3, 1, 2, '2020-06-16 22:18:39'),
(35, 3, 1, 2, '2020-06-16 22:18:22'),
(36, 3, 1, 2, '2020-06-16 22:42:28'),
(37, 3, 1, 2, '2020-06-16 22:15:58'),
(38, 3, 1, 2, '2020-06-16 22:26:21'),
(39, 3, 1, 4, '2020-06-16 16:36:42'),
(40, 3, 1, 3, '2020-06-16 16:45:17'),
(43, 2, 1, 4, '2020-06-16 22:01:11'),
(45, 3, 1, 4, '2020-06-16 22:35:57');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `roles`
--

CREATE TABLE `roles` (
  `role_id` int(3) UNSIGNED NOT NULL,
  `rolename` enum('Admin','Librarian','Visitor') NOT NULL DEFAULT 'Visitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `roles`
--

INSERT INTO `roles` (`role_id`, `rolename`) VALUES
(1, 'Admin'),
(2, 'Librarian'),
(3, 'Visitor');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `status`
--

CREATE TABLE `status` (
  `status_id` int(3) UNSIGNED NOT NULL,
  `statusname` enum('Loan','Returned','Booked','Ordered') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `status`
--

INSERT INTO `status` (`status_id`, `statusname`) VALUES
(1, 'Loan'),
(2, 'Returned'),
(3, 'Booked'),
(4, 'Ordered');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `user_id` int(3) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `user_pwd` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role_id` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`user_id`, `username`, `firstname`, `lastname`, `user_pwd`, `email`, `role_id`) VALUES
(2, 'nptr', 'Nikos', 'Ptr', '123123', 'okayokay@gmail.com', 2),
(3, 'nickp', 'Nikos', 'Ptr', '11111', 'nikvodi@gmail.com', 3),
(4, 'daddy', 'Nikos', 'Ptr', 'lol', 'okayokay@gmail.com', 1);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Ευρετήρια για πίνακα `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Ευρετήρια για πίνακα `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Ευρετήρια για πίνακα `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`email`,`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT για πίνακα `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT για πίνακα `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `loans_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Περιορισμοί για πίνακα `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
