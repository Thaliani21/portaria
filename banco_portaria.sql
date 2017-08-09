CREATE SCHEMA IF NOT EXISTS `portaria`
USE `portaria`

-- MySQL dump 10.13  Distrib 5.6.31, for debian-linux-gnu (x86_64)
--
-- Database: portaria
-- ------------------------------------------------------
--
-- Table structure for table `tb001_pessoa`
--
CREATE TABLE IF NOT EXISTS `tb001_pessoa` (
  `tb001_id` int(11) NOT NULL,
  `tb001_nome` varchar(500) NOT NULL,
  `tb001_telefone` varchar(45) DEFAULT NULL,
  `tb001_ativo` int(11) NOT NULL DEFAULT '1',
  `tb001_dt_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tb001_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `tb002_checkin`
--
CREATE TABLE IF NOT EXISTS `tb002_checkin` (
  `tb002_id` int(11) NOT NULL AUTO_INCREMENT,
  `tb001_id` int(11) NOT NULL,
  `tb002_cracha` varchar(45) DEFAULT NULL,
  `tb002_in_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tb002_out_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tb002_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;