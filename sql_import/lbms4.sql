-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: lms
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@gmail.com','%AC$vv$Q7$40bs3S','09157689852');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (102,'M D Guptaa'),(103,'Chetan Bhagat'),(104,'Munshi Prem Chand'),(108,'Harper Lee'),(109,'Gabriel García Márquez'),(110,'Albert Camus'),(111,'Hermann Hesse'),(112,'Khaled Hosseini'),(113,'Yukio Mishima'),(114,'Jorge Luis Borges'),(115,'Milan Kundera'),(116,'Haruki Murakami'),(117,'Tove Jansson'),(118,'Naguib Mahfouz'),(119,'Orhan Pamuk'),(120,'Isabel Allende'),(121,'Vladimir Nabokov'),(122,'Julio Cortázar'),(123,'Chinua Achebe'),(124,'Arundhati Roy'),(125,'Margaret Atwood'),(126,'Roald Dahl'),(127,'Philip Roth'),(128,'Mario Vargas Llosa');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `book_price` int(11) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `book_no` (`book_no`),
  KEY `author_id` (`author_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  CONSTRAINT `books_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Software engineering',102,1,4518,270),(2,'Data structure',103,2,6541,300),(9,'The Great Gatsby',104,5,3,250),(23,'To Kill a Mockingbird',108,5,3478,500),(24,'Introduction to Computer Science',102,1,1001,200),(25,'Artificial Intelligence: A Modern Approach',102,1,1002,250),(26,'The Algorithm Design Manual',102,1,1003,300),(27,'Harry Potter and the Philosopher\'s Stone',104,2,1004,150),(28,'Harry Potter and the Chamber of Secrets',104,2,1005,150),(29,'Harry Potter and the Prisoner of Azkaban',104,2,1006,150),(30,'To Kill a Mockingbird',108,2,1007,180),(31,'One Hundred Years of Solitude',109,5,1008,200),(32,'Love in the Time of Cholera',109,5,1009,220),(33,'The Stranger',110,5,1010,170),(34,'The Myth of Sisyphus',110,5,1011,180),(35,'Siddhartha',111,5,1012,160),(36,'The Kite Runner',112,5,1013,210),(37,'A Thousand Splendid Suns',112,5,1014,220),(38,'The Sailor Who Fell from Grace with the Sea',113,5,1015,190),(39,'Labyrinths',114,5,1016,230),(40,'The Unbearable Lightness of Being',115,5,1017,240),(41,'Norwegian Wood',116,5,1018,200),(42,'The Moomins',117,5,1019,150),(43,'Midaq Alley',118,5,1020,190),(44,'My Name Is Red',119,5,1021,220),(45,'The House of the Spirits',120,5,1022,230),(46,'Lolita',121,5,1023,200),(47,'Hopscotch',122,5,1024,240),(48,'Things Fall Apart',123,5,1025,180),(49,'The God of Small Things',124,5,1026,210),(50,'The Handmaid\'s Tale',125,5,1027,220),(51,'Charlie and the Chocolate Factory',126,5,1028,170),(52,'American Pastoral',127,5,1029,240),(53,'The Feast of the Goat',128,5,1030,220);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Computer Science Engineering'),(2,'Novel'),(4,'Motivational'),(5,'Story'),(10,'Architecture'),(11,'Fantasy'),(12,'Science Fiction'),(13,'Thriller'),(14,'Biography'),(15,'Historical Fiction'),(16,'Romance'),(17,'Self-Help'),(18,'Mystery'),(19,'Horror'),(20,'Poetry');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issued_books`
--

