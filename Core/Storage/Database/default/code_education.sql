CREATE DATABASE  IF NOT EXISTS `code_education` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `code_education`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: code_education
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

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
-- Table structure for table `secty_pag`
--

DROP TABLE IF EXISTS `secty_pag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secty_pag` (
  `secty_cod_pag` int(11) NOT NULL AUTO_INCREMENT,
  `secty_title_pag` varchar(255) DEFAULT NULL,
  `secty_dsc_pag` text,
  `secty_route_pag` varchar(255) NOT NULL,
  `secty_ind_force_login` int(1) DEFAULT '0',
  PRIMARY KEY (`secty_cod_pag`),
  UNIQUE KEY `secty_route_pag_UNIQUE` (`secty_route_pag`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secty_pag`
--

LOCK TABLES `secty_pag` WRITE;
/*!40000 ALTER TABLE `secty_pag` DISABLE KEYS */;
INSERT INTO `secty_pag` VALUES (1,'Home','<h3><strong>Cadastro de alguma coisa</strong></h3>\n\n<hr />\n<p>Um cadastro qualquer...</p>\n','home',0),(2,'Fixture','fixtures','fixtures',1),(3,'Painel','painel','painel',1),(4,'Painel Editar Paginas','painel editar','editar-paginas',1),(5,'Produto','produto','produto',0),(6,'Empresa','empresa','empresa',0),(7,'Serviço','<p>servi&ccedil;o</p>\n','servico',0),(8,'Contato','contato','contato',0);
/*!40000 ALTER TABLE `secty_pag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secty_pag_permission`
--

DROP TABLE IF EXISTS `secty_pag_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secty_pag_permission` (
  `secty_cod_pag_permission` int(11) NOT NULL AUTO_INCREMENT,
  `secty_cod_pag` int(11) DEFAULT NULL,
  `secty_permission_cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`secty_cod_pag_permission`),
  KEY `FK_secty_cod_pag01_idx` (`secty_cod_pag`),
  KEY `FK_secty_cod_permission01_idx` (`secty_permission_cod`),
  CONSTRAINT `FK_secty_cod_pag01` FOREIGN KEY (`secty_cod_pag`) REFERENCES `secty_pag` (`secty_cod_pag`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_secty_cod_permission01` FOREIGN KEY (`secty_permission_cod`) REFERENCES `secty_permission` (`secty_cod_permission`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secty_pag_permission`
--

LOCK TABLES `secty_pag_permission` WRITE;
/*!40000 ALTER TABLE `secty_pag_permission` DISABLE KEYS */;
INSERT INTO `secty_pag_permission` VALUES (1,1,1),(2,2,1),(3,2,1),(4,3,1),(5,4,1);
/*!40000 ALTER TABLE `secty_pag_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secty_permission`
--

DROP TABLE IF EXISTS `secty_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secty_permission` (
  `secty_cod_permission` int(11) NOT NULL AUTO_INCREMENT,
  `secty_dsc_permission` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`secty_cod_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secty_permission`
--

LOCK TABLES `secty_permission` WRITE;
/*!40000 ALTER TABLE `secty_permission` DISABLE KEYS */;
INSERT INTO `secty_permission` VALUES (1,'Full'),(2,'Convidado');
/*!40000 ALTER TABLE `secty_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secty_user`
--

DROP TABLE IF EXISTS `secty_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secty_user` (
  `secty_cod_user` int(11) NOT NULL AUTO_INCREMENT,
  `secty_dsc_login` varchar(255) NOT NULL,
  `secty_dsc_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`secty_cod_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secty_user`
--

LOCK TABLES `secty_user` WRITE;
/*!40000 ALTER TABLE `secty_user` DISABLE KEYS */;
INSERT INTO `secty_user` VALUES (1,'admin','$2y$10$.6fu/nkfgAQ/Tqb7PgRLnuPI3cYHWjlwg4JOWN0Zu9Bo.9UgHEq5u');
/*!40000 ALTER TABLE `secty_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secty_user_permission`
--

DROP TABLE IF EXISTS `secty_user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secty_user_permission` (
  `secty_user_permission_cod` int(11) NOT NULL AUTO_INCREMENT,
  `secty_user_permission_cod_user` int(11) DEFAULT NULL,
  `secty_user_permission_cod_permission` int(11) DEFAULT NULL,
  PRIMARY KEY (`secty_user_permission_cod`),
  KEY `FK_user_permission_cod_user01_idx` (`secty_user_permission_cod_user`),
  KEY `FK_user_permission_cod_permission01_idx` (`secty_user_permission_cod_permission`),
  CONSTRAINT `FK_user_permission_cod_permission01` FOREIGN KEY (`secty_user_permission_cod_permission`) REFERENCES `secty_permission` (`secty_cod_permission`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_permission_cod_user01` FOREIGN KEY (`secty_user_permission_cod_user`) REFERENCES `secty_user` (`secty_cod_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secty_user_permission`
--

LOCK TABLES `secty_user_permission` WRITE;
/*!40000 ALTER TABLE `secty_user_permission` DISABLE KEYS */;
INSERT INTO `secty_user_permission` VALUES (1,1,1);
/*!40000 ALTER TABLE `secty_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'code_education'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-19 10:53:27
