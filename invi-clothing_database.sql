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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_table`
--

LOCK TABLES `address_table` WRITE;
/*!40000 ALTER TABLE `address_table` DISABLE KEYS */;
INSERT INTO `address_table` VALUES (1,'wfaln',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(2,'9i69a',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(3,'6typm',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(4,'2wdj3',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(5,'gq3a1',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(6,'h3chq',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(7,'5qnd6',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(8,'5aox9',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(9,'ptsy2',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(10,'o86mc',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(11,'ct867',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(12,'y3fxm',269987615,'User','User','Sample Address','Sample Address','Sample city','Sample Code','Metro Manila','Philippines','09959764761','primary address',3),(13,'zwuw9',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(14,'89c0s',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(15,'gv09w',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(16,'hh31h',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(17,'roy0l',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(18,'ypx17',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(19,'ejtel',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(20,'fzid4',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(21,'z6m7q',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(22,'v3tj4',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(23,'87mzo',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(24,'33grd',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(25,'syg7j',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(26,'y5vpm',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(27,'6tymo',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(28,'33heq',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(29,'00jcw',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(30,'zkqyt',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(31,'1dwq8',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(32,'uspcp',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(33,'nuoww',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(34,'i30mi',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(35,'xyppj',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(36,'3zb3f',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(37,'wxb3i',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(38,'puu48',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(39,'mmq38',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(40,'uhzt3',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(41,'fny38',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(42,'ofbl9',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(43,'fc71f',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2),(44,'qv9ii',509009063,'Raven','Barrogo','47 A. Mabini St. Manggahan','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costing_table`
--

LOCK TABLES `costing_table` WRITE;
/*!40000 ALTER TABLE `costing_table` DISABLE KEYS */;
INSERT INTO `costing_table` VALUES (1,1,3,50,130,50,60,50,0,0,377,18850,450,0,450,73,0,73),(2,1,2,50,130,50,60,50,0,0,377,18850,450,0,450,73,0,73),(3,1,1,50,130,50,60,50,0,0,377,18850,450,0,450,73,0,73),(4,2,5,50,90,50,30,50,0,0,313,15650,450,50,400,87,0,87),(5,2,4,50,90,50,30,50,0,0,313,15650,450,50,400,87,0,87),(6,2,3,50,90,50,30,50,0,0,313,15650,450,50,400,87,0,87),(7,2,2,50,90,50,30,50,0,0,313,15650,450,50,400,87,0,87),(8,2,1,50,90,50,30,50,0,0,313,15650,450,50,400,87,0,87),(9,3,8,50,75,50,0,0,0,0,285,14250,500,0,500,215,0,215),(10,3,7,50,75,50,0,0,0,0,285,14250,500,0,500,215,0,215),(11,3,6,50,75,50,0,0,0,0,285,14250,500,0,500,215,0,215),(12,3,4,50,75,50,0,0,0,0,285,14250,500,0,500,215,0,215),(13,3,3,50,75,50,0,0,0,0,285,14250,500,0,500,215,0,215),(14,3,9,50,75,50,0,0,0,0,285,14250,500,0,500,215,0,215),(15,4,4,90,75,90,0,0,0,0,162,14580,250,0,250,88,0,88),(16,4,8,90,75,90,0,0,0,0,162,14580,250,0,250,88,0,88),(17,4,10,90,75,90,0,0,0,0,162,14580,250,0,250,88,0,88),(18,5,4,100,75,100,0,0,0,0,162,16200,250,0,250,88,0,88),(19,5,8,100,75,100,0,0,0,0,162,16200,250,0,250,88,0,88),(20,5,11,100,75,100,0,0,0,0,162,16200,250,0,250,88,0,88),(21,6,6,50,120,50,40,50,0,0,351,17550,500,0,500,149,0,149),(22,6,4,50,120,50,40,50,0,0,351,17550,500,0,500,149,0,149),(23,6,3,50,120,50,40,50,0,0,351,17550,500,0,500,149,0,149),(24,6,1,50,120,50,40,50,0,0,351,17550,500,0,500,149,0,149),(25,7,6,50,130,50,50,50,0,0,371,18550,500,0,500,129,0,129),(26,7,4,50,130,50,50,50,0,0,371,18550,500,0,500,129,0,129),(27,7,3,50,130,50,50,50,0,0,371,18550,500,0,500,129,0,129),(28,7,1,50,130,50,50,50,0,0,371,18550,500,0,500,129,0,129);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorymaterial_table`
--

LOCK TABLES `inventorymaterial_table` WRITE;
/*!40000 ALTER TABLE `inventorymaterial_table` DISABLE KEYS */;
INSERT INTO `inventorymaterial_table` VALUES (1,1,60,'2021-12-18 14:08:35'),(2,2,50,'2021-12-18 14:08:41'),(3,8,100,'2021-12-18 14:15:37'),(4,8,90,'2021-12-18 14:17:37'),(5,4,200,'2021-12-18 14:19:21'),(6,6,100,'2021-12-18 14:21:34'),(7,1,40,'2021-12-18 14:22:03'),(8,1,50,'2021-12-18 14:24:02'),(9,3,200,'2021-12-18 14:24:07');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryproduct_table`
--

