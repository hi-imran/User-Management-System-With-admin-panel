-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2021 at 05:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `order_id`, `pid`, `quantity`, `purchase_price`, `product_name`) VALUES
(1, 1, 1, 10, 30, 'Plain Creamy Cake'),
(2, 1, 10, 5, 100, 'Capsicum Pizza'),
(3, 1, 60, 1, 600, 'Mens Watch'),
(4, 2, 9, 1, 30, 'Vanilla(egg free)'),
(5, 2, 2, 1, 45, 'Pineapple cakes'),
(6, 3, 3, 1, 30, 'Strawberry cakes'),
(7, 4, 10, 1, 100, 'Capsicum Pizza'),
(8, 4, 58, 3, 2222, 'Watch'),
(9, 4, 11, 2, 110, 'Onion Pizza'),
(10, 5, 10, 1, 100, 'Capsicum Pizza'),
(11, 5, 58, 3, 2222, 'Watch'),
(12, 5, 11, 2, 110, 'Onion Pizza'),
(13, 6, 10, 1, 100, 'Capsicum Pizza'),
(14, 6, 58, 3, 2222, 'Watch'),
(15, 6, 11, 2, 110, 'Onion Pizza'),
(16, 7, 10, 1, 100, 'Capsicum Pizza'),
(17, 7, 58, 3, 2222, 'Watch'),
(18, 7, 11, 2, 110, 'Onion Pizza'),
(19, 8, 10, 1, 100, 'Capsicum Pizza'),
(20, 8, 58, 3, 2222, 'Watch'),
(21, 8, 11, 2, 110, 'Onion Pizza'),
(22, 9, 10, 1, 100, 'Capsicum Pizza'),
(23, 9, 58, 3, 2222, 'Watch'),
(24, 9, 11, 2, 110, 'Onion Pizza'),
(25, 10, 10, 1, 100, 'Capsicum Pizza'),
(26, 10, 58, 3, 2222, 'Watch'),
(27, 10, 11, 2, 110, 'Onion Pizza'),
(28, 11, 10, 1, 100, 'Capsicum Pizza'),
(29, 11, 58, 3, 2222, 'Watch'),
(30, 11, 11, 2, 110, 'Onion Pizza'),
(31, 12, 10, 1, 100, 'Capsicum Pizza'),
(32, 12, 58, 3, 2222, 'Watch'),
(33, 12, 11, 2, 110, 'Onion Pizza'),
(34, 13, 10, 1, 100, 'Capsicum Pizza'),
(35, 13, 58, 3, 2222, 'Watch'),
(36, 13, 11, 2, 110, 'Onion Pizza'),
(37, 14, 10, 1, 100, 'Capsicum Pizza'),
(38, 14, 58, 3, 2222, 'Watch'),
(39, 14, 11, 2, 110, 'Onion Pizza'),
(40, 15, 10, 1, 100, 'Capsicum Pizza'),
(41, 15, 58, 3, 2222, 'Watch'),
(42, 15, 11, 2, 110, 'Onion Pizza'),
(43, 15, 3, 11, 30, 'Strawberry cakes'),
(44, 16, 58, 10, 2222, 'Watch'),
(45, 17, 58, 1, 2222, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(6) NOT NULL,
  `cname` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `parent_id` int(6) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `parent_id`) VALUES
