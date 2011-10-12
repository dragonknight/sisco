-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-10-2011 a las 11:49:56
-- Versión del servidor: 5.1.58
-- Versión de PHP: 5.3.8-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sisco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `idTransaccion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id para la tabla',
  `tipoTransaccion` int(2) DEFAULT NULL COMMENT 'id para el tipo de entrada en el log',
  `detalle` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'ip del cliente que ejecuto la transaccion',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTransaccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Log del sistema sisco' AUTO_INCREMENT=132 ;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idTransaccion`, `tipoTransaccion`, `detalle`, `ip`, `fecha`) VALUES
(1, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-02 17:56:37'),
(2, 6, 'Intento de Login con Credenciales Invalidas', '192.168.200.6', '2011-10-02 18:05:17'),
(3, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 03:39:19'),
(4, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 03:50:30'),
(5, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 03:52:14'),
(6, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 03:57:07'),
(7, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:02:24'),
(8, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:05:04'),
(9, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:05:10'),
(10, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:06:36'),
(11, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:07:48'),
(12, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:09:35'),
(13, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:09:40'),
(14, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:10:25'),
(15, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:10:39'),
(16, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:10:56'),
(17, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:10:59'),
(18, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:11:32'),
(19, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:13:17'),
(20, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:17:10'),
(21, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:17:14'),
(22, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:17:25'),
(23, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:17:44'),
(24, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:19:27'),
(25, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:20:24'),
(26, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:22:01'),
(27, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:25:41'),
(28, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:32:34'),
(29, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:33:32'),
(30, 5, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:34:57'),
(31, 4, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:37:31'),
(32, 4, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:38:07'),
(33, 4, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:38:43'),
(34, 4, 'El usuario: admin accedio al Sisco', '::1', '2011-10-03 04:38:54'),
(35, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:57:10'),
(36, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:57:12'),
(37, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:58:48'),
(38, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:58:53'),
(39, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:58:54'),
(40, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:58:55'),
(41, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:59:02'),
(42, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:59:08'),
(43, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:59:45'),
(44, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 04:59:46'),
(45, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 04:59:54'),
(46, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 05:01:24'),
(47, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 05:01:31'),
(48, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-03 05:01:54'),
(49, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-03 05:01:59'),
(50, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-04 18:05:28'),
(51, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-04 18:32:12'),
(52, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 02:56:51'),
(53, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:25:05'),
(54, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:26:04'),
(55, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:26:59'),
(56, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:29:37'),
(57, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:30:29'),
(58, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-05 03:31:07'),
(59, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:31:12'),
(60, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:32:08'),
(61, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:32:33'),
(62, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 03:47:01'),
(63, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 04:20:17'),
(64, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-05 05:42:57'),
(65, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 01:20:40'),
(66, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 01:40:24'),
(67, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:06:22'),
(68, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:20:40'),
(69, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:24:50'),
(70, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 02:31:20'),
(71, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 02:31:27'),
(72, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:31:37'),
(73, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:58:07'),
(74, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:58:11'),
(75, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:58:58'),
(76, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 02:59:45'),
(77, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:21:53'),
(78, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:27:07'),
(79, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:27:10'),
(80, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:39:04'),
(81, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:40:12'),
(82, 5, 'El usuario:  accedió a Sisco', '::1', '2011-10-06 03:44:38'),
(83, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:47:58'),
(84, 5, 'El usuario: admin accedió a Sisco', '192.168.200.6', '2011-10-06 03:49:30'),
(85, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:51:17'),
(86, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:51:45'),
(87, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 03:59:37'),
(88, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:01:29'),
(89, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:02:58'),
(90, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:04:31'),
(91, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 04:05:47'),
(92, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:05:53'),
(93, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:08:35'),
(94, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:09:16'),
(95, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:10:05'),
(96, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:10:07'),
(97, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 04:10:50'),
(98, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:10:56'),
(99, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:10:59'),
(100, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:11:15'),
(101, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:15:46'),
(102, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:18:11'),
(103, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:20:42'),
(104, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:21:17'),
(105, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:23:28'),
(106, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:24:47'),
(107, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:26:33'),
(108, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:30:39'),
(109, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 04:31:20'),
(110, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:31:25'),
(111, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:33:02'),
(112, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:33:04'),
(113, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:35:56'),
(114, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:37:19'),
(115, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:38:11'),
(116, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:38:13'),
(117, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:38:14'),
(118, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:39:12'),
(119, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:41:06'),
(120, 5, 'El usuario: admin accedió a Sisco', '::1', '2011-10-06 04:44:23'),
(121, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 04:53:51'),
(122, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 04:53:59'),
(123, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 04:54:02'),
(124, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-06 22:00:37'),
(125, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-08 03:56:38'),
(126, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-08 04:01:01'),
(127, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-08 04:01:09'),
(128, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-08 04:44:02'),
(129, 6, 'Intento de Login con Credenciales Invalidas', '::1', '2011-10-09 00:58:59'),
(130, 6, 'Intento de Login sin Credenciales', '::1', '2011-10-09 00:59:06'),
(131, 5, 'El usuario: admin accedio al Sisco', '127.0.0.1', '2011-10-12 16:14:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idPersona` int(8) NOT NULL,
  `idCargo` int(2) NOT NULL,
  `login` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Datos para el login de usuario al sistema';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idPersona`, `idCargo`, `login`, `password`) VALUES
(1, 0, 'admin', '4dm1n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
