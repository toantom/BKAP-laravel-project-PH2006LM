-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 09:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watchshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tiến đẹp trai', 'tiennguyenutc96@gmail.com', '123456789', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `length_face` double(8,2) UNSIGNED NOT NULL,
  `waterproof` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_face` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_energy` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_strap` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_coat` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `length_face`, `waterproof`, `material_face`, `use_energy`, `material_strap`, `material_coat`, `origin`, `guarantee`, `created_at`, `updated_at`) VALUES
(1, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(2, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(3, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(4, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(5, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(6, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(7, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(8, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(9, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(10, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(11, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(12, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(13, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(14, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(15, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(16, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(17, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(18, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(19, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL),
(20, 40.00, '10', 'Kính sapphire', 'Quartz/Pin\r\n', 'Dây da chính hãng\r\n\r\n', 'Stainless Steel\r\n\r\n', 'Singapore', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `slug`, `title`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'H-Vault Classico', '', '$1.499.00', 'banner-06.jpg', 'H-Vault - Cơ bắp như những chiếc xe Muscle cổ điển của Mỹ - Đáng mong đợi nhất từ Mỹ.', 1, NULL, NULL),
(2, 'H-Vault Classico', '', '$1.499.00', 'banner-08.jpg', 'H-Vault - Cơ bắp như những chiếc xe Muscle cổ điển của Mỹ - Đáng mong đợi nhất từ Mỹ.', 1, NULL, NULL),
(3, 'Banner 1', '', '', 'banner-01.jpg', '', 2, NULL, NULL),
(4, 'Banner 2', '', '', 'banner-02.jpg', '', 2, NULL, NULL),
(5, 'Banner 3', '', '', 'banner-03.jpg', '', 3, NULL, NULL),
(6, 'Banner 4', '', '', 'banner-04.jpg', '', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cate` bigint(20) UNSIGNED NOT NULL,
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `image` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `slug`, `id_cate`, `id_admin`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TBT Watch là một trong những trang web bán đồng hồ được truy cập nhiều nhất Việt Nam', '', 2, 1, 'blog-01.jpg', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio.\r\n\r\nQuisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.\r\n\r\nAenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nSuspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.', 1, '2020-12-08 14:46:58', NULL),
(2, 'Sale sập sàn Black Friday – Giảm ngay 30% đồng hồ chính hãng tại TBT Watch.\r\n', '', 2, 1, 'blog-02.jpg', 'Nhân sự kiện Black Friday, Đăng Quang Watch giảm giá đến 30% cho toàn bộ sản phẩm tại hệ thống, mang đến cho khách hàng cơ hội sở hữu những món đồ hiệu với mức giá hấp dẫn.\r\nĐây là mức giảm giá kỉ lục duy nhất trong năm Đăng Quang Watch áp dụng, quý khách hàng hãy nhanh tay chọn ngay cho mình những sản phẩm yêu thích vì số lượng sản phẩm chỉ có hạn.\r\nBlack Friday là ngày mua sắm siêu giảm giá nổi tiếng trên toàn thế giới. Những hình thức khuyến mại có thể kể đến như giảm giá sâu, thậm chí sale “sập sàn” để phục vụ nhu cầu mua sắm của khách hàng.\r\n\r\nNhân ngày hội mua sắm này Đăng Quang Watch mang đến cho quý khách hàng cơ hội săn hàng hiệu với mức giá tốt nhất từ trước tới nay.\r\n\r\nKể từ ngày 20/11 đến hết 29/11/2020 , khách hàng tham quan và mua sắm tại hệ thống 100 showroom Đăng Quang Watch trên toàn quốc hoặc mua online qua website www.dangquangwatch.vn sẽ nhận ưu đãi giảm giá lên đến 30% cho toàn bộ sản phẩm đồng hồ, kính mắt, bút ký, phụ kiện….\r\nKhông chỉ được thỏa thích chiêm ngưỡng và lựa chọn hàng nghìn mẫu đồng hồ, kính mắt đa dạng kiểu dáng, phù hợp với nhiều phong cách thời trang, từ sang trọng, thanh lịch đến cá tính, mạnh mẽ đến từ các thương hiệu uy tín hàng đầu với mức giá sale cực khủng lần này, quý khách có thể chọn ngay cho mình không chỉ 1 mà có thể mua nhiều sản phẩm một lúc.\r\nĐể biết thêm chi tiết về các chương trình khuyến mãi, thông tin sản phẩm, quý khách hàng vui lòng liên hệ:\r\n\r\nĐăng Quang Watch – Đẳng cấp doanh nhân, phong cách thượng lưu\r\n\r\nHotline: 1800 6005 - 098 668 1189\r\n\r\nWesbite: www.dangquangwatch.vn\r\n\r\nFacebook: https://www.facebook.com/donghodangquang/\r\n\r\nInstagram:https://www.instagram.com/dangquang_official/', 1, '2020-12-08 14:47:17', NULL),
(3, 'Chọn quà tặng thầy cô nhân ngày 20/11 - nhất định không thể bỏ qua gợi ý này', '', 2, 1, 'blog-03.jpg', '20/11 - Ngày Nhà giáo Việt Nam, ngày mà mỗi thế hệ học trò chúng ta bày tỏ lòng biết ơn, sự kính trọng với thầy cô giáo, những người lái đò đưa chúng ta cập bến tri thức, đến với tương lai tươi sáng.\r\nCó 1 món quà tặng tuy nhỏ bé nhưng lại rất đỗi thiêng liêng để chúng ta dành tặng thầy cô nhân ngày 20/11, món quà ấy chứa đựng những kỷ niệm thời học sinh và cũng đã từng là vật gắn kết tình cảm thầy trò - Đó chính là \"cây bút\".\r\nNghề giáo nghề gắn liền với cây bút\r\n\r\nBút, phấn, và sách vở là những vật bất ly thân đối với những người làm nghề giáo. Họ sử dụng cây bút mỗi khi lên lớp, khi chấm bài, khi soạn giáo án, cây bút là vật quan trọng cần thiết và có thể nói là không thể thiếu đối với người giáo viên.', 1, '2020-12-08 14:47:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rolex', 'Rolex.jpg', '', 1, NULL, NULL),
(2, 'TIN TỨC- SỰ KIỆN', '', '', 0, NULL, NULL),
(3, 'KIẾN THỨC VỀ ĐỒNG HỒ', '', '', 0, NULL, NULL),
(4, 'HỎI ĐÁP VỀ ĐỒNG HỒ', '', '', 0, NULL, NULL),
(5, 'BÁO CHÍ VIẾT VỀ TBT WATCH', '', '', 0, NULL, NULL),
(6, 'Hublot', 'Hublot.png', '', 1, NULL, NULL),
(7, 'Audemars-piguet-le-brassus', 'audemars-piguet-le-brassus-logo-vector.png', '', 1, NULL, NULL),
(8, 'Patek-Philippe', 'Patek-Philippe.jpg', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `id_product`, `id_user`, `name`, `image`, `star`, `content`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 21, 'Nguyễn Như Tiến', 'IMG_20190630_194848.jpg', 5, 'ádasd', 1, '2021-01-01 19:46:11', '2021-01-01 19:46:11'),
(4, 4, 21, 'Nguyễn Như Tiến', '41316551_1111760732309525_4585286503726317568_n.jpg', 5, 'khii', 1, '2021-01-01 20:00:47', '2021-01-01 20:00:47'),
(5, 2, 21, 'Nguyễn Như Tiến', '43049820_1127613830724215_3189826563826778112_o.jpg', 5, 'ádasdad', 1, '2021-01-01 20:06:41', '2021-01-01 20:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `total` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_06_090919_create_admins_table', 1),
(5, '2020_12_06_091000_create_attributes_table', 1),
(6, '2020_12_06_091015_create_banners_table', 1),
(7, '2020_12_06_091049_create_categories_table', 1),
(8, '2020_12_06_091129_create_orders_table', 1),
(9, '2020_12_06_091159_create_products_table', 1),
(10, '2020_12_06_091217_create_product_imgs_table', 1),
(11, '2020_12_06_091435_create_wishlists_table', 1),
(12, '2020_12_06_112151_create_blogs_table', 1),
(13, '2020_12_06_112152_create_feedbacks_table', 1),
(14, '2020_12_06_112153_create_inputs_table', 1),
(15, '2020_12_06_112154_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(8,2) UNSIGNED NOT NULL,
  `address_ship` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `name`, `phone`, `email`, `total_price`, `address_ship`, `note`, `status`, `created_at`, `updated_at`) VALUES
(6, 21, 'Nguyễn Như Tiến', '0396757491', 'skynai01@gmail.com', 270.00, 'Bắc Ninh', 'Hàng dễ vỡ', 0, '2020-12-30 05:04:24', '2020-12-30 05:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_product`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(10, 6, 2, 90.00, 2, '2020-12-30 05:04:24', '2020-12-30 05:04:24'),
(11, 6, 12, 90.00, 1, '2020-12-30 05:04:24', '2020-12-30 05:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `discount` double UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `id_cate` bigint(20) UNSIGNED NOT NULL,
  `id_attr` bigint(20) UNSIGNED NOT NULL,
  `image` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sku`, `type`, `price`, `discount`, `stock`, `id_cate`, `id_attr`, `image`, `des`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Đồng hồ số 1', '', 'RL_1.1.1', 0, 90.00, 49, 10, 1, 2, 'product-02.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(4, 'Đồng hồ số 2', '', 'RL_0.1.1', 1, 90.00, 49, 10, 1, 3, 'product-03.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(5, 'Đồng hồ số 3', '', 'RL_1.1.2', 0, 90.00, 49, 10, 1, 4, 'product-04.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(6, 'Đồng hồ số 4', '', 'RL_0.2.1', 1, 90.00, 49, 10, 1, 5, 'product-05.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(7, 'Đồng hồ số 5', '', 'RL_1.2.2', 0, 90.00, 49, 10, 1, 6, 'product-06.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(8, 'Đồng hồ số 6', '', 'RL_0.1.2', 1, 90.00, 49, 10, 1, 7, 'product-03.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(9, 'Đồng hồ số 7', '', 'RL_1.1.3', 0, 90.00, 49, 10, 1, 8, 'product-02.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(10, 'Đồng hồ số 8', '', 'RL_0.2.2', 1, 90.00, 49, 10, 1, 9, 'product-05.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(12, 'Đồng hồ số 9', '', 'RL_0.2.4', 0, 90.00, 49, 10, 1, 10, 'product-05.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL),
(13, 'Đồng hồ số 10', '', 'RL_0.2.5', 1, 90.00, 0, 10, 1, 14, 'product-04.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

CREATE TABLE `product_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `image` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`id`, `id_product`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'product-01.png', NULL, NULL),
(2, 2, 'product-02.png', NULL, NULL),
(3, 2, 'product-03.png', NULL, NULL),
(4, 2, 'product-04.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `birthday` date NOT NULL,
  `address` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `gender`, `birthday`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Như Tiến', 'skynai012@gmail.com', NULL, 'huyenhh', '0396757400', 0, '1996-09-16', 'Bắc Ninh', NULL, NULL, NULL),
(20, 'skynai12913', 'skynai012411@gmail.com', NULL, '$2y$10$tnvmQuru32tmIkhfkuXvq.cCY.ZR5tQTIWmftJUgbRpzXCE/OWlsu', '0396757461', 0, '2020-12-23', '99 dốc Suối Hoa', NULL, '2020-12-27 20:06:59', '2020-12-27 20:06:59'),
(21, 'skynai1234', 'skynai01@gmail.com', NULL, '$2y$10$7wubxTKq.E0PlcC2lqnpMOuFBHSvOPdoWbzmQhYm7ErXsYS6Y1yi.', '0396757719', 0, '2020-12-17', '99 dốc Suối Hoa', 'SVUSfpcGllnTyWIyEc6IQQn2vkUAa6xvUGTucJG9DgwgJcQrlSgOnYhhue7D', '2020-12-27 20:47:00', '2020-12-27 20:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_id_cate_foreign` (`id_cate`),
  ADD KEY `blogs_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_id_product_foreign` (`id_product`),
  ADD KEY `feedbacks_id_user_foreign` (`id_user`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inputs_sku_unique` (`sku`),
  ADD KEY `inputs_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_user_foreign` (`id_user`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id_order_foreign` (`id_order`),
  ADD KEY `order_details_id_product_foreign` (`id_product`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `id_attr` (`id_attr`),
  ADD KEY `products_id_cate_foreign` (`id_cate`);

--
-- Indexes for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_imgs_id_product_foreign` (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_id_user_foreign` (`id_user`),
  ADD KEY `wishlists_id_product_foreign` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_imgs`
--
ALTER TABLE `product_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `blogs_id_cate_foreign` FOREIGN KEY (`id_cate`) REFERENCES `categories` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `feedbacks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `inputs_sku_foreign` FOREIGN KEY (`sku`) REFERENCES `products` (`sku`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_attr_foreign` FOREIGN KEY (`id_attr`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `products_id_cate_foreign` FOREIGN KEY (`id_cate`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD CONSTRAINT `product_imgs_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlists_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