LOCK TABLES `inventoryproduct_table` WRITE;
/*!40000 ALTER TABLE `inventoryproduct_table` DISABLE KEYS */;
INSERT INTO `inventoryproduct_table` VALUES (1,7,57,10,'2021-12-18 15:02:56'),(2,3,33,10,'2021-12-18 15:03:37'),(3,1,1,7,'2021-12-18 15:04:01');
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
  `coverPhoto` varchar(255) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `sizeGuide` varchar(255) DEFAULT NULL,
  `availability` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_categoryID_idx` (`categoryID`),
  CONSTRAINT `fk_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (1,1,'INVI Warrior','INVInvicible Warrior (JAPANESE ART INSPIRED)\r\n220 gsm CVC shirt w/ necktape\r\nSilkscreen print\r\nFree sticker','INVI Warrior - Front - White.png','INVI Warrior - Back - White.png','INVI Warrior - Front - Golden Yellow.png','INVI Warrior - Back - Golden Yellow.png','SIZE CHART.jpg','Available'),(2,1,'Logo Tee','LOGO TEE\r\n220 gsm CVC Shirt w/ necktape & sleeve label\r\nSilkscreen print\r\nFree Sticker\r\n\r\n#Bestinthebeastness','Logo Tee - Front - Pink.png','Logo Tee - Back - Pink.png','Logo Tee - Front - Green.png','Logo Tee - Back - Green.png','','Available'),(3,1,'3 - tone Heayweight','3 - TONE HEAVYWEIGHT OVERSIZED SHIRT\r\n- 220 gsm CVC Shirt w/ Necktape & Sleeve Label\r\n- Digitally Embroidered\r\n- With Free 4 Stickers','3Tone - Front - Maroon.png','3Tone - Back - Maroon.png','3Tone - Front - White.png','3Tone - Back - White.png','SIZE CHART.jpg','Available'),(4,3,'INVI Beanie','OG ⚡️NVI LOGO BEANIE\r\n - Available Colors (Black, Khaki)\r\n - Digitally Embroidered\r\n -  With Free Sticker','Beanie - Orange.png','Beanie - Yellow.png','Beanie - Black.png','','','Available'),(5,3,'INVI Bucket Hat','OG ⚡️NVI LOGO REVERSIBLE BUCKET HAT\r\n- Available Colors (Black, Khaki)\r\n- Digitally Embroidered\r\n- With Free Sticker','Bucket Hat - Khaki.png','Bucket Hat - Black.png','','','','Available'),(6,1,'INVI x Itachi Uchiha','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Stickers','Itachi - Front - Black.png','Itachi - Back - Black.png','','','SIZE CHART.jpg','Available'),(7,1,'INVI x Doffy','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Stickers','Doffy - Front - Black.png','Doffy - Back - Black.png','','','','Available');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawmaterials_table`
--

LOCK TABLES `rawmaterials_table` WRITE;
/*!40000 ALTER TABLE `rawmaterials_table` DISABLE KEYS */;
INSERT INTO `rawmaterials_table` VALUES (1,'Plain Shirt',175,50,1),(2,'Sticker',7,50,4),(3,'Necktape',5,200,3),(4,'Sleeve Label',3,200,3),(5,'Hangtag',3,50,4),(6,'Sticker hangtag',8,50,2),(7,'Die Cut Sticker',5,50,2),(8,'Strips Stickers',4,50,2),(9,'3-tone Shirt',185,50,1),(10,'Beanie',80,100,1),(11,'Bucket Hat',80,100,1);
/*!40000 ALTER TABLE `rawmaterials_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_table`
--

DROP TABLE IF EXISTS `return_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `return_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `returnOrderID` varchar(255) NOT NULL,
  `returnSku` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `returnImg` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_userID_idx` (`userID`),
  CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_table`
--

LOCK TABLES `return_table` WRITE;
/*!40000 ALTER TABLE `return_table` DISABLE KEYS */;
INSERT INTO `return_table` VALUES (1,'12345','asdasd','Broken Item',2,'','Doffy - Front - Black.png',2,'Rejected'),(2,'nuoww','Wht-INVIWarrior-M-w1ezw','Broken Item',1,'','INVI Warrior - Front - White.png',2,'Accepted'),(3,'uhzt3','MntGrn-LogoTee-2XL-l9czd','Broken Item',2,'','Logo Tee - Front - Green.png',2,'Accepted');
/*!40000 ALTER TABLE `return_table` ENABLE KEYS */;
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
  KEY `fk_acctID_idx` (`accountID`),
  KEY `fk_stockID_idx` (`stockID`),
  CONSTRAINT `fk_acctID` FOREIGN KEY (`accountID`) REFERENCES `account_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prodID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_stockID` FOREIGN KEY (`stockID`) REFERENCES `stocks_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_table`
--

LOCK TABLES `sales_table` WRITE;
/*!40000 ALTER TABLE `sales_table` DISABLE KEYS */;
INSERT INTO `sales_table` VALUES (1,'nuoww',1,3,4,'Express Delivery',200,'Cash on Delivery (COD)',2900,2,'Paid','Delivered','2021-01-18 14:27:26',509009063),(2,'nuoww',1,11,2,'Express Delivery',200,'Cash on Delivery (COD)',2900,2,'Paid','Delivered','2021-01-18 14:27:26',509009063),(3,'i30mi',3,37,3,'Standard Delivery',100,'Cash on Delivery (COD)',1600,2,'Paid','Delivered','2021-01-18 14:29:48',509009063),(4,'xyppj',4,43,4,'Express Delivery',200,'Cash on Delivery (COD)',1950,2,'Paid','Delivered','2021-02-18 14:31:35',509009063),(5,'xyppj',4,45,3,'Express Delivery',200,'Cash on Delivery (COD)',1950,2,'Paid','Delivered','2021-02-18 14:31:35',509009063),(6,'3zb3f',5,46,2,'Standard Delivery',100,'Cash on Delivery (COD)',2600,2,'Paid','Delivered','2021-02-18 14:35:48',509009063),(7,'3zb3f',5,47,8,'Standard Delivery',100,'Cash on Delivery (COD)',2600,2,'Paid','Delivered','2021-02-18 14:35:48',509009063),(8,'wxb3i',2,17,6,'Express Delivery',200,'Cash on Delivery (COD)',4600,2,'Paid','Delivered','2021-03-18 14:38:30',509009063),(9,'wxb3i',6,53,4,'Express Delivery',200,'Cash on Delivery (COD)',4600,2,'Paid','Delivered','2021-03-18 14:38:30',509009063),(10,'puu48',3,32,10,'Standard Delivery',100,'Cash on Delivery (COD)',5100,2,'Paid','Delivered','2021-04-18 14:39:53',509009063),(11,'mmq38',7,57,10,'Standard Delivery',100,'Cash on Delivery (COD)',5100,2,'Paid','Delivered','2021-05-18 14:40:40',509009063),(12,'uhzt3',2,27,4,'Express Delivery',200,'Cash on Delivery (COD)',3050,2,'Paid','Delivered','2021-07-18 14:41:34',509009063),(13,'uhzt3',4,44,5,'Express Delivery',200,'Cash on Delivery (COD)',3050,2,'Paid','Delivered','2021-07-18 14:41:34',509009063),(14,'fny38',4,43,10,'Standard Delivery',100,'Cash on Delivery (COD)',5350,2,'Paid','Delivered','2021-08-18 14:42:20',509009063),(15,'fny38',5,47,11,'Standard Delivery',100,'Cash on Delivery (COD)',5350,2,'Paid','Delivered','2021-08-18 14:42:20',509009063),(16,'ofbl9',7,60,4,'Express Delivery',200,'Cash on Delivery (COD)',3200,2,'Paid','Delivered','2021-09-18 14:43:07',509009063),(17,'ofbl9',7,57,2,'Express Delivery',200,'Cash on Delivery (COD)',3200,2,'Paid','Delivered','2021-09-18 14:43:07',509009063),(18,'fc71f',4,44,5,'Express Delivery',200,'Cash on Delivery (COD)',3700,2,'Paid','Delivered','2021-10-18 14:43:55',509009063),(19,'fc71f',1,1,5,'Express Delivery',200,'Cash on Delivery (COD)',3700,2,'Paid','Delivered','2021-10-18 14:43:56',509009063),(20,'qv9ii',5,46,12,'Express Delivery',200,'Cash on Delivery (COD)',7200,2,'Paid','Delivered','2021-11-18 14:44:51',509009063),(21,'qv9ii',3,33,7,'Express Delivery',200,'Cash on Delivery (COD)',7200,2,'Paid','Delivered','2021-11-18 14:44:51',509009063),(22,'qv9ii',7,55,1,'Express Delivery',200,'Cash on Delivery (COD)',7200,2,'Paid','Delivered','2021-11-18 14:44:51',509009063);
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
  `variantID` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_productID_idx` (`productID`),
  KEY `fk_variantID_idx` (`variantID`),
  CONSTRAINT `fk_itemID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_variantID` FOREIGN KEY (`variantID`) REFERENCES `variation_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_table`
