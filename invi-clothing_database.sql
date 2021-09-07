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
  `coverPhoto` varchar(255) NOT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_categoryID_idx` (`categoryID`),
  CONSTRAINT `fk_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_table`
--

LOCK TABLES `product_table` WRITE;
/*!40000 ALTER TABLE `product_table` DISABLE KEYS */;
INSERT INTO `product_table` VALUES (2,'INVI Face Mask','sdsd',3,250,'Black','Face Mask.png','','',''),(3,'Peek A Boo','adsad',1,450,'Khaki','Anniv - Front - Khaki.png','Anniv - Back - Khaki.png','SIZE CHART.png',''),(4,'Peek A Boo','asdsad',1,450,'White','Anniv - Front - White.png','Anniv - Back - White.png','SIZE CHART.png',''),(5,'INVI Bucket Hat','sasa',3,250,'Black','Bucket Hat - Black.png','','',''),(6,'INVI Hoodie','etret',2,1000,'Black','Hoodie.png','','',''),(7,'INVI Beanie','sdsad',3,250,'Orange','Beanie - Orange.png','','',''),(8,'3 - tone Heayweight','sadsad',1,500,'Gray - Maroon - Navy Blue','3Tone - Front - Maroon.png','3Tone - Back - Maroon.png','SIZE CHART.png',''),(9,'INVI x Itachi Uchiha','adsdas',1,500,'Black','Itachi - Front - Black.png','Itachi - Back - Black.png','SIZE CHART.png',''),(10,'INVI Warrior','dasdsad',1,450,'Golden Yellow','GOLD.jpg','GOLD 2.jpg','SIZE CHART.png',''),(11,'INVI x Donquixote Doflamingo','dqwdqw',1,500,'Black','Doffy - Front - Black.png','Doffy - Back - Black.png','SIZE CHART.png',''),(12,'Logo Tee','dsfsdfdsfds',1,450,'Fuchsia Pink','Logo Tee - Front - Pink.png','Logo Tee - Back - Pink.png','SIZE CHART.png',''),(13,'INVI Warrior','fsdfsdf',1,450,'White','INVI Warrior - Front - White.png','INVI Warrior - Back - White.png','DSC_0891.JPG','DSC_0892.JPG'),(14,'3-Tone Heavyweight','fdsfdsfsd',1,500,'Orange-White-Royal Blue','3Tone - Front - White.png','3Tone - Back - White.png','SIZE CHART.png','');
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
  `sizes` varchar(255) DEFAULT NULL,
  `stocks` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_productID_idx` (`productID`),
  CONSTRAINT `fk_productID` FOREIGN KEY (`productID`) REFERENCES `product_table` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_table`
--

LOCK TABLES `stocks_table` WRITE;
/*!40000 ALTER TABLE `stocks_table` DISABLE KEYS */;
INSERT INTO `stocks_table` VALUES (1,2,NULL,20),(2,3,'XS',1),(3,3,'S',2),(4,3,'M',10),(5,4,'XS',5),(6,4,'XL',2),(7,5,NULL,30),(8,6,'S',2),(9,6,'M',5),(10,6,'L',1),(11,7,NULL,15),(12,8,'XS',5),(13,8,'S',2),(14,8,'M',10),(15,9,'XS',3),(16,9,'S',3),(17,9,'M',15),(18,9,'L',15),(19,9,'XL',5),(20,9,'2XL',2),(21,9,'3XL',1),(22,10,'S',5),(23,10,'M',5),(24,10,'L',10),(25,10,'XL',5),(26,10,'2XL',5),(27,11,'XS',5),(28,11,'S',15),(29,11,'M',10),(30,12,'XS',5),(31,12,'S',3),(32,12,'M',10),(33,12,'L',15),(34,13,'S',5),(35,13,'M',3),(36,13,'XL',13),(37,13,'2XL',5),(38,14,'XS',58),(39,14,'2XL',45);
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

-- Dump completed on 2021-09-07 17:03:47
