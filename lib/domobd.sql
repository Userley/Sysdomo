-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.6-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para domobd
CREATE DATABASE IF NOT EXISTS `domobd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `domobd`;

-- Volcando estructura para tabla domobd.dispositivos
CREATE TABLE IF NOT EXISTS `dispositivos` (
  `IdDispositivo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Respuesta` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdDispositivo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla domobd.dispositivos: ~6 rows (aproximadamente)
DELETE FROM `dispositivos`;
/*!40000 ALTER TABLE `dispositivos` DISABLE KEYS */;
INSERT INTO `dispositivos` (`IdDispositivo`, `Nombre`, `Descripcion`, `Estado`, `Respuesta`) VALUES
	(1, 'Luz Cuarto', 'Iluminación', 0, 0),
	(2, 'Luz Patio', 'Iluminación', 0, 0),
	(3, 'Luz Sala', 'Iluminación', 0, 0),
	(4, 'Pasadizo', 'Iluminación', 0, 0),
	(5, 'Cortinas', 'Iluminación', 0, 0),
	(6, 'Ventilador', 'Iluminación', 0, 0);
/*!40000 ALTER TABLE `dispositivos` ENABLE KEYS */;

-- Volcando estructura para tabla domobd.historial
CREATE TABLE IF NOT EXISTS `historial` (
  `IdUsuario` int(11) NOT NULL,
  `IdDispositivo` int(11) NOT NULL,
  `Estado` varchar(50) NOT NULL DEFAULT '',
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Latitud` varchar(50) DEFAULT NULL,
  `Longitud` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla domobd.historial: ~8 rows (aproximadamente)
DELETE FROM `historial`;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` (`IdUsuario`, `IdDispositivo`, `Estado`, `Fecha`, `Hora`, `Latitud`, `Longitud`) VALUES
	(3, 2, 'Activado', '2019-11-14', '14:39:15', '-8.1059477', '-79.053195'),
	(3, 6, 'Activado', '2019-11-14', '14:39:17', '-8.1059477', '-79.053195'),
	(3, 6, 'Desactivado', '2019-11-14', '14:39:29', '-8.1059477', '-79.053195'),
	(3, 2, 'Desactivado', '2019-11-14', '14:39:31', '-8.1059477', '-79.053195'),
	(3, 1, 'Activado', '2019-11-14', '14:40:05', '-8.1059477', '-79.053195'),
	(1, 1, 'Desactivado', '2019-11-14', '14:52:08', '-8.1059477', '-79.053195'),
	(1, 5, 'Activado', '2019-11-14', '14:52:10', '-8.1059477', '-79.053195'),
	(1, 2, 'Activado', '2019-11-14', '14:52:11', '-8.1059477', '-79.053195'),
	(4, 5, 'Desactivado', '2019-11-14', '14:52:25', '-8.1059477', '-79.053195'),
	(4, 2, 'Desactivado', '2019-11-14', '14:52:26', '-8.1059477', '-79.053195');
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;

-- Volcando estructura para tabla domobd.idiomas
CREATE TABLE IF NOT EXISTS `idiomas` (
  `ididioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ididioma`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla domobd.idiomas: ~5 rows (aproximadamente)
DELETE FROM `idiomas`;
/*!40000 ALTER TABLE `idiomas` DISABLE KEYS */;
INSERT INTO `idiomas` (`ididioma`, `nombre`, `img`) VALUES
	(1, 'EEUU', 'img/banderas/US.svg'),
	(2, 'Suiza', 'img/banderas/CH.svg'),
	(3, 'Francia', 'img/banderas/FR.svg'),
	(4, 'España', 'img/banderas/ES.svg'),
	(5, 'Alemania', 'img/banderas/DE.svg'),
	(6, 'Italia', 'img/banderas/IT.svg');
/*!40000 ALTER TABLE `idiomas` ENABLE KEYS */;

-- Volcando estructura para tabla domobd.mensajes
CREATE TABLE IF NOT EXISTS `mensajes` (
  `idmensaje` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmensaje`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla domobd.mensajes: ~4 rows (aproximadamente)
DELETE FROM `mensajes`;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` (`idmensaje`, `mensaje`) VALUES
	(24, 'Hola'),
	(25, 'hola'),
	(26, 'quÃ© tal?'),
	(27, 'hola');
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;

-- Volcando estructura para tabla domobd.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `NomUser` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla domobd.usuarios: ~3 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`IdUsuario`, `Nombres`, `Apellidos`, `NomUser`, `Password`, `Correo`, `Img`) VALUES
	(1, 'Erick Martin', 'Leyva Díaz', 'Userley', '44196944', 'userley.diaz@gmail.com', 'img/team-1.jpg'),
	(2, 'Diana Karina', 'Monsalve Frias', 'Diamfri', '12345678', 'diamfri@hotmail.com', 'img/team-2.jpg'),
	(3, 'Jhostyn Farhyt', 'Bances Monsalve', 'Jfarhyt', '12345678', 'jfrahyt@gmail.com', 'img/team-3.jpg'),
	(4, 'Sophia Meylin', 'Leyva Monsalve', 'Smeylin', '12345678', 'smeylin@gmail.com', 'img/team-4.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
