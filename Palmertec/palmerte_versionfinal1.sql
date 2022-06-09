-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2022 a las 01:30:02
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `palmerte_versionfinal1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `cve_archivo` int(11) NOT NULL,
  `Cotizacion_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `politicas` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`cve_archivo`, `Cotizacion_no`, `nombre`, `url`, `politicas`) VALUES
(9, 'PAL-21-005', 'Cotizacion', '../files/masa-acreditamientopdf.pdf', 'Aceptadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_informe`
--

CREATE TABLE `archivo_informe` (
  `cve_archivo_informe` int(11) NOT NULL,
  `cve_usuario` int(11) NOT NULL,
  `nombre` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estatus` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivo_informe`
--

INSERT INTO `archivo_informe` (`cve_archivo_informe`, `cve_usuario`, `nombre`, `url`, `estatus`) VALUES
(3, 27, 'PAL-21-001', '../reportes/reporte-3pdf.pdf', 'Rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cve_cliente` int(11) NOT NULL,
  `nom_empresa` varchar(120) DEFAULT NULL,
  `razon_social` varchar(120) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `cve_usuario` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cve_cliente`, `nom_empresa`, `razon_social`, `domicilio`, `cve_usuario`, `estatus`) VALUES
(4, 'Good Drinks', 'ZUCA3456725', 'De Los Angeles 22, Corpus Christi. 5 Benito Juarez 03100', 23, 1),
(6, 'nueva', 'prueb2', 'Bosques de pinoz mz 230 55203066 Jardines de Morelos 55070', 31, 1),
(7, 'LabPrueba', 'Económica', 'Azucenas 8 - 1 Los Heroes Tecámac 55764', 32, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_mantenimiento`
--

CREATE TABLE `costos_mantenimiento` (
  `cve_costo_mantenimiento` int(11) NOT NULL,
  `acreditamiento` varchar(30) DEFAULT NULL,
  `equipo` varchar(300) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `porcentaje_mantenimiento` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `costos_mantenimiento`
--

INSERT INTO `costos_mantenimiento` (`cve_costo_mantenimiento`, `acreditamiento`, `equipo`, `costo`, `porcentaje_mantenimiento`) VALUES
(65, 'MANTENIMIENTO', 'Polarímetros', 4000, 0),
(64, 'MANTENIMIENTO', 'Parrillas', 2000, 0),
(61, 'MANTENIMIENTO', 'Friabilizador', 4100, 0),
(94, 'MANTENIMIENTO', 'Incubadoras', 5000, 0),
(63, 'MANTENIMIENTO', 'Microscopios', 4700, 0),
(60, 'MANTENIMIENTO', 'Espectrofotómetros', 6250, 0),
(59, 'MANTENIMIENTO', 'Disolutor', 2450, 0),
(58, 'MANTENIMIENTO', 'Desintegrador', 4200, 0),
(93, 'MANTENIMIENTO', 'Conductivímetros', 1900, 0),
(56, 'MANTENIMIENTO', 'Cuenta colonias', 2250, 0),
(87, 'MANTENIMIENTO', 'Instrumento de pesaje', 3941.85, 30),
(92, 'MANTENIMIENTO', 'Bombas de vacío', 2860, 0),
(52, 'MANTENIMIENTO', 'Autoclaves', 3625, 0),
(85, 'MANTENIMIENTO', 'Densímetro de frecuencia', 2929.3, 30),
(96, 'MANTENIMIENTO', 'Recirculadores', 2725, 0),
(71, 'MANTENIMIENTO', 'Turbidímetros', 3900, 0),
(95, 'MANTENIMIENTO', 'Potenciómetros', 2300, 0),
(84, 'MANTENIMIENTO', 'Potenciómetros', 1309, 30),
(79, 'MANTENIMIENTO', 'Viscosímetros', 5575, 0),
(81, 'MANTENIMIENTO', 'Estufas', 5000, 0),
(86, 'MANTENIMIENTO', 'Instrumento de pesaje', 1631.3, 30),
(88, 'MANTENIMIENTO', 'Espectrofotómetros', 4300, 30),
(89, 'MANTENIMIENTO', 'Turbidímetros', 2106, 30),
(90, 'MANTENIMIENTO', 'Baños María', 2810, 0),
(97, 'MANTENIMIENTO', 'Refractómetros', 3900, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_proveedor`
--

CREATE TABLE `costos_proveedor` (
  `cve_costo_proveedor` int(11) NOT NULL,
  `magnitud` varchar(250) COLLATE utf8_bin NOT NULL,
  `acreditamiento` varchar(50) COLLATE utf8_bin NOT NULL,
  `instrumento` varchar(350) COLLATE utf8_bin NOT NULL,
  `costo` double NOT NULL,
  `puntos` double NOT NULL,
  `porcentaje` double NOT NULL,
  `costoExtra` double DEFAULT NULL,
  `alcanceMax` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `unidadmax` varchar(20) COLLATE utf8_bin NOT NULL,
  `alcanceMix` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `unidadmin` varchar(20) COLLATE utf8_bin NOT NULL,
  `extra` varchar(200) COLLATE utf8_bin NOT NULL,
  `Comentarios` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `costos_proveedor`
--

INSERT INTO `costos_proveedor` (`cve_costo_proveedor`, `magnitud`, `acreditamiento`, `instrumento`, `costo`, `puntos`, `porcentaje`, `costoExtra`, `alcanceMax`, `unidadmax`, `alcanceMix`, `unidadmin`, `extra`, `Comentarios`) VALUES
(48, 'Masa', 'ILAC', 'Pesa', 350, 0, 30, 0, '100', 'g', '100', 'g', 'CLASE F1', ''),
(50, 'Masa', 'ILAC', 'Pesa', 350, 0, 30, 0, '500', 'g', '500', 'g', 'CLASE F1', ''),
(51, 'Masa', 'ILAC', 'Pesa', 350, 0, 30, 0, '500', 'g', '500', 'g', 'CLASE F1', ''),
(52, 'Masa', 'ILAC', 'Pesa', 350, 0, 30, 0, '1', 'kg', '1', 'kg', 'CLASE F1', ''),
(53, 'Masa', 'ILAC', 'Pesa', 350, 0, 30, 0, '2', 'kg', '2', 'kg', 'CLASE F1', ''),
(54, 'Masa', 'ILAC', 'Pesa', 400, 0, 30, 0, '5', 'kg', '5', 'kg', 'CLASE F1', ''),
(55, 'Masa', 'ILAC', 'Pesa', 600, 0, 30, 0, '10', 'kg', '10', 'kg', 'CLASE F1', ''),
(56, 'Masa', 'ILAC', 'Pesa', 750, 0, 30, 0, '20', 'kg', '20', 'kg', 'CLASE F1', ''),
(57, 'Masa', 'ILAC', 'Juego de pesas', 2100, 0, 30, 0, '2', 'kg', '100', 'g', 'CLASE F1', 'JUEGO DE 6 PESAS'),
(58, 'Masa', 'ILAC', 'Juego de pesas', 3150, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE F1', 'JUEGO DE 9 PESAS'),
(60, 'Masa', 'ILAC', 'Juego de pesas', 5250, 0, 30, 0, '2', 'kg', '1', 'g', 'CLASE F1', 'JUEGO DE 15 PESAS'),
(61, 'Masa', 'ILAC', 'Juego de pesas', 7140, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE F1', 'JUEGO DE 21 PESAS'),
(62, 'Masa', 'ILAC', 'Juego de pesas', 7820, 0, 30, 0, '200', 'g', '1', 'mg', 'CLASE F1', 'JUEGO DE 23 PIEZAS'),
(63, 'Masa', 'ILAC', 'Juego de pesas', 8500, 0, 30, 0, '1', 'kg', '1', 'mg', 'CLASE F1', 'JUEGO DE 25 PESAS'),
(64, 'Masa', 'ILAC', 'Juego de pesas', 8580, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE F1', 'JUEGO DE 26 PESAS'),
(65, 'Masa', 'ILAC', 'Juego de pesas', 8910, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE F1', 'JUEGO DE 27 PESAS'),
(66, 'Masa', 'ILAC', 'Juego de pesas', 9240, 0, 30, 0, '5', 'kg', '1', 'mg', 'CLASE F1', 'JUEGO DE 28 PESAS'),
(67, 'Masa', 'ILAC', 'Juego de pesas', 9900, 0, 30, 0, '20', 'kg', '1', 'mg', 'CLASE F1', 'JUEGO DE 30 PESAS'),
(68, 'Masa', 'ILAC', 'Juego de pesas', 3850, 0, 30, 0, '200', 'g', '1', 'g', 'CLASE F1', 'JUEGO DE 11 PESAS'),
(69, 'Masa', 'ILAC', 'Pesa', 250, 0, 30, 0, '100', 'g', '100', 'g', 'CLASE F2', ''),
(70, 'Masa', 'ILAC', 'Pesa', 250, 0, 30, 0, '200', 'g', '200', 'g', 'CLASE F2', ''),
(71, 'Masa', 'ILAC', 'Pesa', 250, 0, 30, 0, '500', 'g', '500', 'g', 'CLASE F2', ''),
(72, 'Masa', 'ILAC', 'Pesa', 250, 0, 30, 0, '1', 'kg', '1', 'kg', 'CLASE F2', ''),
(73, 'Masa', 'ILAC', 'Pesa', 250, 0, 30, 0, '2', 'kg', '2', 'kg', 'CLASE F2', ''),
(74, 'Masa', 'ILAC', 'Pesa', 350, 0, 30, 0, '5', 'kg', '5', 'kg', 'CLASE F2', ''),
(75, 'Masa', 'ILAC', 'Pesa', 450, 0, 30, 0, '10', 'kg', '10', 'kg', 'CLASE F2', ''),
(76, 'Masa', 'ILAC', 'Pesa', 600, 0, 30, 0, '20', 'kg', '20', 'kg', 'CLASE F2', ''),
(77, 'Masa', 'ILAC', 'Juego de pesas', 1500, 0, 30, 0, '2', 'kg', '100', 'g', 'CLASE F2', 'JUEGO DE 6 PESAS'),
(78, 'Masa', 'ILAC', 'Juego de pesas', 2250, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE F2', ''),
(79, 'Masa', 'ILAC', 'Juego de pesas', 2750, 0, 30, 0, '200', 'g', '1', 'g', 'CLASE F2', 'JUEGO DE 11 PESAS'),
(80, 'Masa', 'ILAC', 'Juego de pesas', 3750, 0, 30, 0, '2', 'kg', '1', 'g', 'CLASE F2', 'JUEGO DE 15 PESAS'),
(81, 'Masa', 'ILAC', 'Juego de pesas', 5040, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE F2', 'JUEGO DE 21 PESAS'),
(82, 'Masa', 'ILAC', 'Juego de pesas', 5520, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE F2', 'JUEGO DE 23 PESAS'),
(83, 'Masa', 'ILAC', 'Juego de pesas', 5980, 0, 30, 0, '1', 'kg', '1', 'mg', 'CLASE F2', 'JUEGO DE 25 PESAS'),
(84, 'Masa', 'ILAC', 'Juego de pesas', 5980, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE F2', 'JUEGO DE 26 PESAS'),
(85, 'Masa', 'ILAC', 'Juego de pesas', 6210, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE F2', 'JUEGO DE 27 PESAS'),
(86, 'Masa', 'ILAC', 'Juego de pesas', 6440, 0, 30, 0, '5', 'kg', '1', 'mg', 'CLASE F2', 'JUEGO DE 28 PESAS'),
(87, 'Masa', 'ILAC', 'Juego de pesas', 6900, 0, 30, 0, '20', 'kg', '1', 'mg', 'CLASE F2', 'JUEGO DE 30 PESAS'),
(88, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '100', 'g', '100', 'g', 'CLASE M1', ''),
(89, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '100', 'g', '100', 'g', 'CLASE M2', ''),
(90, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '200', 'g', '200', 'g', 'CLASE M1', ''),
(91, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '200', 'g', '200', 'g', 'CLASE M2', ''),
(92, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '500', 'g', '500', 'g', 'CLASE M1', ''),
(93, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '500', 'g', '500', 'g', 'CLASE M2', ''),
(94, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '1', 'kg', '1', 'kg', 'CLASE M2', ''),
(95, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '1', 'kg', '1', 'kg', 'CLASE M1', ''),
(96, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '2', 'kg', '2', 'kg', 'CLASE M1', ''),
(97, 'Masa', 'ILAC', 'Pesa', 150, 0, 30, 0, '2', 'kg', '2', 'kg', 'CLASE M2', ''),
(98, 'Masa', 'ILAC', 'Pesa', 180, 0, 30, 0, '5', 'kg', '5', 'kg', 'CLASE M1', ''),
(99, 'Masa', 'ILAC', 'Pesa', 180, 0, 30, 0, '5', 'kg', '5', 'kg', 'CLASE M2', ''),
(100, 'Masa', 'ILAC', 'Pesa', 200, 0, 30, 0, '10', 'kg', '10', 'kg', 'CLASE M1', ''),
(101, 'Masa', 'ILAC', 'Pesa', 200, 0, 30, 0, '10', 'kg', '10', 'kg', 'CLASE M2', ''),
(102, 'Masa', 'ILAC', 'Pesa', 220, 0, 30, 0, '20', 'kg', '20', 'kg', 'CLASE M1', ''),
(103, 'Masa', 'ILAC', 'Pesa', 220, 0, 30, 0, '20', 'kg', '20', 'kg', 'CLASE M2', ''),
(104, 'Masa', 'ILAC', 'Pesa', 450, 0, 30, 0, '50', 'kg', '50', 'kg', 'CLASE M2', ''),
(105, 'Masa', 'ILAC', 'Pesa', 1600, 0, 30, 0, '500', 'kg', '500', 'kg', 'CLASE M1', ''),
(106, 'Masa', 'ILAC', 'Pesa', 1600, 0, 30, 0, '500', 'kg', '500', 'kg', 'CLASE M2', ''),
(107, 'Masa', 'ILAC', 'Juego de pesas', 900, 0, 30, 0, '2', 'kg', '100', 'g', 'CLASE M1', 'JUEGO DE 6 PESAS '),
(108, 'Masa', 'ILAC', 'Juego de pesas', 900, 0, 30, 0, '2', 'kg', '100', 'g', 'CLASE M2', 'JUEGO DE 6 PESAS'),
(109, 'Masa', 'ILAC', 'Juego de pesas', 1350, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE M1', 'JUEGO DE 9 PESAS'),
(110, 'Masa', 'ILAC', 'Juego de pesas', 1350, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE M2', 'JUEGO DE 9 PESAS'),
(111, 'Masa', 'ILAC', 'Juego de pesas', 1650, 0, 30, 0, '200', 'g', '1', 'g', 'CLASE M1', 'JUEGO DE 11 PESAS'),
(114, 'Masa', 'ILAC', 'Juego de pesas', 1650, 0, 30, 0, '200', 'g', '1', 'g', 'CLASE M2', 'JUEGO DE 11 PESAS'),
(115, 'Masa', 'ILAC', 'Juego de pesas', 2250, 0, 30, 0, '2', 'kg', '1', 'g', 'CLASE M1', 'JUEGO DE 15 PESAS'),
(116, 'Masa', 'ILAC', 'Juego de pesas', 2250, 0, 30, 0, '2', 'kg', '1', 'g', 'CLASE M2', 'JUEGO DE 15 PESAS'),
(117, 'Masa', 'ILAC', 'Juego de pesas', 2940, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE M2', 'JUEGO DE 21 PESAS'),
(118, 'Masa', 'ILAC', 'Juego de pesas', 2940, 0, 30, 0, '100', 'g', '1', 'mg', 'CLASE M1', 'JUEGO DE 21 PESAS'),
(119, 'Masa', 'ILAC', 'Pesa', 3220, 0, 30, 0, '200', 'g', '1', 'mg', 'CLASE M1', 'JUEGO DE 23 PESAS'),
(120, 'Masa', 'ILAC', 'Pesa', 3220, 0, 30, 0, '200', 'g', '1', 'mg', 'CLASE M2', 'JUEGO DE 23 PESAS'),
(121, 'Masa', 'ILAC', 'Juego de pesas', 3380, 0, 30, 0, '1', 'kg', '1', 'mg', 'CLASE M1', 'JUEGO DE 25 PESAS'),
(122, 'Masa', 'ILAC', 'Juego de pesas', 3380, 0, 30, 0, '1', 'kg', '1', 'mg', 'CLASE M2', 'JUEGO DE 25 PESAS'),
(123, 'Masa', 'ILAC', 'Juego de pesas', 3380, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE M1', 'JUEGO DE 26 PESAS'),
(124, 'Masa', 'ILAC', 'Juego de pesas', 3380, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE M2', 'JUEGO DE 26 PESAS'),
(126, 'Masa', 'ILAC', 'Juego de pesas', 3510, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE M1', 'JUEGO DE 27 PESAS'),
(127, 'Masa', 'ILAC', 'Juego de pesas', 3510, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE M2', 'JUEGO DE 27 PESAS'),
(128, 'Masa', 'ILAC', 'Juego de pesas', 3640, 0, 30, 0, '5', 'kg', '1', 'mg', 'CLASE M1', 'JUEGO DE 28 PESAS'),
(129, 'Masa', 'ILAC', 'Juego de pesas', 3640, 0, 30, 0, '5', 'kg', '1', 'mg', 'CLASE M2', 'JUEGO DE 28 PESAS'),
(130, 'Masa', 'ILAC', 'Juego de pesas', 3900, 0, 30, 0, '20', 'kg', '1', 'mg', 'CLASE M1', 'JUEGO DE 30 PESAS'),
(131, 'Masa', 'ILAC', 'Juego de pesas', 3900, 0, 30, 0, '20', 'kg', '1', 'mg', 'CLASE M2', 'JUEGO DE 30 PESAS'),
(132, 'Temperatura', 'ILAC', 'Termómetro de radiación', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(133, 'Temperatura', 'ILAC', 'Termómetro digital', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(135, 'Temperatura', 'ILAC', 'Sensor', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(136, 'Temperatura', 'ILAC', 'Controlador', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(137, 'Temperatura', 'ILAC', 'Indicador', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(138, 'Temperatura', 'ILAC', 'Registrador', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(139, 'Temperatura', 'ILAC', 'Termopar', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(140, 'Temperatura', 'ILAC', 'RTD', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(141, 'Temperatura', 'ILAC', 'Datalogger', 1500, 3, 30, 500, '900', '°C', '-30', '°C', '0', ''),
(142, 'Humedad', 'ILAC', 'Indicador de humedad', 1500, 3, 30, 500, '90', '% HR', '12', '% HR', '0', ''),
(143, 'Humedad', 'ILAC', 'Datalogger', 1500, 3, 30, 500, '90', '% HR', '12', '% HR', '0', ''),
(144, 'Humedad', 'ILAC', 'Trasmisor de humedad', 1500, 3, 30, 500, '90', '% HR', '12', '% HR', '0', ''),
(145, 'Humedad', 'ILAC', 'Termohigrómetro', 1500, 3, 30, 500, '90', '% HR', '12', '% HR', '0', ''),
(146, 'Humedad', 'ILAC', 'Higrómetro', 1500, 3, 30, 500, '90', '% HR', '12', '% HR', '0', ''),
(147, 'Humedad', 'ILAC', 'Sensor de humedad', 1500, 3, 30, 500, '90', '% HR', '12', '% HR', '0', ''),
(148, 'Masa', 'ILAC', 'Balanza', 1400, 10, 30, 450, '20', 'kg', '0', 'kg', '0', ''),
(149, 'Masa', 'ILAC', 'Báscula', 1400, 10, 30, 450, '400', 'kg', '21', 'kg', '0', ''),
(150, 'Masa', 'ILAC', 'Báscula', 1750, 10, 30, 550, '1000', 'kg', '401', 'kg', '0', ''),
(153, 'Temperatura', 'EMA', 'Termómetro de liquido en vidrio', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(154, 'Temperatura', 'EMA', 'Termómetro de liquido en vidrio', 1150, 3, 30, 110, '660', '°C', '-40', '°C', '0', ''),
(155, 'Temperatura', 'EMA', 'Termómetro bimetálico', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(157, 'Temperatura', 'EMA', 'Termómetro digital', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(158, 'Temperatura', 'EMA', 'Indicador', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(159, 'Temperatura', 'EMA', 'Sensor', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(160, 'Temperatura', 'EMA', 'Termómetro de radiación', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(161, 'Temperatura', 'EMA', 'Controlador', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(162, 'Temperatura', 'EMA', 'Registrador', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(163, 'Temperatura', 'EMA', 'Termopar', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(164, 'Temperatura', 'EMA', 'RTD', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(165, 'Temperatura', 'EMA', 'RTD', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(166, 'Temperatura', 'EMA', 'Datalogger', 916, 3, 30, 85, '350', '°C', '-20', '°C', '0', ''),
(167, 'Temperatura', 'EMA', 'Termómetro de liquido en vidrio', 1150, 3, 30, 110, '-20', '°C', '-40', '°C', '0', ''),
(168, 'Presión', 'EMA', 'Vacuómetro', 916, 5, 30, 250, '-1', 'psi', '-10', 'psi', '0', 'C.E. > 0,5 %'),
(169, 'Presión', 'EMA', 'Vacuómetro', 1600, 9, 30, 250, '-1', 'psi', '-10', 'psi', '0', 'C.E.  >= 0,05% & <= 0,5 %'),
(170, 'Presión', 'EMA', 'Manómetro', 916, 5, 30, 250, '300', 'psi', '5', 'psi', '0', 'C.E. > 0,5 %'),
(171, 'Presión', 'EMA', 'Manómetro', 1600, 9, 30, 250, '200', 'psi', '5', 'psi', '0', 'C.E. >= 0,05 % & <= 0,5 %'),
(172, 'Presión', 'EMA', 'Manómetro', 1150, 9, 30, 250, '5000', 'psi', '0', 'psi', '0', ' C.E. >= 0,1 % & <= 0,5 %'),
(173, 'Presión', 'EMA', 'Manómetro', 916, 5, 30, 250, '5000', 'psi', '0', 'psi', '0', 'C.E. > 0,5 % E.C.'),
(174, 'Presión', 'EMA', 'Manómetro', 916, 5, 30, 250, '10000', 'psi', '0', 'psi', '0', 'C.E.  >= 1 % E.C.'),
(176, 'Presión', 'EMA', 'Manómetro', 1150, 9, 30, 250, '101.51', 'psi', '11.33', 'psi', '0', ' C.E. >= 0,1 % & <= 0,5 %'),
(177, 'Presión', 'EMA', 'Manómetro de presión diferencial', 1600, 9, 30, 250, '1', 'inH20', '0', 'inH20', '0', 'C.E. >= 0,1 % E.C.'),
(178, 'Presión', 'EMA', 'Manómetro de presión diferencial', 1600, 9, 30, 250, '10', 'inH20', '0', 'inH20', '0', 'C.E. >= 0,02 % E.C.'),
(179, 'Presión', 'EMA', 'Manómetro de presión diferencial', 1600, 9, 30, 250, '200', 'psi', '0.5', 'psi', '0', ' C.E. >= 0,02 % E.C.'),
(180, 'Temperatura', 'EMA', 'Datalogger', 1150, 3, 30, 250, '45', '°C', '5', '°C', '0', '(10 a 90) %H.R. & (5 a 45) °C'),
(181, 'Humedad', 'EMA', 'Termohigrómetro', 1150, 3, 30, 250, '90', '% HR', '10', '% HR', '0', '(10 a 90) %H.R. & (5 a 45) °C'),
(182, 'Eléctrica', 'EMA', 'Indicador de temperatura', 550, 5, 30, 150, '3926', '°C', '385', '°C', 'TERMOPAR J', ''),
(183, 'Eléctrica', 'EMA', 'Indicador de temperatura', 550, 5, 30, 150, '3926', '°C', '385', '°C', 'TERMOPAR K', ''),
(184, 'Masa', 'ILAC', 'Báscula', 1500, 10, 30, 500, '320', 'kg', '1', 'g', '0', ''),
(186, 'Masa', 'EMA', 'Báscula', 1328, 10, 30, 240, '50', 'kg', '1', 'g', '0', ''),
(187, 'Masa', 'EMA', 'Báscula', 1420, 10, 30, 240, '500', 'kg', '50', 'g', '0', ''),
(189, 'Masa', 'EMA', 'Báscula', 4096, 10, 30, 240, '2000', 'kg', '1001', 'kg', '0', ''),
(190, 'Masa', 'EMA', 'Báscula', 2940, 10, 30, 240, '1000', 'kg', '501', 'kg', '0', ''),
(202, 'Masa', 'ILAC', 'Pesa', 350, 0, 30, 0, '200', 'g', '200', 'g', '0', ''),
(243, 'Presión', 'EMA', 'Vacuómetro', 580, 5, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≥ 0,6%'),
(244, 'Presión', 'EMA', 'Vacuómetro', 580, 5, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≥ 0,6%'),
(245, 'Presión', 'EMA', 'Manovacuómetro', 580, 5, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≥ 0,6%'),
(246, 'Presión', 'EMA', 'Manovacuómetro', 580, 5, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≥ 0,6%'),
(247, 'Presión', 'EMA', 'Manómetro', 1260, 10, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≤ 0,5% a 0,2%'),
(248, 'Presión', 'EMA', 'Manómetro', 1260, 10, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≤ 0,5% a 0,2%'),
(249, 'Presión', 'EMA', 'Manómetro', 1260, 10, 30, 0, '2130', 'kPa', '341', 'kPa', '0', 'C.E. ≤ 0,5% a 0,2%'),
(250, 'Presión', 'EMA', 'Vacuómetro', 1260, 10, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≤ 0,5% a 0,2%'),
(251, 'Presión', 'EMA', 'Vacuómetro', 1260, 10, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≤ 0,5% a 0,2%'),
(252, 'Presión', 'EMA', 'Vacuómetro', 1260, 10, 30, 0, '2130', 'kPa', '341', 'kPa', '0', 'C.E. ≤ 0,5% a 0,2%'),
(253, 'Presión', 'EMA', 'Manovacuómetro', 1260, 10, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≤ 0,5% a 0,2%'),
(254, 'Presión', 'EMA', 'Manovacuómetro', 1260, 10, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≤ 0,5% a 0,2%'),
(255, 'Presión', 'EMA', 'Manovacuómetro', 1260, 10, 30, 0, '2130', 'kPa', '341', 'kPa', '0', 'C.E. ≤ 0,5% a 0,2%'),
(256, 'Presión', 'EMA', 'Manómetro', 1260, 10, 30, 0, '308.90', 'psi', '34.95', 'psi', '0', 'C.E. ≤ 0,5% a 0,2%'),
(257, 'Presión', 'EMA', 'Vacuómetro', 1260, 10, 30, 0, '308.90', 'psi', '34.95', 'psi', '0', 'C.E. ≤ 0,5% a 0,2%'),
(258, 'Presión', 'EMA', 'Manovacuómetro', 1260, 10, 30, 0, '308.90', 'psi', '34.95', 'psi', '0', 'C.E. ≤ 0,5% a 0,2%'),
(259, 'Presión', 'EMA', 'Manómetro', 2300, 10, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≤ 0,1% a 0,05%'),
(260, 'Presión', 'EMA', 'Manómetro', 2300, 10, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≤ 0,1% a 0,05%'),
(261, 'Presión', 'EMA', 'Manómetro', 2300, 10, 30, 0, '341', 'kPa', '10', 'kPa', '0', 'C.E. ≤ 0,1% a 0,05%'),
(262, 'Presión', 'EMA', 'Manómetro', 2300, 10, 30, 0, '34.95', 'psi', '1.45', 'psi', '0', 'C.E. ≤ 0,1% a 0,05%'),
(263, 'Presión', 'EMA', 'Vacuómetro', 2300, 10, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≤ 0,1% a 0,05%'),
(264, 'Presión', 'EMA', 'Vacuómetro', 2300, 10, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≤ 0,1% a 0,05%'),
(265, 'Presión', 'EMA', 'Vacuómetro', 2300, 10, 30, 0, '341', 'kPa', '10', 'kPa', '0', 'C.E. ≤ 0,1% a 0,05%'),
(266, 'Presión', 'EMA', 'Vacuómetro', 2300, 10, 30, 0, '34.95', 'psi', '1.45', 'psi', '0', 'C.E. ≤ 0,1% a 0,05%'),
(267, 'Presión', 'EMA', 'Manovacuómetro', 2300, 10, 30, 0, '70', 'MPa', '-77', 'kPa', '0', 'C.E. ≤ 0,1% a 0,05%'),
(268, 'Presión', 'EMA', 'Manovacuómetro', 2300, 10, 30, 0, '10000', 'psi', '-11', 'psi', '0', 'C.E. ≤ 0,1% a 0,05%'),
(269, 'Presión', 'EMA', 'Manovacuómetro', 2300, 10, 30, 0, '341', 'kPa', '10', 'kPa', '0', 'C.E. ≤ 0,1% a 0,05%'),
(270, 'Presión', 'EMA', 'Manovacuómetro', 2300, 10, 30, 0, '34.95', 'psi', '1.45', 'psi', '0', 'C.E. ≤ 0,1% a 0,05%'),
(271, 'Presión', 'EMA', 'Probador de Fugas', 1230, 5, 30, 0, '70', 'MPa', '-77', 'kPa', '0', ''),
(272, 'Presión', 'EMA', 'Probador de Fugas', 1230, 5, 30, 0, '10000', 'psi', '-11', 'psi', '0', ''),
(273, 'Presión', 'EMA', 'Trasmisor', 1230, 5, 30, 0, '70', 'MPa', '-77', 'kPa', '0', ''),
(274, 'Presión', 'EMA', 'Trasmisor', 1230, 5, 30, 0, '10000', 'psi', '-11', 'psi', '0', ''),
(275, 'Presión', 'EMA', 'Trasductor I/P y P/I', 1230, 5, 30, 0, '70', 'MPa', '-77', 'kPa', '0', ''),
(276, 'Presión', 'EMA', 'Trasductor I/P y P/I', 1230, 5, 30, 0, '10000', 'psi', '-11', 'psi', '0', ''),
(277, 'Presión', 'EMA', 'Probador de Presión Interna', 1230, 5, 30, 0, '70', 'MPa', '-77', 'kPa', '0', ''),
(278, 'Presión', 'EMA', 'Probador de Presión Interna', 1230, 5, 30, 0, '10000', 'psi', '-11', 'psi', '0', ''),
(279, 'Presión', 'EMA', 'Registrador de presión', 1230, 5, 30, 0, '70', 'MPa', '-77', 'kPa', '0', ''),
(280, 'Presión', 'EMA', 'Registrador de presión', 1230, 5, 30, 0, '10000', 'psi', '-11', 'psi', '0', ''),
(281, 'Presión', 'EMA', 'Manómetro diferencial', 850, 5, 30, 0, '4100', 'kPa', '6.1', 'Pa', '0', '>= 0,6 %'),
(282, 'Presión', 'EMA', 'Baumanometro o Esfingomanómetro Analógico', 850, 5, 30, 0, '4100', 'kPa', '6.1', 'Pa', '0', ''),
(283, 'Presión', 'EMA', 'Balanza de presión', 5400, 5, 30, 0, '49', 'MPa', '0.2', 'MPa', '0', ''),
(284, 'Presión', 'EMA', 'Balanza de presión', 5400, 5, 30, 0, '7107', 'psi', '29', 'psi', '0', ''),
(285, 'Temperatura', 'EMA', 'Termómetro de lectura directa', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(286, 'Temperatura', 'EMA', 'Termómetro analógico', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(287, 'Temperatura', 'EMA', 'Termómetro digital', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(288, 'Temperatura', 'EMA', 'Termómetro bimetalico', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(289, 'Temperatura', 'EMA', 'Termómetro de bulbo', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(290, 'Temperatura', 'EMA', 'Termómetro de vastago', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(291, 'Temperatura', 'EMA', 'Registrador', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(292, 'Temperatura', 'EMA', 'Trasmisor', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(293, 'Temperatura', 'EMA', 'Controlador', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(294, 'Temperatura', 'EMA', 'Indicador', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(295, 'Temperatura', 'EMA', 'Trasductor', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(296, 'Temperatura', 'EMA', 'Sensores TC, RTD', 1100, 3, 30, 370, '420', '°C', '-30', '°C', '0', ''),
(297, 'Temperatura', 'EMA', 'Termómetro de liquido en vidrio', 1014, 3, 30, 369, '300', '°C', '-10', '°C', '0', ''),
(298, 'Temperatura', 'EMA', 'RTD Patron (EIT-90)', 3160, 0, 30, 0, '231', '°C', '-30', '°C', '0', ''),
(299, 'Temperatura', 'EMA', 'RTD Patron (EIT-90)', 3570, 0, 30, 0, '420', '°C', '0', '°C', '0', ''),
(300, 'Temperatura', 'EMA', 'RTD Patron (EIT-90)', 4465, 0, 30, 0, '420', '°C', '-30', '°C', '0', ''),
(301, 'Temperatura', 'EMA', 'Termopar R, S', 4800, 7, 30, 0, '960', '°C', '232', '°C', '0', ''),
(302, 'Volumen', 'EMA', 'Tanques Fijos de Almacenamiento (Verticales)', 8250, 5, 30, 0, '80000', 'L', '5000', 'L', '0', ''),
(303, 'Volumen', 'EMA', 'Tanques Fijos de Almacenamiento (Horizontales)', 15000, 5, 30, 0, '80000', 'L', '5000', 'L', '0', ''),
(304, 'Densidad', 'EMA', 'Densímetro a Frecuencia (1 MR)', 1947.55, 1, 30, 0, '1.25', 'g/cm^3', '1.25', 'g/cm^3', '0', ''),
(314, 'Humedad', 'EMA', 'Higrómetro', 550.2, 3, 30, 0, '90', '% HR', '10', '% HR', '0', 'Exactitud  ≥1% H.R.'),
(315, 'Humedad', 'EMA', 'Higrómetro', 550.2, 3, 30, 0, '40', '°C', '20', '°C', '0', 'Exactitud  ≥1% H.R.'),
(364, 'Masa', 'EMA', 'Pesa', 448, 0, 30, 0, '2', 'kg', '1', 'mg', 'CLASE F1', ''),
(365, 'Masa', 'EMA', 'Pesa', 320, 0, 30, 0, '20', 'kg', '1', 'mg', 'CLASE F2', ''),
(366, 'Masa', 'EMA', 'Pesa', 352, 0, 30, 0, '5', 'kg', '5', 'kg', 'CLASE M1', ''),
(367, 'Masa', 'EMA', 'Pesa', 352, 0, 30, 0, '10', 'kg', '10', 'kg', 'CLASE M1', ''),
(368, 'Masa', 'EMA', 'Pesa', 352, 0, 30, 0, '20', 'kg', '20', 'kg', 'CLASE M1', ''),
(369, 'Masa', 'EMA', 'Pesa', 352, 0, 30, 0, '5', 'kg', '5', 'kg', 'CLASE M2', ''),
(370, 'Masa', 'EMA', 'Pesa', 352, 0, 30, 0, '10', 'kg', '10', 'kg', 'CLASE M2', ''),
(371, 'Masa', 'EMA', 'Pesa', 352, 0, 30, 0, '20', 'kg', '20', 'kg', 'CLASE M2', ''),
(372, 'Masa', 'EMA', 'Pesa', 300, 0, 30, 0, '2', 'kg', '100', 'mg', 'CLASE M1', ''),
(373, 'Masa', 'EMA', 'Pesa', 300, 0, 30, 0, '2', 'kg', '100', 'mg', 'CLASE M2', ''),
(374, 'Masa', 'EMA', 'Pesa', 300, 0, 30, 0, '2', 'kg', '100', 'mg', 'CLASE M3', ''),
(375, 'Masa', 'EMA', 'Objetos solidos no normalizados', 300, 0, 30, 0, '3', 'kg', '1', 'mg', '0', ''),
(376, 'Masa', 'EMA', 'Objetos solidos no normalizados', 352, 0, 30, 0, '30', 'kg', '4', 'kg', '0', ''),
(377, 'Eléctrica', 'TRAZABILIDAD', 'Indicador', 1079.1, 5, 30, 0, '1200', '°C', '-100', '°C', '0', '-4633 μV - 69553 μV'),
(378, 'Eléctrica', 'TRAZABILIDAD', 'Indicador', 1079.1, 5, 30, 0, '1200', '°C', '-100', '°C', '0', '-3554 μV - 48838 μV'),
(379, 'Eléctrica', 'TRAZABILIDAD', 'Indicador', 1079.1, 5, 30, 0, '400', '°C', '-100', '°C', '0', '-3379 μV - 20872 μV'),
(380, 'Eléctrica', 'TRAZABILIDAD', 'Indicador', 1079.1, 5, 30, 0, '1000', '°C', '-100', '°C', '0', '-5237 μV - 76373 μV'),
(381, 'Eléctrica', 'TRAZABILIDAD', 'Indicador', 1079.1, 5, 30, 0, '1600', '°C', '0', '°C', '0', '0 μV - 18849 μV'),
(382, 'Eléctrica', 'TRAZABILIDAD', 'Indicador', 1079.1, 5, 30, 0, '1600', '°C', '0', '°C', '0', '0 μV - 16777 μV'),
(383, 'Eléctrica', 'TRAZABILIDAD', 'Indicador', 1079.1, 5, 30, 0, '850', '°C', '-190', '°C', '0', '60.3 Ω - 375.7 Ω'),
(384, 'Eléctrica', 'TRAZABILIDAD', 'Controlador de temperatura', 1079.1, 5, 30, 0, '1200', '°C', '-100', '°C', '0', '-4633 μV - 69553 μV'),
(385, 'Eléctrica', 'TRAZABILIDAD', 'Controlador de temperatura', 1079.1, 5, 30, 0, '1200', '°C', '-100', '°C', '0', '-3554 μV - 48838 μV'),
(386, 'Eléctrica', 'TRAZABILIDAD', 'Controlador de temperatura', 1079.1, 5, 30, 0, '400', '°C', '-100', '°C', '0', '-3379 μV - 20872 μV'),
(387, 'Eléctrica', 'TRAZABILIDAD', 'Controlador de temperatura', 1079.1, 5, 30, 0, '1000', '°C', '-100', '°C', '0', '-5237 μV - 76373 μV'),
(388, 'Eléctrica', 'TRAZABILIDAD', 'Controlador de temperatura', 1079.1, 5, 30, 0, '1600', '°C', '0', '°C', '0', '0 μV - 18849 μV'),
(389, 'Eléctrica', 'TRAZABILIDAD', 'Controlador de temperatura', 1079.1, 5, 30, 0, '1600', '°C', '0', '°C', '0', '0 μV - 16777 μV'),
(390, 'Eléctrica', 'TRAZABILIDAD', 'Controlador de temperatura', 1079.1, 5, 30, 0, '850', '°C', '-190', '°C', '0', '60.3 Ω - 375.7 Ω'),
(391, 'Eléctrica', 'TRAZABILIDAD', 'Registrador Digital', 1079.1, 5, 30, 0, '1200', '°C', '-100', '°C', '0', '-4633 μV - 69553 μV'),
(392, 'Eléctrica', 'TRAZABILIDAD', 'Registrador Digital', 1079.1, 5, 30, 0, '1200', '°C', '-100', '°C', '0', '-3554 μV - 48838 μV'),
(393, 'Eléctrica', 'TRAZABILIDAD', 'Registrador Digital', 1079.1, 5, 30, 0, '400', '°C', '-100', '°C', '0', '-3379 μV - 20872 μV'),
(394, 'Eléctrica', 'TRAZABILIDAD', 'Registrador Digital', 1079.1, 5, 30, 0, '1000', '°C', '-100', '°C', '0', '-5237 μV - 76373 μV'),
(395, 'Eléctrica', 'TRAZABILIDAD', 'Registrador Digital', 1079.1, 5, 30, 0, '1600', '°C', '0', '°C', '0', '0 μV - 18849 μV'),
(396, 'Eléctrica', 'TRAZABILIDAD', 'Registrador Digital', 1079.1, 5, 30, 0, '1600', '°C', '0', '°C', '0', '0 μV - 16777 μV'),
(397, 'Eléctrica', 'TRAZABILIDAD', 'Registrador Digital', 1079.1, 5, 30, 0, '850', '°C', '-190', '°C', '0', '60.3 Ω - 375.7 Ω'),
(398, 'Masa', 'EMA', 'Balanza analítica', 2140, 10, 30, 300, '300', 'g', '100', 'g', '0', ''),
(399, 'Masa', 'EMA', 'Termo balanza', 2140, 10, 30, 300, '200', 'g', '1', 'g', '0', 'Sin temperatura '),
(400, 'Densidad', 'EMA', 'Densímetro a Frecuencia (1 MRC + 1 MR)', 3284.05, 1, 30, 500, '1.25', 'g/cm^3', '1.25', 'g/cm^3', '0', ''),
(401, 'Densidad', 'EMA', 'Densímetro a Frecuencia (2 MRC)', 3488, 1, 30, 500, '1.25', 'g/cm^3', '1.25', 'g/cm^3', '0', ''),
(402, 'Densidad', 'EMA', 'Densímetro a Frecuencia (2 MRC + 1 MR)', 4620, 3, 30, 500, '0.79', 'g/cm^3', '0.79', 'g/cm^3', '0', ''),
(403, 'Densidad', 'EMA', 'Densímetro a Frecuencia (1 MR)', 4620, 3, 30, 500, '0.99', 'g/cm^3', '0.99', 'g/cm^3', '0', ''),
(406, 'PH', 'TRAZABILIDAD', 'Potenciómetro', 1362.35, 3, 30, 0, '4.01', 'pH', '4.01', 'pH', '0', ''),
(407, 'PH', 'TRAZABILIDAD', 'Potenciómetro', 1362.35, 3, 30, 0, '6.86', 'pH', '6.86', 'pH', '0', ''),
(408, 'PH', 'TRAZABILIDAD', 'Potenciómetro', 1362.35, 3, 30, 0, '10.1', 'pH', '10.1', 'pH', '0', ''),
(409, 'PH', 'TRAZABILIDAD', 'Potenciómetro de Línea', 2310.55, 3, 30, 0, '4.01', 'pH', '4.01', 'pH', '0', ''),
(410, 'PH', 'TRAZABILIDAD', 'Potenciómetro de Línea', 2310.55, 3, 30, 0, '6.86', 'pH', '6.86', 'pH', '0', ''),
(411, 'PH', 'TRAZABILIDAD', 'Potenciómetro de Línea', 2310.55, 3, 30, 0, '10.1', 'pH', '10.1', 'pH', '0', ''),
(412, 'Presión', 'EMA', 'Manómetro', 580, 5, 30, 110, '70', 'MPa', '-77', 'kPa', '0', ''),
(413, 'Presión', 'EMA', 'Manómetro', 580, 5, 30, 110, '10000', 'psi', '-11', 'psi', '0', ''),
(414, 'Masa', 'ILAC', 'Balanza analítica', 244, 5, 0, 200, '202', 'mg', '200', 'mg', '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_servicios`
--

CREATE TABLE `costos_servicios` (
  `cve_costo_servicio` int(11) NOT NULL,
  `acreditamiento` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_magnitud` int(11) NOT NULL,
  `equipo` varchar(250) COLLATE utf8_bin NOT NULL,
  `calificacion_diseno` double NOT NULL,
  `calificacion_instalacion` double NOT NULL,
  `calificacion_operacion` double NOT NULL,
  `cicloOperacion` double NOT NULL,
  `calificacion_desempeno` double NOT NULL,
  `cicloDesempeño` double NOT NULL,
  `porcentaje_calificacion_diseno` double NOT NULL,
  `total_diseno` double(9,2) NOT NULL,
  `ganancia_diseno` double(9,2) NOT NULL,
  `porcentaje_calificacion_instalacion` double NOT NULL,
  `total_instalacion` double(9,2) NOT NULL,
  `ganancia_instalacion` double(9,2) NOT NULL,
  `porcentaje_calificacion_operacion` double NOT NULL,
  `total_operacion` double(9,2) NOT NULL,
  `ganancia_operacion` double(9,2) NOT NULL,
  `porcentaje_calificacion_desempeno` double NOT NULL,
  `total_desempeno` double(9,2) NOT NULL,
  `ganancia_desempeno` double(9,2) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `costos_servicios`
--

INSERT INTO `costos_servicios` (`cve_costo_servicio`, `acreditamiento`, `id_magnitud`, `equipo`, `calificacion_diseno`, `calificacion_instalacion`, `calificacion_operacion`, `cicloOperacion`, `calificacion_desempeno`, `cicloDesempeño`, `porcentaje_calificacion_diseno`, `total_diseno`, `ganancia_diseno`, `porcentaje_calificacion_instalacion`, `total_instalacion`, `ganancia_instalacion`, `porcentaje_calificacion_operacion`, `total_operacion`, `ganancia_operacion`, `porcentaje_calificacion_desempeno`, `total_desempeno`, `ganancia_desempeno`, `estatus`) VALUES
(13, 'ILAC', 1, 'Autoclave', 2500, 2500, 6500, 1100, 8000, 1100, 0, 2500.00, 0.00, 0, 2500.00, 0.00, 0, 6500.00, 0.00, 0, 8000.00, 0.00, 1),
(14, 'ILAC', 8, 'Centrífuga', 5500, 2500, 6500, 1100, 24500, 1100, 0, 5500.00, 0.00, 0, 2500.00, 0.00, 0, 6500.00, 0.00, 0, 24500.00, 0.00, 1),
(17, 'EMA', 3, 'Manómetro', 252, 201, 200, 500, 500, 560, 0, 252.00, 0.00, 0, 201.00, 0.00, 0, 200.00, 0.00, 0, 500.00, 0.00, 1);

--
-- Disparadores `costos_servicios`
--
DELIMITER $$
CREATE TRIGGER `calcularCostoServicio` BEFORE INSERT ON `costos_servicios` FOR EACH ROW BEGIN 
 SET NEW.total_diseno = NEW.calificacion_diseno + (NEW.calificacion_diseno * (NEW.porcentaje_calificacion_diseno / 100));
 SET NEW.ganancia_diseno = NEW.total_diseno - NEW.calificacion_diseno;
  SET NEW.total_instalacion = NEW.calificacion_instalacion + (NEW.calificacion_instalacion * (NEW.porcentaje_calificacion_instalacion / 100));
 SET NEW.ganancia_instalacion = NEW.total_instalacion - NEW.calificacion_instalacion;
 SET NEW.total_operacion = NEW.calificacion_operacion + (NEW.calificacion_operacion * (NEW.porcentaje_calificacion_operacion / 100));
 SET NEW.ganancia_operacion = NEW.total_operacion - NEW.calificacion_operacion;
SET NEW.total_desempeno = NEW.calificacion_desempeno + (NEW.calificacion_desempeno * (NEW.porcentaje_calificacion_desempeno /100));
   SET NEW.ganancia_desempeno = NEW.total_desempeno - NEW.calificacion_desempeno;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calcularCostoServicio2` BEFORE UPDATE ON `costos_servicios` FOR EACH ROW BEGIN 
 SET NEW.total_diseno = NEW.calificacion_diseno + (NEW.calificacion_diseno * (NEW.porcentaje_calificacion_diseno / 100));
 SET NEW.ganancia_diseno = NEW.total_diseno - NEW.calificacion_diseno;
  SET NEW.total_instalacion = NEW.calificacion_instalacion + (NEW.calificacion_instalacion * (NEW.porcentaje_calificacion_instalacion / 100));
 SET NEW.ganancia_instalacion = NEW.total_instalacion - NEW.calificacion_instalacion;
 SET NEW.total_operacion = NEW.calificacion_operacion + (NEW.calificacion_operacion * (NEW.porcentaje_calificacion_operacion / 100));
 SET NEW.ganancia_operacion = NEW.total_operacion - NEW.calificacion_operacion;
SET NEW.total_desempeno = NEW.calificacion_desempeno + (NEW.calificacion_desempeno * (NEW.porcentaje_calificacion_desempeno /100));
   SET NEW.ganancia_desempeno = NEW.total_desempeno - NEW.calificacion_desempeno;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_servicios_dif`
--

CREATE TABLE `costos_servicios_dif` (
  `cve_costo_servicio_dif` int(11) NOT NULL,
  `acreditamiento` varchar(20) NOT NULL,
  `id_magnitud` int(11) NOT NULL,
  `equipo` varchar(250) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `alcance` varchar(20) NOT NULL,
  `temperaturas` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `punto_adicional` int(11) NOT NULL,
  `insertos` int(11) NOT NULL,
  `zonas` int(11) NOT NULL,
  `patron_carga` int(11) NOT NULL,
  `comentarios` varchar(250) NOT NULL,
  `costo_val` int(11) NOT NULL,
  `diseño` int(11) NOT NULL,
  `instalacion` int(11) NOT NULL,
  `operacion` int(11) NOT NULL,
  `desempeño` int(11) NOT NULL,
  `ciclo_desempeño` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `servicio_escrito` varchar(100) NOT NULL,
  `porcentaje_servicio` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `costos_servicios_dif`
--

INSERT INTO `costos_servicios_dif` (`cve_costo_servicio_dif`, `acreditamiento`, `id_magnitud`, `equipo`, `estatus`, `alcance`, `temperaturas`, `costo`, `punto_adicional`, `insertos`, `zonas`, `patron_carga`, `comentarios`, `costo_val`, `diseño`, `instalacion`, `operacion`, `desempeño`, `ciclo_desempeño`, `servicio`, `servicio_escrito`, `porcentaje_servicio`) VALUES
(12, 'EMA', 1, 'Bloque seco', 1, '-20 °C a 200 °C', 0, 1500, 658, 3, 0, 0, ' 1 Insertos 3 Tem a Profu máx / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 1, 'Perfil Termico Baños', 30),
(13, 'EMA', 1, 'Bloque seco', 1, '-20 °C a 200 °C', 0, 1990, 658, 1, 0, 0, '1 Insertos 5 Tem a Profu máx / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 1, 'Perfil Termico Baños', 30),
(14, 'EMA', 1, 'Baño líquido', 1, '-20 °C a 200 °C', 0, 1500, 658, 3, 0, 0, '1 Insertos 3 Tem a Profu máx / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 1, 'Perfil Termico Baños', 30),
(15, 'EMA', 1, 'Baño líquido', 1, '-20 °C a 200 °C', 0, 1990, 658, 1, 0, 0, '1 Insertos 5 Tem a Profu máx / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 1, 'Perfil Termico Baños', 30),
(16, 'EMA', 1, 'Microbaño', 1, '-20 °C a 200 °C', 0, 1500, 658, 3, 0, 0, '1 Insertos 3 Tem a Profu máx / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 1, 'Perfil Termico Baños', 30),
(17, 'EMA', 1, 'Microbaño', 1, '-20 °C a 200 °C', 0, 1990, 658, 1, 0, 0, '1 Insertos 5 Tem a Profu máx / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 1, 'Perfil Termico Baños', 30),
(18, 'EMA', 1, 'Hornos', 1, '-20 °C a 200 °C', 1, 1014, 658, 0, 3, 0, '3 Zonas  1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(19, 'EMA', 1, 'Hornos', 1, '-20 °C a 200 °C', 1, 1257, 658, 0, 5, 0, '5 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(20, 'EMA', 1, 'Hornos', 1, '-20 °C a 200 °C', 3, 1500, 658, 0, 1, 0, '1 Zona 3 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(21, 'EMA', 1, 'Hornos', 1, '-20 °C a 200 °C', 5, 1990, 658, 0, 1, 0, '1 Zona 5 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(22, 'EMA', 1, 'Incubadoras', 1, '-20 °C a 200 °C', 1, 1014, 658, 0, 3, 0, '3 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(23, 'EMA', 1, 'Incubadoras', 1, '-20 °C a 200 °C', 1, 1257, 658, 0, 5, 0, '5 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(24, 'EMA', 1, 'Incubadoras', 1, '-20 °C a 200 °C', 3, 1500, 658, 0, 1, 0, '1 Zona 3 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(25, 'EMA', 1, 'Incubadoras', 1, '-20 °C a 200 °C', 5, 1990, 658, 0, 1, 0, '1 Zona 5 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(26, 'EMA', 1, 'Muflas', 1, '-20 °C a 200 °C', 1, 1014, 658, 0, 3, 0, '3 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(27, 'EMA', 1, 'Muflas', 1, '-20 °C a 200 °C', 1, 1257, 658, 0, 5, 0, '5 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(28, 'EMA', 1, 'Muflas', 1, '-20 °C a 200 °C', 3, 1500, 658, 0, 1, 0, '1 Zona 3 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(29, 'EMA', 1, 'Muflas', 1, '-20 °C a 200 °C', 5, 1990, 658, 0, 1, 0, '1 Zona 5 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(30, 'EMA', 1, 'Cámaras Frías', 1, '-20 °C a 200 °C', 1, 1014, 658, 0, 3, 0, '3 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(31, 'EMA', 1, 'Cámaras Frías', 1, '-20 °C a 200 °C', 1, 1257, 658, 0, 5, 0, '5 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(32, 'EMA', 1, 'Cámaras Frías', 1, '-20 °C a 200 °C', 3, 1500, 658, 0, 1, 0, '1 Zona 3 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(33, 'EMA', 1, 'Cámaras Frías', 1, '-20 °C a 200 °C', 5, 1990, 658, 0, 1, 0, '1 Zona 5 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(34, 'EMA', 1, 'Refrigeradores', 1, '-20 °C a 200 °C', 1, 1014, 658, 0, 3, 0, '3 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(35, 'EMA', 1, 'Refrigeradores', 1, '-20 °C a 200 °C', 1, 1257, 658, 0, 5, 0, '5 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(36, 'EMA', 1, 'Refrigeradores', 1, '-20 °C a 200 °C', 3, 1500, 658, 0, 1, 0, '1 Zona 3 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(37, 'EMA', 1, 'Refrigeradores', 1, '-20 °C a 200 °C', 5, 1990, 658, 0, 1, 0, '1 Zona 5 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(38, 'EMA', 1, 'Congeladores', 1, '-20 °C a 200 °C', 1, 1014, 658, 0, 3, 0, '3 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(39, 'EMA', 1, 'Congeladores', 1, '-20 °C a 200 °C', 1, 1257, 658, 0, 5, 0, '5 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(40, 'EMA', 1, 'Congeladores', 1, '-20 °C a 200 °C', 3, 1500, 658, 0, 1, 0, '1 Zona 3 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(41, 'EMA', 1, 'Congeladores', 1, '-20 °C a 200 °C', 5, 1990, 658, 0, 1, 0, '1 Zona 5 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(42, 'EMA', 1, 'Baños María', 1, '-20 °C a 200 °C', 1, 1014, 658, 0, 3, 0, '3 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(43, 'EMA', 1, 'Baños María', 1, '-20 °C a 200 °C', 1, 1257, 658, 0, 5, 0, '5 Zonas 1 Temperatura / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(44, 'EMA', 1, 'Baños María', 1, '-20 °C a 200 °C', 3, 1500, 658, 0, 1, 0, '1 Zona 3 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(45, 'EMA', 1, 'Baños María', 1, '-20 °C a 200 °C', 5, 1990, 658, 0, 1, 0, '1 Zona 5 Temperaturas / -20 °C a 200 °C', 0, 0, 0, 0, 0, 0, 2, 'Perfil Termico', 30),
(46, 'EMA', 1, 'Autoclave', 1, '121 °C', 5, 21569, 13649, 0, 0, 1, '3 ciclos con 1 patrón de carga', 0, 0, 0, 0, 0, 0, 3, 'Validación', 30),
(47, 'EMA', 3, 'Medición a Interruptor', 1, '-20.36 inHg a -0.59 ', 0, 580, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(48, 'EMA', 3, 'Switch de Presión / Presostato', 1, '-20.36 inHg a -0.59 ', 0, 580, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(49, 'EMA', 3, 'Medición de Punto de Apertura a Válvula de Seguridad', 1, '4.7 kPa / 0.68 psi /', 0, 680, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(50, 'EMA', 3, 'Ajuste a Válvula de Seguridad', 1, '4.7 kPa / 0.68 psi /', 0, 600, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(51, 'EMA', 3, 'Ajuste a Manómetro', 1, '-77 kPa a 70 MPa / -', 0, 580, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(52, 'EMA', 3, 'Ajuste a Vacuómetro', 1, '-77 kPa a 70 MPa / -', 0, 580, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(53, 'EMA', 3, 'Ajuste a Manovacuómetro', 1, '-77 kPa a 70 MPa / -', 0, 580, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(54, 'EMA', 3, 'Ajuste a Registrador de Presión', 1, '-77 kPa a 70 MPa / -', 0, 500, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 5, 'Presión', 30),
(55, 'EMA', 1, 'Ajuste a termómetro de lectura directa', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(56, 'EMA', 1, 'Ajuste a termómetro analógico', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(57, 'EMA', 1, 'Ajuste a termómetro digital', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(58, 'EMA', 1, 'Ajuste a termómetro bimetálico', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(59, 'EMA', 1, 'Ajuste a termómetro de bulbo', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(60, 'EMA', 1, 'Ajuste a termómetro de vástago', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(61, 'EMA', 1, 'Ajuste a registrador', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(62, 'EMA', 1, 'Ajuste a transmisor', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(63, 'EMA', 1, 'Ajuste a controlador', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(64, 'EMA', 1, 'Ajuste a indicador', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(65, 'EMA', 1, 'Ajuste a transductor', 1, '-30 °C a 420 °C', 0, 660, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(66, 'EMA', 1, 'Ajuste a registrador de temperatura analógico', 1, '-30 °C a 420 °C', 0, 600, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 6, 'Temperatura', 30),
(67, 'EMA', 7, 'Medición a conductímetro de laboratorio', 1, '1413 µS/cm o 147 µS/', 0, 1922, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 7, 'Conductividad', 30),
(68, 'EMA', 7, 'Medición a conductímetro en línea', 1, '1413 µS/cm o 147 µS/', 0, 3092, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 7, 'Conductividad', 30),
(69, 'EMA', 4, 'Medición a potenciómetro de laboratorio', 1, '(4,01 / 6,86 / 10,1)', 0, 1362, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 8, 'PH', 30),
(70, 'EMA', 4, 'Medición a potenciómetro en línea', 1, '(4,01 / 6,86 / 10,1)', 0, 2311, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 8, 'Turbidez', 30),
(71, 'EMA', 11, 'Medición a turbidimetro laboratorio', 1, '1 NTU', 0, 2088, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 9, 'Turbidez', 30),
(72, 'EMA', 1, 'Cámaras', 1, '12', 12, 3443, 54554, 12, 12, 0, '', 0, 0, 0, 0, 0, 0, 2, '', 0),
(73, 'EMA', 1, 'Refrigeradores', 1, '', 0, 0, 0, 0, 0, 0, '', 0, 500, 100, 135, 200, 155, 4, '', 0),
(74, 'EMA', 1, 'Refrigeradores', 1, '25', 55, 548, 15, 54, 65, 0, '', 0, 0, 0, 0, 0, 0, 2, '', 0),
(75, 'PERRY', 1, 'Autoclave', 1, '25', 0, 0, 0, 0, 0, 48, '48', 54, 0, 0, 0, 0, 0, 3, '', 0),
(76, 'PERRY', 1, 'Hornos', 1, '', 0, 0, 0, 0, 0, 0, '', 0, 500, 100, 254, 21, 215, 4, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detallePedido` int(11) NOT NULL,
  `cve_usuario` int(11) NOT NULL,
  `recoleccion` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `Cotizacion_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pago` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Comentarios` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id_detallePedido`, `cve_usuario`, `recoleccion`, `subtotal`, `iva`, `total`, `Cotizacion_no`, `pago`, `Comentarios`) VALUES
(108, 41, 0, 4700, 752, 5452, 'PAL-22-0040', 'En proceso', ''),
(129, 41, 0, 1990, 318, 2308, 'PAL-22-0061', 'En proceso', ''),
(130, 41, 0, 1990, 318, 2308, 'PAL-22-0062', 'En proceso', ''),
(138, 41, 0, 4765, 762, 5527, 'PAL-22-0063', 'En proceso', ''),
(139, 41, 0, 455, 73, 528, 'PAL-22-0064', 'En proceso', ''),
(140, 41, 20, 3020, 483, 3503, 'PAL-22-0065', 'En proceso', ''),
(141, 41, 20, 1520, 243, 1763, 'PAL-22-0066', 'En proceso', ''),
(142, 41, 0, 1990, 318, 2308, 'PAL-22-0067', 'En proceso', ''),
(143, 41, 0, 1500, 240, 1740, 'PAL-22-0068', 'En proceso', ''),
(144, 41, 0, 2810, 450, 3260, 'PAL-22-0069', 'En proceso', ''),
(145, 41, 0, 3625, 580, 4205, 'PAL-22-0070', 'En proceso', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id_instrumento` int(11) NOT NULL,
  `id_magnitud` int(11) DEFAULT NULL,
  `instrumento` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id_instrumento`, `id_magnitud`, `instrumento`) VALUES
(1, 1, 'Termómetro de lectura directa'),
(2, 1, 'Termómetro analógico'),
(3, 1, 'Termómetro digital'),
(4, 1, 'Termómetro bimetalico'),
(5, 1, 'Termómetro de bulbo'),
(6, 1, 'Termómetro de vastago'),
(7, 1, 'Registrador'),
(8, 1, 'Trasmisor'),
(9, 1, 'Controlador'),
(10, 1, 'Indicador'),
(11, 1, 'Trasductor'),
(12, 1, 'Sensores TC, RTD'),
(13, 1, 'Termómetro de liquido en vidrio'),
(14, 1, 'RTD Patron (EIT-90)'),
(15, 1, 'Termopar R, S'),
(16, 2, 'Báscula'),
(17, 2, 'Balanza'),
(18, 2, 'Balanza analítica'),
(19, 2, 'Termo balanza'),
(20, 2, 'Plataforma'),
(21, 2, 'Pesa'),
(22, 2, 'Juego de pesas'),
(23, 2, 'Objetos solidos no normalizados'),
(24, 3, 'Manómetro'),
(25, 3, 'Manómetro diferencial'),
(26, 3, 'Vacuómetro'),
(27, 3, 'Manovacuómetro'),
(28, 3, 'Registrador de presión'),
(29, 3, 'Probador de fugas'),
(30, 3, 'Trasmisor'),
(31, 3, 'Trasductor I/P y P/I'),
(32, 3, 'Balanza de presión'),
(33, 3, 'Baumanometro o Esfingomanómetro Analógico'),
(34, 4, 'Potenciómetro'),
(35, 4, 'Potenciómetro de Línea'),
(36, 5, 'Higrómetro'),
(37, 5, 'Termohigrómetro'),
(38, 6, 'Tanques Fijos de Almacenamiento (Verticales)'),
(39, 6, 'Tanques Fijos de Almacenamiento (Horizontales)'),
(40, 7, 'Conductímetro'),
(41, 7, 'Conductímetro de Línea'),
(42, 8, 'Indicador'),
(43, 8, 'Controlador de temperatura'),
(44, 8, 'Registrador Digital'),
(45, 8, 'Potenciometro'),
(46, 8, 'Potenciometro de linea'),
(47, 9, 'Densímetro a Frecuencia (1 MR)'),
(48, 9, 'Densímetro a Frecuencia (1 MRC)'),
(49, 9, 'Densímetro a Frecuencia (1 MRC + 1 MR)'),
(50, 9, 'Densímetro a Frecuencia (2 MRC)'),
(51, 9, 'Densímetro a Frecuencia (2 MRC + 1 MR)'),
(52, 10, 'Espectrofotómetro'),
(53, 10, 'Filtros en escala fotométrica'),
(54, 10, 'Filtros en longitud  de onda'),
(55, 10, 'Kit docromato de potasio'),
(69, 3, 'Probador de Presión Interna'),
(80, 1, 'nuevo'),
(81, 2, 'nuevo2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `magnitud`
--

CREATE TABLE `magnitud` (
  `id_magnitud` int(11) NOT NULL,
  `magnitud` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `magnitud`
--

INSERT INTO `magnitud` (`id_magnitud`, `magnitud`) VALUES
(1, 'Temperatura'),
(2, 'Masa'),
(3, 'Presión'),
(4, 'PH'),
(5, 'Humedad'),
(6, 'Volumen'),
(7, 'Conductividad'),
(8, 'Eléctrica'),
(9, 'Densidad'),
(10, 'Optica'),
(11, 'Turbidez'),
(21, 'Magnitud_prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidocalibracion`
--

CREATE TABLE `pedidocalibracion` (
  `id_pedidoCalibracion` int(11) NOT NULL,
  `cve_usuario` int(50) DEFAULT NULL,
  `instrumento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identificacion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puntos_calibrar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puntos_adicionales` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costo_calibracion` int(11) DEFAULT NULL,
  `fehca_calibracion` date DEFAULT NULL,
  `pago` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `cotizacionNo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `extra` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Comentarios` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidocalibracion`
--

INSERT INTO `pedidocalibracion` (`id_pedidoCalibracion`, `cve_usuario`, `instrumento`, `marca`, `modelo`, `identificacion`, `puntos_calibrar`, `puntos_adicionales`, `costo_calibracion`, `fehca_calibracion`, `pago`, `fecha_pedido`, `cotizacionNo`, `extra`, `Comentarios`) VALUES
(57, 23, 'Termómetro de liquido en vidrio', 'Metron', 'DE3456', 'azul', '3', '2', 1644, '2021-08-23', 'Pagado', '2021-08-19', 'PAL-21-001', '0', ''),
(59, 36, 'Termómetro de lectura directa', 'NOM', '1652345', 'CAFE', '3', '1', 1470, '2021-11-09', 'En proceso', '2021-11-05', 'PAL-21-003', '0', ''),
(60, 36, 'Termómetro de liquido en vidrio', 'DUVE', 'S/M', 'DVMP-01', '3', '0', 1099, '2021-11-22', 'Pagado', '2021-11-16', 'PAL-21-004', '0', ''),
(61, 36, 'Termómetro de liquido en vidrio', 'ISOLAB', 'S/M', 'ISBM-05', '3', '0', 1099, '2021-11-22', 'Pagado', '2021-11-16', 'PAL-21-004', '0', ''),
(62, 36, 'Termómetro de liquido en vidrio', 'TAYLOR', '6332', 'CT15M-04', '3', '0', 1099, '2021-11-22', 'Pagado', '2021-11-16', 'PAL-21-004', '0', ''),
(63, 36, 'Termómetro de liquido en vidrio', 'S/M', 'S/M', 'TINCM-03', '3', '0', 1099, '2021-11-22', 'Pagado', '2021-11-16', 'PAL-21-004', '0', ''),
(64, 36, 'Termómetro de lectura directa', 'TAYLOR', 'B1-THERM', 'TB1F-01', '3', '0', 1320, '2021-11-22', 'Pagado', '2021-11-16', 'PAL-21-004', '0', ''),
(65, 36, 'Termómetro de lectura directa', 'TAYLOR', 'B1-THERM', 'TBCM-06', '3', '0', 1320, '2021-11-22', 'Pagado', '2021-11-16', 'PAL-21-004', '0', ''),
(66, 36, 'Báscula', 'OKEN', 'FM125', ' 148092', '10', '0', 1820, '2021-12-06', 'En proceso', '2021-11-30', 'PAL-21-005', '0', ''),
(67, 36, 'Báscula', 'OKEN', ' FM 125 ', '174960', '10', '0', 1820, '2021-12-06', 'En proceso', '2021-11-30', 'PAL-21-005', '0', ''),
(68, 36, 'Báscula', 'NOVAL', 'S/N', 'S/M', '10', '0', 1820, '2021-12-07', 'En proceso', '2021-11-30', 'PAL-21-005', '0', ''),
(69, 36, 'Pesa', 'INPROS', 'S/M', 'IN', '0', '0', 520, '2021-12-07', 'En proceso', '2021-11-30', 'PAL-21-005', 'CLASE F1', ''),
(70, 36, 'Pesa', 'INPROS', 'S/M', 'INP', '0', '0', 780, '2021-12-06', 'En proceso', '2021-11-30', 'PAL-21-005', 'CLASE F1', ''),
(71, 36, 'Termómetro de lectura directa', 'PRECISA', 'termo', 'amarillo', '3', '0', 1430, '2021-12-07', 'En proceso', '2021-12-03', 'PAL-21-006', '0', ''),
(72, 36, 'Báscula', 'lpop', 'nuhn', 'naranja', '10', '0', 1726, '2021-12-15', 'En proceso', '2021-12-08', 'PAL-21-008', '0', ''),
(73, 41, 'Termómetro de lectura directa', 'fdfs', 'cdfsf', '344', '3', '7', 4797, '2022-01-26', 'Pagado', '2022-01-19', 'PAL-22-0014', '0', ''),
(74, 41, 'Pesa', 'mass', 'dsadasd', '123', '0', '2', 455, '2022-01-28', 'En proceso', '2022-01-24', 'PAL-22-0016', '0', ''),
(75, 41, 'Pesa', 'mass', '3232', '23', '0', '2', 455, '2022-01-28', 'En proceso', '2022-01-24', 'PAL-22-0035', '0', ''),
(76, 41, 'Pesa', 'mass', '3232', '23', '0', '2', 455, '2022-01-28', 'En proceso', '2022-01-24', 'PAL-22-0036', '0', ''),
(77, 41, 'Pesa', 'mass', '3232', '23', '0', '2', 455, '2022-01-28', 'En proceso', '2022-01-24', 'PAL-22-0037', '0', ''),
(78, 41, 'Pesa', 'mass', 'dsadasd', '21', '0', '2', 455, '2022-02-03', 'En proceso', '2022-01-31', 'PAL-22-0063', '0', ''),
(79, 41, 'Pesa', 'fdfs', '342', '10', '0', '1', 455, '2022-02-05', 'En proceso', '2022-02-02', 'PAL-22-0064', '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidomantenimiento`
--

CREATE TABLE `pedidomantenimiento` (
  `id_pedidoMantenimiento` int(11) NOT NULL,
  `cve_usuario` int(11) DEFAULT NULL,
  `equipo` varchar(80) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `identificacion` varchar(50) DEFAULT NULL,
  `servicio` varchar(50) DEFAULT NULL,
  `costo_mantenimiento` double DEFAULT NULL,
  `pago` varchar(20) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `fecha_servicio` date DEFAULT NULL,
  `cotizacionNo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidomantenimiento`
--

INSERT INTO `pedidomantenimiento` (`id_pedidoMantenimiento`, `cve_usuario`, `equipo`, `marca`, `modelo`, `identificacion`, `servicio`, `costo_mantenimiento`, `pago`, `fecha_pedido`, `fecha_servicio`, `cotizacionNo`) VALUES
(14, 23, 'Baños María', 'sopasse', '2345', 'reten', 'Mantenimiento', 2833.2, 'Pagado', '2021-08-19', '2021-08-23', 'PAL-21-001'),
(20, 41, 'Desintegrador', 'prueba', '6745', 'dfeee', 'Mantenimiento', 4200, 'En proceso', '2022-01-24', '2022-01-31', 'PAL-22-0015'),
(21, 41, 'Disolutor', 'prueba', '232', 'dfeee', 'Mantenimiento', 2450, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0016'),
(41, 41, 'Conductivímetros', 'prueba', '6745', '32', 'Mantenimiento', 1900, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0033'),
(42, 41, 'Conductivímetros', 'prueba', '6745', '32', 'Mantenimiento', 1900, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0034'),
(46, 41, 'Disolutor', '25', '3434', '32', 'Mantenimiento', 2450, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0038'),
(43, 41, 'Cuenta colonias', 'prueba', '3434', '32', 'Mantenimiento', 2250, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0035'),
(44, 41, 'Cuenta colonias', 'prueba', '3434', '32', 'Mantenimiento', 2250, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0036'),
(45, 41, 'Cuenta colonias', 'prueba', '3434', '32', 'Mantenimiento', 2250, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0037'),
(47, 41, 'Desintegrador', 'prueba', '12', '23', 'Mantenimiento', 4200, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0039'),
(48, 41, 'Microscopios', 'prueba', '6745', 'dfeee', 'Mantenimiento', 4700, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0040'),
(49, 41, 'Conductivímetros', 'prueba', '6745', '32', 'Mantenimiento', 1900, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0041'),
(50, 41, 'Conductivímetros', 'prueba', '6745', '32', 'Mantenimiento', 1900, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0042'),
(51, 41, 'Cuenta colonias', 'prueba', '6745', '32', 'Mantenimiento', 2250, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0043'),
(52, 41, 'Bombas de vacío', 'wsq', 'qw2', '121', 'Mantenimiento', 2860, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0044'),
(53, 41, 'Bombas de vacío', 'wsq', 'qw2', '121', 'Mantenimiento', 2860, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0045'),
(54, 41, '', '', '', '', '', 0, 'En proceso', '2022-01-24', '0000-00-00', 'PAL-22-0047'),
(55, 41, '', '', '', '', '', 0, 'En proceso', '2022-01-24', '0000-00-00', 'PAL-22-0047'),
(56, 41, 'Baños María', 'prueba', '6745', 'dfeee', 'Mantenimiento', 2810, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0063'),
(57, 41, 'Baños María', 'hsy', 'jsu', '14', 'Mantenimiento', 2810, 'En proceso', '2022-02-03', '2022-02-08', 'PAL-22-0069'),
(58, 41, 'Autoclaves', 'hsy', 'jsu', '14', 'Mantenimiento', 3625, 'En proceso', '2022-02-03', '2022-02-08', 'PAL-22-0070');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoservicio`
--

CREATE TABLE `pedidoservicio` (
  `id_pedidoServicio` int(11) NOT NULL,
  `cve_usuario` int(50) DEFAULT NULL,
  `equipo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identificacion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servicio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciclos` int(11) DEFAULT NULL,
  `costo_servicio` int(11) DEFAULT NULL,
  `pago` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `fecha_servicio` date DEFAULT NULL,
  `cotizacionNo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidoservicio`
--

INSERT INTO `pedidoservicio` (`id_pedidoServicio`, `cve_usuario`, `equipo`, `marca`, `modelo`, `identificacion`, `servicio`, `ciclos`, `costo_servicio`, `pago`, `fecha_pedido`, `fecha_servicio`, `cotizacionNo`) VALUES
(36, 23, 'Autoclave', 'NOM', '1652345', 'CAFE', 'Calificación de diseño', 1, 2500, 'Pagado', '2021-08-19', '2021-08-23', 'PAL-21-001'),
(37, 23, 'Autoclave', 'NOM', '1652345', 'CAFE', 'Calificación de instalación', 1, 2500, 'Pagado', '2021-08-19', '2021-08-23', 'PAL-21-001'),
(38, 36, 'Bloque seco', 'hello', 'DE3456', 'fffffffff', 'Perfil Térmico Baños', 1, 2158, 'En proceso', '2021-12-03', '2021-12-07', 'PAL-21-006'),
(42, 32, 'Bloque seco', 'rtrtbb', 'bbb', 'rtbrtb', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2021-12-07', '2021-12-24', 'PAL-21-007'),
(43, 32, 'Autoclave', 'asd', 'asd', 'asd', 'Validación', 1, 35218, 'En proceso', '2021-12-08', '2021-12-29', 'PAL-21-009'),
(44, 41, 'Bloque seco', 'mass', 'dsadasd', 'dasd', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-18', '2022-01-22', 'PAL-22-0010'),
(45, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1500, 'Pagado', '2022-01-18', '2022-01-29', 'PAL-22-0011'),
(46, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-18', '2022-01-29', 'PAL-22-0012'),
(47, 41, 'Bloque seco', 'fdfs', '342', 'fdsf', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-19', '2022-01-23', 'PAL-22-0013'),
(48, 41, 'Medición a potenciómetro de laboratorio', 'wes', 'dsadasd', '232', 'PH', 0, 1362, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0016'),
(49, 41, 'Autoclave', 'mass', 'dsadasd', '145', 'Validación', 1, 21569, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0017'),
(50, 41, 'Ajuste a termómetro de lectura directa', 'mass', 'dsadasd', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0018'),
(51, 41, 'Ajuste a termómetro de lectura directa', 'mass', 'dsadasd', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0019'),
(52, 41, 'Ajuste a termómetro de lectura directa', 'mass', 'dsadasd', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0020'),
(53, 41, 'Ajuste a termómetro de lectura directa', 'mass', 'dsadasd', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0021'),
(54, 41, 'Ajuste a termómetro de lectura directa', 'mass', 'dsadasd', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0022'),
(55, 41, 'Ajuste a termómetro de lectura directa', 'mass', 'dsadasd', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0023'),
(56, 41, 'Ajuste a termómetro de lectura directa', 'mass', 'dsadasd', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0024'),
(57, 41, 'Bloque seco', 'mass', 'dsadasd', '232', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0025'),
(58, 41, 'Bloque seco', 'mass', 'dsadasd', '232', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0026'),
(59, 41, 'Bloque seco', 'mass', 'dsadasd', '232', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0027'),
(60, 41, 'Bloque seco', 'mass', 'dsadasd', '232', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0028'),
(61, 41, 'Bloque seco', 'mass', 'dsadasd', '232', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0029'),
(62, 41, 'Ajuste a registrador', 'tre', '3232', '23', 'Temperatura', 0, 660, 'En proceso', '2022-01-24', '2022-01-28', 'PAL-22-0032'),
(63, 41, 'Medición a Interruptor', 'mass', 'dsadasd', '232', 'Presión', 0, 580, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0035'),
(64, 41, 'Medición a Interruptor', 'mass', 'dsadasd', '232', 'Presión', 0, 580, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0036'),
(65, 41, 'Medición a Interruptor', 'mass', 'dsadasd', '232', 'Presión', 0, 580, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0037'),
(66, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0046'),
(67, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0047'),
(68, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-24', '2022-01-29', 'PAL-22-0048'),
(69, 41, 'Medición a Interruptor', 'mass', 'dsadasd', '23', 'Presión', 0, 580, 'En proceso', '2022-01-24', '2022-01-30', 'PAL-22-0049'),
(70, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-31', '2022-02-18', 'PAL-22-0050'),
(71, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-11', 'PAL-22-0051'),
(72, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-11', 'PAL-22-0052'),
(73, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-11', 'PAL-22-0053'),
(74, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-11', 'PAL-22-0054'),
(75, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-11', 'PAL-22-0055'),
(76, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0056'),
(77, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0057'),
(78, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0058'),
(79, 41, 'Bloque seco', 'mass', '3232', '23', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0059'),
(80, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-04', 'PAL-22-0060'),
(81, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-10', 'PAL-22-0061'),
(82, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0062'),
(83, 41, 'Bloque seco', 'tre', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-31', '2022-02-04', 'PAL-22-0063'),
(84, 41, 'Bloque seco', 'mass', '3232', 'fdsf', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-31', '2022-02-04', 'PAL-22-0063'),
(85, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-04', 'PAL-22-0063'),
(86, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0063'),
(87, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-04', 'PAL-22-0063'),
(88, 41, 'Bloque seco', 'mass', 'dsadasd', 'fdsf', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0063'),
(89, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-31', '2022-02-03', 'PAL-22-0063'),
(90, 41, 'Bloque seco', 'mass', 'dsadasd', '23', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-01-31', '2022-02-10', 'PAL-22-0063'),
(91, 41, 'Bloque seco', 'fdfs', '342', 'fdsf', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-02-02', '2022-02-05', 'PAL-22-0065'),
(92, 41, 'Bloque seco', 'fdfs', '342', '344', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-02-02', '2022-02-05', 'PAL-22-0065'),
(93, 41, 'Bloque seco', 'fdfs', '342', 'fdsf', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-02-02', '2022-02-05', 'PAL-22-0066'),
(94, 41, 'Bloque seco', 'dssf4', '23', '12', 'Perfil Térmico Baños', 0, 1990, 'En proceso', '2022-02-03', '2022-02-06', 'PAL-22-0067'),
(95, 41, 'Bloque seco', 'dssf4', '23', '12', 'Perfil Térmico Baños', 0, 1500, 'En proceso', '2022-02-03', '2022-02-09', 'PAL-22-0068');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `servicio` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_magnitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `servicio`, `id_magnitud`) VALUES
(2, 'Autoclave', 1),
(4, 'Cámara Climática', 1),
(5, 'Cámara de envejecimiento acelerado o cámara salina', 1),
(6, 'Cámara de humedad', 1),
(8, 'Refrigerador', 1),
(9, 'Congelador', 1),
(10, 'Ultracongelador', 1),
(12, 'Estufa', 1),
(13, 'Mufla', 1),
(14, 'Horno', 1),
(15, 'Incubadora', 1),
(24, 'Baño maría', 1),
(26, 'Bloque seco', 1),
(27, 'Baño liquido', 1),
(28, 'Microbaño', 1),
(29, 'Termómetro de lectura directa', 1),
(30, 'Termómetro analógico', 1),
(31, 'Termómetro digital', 1),
(32, 'Termómetro bimetalico', 1),
(33, 'Termómetro de bulbo', 1),
(34, 'Termómetro de vastago', 1),
(35, 'Registrador', 1),
(36, 'Trasmisor', 1),
(37, 'Controlador', 1),
(38, 'Indicador', 1),
(39, 'Trasductor', 1),
(40, 'Sensores TC, RTD', 1),
(41, 'Termómetro de liquido en vidrio', 1),
(42, 'RTD Patron (EIT-90)  ', 1),
(43, 'Termopar R, S', 1),
(44, 'Ajuste de Termómetro de lectura directa', 1),
(45, 'Ajuste de Termómetro analógico', 1),
(46, 'Ajuste de Termómetro digital', 1),
(47, 'Ajuste de Termómetro bimetalico', 1),
(48, 'Ajuste de Termómetro de bulbo', 1),
(49, 'Ajuste de Termómetro de vastago', 1),
(50, 'Ajuste de Registrador', 1),
(51, 'Ajuste de Trasmisor', 1),
(52, 'Ajuste de Controlador', 1),
(53, 'Ajuste de Indicador', 1),
(54, 'Ajuste de Trasductor', 1),
(55, 'Bombas de vacío', 1),
(56, 'Cuenta colonias', 1),
(57, 'Colorímetros', 1),
(58, 'Conductivímetros ', 1),
(59, 'Desintegrador', 1),
(60, 'Espectrofotómetros', 1),
(61, 'Friabilizador', 1),
(62, 'Microscopios', 1),
(63, 'Parrillas', 1),
(64, 'Polarímetros', 1),
(65, 'Potenciómetros ', 1),
(66, 'Recirculadores', 1),
(67, 'Refractómetros', 1),
(68, 'Turbidímetros', 1),
(69, 'Viscosímetros', 1),
(70, 'Báscula', 2),
(71, 'Balanza', 2),
(72, 'Balanza analítica', 2),
(73, 'Termo balanza', 2),
(74, 'Plataforma', 2),
(75, 'Pesa', 2),
(76, 'Juego de pesas', 2),
(77, 'Objetos solidos no normalizados', 2),
(78, 'Mantenimiento Preventivo a Instrumento de Pesaje', 2),
(79, 'Manómetro', 3),
(80, 'Manómetro diferencial', 3),
(81, 'Vacuómetro', 3),
(82, 'Manovacuómetro', 3),
(83, 'Registrador de presión', 3),
(84, 'Probador de fugas', 3),
(85, 'Trasmisor', 3),
(86, 'Trasductor I/P y P/I', 3),
(87, 'Balanza de presión', 3),
(88, 'Baumanometro o Esfingomanómetro Analógico', 3),
(89, 'Ajuste a Manómetro', 3),
(90, 'Ajuste a Vacuómetro', 3),
(91, 'Ajuste a Manovacuómetro', 3),
(92, 'Ajuste a Válvula de seguridad', 3),
(93, 'Ajuste a Registrador de presión', 3),
(94, 'Potenciómetro ', 4),
(95, 'Potenciómetro de Línea', 4),
(96, 'Mantenimiento Preventivo a Potenciómetro de Laboratorio', 4),
(97, 'Higrómetro', 5),
(98, 'Termohigrómetro', 5),
(99, 'Tanques Fijos de Almacenamiento (Verticales)', 6),
(100, 'Tanques Fijos de Almacenamiento (Horizontales)', 6),
(101, 'Conductímetro', 7),
(102, 'Conductímetro de Línea', 7),
(103, 'Mantenimiento Preventivo a Conductímetro de Laboratorio.', 7),
(104, 'Indicador', 8),
(105, 'Controlador de temperatura', 8),
(106, 'Registrador Digital', 8),
(107, 'Potenciometro', 8),
(108, 'Potenciometro de linea', 8),
(109, 'Densímetro a Frecuencia (1 MR)', 9),
(110, 'Densímetro a Frecuencia (1 MRC)', 9),
(111, 'Densímetro a Frecuencia (1 MRC + 1 MR)', 9),
(112, 'Densímetro a Frecuencia (2 MRC)', 9),
(113, 'Densímetro a Frecuencia (2 MRC + 1 MR)', 9),
(114, 'Mantenimiento Preventivo a Densímetro a Frecuencia', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciosmantenimiento`
--

CREATE TABLE `serviciosmantenimiento` (
  `id_servicioM` int(11) NOT NULL,
  `id_magnitud` int(11) NOT NULL,
  `servicio` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serviciosmantenimiento`
--

INSERT INTO `serviciosmantenimiento` (`id_servicioM`, `id_magnitud`, `servicio`) VALUES
(12, 1, 'Autoclaves'),
(13, 1, 'Baños María'),
(14, 1, 'Bombas de vacío'),
(15, 1, 'Cuenta colonias'),
(16, 1, 'Colorímetros'),
(17, 1, 'Conductivímetros'),
(18, 1, 'Desintegrador'),
(19, 1, 'Disolutor'),
(21, 1, 'Estufas'),
(22, 1, 'Friabilizador'),
(23, 1, 'Incubadoras'),
(24, 1, 'Microscopios'),
(25, 1, 'Parrillas'),
(26, 1, 'Polarímetros'),
(28, 1, 'Recirculadores'),
(29, 1, 'Refractómetros'),
(31, 1, 'Viscosímetros'),
(32, 7, 'Conductímetro de laboratorio'),
(33, 4, 'Potenciómetros'),
(34, 9, 'Densímetro de frecuencia'),
(36, 10, 'Espectrofotómetros'),
(37, 2, 'Instrumento de pesaje'),
(38, 11, 'Turbidímetros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_dif`
--

CREATE TABLE `servicios_dif` (
  `id_servdif` int(10) NOT NULL,
  `id_serv` int(10) NOT NULL,
  `id_magnitud` int(11) NOT NULL,
  `servicios` varchar(60) DEFAULT NULL,
  `equipo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios_dif`
--

INSERT INTO `servicios_dif` (`id_servdif`, `id_serv`, `id_magnitud`, `servicios`, `equipo`) VALUES
(1, 1, 1, 'Perfil térmico baños', 'Bloque seco'),
(2, 1, 1, 'Perfil térmico baños', 'Baño líquido'),
(3, 1, 1, 'Perfil térmico baños', 'Microbaño'),
(4, 2, 1, 'Perfil térmico', 'Hornos'),
(5, 2, 1, 'Perfil térmico', 'Incubadoras'),
(6, 2, 1, 'Perfil térmico', 'Muflas'),
(7, 2, 1, 'Perfil térmico', 'Cámaras Frías'),
(8, 2, 1, 'Perfil térmico', 'Refrigeradores'),
(9, 2, 1, 'Perfil térmico', 'Congeladores'),
(10, 2, 1, 'Perfil térmico', 'Baños María'),
(11, 3, 1, 'Validación', 'Autoclave'),
(12, 4, 1, 'Calificación', 'Hornos'),
(13, 4, 1, 'Calificación', 'Incubadoras'),
(14, 4, 1, 'Calificación', 'Muflas'),
(15, 4, 1, 'Calificación', 'Cámaras Frías'),
(16, 4, 1, 'Calificación', 'Refrigeradores'),
(17, 4, 1, 'Calificación', 'Congeladores'),
(18, 4, 1, 'Calificación', 'Baños María'),
(19, 4, 1, 'Calificación', 'Autoclave'),
(20, 5, 3, 'Presión', 'Medición a Interruptor'),
(21, 5, 3, 'Presión', 'Switch de Presión / Presostato'),
(22, 5, 3, 'Presión', 'Medición de Punto de Apertura a Válvula de Seguridad'),
(23, 5, 3, 'Presión', 'Ajuste a Válvula de Seguridad'),
(24, 5, 3, 'Presión', 'Ajuste a Manómetro'),
(25, 5, 3, 'Presión', 'Ajuste a Vacuómetro'),
(26, 5, 3, 'Presión', 'Ajuste a Manovacuómetro'),
(27, 5, 3, 'Presión', 'Ajuste a Registrador de Presión'),
(28, 6, 1, 'Temperatura', 'Ajuste a termómetro de lectura directa'),
(29, 6, 1, 'Temperatura', 'Ajuste a termómetro analógico'),
(30, 6, 1, 'Temperatura', 'Ajuste a termómetro digital'),
(31, 6, 1, 'Temperatura', 'Ajuste a termómetro bimetálico'),
(32, 6, 1, 'Temperatura', 'Ajuste a termómetro de bulbo'),
(33, 6, 1, 'Temperatura', 'Ajuste a termómetro de vástago'),
(34, 6, 1, 'Temperatura', 'Ajuste a registrador'),
(35, 6, 1, 'Temperatura', 'Ajuste a transmisor'),
(36, 6, 1, 'Temperatura', 'Ajuste a controlador'),
(37, 6, 1, 'Temperatura', 'Ajuste a indicador'),
(38, 6, 1, 'Temperatura', 'Ajuste a transductor'),
(39, 6, 1, 'Temperatura', 'Ajuste a registrador de temperatura analógico'),
(40, 7, 7, 'Conductividad', 'Medición a conductímetro de laboratorio'),
(41, 7, 7, 'Conductividad', 'Medición a conductímetro en línea'),
(42, 8, 4, 'PH', 'Medición a potenciómetro de laboratorio'),
(43, 8, 4, 'PH', 'Medición a potenciómetro en línea'),
(47, 9, 11, 'Turbidez', 'Medición a turbidimetro laboratorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serv_recoleccion`
--

CREATE TABLE `serv_recoleccion` (
  `id_recoleccion` int(11) NOT NULL,
  `recolección` int(20) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `serv_recoleccion`
--

INSERT INTO `serv_recoleccion` (`id_recoleccion`, `recolección`, `descripcion`) VALUES
(1, 500, 'servicio de recolección por paqueteria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todos_servicios`
--

CREATE TABLE `todos_servicios` (
  `id_servicio` int(11) NOT NULL,
  `id_magnitud` int(11) NOT NULL,
  `servicio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `todos_servicios`
--

INSERT INTO `todos_servicios` (`id_servicio`, `id_magnitud`, `servicio`) VALUES
(1, 1, 'Perfil Termico Baños'),
(2, 1, 'Perfil Termico'),
(3, 1, 'Validación'),
(5, 3, 'Presión'),
(6, 1, 'Temperatura'),
(7, 7, 'Conductividad'),
(8, 4, 'PH'),
(9, 11, 'Turbidez'),
(14, 1, 'servicio_nuevo'),
(15, 2, 'servicio_nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medidad`
--

CREATE TABLE `unidad_medidad` (
  `id_unidadMed` int(11) NOT NULL,
  `id_magnitud` int(11) DEFAULT NULL,
  `unidadMedida` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidad_medidad`
--

INSERT INTO `unidad_medidad` (`id_unidadMed`, `id_magnitud`, `unidadMedida`) VALUES
(1, 1, '°C'),
(2, 1, '°F'),
(3, 2, 't'),
(4, 2, 'kg'),
(5, 2, 'g'),
(6, 2, 'mg'),
(7, 2, 'µg'),
(8, 2, 'ng'),
(9, 3, 'Pa'),
(10, 3, 'bar'),
(11, 3, 'mbar'),
(12, 3, 'at'),
(13, 3, 'atm'),
(14, 3, 'torr'),
(15, 3, 'psi'),
(16, 3, 'inHG'),
(17, 3, 'cmHG'),
(18, 3, 'kPa'),
(19, 3, 'MPa'),
(20, 3, 'kg/cm^2'),
(21, 4, 'pH'),
(22, 5, '% HR'),
(23, 5, '°C'),
(24, 6, 'L'),
(25, 7, 'μS/cm'),
(26, 8, '°C'),
(27, 8, 'μV'),
(28, 8, 'Ω'),
(29, 8, 'mV'),
(30, 8, 'V'),
(31, 9, 'g/cm^3'),
(32, 10, 'nm'),
(33, 11, 'NTU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cve_usuario` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_bin NOT NULL,
  `correo` varchar(150) COLLATE utf8_bin NOT NULL,
  `password` varchar(350) COLLATE utf8_bin NOT NULL,
  `rol` varchar(25) COLLATE utf8_bin NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  `app_paterno` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `app_materno` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cve_usuario`, `nombre`, `correo`, `password`, `rol`, `estatus`, `app_paterno`, `app_materno`) VALUES
(1, 'Julio ', 'cjuliogarciagonzalez@gmail.com', '0a829e1a658d44b4116c57e27d84d532', 'administrador', 1, 'Garcia', 'Gonzáles'),
(17, 'Pablo', 'sindukom@hotmail.com', 'd138cd2fa31bc41bcfb0d13b7b451dce', 'proveedor', 1, 'Martinez', 'Ramirez'),
(20, 'Julian ', 'julian.aranda@inmensa.mx', '2a19cd1f31c266000f461e131d0ffc88', 'proveedor', 1, 'Aranda', 'Tobías'),
(21, 'Raquel ', 'atencionclientes@gottingenmetrologia.com', '304cb39de68466ea825128b233832a3b', 'proveedor', 1, 'Ceballos', 'Lopez'),
(23, 'Valeria', 'contacto@palmertec.mx', '0a829e1a658d44b4116c57e27d84d532', 'cliente', 1, 'García', 'Gónzalez'),
(30, 'prueba', 'prueba@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'proveedor', 1, 'prueba2', 'prueb'),
(31, 'Maria', 'mariijo90@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'cliente', 1, 'Castillo ', 'Hernandez'),
(32, 'Luis Eduardo', 'luiseduardotorres29@gmail.com', '823da4223e46ec671a10ea13d7823534', 'cliente', 1, 'Torres', 'Gutiérrez'),
(33, 'Luis', 'luiseduardotorres2911@gmail.com', '823da4223e46ec671a10ea13d7823534', 'proveedor', 1, 'Torres', 'Gutiérrez'),
(34, 'asdasd', 'asdasd@gmail.com', '7eb5e057911e0dcc29632413ddb07b4f', 'cliente', 1, 'asdasd', 'asdasd'),
(35, 'Luis ', 'luisc.villeda@calpro.com.mx', '0a829e1a658d44b4116c57e27d84d532', 'proveedor', 1, 'Villeda', 'CALPRO'),
(36, 'cesar', 'contacto@palmertec.com.mx', '0a829e1a658d44b4116c57e27d84d532', 'cliente', 1, 'García', 'Gónzalez'),
(37, 'MIGUEL GALILEO', 'miguel.trujillo18@icloud.com', 'b864b21b3931788f95f57fc7acbbaa07', 'cliente', 1, 'TRUJILLO ', 'PALACIOS'),
(38, 'Manue', 'Manuel502@gmail.com', '9b70a36910209a7a54fbbb222a506496', 'administrador', 1, 'Mimbrera ', 'Alpisar'),
(39, 'Jose', 'Jose091@gmail.com', '9b70a36910209a7a54fbbb222a506496', 'cliente', 1, 'Rodriguez', 'Morales'),
(40, 'Jaime', 'james.jordan_carmona@gmail.com', '0a829e1a658d44b4116c57e27d84d532', 'cliente', 1, 'Jordan', 'Carmona'),
(41, 'Juan', 'Juan99@gmail.com', '9b70a36910209a7a54fbbb222a506496', 'proveedor', 1, 'Lopez', 'Lopez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`cve_archivo`);

--
-- Indices de la tabla `archivo_informe`
--
ALTER TABLE `archivo_informe`
  ADD PRIMARY KEY (`cve_archivo_informe`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cve_cliente`),
  ADD KEY `cve_usuario` (`cve_usuario`);

--
-- Indices de la tabla `costos_mantenimiento`
--
ALTER TABLE `costos_mantenimiento`
  ADD PRIMARY KEY (`cve_costo_mantenimiento`);

--
-- Indices de la tabla `costos_proveedor`
--
ALTER TABLE `costos_proveedor`
  ADD PRIMARY KEY (`cve_costo_proveedor`);

--
-- Indices de la tabla `costos_servicios`
--
ALTER TABLE `costos_servicios`
  ADD PRIMARY KEY (`cve_costo_servicio`),
  ADD KEY `id_magnitud` (`id_magnitud`);

--
-- Indices de la tabla `costos_servicios_dif`
--
ALTER TABLE `costos_servicios_dif`
  ADD PRIMARY KEY (`cve_costo_servicio_dif`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id_detallePedido`),
  ADD KEY `cve_usuario` (`cve_usuario`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id_instrumento`),
  ADD KEY `id_magnitud` (`id_magnitud`);

--
-- Indices de la tabla `magnitud`
--
ALTER TABLE `magnitud`
  ADD PRIMARY KEY (`id_magnitud`);

--
-- Indices de la tabla `pedidocalibracion`
--
ALTER TABLE `pedidocalibracion`
  ADD PRIMARY KEY (`id_pedidoCalibracion`),
  ADD KEY `cve_usuario` (`cve_usuario`);

--
-- Indices de la tabla `pedidomantenimiento`
--
ALTER TABLE `pedidomantenimiento`
  ADD PRIMARY KEY (`id_pedidoMantenimiento`),
  ADD KEY `cve_usuario` (`cve_usuario`);

--
-- Indices de la tabla `pedidoservicio`
--
ALTER TABLE `pedidoservicio`
  ADD PRIMARY KEY (`id_pedidoServicio`),
  ADD KEY `cve_usuario` (`cve_usuario`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_magnitud` (`id_magnitud`);

--
-- Indices de la tabla `serviciosmantenimiento`
--
ALTER TABLE `serviciosmantenimiento`
  ADD PRIMARY KEY (`id_servicioM`);

--
-- Indices de la tabla `servicios_dif`
--
ALTER TABLE `servicios_dif`
  ADD PRIMARY KEY (`id_servdif`),
  ADD KEY `id_magnitud` (`id_magnitud`);

--
-- Indices de la tabla `serv_recoleccion`
--
ALTER TABLE `serv_recoleccion`
  ADD PRIMARY KEY (`id_recoleccion`);

--
-- Indices de la tabla `todos_servicios`
--
ALTER TABLE `todos_servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_magnitud` (`id_magnitud`);

--
-- Indices de la tabla `unidad_medidad`
--
ALTER TABLE `unidad_medidad`
  ADD PRIMARY KEY (`id_unidadMed`),
  ADD KEY `id_magnitud` (`id_magnitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cve_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `cve_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `archivo_informe`
--
ALTER TABLE `archivo_informe`
  MODIFY `cve_archivo_informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cve_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `costos_mantenimiento`
--
ALTER TABLE `costos_mantenimiento`
  MODIFY `cve_costo_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `costos_proveedor`
--
ALTER TABLE `costos_proveedor`
  MODIFY `cve_costo_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT de la tabla `costos_servicios`
--
ALTER TABLE `costos_servicios`
  MODIFY `cve_costo_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `costos_servicios_dif`
--
ALTER TABLE `costos_servicios_dif`
  MODIFY `cve_costo_servicio_dif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id_detallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_instrumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `magnitud`
--
ALTER TABLE `magnitud`
  MODIFY `id_magnitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidocalibracion`
--
ALTER TABLE `pedidocalibracion`
  MODIFY `id_pedidoCalibracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `pedidomantenimiento`
--
ALTER TABLE `pedidomantenimiento`
  MODIFY `id_pedidoMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `pedidoservicio`
--
ALTER TABLE `pedidoservicio`
  MODIFY `id_pedidoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `serviciosmantenimiento`
--
ALTER TABLE `serviciosmantenimiento`
  MODIFY `id_servicioM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `servicios_dif`
--
ALTER TABLE `servicios_dif`
  MODIFY `id_servdif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `serv_recoleccion`
--
ALTER TABLE `serv_recoleccion`
  MODIFY `id_recoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `todos_servicios`
--
ALTER TABLE `todos_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `unidad_medidad`
--
ALTER TABLE `unidad_medidad`
  MODIFY `id_unidadMed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cve_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`cve_usuario`) REFERENCES `usuarios` (`cve_usuario`);

--
-- Filtros para la tabla `costos_servicios`
--
ALTER TABLE `costos_servicios`
  ADD CONSTRAINT `costos_servicios_ibfk_1` FOREIGN KEY (`id_magnitud`) REFERENCES `magnitud` (`id_magnitud`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`cve_usuario`) REFERENCES `usuarios` (`cve_usuario`);

--
-- Filtros para la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD CONSTRAINT `instrumentos_ibfk_1` FOREIGN KEY (`id_magnitud`) REFERENCES `magnitud` (`id_magnitud`);

--
-- Filtros para la tabla `pedidocalibracion`
--
ALTER TABLE `pedidocalibracion`
  ADD CONSTRAINT `pedidocalibracion_ibfk_1` FOREIGN KEY (`cve_usuario`) REFERENCES `usuarios` (`cve_usuario`);

--
-- Filtros para la tabla `pedidoservicio`
--
ALTER TABLE `pedidoservicio`
  ADD CONSTRAINT `pedidoservicio_ibfk_1` FOREIGN KEY (`cve_usuario`) REFERENCES `usuarios` (`cve_usuario`);

--
-- Filtros para la tabla `unidad_medidad`
--
ALTER TABLE `unidad_medidad`
  ADD CONSTRAINT `unidad_medidad_ibfk_1` FOREIGN KEY (`id_magnitud`) REFERENCES `magnitud` (`id_magnitud`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
