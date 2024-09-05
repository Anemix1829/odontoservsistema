# Host: localhost  (Version 5.5.5-10.4.28-MariaDB)
# Date: 2024-09-03 17:26:57
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categorias"
#

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "categorias"
#

INSERT INTO `categorias` VALUES (1,'ADHESIVO DENTAL','[SIN DATOS]'),(2,'RESINA FLUIDA','[SIN DATOS]'),(3,'RESINA CEMENTO','[SIN DATOS]'),(4,'CADENETA','[SIN DATOS]'),(5,'BRACKETS','[SIN DATOS]');

#
# Structure for table "clientes"
#

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `nit` varchar(40) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "clientes"
#

INSERT INTO `clientes` VALUES (1,'JHON','DOE',NULL,'78978978','av civica','a@a.com'),(2,'CATHERINE','SMITH',NULL,'45645645','av los pinos','b@a.com');

#
# Structure for table "productos"
#

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `vendidos` int(11) DEFAULT 0,
  `idcategoria` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  PRIMARY KEY (`idproducto`),
  KEY `prodcat` (`idcategoria`),
  CONSTRAINT `prodcat` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "productos"
#

INSERT INTO `productos` VALUES (2,'GENERACION II','VIENE CON OFERTA',48.00,9,0,4,'A'),(3,'POWER CHAIN','[sin info]',38.00,15,0,4,'A');

#
# Structure for table "productosvendidos"
#

DROP TABLE IF EXISTS `productosvendidos`;
CREATE TABLE `productosvendidos` (
  `idprodven` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'V' COMMENT 'V-D-E',
  PRIMARY KEY (`idprodven`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "productosvendidos"
#


#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` enum('admin','empleado') DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `correo` (`email`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'ANGHY','YUCRA','ayucra@gmail.com','$2y$05$0XCgIMvn.8444K41qbgOmOeVlppPn4LtKLBOAH3JGPiWlXO5GySt2','admin','A'),(10,'RODRIGO','LAURA FERNANDEZ','rod6529@gmail.com','$2y$05$K4l3avdW2B.Zom3Vzqhewe6F3Q4zkhcRePLmt/q.EsWhe1YS16Y1m','admin','A');

#
# Structure for table "empleados"
#

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "empleados"
#


#
# Structure for table "ventas"
#

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `factura` varchar(50) DEFAULT NULL,
  `razonsocial` varchar(50) DEFAULT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'V' COMMENT 'V-D-E',
  PRIMARY KEY (`idventa`),
  KEY `empleado_id` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "ventas"
#


#
# Structure for table "pedidos"
#

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `venta_id` (`venta_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`idventa`) ON DELETE CASCADE,
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "pedidos"
#


#
# Structure for table "ventasclientes"
#

DROP TABLE IF EXISTS `ventasclientes`;
CREATE TABLE `ventasclientes` (
  `venta_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`venta_id`,`cliente_id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `ventasclientes_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`idventa`) ON DELETE CASCADE,
  CONSTRAINT `ventasclientes_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Data for table "ventasclientes"
#

