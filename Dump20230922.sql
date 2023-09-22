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
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2023_09_20_080840_product',1),(4,'2023_09_20_081049_product_loan',1);
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
-- Table structure for table `product_user`
--

DROP TABLE IF EXISTS `product_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `take_product` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_loan_id_name_product_foreign` (`product_id`),
  KEY `product_loan_id_user_foreign` (`user_id`),
  CONSTRAINT `product_loan_id_name_product_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_loan_id_user_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_user`
--

LOCK TABLES `product_user` WRITE;
/*!40000 ALTER TABLE `product_user` DISABLE KEYS */;
INSERT INTO `product_user` VALUES (1,15,10,0),(2,16,11,0),(3,17,12,0),(4,18,13,0),(5,19,14,0),(6,20,15,0),(7,21,16,0),(8,22,17,0),(9,23,18,0),(10,24,19,0);
/*!40000 ALTER TABLE `product_user` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (7,'Mr. Arjun Dicki Jr.',0),(8,'Dr. Kobe Murray V',0),(9,'Mack Haley',0),(10,'Barry Buckridge',0),(11,'Destany Rolfson MD',0),(12,'Hilario Waelchi',0),(13,'Bell Collins',0),(14,'Mr. Adalberto Torphy DDS',0),(15,'Ole Will Sr.',0),(16,'Dr. Keagan Ondricka',0),(17,'Dr. Matteo Terry',0),(18,'Ms. Thalia Bauch',0),(19,'Mr. Raven Bechtelar Sr.',0);
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'Prof. Bridgette O\'Kon DDS','olson.hallie@example.net','$2y$10$mr2d/3C2ICfIwGJOuuwaS.ysLH0hX0tjub29SlknLlZL4d.PXwXL2',NULL),(13,'Constance Greenfelder','harold.gottlieb@example.com','$2y$10$atf7PrgSr6dMVIBUvpjAQ.wkm79ka1Y53ddxeopE.AwPxENPVD9ky',NULL),(14,'Julius Konopelski IV','medhurst.emelie@example.net','$2y$10$FXePnNi6CsUJEc.QO2tl9O8gl0ZNYRtzAj4siIt8DT9mIkZP6K64G',NULL),(15,'Libbie Reilly','graham.fay@example.net','$2y$10$/fy2Ipjt4eIuNymH2Paqge2L8vL/8zTRXGCCnrvDiclOcSPJZaJVG',NULL),(16,'Ms. Isobel Spencer DVM','fkreiger@example.org','$2y$10$88XBDWRJ4i2eli83j6UwPeMPAYKP788luhqaQ0WCGxLrfX0yN8j1u',NULL),(17,'Prof. Janessa Bailey','ijacobs@example.org','$2y$10$ZFRnYKt1boL4qfhUkul5ke0l.Vbkvoo/5IkB/gZMGNFiUl3336WWK',NULL),(18,'Cathrine Turner','mateo64@example.com','$2y$10$TxKP5PQnNppiP.nqyLTa/uuV9khsMvoAJCzpCAtXaphex92lXTNLa',NULL),(19,'Teagan Harvey','curt98@example.net','$2y$10$NbYnHAjRino5lZRw8y9hA.yTbMtt14kP.cnXLACNhQiMuyz34YO7u',NULL),(20,'Gaetano Wilderman','gcrist@example.com','$2y$10$u6MvUx.zoakSQ2vReV1Bjecv/y4f4LJUqn3///Le0SWq4EmHy0uve',NULL),(21,'Forrest Reinger PhD','ohara.finn@example.org','$2y$10$eQdaEWzI4w8hfwVc0zcJIeukELD.xVf8TccdFzPl6bYN/DxluF9qS',NULL),(22,'Miss Elouise Gerlach','barbara92@example.com','$2y$10$PeYX7zvQVc2wt/V1LrC1Qumd1.r.NQAxU0yYgQlfi0b5H7vRK/mvC',NULL),(23,'Kareem Lakin','wilfrid10@example.org','$2y$10$YMSUWPhauf94o4z2jLCfIuuUzvNRgthhs6gdqQlNONNw9VktLfyha',NULL),(24,'Dr. Rodrick Kertzmann I','ebert.scot@example.com','$2y$10$JdfIfIylSFKyoZZpB6U2aevtY33KWm.bXTFWQsH.5Y5ruUvBCyGuS',NULL);
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

-- Dump completed on 2023-09-22 14:59:09
