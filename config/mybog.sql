CREATE DATABASE  IF NOT EXISTS `mybog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mybog`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: mybog
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `arrendamientos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `arrendamientos` (
  `Id_de_arrendamientos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_arrendamientos` varchar(30) NOT NULL,
  `Ubicacion_de_arrendamientos` varchar(50) NOT NULL,
  `Tipos_de_arrendamientos` varchar(30) NOT NULL,
  `Informacion_de_arrendamientos` text NOT NULL,
  `Id_servicio` int NOT NULL,
  PRIMARY KEY (`Id_de_arrendamientos`),
  KEY `Id_servicio` (`Id_servicio`) USING BTREE,
  CONSTRAINT `arrendamientos_ibfk_1` FOREIGN KEY (`Id_servicio`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arrendamientos`
--

LOCK TABLES `arrendamientos` WRITE;
/*!40000 ALTER TABLE `arrendamientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `arrendamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros_comerciales`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `centros_comerciales` (
  `Id_de_centros_comerciales` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_centros_comerciales` varchar(250) NOT NULL,
  `Ubicacion_de_centros_comerciales` varchar(50) NOT NULL,
  `Informacion_de_centros_comerciales` text NOT NULL,
  `Id_entretenimiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_centros_comerciales`),
  KEY `Id_entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `centros_comerciales_ibfk_1` FOREIGN KEY (`Id_entretenimiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros_comerciales`
--

LOCK TABLES `centros_comerciales` WRITE;
/*!40000 ALTER TABLE `centros_comerciales` DISABLE KEYS */;
INSERT INTO `centros_comerciales` VALUES (1,'Unicentro','Cra. 15 #124-30, Usaquén, Bogotá','Unicentro Bogotá es un centro comercial de Bogotá, Colombia; fue inaugurado el 27 de abril de 1976, siendo el primer centro comercial de Bogotá. Es uno de los principales y más reconocidos de Colombia, Las tiendas ancla más importantes del centro comercial son, Almacenes Éxito, Cine Colombia, La Bolera, Zara, Panamericana, Pepe Ganga y Falabella.',1,'Usaquén');
/*!40000 ALTER TABLE `centros_comerciales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `control` (
  `id` int NOT NULL AUTO_INCREMENT,
  `initialized` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control`
--

LOCK TABLES `control` WRITE;
/*!40000 ALTER TABLE `control` DISABLE KEYS */;
INSERT INTO `control` VALUES (1,0);
/*!40000 ALTER TABLE `control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `cuentas` (
  `Id_Usuario` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Id_servicios` int NOT NULL,
  `Rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Id_servicios` (`Id_servicios`),
  CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`Id_servicios`) REFERENCES `servicios` (`Id_Servicios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (24,'santiago','polanco','santi01031@outlook.com','$2y$10$5bEwRc5DfSEjOk.xANi8Ru8oC9G4V7rtSo5P1XMWQEgQ5rSLtDim2',1,NULL),(28,'fabian','jeje','carvajalpitta@gmail.com','$2y$10$1wrV1ALAN9Jv/5hXOVRvyeqYOxkK1zZtmS.TiPrQddf4tNnXF8R/W',1,NULL),(30,'admin','admin','mybog@gmail.com','$2y$10$ogyPZG5Mc1h12JlvceWLGuws1POOwrsrT1eR0slQb920K3bmDLbwi',1,NULL),(31,'Nicolas','Baron','nbaronortiz4@gmail.com','$2y$10$Upd7PMYTHElkkGH.XHG5seTkig0WTCfcacuPstS3IDm2GGmcTOequ',1,NULL);
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discotecas`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `discotecas` (
  `Id_de_discotecas` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_discotecas` varchar(30) NOT NULL,
  `Ubicacion_de_discotecas` varchar(50) NOT NULL,
  `Informacion_de_discotecas` varchar(250) NOT NULL,
  `Id_entretenimiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_discotecas`),
  KEY `Id_de_entretenimiento` (`Id_entretenimiento`),
  KEY `Id_entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `discotecas_ibfk_1` FOREIGN KEY (`Id_entretenimiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discotecas`
--

LOCK TABLES `discotecas` WRITE;
/*!40000 ALTER TABLE `discotecas` DISABLE KEYS */;
/*!40000 ALTER TABLE `discotecas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entretenimiento`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `entretenimiento` (
  `Id_entretenimiento` int NOT NULL AUTO_INCREMENT,
  `Nombre_del_entretenimiento` varchar(30) NOT NULL,
  `Id_Categorias` int NOT NULL,
  PRIMARY KEY (`Id_entretenimiento`),
  KEY `Id_Categorias` (`Id_Categorias`),
  CONSTRAINT `entretenimiento_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entretenimiento`
--

LOCK TABLES `entretenimiento` WRITE;
/*!40000 ALTER TABLE `entretenimiento` DISABLE KEYS */;
INSERT INTO `entretenimiento` VALUES (1,'Entreteniemiento_general ',4);
/*!40000 ALTER TABLE `entretenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadios`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `estadios` (
  `Id_estadios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_estadios` varchar(250) NOT NULL,
  `Ubicacion_de_estadios` varchar(50) NOT NULL,
  `Tipos_de_estadios` int NOT NULL,
  `Informacion_de_estadios` varchar(250) NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_estadios`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  KEY `Tipos_de_estadios_idx` (`Tipos_de_estadios`),
  CONSTRAINT `estadios_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `Tipos_de_estadios` FOREIGN KEY (`Tipos_de_estadios`) REFERENCES `tipos_de_estadios` (`Id_de_tipos_de_estadios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadios`
--

LOCK TABLES `estadios` WRITE;
/*!40000 ALTER TABLE `estadios` DISABLE KEYS */;
INSERT INTO `estadios` VALUES (1,'Estadio Nemesio Camacho El Campín','Carrera 30 y Calle 57, Bogotá',1,'El Estadio Nemesio Camacho El Campín, ​ conocido simplemente como El Campín, es el estadio de fútbol más grande de Bogotá, ubicado en la localidad de Teusaquillo, centro-occidente de la capital de Colombia, Tiene una capacidad: 39,000 personas aprox.',1,'Teusaquillo');
/*!40000 ALTER TABLE `estadios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario_contacto`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `formulario_contacto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario_contacto`
--

LOCK TABLES `formulario_contacto` WRITE;
/*!40000 ALTER TABLE `formulario_contacto` DISABLE KEYS */;
INSERT INTO `formulario_contacto` VALUES (1,'santiago','santi01031@outlook.com','hola que ase','2023-11-19 22:14:41'),(2,'Nicolás','nbaronortiz4@gmail.com','q cojones es esto chaval','2023-11-19 22:17:36'),(3,'Nicolás','nbaronortiz4@gmail.com','q cojones es esto chaval','2023-11-19 22:17:55'),(4,'Nicolás','nbaronortiz4@gmail.com','que te pasa loco','2023-11-19 22:21:07'),(5,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:22:39'),(6,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:23:04'),(7,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:23:08'),(8,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:31:25'),(9,'Nicolás','nbaronortiz4@gmail.com','???','2023-11-19 22:31:59'),(10,'Nicolás','nbaronortiz4@gmail.com','asa','2023-11-19 22:32:08'),(11,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:03'),(12,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:04'),(13,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(14,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(15,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(16,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(17,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(18,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:05'),(19,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(20,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(21,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(22,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:06'),(23,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:07'),(24,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:07'),(25,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:07'),(26,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(27,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(28,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(29,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(30,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:08'),(31,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(32,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(33,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(34,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:09'),(35,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:10'),(36,'Nicolás','nbaronortiz4@gmail.com','aa','2023-11-19 22:34:10'),(37,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:34:49'),(38,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:34:49'),(39,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:34:50'),(40,'Nicolás','nbaronortiz4@gmail.com','ss','2023-11-19 22:36:24'),(41,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:36:59'),(42,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:36:59'),(43,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:37:00'),(44,'santiago','santi01031@outlook.com','asdf','2023-11-19 22:37:00'),(45,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:18'),(46,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(47,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(48,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(49,'dsf','dsf@sdgsd.com','sdf','2023-11-19 22:38:19'),(50,'santiago','santi01031@outlook.com','dfgdf','2023-11-19 22:38:50'),(51,'santiago','danielapolancobuitrago@gmail.com','dfg','2023-11-19 22:39:18'),(52,'santiago','santi01031@outlook.com','no se','2023-11-19 22:40:01'),(53,'santiago','santi01031@outlook.com','fsdfsdf','2023-11-19 22:41:08'),(54,'santiago','santi01031@outlook.com','lol','2023-11-19 22:41:59'),(55,'sd','j.polanco1975@hotmail.com','sadasd','2023-11-19 22:42:38'),(56,'sd','j.polanco1975@hotmail.com','sadasd','2023-11-19 22:42:38'),(57,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:43:51'),(58,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:43:51'),(59,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:44:03'),(60,'sadfa','santi01031@outlook.com','otravez','2023-11-19 22:44:03'),(61,'utr','sas@ada.com','sad','2023-11-19 22:44:48'),(62,'Nicolás','nbaronortiz4@gmail.com','pagina zzz','2023-11-24 05:08:52'),(63,'Nicolás','nbaronortiz4@gmail.com','app zzzz','2023-11-24 05:12:10'),(64,'fgh','santi01031@outlook.comfxgb','gb','2023-11-24 05:12:50');
/*!40000 ALTER TABLE `formulario_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospedaje`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `hospedaje` (
  `Id_de_hospedaje` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_hospedajes` varchar(30) NOT NULL,
  `Ubicacion_de_hospedajes` varchar(50) NOT NULL,
  `Tipos_de_hospedaje` int NOT NULL,
  `Informacion_de_hospedajes` text NOT NULL,
  `Id_Categorias` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_hospedaje`),
  KEY `Id_Categorias` (`Id_Categorias`),
  KEY `Tipos_de_hospedaje_idx` (`Tipos_de_hospedaje`),
  CONSTRAINT `hospedaje_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`),
  CONSTRAINT `Tipos_de_hospedaje` FOREIGN KEY (`Tipos_de_hospedaje`) REFERENCES `tipos_de_hospedajes` (`Id_de_tipos_de_hospedajes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospedaje`
--

LOCK TABLES `hospedaje` WRITE;
/*!40000 ALTER TABLE `hospedaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `hospedaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes_establecimiento`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `imagenes_establecimiento` (
  `id_imagen` int NOT NULL AUTO_INCREMENT,
  `id_establecimiento` int NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `ruta_destino` varchar(255) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `id_establecimiento_idx` (`id_establecimiento`),
  CONSTRAINT `fk_id_establecimiento` FOREIGN KEY (`id_establecimiento`) REFERENCES `registro_de_establecimiento` (`Id_registro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes_establecimiento`
--

LOCK TABLES `imagenes_establecimiento` WRITE;
/*!40000 ALTER TABLE `imagenes_establecimiento` DISABLE KEYS */;
INSERT INTO `imagenes_establecimiento` VALUES (106,66,'ana.png','Imagen_guardar/ana.png'),(115,71,'Pizzas23523454241.jpg','Imagen_guardar/Pizzas23523454241.jpg'),(131,85,'Starbucks21234567891.jpeg','Imagen_guardar/Starbucks21234567891.jpeg'),(132,85,'Starbucks21234567892.jpeg','Imagen_guardar/Starbucks21234567892.jpeg'),(133,86,'Sena13123238911.jpg','Imagen_guardar/Sena13123238911.jpg');
/*!40000 ALTER TABLE `imagenes_establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugares_historicos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `lugares_historicos` (
  `Id_lugares_historicos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_lugares_historicos` varchar(30) NOT NULL,
  `Ubicacion_de_lugares_historicos` varchar(50) NOT NULL,
  `Tipos_de_lugares_historicos` varchar(30) NOT NULL,
  `Informacion_de_lugares_historicos` text NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  PRIMARY KEY (`Id_lugares_historicos`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  CONSTRAINT `lugares_historicos_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugares_historicos`
--

LOCK TABLES `lugares_historicos` WRITE;
/*!40000 ALTER TABLE `lugares_historicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugares_historicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parques`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `parques` (
  `Id_de_parques` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_parques` varchar(250) NOT NULL,
  `Ubicacion_de_parques` varchar(250) NOT NULL,
  `Tipos_de_parques` int NOT NULL,
  `Informacion_de_parques` text NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_de_parques`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  KEY `tipos_de_parques_idx` (`Tipos_de_parques`),
  CONSTRAINT `parques_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `tipos_de_parques` FOREIGN KEY (`Tipos_de_parques`) REFERENCES `tipos_de_parques` (`Id_de_tipos_de_parques`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parques`
--

LOCK TABLES `parques` WRITE;
/*!40000 ALTER TABLE `parques` DISABLE KEYS */;
INSERT INTO `parques` VALUES (1,'Mundo Aventura','Cra. 71d #1-14 Sur, Bogotá',1,'Mundo Aventura es uno de los parques de atracciones más populares de Bogotá y ofrece una amplia variedad de emocionantes juegos mecánicos y atracciones para visitantes de todas las edades. El parque es conocido por su ambiente festivo y su capacidad para proporcionar diversión y entretenimiento a toda la familia. Horario de Operación: El horario de Mundo Aventura puede variar según la temporada, por lo que se recomienda verificar los horarios actualizados en el sitio web oficial antes de planificar tu visita.',1,'Kennedy'),(2,'Salitre Magico',' Avenida El Dorado No. 68D-58, Bogotá',1,'El Parque de Diversiones Salitre Mágico, ubicado en la ciudad de Bogotá, Colombia, ofrece una experiencia emocionante para visitantes de todas las edades. Aquí tienes información sobre horarios y precios:',1,'Engativa'),(3,'Parque Simón Bolívar','Carrera 60 # 63 - 27, Bogotá, Colombia',5,'El Parque Simón Bolívar es uno de los parques más grandes y emblemáticos de Bogotá. Con una extensión de más de 400 hectáreas, este parque ofrece una gran variedad de espacios verdes, lagos, zonas deportivas y áreas de entretenimiento. Es un lugar ideal para relajarse, hacer ejercicio, disfrutar de actividades al aire libre y pasar tiempo en familia.',1,'Engativa'),(4,'Parque Nacional Enrique Olaya Herrera ','Carrera 7 # 34-45, Bogotá, Colombia',5,'El Parque Nacional Enrique Olaya Herrera, comúnmente conocido como Parque Nacional, es un espacio público icónico en el centro de Bogotá. Este parque es famoso por su fuente central, su monumento al presidente Enrique Olaya Herrera y su ambiente tranquilo en medio de la ciudad. Es un lugar ideal para dar un paseo, relajarse y disfrutar de la naturaleza en el corazón de la ciudad.',1,'Santa_Fe'),(5,'Parque Metropolitano El Virrey','Carrera 15, Calle 88, Barrio El Virrey, Bogotá, Colombia',5,'El Parque El Virrey es uno de los parques urbanos más emblemáticos de Bogotá. Este parque se encuentra en el corazón de la ciudad y ofrece a los visitantes un lugar ideal para hacer ejercicio, pasear, disfrutar del aire libre y relajarse. Es un espacio verde muy querido por los residentes y visitantes.',1,'Chapinero'),(6,'Parque de los Novios','Carrera 4, Calle 63, Barrio Chapinero, Bogotá, Colombia',5,'El Parque de los Novios, conocido también como Parque El Lago, es un espacio público icónico en el corazón de la localidad de Chapinero en Bogotá. Este parque es especialmente conocido por su hermoso lago artificial y su entorno tranquilo que ofrece a los visitantes un lugar ideal para relajarse y disfrutar de la naturaleza en medio de la ciudad.',1,'Chapinero'),(7,'Parque El Tunal','Carrera 24C #48A-67 Sur, Bogotá, Colombia',5,'El Parque El Tunal es un espacio verde en el sur de Bogotá que ofrece una variedad de actividades al aire libre para toda la familia. A pesar de no ser tan conocido como otros parques de la ciudad, es un lugar agradable para visitar con bebés debido a su ambiente tranquilo y áreas de juego seguras.',1,'Tunjuelito'),(8,'Parque de la 93','Carrera 11 #93-46, Bogotá, Colombia',5,'El Parque de la 93 es un parque urbano que se ha convertido en uno de los lugares más populares de Bogotá para la recreación y el entretenimiento. El parque está ubicado en la zona norte de la ciudad y ofrece una amplia gama de actividades y opciones gastronómicas.',1,'Chapinero'),(9,'Parque El Virrey','Carrera 15 con Calle 88, Bogotá, Colombia',5,'El Parque El Virrey es un parque urbano ubicado en el corazón de Bogotá. Es un lugar muy frecuentado por los habitantes locales y visitantes que desean disfrutar de actividades al aire libre, hacer ejercicio o simplemente relajarse en un entorno verde en medio de la ciudad.',1,'Chapinero'),(10,'Parque de la Independencia','Carrera 7 con Calle 26, Bogotá, Colombia',5,'El Parque de la Independencia, también conocido como Parque Nacional, es uno de los parques más emblemáticos de Bogotá. Este parque tiene una gran importancia histórica y cultural para la ciudad y el país. Fue inaugurado en 1910 para conmemorar el centenario de la independencia de Colombia.',1,'Santa_Fe'),(11,'Parque el lago','Av José Celestino Mutis #45',5,'Es un lugar encantador rodeado de naturaleza y árboles, es ideal para caminar, relajarse, meditar, leer o hacer ejercicio. Entre semana es muy tranquilo. Para ir de picnic está genial, incluso para hacer un asado en familia y amigos. Definitivamente es uno de los parques públicos más bellos que tiene Bogotá.',1,'Barrios_unidos');
/*!40000 ALTER TABLE `parques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos_de_alimentos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `puestos_de_alimentos` (
  `Id_Puestos_de_alimentos` int NOT NULL AUTO_INCREMENT,
  `Tipos_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Nombres_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Ubicacion_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Informacion_de_puestos_de_alimentos` text NOT NULL,
  `Id_Categorias` int NOT NULL,
  PRIMARY KEY (`Id_Puestos_de_alimentos`),
  KEY `Id_Categorias` (`Id_Categorias`),
  CONSTRAINT `puestos_de_alimentos_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos_de_alimentos`
--

LOCK TABLES `puestos_de_alimentos` WRITE;
/*!40000 ALTER TABLE `puestos_de_alimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `puestos_de_alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_de_establecimiento`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `registro_de_establecimiento` (
  `Id_registro` int NOT NULL AUTO_INCREMENT,
  `Nombre_del_establecimiento` varchar(50) NOT NULL,
  `Direccion_de_establecimiento` varchar(50) NOT NULL,
  `Id_Usuario` int NOT NULL,
  `Informacion_adicional` varchar(250) DEFAULT NULL,
  `Nit` varchar(45) DEFAULT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `id_tipo_de_establecimiento` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Aprobado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_registro`),
  KEY `Id_usuario_idx` (`Id_Usuario`),
  CONSTRAINT `Id_usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_de_establecimiento`
--

LOCK TABLES `registro_de_establecimiento` WRITE;
/*!40000 ALTER TABLE `registro_de_establecimiento` DISABLE KEYS */;
INSERT INTO `registro_de_establecimiento` VALUES (15,'Manulita','calle 56',30,'kmk','5515','Chapinero','restaurante','318746',1),(66,'AA','calee',30,'dsdsds','2123456789','Chainero','Hotel','3505350587',1),(71,'Pizzas','carrera 4  e sur 4c-24 oeste, sdf',30,'dfgh','2352345424','San Cristobal','hotel','3187465551',1),(85,'Starbucks','carrera¬12¬b¬~¬~¬#¬12¬~¬-¬24¬~¬Segundo Piso',31,'lol','2123456789','Bosa','hotel','3505350587',0),(86,'Sena','calle¬57¬~¬~¬~¬#¬8¬~¬-¬69¬~¬hola',30,'q asco sena ','1312323891','Chapinero','hotel','1234567891',1);
/*!40000 ALTER TABLE `registro_de_establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salud`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `salud` (
  `Id_Centros_de_salud` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_centros_de_salud` varchar(30) NOT NULL,
  `Ubicacion_de_centros_de_salud` varchar(50) NOT NULL,
  `Informacion_de_centros_de_salud` text NOT NULL,
  `Id_Categorias` int NOT NULL,
  PRIMARY KEY (`Id_Centros_de_salud`),
  KEY `Id_Categorias` (`Id_Categorias`),
  CONSTRAINT `salud_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salud`
--

LOCK TABLES `salud` WRITE;
/*!40000 ALTER TABLE `salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_list`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `schedule_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `Id_usuario_for` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_usuario_for_idx` (`Id_usuario_for`),
  CONSTRAINT `Id_usuario_for` FOREIGN KEY (`Id_usuario_for`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_list`
--

LOCK TABLES `schedule_list` WRITE;
/*!40000 ALTER TABLE `schedule_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `servicios` (
  `Id_Servicios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_servicios` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'Creaccion_de_cuentas'),(2,'Puestos_de_alimentos'),(3,'Hospedajes'),(4,'Entretenimiento'),(5,'Hospitales');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_arrendamientos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_arrendamientos` (
  `Id_de_tipos_de_arrendamientos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipo_de_arrendamientos` varchar(30) NOT NULL,
  `Id_de_arrendamientos` int NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_arrendamientos`),
  KEY `Id_de_arrendamientos` (`Id_de_arrendamientos`),
  CONSTRAINT `tipos_de_arrendamientos_ibfk_1` FOREIGN KEY (`Id_de_arrendamientos`) REFERENCES `arrendamientos` (`Id_de_arrendamientos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_arrendamientos`
--

LOCK TABLES `tipos_de_arrendamientos` WRITE;
/*!40000 ALTER TABLE `tipos_de_arrendamientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_arrendamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_establecimientos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_establecimientos` (
  `Id_de_tipos_de_establecimientos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_tipos_de_establecimientos` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_establecimientos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_establecimientos`
--

LOCK TABLES `tipos_de_establecimientos` WRITE;
/*!40000 ALTER TABLE `tipos_de_establecimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_establecimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_estadios`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_estadios` (
  `Id_de_tipos_de_estadios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_estadios` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_estadios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_estadios`
--

LOCK TABLES `tipos_de_estadios` WRITE;
/*!40000 ALTER TABLE `tipos_de_estadios` DISABLE KEYS */;
INSERT INTO `tipos_de_estadios` VALUES (1,'Estadios_Futbol');
/*!40000 ALTER TABLE `tipos_de_estadios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_hospedajes`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_hospedajes` (
  `Id_de_tipos_de_hospedajes` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_hospedajes` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_hospedajes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_hospedajes`
--

LOCK TABLES `tipos_de_hospedajes` WRITE;
/*!40000 ALTER TABLE `tipos_de_hospedajes` DISABLE KEYS */;
INSERT INTO `tipos_de_hospedajes` VALUES (1,'Casa'),(2,'Apartementos'),(3,'Hoteles'),(4,'Fincas'),(5,'Hostales');
/*!40000 ALTER TABLE `tipos_de_hospedajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_lugares_historicos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_lugares_historicos` (
  `Id_de_tipos_lugares_historicos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_lugares_historicos` varchar(30) NOT NULL,
  `Id_lugares_historicos` int NOT NULL,
  PRIMARY KEY (`Id_de_tipos_lugares_historicos`),
  KEY `Id_lugares_historicos` (`Id_lugares_historicos`),
  CONSTRAINT `tipos_de_lugares_historicos_ibfk_1` FOREIGN KEY (`Id_lugares_historicos`) REFERENCES `lugares_historicos` (`Id_lugares_historicos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_lugares_historicos`
--

LOCK TABLES `tipos_de_lugares_historicos` WRITE;
/*!40000 ALTER TABLE `tipos_de_lugares_historicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_lugares_historicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_parques`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_parques` (
  `Id_de_tipos_de_parques` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_parques` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_parques`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_parques`
--

LOCK TABLES `tipos_de_parques` WRITE;
/*!40000 ALTER TABLE `tipos_de_parques` DISABLE KEYS */;
INSERT INTO `tipos_de_parques` VALUES (1,'Mecanicos'),(2,'Acuaticos'),(3,'Parque infantil'),(4,'Parque para bebés'),(5,'Parque urbano'),(6,'Parque temático');
/*!40000 ALTER TABLE `tipos_de_parques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_puestos_de_alimentos`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `tipos_de_puestos_de_alimentos` (
  `Id_tipos_de_puestos_de_alimentos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Id_puestos_de_alimentos` int NOT NULL,
  PRIMARY KEY (`Id_tipos_de_puestos_de_alimentos`),
  KEY `Id_puestos_de_alimentos` (`Id_puestos_de_alimentos`),
  CONSTRAINT `tipos_de_puestos_de_alimentos_ibfk_1` FOREIGN KEY (`Id_puestos_de_alimentos`) REFERENCES `puestos_de_alimentos` (`Id_Puestos_de_alimentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_puestos_de_alimentos`
--

LOCK TABLES `tipos_de_puestos_de_alimentos` WRITE;
/*!40000 ALTER TABLE `tipos_de_puestos_de_alimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_de_puestos_de_alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification_codes`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE IF NOT EXISTS `verification_codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_codes`
--

LOCK TABLES `verification_codes` WRITE;
/*!40000 ALTER TABLE `verification_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-29  0:18:34
  `user_id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_codes`
--

LOCK TABLES `verification_codes` WRITE;
/*!40000 ALTER TABLE `verification_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-29  0:18:34
  `user_id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_codes`
--

LOCK TABLES `verification_codes` WRITE;
/*!40000 ALTER TABLE `verification_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-29  0:18:34
  `user_id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_codes`
--

LOCK TABLES `verification_codes` WRITE;
/*!40000 ALTER TABLE `verification_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-29  0:18:34
