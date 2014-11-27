-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2014 a las 04:51:07
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `2014_cementerio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque_bajo_tierra`
--

CREATE TABLE IF NOT EXISTS `bloque_bajo_tierra` (
  `id_bloque_bajo_tierra` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `position` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bloque_bajo_tierra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque_cremado`
--

CREATE TABLE IF NOT EXISTS `bloque_cremado` (
  `id_bloque_cremado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `position` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bloque_cremado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque_mausoleo`
--

CREATE TABLE IF NOT EXISTS `bloque_mausoleo` (
  `id_bloque_mausoleo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `position` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bloque_mausoleo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bloque_mausoleo`
--

INSERT INTO `bloque_mausoleo` (`id_bloque_mausoleo`, `nombre`, `position`, `create_date`) VALUES
(1, 'Ovando', '706,145', '2014-11-25 21:09:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque_nicho`
--

CREATE TABLE IF NOT EXISTS `bloque_nicho` (
  `id_bloque_nicho` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `numero_piso` int(1) NOT NULL,
  `numero_caras` int(1) NOT NULL,
  `numero_filas` int(11) NOT NULL,
  `numero_nichos` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `costo_perpetuidad_1_clase` decimal(10,2) NOT NULL,
  `costo_perpetuidad_2_clase` decimal(10,2) NOT NULL,
  `costo_5_year_1_clase` decimal(10,2) NOT NULL,
  `costo_5_year_2_clase` decimal(10,2) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bloque_nicho`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bloque_nicho`
--

INSERT INTO `bloque_nicho` (`id_bloque_nicho`, `nombre`, `numero_piso`, `numero_caras`, `numero_filas`, `numero_nichos`, `position`, `costo_perpetuidad_1_clase`, `costo_perpetuidad_2_clase`, `costo_5_year_1_clase`, `costo_5_year_2_clase`, `create_date`) VALUES
(1, 'Bloque A', 1, 2, 4, 8, '207,153', 211.00, 123.00, 312.00, 222.00, '2014-11-22 12:59:03'),
(2, 'Bloque B', 1, 2, 3, 4, '188,269', 123.00, 111.00, 159.00, 120.00, '2014-11-24 13:41:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_ingreso`
--

CREATE TABLE IF NOT EXISTS `comprobante_ingreso` (
  `id_comprobante_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `id_tramite` int(5) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nit` varchar(150) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `nro_casa` int(11) NOT NULL,
  `manzana` varchar(50) NOT NULL,
  `nit_ci` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `codio_cuenta` varchar(150) NOT NULL,
  `concepto` text NOT NULL,
  `importe_bolivianos` decimal(10,2) NOT NULL,
  `importe_literal` varchar(150) NOT NULL,
  `reposicion_comprobante` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_comprobante_ingreso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `difunto`
--

CREATE TABLE IF NOT EXISTS `difunto` (
  `id_difunto` int(11) NOT NULL AUTO_INCREMENT,
  `oficialia` varchar(150) NOT NULL,
  `libro` varchar(150) NOT NULL,
  `partida` varchar(150) NOT NULL,
  `folioNum` varchar(150) NOT NULL,
  `departamento` varchar(150) NOT NULL,
  `provincia` varchar(150) NOT NULL,
  `localidad` varchar(150) NOT NULL,
  `fechaPartida` datetime NOT NULL,
  `nombreCompletoFallecido` varchar(150) NOT NULL,
  `edadFallecido` int(5) NOT NULL,
  `fechaFallecido` datetime NOT NULL,
  `localidadFallecido` varchar(150) NOT NULL,
  `provinciaFallecido` varchar(150) NOT NULL,
  `departamentoFallecido` varchar(150) NOT NULL,
  `paisFallecido` varchar(150) NOT NULL,
  `comprobante` varchar(50) NOT NULL,
  `matricula_ci` varchar(50) NOT NULL,
  `nombreCompletoInscripcion` varchar(150) NOT NULL,
  `ciInscripcion` int(15) NOT NULL,
  `relacionConDifunto` varchar(150) NOT NULL,
  `nota` varchar(150) NOT NULL,
  PRIMARY KEY (`id_difunto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `difunto`
--

INSERT INTO `difunto` (`id_difunto`, `oficialia`, `libro`, `partida`, `folioNum`, `departamento`, `provincia`, `localidad`, `fechaPartida`, `nombreCompletoFallecido`, `edadFallecido`, `fechaFallecido`, `localidadFallecido`, `provinciaFallecido`, `departamentoFallecido`, `paisFallecido`, `comprobante`, `matricula_ci`, `nombreCompletoInscripcion`, `ciInscripcion`, `relacionConDifunto`, `nota`) VALUES
(1, 'sadas', 'asdas', 'asda', 'asda', 'Chuquisaca', 'asdsa', '', '0000-00-00 00:00:00', 'adas asd as das ', 33, '0000-00-00 00:00:00', 'asdas', 'asda', 'asda', 'sad', 'sadas', '213213', 'asdas', 22321, 'asdasd', 'sadasd'),
(2, 'asdsa', 'asdas', 'asd', 'asda', 'Chuquisaca', 'asda', 'ssss', '2014-11-10 00:00:00', 'asdas', 22, '2014-11-11 09:13:21', 'sadas', 'ad', 'asda', 'asdas', 'asda', '1312321', 'asdas', 22321, 'adasd', 'adasd'),
(3, 'sad', 'asdas', 'sada', 'asd', 'Pando', 'asda', 'asdas', '2014-11-18 00:00:00', 'asdada', 33, '2014-11-22 09:47:01', 'asdasdas', 'asda', 'asda', 'asda', 'sdasd', '2212', 'asdas', 12312, 'asdasd', 'asdas'),
(4, 'asdas', 'asdas', 'asd', '22', 'La Paz', 'sadsa', 'asdas', '2014-11-03 00:00:00', 'asdsa aaaa', 22, '2014-11-24 09:44:32', 'asdsa', 'sadsa', 'asdas', 'sadas', 'sadas', '2334121', 'asd a asd ', 2334121, 'asdas', 'sdassda'),
(5, 'aa', 'asd', 'sad', '22', 'Chuquisaca', 'aa', 'sad', '2014-11-03 00:00:00', 'asd aaaa', 44, '2014-11-25 12:04:16', 'asd', 'asda', 'asdas', 'asda', 'asdasd', '234232', 'dsa dddd dd', 2131221, 'asda', 'asdasd'),
(6, 'asdhjksa', '123', '455', '21', 'Beni', 'ccc', 'asdsad', '2014-11-10 00:00:00', 'asdsa', 234, '2014-11-04 02:00:33', 'qwe', 'qwewq', 'qwewq', 'ewrqew', 'qweq', '1234', 'eqrwer', 2123432, 'dsafas', 'asdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nicho`
--

CREATE TABLE IF NOT EXISTS `nicho` (
  `id_nicho` int(11) NOT NULL AUTO_INCREMENT,
  `id_bloque` int(11) NOT NULL,
  `id_difunto` int(1) NOT NULL,
  `piso` int(1) NOT NULL,
  `cara` int(1) NOT NULL,
  `fila` int(11) NOT NULL,
  `nicho` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nicho`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Volcado de datos para la tabla `nicho`
--

INSERT INTO `nicho` (`id_nicho`, `id_bloque`, `id_difunto`, `piso`, `cara`, `fila`, `nicho`, `estado`) VALUES
(1, 1, 2, 1, 1, 4, 1, 'Ocupado'),
(2, 1, 3, 1, 1, 4, 2, 'Ocupado'),
(3, 1, 0, 1, 1, 4, 3, 'Libre'),
(4, 1, 5, 1, 1, 4, 4, 'Ocupado'),
(5, 1, 0, 1, 1, 4, 5, 'Libre'),
(6, 1, 0, 1, 1, 4, 6, 'Libre'),
(7, 1, 0, 1, 1, 4, 7, 'Libre'),
(8, 1, 0, 1, 1, 4, 8, 'Libre'),
(9, 1, 0, 1, 1, 3, 9, 'Libre'),
(10, 1, 0, 1, 1, 3, 10, 'Libre'),
(11, 1, 0, 1, 1, 3, 11, 'Libre'),
(12, 1, 0, 1, 1, 3, 12, 'Libre'),
(13, 1, 1, 1, 1, 3, 13, 'Ocupado'),
(14, 1, 0, 1, 1, 3, 14, 'Libre'),
(15, 1, 0, 1, 1, 3, 15, 'Libre'),
(16, 1, 0, 1, 1, 3, 16, 'Libre'),
(17, 1, 0, 1, 1, 2, 17, 'Libre'),
(18, 1, 0, 1, 1, 2, 18, 'Libre'),
(19, 1, 0, 1, 1, 2, 19, 'Libre'),
(20, 1, 0, 1, 1, 2, 20, 'Libre'),
(21, 1, 0, 1, 1, 2, 21, 'Libre'),
(22, 1, 0, 1, 1, 2, 22, 'Libre'),
(23, 1, 0, 1, 1, 2, 23, 'Libre'),
(24, 1, 0, 1, 1, 2, 24, 'Libre'),
(25, 1, 0, 1, 1, 1, 25, 'Libre'),
(26, 1, 0, 1, 1, 1, 26, 'Libre'),
(27, 1, 0, 1, 1, 1, 27, 'Libre'),
(28, 1, 0, 1, 1, 1, 28, 'Libre'),
(29, 1, 0, 1, 1, 1, 29, 'Libre'),
(30, 1, 0, 1, 1, 1, 30, 'Libre'),
(31, 1, 0, 1, 1, 1, 31, 'Libre'),
(32, 1, 0, 1, 1, 1, 32, 'Libre'),
(33, 1, 0, 1, 2, 4, 1, 'Libre'),
(34, 1, 0, 1, 2, 4, 2, 'Libre'),
(35, 1, 0, 1, 2, 4, 3, 'Libre'),
(36, 1, 0, 1, 2, 4, 4, 'Libre'),
(37, 1, 0, 1, 2, 4, 5, 'Libre'),
(38, 1, 0, 1, 2, 4, 6, 'Libre'),
(39, 1, 0, 1, 2, 4, 7, 'Libre'),
(40, 1, 0, 1, 2, 4, 8, 'Libre'),
(41, 1, 0, 1, 2, 3, 9, 'Libre'),
(42, 1, 6, 1, 2, 3, 10, 'Ocupado'),
(43, 1, 0, 1, 2, 3, 11, 'Libre'),
(44, 1, 0, 1, 2, 3, 12, 'Libre'),
(45, 1, 0, 1, 2, 3, 13, 'Libre'),
(46, 1, 0, 1, 2, 3, 14, 'Libre'),
(47, 1, 0, 1, 2, 3, 15, 'Libre'),
(48, 1, 0, 1, 2, 3, 16, 'Libre'),
(49, 1, 0, 1, 2, 2, 17, 'Libre'),
(50, 1, 0, 1, 2, 2, 18, 'Libre'),
(51, 1, 0, 1, 2, 2, 19, 'Libre'),
(52, 1, 0, 1, 2, 2, 20, 'Libre'),
(53, 1, 0, 1, 2, 2, 21, 'Libre'),
(54, 1, 0, 1, 2, 2, 22, 'Libre'),
(55, 1, 0, 1, 2, 2, 23, 'Libre'),
(56, 1, 0, 1, 2, 2, 24, 'Libre'),
(57, 1, 0, 1, 2, 1, 25, 'Libre'),
(58, 1, 0, 1, 2, 1, 26, 'Libre'),
(59, 1, 0, 1, 2, 1, 27, 'Libre'),
(60, 1, 0, 1, 2, 1, 28, 'Libre'),
(61, 1, 0, 1, 2, 1, 29, 'Libre'),
(62, 1, 0, 1, 2, 1, 30, 'Libre'),
(63, 1, 0, 1, 2, 1, 31, 'Libre'),
(64, 1, 0, 1, 2, 1, 32, 'Libre'),
(65, 2, 0, 1, 1, 3, 1, 'Libre'),
(66, 2, 4, 1, 1, 3, 2, 'Ocupado'),
(67, 2, 0, 1, 1, 3, 3, 'Libre'),
(68, 2, 0, 1, 1, 3, 4, 'Libre'),
(69, 2, 0, 1, 1, 2, 5, 'Libre'),
(70, 2, 0, 1, 1, 2, 6, 'Libre'),
(71, 2, 0, 1, 1, 2, 7, 'Libre'),
(72, 2, 0, 1, 1, 2, 8, 'Libre'),
(73, 2, 0, 1, 1, 1, 9, 'Libre'),
(74, 2, 0, 1, 1, 1, 10, 'Libre'),
(75, 2, 0, 1, 1, 1, 11, 'Libre'),
(76, 2, 0, 1, 1, 1, 12, 'Libre'),
(77, 2, 0, 1, 2, 3, 1, 'Libre'),
(78, 2, 0, 1, 2, 3, 2, 'Libre'),
(79, 2, 0, 1, 2, 3, 3, 'Libre'),
(80, 2, 0, 1, 2, 3, 4, 'Libre'),
(81, 2, 0, 1, 2, 2, 5, 'Libre'),
(82, 2, 0, 1, 2, 2, 6, 'Libre'),
(83, 2, 0, 1, 2, 2, 7, 'Libre'),
(84, 2, 0, 1, 2, 2, 8, 'Libre'),
(85, 2, 0, 1, 2, 1, 9, 'Libre'),
(86, 2, 0, 1, 2, 1, 10, 'Libre'),
(87, 2, 0, 1, 2, 1, 11, 'Libre'),
(88, 2, 0, 1, 2, 1, 12, 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE IF NOT EXISTS `precios` (
  `id_precios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_precios`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE IF NOT EXISTS `solicitante` (
  `id_solicitante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `ci` varchar(10) NOT NULL,
  `actividad` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `manzana` varchar(150) NOT NULL,
  `numero_casa` varchar(5) NOT NULL,
  `nit` varchar(15) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_solicitante`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`id_solicitante`, `nombre`, `apellido`, `ci`, `actividad`, `telefono`, `celular`, `direccion`, `manzana`, `numero_casa`, `nit`, `create_date`) VALUES
(1, 'Diego', 'Rueda', '12345678', 'arquitecto', '74785966', '1213132', 'pacata baja', 'asd', '123', '12345678', '2014-11-22 13:00:03'),
(2, 'asdas', 'asdas', '21321', 'asdas', '21321', '21321', 'adas', 'sada', '23', '2132112', '2014-11-22 13:24:28'),
(3, 'ssa', 'dsadsa', '223', 'sad', '213213', '21312', 'adsas', 'asd', 'asda', '2232', '2014-11-22 13:26:36'),
(4, 'Roberto', 'Oropeza', '2334121', 'vendedor', '2122222', '4444444', 'aaaa', 'sadsa', '123', '2334121', '2014-11-24 13:42:09'),
(5, 'Marcos', 'MErida', '6932584', 'sastre', '1232131', '1231233', 'asdsa ', 'sss', '34', '6932584', '2014-11-25 16:01:46'),
(6, 'Marcelo', 'Pozo', '1231233', 'minero', '2222', '2222', 'dasd', 'sada', '22', '1231233', '2014-11-25 16:03:04'),
(7, 'juan', 'peres', '1234132', 'todas las noches', '4654654', '324324324', 'fdasf', '1 por dia', '1478', '79871321321', '2014-11-25 21:48:40'),
(8, 'pedr', 'escamoso', '465465', 'gjhgj', '4156464646', '132165464', 'qwyeqf', 'jlkj', 'jhgjh', '45555566', '2014-11-25 21:53:48'),
(9, 'mar a', 'asdas', '12312', 'sadas', '21312', '123123', 'asdasd', 'asds', '211', '12312', '2014-11-27 01:44:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE IF NOT EXISTS `tramite` (
  `id_tramite` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(5) NOT NULL,
  `id_solicitante` int(11) NOT NULL,
  `id_difunto` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL,
  `tramite` varchar(100) NOT NULL,
  `bloque` varchar(150) NOT NULL,
  `piso` int(5) NOT NULL,
  `lado` int(5) NOT NULL,
  `nro_nicho` int(5) NOT NULL,
  `tipo_nicho` varchar(50) DEFAULT NULL,
  `tiempo` varchar(50) DEFAULT NULL,
  `clase` varchar(15) DEFAULT NULL,
  `fecha_tramite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `costo` decimal(10,2) NOT NULL,
  `pagado` int(1) NOT NULL,
  PRIMARY KEY (`id_tramite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`id_tramite`, `id_users`, `id_solicitante`, `id_difunto`, `id_bloque`, `tramite`, `bloque`, `piso`, `lado`, `nro_nicho`, `tipo_nicho`, `tiempo`, `clase`, `fecha_tramite`, `costo`, `pagado`) VALUES
(1, 1, 1, 1, 1, 'Nicho Enterratorio', 'Nicho', 1, 1, 13, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-22 13:09:14', 211.00, 0),
(2, 1, 2, 2, 1, 'Nicho Enterratorio', 'Nicho', 1, 1, 1, 'Menor', 'Perpetuidad', '1ra Clase', '2014-11-22 13:25:17', 211.00, 0),
(3, 2, 3, 3, 1, 'Nicho Enterratorio', 'Nicho', 1, 1, 2, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-22 13:50:21', 211.00, 0),
(4, 2, 4, 4, 2, 'Anexion Nicho Perpetuidad', 'Bloque B', 1, 1, 66, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-24 13:44:43', 253.00, 0),
(5, 2, 5, 1, 1, 'Colocacion de Lapida', 'Bloque A', 1, 1, 13, NULL, NULL, '1ra Clase', '2014-11-25 16:02:03', 63.00, 0),
(6, 2, 6, 5, 1, 'Nicho Enterratorio', 'Bloque A', 1, 1, 4, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-25 16:04:45', 211.00, 0),
(7, 2, 7, 5, 1, 'Colocacion de Lapida', 'Bloque A', 1, 1, 4, NULL, NULL, '1ra Clase', '2014-11-25 21:49:31', 63.00, 0),
(8, 2, 8, 6, 1, 'Nicho Perpetuidad', 'Bloque A', 1, 2, 42, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-25 22:02:48', 211.00, 0),
(9, 2, 9, 4, 2, 'Colocacion de Lapida', 'Nicho', 1, 1, 66, NULL, NULL, '1ra Clase', '2014-11-27 01:46:26', 63.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `ci` varchar(8) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `nombre`, `apellido`, `ci`, `correo`, `password`, `telefono`, `rol`, `create_date`) VALUES
(1, 'helvin', 'guzman', '12345678', 'hel@boy.com', '12345', '54322', 'Administrador', '2014-11-15 00:55:46'),
(2, 'Rafael', 'Pozo', '6541238', 'pozo@pozo.com', '12345', '9875632', 'Responsable', '2014-11-15 09:47:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
