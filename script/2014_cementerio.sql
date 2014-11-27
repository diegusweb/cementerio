-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2014 a las 15:02:55
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `bloque_bajo_tierra`
--

INSERT INTO `bloque_bajo_tierra` (`id_bloque_bajo_tierra`, `nombre`, `position`, `create_date`) VALUES
(1, 'General', '498,373', '2014-11-27 12:18:08');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `bloque_cremado`
--

INSERT INTO `bloque_cremado` (`id_bloque_cremado`, `nombre`, `position`, `create_date`) VALUES
(1, 'General', '597,26', '2014-11-27 09:14:02');

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
-- Volcar la base de datos para la tabla `bloque_mausoleo`
--

INSERT INTO `bloque_mausoleo` (`id_bloque_mausoleo`, `nombre`, `position`, `create_date`) VALUES
(1, 'Ovando', '706,145', '2014-11-25 14:08:46');

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
-- Volcar la base de datos para la tabla `bloque_nicho`
--

INSERT INTO `bloque_nicho` (`id_bloque_nicho`, `nombre`, `numero_piso`, `numero_caras`, `numero_filas`, `numero_nichos`, `position`, `costo_perpetuidad_1_clase`, `costo_perpetuidad_2_clase`, `costo_5_year_1_clase`, `costo_5_year_2_clase`, `create_date`) VALUES
(1, 'Bloque A', 1, 2, 4, 8, '207,153', '211.00', '123.00', '312.00', '222.00', '2014-11-22 05:58:39'),
(2, 'Bloque B', 1, 2, 3, 4, '188,269', '123.00', '111.00', '159.00', '120.00', '2014-11-24 06:40:47');

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

--
-- Volcar la base de datos para la tabla `comprobante_ingreso`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `difunto`
--

INSERT INTO `difunto` (`id_difunto`, `oficialia`, `libro`, `partida`, `folioNum`, `departamento`, `provincia`, `localidad`, `fechaPartida`, `nombreCompletoFallecido`, `edadFallecido`, `fechaFallecido`, `localidadFallecido`, `provinciaFallecido`, `departamentoFallecido`, `paisFallecido`, `comprobante`, `matricula_ci`, `nombreCompletoInscripcion`, `ciInscripcion`, `relacionConDifunto`, `nota`) VALUES
(1, 'sadas', 'asdas', 'asda', 'asda', 'Chuquisaca', 'asdsa', '', '0000-00-00 00:00:00', 'adas asd as das ', 33, '0000-00-00 00:00:00', 'asdas', 'asda', 'asda', 'sad', 'sadas', '213213', 'asdas', 22321, 'asdasd', 'sadasd'),
(2, 'asdsa', 'asdas', 'asd', 'asda', 'Chuquisaca', 'asda', 'ssss', '2014-11-10 00:00:00', 'asdas', 22, '2014-11-11 09:13:21', 'sadas', 'ad', 'asda', 'asdas', 'asda', '1312321', 'asdas', 22321, 'adasd', 'adasd'),
(3, 'sad', 'asdas', 'sada', 'asd', 'Pando', 'asda', 'asdas', '2014-11-18 00:00:00', 'asdada', 33, '2014-11-22 09:47:01', 'asdasdas', 'asda', 'asda', 'asda', 'sdasd', '2212', 'asdas', 12312, 'asdasd', 'asdas'),
(4, 'asdas', 'asdas', 'asd', '22', 'La Paz', 'sadsa', 'asdas', '2014-11-03 00:00:00', 'asdsa aaaa', 22, '2014-11-24 09:44:32', 'asdsa', 'sadsa', 'asdas', 'sadas', 'sadas', '2334121', 'asd a asd ', 2334121, 'asdas', 'sdassda'),
(5, 'aa', 'asd', 'sad', '22', 'Chuquisaca', 'aa', 'sad', '2014-11-03 00:00:00', 'asd aaaa', 44, '2014-11-25 12:04:16', 'asd', 'asda', 'asdas', 'asda', 'asdasd', '234232', 'dsa dddd dd', 2131221, 'asda', 'asdasd'),
(6, 'asdhjksa', '123', '455', '21', 'Beni', 'ccc', 'asdsad', '2014-11-10 00:00:00', 'asdsa', 234, '2014-11-04 02:00:33', 'qwe', 'qwewq', 'qwewq', 'ewrqew', 'qweq', '1234', 'eqrwer', 2123432, 'dsafas', 'asdf'),
(7, 'asdasda', 'asdasd', '12312', '312', 'Chuquisaca', 'asdas', 'asda', '2014-11-19 00:00:00', 'pepe agila', 33, '2014-11-04 10:49:18', 'adas', 'sdas', 'asd', 'asda', 'asd', '13212', 'aasd sdas', 232131, 'sdasd', 'asdas'),
(8, 'asdas', 'asd', 'asd', '123', 'La Paz', 'asd', 'asdas', '2014-11-18 00:00:00', 'aoi doc', 22, '2014-11-17 14:45:06', 'asda', 'asd', 'asdas', 'sadas', 'asda', '13123', 'aaaa dddd', 22222, 'asdas', 'asdasd'),
(9, 'sadas d', 'asd asd', 'asdas', '232', 'Santa Cruz', 'asdas', 'asdas', '2014-11-16 00:00:00', 'Ronaldo peeaaa', 33, '2014-11-04 15:37:37', 'asda', 'ads', 'asd', 'asdas', 'asdas', '123123', 'aaaa fffff', 123123, 'asdas', 'asdasd'),
(10, 'asdasd', 'asda', 'asda', 'sad', 'Potosí', 'asdas', 'asda', '2014-11-17 00:00:00', 'asd aaa', 22, '2014-11-20 16:42:11', 'asda', 'das', 'asdas', 'asdsa', 'asdas', '2131', 'auuu oooo', 23423, 'sdas', 'dasdas');

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
-- Volcar la base de datos para la tabla `nicho`
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

