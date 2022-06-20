-- MySQL dump 10.13  Distrib 5.7.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: shop_ecom
-- ------------------------------------------------------
-- Server version	5.7.36-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Aultmore','2022-06-20 06:21:45','2022-06-20 06:21:45',NULL),(2,'Morlach','2022-06-20 06:21:59','2022-06-20 06:23:03',NULL),(3,'Bowmore','2022-06-20 06:22:22','2022-06-20 06:22:22',NULL);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Scotch Whisky','scotch-whisky',0,1,'2022-06-20 03:52:55','2022-06-20 03:52:55',NULL),(2,'Whisky Khác','whisky-khac',0,2,'2022-06-20 03:53:39','2022-06-20 03:53:39',NULL),(3,'Cognac Armagnac','cognac-armagnac',0,3,'2022-06-20 03:54:01','2022-06-20 03:54:01',NULL),(4,'Beer Cider','beer-cider',0,4,'2022-06-20 03:54:14','2022-06-20 03:54:14',NULL),(5,'Vang Champagne','vang-champagne',0,5,'2022-06-20 03:54:29','2022-06-20 03:54:29',NULL),(6,'Rượu Vodka','ruou-vodka',0,6,'2022-06-20 03:54:42','2022-06-20 03:54:42',NULL),(7,'Rượu Sake','ruou-sake',0,7,'2022-06-20 03:54:58','2022-06-20 03:54:58',NULL),(8,'Rượu pha chế','ruou-pha-che',0,8,'2022-06-20 03:55:17','2022-06-20 03:55:17',NULL),(9,'Phụ kiện','phu-kien',0,9,'2022-06-20 03:55:52','2022-06-20 03:55:52',NULL),(10,'Quà Tết 2023','qua-tet-2023',0,10,'2022-06-20 03:56:30','2022-06-20 03:56:30',NULL),(11,'Single Malt Whisky','single-malt-whisky',1,1,'2022-06-20 03:57:33','2022-06-20 03:57:33',NULL),(12,'Blended Whisky','blended-whisky',1,2,'2022-06-20 03:58:10','2022-06-20 03:58:10',NULL),(13,'Speyside','speyside',11,1,'2022-06-20 03:59:51','2022-06-20 03:59:51',NULL),(14,'Islay','islay',11,2,'2022-06-20 04:00:05','2022-06-20 04:00:05',NULL),(15,'Highland','highland',11,3,'2022-06-20 04:00:24','2022-06-20 04:00:24',NULL),(16,'Lowland','lowland',11,4,'2022-06-20 04:00:40','2022-06-20 04:00:40',NULL),(17,'Island','island',11,5,'2022-06-20 04:01:06','2022-06-20 04:01:06',NULL),(18,'Campbeltown','campbeltown',11,6,'2022-06-20 04:01:34','2022-06-20 04:01:34',NULL),(19,'Japanese Whisky','japanese-whisky',2,1,'2022-06-20 06:16:51','2022-06-20 06:16:51',NULL),(20,'American Whisky','american-whisky',2,2,'2022-06-20 06:17:15','2022-06-20 06:17:15',NULL),(21,'Irish Whisky','irish-whisky',2,3,'2022-06-20 06:17:40','2022-06-20 06:17:40',NULL),(22,'Canadian Whisky','canadian-whisky',2,4,'2022-06-20 06:17:59','2022-06-20 06:17:59',NULL),(23,'Chivas Regal','chivas-regal',12,1,'2022-06-20 06:18:36','2022-06-20 06:18:36',NULL),(24,'Dewar\'s','dewars',12,2,'2022-06-20 06:18:53','2022-06-20 06:18:53',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_100000_create_password_resets_table',1),(6,'2019_08_19_000000_create_failed_jobs_table',1),(7,'2022_05_11_041908_create_roles_table',1),(10,'2022_05_11_041990_create_users_table',2),(19,'2022_05_17_150001_create_images_table',6),(27,'2022_05_17_151046_add_column_avatar_to_users_table',11),(36,'2022_05_31_111613_create_orders_table',14),(37,'2022_05_31_111942_create_orders_details_table',14),(42,'2022_05_19_155109_create_brands_table',15),(43,'2022_05_23_105508_create_products_table',15),(44,'2022_05_23_111825_create_product_images_table',15),(45,'2022_05_12_101810_create_categories_table',16),(46,'2022_06_20_173602_add_column_is_feature_to_products_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orders_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_details`
--

DROP TABLE IF EXISTS `orders_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_details_orders_id_foreign` (`orders_id`),
  KEY `orders_details_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_details_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `orders_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details`
--

LOCK TABLES `orders_details` WRITE;
/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0: default, 1:thumbnail',
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,'uploads/images/product/Bowmore-25YO-UK_doi_1655701104.jpg',0,1,'2022-06-20 04:58:24','2022-06-20 04:58:24'),(2,'uploads/images/product/Bowmore-25_vo-hop_1655701104.jpg',1,1,'2022-06-20 04:58:24','2022-06-20 04:58:24'),(3,'uploads/images/product/Bowmore-25_mat-truoc_1655701104.jpg',1,1,'2022-06-20 04:58:24','2022-06-20 04:58:24'),(4,'uploads/images/product/Bowmore-25_1_1655701104.jpg',1,1,'2022-06-20 04:58:24','2022-06-20 04:58:24'),(5,'uploads/images/product/Bowmore-25-and-decanter_1655701104.jpg',1,1,'2022-06-20 04:58:24','2022-06-20 04:58:24'),(8,'uploads/images/product/Aultmore-25-mat-truoc_1655705019.jpg',0,4,'2022-06-20 05:36:22','2022-06-20 06:03:39'),(9,'uploads/images/product/Aultmore-25_1655703383.jpg',1,4,'2022-06-20 05:36:23','2022-06-20 05:36:23'),(10,'uploads/images/product/Aultmore-25-Scotch-Whisky-hop_1655703383.jpg',1,4,'2022-06-20 05:36:23','2022-06-20 05:36:23'),(11,'uploads/images/product/Aultmore-25-mat-truoc_1655705072.jpg',1,4,'2022-06-20 06:04:32','2022-06-20 06:04:32'),(12,'uploads/images/product/Mortlach-18_1655706055.jpeg',0,5,'2022-06-20 06:20:55','2022-06-20 06:20:55'),(13,'uploads/images/product/Macallan-A-Night-On-Earth-In-Scotland-Malt-Co_1655721620.png',0,6,'2022-06-20 10:40:20','2022-06-20 10:40:20'),(14,'uploads/images/product/z2952022405492_17ec37153f1498a04ff364c9a327e8a2_1655721620.jpg',1,6,'2022-06-20 10:40:20','2022-06-20 10:40:20'),(15,'uploads/images/product/Macallan-A-Night-On-Earth-In-Scotland-Malt-Co_1655721620.png',1,6,'2022-06-20 10:40:20','2022-06-20 10:40:20'),(16,'uploads/images/product/macallan-harmony-collection-rich-cacao-malt-co-2_1655721738.jpg',0,7,'2022-06-20 10:42:18','2022-06-20 10:42:18'),(17,'uploads/images/product/macallan-harmony-collection-rich-cacao-malt-co4_1655721738.jpg',1,7,'2022-06-20 10:42:18','2022-06-20 10:42:18'),(18,'uploads/images/product/167796d7fb9530cb6984-scaled_1655721738.jpg',1,7,'2022-06-20 10:42:18','2022-06-20 10:42:18');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) unsigned NOT NULL,
  `brand_id` bigint(20) unsigned DEFAULT NULL,
  `is_feature` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bowmore 25 year old UK','bowmore-25-year-old-uk',15000000,'Bowmore 25 năm tuổi (phiên bản UK) | 43% abv | Một sự kết hợp thú vị giữa kẹo bơ cứng và hạt phỉ thơm siêu ngon, sau đó được gắn kết với nhau bởi khói than bùn ngọt ngào của vùng Islay.','<p>Bowmore 25 năm tuổi (phi&ecirc;n bản UK) |&nbsp;43% abv |&nbsp;Một sự kết hợp th&uacute; vị giữa kẹo bơ cứng v&agrave; hạt phỉ thơm si&ecirc;u ngon, sau đ&oacute; được gắn kết với nhau bởi kh&oacute;i than b&ugrave;n ngọt ng&agrave;o của v&ugrave;ng Islay.</p>\r\n\r\n<p>TRƯỞNG TH&Agrave;NH TRONG MỘT PHẦN TƯ THẾ KỶ</p>\r\n\r\n<p>Một loại rượu Whisky n&agrave;y cần được thưởng thức từ từ, từng giọt ngon ngọt của loại mạch nha c&acirc;n bằng một c&aacute;ch tinh tế, được ủ trong một phần tư thế kỷ trong c&aacute;c th&ugrave;ng rượu Bourbon Bắc Mỹ v&agrave; th&ugrave;ng Sherry T&acirc;y Ban Nha.&nbsp;Vượt trội hơn hẳn c&aacute;c ti&ecirc;u chuẩn của ch&iacute;nh Bowmore, Bowmore 25 Year Old được đ&aacute;nh gi&aacute; rất cao, n&oacute; bộc lộ được hầu hết những phẩm chất được coi l&agrave; tốt nhất của mỗi loại sản phẩm ph&aacute;t h&agrave;nh trước giờ thuộc nh&agrave; Bowmore.</p>\r\n\r\n<p>Nh&igrave;n bằng mắt:&nbsp;M&agrave;u gỗ gụ &ecirc;m dịu<br />\r\nThở v&agrave;o:&nbsp;Rượu sherry đậm đ&agrave; v&agrave; tr&aacute;i c&acirc;y hầm, với ch&uacute;t kh&oacute;i của Bowmore<br />\r\nNhấm nh&aacute;p:&nbsp;Kẹo bơ cứng thơm ngon v&agrave; hạt phỉ, đan xen với nhau chỉ với một ch&uacute;t kh&oacute;i than b&ugrave;n ngọt ng&agrave;o<br />\r\nHậu vị:&nbsp;Kết th&uacute;c &ecirc;m dịu, nhẹ nh&agrave;ng v&agrave; v&ocirc; c&ugrave;ng phức tạp</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mua Bowmore 25 Year Old UK ở đ&acirc;u ?</p>\r\n\r\n<p>V&igrave; Bowmore 25YO UK l&agrave; một chai rượu cực k&igrave; hiếm v&agrave; chất lượng n&ecirc;n kh&ocirc;ng hề dễ để c&oacute; thể t&igrave;m được tr&ecirc;n thị trường (Đương nhi&ecirc;n l&agrave; vậy!). Nhưng đừng lo, vẫn c&oacute; một c&aacute;ch để sở hữu chai rượu qu&yacute; n&agrave;y! Qu&yacute; kh&aacute;ch chỉ cần tới với TVH Shop, ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng phục vụ cũng như chia sẻ những kiến thức về rượu qu&yacute; gi&aacute; nhất với to&agrave;n bộ qu&yacute; kh&aacute;ch. Nhanh ch&acirc;n l&ecirc;n n&agrave;o, số lượng c&oacute; hạn !!!</p>',14,3,0,'2022-06-20 04:58:24','2022-06-20 06:22:32',NULL),(4,'Aultmore 25 Years Old','aultmore-25-years-old',10450000,'Aultmore 25 tuổi là một sản phẩm nổi bật trong bộ sưu tập The Last Great Malts của Dewar ra mắt vào năm 2014. Phong phú với cả hương ngọt và hương đất, đây là một trong những hương vị tuyệt vời không thể bỏ qua. Aultmore 25 mở ra một hương vị ngập tràn trái cây, với chuối, lê, táo và nho khô. Tất cả được phủ một cách tinh tế trong một lớp sốt caramel kem đặc đầy thi vị.\r\n\r\nVị ngọt của caramen kết hợp hoàn hảo với vị thanh nhẹ từ trái cây. Hai hương vị hòa quyện với nhau một cách hoàn hảo.\r\n\r\nCaramel có một hương vị ngọt đặc biệt, gần với vị đường cháy. Ngoài ra còn có một hương thơm dịu  của vani, tạo ra chiều sâu tuyệt vời từ hương gỗ sồi đất xuyên qua.','<h2><strong>Đ&ocirc;i n&eacute;t về nh&agrave; m&aacute;y chưng cất Aultmore 25</strong></h2>\r\n\r\n<p>C&aacute;i t&ecirc;n Aultmore c&oacute; nghĩa l&agrave; &lsquo;vết bỏng lớn&rsquo; trong tiếng Gaelic &ndash; c&oacute; lẽ l&agrave; một từ &aacute;m chỉ đến d&ograve;ng s&ocirc;ng Isla gần đ&oacute;. N&oacute; được x&acirc;y dựng ở ph&iacute;a Bắc của v&ugrave;ng Keith bởi Alexander Edward v&agrave;o năm 1895/1896.</p>\r\n\r\n<h3><strong>Sự ra đời của nh&agrave; m&aacute;y chưng cất Aultmore</strong></h3>\r\n\r\n<p>Aultmore bắt đầu đi v&agrave;o hoạt động v&agrave;o năm 1897. V&agrave;o thời điểm đ&oacute;, Alexander Edward đ&atilde; sở hữu th&ecirc;m nh&agrave; m&aacute;y chưng cất Benrinnes &ndash; v&agrave; sau n&agrave;y l&agrave; cả nh&agrave; m&aacute;y Oban v&agrave;o năm 1898. Mọi thứ c&oacute; vẻ đều rất thuận lợi&hellip;</p>\r\n\r\n<p>Kh&ocirc;ng may thay, sự b&ugrave;ng nổ về rượu whisky kết th&uacute;c kh&ocirc;ng l&acirc;u sau khi nh&agrave; m&aacute;y Aultmore được x&acirc;y dựng xong: nhu cầu về rượu tụt dốc kh&ocirc;ng phanh. Cũng bởi điều n&agrave;y m&agrave; Aultmore đ&atilde; phải ngưng hoạt động v&agrave; đ&oacute;ng cửa trong v&agrave;i năm. Sau đ&oacute;, Aultmore đ&atilde; mở cửa một lần nữa v&agrave;o khoảng năm 1903/1904, nhưng kh&ocirc;ng duy tr&igrave; được qu&aacute; l&acirc;u. Năm 1914, Vương quốc Anh đ&atilde; vướng v&agrave;o một cuộc tranh chấp quốc tế&hellip;</p>\r\n\r\n<p>Sự thiếu hụt l&uacute;a mạch trong Thế chiến thứ nhất đ&atilde; buộc nh&agrave; m&aacute;y chưng cất Aultmore lại phải đ&oacute;ng cửa một lần nữa, tuy nhi&ecirc;n lần n&agrave;y Aultmore kh&ocirc;ng đơn độc, khi m&agrave; nhiều nh&agrave; m&aacute;y kh&aacute;c cũng phải ngưng hoạt động. Chi tiết về sự ảnh hưởng của chiến tranh tới nh&agrave; m&aacute;y v&agrave; những hoạt động của n&oacute; đầu những năm 1920 kh&ocirc;ng được ghi ch&eacute;p lại r&otilde; r&agrave;ng, nhưng ch&uacute;ng ta c&oacute; thể biết rằng nh&agrave; m&aacute;y n&agrave;y đ&atilde; được John Dewar mua lại v&agrave;o năm 1923.</p>\r\n\r\n<h3><strong>Aultmore sau thế chiến thứ nhất</strong></h3>\r\n\r\n<p>Aultmore trở th&agrave;nh một phần của c&ocirc;ng ty DCL v&agrave;o năm 1925 v&agrave; thời gian đầu, mọi hoạt động đều kh&aacute; thiếu ổn định. Đến đầu những năm 1950, Aultmore l&agrave; một trong những nh&agrave; m&aacute;y ti&ecirc;n phong thử nghiệm sử dụng nguy&ecirc;n liệu sau chưng cất l&agrave;m thức ăn chăn nu&ocirc;i.&nbsp;</p>\r\n\r\n<p>Bản th&acirc;n nh&agrave; m&aacute;y chưng cất n&agrave;y nằm ở một v&ugrave;ng xa x&ocirc;i của Speyside v&agrave; kh&ocirc;ng được kết nối với lưới điện quốc gia cho đến tận năm 1969 khi động cơ hơi nước được sử dụng từ thế kỷ trước cuối c&ugrave;ng đ&atilde; được nghỉ hưu. Aultmore tiếp tục l&agrave; một trong những th&agrave;nh phần quan trọng của Blended Whisky Dewar v&agrave; hỗn hợp rượu Old Perth.&nbsp;Nh&agrave; m&aacute;y chưng cất Aultmore được t&aacute;i x&acirc;y dựng v&agrave; n&acirc;ng cấp v&agrave;o năm 1971, v&agrave; số lượng th&ugrave;ng chưng cất tăng từ 2 l&ecirc;n con số 4.</p>\r\n\r\n<p>Ngay sau khi n&acirc;ng cấp nh&agrave; m&aacute;y v&agrave;o năm 1971, Aultmore đ&atilde; được b&aacute;n cho đại gia trong ng&agrave;nh n&agrave;y, United Distillers. Họ l&agrave; ch&iacute;nh l&agrave; tiền th&acirc;n của h&atilde;ng Diageo sau n&agrave;y. Năm 1991, Aultmore tung ra thị trường chai Flora &amp; Fauna 12 năm tuổi (b&aacute;n ch&iacute;nh thức &ndash; semi-offcial) v&agrave; phi&ecirc;n bản &lsquo;UD Rare Malts&rsquo; của n&oacute; v&agrave;o năm 1996. V&agrave; rồi Aultmore lại đổi chủ một lần nữa.</p>\r\n\r\n<p>Năm 1998, hơn một thế kỷ sau khi được th&agrave;nh lập, Aultmore đ&atilde; được mua lại bởi chủ sở hữu mới, Bacardi &ndash; th&ocirc;ng qua c&ocirc;ng ty con của họ, John Dewar &amp; Sons. Nếu bạn c&ograve;n nhớ, đ&oacute; cũng ch&iacute;nh l&agrave; c&ocirc;ng ty đ&atilde; mua lại Aultmore v&agrave;o năm 1923.</p>\r\n\r\n<h3><strong>Aultmore dưới thời kỳ thuộc sở hữu của Bacardi</strong></h3>\r\n\r\n<p>Whisky single malt của Aultmore trong giai đoạn n&agrave;y chủ yếu được sử dụng để l&agrave;m nguy&ecirc;n liệu cho whisky blend của Dewar, chỉ c&oacute; 1 phần cực kỳ nhỏ được đ&oacute;ng chai dưới dạng single malt.</p>\r\n\r\n<p>Người chủ mới Bacardi dường như cảm thấy hướng đi n&agrave;y vẫn ổn đối với doanh nghiệp v&agrave; chưa cần thiết phải vội v&atilde; thay đổi; v&agrave; dựa v&agrave;o việc từng được thử whisky trong thời gian n&agrave;y của Aultmore, t&ocirc;i cho rằng đ&oacute; c&oacute; thể coi l&agrave; một quyết định đ&uacute;ng đắn. Trong giai đoạn những năm 1990, kh&ocirc;ng c&oacute; bất kỳ chai whisky n&agrave;o của họ đạt mức điểm tr&ecirc;n trung b&igrave;nh, vậy n&ecirc;n việc duy tr&igrave; hoạt động pha trộn whisky kh&aacute; &ldquo;thường&rdquo; của m&igrave;nh với whisky ngũ cốc c&oacute; vẻ l&agrave; một kế hoạch ho&agrave;n hảo.</p>\r\n\r\n<p>C&oacute; một điều th&uacute; vị, đ&oacute; l&agrave; một số loại whisky single malt kh&aacute; nổi tiếng trong việc gi&uacute;p n&acirc;ng tầm rượu blender (như Aultmore, Benrinnes, Glen Elgin, Glenlossie, Glenruits&hellip;), dường như kh&ocirc;ng nhận được qu&aacute; nhiều sự t&aacute;n thưởng từ giới s&agrave;nh whisky mạch nha với vốn hiểu biết trung b&igrave;nh.</p>\r\n\r\n<p>Trong khi đ&oacute;, sản phẩm từ c&aacute;c nh&agrave; m&aacute;y chưng cất được đ&aacute;nh gi&aacute; cao như Aberlour, Ardmore, Dalmore v&agrave; Glenmorangie lại ho&agrave;n to&agrave;n c&oacute; thể bị đ&aacute;nh bại (về hương vị) bởi một số loại whisky pha trộn.</p>\r\n\r\n<p>Nh&agrave; văn chuy&ecirc;n viết về whisky Charlie MacLean đ&atilde; nghi&ecirc;n cứu về c&aacute;ch ph&acirc;n loại whisky mạch nha từ g&oacute;c nh&igrave;n của một chuy&ecirc;n gia blend rượu whisky. Cuốn s&aacute;ch của &ocirc;ng thực sự đ&atilde; mở mang tầm mắt cho rất nhiều người y&ecirc;u whisky. Bạn c&oacute; biết rằng c&aacute;c loại whisky mạch nha được ưa chuộng nhất v&ugrave;ng Highlands, như Glen Garioch v&agrave; Lochside, thực chất trong chỉ xếp hạng 3 trong danh s&aacute;ch của c&aacute;c blender? Tr&ecirc;n thực tế, họ th&agrave; sử dụng whisky mạch nha của Balmenach, Banff, Benriach, Dalwhinnie, Glendullan, Glen Keith, Glen Spey, Speyburn hoặc Strathisla c&ograve;n hơn. Điều th&uacute; vị l&agrave;, thực tế cho thấy blended whisky kh&oacute; c&oacute; thể được ưa chuộng v&agrave; t&igrave;m kiếm như single malt.</p>\r\n\r\n<h2><strong>Địa điểm nh&agrave; m&aacute;y chưng cất Aultmore</strong></h2>\r\n\r\n<p>Việc t&aacute;i thiết&nbsp;<a href=\"https://maltco.asia/danh-muc/scotch-whisky/single-malt-whisky/speyside/aultmore/\">Aultmore</a>&nbsp;năm 1971 kh&ocirc;ng nhằm mục đ&iacute;ch lưu giữ n&eacute;t đẹp truyền thống của những nh&agrave; m&aacute;y chưng cất Scotch l&acirc;u đời. Ngược lại, nh&agrave; m&aacute;y Strathisla gần đ&oacute; lại v&ocirc; c&ugrave;ng ấn tượng với vẻ ngo&agrave;i của n&oacute;.</p>\r\n\r\n<p>Nếu bạn muốn biết, th&igrave; Strathisla c&oacute; cung cấp những tour tham quan nh&agrave; m&aacute;y. C&ograve;n Aultmore th&igrave;,&hellip; bạn biết đấy, n&oacute; kh&ocirc;ng giống một nơi sẽ thu h&uacute;t du kh&aacute;ch cho lắm.</p>',13,1,0,'2022-06-20 05:36:22','2022-06-20 06:22:43',NULL),(5,'Morlach 18 Year Old - York House','morlach-18-year-old-york-house',3900000,'Rượu whisky single malt Mortlach 18 năm – York House – nhà chưng cất Mortlach (biệt danh là quái thú vùng Dufftown) nay thuộc sở hữu của Diageo. Mortlach 18 năm 700ml phiên bản vừa phát hành năm 2021 chi thị trường Châu Á, cụ thể là Việt Nam và Đài Loan.','<p>Rượu whisky single malt Mortlach 18 năm &ndash; York House &ndash; nh&agrave; chưng cất Mortlach (biệt danh l&agrave; qu&aacute;i th&uacute; v&ugrave;ng Dufftown) nay thuộc sở hữu của Diageo. Mortlach 18 năm 700ml phi&ecirc;n bản vừa ph&aacute;t h&agrave;nh năm 2021 chi thị trường Ch&acirc;u &Aacute;, cụ thể l&agrave; Việt Nam v&agrave; Đ&agrave;i Loan.</p>\r\n\r\n<p>Mortlach với qu&aacute; tr&igrave;nh chưng cất đặc th&ugrave; 2.81 lần (phần lớn whisky single malt Scotch được chưng cất 2 lần) c&oacute; lịch sử l&acirc;u đời v&agrave; l&agrave; nh&agrave; chưng cất đầu ti&ecirc;n của Dufftown.</p>\r\n\r\n<p>Ở độ tuổi 18, chất rượu Mortlach trở n&ecirc;n đầy sức hấp dẫn v&agrave; cực k&igrave; ngon miệng. Đ&acirc;y l&agrave; lựa chọn tuyệt hảo cho những ai th&iacute;ch những d&ograve;ng whisky c&oacute; hương vị mạnh mẽ v&agrave; b&ugrave;ng nổ. Người ta thường hay nhấm nh&aacute;p v&agrave;i l&aacute;t cam phủ chocolate c&ugrave;ng với rượu như một c&aacute;ch nu&ocirc;ng chiều vị gi&aacute;c thời thượng.</p>\r\n\r\n<p><strong>Rượu Mortlach 18&nbsp;</strong>sở hữu tất cả những ti&ecirc;u ch&iacute; cần c&oacute; của whisky mạch nha: m&agrave;u hổ ph&aacute;ch tươi s&aacute;ng, hương vị c&acirc;n bằng tuyệt vời giữa độ ngọt v&agrave; độ thanh.</p>',13,2,0,'2022-06-20 06:20:55','2022-06-20 06:24:00',NULL),(6,'Macallan A Night On Earth In Scotland','macallan-a-night-on-earth-in-scotland',4500000,'Hogmanay là lễ hội nổi tiếng của Scotland được tổ chức vào ngày cuối cùng của năm cũ. Lấy cảm hứng từ lễ hội này, Macallan A Night On Earth In Scotland  được tạo ra để ghi lại niềm vui chung của cả thế giới, ghi lại sự thay đổi trong suốt một năm qua.','<h2>Đ&aacute;nh gi&aacute; Macallan A Night On Earth In Scotland</h2>\r\n\r\n<h3>Giới thiệu về Macallan A Night On Earth In Scotland</h3>\r\n\r\n<p>Hogmanay l&agrave; lễ hội nổi tiếng của Scotland được tổ chức v&agrave;o ng&agrave;y cuối c&ugrave;ng của năm cũ. Lấy cảm hứng từ lễ hội n&agrave;y,&nbsp;<em><strong>Macallan A Night On Earth In Scotland</strong></em>&nbsp; được tạo ra để ghi lại niềm vui chung của cả thế giới, ghi lại sự thay đổi trong suốt một năm qua.</p>\r\n\r\n<p><em><strong>Macallan A Night On Earth In Scotland</strong></em>&nbsp;l&agrave; một chai whisky tuyệt vời với sự hợp t&aacute;c của họa sĩ minh họa người Ph&aacute;p gốc Nhật Erica Dorn, người đ&atilde; đ&oacute;ng g&oacute;p rất nhiều t&aacute;c phẩm nghệ thuật của m&igrave;nh trong c&aacute;c bộ phim của đạo diễn Wes Anderson. Kh&ocirc;ng chỉ sở hữu đường n&eacute;t hội họa trừu tượng độc đ&aacute;o, bao b&igrave; của chai Single Malt n&agrave;y cũng v&ocirc; c&ugrave;ng đặc biệt để mang đến trải nghiệm mở hộp th&uacute; vị. Tất cả hướng đến nghi lễ đốt lửa lịch sử thống trị trong suốt c&aacute;c lễ kỷ niệm năm mới h&agrave;ng trăm năm qua tại đ&acirc;y.</p>\r\n\r\n<p>Hogmanay (đọc l&agrave; Hog-muh-nei) l&agrave; lễ hội đ&ecirc;m giao thừa nổi tiếng của Scotland. Theo truyền thống, người đi trước sẽ mang theo ba thứ: b&aacute;nh m&igrave; ngắn, rượu whisky v&agrave; than để đốt lửa. Mỗi m&oacute;n qu&agrave; được thiết kế để mang lại sự thoải m&aacute;i v&agrave; hạnh ph&uacute;c cho ng&ocirc;i nh&agrave; của bạn trong suốt thời gian c&ograve;n lại của năm. V&agrave; thật tuyệt vời, b&aacute;nh m&igrave; cũng l&agrave; hương vị nổi bật trong chai whisky n&agrave;y, v&agrave; cũng sẽ hợp nhất nếu nhấm nh&aacute;p c&ugrave;ng một mẩu b&aacute;nh m&igrave;.</p>\r\n\r\n<p><em><strong>Macallan A Night On Earth In Scotland</strong></em>&nbsp;được tạo ra từ c&aacute;c th&ugrave;ng sherry từ gỗ sồi Mỹ v&agrave; Ch&acirc;u &Acirc;u đặc biệt của Macallan, c&ugrave;ng th&ugrave;ng rượu Ex-Bourbon, tất cả để mang đến đặc điểm giống như b&aacute;nh m&igrave; ngắn ngọt ng&agrave;o đậm đ&agrave; của n&oacute;. Một lại whisky đề cập đến m&oacute;n ngon truyền thống của Scotland &ndash; thứ bạn sẽ t&igrave;m thấy ở bất cứ đ&acirc;u trong lễ hội Hogmanay &ndash; sẽ được nhấn mạnh th&ecirc;m bởi hương cam kh&ocirc; v&agrave; gia vị của lễ hội.</p>\r\n\r\n<h3>Mua Macallan A Night On Earth In Scotland ở đ&acirc;u</h3>\r\n\r\n<p><em><strong>Macallan A Night On Earth In Scotland</strong></em>&nbsp;đ&atilde; xuất hiện tại một số điểm b&aacute;n ở Scotland, nhưng với số lượng qu&aacute; nhỏ, n&ecirc;n ch&uacute;ng hầu hết đ&atilde; được đưa l&ecirc;n c&aacute;c s&agrave;n đấu gi&aacute; Whisky. Việc sở hữu một chai&nbsp;<em><strong>Macallan A Night On Earth In Scotland</strong></em>&nbsp;v&agrave;o l&uacute;c n&agrave;y kh&ocirc;ng kh&aacute;c g&igrave; xếp h&agrave;ng mua iPhone mới ra mắt. Tuy vậy, ch&uacute;ng t&ocirc;i sẽ mang chai whisky đặc biệt n&agrave;y đến với c&aacute;c bạn chỉ trong một v&agrave;i ng&agrave;y nữa, tất nhi&ecirc;n l&agrave; trước khi năm cũ kết th&uacute;c rồi.</p>\r\n\r\n<p>Bạn cũng c&oacute; thể đặt h&agrave;ng&nbsp;<em><strong>Macallan A Night On Earth In Scotland</strong></em>&nbsp;tại Malt &amp; Co. bằng c&aacute;ch trực tiếp đến cửa h&agrave;ng tại H&agrave; Nội hoặc đặt h&agrave;ng online th&ocirc;ng qua c&aacute;c k&ecirc;nh&nbsp;<a href=\"https://www.facebook.com/maltandcovietnam\" rel=\"noopener\" target=\"_blank\">Facebook</a>, Website hoặc Zalo. Ch&uacute;ng t&ocirc;i giao h&agrave;ng tr&ecirc;n to&agrave;n quốc, v&agrave; giao h&agrave;ng si&ecirc;u tốc tại H&agrave; Nội.</p>\r\n\r\n<h2>Lịch sử nh&agrave; chưng cất The Macallan</h2>\r\n\r\n<p>Năm 1924, khi Alexander Reid &ndash; một n&ocirc;ng d&acirc;n &ndash; xin được giấy ph&eacute;p chưng cất rượu đầu ti&ecirc;n sau khi đạo luật thuế suất 1823 được th&ocirc;ng qua, cũng l&agrave; thời điểm&nbsp;<em><strong>Macallan</strong></em>&nbsp;ra đời. Nh&agrave; m&aacute;y được x&acirc;y dựng tại v&ugrave;ng Craigellachie &ndash; Speyside. Năm 1868, James Stuart đ&atilde; thu&ecirc; lại v&agrave; x&acirc;y dựng lại nh&agrave; m&aacute;y. Quyền sở hữu của &ocirc;ng chấm dứt năm 1892 khi &ocirc;ng b&aacute;n lại&nbsp;<em><strong>Macallan</strong></em>&nbsp;cho những người khổng lồ của ng&agrave;nh chưng cất khi đ&oacute;, Roderick Kemp, l&uacute;c đ&oacute; đ&atilde; sở hữu Talisker. Hậu duệ của Kemp vẫn giữ quyền sở hữu cho đến khi Highland Distillers (Nay l&agrave; Edrington Group) tiếp quản lại năm 1996.</p>\r\n\r\n<h3>Qu&aacute; tr&igrave;nh ph&aacute;t triển của Macallan</h3>\r\n\r\n<p>Nh&agrave; m&aacute;y&nbsp;<em><strong>Macallan</strong></em>&nbsp;đ&atilde; li&ecirc;n tục được mở rộng từ nh&agrave; kho l&agrave;m bằng gỗ ban đầu với 2 nồi tĩnh. Số lượng nồi tĩnh đ&atilde; được tăng l&ecirc;n 5 v&agrave;o năm 1954 v&agrave; sau đ&oacute; th&ecirc;m 7 v&agrave;o năm 1965. Họ tiếp tục mở rộng sản xuất trong suốt những năm 70 v&agrave; đạt số lượng 21 v&agrave;o năm 1975.</p>\r\n\r\n<p>Cũng giống như phần lớn c&aacute;c nh&agrave; m&aacute;y sản xuất whisky mạch nha kh&aacute;c, thời kỳ đầu,&nbsp;<em><strong>Macallan</strong></em>&nbsp;chỉ đ&oacute;ng vai tr&ograve; l&agrave; nguy&ecirc;n liệu của c&aacute;c loại Blended Whisky (v&agrave; cũng kh&ocirc;ng nổi tiếng lắm) cho đến tận đầu những năm 80. Đ&oacute; l&agrave; một bước ngoặt quan trọng,&nbsp;<em><strong>Macallan</strong></em>&nbsp;quyết định tập trung mạnh hơn v&agrave;o danh mục những chai Single Malt Whisky &ndash; m&agrave; v&agrave;o l&uacute;c đ&oacute;,&nbsp;<a href=\"https://maltco.asia/danh-muc/scotch-whisky/single-malt-whisky/speyside/glenfiddich/\">Glenfiddich</a>&nbsp;vẫn đang chiếm thế độc t&ocirc;n tr&ecirc;n thị trường.</p>\r\n\r\n<p>Kh&ocirc;ng cần phải n&oacute;i nhiều về đội ngũ nghi&ecirc;n cứu &amp; ph&aacute;t triển của&nbsp;<em><strong>Macallan</strong></em>&nbsp;bởi họ ch&iacute;nh l&agrave; cốt l&otilde;i th&agrave;nh c&ocirc;ng của h&atilde;ng sau n&agrave;y. Họ bắt đầu ph&aacute;t triển những loại whisky trưởng th&agrave;nh trong nhiều loại th&ugrave;ng kh&aacute;c nhau, v&agrave; gọi n&oacute; với c&aacute;i t&ecirc;n mỹ miều &ldquo;Cognac của thế giới whisky&rdquo; với c&aacute;ch tiếp thị ph&oacute;ng t&uacute;ng v&agrave; bất cần &ndash; nhưng mang lại hiệu quả kh&ocirc;ng ngờ.</p>\r\n\r\n<h3>Sự th&agrave;nh c&ocirc;ng trong thời hiện đại của Macallan</h3>\r\n\r\n<p>Tiếp nối th&agrave;nh c&ocirc;ng của loạt whisky trong những th&ugrave;ng Sherry cũ &ndash; thứ m&agrave; cả thế giới vẫn m&ecirc; đắm với t&ecirc;n gọi th&acirc;n mật: Sherry bomb,&nbsp;<em><strong>Macallan</strong></em>&nbsp;trở th&agrave;nh nh&agrave; chưng cất đầu ti&ecirc;n tạo ra kh&aacute;i niệm &ldquo;Th&ugrave;ng bespoke&rdquo; (Bespoke &ndash; từ &aacute;m chỉ thứ được tạo ra để d&agrave;nh ri&ecirc;ng cho bạn, ho&agrave;n to&agrave;n vừa vặn). Họ chọn những c&acirc;y sồi cụ thể, cho d&ugrave; l&agrave; sồi Mỹ hay T&acirc;y Ban Nha, c&ocirc;ng ty Tevasa c&oacute; trụ sở tại Jerez sẽ chỉ định độ d&agrave;i v&agrave; tiến h&agrave;nh sấy, đốt&hellip; rồi d&ugrave;ng để ủ loại sherry n&agrave;o để tạo ra loại gia vị ph&ugrave; hợp.</p>\r\n\r\n<p>Thực tế đ&atilde; chứng minh sự đầu tư n&agrave;y của họ đ&aacute;ng gi&aacute;.&nbsp;<em><strong>Macallan</strong></em>&nbsp;li&ecirc;n tục mở rộng khu sản xuất tại Jerez với số lượng nh&agrave; kho tăng ch&oacute;ng mặt theo thời gian, v&agrave; th&agrave;nh phẩm của họ &ndash; h&agrave;ng loạt h&agrave;ng loạt những chai&nbsp;<em><strong>Macallan</strong></em>&nbsp;được cả thế giới săn l&ugrave;ng v&agrave; lu&ocirc;n trong t&igrave;nh trạng ch&aacute;y h&agrave;ng tuyệt đối.</p>\r\n\r\n<p>Trong những năm gần đ&acirc;y, khi thế giới ch&uacute; &yacute; nhiều hơn đến thị trường whisky cao cấp, th&igrave;&nbsp;<em><strong>Macallan</strong></em>&nbsp;cũng l&agrave; thương hiệu khởi đầu cho tr&agrave;o lưu whisky sang trọng. Macallan 50, Macallan 60 v&agrave;&nbsp;<a href=\"https://maltco.asia/scotch-whisky/san-pham/macallan-72-yo-2018-in-lalique-genesis-decanter\">Macallan 72</a>&nbsp;năm tuổi trong b&igrave;nh Lalique lần lượt ra mắt tạo ra cơn sốt chưa từng c&oacute; từ trước tới nay.</p>\r\n\r\n<p>Cũng dễ hiểu, khi những th&ugrave;ng l&acirc;u năm của&nbsp;<em><strong>Macallan</strong></em>&nbsp;l&agrave; c&oacute; hạn, v&agrave; cả những th&ugrave;ng &ldquo;bespoke&rdquo; cũng vậy. Song song với d&ograve;ng cao cấp, h&atilde;ng vẫn tiếp tục ra mắt những chai trưởng th&agrave;nh trong th&ugrave;ng Bourbon v&agrave; ex-sherry cổ điển. Cho d&ugrave; người y&ecirc;u th&iacute;ch&nbsp;<em><strong>Macallan</strong></em>&nbsp;l&acirc;u năm c&oacute; thể kh&ocirc;ng th&iacute;ch ch&uacute;ng, nhưng những người mới thưởng thức whisky lại tỏ ra rất hứng th&uacute;, nhờ thế Macallan li&ecirc;n tục c&oacute; được th&agrave;nh c&ocirc;ng tiếp nối th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<h2>G&oacute;c nh&igrave;n kh&aacute;c với The Macallan</h2>\r\n\r\n<p>Nếu l&agrave; người y&ecirc;u th&iacute;ch whisky, chắc hẳn bạn cũng thấy được, những&nbsp;người đứng sau&nbsp;<em><strong>Macallan</strong></em>&nbsp;đ&atilde; cố gắng gieo v&agrave;o đầu người ti&ecirc;u d&ugrave;ng nhận thức về một thương hiệu &ldquo;độc nhất&rdquo; v&agrave; sang trọng, cho d&ugrave; thực tế th&igrave; nh&agrave; m&aacute;y của&nbsp;<em><strong>Macallan</strong></em>&nbsp;chỉ c&oacute; năng suất lớn thứ 2 hoặc thứ 3 ở Scotland, xếp sau&nbsp;<a href=\"https://maltco.asia/danh-muc/scotch-whisky/single-malt-whisky/speyside/glenfiddich/\">Glenfiddich</a>&nbsp;v&agrave;&nbsp;<a href=\"https://maltco.asia/danh-muc/scotch-whisky/single-malt-whisky/speyside/glenlivet/\">Glenlivet</a>. Tất nhi&ecirc;n, v&agrave;o những năm 1990,&nbsp;<em><strong>Macallan</strong></em>&nbsp;đ&atilde; từng l&agrave; thương hiệu rất được y&ecirc;u th&iacute;ch tại Ch&acirc;u &Acirc;u, khi họ vẫn lu&ocirc;n ủ whisky trong th&ugrave;ng sherry</p>\r\n\r\n<p>Tr&ecirc;n thực tế,&nbsp;<em><strong>Macallan</strong></em>&nbsp;đ&atilde; ra mắt loạt rượu ủ trong th&ugrave;ng bourbon thuộc d&ograve;ng &lsquo;Fine Oak&rsquo; v&agrave;o năm 2004, nhưng thực tế, điều n&agrave;y bắt đầu từ khi n&agrave;o th&igrave; kh&ocirc;ng ai d&aacute;m chắc, rất c&oacute; thể l&agrave; từ những năm 1970 &ndash; h&atilde;y nh&igrave;n v&agrave;o những chai Fine Oak 25 năm hoặc 30 năm tuổi v&agrave; đặt c&acirc;u hỏi.</p>\r\n\r\n<p>Tr&ecirc;n thực tế, gi&aacute; trị cốt l&otilde;i của&nbsp;<em><strong>Macallan</strong></em>&nbsp;dường như ng&agrave;y c&agrave;ng trượt dần từ rượu th&agrave;nh PR. Thậm ch&iacute; những người cuồng malt whisky đ&atilde; c&oacute; những b&agrave;i viết nghi ngại về t&iacute;nh x&aacute;c thực về độ l&acirc;u đời cũng như nguồn gốc rượu xuất ph&aacute;t từ nh&agrave;&nbsp;<em><strong>Macallan</strong></em>, tất nhi&ecirc;n họ cũng kh&ocirc;ng thể chứng minh được điều đ&oacute;.</p>\r\n\r\n<p>Tất nhi&ecirc;n, đ&oacute; c&oacute; thể l&agrave;&nbsp;<em><strong>Macallan</strong></em>&nbsp;trong thời kỳ đổi mới, v&agrave; dần trẻ hơn, hiện đại hơn. C&ograve;n nếu bạn muốn t&igrave;m về hương vị sherry cổ điển th&igrave; vẫn c&ograve;n kh&aacute; nhiều lựa chọn. Đầu ti&ecirc;n l&agrave; những chai&nbsp;<a href=\"https://maltco.asia/?s=macallan+sherry+oak&amp;post_type=product\">Sherry Oak</a>&nbsp;c&oacute; số năm tuổi, v&agrave; sau đ&oacute; ch&iacute;nh l&agrave; mẫu chai đặc biệt Macallan 10 năm Cask Strength.</p>',13,NULL,0,'2022-06-20 10:40:20','2022-06-20 10:40:20',NULL),(7,'Macallan Harmony Collection Rich Cacao','macallan-harmony-collection-rich-cacao',9900000,'Macallan Harmony Collection Rich Cacao được tạo ra từ hai loại thùng gỗ sồi Châu Âu và Mỹ (ủ sherry trước đó) và sẽ là sự kết hợp hoàn hảo với chocolate đậm đà. Chất rượu sẽ mang đến hương thơm của chocolate mềm, mật ong, gỗ sồi, chanh leo và gừng, trong khi vị sẽ là sự xuất hiện của chocolate đen, chà là, vani và quế. Macallan Harmony Collection Rich Cacao được đựng trong hộp trình bày có thế tái chế và phân hủy sinh học, thân thiện với tự nhiên, được làm từ chính các sản phẩm phụ trong quá trình sản xuất chocolate – đó là vỏ quả cacao',NULL,13,NULL,0,'2022-06-20 10:42:18','2022-06-20 10:42:18',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Root','2022-05-11 05:04:29','2022-05-11 05:04:29'),(2,'Admin','2022-05-11 05:04:29','2022-05-11 05:04:29'),(3,'Member','2022-05-11 05:04:29','2022-05-11 05:04:29');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Trần Văn Hiệp','tranhieptvh@gmail.com','$2y$10$EbXUXY3oWfSR2fW9kqT6he1FBLF0Ty6zuA197AFjL8G45sW1dmSl6',NULL,'30-07-1997','0985250657','Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',1,NULL,NULL,'2022-05-13 04:43:16','2022-05-13 04:43:16'),(2,'HiệpTV','hieptv@kaopiz.com','$2y$10$L.1c5OI5O/gZ3khkaXXPjuorNJxiBtI7/QdF.1mw//DX2UyYv.kMa',NULL,'30-07-1997','0985250657','Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',2,'uploads/images/user/1653281712_user.jpg','rSQe381adtCpqh2pJgL6ziKlXcsa5ulJvZbM8tWnCLjLLQAw19Roy0jwYcE5','2022-05-13 04:43:16','2022-05-23 04:55:12'),(3,'Trần Hiệp','tranhieptvh97@gmail.com','$2y$10$FmqU.pxdiUhJOWmOZM.NQuN/BTFKQuUT4brSTXB0MaH8z/GXisPGG',NULL,'30-07-1997','0985250657','Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',3,'uploads/images/user/1653281943_user.jpg',NULL,'2022-05-13 06:41:18','2022-05-23 04:59:03'),(4,'Trần Hiệp + 1','tranhieptvh97+1@gmail.com','$2y$10$hwxM7cIHMWWwJQY9BbUeM.dzEzM0B.tp/IYQ3wPX3/hL8zOksdcB.',NULL,'30-07-1997','0185250657','Số 1 Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc 1',3,NULL,NULL,'2022-05-13 08:55:42','2022-05-13 09:18:54'),(8,'Trần Hiệp + 5','tranhieptvh97+5@gmail.com','$2y$10$fLEFPqW2M1WMCPOWY6I9SOqNyT.bWoco4fbrTkH22VuBrJoFS4JWO',NULL,'30-07-1997','0585250657','Số 5 Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',3,NULL,NULL,'2022-05-13 08:55:42','2022-05-13 08:55:42'),(9,'Trần Hiệp + 6','tranhieptvh97+6@gmail.com','$2y$10$CVqqg8JlRN5kEFk/XvUTd.T7GtIFJsbaVfz/I5.ZQMmokpaWnU83y',NULL,'30-07-1997','0685250657','Số 6 Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',3,NULL,NULL,'2022-05-13 08:55:42','2022-05-13 08:55:42'),(10,'Trần Hiệp + 7','tranhieptvh97+7@gmail.com','$2y$10$ELS7QymDIGi3rz5Yvkhx7uVFTYCj0EDh3fTebuTx/bwlMg6rxR/wG',NULL,'30-07-1997','0785250657','Số 7 Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',3,NULL,NULL,'2022-05-13 08:55:42','2022-05-13 08:55:42'),(11,'Trần Hiệp + 8','tranhieptvh97+8@gmail.com','$2y$10$K84vOBPV2da3KqTe8DdAT.AG.ceVSXnAbp705oe/dTLjECtytebHq',NULL,'30-07-1997','0885250657','Số 8 Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',3,NULL,NULL,'2022-05-13 08:55:42','2022-05-13 08:55:42'),(12,'Trần Hiệp + 9','tranhieptvh97+9@gmail.com','$2y$10$HFrGgL8Gw2m7t4ZPPu/Fp.wKP5pbQ/FtMu1FxFvX2iZUaYI8y2kuq',NULL,'30-07-1997','0985250657','Số 9 Vĩnh Thịnh, Vĩnh Tường, Vĩnh Phúc',3,NULL,NULL,'2022-05-13 08:55:42','2022-05-13 08:55:42'),(18,'Tran Van Hiep','tranhieptvh97+11@gmail.com','$2y$10$AMCB88BT8cedLKMXwT3oCO60.CTtylPCHOWt.cg0qYcixeCz7Sw6W',NULL,'18-05-2022','0985250657','Vinh Thinh',3,NULL,NULL,'2022-05-18 02:25:39','2022-05-18 02:25:39'),(19,'Tran Van Hiep','tranhieptvh+10@gmail.com','$2y$10$4h6axWenw7J6kavtWbd//OziP2hahffm5lTF4UaofH0iZhgLgAm3u',NULL,'30-07-1997','0985250657','Vinh Thinh',3,NULL,NULL,'2022-05-20 00:36:10','2022-05-20 00:36:10'),(21,'Tran Van Hiep','tranhieptvh+12@gmail.com','$2y$10$a2B5FqBv3mcIPYWEuCJIo.0gaHOujAOEouVCPYQalZGRfI0IwwCm2',NULL,'30-07-1997','0985250657','Vinh Thinh',3,NULL,NULL,'2022-05-20 00:36:50','2022-05-20 00:36:50'),(22,'Tran Van Hiep','tranhieptvh+13@gmail.com','$2y$10$xOCbaiEgCeYxVJw0V88fheue12xqnFAz0Gf.ol95C3r8eVEGBv6my',NULL,'30-07-1997','0985250657','Vinh Thinh',3,NULL,NULL,'2022-05-20 02:46:58','2022-05-20 02:46:58'),(23,'Tran Van Hiep','tranhieptvh+14@gmail.com','$2y$10$p4SaMmhHcDJtUrQ0wdn3u.z5ZybVAlBpbX5kgOR30U9V/GDk2qLpW',NULL,'30-07-1997','0985250657','Vinh Thinh',3,NULL,NULL,'2022-05-20 02:49:05','2022-05-20 02:49:05'),(24,'Tran Van Hiep','tranhieptvh+15@gmail.com','$2y$10$g2hFi.wK7J8wx0/QpK/Sdep1kk3e2tm9Mm7BfO.fP9ojNeqmyI/Hy',NULL,'30-07-1997','0985250657','Vinh Thinh',3,'uploads/images/user/user_1653560791.jpg',NULL,'2022-05-20 02:49:29','2022-05-26 10:26:31'),(25,'Tran Van Hiep','tranhieptvh+19@gmail.com','$2y$10$2.K1uZ5gyIU/WL3B2KnQkesNjiRUxX3TXBHm.NaEICPWC7LqoEeKO',NULL,'26-05-2022','0985250657','Vinh Thinh',3,'uploads/images/user/user_1653560708.jpg',NULL,'2022-05-26 10:25:08','2022-05-26 10:25:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-20 17:52:56
