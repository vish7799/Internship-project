-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 12:06 PM
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
-- Database: `ad_companydiscountshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `email`, `logo`, `lastlogin`, `status`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ankit.kaasam@gmail.com', 'abc_1.png', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `category_id` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tag` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fimage` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `company_id`, `category_id`, `title`, `slug`, `tag`, `meta_title`, `meta_keywords`, `meta_description`, `description`, `created_by`, `created_date`, `image`, `fimage`, `status`, `created`, `modified`) VALUES
(1, 0, ',1,', 'The Company Discount Shop Experience', 'unlocking-savings-the-company-discount-shop-experience', ',1,2,2,', 'The Company Discount Shop Experience', 'The Company Discount Shop Experience, ompany Discount Shop, Unlocking Saving', 'Join the millions of satisfied customers who have unlocked incredible savings through Company Discount Shop. Whether you\'re shopping for yourself, your family, or your business, we\'re here to help you make the most of your hard-earned money. Sign up for our newsletter, follow us on social media, and start saving today with Company Discount Shop.', '<p>In a world where every penny counts, finding ways to save money is more crucial than ever. Whether you&#39;re a savvy shopper or a budget-conscious business owner, discovering the best deals and discounts can make a significant difference in your financial well-being. That&#39;s where Company Discount Shop steps in &ndash; your ultimate destination for unlocking unbeatable savings on a wide range of products and services.</p>\r\n\r\n<h3>The Company Discount Shop Difference</h3>\r\n\r\n<p>At Company Discount Shop, we believe in the power of discounts to empower individuals and businesses alike. Our mission is simple yet impactful: to provide our customers with access to exclusive deals and offers that help them stretch their budgets further without compromising on quality or convenience.</p>\r\n\r\n<h3>A Vast Selection of Products and Services</h3>\r\n\r\n<p>One of the key pillars of Company Discount Shop is our extensive selection of products and services. From everyday essentials to luxury indulgences, we offer a diverse range of items to cater to every need and preference. Whether you&#39;re shopping for electronics, fashion, home goods, travel packages, or professional services, you&#39;ll find an array of options at unbeatable prices.</p>\r\n\r\n<h3>Seamless Shopping Experience</h3>\r\n\r\n<p>At Company Discount Shop, we prioritize convenience and efficiency to ensure a seamless shopping experience for our customers. Our user-friendly website and mobile app make it easy to browse, compare, and purchase products and services with just a few clicks or taps. With intuitive search and filtering options, finding the perfect deal has never been simpler.</p>\r\n\r\n<h3>Exclusive Partnerships</h3>\r\n\r\n<p>One of the secrets to our success at Company Discount Shop lies in our strategic partnerships with leading brands and service providers. Through these collaborations, we&#39;re able to negotiate special discounts and offers that are exclusive to our customers. Whether it&#39;s a limited-time promotion or an ongoing deal, you can trust that you&#39;re getting the best value when you shop with us.</p>\r\n\r\n<h3>Savings for Individuals</h3>\r\n\r\n<p>For individual shoppers, Company Discount Shop is a treasure trove of savings waiting to be discovered. Whether you&#39;re planning a family vacation, upgrading your wardrobe, or treating yourself to a well-deserved spa day, our selection of discounts and deals ensures that you can enjoy life&#39;s luxuries without breaking the bank.</p>\r\n\r\n<h3>Benefits for Businesses</h3>\r\n\r\n<p>Business owners also stand to benefit greatly from partnering with Company Discount Shop. Our corporate discount programs offer companies the opportunity to provide valuable perks to their employees, boosting morale and productivity. From discounted travel packages to bulk purchasing deals on office supplies, we help businesses save money while enhancing employee satisfaction.</p>\r\n\r\n<h3>Community Engagement</h3>\r\n\r\n<p>Beyond our commitment to savings, Company Discount Shop is also dedicated to giving back to the community. Through charitable initiatives and partnerships with nonprofit organizations, we strive to make a positive impact on society and support those in need. By shopping with us, you&#39;re not only saving money &ndash; you&#39;re also contributing to meaningful causes and making a difference in the world.</p>\r\n\r\n<h3>Join the Savings Revolution</h3>\r\n\r\n<p>Join the millions of satisfied customers who have unlocked incredible savings through Company Discount Shop. Whether you&#39;re shopping for yourself, your family, or your business, we&#39;re here to help you make the most of your hard-earned money. Sign up for our newsletter, follow us on social media, and start saving today with Company Discount Shop.</p>\r\n', 'Admin', 1714341600, 'blogs_7719_1714396191.jpg', 'blogs_featured_3347_1714396191.jpg', 1, 1714396191, 1715858863),
(2, 0, ',1,', 'Revolutionize Your Home with DISCOUNT Shop', 'revolutionize-your-home-with-discount-shop-where-quality-meets-affordability', ',1,2,2,', 'Revolutionize Your Home with DISCOUNT Shop: Where Quality Meets Affordability', 'Revolutionize Your Home with DISCOUNT Shop: Where Quality Meets Affordability', 'Revolutionize Your Home with DISCOUNT Shop: Where Quality Meets Affordability', '<p>Are you tired of compromising on the quality of your home appliances due to budget constraints? Look no further than DISCOUNT Shop, your one-stop destination for top-tier brands at unbeatable prices. At DISCOUNT Shop, we understand the importance of having reliable appliances that enhance your lifestyle without breaking the bank. That&#39;s why we&#39;re committed to offering you the best deals on a wide range of products, from air conditioners to refrigerators and everything in between.</p>\r\n\r\n<p>Quality You Can Trust</p>\r\n\r\n<p>When it comes to home appliances, quality is non-negotiable. That&#39;s why we partner with trusted brands like Hitachi to bring you products that are built to last. From innovative features to durable construction, our appliances are designed to meet the highest standards of performance and reliability. Whether you&#39;re cooling your home with a Hitachi air conditioner or keeping your food fresh in a Hitachi refrigerator, you can trust that you&#39;re investing in quality that will stand the test of time.</p>\r\n\r\n<p>Unbeatable Prices</p>\r\n\r\n<p>At DISCOUNT Shop, we believe that everyone deserves access to high-quality appliances at affordable prices. That&#39;s why we work tirelessly to negotiate the best deals with our suppliers, allowing us to pass the savings directly on to you, our valued customers. With our competitive pricing and frequent discounts, you can shop with confidence knowing that you&#39;re getting the best possible value for your money. Say goodbye to overpriced appliances and hello to savings that you can actually see.</p>\r\n\r\n<p>Expert Guidance</p>\r\n\r\n<p>Shopping for appliances can be overwhelming, especially with so many options to choose from. That&#39;s where our team of experts comes in. Our knowledgeable staff are here to help you navigate our extensive selection of products, providing personalized recommendations based on your specific needs and preferences. Whether you&#39;re looking for energy-efficient options or space-saving solutions, we&#39;ll work with you to find the perfect appliances for your home.</p>\r\n\r\n<p>Convenience at Your Fingertips</p>\r\n\r\n<p>At DISCOUNT Shop, we believe that shopping for appliances should be convenient and hassle-free. That&#39;s why we&#39;ve created an easy-to-use website that allows you to browse our products, compare prices, and make purchases with just a few clicks. With fast shipping and reliable customer service, we&#39;re here to ensure that your shopping experience is as seamless as possible. Plus, with our flexible payment options, including installment plans, you can get the appliances you need without breaking the bank.</p>\r\n\r\n<p>Join the DISCOUNT Shop Family</p>\r\n\r\n<p>Ready to revolutionize your home with high-quality appliances at unbeatable prices? Join the DISCOUNT Shop family today and experience the difference for yourself. With our commitment to quality, affordability, and customer satisfaction, we&#39;re here to help you create a home that you&#39;ll love for years to come. Shop with us today and see why DISCOUNT Shop is the ultimate destination for all your home appliance needs.</p>\r\n', 'Admin', 1715205600, 'blogs_8510_1715241355.jpg', 'blogs_featured_9677_1715241356.jpg', 1, 1715241356, 1715858850),
(3, 0, ',1,', 'Unbeatable Deals on Top Brands!', 'unbeatable-deals-on-top-brands', ',1,2,', 'Unbeatable Deals on Top Brands!', 'Unbeatable Deals on Top Brands!', 'Unbeatable Deals on Top Brands!', '<p>Welcome to the DISCOUNT Shop blog, your go-to resource for all things home appliances and incredible savings! At DISCOUNT Shop, we&#39;re dedicated to helping you elevate your home with high-quality products from leading brands at prices that won&#39;t break the bank.</p>\r\n\r\n<p>In today&#39;s fast-paced world, having reliable appliances is essential for maintaining a comfortable and efficient home. Whether you&#39;re in need of a new air conditioner to beat the summer heat, a washing machine to tackle laundry day with ease, or a refrigerator to keep your groceries fresh, DISCOUNT Shop has you covered.</p>\r\n\r\n<p>One of the things that set DISCOUNT Shop apart is our commitment to offering unbeatable deals on a wide range of products. We understand that investing in home appliances can be a significant expense, which is why we work tirelessly to negotiate the best prices for our customers. With DISCOUNT Shop, you can shop with confidence knowing that you&#39;re getting the best value for your money.</p>\r\n\r\n<p>But our dedication to savings doesn&#39;t stop there. In addition to our already low prices, we regularly offer special promotions, discounts, and exclusive deals to help you save even more. Whether it&#39;s a seasonal sale, a manufacturer rebate, or a limited-time offer, be sure to check our website frequently for the latest savings opportunities.</p>\r\n\r\n<p>At DISCOUNT Shop, we believe that shopping for home appliances should be easy and stress-free. That&#39;s why we&#39;ve created a user-friendly online shopping experience that allows you to browse our extensive selection, compare products, read reviews, and make informed decisions from the comfort of your own home. And if you ever need assistance, our knowledgeable customer service team is just a phone call or email away.</p>\r\n\r\n<p>But don&#39;t just take our word for it &ndash; hear what our satisfied customers have to say! From families looking to upgrade their kitchen appliances to individuals in need of reliable climate control solutions, DISCOUNT Shop has helped countless customers transform their homes for the better.</p>\r\n\r\n<p>So why wait? Visit DISCOUNT Shop today and discover the unbeatable deals, exceptional service, and endless savings that await you. Whether you&#39;re outfitting a new home or upgrading your existing appliances, we&#39;re here to help you every step of the way. Transform your home with DISCOUNT Shop and experience the difference for yourself!</p>\r\n', 'Admin', 1714946400, 'blogs_8149_1715241958.jpg', 'blogs_featured_6697_1715241958.jpg', 1, 1715241958, 1715241958);

-- --------------------------------------------------------

--
-- Table structure for table `blogs_category`
--

CREATE TABLE `blogs_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs_category`
--

INSERT INTO `blogs_category` (`id`, `parent_id`, `title`, `slug`, `description`, `status`, `created`, `modified`) VALUES
(1, 0, 'General', 'general', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, 1714395473, 1714395473);

-- --------------------------------------------------------

--
-- Table structure for table `blogs_comment`
--

CREATE TABLE `blogs_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs_comment`
--

INSERT INTO `blogs_comment` (`id`, `blog_id`, `name`, `email`, `message`, `status`, `created`) VALUES
(1, 2, 'Ankit Kaasam', 'ankit.kaasam@gmail.com', 'asdfasdfasdf', 0, 1715868997),
(2, 2, 'Ankit   Jain', 'sachin@markonik.com', 'Ready to revolutionize your home with high-quality appliances at unbeatable prices? Join the DISCOUNT Shop family today and experience the difference for yourself. With our commitment to quality, affordability, and customer satisfaction, we\'re here to help you create a home that you\'ll love for years to come. Shop with us today and see why DISCOUNT Shop is the ultimate destination for all your home appliance needs.', 0, 1715869309),
(3, 2, 'Ankit   Jain', 'ankit@amigositsolutions.com', 'Ready to revolutionize your home with high-quality appliances at unbeatable prices? Join the DISCOUNT Shop family today and experience the difference for yourself. With our commitment to quality, affordability, and customer satisfaction, we\'re here to help you create a home that you\'ll love for years to come. Shop with us today and see why DISCOUNT Shop is the ultimate destination for all your home appliance needs.', 0, 1715869935),
(4, 2, 'Ankit Kaasam', 'ankit.kaasam@gmail.com', 'scvasv', 0, 1715869947);

-- --------------------------------------------------------

--
-- Table structure for table `blogs_images`
--

CREATE TABLE `blogs_images` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs_tag`
--

