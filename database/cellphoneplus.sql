-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2019 lúc 09:05 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', 0, '2019-03-30 18:42:01', '2017-03-23 04:46:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', 0, '2019-03-30 19:09:11', '2017-03-21 07:29:31'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', 0, '2019-03-30 21:15:10', '2019-03-30 21:15:10'),
(11, 14, '2017-03-21', 420000, 'COD', 'không chú', 1, '2019-03-30 20:20:10', '2017-03-21 07:16:09'),
(37, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', 1, '2019-03-30 21:06:41', '2019-03-30 21:06:41'),
(38, 24, '2019-04-05', 175, NULL, NULL, 0, '2019-04-04 21:01:19', NULL),
(39, 24, '2019-04-05', 180, NULL, NULL, 0, '2019-04-04 21:06:27', NULL),
(40, 24, '2019-04-05', 820, NULL, NULL, 0, '2019-04-04 21:29:02', NULL),
(42, 26, '2019-04-07', 350, NULL, NULL, 1, '2019-04-07 14:10:48', '2019-04-07 14:10:48'),
(43, 28, '2019-04-11', 966, NULL, NULL, 0, '2019-04-10 18:55:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(19, 28, 16, 2, 220, '2019-03-29 22:03:20', '2019-03-29 22:03:20'),
(25, 36, 16, 1, 220, '2019-03-30 19:06:32', '2019-03-30 19:06:32'),
(26, 38, 3, 1, 175, '2019-04-04 21:01:19', NULL),
(27, 39, 17, 1, 180, '2019-04-04 21:06:27', NULL),
(28, 40, 1, 4, 150, '2019-04-04 21:29:02', NULL),
(29, 40, 16, 1, 220, '2019-04-04 21:29:02', NULL),
(32, 42, 3, 2, 175, '2019-04-07 14:10:21', NULL),
(33, 43, 22, 1, 516, '2019-04-10 18:55:37', NULL),
(34, 43, 30, 1, 450, '2019-04-10 18:55:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `password`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(23, 'nguyennguyen', '0', 'nguyennguyen1@gmail.com', '$2y$10$c15Rlrsx.hs9h5arXf8wK.sYoPCkqcLjNtFViq1RIJkhG9L9TACyW', 'sdfg', '0387370052', '2019-03-30 15:13:18', '2019-03-30 15:13:18'),
(24, 'tuanle', '0', 'tuan@123', '$2y$10$T9pYjL0uaTyN0zZwAk9Ty.j/bsJbyyBbOhHPLoBvwfRxOstG8NBOe', '123456', '111111111', '2019-04-04 19:07:58', '2019-04-04 19:07:58'),
(25, 'tuanle', '1', 'tuancus@123', '$2y$10$WYFSy9mIcWiiQmxBW.p4RuRCGaVktAj1h7Eh0xl0d5ND.bhPFBUPS', 'ádasdddddddd', '0169556346', '2019-04-07 14:07:44', '2019-04-07 14:07:44'),
(26, 'tuanss', '0', 'tuan123@gmail.com', '$2y$10$hEneSonn34B/ktE1fxHT4eyLKUoQc9XlOxHoTxzph9kCXlCZAwgxO', '123456', '0169556344', '2019-04-07 14:08:39', '2019-04-07 14:08:39'),
(27, 'tuanle', '0', 'tuanstu@gmail.com', '$2y$10$Jbk7rtvIN8iuuChYDzAxOOogDADF.aFPuNZLU3ugrwzaDMmwqYj8W', '123 ABC', '0395563446', '2019-04-10 18:25:30', '2019-04-10 18:25:30'),
(28, 'tuanle1997', 'Nam', 'tuanle@stu', '$2y$10$vcHh/rsfg4bDiW2t70HvPelX3uKP/nU01XF17SRZzIB6HYXElhbeS', '12 C', '0123547896', '2019-04-10 18:57:59', '2019-04-10 18:57:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'blog_2.jpg', '2019-03-31 19:53:53', '2019-03-31 19:53:53'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'blog_3.jpg', '2019-03-31 19:53:53', '2019-03-31 19:53:53'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'blog_4.jpg', '2019-03-31 19:53:53', '2019-03-31 19:53:53'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'blog_5.jpg', '2019-03-31 19:53:53', '2019-03-31 19:53:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(22, 'Xiaomi Mi 8', 1, 'Xiaomi Mi 8 sẽ là cái tên được nhắc đến nhiều trong gia đình Xiaomi khi mang trong mình đầy đủ những gì gọi là cao cấp đến từ vẻ đẹp bên ngoài cũng như phần cứng mạnh mẽ bên trong.', 516, 0, 'xiaomi-mi-8-1-400x460-400x460.png', NULL, 1, '2019-04-10 16:03:36', '2019-04-10 17:17:59'),
(23, 'Xiaomi Mi A2', 1, 'Tiếp nối sự thành công của Xiaomi Mi A1 thì Xiaomi tiếp tục giới thiệu tới người dùng phiên bản kế nhiệm là chiếc Xiaomi Mi A2 với nâng cấp mạnh mẽ về cấu hình cũng như camera. Hiệu năng ấn tượng với cấu hình mạnh mẽ Sức mạnh của smartphone Xiaomi Mi A2 đến từ con chip Qualcomm Snapdragon 660 với 4 GB RAM và 64 GB bộ nhớ trong.', 235, 215, 'xiaomi-mi-a2-blue-400x460.png', NULL, 1, '2019-04-10 17:12:34', '2019-04-10 17:12:34'),
(24, 'Samsung Galaxy S10+ (512GB)', 2, 'Samsung Galaxy S10+ (512GB) - phiên bản kỷ niệm 10 năm chiếc Galaxy S đầu tiên ra mắt, là một chiếc smartphone hội tủ đủ các yếu tố mà bạn cần ở một chiếc máy cao cấp trong năm 2019.', 1280, 1247, 'samsung-galaxy-s10-plus-512gb-ceramic-black-400x460.png', NULL, 0, '2019-04-10 17:27:35', '2019-04-10 17:29:37'),
(25, 'Samsung Galaxy A50 128GB', 2, 'Samsung Galaxy A50 128GB là mẫu smartphone dòng A mới trong năm 2019 và đặc biệt máy sở hữu công nghệ cảm biến vân tay trong màn hình lần đầu tiên xuất hiện trên một chiếc máy tầm trung tới từ Samsung.', 344, 0, 'samsung-galaxy-a50-128gb-blue-400x460.png', NULL, 0, '2019-04-10 17:31:24', '2019-04-10 17:31:35'),
(26, 'iPhone Xs Max 512GB', 3, 'Là chiếc smartphone cao cấp nhất của Apple với mức giá khủng chưa từng có, bộ nhớ trong lên tới 512GB, iPhone XS Max 512GB - sở hữu cái tên khác biệt so với các thế hệ trước, trang bị tới 6.5 inch đầu tiên của hãng cùng các thiết kế cao cấp hiện đại từ chip A12 cho tới camera AI.', 1720, 0, 'iphone-xs-max-512gb-gold-400x460.png', NULL, 1, '2019-04-10 17:42:02', '2019-04-10 17:42:02'),
(27, 'iPhone X 256GB', 3, 'iPhone X được đã được Apple cho ra mắt ngày 12/9 vừa rồi đánh dấu chặng đường 10 năm lần đầu tiên iPhone ra đời. iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp.', 1204, 0, 'iphone-x-256gb-silver-400x460.png', NULL, 1, '2019-04-10 17:42:50', '2019-04-10 17:42:50'),
(28, 'Điện thoại Sony Xperia 10', 4, 'Sony Xperia 10 là mẫu smartphone tầm trung mới và được xem là phiên bản thu gọn của chiếc Sony Xperia 1 vừa ra mắt trước đó. Màn hình tỷ lệ 21:9 độc đáo Sony là hãng đi đầu trong việc tích hợp màn hình tỷ lệ 21:9 lên những chiếc smartphone.', 1200, 0, 'sony-xperia-10-400x460.png', NULL, 1, '2019-04-10 17:44:46', '2019-04-10 17:44:46'),
(29, 'Sony Xperia 1', 4, 'Sony Xperia 1 - là phiên bản kế nhiệm người đàn anh Xperia XZ3, mang nhiều tính năng đặc biệt khi sở hữu những công nghệ lần đầu tiên có mặt trên một chiếc smartphone. Smartphone đầu tiên có màn hình 21:9 Nếu như các nhà sản xuất smartphone hiện nay đang làm những chiếc máy có tỷ lệ màn hình 18:9 hay 19:9 thì chiếc flagship mới có Sony có màn hình tỷ lệ lên tới 21:9.', 950, 900, 'sony-xperia-1-400x460.png', NULL, 1, '2019-04-10 17:45:41', '2019-04-10 17:45:41'),
(30, 'BLU Studio One Plus', 5, 'BLU Studio One Plus - Smartphone giá rẻ đến từ Mỹ BLU Studio One Plus là mẫu smartphone mới thuộc phân khúc giá rẻ của nhà sản xuất BLU. Máy sở hữu một cấu hình khá cùng mức giá bán rất dễ chịu.', 450, 0, 'blu-studio-one-plus-400x460.png', NULL, 1, '2019-04-10 17:46:29', '2019-04-10 17:46:29'),
(31, 'OnePlus 2', 5, 'One Plus 2 – Kẻ hủy diệt trở lại One Plus 2 là một sản phẩm mới được người dùng đặt cho cái biệt danh đầy khiêu khích “kẻ hủy diệt iPhone”, không phải vô cớ mà người ta đặt cho nó cái tên đó. Với phiên bản này nhà sản xuất đã khéo léo trang bị cho máy những tính năng thời thượng và ấn tượng, ngoài những điều đó máy còn mang lại rất nhiều điều mà người dùng sẽ rất thích thú khi trải nghiệm.', 512, 500, 'oneplus-2-400x460.png', NULL, 1, '2019-04-10 17:47:14', '2019-04-10 17:47:14'),
(32, 'Meizu M9 Note', 6, 'Meizu Note M9 sử dụng chip xử lý Qualcomm Snapdragon 675, sản xuất trên quy trình 11nm và lõi CPU Kryo 460, GPU Adreno 612. Trong các bài đo điểm chuẩn, chip SD675 đạt khoảng 170.000 trong điểm chuẩn AnTuTu. Do đó, điện thoại Meizu M9 Note chắc chắn thuộc phân khúc tầm trung.  Bên cạnh đó, Meizu M9 Note sẽ có pin 4.000 mAh.', 720, 0, 'meizu-m9-note-600x600.jpg', NULL, 1, '2019-04-10 17:49:05', '2019-04-10 17:49:05'),
(33, 'Meizu 16th', 6, 'Meizu 16 là Flagship mới nhất của meizu sở hữu chip Snapdragon 845 siêu mạnh, màn hình 6.0 inches tỷ lệ 18:9. Đặc biệt Meizu 16 còn được thiết kế bảo mật vân tay phía trên màn hình vô cùng độc đáo. Camera Kép 12MP + 20MP có khả năng xóa phông và chụp phong cảnh cực đỉnh. Camera Selfies 20Mp thỏa mãn mọi nhu cầu selfies. Cấu hình mạnh, thiết kế đẹp, chức năng thời thượng, meizu 16 xứng tầm 1 siêu phẩm. Máy mới bảo hành 12 tháng.', 420, 400, 'meizu-16th-white-400x460.png', NULL, 1, '2019-04-10 17:50:44', '2019-04-10 17:50:44'),
(34, 'Xiaomi Redmi Note 7 64GB', 1, 'Xiaomi Redmi Note 7 là chiếc smartphone giá rẻ mới được giới thiệu vào đầu năm 2019 với nhiều trang bị đáng giá như thiết kế notch giọt nước hay camera lên tới 48 MP. Thiết kế hiện đại, theo', 215, 0, 'xiaomi-redmi-note-7-400x460.png', NULL, 1, '2019-04-10 17:52:13', '2019-04-10 17:52:13'),
(35, 'Samsung Galaxy S10+', 2, 'Samsung Galaxy S10+ là một trong những chiếc smartphone được trông chờ nhiều nhất trong năm 2019 và không phụ sự kỳ vọng của mọi người thì chiếc Galaxy S thứ 10 của Samsung thực sự gây ấn tượng mạnh cho người dùng. Thiết kế sang trọng, bóng bẩy Với một chiếc máy cao cấp như Samsung Galaxy S10+ thì việc đầu tiên cần có là máy phải sở hữu một vẻ ngoài \"lộng lẫy\", thu hút mọi ánh nhìn.', 990, 0, 'samsung-galaxy-s10-plus-black-400x460.png', NULL, 1, '2019-04-10 17:53:12', '2019-04-10 17:53:12'),
(36, 'iPhone 8 Plus 256GB', 3, 'iPhone 8 Plus là bản nâng cấp nhẹ của chiếc iPhone 7 Plus đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến.', 1075, 1050, 'iphone-8-plus-256gb-red-400x460.png', NULL, 1, '2019-04-10 17:54:41', '2019-04-10 17:54:41'),
(37, 'OnePlus 6T', 5, 'Sau bao chờ đợi thì OnePlus 6T, chiếc smartphone được mệnh danh là “Flapship Killer” cũng đã chính thức ra mắt với cấu hình khủng và giá thành cũng rất phải chăng.', 850, 0, 'oneplus-6t-1-400x460.png', NULL, 1, '2019-04-10 17:56:08', '2019-04-10 17:56:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.png'),
(2, '', 'banner2.png'),
(3, '', 'banner3.png'),
(4, '', 'banner4.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi', '', 'brands_3.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(2, 'Samsung', '', 'brands_4.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(3, 'Apple', '', 'brands_5.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(4, 'Sony', '', 'brands_6.jpg', '2016-10-25 17:19:00', NULL),
(5, 'One Plus', '', 'brands_7.jpg', '2016-10-25 17:19:00', NULL),
(6, 'Meizu', '', 'brands_8.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nguyennguyen1', 'nguyen1997@gmail.com', '$2y$10$UsuyTbJ4ZyTvC.k3z9A8xuPGYmVtWfSXxR/lgQLl85TXQEneLJMx6', '123456789', '123456', NULL, '2019-03-26 14:20:07', '2019-03-26 14:20:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
