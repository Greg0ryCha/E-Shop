-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 24 Μάη 2024 στις 11:33:01
-- Έκδοση διακομιστή: 10.4.32-MariaDB
-- Έκδοση PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `shop-db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `price`, `quantity`, `user_id`) VALUES
(1, 'ski-boots&right_hand', 'prod19.jpg', '19', 1, 1),
(2, 'ski-jacket', 'prod11.jpg', '19', 1, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `contactus`
--

CREATE TABLE `contactus` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `order`
--

CREATE TABLE `order` (
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `pin_code` int(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `total_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `order`
--

INSERT INTO `order` (`city`, `country`, `email`, `flat`, `id`, `method`, `name`, `number`, `pin_code`, `state`, `street`, `total_products`, `total_price`) VALUES
('Ναύπλιο', 'Ελλάδα', 'ioannaxan@yahoo.gr', 'Αγίου Βλασίου', 1, 'cash on delivery', 'Ιωάννα Χατζηγιάννη', '6984559285', 21100, 'ΑΡΓΟΛΙΔΑΣ', '5', 0, '19');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(1, 'ski-pants', 'prod1.png', 20),
(2, 'ski-jacket', 'prod2.png', 19),
(4, 'ski-masks&and&glasses', 'prod4.jpg', 19),
(5, 'ski-masks&and&glasses', 'prod5.jpg', 19),
(6, 'ski-boots&right_hand', 'prod6.jpg', 19),
(7, 'ski-boots&right_hand', 'prod7.jpg', 19),
(8, 'ski-masks&and&glasses', 'prod8.jpg', 19),
(10, 'ski-jacket', 'prod10.jpg', 19),
(11, 'ski-jacket', 'prod11.jpg', 19),
(12, 'ski-jacket', 'prod12.jpg', 19),
(13, 'ski-pants', 'prod13.jpg', 19),
(14, 'ski-pants', 'prod14.jpg', 19),
(15, 'ski-pants', 'prod15.jpg', 19),
(16, 'ski-boots&right_hand', 'prod16.jpg', 19),
(17, 'ski-masks&and&glasses', 'prod17.jpg', 19),
(18, 'ski-boots&right_hand', 'prod18.jpg', 19),
(19, 'ski-boots&right_hand', 'prod19.jpg', 19),
(20, 'ski-boots&right_hand', 'prod20.jpg', 19),
(21, 'ski-gloves', 'prod21.jpg', 19),
(22, 'ski-masks&and&glasses', 'prod22.jpg', 19),
(23, 'ski-masks&and&glasses', 'prod23.jpg', 19),
(24, 'ski-boots&right_hand', 'prod24.jpg', 19),
(25, 'ski-boots&right_hand', 'prod25.jpg', 19),
(26, 'ski-boots&right_hand', 'prod26.jpg', 19),
(27, 'ski-masks&and&glasses', 'prod27.jpg', 19),
(28, 'ski-boots&right_hand', 'prod28.jpg', 19),
(29, 'ski-gloves', 'prod29.jpg', 19),
(30, 'ski-jacket', 'prod30.jpg', 19),
(31, 'ski-jacket', 'prod31.jpg', 19),
(32, 'ski-gloves', 'prod32.jpg', 19),
(33, 'ski-boots&right_hand', 'prod33.jpg', 19),
(34, 'ski-boots&right_hand', 'prod34.jpg', 19),
(35, 'ski-masks&and&glasses', 'prod35.jpg', 19),
(36, 'ski-pants', 'prod36.jpg', 19),
(37, 'ski-pants', 'prod37.jpg', 19),
(38, 'ski-gloves', 'prod38.jpg', 19),
(39, 'ski-gloves', 'prod39.jpg', 19),
(40, 'ski-gloves', 'prod40.jpg', 19);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT για πίνακα `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
