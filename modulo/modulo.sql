-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2018 a las 03:56:44
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modulo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nom_cli` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ruc_cli` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dir_cli` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_cli` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nom_cli`, `ruc_cli`, `dir_cli`, `tel_cli`) VALUES
(3, 'Adeli del Milagro Rodriguez Cotrina', '22641780', 'Calle 1 Casa 2-140. Ambrosio Plaza', '04265146664'),
(5, 'Juan Rodriguez', '12876508', 'Av. Carabobo Edif. Cristal..', '04267558092'),
(6, 'Rosa Medina', '12654788', 'Av. Lucio Oquendo. Casa 18-45', '0426514688'),
(7, 'Rosalba Mendez', '11644787', 'Calle 11 con carrera 12', '04167658899');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `cod_cotiza` int(11) DEFAULT NULL,
  `clientes_id` int(11) NOT NULL,
  `vendedores_id` int(11) NOT NULL,
  `paquetes_id` int(11) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `impuesto` float DEFAULT NULL,
  `descuento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones_has_productos`
--

CREATE TABLE `cotizaciones_has_productos` (
  `cotizaciones_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id` int(11) NOT NULL,
  `nom_paq` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id`, `nom_paq`, `descuento`, `activo`) VALUES
(1, NULL, 20, 1),
(3, NULL, 10, 1),
(13, NULL, 4, 1),
(14, NULL, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes_has_productos`
--

CREATE TABLE `paquetes_has_productos` (
  `paquetes_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `cod_prod` varchar(8) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `desc_prod` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_prod` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `impuesto` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `cod_prod`, `desc_prod`, `tipo_prod`, `monto`, `impuesto`) VALUES
(1, '0001', 'papel bond', 'papel', 10022, 1),
(2, '0003', 'papel cartulina', 'papel', 3000, 0),
(3, '0004', 'papel seda', 'papel', 5000, 1),
(4, '0002', 'papel crepe', 'papel', 7500, 1),
(5, '0005', 'pegamento silicona', 'pegamento', 9000, 1),
(6, '0006', 'pegamento en barra', 'pegamento', 7800, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nom_vend` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ruc_vend` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_vend` varchar(8) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id`, `nom_vend`, `ruc_vend`, `tel_vend`) VALUES
(1, 'Juana Alviarez', '23456567', '04147296'),
(2, 'adeli rodriguez', '22641780', '04265146');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cotizaciones_vendedores_idx` (`vendedores_id`),
  ADD KEY `fk_cotizaciones_clientes1_idx` (`clientes_id`),
  ADD KEY `fk_cotizaciones_paquetes1_idx` (`paquetes_id`);

--
-- Indices de la tabla `cotizaciones_has_productos`
--
ALTER TABLE `cotizaciones_has_productos`
  ADD PRIMARY KEY (`cotizaciones_id`,`productos_id`),
  ADD KEY `fk_cotizaciones_has_productos_productos1_idx` (`productos_id`),
  ADD KEY `fk_cotizaciones_has_productos_cotizaciones1_idx` (`cotizaciones_id`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquetes_has_productos`
--
ALTER TABLE `paquetes_has_productos`
  ADD PRIMARY KEY (`paquetes_id`,`productos_id`),
  ADD KEY `fk_paquetes_has_productos_productos1_idx` (`productos_id`),
  ADD KEY `fk_paquetes_has_productos_paquetes1_idx` (`paquetes_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `paquetes_has_productos`
--
ALTER TABLE `paquetes_has_productos`
  MODIFY `paquetes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `fk_cotizaciones_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cotizaciones_paquetes1` FOREIGN KEY (`paquetes_id`) REFERENCES `paquetes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cotizaciones_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizaciones_has_productos`
--
ALTER TABLE `cotizaciones_has_productos`
  ADD CONSTRAINT `fk_cotizaciones_has_productos_cotizaciones1` FOREIGN KEY (`cotizaciones_id`) REFERENCES `cotizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cotizaciones_has_productos_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paquetes_has_productos`
--
ALTER TABLE `paquetes_has_productos`
  ADD CONSTRAINT `fk_paquetes_has_productos_paquetes1` FOREIGN KEY (`paquetes_id`) REFERENCES `paquetes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paquetes_has_productos_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
