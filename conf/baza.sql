CREATE DATABASE  IF NOT EXISTS `epshop_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci */;
USE `epshop_db`;
-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: epshop_db
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Kruh',1.20,'Navaden bel kruh','https://static01.nyt.com/images/2017/02/16/dining/16COOKING-NOKNEADBREAD1/16COOKING-NOKNEADBREAD1-videoSixteenByNineJumbo1600.jpg',1,'2018-01-15 13:48:57','2018-01-15 13:48:57'),(2,'Mleko',2.40,'1 liter mleka','https://trgovina.mercator.si/market/img/cache/products/4941/product_medium_image/00535776.jpg',1,'2018-01-15 13:50:55','2018-01-15 13:50:55'),(3,'Sir',1.80,'Opis sira','https://www.nzmp.com/content/nzmp/global/en/products/cheese/natural-cheese-range/egmont/_jcr_content/teaserImage.img.jpg/1472182228141.jpg',1,'2018-01-15 13:54:03','2018-01-15 13:54:03');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_10_20_133854_create_users_table',1),(2,'2017_10_20_133855_create_password_resets_table',1),(3,'2017_12_20_133853_create_zip_codes_table',1),(4,'2017_12_20_135526_alter_users_table',1),(5,'2017_12_27_142914_create_articles',1),(6,'2017_12_28_220302_create_orders_table',1),(7,'2017_12_28_220700_create_orders_articles_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `review_status` smallint(6) NOT NULL DEFAULT '0',
  `reviewed_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_reviewed_by_foreign` (`reviewed_by`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_reviewed_by_foreign` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,5,0,NULL,'2018-01-15 13:56:34','2018-01-15 13:56:34'),(2,6,1,3,'2018-01-15 13:57:24','2018-01-15 13:58:01');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_articles`
--

DROP TABLE IF EXISTS `orders_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_articles_order_id_foreign` (`order_id`),
  KEY `orders_articles_article_id_foreign` (`article_id`),
  CONSTRAINT `orders_articles_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_articles_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_articles`
--

LOCK TABLES `orders_articles` WRITE;
/*!40000 ALTER TABLE `orders_articles` DISABLE KEYS */;
INSERT INTO `orders_articles` VALUES (1,1,1,3,NULL,NULL),(2,1,2,8,NULL,NULL),(3,1,3,2,NULL,NULL),(4,2,1,1,NULL,NULL),(5,2,2,2,NULL,NULL);
/*!40000 ALTER TABLE `orders_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','seller','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_zip_code_id_foreign` (`zip_code_id`),
  CONSTRAINT `users_zip_code_id_foreign` FOREIGN KEY (`zip_code_id`) REFERENCES `zip_codes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Domen','admin@epshop.si','$2y$10$/masRP2L1OP9aa8etUqk8OEkIyAQGKoh/qGoXTlP4pI4sXOFZYWBK','051 123 456','admin','OvXRt29gY0Zn0lhLWD3CIe8cDLe7wwSpfBMvliR9Xxblj6Xf8sJHS7DcOKB0','2018-01-15 13:26:50','2018-01-15 13:26:50','Večna pot 113',199,1),(2,'Janez','Prodajalec','seller1@epshop.si','$2y$10$Y9Ri4gOYf6uXIdYbvVE8AuNwWrWqka8mFFGK9P8ChXSbf0vbMcGB2','031 123 456','seller','TAri3TWfB7QMT93Lubw7AXzlSG12Jax0EACanYm7ItFhnLygZ3cRkKt4kxsP','2018-01-15 13:29:40','2018-01-15 13:29:40','Testna ulica 1',24,1),(3,'Miha','Prodajalec','seller2@epshop.si','$2y$10$AXps6gh.du5F3aWJzlCwjemfuu0n6TKkyr.AsN2PWQpe5g0bYXRAe','041 125 678','seller','bPlNdotL3PvNF3l3QdO9ICsyRnBor3oY2P3Rj1SUEVnLmOuEbIMEoObcl4o6','2018-01-15 13:30:22','2018-01-15 13:30:22','Mihova ulica 4',72,1),(4,'Marko','Prodajalec','seller3@epshop.si','$2y$10$QQF9aeJdtre6EnQZjv7QYuWZljlhIkgiCJv6mjP8tp2N2DUuSMYWC','031 777 888','seller',NULL,'2018-01-15 13:31:33','2018-01-15 13:31:33','Markotova ulica 1222',82,1),(5,'Mojca','Novak','mojca.novak@gmail.com','$2y$10$f9NLrbYkgg/cq6yMzScnQuFyZOvXFM6udIm3wkUJLhJ5qmAfDMWje','041 555 433','customer','Ir1sY0JYxpjyzvsmI571eYcuqD9tDWYwsxhnGPeog7xhWc9OySmslQCDF5Vf','2018-01-15 13:46:00','2018-01-15 13:46:00','Ljubljanska cesta 245',202,1),(6,'Peter','Novak','peter.novak@gmail.com','$2y$10$.Tiey90HYklVgKIFj014Qu8iGFKcSQV9Zp/lKAy9ozOVtsmkN0TDi','089 123 444','customer','4hPSaRNRon9zfTpZjA2jYPJwjhBJJYs5kfUdR3ImloUhRdvKNUVlZONIeUF1','2018-01-15 13:47:22','2018-01-15 13:47:22','Ljubljanska cesta 248',15,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zip_codes`
