/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.4.28-MariaDB : Database - books
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`books` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `books`;

/*Table structure for table `autores` */

DROP TABLE IF EXISTS `autores`;

CREATE TABLE `autores` (
  `aut_id` int(11) NOT NULL AUTO_INCREMENT,
  `aut_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`aut_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `autores` */

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_data` date NOT NULL,
  `com_status` varchar(10) NOT NULL,
  `com_usu_id` int(11) NOT NULL,
  `com_liv_id` int(11) NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `fkCompraUsuario` (`com_usu_id`),
  KEY `fkCompraLivro` (`com_liv_id`),
  CONSTRAINT `fkCompraLivro` FOREIGN KEY (`com_liv_id`) REFERENCES `livros` (`liv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkCompraUsuario` FOREIGN KEY (`com_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `compras` */

/*Table structure for table `editoras` */

DROP TABLE IF EXISTS `editoras`;

CREATE TABLE `editoras` (
  `edi_id` int(11) NOT NULL AUTO_INCREMENT,
  `edi_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`edi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `editoras` */

/*Table structure for table `enderecos` */

DROP TABLE IF EXISTS `enderecos`;

CREATE TABLE `enderecos` (
  `end_id` int(11) NOT NULL AUTO_INCREMENT,
  `end_numero` varchar(10) NOT NULL,
  `end_bairro` varchar(100) NOT NULL,
  `end_uf` varchar(20) NOT NULL,
  `end_cidade` varchar(100) NOT NULL,
  `end_cep` varchar(20) NOT NULL,
  `end_rua` varchar(150) NOT NULL,
  `end_logradouro` varchar(100) NOT NULL,
  `end_usu_id` int(11) NOT NULL,
  PRIMARY KEY (`end_id`),
  KEY `fkEnderecoUsuario` (`end_usu_id`),
  CONSTRAINT `fkEnderecoUsuario` FOREIGN KEY (`end_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `enderecos` */

/*Table structure for table `livros` */

DROP TABLE IF EXISTS `livros`;

CREATE TABLE `livros` (
  `liv_id` int(11) NOT NULL AUTO_INCREMENT,
  `liv_titulo` varchar(100) NOT NULL,
  `liv_isbn` varchar(100) NOT NULL,
  `liv_idioma` varchar(20) NOT NULL,
  `liv_formato` varchar(100) NOT NULL,
  `liv_genero` varchar(100) NOT NULL,
  `liv_resumo` varchar(500) NOT NULL,
  `liv_numpagi` int(11) NOT NULL,
  `liv_edi_id` int(11) NOT NULL,
  PRIMARY KEY (`liv_id`),
  KEY `fkLivroEditora` (`liv_edi_id`),
  CONSTRAINT `fkLivroEditora` FOREIGN KEY (`liv_edi_id`) REFERENCES `editoras` (`edi_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `livros` */

/*Table structure for table `livros_autores` */

DROP TABLE IF EXISTS `livros_autores`;

CREATE TABLE `livros_autores` (
  `lau_liv_id` int(11) NOT NULL,
  `lau_aut_id` int(11) NOT NULL,
  KEY `fkLivrosAutores` (`lau_liv_id`),
  KEY `fkAutoresLivros` (`lau_aut_id`),
  CONSTRAINT `fkAutoresLivros` FOREIGN KEY (`lau_aut_id`) REFERENCES `autores` (`aut_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkLivrosAutores` FOREIGN KEY (`lau_liv_id`) REFERENCES `livros` (`liv_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `livros_autores` */

/*Table structure for table `telefones` */

DROP TABLE IF EXISTS `telefones`;

CREATE TABLE `telefones` (
  `tel_id` int(11) NOT NULL AUTO_INCREMENT,
  `tel_num` varchar(20) NOT NULL,
  `tel_ddd` varchar(3) NOT NULL,
  `tel_usu_id` int(11) NOT NULL,
  PRIMARY KEY (`tel_id`),
  KEY `fkTelefonesUsuario` (`tel_usu_id`),
  CONSTRAINT `fkTelefonesUsuario` FOREIGN KEY (`tel_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `telefones` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_tipo` varchar(100) NOT NULL,
  `usu_nome` varchar(100) NOT NULL,
  `usu_cpf` varchar(11) NOT NULL,
  `usu_dnasc` datetime NOT NULL,
  `usu_email` varchar(150) NOT NULL,
  `usu_senha` varchar(100) NOT NULL,
  `usu_data` datetime NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
