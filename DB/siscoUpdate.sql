-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2012 a las 09:52:22
-- Versión del servidor: 5.1.61
-- Versión de PHP: 5.3.3-7+squeeze8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sisco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `idAsignacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Asignaciones',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numInterno` varchar(25) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `statusAsig` int(11) NOT NULL,
  PRIMARY KEY (`idAsignacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Registro de asignación de tareas' AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `asignaciones`
--
