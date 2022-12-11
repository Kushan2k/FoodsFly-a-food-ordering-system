-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 07:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsfly`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `rating` float NOT NULL,
  `rate_count` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_id`, `name`, `price`, `category`, `rating`, `rate_count`, `description`, `img_url`) VALUES
(1, 'checken rice', 1260, 'lunch', 5, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg?cs=srgb&dl=pexels-pixabay-461198.jpg&fm=jpg'),
(3, 'kottu', 700, 'dinner', 5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://www.shutterstock.com/image-photo/traditional-sri-lankan-kottu-roti-260nw-1050903170.jpg'),
(4, 'ice cream', 400, 'desert', 4, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://cdn.britannica.com/50/80550-050-5D392AC7/Scoops-kinds-ice-cream.jpg'),
(5, 'fruit salad', 1560, 'desert', 50, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJuoqdpEofKe4WFTcGc3VtexC_97rgrbLAVek9ltql1D1nITcja9gGPKSRfLS4wNtjEkg&usqp=CAU'),
(6, 'chocalets cake', 250, 'sweets', 20, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://i.pinimg.com/736x/ee/4e/fd/ee4efd0d960b477e4dc0373c2837f7a2.jpg'),
(7, 'mango juice', 150, 'drink', 29, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://medmunch.com/wp-content/uploads/2020/04/Mango-Juice.jpg'),
(8, 'burger', 380, 'short eats', 10, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://www.gardengourmet.co.uk/sites/default/files/recipes/aeead5804e79ff6fb98b2039619c5230_200828_MEDIAMONKS_GG_Spicytarian.jpg'),
(9, 'string hopers', 890, 'breakfirst', 19, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://harischandramills.com/wp-content/uploads/2018/06/3-2.jpg'),
(10, 'rice and curry', 500, 'lunch', 29, 15, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Prov', 'https://valampuri.foodorders.lk/images/food/phpxpdKKq.jpg'),
(11, 'Biryani', 700, 'Lunch', 20, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lacinia ligula et sem porta, eu rhoncus mauris auctor. Curabitur urna arcu, faucibus a quam eu, pellentesque pretium massa. Proin eu nisl semper diam rhoncus tempus vel in nunc. Integer port', 'https://yellowchilis.com/wp-content/uploads/2020/10/mughlai-chicken-biryani-500x500.jpg'),
(13, 'Noodles', 150, 'Breakfirst', 20, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lacinia ligula et sem porta, eu rhoncus mauris auctor. Curabitur urna arcu, faucibus a quam eu, pellentesque pretium massa. Proin eu nisl semper diam rhoncus tempus vel in nunc. Integer port', 'https://ph-test-11.slatic.net/p/14ba7b92a706bd10a35283aa4c6c245e.jpg'),
(14, 'Fried chicken', 800, 'Dinner', 30, 10, 'gjfiognrkjgnrfnenfmvkjtnrvlk4vv lkt4vd,v lmv r,gmelgmf, fbjk ', 'https://cdn.metrodiner.io/wp-content/uploads/2020/08/rapidly-growing-metro-diner-adds-new-executives.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(70) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `mobile`, `password`, `address`, `type`) VALUES
(2, 'Kushan Gayantha', 'kushangayanthapercy@gmail.com', '0712720033', '$2y$10$5WLmN3eaRk4/qYkTuospaOQbq3UjQX7Q6d0FO.kiFpCg7CO0mauv2', '201/10 Colombo Road Kurunegala', 'customer'),
(3, 'Kushan Gayantha', 'kushangayantha001@gmail.com', '0721021286', '$2y$10$eOU72.wPz8TDi/TzEEk46u812YE8MgTyOJA/jtCZcXq0Q86dvlP66', '201/10 Colombo Road Kurunegala', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `user_id`, `item_id`) VALUES
(1, 2, 13),
(2, 2, 14),
(3, 2, 11),
(4, 2, 8),
(5, 2, 7),
(6, 2, 6),
(7, 2, 5),
(8, 3, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USERID` (`user_id`),
  ADD KEY `FK_menu_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `FK_USERID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_menu_id` FOREIGN KEY (`item_id`) REFERENCES `menu_item` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
