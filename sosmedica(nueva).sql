-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2016 a las 00:08:48
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sosmedica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE IF NOT EXISTS `almacen` (
`id_almacen` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(500) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(200) COLLATE utf8_bin NOT NULL,
  `horario` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `nombre`, `direccion`, `telefono`, `horario`) VALUES
(7, 'SOS MEDICA PRUEBA', 'SOS MEDICA PRUEBA', 'SOS MEDICA PRUEBA', 'SOS MEDICA PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`id_categoria` int(11) NOT NULL,
  `categoria` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(18, ' Acceso Intravenoso'),
(19, 'Adhesivos'),
(20, 'Agujas'),
(21, 'Apositos'),
(22, 'Cardiologia'),
(23, 'Cateteres'),
(24, 'Cuidado de Heridas'),
(25, 'Equipos Medicos'),
(26, 'Esterilizacion'),
(27, 'Gasas y Compresas'),
(28, 'Guantes'),
(29, 'Hojillas'),
(30, 'Jeringas (Inyectadoras)'),
(31, 'Lenceria Medica Descartable'),
(32, 'Medicina Deportiva'),
(33, 'Odontologia'),
(34, 'Productos BBraun'),
(35, 'Producto de Papel'),
(36, 'Productos Johnson&Johnson'),
(37, 'Set de Infusion'),
(38, 'Sondas'),
(39, 'Suturas'),
(40, 'Varios Material Medico'),
(41, 'Vendas'),
(42, 'Instrumental Quirurgico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_producto`
--

CREATE TABLE IF NOT EXISTS `img_producto` (
`id_img_producto` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `nombre` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `img_producto`
--

INSERT INTO `img_producto` (`id_img_producto`, `id_publicacion`, `nombre`) VALUES
(17, 31, 'sosmedica5807da3260ec41232.png'),
(18, 33, 'sosmedica5807da90185171232.png'),
(19, 34, 'sosmedica5807eb3d0abad133.jpg'),
(20, 35, 'sosmedica5807eba54ce2e132.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
`id_marca` int(11) NOT NULL,
  `marca` varchar(200) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `marca`, `tipo`) VALUES
(11, 'PRUEBA', 'PRODUCTO'),
(12, ' PRUEBA', 'EQUIPO'),
(13, ' PRUEBA PRODUCTOS', 'PRODUCTO'),
(14, 'PRUEBA EQUIPOS', 'EQUIPO'),
(17, '3M', 'PRODUCTO'),
(18, 'ACTIMED', 'PRODUCTO'),
(19, 'ADAR', 'PRODUCTO'),
(20, 'AIRLIFE', 'PRODUCTO'),
(21, 'ATRIUM', 'PRODUCTO'),
(22, 'B.BRAUN', 'PRODUCTO'),
(23, 'BASTOS VIEGAS', 'PRODUCTO'),
(24, 'BEXEN', 'PRODUCTO'),
(25, 'BIO-PROTECH', 'PRODUCTO'),
(26, 'BLOSSOM', 'PRODUCTO'),
(27, 'BNS MEDICAL', 'PRODUCTO'),
(28, 'CARBOLYME', 'PRODUCTO'),
(29, 'CARDINAL', 'PRODUCTO'),
(30, 'CAVEX', 'PRODUCTO'),
(31, 'COLIN', 'PRODUCTO'),
(32, 'CAVEX', 'PRODUCTO'),
(33, 'DEROYAL', 'PRODUCTO'),
(34, 'DESCART', 'PRODUCTO'),
(35, 'DETEXA', 'PRODUCTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `enlace` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `titulo`, `enlace`) VALUES
(9, 'Quienes Somos', 'empresa'),
(10, 'Contactanos', 'contacto'),
(11, 'Administrar', 'administrar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
`id_permisos` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `permiso` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permisos`, `id_menu`, `id_role`, `permiso`) VALUES
(3, 9, 2, 1),
(4, 10, 2, 1),
(5, 11, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id_producto` int(11) NOT NULL,
  `nombre` varchar(500) COLLATE utf8_bin NOT NULL,
  `presentacion` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `modelo` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `presentacion`, `modelo`, `id_marca`, `id_categoria`) VALUES
(31, 'PRUEBA SOSMEDICA', '1 Caja x 100 Unidades.', '', 22, 28),
(33, 'EQUIPO DE PRUEBA', '', '36952', 14, NULL),
(34, 'probando', '', '255852', 14, 25),
(35, 'SOS MEDICA PRUEBA', 'adasd', '', 30, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto-almacen`
--

CREATE TABLE IF NOT EXISTS `producto-almacen` (
`id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `estatus` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id_role`, `role`, `peso`) VALUES
(1, 'admin', 1),
(2, 'anonimo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '2',
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_role`, `login`, `password`, `estado`) VALUES
(1, 1, 'admin', '53362d5ea52a28e1a960323ea19b02cb2b828026', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
 ADD PRIMARY KEY (`id_almacen`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `img_producto`
--
ALTER TABLE `img_producto`
 ADD PRIMARY KEY (`id_img_producto`), ADD KEY `id_publicacion` (`id_publicacion`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
 ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
 ADD PRIMARY KEY (`id_permisos`), ADD KEY `id_menu` (`id_menu`,`id_role`), ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id_producto`), ADD KEY `id_marca` (`id_marca`), ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `producto-almacen`
--
ALTER TABLE `producto-almacen`
 ADD PRIMARY KEY (`id`), ADD KEY `id_almacen` (`id_almacen`), ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`), ADD KEY `id_role_2` (`id_role`), ADD KEY `id_role_3` (`id_role`), ADD KEY `id_role_4` (`id_role`), ADD KEY `id_role_5` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `img_producto`
--
ALTER TABLE `img_producto`
MODIFY `id_img_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
MODIFY `id_permisos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `producto-almacen`
--
ALTER TABLE `producto-almacen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `img_producto`
--
ALTER TABLE `img_producto`
ADD CONSTRAINT `img_producto_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto-almacen`
--
ALTER TABLE `producto-almacen`
ADD CONSTRAINT `producto-almacen_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
ADD CONSTRAINT `producto-almacen_ibfk_2` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id_almacen`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
