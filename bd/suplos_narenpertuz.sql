-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2023 a las 07:05:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `suplos_narenpertuz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `idContenido` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `contenido` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `idOferta` int(11) NOT NULL,
  `objeto` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `presupuesto` int(11) NOT NULL,
  `actividad` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `horaInicio` time NOT NULL,
  `fechaCierre` date NOT NULL,
  `horaCierre` time NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `ofertas`
--
DELIMITER $$
CREATE TRIGGER `tr_proceso_evaluar` BEFORE INSERT ON `ofertas` FOR EACH ROW BEGIN
  IF NEW.fechaCierre < CURDATE() THEN
    SET NEW.estado = 'EVALUACIÓN';
  ELSEIF NEW.fechaCierre = CURDATE() AND NEW.horaCierre <= CURTIME() THEN
    SET NEW.estado = 'EVALUACIÓN';
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_proceso_publicar` BEFORE INSERT ON `ofertas` FOR EACH ROW BEGIN
  IF NEW.fechaInicio < CURDATE() THEN
    SET NEW.estado = 'PUBLICADO';
  ELSEIF NEW.fechaInicio = CURDATE() AND NEW.horaInicio <= CURTIME() THEN
    SET NEW.estado = 'PUBLICADO';
  END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`idContenido`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`idOferta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `idContenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
