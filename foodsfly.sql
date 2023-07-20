-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 04:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_id`, `name`, `price`, `category`, `rating`, `rate_count`, `description`, `img_url`) VALUES
(1, 'Chicken Fried Rice', 950, 'main', 5, 2, 'Indulge in the ultimate comfort food with our Chicken Fried Rice. Tender chunks of juicy chicken are stir-fried with fluffy rice and a medley of colorful vegetables, seasoned with soy sauce and spices for a dish that\'s both satisfying and delicious.', 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=725&q=80'),
(3, 'Kottu Roti', 700, 'main', 5, 1, 'Tender roti bread is chopped and stir-fried with your choice of vegetables and spices for a spicy and filling dish.', 'https://www.shutterstock.com/image-photo/traditional-sri-lankan-kottu-roti-260nw-1050903170.jpg'),
(4, 'ice cream', 400, 'dessert', 4, 3, 'Satisfy your sweet tooth with a scoop (or two) of our creamy and dreamy Ice Cream. Made with the freshest ingredients, our ice cream comes in a range of irresistible flavors, from classic vanilla to rich and indulgent chocolate.', 'https://cdn.britannica.com/50/80550-050-5D392AC7/Scoops-kinds-ice-cream.jpg'),
(5, 'fruit salad', 400, 'dessert', 50, 10, '              Refresh and rejuvenate with a bowl of our colorful Fruit Salad. A medley of ripe and juicy fruits, including melons, berries, and tropical delights, is topped with a drizzle of honey and a squeeze of fresh lime for a sweet and tangy treat.  ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJuoqdpEofKe4WFTcGc3VtexC_97rgrbLAVek9ltql1D1nITcja9gGPKSRfLS4wNtjEkg&usqp=CAU'),
(6, 'Chocolate Cake', 350, 'dessert', 20, 10, 'Satisfy your sweet tooth with our decadent and rich chocolate cake. Made with only the finest ingredients, one bite will have you hooked.           ', 'https://i.pinimg.com/736x/ee/4e/fd/ee4efd0d960b477e4dc0373c2837f7a2.jpg'),
(7, 'mango juice', 150, 'beverages', 29, 18, 'Sip on summer with our freshly squeezed, sweet and juicy mango juice. Perfect for quenching your thirst on a hot day!', 'https://medmunch.com/wp-content/uploads/2020/04/Mango-Juice.jpg'),
(8, 'Crispy Chicken Burger', 380, 'short eats', 10, 3, '              Satisfy your cravings with a bite of our Crispy Chicken Burger. A juicy and tender chicken patty, coated in a crunchy batter and fried to golden perfection, nestled in a soft sesame seed bun, topped with lettuce, tomato, and a tangy sauce.  ', 'https://www.gardengourmet.co.uk/sites/default/files/recipes/aeead5804e79ff6fb98b2039619c5230_200828_MEDIAMONKS_GG_Spicytarian.jpg'),
(9, 'String hoppers', 550, 'main', 19, 14, '              Made from steamed rice flour and molded into delicate strands, these pillowy soft noodles are served with a flavorful coconut-based vegetable curry and a spicy sambal sauce, making for a delicious and traditional meal.            ', 'https://harischandramills.com/wp-content/uploads/2018/06/3-2.jpg'),
(10, 'Rice and Curry', 500, 'main', 29, 15, 'The heart and soul of Sri Lankan cuisine. A bed of fluffy and fragrant rice is paired with a selection of curries, made with a blend of aromatic spices and the freshest ingredients, for a meal that\'s both filling and full of flavor.', 'https://valampuri.foodorders.lk/images/food/phpxpdKKq.jpg'),
(11, 'Chicken Biryani', 700, 'main', 20, 10, '              Take a journey to the flavors of India and Sri Lanka with our mouth-watering Chicken Biriyani. Basmati rice is layered with tender chunks of juicy chicken, aromatic spices, and saffron, then slow-cooked to perfection.     ', 'https://yellowchilis.com/wp-content/uploads/2020/10/mughlai-chicken-biryani-500x500.jpg'),
(13, 'Noodles', 400, 'main', 20, 10, 'Savor the flavors of Asia with our tantalizing Stir Fry Noodles. A tangle of tender noodles, stir-fried with a medley of crisp vegetables, juicy meats, and bold sauces, makes for a meal that\'s both delicious and nutritious.', 'https://ph-test-11.slatic.net/p/14ba7b92a706bd10a35283aa4c6c245e.jpg'),
(14, 'Fried chicken', 800, 'sides', 30, 10, '              Satisfy your cravings for something crispy and juicy with our golden and crunchy Fried Chicken. Marinated to perfection and coated in a secret blend of spices and flour, our chicken is fried until it&#039;s crispy on the outside and juicy on', 'https://images.unsplash.com/photo-1569058242253-92a9c755a0ec?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(15, 'Chicken and Waffles', 1350, 'main', 4, 25, '              Indulge in the perfect combination of sweet and savory with our Chicken and Waffles. Crispy and juicy fried chicken is served atop a fluffy and golden waffle, drizzled with honey butter sage sauce and sprinkled with powdered sugar.         ', 'https://images.unsplash.com/photo-1600891963935-9e9544daf776?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80'),
(16, 'Chicken Lasagna ', 890, 'main', 4.8, 40, '              Taste the authentic flavors of the Italy with our Chicken Lasagna. Layers of tender and juicy chicken, silky smooth cheese sauce, and al dente pasta, are baked to perfection and topped with a sprinkle of mozzarella cheese.         ', 'https://images.unsplash.com/photo-1574894709920-11b28e7367e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80'),
(17, 'Chocolate milkshake', 250, 'beverages', 40, 10, '              Satisfy your sweet tooth with a sip of our thick and creamy Chocolate Milkshake. Made with premium chocolate ice cream and whole milk, this classic treat is blended to perfection and topped with chocolate sauce.            ', 'https://images.unsplash.com/photo-1541658016709-82535e94bc69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80'),
(18, 'Fettuccine alfredo', 1500, 'main', 50, 10, 'Satisfy your hunger with a plate of our Chicken Fettuccine Alfredo. Tender chunks of juicy chicken are mixed with al dente fettuccine pasta and smothered in a rich and creamy parmesan cheese sauce, creating a dish that\'s both filling and delicious.', 'https://images.unsplash.com/photo-1645112411341-6c4fd023714a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(19, 'Chicken pastry', 100, 'short eats', 30, 8, 'Enjoy a flaky and savory treat with our Chicken Pastry. A crisp and buttery pastry crust is filled with a delicious mixture of tender chunks of chicken, aromatic herbs and spices, and a rich and creamy sauce.        ', 'https://media.istockphoto.com/id/1144146306/photo/crispy-sausage-roll-with-thyme-and-sesame-seeds.jpg?s=612x612&w=0&k=20&c=FHte7ATfdwO9mt7Am_4olfxwXtdmusrARA-SHeLqE8I='),
(20, 'Fish Pastry', 100, 'short eats', 30, 10, 'Bite into a delicious and flaky snack with our Fish Pastry. A crisp and buttery pastry crust encases a savory filling of succulent pieces of fish, seasoned with herbs and spices, and combined with a rich and creamy sauce.', 'https://media.istockphoto.com/id/471243235/photo/apple-turnovers.jpg?s=612x612&w=0&k=20&c=o5Dt1ALyi-EKJogX9YiRFZHVP0PhoprR5Kug6ZyeN-g='),
(21, 'Spaghetti and meatballs', 1000, 'main', 40, 8, '              Savor the classic flavors of Italy with our Spaghetti and Meatballs. Al dente spaghetti pasta is paired with juicy and tender meatballs, made from a blend of ground beef and spices, and smothered in a rich and flavorful tomato sauce.        ', 'https://images.unsplash.com/photo-1635264685671-739e75e73e0f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80'),
(22, 'Sushi', 1650, 'main', 50, 10, 'Discover the art of Japanese cuisine with our fresh and expertly crafted sushi, Indulge in the art of sushi with our perfectly crafted rolls, hand-selected seafood and rice, and a touch of imagination. Experience flavor like never before!           ', 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(23, 'Crab with pepper sauce', 1700, 'main', 50, 10, 'Savor the taste of the ocean with our succulent Crab in Pepper Sauce. Fresh and juicy crab is cooked to perfection and tossed in a spicy and aromatic pepper sauce.', 'https://images.unsplash.com/photo-1609834265242-75d58b7db409?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(24, 'Jalebi', 200, 'dessert', 40, 10, 'Indulge in the sweet and syrup-drenched goodness of Jalebi, a classic Indian dessert. Crispy and golden spirals of batter are deep-fried and then soaked in a pool of sweet and sticky syrup.', 'https://images.indianexpress.com/2020/04/jalebis-759.jpg'),
(25, 'Spaghetti Carbonara', 1500, 'main', 50, 10, 'Savor the rich and creamy flavors of Italy with our Spaghetti Carbonara. Al dente spaghetti pasta is tossed in a luxurious sauce made from eggs, parmesan cheese, bacon, and black pepper, making for a dish that\'s both comforting and satisfying.', 'https://images.unsplash.com/photo-1612874742237-6526221588e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80'),
(26, 'Birria Tacos', 600, 'main', 50, 10, '              Treat your taste with our Chicken Birria Tacos. Succulent and juicy shredded chicken is simmered in a spicy and flavorful sauce, then wrapped in a soft and warm corn tortilla and topped with fresh cilantro and fresh onion.           ', 'https://images.unsplash.com/photo-1585803518902-58a3ef005b51?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80'),
(27, 'French fries', 400, 'sides', 40, 10, 'Satisfy your cravings with a classic side dish of our Crispy and Golden French Fries. Thinly sliced and perfectly seasoned potatoes are deep-fried to a golden perfection.', 'https://images.unsplash.com/photo-1608219994488-cc269412b3e4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
(28, 'Chicken nuggets', 550, 'sides', 35, 10, 'Popular among children. Made with fresh ground chicken and locally sourced ingredients. ', 'https://images.unsplash.com/photo-1619881590738-a111d176d906?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80'),
(29, 'Pancakes', 300, 'sides', 40, 10, 'Start your day with a warm and fluffy stack of Pancakes. Our tender and buttery pancakes are made from a classic recipe and served with a generous drizzle of syrup, making for a breakfast that\'s both satisfying and delicious.', 'https://images.unsplash.com/photo-1554520735-0a6b8b6ce8b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80'),
(30, 'Soft drinks', 250, 'beverages', 30, 10, '              Quench your thirst with a crisp and refreshing soft drink. Choose from a variety of flavors and enjoy the bubbles in every sip. Sprite, Coca-Cola, Lemonade, Cream soda, Portello, Orange crush available to choose from.            ', 'https://images.unsplash.com/photo-1625740822008-e45abf4e01d5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
(31, 'Chicken Gyros', 500, 'short eats', 50, 10, 'Take a bite into the delicious flavors of Greece with our Chicken Gyros. Thinly sliced and juicy marinated chicken is grilled to perfection and wrapped in a warm and soft pita bread with crisp vegetables, fresh herbs, and a tangy sauce.            ', 'https://images.unsplash.com/photo-1638865326802-e5ca82e037f3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80'),
(32, 'Nasi-Goreng', 750, 'main', 45, 10, 'Savor the bold and flavorful tastes of Indonesia with our Nasi Goreng. Aromatic and tender fried rice is stir-fried with succulent chicken or shrimp, crisp vegetables, and a blend of spices. Served with a fried egg making, pineapple and prawn chips.', 'https://images.unsplash.com/photo-1647093953000-9065ed6f85ef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80'),
(33, 'Vegan burger ', 550, 'short eats', 30, 15, 'Satisfy your cravings with a hearty and delicious Vegan Burger. A juicy and savory plant-based patty is topped with crisp vegetables, tangy sauce, and nestled between two soft and fluffy buns.', 'https://images.unsplash.com/photo-1525059696034-4967a8e1dca2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=388&q=80'),
(34, 'Bubble tea', 350, 'beverages', 40, 10, 'Quench your thirst with the playful and refreshing flavors of Bubble Tea. A sweet and creamy tea base is combined with chewy tapioca pearls, giving you a drink that\'s both satisfying and fun to sip.', 'https://images.unsplash.com/photo-1525803377221-4f6ccdaa5133?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=874&q=80'),
(35, 'Chocolate mousse', 350, 'dessert', 40, 10, 'Indulge in the rich and creamy textures of our Chocolate Mousse. A luscious blend of dark chocolate and whipped cream is whisked to perfection, creating a dessert that\'s both airy and indulgent, with a silky smooth texture that melts in your mouth.', 'https://images.unsplash.com/photo-1590080875852-ba44f83ff2db?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'),
(36, 'Tea', 80, 'beverages', 50, 15, 'Savor the simple pleasures of life with a warm and soothing cup of tea. Our tea blends are carefully selected from the finest leaves, with a range of flavors and aromas to choose from, making it the perfect way to unwind and rejuvenate after a long day.', 'https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
(37, 'Lemon pepper wings', 550, 'sides', 50, 10, 'Treat your taste buds to the bold and zesty flavors of our Lemon Pepper Wings. Juicy and tender chicken wings are tossed in a zesty lemon pepper seasoning, then grilled to crispy perfection, making for a snack or meal that\'s both satisfying and delicious.', 'https://www.spendwithpennies.com/wp-content/uploads/2022/02/Lemon-Pepper-Wings-SpendWithPennies-13-1024x1536.jpg'),
(38, 'Hoppers', 250, 'main', 40, 12, '              Thin and crispy pancakes made from fermented rice flour and coconut milk are shaped into a bowl-like form, perfect for holding a variety of savory fillings such as curries, eggs, or vegetables.            ', 'https://st2.depositphotos.com/4404621/11594/i/950/depositphotos_115942104-stock-photo-sri-lankan-style-plain-hoppers.jpg'),
(39, 'Parata', 340, 'main', 45, 10, 'Discover the flaky goodness of our Parata. A thin and delicate flatbread, made from a mixture of flour, oil, and spices, is cooked to crispy perfection, making for a delicious and versatile accompaniment to a variety of curries and other dishes.          ', 'https://i.ytimg.com/vi/nrNrrveiZjI/maxresdefault.jpg'),
(44, 'Lamprais', 700, 'Main', 5, 1, '              Take a bite out of Sri Lankan tradition with our Lamprais. A savory combination of steamed rice, aromatic spices, and a selection of meats and vegetables, all wrapped in a banana leaf and baked to perfection.            ', '../assets/images/uploads/Lamprais_(SL).jpg'),
(45, 'Dosa', 400, 'Main', 5, 1, '              Indulge in the classic flavors of India with our Dosas. Thin and crispy crepes made from fermented rice flour and lentils are served with a variety of chutneys and sambar, making for a delicious and satisfying meal.            ', '../assets/images/uploads/thumb__700_0_0_0_auto.jpg'),
(46, 'Devilled Chicken', 500, 'Sides', 5, 1, '              Spice up your taste buds with our Devilled Chicken. Tender chunks of chicken are marinated in a blend of spices and chili peppers, then stir-fried to perfection, resulting in a dish that&#039;s both juicy and spicy.            ', '../assets/images/uploads/chicken-devil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `status`) VALUES
(1, 'kushan', 'kushan@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil', 1);


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `occupants` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL DEFAULT 'https://cdnimg.webstaurantstore.com/uploads/seo_category/2019/5/table-dining-sets.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `status`, `table_number`, `occupants`, `img_url`) VALUES
(1, 0, 1, 4, 'https://cdnimg.webstaurantstore.com/uploads/seo_category/2019/5/table-dining-sets.jpg'),
(2, 0, 2, 6, 'https://i.pinimg.com/originals/cd/12/55/cd1255ee9305fff96afa023b5217157e.jpg'),
(3, 0, 3, 8, 'https://www.theguild.lk/EndUserAssets/StoreManagement/Item/aero.jpg?width=600&height=380&mode=crop&scale=both&404=no_image.jpg'),
(4, 0, 4, 4, 'https://cdnimg.webstaurantstore.com/uploads/seo_category/2019/5/table-dining-sets.jpg'),
(5, 0, 5, 6, 'https://i.pinimg.com/originals/cd/12/55/cd1255ee9305fff96afa023b5217157e.jpg'),
(6, 0, 6, 8, 'https://www.theguild.lk/EndUserAssets/StoreManagement/Item/aero.jpg?width=600&height=380&mode=crop&scale=both&404=no_image.jpg'),
(7, 0, 7, 4, 'https://cdnimg.webstaurantstore.com/uploads/seo_category/2019/5/table-dining-sets.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbook`
--

CREATE TABLE `tbook` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `mobile`, `password`, `address`, `type`) VALUES
(11, 'eranga', 'eranga@gmail.com', '1234567890', '$2y$10$GTkEVuEUBfz9q/wbgzx15OW2KFGh.B66ZQDKzFS3.2Yi1s1uGa1bq', 'colombo', 1567),
(12, 'Kushan Gayantha', 'kushangayantha001@gmail.com', '0712720033', '$2y$10$Wf8QIcB0SjlRyHRpLfgfdeFVtVNa4R5nv/L3OY5BpXVc4fr3jdq7G', '201/10 Colombo Road Kurunegala', 1290);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `tbook`
--
ALTER TABLE `tbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_id` (`table_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbook`
--
ALTER TABLE `tbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

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
-- Constraints for table `tbook`
--
ALTER TABLE `tbook`
  ADD CONSTRAINT `tbook_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`),
  ADD CONSTRAINT `tbook_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
