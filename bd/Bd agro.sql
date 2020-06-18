/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.11-MariaDB : Database - agroservicio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`agroservicio` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `agroservicio`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria` */

insert  into `categoria`(`id_categoria`,`nom_categoria`) values 
(1,'Comida para animal'),
(2,'Grano Basico'),
(9,'Insecticidas');

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `loginusuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`loginusuario`,`clave`,`tipo`,`nombre`,`apellido`,`correo_electronico`,`telefono`,`direccion`) values 
(6,'admin','Vy9mdlRNYjJkQUhNNXdpOGVGZXhJZz09','administrador','Giovanni','Ramirez','giovanni99@gmail.com',78766645,'Santa Ana'),
(7,'giovanni','SDQ5cmJiUHNMMzdSMTJxb0tZYnhaQT09','cliente','Giovanni','Ramirez','giovanni@gmail.com',75543333,'Santa Ana'),
(8,'chino','aktROURUWXgwQzRUbmdabzh3UWJPUT09','cliente','Carlos','Menjivar','carlosmenjivar@gmail.com',75644543,'Santa Ana');

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `num_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  PRIMARY KEY (`num_pedido`),
  KEY `FK_id_cliente` (`id_cliente`),
  CONSTRAINT `FK_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido` */

insert  into `pedido`(`num_pedido`,`id_cliente`,`fecha_pedido`) values 
(30,8,'2020-06-18'),
(31,8,'2020-06-18');

/*Table structure for table `pedido_producto` */

DROP TABLE IF EXISTS `pedido_producto`;

CREATE TABLE `pedido_producto` (
  `id_pedidopro` int(11) NOT NULL AUTO_INCREMENT,
  `num_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(15) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id_pedidopro`),
  KEY `FK_id_producto` (`id_producto`),
  KEY `FK_num_pedido` (`num_pedido`),
  CONSTRAINT `FK_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  CONSTRAINT `FK_num_pedido` FOREIGN KEY (`num_pedido`) REFERENCES `pedido` (`num_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido_producto` */

insert  into `pedido_producto`(`id_pedidopro`,`num_pedido`,`id_producto`,`cantidad_producto`,`total`) values 
(1,30,12,2,1.60),
(2,31,12,2,1.60),
(3,31,1,1,2.50);

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `nom_producto` varchar(50) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `disponible` varchar(13) NOT NULL,
  `sistema_de_medida` varchar(10) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `FK_id_categoria` (`id_categoria`),
  KEY `FK_id_proveedor` (`id_proveedor`),
  CONSTRAINT `FK_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `FK_id_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Data for the table `productos` */

insert  into `productos`(`id_producto`,`id_categoria`,`id_proveedor`,`nom_producto`,`imagen`,`descripcion`,`precio`,`disponible`,`sistema_de_medida`,`fecha_ingreso`) values 
(1,1,1,'Pedegree','fotos/gat.jpg','Comida para perro ',2.50,'disponible','Libra ','2020-06-04'),
(3,1,1,'Comida ','fotos/b90b2a72-d937-487b-9c6b-7290e060c730_1.f7d4abe10f04ae94923b3ec8dc953af2.jpg','comidaa',1.20,'disponible','libra','2020-06-04'),
(5,1,1,'Comida para gato','fotos/6186ChiaQ1L._AC_SX425_.jpg','Comida gati',1.20,'disponible','1 libra ','2020-06-05'),
(10,2,1,'Arroz','fotos/arr2.png','Libra de arroz',1.50,'no disponible','Libra','2020-06-13'),
(11,2,8,'Azucar','fotos/Acucar.jpg','Azucar Blanca',2.30,'disponible','5/Libras','2020-06-14'),
(12,2,8,'Arroz','fotos/arroz.jpg','Arroz Barraza',0.80,'disponible','1/Libras','2020-06-14'),
(13,2,8,'Arroz','fotos/ArrozGumarsal.jpg','Arroz Gumarsal',2.30,'disponible','5/Libras','2020-06-14'),
(14,2,8,'Avena','fotos/avena.jpg','Avena QUAKER sabor a Fresa',1.00,'disponible','200/Gramos','2020-06-14'),
(15,2,8,'Arina','fotos/imagen6.jpg','Arina DoÃ±a Blanca ',1.50,'disponible','250/Gramos','2020-06-14'),
(16,2,8,'Arina','fotos/MasecaDany.jpg','Sal',0.10,'disponible','1/Libra','2020-06-14'),
(18,2,8,'Frijoles','fotos/imagen4.jpg','Frijoles Naturas',1.00,'disponible','250/Gramos','2020-06-14'),
(19,2,8,'Frijo','fotos/f1.jpg','Frijol Rojo',1.80,'disponible','2/Libras','2020-06-14'),
(20,2,8,'Frijol ','fotos/imagen4.jpg','Frijol Rojo Gumarsal',1.00,'disponible','1/Libra','2020-06-14'),
(21,1,3,'Concentrado de Pollo','fotos/concentrado de pollo ines.png','Concentrado de Crecimiento',22.00,'disponible','1/Quintal','2020-06-14'),
(25,1,5,'Concentrado para Perro','fotos/kingo.png','Concentrado para perro Adulto Vitaminado',26.12,'disponible','66/Libras','2020-06-14'),
(26,1,9,'Concentrado para Perro','fotos/rufo.png','Concentrado para Cachorro con proteinas',28.00,'disponible','','0000-00-00'),
(27,1,5,'Concentrado para Perro pedigree','fotos/pedigree.png','Concentrado para Cachorro',22.00,'disponible','66/Libras','2020-06-14'),
(28,1,5,'Rufo Concentrado para Perro','fotos/rufo.jpg','Concentrado para Cachorro Multivitaminado',0.60,'disponible','1/Libra','2020-06-14'),
(29,1,5,'Bogs Concentrado para Perro','fotos/bogs.jpg','Concentrado para Cachorro vitaminado',0.50,'disponible','1/Libra','2020-06-14'),
(30,1,5,'Dogstar concentrado para perro','fotos/Dogstar.jpg','Concentrado para Cachorro 2B',0.55,'disponible','1/Libra','2020-06-14'),
(31,1,8,'Maizillo','fotos/maicillo.jpg','Maizillo',1.00,'disponible','5/Libras','2020-06-14'),
(32,2,8,'Maiz','fotos/maiz3.jpg','Maiz Nuevo',9.50,'disponible','17/Libras','2020-06-14'),
(33,1,7,'','fotos/perico.jpg','Concentrado para perico Vitaminado',1.35,'disponible','1/Libra','2020-06-14'),
(34,1,9,'Concentrado de Pollo','fotos/vitalposturapollo.jpg','Vital Postura Concentrado para pollo',23.50,'disponible','1/Quintal','2020-06-14'),
(35,1,7,'Concentrado para Conejo','fotos/concentradoconejo vital.png','Vital postura Concentrado para conejo adulto',20.00,'disponible','1/Quintal','2020-06-14'),
(36,1,9,'Concentrado para Conejo','fotos/concentradoconejovital.png','Concentrado para conejo adulto',22.90,'disponible','1/Quintal','2020-06-14'),
(37,1,7,'Concentrado de Vaca','fotos/solla_vaca.png','Concentrado para Vaca VitalLechero',26.75,'disponible','1/Quintal','2020-06-14'),
(38,1,3,'Concentrado de Vaca','fotos/VacaMor.jpg','Concentrado para Vaca Crecimiento',23.15,'disponible','1/Quintal','2020-06-14'),
(39,1,9,'Concentrado de Vaca','fotos/vitallecherovaca.png','Concentrado para Vaca Etapa Final',19.55,'disponible','1/Quintal','2020-06-14');

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nom_proveedor` varchar(45) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `proveedor` */

insert  into `proveedor`(`id_proveedor`,`nom_proveedor`) values 
(1,'Purina'),
(2,'Cat show'),
(3,'MOR'),
(4,'Del Cañal'),
(5,'Rufo'),
(7,'Solla'),
(8,'Gumarsal'),
(9,'Aliansa'),
(10,'Kadabra'),
(11,'Dupont');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
