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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_table`
--

LOCK TABLES `account_table` WRITE;
/*!40000 ALTER TABLE `account_table` DISABLE KEYS */;
INSERT INTO `account_table` VALUES (1,'Admin','Admin','admin@gmail.com','25d55ad283aa400af464c76d713c07ad','09959764761','admin'),(3,'Raven','Barrogo','raven@gmail.com','25d55ad283aa400af464c76d713c07ad','09123456789','user');
/*!40000 ALTER TABLE `account_table` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_table`
--

LOCK TABLES `category_table` WRITE;
/*!40000 ALTER TABLE `category_table` DISABLE KEYS */;
INSERT INTO `category_table` VALUES (1,'Tees'),(2,'Jackets'),(3,'Accessories');
/*!40000 ALTER TABLE `category_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_table`
--

DROP TABLE IF EXISTS `product_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productColor` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `minStocks` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_categoryID_idx` (`categoryID`),
  CONSTRAINT `fk_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (1,'Peek A Boo','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Decals',1,450,'Khaki','Anniv - Front - Khaki.png',0),(2,'INVI Hoodie','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Decals',2,1000,'Black','Hoodie.png',0),(3,'INVI Beanie','- 220 gsm CVC Shirt w/ necktape & sleeve label\r\n- Silkscreen print\r\n- Free Decals',3,250,'Yellow','Beanie - Yellow.png',0),(4,'INVI Face Mask','dasdasdasd',3,250,'Black','Face Mask.png',10),(5,'INVI x Itachi Uchiha','asdsadasd',1,500,'Black','Itachi - Front - Black.png',10);
/*!40000 ALTER TABLE `product_table` ENABLE KEYS */;
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
  `sizes` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_productID_idx` (`productID`),
  CONSTRAINT `fk_productID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_table`
--

LOCK TABLES `stocks_table` WRITE;
/*!40000 ALTER TABLE `stocks_table` DISABLE KEYS */;
INSERT INTO `stocks_table` VALUES (1,1,'XS',2),(2,1,'S',2),(3,1,'M',12),(4,1,'L',12),(5,1,'XL',5),(6,1,'2XL',2),(7,1,'3XL',1),(8,2,'S',11),(9,2,'M',9),(10,2,'L',10),(11,3,'Standard Size',20),(12,4,'Standard Size',30),(13,5,'XS',2),(14,5,'S',2),(15,5,'M',10),(16,5,'L',12),(17,5,'XL',5),(18,5,'2XL',2),(19,5,'3XL',1);
/*!40000 ALTER TABLE `stocks_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-17 18:03:21
