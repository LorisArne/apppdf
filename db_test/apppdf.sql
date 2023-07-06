-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 192.168.56.56    Database: apppdf
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_06_22_102924_create_permission_tables',1),(6,'2023_06_29_123954_create_proceduras_table',2),(7,'2023_06_29_131153_add_nome_procedura_documento_da_firmare_to_proceduras',3),(8,'2023_06_29_143359_add_fields_firmatario_to_proceduras',4),(9,'2023_07_02_231042_add_creator_to_proceduras',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (3,'App\\Models\\User',2),(1,'App\\Models\\User',3),(3,'App\\Models\\User',4),(3,'App\\Models\\User',6);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'sanctum.csrf-cookie','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(2,'home.index','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(3,'register','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(4,'login','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(5,'logout.perform','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(6,'users.index','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(7,'users.create','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(8,'users.store','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(9,'users.show','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(10,'users.edit','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(11,'users.update','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(12,'users.destroy','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(13,'roles.index','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(14,'roles.create','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(15,'roles.store','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(16,'roles.show','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(17,'roles.edit','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(18,'roles.update','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(19,'roles.destroy','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(20,'permissions.index','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(21,'permissions.create','web','2023-06-22 10:48:45','2023-06-22 10:48:45'),(22,'permissions.store','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(23,'permissions.show','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(24,'permissions.edit','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(25,'permissions.update','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(26,'permissions.destroy','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(27,'password.request','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(28,'password.email','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(29,'password.reset','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(30,'password.store','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(31,'verification.notice','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(32,'verification.verify','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(33,'verification.send','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(34,'password.confirm','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(35,'password.update','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(36,'logout','web','2023-06-22 10:48:46','2023-06-22 10:48:46'),(37,'proceduras.index','web','2023-06-29 10:46:57','2023-06-29 11:01:30'),(38,'proceduras.create','web','2023-06-29 11:03:41','2023-06-29 11:03:41'),(39,'proceduras.store','web','2023-06-29 11:03:52','2023-06-29 11:03:52'),(40,'proceduras.edit','web','2023-06-29 11:04:01','2023-06-29 11:04:01'),(41,'proceduras.update','web','2023-06-29 11:04:11','2023-06-29 11:04:11'),(42,'proceduras.destroy','web','2023-06-29 11:04:20','2023-06-29 11:04:20'),(43,'proceduras.firma','web','2023-07-02 17:02:16','2023-07-02 17:02:16'),(44,'proceduras.firmaupdate','web','2023-07-02 17:21:53','2023-07-02 17:21:53'),(45,'download.file','web','2023-07-04 15:16:18','2023-07-04 15:16:18');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
-- Table structure for table `proceduras`
--

DROP TABLE IF EXISTS `proceduras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proceduras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firma1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firmatario1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firmatario2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firmatario3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firmatario4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firmatario5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_firme` int unsigned NOT NULL DEFAULT '1',
  `creator` int DEFAULT NULL,
  `nome_procedura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento_da_firmare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceduras`
--

LOCK TABLES `proceduras` WRITE;
/*!40000 ALTER TABLE `proceduras` DISABLE KEYS */;
INSERT INTO `proceduras` VALUES (41,'2023-07-04 14:17:14','2023-07-04 14:40:13','prova1_firma1_1688488664.pdf','prova1_firma2_1688488813.pdf',NULL,NULL,NULL,'2','4','6',NULL,NULL,3,3,'prova1','prova1_1688487433.pdf'),(42,'2023-07-04 14:21:08','2023-07-04 14:21:08',NULL,NULL,NULL,NULL,NULL,'2','4','6',NULL,NULL,3,3,'prova1','prova1_1688487668.pdf'),(43,'2023-07-04 14:21:41','2023-07-04 14:21:41',NULL,NULL,NULL,NULL,NULL,'2','4','6',NULL,NULL,3,3,'prova1','prova1_1688487701.pdf');
/*!40000 ALTER TABLE `proceduras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(45,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3),(41,3),(42,3),(43,3),(44,3),(45,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Superadmin','web','2023-06-29 10:24:21','2023-07-02 21:38:43'),(2,'admin','web','2023-07-02 21:39:38','2023-07-02 21:39:38'),(3,'Utente','web','2023-07-02 21:40:24','2023-07-04 14:49:31');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Prova1','Loris prova1','loris.arne@alice.it',NULL,'$2y$10$715HBIFcdh5yxKFdmpcld.DHewH2l7019LOaX0mmJnqlpyZJU.D0q',NULL,'2023-07-02 13:46:45','2023-07-02 13:46:45'),(3,'Loris arnè','larne','loris@comestudio.it',NULL,'$2y$10$715HBIFcdh5yxKFdmpcld.DHewH2l7019LOaX0mmJnqlpyZJU.D0q','nY3yBfD97t7TqblOYJZvYmIET8qluldMrcifK8NkK5SUHcMwpn3YQ69j0Xnq','2023-07-02 21:32:40','2023-07-02 21:36:14'),(4,'prova2','prova2','info@loris-arne.com',NULL,'$2y$10$715HBIFcdh5yxKFdmpcld.DHewH2l7019LOaX0mmJnqlpyZJU.D0q',NULL,'2023-07-02 21:37:52','2023-07-02 21:37:52'),(6,'virgilio prova','virgilio prova','loris.arne1@virgilio.it',NULL,'$2y$10$715HBIFcdh5yxKFdmpcld.DHewH2l7019LOaX0mmJnqlpyZJU.D0q',NULL,'2023-07-04 03:22:38','2023-07-04 03:22:38');
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

-- Dump completed on 2023-07-06 18:56:07
