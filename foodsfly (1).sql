-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 08:24 AM
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
  `rating` float NOT NULL DEFAULT 1,
  `rate_count` int(11) DEFAULT 1,
  `description` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_id`, `name`, `price`, `category`, `rating`, `rate_count`, `description`, `img_url`) VALUES
(1, 'Chicken Fried Rice', 950, 'mains', 5, 2, 'Chicken fried rice with Basmati rice. ', 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=725&q=80'),
(3, 'Kottu', 700, 'mains', 5, 1, 'Chicken kottu, a classic dinner item which is loved by many Sri Lankans. ', 'https://www.shutterstock.com/image-photo/traditional-sri-lankan-kottu-roti-260nw-1050903170.jpg'),
(4, 'ice cream', 400, 'dessert', 4, 3, 'Three flavored ice-cream served with peanut and almond crumbs. ', 'https://cdn.britannica.com/50/80550-050-5D392AC7/Scoops-kinds-ice-cream.jpg'),
(5, 'fruit salad', 400, 'dessert', 50, 10, 'Classic fruit salad with mango, grapes, banana, papaya, pineapple and kiwi. Served with a scoop of vanilla ice cream. ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJuoqdpEofKe4WFTcGc3VtexC_97rgrbLAVek9ltql1D1nITcja9gGPKSRfLS4wNtjEkg&usqp=CAU'),
(6, 'Chocolate Cake', 350, 'dessert', 20, 10, 'Freshly made every morning, one of the best sellers. Locally sourced ingredients, real dark chocolate and free range eggs.', 'https://i.pinimg.com/736x/ee/4e/fd/ee4efd0d960b477e4dc0373c2837f7a2.jpg'),
(7, 'mango juice', 150, 'beverages', 29, 18, 'Fresh mango juice made with fresh mango, sugar and served with a scoop of ice cream', 'https://medmunch.com/wp-content/uploads/2020/04/Mango-Juice.jpg'),
(8, 'Crispy Chicken Burger', 380, 'short eats', 10, 3, 'Another best seller, a crispy chicken patty with dill pickles, fresh onion and our secret burger sauce all between 2 burger buns.', 'https://www.gardengourmet.co.uk/sites/default/files/recipes/aeead5804e79ff6fb98b2039619c5230_200828_MEDIAMONKS_GG_Spicytarian.jpg'),
(9, 'String hoppers', 550, 'mains', 19, 14, 'String hoppers served with coconut sambal, chicken curry and dhal curry.', 'https://harischandramills.com/wp-content/uploads/2018/06/3-2.jpg'),
(10, 'Rice and Curry', 500, 'mains', 29, 15, 'White rice with chicken curry, dhal curry, mango chutney, papadam and various other curries depending on the day.', 'https://valampuri.foodorders.lk/images/food/phpxpdKKq.jpg'),
(11, 'Chicken Biryani', 700, 'mains', 20, 10, 'Biriyani made in traditional way using real saffron, fresh ingredients and Basmati rice. Cooked in a traditional clay pot. ', 'https://yellowchilis.com/wp-content/uploads/2020/10/mughlai-chicken-biryani-500x500.jpg'),
(13, 'Noodles', 400, 'mains', 20, 10, 'Stir fry noodles made with eggs and vegetables', 'https://ph-test-11.slatic.net/p/14ba7b92a706bd10a35283aa4c6c245e.jpg'),
(14, 'Fried chicken', 800, 'sides', 30, 10, 'Crispy batter fried chicken.', 'https://images.unsplash.com/photo-1569058242253-92a9c755a0ec?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(15, 'Chicken and Waffles', 1350, 'mains', 4, 25, 'Batter fried crispy chicken and waffles served with honey butter sage sauce', 'https://images.unsplash.com/photo-1600891963935-9e9544daf776?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80'),
(16, 'Chicken Lasagna ', 890, 'mains', 4.8, 40, 'Lasagna made with fresh pasta sheets, fresh cheese and sauce made using San Marzano tomatoes and freshly ground chicken.', 'https://images.unsplash.com/photo-1574894709920-11b28e7367e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80'),
(17, 'Chocolate milkshake', 250, 'beverages', 40, 10, 'Chocolate milkshake made using fresh milk and chocolate topped with oreos and kit-kats.', 'https://images.unsplash.com/photo-1541658016709-82535e94bc69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80'),
(18, 'Fettuccine alfredo', 1500, 'mains', 50, 10, 'Fettuccine alfredo made with fresh pasta cooked with freshly grated parmesan cheese, chicken and finished in a parmesan cheese wheel.', 'https://images.unsplash.com/photo-1645112411341-6c4fd023714a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(19, 'Chicken pastry', 100, 'short eats', 30, 8, 'puff pastry with chicken filling.', 'https://media.istockphoto.com/id/1144146306/photo/crispy-sausage-roll-with-thyme-and-sesame-seeds.jpg?s=612x612&w=0&k=20&c=FHte7ATfdwO9mt7Am_4olfxwXtdmusrARA-SHeLqE8I='),
(20, 'Fish Pastry', 100, 'short eats', 30, 10, 'Puff pastry with fish filling.', 'https://media.istockphoto.com/id/471243235/photo/apple-turnovers.jpg?s=612x612&w=0&k=20&c=o5Dt1ALyi-EKJogX9YiRFZHVP0PhoprR5Kug6ZyeN-g='),
(21, 'Spaghetti and meatballs', 1000, 'mains', 40, 8, 'Spaghetti with chicken meatballs cooked in a tomato sauce. Topped with shredded cheese and Italian parsley.', 'https://images.unsplash.com/photo-1635264685671-739e75e73e0f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80'),
(22, 'Sushi', 1650, 'mains', 50, 10, 'Sushi made with fresh farm raised tuna and ingredients directly imported from Japan.', 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(23, 'Crab with pepper sauce', 1700, 'mains', 50, 10, 'King crab imported straight form Alaska. Steamed and then further cooked with a brown butter pepper sauce.', 'https://images.unsplash.com/photo-1609834265242-75d58b7db409?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(24, 'Jalebi', 200, 'dessert', 40, 10, 'Jalebi made with fresh ingredients and fried in ghee and coated with rose syrup.', 'https://images.indianexpress.com/2020/04/jalebis-759.jpg'),
(25, 'Spaghetti Carbonara', 1500, 'mains', 50, 10, 'Spaghetti carbonara made with pancetta imported straight from Italy and fresh ground pepper , eggs and parmesan cheese.', 'https://images.unsplash.com/photo-1612874742237-6526221588e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80'),
(26, 'Birria Tacos', 600, 'mains', 50, 10, 'Traditional birria broth made with imported ingredients straight from Mexico and using premium meat, queso Oaxaca cheese , all inside freshly made corn tortilla. Served with a side of birria broth for dipping.', 'https://images.unsplash.com/photo-1585803518902-58a3ef005b51?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80'),
(27, 'French fries', 400, 'sides', 40, 10, 'French fries served with ketchup.', 'https://images.unsplash.com/photo-1608219994488-cc269412b3e4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
(28, 'Chicken nuggets', 550, 'sides', 35, 10, 'Popular among children. Made with fresh ground chicken and locally sourced ingredients. ', 'https://images.unsplash.com/photo-1619881590738-a111d176d906?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80'),
(29, 'Pancakes', 300, 'sides', 40, 10, 'Fluffy pancakes served with maple syrup and butter.\r\n', 'https://images.unsplash.com/photo-1554520735-0a6b8b6ce8b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80'),
(30, 'Soft drinks', 250, 'beverages', 30, 10, 'Sprite, Coca-Cola, Lemonade, Cream soda, Portello, Orange crush available to choose from.', 'https://images.unsplash.com/photo-1625740822008-e45abf4e01d5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
(31, 'Chicken Gyros', 500, 'short eats', 50, 10, 'Chicken Gyros made in traditional Greek method stuffed in fresh made pita bread.', 'https://images.unsplash.com/photo-1638865326802-e5ca82e037f3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80'),
(32, 'Nasi-Goreng', 750, 'mains', 45, 10, 'Traditional Indonesian fried rice with pieces of meat and vegetables, and an assortment of seasonings such as sweet soy sauce, sambal oelek ...etc. Served with an egg and prawn chips.', 'https://images.unsplash.com/photo-1647093953000-9065ed6f85ef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80'),
(33, 'Vegan burger ', 550, 'short eats', 30, 15, 'Burger made with vegan patties and vegan cheese.', 'https://images.unsplash.com/photo-1525059696034-4967a8e1dca2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=388&q=80'),
(34, 'Bubble tea', 350, 'beverages', 40, 10, 'Iced tea accompanied by chewy tapioca pearls.', 'https://images.unsplash.com/photo-1525803377221-4f6ccdaa5133?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=874&q=80'),
(35, 'Chocolate mousse', 350, 'dessert', 40, 10, 'Chocolate mousse is a staple among chocolate desserts. Light and fluffy texture, its chocolate flavor is intense and it\'s soft and melting on the palate.', 'https://images.unsplash.com/photo-1590080875852-ba44f83ff2db?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(36, 'Tea', 80, 'beverages', 50, 15, 'Tea infused with cinnamon flavor.', 'https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
(37, 'Lemon pepper wings', 550, 'sides', 50, 10, 'Chicken wings batter fried till crisp and coated with special lemon pepper sauce.', 'https://www.spendwithpennies.com/wp-content/uploads/2022/02/Lemon-Pepper-Wings-SpendWithPennies-13-1024x1536.jpg'),
(38, 'Hoppers', 250, 'mains', 40, 12, 'Stack of 8 hoppers served with lunumiris.', 'https://st2.depositphotos.com/4404621/11594/i/950/depositphotos_115942104-stock-photo-sri-lankan-style-plain-hoppers.jpg'),
(39, 'Parata', 340, 'mains', 45, 10, 'Paratas freshly made, cut and served with chicken curry or dhal curry.', 'https://i.ytimg.com/vi/nrNrrveiZjI/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `type` int(10) NOT NULL DEFAULT 1918
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `mobile`, `password`, `address`, `type`) VALUES
(2, 'Kushan Gayantha', 'kushangayanthapercy@gmail.com', '0712720033', '$2y$10$5WLmN3eaRk4/qYkTuospaOQbq3UjQX7Q6d0FO.kiFpCg7CO0mauv2', '201/10 Colombo Road Kurunegala', 1918),
(4, 'Inula Chandira', 'inula@gmail.com', '0775606777', '$2y$10$xmkrikUOnfV2m90bg8u3wuC/hiep2BhUOV0c7tjP0TxGoIB0J76ci', '294,angampitiya,padukka', 1918),
(6, 'Kushan Gayantha', 'kushangayantha001@gmail.com', '0721021286', '$2y$10$KJnRIDUFs8CkORqMO6.Y7.r7Ji0EJmRYMcfHpd7L7y80Yde9kdyJu', '201/10 Colombo Road Kurunegala', 1290),
(7, 'heshara', 'heshara@gmail.com', '1234567890', '$2y$10$jlBOy2JEpAKsBlY.A9R.tuYlQiaTh64t.IkSMGIfkXxHUDS866qcy', 'test', 1567);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ODERID` (`order_id`),
  ADD KEY `menu_id` (`menu_id`);

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
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `FK_ODERID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu_item` (`menu_id`);

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