--

DROP TABLE IF EXISTS `zip_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zip_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `postal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zip_codes_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=554 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zip_codes`
--

LOCK TABLES `zip_codes` WRITE;
/*!40000 ALTER TABLE `zip_codes` DISABLE KEYS */;
INSERT INTO `zip_codes` VALUES (1,8341,'Adlešiči'),(2,5270,'Ajdovščina'),(3,6280,'Ankaran - Ancarano'),(4,9253,'Apače'),(5,8253,'Artiče'),(6,4275,'Begunje na Gorenjskem'),(7,1382,'Begunje pri Cerknici'),(8,9231,'Beltinci'),(9,2234,'Benedikt'),(10,2345,'Bistrica ob Dravi'),(11,3256,'Bistrica ob Sotli'),(12,8259,'Bizeljsko'),(13,1223,'Blagovica'),(14,8283,'Blanca'),(15,4260,'Bled'),(16,4273,'Blejska Dobrava'),(17,9265,'Bodonci'),(18,9222,'Bogojina'),(19,4263,'Bohinjska Bela'),(20,4264,'Bohinjska Bistrica'),(21,4265,'Bohinjsko jezero'),(22,1353,'Borovnica'),(23,8294,'Boštanj'),(24,5230,'Bovec'),(25,5295,'Branik'),(26,3314,'Braslovče'),(27,5223,'Breginj'),(28,8280,'Brestanica'),(29,2354,'Bresternica'),(30,4243,'Brezje'),(31,1351,'Brezovica pri Ljubljani'),(32,8250,'Brežice'),(33,4210,'Brnik - aerodrom'),(34,8321,'Brusnice'),(35,3255,'Buče'),(36,8276,'Bučka '),(37,9261,'Cankova'),(38,3000,'Celje - dostava'),(39,3001,'Celje - poštni predali'),(40,3502,'Celje'),(41,3505,'Celje'),(42,3600,'Celje'),(43,4207,'Cerklje na Gorenjskem'),(44,8263,'Cerklje ob Krki'),(45,1380,'Cerknica'),(46,5282,'Cerkno'),(47,2236,'Cerkvenjak'),(48,2215,'Ceršak'),(49,2326,'Cirkovce'),(50,2282,'Cirkulane'),(51,5273,'Col'),(52,8251,'Čatež ob Savi'),(53,1413,'Čemšenik'),(54,5253,'Čepovan'),(55,9232,'Črenšovci'),(56,2393,'Črna na Koroškem'),(57,6275,'Črni Kal'),(58,5274,'Črni Vrh nad Idrijo'),(59,5262,'Črniče'),(60,8340,'Črnomelj'),(61,6271,'Dekani'),(62,5210,'Deskle'),(63,2253,'Destrnik'),(64,6215,'Divača'),(65,1233,'Dob'),(66,3224,'Dobje pri Planini'),(67,8257,'Dobova'),(68,1423,'Dobovec'),(69,5263,'Dobravlje'),(70,3204,'Dobrna'),(71,8211,'Dobrnič'),(72,1356,'Dobrova'),(73,9223,'Dobrovnik - Dobronak '),(74,5212,'Dobrovo v Brdih'),(75,1431,'Dol pri Hrastniku'),(76,1262,'Dol pri Ljubljani'),(77,1273,'Dole pri Litiji'),(78,1331,'Dolenja vas'),(79,8350,'Dolenjske Toplice'),(80,1230,'Domžale'),(81,2252,'Dornava'),(82,5294,'Dornberk'),(83,1319,'Draga'),(84,8343,'Dragatuš'),(85,3222,'Dramlje'),(86,2370,'Dravograd'),(87,4203,'Duplje'),(88,6221,'Dutovlje'),(89,8361,'Dvor'),(90,2343,'Fala'),(91,9208,'Fokovci'),(92,2313,'Fram'),(93,3213,'Frankolovo'),(94,1274,'Gabrovka'),(95,8254,'Globoko'),(96,5275,'Godovič'),(97,4204,'Golnik'),(98,3303,'Gomilsko'),(99,4224,'Gorenja vas'),(100,3263,'Gorica pri Slivnici'),(101,2272,'Gorišnica'),(102,9250,'Gornja Radgona'),(103,3342,'Gornji Grad'),(104,4282,'Gozd Martuljek'),(105,6272,'Gračišče'),(106,9264,'Grad'),(107,8332,'Gradac'),(108,1384,'Grahovo'),(109,5242,'Grahovo ob Bači'),(110,5251,'Grgar'),(111,3302,'Griže'),(112,3231,'Grobelno'),(113,1290,'Grosuplje'),(114,2288,'Hajdina'),(115,8362,'Hinje'),(116,2311,'Hoče'),(117,9205,'Hodoš - Hodos'),(118,1354,'Horjul'),(119,1372,'Hotedršica'),(120,1430,'Hrastnik'),(121,6225,'Hruševje'),(122,4276,'Hrušica'),(123,5280,'Idrija'),(124,1292,'Ig'),(125,6250,'Ilirska Bistrica'),(126,1295,'Ivančna Gorica'),(127,2259,'Ivanjkovci'),(128,1411,'Izlake'),(129,6310,'Izola - Isola'),(130,2222,'Jakobski Dol'),(131,2221,'Jarenina'),(132,6254,'Jelšane'),(133,4270,'Jesenice'),(134,8261,'Jesenice na Dolenjskem'),(135,3273,'Jurklošter'),(136,2223,'Jurovski Dol'),(137,2256,'Juršinci'),(138,5214,'Kal nad Kanalom'),(139,3233,'Kalobje'),(140,4246,'Kamna Gorica'),(141,2351,'Kamnica'),(142,1241,'Kamnik'),(143,5213,'Kanal'),(144,8258,'Kapele'),(145,2362,'Kapla'),(146,2325,'Kidričevo'),(147,1412,'Kisovec'),(148,6253,'Knežak'),(149,5222,'Kobarid'),(150,9227,'Kobilje'),(151,1330,'Kočevje'),(152,1338,'Kočevska Reka'),(153,2276,'Kog'),(154,5211,'Kojsko'),(155,6223,'Komen'),(156,1218,'Komenda'),(157,6000,'Koper - Capodistria - dostava'),(158,6001,'Koper - Capodistria - poštni predali'),(159,6503,'Koper'),(160,6502,'Koper'),(161,6505,'Koper'),(162,6504,'Koper'),(163,6501,'Koper'),(164,6600,'Koper'),(165,8282,'Koprivnica'),(166,5296,'Kostanjevica na Krasu'),(167,8311,'Kostanjevica na Krki'),(168,6256,'Košana'),(169,2394,'Kotlje'),(170,6240,'Kozina'),(171,3260,'Kozje'),(172,4000,'Kranj - dostava'),(173,4001,'Kranj - poštni predali'),(174,4600,'Kranj'),(175,4502,'Kranj'),(176,4280,'Kranjska Gora'),(177,1281,'Kresnice'),(178,4294,'Križe'),(179,9206,'Križevci'),(180,9242,'Križevci pri Ljutomeru'),(181,1301,'Krka'),(182,8296,'Krmelj'),(183,4245,'Kropa'),(184,8262,'Krška vas'),(185,8270,'Krško'),(186,9263,'Kuzma'),(187,2318,'Laporje'),(188,3270,'Laško'),(189,1219,'Laze v Tuhinju'),(190,2230,'Lenart v Slovenskih goricah'),(191,9220,'Lendava - Lendva'),(192,4248,'Lesce'),(193,3261,'Lesično'),(194,8273,'Leskovec pri Krškem'),(195,2372,'Libeliče'),(196,2341,'Limbuš'),(197,1270,'Litija'),(198,3202,'Ljubečna'),(199,1000,'Ljubljana - dostava'),(200,1001,'Ljubljana - poštni predali'),(201,1517,'Ljubljana'),(202,1505,'Ljubljana'),(203,1533,'Ljubljana'),(204,1512,'Ljubljana'),(205,1524,'Ljubljana'),(206,1523,'Ljubljana'),(207,1522,'Ljubljana'),(208,1510,'Ljubljana'),(209,1509,'Ljubljana'),(210,1538,'Ljubljana'),(211,1516,'Ljubljana'),(212,1528,'Ljubljana'),(213,1540,'Ljubljana'),(214,1504,'Ljubljana'),(215,1521,'Ljubljana'),(216,1545,'Ljubljana'),(217,1542,'Ljubljana'),(218,1525,'Ljubljana'),(219,1544,'Ljubljana'),(220,1514,'Ljubljana'),(221,1526,'Ljubljana'),(222,1502,'Ljubljana'),(223,1508,'Ljubljana'),(224,1501,'Ljubljana'),(225,1535,'Ljubljana'),(226,1536,'Ljubljana'),(227,1537,'Ljubljana'),(228,1520,'Ljubljana'),(229,1534,'Ljubljana'),(230,1503,'Ljubljana'),(231,1527,'Ljubljana'),(232,1603,'Ljubljana'),(233,1500,'Ljubljana'),(234,1600,'Ljubljana'),(235,1550,'Ljubljana'),(236,1532,'Ljubljana'),(237,1513,'Ljubljana'),(238,1511,'Ljubljana'),(239,1506,'Ljubljana'),(240,1519,'Ljubljana'),(241,1543,'Ljubljana'),(242,1546,'Ljubljana'),(243,1547,'Ljubljana'),(244,1518,'Ljubljana'),(245,1507,'Ljubljana'),(246,1529,'Ljubljana'),(247,1231,'Ljubljana - Črnuče'),(248,1261,'Ljubljana - Dobrunje'),(249,1260,'Ljubljana - Polje'),(250,1210,'Ljubljana - Šentvid'),(251,1211,'Ljubljana - Šmartno'),(252,3333,'Ljubno ob Savinji'),(253,9240,'Ljutomer'),(254,3215,'Loče'),(255,5231,'Log pod Mangartom'),(256,1370,'Logatec'),(257,1434,'Loka pri Zidanem Mostu'),(258,3223,'Loka pri Žusmu'),(259,6219,'Lokev'),(260,1318,'Loški Potok'),(261,2324,'Lovrenc na Dravskem polju'),(262,2344,'Lovrenc na Pohorju'),(263,3334,'Luče'),(264,1225,'Lukovica'),(265,9202,'Mačkovci'),(266,2322,'Majšperk'),(267,2321,'Makole'),(268,9243,'Mala Nedelja'),(269,2229,'Malečnik'),(270,6273,'Marezige'),(271,2000,'Maribor - dostava'),(272,2001,'Maribor - poštni predali'),(273,2504,'Maribor'),(274,2502,'Maribor'),(275,2509,'Maribor'),(276,2506,'Maribor'),(277,2508,'Maribor'),(278,2505,'Maribor'),(279,2503,'Maribor'),(280,2500,'Maribor'),(281,2600,'Maribor'),(282,2603,'Maribor'),(283,2501,'Maribor'),(284,2507,'Maribor'),(285,2206,'Marjeta na Dravskem polju'),(286,2281,'Markovci'),(287,9221,'Martjanci'),(288,6242,'Materija'),(289,4211,'Mavčiče'),(290,1215,'Medvode'),(291,1234,'Mengeš'),(292,8330,'Metlika'),(293,2392,'Mežica'),(294,2204,'Miklavž na Dravskem polju'),(295,2275,'Miklavž pri Ormožu'),(296,5291,'Miren'),(297,8233,'Mirna'),(298,8216,'Mirna Peč'),(299,2382,'Mislinja'),(300,4281,'Mojstrana'),(301,8230,'Mokronog'),(302,1251,'Moravče'),(303,9226,'Moravske Toplice'),(304,5216,'Most na Soči'),(305,1221,'Motnik'),(306,3330,'Mozirje'),(307,9000,'Murska Sobota - dostava'),(308,9001,'Murska Sobota - poštni predali'),(309,9501,'Murska Sobota'),(310,9600,'Murska Sobota'),(311,2366,'Muta'),(312,4202,'Naklo'),(313,4501,'Naklo'),(314,3331,'Nazarje'),(315,1357,'Notranje Gorice'),(316,3203,'Nova Cerkev'),(317,5000,'Nova Gorica - dostava'),(318,5001,'Nova Gorica - poštni predali'),(319,5600,'Nova Gorica'),(320,1385,'Nova vas'),(321,8000,'Novo mesto - dostava'),(322,8001,'Novo mesto - poštni predali'),(323,8501,'Novo mesto'),(324,8600,'Novo mesto'),(325,6243,'Obrov'),(326,9233,'Odranci'),(327,2317,'Oplotnica'),(328,2312,'Orehova vas'),(329,2270,'Ormož'),(330,1316,'Ortnek'),(331,1337,'Osilnica'),(332,8222,'Otočec'),(333,2361,'Ožbalt'),(334,2231,'Pernica'),(335,2211,'Pesnica pri Mariboru'),(336,9203,'Petrovci'),(337,3301,'Petrovče'),(338,6330,'Piran - Pirano'),(339,8255,'Pišece'),(340,6257,'Pivka'),(341,6232,'Planina'),(342,3225,'Planina pri Sevnici'),(343,6276,'Pobegi'),(344,8312,'Podbočje'),(345,5243,'Podbrdo'),(346,3254,'Podčetrtek'),(347,2273,'Podgorci'),(348,6216,'Podgorje'),(349,2381,'Podgorje pri Slovenj Gradcu'),(350,6244,'Podgrad'),(351,1414,'Podkum'),(352,2286,'Podlehnik'),(353,5272,'Podnanos'),(354,4244,'Podnart'),(355,3241,'Podplat'),(356,3257,'Podsreda'),(357,2363,'Podvelka'),(358,2208,'Pohorje'),(359,2257,'Polenšak'),(360,1355,'Polhov Gradec'),(361,4223,'Poljane nad Škofjo Loko'),(362,2319,'Poljčane'),(363,1272,'Polšnik'),(364,3313,'Polzela'),(365,3232,'Ponikva'),(366,6320,'Portorož - Portorose'),(367,6230,'Postojna'),(368,2331,'Pragersko'),(369,3312,'Prebold'),(370,4205,'Preddvor'),(371,6255,'Prem'),(372,1352,'Preserje'),(373,6258,'Prestranek'),(374,2391,'Prevalje'),(375,3262,'Prevorje'),(376,1276,'Primskovo '),(377,3253,'Pristava pri Mestinju'),(378,9207,'Prosenjakovci - Partosfalva'),(379,5297,'Prvačina'),(380,2250,'Ptuj'),(381,2323,'Ptujska Gora'),(382,9201,'Puconci'),(383,2327,'Rače'),(384,1433,'Radeče'),(385,9252,'Radenci'),(386,9502,'Radenci'),(387,2360,'Radlje ob Dravi'),(388,1235,'Radomlje'),(389,4240,'Radovljica'),(390,8274,'Raka'),(391,1381,'Rakek'),(392,4283,'Rateče - Planica'),(393,2390,'Ravne na Koroškem'),(394,3332,'Rečica ob Savinji'),(395,5292,'Renče'),(396,1310,'Ribnica'),(397,2364,'Ribnica na Pohorju'),(398,3272,'Rimske Toplice'),(399,1314,'Rob'),(400,5215,'Ročinj'),(401,3250,'Rogaška Slatina'),(402,9262,'Rogašovci'),(403,3252,'Rogatec'),(404,1373,'Rovte'),(405,2342,'Ruše'),(406,1282,'Sava'),(407,6333,'Sečovlje - Sicciole'),(408,4227,'Selca'),(409,2352,'Selnica ob Dravi'),(410,8333,'Semič'),(411,8281,'Senovo'),(412,6224,'Senožeče'),(413,8290,'Sevnica'),(414,6210,'Sežana'),(415,2214,'Sladki Vrh'),(416,5283,'Slap ob Idrijci'),(417,2380,'Slovenj Gradec'),(418,2310,'Slovenska Bistrica'),(419,3210,'Slovenske Konjice'),(420,1216,'Smlednik'),(421,5232,'Soča'),(422,1317,'Sodražica'),(423,3335,'Solčava'),(424,5250,'Solkan'),(425,4229,'Sorica'),(426,4225,'Sovodenj'),(427,5281,'Spodnja Idrija'),(428,2241,'Spodnji Duplek'),(429,9245,'Spodnji Ivanjci'),(430,2277,'Središče ob Dravi'),(431,4267,'Srednja vas v Bohinju'),(432,8256,'Sromlje '),(433,5224,'Srpenica'),(434,1242,'Stahovica'),(435,1332,'Stara Cerkev'),(436,8342,'Stari trg ob Kolpi'),(437,1386,'Stari trg pri Ložu'),(438,2205,'Starše'),(439,2289,'Stoperce'),(440,8322,'Stopiče'),(441,3206,'Stranice'),(442,8351,'Straža'),(443,1313,'Struge'),(444,6323,'Strunjan - Strugnano (sezonska pošta)'),(445,8293,'Studenec'),(446,8331,'Suhor'),(447,2233,'Sv. Ana v Slovenskih goricah'),(448,2353,'Sv. Duh na Ostrem Vrhu'),(449,9244,'Sv. Jurij ob Ščavnici'),(450,2235,'Sv. Trojica v Slovenskih goricah'),(451,3264,'Sveti Štefan'),(452,2258,'Sveti Tomaž'),(453,9204,'Šalovci'),(454,5261,'Šempas'),(455,5290,'Šempeter pri Gorici'),(456,3311,'Šempeter v Savinjski dolini'),(457,4208,'Šenčur'),(458,2212,'Šentilj v Slovenskih goricah'),(459,8297,'Šentjanž'),(460,2373,'Šentjanž pri Dravogradu'),(461,8310,'Šentjernej'),(462,3230,'Šentjur'),(463,3271,'Šentrupert'),(464,8232,'Šentrupert'),(465,1296,'Šentvid pri Stični'),(466,8275,'Škocjan'),(467,6281,'Škofije'),(468,4220,'Škofja Loka'),(469,3211,'Škofja vas'),(470,1291,'Škofljica'),(471,6274,'Šmarje'),(472,1293,'Šmarje - Sap'),(473,3240,'Šmarje pri Jelšah'),(474,8220,'Šmarješke Toplice'),(475,2315,'Šmartno na Pohorju'),(476,3341,'Šmartno ob Dreti'),(477,3327,'Šmartno ob Paki'),(478,1275,'Šmartno pri Litiji'),(479,2383,'Šmartno pri Slovenj Gradcu'),(480,3201,'Šmartno v Rožni dolini'),(481,3325,'Šoštanj'),(482,6222,'Štanjel'),(483,3220,'Štore'),(484,3304,'Tabor'),(485,3221,'Teharje'),(486,9251,'Tišina'),(487,5220,'Tolmin'),(488,3326,'Topolšica'),(489,2371,'Trbonje'),(490,1420,'Trbovlje'),(491,8231,'Trebelno '),(492,8210,'Trebnje'),(493,5252,'Trnovo pri Gorici'),(494,2254,'Trnovska vas'),(495,1222,'Trojane'),(496,1236,'Trzin'),(497,4290,'Tržič'),(498,8295,'Tržišče'),(499,1311,'Turjak'),(500,9224,'Turnišče'),(501,8323,'Uršna sela'),(502,1252,'Vače'),(503,1336,'Vas'),(504,3320,'Velenje - dostava'),(505,3322,'Velenje - poštni predali'),(506,3503,'Velenje'),(507,3504,'Velenje'),(508,8212,'Velika Loka'),(509,2274,'Velika Nedelja'),(510,9225,'Velika Polana'),(511,1315,'Velike Lašče'),(512,8213,'Veliki Gaber'),(513,9241,'Veržej'),(514,1312,'Videm - Dobrepolje'),(515,2284,'Videm pri Ptuju'),(516,8344,'Vinica'),(517,5271,'Vipava'),(518,4212,'Visoko'),(519,1294,'Višnja Gora'),(520,3205,'Vitanje'),(521,2255,'Vitomarci'),(522,1217,'Vodice'),(523,3212,'Vojnik'),(524,5293,'Volčja Draga'),(525,2232,'Voličina'),(526,3305,'Vransko'),(527,6217,'Vremski Britof'),(528,1360,'Vrhnika'),(529,2365,'Vuhred'),(530,2367,'Vuzenica'),(531,8292,'Zabukovje '),(532,1410,'Zagorje ob Savi'),(533,1303,'Zagradec'),(534,2283,'Zavrč'),(535,8272,'Zdole '),(536,4201,'Zgornja Besnica'),(537,2242,'Zgornja Korena'),(538,2201,'Zgornja Kungota'),(539,2316,'Zgornja Ložnica'),(540,2314,'Zgornja Polskava'),(541,2213,'Zgornja Velka'),(542,4247,'Zgornje Gorje'),(543,4206,'Zgornje Jezersko'),(544,2285,'Zgornji Leskovec'),(545,1432,'Zidani Most'),(546,3214,'Zreče'),(547,4209,'Žabnica'),(548,3310,'Žalec'),(549,4228,'Železniki'),(550,2287,'Žetale'),(551,4226,'Žiri'),(552,4274,'Žirovnica'),(553,8360,'Žužemberk');
/*!40000 ALTER TABLE `zip_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-15 16:02:24
