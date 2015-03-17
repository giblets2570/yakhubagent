-- MySQL dump 10.13  Distrib 5.5.42, for Linux (x86_64)
--
-- Host: localhost    Database: yakhubAgents
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Current Database: `yakhubAgents`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `yakhubAgents` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `yakhubAgents`;

--
-- Table structure for table `Agent`
--

DROP TABLE IF EXISTS `Agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agent` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Agent`
--

LOCK TABLES `Agent` WRITE;
/*!40000 ALTER TABLE `Agent` DISABLE KEYS */;
INSERT INTO `Agent` VALUES ('DanLeary','mail.leary@gmail.com','dan10dan','2015-03-04 11:22:45'),('JamesStawicki','james.stawicki14@imperial.ac.uk','10james','2015-03-09 21:18:13'),('KatrinaReid','katrina.s.reid@btinternet.com','katrina10','2015-03-09 20:49:22'),('NimSukumar','nimsukumar@gmail.com','nimandian10','2015-03-04 11:22:29'),('PhilipFortio','philip.fortio@gmail.com','philio10','2015-03-04 11:23:02'),('TomMurray','tomkeohanemurray@gmail.com','bogaboga123','2015-03-04 11:19:00');
/*!40000 ALTER TABLE `Agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Called`
--

DROP TABLE IF EXISTS `Called`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Called` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agentname` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `businessname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `pickedup` varchar(100) DEFAULT NULL,
  `interested` varchar(100) DEFAULT NULL,
  `appointment` varchar(100) DEFAULT NULL,
  `notes` text,
  `recordingURL` text,
  `recordingDuration` varchar(100) DEFAULT NULL,
  `callStatus` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Called`
--

LOCK TABLES `Called` WRITE;
/*!40000 ALTER TABLE `Called` DISABLE KEYS */;
/*!40000 ALTER TABLE `Called` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Calling`
--

DROP TABLE IF EXISTS `Calling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Calling` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `businessname` varchar(100) DEFAULT NULL,
  `agentname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Calling`
--

