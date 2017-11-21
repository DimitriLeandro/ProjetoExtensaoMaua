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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit`
--

LOCK TABLES `audit` WRITE;
/*!40000 ALTER TABLE `audit` DISABLE KEYS */;
INSERT INTO `audit` VALUES (1,1,'42','2017-02-20 17:31:13','::1',0),(2,0,'47','2017-10-22 22:31:51','::1',0),(3,0,'47','2017-10-22 22:34:42','::1',0),(4,4,'46','2017-10-22 22:36:52','::1',0),(5,4,'47','2017-10-22 22:37:04','::1',0),(6,3,'46','2017-10-22 22:37:21','::1',0),(7,0,'47','2017-10-22 22:37:37','::1',0),(8,0,'48','2017-10-22 22:37:41','::1',0),(9,0,'46','2017-10-22 22:37:44','::1',0),(10,3,'46','2017-10-22 22:38:54','::1',0),(11,0,'48','2017-10-23 01:07:18','::1',0),(12,0,'48','2017-10-23 22:24:26','::1',0),(13,0,'48','2017-10-23 22:32:02','::1',0),(14,0,'47','2017-11-10 20:29:50','::1',0),(15,0,'48','2017-11-12 13:28:42','::1',0),(16,0,'47','2017-11-12 16:59:32','::1',0),(17,0,'47','2017-11-12 21:38:03','::1',0),(18,0,'47','2017-11-13 01:57:50','::1',0),(19,0,'47','2017-11-13 15:20:40','::1',0),(20,4,'49','2017-11-13 17:42:29','::1',0),(21,4,'50','2017-11-13 17:42:38','::1',0),(22,0,'48','2017-11-17 20:03:59','::1',0),(23,0,'48','2017-11-17 21:15:58','::1',0),(24,0,'48','2017-11-18 01:13:09','::1',0),(25,0,'47','2017-11-18 02:15:02','::1',0),(26,0,'47','2017-11-18 02:46:01','::1',0),(27,0,'47','2017-11-18 03:20:31','::1',0),(28,0,'47','2017-11-18 03:54:44','::1',0),(29,0,'47','2017-11-20 19:12:39','::1',0),(30,0,'47','2017-11-20 19:43:11','::1',0),(31,0,'47','2017-11-20 19:43:55','::1',0),(32,0,'48','2017-11-20 20:34:50','::1',0),(33,0,'50','2017-11-20 22:42:00','::1',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'index.php',0),(2,'z_us_root.php',0),(3,'users/account.php',1),(4,'users/admin.php',1),(5,'users/admin_page.php',1),(6,'users/admin_pages.php',1),(7,'users/admin_permission.php',1),(8,'users/admin_permissions.php',1),(9,'users/admin_user.php',1),(10,'users/admin_users.php',1),(11,'users/edit_profile.php',1),(12,'users/email_settings.php',1),(13,'users/email_test.php',1),(14,'users/forgot_password.php',0),(15,'users/forgot_password_reset.php',0),(16,'users/index.php',0),(17,'users/init.php',0),(18,'users/join.php',0),(19,'users/joinThankYou.php',0),(20,'users/login.php',0),(21,'users/logout.php',0),(22,'users/profile.php',1),(23,'users/times.php',0),(24,'users/user_settings.php',1),(25,'users/verify.php',0),(26,'users/verify_resend.php',0),(27,'users/view_all_users.php',1),(28,'usersc/empty.php',0),(31,'users/oauth_success.php',0),(33,'users/fb-callback.php',0),(37,'users/check_updates.php',1),(38,'users/google_helpers.php',0),(39,'users/tomfoolery.php',1),(40,'users/create_message.php',1),(41,'users/messages.php',1),(42,'users/message.php',1),(44,'users/admin_backup.php',1),(45,'users/maintenance.php',0),(46,'teste.php',1),(47,'cadastrar_paciente.php',1),(48,'pesquisar_paciente.php',1),(49,'cadastrar_triagem.php',1),(50,'pesquisar_triagem.php',1),(51,'visualizar_triagem.php',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_page_matches`
--

