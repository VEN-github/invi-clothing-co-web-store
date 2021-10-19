-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: invi-clothing_database
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB

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
-- Table structure for table `account_table`
--

DROP TABLE IF EXISTS `account_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactNumber` varchar(255) DEFAULT NULL,
  `profileImg` varchar(255) DEFAULT NULL,
  `access` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_table`
--

LOCK TABLES `account_table` WRITE;
/*!40000 ALTER TABLE `account_table` DISABLE KEYS */;
INSERT INTO `account_table` VALUES (3,'Raven','Barrogo','raven.barrogo24@gmail.com','25d55ad283aa400af464c76d713c07ad','09123456789',NULL,'user'),(10,'User','User','user@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,'user'),(16,'INVI','Clothing Co.','admin@gmail.com','25d55ad283aa400af464c76d713c07ad','09959764761','favicon.ico','admin');
/*!40000 ALTER TABLE `account_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address_table`
--

DROP TABLE IF EXISTS `address_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `addressType` varchar(255) DEFAULT NULL,
  `accountID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_accountID_idx` (`accountID`),
  CONSTRAINT `fk_accountID` FOREIGN KEY (`accountID`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_table`
--

LOCK TABLES `address_table` WRITE;
/*!40000 ALTER TABLE `address_table` DISABLE KEYS */;
INSERT INTO `address_table` VALUES (8,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','0995976476','primary address',3),(11,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','primary address',3),(12,'Raven','Barrogo','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','',3),(13,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1600','Metro Manila','Philippines','09959764761','primary address',3),(15,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(16,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Batanes','Philippines','09959764761','',3),(17,'Raven','Barrogo','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','',3),(20,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(21,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(22,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(23,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Batangas','Philippines','09959764761','',3),(24,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(25,'Raven','Barrogo','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','primary address',3),(26,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','primary address',3),(27,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',10),(28,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',10),(29,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Biliran','Philippines','09959764761','primary address',3),(30,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','primary address',3),(31,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bukidnon','Philippines','09959764761','primary address',3),(32,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(33,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Batanes','Philippines','09959764761','',3),(34,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(35,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1600','Bohol','Philippines','09959764761','',3),(36,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(37,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Bataan','Philippines','09959764761','',10),(38,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','',3),(39,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Biliran','Philippines','09959764761','',3),(40,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(41,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(42,'User','User','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Biliran','Philippines','09959764761','',10),(43,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(44,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Ilocos Sur','Philippines','09959764761','',3),(45,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bukidnon','Philippines','09959764761','',3),(46,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(47,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bukidnon','Philippines','09959764761','',3),(48,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(49,'Raven','Barrogo','47 Apolinario Mabini St. Manggahan, Pasig City','','Pasig','1611','Metro Manila','Philippines','09959764761','',3),(50,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Bukidnon','Philippines','09959764761','',3),(51,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(52,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(53,'Raven','Barrogo','47 Apolinario Mabini St. Manggahan, Pasig City','','Pasig','1611','Metro Manila','Philippines','09959764761','',3);
/*!40000 ALTER TABLE `address_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_table`
--

DROP TABLE IF EXISTS `category_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_table`
--

LOCK TABLES `category_table` WRITE;
/*!40000 ALTER TABLE `category_table` DISABLE KEYS */;
INSERT INTO `category_table` VALUES (1,'Tees'),(2,'Jackets'),(3,'Accessories'),(4,'Bottoms');
/*!40000 ALTER TABLE `category_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costing_table`
--

DROP TABLE IF EXISTS `costing_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `costing_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `materialID` int(11) NOT NULL,
  `materialQty` int(11) NOT NULL,
  `laborFee` int(11) NOT NULL,
  `laborQty` int(11) NOT NULL,
  `layoutFee` int(11) NOT NULL,
  `layoutQty` int(11) NOT NULL,
  `expenseFee` int(11) NOT NULL,
  `expenseQty` int(11) NOT NULL,
  `productCost` int(11) NOT NULL,
  `totalCost` int(11) NOT NULL,
  `salesAmount` int(11) NOT NULL,
  `salesDiscount` int(11) NOT NULL,
  `netSales` int(11) NOT NULL,
  `grossProfit` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `netIncome` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_productID_idx` (`productID`),
  KEY `fk_materialID_idx` (`materialID`),
  CONSTRAINT `fk_materialID` FOREIGN KEY (`materialID`) REFERENCES `rawmaterials_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=409 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costing_table`
--

LOCK TABLES `costing_table` WRITE;
/*!40000 ALTER TABLE `costing_table` DISABLE KEYS */;
INSERT INTO `costing_table` VALUES (370,121,105,50,0,0,0,0,0,0,295,0,0,0,450,0,0,155),(371,122,104,50,0,0,0,0,0,0,293,0,0,0,700,0,0,407),(372,122,106,50,0,0,0,0,0,0,293,0,0,0,700,0,0,407),(373,122,112,50,0,0,0,0,0,0,293,0,0,0,700,0,0,407),(375,124,106,30,0,0,0,0,0,0,298,0,0,0,450,0,0,152),(376,124,105,30,0,0,0,0,0,0,298,0,0,0,450,0,0,152),(379,126,106,70,0,0,0,0,0,0,348,0,0,0,450,0,0,102),(380,126,115,75,0,0,0,0,0,0,348,0,0,0,450,0,0,102),(391,133,104,50,130,50,60,50,0,0,380,19000,450,0,450,70,0,70),(392,133,107,50,130,50,60,50,0,0,380,19000,450,0,450,70,0,70),(393,133,105,50,130,50,60,50,0,0,380,19000,450,0,450,70,0,70),(402,138,106,30,75,30,0,0,0,0,158,4740,250,0,250,92,0,92),(403,138,110,30,75,30,0,0,0,0,158,4740,250,0,250,92,0,92),(404,139,104,25,90,50,30,50,0,0,317,15600,450,0,450,133,0,133),(405,139,108,50,90,50,30,50,0,0,317,15600,450,0,450,133,0,133),(406,139,107,50,90,50,30,50,0,0,317,15600,450,0,450,133,0,133),(407,139,106,50,90,50,30,50,0,0,317,15600,450,0,450,133,0,133),(408,139,114,50,90,50,30,50,0,0,317,15600,450,0,450,133,0,133);
/*!40000 ALTER TABLE `costing_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorymaterial_table`
--

DROP TABLE IF EXISTS `inventorymaterial_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventorymaterial_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `materialID` int(11) NOT NULL,
  `addedQty` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `adminID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_rawID_idx` (`materialID`),
  KEY `fk_admin_idx` (`adminID`),
  CONSTRAINT `fk_admin` FOREIGN KEY (`adminID`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rawID` FOREIGN KEY (`materialID`) REFERENCES `rawmaterials_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorymaterial_table`
--

LOCK TABLES `inventorymaterial_table` WRITE;
/*!40000 ALTER TABLE `inventorymaterial_table` DISABLE KEYS */;
INSERT INTO `inventorymaterial_table` VALUES (123,115,100,'2021-10-16 03:02:55',16),(124,106,210,'2021-10-16 03:03:01',16),(125,105,80,'2021-10-16 03:03:18',16),(126,104,75,'2021-10-16 03:03:24',16),(127,103,50,'2021-10-16 03:03:29',16),(128,112,40,'2021-10-16 15:57:06',16),(129,106,200,'2021-10-19 01:09:23',16);
/*!40000 ALTER TABLE `inventorymaterial_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryproduct_table`
--

DROP TABLE IF EXISTS `inventoryproduct_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventoryproduct_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `addedQty` int(11) NOT NULL,
  `dateTime` datetime DEFAULT current_timestamp(),
  `addedBy` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_prodID_idx` (`productID`),
  KEY `fk_stockID_idx` (`stockID`),
  KEY `fk_admin_idx` (`addedBy`),
  CONSTRAINT `fk_addedAdmn` FOREIGN KEY (`addedBy`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prdID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_stckID` FOREIGN KEY (`stockID`) REFERENCES `stocks_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryproduct_table`
--

LOCK TABLES `inventoryproduct_table` WRITE;
/*!40000 ALTER TABLE `inventoryproduct_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventoryproduct_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_table`
--

DROP TABLE IF EXISTS `product_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `productColor` varchar(255) NOT NULL,
  `coverPhoto` varchar(255) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `sizeGuide` varchar(255) DEFAULT NULL,
  `availability` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_categoryID_idx` (`categoryID`),
  CONSTRAINT `fk_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (121,1,'Logo Tee','hfghfg','Fuchsia Pink','Logo Tee - Front - Pink.png','Logo Tee - Back - Pink.png','','','SIZE CHART.png','Available'),(122,2,'INVI Hoodie','fdgdf','Black','Hoodie.png','','','','','Available'),(124,1,'Peek A Boo','sadasd','White','Anniv - Front - White.png','Anniv - Back - White.png','','','SIZE CHART.png','Available'),(126,1,'INVI Warrior','jhkhjk','Golden Yellow','INVI Warrior - Front - Golden Yellow.png','INVI Warrior - Back - Golden Yellow.png','','','SIZE CHART.png','Available'),(133,1,'INVI Warrior','dfgghfd','White','INVI Warrior - Front - White.png','INVI Warrior - Back - White.png','','','SIZE CHART.png','Available'),(138,3,'INVI Bucket Hat','dgfg','Khaki','Bucket Hat - Khaki.png','','','','','Available'),(139,1,'Logo Tee','fhfgh','Mint Green','Logo Tee - Front - Green.png','Logo Tee - Back - Green.png','','','SIZE CHART.png','Available');
/*!40000 ALTER TABLE `product_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provinces` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'Abra'),(2,'Agusan del Norte'),(3,'Agusan del Sur'),(4,'Aklan'),(5,'Albay'),(6,'Antique'),(7,'Apayao'),(8,'Aurora'),(9,'Basilan'),(10,'Bataan'),(11,'Batanes'),(12,'Batangas'),(13,'Benguet'),(14,'Biliran'),(15,'Bohol'),(16,'Bukidnon'),(17,'Bulacan'),(18,'Cagayan'),(19,'Camarines Norte'),(20,'Camarines Sur'),(21,'Camiguin'),(22,'Capiz'),(23,'Catanduanes'),(24,'Cavite'),(25,'Cebu'),(26,'Compostela Valley'),(27,'Cotabato'),(28,'Davao del Norte'),(29,'Davao del Sur'),(30,'Davao Oriental'),(31,'Eastern Samar'),(32,'Guimaras'),(33,'Ifugao'),(34,'Ilocos Norte'),(35,'Ilocos Sur'),(36,'Iloilo'),(37,'Isabela'),(38,'Kalinga'),(39,'La Union'),(40,'Laguna'),(41,'Lanao del Norte'),(42,'Lanao del Sur'),(43,'Leyte'),(44,'Maguindanao'),(45,'Marinduque'),(46,'Masbate'),(47,'Metro Manila'),(48,'Misamis Occidental'),(49,'Misamis Oriental'),(50,'Mountain Province'),(51,'Negros Occidental'),(52,'Negros Oriental'),(53,'Northern Samar'),(54,'Nueva Ecija'),(55,'Nueva Vizcaya'),(56,'Occidental Mindoro'),(57,'Oriental Mindoro'),(58,'Palawan'),(59,'Pampanga'),(60,'Pangasinan'),(61,'Quezon'),(62,'Quirino'),(63,'Rizal'),(64,'Romblon'),(65,'Samar'),(66,'Sarangani'),(67,'Siquijor'),(68,'Sorsogon'),(69,'South Cotabato'),(70,'Southern Leyte'),(71,'Sultan Kudarat'),(72,'Sulu'),(73,'Surigao del Norte'),(74,'Surigao del Sur'),(75,'Tarlac'),(76,'Tawi-Tawi'),(77,'Zambales'),(78,'Zamboanga del Norte'),(79,'Zamboanga del Sur'),(80,'Zamboanga Sibugay');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawmaterials_table`
--

DROP TABLE IF EXISTS `rawmaterials_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rawmaterials_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `materialName` varchar(255) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `stockQty` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_supplierID_idx` (`supplierID`),
  CONSTRAINT `fk_supplierID` FOREIGN KEY (`supplierID`) REFERENCES `supplier_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawmaterials_table`
--

LOCK TABLES `rawmaterials_table` WRITE;
/*!40000 ALTER TABLE `rawmaterials_table` DISABLE KEYS */;
INSERT INTO `rawmaterials_table` VALUES (103,'Black Shirt',175,50,9),(104,'Decals',10,50,11),(105,'White Shirt',175,100,9),(106,'Sleeve Label',3,200,10),(107,'Necktape',5,200,9),(108,'Hangtag',4,60,11),(109,'Face Mask',50,30,13),(110,'Black Bucket Hat',80,30,13),(111,'Fuchsia Pink Shirt',175,50,9),(112,'Hoodie',200,50,9),(113,'Orange Beanie',80,20,13),(114,'Mint Green Shirt',175,100,9),(115,'Yellow Shirt',175,50,9),(116,'Yellow Beanie',80,50,13);
/*!40000 ALTER TABLE `rawmaterials_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_table`
--

DROP TABLE IF EXISTS `sales_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `orderID` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `salesQty` int(11) NOT NULL,
  `shipMethod` varchar(255) NOT NULL,
  `shipFee` int(11) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `fk_itemID_idx` (`productID`),
  KEY `fk_stockID_idx` (`stockID`),
  KEY `fk_acctID_idx` (`accountID`),
  CONSTRAINT `fk_acctID` FOREIGN KEY (`accountID`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prodID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_stockID` FOREIGN KEY (`stockID`) REFERENCES `stocks_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_table`
--

LOCK TABLES `sales_table` WRITE;
/*!40000 ALTER TABLE `sales_table` DISABLE KEYS */;
INSERT INTO `sales_table` VALUES (43,'0',121,258,15,'Standard Delivery',180,'Cash on Delivery (COD)',2530,10,'Paid','Delivered','2021-08-06 16:10:12'),(49,'55',121,255,1,'Standard Delivery',180,'PayPal or Credit / Debit Card',1080,3,'Paid','Delivered','2021-10-05 23:29:55'),(54,'527',122,265,10,'Standard Delivery',180,'Cash on Delivery (COD)',7180,3,'Paid','Delivered','2021-09-05 21:47:50'),(59,'40',124,271,1,'Standard Delivery',180,'Cash on Delivery (COD)',630,3,'Paid','Delivered','2021-10-06 16:42:32'),(61,'d2ad87e80f904',121,259,1,'Standard Delivery',180,'Cash on Delivery (COD)',630,10,'Paid','Delivered','2021-01-06 16:43:21'),(65,'b5419b2b47b8a8',122,264,6,'Standard Delivery',180,'PayPal or Credit / Debit Card',880,3,'Paid','Delivered','2021-10-08 16:17:05'),(68,'32034eac415b6',126,289,1,'Standard Delivery',100,'PayPal or Credit / Debit Card',1450,3,'Paid','Delivered','2021-10-08 22:55:44'),(69,'x836l',124,270,1,'Standard Delivery',180,'Cash on Delivery (COD)',630,3,'Cancelled','Cancelled','2021-10-11 21:48:34'),(70,'5y1to',121,260,1,'Standard Delivery',180,'Cash on Delivery (COD)',630,3,'Paid','Delivered','2021-10-11 22:50:22'),(71,'wwpuc',126,288,4,'Standard Delivery',100,'Cash on Delivery (COD)',5900,3,'Paid','Delivered','2021-10-12 02:40:08'),(72,'wwpuc',122,266,5,'Standard Delivery',100,'Cash on Delivery (COD)',5900,3,'Paid','Delivered','2021-10-12 02:40:08'),(77,'crwq8',122,266,1,'Standard Delivery',100,'PayPal or Credit / Debit Card',800,3,'Paid','Delivered','2021-10-13 23:37:20');
/*!40000 ALTER TABLE `sales_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks_table`
--

DROP TABLE IF EXISTS `stocks_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stocks_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_productID_idx` (`productID`),
  CONSTRAINT `fk_itemID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=335 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_table`
--

LOCK TABLES `stocks_table` WRITE;
/*!40000 ALTER TABLE `stocks_table` DISABLE KEYS */;
INSERT INTO `stocks_table` VALUES (255,121,'XS',1,''),(256,121,'S',2,''),(257,121,'M',11,''),(258,121,'L',15,''),(259,121,'XL',7,''),(260,121,'2XL',5,''),(261,121,'3XL',1,''),(262,122,'XS',2,''),(263,122,'S',5,''),(264,122,'M',15,''),(265,122,'L',15,''),(266,122,'XL',7,''),(267,122,'2XL',2,''),(268,122,'3XL',1,''),(270,124,'XS',10,''),(271,124,'S',15,''),(272,124,'M',20,''),(273,124,'L',20,''),(274,124,'XL',15,''),(275,124,'2XL',10,''),(276,124,'3XL',10,''),(284,126,'XS',1,''),(285,126,'S',5,''),(286,126,'M',15,''),(287,126,'L',12,''),(288,126,'XL',10,''),(289,126,'2XL',5,''),(290,126,'3XL',5,''),(316,133,'XS',0,'Wht-INVIWarrior-XS-vdjxd'),(317,133,'S',5,'Wht-INVIWarrior-S-sqe5r'),(318,133,'M',15,'Wht-INVIWarrior-M-1n9d9'),(319,133,'L',12,'Wht-INVIWarrior-L-btwvp'),(320,133,'XL',5,'Wht-INVIWarrior-XL-z3auv'),(321,133,'2XL',7,'Wht-INVIWarrior-2XL-2v00h'),(322,133,'3XL',2,'Wht-INVIWarrior-3XL-qzhvk'),(327,138,NULL,30,'Khk-INVIBucketHat-1z4cl'),(328,139,'XS',5,'MntGrn-LogoTee-XS-7vpss'),(329,139,'S',7,'MntGrn-LogoTee-S-on7i6'),(330,139,'M',12,'MntGrn-LogoTee-M-luqrg'),(331,139,'L',15,'MntGrn-LogoTee-L-lqtw1'),(332,139,'XL',5,'MntGrn-LogoTee-XL-qypks'),(333,139,'2XL',7,'MntGrn-LogoTee-2XL-df36p'),(334,139,'3XL',2,'MntGrn-LogoTee-3XL-0aj87');
/*!40000 ALTER TABLE `stocks_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_table`
--

DROP TABLE IF EXISTS `supplier_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(255) NOT NULL,
  `supplierEmail` varchar(255) NOT NULL,
  `supplierAddress` varchar(255) NOT NULL,
  `supplierContactNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_table`
--

LOCK TABLES `supplier_table` WRITE;
/*!40000 ALTER TABLE `supplier_table` DISABLE KEYS */;
INSERT INTO `supplier_table` VALUES (9,'Rose Monge Mercader','rose@gmail.com','Pasig, Philippines','09597878465'),(10,'JRY Printing','JRY@gmail.com','Manila, Philippines','09087119079'),(11,'GRPK Prints & Merch','grpk@gmail.com','Santa Rosa, Philippines','09397631064'),(13,'QualiPrints','raven.barrogo24@gmail.com','Pasig, Philippines','275769573');
/*!40000 ALTER TABLE `supplier_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-19 16:11:11