LOCK TABLES `Calling` WRITE;
/*!40000 ALTER TABLE `Calling` DISABLE KEYS */;
INSERT INTO `Calling` VALUES (2,'00442078233512','-1','JamesStawicki','Dobeo','2015-03-10 01:36:23');
/*!40000 ALTER TABLE `Calling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Client`
--

DROP TABLE IF EXISTS `Client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client`
--

LOCK TABLES `Client` WRITE;
/*!40000 ALTER TABLE `Client` DISABLE KEYS */;
INSERT INTO `Client` VALUES ('Dobeo','','dobeo123','http://dobeoapp.com/','2015-03-09 23:20:24'),('TestClient','test','test','test','2015-03-09 19:36:57');
/*!40000 ALTER TABLE `Client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contract`
--

DROP TABLE IF EXISTS `Contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contract` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `agentname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contract`
--

LOCK TABLES `Contract` WRITE;
/*!40000 ALTER TABLE `Contract` DISABLE KEYS */;
INSERT INTO `Contract` VALUES (3,'TomMurray','Dobeo','2015-03-09 23:20:36'),(4,'DanLeary','Dobeo','2015-03-10 01:18:28'),(5,'NimSukumar','Dobeo','2015-03-10 01:18:37'),(6,'PhilipFortio','Dobeo','2015-03-10 01:18:47'),(7,'KatrinaReid','Dobeo','2015-03-10 01:19:10'),(8,'JamesStawicki','Dobeo','2015-03-10 01:19:31');
/*!40000 ALTER TABLE `Contract` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Numbers`
--

DROP TABLE IF EXISTS `Numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Numbers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `businessname` varchar(100) NOT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `called` varchar(100) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Numbers`
--

LOCK TABLES `Numbers` WRITE;
/*!40000 ALTER TABLE `Numbers` DISABLE KEYS */;
INSERT INTO `Numbers` VALUES (1,'00442078233512','MacGillOfKensington','Dobeo','no','2015-03-09 23:51:44'),(2,'00442083922859','TheRiversideDryCleaningCompany','Dobeo','no','2015-03-09 23:51:44'),(3,'00442086772992','CleanScene','Dobeo','no','2015-03-09 23:51:44'),(4,'00442077988698','DolphinSquareDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(5,'00442088770586','DonovanDunne','Dobeo','no','2015-03-09 23:51:44'),(6,'00442086733020','DIBADryCleaners','Dobeo','no','2015-03-09 23:51:44'),(7,'00442075829114','HudsonsDrycleaner','Dobeo','no','2015-03-09 23:51:44'),(8,'00442075829114','HudsonsDrycleaner','Dobeo','no','2015-03-09 23:51:44'),(9,'00442072339249','KnightsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(10,'00442073513563','Angelo&Rosa','Dobeo','no','2015-03-09 23:51:44'),(11,'00442073515770','MacGillOfKensington','Dobeo','no','2015-03-09 23:51:44'),(12,'00442073715358','ValetVite','Dobeo','no','2015-03-09 23:51:44'),(13,'00442072223710','TheWhiteRose','Dobeo','no','2015-03-09 23:51:44'),(14,'00442087692506','StarliteDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(15,'00442088475595','BrentfordDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(16,'00442073260666','Exclusive','Dobeo','no','2015-03-09 23:51:44'),(17,'00442086724280','HeritageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(18,'00442034419255','MicacleDryCleaning','Dobeo','no','2015-03-09 23:51:44'),(19,'00442034419255','MiracleDryCleaning&Laundry','Dobeo','no','2015-03-09 23:51:44'),(20,'00442077223337','MadameGeorge','Dobeo','no','2015-03-09 23:51:44'),(21,'00442072296387','99DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(22,'00442088836155','CarltonCleaners','Dobeo','no','2015-03-09 23:51:44'),(23,'00442084443582','Penguin','Dobeo','no','2015-03-09 23:51:44'),(24,'00442086734006','SuperClean','Dobeo','no','2015-03-09 23:51:44'),(25,'00442077510633','LaPerla','Dobeo','no','2015-03-09 23:51:44'),(26,'00442085425653','CBECleaningServices','Dobeo','no','2015-03-09 23:51:44'),(27,'00442086718155','UnicornDryCleaning','Dobeo','no','2015-03-09 23:51:44'),(28,'00442076247530','Bromptons','Dobeo','no','2015-03-09 23:51:44'),(29,'00442077309978','BelgraveDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(30,'00442076227171','Sycamore','Dobeo','no','2015-03-09 23:51:44'),(31,'00442079377111','PremierDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(32,'00442078347978','ExpertCleaners','Dobeo','no','2015-03-09 23:51:44'),(33,'00442086741691','Capital','Dobeo','no','2015-03-09 23:51:44'),(34,'00442073810911','QualityExpressDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(35,'00442087485619','RoyalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(36,'00442077361701','BlueSkyCleaning','Dobeo','no','2015-03-09 23:51:44'),(37,'00442078347080','LupusDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(38,'00442076228877','MonarchDryCleaners&Laundrette','Dobeo','no','2015-03-09 23:51:44'),(39,'00442072239280','Belldetta','Dobeo','no','2015-03-09 23:51:44'),(40,'00442087894292','HumbertsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(41,'00442088741586','EhsanDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(42,'00442073283828','AbbeyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(43,'00447753794789','ByASmile','Dobeo','no','2015-03-09 23:51:44'),(44,'00442072336135','Expert','Dobeo','no','2015-03-09 23:51:44'),(45,'00442076270230','PremierDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(46,'00442086646824','KaptanDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(47,'00442076724280','HeritageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(48,'00442072298943','PlazaDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(49,'00442086753322','VikingDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(50,'00442073712888','Chenille','Dobeo','no','2015-03-09 23:51:44'),(51,'00442077357822','NuitDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(52,'00442089441000','SpotlessDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(53,'00442086772374','MrSteeds','Dobeo','no','2015-03-09 23:51:44'),(54,'00442078248644','SloaneCleaners','Dobeo','no','2015-03-09 23:51:44'),(55,'00442089951777','FreshAsADaisy','Dobeo','no','2015-03-09 23:51:44'),(56,'00442073737979','Tailors','Dobeo','no','2015-03-09 23:51:44'),(57,'00442086427676','QualityDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(58,'00447904112393','LilyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(59,'00442076043553','Siciliana','Dobeo','no','2015-03-09 23:51:44'),(60,'00442077712315','Sav&Son','Dobeo','no','2015-03-09 23:51:44'),(61,'00442089475674','VillageDryCleaning','Dobeo','no','2015-03-09 23:51:44'),(62,'00441689872844','ExpressionsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(63,'00442077929695','WestbourneDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(64,'00442077366688','ClothesCareDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(65,'00442087486838','VillageKlean','Dobeo','no','2015-03-09 23:51:44'),(66,'00442087486838','Orchid&Silk','Dobeo','no','2015-03-09 23:51:44'),(67,'00442085331313','ChatsworthCleaners','Dobeo','no','2015-03-09 23:51:44'),(68,'00442085422055','EleganceDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(69,'00441923897172','Rocha','Dobeo','no','2015-03-09 23:51:44'),(70,'00442084444304','SimplyDomestics','Dobeo','no','2015-03-09 23:51:44'),(71,'00442089942672','Laundromat','Dobeo','no','2015-03-09 23:51:44'),(72,'00442034892774','Thames','Dobeo','no','2015-03-09 23:51:44'),(73,'00442089463697','SwanCleaners','Dobeo','no','2015-03-09 23:51:44'),(74,'00442087421002','ArianaQualityDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(75,'00442072741101','AToZeeDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(76,'00442077304430','EburyCleaners','Dobeo','no','2015-03-09 23:51:44'),(77,'00442077312983','FulhamDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(78,'00442076271208','BatterseaDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(79,'00442072238381','BridgeDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(80,'00442086733686','Shimmers','Dobeo','no','2015-03-09 23:51:44'),(81,'00442087880635','BemroseDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(82,'00442079370010','LEleganceOfKensington','Dobeo','no','2015-03-09 23:51:44'),(83,'00442082492005','PremierDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(84,'00442077510351','Chevals','Dobeo','no','2015-03-09 23:51:44'),(85,'00442074603662','DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(86,'00442074601354','DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(87,'00442079981863','AlphaDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(88,'00442086723392','Scobies','Dobeo','no','2015-03-09 23:51:44'),(89,'00442085405050','MasterJohnDryCleaner','Dobeo','no','2015-03-09 23:51:44'),(90,'00442077338084','Topps','Dobeo','no','2015-03-09 23:51:44'),(91,'00442073719919','CapitalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(92,'00442088764057','ClassyCleaners','Dobeo','no','2015-03-09 23:51:44'),(93,'00442088747739','AngelsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(94,'00442078345640','RogersOfPimlico','Dobeo','no','2015-03-09 23:51:44'),(95,'00442076271447','WhiteLily','Dobeo','no','2015-03-09 23:51:44'),(96,'00442076271447','WhiteLily','Dobeo','no','2015-03-09 23:51:44'),(97,'00442078286444','RoyalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(98,'00442073522929','PrimeDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(99,'00442087640317','Cuffs','Dobeo','no','2015-03-09 23:51:44'),(100,'00442087721010','Techno','Dobeo','no','2015-03-09 23:51:44'),(101,'00442076243420','Perfect','Dobeo','no','2015-03-09 23:51:44'),(102,'00442089461891','QualityCleaners','Dobeo','no','2015-03-09 23:51:44'),(103,'00442072220700','RegentDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(104,'00441895675711','BlueDragonDryCleaning&Laundry','Dobeo','no','2015-03-09 23:51:44'),(105,'00442089447625','DonovanDunne','Dobeo','no','2015-03-09 23:51:44'),(106,'00442075823360','ZeeDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(107,'00442074983355','FantasyCleaners','Dobeo','no','2015-03-09 23:51:44'),(108,'00442088748999','JubileeDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(109,'00442088151253','RoseDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(110,'00442073718056','PrincessDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(111,'00442073511900','Sparkles','Dobeo','no','2015-03-09 23:51:44'),(112,'00442073513786','KingsBespokeDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(113,'00442075866727','Ivy','Dobeo','no','2015-03-09 23:51:44'),(114,'00442077221292','LordsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(115,'00442086707607','BelmontDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(116,'00442075824408','OvalQualityCleaners','Dobeo','no','2015-03-09 23:51:44'),(117,'00442073517757','KensingtonDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(118,'00447985718522','ActiveDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(119,'00442073868545','BlueMoon','Dobeo','no','2015-03-09 23:51:44'),(120,'00442073868545','BlueMoonDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(121,'00442086646100','ThomasClarkCleaners','Dobeo','no','2015-03-09 23:51:44'),(122,'00442079378641','PristineDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(123,'00442079983762','StJohnsWoodDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(124,'00442087427195','RoyalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(125,'00442073818601','StamfordDryCleaning','Dobeo','no','2015-03-09 23:51:44'),(126,'00442076106222','N.D.DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(127,'00442079384733','Stitch','Dobeo','no','2015-03-09 23:51:44'),(128,'00442075813080','FaizaUnique','Dobeo','no','2015-03-09 23:51:44'),(129,'00442076275162','CityDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(130,'00442076275162','CityDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(131,'00442073527643','OneDryCleaningWithADifference','Dobeo','no','2015-03-09 23:51:44'),(132,'00442083929905','RoyalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(133,'00442087675355','TuxedoExpress','Dobeo','no','2015-03-09 23:51:44'),(134,'00442076221724','DryCleaningByHazle','Dobeo','no','2015-03-09 23:51:44'),(135,'00442075899902','PerkinsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(136,'00442089472515','DonavanDunne','Dobeo','no','2015-03-09 23:51:44'),(137,'00442078216464','ClassiClean','Dobeo','no','2015-03-09 23:51:44'),(138,'00442075929292','Lime','Dobeo','no','2015-03-09 23:51:44'),(139,'00442072295624','DeRose','Dobeo','no','2015-03-09 23:51:44'),(140,'00442087473141','Ariana','Dobeo','no','2015-03-09 23:51:44'),(141,'00442086724280','HeritageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(142,'00442087775512','BelmontDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(143,'00442075840784','ConcordeOfKnightsbridge','Dobeo','no','2015-03-09 23:51:44'),(144,'00442085430066','LilyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(145,'00441923776527','Cleanability','Dobeo','no','2015-03-09 23:51:44'),(146,'00442086772323','HeritageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(147,'00442072244346','Spectrum','Dobeo','no','2015-03-09 23:51:44'),(148,'00442073524201','H2o','Dobeo','no','2015-03-09 23:51:44'),(149,'00442076220553','RVExpress','Dobeo','no','2015-03-09 23:51:44'),(150,'00442076220553','RVExpress','Dobeo','no','2015-03-09 23:51:44'),(151,'00442088773455','OceanDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(152,'00442087694156','Kleencare','Dobeo','no','2015-03-09 23:51:44'),(153,'00442089463536','KingsmereCleaners','Dobeo','no','2015-03-09 23:51:44'),(154,'00442088783827','MartinizingDryCleaning','Dobeo','no','2015-03-09 23:51:44'),(155,'00442083922258','SuperClean','Dobeo','no','2015-03-09 23:51:44'),(156,'00442072227788','PrimeDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(157,'00442077318722','NewSmartDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(158,'00442072288481','Dukes','Dobeo','no','2015-03-09 23:51:44'),(159,'00442087591300','RadiantDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(160,'00442072232475','SpectrumClothesCare','Dobeo','no','2015-03-09 23:51:44'),(161,'00442087883365','LADryCleaners','Dobeo','no','2015-03-09 23:51:44'),(162,'00442087883365','RoehamptonDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(163,'00442076370230','PremierDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(164,'00442088700507','RegencyExecutiveDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(165,'00442072331319','StarDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(166,'00442079382988','Burlingtons','Dobeo','no','2015-03-09 23:51:44'),(167,'00442085408032','DudleyDryCleaners&Tailor','Dobeo','no','2015-03-09 23:51:44'),(168,'00442031377231','DeluxeCleaners','Dobeo','no','2015-03-09 23:51:44'),(169,'00442085421000','Rendez-VousDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(170,'00442082960171','GrandDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(171,'00442078020088','Chase','Dobeo','no','2015-03-09 23:51:44'),(172,'00442072622007','BespokeTailors&DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(173,'00442077356154','OvalExpressCleaners','Dobeo','no','2015-03-09 23:51:44'),(174,'00442085450227','DuCane','Dobeo','no','2015-03-09 23:51:44'),(175,'00442076274103','TanyeriDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(176,'00442073523388','AbbeyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(177,'00442087720000','Greenfield','Dobeo','no','2015-03-09 23:51:44'),(178,'00442087423244','ThePressGang','Dobeo','no','2015-03-09 23:51:44'),(179,'00442077207271','VoltaireCleaners','Dobeo','no','2015-03-09 23:51:44'),(180,'00442075891444','PearlDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(181,'00442087643345','A&SDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(182,'00442086734692','TheCommons','Dobeo','no','2015-03-09 23:51:44'),(183,'00442072221317','WhistlesDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(184,'00442089951301','MCDrycleaners','Dobeo','no','2015-03-09 23:51:44'),(185,'00442077332144','UnitCleaners','Dobeo','no','2015-03-09 23:51:44'),(186,'00442087888882','ThePutneyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(187,'00442088767997','ExpressDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(188,'00442073856162','TheDryCleaners&LaunderetteCentre','Dobeo','no','2015-03-09 23:51:44'),(189,'00442035830773','PureStitch','Dobeo','no','2015-03-09 23:51:44'),(190,'00442077313255','TheClothesSpa','Dobeo','no','2015-03-09 23:51:44'),(191,'00442086747192','FabricCare','Dobeo','no','2015-03-09 23:51:44'),(192,'00442075890044','ChelseaGreen','Dobeo','no','2015-03-09 23:51:44'),(193,'00442078211777','CelebrityDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(194,'00442086751221','KrystalCleaners','Dobeo','no','2015-03-09 23:51:44'),(195,'00442073738103','BromptonSpecialist','Dobeo','no','2015-03-09 23:51:44'),(196,'00442076023535','MelburyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(197,'00442089464598','UnitFour','Dobeo','no','2015-03-09 23:51:44'),(198,'00442086729064','TrinityCleaners','Dobeo','no','2015-03-09 23:51:44'),(199,'00442073859369','CapitalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(200,'00442072991442','Elegance','Dobeo','no','2015-03-09 23:51:44'),(201,'00442089472357','Nicolson&Freelander','Dobeo','no','2015-03-09 23:51:44'),(202,'00442036206573','LeonsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(203,'00442085421790','ClaremarDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(204,'00442085421790','RegencyCleaners','Dobeo','no','2015-03-09 23:51:44'),(205,'00442087803420','Thompson&Jones','Dobeo','no','2015-03-09 23:51:44'),(206,'00442072354844','HaywardsSpecialist&CoutureDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(207,'00442087882538','ParkViewDryCleaners&Launderers','Dobeo','no','2015-03-09 23:51:44'),(208,'00442072284755','ImageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(209,'00442073818943','DryCleaning@Home','Dobeo','no','2015-03-09 23:51:44'),(210,'00442073701500','ChaseDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(211,'00442087420305','2000DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(212,'00442077718031','PretAPorter','Dobeo','no','2015-03-09 23:51:44'),(213,'00442079372221','Excellence','Dobeo','no','2015-03-09 23:51:44'),(214,'00442075840200','AmericanDrycleaners','Dobeo','no','2015-03-09 23:51:44'),(215,'00442088747039','SwanDrycleaners','Dobeo','no','2015-03-09 23:51:44'),(216,'00442089476906','GalaxyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(217,'00442072335544','Choice','Dobeo','no','2015-03-09 23:51:44'),(218,'00442077208118','ParksideDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(219,'00442073719675','ExpressDryCleaner','Dobeo','no','2015-03-09 23:51:44'),(220,'00442087887001','SanTailors','Dobeo','no','2015-03-09 23:51:44'),(221,'00442089463367','DuCane','Dobeo','no','2015-03-09 23:51:44'),(222,'00442087696919','AquariusCleaners','Dobeo','no','2015-03-09 23:51:44'),(223,'00442079319988','SaraDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(224,'00442077301229','ChoiceDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(225,'00441689898835','SmartyPantsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(226,'00442088743180','SmartSet','Dobeo','no','2015-03-09 23:51:44'),(227,'00442088769224','TheDryCleaningCompany','Dobeo','no','2015-03-09 23:51:44'),(228,'00442073869960','DonovanDunne','Dobeo','no','2015-03-09 23:51:44'),(229,'00442089959813','TopHatCleaners','Dobeo','no','2015-03-09 23:51:44'),(230,'00442087896891','AZPrestigeCleaners','Dobeo','no','2015-03-09 23:51:44'),(231,'00442087580101','Elegance','Dobeo','no','2015-03-09 23:51:44'),(232,'00442086743811','OceanDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(233,'00442088748651','ZenithDryCleaners&Launderers','Dobeo','no','2015-03-09 23:51:44'),(234,'00442073813609','VanstonDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(235,'00442082440561','NovaClean','Dobeo','no','2015-03-09 23:51:44'),(236,'00442085437700','Smarty','Dobeo','no','2015-03-09 23:51:44'),(237,'00442087673315','BaizaQualityDryCleaners&ShoeRepairs','Dobeo','no','2015-03-09 23:51:44'),(238,'00442076222602','Taniya','Dobeo','no','2015-03-09 23:51:44'),(239,'00442076222602','Taniya','Dobeo','no','2015-03-09 23:51:44'),(240,'00442088780175','HamlynsExclusiveDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(241,'00442030800703','I.BSuperclean','Dobeo','no','2015-03-09 23:51:44'),(242,'00442088745376','DudleyDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(243,'00442086734466','DuCaneDryCleaning','Dobeo','no','2015-03-09 23:51:44'),(244,'00442086737204','Sketchley','Dobeo','no','2015-03-09 23:51:44'),(245,'00442085430810','FMDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(246,'00442086724280','HeritageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(247,'00442077304545','Byblos','Dobeo','no','2015-03-09 23:51:44'),(248,'00442072743490','Moonlight','Dobeo','no','2015-03-09 23:51:44'),(249,'00442086823061','ArmanisDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(250,'00442086823061','Heritage','Dobeo','no','2015-03-09 23:51:44'),(251,'00442073757156','OceanaDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(252,'00442085433687','ArianaDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(253,'00442036651702','ProDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(254,'00442077921479','DeepClean','Dobeo','no','2015-03-09 23:51:44'),(255,'00442077382266','Elegance','Dobeo','no','2015-03-09 23:51:44'),(256,'00442087418566','Reeves','Dobeo','no','2015-03-09 23:51:44'),(257,'00442072228495','CleannPress','Dobeo','no','2015-03-09 23:51:44'),(258,'00442077315114','Peters&Falla','Dobeo','no','2015-03-09 23:51:44'),(259,'00442072292983','UKPremierDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(260,'00442074983355','FantasyCleaners','Dobeo','no','2015-03-09 23:51:44'),(261,'00442074983355','FantasyCleaners','Dobeo','no','2015-03-09 23:51:44'),(262,'00442079785969','HamiltonsQualityDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(263,'00442073738795','ChelseaDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(264,'00442089950138','Clean&Press','Dobeo','no','2015-03-09 23:51:44'),(265,'00442087691916','KrystalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(266,'00442083929234','WhiteHartDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(267,'00442072446861','BobosBubbles','Dobeo','no','2015-03-09 23:51:44'),(268,'00442089473747','QueensmereDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(269,'00442087856831','CrystalDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(270,'00442087643444','ZaraDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(271,'00442086716973','StreathamDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(272,'00442073739381','PerkinsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(273,'00447960759895','FlamingoLocksmiths','Dobeo','no','2015-03-09 23:51:44'),(274,'00442086723817','SmartSetDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(275,'00442076027696','KensingtonDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(276,'00442087041112','TheLaundryBag','Dobeo','no','2015-03-09 23:51:44'),(277,'00442088773744','PearlDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(278,'00442086796500','NorburyExpressDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(279,'00442073500759','SpotCare','Dobeo','no','2015-03-09 23:51:44'),(280,'00442072745142','PoleoCleaners','Dobeo','no','2015-03-09 23:51:44'),(281,'00442075895730','Lewis&Wayne','Dobeo','no','2015-03-09 23:51:44'),(282,'00442087671337','QualityExpressDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(283,'00442073760943','RegentDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(284,'00442072289031','BellvueDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(285,'00442072447447','ReevesOfKensington','Dobeo','no','2015-03-09 23:51:44'),(286,'00442088797518','VillageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(287,'00442077369471','DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(288,'00442076227235','Flair','Dobeo','no','2015-03-09 23:51:44'),(289,'00442077352536','Trend','Dobeo','no','2015-03-09 23:51:44'),(290,'00442077352536','Trend','Dobeo','no','2015-03-09 23:51:44'),(291,'00442086724982','EvershineDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(292,'00442079319944','AquaDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(293,'00442075894685','Renzaki','Dobeo','no','2015-03-09 23:51:44'),(294,'00442075813171','ImperialCare','Dobeo','no','2015-03-09 23:51:44'),(295,'00442089943838','TurnemClean','Dobeo','no','2015-03-09 23:51:44'),(296,'00442087649633','SavoyTailors&DryCleaners','Dobeo','no','2015-03-09 23:51:44'),(297,'00442077993232','Tailors','Dobeo','no','2015-03-09 23:51:44'),(298,'00442073851588','RavalsDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(299,'00442076224465','MayfairDryCleaner','Dobeo','no','2015-03-09 23:51:44'),(300,'00442087888877','ExecutiveCleaners','Dobeo','no','2015-03-09 23:51:44'),(301,'00442086744873','PoleoDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(302,'00442072446862','BobosBubbles','Dobeo','no','2015-03-09 23:51:44'),(303,'00442078310007','DrycleaningDirect','Dobeo','no','2015-03-09 23:51:44'),(304,'00442036320379','HillDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(305,'00442087641800','HeritageDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(306,'00442079371485','DebonairDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(307,'00442084443877','PrestineDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(308,'00442077380123','Tailors','Dobeo','no','2015-03-09 23:51:44'),(309,'00442073811501','Cleanway','Dobeo','no','2015-03-09 23:51:44'),(310,'00442086731110','PenguinDrycleaners','Dobeo','no','2015-03-09 23:51:44'),(311,'00442079242428','DryCleaning','Dobeo','no','2015-03-09 23:51:44'),(312,'00442089461949','Nicolson&Freelander','Dobeo','no','2015-03-09 23:51:44'),(313,'00442077362992','SupaClean','Dobeo','no','2015-03-09 23:51:44'),(314,'00442077315500','DelicateCleaning','Dobeo','no','2015-03-09 23:51:44'),(315,'00442087427334','Bromptons','Dobeo','no','2015-03-09 23:51:44'),(316,'00442079241851','PureDryCleaning','Dobeo','no','2015-03-09 23:51:44'),(317,'00442089940534','FourStarDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(318,'00442085450088','BondDryCleaners','Dobeo','no','2015-03-09 23:51:44'),(319,'00442086726090','SmartwayCleaners','Dobeo','no','2015-03-09 23:51:44');
/*!40000 ALTER TABLE `Numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recordings`
--

DROP TABLE IF EXISTS `Recordings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recordings` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `agentname` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `numberCalled` varchar(100) DEFAULT NULL,
  `recordingURL` text,
  `recordingDuration` varchar(100) DEFAULT NULL,
  `callStatus` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recordings`
--

LOCK TABLES `Recordings` WRITE;
/*!40000 ALTER TABLE `Recordings` DISABLE KEYS */;
INSERT INTO `Recordings` VALUES (1,'DanLeary','YakHub','00442071487070','http://api.twilio.com/2010-04-01/Accounts/AC459bb0ca7982062b8ebde72b0e913955/Recordings/REea5ef4f8942eaa40f9b2d2877c7b33a0','133','completed','2015-03-04 14:24:26'),(2,'DanLeary','YakHub','00442037736877','http://api.twilio.com/2010-04-01/Accounts/AC459bb0ca7982062b8ebde72b0e913955/Recordings/RE9b63498d015bb84415ee5fc8a4afc08c','155','completed','2015-03-04 14:38:36'),(3,'PhilipFortio','YakHub','00447794808254','http://api.twilio.com/2010-04-01/Accounts/AC004e66a3d2b2038a180fe43a376ffbdc/Recordings/RE0a10f7a7ee28203bae9d107213958bb6','7','completed','2015-03-04 14:42:01'),(4,'TomMurray','YakHub','00442032890028','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/RE4df1fb87d96480e79129fd8438879225','40','completed','2015-03-04 14:47:11'),(5,'PhilipFortio','YakHub','00442031089363','http://api.twilio.com/2010-04-01/Accounts/AC004e66a3d2b2038a180fe43a376ffbdc/Recordings/RE5aa79f52ece08fde3a065c9e19eeeaa2','84','completed','2015-03-04 14:56:21'),(6,'TomMurray','YakHub','00447547968608','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/REb30b760075102a8a6af28b67d4a55b94','3','completed','2015-03-04 15:34:05'),(7,'968608','','00omMurray','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/REbc291a3c43d7b835d6f16b28e844cd1b','4','completed','2015-03-04 15:37:24'),(8,'968608','','00omMurray','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/RE096a56016d6da23ce84a84dc065154ca','7','completed','2015-03-04 15:37:50'),(9,'TomMurray','YakHub','00442072890301','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/REe9c188bfa80e7c0402f8b6ca37320b98','9','completed','2015-03-05 21:13:16'),(10,'PhilipFortio','YakHub','00442032865635','http://api.twilio.com/2010-04-01/Accounts/AC004e66a3d2b2038a180fe43a376ffbdc/Recordings/RE550d86d72d0465e75c5a1bc55c46b2ad','8','completed','2015-03-06 10:35:22'),(11,'PhilipFortio','YakHub','00442036080215','http://api.twilio.com/2010-04-01/Accounts/AC004e66a3d2b2038a180fe43a376ffbdc/Recordings/RE61cdf2fd1f9b533cd67cf7716abc22bd','162','completed','2015-03-06 11:16:43'),(12,'TomMurray','YakHub','00447547968608','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/RE2639faf8aa82e84199297baa63b59f1a','4','completed','2015-03-07 01:16:14'),(13,'TomMurray','YakHub','00447547968608','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/RE3c114f2753bc54a33a7955f0a3acd568','3','completed','2015-03-07 01:21:40'),(14,'TomMurray','YakHub','00447547968608','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/RE16717fc942a8778cb460932b168b0630','2','completed','2015-03-07 01:28:08'),(15,'TomMurray','YakHub','00447547968608','http://api.twilio.com/2010-04-01/Accounts/AC24860642ff8171715ff2b62c76ff89f0/Recordings/RE0e49b5920e9ef6192630b678c87a739e','3','completed','2015-03-07 12:02:42'),(16,'NimSukumar','YakHub','00447920093887','http://api.twilio.com/2010-04-01/Accounts/ACcd0e2b18e55460991099b8ea36316de7/Recordings/REa579ece3cccacffed3527a53372b0c6a','67','completed','2015-03-08 19:57:34');
/*!40000 ALTER TABLE `Recordings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Twilio`
--

DROP TABLE IF EXISTS `Twilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Twilio` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `authtoken` varchar(100) DEFAULT NULL,
  `accountsid` varchar(100) DEFAULT NULL,
  `appid` varchar(100) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Twilio`
--

LOCK TABLES `Twilio` WRITE;
/*!40000 ALTER TABLE `Twilio` DISABLE KEYS */;
INSERT INTO `Twilio` VALUES (1,'TomMurray','00442033899608','fc14a22f0f753b9c0e3fee4ce4541f51','AC24860642ff8171715ff2b62c76ff89f0','AP86655c71d9fb12133a8e61479c9cbf07','2015-03-04 11:24:40'),(2,'NimSukumar','00442033899857','1d59c1a9a10d9820f1320b2072d5db66','ACcd0e2b18e55460991099b8ea36316de7','AP3e56c950ccb2b3de9d3ff3c6a257d1be','2015-03-04 11:25:20'),(3,'DanLeary','00441183241487','4af7eb45d8f02c4ad6c284170abaa206','AC459bb0ca7982062b8ebde72b0e913955','AP45479f806f85226c0206611fb2c86987','2015-03-04 11:25:57'),(4,'PhilipFortio','00441623272236','5b04cd95ae861e9d1468b4c9b8908a51','AC004e66a3d2b2038a180fe43a376ffbdc','AP771b35f21009859ef8023b2af3a4e2b0','2015-03-04 11:26:56'),(5,'JamesStawicki','00441138590251','24dc69a84c46738e841daab83a23c247','AC1fb2c170333d7e6cf2ca489898e0c378','APee9d05aebad9aeeed4892b7238329ca1','2015-03-10 01:31:04'),(6,'KatrinaReid','00441138590341','b246216e5df1f3e454be0e3d4a88afd1','AC3d6d8d29a2b6e888cf8e6e18d82f32ae','AP72b40b03d5bea17b906013966cc5cbd2','2015-03-10 01:31:54');
/*!40000 ALTER TABLE `Twilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `details` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `help` text,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES (1,'David Senior','david@junior.com','0121314151','www.plates.com','plates, need plates		          ','2015-03-05 18:13:12'),(2,'Edward Jarrold','edward.jarrold11@ic.ac.uk','07834733642','http://www.tri247.com/participant_1691215.html','I like to buy vintage lamps as investments and sell them years later for profits that are less than inflation.','2015-03-07 20:37:01'),(3,'Maximilian Doelle','max@kazendi.com','07927184703','Www.kazendi.com','Sales','2015-03-09 16:47:48');
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-10  8:58:19
