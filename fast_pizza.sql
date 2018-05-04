/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.25-MariaDB : Database - fast_pizza
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fast_pizza` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `fast_pizza`;

/*Table structure for table `localizacao` */

DROP TABLE IF EXISTS `localizacao`;

CREATE TABLE `localizacao` (
  `id_loc` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(255) COLLATE utf8_bin NOT NULL,
  `latitude` varchar(30) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_loc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `localizacao` */

insert  into `localizacao`(`id_loc`,`endereco`,`latitude`,`longitude`) values (1,'Rua JoÃ£o Chamariconi, 90, Jau, SP','-22.2660398','-48.55152169999997');

/*Table structure for table `nfv` */

DROP TABLE IF EXISTS `nfv`;

CREATE TABLE `nfv` (
  `id_nfv` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(8,2) NOT NULL,
  `latitude` varchar(20) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_usu` int(11) NOT NULL,
  `endereco` varchar(250) COLLATE utf8_bin NOT NULL,
  `id_prod` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nfv`),
  KEY `id_usu` (`id_usu`),
  KEY `id_prod` (`id_prod`),
  CONSTRAINT `nfv_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  CONSTRAINT `nfv_ibfk_3` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `nfv` */

insert  into `nfv`(`id_nfv`,`valor`,`latitude`,`longitude`,`id_usu`,`endereco`,`id_prod`) values (7,'10.00','-22.2991353','-48.56275579999999',4,'Rua Major Prado, Jau',4),(8,'10.00','-22.2991353','-48.56275579999999',4,'Rua Major Prado, Jau',4);

/*Table structure for table `produtos` */

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `disponivel` enum('S','N') COLLATE utf8_bin NOT NULL,
  `imagem` varchar(100) COLLATE utf8_bin NOT NULL,
  `categoria` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `produtos` */

insert  into `produtos`(`id_prod`,`nome`,`preco`,`disponivel`,`imagem`,`categoria`) values (1,'Pizza calabresa','20.00','S','fotos/cba1a4f9556314e0c46257b9cd045ddd.png','Pizza Salgada'),(2,'pizza brigadeiro','0.00','S','fotos/fa79833f3bdb0aea2533089428eb8265.jpg',''),(3,'Pizza de aÃ§aÃ­','20.00','S','fotos/2a747ecd588815f47322a1fdb3219479.jpg','Pizza Doce'),(4,'Pizza de Banana','10.00','S','fotos/fbb81a3c656965bb6304142b2f963906.jpg','Pizza Doce'),(5,'Pizza de Frango','20.00','S','fotos/88b943ef1bed82acd6b1c2c467344ab5.jpg','Pizza Salgada');

/*Table structure for table `tipo_usuario` */

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tipo_usuario` */

insert  into `tipo_usuario`(`id_tipo`,`descricao`) values (1,'Administrador'),(2,'Cliente');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(80) COLLATE utf8_bin NOT NULL,
  `senha` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_usu`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usu`,`id_tipo`,`nome`,`email`,`senha`) values (1,1,'Joï¿½o','joao@mail.com','teste'),(2,2,'adm','jo@mail.com',''),(4,2,'joana','joana@mail.com','joana'),(5,2,'joana','ja@mail.com','teste'),(6,2,'teste','teste@teste','teste'),(7,2,'testewww','teste@mail.com','teste'),(8,1,'admin','admin@admin.com','admin'),(10,1,'Jonathan','jonathan.gomes213@gmail.com','admin'),(11,2,'teste5','teste5@mail.com','teste5'),(12,2,'teste6','teste6@mail.com','teste3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