LOCK TABLES `permission_page_matches` WRITE;
/*!40000 ALTER TABLE `permission_page_matches` DISABLE KEYS */;
INSERT INTO `permission_page_matches` VALUES (2,2,27),(3,1,24),(4,1,22),(5,2,13),(6,2,12),(7,1,11),(8,2,10),(9,2,9),(10,2,8),(11,2,7),(12,2,6),(13,2,5),(14,2,4),(15,1,3),(16,2,37),(17,2,39),(19,2,40),(21,2,41),(23,2,42),(27,1,42),(28,1,27),(29,1,41),(30,1,40),(31,2,44),(37,2,46),(42,5,47),(43,6,48),(44,6,49),(45,2,50),(46,2,51),(47,5,48);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'User'),(2,'Administrator'),(5,'Recepcionista'),(6,'Outorgante');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,1,'<h1>This is the Admin\'s bio.</h1>'),(2,2,'This is your bio'),(3,3,'This is your bio'),(4,4,'This is your bio');
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
  `cd_ubs_referencia` int(11) DEFAULT NULL,
  `nm_responsavel` varchar(60) DEFAULT NULL,
  `cd_documento_responsavel` varchar(15) DEFAULT NULL,
  `nm_orgao_emissor` varchar(10) DEFAULT NULL,
  `cd_cnes` int(11) NOT NULL,
  `dt_adesao` date NOT NULL,
  `hr_adesao` time NOT NULL,
  `cd_profissional_registro` int(15) NOT NULL,
  PRIMARY KEY (`cd_paciente`),
  KEY `cd_profissional_registro` (`cd_profissional_registro`),
  CONSTRAINT `tb_paciente_ibfk_1` FOREIGN KEY (`cd_profissional_registro`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_paciente`
--

LOCK TABLES `tb_paciente` WRITE;
/*!40000 ALTER TABLE `tb_paciente` DISABLE KEYS */;
INSERT INTO `tb_paciente` VALUES (12,123,'','Joao da Silva','Joana Silva','masculino','parda','1975-04-27','Brasil','Piracicaba','Brasil','Sao Bernardo','123123123','Rua B','33','35B','Bairro A',8,'Joao Silva','123473457','ssp',1234567,'2017-10-23','00:48:39',4),(13,0,'graves','Jose da SIlva','Josefina Silva','masculino','indigena','1983-03-30','Brasil','Sao Paulo','Brasil','Sao Paulo','882342342','Rua J','234','','Bairro C',234,'Josefina','335313569','ssp',1234567,'2017-10-23','00:50:33',4),(14,5503,'','Gabriel da Silva','Gabriela da Silva','masculino','branca','1978-12-26','Brasil','Sao Paulo','Brasil','Sao Bernardo','232342342','Rua K','400','','Bairro K',234,'Gabriel','239085568','ssp',1234567,'2017-10-23','23:32:47',4),(15,4848,'','Douglas da SIlva','Giovana','masculino','parda','1994-07-26','Brasil','Piracicaba','Brasil','Sao Paulo','283472342','Rua B','33','35B','Bairro C',8,'Douglas','148974467','ssp',1234567,'2017-10-23','23:35:49',4),(16,0,'encontrados','Ana Silva','Maria Silva','feminino','branca','1998-07-31','Brasil','Piracicaba','Brasil','Sao Paulo','234242423','Rua J','33','35B','Bairro C',3423,'Ana','445672345','ssp',1234567,'2017-10-23','23:37:31',4),(17,33456,'','David Gilmour','Maria Gilmour ','masculino','branca','1950-12-12','Brasil','Itanhaem','Brasil','SÃ£o Paulo','112120120','Rua Rosa','29','','Bairro XYZ',123,'David Gilmour','129083348','ssp',1234567,'2017-11-10','20:32:17',4),(18,33902,'','David Bowie','Maria Bowie','masculino','branca','1950-02-02','','','Brasil','Sao Bernardo','113234434','Rua Abolicao','4401','','Vila Sao Pedro',123,'David Bowie','445501234','ssp',1234567,'2017-11-10','20:52:45',4),(20,0,'problemas','Joaquina Da Silva','Joana Silva','feminino','parda','1987-12-31','','Maua','Brasil','Maua','112993000','Rua Mauazopolis','23','B3','ABC',123,'Joana Silva','44030203','ssp',1234567,'2017-11-10','21:02:34',4),(21,23423,'','Monica Silva','Maraisa SIlva','feminino','branca','1997-08-25','Brasil','Sao Paulo','Brasil','Maua','11320342','RUA PERO CORREA','234','113','Bairro A B e C',123,'Monica Silva','332342341','ssp',1234567,'2017-11-10','21:12:52',4),(23,120055207650018,'','James Hetfield','Joana Hetfield','Masculino','Branca','1960-10-10','Estados Unidos','São Francisco','Brasil','Brasília - DF','73370-045','Conjunto Residencial 45','450','','Vale do Amanhecer (Planaltina)',123,'James Hetfield','440302033','ssp',1234567,'2017-11-12','23:23:05',4),(24,154419349730008,'','Lars Ulrich','Joana Ulrich','Masculino','Branca','1970-01-01','Dinamarca','Dinatown','Brasil','Brasília - DF','72669-260','Condomínio Residencial Galiléia Quadra 7','440','55 - A','Recanto das Emas',123,'Lars Ulrich','334568975','ssp',1234567,'2017-11-12','23:46:23',4),(25,192275082170003,'','Kirk Hammett','Joana Hammet','Masculino','Parda','1963-08-06','Estados Unidos','SÃ£o Francisco','Brasil','Salvador - BA','41311','Caminho 04','10','','Ãguas Claras',123,'Kirk Hammett','456789093','ssp',1234567,'2017-11-12','23:51:49',4),(26,0,'incapacitados','Roberto Trujillo','Roberta Trujillo','Masculino','Parda','1968-09-09','Mexico','Cidade do Mexico','Brasil','GravataÃ­ - RS','94150','Rua Augusto Rocha','550','40','SÃ£o Geraldo',123,'Roberto Trujillo','345678901','ssp',1234567,'2017-11-12','23:56:37',4),(28,118620075870006,'','Dave Mustaine','Maria Mustaine','Masculino','Branca','1960-05-10','Estados Unidos','SÃ£o Francisco','Brasil','Palmas - TO','77066','Avenida Tocantins','90','A 30','Setor Morada do Sol (Taquaralto)',123,'Dave Mustaine','345678901','ssp',1234567,'2017-11-12','23:58:35',4),(29,0,'incapacitados','Jimi Hendrix','Joana Hendrix','Masculino','Preta','1970-01-01','Inglaterra','Manchester','Brasil','Ji-ParanÃ¡ - RO','76908','Rua Idelfonso da Silva','550','B 54','SÃ£o Francisco',123,'Jimi Hendrix','445678901','ssp',1234567,'2017-11-13','02:00:23',4),(30,252221445320006,'','Joe Duplantier','Josefina Duplantier','Masculino','Branca','1970-10-02','FranÃ§a','Paris','Brasil','GoiÃ¢nia - GO','74686','Estrada Bom Retiro','400','','ChÃ¡caras Bom Retiro',123,'Joe Duplantier','309871237','ssp',1234567,'2017-11-13','15:22:01',4),(33,966011384220003,'','William de Souza Gomes','Claudia Regina','Masculino','Branca','1970-01-01','Brasil','SÃ£o Paulo','Brasil','SÃ£o Paulo - SP','5877260','Rua LetÃ­cia','320','Casa','Jardim GuarujÃ¡',123,'William de Souza','368465371','SSP',1234567,'2017-11-13','15:43:07',4),(34,277003257480009,'','Dimitri Leandro','Ana Paula','Masculino','Branca','1998-08-10','Russia','Moscou','Brasil','SÃ£o Vicente - SP','11320140','Rua Pero Correa','113','94','ItararÃ©',123,'Dimitri Leandro','368485361','SSP',1234567,'2017-11-13','15:45:51',4),(35,264466531040004,'','Maria Rosario','Marianete de Souza','Feminino','Parda','0178-05-02','Brasil','SÃ£o Caetano','Brasil','Aracaju - SE','49044','Rua JoÃ£o Jones Sevidanes','354','Casa','Santa Maria',123,'Maria do Rosario','0','',1234567,'2017-11-13','15:48:04',4),(36,943476845820004,'','Mario Gomes','Judiana Carma','Masculino','Branca','1982-12-12','Eua','Nova Iorque','Brasil','MacapÃ¡ - AP','68903','Avenida Quinta da universidade','458','98','Universidade',123,'HElena ','0','',1234567,'2017-11-13','15:49:37',4),(37,280419906490001,'','Janaina Jesus','Cida ConceiÃ§Ã£o','Feminino','Preta','1970-01-01','Brasil','SÃ£o Paulo','Brasil','JoÃ£o Pessoa - PB','58020','Parque Arruda CÃ¢mara','4587','casa','Roger',123,'Janaina Jesus','0','',1234567,'2017-11-13','15:51:31',4),(38,868194911330006,'','Herculana Amorim','Afrodite Noma ','Masculino','Branca','1925-02-05','Brasil','Santo Andre','Brasil','Sinop - MT','78552','Avenida das ItaÃºbas','124','Casa','Jardim das Palmeiras',123,'Herculana','0','',1234567,'2017-11-13','15:56:53',4),(39,0,'incapacitados','Eduardo Nogueira','Roselinda Maria','Masculino','Preta','1970-01-01','Brasil','SÃ£o Paulo','Brasil','Pato Branco - PR','85502','Rua ErcÃ­lia Corona','4450','B 23','Menino Deus',123,'Eduardo Nogueira','234569084','ssp',1234567,'2017-11-13','17:12:33',4),(58,0,'incapacitados','Jeremias Silva','Josefa Augusta','Masculino','Preta','2010-10-09','Brasil','AraÃ§atuba','Brasil','SÃ£o Vicente - SP','11340150','Rua Nicolino Simone','334','','Parque SÃ£o Vicente',123,'Jeremias Silva','345678912','ssp',1234567,'2017-11-18','04:29:52',4),(59,0,'incapacitados','Ozzy Osbourne','Roselinda Osbourne ','Masculino','Branca','1953-08-09','Inglaterra','Manchester','Brasil','Feira de Santana - BA','44065','Rua Boa Ãgua','9001','Camp 1A','ConceiÃ§Ã£o',123,'Ozzy Osbourne','334501234','ssp',1234567,'2017-11-20','19:16:54',4);
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
  `nm_teste` varchar(20) DEFAULT NULL,
  `dt_teste` date DEFAULT NULL,
  `hr_teste` time DEFAULT NULL,
  PRIMARY KEY (`cd_teste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_teste`
--

LOCK TABLES `tb_teste` WRITE;
/*!40000 ALTER TABLE `tb_teste` DISABLE KEYS */;
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
  `cd_paciente` int(11) NOT NULL,
  `cd_cnes` int(11) NOT NULL,
  `ds_queixa` varchar(100) NOT NULL,
  `dt_triagem` date NOT NULL,
  `hr_triagem` time NOT NULL,
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
  `cd_cns_profissional_triagem` int(15) DEFAULT NULL,
  PRIMARY KEY (`cd_triagem`),
  KEY `fk_triagem_paciente` (`cd_paciente`),
  CONSTRAINT `fk_triagem_paciente` FOREIGN KEY (`cd_paciente`) REFERENCES `tb_paciente` (`cd_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_triagem`
--

LOCK TABLES `tb_triagem` WRITE;
/*!40000 ALTER TABLE `tb_triagem` DISABLE KEYS */;
INSERT INTO `tb_triagem` VALUES (13,12,1234567,'Dor de Dente','2017-10-23','00:54:53',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,1,'desconhece','','',0,'Nenhuma','Nenhuma',2),(14,12,1234567,'Dor de Dente','2017-10-23','00:55:40',10.80,12.80,80.00,36.00,30.00,3.00,3.00,9,1,'sim','Dipirona','',0,'Nenhuma','Nenhuma',234),(15,12,1234567,'Dor de Dente','2017-10-23','00:56:47',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,1,'desconhece','','',0,'Nenhuma','Nenhuma',23),(16,13,1234567,'Febre','2017-10-23','22:50:30',14.50,18.90,140.00,38.00,40.00,30.00,5.00,13,3,'desconhece','','Paciente com pressÃ£o muito alta',2,'Nenhuma','asma',151),(17,17,1234567,'Dor de Cabeca','2017-11-12','14:29:00',12.80,13.10,89.00,37.00,50.00,30.00,400.00,14,4,'desconhece','','O paciente se queixa de dores muscalares alÃ©m da dor de cabeÃ§a',1,'Nenhuma','asma',12345),(18,29,1234567,'ConvulÃ§Ãµes','2017-11-13','02:02:04',15.90,17.80,110.00,38.00,55.00,40.00,400.00,15,4,'sim','Dipirona','Paciente aparenta ter tido overdose',3,'Nenhuma','onco',12345),(19,20,1234567,'Enjoo','2017-11-13','02:10:09',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,1,'desconhece','','',0,'Nenhuma','Nenhuma',12345),(20,59,1234567,'Falta de Ar','2017-11-20','19:21:01',17.80,18.10,140.00,37.00,35.00,40.00,80.00,11,2,'nao','','',2,'Nenhuma','onco',12345);
/*!40000 ALTER TABLE `tb_triagem` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission_matches`
--

LOCK TABLES `user_permission_matches` WRITE;
/*!40000 ALTER TABLE `user_permission_matches` DISABLE KEYS */;
INSERT INTO `user_permission_matches` VALUES (100,1,1),(101,1,2),(102,2,1),(103,3,1),(105,4,1),(108,3,6),(109,4,5);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'userspicephp@gmail.com','admin','$2y$12$1v06jm2KMOXuuo3qP7erTuTIJFOnzhpds1Moa8BadnUUeX0RV3ex.','Dan','Hoover',1,75,1,0,'UserSpice','','','','','','','','2016-01-01 00:00:00','2017-11-20 22:42:06',1,'322418','',0,'','','','','','','','','','','','0000-00-00 00:00:00','1899-11-30 00:00:00','',0),(2,'noreply@userspice.com','user','$2y$12$HZa0/d7evKvuHO8I3U8Ff.pOjJqsGTZqlX8qURratzP./EvWetbkK','Sample','User',1,5,1,0,'none','','','','','','','','2016-01-02 00:00:00','2017-02-20 12:14:10',1,'970748','',1,'','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00','',0),(3,'dimitri.leandro@gmail.com','Dimi','$2y$12$fn9VuFilW2DSZOHFsST6g.Z3gEtDnPHW1I.WPGca5Vi5KoZe5Ukxm','Dimitri','Leandro',1,5,1,0,'','','','','','','','','2017-10-22 22:06:19','2017-10-23 01:07:27',1,'111111','',1,'','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00','',0),(4,'suyama@gmail.com','Suyama','$2y$12$fgMRznlXOVATJ3jp2lLFEOuLkfHcexDxGFpBeHjqHDAIf8gt1mHDu','Ricardo','Suyama',1,3,1,0,'','','','','','','','','2017-10-22 22:06:44','2017-11-13 17:42:17',1,'111111','',1,'','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00','',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_online`
--

LOCK TABLES `users_online` WRITE;
/*!40000 ALTER TABLE `users_online` DISABLE KEYS */;
INSERT INTO `users_online` VALUES (1,'::1','1511220126',1,''),(2,'::1','1510598472',4,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_session`
--

LOCK TABLES `users_session` WRITE;
/*!40000 ALTER TABLE `users_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_session` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-20 21:22:55
