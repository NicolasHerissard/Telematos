-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: telematos
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2023_09_20_080840_products',1),(4,'2023_09_20_081049_product_user',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_users`
--

DROP TABLE IF EXISTS `product_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `take_product` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_users_user_id_foreign` (`user_id`),
  KEY `product_users_product_id_foreign` (`product_id`),
  CONSTRAINT `product_users_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_users`
--

LOCK TABLES `product_users` WRITE;
/*!40000 ALTER TABLE `product_users` DISABLE KEYS */;
INSERT INTO `product_users` VALUES (4,4,4,0),(5,5,5,0),(6,6,6,0),(8,8,8,0),(11,11,5,3),(15,12,11,1),(23,11,5,3),(24,11,8,1);
/*!40000 ALTER TABLE `product_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (4,'Écran',2),(5,'PC',7),(6,'Souris',0),(8,'Clavier',4),(11,'produit',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `isadmin` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Misty Marquardt','bartell.jakayla@example.com','$2y$10$Dox4rUC7YZCXW/84ENXLMOFTM9kIrNcB1m.gLAdSxcSar07KlLZBC',NULL,0),(3,'Keagan Kertzmann','ulangosh@example.net','$2y$10$M3s4nkFpM/VP/oEMfcqCm.m9dO3mmcLOlkdcnt5pNWHQjpoVnVPnm',NULL,0),(4,'Darrell Torphy','bernice.klocko@example.org','$2y$10$LbfmJT99P8QZlBpq0h.CTuNQtxK4EhjqIMotfzx4eVG5kLhQ/4muS',NULL,0),(5,'Stevie Marvin','imoore@example.org','$2y$10$hhTRXB4l1B6EhBgbeOu5QOam9RRClEf6dOjaZEgl7Bhjsj28TfsrW',NULL,0),(6,'Miss Lilyan Hodkiewicz','fabiola.harvey@example.net','$2y$10$LHT8hoHaMxBltpYv.nTHEeXPhYyoXzG.EO9KCGfLkOW/GnZq4ik/W',NULL,0),(7,'Justen Roob','qvon@example.org','$2y$10$Ferih4GFZXPt55dZq6FTUuzvt/CKc47LwCwfR/UQ6cHdoFnSz1gRa',NULL,0),(8,'Wallace Monahan','ngislason@example.com','$2y$10$VInon.FZl/GEx.R/x3edleUj85ORAmbtrO9UmGWiFBg1AMQ/gluum',NULL,0),(9,'Rachel Klein','maddison74@example.com','$2y$10$tXrKOVYE93AVzweY6RAMmeiHC4SkPYX0tOXq6tK9isbjjntA0qW7.',NULL,0),(10,'Mr. Wilburn Hyatt Sr.','prosacco.rosalia@example.net','$2y$10$XDqFl8Xl/t7Wuagrd0d/QuAnqZ1Kp2lqtrHVR.Xt78WuDJAyNZ2la',NULL,0),(11,'admin','admin@gmail.com','$2y$10$TPWX2yg4nAKPnk01WWqAwuT2UMlj66Ju/eO.PDBKqpce0KLR142i2',NULL,1),(12,'name','name@gmail.com','$2y$10$Mfgapm./EdxlWisb48BTi.VuDkyqZI/WQOAyAoyBaMoi24rG5bvui',NULL,0),(13,'test','test@gmail.com','$2y$10$4GvVQqZEHygRuAjVu/J5veoxPkjVqMu4/0t8TmPbI2gh8bTHKcR9i',NULL,0),(15,'&lt;script&gt;alert(&#039;ok&#039;)&lt;/script&gt;','tes@gmail.com','$2y$10$0R2w/I8.4S2hYhBNJyZTOuYHdnzlouqCCK8BoSrrxIxrYggdJVjvS',NULL,0),(16,'<script>alert(\'ok\')</script>','t@gmail.com','$2y$10$d.3Ike60Wmn.MZTW3U9rnurV6/6DLszqgNnfUUnOQTtTgf6HwnfIe',NULL,0),(17,'&lt;script&gt;alert(&#039;ok&#039;)&lt;/script&gt;','tt@gmail.com','$2y$10$/J5sNjn.MhdU9tkF4vV56ecpCBzebI8ukM24XztwCzi2y7BT08qy2',NULL,0),(18,'a','a@gmail.com','$2y$10$Pl23RRysFan5FNmmaeg5M.dfr9asdJxtRDn6OkKdHhikr/bjpDm6W',NULL,0),(19,'b','b@b.com','$2y$10$1JZkRW.4J03dHA2WNxsFwutufi.GfzAjX7UUXlQFdC0x5Wz3K72iK',NULL,0);
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

-- Dump completed on 2024-04-16 15:35:40