DROP TABLE IF EXISTS `issued_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issued_books` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `book_no` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  PRIMARY KEY (`s_no`),
  KEY `book_no` (`book_no`),
  CONSTRAINT `issued_books_ibfk_1` FOREIGN KEY (`book_no`) REFERENCES `books` (`book_no`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issued_books`
--

LOCK TABLES `issued_books` WRITE;
/*!40000 ALTER TABLE `issued_books` DISABLE KEYS */;
INSERT INTO `issued_books` VALUES (1,6541,'Data structure','D S Gupta',4,1,'2024-01-01 00:00:00'),(27,3,'The Great Gatsby','Munshi Prem Chand',5,1,'2024-02-06 23:42:59'),(28,3478,'To Kill a Mockingbird','Harper Lee',4,1,'2024-02-06 23:45:46'),(29,1001,'Introduction to Computer Science','M D Guptaa',4,1,'2024-01-15 10:00:00'),(30,1002,'Artificial Intelligence: A Modern Approach','M D Guptaa',5,1,'2024-01-16 11:30:00'),(31,1003,'The Algorithm Design Manual','M D Guptaa',6,1,'2024-01-17 13:45:00'),(32,1004,'Harry Potter and the Philosopher\'s Stone','Munshi Prem Chand',7,1,'2024-01-18 14:20:00'),(33,1005,'Harry Potter and the Chamber of Secrets','Munshi Prem Chand',8,1,'2024-01-19 15:10:00'),(34,1006,'Harry Potter and the Prisoner of Azkaban','Munshi Prem Chand',9,1,'2024-01-20 09:30:00'),(35,1007,'To Kill a Mockingbird','Harper Lee',10,1,'2024-01-21 11:00:00'),(36,1008,'One Hundred Years of Solitude','Gabriel García Márquez',11,1,'2024-01-22 12:15:00'),(37,1009,'Love in the Time of Cholera','Gabriel García Márquez',12,1,'2024-01-23 14:45:00'),(38,1010,'The Stranger','Albert Camus',13,1,'2024-01-24 16:30:00');
/*!40000 ALTER TABLE `issued_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Username','user@gmail.com','laVKu^16%D58tZYS','21474836442','XYZ Coloney, PQR Nagar , Jaipur'),(5,'John Renzo Espin Erfelo','johnrenzoerfelp@gmail.com','brqvj4H1!Yn*5zEM','09205035489','3RD FLR., 1401 SAN DIEGO ST. SAMPALOC, MANILA'),(6,'Angelo Yoba','angelo@gmail.com','96I0u2yYPil^8Q5d','09564736589','Taguig City'),(7,'Anna Reyes','annareyes@gmail.com','Anna1234','09101234567','Quezon City, Philippines'),(8,'John Santos','johnsantos@gmail.com','John1234','09112345678','Manila, Philippines'),(9,'Ella Cruz','ellacruz@gmail.com','Ella1234','09123456789','Makati City, Philippines'),(10,'Michael Lim','michaellim@gmail.com','Michael123','09134567890','Cebu City, Philippines'),(11,'Sofia Gonzales','sofiagonzales@gmail.com','Sofia123','09145678901','Davao City, Philippines'),(12,'Jacob Cruz','jacobcruz@gmail.com','Jacob1234','09156789012','Pasig City, Philippines'),(13,'Mia Tan','miatan@gmail.com','Mia1234','09167890123','Quezon City, Philippines'),(14,'Liam Garcia','liamgarcia@gmail.com','Liam1234','09178901234','Manila, Philippines'),(15,'Chloe Santos','chloesantos@gmail.com','Chloe1234','09189012345','Makati City, Philippines'),(16,'Noah Cruz','noahcruz@gmail.com','Noah1234','09190123456','Cebu City, Philippines'),(17,'Ava Reyes','avareyes@gmail.com','Ava1234','09201234567','Davao City, Philippines'),(18,'Ethan Tan','ethantan@gmail.com','Ethan1234','09212345678','Manila, Philippines'),(19,'Emily Lim','emilylim@gmail.com','Emily1234','09223456789','Quezon City, Philippines'),(20,'Mason Garcia','masongarcia@gmail.com','Mason1234','09234567890','Pasig City, Philippines'),(21,'Amelia Cruz','ameliacruz@gmail.com','Amelia1234','09245678901','Makati City, Philippines'),(22,'James Santos','jamessantos@gmail.com','James1234','09256789012','Cebu City, Philippines'),(23,'Olivia Tan','oliviatan@gmail.com','Olivia1234','09267890123','Davao City, Philippines'),(24,'Lucas Reyes','lucasreyes@gmail.com','Lucas1234','09278901234','Manila, Philippines'),(25,'Aria Garcia','ariagarcia@gmail.com','Aria1234','09289012345','Quezon City, Philippines'),(26,'Liam Santos','liamsantos@gmail.com','Liam1234','09290123456','Pasig City, Philippines');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-07  0:34:07
