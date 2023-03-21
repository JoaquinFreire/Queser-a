-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2021 a las 03:08:42
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quesos_termolac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `idCalidad` int(11) NOT NULL,
  `Agua` text COLLATE utf8_spanish2_ci NOT NULL,
  `Materia_Grasa` text COLLATE utf8_spanish2_ci NOT NULL,
  `Proteinas` text COLLATE utf8_spanish2_ci NOT NULL,
  `Lactosa` text COLLATE utf8_spanish2_ci NOT NULL,
  `Sales` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `calidad`
--

INSERT INTO `calidad` (`idCalidad`, `Agua`, `Materia_Grasa`, `Proteinas`, `Lactosa`, `Sales`) VALUES
(1, '45', '456', '456', '456', '1'),
(2, '45', '456', '456', '456', '1'),
(3, '789', '87', '78', '798', '5'),
(4, '45', '2', '3', '64', '185'),
(5, '5', '10', '15', '20', '25'),
(6, '5', '10', '15', '20', '25'),
(7, '8', '4', '8', '6', '8'),
(8, '4152', '456', '456', '456', '4'),
(9, '4152', '456', '456', '456', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cisterna`
--

CREATE TABLE `cisterna` (
  `idCisterna` int(11) NOT NULL,
  `Capacidad` decimal(10,0) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `idestacion` int(11) NOT NULL,
  `idQueso` int(11) NOT NULL,
  `Fecha_inicio` datetime NOT NULL,
  `Peso_inicial` decimal(10,0) NOT NULL,
  `Fecha_fin` datetime NOT NULL,
  `Peso_final` decimal(10,0) NOT NULL,
  `Temperatura` decimal(5,0) NOT NULL,
  `Humedad` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_nutricional`
--

CREATE TABLE `informacion_nutricional` (
  `idInformacion_nutricional` int(11) NOT NULL,
  `idQueso` int(11) NOT NULL,
  `Energia` int(11) NOT NULL,
  `Proteinas` decimal(10,0) NOT NULL,
  `Grasa_total` decimal(10,0) NOT NULL,
  `Grasa_saturada` decimal(10,0) NOT NULL,
  `Grasa_monoinsaturada` decimal(10,0) NOT NULL,
  `Grasa_polinsaturada` decimal(10,0) NOT NULL,
  `Colesterol` decimal(10,0) NOT NULL,
  `Carbohidratos` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lab_fermentos`
--

CREATE TABLE `lab_fermentos` (
  `idLab_fermentos` int(11) NOT NULL,
  `Tipo_Queso` text COLLATE utf8_spanish2_ci NOT NULL,
  `Fermento` text COLLATE utf8_spanish2_ci NOT NULL,
  `Analisis` text COLLATE utf8_spanish2_ci NOT NULL,
  `Peso` text COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Final` text COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'nada',
  `idCisterna` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lab_fermentos`
--

INSERT INTO `lab_fermentos` (`idLab_fermentos`, `Tipo_Queso`, `Fermento`, `Analisis`, `Peso`, `Fecha_Inicio`, `Fecha_Final`, `idCisterna`) VALUES
(1, '', '0', 'tranka tranka', '555', NULL, 'nada', ''),
(2, '', '0', 'asdsa', '1213', NULL, 'nada', ''),
(3, '', '0', 'qewqeqweqwe', '1', NULL, 'nada', ''),
(4, '', 'Coca Coquita cocon', 'Analisis 111111', '10', NULL, 'nada', ''),
(5, 'ansahe', 'Probando', 'La', 'muestra', '2021-11-01', '2021-11-02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_final`
--

CREATE TABLE `producto_final` (
  `idproducto_final` int(11) NOT NULL,
  `idQueso` int(11) NOT NULL,
  `Peso` decimal(10,0) NOT NULL,
  `Fecha_elaboracion` date NOT NULL,
  `Fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_leche`
--

CREATE TABLE `proveedor_leche` (
  `idProveedor_leche` int(11) NOT NULL,
  `Empresa` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Tambo` text COLLATE utf8_spanish2_ci NOT NULL,
  `Raza` text COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `Codigo_Postal` text COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queso`
--

CREATE TABLE `queso` (
  `idQueso` int(11) NOT NULL,
  `Queso` text COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_queso` text COLLATE utf8_spanish2_ci NOT NULL,
  `idInformacion_nutricional` int(11) NOT NULL,
  `Ingredientes` text COLLATE utf8_spanish2_ci NOT NULL,
  `Tiempo_vencimiento` int(11) NOT NULL COMMENT 'Tiempo en meses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_leche`
--

CREATE TABLE `recepcion_leche` (
  `idRecepcion_leche` int(11) NOT NULL,
  `Cantidad` decimal(10,0) NOT NULL,
  `Temperatura` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `idCalidad` int(11) NOT NULL,
  `Fecha_hora` datetime NOT NULL,
  `idCisterna` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saladero`
--

CREATE TABLE `saladero` (
  `idSaladero` int(11) NOT NULL,
  `Humedad` decimal(10,0) NOT NULL,
  `Sales` text COLLATE utf8_spanish2_ci NOT NULL,
  `idQueso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `User` text CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `Pass` text COLLATE utf16_spanish2_ci NOT NULL,
  `Cargo` text COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `User`, `Pass`, `Cargo`) VALUES
(1, 'Admin', 'Admin123', 'Admin'),
(2, 'Laboratorio', '123', 'Laboratorio'),
(3, 'Control Calidad', '123', 'Control Calidad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`idCalidad`);

--
-- Indices de la tabla `cisterna`
--
ALTER TABLE `cisterna`
  ADD PRIMARY KEY (`idCisterna`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`idestacion`),
  ADD KEY `idQueso` (`idQueso`);

--
-- Indices de la tabla `informacion_nutricional`
--
ALTER TABLE `informacion_nutricional`
  ADD PRIMARY KEY (`idInformacion_nutricional`),
  ADD KEY `idQueso` (`idQueso`);

--
-- Indices de la tabla `lab_fermentos`
--
ALTER TABLE `lab_fermentos`
  ADD PRIMARY KEY (`idLab_fermentos`);

--
-- Indices de la tabla `producto_final`
--
ALTER TABLE `producto_final`
  ADD PRIMARY KEY (`idproducto_final`),
  ADD KEY `idQueso` (`idQueso`);

--
-- Indices de la tabla `proveedor_leche`
--
ALTER TABLE `proveedor_leche`
  ADD PRIMARY KEY (`idProveedor_leche`);

--
-- Indices de la tabla `queso`
--
ALTER TABLE `queso`
  ADD PRIMARY KEY (`idQueso`),
  ADD KEY `idInformacion_nutricional` (`idInformacion_nutricional`);

--
-- Indices de la tabla `recepcion_leche`
--
ALTER TABLE `recepcion_leche`
  ADD PRIMARY KEY (`idRecepcion_leche`),
  ADD KEY `idCalidad` (`idCalidad`),
  ADD KEY `idCisterna` (`idCisterna`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `saladero`
--
ALTER TABLE `saladero`
  ADD PRIMARY KEY (`idSaladero`),
  ADD KEY `idQueso` (`idQueso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `idCalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cisterna`
--
ALTER TABLE `cisterna`
  MODIFY `idCisterna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `idestacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacion_nutricional`
--
ALTER TABLE `informacion_nutricional`
  MODIFY `idInformacion_nutricional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lab_fermentos`
--
ALTER TABLE `lab_fermentos`
  MODIFY `idLab_fermentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto_final`
--
ALTER TABLE `producto_final`
  MODIFY `idproducto_final` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_leche`
--
ALTER TABLE `proveedor_leche`
  MODIFY `idProveedor_leche` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `queso`
--
ALTER TABLE `queso`
  MODIFY `idQueso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recepcion_leche`
--
ALTER TABLE `recepcion_leche`
  MODIFY `idRecepcion_leche` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `saladero`
--
ALTER TABLE `saladero`
  MODIFY `idSaladero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD CONSTRAINT `estacion_ibfk_1` FOREIGN KEY (`idestacion`) REFERENCES `queso` (`idQueso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `informacion_nutricional`
--
ALTER TABLE `informacion_nutricional`
  ADD CONSTRAINT `informacion_nutricional_ibfk_1` FOREIGN KEY (`idQueso`) REFERENCES `queso` (`idQueso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_final`
--
ALTER TABLE `producto_final`
  ADD CONSTRAINT `producto_final_ibfk_1` FOREIGN KEY (`idQueso`) REFERENCES `queso` (`idQueso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `queso`
--
ALTER TABLE `queso`
  ADD CONSTRAINT `queso_ibfk_1` FOREIGN KEY (`idInformacion_nutricional`) REFERENCES `informacion_nutricional` (`idInformacion_nutricional`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recepcion_leche`
--
ALTER TABLE `recepcion_leche`
  ADD CONSTRAINT `recepcion_leche_ibfk_1` FOREIGN KEY (`idCalidad`) REFERENCES `calidad` (`idCalidad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recepcion_leche_ibfk_2` FOREIGN KEY (`idCisterna`) REFERENCES `cisterna` (`idCisterna`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recepcion_leche_ibfk_3` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor_leche` (`idProveedor_leche`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `saladero`
--
ALTER TABLE `saladero`
  ADD CONSTRAINT `saladero_ibfk_1` FOREIGN KEY (`idQueso`) REFERENCES `queso` (`idQueso`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
