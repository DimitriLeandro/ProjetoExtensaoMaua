CREATE DATABASE  IF NOT EXISTS `db_pumas_equipamento` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_pumas_equipamento`;
-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: db_pumas_equipamento
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.16.04.2

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
-- Table structure for table `tb_equipamento`
--

DROP TABLE IF EXISTS `tb_equipamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_equipamento` (
  `cd_equipamento` int(11) NOT NULL AUTO_INCREMENT,
  `ds_equipamento` varchar(100) DEFAULT NULL,
  `cd_patrimonio` varchar(50) DEFAULT NULL,
  `nm_modelo` varchar(30) DEFAULT NULL,
  `nm_fabricante` varchar(20) DEFAULT NULL,
  `nm_marca` varchar(20) DEFAULT NULL,
  `nm_setor` varchar(20) DEFAULT NULL,
  `nm_sala` varchar(15) DEFAULT NULL,
  `ic_posse` varchar(10) DEFAULT NULL,
  `cd_fiscal` varchar(20) DEFAULT NULL,
  `vl_equipamento` decimal(10,0) DEFAULT NULL,
  `dt_instalacao` date DEFAULT NULL,
  `dt_garantia` date DEFAULT NULL,
  `ic_manutencao` varchar(5) DEFAULT NULL,
  `cd_prestador` varchar(20) DEFAULT NULL,
  `ic_tensao` varchar(15) DEFAULT NULL,
  `vl_potencia` decimal(10,0) DEFAULT NULL,
  `ic_operacao` varchar(5) DEFAULT NULL,
  `ic_tecnico` varchar(5) DEFAULT NULL,
  `ds_insumo` varchar(100) DEFAULT NULL,
  `ds_obs` text,
  `ic_delete` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`cd_equipamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_equipamento`
--

LOCK TABLES `tb_equipamento` WRITE;
/*!40000 ALTER TABLE `tb_equipamento` DISABLE KEYS */;
INSERT INTO `tb_equipamento` VALUES (1,'Máquina de Raio X','A3478045-B22','Modelo B22','Fabricante A','Marca A','Unidade 3 Setor 4','456','Próprio','983475980347593',19000,'2019-12-03','2019-12-03','Sim','11957683456','127 V',10000,'Sim','Sim',NULL,NULL,0),(2,'Ressonância Magnética','R023042-M75475','M75475','Fabricante R','Marca R','Unidade 5 Setor 10','234','Próprio','92379274983279234',40000,'2019-12-03','2019-12-03','Sim','11946573645','127 V',4500,'Sim','Sim',NULL,NULL,0),(3,'Bebedouro','B8383-M90','M90','Fabricante J','Marca J','Térreo','0','Doação','2093802840',0,'2019-12-03','2019-12-03','Sim','21987693045','127 V',4000,'Sim','Sim',NULL,NULL,0);
/*!40000 ALTER TABLE `tb_equipamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_manutencao`
--

DROP TABLE IF EXISTS `tb_manutencao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_manutencao` (
  `cd_manutencao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_manutencao` date DEFAULT NULL,
  `dt_final` date DEFAULT NULL,
  `ds_solucao` text,
  `nm_funcionario` text,
  `cd_pedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_manutencao`),
  KEY `fk_manutencao_pedido` (`cd_pedido`),
  CONSTRAINT `fk_manutencao_pedido` FOREIGN KEY (`cd_pedido`) REFERENCES `tb_pedido` (`cd_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_manutencao`
--

LOCK TABLES `tb_manutencao` WRITE;
/*!40000 ALTER TABLE `tb_manutencao` DISABLE KEYS */;
INSERT INTO `tb_manutencao` VALUES (1,'2019-12-03','2019-12-03','Reiniciei a máquina','José Silva',1),(14,'2019-12-16','2019-12-16','Troquei o filtro','André Souza',2);
/*!40000 ALTER TABLE `tb_manutencao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pedido` (
  `cd_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `dt_pedido` date DEFAULT NULL,
  `hr_pedido` time DEFAULT NULL,
  `nm_solicitante` varchar(120) DEFAULT NULL,
  `ds_problema` text,
  `ic_processo` tinyint(4) DEFAULT NULL,
  `cd_equipamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_pedido`),
  KEY `fk_pedido_equipamento` (`cd_equipamento`),
  CONSTRAINT `fk_pedido_equipamento` FOREIGN KEY (`cd_equipamento`) REFERENCES `tb_equipamento` (`cd_equipamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pedido`
--

LOCK TABLES `tb_pedido` WRITE;
/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` VALUES (1,'2019-12-03','14:53:19','Rafael Watabe','Motor apresenta barulho estranho',0,2),(2,'2019-12-03','15:32:47','Dimitri','Filtro sujo',0,3);
/*!40000 ALTER TABLE `tb_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_pumas_equipamento'
--

--
-- Dumping routines for database 'db_pumas_equipamento'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-03 15:35:14
