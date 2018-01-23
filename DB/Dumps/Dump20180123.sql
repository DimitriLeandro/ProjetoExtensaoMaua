CREATE DATABASE  IF NOT EXISTS `db_maua` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_maua`;
-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: db_maua
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `audit`
--

DROP TABLE IF EXISTS `audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  `viewed` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit`
--

LOCK TABLES `audit` WRITE;
/*!40000 ALTER TABLE `audit` DISABLE KEYS */;
INSERT INTO `audit` VALUES (1,1,'42','2017-02-20 17:31:13','::1',0),(2,0,'47','2017-10-22 22:31:51','::1',0),(3,0,'47','2017-10-22 22:34:42','::1',0),(4,4,'46','2017-10-22 22:36:52','::1',0),(5,4,'47','2017-10-22 22:37:04','::1',0),(6,3,'46','2017-10-22 22:37:21','::1',0),(7,0,'47','2017-10-22 22:37:37','::1',0),(8,0,'48','2017-10-22 22:37:41','::1',0),(9,0,'46','2017-10-22 22:37:44','::1',0),(10,3,'46','2017-10-22 22:38:54','::1',0),(11,0,'48','2017-10-23 01:07:18','::1',0),(12,0,'48','2017-10-23 22:24:26','::1',0),(13,0,'48','2017-10-23 22:32:02','::1',0),(14,0,'47','2017-11-10 20:29:50','::1',0),(15,0,'48','2017-11-12 13:28:42','::1',0),(16,0,'47','2017-11-12 16:59:32','::1',0),(17,0,'47','2017-11-12 21:38:03','::1',0),(18,0,'47','2017-11-13 01:57:50','::1',0),(19,0,'47','2017-11-13 15:20:40','::1',0),(20,4,'49','2017-11-13 17:42:29','::1',0),(21,4,'50','2017-11-13 17:42:38','::1',0),(22,0,'48','2017-11-17 20:03:59','::1',0),(23,0,'48','2017-11-17 21:15:58','::1',0),(24,0,'48','2017-11-18 01:13:09','::1',0),(25,0,'47','2017-11-18 02:15:02','::1',0),(26,0,'47','2017-11-18 02:46:01','::1',0),(27,0,'47','2017-11-18 03:20:31','::1',0),(28,0,'47','2017-11-18 03:54:44','::1',0),(29,0,'47','2017-11-20 19:12:39','::1',0),(30,0,'47','2017-11-20 19:43:11','::1',0),(31,0,'47','2017-11-20 19:43:55','::1',0),(32,0,'48','2017-11-20 20:34:50','::1',0),(33,0,'50','2017-11-20 22:42:00','::1',0),(34,0,'47','2017-11-21 00:46:42','::1',0),(35,0,'47','2017-11-21 01:59:15','::1',0),(36,0,'47','2017-11-21 02:57:32','::1',0),(37,0,'49','2017-12-03 00:46:21','::1',0),(38,0,'46','2017-12-04 13:41:06','::1',0),(39,0,'48','2017-12-05 15:13:43','::1',0),(40,0,'46','2017-12-05 18:27:27','::1',0),(41,6,'47','2017-12-08 12:55:12','::1',0),(42,6,'48','2017-12-08 12:55:24','::1',0),(43,6,'48','2017-12-08 12:55:26','::1',0),(44,6,'48','2017-12-08 12:55:28','::1',0),(45,0,'46','2017-12-25 21:43:25','::1',0),(46,3,'47','2017-12-28 18:47:15','::1',0),(47,3,'47','2017-12-28 18:47:16','::1',0),(48,0,'51','2017-12-28 21:23:14','::1',0),(49,4,'52','2018-01-06 21:44:11','::1',0),(50,4,'52','2018-01-06 21:44:12','::1',0),(51,6,'47','2018-01-06 21:45:04','::1',0),(52,6,'48','2018-01-06 21:45:08','::1',0),(53,6,'48','2018-01-06 21:45:10','::1',0),(54,6,'48','2018-01-06 21:45:12','::1',0),(55,6,'48','2018-01-06 21:45:16','::1',0),(56,4,'50','2018-01-06 21:46:33','::1',0),(57,4,'50','2018-01-06 21:46:57','::1',0),(58,3,'50','2018-01-06 21:52:16','::1',0),(59,3,'50','2018-01-06 21:52:17','::1',0),(60,3,'50','2018-01-06 21:52:24','::1',0),(61,3,'48','2018-01-06 21:54:02','::1',0),(62,3,'48','2018-01-06 21:54:04','::1',0),(63,4,'50','2018-01-07 17:45:27','::1',0),(64,6,'48','2018-01-23 17:34:18','::1',0),(65,0,'48','2018-01-23 17:42:56','::1',0),(66,0,'54','2018-01-23 17:43:55','::1',0),(67,3,'47','2018-01-23 17:46:51','::1',0),(68,6,'47','2018-01-23 17:47:02','::1',0),(69,3,'55','2018-01-23 17:54:16','::1',0),(70,4,'55','2018-01-23 18:27:38','::1',0),(71,4,'52','2018-01-23 18:30:17','::1',0),(72,4,'52','2018-01-23 18:30:18','::1',0),(73,4,'55','2018-01-23 18:31:34','::1',0),(74,4,'49','2018-01-23 18:32:18','::1',0),(75,4,'49','2018-01-23 18:34:38','::1',0),(76,4,'55','2018-01-23 18:34:47','::1',0),(77,6,'55','2018-01-23 18:37:28','::1',0),(78,4,'55','2018-01-23 19:51:36','::1',0),(79,6,'55','2018-01-23 19:52:42','::1',0);
/*!40000 ALTER TABLE `audit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(100) NOT NULL,
  `smtp_server` varchar(100) NOT NULL,
  `smtp_port` int(10) NOT NULL,
  `email_login` varchar(150) NOT NULL,
  `email_pass` varchar(100) NOT NULL,
  `from_name` varchar(100) NOT NULL,
  `from_email` varchar(150) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `verify_url` varchar(255) NOT NULL,
  `email_act` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,'User Spice','mail.userspice.com',587,'noreply@userspice.com','password','Your Name','noreply@userspice.com','tls','http://localhost/us4/',0);
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stripe_ts` varchar(255) NOT NULL,
  `stripe_tp` varchar(255) NOT NULL,
  `stripe_ls` varchar(255) NOT NULL,
  `stripe_lp` varchar(255) NOT NULL,
  `recap_pub` varchar(100) NOT NULL,
  `recap_pri` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keys`
--

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_threads`
--

DROP TABLE IF EXISTS `message_threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_to` int(11) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `msg_subject` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_threads`
--