--

LOCK TABLES `stocks_table` WRITE;
/*!40000 ALTER TABLE `stocks_table` DISABLE KEYS */;
INSERT INTO `stocks_table` VALUES (1,1,1,'XS',5,'Wht-INVIWarrior-XS-757rt'),(2,1,1,'S',7,'Wht-INVIWarrior-S-hwi79'),(3,1,1,'M',12,'Wht-INVIWarrior-M-w1ezw'),(4,1,1,'L',12,'Wht-INVIWarrior-L-sg873'),(5,1,1,'XL',7,'Wht-INVIWarrior-XL-zj7vq'),(6,1,1,'2XL',5,'Wht-INVIWarrior-2XL-nb7g5'),(7,1,1,'3XL',2,'Wht-INVIWarrior-3XL-5yj98'),(8,1,2,'XS',2,'GldnYllw-INVIWarrior-XS-whmta'),(9,1,2,'S',5,'GldnYllw-INVIWarrior-S-t971i'),(10,1,2,'M',7,'GldnYllw-INVIWarrior-M-fmxdj'),(11,1,2,'L',12,'GldnYllw-INVIWarrior-L-x6t8q'),(12,1,2,'XL',12,'GldnYllw-INVIWarrior-XL-atlxk'),(13,1,2,'2XL',7,'GldnYllw-INVIWarrior-2XL-keocl'),(14,1,2,'3XL',5,'GldnYllw-INVIWarrior-3XL-bnq5r'),(15,2,3,'XS',5,'FchsPnk-LogoTee-XS-i32up'),(16,2,3,'S',7,'FchsPnk-LogoTee-S-7xrsk'),(17,2,3,'M',12,'FchsPnk-LogoTee-M-hxv1n'),(18,2,3,'L',12,'FchsPnk-LogoTee-L-wg108'),(19,2,3,'XL',7,'FchsPnk-LogoTee-XL-3rt5z'),(20,2,3,'2XL',5,'FchsPnk-LogoTee-2XL-j3j4f'),(21,2,3,'3XL',2,'FchsPnk-LogoTee-3XL-iql9s'),(22,2,4,'XS',2,'MntGrn-LogoTee-XS-td9zh'),(23,2,4,'S',5,'MntGrn-LogoTee-S-c40zv'),(24,2,4,'M',7,'MntGrn-LogoTee-M-zc6db'),(25,2,4,'L',12,'MntGrn-LogoTee-L-1sywj'),(26,2,4,'XL',12,'MntGrn-LogoTee-XL-lae9k'),(27,2,4,'2XL',7,'MntGrn-LogoTee-2XL-l9czd'),(28,2,4,'3XL',5,'MntGrn-LogoTee-3XL-boqtb'),(29,3,5,'XS',5,'GryMrnNvyBl-3-toneHeayweight-XS-fvnok'),(30,3,5,'S',7,'GryMrnNvyBl-3-toneHeayweight-S-zn6kw'),(31,3,5,'M',12,'GryMrnNvyBl-3-toneHeayweight-M-7sr2e'),(32,3,5,'L',12,'GryMrnNvyBl-3-toneHeayweight-L-tqyv3'),(33,3,5,'XL',7,'GryMrnNvyBl-3-toneHeayweight-XL-53eer'),(34,3,5,'2XL',5,'GryMrnNvyBl-3-toneHeayweight-2XL-y75oa'),(35,3,5,'3XL',2,'GryMrnNvyBl-3-toneHeayweight-3XL-6smjf'),(36,3,6,'XS',2,'rngWhtRylBl-3-toneHeayweight-XS-eqp4s'),(37,3,6,'S',5,'rngWhtRylBl-3-toneHeayweight-S-8np3m'),(38,3,6,'M',7,'rngWhtRylBl-3-toneHeayweight-M-vcuuo'),(39,3,6,'L',12,'rngWhtRylBl-3-toneHeayweight-L-kq431'),(40,3,6,'XL',12,'rngWhtRylBl-3-toneHeayweight-XL-gastg'),(41,3,6,'2XL',7,'rngWhtRylBl-3-toneHeayweight-2XL-yj7fb'),(42,3,6,'3XL',5,'rngWhtRylBl-3-toneHeayweight-3XL-sofc2'),(43,4,7,NULL,35,'rng-INVIBeanie-qpx6e'),(44,4,8,NULL,25,'Yllw-INVIBeanie-fwf33'),(45,4,9,NULL,20,'Blck-INVIBeanie-xzrvp'),(46,5,10,NULL,50,'Khk-INVIBucketHat-w867j'),(47,5,11,NULL,50,'Blck-INVIBucketHat-km4qq'),(48,6,12,'XS',5,'Blck-INVIxItachiUchiha-XS-cg0mf'),(49,6,12,'S',7,'Blck-INVIxItachiUchiha-S-4lk83'),(50,6,12,'M',12,'Blck-INVIxItachiUchiha-M-f06a6'),(51,6,12,'L',12,'Blck-INVIxItachiUchiha-L-qeiha'),(52,6,12,'XL',7,'Blck-INVIxItachiUchiha-XL-4lqm8'),(53,6,12,'2XL',5,'Blck-INVIxItachiUchiha-2XL-kd98f'),(54,6,12,'3XL',2,'Blck-INVIxItachiUchiha-3XL-8mqgn'),(55,7,13,'XS',5,'Blck-INVIxDoffy-XS-dr3m4'),(56,7,13,'S',7,'Blck-INVIxDoffy-S-tbbp2'),(57,7,13,'M',12,'Blck-INVIxDoffy-M-lpg5j'),(58,7,13,'L',12,'Blck-INVIxDoffy-L-gn4dp'),(59,7,13,'XL',7,'Blck-INVIxDoffy-XL-t1zg2'),(60,7,13,'2XL',5,'Blck-INVIxDoffy-2XL-4tb4r'),(61,7,13,'3XL',2,'Blck-INVIxDoffy-3XL-1vyhg');
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

