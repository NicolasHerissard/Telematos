-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: telematos
-- ------------------------------------------------------
-- Server version	8.0.33

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
  KEY `product_user_user_id_foreign` (`user_id`),
  KEY `product_user_product_id_foreign` (`product_id`),
  CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_users`
--

LOCK TABLES `product_users` WRITE;
/*!40000 ALTER TABLE `product_users` DISABLE KEYS */;
INSERT INTO `product_users` VALUES (1,2,2,0),(2,3,3,0),(3,4,4,0),(4,5,5,0),(5,6,6,0),(6,7,7,0),(7,8,8,0),(8,9,9,0),(9,10,10,0),(10,11,11,0),(11,12,3,3),(12,12,7,10),(13,12,9,1),(14,12,3,2);
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
INSERT INTO `products` VALUES (1,'Dr. Estelle Crona',0),(2,'Soledad Metz',0),(3,'Shane Reilly',0),(4,'Harley Rempel',0),(5,'Lucio Borer',0),(6,'Joanie Mosciski',0),(7,'Billie Bosco',0),(8,'Dr. Dion Bernier',0),(9,'Dr. Corene Hansen PhD',0),(10,'Dr. Mariana Graham',0),(11,'Jamal Abernathy',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tracey Hessel','francisca.wunsch@example.com','$2y$10$/dJdUGuEBvTYEZ.meEIqMuirKMl7CvYGGF6vkHXiR/2D//bvqIAiC',NULL,0),(2,'Elvis Johns','hellen82@example.com','$2y$10$FDWczq0lDPV7x5gW7Euyne/8IMeqUzwMW1snmHuzGG06xHHY1yl1G',NULL,0),(3,'Glennie Larson','hammes.elinor@example.com','$2y$10$I2AklKRpp92EZkAxJNi8M.nDv0UEX1GfWTNpe0XZuUz7bEvOcohvu',NULL,0),(4,'Roxanne Larkin','vallie76@example.com','$2y$10$l1OmCmlW8NxMfPCRonbv/efDTJn/VBl3DmKdx7zXedn4guJo7wNF2',NULL,0),(5,'Nicole Russel','melissa74@example.org','$2y$10$3B6jg0SitelfDYKRfX8ps.so5FEJ1lxI8k6eQG5N8nftf28I79rkm',NULL,0),(6,'Glenda Kuhic','herminia.koepp@example.org','$2y$10$HOJDyyYSPRnvk91mXCGvEeQc5NreNfaM82yVbV9qYr/cHRe.UOA2K',NULL,0),(7,'Mrs. Taryn Yundt','xcorwin@example.com','$2y$10$nt7if/CKLvN1H6dSyrTP.etYk.ZL.GmYAn5b7VrWds57gZbXQmTly',NULL,0),(8,'Landen Dicki I','prince59@example.net','$2y$10$TrnuGfqvlkABWovEJHQQUudNNk4yvghd8j1ZtQ.GQh6VTriUUNxca',NULL,0),(9,'Jermain Vandervort','anna.tremblay@example.org','$2y$10$Y.e71AF0GUl.wbGphtyOjuf1MN5lUaYfGJXB2up0FVpQ93cPKhl8.',NULL,0),(10,'Ramon Dooley','skuhlman@example.net','$2y$10$bRshHcncz8XSB1QWDd2AlOfYg1VouHz1.Qb4cgvSicv.PitWD.iAG',NULL,0),(11,'Miss Zoey Johns III','juana.hayes@example.com','$2y$10$FyLRl.g7dWOmQcPSSfWK7.ledW6fBuP/ffNXaxSn4zLFB01N3ditW',NULL,0),(12,'name','name@gmail.com','$2y$10$lZapKloEkoyrUWL3jWNX2e0hEEuM/dH3ZmAs6SrwBEzFmiMmxT1R6',NULL,0),(13,'admin','admin@gmail.com','$2y$10$8dbW7uy.6.cCSPa0Yqxeu.6TpD3gmWQWLejWgJKtOmLFmcCe8TWUW',NULL,1);
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

-- Dump completed on 2023-09-28 19:55:50