LOCK TABLES `message_threads` WRITE;
/*!40000 ALTER TABLE `message_threads` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_from` int(11) NOT NULL,
  `msg_to` int(11) NOT NULL,
  `msg_body` text NOT NULL,
  `msg_read` int(1) NOT NULL,
  `msg_thread` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  `sent_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(100) NOT NULL,
  `private` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'index.php',0),(2,'z_us_root.php',0),(3,'users/account.php',1),(4,'users/admin.php',1),(5,'users/admin_page.php',1),(6,'users/admin_pages.php',1),(7,'users/admin_permission.php',1),(8,'users/admin_permissions.php',1),(9,'users/admin_user.php',1),(10,'users/admin_users.php',1),(11,'users/edit_profile.php',1),(12,'users/email_settings.php',1),(13,'users/email_test.php',1),(14,'users/forgot_password.php',0),(15,'users/forgot_password_reset.php',0),(16,'users/index.php',0),(17,'users/init.php',0),(18,'users/join.php',0),(19,'users/joinThankYou.php',0),(20,'users/login.php',0),(21,'users/logout.php',0),(22,'users/profile.php',1),(23,'users/times.php',0),(24,'users/user_settings.php',1),(25,'users/verify.php',0),(26,'users/verify_resend.php',0),(27,'users/view_all_users.php',1),(28,'usersc/empty.php',0),(31,'users/oauth_success.php',0),(33,'users/fb-callback.php',0),(37,'users/check_updates.php',1),(38,'users/google_helpers.php',0),(39,'users/tomfoolery.php',1),(40,'users/create_message.php',1),(41,'users/messages.php',1),(42,'users/message.php',1),(44,'users/admin_backup.php',1),(45,'users/maintenance.php',0),(47,'cadastrar_paciente.php',1),(48,'pesquisar_paciente.php',1),(49,'cadastrar_triagem.php',1),(50,'pesquisar_triagem.php',1),(51,'visualizar_triagem.php',1),(52,'visualizar_espera.php',1),(53,'cadastrar_diagnostico.php',1),(54,'atualizar_paciente.php',1),(55,'menu.php',1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_page_matches`
--

DROP TABLE IF EXISTS `permission_page_matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_page_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(15) NOT NULL,
  `page_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_page_matches`
--

LOCK TABLES `permission_page_matches` WRITE;
/*!40000 ALTER TABLE `permission_page_matches` DISABLE KEYS */;
INSERT INTO `permission_page_matches` VALUES (2,2,27),(3,1,24),(4,1,22),(5,2,13),(6,2,12),(7,1,11),(8,2,10),(9,2,9),(10,2,8),(11,2,7),(12,2,6),(13,2,5),(14,2,4),(15,1,3),(16,2,37),(17,2,39),(19,2,40),(21,2,41),(23,2,42),(27,1,42),(28,1,27),(29,1,41),(30,1,40),(31,2,44),(37,2,46),(42,5,47),(45,2,50),(46,2,51),(47,5,48),(48,7,51),(49,7,50),(50,7,49),(51,2,52),(52,7,52),(53,6,53),(54,6,51),(55,6,50),(56,5,54),(58,2,55),(62,5,52);
/*!40000 ALTER TABLE `permission_page_matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'User'),(2,'Administrator'),(5,'Recepcionista'),(6,'Outorgante'),(7,'Enfermeiro');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,1,'<h1>This is the Admin\'s bio.</h1>'),(2,2,'This is your bio'),(3,3,'This is your bio'),(4,4,'This is your bio'),(6,6,'This is your bio');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `recaptcha` int(1) NOT NULL DEFAULT '0',
  `force_ssl` int(1) NOT NULL,
  `login_type` varchar(20) NOT NULL,
  `css_sample` int(1) NOT NULL,
  `us_css1` varchar(255) NOT NULL,
  `us_css2` varchar(255) NOT NULL,
  `us_css3` varchar(255) NOT NULL,
  `css1` varchar(255) NOT NULL,
  `css2` varchar(255) NOT NULL,
  `css3` varchar(255) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `language` varchar(255) NOT NULL,
  `track_guest` int(1) NOT NULL,
  `site_offline` int(1) NOT NULL,
  `force_pr` int(1) NOT NULL,
  `reserved1` varchar(100) NOT NULL,
  `reserverd2` varchar(100) NOT NULL,
  `custom1` varchar(100) NOT NULL,
  `custom2` varchar(100) NOT NULL,
  `custom3` varchar(100) NOT NULL,
  `glogin` int(1) NOT NULL DEFAULT '0',
  `fblogin` int(1) NOT NULL,
  `gid` varchar(255) NOT NULL,
  `gsecret` varchar(255) NOT NULL,
  `gredirect` varchar(255) NOT NULL,
  `ghome` varchar(255) NOT NULL,
  `fbid` varchar(255) NOT NULL,
  `fbsecret` varchar(255) NOT NULL,
  `fbcallback` varchar(255) NOT NULL,
  `graph_ver` varchar(255) NOT NULL,
  `finalredir` varchar(255) NOT NULL,
  `req_cap` int(1) NOT NULL,
  `req_num` int(1) NOT NULL,
  `min_pw` int(2) NOT NULL,
  `max_pw` int(3) NOT NULL,
  `min_un` int(2) NOT NULL,
  `max_un` int(3) NOT NULL,
  `messaging` int(1) NOT NULL,
  `snooping` int(1) NOT NULL,
  `echouser` int(11) NOT NULL,
  `wys` int(1) NOT NULL,
  `change_un` int(1) NOT NULL,
  `backup_dest` varchar(255) NOT NULL,
  `backup_source` varchar(255) NOT NULL,
  `backup_table` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,0,0,'',1,'../users/css/color_schemes/standard.css','../users/css/sb-admin.css','../users/css/custom.css','','','','UserSpice','en',1,0,0,'','','','','',0,0,'Google ID Here','Google Secret Here','http://localhost/userspice/users/oauth_success.php','http://localhost/userspice/','FB ID Here','FB Secret Here','http://localhost/userspice/users/fb-callback.php','v2.2','account.php',1,1,6,20,2,40,0,1,0,1,0,'','','');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ciap`
--

DROP TABLE IF EXISTS `tb_ciap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ciap` (
  `cd_ciap` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sintoma` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cd_ciap`)
) ENGINE=InnoDB AUTO_INCREMENT=687 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ciap`
--

LOCK TABLES `tb_ciap` WRITE;
/*!40000 ALTER TABLE `tb_ciap` DISABLE KEYS */;
INSERT INTO `tb_ciap` VALUES (1,'A01 Dor generalizada /múltipla'),(2,'A02 Arrepios/ calafrios'),(3,'A03 Febre'),(4,'A04 Debilidade/cansaço geral/fadiga'),(5,'A05 Sentir-se doente'),(6,'A06 Desmaio/síncope'),(7,'A07 Coma'),(8,'A08 Inchaço'),(9,'A09 Problemas de sudorese'),(10,'A10 Sangramento/Hemorragia NE'),(11,'A11 Dores torácicas NE'),(12,'A13 Receio/Medo do tratamento'),(13,'A16 Criança irritável'),(14,'A18 Preocupação com aparência'),(15,'A20 Pedido/discussão eutanásia'),(16,'A21 Fator de risco de malignidade'),(17,'A23 Fator de risco NE'),(18,'A25 Medo de morrer/medo da morte'),(19,'A26 Medo de câncer NE'),(20,'A27 Medo de outra doença NE'),(21,'A28 Limitação funcional/incapacidade NE'),(22,'A29 Outros sinais/sintomas gerais'),(23,'A70 Tuberculose'),(24,'A71 Sarampo'),(25,'A72 Varicela'),(26,'A73 Malária'),(27,'A74 Rubéola'),(28,'A75 Mononucleose infecciosa'),(29,'A76 Outro exantema viral'),(30,'A77 Dengue e outras doenças virais NE'),(31,'A78 Hanseníase e outras doenças infecciosas NE'),(32,'A79 Carcinomatose (calização primária desconhecida)'),(33,'A80 Lesão traumática/acidente NE'),(34,'A81 Politraumatismos/ferimentos múltiplos'),(35,'A82 Efeito secundário de lesão traumática'),(36,'A84 Intoxicação por medicamento'),(37,'A85 Efeito adverso de fármaco dose correta'),(38,'A86 Efeito tóxico de substância não medicinal'),(39,'A87 Complicações de tratamento médico'),(40,'A88 Efeito adverso de fator físico'),(41,'A89 Efeito da prótese'),(42,'A90 Malformação congênita NE/múltiplas'),(43,'A91 Investigação com resultado anormal NE'),(44,'A92 Alergia/reação alérgica NE'),(45,'A93 Recém-nascido prematuro'),(46,'A94 Morbidade perinatal, outra'),(47,'A95 Mortalidade perinatal'),(48,'A96 Morte'),(49,'A97 Sem doença'),(50,'A98 Medicina preventiva/manutenção da saúde'),(51,'A99 Outras doenças gerais NE'),(52,'B02 Gânglio linfático aumentado/doloroso'),(53,'B04 Sinais/sintomas sangue'),(54,'B25 Medo de VIH/ HIV/SIDA/ AIDS'),(55,'B26 Medo de câncer no sangue/linfático'),(56,'B27 Medo de outras doenças do sangue /vasos linfáticos'),(57,'B28 Limitação funcional/incapacidade'),(58,'B29 Outros sinais/ sintomas do sangue/ sistema linfático/ baço NE'),(59,'B70 Linfadenite aguda'),(60,'B71 Linfadenite crônica NE'),(61,'B72 Doença de Hodgkin/linfomas'),(62,'B73 Leucemia'),(63,'B74 Outra neoplasia maligna no sangue'),(64,'B75 Neoplasia benigna NE'),(65,'B76 Rotura traumática do baço'),(66,'B77 Outras lesõestraumáticas do sangue/linfa/baço'),(67,'B78 Anemia hemolítica hereditária'),(68,'B79 Outra malformação congênita do sangue/linfática'),(69,'B80 Anemia por deficiência de ferro'),(70,'B81 Anemia perniciosa/deficiência de folatos'),(71,'B82 Outras anemias NE'),(72,'B83 Púrpura/defeitos de coagulação'),(73,'B84 Glóbulos brancos anormais'),(74,'B87 Esplenomegalia'),(75,'B90 Infecção por VIH/ HIV/SIDA/ AIDS'),(76,'B99 Outra doença do sangue/linfáticos/baço'),(77,'D01 Dor abdominal generalizada/cólicas'),(78,'D02 Dores abdominais, epigástricas'),(79,'D03 Azia/ Queimação'),(80,'D04 Dor anal/retal'),(81,'D05 Irritação perianal'),(82,'D06 Outras dores abdominais localizadas'),(83,'D07 Dispepsia/indigestão'),(84,'D08 Flatulência /gases/eructações'),(85,'D09 Náusea'),(86,'D10 Vomito'),(87,'D11 Diarreia'),(88,'D12 Obstipação'),(89,'D13 Icterícia'),(90,'D14 Hematêmese/vômito sangue'),(91,'D15 Melena'),(92,'D16 Hemorragia retal'),(93,'D17 Incontinência fecal'),(94,'D18 Alterações nas fezes/mov. intestinais'),(95,'D19 Sinais/sintomas dos dentes/gengivas'),(96,'D20 Sinais/sintomas da boca/língua/lábios'),(97,'D21 Problemas de deglutição'),(98,'D23 Hepatomegalia'),(99,'D24 Massa abdominal NE'),(100,'D25 Distensão abdominal'),(101,'D26 Medo de câncer no aparelho digestivo'),(102,'D27 Medo de outras doenças aparelho digestivo'),(103,'D28 Limitação funcional/incapacidade'),(104,'D29 Outros sinais/sintomas digestivos'),(105,'D70 Infecção gastrointestinal'),(106,'D71 Caxumba/parotidite epidêmica'),(107,'D72 Hepatite viral'),(108,'D73 Gastroenterite, presumível infecção'),(109,'D74 Neoplasia maligna do estômago'),(110,'D75 Neoplasia maligna do cólon/reto'),(111,'D76 Neoplasia maligna do pâncreas'),(112,'D77 Neoplasia maligna do aparelho digestivo NE'),(113,'D78 Neoplasia benigna do aparelho digestivo/incerta'),(114,'D79 Corpo estranho no aparelho digestivo'),(115,'D80 Outras lesões traumáticas'),(116,'D81 Malformações congênitasdo aparelho digestivo'),(117,'D82 Doença dos dentes/gengivas'),(118,'D83 Doença da boca/língua/lábios'),(119,'D84 Doença do esôfago'),(120,'D85 Úlcera do duodeno'),(121,'D86 Úlcera péptica, outra'),(122,'D87 Alterações funcionais estômago'),(123,'D88 Apendicite'),(124,'D89 Hérnia inguinal'),(125,'D90 Hérnia de hiato /diafragmática'),(126,'D91 Hérnia abdominal, outras'),(127,'D92 Doença diverticular intestinal'),(128,'D93 Síndrome do cólon irritável'),(129,'D94 Enterite crônica / colite ulcerosa'),(130,'D95 Fissura anal / abcesso perianal'),(131,'D96 Lombrigas /outros parasitas'),(132,'D97 Doenças do fígado /NE'),(133,'D98 Colecistite, colelitíase'),(134,'D99 Outra doença do aparelho digestivo'),(135,'F01 Dor no olho'),(136,'F02 Olho vermelho'),(137,'F03 Secreção ocular'),(138,'F04 Moscas volantes/pontos luminosos/escotomas/manchas'),(139,'F05 Outras perturbações visuais'),(140,'F13 Sensações oculares anormais'),(141,'F14 Movimentos oculares anormais'),(142,'F15 Aparência anormal nos olhos'),(143,'F16 Sinais/sintomas das pálpebras'),(144,'F17 Sinais/sintomas relacionados a óculos'),(145,'F18 Sinais/sintomasrelacionados a lentesde contato'),(146,'F27 Medo de doença ocular'),(147,'F28 Limitação funcional/incapacidade'),(148,'F29 Outros sinais/sintomas oculares'),(149,'F70 Conjuntivite infecciosa'),(150,'F71 Conjuntivite alérgica'),(151,'F72 Blefarite/hordéolo/calázio'),(152,'F73 Outras infecções/inflamações oculares'),(153,'F74 Neoplasia do olho/anexos'),(154,'F75 Contusão/hemorragia ocular'),(155,'F76 Corpo estranho ocular'),(156,'F79 Outras lesões traumáticas oculares'),(157,'F80 Obstrução canal lacrimal da criança'),(158,'F81 Outras malformações congênitas do olho'),(159,'F82 Descolamento da retina'),(160,'F83 Retinopatia'),(161,'F84 Degeneração macular'),(162,'F85 Ulcera da córnea'),(163,'F86 Tracoma'),(164,'F91 Erro de refração'),(165,'F92 Catarata'),(166,'F93 Glaucoma'),(167,'F94 Cegueira'),(168,'F95 Estrabismo'),(169,'F99 Outra doenças oculares/anexos'),(170,'H01 Dor de ouvidos'),(171,'H02 Problemas de audição'),(172,'H03 Acufeno, zumbidos, ruído, assobios'),(173,'H04 Secreção no ouvido'),(174,'H05 Hemorragia no ouvido'),(175,'H13 Sensação de ouvido tapado'),(176,'H15 Preocupação com a aparência das orelhas'),(177,'H27 Medo de doença do ouvido'),(178,'H28 Limitação funcional/incapacidade'),(179,'H29 Outros sinais/sintomas ouvido'),(180,'H70 Otite externa'),(181,'H71 Otite media aguda/miringite'),(182,'H72 Otite média serosa'),(183,'H73 Infecção da Trompa de Eustáquio'),(184,'H74 Otite media crônica'),(185,'H75 Neoplasia do ouvido'),(186,'H76 Corpo estranho do ouvido'),(187,'H77 Perfuração do tímpano'),(188,'H78 Fibrilação/flutter auricular/atrial'),(189,'H79 Outros traumatismos do ouvido'),(190,'H80 Malformações congênitas do ouvido'),(191,'H81 Cerúmen no ouvido em excesso'),(192,'H82 Síndrome vertiginosa'),(193,'H83 Otoesclerose'),(194,'H84 Presbiacusia'),(195,'H85 Lesão acústica'),(196,'H86 Surdez'),(197,'H99 Outra doença do ouvido/mastóide'),(198,'K01 Dor atribuída ao coração'),(199,'K02 Sensação de pressão/aperto atribuída ao coração'),(200,'K03 Dores atribuídas ao aparelho circulatório NE'),(201,'K04 Palpitações/percepção dos batimentos cardíacos'),(202,'K05 Outras irregularidades dos batimentos cardíacos'),(203,'K06 Veias proeminentes'),(204,'K07 Tornozelos inchados/edema'),(205,'K22 Fator de risco para doença cardiovascular'),(206,'K24 Medo de doença cardíaca'),(207,'K25 Medo de hipertensão'),(208,'K27 Medo de outra doença cardiovascular'),(209,'K28 Limitação funcional/incapacidade'),(210,'K29 Outros sinais/sintomas cardiovasculares'),(211,'K70 Doença infecciosa do aparelho circulatório'),(212,'K71 Febre reumática/cardiopatia'),(213,'K72 Neoplasia do aparelho circulatório'),(214,'K73 Malformações congênitas do aparelho circulatório'),(215,'K74 Doença cardíaca isquêmica com angina'),(216,'K75 Infarto ou Enfarte agudo miocárdio'),(217,'K76 Doença cardíaca isquémica sem angina'),(218,'K77 Insuficiência cardíaca'),(219,'K78 Fibrilação/flutter auricular/atrial'),(220,'K79 Taquicardia Paroxística'),(221,'K80 Arritmia cardíaca NE'),(222,'K81 Sopro cardíaco/arterial NE'),(223,'K82 Doença cardiopulmonar'),(224,'K83 Doença valvular cardíaca NE'),(225,'K84 Outras doenças cardíacas'),(226,'K85 Pressão arterial elevada'),(227,'K86 Hipertensão sem complicações'),(228,'K87 Hipertensão com complicações'),(229,'K88 Hipotensão postural'),(230,'K89 Isquemia/ acidente cerebral transitória'),(231,'K90 Trombose/acidente vascular cerebral'),(232,'K91 Doença vascular cerebral'),(233,'K92 Aterosclerose/doença vascular periférica'),(234,'K93 Embolia pulmonar'),(235,'K94 Flebite/tromboflebite'),(236,'K95 Veias varicosas da perna'),(237,'K96 Hemorróidas'),(238,'K99 Outras doenças do aparelho circulatório'),(239,'L01 Sinais/sintomas do pescoço'),(240,'L02 Sinais/sintomas da região dorsal'),(241,'L03 Sinais/sintomas da região lombar'),(242,'L04 Sinais/sintomas do tórax'),(243,'L05 Sinais/sintomas da axila'),(244,'L07 Sinais/sintomas da mandíbula'),(245,'L08 Sinais/sintomas dos ombros'),(246,'L09 Sinais/sintomas dos braços'),(247,'L10 Sinais/sintomas dos cotovelos'),(248,'L11 Sinais/sintomas dos punhos'),(249,'L12 Sinais/sintomas das mãos e dedos'),(250,'L13 Sinais/sintomas do quadril'),(251,'L14 Sinais/sintomas da coxa/perna'),(252,'L15 Sinais/sintomas do joelho'),(253,'L16 Sinais/sintomas do tornozelo'),(254,'L17 Sinais/sintomas do pé/dedos pé'),(255,'L18 Dores musculares'),(256,'L19 Sinais/sintomas musculares NE'),(257,'L20 Sinais/sintomas das articulações NE'),(258,'L26 Medo de câncer no aparelho músculoesquelético'),(259,'L27 Medo de doença no aparelho músculoesquelético,outro'),(260,'L28 Limitação funcional/incapacidade'),(261,'L29 Outros sinais/sintomas do aparelho músculo-esquelético'),(262,'L70 Infecções do aparelho músculo-esquelético'),(263,'L71 Neoplasia maligna do aparelho músculoesquelético'),(264,'L72 Fratura: rádio/cúbito'),(265,'L73 Fratura: tíbia/perônio/ fíbula'),(266,'L74 Fratura: osso da mão/pé'),(267,'L75 Fratura: fêmur'),(268,'L76 Outras fraturas'),(269,'L77 Entorses e distensões do tornozelo'),(270,'L78 Entorses e distensões do joelho'),(271,'L79 Entorses e distensões das articulações NE'),(272,'L80 Luxação/subluxação'),(273,'L81 Traumatismos do aparelho musculoesquelético NE'),(274,'L82 Malformações congênitas do aparelhomúsculo-esquelético'),(275,'L83 Doenças ou síndromes da coluna cervical'),(276,'L84 Doenças ou síndromes da coluna sem irradiação de dor'),(277,'L85 Deformação adquirida da coluna'),(278,'L86 Síndrome vertebral com irradiação dor'),(279,'L87 Bursite/tendinite/sinovite NE'),(280,'L88 Artrite reumatóide/soropositiva'),(281,'L89 Osteoartrose do quadril'),(282,'L90 Osteoartrose do joelho'),(283,'L91 Outras osteoartroses'),(284,'L92 Síndrome do ombro doloroso'),(285,'L93 Cotovelo de tenista'),(286,'L94 Osteocondrose'),(287,'L95 Osteoporose'),(288,'L96 Lesão interna aguda do joelho'),(289,'L97 Neoplasia benigna/incertas'),(290,'L98 Malformação adquirida de um membro'),(291,'L99 Outra doença doaparelho músculo-esquelético'),(292,'N01 Cefaléia'),(293,'N03 Dores da face'),(294,'N04 Síndrome das pernas inquietas'),(295,'N05 Formigamento/ parestesia nos dedos das mãos/pés'),(296,'N06 Outras alterações da sensibilidade'),(297,'N07 Convulsões/ataques'),(298,'N08 Movimentos involuntários anormais'),(299,'N16 Alterações do olfato/gosto'),(300,'N17 Vertigens/tonturas'),(301,'N18 Paralisia/fraqueza'),(302,'N19 Perturbações da fala'),(303,'N26 Medo de câncer do sistema neurológico'),(304,'N27 Medo de outras doenças neurológicas'),(305,'N28 Limitação funcional/incapacidade'),(306,'N29 Sinais/sintomas do sistema neurológico,outros'),(307,'N70 Poliomielite'),(308,'N71 Meningite/encefalite'),(309,'N72 Tétano'),(310,'N73 Outra infecção neurológica'),(311,'N74 Neoplasia maligna do sistema neurológico'),(312,'N75 Neoplasia benigna do sistema neurológico'),(313,'N76 Neoplasia do sistema neurológico de natureza'),(314,'N79 Concussão'),(315,'N80 Outras lesões cranianas'),(316,'N81 Outra lesão do sistema neurológico'),(317,'N85 Malformações congênitas'),(318,'N86 Esclerose múltipla'),(319,'N87 Parkinsonismo'),(320,'N88 Epilepsia'),(321,'N89 Enxaqueca'),(322,'N90 Cefaléia de cluster'),(323,'N91 Paralisia facial/paralisia de Bell'),(324,'N92 Nevralgia do trigêmio'),(325,'N93 Síndrome do túnel do carpo/ Síndrome do canal cárpico'),(326,'N94 Neurite/ Nevrite/neuropatia periférica'),(327,'N95 Cefaléia tensional'),(328,'N99 Outras doenças do sistema neurológico'),(329,'P01 Sensação de ansiedade/nervosismo/tensão'),(330,'P02 Reação aguda ao estresse'),(331,'P03 Tristeza/ Sensação de depressão'),(332,'P04 Sentir/comportar-se de forma irritável/zangada'),(333,'P05 Sensação/comportamento senil'),(334,'P06 Perturbação do sono'),(335,'P07 Diminuição do desejo sexual'),(336,'P08 Diminuição da satisfação sexual'),(337,'P09 Preocupação com a preferência sexual'),(338,'P10 Gaguejar/balbuciar/tiques'),(339,'P11 Problemas de alimentação da criança'),(340,'P12 Molhar a cama/enurese'),(341,'P13 Encoprese/outros problemas de incontinência fecal'),(342,'P15 Abuso crônico de álcool'),(343,'P16 Abuso agudo de álcool'),(344,'P17 Abuso do tabaco'),(345,'P18 Abuso de medicação'),(346,'P19 Abuso de drogas'),(347,'P20 Alterações da memória'),(348,'P22 Sinais/sintomas relacionados ao comportamento da criança'),(349,'P23 Sinais/sintomas relacionados ao comportamento do adolescente'),(350,'P24 Dificuldades específicas de aprendizagem'),(351,'P25 Problemas da fase de vida de adulto'),(352,'P27 Medo de perturbações mentais'),(353,'P28 Limitação funcional/incapacidade'),(354,'P29 Sinais/sintomas psicológicos, outros'),(355,'P70 Demência'),(356,'P71 Outras psicoses orgânicas NE'),(357,'P72 Esquizofrenia'),(358,'P73 Psicose afetiva'),(359,'P74 Distúrbio ansioso/estado de ansiedade'),(360,'P75 Somatização'),(361,'P76 Perturbações depressivas'),(362,'P77 Suicídio/tentativa de suicídio'),(363,'P78 Neurastenia'),(364,'P79 Fobia/perturbação compulsiva'),(365,'P80 Perturbações de personalidade'),(366,'P81 Perturbação hipercinética'),(367,'P82 Estresse pós-traumático'),(368,'P85 Retardo/ Atraso mental'),(369,'P86 Anorexia nervosa, bulimia'),(370,'P98 Outras psicoses NE'),(371,'P99 Outras perturbações psicológicas'),(372,'R01 Dor atribuída ao aparelho respiratório'),(373,'R02 Dificuldade respiratória, dispneia'),(374,'R03 Respiração ruidosa'),(375,'R04 Outros problemas respiratórios'),(376,'R05 Tosse'),(377,'R06 Hemorragia nasal/epistaxe'),(378,'R07 Espirro/congestão nasal'),(379,'R08 Outros sinais/sintomas nasais'),(380,'R09 Sinais/sintomas dos seios paranasais'),(381,'R21 Sinais/sintomas da garganta'),(382,'R23 Sinais/sintomas da voz'),(383,'R24 Hemoptise'),(384,'R25 Expectoração/mucosidade anormal'),(385,'R26 Medo de câncer do aparelho respiratório'),(386,'R27 Medo de outras doenças respiratórias'),(387,'R28 Limitação funcional/incapacidade'),(388,'R29 Sinais/sintomas do aparelho respiratório, outros'),(389,'R71 Tosse convulsa/ pertussis'),(390,'R72 Infecção estreptocócica da orofaringe'),(391,'R73 Abscesso/furúnculo no nariz'),(392,'R74 Infecção aguda do aparelho respiratório superior (AS)'),(393,'R75 Sinusite crônica/aguda'),(394,'R76 Amigdalite aguda'),(395,'R77 Laringite/traqueíte aguda'),(396,'R78 Bronquite/bronquiolite aguda'),(397,'R79 Bronquite crônica'),(398,'R80 Gripe'),(399,'R81 Pneumonia'),(400,'R82 Pleurite/derrame pleural'),(401,'R83 Outra infecção respiratória'),(402,'R84 Neoplasia maligna dos brônquios/pulmão'),(403,'R85 Outra neoplasia respiratória maligna'),(404,'R86 Neoplasia benigna respiratória'),(405,'R87 Corpo estranho nariz/laringe/brônquios'),(406,'R88 Outra lesão respiratória'),(407,'R89 Malformação congênita do aparelhorespiratório'),(408,'R90 Hipertrofia das amígdalas/adenóides'),(409,'R92 Neoplasia respiratória NE'),(410,'R95 Doença pulmonar obstrutiva crônica'),(411,'R96 Asma'),(412,'R97 Rinite alérgica'),(413,'R98 Síndrome de hiperventilação'),(414,'R99 Outras doenças respiratórias'),(415,'S01 Dor/sensibilidade dolorosa da pele'),(416,'S02 Prurido'),(417,'S03 Verrugas'),(418,'S04 Tumor/inchaço localizado'),(419,'S05 Tumores/inchaços generalizados'),(420,'S06 Erupção cutânea localizada'),(421,'S07 Erupção cutânea generalizada'),(422,'S08 Alterações da cor da pele'),(423,'S09 Infecção dos dedos das mãos/pés'),(424,'S10 Furúnculo/carbúnculo'),(425,'S11 Infecção pós-traumática da pele'),(426,'S12 Picada ou mordedura de inseto'),(427,'S13 Mordedura animal/humana'),(428,'S14 Queimadura/escaldão'),(429,'S15 Corpo estranho na pele'),(430,'S16 Traumatismo/contusão'),(431,'S17 Abrasão/arranhão/bolhas'),(432,'S18 Laceração/corte'),(433,'S19 Outra lesão cutânea'),(434,'S20 Calos/calosidades'),(435,'S21 Sinais/sintomas da textura da pele'),(436,'S22 Sinais/sintomas das unhas'),(437,'S23 Queda de cabelo/calvície'),(438,'S24 Sinais/sintomas do cabelo/couro cabeludo'),(439,'S26 Medo de câncer de pele'),(440,'S27 Medo de outra doença da pele'),(441,'S28 Limitação funcional/incapacidade'),(442,'S29 Sinais/sintomas da pele, outros'),(443,'S70 Herpes zoster'),(444,'S71 Herpes simples'),(445,'S72 Escabiose/outras acaríases'),(446,'S73 Pediculose/outras infecções da pele'),(447,'S74 Dermatofitose'),(448,'S75 Monilíase oral/candidíase na pele'),(449,'S76 Outras infecções da pele'),(450,'S77 Neoplasias malignas da pele'),(451,'S78 Lipoma'),(452,'S79 Neoplasia cutânea benigna/incerta'),(453,'S80 Ceratose/ Queratose solar/queimadura solar'),(454,'S81 Hemangioma/linfangioma'),(455,'S82 Nevos/sinais da pele'),(456,'S83 Lesões da pele congênitas, outras'),(457,'S84 Impetigo'),(458,'S85 Cisto pilonidal/fistula'),(459,'S86 Dermatite seborréica'),(460,'S87 Dermatite/eczema atópico'),(461,'S88 Dermatite de contato/alérgica'),(462,'S89 Dermatite das fraldas'),(463,'S90 Pitiríase rosada'),(464,'S91 Psoríase'),(465,'S92 Doença das glândulas sudoríparas'),(466,'S93 Cisto sebáceo'),(467,'S94 Unha encravada'),(468,'S95 Molusco contagioso'),(469,'S96 Acne'),(470,'S97 Úlcera crônica da pele'),(471,'S98 Urticária'),(472,'S99 Outras doenças da pele'),(473,'T01 Sede excessiva'),(474,'T02 Apetite excessivo'),(475,'T03 Perda de apetite'),(476,'T04 Problemas alimentares de lactente/criança'),(477,'T05 Problemas alimentares do adulto'),(478,'T07 Aumento de peso'),(479,'T08 Perda de peso'),(480,'T10 Atraso do crescimento'),(481,'T11 Desidratação'),(482,'T26 Medo de câncer do sistema endócrino'),(483,'T27 Medo de outra doença endócrina/metabólica'),(484,'T28 Limitação funcional/incapacidade'),(485,'T29 Sinais/sintomas endocrinológicos/metabólicos/nutricionais, outros'),(486,'T70 Infecção endócrina'),(487,'T71 Neoplasia maligna da tiroide'),(488,'T72 Neoplasia benigna da tiroide'),(489,'T73 Outra neoplasia endócrina NE'),(490,'T78 Cisto do canal tiroglosso'),(491,'T80 Malformaçãocongénita endócrina/metabólica'),(492,'T81 Bócio'),(493,'T82 Obesidade'),(494,'T83 Excesso de peso'),(495,'T85 Hipertiroidismo/tireotoxicose'),(496,'T86 Hipotiroidismo/mixedema'),(497,'T87 Hipoglicemia'),(498,'T89 Diabetes insulino-dependente'),(499,'T90 Diabetes não insulino-dependente'),(500,'T91 Deficiência Vitamínica/Nutricional'),(501,'T92 Gota'),(502,'T93 Alteração no metabolismo dos lipídios'),(503,'T99 Outras doenças endocrinológica/metabólica/nutricionais'),(504,'U01 Disúria/micção dolorosa'),(505,'U02 Micção frequente/urgência urinária/ polaciúria'),(506,'U04 Incontinência urinária'),(507,'U05 Outros problemas com a micção'),(508,'U06 Hematúria'),(509,'U07 Outros sinais/sintomas urinários'),(510,'U08 Retenção urinária'),(511,'U13 Sinais/sintomas da bexiga, outros'),(512,'U14 Sinais/sintomas dos rins'),(513,'U26 Medo de câncer no aparelho urinário'),(514,'U27 Medo de outra doença urinária'),(515,'U28 Limitação funcional/incapacidade'),(516,'U29 Sinais/sintomas aparelho urinário, outros'),(517,'U70 Pielonefrite'),(518,'U71 Cistite/outra infecção urinária'),(519,'U72 Uretrite'),(520,'U75 Neoplasia maligna do rim'),(521,'U76 Neoplasia benigna do rim'),(522,'U77 Neoplasia maligna do aparelho urinário, outra'),(523,'U78 Neoplasia benigna do aparelho urinário'),(524,'U79 Neoplasia do aparelho urinário NE'),(525,'U80 Lesões traumáticas do aparelho urinário'),(526,'U85 Malformação congênita do aparelho urinário'),(527,'U88 Glomerulonefrite/ síndrome nefrótica'),(528,'U90 Albuminúria/proteinúria ortostática'),(529,'U95 Cálculo urinário'),(530,'U98 Análise de urina anormal NE'),(531,'U99 Outras doenças urinárias'),(532,'W01 Questão sobre gravidez'),(533,'W02 Medo de estar grávida'),(534,'W03 Hemorragia antes do parto'),(535,'W05 Vômitos/náuseas durante a gravidez'),(536,'W10 Contracepção pós-coital'),(537,'W11 Contracepção oral'),(538,'W12 Contracepção intra-uterina/ Dispositivo Intrauterino/ DIU'),(539,'W13 Esterilização'),(540,'W14 Contracepção/outros'),(541,'W15 Infertilidade/subfertildade'),(542,'W17 Hemorragia pós-parto'),(543,'W18 Sinais/sintomas pós-parto'),(544,'W19 Sinais/sintomas da mama/lactação'),(545,'W21 Preocupação com a imagem corporal na gravidez'),(546,'W27 Medo de complicações na gravidez'),(547,'W28 Limitação funcional/incapacidade'),(548,'W29 Sinais/sintomas da gravidez, outros'),(549,'W70 Sepsis/infecção puerperal'),(550,'W71 Infecções que complicam a gravidez'),(551,'W72 Neoplasia maligna relacionada com gravidez'),(552,'W73 Neoplasia benigna/incerta relacionada com a gravidez'),(553,'W75 Lesões traumáticas que complicam a gravidez'),(554,'W76 Malformação congénita que complica a gravidez'),(555,'W78 Gravidez'),(556,'W79 Gravidez não desejada'),(557,'W80 Gravidez ectópica'),(558,'W81 Toxemia gravídica/ DHEG'),(559,'W82 Aborto espontâneo'),(560,'W83 Aborto provocado'),(561,'W84 Gravidez de alto risco'),(562,'W85 Diabetes gestacional'),(563,'W90 Parto sem complicações de nascido vivo'),(564,'W91 Parto sem complicações de natimorto'),(565,'W92 Parto com complicações de nascido vivo'),(566,'W93 Parto com complicações de natimorto'),(567,'W94 Mastite puerperal'),(568,'W95 Outros problemas da mama durante gravidez/puerpério'),(569,'W96 Outras complicações do puerpério'),(570,'W99 Outros problemas da gravidez/parto'),(571,'X01 Dor genital'),(572,'X02 Dores menstruais'),(573,'X03 Dores intermenstruais'),(574,'X04 Relação sexual dolorosa na mulher'),(575,'X05 Menstruação escassa/ausente'),(576,'X06 Menstruação excessiva'),(577,'X07 Menstruação irregular/frequente'),(578,'X08 Hemorragia intermenstrual'),(579,'X09 Sinais/sintomas pré-menstruais'),(580,'X10 Desejo de alterar a data menstruação'),(581,'X11 Sinais/sintomas da menopausa/ climatério'),(582,'X12 Hemorragia pós-menopausa'),(583,'X13 Hemorragia pós-coital'),(584,'X14 Secreção vaginal'),(585,'X15 Sinais/sintomas da vagina'),(586,'X16 Sinais/sintomas da vulva'),(587,'X17 Sinais/sintomas da pélvis feminina'),(588,'X18 Dor na mama feminina'),(589,'X19 Tumor ou nódulo na mama feminina'),(590,'X20 Sinais/sintomas do mamilo da mulher'),(591,'X21 Sinais/sintomas da mama feminina, outros'),(592,'X22 Preocupação com a aparência da mama feminina'),(593,'X23 Medo de doença de transmissão sexual'),(594,'X24 Medo de disfunção sexual'),(595,'X25 Medo de câncer genital'),(596,'X26 Medo de câncer na mama'),(597,'X27 Medo de outra doença genital/mama'),(598,'X28 Limitação funcional/incapacidade'),(599,'X29 Sinais/sintomas do aparelho genital feminino,outra'),(600,'X70 Sífilis feminina'),(601,'X71 Gonorréia feminina'),(602,'X72 Candidíase genital feminina'),(603,'X73 Tricomoníase genital feminina'),(604,'X74 Doença inflamatória pélvica'),(605,'X75 Neoplasia maligna do colo'),(606,'X76 Neoplasia maligna da mama feminina'),(607,'X77 Neoplasia maligna genital feminina, outra'),(608,'X78 Fibromioma uterino'),(609,'X79 Neoplasia benigna da mama feminina/'),(610,'X80 Neoplasia benigna genital'),(611,'X81 Neoplasia genital feminina, outra/NE'),(612,'X82 Lesão traumática genital feminina'),(613,'X83 Malformações congênitas genitais'),(614,'X84 Vaginite/vulvite NE'),(615,'X85 Doença do colo NE'),(616,'X86 Esfregaço de Papanicolau/colpocitologia oncótica anormal'),(617,'X87 Prolapso utero-vaginal'),(618,'X88 Doença fibrocística da mama'),(619,'X89 Síndrome da tensão pré-menstrual'),(620,'X90 Herpes genital feminino'),(621,'X91 Condiloma acuminado feminino'),(622,'X92 Infecção por clamídia'),(623,'X99 Doença genital feminina, outra'),(624,'Y01 Dor no pênis'),(625,'Y02 Dor no escroto/testículos'),(626,'Y03 Secreção uretral'),(627,'Y04 Sinais/sintomas do pênis, outros'),(628,'Y05 Sinais/sintomas do escroto/ testículos, outros'),(629,'Y06 Sinais/sintomas da próstata'),(630,'Y07 Impotência NE'),(631,'Y08 Sinais/sintomas da função sexual masculina, outros'),(632,'Y10 Infertilidade/subfertildade masculina'),(633,'Y13 Esterilização masculina'),(634,'Y14 Planejamento familiar, outros'),(635,'Y16 Sinais/sintomas da mama masculina'),(636,'Y24 Medo de disfunção sexual masculina'),(637,'Y25 Medo de doença sexualmente transmissível'),(638,'Y26 Medo de câncer genital masculino'),(639,'Y27 Medo de doença genital masculina, outra'),(640,'Y28 Limitação funcional/incapacidade'),(641,'Y29 Sinais/sintomas, outros'),(642,'Y70 Sífilis masculina'),(643,'Y71 Gonorréia masculina'),(644,'Y72 Herpes genital'),(645,'Y73 Prostatite/vesiculite seminal'),(646,'Y74 Orquite/epididimite'),(647,'Y75 Balanite/Balanopostite'),(648,'Y76 Condiloma acuminado'),(649,'Y77 Neoplasia maligna da próstata'),(650,'Y78 Neoplasia maligna genital masculina, outra'),(651,'Y79 Neoplasia benigna genital masculina NE'),(652,'Y80 Traumatismo genital masculino, outro'),(653,'Y81 Fimose/prepúcio redundante'),(654,'Y82 Hipospádias'),(655,'Y83 Testículo não descido/ Criptorquidia/ Testículo ectópico'),(656,'Y84 Malformação genital congênita masculina, outra'),(657,'Y85 Hipertrofia benigna da próstata/ hiperplasia prostática benigna'),(658,'Y86 Hidrocele'),(659,'Y99 Doença genital masculina, outra'),(660,'Z01 Pobreza/problemas econômicos'),(661,'Z02 Problemas relacionados a água/alimentação'),(662,'Z03 Problemas de habitação/vizinhança'),(663,'Z04 Problema socio-cultural'),(664,'Z05 Problemas com condições de trabalho'),(665,'Z06 Problemas de desemprego'),(666,'Z07 Problemas relacionados com educação'),(667,'Z08 Problema relacionado com sistema de segurança social'),(668,'Z09 Problema de ordem legal'),(669,'Z10 Problema relacionado com sistema de saúde'),(670,'Z11 Problema relacionado com estar doente'),(671,'Z12 Problema de relacionamento com parceiro/conjugal'),(672,'Z13 Problema comportamental do parceiro/companheiro'),(673,'Z14 Problema por doença do parceiro/companheiro'),(674,'Z15 Perda ou falecimento do parceiro/companheiro'),(675,'Z16 Problema de relacionamento com criança'),(676,'Z18 Problema com criança doente'),(677,'Z19 Perda ou falecimento de criança'),(678,'Z20 Problema de relacionamento com familiares'),(679,'Z21 Problema comportamental de familiar'),(680,'Z22 Problema por doença familiar'),(681,'Z23 Perda/falecimento de familiar'),(682,'Z24 Problema de relacionamento com amigos'),(683,'Z25 Ato ou acontecimento violento'),(684,'Z27 Medo de problema social'),(685,'Z28 Limitação funcional/incapacidade'),(686,'Z29 Problema social NE');
/*!40000 ALTER TABLE `tb_ciap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_diagnostico`
--

DROP TABLE IF EXISTS `tb_diagnostico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_diagnostico` (
  `cd_diagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `ds_avaliacao` text,
  `cd_cid` varchar(30) DEFAULT NULL,
  `ds_prescricao` text,
  `dt_registro` date DEFAULT NULL,
  `hr_registro` time DEFAULT NULL,
  `ic_situacao` varchar(40) DEFAULT NULL,
  `cd_ubs` int(9) DEFAULT NULL,
  `cd_usuario_registro` int(11) DEFAULT NULL,
  `cd_triagem` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_diagnostico`),
  KEY `pk_diagnostico` (`cd_diagnostico`),
  KEY `fk_diagnostico_triagem` (`cd_triagem`),
  KEY `fk_diagnostico_users` (`cd_usuario_registro`),
  KEY `fk_diagnostico_ubs` (`cd_ubs`),
  CONSTRAINT `fk_diagnostico_triagem` FOREIGN KEY (`cd_triagem`) REFERENCES `tb_triagem` (`cd_triagem`),
  CONSTRAINT `fk_diagnostico_ubs` FOREIGN KEY (`cd_ubs`) REFERENCES `tb_ubs` (`cd_ubs`),
  CONSTRAINT `fk_diagnostico_users` FOREIGN KEY (`cd_usuario_registro`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_diagnostico`
--

LOCK TABLES `tb_diagnostico` WRITE;
/*!40000 ALTER TABLE `tb_diagnostico` DISABLE KEYS */;
INSERT INTO `tb_diagnostico` VALUES (33,'Garganta inflamada','CID 10 - A05','Amoxicilina','2017-12-13','21:45:17','Alta sem encaminhamento a UBS',4,3,48),(34,'Dor devido a inflamaÃ§Ã£o na garganta','CID 10 - A05','Amoxicilina','2017-12-13','22:08:40','Alta sem encaminhamento a UBS',4,3,49),(37,'Dores de cabeça devido a sinusite. Requiro Raio X da face para melhor avaliação.','10 - J01.1','1 comprimido de Amoxicilina a cada 12h por 7 dias.','2017-12-28','19:29:44','Alta sem encaminhamento a UBS',4,1,53),(38,'Taquicardia','10 - R44','Repouso durante uma semana.','2017-12-28','19:34:34','Alta sem encaminhamento a UBS',4,1,55),(39,'Conjutivite','10 - J01.1','Colírio durante uma semana.','2017-12-28','19:35:19','Alta sem encaminhamento a UBS',4,1,54),(40,'Dores de cabeça devido a sinusite. Requiro Raio X da face para melhor avaliação.','10 - J01.1','1 comprimido de Amoxicilina a cada 12h por 7 dias.','2018-01-07','18:41:25','Alta sem encaminhamento a UBS',4,1,58),(41,'Paciente com inchaço por todo o corpo devido a picada de abelha','10 - K99','1 comprimido de Amoxicilina a cada 8h por 7 dias.','2018-01-07','18:43:31','Alta com encaminhamento a UBS',4,1,56),(42,'Paciente desmaiou devido a pressão baixa.','10 - k220','Remédio para controlar a pressão e encaminhamento ao cardiologista','2018-01-07','18:44:17','Transferência Hospitalar',4,1,59),(43,'Dores de cabeça devido a sinusite. Requiro Raio X da face para melhor avaliação.','10 - J01.1','1 comprimido de Amoxicilina a cada 12h por 7 dias.','2018-01-07','18:46:08','Alta sem encaminhamento a UBS',4,1,60),(44,'Dores de cabeça devido a sinusite. Requiro Raio X da face para melhor avaliação.','10 - J01.1','Permanecer na ubs por uma noite para melhores avaliações','2018-01-07','18:46:46','Alta com encaminhamento a UBS',4,1,57),(45,'Sangramento devido à acidente','10 - J01.1','Retornar a UBS amanhã para fazer novo curativo.','2018-01-07','18:51:35','Alta com encaminhamento a UBS',4,1,61),(46,'Febre devido a sinusite. Requiro Raio X da face para melhor avaliação.','10 - J01.1','1 comprimido de Amoxicilina a cada 12h por 7 dias.','2018-01-07','21:41:23','Alta sem encaminhamento a UBS',4,1,62),(47,'Conjutivite','10 - J01.6','Colírio 3x ao dia por uma semana.','2018-01-07','21:42:27','Alta sem encaminhamento a UBS',4,1,63);
/*!40000 ALTER TABLE `tb_diagnostico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_espera`
--

DROP TABLE IF EXISTS `tb_espera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_espera` (
  `cd_espera` int(11) NOT NULL AUTO_INCREMENT,
  `ic_finalizada` tinyint(1) DEFAULT NULL,
  `dt_registro` date DEFAULT NULL,
  `hr_registro` time DEFAULT NULL,
  `cd_paciente` int(11) DEFAULT NULL,
  `cd_ubs` int(11) DEFAULT NULL,
  `cd_usuario_registro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_espera`),
  KEY `fk_espera_paciente` (`cd_paciente`),
  KEY `fk_espera_ubs` (`cd_ubs`),
  KEY `fk_espera_users` (`cd_usuario_registro`),
  CONSTRAINT `fk_espera_paciente` FOREIGN KEY (`cd_paciente`) REFERENCES `tb_paciente` (`cd_paciente`),
  CONSTRAINT `fk_espera_ubs` FOREIGN KEY (`cd_ubs`) REFERENCES `tb_ubs` (`cd_ubs`),
  CONSTRAINT `fk_espera_users` FOREIGN KEY (`cd_usuario_registro`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_espera`
--

LOCK TABLES `tb_espera` WRITE;
/*!40000 ALTER TABLE `tb_espera` DISABLE KEYS */;
INSERT INTO `tb_espera` VALUES (11,1,'2018-01-07','16:49:33',28,4,1),(12,1,'2018-01-07','16:49:58',18,4,1),(13,1,'2018-01-07','18:20:27',59,4,NULL),(14,1,'2018-01-07','18:40:38',72,4,1),(15,1,'2018-01-07','18:48:21',77,4,1),(16,1,'2018-01-07','21:36:45',78,4,1),(17,1,'2018-01-07','21:37:49',24,4,1),(18,1,'2018-01-15','15:12:55',14,4,1),(19,1,'2018-01-15','15:12:58',78,4,1),(20,1,'2018-01-15','15:13:05',28,4,1),(21,1,'2018-01-15','16:29:51',18,4,1),(22,1,'2018-01-15','16:29:54',17,4,1),(23,1,'2018-01-15','16:29:59',63,4,1),(24,1,'2018-01-15','23:43:23',29,4,1),(25,1,'2018-01-15','23:47:56',21,4,1),(26,1,'2018-01-15','23:50:30',25,4,1),(27,1,'2018-01-15','23:52:33',63,4,1),(28,1,'2018-01-17','00:27:57',64,4,1),(29,1,'2018-01-17','00:33:14',64,4,1),(30,1,'2018-01-17','00:42:03',64,4,1),(31,1,'2018-01-17','00:42:44',12,4,1),(32,1,'2018-01-17','00:43:43',26,4,1),(33,1,'2018-01-17','00:46:58',65,4,1),(34,1,'2018-01-17','00:58:17',30,4,1),(35,1,'2018-01-17','01:03:22',79,4,1),(36,1,'2018-01-17','01:05:26',80,4,1),(37,1,'2018-01-17','01:08:16',81,4,1),(38,1,'2018-01-18','23:55:45',23,4,1),(39,1,'2018-01-23','16:32:08',60,4,4),(40,0,'2018-01-23','17:47:08',78,4,1),(41,0,'2018-01-23','17:49:25',20,4,1),(42,0,'2018-01-23','17:51:55',80,4,4);
/*!40000 ALTER TABLE `tb_espera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_paciente`
--

DROP TABLE IF EXISTS `tb_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_paciente` (
  `cd_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `cd_cns_paciente` bigint(15) DEFAULT NULL,
  `nm_justificativa` varchar(100) DEFAULT NULL,
  `nm_paciente` varchar(60) DEFAULT NULL,
  `nm_mae` varchar(60) DEFAULT NULL,
  `ic_sexo` varchar(13) NOT NULL,
  `ic_raca` varchar(20) DEFAULT NULL,
  `dt_nascimento` date NOT NULL,
  `nm_pais_nascimento` varchar(40) DEFAULT NULL,
  `nm_municipio_nascimento` varchar(60) DEFAULT NULL,
  `nm_pais_residencia` varchar(40) DEFAULT NULL,
  `nm_municipio_residencia` varchar(60) DEFAULT NULL,
  `cd_cep` varchar(10) DEFAULT NULL,
  `nm_logradouro` varchar(60) DEFAULT NULL,
  `nm_numero_residencia` varchar(10) DEFAULT NULL,
  `nm_complemento` varchar(10) DEFAULT NULL,
  `nm_bairro` varchar(40) DEFAULT NULL,
  `nm_responsavel` varchar(60) DEFAULT NULL,
  `cd_documento_responsavel` varchar(15) DEFAULT NULL,
  `nm_orgao_emissor` varchar(10) DEFAULT NULL,
  `dt_registro` date DEFAULT NULL,
  `hr_registro` time DEFAULT NULL,
  `cd_ubs_referencia` int(9) DEFAULT NULL,
  `cd_ubs` int(9) DEFAULT NULL,
  `cd_usuario_registro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_paciente`),
  KEY `pk_paciente` (`cd_paciente`),
  KEY `fk_paciente_users` (`cd_usuario_registro`),
  KEY `fk_paciente_ubs_referencia` (`cd_ubs_referencia`),
  KEY `fk_paciente_ubs` (`cd_ubs`),
  CONSTRAINT `fk_paciente_ubs` FOREIGN KEY (`cd_ubs`) REFERENCES `tb_ubs` (`cd_ubs`),
  CONSTRAINT `fk_paciente_ubs_referencia` FOREIGN KEY (`cd_ubs_referencia`) REFERENCES `tb_ubs` (`cd_ubs`),
  CONSTRAINT `fk_paciente_users` FOREIGN KEY (`cd_usuario_registro`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_paciente`
--

LOCK TABLES `tb_paciente` WRITE;
/*!40000 ALTER TABLE `tb_paciente` DISABLE KEYS */;
INSERT INTO `tb_paciente` VALUES (12,977771031800009,'','Tony Iommi','Antonia Iommi','masculino','parda','1975-04-27','Brasil','Piracicaba','Brasil','Belford Roxo - RJ','26153-210','Rua Aimorés','33','35B','Shangri-lá','Joao Silva','25.151.848-7','ssp','2018-01-17','00:42:44',4,4,4),(13,0,'graves','Jose da SIlva','Josefina Silva','masculino','indigena','1983-03-30','Brasil','Sao Paulo','Brasil','Sao Paulo','882342342','Rua J','234','','Bairro C','Josefina','335313569','ssp','2017-10-23','00:50:33',4,4,4),(14,158830076810004,'','Alexandre Ottoni','Alessandra Ottoni','Masculino','Branca','1978-10-01','Brasil','Curitiba','Brasil','Rio Branco - AC','69900-691','Travessa Francisco Conde','400','','Bosque','Alexandre Ottoni','34.283.402-8','ssp','2018-01-15','22:52:14',4,4,4),(15,162042571210005,'','Douglas da SIlva','Giovana','masculino','parda','1994-07-26','Brasil','Piracicaba','Brasil','Sao Paulo','283472342','Rua B','33','35B','Bairro C','Douglas','148974467','ssp','2017-10-23','23:35:49',4,4,4),(17,752452465410001,'','David Gilmour','Maria Gilmour ','masculino','Branca','1950-12-12','Brasil','Itanhaem','Brasil','Sorocaba - SP','18076-120','Rua Santiago Idalgo Ruiz','29','','Jardim Maria Antônia Prado','David Gilmour','23.482.348-2','ssp','2018-01-15','22:53:27',4,4,4),(18,124378830530000,'','David Bowie','Maria Bowie','masculino','branca','1950-02-02','','','Brasil','Sao Bernardo','113234434','Rua Abolicao','4401','','Vila Sao Pedro','David Bowie','445501234','ssp','2017-11-10','20:52:45',4,4,4),(20,0,'problemas','Joaquina Da Silva','Joana Silva','feminino','parda','1987-12-31','','Maua','Brasil','Teresina - PI','64001-330','Rua Anísio de Abreu','23','B3','Centro','Joana Silva','62.619.494-9','ssp','2018-01-23','17:49:25',4,4,4),(21,156104296490002,'','Monica Silva','Maraisa SIlva','feminino','branca','1997-08-25','Brasil','Sao Paulo','Brasil','Barra Mansa - RJ','27336-400','Rua Osmar Portugal','234','113','Boa Vista','Monica Silva','59.494.911-3','ssp','2018-01-15','23:48:49',4,4,4),(23,120055207650018,'','James Hetfield','Joana Hetfield','Masculino','Branca','1960-10-10','Estados Unidos','São Francisco','Brasil','Rio de Janeiro - RJ','23535-105','Rua Jerusalém','450','','Sepetiba','James Hetfield','23.982.394-8','ssp','2018-01-18','23:55:45',4,4,4),(24,154419349730008,'','Lars Ulrich','Joana Ulrich','Masculino','Branca','1970-01-01','Dinamarca','Dinatown','Brasil','Brasília - DF','72669','Condomínio Residencial Galiléia Quadra 7','440','55 - A','Recanto das Emas','Lars Ulrich','334568975','ssp','2017-11-12','23:46:23',4,4,4),(25,192275082170003,'','Kirk Hammett','Joana Hammet','Masculino','Parda','1963-08-06','Estados Unidos','SÃ£o Francisco','Brasil','Araxá - MG','38181-543','Rua Maria Rosa de Souza','10','','Jardim Natália','Kirk Hammett','65.165.116-1','ssp','2018-01-15','23:50:29',4,4,4),(26,0,'incapacitados','Roberto Trujillo','Roberta Trujillo','Masculino','Parda','1968-09-09','Mexico','Cidade do Mexico','Brasil','Volta Redonda - RJ','27263-400','Rua Duzentos e Vinte e Oito-A','550','40','Conforto','Roberto Trujillo','345678901','ssp','2018-01-17','00:43:43',4,4,4),(28,118620075870006,'','Dave Mustaine','Maria Mustaine','Masculino','Branca','1960-05-10','Estados Unidos','SÃ£o Francisco','Brasil','Palmas - TO','77066','Avenida Tocantins','90','A 30','Setor Morada do Sol (Taquaralto)','Dave Mustaine','345678901','ssp','2017-11-12','23:58:35',4,4,4),(29,0,'incapacitados','Jimi Hendrix','Joana Hendrix','Masculino','Preta','1970-01-01','Inglaterra','Manchester','Brasil','Arcoverde - PE','56503-248','Rua Xavantes','550','B 54','São Cristóvão','Jimi Hendrix','23.423.842-0','ssp','2018-01-15','23:43:22',4,4,4),(30,252221445320006,'','Joe Duplantier','Josefina Duplantier','Masculino','Branca','1970-10-02','França','Paris','Brasil','São José dos Pinhais - PR','83010-140','Rua Assaí','400','','Cruzeiro','Joe Duplantier','30.589.841-6','ssp','2018-01-17','00:58:17',4,4,4),(33,966011384220003,'','William de Souza Gomes','Claudia Regina','Masculino','Branca','1970-01-01','Brasil','SÃ£o Paulo','Brasil','SÃ£o Paulo - SP','5877260','Rua LetÃ­cia','320','Casa','Jardim GuarujÃ¡','William de Souza','368465371','SSP','2017-11-13','15:43:07',4,4,4),(36,943476845820004,'','Mario Gomes','Judiana Carma','Masculino','Branca','1982-12-12','Eua','Nova Iorque','Brasil','Luziânia - GO','72855-239','Quadra 239','458','98','Parque Industrial Mingone','Mario Gomes','23.423.842-8','ssp','2018-01-15','23:11:04',4,4,4),(37,280419906490001,'','Janaina Jesus','Cida ConceiÃ§Ã£o','Feminino','Preta','1970-01-01','Brasil','SÃ£o Paulo','Brasil','JoÃ£o Pessoa - PB','58020','Parque Arruda CÃ¢mara','4587','casa','Roger','Janaina Jesus','0','','2017-11-13','15:51:31',4,4,4),(38,868194911330006,'','Herculana Amorim','Afrodite Noma ','Masculino','Branca','1925-02-05','Brasil','Santo Andre','Brasil','Sinop - MT','78552','Avenida das ItaÃºbas','124','Casa','Jardim das Palmeiras','Herculana','0','','2017-11-13','15:56:53',4,4,4),(39,0,'incapacitados','Eduardo Nogueira','Roselinda Maria','Masculino','Preta','1970-01-01','Brasil','SÃ£o Paulo','Brasil','Pato Branco - PR','85502','Rua ErcÃ­lia Corona','4450','B 23','Menino Deus','Eduardo Nogueira','234569084','ssp','2017-11-13','17:12:33',4,4,4),(58,0,'incapacitados','Jeremias Silva','Josefa Augusta','Masculino','Preta','2010-10-09','Brasil','AraÃ§atuba','Brasil','São Vicente - SP','11340150','Rua Nicolino Simone','334','','Parque São Vicente','Jeremias Silva','15.484.494-9','ssp','2018-01-15','22:54:23',4,4,4),(59,0,'incapacitados','Ozzy Osbourne','Roselinda Osbourne ','Masculino','Branca','1953-08-09','Inglaterra','Manchester','Brasil','Feira de Santana - BA','44065','Rua Boa Ãgua','9001','Camp 1A','ConceiÃ§Ã£o','Ozzy Osbourne','334501234','ssp','2017-11-20','19:16:54',4,4,4),(60,133509051210009,'','Elvis Presley','Evelina Presley','Masculino','Branca','1930-04-21','Estados Unidos','Las Vegas','Brasil','Volta Redonda - RJ','27262-090','Rua Sete','34','32A','Conforto','Elvis Presley','23.515.151-5','ssp','2018-01-23','16:32:08',4,4,4),(61,0,'incapacitados','Roger Waters','Rogeria Aguas','Masculino','Branca','1940-02-20','Inglaterra','Manchester','Brasil','VitÃ³ria - ES','29027','Rua JoÃ£o Paulo Coutinho','32','','do Cabral','Roger Waters','44','ssp','2017-12-05','15:55:23',4,4,4),(62,703960479150002,'','Troy Sanders','Troia Sanders','Masculino','Branca','1970-04-30','EUA','Chicago','Brasil','PaulÃ­nia - SP','13145','Rua Aristeu Vansan','3444','','JoÃ£o Aranha','Troy Sanders','92','ssp','2017-12-05','17:16:14',4,4,4),(63,716001038510008,'','Dimebag Darrell','DemÃ©tria Darrell','Masculino','Branca','1968-04-03','Brasil','Belo Horizonte','Brasil','Fortaleza - CE','60526-162','Vila Dona Raulina','290','','Dom Lustosa','Dimebag Darrell','88.515.151-5','ssp','2018-01-15','23:52:33',4,4,4),(64,154118128130018,'','Tom Jobim','Maria Joaquina','Masculino','Parda','1955-01-30','Brasil','São Paulo','Brasil','São João de Meriti - RJ','25555-120','Rua Otávio Mangabeira','340','3 Bloco A','Jardim Meriti','Tom Jobim','47.474.713-8','ssp','2018-01-17','00:42:02',4,4,4),(65,130880406920002,'','Miles Davis','Milla Davis','Masculino','Preta','1923-09-12','Brasil','SÃ£o Caetano do Sul','Brasil','Itajubá - MG','37504-090','Rua Engenheiro Albert Starke','249','','Distrito Industrial','Miles Davis','12','ssp','2018-01-17','00:46:58',4,4,4),(66,0,'incapacitados','Deve Brubeck','Doralice Brubeck','Masculino','Branca','1910-02-01','Brasil','Santos','Brasil','Belo Horizonte - MG','30510','Rua AzalÃ©ia','909','','Nova Gameleira','Dave Brubeck','29','ssp','2017-12-13','23:59:43',4,4,4),(71,730487462980005,'','Robert Plant','Roberta Planta','Masculino','Branca','1940-02-19','Brasil','São Paulo','Brasil','Guarujá - SP','11440-120','Rua Carlos Magno','3423','','Jardim São Miguel','Robert Plant','25.991.924-8','ssp','2018-01-15','23:35:35',4,4,4),(72,228818750510008,'','Stan Getz','Ana Getz','Masculino','Branca','1920-10-10','Brasil','São Caetano ','Brasil','Teresina - PI','64022-400','Rua Embaixador Frederico Clark','29','','Lourival Parente','Stan Getz','28.372.983-4','ssp','2017-12-28','19:19:39',4,4,1),(77,177028731700009,'','Jason Newsted','Joaquina Newsted','Masculino','Branca','1971-09-09','Brasil','São Paulo','Brasil','Manaus - AM','69090-610','Rua Ibaté','23049','','Cidade Nova','Jason Newsted','29.837.492-7','ssp','2018-01-07','18:48:21',4,4,1),(78,0,'incapacitados','Amy Winehouse','Matilda Winehouse','Feminino','Branca','1981-12-08','Brasil','São Paulo','Brasil','Patos de Minas - MG','38701-488','Rua Francisco de Assis Sabino','13','11','Alvorada','Amy Winehouse','32.942.342-3','ssp','2018-01-23','17:47:07',4,4,1),(79,0,'incapacitados','Vinicius de Moraes','Alessandra Moraes','Masculino','Parda','1920-09-10','Brasil','Rio de Janeiro','Brasil','Salvador - BA','41613-010','Largo Umbanda','2893','','Jaguaribe','Vinicius de Moraes','22.934.829-3','ssp','2018-01-17','01:03:21',4,4,1),(80,287393356910006,'','Frank Sinatra','Francisca Sinatra','Masculino','Branca','1916-10-03','Estados Unidos','São Francisco','Brasil','Fortaleza - CE','60871-660','Avenida Gurgel do Amaral','10','10A','Coaçu','Frank Sinatra','24.924.984-3','ssp','2018-01-23','17:51:54',4,4,1),(81,259738388080004,'','Elis Regina','Elisandra Paes','Feminino','Branca','1945-03-17','Brasil','Rio de Janeiro','Brasil','Campo Grande - MS','79010-110','Rua Enoch Vieira de Almeida','320','','Coronel Antonino','Elis Regina','23.423.423-4','ssp','2018-01-17','01:08:16',4,4,1);
/*!40000 ALTER TABLE `tb_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_teste`
--

DROP TABLE IF EXISTS `tb_teste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_teste` (
  `cd_teste` int(11) NOT NULL AUTO_INCREMENT,
  `nm_teste` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`cd_teste`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_teste`
--

LOCK TABLES `tb_teste` WRITE;
/*!40000 ALTER TABLE `tb_teste` DISABLE KEYS */;
INSERT INTO `tb_teste` VALUES (1,'Data: 2017-12-26 Hora: 22:00 Usuario: 3'),(2,'Data: 2017-12-26 Hora: 22:00 Usuario: ');
/*!40000 ALTER TABLE `tb_teste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_triagem`
--

DROP TABLE IF EXISTS `tb_triagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_triagem` (
  `cd_triagem` int(11) NOT NULL AUTO_INCREMENT,
  `ic_finalizada` tinyint(1) DEFAULT '0',
  `ds_queixa` varchar(100) NOT NULL,
  `dt_registro` date DEFAULT NULL,
  `hr_registro` time DEFAULT NULL,
  `vl_pressao_min` decimal(9,2) DEFAULT NULL,
  `vl_pressao_max` decimal(9,2) DEFAULT NULL,
  `vl_pulso` decimal(9,2) DEFAULT NULL,
  `vl_temperatura` decimal(9,2) DEFAULT NULL,
  `vl_respiracao` decimal(9,2) DEFAULT NULL,
  `vl_saturacao` decimal(9,2) DEFAULT NULL,
  `vl_glicemia` decimal(9,2) DEFAULT NULL,
  `vl_nivel_consciencia` int(11) DEFAULT NULL,
  `vl_escala_dor` int(11) DEFAULT NULL,
  `ic_alergia` varchar(10) DEFAULT NULL,
  `ds_alergia` varchar(200) DEFAULT NULL,
  `ds_observacao` varchar(200) DEFAULT NULL,
  `vl_classificacao_risco` int(11) NOT NULL,
  `ds_linha_cuidado` varchar(50) DEFAULT NULL,
  `ds_outras_condicoes` varchar(200) DEFAULT NULL,
  `cd_paciente` int(11) NOT NULL,
  `cd_ubs` int(9) DEFAULT NULL,
  `cd_usuario_registro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_triagem`),
  KEY `pk_triagem` (`cd_triagem`),
  KEY `fk_triagem_paciente` (`cd_paciente`),
  KEY `fk_triagem_users` (`cd_usuario_registro`),
  KEY `fk_triagem_ubs` (`cd_ubs`),
  CONSTRAINT `fk_triagem_paciente` FOREIGN KEY (`cd_paciente`) REFERENCES `tb_paciente` (`cd_paciente`),
  CONSTRAINT `fk_triagem_ubs` FOREIGN KEY (`cd_ubs`) REFERENCES `tb_ubs` (`cd_ubs`),
  CONSTRAINT `fk_triagem_users` FOREIGN KEY (`cd_usuario_registro`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_triagem`
--

LOCK TABLES `tb_triagem` WRITE;
/*!40000 ALTER TABLE `tb_triagem` DISABLE KEYS */;
INSERT INTO `tb_triagem` VALUES (48,1,'A03','2017-12-13','23:41:38',12.00,13.00,90.00,37.00,30.00,10.00,100.00,15,1,'desconhece','','',1,'Nenhuma','Nenhuma',64,4,6),(49,1,'A01','2017-12-14','00:04:30',12.00,13.00,80.00,37.00,30.00,30.00,100.00,15,1,'desconhece','','',1,'Nenhuma','Nenhuma',64,4,6),(53,1,'A01','2017-12-28','19:27:11',8.00,12.00,84.00,36.00,42.00,92.00,94.00,14,1,'nao','','',1,'Nenhuma','Nenhuma',72,4,1),(54,1,'F02','2017-12-28','19:28:50',9.00,10.00,102.00,37.00,36.00,99.00,103.00,15,2,'sim','Dipirona','Paciente aparenta estar com conjutivite',1,'Nenhuma','Nenhuma',30,4,1),(55,1,'A11','2017-12-28','19:32:58',8.00,14.00,76.00,38.00,44.00,93.00,99.00,15,5,'desconhece','','',1,'Nenhuma','Nenhuma',62,4,1),(56,1,'Dor','2018-01-07','14:32:25',10.00,11.00,90.00,37.00,30.00,90.00,100.00,15,1,'desconhece','','',1,'nenhuma','nenhuma',64,4,4),(57,1,'A03','2018-01-07','18:36:11',8.00,12.00,90.00,36.00,30.00,94.00,99.00,15,2,'desconhece','','',1,'Nenhuma','Nenhuma',28,4,1),(58,1,'A01','2018-01-07','18:37:46',10.00,12.00,80.00,37.00,34.00,98.00,101.00,15,1,'sim','Dipirona','',1,'vio','Nenhuma',18,4,1),(59,1,'A06','2018-01-07','18:39:27',12.00,13.00,120.00,39.00,55.00,100.00,100.00,10,6,'nao','','',2,'Nenhuma','Nenhuma',59,4,1),(60,1,'A03','2018-01-07','18:44:54',8.00,12.00,98.00,39.00,40.00,98.00,102.00,13,5,'desconhece','','',1,'Nenhuma','Nenhuma',72,4,1),(61,1,'A10','2018-01-07','18:50:32',8.00,12.00,92.00,37.00,40.00,94.00,98.00,14,8,'desconhece','','',1,'vio','Nenhuma',77,4,1),(62,1,'A03','2018-01-07','21:38:37',8.00,12.00,90.00,37.00,30.00,90.00,99.00,13,1,'desconhece','','',1,'Nenhuma','Nenhuma',78,4,1),(63,1,'F02','2018-01-07','21:39:55',8.00,13.00,87.00,36.00,32.00,94.00,92.00,15,2,'desconhece','','',1,'Nenhuma','Nenhuma',24,4,1),(64,0,'A03','2018-01-23','16:44:51',8.00,12.00,90.00,37.00,35.00,98.00,102.00,14,3,'desconhece','','',1,'Nenhuma','Nenhuma',23,4,6);
/*!40000 ALTER TABLE `tb_triagem` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tr_finalizar_espera AFTER INSERT ON tb_triagem
FOR EACH ROW
BEGIN
	UPDATE tb_espera SET ic_finalizada = 1 WHERE cd_paciente = new.cd_paciente;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_ubs`
--

DROP TABLE IF EXISTS `tb_ubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ubs` (
  `cd_ubs` int(9) NOT NULL AUTO_INCREMENT,
  `nm_ubs` varchar(60) DEFAULT NULL,
  `cd_cnes` int(7) NOT NULL,
  `cd_cep` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cd_ubs`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ubs`
--

LOCK TABLES `tb_ubs` WRITE;
/*!40000 ALTER TABLE `tb_ubs` DISABLE KEYS */;
INSERT INTO `tb_ubs` VALUES (1,'UPA ZAIRA',6919456,'09390140'),(2,'UPA VILA ASSIS',6950043,'09370670'),(3,'UPA MAGINI CENTRO',6950051,'09390030'),(4,'UPA BARAO DE MAUA',2061562,'09340440');
/*!40000 ALTER TABLE `tb_ubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permission_matches`
--

DROP TABLE IF EXISTS `user_permission_matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_permission_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission_matches`
--

LOCK TABLES `user_permission_matches` WRITE;
/*!40000 ALTER TABLE `user_permission_matches` DISABLE KEYS */;
INSERT INTO `user_permission_matches` VALUES (100,1,1),(101,1,2),(102,2,1),(103,3,1),(105,4,1),(108,3,6),(109,4,5),(111,6,7),(112,6,1);
/*!40000 ALTER TABLE `user_permission_matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(155) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL,
  `logins` int(100) NOT NULL,
  `account_owner` tinyint(4) NOT NULL DEFAULT '0',
  `account_id` int(11) NOT NULL DEFAULT '0',
  `company` varchar(255) NOT NULL,
  `stripe_cust_id` varchar(255) NOT NULL,
  `billing_phone` varchar(20) NOT NULL,
  `billing_srt1` varchar(255) NOT NULL,
  `billing_srt2` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_zip_code` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `email_verified` tinyint(4) NOT NULL DEFAULT '0',
  `vericode` varchar(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  `custom1` varchar(255) NOT NULL,
  `custom2` varchar(255) NOT NULL,
  `custom3` varchar(255) NOT NULL,
  `custom4` varchar(255) NOT NULL,
  `custom5` varchar(255) NOT NULL,
  `oauth_provider` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gpluslink` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `fb_uid` varchar(255) NOT NULL,
  `un_changed` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `EMAIL` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'userspicephp@gmail.com','admin','$2y$12$1v06jm2KMOXuuo3qP7erTuTIJFOnzhpds1Moa8BadnUUeX0RV3ex.','Dan','Hoover',1,126,1,0,'UserSpice','','','','','','','','2016-01-01 00:00:00','2018-01-23 17:42:06',1,'322418','',0,'','','','','','','','','','','','0000-00-00 00:00:00','1899-11-30 00:00:00','',0),(2,'noreply@userspice.com','user','$2y$12$HZa0/d7evKvuHO8I3U8Ff.pOjJqsGTZqlX8qURratzP./EvWetbkK','Sample','User',1,5,1,0,'none','','','','','','','','2016-01-02 00:00:00','2017-02-20 12:14:10',1,'970748','',1,'','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00','',0),(3,'dimitri.leandro@gmail.com','Dimi','$2y$12$fn9VuFilW2DSZOHFsST6g.Z3gEtDnPHW1I.WPGca5Vi5KoZe5Ukxm','Dimitri','Leandro',1,16,1,0,'','','','','','','','','2017-10-22 22:06:19','2018-01-23 15:54:16',1,'111111','',1,'','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00','',0),(4,'suyama@gmail.com','Suyama','$2y$12$fgMRznlXOVATJ3jp2lLFEOuLkfHcexDxGFpBeHjqHDAIf8gt1mHDu','Ricardo','Suyama',1,19,1,0,'','','','','','','','','2017-10-22 22:06:44','2018-01-23 17:51:36',1,'111111','',1,'','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00','',0),(6,'will@teste.com','Will','$2y$12$h9c3C/HZAor9eWLBLf8WsO6L.yWcBhmGpmXnSlMCe9A66f9wv3UEa','William','Gomes',1,7,1,0,'','','','','','','','','2017-12-07 16:20:32','2018-01-23 17:52:42',1,'111111','',1,'','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00','',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `timestamp` varchar(15) NOT NULL,
  `user_id` int(10) NOT NULL,
  `session` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_online`
--

LOCK TABLES `users_online` WRITE;
/*!40000 ALTER TABLE `users_online` DISABLE KEYS */;
INSERT INTO `users_online` VALUES (1,'::1','1516737087',1,''),(2,'::1','1516732050',3,''),(3,'::1','1516737152',4,''),(4,'::1','1516737232',6,'');
/*!40000 ALTER TABLE `users_online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_session`
--

DROP TABLE IF EXISTS `users_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `uagent` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_session`
--

LOCK TABLES `users_session` WRITE;
/*!40000 ALTER TABLE `users_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_maua'
--

--
-- Dumping routines for database 'db_maua'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_insert_diagnostico` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_diagnostico`(IN ubs INT, IN avaliacao TEXT, IN cid VARCHAR(30), IN prescricao TEXT, IN situacao VARCHAR(40), IN usuario_registro INT(11), IN triagem INT(11))
BEGIN
  -- USANDO UMA VARIAVEL PARA SABER A QUANTIDADE DE DIAGNOSTICOS QUE A TRIAGEM EM QUESTÃO TEM
  DECLARE id INT;
  DECLARE qtd INT;
  SET qtd = (SELECT COUNT(cd_diagnostico) FROM tb_diagnostico WHERE cd_triagem = triagem);
  -- SE FOR 0, OK, PODE FAZER O INSERT, SENÃO, ALGO ESTÁ ERRADO, POIS UMA TRIAGEM NÃO PODE TER MAIS DE UM DIAGNOSTICO
  IF qtd = 0 THEN
  INSERT IGNORE INTO tb_diagnostico (cd_ubs, ds_avaliacao, cd_cid, ds_prescricao, dt_registro, hr_registro, ic_situacao, cd_usuario_registro, cd_triagem) VALUES
  (ubs, avaliacao, cid, prescricao, now(), now(), situacao, usuario_registro, triagem);
  SET id = LAST_INSERT_ID();
  ELSE
  SET id = 0;
  END IF;
  -- AGORA É NECESSÁRIO VERIFICAR SE HOUVE INSERT, CASO SIM, ENTÃO A TRIAGEM DEVE SER FINALIZADA.
  IF id != 0 THEN
  UPDATE tb_triagem SET ic_finalizada = 1 WHERE cd_triagem = triagem;
  END IF;
  -- FAZENDO O SELECT PARA SER O RETORNO DO PROCEDIMENTO
  SELECT id;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insert_espera` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_espera`(IN paciente INT, IN ubs INT, IN usuario INT)
BEGIN
	DECLARE qtd_esperas_ativas INT;
    DECLARE id INT; -- cd_espera
    
    SET qtd_esperas_ativas = (SELECT COUNT(cd_espera) FROM tb_espera WHERE cd_paciente = paciente AND ic_finalizada = 0);
    IF qtd_esperas_ativas = 0 THEN
		INSERT IGNORE INTO tb_espera values (null, 0, now(), now(), paciente, ubs, usuario);
        SET id = LAST_INSERT_ID();
    ELSE
		SET id = 0;
    END IF;
    -- select como retorno da stored procedure
    SELECT id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-23 18:29:42