--
-- Table structure for table `variation_table`
--

DROP TABLE IF EXISTS `variation_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variation_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `variantName` varchar(255) NOT NULL,
  `variantImage` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `productID_idx` (`productID`),
  CONSTRAINT `productID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variation_table`
--

LOCK TABLES `variation_table` WRITE;
/*!40000 ALTER TABLE `variation_table` DISABLE KEYS */;
INSERT INTO `variation_table` VALUES (1,1,'White','INVI Warrior - Front - White.png'),(2,1,'Golden Yellow','INVI Warrior - Front - Golden Yellow.png'),(3,2,'Fuchsia Pink','Logo Tee - Front - Pink.png'),(4,2,'Mint Green','Logo Tee - Front - Green.png'),(5,3,'Gray-Maroon-Navy Blue','3Tone - Front - Maroon.png'),(6,3,'Orange-White-Royal Blue','3Tone - Front - White.png'),(7,4,'Orange','Beanie - Orange.png'),(8,4,'Yellow','Beanie - Yellow.png'),(9,4,'Black','Beanie - Black.png'),(10,5,'Khaki','Bucket Hat - Khaki.png'),(11,5,'Black','Bucket Hat - Black.png'),(12,6,'Black','Itachi - Front - Black.png'),(13,7,'Black','Doffy - Front - Black.png');
/*!40000 ALTER TABLE `variation_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-18 15:06:55
