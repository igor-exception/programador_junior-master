-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: callcenter
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `historico_estados`
--

DROP TABLE IF EXISTS `historico_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historico_estados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_agente` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `data_hora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_estados`
--

LOCK TABLES `historico_estados` WRITE;
/*!40000 ALTER TABLE `historico_estados` DISABLE KEYS */;
INSERT INTO `historico_estados` VALUES (1,'Chaves','disponivel','2025-07-15 08:00:00'),(2,'Chaves','ocupado','2025-07-15 08:05:00'),(3,'Chaves','disponivel','2025-07-15 08:30:00'),(4,'Chaves','pausado','2025-07-15 09:00:00'),(5,'Chaves','disponivel','2025-07-15 09:15:00'),(6,'Chaves','chamando','2025-07-15 09:20:00'),(7,'Chaves','ocupado','2025-07-15 09:25:00'),(8,'Chaves','disponivel','2025-07-15 09:50:00'),(9,'Chaves','indisponivel','2025-07-15 10:00:00'),(10,'Kiko','disponivel','2025-07-15 07:50:00'),(11,'Kiko','chamando','2025-07-15 08:00:00'),(12,'Kiko','ocupado','2025-07-15 08:08:00'),(13,'Kiko','disponivel','2025-07-15 08:40:00'),(14,'Kiko','pausado','2025-07-15 09:05:00'),(15,'Kiko','disponivel','2025-07-15 09:30:00'),(16,'Kiko','indisponivel','2025-07-15 09:55:00'),(17,'Kiko','disponivel','2025-07-15 10:20:00'),(18,'Kiko','ocupado','2025-07-15 10:35:00'),(19,'Nhonho','disponivel','2025-07-15 07:30:00'),(20,'Nhonho','ocupado','2025-07-15 07:50:00'),(21,'Nhonho','disponivel','2025-07-15 08:20:00'),(22,'Nhonho','chamando','2025-07-15 08:40:00'),(23,'Nhonho','ocupado','2025-07-15 08:50:00'),(24,'Nhonho','pausado','2025-07-15 09:15:00'),(25,'Nhonho','disponivel','2025-07-15 09:30:00'),(26,'Nhonho','indisponivel','2025-07-15 09:50:00'),(27,'Nhonho','disponivel','2025-07-15 10:10:00'),(28,'Chiquinha','disponivel','2025-07-15 07:20:00'),(29,'Chiquinha','chamando','2025-07-15 07:30:00'),(30,'Chiquinha','ocupado','2025-07-15 07:42:00'),(31,'Chiquinha','disponivel','2025-07-15 08:10:00'),(32,'Chiquinha','pausado','2025-07-15 08:40:00'),(33,'Chiquinha','disponivel','2025-07-15 09:05:00'),(34,'Chiquinha','indisponivel','2025-07-15 09:25:00'),(35,'Chiquinha','disponivel','2025-07-15 09:50:00'),(36,'Chiquinha','ocupado','2025-07-15 10:05:00'),(37,'Godines','disponivel','2025-07-15 07:10:00'),(38,'Godines','chamando','2025-07-15 07:20:00'),(39,'Godines','ocupado','2025-07-15 07:32:00'),(40,'Godines','disponivel','2025-07-15 08:00:00'),(41,'Godines','pausado','2025-07-15 08:35:00'),(42,'Godines','disponivel','2025-07-15 09:00:00'),(43,'Godines','indisponivel','2025-07-15 09:20:00'),(44,'Godines','disponivel','2025-07-15 09:40:00'),(45,'Godines','ocupado','2025-07-15 10:00:00'),(46,'Chaves','disponivel','2025-07-16 08:00:00'),(47,'Chaves','chamando','2025-07-16 08:05:00'),(48,'Chaves','ocupado','2025-07-16 08:10:00'),(49,'Chaves','disponivel','2025-07-16 08:40:00'),(50,'Chaves','pausado','2025-07-16 09:00:00'),(51,'Chaves','disponivel','2025-07-16 09:20:00'),(52,'Chaves','indisponivel','2025-07-16 09:50:00'),(53,'Chaves','disponivel','2025-07-16 10:30:00'),(54,'Chaves','ocupado','2025-07-16 10:45:00'),(55,'Kiko','disponivel','2025-07-16 07:45:00'),(56,'Kiko','chamando','2025-07-16 07:55:00'),(57,'Kiko','ocupado','2025-07-16 08:05:00'),(58,'Kiko','disponivel','2025-07-16 08:40:00'),(59,'Kiko','pausado','2025-07-16 08:55:00'),(60,'Kiko','disponivel','2025-07-16 09:10:00'),(61,'Kiko','indisponivel','2025-07-16 09:30:00'),(62,'Kiko','disponivel','2025-07-16 10:00:00'),(63,'Kiko','ocupado','2025-07-16 10:20:00'),(64,'Nhonho','disponivel','2025-07-16 07:40:00'),(65,'Nhonho','chamando','2025-07-16 07:55:00'),(66,'Nhonho','ocupado','2025-07-16 08:10:00'),(67,'Nhonho','disponivel','2025-07-16 08:35:00'),(68,'Nhonho','pausado','2025-07-16 09:00:00'),(69,'Nhonho','disponivel','2025-07-16 09:20:00'),(70,'Nhonho','indisponivel','2025-07-16 09:45:00'),(71,'Nhonho','disponivel','2025-07-16 10:10:00'),(72,'Nhonho','ocupado','2025-07-16 10:30:00'),(73,'Chiquinha','disponivel','2025-07-16 07:35:00'),(74,'Chiquinha','chamando','2025-07-16 07:45:00'),(75,'Chiquinha','ocupado','2025-07-16 08:00:00'),(76,'Chiquinha','disponivel','2025-07-16 08:30:00'),(77,'Chiquinha','pausado','2025-07-16 08:50:00'),(78,'Chiquinha','disponivel','2025-07-16 09:15:00'),(79,'Chiquinha','indisponivel','2025-07-16 09:40:00'),(80,'Chiquinha','disponivel','2025-07-16 10:05:00'),(81,'Chiquinha','ocupado','2025-07-16 10:25:00'),(82,'Godines','disponivel','2025-07-16 07:10:00'),(83,'Godines','chamando','2025-07-16 07:50:00'),(84,'Godines','ocupado','2025-07-16 08:32:00'),(85,'Godines','disponivel','2025-07-16 08:10:00'),(86,'Godines','pausado','2025-07-16 08:35:00'),(87,'Godines','disponivel','2025-07-16 09:30:00'),(88,'Godines','indisponivel','2025-07-16 09:40:00'),(89,'Godines','disponivel','2025-07-16 09:50:00'),(90,'Godines','ocupado','2025-07-16 10:00:00'),(91,'Chaves','disponivel','2025-07-17 05:40:49'),(92,'Kiko','disponivel','2025-07-17 05:40:49'),(93,'Godines','disponivel','2025-07-17 05:40:49'),(94,'Nhonho','disponivel','2025-07-17 05:40:49'),(95,'Chiquinha','disponivel','2025-07-17 05:40:49');
/*!40000 ALTER TABLE `historico_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ramais`
--

DROP TABLE IF EXISTS `ramais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ramais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nome_agente` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `porta` varchar(50) DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `atualizado_em` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=15308 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ramais`
--

LOCK TABLES `ramais` WRITE;
/*!40000 ALTER TABLE `ramais` DISABLE KEYS */;
INSERT INTO `ramais` VALUES (1,'7000','7000','Chaves','181.219.125.7','42367',1,'disponivel','2025-07-17 04:14:36'),(2,'7001','7001','Kiko','181.219.125.7','42368',1,'disponivel','2025-07-17 04:14:36'),(3,'7002','7004','Godines',NULL,NULL,0,'disponivel','2025-07-17 04:14:36'),(4,'7003','7003','Nhonho',NULL,NULL,0,'disponivel','2025-07-17 04:14:36'),(5,'7004','7002','Chiquinha','181.219.125.7','42369',1,'disponivel','2025-07-17 04:14:36');
/*!40000 ALTER TABLE `ramais` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-17  5:47:12
