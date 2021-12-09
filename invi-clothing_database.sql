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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_table`
--

LOCK TABLES `account_table` WRITE;
/*!40000 ALTER TABLE `account_table` DISABLE KEYS */;
INSERT INTO `account_table` VALUES (1,'INVI','Clothing Co.','inviclothing.co@gmail.com','25d55ad283aa400af464c76d713c07ad','',NULL,'admin'),(2,'Raven','Barrogo','raven.barrogo24@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,'user'),(3,'User','User','user@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,'user');
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
  `orderID` varchar(255) NOT NULL,
  `addressID` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_table`
--

LOCK TABLES `address_table` WRITE;
/*!40000 ALTER TABLE `address_table` DISABLE KEYS */;
INSERT INTO `address_table` VALUES (1,'wfaln',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(2,'9i69a',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(3,'6typm',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(4,'2wdj3',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(5,'gq3a1',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(6,'h3chq',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(7,'5qnd6',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(8,'5aox9',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(9,'ptsy2',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(10,'o86mc',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(11,'ct867',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(12,'y3fxm',269987615,'User','User','Sample Address','Sample Address','Sample city','Sample Code','Metro Manila','Philippines','09959764761','primary address',3),(13,'zwuw9',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(14,'89c0s',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(15,'gv09w',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(16,'hh31h',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(17,'roy0l',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(18,'ypx17',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(19,'ejtel',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(20,'fzid4',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(21,'z6m7q',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(22,'v3tj4',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(23,'87mzo',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costing_table`
--

LOCK TABLES `costing_table` WRITE;
/*!40000 ALTER TABLE `costing_table` DISABLE KEYS */;
INSERT INTO `costing_table` VALUES (1,1,3,100,130,100,30,100,0,0,337,33700,450,0,450,113,0,113),(2,1,2,100,130,100,30,100,0,0,337,33700,450,0,450,113,0,113),(3,1,1,100,130,100,30,100,0,0,337,33700,450,0,450,113,0,113),(4,2,2,100,130,100,30,100,0,0,347,34700,450,0,450,103,0,103),(5,2,3,100,130,100,30,100,0,0,347,34700,450,0,450,103,0,103),(6,2,5,100,130,100,30,100,0,0,347,34700,450,0,450,103,0,103),(7,3,7,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(8,3,2,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(9,3,3,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(10,3,4,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(11,3,6,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(12,4,2,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(13,4,3,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(14,4,4,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(15,4,7,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(16,4,8,100,90,100,15,100,0,0,298,29800,450,0,450,152,0,152),(17,5,4,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(18,5,10,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(19,5,9,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(20,6,4,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(21,6,10,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(22,6,11,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(23,7,4,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(24,7,10,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(25,7,12,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(26,8,4,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(27,8,10,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(28,8,13,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(29,9,4,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(30,9,10,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(31,9,14,50,75,50,0,0,0,0,162,8100,300,0,300,138,0,138),(32,10,3,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(33,10,4,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(34,10,10,200,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(35,10,17,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(36,10,16,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(37,10,15,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(38,11,3,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(39,11,4,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(40,11,10,200,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(41,11,16,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(42,11,17,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(43,11,18,100,75,100,0,0,0,0,277,28100,500,0,500,223,0,223),(44,12,3,100,120,100,20,100,0,0,331,33900,500,0,500,169,0,169),(45,12,4,100,120,100,20,100,0,0,331,33900,500,0,500,169,0,169),(46,12,16,200,120,100,20,100,0,0,331,33900,500,0,500,169,0,169),(47,12,19,100,120,100,20,100,0,0,331,33900,500,0,500,169,0,169),(48,13,3,100,125,100,25,100,0,0,341,34100,500,0,500,159,0,159),(49,13,4,100,125,100,25,100,0,0,341,34100,500,0,500,159,0,159),(50,13,16,100,125,100,25,100,0,0,341,34100,500,0,500,159,0,159),(51,13,19,100,125,100,25,100,0,0,341,34100,500,0,500,159,0,159),(52,14,20,50,30,50,0,0,0,0,60,3000,150,0,150,90,0,90),(53,15,21,100,90,100,15,100,0,0,291,29100,450,0,450,159,0,159),(54,15,7,100,90,100,15,100,0,0,291,29100,450,0,450,159,0,159),(55,15,4,100,90,100,15,100,0,0,291,29100,450,0,450,159,0,159),(56,15,3,100,90,100,15,100,0,0,291,29100,450,0,450,159,0,159),(57,15,1,100,90,100,15,100,0,0,291,29100,450,0,450,159,0,159),(58,16,3,100,90,100,15,100,0,0,301,30100,450,50,400,99,0,99),(59,16,4,100,90,100,15,100,0,0,301,30100,450,50,400,99,0,99),(60,16,7,100,90,100,15,100,0,0,301,30100,450,50,400,99,0,99),(61,16,21,100,90,100,15,100,0,0,301,30100,450,50,400,99,0,99),(62,16,22,100,90,100,15,100,0,0,301,30100,450,50,400,99,0,99),(63,17,2,70,80,70,0,0,0,0,243,17010,700,0,700,457,0,457),(64,17,4,70,80,70,0,0,0,0,243,17010,700,0,700,457,0,457),(65,17,7,70,80,70,0,0,0,0,243,17010,700,0,700,457,0,457),(66,17,23,70,80,70,0,0,0,0,243,17010,700,0,700,457,0,457);
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
  PRIMARY KEY (`ID`),
  KEY `fk_rawID_idx` (`materialID`),
  CONSTRAINT `fk_rawID` FOREIGN KEY (`materialID`) REFERENCES `rawmaterials_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorymaterial_table`
--

LOCK TABLES `inventorymaterial_table` WRITE;
/*!40000 ALTER TABLE `inventorymaterial_table` DISABLE KEYS */;
INSERT INTO `inventorymaterial_table` VALUES (1,2,100,'2021-11-16 14:28:26'),(2,3,200,'2021-11-16 14:33:37'),(3,2,200,'2021-11-16 14:34:41'),(4,7,100,'2021-11-16 14:37:03'),(5,4,200,'2021-11-16 14:39:52'),(6,10,50,'2021-11-16 14:42:29'),(7,10,150,'2021-11-16 14:44:03'),(8,4,200,'2021-11-16 14:46:44'),(9,3,200,'2021-11-16 14:50:45'),(10,10,200,'2021-11-16 14:50:57'),(11,10,200,'2021-11-16 14:53:54'),(12,4,200,'2021-11-16 14:54:17'),(13,16,200,'2021-11-16 14:57:36'),(14,3,200,'2021-11-16 14:57:46'),(15,19,100,'2021-11-16 14:59:45'),(16,16,100,'2021-11-16 14:59:56'),(17,4,200,'2021-11-16 15:00:13'),(18,1,100,'2021-11-16 15:05:58'),(19,3,200,'2021-11-16 15:06:27'),(20,7,200,'2021-11-16 15:06:37'),(21,4,200,'2021-11-16 15:08:39'),(22,7,70,'2021-11-16 18:49:31'),(23,2,70,'2021-11-16 18:49:41'),(24,1,100,'2021-11-16 18:57:18'),(25,17,5,'2021-12-03 01:26:31'),(26,23,100,'2021-12-08 01:00:01'),(27,12,85,'2021-12-09 01:13:57');
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
  PRIMARY KEY (`ID`),
  KEY `fk_prodID_idx` (`productID`),
  KEY `fk_stockID_idx` (`stockID`),
  CONSTRAINT `fk_prdID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_stckID` FOREIGN KEY (`stockID`) REFERENCES `stocks_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryproduct_table`
--

LOCK TABLES `inventoryproduct_table` WRITE;
/*!40000 ALTER TABLE `inventoryproduct_table` DISABLE KEYS */;
INSERT INTO `inventoryproduct_table` VALUES (1,4,22,15,'2021-11-16 16:05:01'),(2,3,15,15,'2021-11-16 16:05:23'),(3,16,70,15,'2021-11-16 18:56:47'),(4,17,77,30,'2021-12-08 00:55:20'),(5,1,7,25,'2021-12-09 01:19:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (1,1,'INVI Warrior','220 gsm CVC shirt w/ necktape\r\nSilkscreen print\r\nFree sticker','White','INVI Warrior - Front - White.png','INVI Warrior - Back - White.png','','','SIZE CHART.jpg','Available'),(2,1,'INVI Warrior','220 gsm CVC shirt w/ necktape\r\nSilkscreen print\r\nFree sticker','Golden Yellow','INVI Warrior - Front - Golden Yellow.png','INVI Warrior - Back - Golden Yellow.png','','','SIZE CHART.jpg','Available'),(3,1,'Logo Tee','220 gsm CVC Shirt w/ necktape & sleeve label\r\nSilkscreen print\r\nFree Sticker','Fuchsia Pink','Logo Tee - Front - Pink.png','Logo Tee - Back - Pink.png','','','SIZE CHART.jpg','Available'),(4,1,'Logo Tee','220 gsm CVC Shirt w/ necktape & sleeve label\r\nSilkscreen print\r\nFree Sticker','Mint Green','Logo Tee - Front - Green.png','Logo Tee - Back - Green.png','','','','Available'),(5,3,'INVI Bucket Hat','- Digitally Embroidered\r\n- With Free Sticker','Black','Bucket Hat - Black.png','','','','','Available'),(6,3,'INVI Bucket Hat','- Digitally Embroidered\r\n- With Free Sticker','Khaki','Bucket Hat - Khaki.png','','','','','Available'),(7,3,'INVI Beanie',' - Digitally Embroidered\r\n - With Free Sticker','Black','Beanie - Black.png','','','','','Available'),(8,3,'INVI Beanie',' - Digitally Embroidered\r\n - With Free Sticker','Orange','Beanie - Orange.png','','','','','Available'),(9,3,'INVI Beanie',' - Digitally Embroidered\r\n - With Free Sticker','Yellow','Beanie - Yellow.png','','','','','Available'),(10,1,'3 - tone Heayweight','- 220 gsm CVC Shirt w/ Necktape & Sleeve Label\r\n- Digitally Embroidered\r\n- With Free 4 Stickers','Gray - Maroon - Navy Blue','3Tone - Front - Maroon.png','3Tone - Back - Maroon.png','','','SIZE CHART.jpg','Available'),(11,1,'3 - tone Heayweight','- 220 gsm CVC Shirt w/ Necktape & Sleeve Label\r\n- Digitally Embroidered\r\n- With Free 4 Stickers','Orange - White - Royal Blue','3Tone - Front - White.png','3Tone - Back - White.png','','','SIZE CHART.jpg','Available'),(12,1,'INVI x Itachi Uchiha','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Stickers','Black','Itachi - Front - Black.png','Itachi - Back - Black.png','','','SIZE CHART.jpg','Available'),(13,1,'INVI x Doffy','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Stickers','Black','Doffy - Front - Black.png','Doffy - Back - Black.png','','','','Available'),(14,3,'INVI Face Mask','Virus is \'INVI\' as it can\'t be seen by our naked eyes, but you can protect yourself from the virus with these INVI Face Mask. \r\nBecause of the new surge of COVID-19, We want to remind everyone to always wear your mask. ','Black & White','Face Mask.png','','','','','Available'),(15,1,'Peek A Boo','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Decals','White','Anniv - Front - White.png','Anniv - Back - White.png','','','SIZE CHART.jpg','Available'),(16,1,'Peek A Boo','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Decals','Khaki','Anniv - Front - Khaki.png','Anniv - Back - Khaki.png','','','SIZE CHART.jpg','Available'),(17,2,'INVI Hoodie','Description Here','Black','Hoodie 2.png','','','','','Available'),(19,1,'Logo Tee','Hello World','Black','Logo Tee - Front - Black.png','Logo Tee - Back - Black.png','','','SIZE CHART.jpg','Unavailable');
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
  KEY `fk_supplier_idx` (`supplierID`),
  CONSTRAINT `fk_supplier` FOREIGN KEY (`supplierID`) REFERENCES `supplier_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawmaterials_table`
--

LOCK TABLES `rawmaterials_table` WRITE;
/*!40000 ALTER TABLE `rawmaterials_table` DISABLE KEYS */;
INSERT INTO `rawmaterials_table` VALUES (1,'White Shirt',165,100,1),(2,'Sticker',7,100,4),(3,'Necktape',5,200,3),(4,'Sleeve Label',3,200,3),(5,'Golden Yellow Shirt',175,100,1),(6,'Fuchsia Pink Shirt',175,100,1),(7,'Hangtag',3,100,4),(8,'Mint Green Shirt',175,100,1),(9,'Black Bucket Hat',80,50,1),(10,'Strips Stickers',4,50,2),(11,'Khaki Bucket Hat',80,50,1),(12,'Black Beanie',80,50,1),(13,'Orange Beanie',80,50,1),(14,'Yellow Beanie',80,50,1),(15,'3 Tone Shirt - Maroon',175,100,1),(16,'Sticker hangtag',8,200,2),(17,'Die Cut Sticker',7,200,2),(18,'3 Tone Shirt - Orange',175,100,1),(19,'Black Shirt',175,100,1),(20,'Face Mask',30,50,4),(21,'Decals',10,200,2),(22,'Khaki Shirt',175,100,1),(23,'Black Hoodie',150,70,1);
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
  `addressID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_itemID_idx` (`productID`),
  KEY `fk_stockID_idx` (`stockID`),
  KEY `fk_acctID_idx` (`accountID`),
  CONSTRAINT `fk_acctID` FOREIGN KEY (`accountID`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prodID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_stockID` FOREIGN KEY (`stockID`) REFERENCES `stocks_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_table`
--

LOCK TABLES `sales_table` WRITE;
/*!40000 ALTER TABLE `sales_table` DISABLE KEYS */;
INSERT INTO `sales_table` VALUES (1,'wfaln',1,4,5,'Express Delivery',200,'Cash on Delivery (COD)',3800,2,'Paid','Delivered','2021-01-16 14:16:35',509009063),(2,'wfaln',2,10,3,'Express Delivery',200,'Cash on Delivery (COD)',3800,2,'Paid','Delivered','2021-01-16 14:16:35',509009063),(3,'9i69a',9,33,10,'Standard Delivery',100,'Cash on Delivery (COD)',6100,2,'Paid','Delivered','2021-02-16 15:30:52',509009063),(4,'9i69a',6,30,5,'Standard Delivery',100,'Cash on Delivery (COD)',6100,2,'Paid','Delivered','2021-02-16 15:30:52',509009063),(5,'9i69a',12,53,3,'Standard Delivery',100,'Cash on Delivery (COD)',6100,2,'Paid','Delivered','2021-02-16 15:30:52',509009063),(6,'6typm',15,66,5,'Standard Delivery',100,'Cash on Delivery (COD)',2350,2,'Paid','Delivered','2021-03-16 15:35:06',509009063),(7,'2wdj3',3,19,4,'Standard Delivery',100,'Cash on Delivery (COD)',4150,2,'Cancelled','Cancelled','2021-11-16 15:38:20',509009063),(8,'2wdj3',4,22,5,'Standard Delivery',100,'Cash on Delivery (COD)',4150,2,'Cancelled','Cancelled','2021-11-16 15:38:20',509009063),(9,'gq3a1',4,22,5,'Standard Delivery',100,'Cash on Delivery (COD)',4600,2,'Cancelled','Cancelled','2021-11-16 15:41:24',509009063),(10,'gq3a1',3,19,5,'Standard Delivery',100,'Cash on Delivery (COD)',4600,2,'Cancelled','Cancelled','2021-11-16 15:41:24',509009063),(11,'h3chq',4,22,5,'Standard Delivery',100,'Cash on Delivery (COD)',4850,2,'Paid','Delivered','2021-04-16 15:43:51',509009063),(12,'h3chq',12,53,5,'Standard Delivery',100,'Cash on Delivery (COD)',4850,2,'Paid','Delivered','2021-04-16 15:43:51',509009063),(13,'5qnd6',14,62,20,'Standard Delivery',100,'Cash on Delivery (COD)',8600,2,'Paid','Delivered','2021-05-16 15:45:52',509009063),(14,'5qnd6',10,36,11,'Standard Delivery',100,'Cash on Delivery (COD)',8600,2,'Paid','Delivered','2021-05-16 15:45:52',509009063),(15,'5aox9',13,57,4,'Standard Delivery',100,'PayPal or Credit / Debit Card',2600,2,'Paid','Delivered','2021-06-16 15:48:48',509009063),(16,'5aox9',13,56,1,'Standard Delivery',100,'PayPal or Credit / Debit Card',2600,2,'Paid','Delivered','2021-06-16 15:48:48',509009063),(17,'ptsy2',3,15,5,'Standard Delivery',100,'PayPal or Credit / Debit Card',6850,2,'Paid','Delivered','2021-07-16 15:59:59',509009063),(18,'ptsy2',9,33,5,'Standard Delivery',100,'PayPal or Credit / Debit Card',6850,2,'Paid','Delivered','2021-07-16 15:59:59',509009063),(19,'ptsy2',8,32,5,'Standard Delivery',100,'PayPal or Credit / Debit Card',6850,2,'Paid','Delivered','2021-07-16 15:59:59',509009063),(20,'ptsy2',7,31,5,'Standard Delivery',100,'PayPal or Credit / Debit Card',6850,2,'Paid','Delivered','2021-07-16 15:59:59',509009063),(21,'o86mc',11,42,10,'Standard Delivery',100,'PayPal or Credit / Debit Card',7600,2,'Paid','Delivered','2021-09-16 16:02:28',509009063),(22,'o86mc',12,54,5,'Standard Delivery',100,'PayPal or Credit / Debit Card',7600,2,'Paid','Delivered','2021-09-16 16:02:28',509009063),(23,'ct867',16,71,15,'Standard Delivery',100,'Cash on Delivery (COD)',9850,2,'Paid','Delivered','2021-10-16 16:03:17',509009063),(24,'ct867',14,62,20,'Standard Delivery',100,'Cash on Delivery (COD)',9850,2,'Paid','Delivered','2021-10-16 16:03:17',509009063),(25,'y3fxm',10,37,5,'Standard Delivery',100,'Cash on Delivery (COD)',5600,3,'Pending','Placed','2021-11-16 17:46:20',269987615),(26,'y3fxm',8,32,10,'Standard Delivery',100,'Cash on Delivery (COD)',5600,3,'Pending','Placed','2021-11-16 17:46:20',269987615),(27,'zwuw9',16,72,5,'Express Delivery',200,'Cash on Delivery (COD)',2350,2,'Pending','Placed','2021-11-16 18:02:44',509009063),(28,'89c0s',12,51,4,'Standard Delivery',100,'PayPal or Credit / Debit Card',2100,2,'Paid','Cancelled','2021-11-16 18:04:39',509009063),(29,'gv09w',8,32,4,'Standard Delivery',100,'PayPal or Credit / Debit Card',1300,2,'Paid','Shipped','2021-11-16 18:08:59',509009063),(30,'hh31h',12,50,3,'Standard Delivery',100,'PayPal or Credit / Debit Card',1600,2,'Paid','Delivered','2021-11-16 18:12:17',509009063),(31,'roy0l',10,37,2,'Standard Delivery',100,'Cash on Delivery (COD)',2900,2,'Paid','Delivered','2021-12-08 02:02:17',509009063),(32,'roy0l',1,4,4,'Standard Delivery',100,'Cash on Delivery (COD)',2900,2,'Paid','Delivered','2021-12-08 02:02:17',509009063),(33,'ypx17',15,66,1,'Standard Delivery',100,'Cash on Delivery (COD)',550,2,'Paid','Delivered','2021-12-08 02:08:51',509009063),(34,'ejtel',12,51,4,'Express Delivery',200,'Cash on Delivery (COD)',2200,2,'Paid','Delivered','2021-12-09 12:27:58',509009063),(35,'fzid4',9,33,4,'Standard Delivery',100,'Cash on Delivery (COD)',1300,2,'Pending','Placed','2021-12-09 01:06:26',509009063),(36,'z6m7q',8,32,5,'Standard Delivery',100,'Cash on Delivery (COD)',1600,2,'Pending','Placed','2021-12-09 01:07:33',509009063),(37,'v3tj4',12,51,1,'Standard Delivery',100,'Cash on Delivery (COD)',600,2,'Pending','Placed','2021-12-09 01:09:25',509009063),(38,'87mzo',15,63,5,'Standard Delivery',100,'Cash on Delivery (COD)',9100,2,'Paid','Delivered','2021-12-09 01:10:50',509009063),(39,'87mzo',15,64,15,'Standard Delivery',100,'Cash on Delivery (COD)',9100,2,'Paid','Delivered','2021-12-09 01:10:50',509009063);
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
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_table`
--

LOCK TABLES `stocks_table` WRITE;
/*!40000 ALTER TABLE `stocks_table` DISABLE KEYS */;
INSERT INTO `stocks_table` VALUES (1,1,'XS',0,'Wht-INVIWarrior-XS-jhn86'),(2,1,'S',15,'Wht-INVIWarrior-S-qczzg'),(3,1,'M',25,'Wht-INVIWarrior-M-04j4v'),(4,1,'L',25,'Wht-INVIWarrior-L-hh0on'),(5,1,'XL',20,'Wht-INVIWarrior-XL-7733s'),(6,1,'2XL',15,'Wht-INVIWarrior-2XL-9ol59'),(7,1,'3XL',0,'Wht-INVIWarrior-3XL-nxb0k'),(8,2,'XS',0,'GldnYllw-INVIWarrior-XS-etm8p'),(9,2,'S',15,'GldnYllw-INVIWarrior-S-mwndf'),(10,2,'M',25,'GldnYllw-INVIWarrior-M-gvpab'),(11,2,'L',25,'GldnYllw-INVIWarrior-L-gywdk'),(12,2,'XL',20,'GldnYllw-INVIWarrior-XL-2zy6n'),(13,2,'2XL',15,'GldnYllw-INVIWarrior-2XL-pkz5e'),(14,2,'3XL',0,'GldnYllw-INVIWarrior-3XL-r2fs8'),(15,3,'XS',5,'FchsPnk-LogoTee-XS-32cte'),(16,3,'S',15,'FchsPnk-LogoTee-S-4tk5a'),(17,3,'M',20,'FchsPnk-LogoTee-M-2s9jb'),(18,3,'L',20,'FchsPnk-LogoTee-L-qfaw1'),(19,3,'XL',20,'FchsPnk-LogoTee-XL-og6uy'),(20,3,'2XL',15,'FchsPnk-LogoTee-2XL-acs4m'),(21,3,'3XL',5,'FchsPnk-LogoTee-3XL-zx60j'),(22,4,'XS',5,'MntGrn-LogoTee-XS-znm8x'),(23,4,'S',15,'MntGrn-LogoTee-S-7nu8c'),(24,4,'M',20,'MntGrn-LogoTee-M-oile9'),(25,4,'L',20,'MntGrn-LogoTee-L-z1ozp'),(26,4,'XL',20,'MntGrn-LogoTee-XL-o06dn'),(27,4,'2XL',15,'MntGrn-LogoTee-2XL-xnzl7'),(28,4,'3XL',5,'MntGrn-LogoTee-3XL-b6kwu'),(29,5,NULL,50,'Blck-INVIBucketHat-ms4m6'),(30,6,NULL,50,'Khk-INVIBucketHat-9tqe2'),(31,7,NULL,50,'Blck-INVIBeanie-yt3rq'),(32,8,NULL,50,'rng-INVIBeanie-iynnb'),(33,9,NULL,50,'Yllw-INVIBeanie-1f7qq'),(34,10,'XS',5,'GryMrnNvyBl-3-toneHeayweight-XS-gnb7m'),(35,10,'S',15,'GryMrnNvyBl-3-toneHeayweight-S-wleaa'),(36,10,'M',20,'GryMrnNvyBl-3-toneHeayweight-M-po38h'),(37,10,'L',20,'GryMrnNvyBl-3-toneHeayweight-L-hfuoi'),(38,10,'XL',20,'GryMrnNvyBl-3-toneHeayweight-XL-fxua1'),(39,10,'2XL',15,'GryMrnNvyBl-3-toneHeayweight-2XL-ymncy'),(40,10,'3XL',5,'GryMrnNvyBl-3-toneHeayweight-3XL-2xk5h'),(41,11,'XS',5,'rngWhtRylBl-3-toneHeayweight-XS-xlghl'),(42,11,'S',15,'rngWhtRylBl-3-toneHeayweight-S-9umew'),(43,11,'M',20,'rngWhtRylBl-3-toneHeayweight-M-9onlb'),(44,11,'L',20,'rngWhtRylBl-3-toneHeayweight-L-zss5k'),(45,11,'XL',20,'rngWhtRylBl-3-toneHeayweight-XL-qjef7'),(46,11,'2XL',15,'rngWhtRylBl-3-toneHeayweight-2XL-ddrab'),(47,11,'3XL',5,'rngWhtRylBl-3-toneHeayweight-3XL-x3kns'),(48,12,'XS',5,'Blck-INVIxItachiUchiha-XS-1or5g'),(49,12,'S',15,'Blck-INVIxItachiUchiha-S-8fwcr'),(50,12,'M',20,'Blck-INVIxItachiUchiha-M-r8pt8'),(51,12,'L',20,'Blck-INVIxItachiUchiha-L-2jxhi'),(52,12,'XL',20,'Blck-INVIxItachiUchiha-XL-7c9iw'),(53,12,'2XL',15,'Blck-INVIxItachiUchiha-2XL-8d5nl'),(54,12,'3XL',5,'Blck-INVIxItachiUchiha-3XL-bgzsl'),(55,13,'XS',5,'Blck-INVIxDonquixoteDoflamingo-XS-f14np'),(56,13,'S',15,'Blck-INVIxDonquixoteDoflamingo-S-r5hnw'),(57,13,'M',20,'Blck-INVIxDonquixoteDoflamingo-M-gqynf'),(58,13,'L',20,'Blck-INVIxDonquixoteDoflamingo-L-njgij'),(59,13,'XL',20,'Blck-INVIxDonquixoteDoflamingo-XL-0aj3s'),(60,13,'2XL',15,'Blck-INVIxDonquixoteDoflamingo-2XL-joi31'),(61,13,'3XL',5,'Blck-INVIxDonquixoteDoflamingo-3XL-4ylum'),(62,14,NULL,50,'Blck&Wht-INVIFaceMask-rh77g'),(63,15,'XS',5,'Wht-PeekABoo-XS-imfw1'),(64,15,'S',15,'Wht-PeekABoo-S-mw6e9'),(65,15,'M',20,'Wht-PeekABoo-M-ipw47'),(66,15,'L',20,'Wht-PeekABoo-L-o6njd'),(67,15,'XL',20,'Wht-PeekABoo-XL-w2cbh'),(68,15,'2XL',15,'Wht-PeekABoo-2XL-1btxv'),(69,15,'3XL',5,'Wht-PeekABoo-3XL-eo8lv'),(70,16,'XS',5,'Khk-PeekABoo-XS-jfszl'),(71,16,'S',15,'Khk-PeekABoo-S-vys2v'),(72,16,'M',20,'Khk-PeekABoo-M-k2bvh'),(73,16,'L',20,'Khk-PeekABoo-L-mg3si'),(74,16,'XL',20,'Khk-PeekABoo-XL-z80pu'),(75,16,'2XL',15,'Khk-PeekABoo-2XL-tn5w4'),(76,16,'3XL',5,'Khk-PeekABoo-3XL-rffmf'),(77,17,'XS',10,'Blck-INVIHoodie-XS-rfy6f'),(78,17,'S',10,'Blck-INVIHoodie-S-vd3v3'),(79,17,'M',10,'Blck-INVIHoodie-M-h09ke'),(80,17,'L',10,'Blck-INVIHoodie-L-3et08'),(81,17,'XL',10,'Blck-INVIHoodie-XL-v4w4n'),(82,17,'2XL',10,'Blck-INVIHoodie-2XL-ckjb9'),(83,17,'3XL',10,'Blck-INVIHoodie-3XL-53pav');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_table`
--

LOCK TABLES `supplier_table` WRITE;
/*!40000 ALTER TABLE `supplier_table` DISABLE KEYS */;
INSERT INTO `supplier_table` VALUES (1,'Rose Monge Mercader','raven.barrogo24@gmail.com','Pasig, Philippines','09597878465'),(2,'GRPK Prints & Merch','grpk@gmail.com','Santa Rosa, Philippines','09397631064'),(3,'JRY Printing','jry@gmail.com','Manila, Philippines','09087119079'),(4,'QualiPrints','quali@gmail.com','Pasig, Philippines','275769573');
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

-- Dump completed on 2021-12-10  0:01:23
