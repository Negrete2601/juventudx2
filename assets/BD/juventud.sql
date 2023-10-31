-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-06-2022 a las 20:31:38
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juventud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE `auxiliar` (
  `id` int(11) NOT NULL,
  `id_tramite` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`id`, `id_tramite`, `horas`, `status`) VALUES
(1, 1, 0, 1),
(2, 2, 0, 1),
(3, 2, 80, 1),
(4, 2, 80, 1),
(5, 2, 40, 1),
(6, 2, 1000, 1),
(7, 3, 0, 1),
(8, 4, 0, 1),
(9, 4, 80, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8_spanish2_ci NOT NULL,
  `paterno` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `materno` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(75) COLLATE utf8_spanish2_ci NOT NULL,
  `interior` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `exterior` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `colonia` varchar(75) COLLATE utf8_spanish2_ci NOT NULL,
  `cp` int(5) NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(75) COLLATE utf8_spanish2_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `paterno`, `materno`, `edad`, `fecha_nacimiento`, `lugar_nacimiento`, `curp`, `calle`, `interior`, `exterior`, `colonia`, `cp`, `telefono`, `email`, `facebook`, `status`) VALUES
(1, 'jose manuel', 'castañeda', 'espino', '36', '1986-03-23', 'Aguascalientes', 'CAEM860323HASSSN00', 'calle', '2', '1', 'colonia', 20000, '4491291547', 'jose.espino@jesusmaria.gob.mx', 'https://es-la.facebook.com/JesusMariaMunicipio/', 0),
(2, 'Eleazar', 'Cortez', 'Martinez', '32', '1990-11-05', 'Aguascalientes', 'COME901105HAEEEN00', 'Emiliano Zapata', '', '109', 'Centro', 20920, '4491234567', 'eleazar.cortez@jesusmaria.gob.mx', 'https://es-la.facebook.com/JesusMariaDIF/', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE `tramite` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `escuela` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `modalidad` tinyint(1) NOT NULL COMMENT '0->semestral 1 ->cuatrimestral',
  `horario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL COMMENT '0-> Servicio 1->Practicas',
  `horas` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `discapacidad` tinyint(1) NOT NULL COMMENT '0->no 1->si',
  `cual` varchar(250) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Ninguna',
  `observaciones` varchar(500) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Ninguna',
  `etapa` int(11) NOT NULL COMMENT '0->Presentación 1-> Aceptacion 2->En proceso 3->Carta de Liberación	',
  `codigo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0->sin aprobar 1-> aprobado 2->rechazado\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`id`, `id_estudiante`, `escuela`, `especialidad`, `modalidad`, `horario`, `tipo`, `horas`, `discapacidad`, `cual`, `observaciones`, `etapa`, `codigo`, `area`, `status`) VALUES
(1, 1, 'CECyTEA', 'TICs', 0, 'de 9 am a 8 pm', 0, '480', 0, 'Ninguna', 'No es buena idea', 0, ' ', '$_POST[area]', 2),
(2, 1, 'CECyTEA', 'TICs', 0, 'de 9 am a 8 pm', 1, '1200', 0, '', '', 3, ' ', 'Presidencia Municipal', 1),
(3, 1, 'ITELL', 'Informatica', 0, 'DE 8 am a 4 pm', 0, '650', 0, '', '', 2, ' ', 'Secretaría de Desarrollo Económico', 1),
(4, 2, 'CECyTEA', 'TICs', 0, '8 a 12', 0, '600', 0, '', '', 2, ' ', 'Secretaría de Administración', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0->sin aprobar 1-> aprobado 2->rechazado	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `usuario`, `password`, `id_tipo_usuario`, `status`) VALUES
(1, 'SUPER ADMIN', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 2, 1),
(2, 'jose manuel castañeda espino', 'CAEM860323HASSSN00', 'e10adc3949ba59abbe56e057f20f883e', 5, 1),
(3, 'Eleazar Cortez Martinez', 'COME901105HAEEEN00', 'e10adc3949ba59abbe56e057f20f883e', 5, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarios_pendientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuarios_pendientes` (
`pendientes` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `usuarios_pendientes`
--
DROP TABLE IF EXISTS `usuarios_pendientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios_pendientes`  AS SELECT count(`usuarios`.`id_usuario`) AS `pendientes` FROM `usuarios` WHERE (`usuarios`.`status` = 0) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tramite` (`id_tramite`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tramite`
--
ALTER TABLE `tramite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
