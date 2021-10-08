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
  `access` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_table`
--

LOCK TABLES `account_table` WRITE;
/*!40000 ALTER TABLE `account_table` DISABLE KEYS */;
INSERT INTO `account_table` VALUES (1,'Admin','Admin','admin@gmail.com','25d55ad283aa400af464c76d713c07ad','09959764761','admin'),(3,'Raven','Barrogo','raven@gmail.com','25d55ad283aa400af464c76d713c07ad','09123456789','user'),(5,'Raven','Barrogo','admin2@gmail.com','25d55ad283aa400af464c76d713c07ad','09959764761','admin'),(10,'User','User','user@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,'user');
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_table`
--

LOCK TABLES `address_table` WRITE;
/*!40000 ALTER TABLE `address_table` DISABLE KEYS */;
INSERT INTO `address_table` VALUES (8,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(11,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','primary address',3),(12,'Raven','Barrogo','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','',3),(13,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1600','Metro Manila','Philippines','09959764761','primary address',3),(15,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(16,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Batanes','Philippines','09959764761','',3),(17,'Raven','Barrogo','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','',3),(20,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(21,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(22,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(23,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Batangas','Philippines','09959764761','',3),(24,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(25,'Raven','Barrogo','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','primary address',3),(26,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','primary address',3),(27,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',10),(28,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',10),(29,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Biliran','Philippines','09959764761','primary address',3),(30,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','primary address',3),(31,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bukidnon','Philippines','09959764761','primary address',3),(32,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(33,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Batanes','Philippines','09959764761','',3),(34,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(35,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1600','Bohol','Philippines','09959764761','',3),(36,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Benguet','Philippines','09959764761','',3),(37,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1611','Bataan','Philippines','09959764761','',10),(38,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','',3),(39,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Biliran','Philippines','09959764761','',3),(40,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(41,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','',3),(42,'User','User','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Biliran','Philippines','09959764761','',10),(43,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(44,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Ilocos Sur','Philippines','09959764761','',3),(45,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bukidnon','Philippines','09959764761','',3),(46,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3);
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
  `netSales` int(11) NOT NULL,
  `productCost` int(11) NOT NULL,
  `netIncome` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_productID_idx` (`productID`),
  KEY `fk_materialID_idx` (`materialID`),
  CONSTRAINT `fk_materialID` FOREIGN KEY (`materialID`) REFERENCES `rawmaterials_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=381 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costing_table`
--

LOCK TABLES `costing_table` WRITE;
/*!40000 ALTER TABLE `costing_table` DISABLE KEYS */;
INSERT INTO `costing_table` VALUES (351,115,104,50,450,317,133),(352,115,108,50,450,317,133),(353,115,107,50,450,317,133),(354,115,106,50,450,317,133),(355,115,105,50,450,317,133),(356,116,106,30,250,103,147),(357,116,109,30,250,103,147),(358,117,104,25,500,357,143),(359,117,108,10,500,357,143),(360,117,107,50,500,357,143),(361,117,106,50,500,357,143),(362,117,103,50,500,357,143),(363,118,106,30,250,158,92),(364,118,110,30,250,158,92),(365,119,107,50,450,370,80),(366,119,105,50,450,370,80),(367,120,107,50,500,363,137),(368,120,106,40,500,363,137),(369,120,103,50,500,363,137),(370,121,105,50,450,295,155),(371,122,104,50,700,293,407),(372,122,106,50,700,293,407),(373,122,112,50,700,293,407),(374,123,113,20,250,155,95),(375,124,106,30,450,298,152),(376,124,105,30,450,298,152),(377,125,106,50,450,298,152),(378,125,114,50,450,298,152),(379,126,106,70,450,348,102),(380,126,115,75,450,348,102);
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
  `editBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_rawID_idx` (`materialID`),
  KEY `fk_admin_idx` (`adminID`),
  KEY `fk_editByAdmin_idx` (`editBy`),
  CONSTRAINT `fk_admin` FOREIGN KEY (`adminID`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_editByAdmin` FOREIGN KEY (`editBy`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rawID` FOREIGN KEY (`materialID`) REFERENCES `rawmaterials_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorymaterial_table`
--

LOCK TABLES `inventorymaterial_table` WRITE;
/*!40000 ALTER TABLE `inventorymaterial_table` DISABLE KEYS */;
INSERT INTO `inventorymaterial_table` VALUES (110,104,25,'2021-09-30 00:23:17',1,1),(111,103,50,'2021-09-30 00:19:05',1,1),(112,105,80,'2021-09-30 16:27:23',1,NULL),(113,106,200,'2021-10-02 15:23:12',1,NULL),(114,104,50,'2021-10-02 15:23:29',1,NULL),(115,115,100,'2021-10-07 19:10:32',1,NULL),(116,106,10,'2021-10-08 01:41:28',1,1);
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
  `editedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_prodID_idx` (`productID`),
  KEY `fk_stockID_idx` (`stockID`),
  KEY `fk_admin_idx` (`addedBy`),
  KEY `fk_editByAdmin_idx` (`editedBy`),
  CONSTRAINT `fk_addedAdmn` FOREIGN KEY (`addedBy`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_editedAdmn` FOREIGN KEY (`editedBy`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prdID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_stckID` FOREIGN KEY (`stockID`) REFERENCES `stocks_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryproduct_table`
--

LOCK TABLES `inventoryproduct_table` WRITE;
/*!40000 ALTER TABLE `inventoryproduct_table` DISABLE KEYS */;
INSERT INTO `inventoryproduct_table` VALUES (7,115,226,10,'2021-10-01 16:35:17',1,NULL),(8,115,231,15,'2021-10-01 16:35:42',1,NULL),(9,116,232,50,'2021-10-02 01:20:39',1,1),(10,115,231,4,'2021-10-01 16:52:58',1,NULL),(11,119,247,1,'2021-10-01 16:56:10',1,NULL),(12,119,247,9,'2021-10-01 16:56:39',1,NULL),(13,126,284,19,'2021-10-07 19:20:54',1,NULL),(14,118,240,30,'2021-10-07 19:21:29',1,NULL);
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
  PRIMARY KEY (`ID`),
  KEY `fk_categoryID_idx` (`categoryID`),
  CONSTRAINT `fk_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (115,1,'Peek A Boo','sdfds','Khaki','Anniv - Front - Khaki.png','Anniv - Back - Khaki.png','','','SIZE CHART.png'),(116,3,'INVI Face Mask','adsad','Black','Face Mask.png','','','',''),(117,1,'INVI x Itachi Uchiha','dfsf','Black','Itachi - Front - Black.png','Itachi - Back - Black.png','','','SIZE CHART.png'),(118,3,'INVI Bucket Hat','hgjhf','Black','Bucket Hat - Black.png','','','',''),(119,1,'INVI Warrior','sdfds','White','INVI Warrior - Front - White.png','INVI Warrior - Back - White.png','hero-img2.png','hero-img.png','SIZE CHART.png'),(120,1,'INVI x Donquixote Doflamingo','gdfg','Black','Doffy - Front - Black.png','Doffy - Back - Black.png','','','SIZE CHART.png'),(121,1,'Logo Tee','hfghfg','Fuchsia Pink','Logo Tee - Front - Pink.png','Logo Tee - Back - Pink.png','','','SIZE CHART.png'),(122,2,'INVI Hoodie','fdgdf','Black','Hoodie.png','','','',''),(123,3,'INVI Beanie','dfgfdg','Orange','Beanie - Orange.png','','','',''),(124,1,'Peek A Boo','sadasd','White','Anniv - Front - White.png','Anniv - Back - White.png','','','SIZE CHART.png'),(125,1,'Logo Tee','fghfgh','Mint Green','Logo Tee - Front - Green.png','Logo Tee - Back - Green.png','','','SIZE CHART.png'),(126,1,'INVI Warrior','jhkhjk','Golden Yellow','INVI Warrior - Front - Golden Yellow.png','INVI Warrior - Back - Golden Yellow.png','','','SIZE CHART.png'),(127,3,'INVI Beanie','dsfdsfds','Yellow','Beanie - Yellow.png','','','','');
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
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawmaterials_table`
--

LOCK TABLES `rawmaterials_table` WRITE;
/*!40000 ALTER TABLE `rawmaterials_table` DISABLE KEYS */;
INSERT INTO `rawmaterials_table` VALUES (103,'Black Shirt',175,50,9),(104,'Decals',10,50,11),(105,'White Shirt',175,100,9),(106,'Sleeve Label',3,200,10),(107,'Necktape',5,200,9),(108,'Hangtag',4,60,11),(109,'Face Mask',50,30,13),(110,'Black Bucket Hat',80,30,13),(111,'Fuchsia Pink Shirt',175,50,9),(112,'Hoodie',200,50,9),(113,'Orange Beanie',80,20,13),(114,'Mint Green Shirt',175,100,9),(115,'Yellow Shirt',175,50,9);
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_table`
--

LOCK TABLES `sales_table` WRITE;
/*!40000 ALTER TABLE `sales_table` DISABLE KEYS */;
INSERT INTO `sales_table` VALUES (41,'0',115,225,2,'Standard Delivery',180,'Cash on Delivery (COD)',2530,10,'Paid','Delivered','2021-08-06 16:10:12'),(42,'0',118,240,4,'Standard Delivery',180,'Cash on Delivery (COD)',2530,10,'Paid','Delivered','2021-08-06 16:10:12'),(43,'0',121,258,15,'Standard Delivery',180,'Cash on Delivery (COD)',2530,10,'Paid','Delivered','2021-08-06 16:10:12'),(44,'3',117,236,1,'Standard Delivery',180,'Cash on Delivery (COD)',680,10,'Paid','Delivered','2021-05-05 23:34:45'),(45,'91891',117,237,1,'Standard Delivery',180,'Cash on Delivery (COD)',1180,3,'Paid','Delivered','2021-03-05 21:35:14'),(46,'91891',120,252,1,'Standard Delivery',180,'Cash on Delivery (COD)',1180,3,'Paid','Delivered','2021-03-05 21:35:14'),(47,'5',120,252,2,'Standard Delivery',180,'Cash on Delivery (COD)',2080,3,'Paid','Delivered','2021-06-06 15:22:39'),(48,'5',119,245,2,'Standard Delivery',180,'Cash on Delivery (COD)',2080,3,'Paid','Delivered','2021-06-06 15:22:39'),(49,'55',121,255,1,'Standard Delivery',180,'PayPal',1080,3,'Paid','Delivered','2021-10-05 23:29:55'),(50,'55',115,231,1,'Standard Delivery',180,'PayPal',1080,3,'Paid','Delivered','2021-10-05 23:29:55'),(51,'4',120,252,4,'Standard Delivery',100,'Cash on Delivery (COD)',2100,3,'Paid','Delivered','2021-10-05 21:42:35'),(53,'86',118,240,26,'Standard Delivery',180,'Cash on Delivery (COD)',6680,3,'Paid','Delivered','2021-07-06 16:06:59'),(54,'527',122,265,10,'Standard Delivery',180,'Cash on Delivery (COD)',7180,3,'Paid','Delivered','2021-09-05 21:47:50'),(55,'96',116,232,80,'Standard Delivery',180,'Cash on Delivery (COD)',20180,3,'Paid','Delivered','2021-04-05 22:00:09'),(57,'7111',119,242,1,'Standard Delivery',100,'Cash on Delivery (COD)',550,3,'Paid','Delivered','2021-10-06 16:09:46'),(59,'40',124,271,1,'Standard Delivery',180,'Cash on Delivery (COD)',630,3,'Paid','Delivered','2021-10-06 16:42:32'),(60,'141c849d99979',119,243,1,'Standard Delivery',180,'Cash on Delivery (COD)',630,3,'Paid','Delivered','2021-10-06 16:44:11'),(61,'d2ad87e80f904',121,259,1,'Standard Delivery',180,'Cash on Delivery (COD)',630,10,'Paid','Delivered','2021-01-06 16:43:21'),(62,'ffa27d57ae58a',115,226,5,'Standard Delivery',100,'PayPal',3100,3,'Paid','Delivered','2021-10-07 19:04:27'),(63,'ffa27d57ae58a',120,251,1,'Standard Delivery',100,'PayPal',3100,3,'Paid','Delivered','2021-10-07 19:04:27'),(64,'ffa27d57ae58a',123,269,1,'Standard Delivery',100,'PayPal',3100,3,'Paid','Delivered','2021-10-07 19:04:27'),(65,'b5419b2b47b8a8',122,264,1,'Standard Delivery',180,'PayPal',880,3,'Paid','Shipped','2021-10-08 16:17:05'),(66,'4a35bbd38e1908',118,240,1,'Standard Delivery',180,'Cash on Delivery (COD)',430,3,'Cancelled','Cancelled','2021-10-08 16:08:06'),(67,'32034eac415b6',115,226,2,'Standard Delivery',100,'PayPal',1450,3,'Paid','Delivered','2021-10-08 22:55:44'),(68,'32034eac415b6',126,289,1,'Standard Delivery',100,'PayPal',1450,3,'Paid','Delivered','2021-10-08 22:55:44');
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
  PRIMARY KEY (`ID`),
  KEY `fk_productID_idx` (`productID`),
  CONSTRAINT `fk_itemID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_table`
--

LOCK TABLES `stocks_table` WRITE;
/*!40000 ALTER TABLE `stocks_table` DISABLE KEYS */;
INSERT INTO `stocks_table` VALUES (225,115,'XS',2),(226,115,'S',6),(227,115,'M',15),(228,115,'L',15),(229,115,'XL',5),(230,115,'2XL',4),(231,115,'3XL',1),(232,116,NULL,30),(233,117,'XS',2),(234,117,'S',5),(235,117,'M',10),(236,117,'L',12),(237,117,'XL',7),(238,117,'2XL',2),(239,117,'3XL',1),(240,118,NULL,30),(241,119,'XS',0),(242,119,'S',2),(243,119,'M',5),(244,119,'L',10),(245,119,'XL',11),(246,119,'2XL',1),(247,119,'3XL',0),(248,120,'XS',2),(249,120,'S',5),(250,120,'M',15),(251,120,'L',15),(252,120,'XL',7),(253,120,'2XL',5),(254,120,'3XL',2),(255,121,'XS',1),(256,121,'S',2),(257,121,'M',11),(258,121,'L',15),(259,121,'XL',7),(260,121,'2XL',5),(261,121,'3XL',1),(262,122,'XS',2),(263,122,'S',5),(264,122,'M',15),(265,122,'L',15),(266,122,'XL',7),(267,122,'2XL',2),(268,122,'3XL',1),(269,123,NULL,20),(270,124,'XS',10),(271,124,'S',15),(272,124,'M',20),(273,124,'L',20),(274,124,'XL',15),(275,124,'2XL',10),(276,124,'3XL',10),(277,125,'XS',5),(278,125,'S',5),(279,125,'M',15),(280,125,'L',12),(281,125,'XL',5),(282,125,'2XL',5),(283,125,'3XL',3),(284,126,'XS',1),(285,126,'S',5),(286,126,'M',15),(287,126,'L',12),(288,126,'XL',10),(289,126,'2XL',5),(290,126,'3XL',5);
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
INSERT INTO `supplier_table` VALUES (9,'Rose Monge Mercader','rose@gmail.com','Pasig, Philippines','09597878465'),(10,'JRY Printing','JRY@gmail.com','Manila, Philippines','09087119079'),(11,'GRPK Prints & Merch','grpk@gmail.com','Santa Rosa, Philippines','09397631064'),(13,'QualiPrints','quali@gmail.com','Pasig, Philippines','275769573');
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

-- Dump completed on 2021-10-08 23:47:39