(1, 'Cakes and Pastries', 0),
(2, 'Pizzas', 0),
(3, 'Other Foods', 0),
(4, 'Selected GIFTS', 0),
(5, 'Egg', 1),
(6, 'Egg Free', 1),
(7, 'Veg', 2),
(8, 'Nonveg', 2),
(10, 'Clothes', 4),
(11, 'Accessories', 4),
(16, 'Shirts', 10),
(15, 'Jeans', 10);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `timestamp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `fullname`, `email`, `password`, `phone`, `address`, `timestamp`) VALUES
(1, 'Nikhil Narayan', 'ipeg.solutions@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '08620007775', 'D-1105, Koyla Vihar, VIP Road,\r\nNear Haldiram,', '1613535752');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `shipping_fullname` varchar(50) NOT NULL,
  `shipping_phone` varchar(30) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `payment_info` varchar(200) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `shipping_fullname`, `shipping_phone`, `shipping_address`, `payment_info`, `timestamp`, `status`) VALUES
(1, 1, 'Nikhil Narayan', '08620007775', 'D-1105, Koyla Vihar, VIP Road,\r\nNear Haldiram,', 'cod', '1613535752', 'new'),
(2, 1, 'Nikhil Narayan', '+919830662770', 'D-1105, Koyla Vihar, Vip Road\r\nNear haldiram', 'cod', '1613704793', 'new'),
(3, 1, 'Amit', '03242423423', 'modelsachin road\r\nf f fg dg  g fd', 'cod', '1613704823', 'new'),
(17, 1, 'Nikhil Narayan', '+919830662770', 'D-1105, Koyla Vihar, Vip Road\r\nNear haldiram', 'cod', '1614141101', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `details` text COLLATE latin1_general_ci NOT NULL,
  `image` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `price` int(4) NOT NULL DEFAULT 0,
  `cid` int(6) NOT NULL DEFAULT 0,
  `total_views` int(11) NOT NULL,
  `total_sales` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `image`, `price`, `cid`, `total_views`, `total_sales`) VALUES
(1, 'Plain Creamy Cake', 'This is a very good product of Monginis and also very healthy and testy.', 'products/1.jpg', 30, 5, 4, 0),
(2, 'Pineapple cakes', 'This is a very good product of Monginis and also very healthy and testy.', 'products/2.jpg', 45, 5, 0, 0),
(3, 'Strawberry cakes', 'This is a very good product of Monginis and also very healthy and testy.', 'products/3.jpg', 30, 5, 3, 11),
(4, 'Heart-Shaped Cake', 'This is a very good product of Monginis and also very healthy and testy.', 'products/4.jpg', 300, 5, 0, 0),
(5, 'Fruit cakes', 'This is a very good product of Monginis and also very healthy and testy.', 'products/5.jpg', 50, 5, 0, 0),
(8, 'Chocolate(egg free)', 'This is a very good product of Monginis and also very healthy and testy.', 'products/8.jpg', 42, 6, 0, 0),
(9, 'Vanilla(egg free)', 'This is a very good product of Monginis and also very healthy and testy.', 'products/9.jpg', 30, 6, 0, 0),
(10, 'Capsicum Pizza', 'Pizzas are of good quality.', 'products/10.jpg', 100, 7, 0, 1),
(11, 'Onion Pizza', 'Pizzas are of good quality.', 'products/11.jpg', 110, 7, 0, 2),
(12, 'Chicken Pizza', 'Pizzas are of good quality.', 'products/12.jpg', 120, 8, 0, 0),
(13, 'Fish Pizza', 'Pizzas are of good quality.', 'products/13.jpg', 115, 8, 0, 0),
(14, 'Egg Patties', 'Patties are soft and fresh.', 'products/14.jpg', 30, 3, 0, 0),
(15, 'Aloo Patties', 'Patties are soft and fresh.', 'products/15.jpg', 25, 3, 0, 0),
(17, 'Vanilla Ice Creams', 'Fresh and Yummy.', 'products/17.jpg', 25, 3, 0, 0),
(49, 'Popcorn', 'Crispy & Salty', 'products/6.jpg', 15, 3, 0, 0),
(19, 'Aloo Fries', 'Served Hot.', 'products/20.jpg', 190, 3, 0, 0),
(63, 'Red Flared Skirt', 'Increase your glam quotient by wearing this red coloured skirt from the house of Faballey. Made of knit, this skirt is comfortable to wear and skin friendly as well.', 'products/red_skirt.jpg', 630, 10, 0, 0),
(54, 'Black Geometric Print Dress ', 'If you believe in a classy and modish dressing style, then this black coloured dress from Alia Bhatt\'s exclusive collection for Jabong is meant for you. Fashioned from rayon, this dress will ensure a comfortable fit. Team this dress with high heels and a neckpiece for a stunning look.', 'products/black_dress.jpg', 540, 10, 0, 0),
(55, 'Pink Polyurethane (Pu) Handbag', 'Cute and trendy, this pink coloured handbag by Next will tempt you to buy it instantly. It is compact yet can store your important things with ease. Made from polyurethane (pu), it will convince you of its good quality in no time. Fetch a catchy look by just carrying this bag with a simple top and a pair of jeans.', 'products/pink_bag.jpg', 550, 11, 0, 0),
(56, 'Black Tee Shirt', ' Look like an absolute stunner as you make your way to the party wearing this navy blue T-shirt from MANGO. Made from viscose spandex, this T-shirt features a round neck and will be comfortable all day long. This T-shirt can be teamed up with a pair of sequined shorts and stilettos to complete your stylish look.', 'products/black_tee.jpg', 560, 10, 0, 0),
(57, 'Saree', 'Classy, sensuous and versatile are the perfect words to describe this brown coloured saree from Vishal. The chiffon fabric makes this 6.0 m saree easy to drape and carry all day long. Club it with golden danglers and heels to highlight your personality on any occasion.', 'products/saree.jpg', 570, 10, 0, 0),
(58, 'Watch', 'If you have it, flaunt it! If this is your mantra then hit the streets in style wearing this black coloured analog watch for women from the house of Custom. The casing adds more appeal to this timepiece that can be worn on a rainy day, all thanks to its water resistance upto 10 atm.', 'products/watch.jpg', 2222, 11, 1, 14),
(59, 'Blue Tee (Mens)', 'Fall in love with the soft texture of the fabric wearing this regular-fit T-shirt by United Colors of Benetton. Your skin will love the feel of this T-shirt as it is fashioned using the material that is famous for comfort – cotton. Live the moment wearing this T-shirt with casual trousers and flip-flops as you hit the street with best buds.', 'products/blue_tee.jpg', 590, 10, 0, 0),
(60, 'Mens Watch', 'Keep up with time wearing this black coloured analog watch from the house of Fossil. The stainless steel dial and leather strap make this watch for men quite high on quality. Designed with a difference, this watch will be a fantastic addition to your accessory collection.', 'products/mens_watch.jpg', 600, 11, 0, 0),
(61, 'Scarf', 'Charmingly gorgeous is what you’d be once you team up this multicoloured scarf with a sexy top and a pair of denims. While its modal adds to its appeal by making it soft to the touch, its attractive print accentuates its visual appeal. Furthermore, you can also wrap it in varied styles with different outfits and sport a new look every day.', 'products/scarf.jpg', 199, 10, 0, 0),
(62, 'Perfume', 'A refreshing fragrance that uplifts your mood and takes you to a blissful territory is here from Nike. The new gen women can now bask in the subtlety of the scent.\r\n\r\nLong Lasting Protection\r\n\r\nStart your day on a jovial note and stay fresh all day with Up or Down Eau de Toilette that gives you a long lasting protection.', 'products/perfume.jpg', 620, 11, 0, 0),
(106, 'Rainbow Cake', 'Colorful Cake. for yOU', 'products/106_3.jpg', 399, 7, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
