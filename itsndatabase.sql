-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: itsn
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `confirmation_number` bigint NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `roomID` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `numberOfPeople` int DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`confirmation_number`),
  KEY `username` (`username`),
  KEY `roomID` (`roomID`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (987890,'jsmith','4','2020-11-25','02:30:00',7,'John');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room` (
  `roomID` varchar(20) NOT NULL,
  `roomSize` varchar(20) DEFAULT NULL,
  `roomOccupancy` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES ('1','small','25'),('10','small','25'),('11','small','25'),('12','small','25'),('13','small','25'),('14','small','25'),('15','small','25'),('16','small','25'),('165','large','165'),('17','small','25'),('18','small','25'),('19','small','25'),('2','small','25'),('20','small','25'),('21','large','90'),('22','large','90'),('220','large','220'),('23','large','90'),('24','large','90'),('25','large','90'),('26','large','90'),('27','large','90'),('28','large','90'),('29','large','90'),('3','small','25'),('30','large','90'),('31','large','90'),('32','large','90'),('33','large','90'),('34','large','90'),('35','large','90'),('36','large','165'),('37','large','165'),('38','large','165'),('39','large','165'),('4','small','25'),('40','large','165'),('41','large','260'),('42','large','260'),('43','large','260'),('5','small','25'),('6','small','25'),('7','small','25'),('8','small','25'),('9','small','25'),('90','small','90');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `passwrd` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  `studentID` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('jsmith','password1','jsmith@atu.edu',5015555555,'T0982394','John Smith');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-29 22:02:52
