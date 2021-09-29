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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_table`
--

LOCK TABLES `account_table` WRITE;
/*!40000 ALTER TABLE `account_table` DISABLE KEYS */;
INSERT INTO `account_table` VALUES (1,'Admin','Admin','admin@gmail.com','25d55ad283aa400af464c76d713c07ad','09959764761','admin'),(3,'Raven','Barrogo','raven@gmail.com','25d55ad283aa400af464c76d713c07ad','09123456789','user'),(5,'Raven','Barrogo','admin2@gmail.com','25d55ad283aa400af464c76d713c07ad','09959764761','admin'),(6,'User','User','user@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,'user');
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
  CONSTRAINT `fk_accountID` FOREIGN KEY (`accountID`) REFERENCES `account_table` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_table`
--

LOCK TABLES `address_table` WRITE;
/*!40000 ALTER TABLE `address_table` DISABLE KEYS */;
INSERT INTO `address_table` VALUES (8,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Metro Manila','Philippines','09959764761','primary address',3),(9,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1600','Basilan','Philippines','09959764761','',6),(10,'User','User','581 Magsaysay St. Manggahan, Pasig City','','Pasig City','1600','Eastern Samar','Philippines','09959764761','primary address',6),(11,'Raven','Barrogo','47 A. Mabini St. Manggahan, Pasig City','','Pasig City','1611','Bohol','Philippines','09959764761','primary address',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=339 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costing_table`
--

LOCK TABLES `costing_table` WRITE;
/*!40000 ALTER TABLE `costing_table` DISABLE KEYS */;
INSERT INTO `costing_table` VALUES (323,109,98,50,450,313,137),(324,109,95,50,450,313,137),(325,109,96,50,450,313,137),(326,109,97,50,450,313,137),(327,110,95,30,250,83,167),(328,110,99,30,250,83,167),(329,111,98,25,450,370,80),(330,111,96,25,450,370,80),(331,111,97,25,450,370,80),(332,112,102,50,500,357,143),(333,112,95,50,500,357,143),(334,112,96,50,500,357,143),(335,112,98,50,500,357,143),(336,112,101,50,500,357,143),(337,114,95,30,250,158,92),(338,114,100,30,250,158,92);
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
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorymaterial_table`
--

LOCK TABLES `inventorymaterial_table` WRITE;
/*!40000 ALTER TABLE `inventorymaterial_table` DISABLE KEYS */;
INSERT INTO `inventorymaterial_table` VALUES (95,98,50,'2021-09-21 16:43:47'),(96,99,10,'2021-09-21 16:47:17'),(97,97,25,'2021-09-22 00:07:54'),(98,98,25,'2021-09-22 03:24:39'),(99,102,10,'2021-09-29 15:32:57');
/*!40000 ALTER TABLE `inventorymaterial_table` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (109,1,'Peek A Boo','dsfdsf','White','Anniv - Front - White.png','Anniv - Back - White.png','','','SIZE CHART.png'),(110,3,'INVI Face Mask','dsadas','Black','Face Mask.png','','','',''),(111,1,'INVI Warrior','dasd','White','INVI Warrior - Front - White.png','INVI Warrior - Back - White.png','hero-img.png','hero-img2.png',''),(112,1,'INVI x Itachi Uchiha','asdsad','Black','Itachi - Front - Black.png','Itachi - Back - Black.png','','','SIZE CHART.png'),(114,3,'INVI Bucket Hat','dsad','Black','Bucket Hat - Black.png','','','','');
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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawmaterials_table`
--

LOCK TABLES `rawmaterials_table` WRITE;
/*!40000 ALTER TABLE `rawmaterials_table` DISABLE KEYS */;
INSERT INTO `rawmaterials_table` VALUES (95,'Sleeve Label',3,200,10),(96,'Necktape',5,200,10),(97,'White Shirt',175,50,9),(98,'Decals',10,50,11),(99,'Face Mask',30,100,13),(100,'Black Bucket Hat',80,30,13),(101,'Black Shirt',175,50,9),(102,'Hangtag',4,50,11);
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
  PRIMARY KEY (`ID`),
  KEY `fk_itemID_idx` (`productID`),
  KEY `fk_stockID_idx` (`stockID`),
  KEY `fk_acctID_idx` (`accountID`),
  CONSTRAINT `fk_acctID` FOREIGN KEY (`accountID`) REFERENCES `account_table` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prodID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_stockID` FOREIGN KEY (`stockID`) REFERENCES `stocks_table` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_table`
--

LOCK TABLES `sales_table` WRITE;
/*!40000 ALTER TABLE `sales_table` DISABLE KEYS */;
INSERT INTO `sales_table` VALUES (14,109,204,3,'Standard Delivery',100,'Cash on Delivery (COD)',4950,3,'Pending','Processing'),(15,114,224,1,'Standard Delivery',100,'Cash on Delivery (COD)',4950,3,'Pending','Processing'),(16,112,220,5,'Standard Delivery',100,'Cash on Delivery (COD)',4950,3,'Pending','Processing'),(17,110,209,3,'Standard Delivery',100,'Cash on Delivery (COD)',4950,3,'Pending','Processing'),(18,109,202,1,'Standard Delivery',180,'PayPal',880,6,'Fulfilled','Processing'),(19,114,224,1,'Standard Delivery',180,'PayPal',880,6,'Fulfilled','Processing'),(20,112,219,2,'Standard Delivery',180,'Cash on Delivery (COD)',1180,6,'Pending','Processing'),(21,112,218,1,'Standard Delivery',180,'Cash on Delivery (COD)',680,3,'Pending','Processing');
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
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_table`
--

LOCK TABLES `stocks_table` WRITE;
/*!40000 ALTER TABLE `stocks_table` DISABLE KEYS */;
INSERT INTO `stocks_table` VALUES (202,109,'XS',1),(203,109,'S',10),(204,109,'M',15),(205,109,'L',12),(206,109,'XL',7),(207,109,'2XL',2),(208,109,'3XL',2),(209,110,NULL,30),(210,111,'XS',0),(211,111,'S',2),(212,111,'M',10),(213,111,'L',10),(214,111,'XL',2),(215,111,'2XL',1),(216,111,'3XL',0),(217,112,'XS',2),(218,112,'S',7),(219,112,'M',15),(220,112,'L',15),(221,112,'XL',7),(222,112,'2XL',2),(223,112,'3XL',0),(224,114,NULL,30);
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
  `supplierAddress` varchar(255) NOT NULL,
  `supplierContactNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_table`
--

LOCK TABLES `supplier_table` WRITE;
/*!40000 ALTER TABLE `supplier_table` DISABLE KEYS */;
INSERT INTO `supplier_table` VALUES (9,'Rose Monge Mercader','Pasig, Philippines','09597878465'),(10,'JRY Printing','Manila, Philippines','09087119079'),(11,'GRPK Prints & Merch','Santa Rosa, Philippines','09397631064'),(13,'QualiPrints','Pasig, Philippines','275769573');
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

-- Dump completed on 2021-09-29 18:39:24