--
-- Volcar la base de datos para la tabla `precios`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcar la base de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`id_solicitante`, `nombre`, `apellido`, `ci`, `actividad`, `telefono`, `celular`, `direccion`, `manzana`, `numero_casa`, `nit`, `create_date`) VALUES
(1, 'Diego', 'Rueda', '12345678', 'arquitecto', '74785966', '1213132', 'pacata baja', 'asd', '123', '12345678', '2014-11-22 05:59:39'),
(2, 'asdas', 'asdas', '21321', 'asdas', '21321', '21321', 'adas', 'sada', '23', '2132112', '2014-11-22 06:24:04'),
(3, 'ssa', 'dsadsa', '223', 'sad', '213213', '21312', 'adsas', 'asd', 'asda', '2232', '2014-11-22 06:26:12'),
(4, 'Roberto', 'Oropeza', '2334121', 'vendedor', '2122222', '4444444', 'aaaa', 'sadsa', '123', '2334121', '2014-11-24 06:41:45'),
(5, 'Marcos', 'MErida', '6932584', 'sastre', '1232131', '1231233', 'asdsa ', 'sss', '34', '6932584', '2014-11-25 09:01:22'),
(6, 'Marcelo', 'Pozo', '1231233', 'minero', '2222', '2222', 'dasd', 'sada', '22', '1231233', '2014-11-25 09:02:40'),
(7, 'juan', 'peres', '1234132', 'todas las noches', '4654654', '324324324', 'fdasf', '1 por dia', '1478', '79871321321', '2014-11-25 14:48:16'),
(8, 'pedr', 'escamoso', '465465', 'gjhgj', '4156464646', '132165464', 'qwyeqf', 'jlkj', 'jhgjh', '45555566', '2014-11-25 14:53:24'),
(9, 'mar a', 'asdas', '12312', 'sadas', '21312', '123123', 'asdasd', 'asds', '211', '12312', '2014-11-26 18:44:07'),
(10, 'Herbert', 'gonzales', '423432', 'asdas', '21312', '12312', 'asdasd', 'asdas', '21312', '1111111', '2014-11-27 07:48:50'),
(11, 'Edgar ', 'Coria', '12312', 'ASs', '131231', '213123', 'sdaasd', 'asdas', '231', '12312312', '2014-11-27 11:44:35'),
(12, 'Daniel', 'Montes', '21321', 'asdas', '23432', '23423', 'asdas', 'asdas', '22', '23423', '2014-11-27 12:03:41'),
(13, 'Marcos', 'vera', '123213', 'asda', '213213', '1231212', 'asdas', 'adas', '23', '1231221', '2014-11-27 12:11:28'),
(14, 'Israel', 'montes', '2312312', 'asdas', '213123', '123123', 'asdasd', 'sadasd', '22', '123123', '2014-11-27 12:37:08'),
(15, 'sada', 'aasd', '23432', 'asdas', '2131', '1231', 'dsada', 'asdas', '123', '213123', '2014-11-27 13:41:38'),
(16, 'roberto', 'asdas', '234234', 'asdas', '12312', '12312', 'adas', 'asdasd', '423', '213123', '2014-11-27 13:43:11');

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
  `bloque_nombre` varchar(50) NOT NULL,
  `piso` int(5) NOT NULL,
  `lado` int(5) NOT NULL,
  `nro_nicho` int(5) NOT NULL,
  `tipo_nicho` varchar(50) DEFAULT NULL,
  `tiempo` varchar(50) DEFAULT NULL,
  `clase` varchar(15) DEFAULT NULL,
  `fecha_tramite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `costo` decimal(10,2) NOT NULL,
  `pagado` int(1) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id_tramite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`id_tramite`, `id_users`, `id_solicitante`, `id_difunto`, `id_bloque`, `tramite`, `bloque`, `bloque_nombre`, `piso`, `lado`, `nro_nicho`, `tipo_nicho`, `tiempo`, `clase`, `fecha_tramite`, `costo`, `pagado`, `status`) VALUES
(1, 1, 1, 1, 1, 'Nicho Enterratorio', 'Nicho', 'Bloque B', 1, 1, 13, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-22 06:08:50', '211.00', 0, 'activo'),
(2, 1, 2, 2, 1, 'Nicho Enterratorio', 'Nicho', '', 1, 1, 1, 'Menor', 'Perpetuidad', '1ra Clase', '2014-11-22 06:24:53', '211.00', 0, 'activo'),
(3, 2, 3, 3, 1, 'Nicho Enterratorio', 'Nicho', '', 1, 1, 2, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-22 06:49:57', '211.00', 0, 'activo'),
(4, 2, 4, 4, 2, 'Anexion Nicho Perpetuidad', 'Nicho', 'Bloque B', 1, 1, 66, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-24 06:44:19', '253.00', 0, 'activo'),
(5, 2, 5, 1, 1, 'Colocacion de Lapida', 'Nicho', 'Bloque A', 1, 1, 13, NULL, NULL, '1ra Clase', '2014-11-25 09:01:39', '63.00', 0, 'activo'),
(6, 2, 6, 5, 1, 'Nicho Enterratorio', 'Nicho', 'Bloque A', 1, 1, 4, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-25 09:04:21', '211.00', 0, 'activo'),
(7, 2, 7, 5, 1, 'Colocacion de Lapida', 'Nicho', 'Bloque A', 1, 1, 4, NULL, NULL, '1ra Clase', '2014-11-25 14:49:07', '63.00', 0, 'activo'),
(8, 2, 8, 6, 1, 'Nicho Perpetuidad', 'Nicho', 'Bloque A', 1, 2, 42, 'Mayor', 'Perpetuidad', '1ra Clase', '2014-11-25 15:02:24', '211.00', 0, 'activo'),
(9, 2, 9, 4, 2, 'Colocacion de Lapida', 'Nicho', '', 1, 1, 66, NULL, NULL, '1ra Clase', '2014-11-26 18:46:02', '63.00', 0, 'activo'),
(10, 2, 10, 7, 1, 'Ingresar a Mausoleo', 'Mausoleo', 'Ovando', 0, 0, 0, '', NULL, NULL, '2014-11-27 07:52:19', '0.00', 0, 'inactivo'),
(11, 2, 10, 7, 1, 'Exhumacion', 'Mausoleo', 'Ovando', 0, 0, 0, 'Mayor', NULL, NULL, '2014-11-27 08:43:41', '53.00', 0, 'activo'),
(12, 2, 11, 8, 1, 'Ingreso Cremados', 'Cremados', 'General', 0, 0, 0, 'Mayor', NULL, NULL, '2014-11-27 11:48:24', '253.00', 0, 'inactivo'),
(13, 2, 12, 8, 1, 'Exhumacion Cremados', 'Cremados', 'General', 0, 0, 0, 'Mayor', NULL, NULL, '2014-11-27 12:03:50', '53.00', 0, 'activo'),
(14, 2, 13, 8, 1, 'Renovar Cremados', 'Cremados', 'General', 0, 0, 0, 'Mayor', NULL, NULL, '2014-11-27 12:11:40', '163.00', 0, 'activo'),
(15, 2, 14, 9, 1, 'Ingresar Sitio Tierra', 'Sitio Tierra', 'General', 0, 0, 0, 'Menor', NULL, NULL, '2014-11-27 12:39:20', '83.00', 0, 'inactivo'),
(16, 2, 0, 9, 1, 'Exhumacion Sitio Tierra', 'Sitio Tierra', 'General', 0, 0, 0, 'Mayor', NULL, NULL, '2014-11-27 13:16:55', '53.00', 0, 'activo'),
(17, 2, 15, 10, 1, 'Ingresar Sitio Tierra', 'Sitio Tierra', 'General', 0, 0, 0, 'Menor', NULL, NULL, '2014-11-27 13:42:34', '83.00', 0, 'activo'),
(18, 2, 16, 10, 1, 'Construccion Cripta', 'Sitio Tierra', 'General', 0, 0, 0, 'Menor', NULL, NULL, '2014-11-27 13:43:35', '33.00', 0, 'activo');

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
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `nombre`, `apellido`, `ci`, `correo`, `password`, `telefono`, `rol`, `create_date`) VALUES
(1, 'helvin', 'guzman', '12345678', 'hel@boy.com', '12345', '54322', 'Administrador', '2014-11-14 17:55:22'),
(2, 'Rafael', 'Pozo', '6541238', 'pozo@pozo.com', '12345', '9875632', 'Responsable', '2014-11-15 02:46:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