CREATE TABLE `blogs_tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs_tag`
--

INSERT INTO `blogs_tag` (`id`, `title`, `slug`, `description`, `status`, `created`, `modified`) VALUES
(1, 'Company Discount Shop', 'company-discount-shop', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, 1714395505, 1714395505),
(2, '', '', '', 1, 1714396191, 1714396191);

-- --------------------------------------------------------

--
-- Table structure for table `blogs_views_tracker`
--

CREATE TABLE `blogs_views_tracker` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_ip_address` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL,
  `created` bigint(20) NOT NULL,
  `modified` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs_views_tracker`
--

INSERT INTO `blogs_views_tracker` (`id`, `blog_id`, `user_ip_address`, `counter`, `created`, `modified`) VALUES
(1, 2, '::1', 24, 1715868779, 1715870230),
(2, 3, '2401:4900:7a99:8b49:e0da:bcd9:d9e4:3ec8,172.71.134.25', 1, 1722437525, 1722437525);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` bigint(20) NOT NULL,
  `modified` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `slug`, `description`, `image`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created`, `modified`) VALUES
(1, 'About Us', 'about-us', '<p>Welcome to Company Discount Shop, your ultimate destination for unlocking unbeatable savings on a wide range of products and services. Founded on the principles of affordability, convenience, and quality, Company Discount Shop is committed to helping individuals and businesses alike stretch their budgets further without compromising on the things they love.</p>\r\n\r\n<h3>Our Mission</h3>\r\n\r\n<p>At Company Discount Shop, our mission is simple yet impactful: to provide our customers with access to exclusive deals and offers that empower them to live life to the fullest without breaking the bank. We believe that everyone deserves to enjoy the finer things in life, and our goal is to make that a reality by offering incredible discounts on a diverse range of products and services.</p>\r\n\r\n<h3>The Company Discount Shop Experience</h3>\r\n\r\n<p>When you shop with Company Discount Shop, you&#39;re not just saving money &ndash; you&#39;re unlocking a world of possibilities. With our vast selection of discounted products and services, seamless shopping experience, and commitment to customer satisfaction, we strive to make every interaction with us a positive and rewarding one.</p>\r\n\r\n<h3>Why Choose Company Discount Shop?</h3>\r\n\r\n<p>Unbeatable Savings: We pride ourselves on offering the best deals and discounts on everything from electronics and fashion to travel packages and professional services. With exclusive partnerships and special promotions, we ensure that our customers get the most value for their money.<br />\r\nConvenience: Our user-friendly website and mobile app make it easy to browse, compare, and purchase products and services from the comfort of your home or office. With intuitive search and filtering options, finding the perfect deal has never been simpler.<br />\r\nQuality Assurance: While we focus on offering great discounts, we never compromise on quality. We partner with trusted brands and service providers to ensure that every product and service offered through Company Discount Shop meets the highest standards of excellence.<br />\r\nCommunity Engagement: At Company Discount Shop, we believe in giving back to the community. Through charitable initiatives and partnerships with nonprofit organizations, we strive to make a positive impact on society and support those in need.</p>\r\n\r\n<h3>Join the Savings Revolution</h3>\r\n\r\n<p>Join the millions of satisfied customers who have unlocked incredible savings through Company Discount Shop. Whether you&#39;re shopping for yourself, your family, or your business, we&#39;re here to help you make the most of your hard-earned money. Sign up for our newsletter, follow us on social media, and start saving today with Company Discount Shop.</p>\r\n', 'about-us_5823_1715856161.jpg', 'About Us', 'About Us', 'About Us', 1, 1714396845, 1715856162),
(2, 'Home Page intro', 'home-page-int', '<p>Welcome to Comoany DISCOUNT Shop, your ultimate destination for unbeatable deals on a wide range of home appliances. At Comoany DISCOUNT Shop, we pride ourselves on offering top-quality products at discounted prices, ensuring that you can equip your home with the latest and most reliable appliances without breaking the bank.</p>\r\n\r\n<p>Specializing in renowned brands like Hitachi, we bring you an extensive selection of air conditioners, washing machines, refrigerators, and more. Whether you&#39;re upgrading your kitchen, refreshing your laundry room, or enhancing your living space with climate control solutions, we have everything you need to make your house feel like home.</p>\r\n\r\n<p>With our commitment to customer satisfaction, we strive to provide a seamless shopping experience from start to finish. Our knowledgeable staff are here to assist you every step of the way, helping you find the perfect appliances to suit your needs and budget.</p>\r\n\r\n<p>Discover unparalleled value and convenience at Comoany DISCOUNT Shop. Shop with us today and transform your home into a haven of comfort and efficiency!</p>\r\n', '', 'Home Page About Us', 'Home Page About Us', 'Home Page About Us', 1, 1715087409, 1722438945),
(3, 'About Footer', 'about-footer', '<p>Welcome to Comoany DISCOUNT Shop, your ultimate destination for unbeatable deals on a wide range of home appliances. At Comoany DISCOUNT Shop, we pride ourselves on offering top-quality products at discounted prices, ensuring that you can equip your home with the latest and most reliable appliances without breaking the bank.</p>\r\n', '', 'About Footer', 'About Footer', 'About Footer', 1, 1715246395, 1715246395);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `status`, `created`) VALUES
(1, 'Do you offer warranties on your products?', '<p>Absolutely! We understand the importance of peace of mind when making a purchase. That&#39;s why many of our products come with manufacturer warranties to protect you against any unexpected issues. Be sure to check the product description for warranty details or contact our customer service team for assistance.</p>\r\n', '1', '2021-10-06 02:58:51'),
(2, 'What payment methods do you accept?', '<p>We accept a variety of payment methods to make shopping with us as convenient as possible. You can pay for your order using major credit cards, debit cards, PayPal, and other secure payment options. Rest assured that your payment information is always handled securely.</p>\r\n', '1', '2021-10-06 02:59:09'),
(3, 'Do you offer installation services for appliances?', '<p>While we do not provide installation services directly, many of the appliances we sell come with easy-to-follow installation instructions. Additionally, we can recommend reputable installation professionals in your area to help you get your new appliance up and running smoothly.</p>\r\n', '1', '2021-10-06 02:59:27'),
(4, 'What is your return policy?', '<p>We want you to be completely satisfied with your purchase. If for any reason you&#39;re not happy with your order, you can return it within a specified period for a full refund or exchange, subject to our return policy. Please review our Returns &amp; Exchanges page for detailed information on our return process and any applicable fees.</p>\r\n', '1', '2021-10-06 02:59:45'),
(5, 'Do you offer financing options for large purchases?', '<p>Yes, we understand that investing in appliances for your home can be a significant expense. That&#39;s why we offer financing options through select third-party providers to help you spread out the cost of your purchase over time. Visit our Financing page for more information on available options and how to apply.</p>\r\n', '1', '2024-05-09 10:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created`) VALUES
(1, 'Ankit Kaasam', 'ankit.kaasam@gmail.com', '7894561230', 'test Msg', 'Rawat', 0),
(2, 'Ankit   Jain', 'ankit@amigositsolutions.com', '7877994947', 'Test Msg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0),
(3, 'Ankit   Jain', 'ankit@amigositsolutions.com', '07877994947', '07877994947', 'sdsfd', 0),
(4, 'Ankit   Jain', 'ankit@amigositsolutions.com', '07877994947', '07877994947', 'sdsfd', 0),
(5, 'Ankit   Jain', 'ankit@amigositsolutions.com', '07877994947', '07877994947', 'sfdg', 0),
(6, 'Ankit   Jain', 'ankit@amigositsolutions.com', '07877994947', 'Thank You for contacting us. We will get in touch with you shortly!', 'Thank You for contacting us. We will get in touch with you shortly!\r\n', 0),
(7, 'Ankit Kaasam', 'ankit.kaasam@gmail.com', '7877994947', 'Hello', 'Have a question or need assistance? We\'re here to help! Contact Company DISCOUNT Shop\'s friendly customer service team for expert assistance with your home appliance needs. Whether you have inquiries about products, orders, or anything else, we\'re just a message away. Reach out to us via phone, email, or fill out the contact form below, and we\'ll get back to you promptly. Your satisfaction is our priority!', 1715251687),
(8, 'Ankit   Jain', 'ankit@amigositsolutions.com', '07877994947', 'Test Mail', 'Have a question or need assistance? We\'re here to help! Contact Company DISCOUNT Shop\'s friendly customer service team for expert assistance with your home appliance needs. Whether you have inquiries about products, orders, or anything else, we\'re just a message away. Reach out to us via phone, email, or fill out the contact form below, and we\'ll get back to you promptly. Your satisfaction is our priority!', 1715251939);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `offer_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `star_rating` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `created` bigint(20) NOT NULL,
  `modified` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `category_id`, `parent_category_id`, `image`, `price`, `offer_price`, `qty`, `gst`, `star_rating`, `status`, `is_featured`, `meta_title`, `meta_keywords`, `meta_description`, `created`, `modified`) VALUES
(29, 'HITACHI Yoshi 5400FXL 1.8 Ton 4 Star Inverter Split AC (2023 Model, Copper Condenser, Superfine Mesh Filter, RAS.G422PCAISF)', 'hitachi-yoshi-5400fxl-1.8-tr---ras.g422pcaisf', '<ul>\r\n	<li>ice Clean powered by FrostWash Technology</li>\r\n	<li>Long air throw</li>\r\n	<li>Ambience Light</li>\r\n	<li>Hexa Sensor</li>\r\n	<li>1.8 Ton Inverter Split AC, 4 Star Rating</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>2 x Surround Cooling</li>\r\n</ul>\r\n', 12, 1, 'product-6649-1722576433.png', 95700.00, 47500, 1, '', '4 Star', 1, 1, '', '', '', 1722576433, 1722576433),
(30, 'HITACHI YOSHI 5400FXL 1.8 Ton 5 Star Inverter Split AC (2024 MODEL Copper Condenser, Superfine Mesh Filter, RAS.G522PCBISF)', 'hitachi-yoshi-5400fxl-2.0-tr---ras.g522pcaisf', '<ul>\r\n	<li>ice Clean powered by FrostWash Technology</li>\r\n	<li>Long air throw</li>\r\n	<li>Ambience Light</li>\r\n	<li>Hexa Sensor</li>\r\n	<li>Power Consumption: 1675 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>Temperature Sensor, Superfine Mesh Filter and Filter clean indicator</li>\r\n</ul>\r\n', 12, 1, 'product-2144-1722576504.png', 97200.00, 50000, 1, '', '5 Star', 1, 1, '', '', '', 1722576504, 1722576504),
(31, 'Hitachi 1.5 Ton 5 Star Inverter Split AC, G518PCBISF ,Frost Wash, Superfine Mesh Filter, 100% Copper, Tropical Design, 2024', 'hitachi-yoshi-5400fxl-1.5-tr---ras.g518pcbisf', '<ul>\r\n	<li>Ice Clean (FrostWash)</li>\r\n	<li>Surround Cooling (Long Air throw)</li>\r\n	<li>My Mode</li>\r\n	<li>Hexa Sensor Superfine Mesh filter</li>\r\n	<li>Inner Grooved Copper tropical design</li>\r\n	<li>Backlight Remocon</li>\r\n	<li>Auto fan speed</li>\r\n	<li>Auto Mode, 100% Copper, 43 Quality Test</li>\r\n	<li>Dry Mode (Dehumidification)</li>\r\n</ul>\r\n', 11, 1, 'product-8666-1722576583.png', 74100.00, 40800, 1, '', '5 Star', 1, 1, '', '', '', 1722576583, 1722576583),
(35, 'HITACHI iZen 3400FXL 2 Ton 3 Star Inverter Split AC (2023 Model, Copper Condenser, Superfine Mesh Filter, RAS.G324PCAISF)', 'hitachi-izen-3400fxl-2.0-tr---ras.g324pcaisf', '<ul>\r\n	<li>2 Ton Inverter Split AC, 3 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty</li>\r\n	<li>For Rooms up to 260 sq.ft</li>\r\n	<li>Power Consumption: 2450 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>2 x Surround Cooling</li>\r\n</ul>\r\n', 12, 1, 'product-2092-1722577290.png', 81100.00, 44500, 1, '', '3 Star', 1, 1, '', '', '', 1722577290, 1722577290),
(36, 'HITACHI IZEN 3400FXL 1.5 Ton 3 Star Inverter Split AC (2024 Model, Copper Condenser, Superfine Mesh Filter, RAS.G318PCBISF)', 'hitachi-izen-3400fxl-1.5-tr---ras.g318pcbisf', '<ul>\r\n	<li>1.5 Ton Inverter Split AC, 3 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Warranty on Compressor</li>\r\n	<li>For Rooms up to 180 sq.ft</li>\r\n	<li>Power Consumption: 1940 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>Hexa Sensor, Superfine Mesh Filter</li>\r\n</ul>\r\n', 11, 1, 'product-9107-1722577383.png', 63100.00, 33700, 1, '', '3 Star', 1, 1, '', '', '', 1722577383, 1722577383),
(37, 'HITACHI IZen 3400FXL 2 Ton 3 Star Inverter Split AC (2024 Model, Copper Condenser, Superfine Mesh Filter, RAS.G324PCBISF)', 'hitachi-izen-3400fxl-2.0-tr---ras.g324pcbisf', '<ul>\r\n	<li>2 Ton Inverter Split AC, 3 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty</li>\r\n	<li>For Rooms up to 260 sq.ft</li>\r\n	<li>Power Consumption: 2450 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>2 x Surround Cooling</li>\r\n</ul>\r\n', 12, 1, 'product-1838-1722577473.png', 81100.00, 44600, 1, '', '3 Star', 1, 1, '', '', '', 1722577474, 1722577474),
(45, 'HITACHI TOUSHI PLUS 5200XL 1.5 Ton 5 Star Inverter Split AC (2023 Model, Copper Condenser, Superfine Mesh Filter, RAS.E518PCBIB)', 'hitachi-toushi-plus-5200xl-1.5-tr---ras.e518pcbib', '<ul>\r\n	<li>1.5 Ton Dual Inverter Split AC, 5 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Warranty on Compressor</li>\r\n	<li>For Rooms up to 180 sq.ft</li>\r\n	<li>Power Consumption: 1310 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>Superfine Mesh Filter with Filter Clean Indicator, Temperature Sensors</li>\r\n</ul>\r\n', 11, 1, 'product-1541-1722578941.png', 72900.00, 40100, 1, '', '5 Star', 1, 1, '', '', '', 1722578941, 1722578941),
(49, 'HITACHI TOUSHI PLUS 3200XL 1.5 Ton 3 Star Inverter Split AC (Copper Condenser, Superfine Mesh Filter, RAS.E318PCBIB)', 'hitachi-toushi-plus-3200xl-1.5-tr---ras.e318pcbib', '<ul>\r\n	<li>1.5 Ton Inverter Split AC, 3 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Warranty on Compressor</li>\r\n	<li>For Rooms up to 180 sq.ft</li>\r\n	<li>Power Consumption: 1940 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>Temperature Sensor, Superfine Mesh Filter and Filter clean indicator</li>\r\n</ul>\r\n', 11, 1, 'product-3554-1722589539.png', 61900.00, 34000, 1, '', '3 Star', 1, 1, '', '', '', 1722589539, 1722589539),
(51, 'HITACHI Kiyora 5100X 1.5 Ton 5 Star Inverter Split AC (Copper Condenser, Koukin Filter, RSRG518HEEA)', '', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty</li>\r\n	<li>For Rooms up to 180 sqft</li>\r\n	<li>Power Consumption: 1540 Watts</li>\r\n	<li>Refrigerant: R410A</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 11, 1, 'product-5164-1722594260.png', 66600.00, 36000, 1, '', '5 Star', 1, 1, '', '', '', 1722594260, 1722594260),
(52, 'HITACHI 1 Ton 5 Star Inverter Split AC (Copper Condenser, RSRG512HEEA)', '', '<p>1 Ton: - Suitable for small sized rooms ( upto 110 sq ft)</p>\r\n\r\n<p>Warranty: 1&nbsp;years on AC, 10 years on Compressor, 5 years on Controller/PCB</p>\r\n\r\n<p>Copper Condenser Coil: Better cooling and requires low maintenance</p>\r\n\r\n<p>&nbsp;Refrigerant gas: R410a</p>\r\n\r\n<p>Special Features: Tropical Design,Penta Sensor.</p>\r\n\r\n<p>&nbsp;IDU dimension(l * b* h cms): (79.8 * 23.9 * 29.5 cms), ODU dimension (65.8 * 27.4 * 53 cms)</p>\r\n', 10, 1, 'product-2543-1722599503.jpg', 54600.00, 30000, 1, '', '5 Star', 1, 1, '', '', '', 1722599503, 1722599503),
(53, 'SPLIT AC - 1.5TR 3 STAR HITACHI MERAI 3100S INVERTER - RSNG317HCEA', 'split-ac---1.5tr-3-star-hitachi-merai-3100s-inverter---rsng317hcea', '<p>1.5 Ton: - Suitable for small sized rooms ( upto 180 sq ft)</p>\r\n\r\n<p>Warranty: 1&nbsp;years on AC, 5 years on Compressor</p>\r\n\r\n<p>Copper Condenser Coil: Better cooling and requires low maintenance</p>\r\n\r\n<p>&nbsp;Refrigerant gas: R410a</p>\r\n\r\n<p>Special Features: Tropical Design,Penta Sensor.</p>\r\n', 11, 1, 'product-5726-1722599912.jpg', 50490.00, 28500, 1, '', '3 Star', 0, 1, '', '', '', 1722599912, 1722599912),
(54, 'SPLIT AC - 1.5TR HITACHI ZUNOH 3100f - R32 - RSNG318HEDO', 'split-ac---1.5tr-hitachi-zunoh-3100f---r32---rsng318hedo', '<p>1.5 Ton: - fixed speed (Non Inverter)</p>\r\n\r\n<p>Suitable for small sized rooms ( upto 180 sq ft)</p>\r\n\r\n<p>Warranty: 1&nbsp;years on AC, 5 years on Compressor</p>\r\n\r\n<p>Copper Condenser Coil: Better cooling and requires low maintenance</p>\r\n\r\n<p>&nbsp;Refrigerant gas: R32</p>\r\n\r\n<p>Special Features: Tropical Design,Penta Sensor.</p>\r\n', 11, 1, '', 57400.00, 31000, 1, '', 'Non Inverter', 1, 1, '', '', '', 1722600507, 1722600507),
(56, 'SPLIT AC - 1.5TR HITACHI LOGICOOL 3100S INVERTER - R32 - RSM318HFEOBWZ1', 'split-ac---1.5tr-hitachi-logicool-3100s-inverter---r32---rsm318hfeobwz1', '<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Copper Condenser</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">1 Year Comprehensive Warranty, 10 Years Compressor Warranty</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">For Rooms up to 180 sqft</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Power Consumption: 1757 Watts</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Refrigerant: R32</span></span></span></span></li>\r\n</ul>\r\n', 11, 1, 'product-5479-1722601033.jpg', 55700.00, 31000, 1, '', '3 Star', 1, 1, '', '', '', 1722601033, 1722601033),
(57, 'Hitachi 1.5 Ton 5 Star Inverter Split AC (Copper, Dust Filter, 2022 Model, RSRG518HFEOZ1, White)', '', '<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Copper Condenser</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">1 Year Comprehensive Warranty, 10 Years Compressor Warranty, 5 years PCB/Controller warranty</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">For Rooms up to 180 sqft</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Power Consumption: 1757 Watts</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Refrigerant: R32</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#0f1111\">Cooling Power&nbsp;18000 British Thermal Units</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#0f1111\">Special Feature : Inverter Compressor, High Density Filter, Anti Bacterial Filter, Dehumidifier, Fast Cooling</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#0f1111\">Product Dimensions&nbsp;21.3D x 68.8W x 33.2H Centimeters</span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', 11, 1, 'product-7165-1722601636.jpg', 75990.00, 36000, 1, '', '5 Star', 1, 1, '', '', '', 1722601636, 1722601636),
(58, 'HITACHI Shizen 3100S 1.5 Ton 3 Star Inverter Split AC (Copper Condenser, Anti Bacterial Filter, RSQG318HFEOF)', '', '<ul>\r\n	<li>1.5 Ton Inverter AC, 3 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty</li>\r\n	<li>For Rooms up to 180 sqft</li>\r\n	<li>Power Consumption: 1757 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n</ul>\r\n', 11, 1, 'product-1044-1722844250.jpg', 56490.00, 31000, 1, '', '3 Star', 1, 1, '', '', '', 1722601834, 1722601834),
(59, 'HITACHI Shizen 3100S 2 Ton 3 Star Inverter Split AC (2022 Model, Copper Condenser, Superfine Mesh Filter, RMRG324HFEOZ1 / RMRG324HEEA))', 'split-ac---2.0tr-hitachi-shizen-3100s-inverter---r32---rmrg324hfeoz1', '<ul>\r\n	<li>2 Ton Inverter AC, 3 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty</li>\r\n	<li>For Rooms up to 260 sqft</li>\r\n	<li>Refrigerant: R32 / R410A</li>\r\n</ul>\r\n', 12, 1, 'product-5935-1722603823.jpg', 75400.00, 43000, 1, '', '3 Star', 1, 1, '', '', '', 1722603337, 1722603337),
(60, 'HITACHI Shizen 3100S 2 Ton 5 Star Inverter Split AC (2022 Model, Copper Condenser, Superfine Mesh Filter, RMRG524HEEA)', '', '<ul>\r\n	<li>2 Ton Inverter AC, 3 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty</li>\r\n	<li>For Rooms up to 260 sqft</li>\r\n	<li>Refrigerant: R32 / R410A</li>\r\n</ul>\r\n', 12, 1, 'product-3434-1722604618.jpg', 75400.00, 50000, 1, '', '5 Star', 1, 1, '', '', '', 1722604618, 1722604618),
(61, 'HITACHI Kiyora 5200FX 1.5 Ton 5 Star Inverter Split AC (Copper Condenser, Anti Bacterial Filter, RSRG518FFEO)', 'split-ac---1.5tr-hitachi-kiyora-5200fx-i-fresh-inverter---r32---rsrg518ffeo', '<ul>\r\n	<li>1.5 Ton Inverter AC, 5 Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty, 5 years PCB/controller warranty</li>\r\n	<li>For Rooms up to 180 sqft</li>\r\n	<li>Power Consumption: 1330 Watts</li>\r\n	<li>Refrigerant: R32</li>\r\n	<li>Frost wash technology:&nbsp;The indoor unit coil gathers dust over time. Freeze it, Melt it, and Clean it with the simple push of a button. Put your maintenance worries to rest. Your air conditioner will stay clean with frost wash.</li>\r\n</ul>\r\n', 11, 1, 'product-8266-1722843872.jpg', 69900.00, 38500, 1, '', '5 Star', 1, 1, '', '', '', 1722605133, 1722605133),
(62, 'HITACHI 1 Ton 3 Star Inverter Split AC (Copper Condenser, RSRG312HFEOZ1)', '', '<p>1 Ton: - Suitable for small sized rooms ( upto 110 sq ft)</p>\r\n\r\n<p>Warranty: 1&nbsp;years on AC, 10 years on Compressor, 5 years on Controller/PCB</p>\r\n\r\n<p>Copper Condenser Coil: Better cooling and requires low maintenance</p>\r\n\r\n<p>&nbsp;Refrigerant gas: R32</p>\r\n\r\n<p>Special Features: Tropical Design,Penta Sensor.</p>\r\n\r\n<p>&nbsp;IDU dimension(l * b* h cms): (79.8 * 23.9 * 29.5 cms), ODU dimension (65.8 * 27.4 * 53 cms)</p>\r\n', 10, 1, 'product-1070-1722843890.jpg', 48200.00, 26500, 1, '', '3 Star', 1, 1, '', '', '', 1722605387, 1722605387),
(63, 'Hitachi 1.5 Ton 3 Star Inverter Split AC Merai 3100S Champion RSNG318HDEAZ2', 'hitachi-1.5-ton-3-star-inverter-split-ac-merai-3100s-champion-rsng318hdeaz2', '<p>1.5 Ton: - Suitable for small sized rooms ( upto 180 sq ft)</p>\r\n\r\n<p>Warranty: 1&nbsp;years on AC, 10 years on Compressor</p>\r\n\r\n<p>Copper Condenser Coil: Better cooling and requires low maintenance</p>\r\n\r\n<p>&nbsp;Refrigerant gas: R410a</p>\r\n\r\n<p>Special Features: Tropical Design,Penta Sensor.</p>\r\n', 11, 1, 'product-7774-1722844073.jpg', 53400.00, 29300, 1, '', '3 Star', 1, 1, '', '', '', 1722606084, 1722606084),
(64, 'SPLIT AC - 1.0 TON 3 STAR HITACHI SHIZEN 3100S  INVERTER - R410A - RAPG311HEEA', 'split-ac---1.0-ton-3-star-hitachi-shizen-3100s--inverter---r410a---rapg311heea', '<p>1 Ton: - Suitable for small sized rooms ( upto 110 sq ft)</p>\r\n\r\n<p>Warranty: 1&nbsp;years on AC, 10 years on Compressor</p>\r\n\r\n<p>Copper Condenser Coil: Better cooling and requires low maintenance</p>\r\n\r\n<p>&nbsp;Refrigerant gas: R410a</p>\r\n\r\n<p>Special Features: Tropical Design,Penta Sensor.</p>\r\n', 10, 1, 'product-1276-1722844153.jpg', 48200.00, 26500, 1, '', '3 Star', 1, 1, '', '', '', 1722606156, 1722606156),
(65, 'Hitachi 1.5 Ton 3 Star Hot and Cold Split Inverter AC - White  (RSNG318HDXA, Copper Condenser)', '', '<ul>\r\n	<li>1.5 Ton Hot &amp; Cold Inverter AC, 3&nbsp;Star Rating</li>\r\n	<li>Copper Condenser</li>\r\n	<li>1 Year Comprehensive Warranty, 10 Years Compressor Warranty</li>\r\n	<li>For Rooms up to 180 sqft</li>\r\n	<li>Power Consumption: 1935 Watts</li>\r\n	<li>Refrigerant: R410A</li>\r\n	<li>Penta Sensor, Stepless Compressor Control</li>\r\n</ul>\r\n', 11, 1, 'product-9364-1722844179.jpg', 59500.00, 36000, 1, '', '3 Star', 1, 1, '', '', '', 1722606516, 1722606516),
(66, 'Hitachi 1.5 Ton 3 Star Inverter Split AC (Copper, Dust Filter, 2022 Model, RSQG318HEEA, White)', 'split-ac---1.5tr-hitachi-shizen-3100s--inverter---r410a---rsqg318heea', '<p>&nbsp;</p>\r\n\r\n<p>Cooling Power 17400 British Thermal Unit</p>\r\n\r\n<p>Special Feature&nbsp;One Touch Silent Fan speed, Soft Dry, Eco Green Referegerant - R410A, Super Cool, Auto Fan Speed</p>\r\n\r\n<p>Product Dimensions&nbsp;&nbsp;20.8D x 67.6W x 33.2H Centimeters</p>\r\n\r\n<p>&nbsp;</p>\r\n', 11, 1, 'product-3724-1722844199.jpg', 57900.00, 31000, 1, '', '3 Star', 1, 1, '', '', '', 1722606911, 1722606911),
(67, 'Hitachi RAW222KVD Kaze Window AC (2 Ton, 2 Star Rating, White, Copper)', '', '<ul>\r\n	<li>2 Tons</li>\r\n	<li>2 Star Rating</li>\r\n	<li>2 Ton Capacity</li>\r\n	<li>Copper Condenser Coil</li>\r\n	<li>1 year on product and 4 years on compressor</li>\r\n	<li>75 x 60 x 43 Centimeters (L B H)</li>\r\n</ul>\r\n', 15, 2, 'product-9614-1722691798.jpg', 39490.00, 24000, 1, '', '3 Star', 1, 1, '', '', '', 1722686572, 1722686572),
(68, 'HITACHI 1.5 Ton 5 Star, Window Inverter AC (Copper, 100% cooling at 43 degree Celsius, 2023 Model, SHIZUKA- RAW518HGEOZ1, White)', '', '<ul>\r\n	<li>Filter Clean Indicator</li>\r\n	<li>Stepless Compressor Control</li>\r\n	<li>100% Cooling Capacity at 43&deg;C</li>\r\n	<li>100% Inner Grooved Copper Tube</li>\r\n	<li>SuperSlit Fins</li>\r\n	<li>Green Refrigerant</li>\r\n	<li>Xpanded Voltage Surge Protection</li>\r\n	<li>Quality Test</li>\r\n	<li>Anti-Corrosive Coating</li>\r\n</ul>\r\n', 11, 1, 'product-3088-1722691574.jpg', 48600.00, 29500, 1, '', '5 Star', 1, 1, '', '', '', 1722686778, 1722686778),
(69, 'Voltas Beko by A Tata Product 228 L Frost Free Double Door 1 Star Refrigerator  (Brushed Silver, RFF265E / W0XIR0I0000GO)', '', '<ul>\r\n	<li>228 L : Good for couples and small families</li>\r\n	<li>Reciprocating Compressor</li>\r\n	<li>1 Star : For Energy savings up to 20%</li>\r\n	<li>Frost Free : Auto fridge defrost to stop ice-build up</li>\r\n	<li>\r\n	<table>\r\n		<tbody>\r\n			<tr>\r\n				<td>Net Height</td>\r\n				<td>\r\n				<ul>\r\n					<li>1467 mm</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Net Depth</td>\r\n				<td>\r\n				<ul>\r\n					<li>658 mm</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Net Width</td>\r\n				<td>\r\n				<ul>\r\n					<li>600 mm</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</li>\r\n</ul>\r\n', 3, 0, 'product-5727-1722687319.jpg', 35990.00, 16500, 0, '', '', 1, 1, '', '', '', 1722687319, 1722687319),
(70, '251 L 2 Star Frost Free Double Door Refrigerator (Emeria Blue) RFF2753EBCF', '', '<ul>\r\n	<li>2 star rating</li>\r\n	<li>StoreFresh+<sup>TM</sup></li>\r\n	<li>Neo Frost<sup>TM</sup>&nbsp;Dual Cooling</li>\r\n	<li>ProSmart<sup>TM</sup>&nbsp;Inverter Compressor</li>\r\n	<li>Active Fresh Blue Light</li>\r\n	<li>Warranty &nbsp; : &nbsp;&nbsp;2 year comprehensive + additional 10 year on compressor</li>\r\n	<li>WxDxH (cm) &nbsp; : &nbsp;&nbsp;54 x 60 x 155</li>\r\n</ul>\r\n', 3, 0, 'product-3821-1722688800.jpg', 35790.00, 16500, 0, '', '', 1, 1, '', '', '', 1722688800, 1722688800),
(71, '251 L 2 Star Frost Free Double Door Refrigerator (Emeria Red) RFF2753ERCF', '', '<h2>Key Features</h2>\r\n\r\n<ul>\r\n	<li>2 star rating</li>\r\n	<li>StoreFresh+<sup>TM</sup></li>\r\n	<li>Neo Frost<sup>TM</sup>&nbsp;Dual Cooling</li>\r\n	<li>ProSmart<sup>TM</sup>&nbsp;Inverter Compressor</li>\r\n	<li>Active Fresh Blue Light</li>\r\n	<li>Warranty &nbsp; : &nbsp;&nbsp;2 year comprehensive + additional 10 year on compressor</li>\r\n	<li>WxDxH (cm) &nbsp; : &nbsp;&nbsp;54 x 60 x 155</li>\r\n</ul>\r\n', 3, 0, 'product-6437-1722689087.jpg', 35790.00, 16500, 1, '', '', 1, 1, '', '', '', 1722689037, 1722689037),
(72, 'BOSCH 7 kg 1200RPM Fully Automatic Front Load Washing Machine Black, Silver  (WAJ24262IN)', '', '<ul>\r\n	<li>Fully Automatic Front Load Washing Machines have Great Wash Quality with very less running cost</li>\r\n	<li>1200 rpm : Higher the spin speed, lower the drying time</li>\r\n	<li>Number of wash programs - 15</li>\r\n	<li>7 kg</li>\r\n</ul>\r\n', 4, 0, 'product-1776-1722689406.jpg', 40900.00, 25000, 1, '', '', 1, 1, '', '', '', 1722689406, 1722689406),
(73, 'BOSCH 6.5 kg 1200RPM Fully Automatic Front Load Washing Machine with In-built Heater Silver  (WAJ2426IIN)', '', '<ul>\r\n	<li>Fully Automatic Front Load Washing Machines have Great Wash Quality with very less running cost</li>\r\n	<li>1200 rpm : Higher the spin speed, lower the drying time</li>\r\n	<li>5 Star Rating</li>\r\n	<li>6.5 kg</li>\r\n</ul>\r\n', 4, 0, 'product-8712-1722689504.jpg', 46300.00, 23000, 1, '', '', 1, 1, '', '', '', 1722689504, 1722689504),
(74, 'BOSCH 8 kg 1400RPM Fully Automatic Front Load Washing Machine Silver  (WAJ2846SIN)', '', '<ul>\r\n	<li>Fully Automatic Front Load Washing Machines have Great Wash Quality with very less running cost</li>\r\n	<li>1400 RPM : Higher the spin speed, lower the drying time</li>\r\n	<li>5 Star Rating</li>\r\n	<li>8 kg</li>\r\n</ul>\r\n', 4, 0, 'product-3760-1722689596.jpg', 50500.00, 29000, 1, '', '', 1, 1, '', '', '', 1722689596, 1722689596),
(75, 'canisters - tall body', 'canisters---tall-body', '<p>Brand Bhalaria</p>\r\n\r\n<p>tall body canisters (ubha dabba) available from 1kg to 10kg storage capacity.</p>\r\n\r\n<p>made with 304 grade, thick gauge, stainless steel</p>\r\n\r\n<p>ideal for storage of dry grocery</p>\r\n\r\n<p>see through lid option available</p>\r\n', 7, 5, 'product-2207-1723021094.jpg', 330.00, 190, 0, '', '', 1, 1, '', '', '', 1723021094, 1723021094),
(76, 'kadai triply', 'kadai-triply', '<p>brand bhalaria</p>\r\n\r\n<p>size available from 22cm to 34 cm inner dia</p>\r\n\r\n<p>Stainless Steel</p>\r\n\r\n<p>Lid optional</p>\r\n\r\n<ul>\r\n	<li>Features: 100% Non-Toxic Food Grade stainless steel | Less oil and fuel required (saves 50% energy) | 2X Faster cooking | Sturdy &amp; Durable | Compatible on Gas, Induction and Electric Stove. dishwasher safe</li>\r\n	<li>Material: INNER BODY - 18/8 (304) stainless steel, MIDDLE LAYER - high grade aluminum sheet for uniform heating, OUTER LAYER - 18/0 induction friendly stainless steel | 360&deg; Induction Base</li>\r\n	<li>Ideal for: Deep-frying vegetable &amp; snacks, Seafood, Meat, Preparing curry etc.</li>\r\n</ul>\r\n', 6, 5, 'product-2802-1723026063.jpg', 2350.00, 1250, 0, '', '', 1, 1, '', '', '', 1723026063, 1723026063),
(77, 'tea coffee sugar canister set', 'tea-coffee-sugar-canister-set', '<ul>\r\n	<li>High polish, Superior finish, Food grade</li>\r\n	<li>Dishwasher safe , Strong and sturdy</li>\r\n	<li>Easy to wash and clean</li>\r\n	<li>Color: Silver, Material: Stainless steel</li>\r\n	<li>Dimension: Dia - 9 cm, Height - 15.5 cm</li>\r\n	<li>Included components: 3 Canisters (75ml each)</li>\r\n</ul>\r\n', 7, 5, 'product-7075-1723123972.jpg', 700.00, 360, 0, '', '', 1, 0, '', '', '', 1723123972, 1723123972),
(78, 'stainless steel whisk', 'stainless-steel-whisk', '<p>1Pc Milk and Egg Beater Blender Wisk Size:21 x6 cm</p>\r\n\r\n<p>Color : Silver Black Utility kitchen Gadget in! Great Whisks for family members who cook and bake a lot. They love them! Easy to use and clean Blend your cake batters, fresh creams, soups or eggs with ease. The semi-automatic mechanism save a lot of energy when your blending or mixing. .</p>\r\n\r\n<p>Whisk Features: Polished stainless steel wires and narrow shape are perfect for whisking in a small bowl or container Attention to wire spacing, radius curve and overall length to match cooking need and preference Each Whisk comes with 202 Grade Stainless Steel Whisk that does not rust and will not leak rust particles when using the blender Stainless Steel does not stain like plastics, silicone or rubber and will last for a long time.</p>\r\n', 8, 5, 'product-6143-1723124419.jpg', 300.00, 130, 0, '', '', 1, 0, '', '', '', 1723124419, 1723124419),
(79, 'cheese grater', 'cheese-grater', '<ul>\r\n	<li>Pierced handle for convenient hanging on kitchen hooks</li>\r\n	<li>Ideal for grating cheese, garlic, ginger, lemon zest, rooted spices and more</li>\r\n	<li>Made from high-quality, 100% food-grade stainless steel, for safe, hygienic and rust-free use</li>\r\n	<li>Easy-to-hold ergonomic handle</li>\r\n</ul>\r\n', 8, 5, 'product-8125-1723124675.jpg', 180.00, 70, 0, '', '', 1, 0, '', '', '', 1723124675, 1723124675),
(80, 'frypan triply', 'frypan-triply', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>BHALARIA METAL CRAFT</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Stainless Steel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>Electric Stove, Induction Stovetop Compatible</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Silver</td>\r\n		</tr>\r\n		<tr>\r\n			<td>size</td>\r\n			<td>22cm, 24cm, 26cm inner dia</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Compatible Devices</td>\r\n			<td>Smooth Surface Induction, Gas, Electric Coil</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 6, 5, 'product-2676-1723124991.jpg', 1900.00, 1000, 0, '', '', 1, 0, '', '', '', 1723124991, 1723124991),
(81, 'lemon sqeezer with bottle opener', 'lemon-sqeezer-with-bottle-opener', '<ul>\r\n	<li>Stainless Steel: Food Grade 100% Stainless Steel</li>\r\n	<li>Lemon Squeezer With Soda Opener Without Any Side edges</li>\r\n	<li>Easy to Operate and easy to clean</li>\r\n</ul>\r\n', 8, 5, 'product-2525-1723125283.jpg', 490.00, 230, 0, '', '', 1, 0, '', '', '', 1723125283, 1723125283),
(82, 'Prestige clip-on pressure cooker 5 L', 'prestige-clip-on-pressure-cooker-5-l', '<ul>\r\n	<li>It has a unique lid with spillage control</li>\r\n	<li>Maximum safety with alpha base bottom</li>\r\n	<li>Heavy gauge stainless steel &amp; toughened steel lid</li>\r\n	<li>It is induction and gas compatible</li>\r\n	<li>It has heat resistant handle</li>\r\n	<li>It is made of high-quality material that ensures durability</li>\r\n</ul>\r\n', 6, 5, 'product-4793-1723134288.jpg', 4800.00, 3100, 0, '', '', 1, 0, '', '', '', 1723134288, 1723134288),
(83, 'Prestige Roti Tawa', 'prestige-roti-tawa', '<ul>\r\n	<li>It has a unique lid with spillage control</li>\r\n	<li>Maximum safety with alpha base bottom</li>\r\n	<li>Heavy gauge stainless steel &amp; toughened steel lid</li>\r\n	<li>It is induction and gas compatible</li>\r\n	<li>It has heat resistant handle</li>\r\n	<li>It is made of high-quality material that ensures durability</li>\r\n	<li>Generic Name - Cookware</li>\r\n</ul>\r\n', 6, 5, 'product-6320-1723134598.jpg', 1260.00, 850, 0, '', '', 1, 0, '', '', '', 1723134598, 1723134598),
(84, 'Pizza cutter 4\" wheel', 'pizza-cutter-4\"-wheel', '<p>Made of high quality stainless steel pizza cutter. The design of this pizza cutter is very attractive and comfortable. The blade of the cutter is made of stainless steel and handle is made of good quality of plastic and it has a soft grip and it cut the pizza very effectively. It is perfect for modern kitchens with 100 percent abs body. It features a thumb guard for added safety. It may be the perfect gift for pizza lovers and today it is essential tool for modern kitchen. It is used to cutting for pizza, sandwich, burger, bread, chili, coriander, and cottage cheese. Pizza cutter features a durable, sharp stainless steel blade for cutting pizza, pie crust and pastry dough.</p>\r\n', 8, 5, 'product-3184-1723134846.jpg', 400.00, 250, 0, '', '', 1, 0, '', '', '', 1723134846, 1723134846),
(85, 'PRESTIGE NONSTICK GRANITE FINISH FRYPAN 260MM', 'prestige-nonstick-granite-finish-frypan-260mm', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Type: Fry</li>\r\n	<li>Non-stick, Dishwasher Safe</li>\r\n	<li>Lid Included, Induction Bottom</li>\r\n	<li>Capacity: 1.7 L</li>\r\n	<li>Diameter: 26&nbsp;cm</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n', 6, 5, 'product-6561-1723179743.jpg', 1420.00, 900, 0, '', '', 1, 0, '', '', '', 1723179743, 1723179743),
(86, 'prestige electric kettle 1.7Ltr', 'prestige-electric-kettle-1.7ltr', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Prestige</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Silver</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>Wide Mouth</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Package Information</td>\r\n			<td>Kettle</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Finish Type</td>\r\n			<td>Polished</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Dimensions</td>\r\n			<td>17.5L x 14W x 23.5H Centimeters</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Included Components</td>\r\n			<td>1 Kettle, Warranty Card</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Care Instructions</td>\r\n			<td>Should not wash the base of the kettle</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cable Length</td>\r\n			<td>3.2 Feet</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>PKGSS 1.7</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 6, 5, 'product-2307-1723180033.jpg', 1300.00, 700, 0, '', '', 1, 0, '', '', '', 1723180033, 1723180033),
(87, 'Dinner plate apple style', 'dinner-plate-apple-style', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>Stainless Steel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>bhalaria</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Silver</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>Daily Use</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Style</td>\r\n			<td>Traditional</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sizes</td>\r\n			<td>8cm to 15 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Seasons</td>\r\n			<td>All Seasons</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Recommended Uses For Product</td>\r\n			<td>Single meal like Daliya, Poha, Upma, Daal chawal, Rajma Chawal</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 9, 5, 'product-6546-1723181111.jpg', 310.00, 190, 0, '', '', 1, 0, '', '', '', 1723181111, 1723181111);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` bigint(20) NOT NULL,
  `modified` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `slug`, `description`, `parent`, `image`, `status`, `created`, `modified`) VALUES
(1, 'Split AC', 'split-ac', '<p>Experience unparalleled cooling comfort with Hitachi ACs. As a leader in air conditioning technology, Hitachi offers a diverse range of innovative cooling solutions tailored to suit every need. From sleek split systems to compact window units and versatile portable models, our air conditioners are designed to deliver superior performance and reliability. With advanced features and cutting-edge technology, Hitachi ACs ensure rapid cooling, energy efficiency, and smart functionality. Take control of your indoor climate with ease using Wi-Fi connectivity and intuitive controls. Enhance the aesthetics of your space with our stylish and modern designs, seamlessly blending into any interior d&eacute;cor. Explore our comprehensive range of Hitachi ACs and elevate your indoor comfort to new heights.</p>\r\n', 0, '3619_1714380549.png', 1, 1714380549, 1714380549),
(2, 'Window AC', 'window-ac', '<p>Experience unparalleled cooling comfort with Hitachi ACs. As a leader in air conditioning technology, Hitachi offers a diverse range of innovative cooling solutions tailored to suit every need. From sleek split systems to compact window units and versatile portable models, our air conditioners are designed to deliver superior performance and reliability. With advanced features and cutting-edge technology, Hitachi ACs ensure rapid cooling, energy efficiency, and smart functionality. Take control of your indoor climate with ease using Wi-Fi connectivity and intuitive controls. Enhance the aesthetics of your space with our stylish and modern designs, seamlessly blending into any interior d&eacute;cor. Explore our comprehensive range of Hitachi ACs and elevate your indoor comfort to new heights.</p>\r\n', 0, '7617_1714380571.png', 1, 1714380571, 1714380571),
(3, 'Refrigerator', 'refrigerator', '<p>Step into the world of freshness and convenience with our extensive collection of refrigerators. From keeping your fruits and vegetables crisp to preserving leftovers and frozen treats, our refrigeration solutions are designed to cater to all your food storage needs.</p>\r\n\r\n<p>Explore a diverse range of refrigerators including French door, side-by-side, top freezer, and bottom freezer models, each offering unique features to suit your lifestyle. With advanced technologies like frost-free cooling, adjustable shelves, and energy-efficient compressors, our refrigerators ensure optimal freshness while minimizing energy consumption.</p>\r\n\r\n<p>Discover the perfect refrigerator to complement your kitchen d&eacute;cor and lifestyle requirements. Whether you&#39;re upgrading your current appliance or furnishing a new home, our range of stylish and reliable refrigerators guarantees to keep your food fresh and your kitchen organized.</p>\r\n', 0, '9112_1714380626.png', 1, 1714380626, 1714380626),
(4, 'Washing Machine', 'washing-machine', '<p>Step into the world of hassle-free laundry with our diverse range of washing machines. Designed to simplify your laundry routine and deliver exceptional cleaning performance, our washing machines combine cutting-edge technology with user-friendly features.</p>\r\n\r\n<p>Explore our collection of washing machines tailored to meet your specific needs, whether you require a compact and efficient model for a small space or a large-capacity machine to tackle heavy loads. From top-loading to front-loading, and from sleek modern designs to traditional options, we have the perfect washing machine to suit any lifestyle and aesthetic preference.</p>\r\n\r\n<p>Discover the convenience of advanced features such as multiple wash cycles, energy-efficient operation, and innovative technology that ensures your clothes are treated with care while achieving superior cleanliness. Say goodbye to laundry day stress and hello to effortless washing with our selection of washing machines.</p>\r\n', 0, '3448_1714380666.png', 1, 1714380666, 1714380666),
(5, 'Utensils', 'utensils', '<p>Step into a world of culinary elegance with our exquisite collection of crockery. Elevate your dining experience and impress your guests with our stunning range of dinnerware, serving pieces, and accessories. From classic designs to modern aesthetics, our crockery is crafted with precision and attention to detail to meet the diverse tastes and preferences of our customers.</p>\r\n\r\n<p>Explore our curated selection of:</p>\r\n\r\n<p>Dinner Sets: Discover complete dinner sets featuring plates, bowls, and side dishes in a variety of styles and patterns to suit any occasion.<br />\r\nServing Platters and Bowls: Present your culinary creations in style with our range of elegant serving platters, bowls, and trays.<br />\r\nDrinkware: Sip in style with our collection of glasses, mugs, and cups designed for both hot and cold beverages.<br />\r\nAccessories: Add the finishing touches to your table setting with our range of accessories, including napkin holders, salt and pepper shakers, and more.<br />\r\nBro</p>\r\n', 0, '8488_1714380861.png', 1, 1714380861, 1714380861),
(6, 'Cookware', 'cookwar', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"http://localhost/companydiscountshop/admin/productcategory/edit_productcategory/7\">Cooking</a></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 5, '5232_1722927243.png', 1, 1722927243, 1722927243),
(7, 'Storage', 'storage', '<p>Storage</p>\r\n', 5, '1089_1722927270.png', 1, 1722927270, 1722927270),
(8, 'Kitchen Tools', 'kitchen-tools', '<p>Kitchen Tools</p>\r\n', 5, '6565_1722927368.png', 1, 1722927368, 1722927368),
(9, 'Cutlery', 'cutlery', '<p>Cutlery</p>\r\n', 5, '8259_1722927393.png', 1, 1722927393, 1722927393),
(10, '1 Ton Split AC', '1-ton-split-ac', '<p>1.5 ton split ac</p>\r\n', 1, '7948_1723118482.png', 1, 1723118482, 1723118482),
(11, '1.5 Ton Split AC', '1.5-ton-split-ac', '<p>1.5 ton split ac</p>\r\n', 1, '8186_1723118502.png', 1, 1723118502, 1723118502),
(12, '2 Ton Split AC', '2-ton-split-ac', '<p>2 Ton Split AC</p>\r\n', 1, '7291_1723118536.png', 1, 1723118536, 1723118536),
(13, '1 Ton Window AC', '1-ton-window-ac', '<p>2 Ton Window AC</p>\r\n', 2, '1208_1723118572.png', 1, 1723118572, 1723118572),
(14, '1.5 Ton Window AC', '1.5-ton-window-ac', '<p>2 Ton Window AC</p>\r\n', 2, '8115_1723118588.png', 1, 1723118588, 1723118588),
(15, '2 Ton Window AC', '2-ton-window-ac', '<p>2 Ton Window AC</p>\r\n', 2, '4105_1723118623.png', 1, 1723118623, 1723118623);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'product-2415-17143981201.jpg'),
(2, 2, 'product-1377-17150917611.jpg'),
(3, 3, 'product-7722-17150922911.jpg'),
(4, 4, 'product-2833-17150923521.jpg'),
(5, 5, 'product-7613-17150930111.png'),
(6, 6, 'product-8353-17150930981.png'),
(7, 7, 'product-5701-17150932041.png'),
(8, 8, 'product-6759-17150933121.png'),
(9, 9, 'product-9339-17224842611.jpg'),
(10, 9, 'product-9339-17224842612.jpg'),
(11, 9, 'product-9339-17224842613.jpg'),
(12, 9, 'product-9339-17224842614.jpg'),
(13, 9, 'product-9339-17224842615.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_inquiry`
--

CREATE TABLE `product_inquiry` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_inquiry`
--

INSERT INTO `product_inquiry` (`id`, `product_id`, `name`, `email`, `mobile`, `message`, `created`) VALUES
(1, 3, 'ankit jain', 'ankit.kaasam@gmail.com', '09461212346', 'Have a question or need assistance? We\'re here to help! Contact Company DISCOUNT Shop\'s friendly customer service team for expert assistance with your home appliance needs. Whether you have inquiries about products, orders, or anything else, we\'re just a message away. Reach out to us via phone, email, or fill out the contact form below, and we\'ll get back to you promptly. Your satisfaction is our priority!', 1715853726),
(2, 8, 'Rahul Jain', 'rahul@gmail.com', '8528528520', 'service team for expert assistance with your home appliance needs. Whether you have inquiries about products, orders, or anything else, we\'re just a message away. Reach out to us via phone, email, or fill out the contact form below, and we\'ll get back to you promptly. Your satisfaction is our priority', 1715941763),
(3, 6, 'Priya Sharma', 'piyush@gmail.com', '7537417890', 'service team for expert assistance with your home appliance needs. Whether you have inquiries about products, orders, or anything else, we\'re just a message away. Reach out to us via phone, email, or fill out the contact form below, and we\'ll get back to you promptly. Your satisfaction is our priority', 1715941811);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `field` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `field`, `value`) VALUES
(1, 'limit', '50'),
(2, 'facebook', 'https://www.facebook.com'),
(3, 'twitter', 'https://twitter.com'),
(4, 'linkedin', 'https://www.linkedin.com'),
(6, 'instagram', 'https://www.instagram.com'),
(7, 'admin_email', 'hello@companydiscountshop.in'),
(8, 'admin_mobile', '+91 94607 33662'),
(9, 'meta_title', 'Company DISCOUNT Shop'),
(10, 'meta_keywords', 'Company DISCOUNT Shop'),
(11, 'meta_description', 'Company DISCOUNT Shop'),
(12, 'google_analytice_code', ''),
(13, 'google_map_script', ''),
(14, 'youtube', 'https://www.youtube.com'),
(15, 'whatsapp', '+917877994947'),
(16, 'shipping_rate', '150'),
(17, 'min_shipping_amount', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mimage` varchar(255) NOT NULL,
  `heading_one` varchar(255) NOT NULL,
  `heading_two` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `mimage`, `heading_one`, `heading_two`, `status`) VALUES
(1, 'slider_9055_1714730007.jpg', '', '', '', 1),
(2, 'slider_1321_1715073786.jpg', '', '', '', 1),
(3, 'slider_3483_1715242083.jpg', '', '', '', 1),
(4, 'slider_3483_17152420831.jpg', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `star` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` bigint(20) NOT NULL,
  `modified` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `company_id`, `name`, `post`, `description`, `star`, `image`, `status`, `created`, `modified`) VALUES
(1, 3, 'Misti', 'Director', '<p>With so many key travel solutions &nbsp;and customized travel consultancy services, the company has already been popular. And then it hones in to enhance the user experience with seamless navigation, responsive web design, and effective customer support to name a few. Overall, it has been a great experience with Geosprings!</p>\r\n', 0, '8600_1714636378.jpeg', 1, 1657516800, 0),
(2, 3, 'Sia', 'Director', '<p>I recently planned my trip with Geosprings. And to be honest, I never thought it would go so perfectly leaving me with some beautiful vacation memories. Geosprings offered me customized travel plans according to my needs and preferences. The best thing of all was that they provided high quality services within a budget-friendly framework.</p>\r\n', 0, '5833_1714636388.jpeg', 1, 1657516810, 0),
(3, 3, 'Shashikant', 'Co-Founder', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 0, '2171_1714636398.jpeg', 1, 1657516825, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_category`
--
ALTER TABLE `blogs_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_comment`
--
ALTER TABLE `blogs_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_images`
--
ALTER TABLE `blogs_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_tag`
--
ALTER TABLE `blogs_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_views_tracker`
--
ALTER TABLE `blogs_views_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_inquiry`
--
ALTER TABLE `product_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs_category`
--
ALTER TABLE `blogs_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs_comment`
--
ALTER TABLE `blogs_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs_images`
--
ALTER TABLE `blogs_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs_tag`
--
ALTER TABLE `blogs_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs_views_tracker`
--
ALTER TABLE `blogs_views_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_inquiry`
--
ALTER TABLE `product_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
