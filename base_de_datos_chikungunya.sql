CREATE DATABASE  IF NOT EXISTS `chikungunya` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `chikungunya`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: chikungunya
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `casos_chikungunya`
--

DROP TABLE IF EXISTS `casos_chikungunya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casos_chikungunya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `provincia` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `signo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `situacion` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casos_chikungunya`
--

LOCK TABLES `casos_chikungunya` WRITE;
/*!40000 ALTER TABLE `casos_chikungunya` DISABLE KEYS */;
INSERT INTO `casos_chikungunya` VALUES (1,'012-0119008-7','Rafael','Medina','1993-08-10','Masculino','San Juan De La Maguana','Av. Isabel Aguiar','B+','Casado(a)','Rafael','Desempleado'),(5,'012-0056558-4','Eliezer','Mendez','1992-07-15','Masculino','Santiago','27 de febrero','A+','Casado(a)','Amadis','Empleado'),(6,'012-0118508-7','Jeremy','Lopez','1994-02-01','Masculino','Santo Domingo','Av. Independencia','B+','Soltero(a)','Rafael','Jubilado'),(8,'012-1119008-7','Francisco','Martinez','2014-07-03','Masculino','Santo Domingo','Piantini','O+','Soltero(a)','Rafael','Empleado'),(9,'00000000000','ooo','oo','2014-07-26','Masculino','Puerto Rico','Av. Independencia','B+','Casado(a)','Rafael','Empleado'),(10,'00000560000','Anthony','Ramon','2014-07-26','Masculino','','Tomas Medina','AB+','Soltero(a)','Rafael','Jubilado'),(11,'888888888888','Maximiliano','Ortega','2014-07-02','Masculino','Barahona','dsa','A+','Casado(a)','Perez','Desempleado'),(12,'012-0107797-9','Katherine','Medina De Los Santos','1989-09-04','Femenino','San Juan De La Maguana','Av. Romulo','O+','Casado(a)','Rafael','Empleado'),(13,'225-0016544-8','Samuel','Rodriguez','1987-04-06','Masculino','Samana','Av. Romulo','AB+','Casado(a)','Amadis','Empleado'),(14,'00546500000','Poron','Mondon','2014-07-27','Femenino','Samana','Distrito','O-','Soltero(a)','Perez','Desempleado'),(15,'ddfasfasfsasf','fgdsqgdsq','dds','2014-07-28','Masculino','San Juan De La Maguana','dgdgg','B+','Casado(a)','','Desempleado');
/*!40000 ALTER TABLE `casos_chikungunya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_civil`
--

DROP TABLE IF EXISTS `estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_civil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado_UNIQUE` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_civil`
--

LOCK TABLES `estado_civil` WRITE;
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
INSERT INTO `estado_civil` VALUES (1,'Casado(a)'),(2,'Soltero(a)');
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `longitud` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `latitud` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'San Juan De La Maguana','18.81','-71.23'),(3,'Santo Domingo','18.466667','-69.95'),(17,'Barahona','18.2','-71.1'),(39,'Santiago','19.466667','-70.7'),(44,'Samana','19.2080704','-69.3324518'),(45,'La Vega','19.22','-70.53');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `signo_zodiacal`
--

DROP TABLE IF EXISTS `signo_zodiacal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `signo_zodiacal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `signo_zodiacal`
--

LOCK TABLES `signo_zodiacal` WRITE;
/*!40000 ALTER TABLE `signo_zodiacal` DISABLE KEYS */;
INSERT INTO `signo_zodiacal` VALUES (1,'Rafael','2014-07-01','2014-07-18'),(2,'Amadis','2014-07-21','2014-07-31'),(4,'Perez','2014-08-03','2014-08-11');
/*!40000 ALTER TABLE `signo_zodiacal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintomas`
--

DROP TABLE IF EXISTS `sintomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintomas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sintoma` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sintoma_UNIQUE` (`sintoma`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintomas`
--

LOCK TABLES `sintomas` WRITE;
/*!40000 ALTER TABLE `sintomas` DISABLE KEYS */;
INSERT INTO `sintomas` VALUES (2,'Cabeza'),(6,'Cintura'),(7,'Diarrea'),(4,'Espalda'),(3,'Hombros'),(5,'Ojos');
/*!40000 ALTER TABLE `sintomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintomas_detalle`
--

DROP TABLE IF EXISTS `sintomas_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintomas_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_caso` int(11) DEFAULT NULL,
  `id_sintoma` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sintoma` (`id_sintoma`),
  CONSTRAINT `sintomas_detalle_ibfk_1` FOREIGN KEY (`id_sintoma`) REFERENCES `sintomas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintomas_detalle`
--

LOCK TABLES `sintomas_detalle` WRITE;
/*!40000 ALTER TABLE `sintomas_detalle` DISABLE KEYS */;
INSERT INTO `sintomas_detalle` VALUES (80,1,2),(81,1,7),(82,5,2),(83,5,7),(84,5,3),(85,6,2),(86,6,5),(87,7,2),(88,7,6),(89,7,7),(90,7,4),(91,7,3),(92,7,5),(93,8,4),(94,9,2),(95,9,7),(96,9,4),(97,10,4),(98,10,3),(99,0,2),(107,11,2),(108,11,7),(109,12,2),(110,12,7),(111,13,2),(112,13,7),(113,13,3),(114,14,2),(115,14,4),(116,15,2),(117,15,6),(118,15,7);
/*!40000 ALTER TABLE `sintomas_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `situacion_laboral`
--

DROP TABLE IF EXISTS `situacion_laboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `situacion_laboral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `situacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `situacion_UNIQUE` (`situacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacion_laboral`
--

LOCK TABLES `situacion_laboral` WRITE;
/*!40000 ALTER TABLE `situacion_laboral` DISABLE KEYS */;
INSERT INTO `situacion_laboral` VALUES (5,'Desempleado'),(4,'Empleado'),(6,'Jubilado');
/*!40000 ALTER TABLE `situacion_laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_sangre`
--

DROP TABLE IF EXISTS `tipo_sangre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_sangre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_UNIQUE` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_sangre`
--

LOCK TABLES `tipo_sangre` WRITE;
/*!40000 ALTER TABLE `tipo_sangre` DISABLE KEYS */;
INSERT INTO `tipo_sangre` VALUES (46,'A-'),(45,'A+'),(51,'AB-'),(52,'AB+'),(48,'B-'),(47,'B+'),(50,'O-'),(49,'O+');
/*!40000 ALTER TABLE `tipo_sangre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `contrasena` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (9,'Rafael','Medina','Rafael','123'),(12,'Sterlin','Medina','sterlinfe','456');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-29 14:30:06
