-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 13 Ιουλ 2025 στις 11:57:50
-- Έκδοση διακομιστή: 10.4.32-MariaDB
-- Έκδοση PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `forum`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `threads`
--

INSERT INTO `threads` (`id`, `user_id`, `title`, `content`, `created_at`) VALUES
(8, 3, 'Pc users', '<p>&Kappa;&alpha;&lambda;&eta;&sigma;&pi;έ&rho;&alpha;!</p>', '2025-07-13 08:52:53');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `verification_token` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created_at`, `avatar`, `is_verified`, `verification_token`, `role`) VALUES
(1, 'Ilias', 'iliaskant@hotmail.com', '$2y$10$OqzehX/NAKUQp9tqk6N1se9wn5DszTYlzA7JmkHKblgtZKteltLV.', NULL, '2025-07-12 10:15:41', 'avatars/user_1.jpg', NULL, NULL, 'user'),
(2, 'Ilias Kant', 'eliaskantzos@gmail.com', '$2y$10$reNqfokeCSHVpAms6C/BR.GOwjCkqVhMKzqFaOv/PNLZgQArSTj5m', 0, '2025-07-12 10:28:06', NULL, 0, NULL, 'user'),
(3, 'George', 'george@george.gr', '$2y$10$qJTnFJ7qvAiDs8VexuTb0OmS5IKmrr7m0DeVM2ynCG.KuGkL7fEXa', 0, '2025-07-12 10:56:32', 'avatars/user_3.jpg', 0, NULL, 'user'),
(4, 'admin', 'admin@admin.gr', '$2y$10$mxK7q8McybylbeCJ6P9Dwe42R8rsyftXuoVTBQHyNZ/dZ8hovpvQe\r\n\r\n', NULL, '2025-07-13 07:40:46', NULL, 0, NULL, 'admin'),
(11, 'superadmin', 'admin@demo.gr', '$2b$12$5qdYofuevNmLIaDDVexXDOmT/OtQpwtdqsxmEt/6u2IfD/vOI7pxy', 0, '2025-07-13 08:13:44', NULL, 0, NULL, 'admin'),
(12, 'ilias', 'ilias@ilias.gr', '$2y$10$CiWOhjh9c10y3cug1FMYouIiHRk8nT0nXn6NW8aUNsq2qeLHq6NDW', 0, '2025-07-13 08:45:12', NULL, 0, NULL, 'admin'),
(13, 'kostas', 'kostas@kostas.gr', '$2y$10$SmiXiEtkWQkHh9nGQPvOxeRCCZnv7hFMZAjT/FY1lH3L7p0hSfXbW', 0, '2025-07-13 08:47:49', NULL, 0, NULL, 'user'),
(14, 'Aggelos', 'aggelos@aggelos.gr', '$2y$10$jKQ5ReNHcgiGg9jqddh7OeZ7eroiL8dkJs3OiBOZlzUQZJsceJfWq', 0, '2025-07-13 08:51:03', 'avatars/user_14.jpg', 0, NULL, 'user'),
(15, 'dimitris', 'dimitris@dimitris.gr', '$2y$10$1/XLwi9Zcb5eY/fjpbZqTuNR7mism6VbZ4OOScTX2XO4W6bePL3uG', 0, '2025-07-13 09:28:07', NULL, 0, NULL, 'user'),
(16, 'Giannis', 'giannis@giannis.gr', '$2y$10$WqOT6yXeWUTWRfneoHFbau71NCBRiX6tj.x7lJ0vUu4tL1m8CJDWS', 0, '2025-07-13 09:46:51', NULL, 0, NULL, 'admin'),
(17, 'Antreas', 'antreas@antreas.gr', '$2y$10$jxNXr18SdroUziYIhuZtXuuObAGl8HoF3lHweLSIIeaEKitKFAQcy', 0, '2025-07-13 09:47:34', NULL, 0, NULL, 'user');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thread_id` (`thread_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Ευρετήρια για πίνακα `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
