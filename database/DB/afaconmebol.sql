-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2024 a las 00:31:28
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `afaconmebol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_calendar`
--

CREATE TABLE `back_calendar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fase` int(11) DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL,
  `mes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semana` int(11) DEFAULT NULL,
  `iniciada` tinyint(1) NOT NULL DEFAULT 0,
  `procesado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_calendar`
--

INSERT INTO `back_calendar` (`id`, `action`, `copas`, `fase`, `fecha`, `mes`, `semana`, `iniciada`, `procesado`, `created_at`, `updated_at`) VALUES
(1, 'INICIO', '[]', NULL, NULL, NULL, NULL, 0, 1, NULL, '2024-10-25 19:30:19'),
(2, 'SORTEO', '[\"recopa\"]', NULL, NULL, 'marzo', 2, 0, 1, NULL, '2024-11-03 04:28:48'),
(3, 'FECHA', '[\"recopa\"]', 5, 1, 'marzo', 3, 1, 1, NULL, '2024-11-21 03:12:00'),
(4, 'FECHA', '[\"recopa\"]', 5, 2, 'marzo', 4, 1, 1, NULL, '2024-11-24 16:41:37'),
(5, 'SORTEO', '[\"afa\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'marzo', 5, 0, 0, NULL, '2024-10-23 14:27:14'),
(6, 'FECHA', '[\"afa\"]', -2, 1, 'abril', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(7, 'FECHA', '[\"sudamericana\"]', 0, 1, 'abril', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(8, 'FECHA', '[\"afa\"]', -2, 2, 'abril', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(9, 'FECHA', '[\"libertadores\"]', 0, 1, 'abril', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(10, 'FECHA', '[\"afa\"]', -2, 3, 'abril', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(11, 'FECHA', '[\"sudamericana\"]', 0, 2, 'abril', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(12, 'FECHA', '[\"afa\"]', -2, 4, 'abril', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(13, 'FECHA', '[\"libertadores\"]', 0, 2, 'abril', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(14, 'FECHA', '[\"afa\"]', -2, 5, 'mayo', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(15, 'FECHA', '[\"sudamericana\"]', 0, 3, 'mayo', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(16, 'FECHA', '[\"afa\"]', -2, 6, 'mayo', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(17, 'FECHA', '[\"libertadores\"]', 0, 3, 'mayo', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(18, 'SORTEO', '[\"afa\"]', NULL, NULL, 'mayo', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(19, 'FECHA', '[\"afa\"]', -1, 1, 'mayo', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(20, 'FECHA', '[\"sudamericana\"]', 0, 4, 'mayo', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(21, 'FECHA', '[\"afa\"]', -1, 2, 'mayo', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(22, 'FECHA', '[\"libertadores\"]', 0, 4, 'mayo', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(23, 'FECHA', '[\"afa\"]', -1, 3, 'junio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(24, 'FECHA', '[\"sudamericana\"]', 0, 5, 'junio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(25, 'FECHA', '[\"afa\"]', -1, 4, 'junio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(26, 'FECHA', '[\"libertadores\"]', 0, 5, 'junio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(27, 'FECHA', '[\"afa\"]', -1, 5, 'junio', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(28, 'FECHA', '[\"sudamericana\"]', 0, 6, 'junio', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(29, 'FECHA', '[\"afa\"]', -1, 6, 'abril', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(30, 'FECHA', '[\"libertadores\"]', 0, 6, 'junio', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(31, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'julio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(32, 'FECHA', '[\"argentina\"]', 1, 1, 'julio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(33, 'FECHA', '[\"sudamericana\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(34, 'FECHA', '[\"libertadores\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(35, 'FECHA', '[\"argentina\"]', 1, 2, 'julio', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(36, 'FECHA', '[\"sudamericana\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(37, 'FECHA', '[\"libertadores\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(38, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'agosto', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(39, 'FECHA', '[\"afa\"]', 0, 1, 'agosto', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(40, 'FECHA', '[\"argentina\"]', 2, 1, 'agosto', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(41, 'FECHA', '[\"afa\"]', 0, 2, 'agosto', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(42, 'FECHA', '[\"sudamericana\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(43, 'FECHA', '[\"libertadores\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(44, 'FECHA', '[\"afa\"]', 0, 3, 'agosto', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(45, 'FECHA', '[\"argentina\"]', 2, 2, 'agosto', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(46, 'FECHA', '[\"afa\"]', 0, 4, 'agosto', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(47, 'FECHA', '[\"sudamericana\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(48, 'FECHA', '[\"libertadores\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(49, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'septiembre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(50, 'FECHA', '[\"afa\"]', 0, 5, 'septiembre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(51, 'FECHA', '[\"argentina\"]', 3, 1, 'septiembre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(52, 'FECHA', '[\"afa\"]', 0, 6, 'septiembre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(53, 'FECHA', '[\"sudamericana\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(54, 'FECHA', '[\"libertadores\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(55, 'SORTEO', '[\"afa\"]', NULL, NULL, 'septiembre', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(56, 'FECHA', '[\"afa\"]', 1, 1, 'septiembre', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(57, 'FECHA', '[\"argentina\"]', 3, 2, 'septiembre', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(58, 'FECHA', '[\"afa\"]', 1, 2, 'septiembre', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(59, 'FECHA', '[\"sudamericana\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(60, 'FECHA', '[\"libertadores\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(61, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'octubre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(62, 'FECHA', '[\"afa\"]', 1, 3, 'octubre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(63, 'FECHA', '[\"argentina\"]', 4, 1, 'octubre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(64, 'FECHA', '[\"afa\"]', 1, 4, 'octubre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(65, 'FECHA', '[\"sudamericana\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(66, 'FECHA', '[\"libertadores\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(68, 'FECHA', '[\"afa\"]', 1, 5, 'octubre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(69, 'FECHA', '[\"argentina\"]', 4, 2, 'octubre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(70, 'FECHA', '[\"afa\"]', 1, 6, 'octubre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(71, 'FECHA', '[\"sudamericana\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(72, 'FECHA', '[\"libertadores\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(73, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(74, 'FECHA', '[\"afa\"]', 2, 1, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(75, 'FECHA', '[\"afa\"]', 2, 2, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(76, 'FECHA', '[\"argentina\"]', 5, 1, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(77, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(78, 'FECHA', '[\"afa\"]', 3, 1, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(79, 'FECHA', '[\"afa\"]', 3, 2, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(80, 'FECHA', '[\"sudamericana\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(81, 'FECHA', '[\"libertadores\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(82, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(83, 'FECHA', '[\"afa\"]', 4, 1, 'noviembre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(84, 'FECHA', '[\"argentina\"]', 5, 2, 'noviembre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(85, 'FECHA', '[\"afa\"]', 4, 2, 'noviembre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(86, 'FECHA', '[\"sudamericana\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(87, 'FECHA', '[\"libertadores\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(88, 'SORTEO', '[\"afa\"]', NULL, NULL, 'diciembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(89, 'FECHA', '[\"afa\"]', 5, 1, 'diciembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(90, 'FECHA', '[\"afa\"]', 5, 2, 'diciembre', 2, 0, 0, NULL, '2024-10-23 14:27:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_colores`
--

CREATE TABLE `back_colores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rgb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_combinado` tinyint(1) NOT NULL DEFAULT 0,
  `a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `similares` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_colores`
--

INSERT INTO `back_colores` (`id`, `name`, `rgb`, `is_combinado`, `a`, `b`, `similares`, `created_at`, `updated_at`) VALUES
(1, 'rojo', '255,0,0', 0, NULL, NULL, '[5,9,12,13,19,20,23,40,41,24,25,26,34]', '2023-08-12 02:57:16', '2023-08-25 03:24:45'),
(2, 'azul', '0,0,255', 0, NULL, NULL, '[3,6,7,10,11,12,23,27,28,32,38,39,41]', '2023-08-12 02:57:16', '2023-08-13 17:36:25'),
(3, 'verde', '0,102,0', 0, NULL, NULL, '[2,6,7,10,11,19,25,32,35,36,37,38,39]', '2023-08-12 02:57:16', '2023-08-13 05:32:37'),
(4, 'amarillo', '245,184,0', 0, NULL, NULL, '[5,8,15,17,26,27,30,31,35]', '2023-08-12 02:57:16', '2023-08-13 05:33:33'),
(5, 'naranja', '255,102,0', 0, NULL, NULL, '[1,4,9,17,26,30,34]', '2023-08-12 02:57:16', '2023-08-13 05:34:25'),
(6, 'celeste', '0,102,255', 0, NULL, NULL, '[2,3,7,16,18,28,29]', '2023-08-12 02:57:16', '2023-08-13 05:35:21'),
(7, 'verdeclaro', '102,204,0', 0, NULL, NULL, '[3,6,16,19,25,35,36,38,39]', '2023-08-12 02:57:16', '2023-08-13 05:36:13'),
(8, 'crema', '255,255,153', 0, NULL, NULL, '[4,15,16,17,18,26,27,30,31,35,24,29]', '2023-08-12 02:57:16', '2023-08-20 02:50:26'),
(9, 'rosa', '255,102,153', 0, NULL, NULL, '[1,5,24,34]', '2023-08-12 02:57:16', '2023-09-21 19:48:29'),
(10, 'azuloscuro', '0,0,102', 0, NULL, NULL, '[2,11,12,14,20,21,23,27,28,31,32,37,38,39,40]', '2023-08-12 02:57:16', '2023-08-13 05:38:46'),
(11, 'verdeoscuro', '0,51,0', 0, NULL, NULL, '[2,3,10,12,14,19,25,32,37,38,39]', '2023-08-12 02:57:16', '2023-08-13 05:39:37'),
(12, 'violeta', '102,0,153', 0, NULL, NULL, '[1,2,10,11,21,23,25,32,41]', '2023-08-12 02:57:16', '2023-08-13 05:40:26'),
(13, 'marron', '102,51,0', 0, NULL, NULL, '[1,5,11,17,19,20,21,25,30,34,40]', '2023-08-12 02:57:16', '2023-08-13 05:41:20'),
(14, 'negro', '0,0,0', 0, NULL, NULL, '[10,11,21,31,32,33,34,37]', '2023-08-12 02:57:16', '2023-08-13 05:41:59'),
(15, 'blanco', '255,255,255', 0, NULL, NULL, '[4,8,18,24,28,29,33,36]', '2023-08-12 02:57:16', '2023-08-13 05:42:34'),
(16, 'gris', '153,153,153', 0, NULL, NULL, '[6,7]', '2023-08-12 02:57:16', '2023-08-13 05:43:12'),
(17, 'marronclaro', '204,153,0', 0, NULL, NULL, '[4,5,13,19,26,30,31]', '2023-08-12 02:57:16', '2023-08-13 05:44:14'),
(18, 'cielo', '204,255,255', 0, NULL, NULL, '[6,8,15,16,29]', '2023-08-12 02:57:16', '2023-08-13 05:44:49'),
(19, 'morado', '102,102,0', 0, NULL, NULL, '[1,3,5,7,11,13,17,20,25,37,40]', '2023-08-12 02:57:16', '2023-08-13 05:45:36'),
(20, 'grana', '102,0,51', 0, NULL, NULL, '[1,10,11,12,13,19,21,23,25,30,34,40]', '2023-08-12 02:57:16', '2023-08-13 05:46:37'),
(21, 'marronoscuro', '45,0,0', 0, NULL, NULL, '[1,10,11,13,14,19,20,25,30,31,32,34,37,40]', '2023-08-12 02:57:16', '2023-08-13 05:47:57'),
(22, 'piel', '255,204,153', 0, NULL, NULL, '[]', '2023-08-12 02:57:16', '2023-08-12 02:57:16'),
(23, 'rojoazul', '0,0,0', 1, '255,0,0', '0,0,255', '[1,2,5,10,12,19,20,21,25,32,34,38,39,40]', '2023-08-12 02:57:16', '2023-08-13 17:11:05'),
(24, 'rojoblanco', '0,0,0', 1, '255,0,0', '255,255,255', '[1,9,15,26]', '2023-08-12 02:57:16', '2023-08-13 17:11:55'),
(25, 'rojoverde', '0,0,0', 1, '255,0,0', '0,102,0', '[1,3,11,12,19,20,21,23,34,37,38,39,40]', '2023-08-12 02:57:16', '2023-08-13 17:12:56'),
(26, 'rojoamarillo', '0,0,0', 1, '255,0,0', '245,184,0', '[1,4,5,8,9,17,24,40]', '2023-08-12 02:57:16', '2023-08-13 17:14:03'),
(27, 'azulamarillo', '0,0,0', 1, '0,0,255', '245,184,0', '[2,4,10,17,28,31,35,36,39]', '2023-08-12 02:57:16', '2023-08-13 17:15:03'),
(28, 'azulblanco', '0,0,0', 1, '0,0,255', '255,255,255', '[2,10,27,29,33,36]', '2023-08-12 02:57:16', '2023-08-13 17:16:04'),
(29, 'celesteblanco', '0,0,0', 1, '0,102,255', '255,255,255', '[6,15,16,18,28,36]', '2023-08-12 02:57:16', '2023-08-13 17:16:58'),
(30, 'marronamarillo', '0,0,0', 1, '102,51,0', '245,184,0', '[4,5,8,13,17,19,26,31,33,40]', '2023-08-12 02:57:16', '2023-08-13 17:17:43'),
(31, 'negroamarillo', '0,0,0', 1, '0,0,0', '245,184,0', '[4,8,14,17,30,33]', '2023-08-12 02:57:16', '2023-08-13 17:18:32'),
(32, 'negroazul', '0,0,0', 1, '0,0,0', '0,0,255', '[2,10,11,12,14,21,37,38,39]', '2023-08-12 02:57:16', '2023-08-13 17:19:18'),
(33, 'negroblanco', '0,0,0', 1, '0,0,0', '255,255,255', '[8,10,11,14,15,16,18,21,27,28,30,31,36,37,38]', '2023-08-12 02:57:16', '2023-08-13 17:28:56'),
(34, 'negrorojo', '0,0,0', 1, '0,0,0', '255,0,0', '[1,5,12,13,14,19,20,21,23,25,30,40]', '2023-08-12 02:57:16', '2023-08-13 17:29:55'),
(35, 'verdeamarillo', '0,0,0', 1, '0,102,0', '245,184,0', '[3,4,7,8,11,17,19,27,28,36,39]', '2023-08-12 02:57:16', '2023-08-13 17:30:50'),
(36, 'verdeblanco', '0,0,0', 1, '0,102,0', '255,255,255', '[3,6,7,15,18,28,29,35]', '2023-08-12 02:57:16', '2023-08-13 17:31:50'),
(37, 'verdenegro', '0,0,0', 1, '0,102,0', '0,0,0', '[3,10,11,14,19,20,21,38,39]', '2023-08-12 02:57:16', '2023-08-13 17:32:43'),
(38, 'azulverde', '0,0,0', 1, '0,0,255', '0,102,0', '[2,3,6,7,10,11,12,19,32,37,39]', '2023-08-12 02:57:16', '2023-08-13 17:33:30'),
(39, 'turquesa', '0,113,110', 0, NULL, NULL, '[2,3,6,7,10,11,12,19,32,38]', '2023-08-12 02:57:16', '2023-08-13 17:34:11'),
(40, 'bordo', '107,0,0', 0, NULL, NULL, '[1,12,13,19,20,21,23,34]', '2023-08-12 02:57:16', '2023-08-13 17:35:03'),
(41, 'negroceleste', '190,90,240', 1, '0,0,0', '0,102,255', '[3,10,11,14,23,27,32,37,38,2,6,39]', '2023-08-12 02:57:16', '2023-08-17 02:25:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_cupos_afa`
--

CREATE TABLE `back_cupos_afa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_cupos_afa`
--

INSERT INTO `back_cupos_afa` (`id`, `equipo_id`, `name`, `copa`, `pos`, `created_at`, `updated_at`) VALUES
(1, 21, 'river plate', 'libertadores', 1, NULL, NULL),
(2, 22, 'boca juniors', 'libertadores', 2, NULL, NULL),
(3, 23, 'san lorenzo', 'libertadores', 3, NULL, NULL),
(4, 24, 'velez sarsfield', 'libertadores', 4, NULL, NULL),
(5, 25, 'independiente', 'libertadores', 5, NULL, NULL),
(6, 26, 'racing club', 'libertadores', 6, NULL, NULL),
(7, 29, 'huracan', 'libertadores', 7, NULL, NULL),
(8, 30, 'ferrocarril oeste', 'libertadores', 8, NULL, NULL),
(9, 28, 'rosario central', 'sudamericana', 1, NULL, NULL),
(10, 27, 'newells old boys', 'sudamericana', 2, NULL, NULL),
(11, 31, 'estudiantes la plata', 'sudamericana', 3, NULL, NULL),
(12, 32, 'gimnasia la plata', 'sudamericana', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_equipos`
--

CREATE TABLE `back_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `liga_id` bigint(20) UNSIGNED DEFAULT NULL,
  `liga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a` bigint(20) UNSIGNED DEFAULT NULL,
  `b` bigint(20) UNSIGNED DEFAULT NULL,
  `c` bigint(20) UNSIGNED DEFAULT NULL,
  `combinado` bigint(20) UNSIGNED DEFAULT NULL,
  `alternativo` bigint(20) UNSIGNED DEFAULT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clasico_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estructura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cesped` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `pts` int(11) NOT NULL DEFAULT 0,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos_clasificacion` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_equipos`
--

INSERT INTO `back_equipos` (`id`, `liga_id`, `liga`, `name`, `a`, `b`, `c`, `combinado`, `alternativo`, `directory`, `clasico_id`, `estructura`, `cesped`, `orden`, `nivel`, `pts`, `copa`, `pos_clasificacion`, `created_at`, `updated_at`) VALUES
(1, 1, 'brasil', 'san pablo fc', 15, 1, 14, 15, 34, 'ligas/brasil/equipos/san_pablo_fc/', NULL, 'grande', 'circular', 1, 10, 58, NULL, 1, NULL, '2024-10-25 19:30:17'),
(2, 1, 'brasil', 'cruzeiro', 2, 15, 15, 2, 15, 'ligas/brasil/equipos/cruzeiro/', NULL, 'grande', 'cuadriculada', 2, 10, 58, 'libertadores', 4, NULL, '2024-10-25 19:30:18'),
(3, 1, 'brasil', 'flamengo', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/flamengo/', NULL, 'grande', 'rayada', 3, 9, 58, 'libertadores', 5, NULL, '2024-10-25 19:30:18'),
(4, 1, 'brasil', 'gremio', 6, 14, 15, 41, 15, 'ligas/brasil/equipos/gremio/', NULL, 'mediana', 'rayada', 4, 9, 60, 'libertadores', 2, NULL, '2024-10-25 19:30:18'),
(5, 1, 'brasil', 'palmeiras', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/palmeiras/', NULL, 'mediana', 'circular', 5, 8, 54, 'libertadores', 8, NULL, '2024-10-25 19:30:18'),
(6, 1, 'brasil', 'corinthians', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/corinthians/', NULL, 'cuadrada', 'rayada', 6, 8, 52, 'sudamericana', 10, NULL, '2024-10-25 19:30:18'),
(7, 1, 'brasil', 'santos fc', 15, 14, 14, 15, 33, 'ligas/brasil/equipos/santos_fc/', NULL, 'mediana', 'romboide', 7, 7, 47, 'sudamericana', 12, NULL, '2024-10-25 19:30:18'),
(8, 1, 'brasil', 'vasco da gama', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/vasco_da_gama/', NULL, 'grande', 'romboide', 8, 7, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:18'),
(9, 1, 'brasil', 'fluminense', 20, 3, 15, 25, 15, 'ligas/brasil/equipos/fluminense/', NULL, 'mediana', 'rayada', 9, 6, 56, 'libertadores', 6, NULL, '2024-10-25 19:30:18'),
(10, 1, 'brasil', 'internacional', 1, 15, 15, 1, 15, 'ligas/brasil/equipos/internacional/', NULL, 'grande', 'cuadriculada', 10, 6, 56, 'libertadores', 7, NULL, '2024-10-25 19:30:18'),
(11, 1, 'brasil', 'atletico mineiro', 14, 15, 15, 33, 15, 'ligas/brasil/equipos/atletico_mineiro/', NULL, 'grande', 'cuadriculada', 11, 5, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:18'),
(12, 1, 'brasil', 'botafogo', 14, 15, 15, 33, 16, 'ligas/brasil/equipos/botafogo/', NULL, 'grande', 'lisa', 12, 5, 52, 'sudamericana', 11, NULL, '2024-10-25 19:30:18'),
(13, 1, 'brasil', 'paranaense', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/paranaense/', NULL, 'cuadrada', 'cuadriculada', 13, 4, 47, NULL, 100, NULL, '2024-10-25 19:30:17'),
(14, 1, 'brasil', 'goias', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/goias/', NULL, 'mediana', 'cuadriculada', 14, 4, 47, NULL, 100, NULL, '2024-10-25 19:30:17'),
(15, 1, 'brasil', 'bahia', 15, 2, 1, 15, 23, 'ligas/brasil/equipos/bahia/', NULL, 'grande', 'rayada', 15, 3, 46, NULL, 100, NULL, '2024-10-25 19:30:17'),
(16, 1, 'brasil', 'chapecoense', 3, 15, 7, 3, 15, 'ligas/brasil/equipos/chapecoense/', NULL, 'cuadrada', 'romboide', 16, 3, 53, 'sudamericana', 9, NULL, '2024-10-25 19:30:18'),
(17, 1, 'brasil', 'coritiba', 15, 3, 3, 15, 36, 'ligas/brasil/equipos/coritiba/', NULL, 'grande', 'cuadriculada', 17, 2, 38, NULL, 100, NULL, '2024-10-25 19:30:17'),
(18, 1, 'brasil', 'ponte preta', 15, 14, 14, 33, 14, 'ligas/brasil/equipos/ponte_preta/', NULL, 'grande', 'lisa', 18, 2, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(19, 1, 'brasil', 'avai', 2, 15, 15, 28, 15, 'ligas/brasil/equipos/avai/', NULL, 'grande', 'romboide', 19, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:17'),
(20, 1, 'brasil', 'portuguesa', 1, 3, 15, 25, 15, 'ligas/brasil/equipos/portuguesa/', NULL, 'mediana', 'cuadriculada', 20, 1, 21, NULL, 100, NULL, '2024-10-25 19:30:17'),
(21, 2, 'argentina', 'river plate', 15, 1, 14, 15, 14, 'ligas/argentina/equipos/river_plate/', 22, 'grande', 'rayada', 1, 10, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(22, 2, 'argentina', 'boca juniors', 2, 4, 4, 2, 15, 'ligas/argentina/equipos/boca_juniors/', 21, 'mediana', 'rayada', 2, 10, 58, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(23, 2, 'argentina', 'san lorenzo', 2, 1, 1, 23, 15, 'ligas/argentina/equipos/san_lorenzo/', 29, 'mediana', 'cuadriculada', 3, 10, 56, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(24, 2, 'argentina', 'velez sarsfield', 15, 2, 2, 15, 2, 'ligas/argentina/equipos/velez_sarsfield/', 30, 'cuadrada', 'rayada', 4, 10, 60, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(25, 2, 'argentina', 'independiente', 1, 15, 10, 1, 15, 'ligas/argentina/equipos/independiente/', 26, 'cuadrada', 'cuadriculada', 5, 9, 58, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(26, 2, 'argentina', 'racing club', 6, 15, 10, 29, 10, 'ligas/argentina/equipos/racing_club/', 25, 'grande', 'cuadriculada', 6, 9, 54, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(27, 2, 'argentina', 'newells old boys', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/newells_old_boys/', 28, 'cuadrada', 'cuadriculada', 7, 9, 58, 'sudamericana', 10, NULL, '2024-10-25 19:30:19'),
(28, 2, 'argentina', 'rosario central', 4, 2, 2, 27, 15, 'ligas/argentina/equipos/rosario_central/', 27, 'mediana', 'romboide', 8, 9, 49, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(29, 2, 'argentina', 'huracan', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/huracan/', 23, 'mediana', 'lisa', 9, 8, 60, 'libertadores', 7, NULL, '2024-10-25 19:30:19'),
(30, 2, 'argentina', 'ferrocarril oeste', 3, 15, 12, 3, 15, 'ligas/argentina/equipos/ferrocarril_oeste/', 24, 'cuadrada', 'romboide', 10, 8, 54, 'libertadores', 8, NULL, '2024-10-25 19:30:19'),
(31, 2, 'argentina', 'estudiantes la plata', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/estudiantes_la_plata/', 32, 'grande', 'circular', 11, 8, 48, 'sudamericana', 11, NULL, '2024-10-25 19:30:19'),
(32, 2, 'argentina', 'gimnasia la plata', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/gimnasia_la_plata/', 31, 'grande', 'circular', 12, 8, 58, 'sudamericana', 12, NULL, '2024-10-25 19:30:19'),
(33, 2, 'argentina', 'lanus', 20, 15, 15, 20, 15, 'ligas/argentina/equipos/lanus/', 34, 'cuadrada', 'cuadriculada', 13, 7, 56, NULL, 11, NULL, '2024-10-25 19:30:18'),
(34, 2, 'argentina', 'banfield', 15, 3, 5, 15, 5, 'ligas/argentina/equipos/banfield/', 33, 'chica', 'rayada', 14, 7, 56, NULL, 9, NULL, '2024-10-25 19:30:18'),
(35, 2, 'argentina', 'argentinos juniors', 1, 15, 2, 1, 15, 'ligas/argentina/equipos/argentinos_juniors/', 53, 'cuadrada', 'lisa', 15, 7, 58, NULL, 3, NULL, '2024-10-25 19:30:18'),
(36, 2, 'argentina', 'godoy cruz', 2, 15, 15, 2, 15, 'ligas/argentina/equipos/godoy_cruz/', 56, 'grande', 'circular', 16, 7, 58, NULL, 16, NULL, '2024-10-25 19:30:18'),
(37, 2, 'argentina', 'colon', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/colon/', 38, 'chica', 'circular', 17, 6, 55, NULL, 2, NULL, '2024-10-25 19:30:18'),
(38, 2, 'argentina', 'union', 1, 15, 2, 24, 2, 'ligas/argentina/equipos/union/', 37, 'chica', 'cuadriculada', 18, 6, 58, NULL, 18, NULL, '2024-10-25 19:30:18'),
(39, 2, 'argentina', 'talleres cordoba', 10, 15, 20, 28, 20, 'ligas/argentina/equipos/talleres_cordoba/', 41, 'grande', 'romboide', 19, 6, 60, NULL, 19, NULL, '2024-10-25 19:30:18'),
(40, 2, 'argentina', 'instituto cordoba', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/instituto_cordoba/', 65, 'grande', 'romboide', 20, 6, 61, NULL, 1, NULL, '2024-10-25 19:30:18'),
(41, 2, 'argentina', 'belgrano cordoba', 6, 14, 14, 6, 15, 'ligas/argentina/equipos/belgrano_cordoba/', 39, 'grande', 'romboide', 21, 5, 61, NULL, 12, NULL, '2024-10-25 19:30:18'),
(42, 2, 'argentina', 'atletico rafaela', 6, 15, 4, 29, 2, 'ligas/argentina/equipos/atletico_rafaela/', 49, 'cuadrada', 'cuadriculada', 22, 5, 59, NULL, 22, NULL, '2024-10-25 19:30:18'),
(43, 2, 'argentina', 'quilmes', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/quilmes/', 44, 'cuadrada', 'rayada', 23, 5, 62, NULL, 23, NULL, '2024-10-25 19:30:18'),
(44, 2, 'argentina', 'arsenal', 6, 1, 15, 6, 15, 'ligas/argentina/equipos/arsenal/', 43, 'chica', 'lisa', 24, 5, 58, NULL, 5, NULL, '2024-10-25 19:30:18'),
(45, 2, 'argentina', 'aldosivi', 4, 3, 14, 35, 15, 'ligas/argentina/equipos/aldosivi/', 48, 'grande', 'circular', 25, 4, 57, NULL, 25, NULL, '2024-10-25 19:30:18'),
(46, 2, 'argentina', 'defensa y justicia', 4, 3, 3, 4, 3, 'ligas/argentina/equipos/defensa_y_justicia/', 55, 'chica', 'lisa', 26, 4, 48, NULL, 6, NULL, '2024-10-25 19:30:18'),
(47, 2, 'argentina', 'tigre', 2, 1, 1, 2, 15, 'ligas/argentina/equipos/tigre/', 63, 'chica', 'romboide', 27, 4, 60, NULL, 8, NULL, '2024-10-25 19:30:18'),
(48, 2, 'argentina', 'olimpo', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/olimpo/', 45, 'chica', 'rayada', 28, 4, 60, NULL, 28, NULL, '2024-10-25 19:30:18'),
(49, 2, 'argentina', 'san martin san juan', 3, 14, 14, 37, 15, 'ligas/argentina/equipos/san_martin_san_juan/', 42, 'cuadrada', 'rayada', 29, 3, 50, NULL, 5, NULL, '2024-10-25 19:30:18'),
(50, 2, 'argentina', 'all boys', 15, 14, 14, 15, 14, 'ligas/argentina/equipos/all_boys/', 52, 'cuadrada', 'cuadriculada', 30, 3, 54, NULL, 10, NULL, '2024-10-25 19:30:18'),
(51, 2, 'argentina', 'chacarita juniors', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/chacarita_juniors/', 59, 'cuadrada', 'cuadriculada', 31, 3, 43, NULL, 31, NULL, '2024-10-25 19:30:18'),
(52, 2, 'argentina', 'nueva chicago', 3, 14, 15, 37, 15, 'ligas/argentina/equipos/nueva_chicago/', 50, 'chica', 'circular', 32, 3, 54, NULL, 32, NULL, '2024-10-25 19:30:18'),
(53, 2, 'argentina', 'platense', 15, 13, 13, 15, 13, 'ligas/argentina/equipos/platense/', 35, 'chica', 'lisa', 33, 3, 49, NULL, 4, NULL, '2024-10-25 19:30:18'),
(54, 2, 'argentina', 'boca unidos', 4, 1, 10, 26, 15, 'ligas/argentina/equipos/boca_unidos/', 61, 'chica', 'lisa', 34, 2, 48, NULL, 34, NULL, '2024-10-25 19:30:18'),
(55, 2, 'argentina', 'temperley', 6, 15, 15, 6, 15, 'ligas/argentina/equipos/temperley/', 46, 'chica', 'romboide', 35, 2, 44, NULL, 7, NULL, '2024-10-25 19:30:18'),
(56, 2, 'argentina', 'independiente rivadavia', 10, 15, 15, 10, 15, 'ligas/argentina/equipos/independiente_rivadavia/', 36, 'grande', 'circular', 36, 2, 56, NULL, 36, NULL, '2024-10-25 19:30:18'),
(57, 2, 'argentina', 'gimnasia jujuy', 15, 6, 10, 29, 2, 'ligas/argentina/equipos/gimnasia_jujuy/', 68, 'grande', 'romboide', 37, 2, 38, NULL, 8, NULL, '2024-10-25 19:30:18'),
(58, 2, 'argentina', 'atletico tucuman', 6, 15, 4, 29, 32, 'ligas/argentina/equipos/atletico_tucuman/', 62, 'chica', 'cuadriculada', 38, 2, 50, NULL, 38, NULL, '2024-10-25 19:30:18'),
(59, 2, 'argentina', 'atlanta', 2, 4, 4, 27, 15, 'ligas/argentina/equipos/atlanta/', 51, 'cuadrada', 'lisa', 39, 1, 38, NULL, 2, NULL, '2024-10-25 19:30:18'),
(60, 2, 'argentina', 'sarmiento', 3, 15, 15, 3, 15, 'ligas/argentina/equipos/sarmiento/', 66, 'chica', 'rayada', 40, 1, 27, NULL, 40, NULL, '2024-10-25 19:30:18'),
(61, 2, 'argentina', 'patronato', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/patronato/', 54, 'chica', 'lisa', 41, 1, 29, NULL, 41, NULL, '2024-10-25 19:30:18'),
(62, 2, 'argentina', 'san martin tucuman', 1, 15, 15, 24, 15, 'ligas/argentina/equipos/san_martin_tucuman/', 58, 'chica', 'romboide', 42, 1, 23, NULL, 42, NULL, '2024-10-25 19:30:18'),
(63, 2, 'argentina', 'almagro', 6, 14, 15, 41, 15, 'ligas/argentina/equipos/almagro/', 47, 'chica', 'lisa', 43, 1, 26, NULL, 43, NULL, '2024-10-25 19:30:18'),
(64, 2, 'argentina', 'almirante brown', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/almirante_brown/', 67, 'chica', 'rayada', 44, 1, 22, NULL, 44, NULL, '2024-10-25 19:30:18'),
(65, 2, 'argentina', 'racing cordoba', 6, 15, 15, 29, 2, 'ligas/argentina/equipos/racing_cordoba/', 40, 'grande', 'romboide', 45, 1, 33, NULL, 45, NULL, '2024-10-25 19:30:18'),
(66, 2, 'argentina', 'douglas haid', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/douglas_haid/', 60, 'chica', 'romboide', 46, 1, 31, NULL, 46, NULL, '2024-10-25 19:30:18'),
(67, 2, 'argentina', 'deportivo moron', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/deportivo_moron/', 64, 'chica', 'lisa', 47, 1, 18, NULL, 3, NULL, '2024-10-25 19:30:18'),
(68, 2, 'argentina', 'crucero del norte', 4, 5, 2, 4, 2, 'ligas/argentina/equipos/crucero_del_norte/', 57, 'chica', 'lisa', 48, 1, 23, NULL, 48, NULL, '2024-10-25 19:30:18'),
(69, 3, 'colombia', 'atletico nacional', 3, 15, 15, 36, 14, 'ligas/colombia/equipos/atletico_nacional/', NULL, 'grande', 'rayada', 1, 10, 58, NULL, 2, NULL, '2024-10-25 19:30:18'),
(70, 3, 'colombia', 'america', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/america/', NULL, 'grande', 'cuadriculada', 2, 10, 54, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(71, 3, 'colombia', 'deportivo cali', 3, 15, 15, 3, 15, 'ligas/colombia/equipos/deportivo_cali/', NULL, 'mediana', 'rayada', 3, 9, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(72, 3, 'colombia', 'junior', 1, 15, 10, 24, 10, 'ligas/colombia/equipos/junior/', NULL, 'grande', 'cuadriculada', 4, 9, 58, 'libertadores', 7, NULL, '2024-10-25 19:30:19'),
(73, 3, 'colombia', 'independiente medellin', 1, 2, 15, 1, 15, 'ligas/colombia/equipos/independiente_medellin/', NULL, 'grande', 'cuadriculada', 5, 8, 60, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(74, 3, 'colombia', 'independiente santa fe', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/independiente_santa_fe/', NULL, 'mediana', 'romboide', 6, 8, 62, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(75, 3, 'colombia', 'millonarios', 2, 15, 15, 2, 15, 'ligas/colombia/equipos/millonarios/', NULL, 'mediana', 'cuadriculada', 7, 7, 52, 'sudamericana', 10, NULL, '2024-10-25 19:30:19'),
(76, 3, 'colombia', 'deportes tolima', 4, 1, 1, 26, 15, 'ligas/colombia/equipos/deportes_tolima/', NULL, 'grande', 'circular', 8, 7, 62, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(77, 3, 'colombia', 'once caldas', 15, 3, 1, 15, 14, 'ligas/colombia/equipos/once_caldas/', NULL, 'grande', 'circular', 9, 6, 49, NULL, 100, NULL, '2024-10-25 19:30:19'),
(78, 3, 'colombia', 'cucuta deportivo', 1, 14, 14, 34, 15, 'ligas/colombia/equipos/cucuta_deportivo/', NULL, 'grande', 'romboide', 10, 6, 62, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(79, 3, 'colombia', 'atletico huila', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_huila/', NULL, 'grande', 'cuadriculada', 11, 5, 59, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(80, 3, 'colombia', 'boyaca chico', 5, 10, 15, 5, 28, 'ligas/colombia/equipos/boyaca_chico/', NULL, 'mediana', 'cuadriculada', 12, 5, 57, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(81, 3, 'colombia', 'envigado', 5, 3, 15, 5, 15, 'ligas/colombia/equipos/envigado/', NULL, 'cuadrada', 'rayada', 13, 4, 52, 'sudamericana', 11, NULL, '2024-10-25 19:30:19'),
(82, 3, 'colombia', 'deportivo pasto', 1, 2, 4, 1, 4, 'ligas/colombia/equipos/deportivo_pasto/', NULL, 'grande', 'cuadriculada', 14, 4, 52, NULL, 100, NULL, '2024-10-25 19:30:18'),
(83, 3, 'colombia', 'la equidad', 15, 3, 4, 15, 3, 'ligas/colombia/equipos/la_equidad/', NULL, 'chica', 'romboide', 15, 3, 47, NULL, 100, NULL, '2024-10-25 19:30:18'),
(84, 3, 'colombia', 'aguilas doradas', 4, 14, 14, 4, 14, 'ligas/colombia/equipos/aguilas_doradas/', NULL, 'grande', 'romboide', 16, 3, 47, NULL, 100, NULL, '2024-10-25 19:30:19'),
(85, 3, 'colombia', 'atletico bucaramanga', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_bucaramanga/', NULL, 'grande', 'romboide', 17, 2, 31, NULL, 100, NULL, '2024-10-25 19:30:18'),
(86, 3, 'colombia', 'real cartagena', 4, 3, 1, 4, 3, 'ligas/colombia/equipos/real_cartagena/', NULL, 'grande', 'lisa', 18, 2, 34, NULL, 100, NULL, '2024-10-25 19:30:18'),
(87, 3, 'colombia', 'alianza petrolera', 4, 14, 14, 31, 15, 'ligas/colombia/equipos/alianza_petrolera/', NULL, 'chica', 'lisa', 19, 1, 20, NULL, 100, NULL, '2024-10-25 19:30:18'),
(88, 3, 'colombia', 'patriotas', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/patriotas/', NULL, 'chica', 'lisa', 20, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:18'),
(89, 4, 'uruguay', 'peñarol', 4, 14, 14, 31, 16, 'ligas/uruguay/equipos/peñarol/', NULL, 'grande', 'cuadriculada', 1, 10, 58, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(90, 4, 'uruguay', 'nacional', 15, 1, 2, 15, 1, 'ligas/uruguay/equipos/nacional/', NULL, 'grande', 'cuadriculada', 2, 10, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(91, 4, 'uruguay', 'defensor sporting', 12, 15, 1, 12, 15, 'ligas/uruguay/equipos/defensor_sporting/', NULL, 'grande', 'cuadriculada', 3, 9, 54, 'sudamericana', 10, NULL, '2024-10-25 19:30:19'),
(92, 4, 'uruguay', 'montevideo wanderers', 14, 15, 15, 33, 16, 'ligas/uruguay/equipos/montevideo_wanderers/', NULL, 'grande', 'cuadriculada', 4, 9, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(93, 4, 'uruguay', 'danubio', 15, 14, 14, 15, 14, 'ligas/uruguay/equipos/danubio/', NULL, 'cuadrada', 'rayada', 5, 8, 52, NULL, 100, NULL, '2024-10-25 19:30:19'),
(94, 4, 'uruguay', 'liverpool', 2, 14, 15, 32, 15, 'ligas/uruguay/equipos/liverpool/', NULL, 'mediana', 'cuadriculada', 6, 8, 62, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(95, 4, 'uruguay', 'river montevideo', 15, 1, 1, 24, 14, 'ligas/uruguay/equipos/river_montevideo/', NULL, 'grande', 'cuadriculada', 7, 7, 58, 'libertadores', 7, NULL, '2024-10-25 19:30:19'),
(96, 4, 'uruguay', 'fenix', 15, 12, 4, 28, 32, 'ligas/uruguay/equipos/fenix/', NULL, 'chica', 'romboide', 8, 7, 50, NULL, 100, NULL, '2024-10-25 19:30:19'),
(97, 4, 'uruguay', 'central español', 1, 2, 15, 1, 15, 'ligas/uruguay/equipos/central_español/', NULL, 'grande', 'cuadriculada', 9, 6, 50, NULL, 100, NULL, '2024-10-25 19:30:19'),
(98, 4, 'uruguay', 'cerro largo', 2, 15, 15, 28, 15, 'ligas/uruguay/equipos/cerro_largo/', NULL, 'chica', 'lisa', 10, 6, 60, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(99, 4, 'uruguay', 'atenas', 10, 1, 15, 10, 15, 'ligas/uruguay/equipos/atenas/', NULL, 'chica', 'cuadriculada', 11, 5, 53, 'sudamericana', 11, NULL, '2024-10-25 19:30:19'),
(100, 4, 'uruguay', 'racing montevideo', 15, 3, 14, 36, 15, 'ligas/uruguay/equipos/racing_montevideo/', NULL, 'chica', 'rayada', 12, 5, 56, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(101, 4, 'uruguay', 'cerro', 15, 6, 6, 29, 14, 'ligas/uruguay/equipos/cerro/', NULL, 'grande', 'lisa', 13, 4, 60, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(102, 4, 'uruguay', 'tacuarembo', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/tacuarembo/', NULL, 'cuadrada', 'rayada', 14, 4, 52, NULL, 100, NULL, '2024-10-25 19:30:18'),
(103, 4, 'uruguay', 'rentistas', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/rentistas/', NULL, 'chica', 'rayada', 15, 3, 48, NULL, 100, NULL, '2024-10-25 19:30:18'),
(104, 4, 'uruguay', 'bella vista', 15, 4, 2, 8, 2, 'ligas/uruguay/equipos/bella_vista/', NULL, 'chica', 'cuadriculada', 16, 3, 56, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(105, 4, 'uruguay', 'rocha', 6, 14, 4, 6, 15, 'ligas/uruguay/equipos/rocha/', NULL, 'chica', 'romboide', 17, 2, 34, NULL, 100, NULL, '2024-10-25 19:30:18'),
(106, 4, 'uruguay', 'el tanque sisley', 3, 14, 15, 37, 15, 'ligas/uruguay/equipos/el_tanque_sisley/', NULL, 'chica', 'lisa', 18, 2, 43, NULL, 100, NULL, '2024-10-25 19:30:19'),
(107, 4, 'uruguay', 'deportivo colonia', 1, 15, 10, 1, 15, 'ligas/uruguay/equipos/deportivo_colonia/', NULL, 'chica', 'circular', 19, 1, 23, NULL, 100, NULL, '2024-10-25 19:30:18'),
(108, 4, 'uruguay', 'cerrito', 4, 3, 3, 4, 3, 'ligas/uruguay/equipos/cerrito/', NULL, 'chica', 'lisa', 20, 1, 30, NULL, 100, NULL, '2024-10-25 19:30:18'),
(109, 5, 'paraguay', 'olimpia', 15, 14, 14, 15, 14, 'ligas/paraguay/equipos/olimpia/', NULL, 'mediana', 'cuadriculada', 1, 10, 50, NULL, 100, NULL, '2024-10-25 19:30:19'),
(110, 5, 'paraguay', 'cerro porteño', 10, 1, 15, 23, 15, 'ligas/paraguay/equipos/cerro_porteño/', NULL, 'grande', 'romboide', 2, 9, 64, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(111, 5, 'paraguay', 'club nacional', 15, 1, 2, 15, 1, 'ligas/paraguay/equipos/club_nacional/', NULL, 'mediana', 'cuadriculada', 3, 8, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(112, 5, 'paraguay', 'libertad', 15, 14, 14, 33, 1, 'ligas/paraguay/equipos/libertad/', NULL, 'chica', 'rayada', 4, 7, 58, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(113, 5, 'paraguay', 'guarani', 4, 14, 14, 31, 15, 'ligas/paraguay/equipos/guarani/', NULL, 'mediana', 'cuadriculada', 5, 6, 52, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(114, 5, 'paraguay', 'sportivo luqueño', 2, 4, 4, 27, 15, 'ligas/paraguay/equipos/sportivo_luqueño/', NULL, 'mediana', 'romboide', 6, 6, 56, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(115, 5, 'paraguay', 'tacuari', 14, 15, 15, 33, 15, 'ligas/paraguay/equipos/tacuari/', NULL, 'chica', 'rayada', 7, 5, 54, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(116, 5, 'paraguay', 'sol de america', 2, 15, 15, 2, 15, 'ligas/paraguay/equipos/sol_de_america/', NULL, 'chica', 'circular', 8, 5, 56, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(117, 5, 'paraguay', 'deportivo capiata', 4, 2, 15, 27, 15, 'ligas/paraguay/equipos/deportivo_capiata/', NULL, 'chica', 'circular', 9, 4, 50, NULL, 100, NULL, '2024-10-25 19:30:18'),
(118, 5, 'paraguay', 'sportivo carapegüa', 1, 15, 15, 24, 15, 'ligas/paraguay/equipos/sportivo_carapegüa/', NULL, 'mediana', 'cuadriculada', 10, 4, 59, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(119, 5, 'paraguay', 'sportivo san lorenzo', 15, 1, 2, 15, 2, 'ligas/paraguay/equipos/sportivo_san_lorenzo/', NULL, 'mediana', 'lisa', 11, 3, 54, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(120, 5, 'paraguay', 'rubio ñu', 15, 3, 3, 36, 3, 'ligas/paraguay/equipos/rubio_ñu/', NULL, 'chica', 'romboide', 12, 3, 59, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(121, 5, 'paraguay', '12 de octubre', 15, 2, 2, 28, 15, 'ligas/paraguay/equipos/12_de_octubre/', NULL, 'chica', 'cuadriculada', 13, 2, 38, NULL, 100, NULL, '2024-10-25 19:30:18'),
(122, 5, 'paraguay', '3 de febrero', 1, 15, 15, 1, 15, 'ligas/paraguay/equipos/3_de_febrero/', NULL, 'chica', 'lisa', 14, 2, 38, NULL, 100, NULL, '2024-10-25 19:30:19'),
(123, 5, 'paraguay', 'trinidense', 2, 4, 4, 2, 4, 'ligas/paraguay/equipos/trinidense/', NULL, 'chica', 'romboide', 15, 1, 21, NULL, 100, NULL, '2024-10-25 19:30:18'),
(124, 5, 'paraguay', 'cerro cora', 1, 14, 14, 34, 15, 'ligas/paraguay/equipos/cerro_cora/', NULL, 'chica', 'lisa', 16, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:18'),
(125, 6, 'chile', 'colo colo', 15, 14, 14, 15, 14, 'ligas/chile/equipos/colo_colo/', NULL, 'mediana', 'circular', 1, 10, 58, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(126, 6, 'chile', 'universidad de chile', 2, 15, 1, 2, 15, 'ligas/chile/equipos/universidad_de_chile/', NULL, 'grande', 'cuadriculada', 2, 9, 58, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(127, 6, 'chile', 'universidad catolica', 15, 2, 1, 15, 1, 'ligas/chile/equipos/universidad_catolica/', NULL, 'chica', 'romboide', 3, 8, 54, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(128, 6, 'chile', 'cobreloa', 5, 14, 15, 5, 15, 'ligas/chile/equipos/cobreloa/', NULL, 'cuadrada', 'rayada', 4, 7, 46, NULL, 100, NULL, '2024-10-25 19:30:19'),
(129, 6, 'chile', 'union española', 1, 4, 10, 1, 4, 'ligas/chile/equipos/union_española/', NULL, 'cuadrada', 'cuadriculada', 5, 6, 55, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(130, 6, 'chile', 'deportes concepcion', 12, 15, 4, 12, 15, 'ligas/chile/equipos/deportes_concepcion/', NULL, 'grande', 'rayada', 6, 6, 51, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(131, 6, 'chile', 'cobresal', 15, 5, 3, 15, 5, 'ligas/chile/equipos/cobresal/', NULL, 'grande', 'rayada', 7, 5, 52, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(132, 6, 'chile', 'huachipato', 2, 14, 14, 32, 15, 'ligas/chile/equipos/huachipato/', NULL, 'cuadrada', 'rayada', 8, 5, 54, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(133, 6, 'chile', 'palestino', 15, 3, 1, 15, 37, 'ligas/chile/equipos/palestino/', NULL, 'grande', 'romboide', 9, 4, 49, NULL, 100, NULL, '2024-10-25 19:30:19'),
(134, 6, 'chile', 'deportes iquique', 6, 14, 14, 6, 14, 'ligas/chile/equipos/deportes_iquique/', NULL, 'grande', 'romboide', 10, 4, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(135, 6, 'chile', 'coquimbo unido', 4, 14, 14, 4, 14, 'ligas/chile/equipos/coquimbo_unido/', NULL, 'grande', 'circular', 11, 3, 40, NULL, 100, NULL, '2024-10-25 19:30:19'),
(136, 6, 'chile', 'everton', 10, 4, 4, 10, 4, 'ligas/chile/equipos/everton/', NULL, 'grande', 'lisa', 12, 3, 39, NULL, 100, NULL, '2024-10-25 19:30:18'),
(137, 6, 'chile', 'deportes antofagasta', 15, 2, 1, 15, 2, 'ligas/chile/equipos/deportes_antofagasta/', NULL, 'grande', 'rayada', 13, 2, 37, NULL, 100, NULL, '2024-10-25 19:30:18'),
(138, 6, 'chile', 'audax italiano', 3, 15, 15, 3, 15, 'ligas/chile/equipos/audax_italiano/', NULL, 'cuadrada', 'rayada', 14, 2, 53, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(139, 6, 'chile', 'santiago wanderers', 3, 15, 15, 3, 15, 'ligas/chile/equipos/santiago_wanderers/', NULL, 'grande', 'romboide', 15, 1, 30, NULL, 100, NULL, '2024-10-25 19:30:18'),
(140, 6, 'chile', 'ohiggins', 6, 14, 4, 6, 4, 'ligas/chile/equipos/ohiggins/', NULL, 'grande', 'lisa', 16, 1, 24, NULL, 100, NULL, '2024-10-25 19:30:18'),
(141, 7, 'ecuador', 'barcelona', 4, 1, 14, 4, 1, 'ligas/ecuador/equipos/barcelona/', NULL, 'mediana', 'rayada', 1, 10, 64, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(142, 7, 'ecuador', 'el nacional', 1, 2, 15, 1, 15, 'ligas/ecuador/equipos/el_nacional/', NULL, 'grande', 'circular', 2, 9, 60, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(143, 7, 'ecuador', 'liga deportiva', 15, 10, 1, 15, 10, 'ligas/ecuador/equipos/liga_deportiva/', NULL, 'mediana', 'cuadriculada', 3, 8, 52, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(144, 7, 'ecuador', 'emelec', 2, 15, 6, 2, 15, 'ligas/ecuador/equipos/emelec/', NULL, 'cuadrada', 'rayada', 4, 7, 46, NULL, 100, NULL, '2024-10-25 19:30:19'),
(145, 7, 'ecuador', 'deportivo quito', 2, 1, 15, 23, 15, 'ligas/ecuador/equipos/deportivo_quito/', NULL, 'grande', 'circular', 5, 6, 58, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(146, 7, 'ecuador', 'liga de loja', 15, 1, 3, 15, 1, 'ligas/ecuador/equipos/liga_de_loja/', NULL, 'grande', 'circular', 6, 5, 56, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(147, 7, 'ecuador', 'deportivo cuenca', 1, 14, 14, 1, 15, 'ligas/ecuador/equipos/deportivo_cuenca/', NULL, 'mediana', 'romboide', 7, 4, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(148, 7, 'ecuador', 'independiente del valle', 2, 14, 4, 32, 15, 'ligas/ecuador/equipos/independiente_del_valle/', NULL, 'chica', 'lisa', 8, 4, 47, NULL, 100, NULL, '2024-10-25 19:30:19'),
(149, 7, 'ecuador', 'deportivo olmedo', 10, 15, 1, 10, 4, 'ligas/ecuador/equipos/deportivo_olmedo/', NULL, 'chica', 'circular', 9, 3, 47, NULL, 100, NULL, '2024-10-25 19:30:18'),
(150, 7, 'ecuador', 'manta fc', 6, 10, 10, 6, 15, 'ligas/ecuador/equipos/manta_fc/', NULL, 'cuadrada', 'rayada', 10, 3, 55, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(151, 7, 'ecuador', 'macara', 6, 15, 10, 6, 15, 'ligas/ecuador/equipos/macara/', NULL, 'chica', 'romboide', 11, 2, 50, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(152, 7, 'ecuador', 'deportivo azogues', 3, 15, 1, 3, 15, 'ligas/ecuador/equipos/deportivo_azogues/', NULL, 'chica', 'cuadriculada', 12, 2, 35, NULL, 100, NULL, '2024-10-25 19:30:18'),
(153, 7, 'ecuador', 'tecnico universitario', 1, 15, 15, 24, 27, 'ligas/ecuador/equipos/tecnico_universitario/', NULL, 'chica', 'cuadriculada', 13, 1, 27, NULL, 100, NULL, '2024-10-25 19:30:18'),
(154, 7, 'ecuador', 'aucas', 4, 1, 1, 4, 16, 'ligas/ecuador/equipos/aucas/', NULL, 'chica', 'lisa', 14, 1, 37, NULL, 100, NULL, '2024-10-25 19:30:18'),
(155, 8, 'bolivia', 'bolivar', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/bolivar/', NULL, 'grande', 'rayada', 1, 10, 52, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(156, 8, 'bolivia', 'oriente petrolero', 3, 15, 15, 3, 15, 'ligas/bolivia/equipos/oriente_petrolero/', NULL, 'grande', 'cuadriculada', 2, 9, 50, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(157, 8, 'bolivia', 'blooming', 6, 15, 2, 6, 15, 'ligas/bolivia/equipos/blooming/', NULL, 'grande', 'romboide', 3, 8, 48, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(158, 8, 'bolivia', 'the stronguest', 4, 14, 14, 31, 15, 'ligas/bolivia/equipos/the_stronguest/', NULL, 'grande', 'rayada', 4, 7, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(159, 8, 'bolivia', 'real potosi', 12, 15, 15, 12, 15, 'ligas/bolivia/equipos/real_potosi/', NULL, 'grande', 'circular', 5, 6, 54, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(160, 8, 'bolivia', 'la paz fc', 2, 1, 15, 23, 15, 'ligas/bolivia/equipos/la_paz_fc/', NULL, 'grande', 'rayada', 6, 5, 56, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(161, 8, 'bolivia', 'jorge wilsterman', 1, 15, 10, 1, 15, 'ligas/bolivia/equipos/jorge_wilsterman/', NULL, 'grande', 'cuadriculada', 7, 4, 53, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(162, 8, 'bolivia', 'san jose', 15, 2, 2, 15, 2, 'ligas/bolivia/equipos/san_jose/', NULL, 'grande', 'cuadriculada', 8, 3, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(163, 8, 'bolivia', 'universitario sucre', 2, 1, 15, 2, 15, 'ligas/bolivia/equipos/universitario_sucre/', NULL, 'grande', 'lisa', 9, 2, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(164, 8, 'bolivia', 'aurora', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/aurora/', NULL, 'grande', 'cuadriculada', 10, 2, 50, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(165, 8, 'bolivia', 'guabira', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/guabira/', NULL, 'chica', 'lisa', 11, 1, 18, NULL, 100, NULL, '2024-10-25 19:30:18'),
(166, 8, 'bolivia', 'santa cruz', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/santa_cruz/', NULL, 'chica', 'romboide', 12, 1, 35, NULL, 100, NULL, '2024-10-25 19:30:18'),
(167, 9, 'peru', 'sporting cristal', 6, 15, 4, 6, 15, 'ligas/peru/equipos/sporting_cristal/', NULL, 'mediana', 'rayada', 1, 10, 42, NULL, 100, NULL, '2024-10-25 19:30:19'),
(168, 9, 'peru', 'alianza lima', 10, 15, 15, 28, 15, 'ligas/peru/equipos/alianza_lima/', NULL, 'mediana', 'cuadriculada', 2, 9, 56, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(169, 9, 'peru', 'universitario', 8, 1, 14, 8, 1, 'ligas/peru/equipos/universitario/', NULL, 'mediana', 'circular', 3, 8, 58, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(170, 9, 'peru', 'cienciano', 1, 15, 15, 1, 15, 'ligas/peru/equipos/cienciano/', NULL, 'mediana', 'romboide', 4, 7, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(171, 9, 'peru', 'juan aurich', 1, 15, 15, 1, 15, 'ligas/peru/equipos/juan_aurich/', NULL, 'grande', 'lisa', 5, 6, 50, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(172, 9, 'peru', 'cesar vallejo', 10, 6, 15, 2, 5, 'ligas/peru/equipos/cesar_vallejo/', NULL, 'mediana', 'circular', 6, 5, 49, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(173, 9, 'peru', 'sport huancayo', 1, 4, 3, 1, 3, 'ligas/peru/equipos/sport_huancayo/', NULL, 'grande', 'romboide', 7, 4, 55, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(174, 9, 'peru', 'real garcilaso', 6, 15, 15, 6, 15, 'ligas/peru/equipos/real_garcilaso/', NULL, 'grande', 'cuadriculada', 8, 3, 42, NULL, 100, NULL, '2024-10-25 19:30:18'),
(175, 9, 'peru', 'alianza atletico', 15, 2, 2, 15, 2, 'ligas/peru/equipos/alianza_atletico/', NULL, 'grande', 'romboide', 9, 2, 48, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(176, 9, 'peru', 'sport boys', 9, 14, 14, 9, 14, 'ligas/peru/equipos/sport_boys/', NULL, 'grande', 'romboide', 10, 2, 42, NULL, 100, NULL, '2024-10-25 19:30:18'),
(177, 9, 'peru', 'fc melgar', 14, 1, 1, 34, 15, 'ligas/peru/equipos/fc_melgar/', NULL, 'chica', 'lisa', 11, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:18'),
(178, 9, 'peru', 'sport ancash', 3, 4, 4, 3, 4, 'ligas/peru/equipos/sport_ancash/', NULL, 'cuadrada', 'cuadriculada', 12, 1, 25, NULL, 100, NULL, '2024-10-25 19:30:18'),
(179, 10, 'venezuela', 'caracas fc', 1, 15, 14, 1, 15, 'ligas/venezuela/equipos/caracas_fc/', NULL, 'grande', 'lisa', 1, 10, 60, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(180, 10, 'venezuela', 'minerven', 10, 15, 15, 10, 15, 'ligas/venezuela/equipos/minerven/', NULL, 'grande', 'cuadriculada', 2, 9, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(181, 10, 'venezuela', 'deportivo tachira', 4, 14, 15, 31, 15, 'ligas/venezuela/equipos/deportivo_tachira/', NULL, 'grande', 'romboide', 3, 8, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(182, 10, 'venezuela', 'atletico maracaibo', 2, 1, 1, 23, 15, 'ligas/venezuela/equipos/atletico_maracaibo/', NULL, 'grande', 'cuadriculada', 4, 7, 50, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(183, 10, 'venezuela', 'estudiantes merida', 1, 15, 2, 24, 36, 'ligas/venezuela/equipos/estudiantes_merida/', NULL, 'grande', 'circular', 5, 6, 59, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(184, 10, 'venezuela', 'deportivo anzoategui', 1, 4, 4, 26, 15, 'ligas/venezuela/equipos/deportivo_anzoategui/', NULL, 'grande', 'cuadriculada', 6, 5, 52, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(185, 10, 'venezuela', 'zamora fc', 15, 14, 14, 33, 15, 'ligas/venezuela/equipos/zamora_fc/', NULL, 'mediana', 'lisa', 7, 4, 58, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(186, 10, 'venezuela', 'carabobo fc', 20, 4, 2, 20, 15, 'ligas/venezuela/equipos/carabobo_fc/', NULL, 'mediana', 'cuadriculada', 8, 3, 50, NULL, 100, NULL, '2024-10-25 19:30:18'),
(187, 10, 'venezuela', 'trujillanos', 4, 13, 13, 30, 15, 'ligas/venezuela/equipos/trujillanos/', NULL, 'grande', 'lisa', 9, 2, 50, NULL, 100, NULL, '2024-10-25 19:30:18'),
(188, 10, 'venezuela', 'pepeganga', 12, 15, 15, 12, 15, 'ligas/venezuela/equipos/pepeganga/', NULL, 'mediana', 'circular', 10, 2, 49, NULL, 100, NULL, '2024-10-25 19:30:19'),
(189, 10, 'venezuela', 'mineros de guayana', 2, 14, 14, 32, 15, 'ligas/venezuela/equipos/mineros_de_guayana/', NULL, 'grande', 'cuadriculada', 11, 1, 27, NULL, 100, NULL, '2024-10-25 19:30:18'),
(190, 10, 'venezuela', 'portuguesa fc', 1, 14, 14, 34, 15, 'ligas/venezuela/equipos/portuguesa_fc/', NULL, 'chica', 'romboide', 12, 1, 36, NULL, 100, NULL, '2024-10-25 19:30:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_equipos_grupo`
--

CREATE TABLE `back_equipos_grupo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `equipo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `equipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `j` int(11) NOT NULL DEFAULT 0,
  `g` int(11) NOT NULL DEFAULT 0,
  `e` int(11) NOT NULL DEFAULT 0,
  `p` int(11) NOT NULL DEFAULT 0,
  `gf` int(11) NOT NULL DEFAULT 0,
  `gc` int(11) NOT NULL DEFAULT 0,
  `gv` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `pts` int(11) NOT NULL DEFAULT 0,
  `pos` int(11) NOT NULL DEFAULT 0,
  `penales` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `nivel` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_equipos_grupo`
--

INSERT INTO `back_equipos_grupo` (`id`, `grupo_id`, `equipo_id`, `equipo`, `j`, `g`, `e`, `p`, `gf`, `gc`, `gv`, `d`, `pts`, `pos`, `penales`, `order`, `nivel`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'san pablo fc', 2, 1, 0, 1, 3, 3, 0, 0, 3, 1, 1, 1, 10, 2, '2024-11-03 04:28:47', '2024-11-24 16:41:37'),
(2, 1, 69, 'atletico nacional', 2, 1, 0, 1, 3, 3, 1, 0, 3, 2, 0, 2, 8, -1, '2024-11-03 04:28:48', '2024-11-24 16:41:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_goleadores`
--

CREATE TABLE `back_goleadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `equipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `goles` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_goleadores`
--

INSERT INTO `back_goleadores` (`id`, `equipo_id`, `equipo`, `anio`, `copa`, `zona`, `numero`, `goles`, `created_at`, `updated_at`) VALUES
(1, 69, 'atletico nacional', 2000, 'recopa', NULL, 10, 1, '2024-11-21 03:12:00', '2024-11-21 03:12:00'),
(2, 69, 'atletico nacional', 2000, 'recopa', NULL, 9, 1, '2024-11-21 03:12:00', '2024-11-21 03:12:00'),
(3, 1, 'san pablo fc', 2000, 'recopa', NULL, 9, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37'),
(4, 69, 'atletico nacional', 2000, 'recopa', NULL, 7, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37'),
(5, 1, 'san pablo fc', 2000, 'recopa', NULL, 7, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37'),
(6, 1, 'san pablo fc', 2000, 'recopa', NULL, 5, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_grupos`
--

CREATE TABLE `back_grupos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fase` int(11) NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_grupos`
--

INSERT INTO `back_grupos` (`id`, `anio`, `grupo`, `copa`, `fase`, `zona`, `completed`, `created_at`, `updated_at`) VALUES
(1, 2000, 1, 'recopa', 5, NULL, 1, '2024-11-03 04:28:47', '2024-11-24 16:41:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_ligas`
--

CREATE TABLE `back_ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bandera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a` bigint(20) UNSIGNED DEFAULT NULL,
  `b` bigint(20) UNSIGNED DEFAULT NULL,
  `c` bigint(20) UNSIGNED DEFAULT NULL,
  `copas` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_ligas`
--

INSERT INTO `back_ligas` (`id`, `name`, `bandera`, `a`, `b`, `c`, `copas`, `created_at`, `updated_at`) VALUES
(1, 'brasil', 'ligas/brasil/bandera.png', 4, 3, 2, 0, '2023-08-14 02:37:09', '2023-08-14 02:37:09'),
(2, 'argentina', 'ligas/argentina/bandera.png', 6, 15, 14, 0, '2023-08-14 03:35:26', '2023-08-14 03:35:26'),
(3, 'colombia', 'ligas/colombia/bandera.png', 4, 1, 2, 0, '2023-08-14 03:36:23', '2023-08-14 03:36:23'),
(4, 'uruguay', 'ligas/uruguay/bandera.png', 6, 14, 15, 0, '2023-08-14 03:37:11', '2023-08-14 03:37:11'),
(5, 'paraguay', 'ligas/paraguay/bandera.png', 1, 15, 2, 0, '2023-08-14 03:37:34', '2023-08-14 03:37:34'),
(6, 'chile', 'ligas/chile/bandera.png', 1, 2, 15, 0, '2023-08-14 03:37:59', '2023-08-14 03:37:59'),
(7, 'ecuador', 'ligas/ecuador/bandera.png', 4, 2, 1, 0, '2023-08-14 03:38:21', '2023-08-14 03:38:21'),
(8, 'bolivia', 'ligas/bolivia/bandera.png', 3, 4, 1, 0, '2023-08-14 03:38:42', '2023-08-14 03:38:42'),
(9, 'peru', 'ligas/peru/bandera.png', 15, 1, 1, 0, '2023-08-14 03:39:06', '2023-08-14 03:39:06'),
(10, 'venezuela', 'ligas/venezuela/bandera.png', 40, 4, 10, 0, '2023-08-14 03:39:36', '2023-08-14 03:39:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_main`
--

CREATE TABLE `back_main` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio` int(11) NOT NULL,
  `lib` bigint(20) UNSIGNED DEFAULT NULL,
  `sud` bigint(20) UNSIGNED DEFAULT NULL,
  `rec` bigint(20) UNSIGNED DEFAULT NULL,
  `afa_a` bigint(20) UNSIGNED DEFAULT NULL,
  `afa_b` bigint(20) UNSIGNED DEFAULT NULL,
  `afa_c` bigint(20) UNSIGNED DEFAULT NULL,
  `arg` bigint(20) UNSIGNED DEFAULT NULL,
  `last_partido` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_main`
--

INSERT INTO `back_main` (`id`, `anio`, `lib`, `sud`, `rec`, `afa_a`, `afa_b`, `afa_c`, `arg`, `last_partido`, `created_at`, `updated_at`) VALUES
(1, 2000, 1, 69, 1, 21, 22, 23, 24, NULL, NULL, '2024-11-24 16:41:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_partidos`
--

CREATE TABLE `back_partidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `loc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anio` int(11) NOT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fase` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia` int(11) NOT NULL DEFAULT 0,
  `relevancia` int(11) NOT NULL DEFAULT 0,
  `hora` int(11) NOT NULL DEFAULT 0,
  `gl` int(11) NOT NULL DEFAULT 0,
  `gv` int(11) NOT NULL DEFAULT 0,
  `pa` int(11) NOT NULL DEFAULT 0,
  `pb` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `s` int(11) NOT NULL DEFAULT 0,
  `is_vuelta` tinyint(1) NOT NULL DEFAULT 0,
  `is_define` tinyint(1) NOT NULL DEFAULT 0,
  `is_final` tinyint(1) NOT NULL DEFAULT 0,
  `is_jugado` tinyint(1) NOT NULL DEFAULT 0,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `back_partidos`
--

INSERT INTO `back_partidos` (`id`, `grupo_id`, `loc_id`, `vis_id`, `local`, `visitante`, `anio`, `copa`, `fase`, `fecha`, `zona`, `dia`, `relevancia`, `hora`, `gl`, `gv`, `pa`, `pb`, `d`, `s`, `is_vuelta`, `is_define`, `is_final`, `is_jugado`, `winner_id`, `detalle`, `created_at`, `updated_at`) VALUES
(1, 1, 69, 1, 'atletico nacional', 'san pablo fc', 2000, 'recopa', 5, 1, NULL, 2, 18, 21, 2, 0, 0, 0, 2, 2, 0, 0, 1, 1, 69, '[\"2\' - N\\u00ba 10 - de palomita\",\"14\' - N\\u00ba 9 - de jugada\"]', '2024-11-03 04:28:48', '2024-11-21 03:12:00'),
(2, 1, 1, 69, 'san pablo fc', 'atletico nacional', 2000, 'recopa', 5, 2, NULL, 2, 18, 21, 3, 0, 5, 4, 2, 4, 1, 1, 1, 1, 1, '[\"6\' - N\\u00ba 9 - de palomita\",\"13\' - N\\u00ba 7 - de chilena\",\"25\' - N\\u00ba 7 - de jugada\",\"11\' - N\\u00ba 5 - de volea\"]', '2024-11-03 04:28:48', '2024-11-24 16:41:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fase` int(11) DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL,
  `mes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semana` int(11) DEFAULT NULL,
  `iniciada` tinyint(1) NOT NULL DEFAULT 0,
  `procesado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calendar`
--

INSERT INTO `calendar` (`id`, `action`, `copas`, `fase`, `fecha`, `mes`, `semana`, `iniciada`, `procesado`, `created_at`, `updated_at`) VALUES
(1, 'INICIO', '[]', NULL, NULL, NULL, NULL, 0, 1, NULL, '2024-10-25 19:30:19'),
(2, 'SORTEO', '[\"recopa\"]', NULL, NULL, 'marzo', 2, 0, 1, NULL, '2024-11-03 04:28:48'),
(3, 'FECHA', '[\"recopa\"]', 5, 1, 'marzo', 3, 1, 1, NULL, '2024-11-21 03:12:00'),
(4, 'FECHA', '[\"recopa\"]', 5, 2, 'marzo', 4, 1, 1, NULL, '2024-11-24 16:41:37'),
(5, 'SORTEO', '[\"afa\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'marzo', 5, 0, 1, NULL, '2024-11-25 00:42:14'),
(6, 'FECHA', '[\"afa\"]', -2, 1, 'abril', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(7, 'FECHA', '[\"sudamericana\"]', 0, 1, 'abril', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(8, 'FECHA', '[\"afa\"]', -2, 2, 'abril', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(9, 'FECHA', '[\"libertadores\"]', 0, 1, 'abril', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(10, 'FECHA', '[\"afa\"]', -2, 3, 'abril', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(11, 'FECHA', '[\"sudamericana\"]', 0, 2, 'abril', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(12, 'FECHA', '[\"afa\"]', -2, 4, 'abril', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(13, 'FECHA', '[\"libertadores\"]', 0, 2, 'abril', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(14, 'FECHA', '[\"afa\"]', -2, 5, 'mayo', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(15, 'FECHA', '[\"sudamericana\"]', 0, 3, 'mayo', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(16, 'FECHA', '[\"afa\"]', -2, 6, 'mayo', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(17, 'FECHA', '[\"libertadores\"]', 0, 3, 'mayo', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(18, 'SORTEO', '[\"afa\"]', NULL, NULL, 'mayo', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(19, 'FECHA', '[\"afa\"]', -1, 1, 'mayo', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(20, 'FECHA', '[\"sudamericana\"]', 0, 4, 'mayo', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(21, 'FECHA', '[\"afa\"]', -1, 2, 'mayo', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(22, 'FECHA', '[\"libertadores\"]', 0, 4, 'mayo', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(23, 'FECHA', '[\"afa\"]', -1, 3, 'junio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(24, 'FECHA', '[\"sudamericana\"]', 0, 5, 'junio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(25, 'FECHA', '[\"afa\"]', -1, 4, 'junio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(26, 'FECHA', '[\"libertadores\"]', 0, 5, 'junio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(27, 'FECHA', '[\"afa\"]', -1, 5, 'junio', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(28, 'FECHA', '[\"sudamericana\"]', 0, 6, 'junio', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(29, 'FECHA', '[\"afa\"]', -1, 6, 'abril', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(30, 'FECHA', '[\"libertadores\"]', 0, 6, 'junio', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(31, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'julio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(32, 'FECHA', '[\"argentina\"]', 1, 1, 'julio', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(33, 'FECHA', '[\"sudamericana\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(34, 'FECHA', '[\"libertadores\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(35, 'FECHA', '[\"argentina\"]', 1, 2, 'julio', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(36, 'FECHA', '[\"sudamericana\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(37, 'FECHA', '[\"libertadores\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(38, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'agosto', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(39, 'FECHA', '[\"afa\"]', 0, 1, 'agosto', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(40, 'FECHA', '[\"argentina\"]', 2, 1, 'agosto', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(41, 'FECHA', '[\"afa\"]', 0, 2, 'agosto', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(42, 'FECHA', '[\"sudamericana\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(43, 'FECHA', '[\"libertadores\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(44, 'FECHA', '[\"afa\"]', 0, 3, 'agosto', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(45, 'FECHA', '[\"argentina\"]', 2, 2, 'agosto', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(46, 'FECHA', '[\"afa\"]', 0, 4, 'agosto', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(47, 'FECHA', '[\"sudamericana\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(48, 'FECHA', '[\"libertadores\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(49, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'septiembre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(50, 'FECHA', '[\"afa\"]', 0, 5, 'septiembre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(51, 'FECHA', '[\"argentina\"]', 3, 1, 'septiembre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(52, 'FECHA', '[\"afa\"]', 0, 6, 'septiembre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(53, 'FECHA', '[\"sudamericana\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(54, 'FECHA', '[\"libertadores\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(55, 'SORTEO', '[\"afa\"]', NULL, NULL, 'septiembre', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(56, 'FECHA', '[\"afa\"]', 1, 1, 'septiembre', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(57, 'FECHA', '[\"argentina\"]', 3, 2, 'septiembre', 3, 0, 0, NULL, '2024-10-23 14:27:14'),
(58, 'FECHA', '[\"afa\"]', 1, 2, 'septiembre', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(59, 'FECHA', '[\"sudamericana\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(60, 'FECHA', '[\"libertadores\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
(61, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'octubre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(62, 'FECHA', '[\"afa\"]', 1, 3, 'octubre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(63, 'FECHA', '[\"argentina\"]', 4, 1, 'octubre', 1, 0, 0, NULL, '2024-10-23 14:27:14'),
(64, 'FECHA', '[\"afa\"]', 1, 4, 'octubre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(65, 'FECHA', '[\"sudamericana\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2024-10-23 14:27:14'),
(66, 'FECHA', '[\"libertadores\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(68, 'FECHA', '[\"afa\"]', 1, 5, 'octubre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(69, 'FECHA', '[\"argentina\"]', 4, 2, 'octubre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(70, 'FECHA', '[\"afa\"]', 1, 6, 'octubre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(71, 'FECHA', '[\"sudamericana\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(72, 'FECHA', '[\"libertadores\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(73, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(74, 'FECHA', '[\"afa\"]', 2, 1, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(75, 'FECHA', '[\"afa\"]', 2, 2, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(76, 'FECHA', '[\"argentina\"]', 5, 1, 'noviembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(77, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(78, 'FECHA', '[\"afa\"]', 3, 1, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(79, 'FECHA', '[\"afa\"]', 3, 2, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(80, 'FECHA', '[\"sudamericana\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(81, 'FECHA', '[\"libertadores\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2024-10-23 14:27:15'),
(82, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(83, 'FECHA', '[\"afa\"]', 4, 1, 'noviembre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(84, 'FECHA', '[\"argentina\"]', 5, 2, 'noviembre', 3, 0, 0, NULL, '2024-10-23 14:27:15'),
(85, 'FECHA', '[\"afa\"]', 4, 2, 'noviembre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(86, 'FECHA', '[\"sudamericana\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(87, 'FECHA', '[\"libertadores\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2024-10-23 14:27:15'),
(88, 'SORTEO', '[\"afa\"]', NULL, NULL, 'diciembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(89, 'FECHA', '[\"afa\"]', 5, 1, 'diciembre', 1, 0, 0, NULL, '2024-10-23 14:27:15'),
(90, 'FECHA', '[\"afa\"]', 5, 2, 'diciembre', 2, 0, 0, NULL, '2024-10-23 14:27:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rgb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_combinado` tinyint(1) NOT NULL DEFAULT 0,
  `a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `similares` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `name`, `rgb`, `is_combinado`, `a`, `b`, `similares`, `created_at`, `updated_at`) VALUES
(1, 'rojo', '255,0,0', 0, NULL, NULL, '[5,9,12,13,19,20,23,40,41,24,25,26,34]', '2023-08-12 02:57:16', '2023-08-25 03:24:45'),
(2, 'azul', '0,0,255', 0, NULL, NULL, '[3,6,7,10,11,12,23,27,28,32,38,39,41]', '2023-08-12 02:57:16', '2023-08-13 17:36:25'),
(3, 'verde', '0,102,0', 0, NULL, NULL, '[2,6,7,10,11,19,25,32,35,36,37,38,39]', '2023-08-12 02:57:16', '2023-08-13 05:32:37'),
(4, 'amarillo', '245,184,0', 0, NULL, NULL, '[5,8,15,17,26,27,30,31,35]', '2023-08-12 02:57:16', '2023-08-13 05:33:33'),
(5, 'naranja', '255,102,0', 0, NULL, NULL, '[1,4,9,17,26,30,34]', '2023-08-12 02:57:16', '2023-08-13 05:34:25'),
(6, 'celeste', '0,102,255', 0, NULL, NULL, '[2,3,7,16,18,28,29]', '2023-08-12 02:57:16', '2023-08-13 05:35:21'),
(7, 'verdeclaro', '102,204,0', 0, NULL, NULL, '[3,6,16,19,25,35,36,38,39]', '2023-08-12 02:57:16', '2023-08-13 05:36:13'),
(8, 'crema', '255,255,153', 0, NULL, NULL, '[4,15,16,17,18,26,27,30,31,35,24,29]', '2023-08-12 02:57:16', '2023-08-20 02:50:26'),
(9, 'rosa', '255,102,153', 0, NULL, NULL, '[1,5,24,34]', '2023-08-12 02:57:16', '2023-09-21 19:48:29'),
(10, 'azuloscuro', '0,0,102', 0, NULL, NULL, '[2,11,12,14,20,21,23,27,28,31,32,37,38,39,40]', '2023-08-12 02:57:16', '2023-08-13 05:38:46'),
(11, 'verdeoscuro', '0,51,0', 0, NULL, NULL, '[2,3,10,12,14,19,25,32,37,38,39]', '2023-08-12 02:57:16', '2023-08-13 05:39:37'),
(12, 'violeta', '102,0,153', 0, NULL, NULL, '[1,2,10,11,21,23,25,32,41]', '2023-08-12 02:57:16', '2023-08-13 05:40:26'),
(13, 'marron', '102,51,0', 0, NULL, NULL, '[1,5,11,17,19,20,21,25,30,34,40]', '2023-08-12 02:57:16', '2023-08-13 05:41:20'),
(14, 'negro', '0,0,0', 0, NULL, NULL, '[10,11,21,31,32,33,34,37]', '2023-08-12 02:57:16', '2023-08-13 05:41:59'),
(15, 'blanco', '255,255,255', 0, NULL, NULL, '[4,8,18,24,28,29,33,36]', '2023-08-12 02:57:16', '2023-08-13 05:42:34'),
(16, 'gris', '153,153,153', 0, NULL, NULL, '[6,7]', '2023-08-12 02:57:16', '2023-08-13 05:43:12'),
(17, 'marronclaro', '204,153,0', 0, NULL, NULL, '[4,5,13,19,26,30,31]', '2023-08-12 02:57:16', '2023-08-13 05:44:14'),
(18, 'cielo', '204,255,255', 0, NULL, NULL, '[6,8,15,16,29]', '2023-08-12 02:57:16', '2023-08-13 05:44:49'),
(19, 'morado', '102,102,0', 0, NULL, NULL, '[1,3,5,7,11,13,17,20,25,37,40]', '2023-08-12 02:57:16', '2023-08-13 05:45:36'),
(20, 'grana', '102,0,51', 0, NULL, NULL, '[1,10,11,12,13,19,21,23,25,30,34,40]', '2023-08-12 02:57:16', '2023-08-13 05:46:37'),
(21, 'marronoscuro', '45,0,0', 0, NULL, NULL, '[1,10,11,13,14,19,20,25,30,31,32,34,37,40]', '2023-08-12 02:57:16', '2023-08-13 05:47:57'),
(22, 'piel', '255,204,153', 0, NULL, NULL, '[]', '2023-08-12 02:57:16', '2023-08-12 02:57:16'),
(23, 'rojoazul', '0,0,0', 1, '255,0,0', '0,0,255', '[1,2,5,10,12,19,20,21,25,32,34,38,39,40]', '2023-08-12 02:57:16', '2023-08-13 17:11:05'),
(24, 'rojoblanco', '0,0,0', 1, '255,0,0', '255,255,255', '[1,9,15,26]', '2023-08-12 02:57:16', '2023-08-13 17:11:55'),
(25, 'rojoverde', '0,0,0', 1, '255,0,0', '0,102,0', '[1,3,11,12,19,20,21,23,34,37,38,39,40]', '2023-08-12 02:57:16', '2023-08-13 17:12:56'),
(26, 'rojoamarillo', '0,0,0', 1, '255,0,0', '245,184,0', '[1,4,5,8,9,17,24,40]', '2023-08-12 02:57:16', '2023-08-13 17:14:03'),
(27, 'azulamarillo', '0,0,0', 1, '0,0,255', '245,184,0', '[2,4,10,17,28,31,35,36,39]', '2023-08-12 02:57:16', '2023-08-13 17:15:03'),
(28, 'azulblanco', '0,0,0', 1, '0,0,255', '255,255,255', '[2,10,27,29,33,36]', '2023-08-12 02:57:16', '2023-08-13 17:16:04'),
(29, 'celesteblanco', '0,0,0', 1, '0,102,255', '255,255,255', '[6,15,16,18,28,36]', '2023-08-12 02:57:16', '2023-08-13 17:16:58'),
(30, 'marronamarillo', '0,0,0', 1, '102,51,0', '245,184,0', '[4,5,8,13,17,19,26,31,33,40]', '2023-08-12 02:57:16', '2023-08-13 17:17:43'),
(31, 'negroamarillo', '0,0,0', 1, '0,0,0', '245,184,0', '[4,8,14,17,30,33]', '2023-08-12 02:57:16', '2023-08-13 17:18:32'),
(32, 'negroazul', '0,0,0', 1, '0,0,0', '0,0,255', '[2,10,11,12,14,21,37,38,39]', '2023-08-12 02:57:16', '2023-08-13 17:19:18'),
(33, 'negroblanco', '0,0,0', 1, '0,0,0', '255,255,255', '[8,10,11,14,15,16,18,21,27,28,30,31,36,37,38]', '2023-08-12 02:57:16', '2023-08-13 17:28:56'),
(34, 'negrorojo', '0,0,0', 1, '0,0,0', '255,0,0', '[1,5,12,13,14,19,20,21,23,25,30,40]', '2023-08-12 02:57:16', '2023-08-13 17:29:55'),
(35, 'verdeamarillo', '0,0,0', 1, '0,102,0', '245,184,0', '[3,4,7,8,11,17,19,27,28,36,39]', '2023-08-12 02:57:16', '2023-08-13 17:30:50'),
(36, 'verdeblanco', '0,0,0', 1, '0,102,0', '255,255,255', '[3,6,7,15,18,28,29,35]', '2023-08-12 02:57:16', '2023-08-13 17:31:50'),
(37, 'verdenegro', '0,0,0', 1, '0,102,0', '0,0,0', '[3,10,11,14,19,20,21,38,39]', '2023-08-12 02:57:16', '2023-08-13 17:32:43'),
(38, 'azulverde', '0,0,0', 1, '0,0,255', '0,102,0', '[2,3,6,7,10,11,12,19,32,37,39]', '2023-08-12 02:57:16', '2023-08-13 17:33:30'),
(39, 'turquesa', '0,113,110', 0, NULL, NULL, '[2,3,6,7,10,11,12,19,32,38]', '2023-08-12 02:57:16', '2023-08-13 17:34:11'),
(40, 'bordo', '107,0,0', 0, NULL, NULL, '[1,12,13,19,20,21,23,34]', '2023-08-12 02:57:16', '2023-08-13 17:35:03'),
(41, 'negroceleste', '190,90,240', 1, '0,0,0', '0,102,255', '[3,10,11,14,23,27,32,37,38,2,6,39]', '2023-08-12 02:57:16', '2023-08-17 02:25:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos_afa`
--

CREATE TABLE `cupos_afa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cupos_afa`
--

INSERT INTO `cupos_afa` (`id`, `equipo_id`, `name`, `copa`, `pos`, `created_at`, `updated_at`) VALUES
(1, 21, 'river plate', 'libertadores', 1, NULL, NULL),
(2, 22, 'boca juniors', 'libertadores', 2, NULL, NULL),
(3, 23, 'san lorenzo', 'libertadores', 3, NULL, NULL),
(4, 24, 'velez sarsfield', 'libertadores', 4, NULL, NULL),
(5, 25, 'independiente', 'libertadores', 5, NULL, NULL),
(6, 26, 'racing club', 'libertadores', 6, NULL, NULL),
(7, 29, 'huracan', 'libertadores', 7, NULL, NULL),
(8, 30, 'ferrocarril oeste', 'libertadores', 8, NULL, NULL),
(9, 28, 'rosario central', 'sudamericana', 1, NULL, NULL),
(10, 27, 'newells old boys', 'sudamericana', 2, NULL, NULL),
(11, 31, 'estudiantes la plata', 'sudamericana', 3, NULL, NULL),
(12, 32, 'gimnasia la plata', 'sudamericana', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `liga_id` bigint(20) UNSIGNED DEFAULT NULL,
  `liga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a` bigint(20) UNSIGNED DEFAULT NULL,
  `b` bigint(20) UNSIGNED DEFAULT NULL,
  `c` bigint(20) UNSIGNED DEFAULT NULL,
  `combinado` bigint(20) UNSIGNED DEFAULT NULL,
  `alternativo` bigint(20) UNSIGNED DEFAULT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clasico_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estructura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cesped` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `pts` int(11) NOT NULL DEFAULT 0,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos_clasificacion` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `liga_id`, `liga`, `name`, `a`, `b`, `c`, `combinado`, `alternativo`, `directory`, `clasico_id`, `estructura`, `cesped`, `orden`, `nivel`, `pts`, `copa`, `pos_clasificacion`, `created_at`, `updated_at`) VALUES
(1, 1, 'brasil', 'san pablo fc', 15, 1, 14, 15, 34, 'ligas/brasil/equipos/san_pablo_fc/', NULL, 'grande', 'circular', 1, 10, 58, NULL, 1, NULL, '2024-10-25 19:30:17'),
(2, 1, 'brasil', 'cruzeiro', 2, 15, 15, 2, 15, 'ligas/brasil/equipos/cruzeiro/', NULL, 'grande', 'cuadriculada', 2, 10, 58, 'libertadores', 4, NULL, '2024-10-25 19:30:18'),
(3, 1, 'brasil', 'flamengo', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/flamengo/', NULL, 'grande', 'rayada', 3, 9, 58, 'libertadores', 5, NULL, '2024-10-25 19:30:18'),
(4, 1, 'brasil', 'gremio', 6, 14, 15, 41, 15, 'ligas/brasil/equipos/gremio/', NULL, 'mediana', 'rayada', 4, 9, 60, 'libertadores', 2, NULL, '2024-10-25 19:30:18'),
(5, 1, 'brasil', 'palmeiras', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/palmeiras/', NULL, 'mediana', 'circular', 5, 8, 54, 'libertadores', 8, NULL, '2024-10-25 19:30:18'),
(6, 1, 'brasil', 'corinthians', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/corinthians/', NULL, 'cuadrada', 'rayada', 6, 8, 52, 'sudamericana', 10, NULL, '2024-10-25 19:30:18'),
(7, 1, 'brasil', 'santos fc', 15, 14, 14, 15, 33, 'ligas/brasil/equipos/santos_fc/', NULL, 'mediana', 'romboide', 7, 7, 47, 'sudamericana', 12, NULL, '2024-10-25 19:30:18'),
(8, 1, 'brasil', 'vasco da gama', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/vasco_da_gama/', NULL, 'grande', 'romboide', 8, 7, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:18'),
(9, 1, 'brasil', 'fluminense', 20, 3, 15, 25, 15, 'ligas/brasil/equipos/fluminense/', NULL, 'mediana', 'rayada', 9, 6, 56, 'libertadores', 6, NULL, '2024-10-25 19:30:18'),
(10, 1, 'brasil', 'internacional', 1, 15, 15, 1, 15, 'ligas/brasil/equipos/internacional/', NULL, 'grande', 'cuadriculada', 10, 6, 56, 'libertadores', 7, NULL, '2024-10-25 19:30:18'),
(11, 1, 'brasil', 'atletico mineiro', 14, 15, 15, 33, 15, 'ligas/brasil/equipos/atletico_mineiro/', NULL, 'grande', 'cuadriculada', 11, 5, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:18'),
(12, 1, 'brasil', 'botafogo', 14, 15, 15, 33, 16, 'ligas/brasil/equipos/botafogo/', NULL, 'grande', 'lisa', 12, 5, 52, 'sudamericana', 11, NULL, '2024-10-25 19:30:18'),
(13, 1, 'brasil', 'paranaense', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/paranaense/', NULL, 'cuadrada', 'cuadriculada', 13, 4, 47, NULL, 100, NULL, '2024-10-25 19:30:17'),
(14, 1, 'brasil', 'goias', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/goias/', NULL, 'mediana', 'cuadriculada', 14, 4, 47, NULL, 100, NULL, '2024-10-25 19:30:17'),
(15, 1, 'brasil', 'bahia', 15, 2, 1, 15, 23, 'ligas/brasil/equipos/bahia/', NULL, 'grande', 'rayada', 15, 3, 46, NULL, 100, NULL, '2024-10-25 19:30:17'),
(16, 1, 'brasil', 'chapecoense', 3, 15, 7, 3, 15, 'ligas/brasil/equipos/chapecoense/', NULL, 'cuadrada', 'romboide', 16, 3, 53, 'sudamericana', 9, NULL, '2024-10-25 19:30:18'),
(17, 1, 'brasil', 'coritiba', 15, 3, 3, 15, 36, 'ligas/brasil/equipos/coritiba/', NULL, 'grande', 'cuadriculada', 17, 2, 38, NULL, 100, NULL, '2024-10-25 19:30:17'),
(18, 1, 'brasil', 'ponte preta', 15, 14, 14, 33, 14, 'ligas/brasil/equipos/ponte_preta/', NULL, 'grande', 'lisa', 18, 2, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(19, 1, 'brasil', 'avai', 2, 15, 15, 28, 15, 'ligas/brasil/equipos/avai/', NULL, 'grande', 'romboide', 19, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:17'),
(20, 1, 'brasil', 'portuguesa', 1, 3, 15, 25, 15, 'ligas/brasil/equipos/portuguesa/', NULL, 'mediana', 'cuadriculada', 20, 1, 21, NULL, 100, NULL, '2024-10-25 19:30:17'),
(21, 2, 'argentina', 'river plate', 15, 1, 14, 15, 14, 'ligas/argentina/equipos/river_plate/', 22, 'grande', 'rayada', 1, 10, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(22, 2, 'argentina', 'boca juniors', 2, 4, 4, 2, 15, 'ligas/argentina/equipos/boca_juniors/', 21, 'mediana', 'rayada', 2, 10, 58, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(23, 2, 'argentina', 'san lorenzo', 2, 1, 1, 23, 15, 'ligas/argentina/equipos/san_lorenzo/', 29, 'mediana', 'cuadriculada', 3, 10, 56, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(24, 2, 'argentina', 'velez sarsfield', 15, 2, 2, 15, 2, 'ligas/argentina/equipos/velez_sarsfield/', 30, 'cuadrada', 'rayada', 4, 10, 60, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(25, 2, 'argentina', 'independiente', 1, 15, 10, 1, 15, 'ligas/argentina/equipos/independiente/', 26, 'cuadrada', 'cuadriculada', 5, 9, 58, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(26, 2, 'argentina', 'racing club', 6, 15, 10, 29, 10, 'ligas/argentina/equipos/racing_club/', 25, 'grande', 'cuadriculada', 6, 9, 54, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(27, 2, 'argentina', 'newells old boys', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/newells_old_boys/', 28, 'cuadrada', 'cuadriculada', 7, 9, 58, 'sudamericana', 10, NULL, '2024-10-25 19:30:19'),
(28, 2, 'argentina', 'rosario central', 4, 2, 2, 27, 15, 'ligas/argentina/equipos/rosario_central/', 27, 'mediana', 'romboide', 8, 9, 49, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(29, 2, 'argentina', 'huracan', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/huracan/', 23, 'mediana', 'lisa', 9, 8, 60, 'libertadores', 7, NULL, '2024-10-25 19:30:19'),
(30, 2, 'argentina', 'ferrocarril oeste', 3, 15, 12, 3, 15, 'ligas/argentina/equipos/ferrocarril_oeste/', 24, 'cuadrada', 'romboide', 10, 8, 54, 'libertadores', 8, NULL, '2024-10-25 19:30:19'),
(31, 2, 'argentina', 'estudiantes la plata', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/estudiantes_la_plata/', 32, 'grande', 'circular', 11, 8, 48, 'sudamericana', 11, NULL, '2024-10-25 19:30:19'),
(32, 2, 'argentina', 'gimnasia la plata', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/gimnasia_la_plata/', 31, 'grande', 'circular', 12, 8, 58, 'sudamericana', 12, NULL, '2024-10-25 19:30:19'),
(33, 2, 'argentina', 'lanus', 20, 15, 15, 20, 15, 'ligas/argentina/equipos/lanus/', 34, 'cuadrada', 'cuadriculada', 13, 7, 56, NULL, 11, NULL, '2024-10-25 19:30:18'),
(34, 2, 'argentina', 'banfield', 15, 3, 5, 15, 5, 'ligas/argentina/equipos/banfield/', 33, 'chica', 'rayada', 14, 7, 56, NULL, 9, NULL, '2024-10-25 19:30:18'),
(35, 2, 'argentina', 'argentinos juniors', 1, 15, 2, 1, 15, 'ligas/argentina/equipos/argentinos_juniors/', 53, 'cuadrada', 'lisa', 15, 7, 58, NULL, 3, NULL, '2024-10-25 19:30:18'),
(36, 2, 'argentina', 'godoy cruz', 2, 15, 15, 2, 15, 'ligas/argentina/equipos/godoy_cruz/', 56, 'grande', 'circular', 16, 7, 58, NULL, 16, NULL, '2024-10-25 19:30:18'),
(37, 2, 'argentina', 'colon', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/colon/', 38, 'chica', 'circular', 17, 6, 55, NULL, 2, NULL, '2024-10-25 19:30:18'),
(38, 2, 'argentina', 'union', 1, 15, 2, 24, 2, 'ligas/argentina/equipos/union/', 37, 'chica', 'cuadriculada', 18, 6, 58, NULL, 18, NULL, '2024-10-25 19:30:18'),
(39, 2, 'argentina', 'talleres cordoba', 10, 15, 20, 28, 20, 'ligas/argentina/equipos/talleres_cordoba/', 41, 'grande', 'romboide', 19, 6, 60, NULL, 19, NULL, '2024-10-25 19:30:18'),
(40, 2, 'argentina', 'instituto cordoba', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/instituto_cordoba/', 65, 'grande', 'romboide', 20, 6, 61, NULL, 1, NULL, '2024-10-25 19:30:18'),
(41, 2, 'argentina', 'belgrano cordoba', 6, 14, 14, 6, 15, 'ligas/argentina/equipos/belgrano_cordoba/', 39, 'grande', 'romboide', 21, 5, 61, NULL, 12, NULL, '2024-10-25 19:30:18'),
(42, 2, 'argentina', 'atletico rafaela', 6, 15, 4, 29, 2, 'ligas/argentina/equipos/atletico_rafaela/', 49, 'cuadrada', 'cuadriculada', 22, 5, 59, NULL, 22, NULL, '2024-10-25 19:30:18'),
(43, 2, 'argentina', 'quilmes', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/quilmes/', 44, 'cuadrada', 'rayada', 23, 5, 62, NULL, 23, NULL, '2024-10-25 19:30:18'),
(44, 2, 'argentina', 'arsenal', 6, 1, 15, 6, 15, 'ligas/argentina/equipos/arsenal/', 43, 'chica', 'lisa', 24, 5, 58, NULL, 5, NULL, '2024-10-25 19:30:18'),
(45, 2, 'argentina', 'aldosivi', 4, 3, 14, 35, 15, 'ligas/argentina/equipos/aldosivi/', 48, 'grande', 'circular', 25, 4, 57, NULL, 25, NULL, '2024-10-25 19:30:18'),
(46, 2, 'argentina', 'defensa y justicia', 4, 3, 3, 4, 3, 'ligas/argentina/equipos/defensa_y_justicia/', 55, 'chica', 'lisa', 26, 4, 48, NULL, 6, NULL, '2024-10-25 19:30:18'),
(47, 2, 'argentina', 'tigre', 2, 1, 1, 2, 15, 'ligas/argentina/equipos/tigre/', 63, 'chica', 'romboide', 27, 4, 60, NULL, 8, NULL, '2024-10-25 19:30:18'),
(48, 2, 'argentina', 'olimpo', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/olimpo/', 45, 'chica', 'rayada', 28, 4, 60, NULL, 28, NULL, '2024-10-25 19:30:18'),
(49, 2, 'argentina', 'san martin san juan', 3, 14, 14, 37, 15, 'ligas/argentina/equipos/san_martin_san_juan/', 42, 'cuadrada', 'rayada', 29, 3, 50, NULL, 5, NULL, '2024-10-25 19:30:18'),
(50, 2, 'argentina', 'all boys', 15, 14, 14, 15, 14, 'ligas/argentina/equipos/all_boys/', 52, 'cuadrada', 'cuadriculada', 30, 3, 54, NULL, 10, NULL, '2024-10-25 19:30:18'),
(51, 2, 'argentina', 'chacarita juniors', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/chacarita_juniors/', 59, 'cuadrada', 'cuadriculada', 31, 3, 43, NULL, 31, NULL, '2024-10-25 19:30:18'),
(52, 2, 'argentina', 'nueva chicago', 3, 14, 15, 37, 15, 'ligas/argentina/equipos/nueva_chicago/', 50, 'chica', 'circular', 32, 3, 54, NULL, 32, NULL, '2024-10-25 19:30:18'),
(53, 2, 'argentina', 'platense', 15, 13, 13, 15, 13, 'ligas/argentina/equipos/platense/', 35, 'chica', 'lisa', 33, 3, 49, NULL, 4, NULL, '2024-10-25 19:30:18'),
(54, 2, 'argentina', 'boca unidos', 4, 1, 10, 26, 15, 'ligas/argentina/equipos/boca_unidos/', 61, 'chica', 'lisa', 34, 2, 48, NULL, 34, NULL, '2024-10-25 19:30:18'),
(55, 2, 'argentina', 'temperley', 6, 15, 15, 6, 15, 'ligas/argentina/equipos/temperley/', 46, 'chica', 'romboide', 35, 2, 44, NULL, 7, NULL, '2024-10-25 19:30:18'),
(56, 2, 'argentina', 'independiente rivadavia', 10, 15, 15, 10, 15, 'ligas/argentina/equipos/independiente_rivadavia/', 36, 'grande', 'circular', 36, 2, 56, NULL, 36, NULL, '2024-10-25 19:30:18'),
(57, 2, 'argentina', 'gimnasia jujuy', 15, 6, 10, 29, 2, 'ligas/argentina/equipos/gimnasia_jujuy/', 68, 'grande', 'romboide', 37, 2, 38, NULL, 8, NULL, '2024-10-25 19:30:18'),
(58, 2, 'argentina', 'atletico tucuman', 6, 15, 4, 29, 32, 'ligas/argentina/equipos/atletico_tucuman/', 62, 'chica', 'cuadriculada', 38, 2, 50, NULL, 38, NULL, '2024-10-25 19:30:18'),
(59, 2, 'argentina', 'atlanta', 2, 4, 4, 27, 15, 'ligas/argentina/equipos/atlanta/', 51, 'cuadrada', 'lisa', 39, 1, 38, NULL, 2, NULL, '2024-10-25 19:30:18'),
(60, 2, 'argentina', 'sarmiento', 3, 15, 15, 3, 15, 'ligas/argentina/equipos/sarmiento/', 66, 'chica', 'rayada', 40, 1, 27, NULL, 40, NULL, '2024-10-25 19:30:18'),
(61, 2, 'argentina', 'patronato', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/patronato/', 54, 'chica', 'lisa', 41, 1, 29, NULL, 41, NULL, '2024-10-25 19:30:18'),
(62, 2, 'argentina', 'san martin tucuman', 1, 15, 15, 24, 15, 'ligas/argentina/equipos/san_martin_tucuman/', 58, 'chica', 'romboide', 42, 1, 23, NULL, 42, NULL, '2024-10-25 19:30:18'),
(63, 2, 'argentina', 'almagro', 6, 14, 15, 41, 15, 'ligas/argentina/equipos/almagro/', 47, 'chica', 'lisa', 43, 1, 26, NULL, 43, NULL, '2024-10-25 19:30:18'),
(64, 2, 'argentina', 'almirante brown', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/almirante_brown/', 67, 'chica', 'rayada', 44, 1, 22, NULL, 44, NULL, '2024-10-25 19:30:18'),
(65, 2, 'argentina', 'racing cordoba', 6, 15, 15, 29, 2, 'ligas/argentina/equipos/racing_cordoba/', 40, 'grande', 'romboide', 45, 1, 33, NULL, 45, NULL, '2024-10-25 19:30:18'),
(66, 2, 'argentina', 'douglas haid', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/douglas_haid/', 60, 'chica', 'romboide', 46, 1, 31, NULL, 46, NULL, '2024-10-25 19:30:18'),
(67, 2, 'argentina', 'deportivo moron', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/deportivo_moron/', 64, 'chica', 'lisa', 47, 1, 18, NULL, 3, NULL, '2024-10-25 19:30:18'),
(68, 2, 'argentina', 'crucero del norte', 4, 5, 2, 4, 2, 'ligas/argentina/equipos/crucero_del_norte/', 57, 'chica', 'lisa', 48, 1, 23, NULL, 48, NULL, '2024-10-25 19:30:18'),
(69, 3, 'colombia', 'atletico nacional', 3, 15, 15, 36, 14, 'ligas/colombia/equipos/atletico_nacional/', NULL, 'grande', 'rayada', 1, 10, 58, NULL, 2, NULL, '2024-10-25 19:30:18'),
(70, 3, 'colombia', 'america', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/america/', NULL, 'grande', 'cuadriculada', 2, 10, 54, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(71, 3, 'colombia', 'deportivo cali', 3, 15, 15, 3, 15, 'ligas/colombia/equipos/deportivo_cali/', NULL, 'mediana', 'rayada', 3, 9, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(72, 3, 'colombia', 'junior', 1, 15, 10, 24, 10, 'ligas/colombia/equipos/junior/', NULL, 'grande', 'cuadriculada', 4, 9, 58, 'libertadores', 7, NULL, '2024-10-25 19:30:19'),
(73, 3, 'colombia', 'independiente medellin', 1, 2, 15, 1, 15, 'ligas/colombia/equipos/independiente_medellin/', NULL, 'grande', 'cuadriculada', 5, 8, 60, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(74, 3, 'colombia', 'independiente santa fe', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/independiente_santa_fe/', NULL, 'mediana', 'romboide', 6, 8, 62, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(75, 3, 'colombia', 'millonarios', 2, 15, 15, 2, 15, 'ligas/colombia/equipos/millonarios/', NULL, 'mediana', 'cuadriculada', 7, 7, 52, 'sudamericana', 10, NULL, '2024-10-25 19:30:19'),
(76, 3, 'colombia', 'deportes tolima', 4, 1, 1, 26, 15, 'ligas/colombia/equipos/deportes_tolima/', NULL, 'grande', 'circular', 8, 7, 62, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(77, 3, 'colombia', 'once caldas', 15, 3, 1, 15, 14, 'ligas/colombia/equipos/once_caldas/', NULL, 'grande', 'circular', 9, 6, 49, NULL, 100, NULL, '2024-10-25 19:30:19'),
(78, 3, 'colombia', 'cucuta deportivo', 1, 14, 14, 34, 15, 'ligas/colombia/equipos/cucuta_deportivo/', NULL, 'grande', 'romboide', 10, 6, 62, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(79, 3, 'colombia', 'atletico huila', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_huila/', NULL, 'grande', 'cuadriculada', 11, 5, 59, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(80, 3, 'colombia', 'boyaca chico', 5, 10, 15, 5, 28, 'ligas/colombia/equipos/boyaca_chico/', NULL, 'mediana', 'cuadriculada', 12, 5, 57, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(81, 3, 'colombia', 'envigado', 5, 3, 15, 5, 15, 'ligas/colombia/equipos/envigado/', NULL, 'cuadrada', 'rayada', 13, 4, 52, 'sudamericana', 11, NULL, '2024-10-25 19:30:19'),
(82, 3, 'colombia', 'deportivo pasto', 1, 2, 4, 1, 4, 'ligas/colombia/equipos/deportivo_pasto/', NULL, 'grande', 'cuadriculada', 14, 4, 52, NULL, 100, NULL, '2024-10-25 19:30:18'),
(83, 3, 'colombia', 'la equidad', 15, 3, 4, 15, 3, 'ligas/colombia/equipos/la_equidad/', NULL, 'chica', 'romboide', 15, 3, 47, NULL, 100, NULL, '2024-10-25 19:30:18'),
(84, 3, 'colombia', 'aguilas doradas', 4, 14, 14, 4, 14, 'ligas/colombia/equipos/aguilas_doradas/', NULL, 'grande', 'romboide', 16, 3, 47, NULL, 100, NULL, '2024-10-25 19:30:19'),
(85, 3, 'colombia', 'atletico bucaramanga', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_bucaramanga/', NULL, 'grande', 'romboide', 17, 2, 31, NULL, 100, NULL, '2024-10-25 19:30:18'),
(86, 3, 'colombia', 'real cartagena', 4, 3, 1, 4, 3, 'ligas/colombia/equipos/real_cartagena/', NULL, 'grande', 'lisa', 18, 2, 34, NULL, 100, NULL, '2024-10-25 19:30:18'),
(87, 3, 'colombia', 'alianza petrolera', 4, 14, 14, 31, 15, 'ligas/colombia/equipos/alianza_petrolera/', NULL, 'chica', 'lisa', 19, 1, 20, NULL, 100, NULL, '2024-10-25 19:30:18'),
(88, 3, 'colombia', 'patriotas', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/patriotas/', NULL, 'chica', 'lisa', 20, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:18'),
(89, 4, 'uruguay', 'peñarol', 4, 14, 14, 31, 16, 'ligas/uruguay/equipos/peñarol/', NULL, 'grande', 'cuadriculada', 1, 10, 58, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(90, 4, 'uruguay', 'nacional', 15, 1, 2, 15, 1, 'ligas/uruguay/equipos/nacional/', NULL, 'grande', 'cuadriculada', 2, 10, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(91, 4, 'uruguay', 'defensor sporting', 12, 15, 1, 12, 15, 'ligas/uruguay/equipos/defensor_sporting/', NULL, 'grande', 'cuadriculada', 3, 9, 54, 'sudamericana', 10, NULL, '2024-10-25 19:30:19'),
(92, 4, 'uruguay', 'montevideo wanderers', 14, 15, 15, 33, 16, 'ligas/uruguay/equipos/montevideo_wanderers/', NULL, 'grande', 'cuadriculada', 4, 9, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(93, 4, 'uruguay', 'danubio', 15, 14, 14, 15, 14, 'ligas/uruguay/equipos/danubio/', NULL, 'cuadrada', 'rayada', 5, 8, 52, NULL, 100, NULL, '2024-10-25 19:30:19'),
(94, 4, 'uruguay', 'liverpool', 2, 14, 15, 32, 15, 'ligas/uruguay/equipos/liverpool/', NULL, 'mediana', 'cuadriculada', 6, 8, 62, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(95, 4, 'uruguay', 'river montevideo', 15, 1, 1, 24, 14, 'ligas/uruguay/equipos/river_montevideo/', NULL, 'grande', 'cuadriculada', 7, 7, 58, 'libertadores', 7, NULL, '2024-10-25 19:30:19'),
(96, 4, 'uruguay', 'fenix', 15, 12, 4, 28, 32, 'ligas/uruguay/equipos/fenix/', NULL, 'chica', 'romboide', 8, 7, 50, NULL, 100, NULL, '2024-10-25 19:30:19'),
(97, 4, 'uruguay', 'central español', 1, 2, 15, 1, 15, 'ligas/uruguay/equipos/central_español/', NULL, 'grande', 'cuadriculada', 9, 6, 50, NULL, 100, NULL, '2024-10-25 19:30:19'),
(98, 4, 'uruguay', 'cerro largo', 2, 15, 15, 28, 15, 'ligas/uruguay/equipos/cerro_largo/', NULL, 'chica', 'lisa', 10, 6, 60, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(99, 4, 'uruguay', 'atenas', 10, 1, 15, 10, 15, 'ligas/uruguay/equipos/atenas/', NULL, 'chica', 'cuadriculada', 11, 5, 53, 'sudamericana', 11, NULL, '2024-10-25 19:30:19'),
(100, 4, 'uruguay', 'racing montevideo', 15, 3, 14, 36, 15, 'ligas/uruguay/equipos/racing_montevideo/', NULL, 'chica', 'rayada', 12, 5, 56, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(101, 4, 'uruguay', 'cerro', 15, 6, 6, 29, 14, 'ligas/uruguay/equipos/cerro/', NULL, 'grande', 'lisa', 13, 4, 60, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(102, 4, 'uruguay', 'tacuarembo', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/tacuarembo/', NULL, 'cuadrada', 'rayada', 14, 4, 52, NULL, 100, NULL, '2024-10-25 19:30:18'),
(103, 4, 'uruguay', 'rentistas', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/rentistas/', NULL, 'chica', 'rayada', 15, 3, 48, NULL, 100, NULL, '2024-10-25 19:30:18'),
(104, 4, 'uruguay', 'bella vista', 15, 4, 2, 8, 2, 'ligas/uruguay/equipos/bella_vista/', NULL, 'chica', 'cuadriculada', 16, 3, 56, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(105, 4, 'uruguay', 'rocha', 6, 14, 4, 6, 15, 'ligas/uruguay/equipos/rocha/', NULL, 'chica', 'romboide', 17, 2, 34, NULL, 100, NULL, '2024-10-25 19:30:18'),
(106, 4, 'uruguay', 'el tanque sisley', 3, 14, 15, 37, 15, 'ligas/uruguay/equipos/el_tanque_sisley/', NULL, 'chica', 'lisa', 18, 2, 43, NULL, 100, NULL, '2024-10-25 19:30:19'),
(107, 4, 'uruguay', 'deportivo colonia', 1, 15, 10, 1, 15, 'ligas/uruguay/equipos/deportivo_colonia/', NULL, 'chica', 'circular', 19, 1, 23, NULL, 100, NULL, '2024-10-25 19:30:18'),
(108, 4, 'uruguay', 'cerrito', 4, 3, 3, 4, 3, 'ligas/uruguay/equipos/cerrito/', NULL, 'chica', 'lisa', 20, 1, 30, NULL, 100, NULL, '2024-10-25 19:30:18'),
(109, 5, 'paraguay', 'olimpia', 15, 14, 14, 15, 14, 'ligas/paraguay/equipos/olimpia/', NULL, 'mediana', 'cuadriculada', 1, 10, 50, NULL, 100, NULL, '2024-10-25 19:30:19'),
(110, 5, 'paraguay', 'cerro porteño', 10, 1, 15, 23, 15, 'ligas/paraguay/equipos/cerro_porteño/', NULL, 'grande', 'romboide', 2, 9, 64, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(111, 5, 'paraguay', 'club nacional', 15, 1, 2, 15, 1, 'ligas/paraguay/equipos/club_nacional/', NULL, 'mediana', 'cuadriculada', 3, 8, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(112, 5, 'paraguay', 'libertad', 15, 14, 14, 33, 1, 'ligas/paraguay/equipos/libertad/', NULL, 'chica', 'rayada', 4, 7, 58, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(113, 5, 'paraguay', 'guarani', 4, 14, 14, 31, 15, 'ligas/paraguay/equipos/guarani/', NULL, 'mediana', 'cuadriculada', 5, 6, 52, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(114, 5, 'paraguay', 'sportivo luqueño', 2, 4, 4, 27, 15, 'ligas/paraguay/equipos/sportivo_luqueño/', NULL, 'mediana', 'romboide', 6, 6, 56, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(115, 5, 'paraguay', 'tacuari', 14, 15, 15, 33, 15, 'ligas/paraguay/equipos/tacuari/', NULL, 'chica', 'rayada', 7, 5, 54, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(116, 5, 'paraguay', 'sol de america', 2, 15, 15, 2, 15, 'ligas/paraguay/equipos/sol_de_america/', NULL, 'chica', 'circular', 8, 5, 56, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(117, 5, 'paraguay', 'deportivo capiata', 4, 2, 15, 27, 15, 'ligas/paraguay/equipos/deportivo_capiata/', NULL, 'chica', 'circular', 9, 4, 50, NULL, 100, NULL, '2024-10-25 19:30:18'),
(118, 5, 'paraguay', 'sportivo carapegüa', 1, 15, 15, 24, 15, 'ligas/paraguay/equipos/sportivo_carapegüa/', NULL, 'mediana', 'cuadriculada', 10, 4, 59, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(119, 5, 'paraguay', 'sportivo san lorenzo', 15, 1, 2, 15, 2, 'ligas/paraguay/equipos/sportivo_san_lorenzo/', NULL, 'mediana', 'lisa', 11, 3, 54, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(120, 5, 'paraguay', 'rubio ñu', 15, 3, 3, 36, 3, 'ligas/paraguay/equipos/rubio_ñu/', NULL, 'chica', 'romboide', 12, 3, 59, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(121, 5, 'paraguay', '12 de octubre', 15, 2, 2, 28, 15, 'ligas/paraguay/equipos/12_de_octubre/', NULL, 'chica', 'cuadriculada', 13, 2, 38, NULL, 100, NULL, '2024-10-25 19:30:18'),
(122, 5, 'paraguay', '3 de febrero', 1, 15, 15, 1, 15, 'ligas/paraguay/equipos/3_de_febrero/', NULL, 'chica', 'lisa', 14, 2, 38, NULL, 100, NULL, '2024-10-25 19:30:19'),
(123, 5, 'paraguay', 'trinidense', 2, 4, 4, 2, 4, 'ligas/paraguay/equipos/trinidense/', NULL, 'chica', 'romboide', 15, 1, 21, NULL, 100, NULL, '2024-10-25 19:30:18'),
(124, 5, 'paraguay', 'cerro cora', 1, 14, 14, 34, 15, 'ligas/paraguay/equipos/cerro_cora/', NULL, 'chica', 'lisa', 16, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:18'),
(125, 6, 'chile', 'colo colo', 15, 14, 14, 15, 14, 'ligas/chile/equipos/colo_colo/', NULL, 'mediana', 'circular', 1, 10, 58, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(126, 6, 'chile', 'universidad de chile', 2, 15, 1, 2, 15, 'ligas/chile/equipos/universidad_de_chile/', NULL, 'grande', 'cuadriculada', 2, 9, 58, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(127, 6, 'chile', 'universidad catolica', 15, 2, 1, 15, 1, 'ligas/chile/equipos/universidad_catolica/', NULL, 'chica', 'romboide', 3, 8, 54, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(128, 6, 'chile', 'cobreloa', 5, 14, 15, 5, 15, 'ligas/chile/equipos/cobreloa/', NULL, 'cuadrada', 'rayada', 4, 7, 46, NULL, 100, NULL, '2024-10-25 19:30:19'),
(129, 6, 'chile', 'union española', 1, 4, 10, 1, 4, 'ligas/chile/equipos/union_española/', NULL, 'cuadrada', 'cuadriculada', 5, 6, 55, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(130, 6, 'chile', 'deportes concepcion', 12, 15, 4, 12, 15, 'ligas/chile/equipos/deportes_concepcion/', NULL, 'grande', 'rayada', 6, 6, 51, 'sudamericana', 9, NULL, '2024-10-25 19:30:19'),
(131, 6, 'chile', 'cobresal', 15, 5, 3, 15, 5, 'ligas/chile/equipos/cobresal/', NULL, 'grande', 'rayada', 7, 5, 52, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(132, 6, 'chile', 'huachipato', 2, 14, 14, 32, 15, 'ligas/chile/equipos/huachipato/', NULL, 'cuadrada', 'rayada', 8, 5, 54, 'libertadores', 6, NULL, '2024-10-25 19:30:19'),
(133, 6, 'chile', 'palestino', 15, 3, 1, 15, 37, 'ligas/chile/equipos/palestino/', NULL, 'grande', 'romboide', 9, 4, 49, NULL, 100, NULL, '2024-10-25 19:30:19'),
(134, 6, 'chile', 'deportes iquique', 6, 14, 14, 6, 14, 'ligas/chile/equipos/deportes_iquique/', NULL, 'grande', 'romboide', 10, 4, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(135, 6, 'chile', 'coquimbo unido', 4, 14, 14, 4, 14, 'ligas/chile/equipos/coquimbo_unido/', NULL, 'grande', 'circular', 11, 3, 40, NULL, 100, NULL, '2024-10-25 19:30:19'),
(136, 6, 'chile', 'everton', 10, 4, 4, 10, 4, 'ligas/chile/equipos/everton/', NULL, 'grande', 'lisa', 12, 3, 39, NULL, 100, NULL, '2024-10-25 19:30:18'),
(137, 6, 'chile', 'deportes antofagasta', 15, 2, 1, 15, 2, 'ligas/chile/equipos/deportes_antofagasta/', NULL, 'grande', 'rayada', 13, 2, 37, NULL, 100, NULL, '2024-10-25 19:30:18'),
(138, 6, 'chile', 'audax italiano', 3, 15, 15, 3, 15, 'ligas/chile/equipos/audax_italiano/', NULL, 'cuadrada', 'rayada', 14, 2, 53, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(139, 6, 'chile', 'santiago wanderers', 3, 15, 15, 3, 15, 'ligas/chile/equipos/santiago_wanderers/', NULL, 'grande', 'romboide', 15, 1, 30, NULL, 100, NULL, '2024-10-25 19:30:18'),
(140, 6, 'chile', 'ohiggins', 6, 14, 4, 6, 4, 'ligas/chile/equipos/ohiggins/', NULL, 'grande', 'lisa', 16, 1, 24, NULL, 100, NULL, '2024-10-25 19:30:18'),
(141, 7, 'ecuador', 'barcelona', 4, 1, 14, 4, 1, 'ligas/ecuador/equipos/barcelona/', NULL, 'mediana', 'rayada', 1, 10, 64, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(142, 7, 'ecuador', 'el nacional', 1, 2, 15, 1, 15, 'ligas/ecuador/equipos/el_nacional/', NULL, 'grande', 'circular', 2, 9, 60, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(143, 7, 'ecuador', 'liga deportiva', 15, 10, 1, 15, 10, 'ligas/ecuador/equipos/liga_deportiva/', NULL, 'mediana', 'cuadriculada', 3, 8, 52, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(144, 7, 'ecuador', 'emelec', 2, 15, 6, 2, 15, 'ligas/ecuador/equipos/emelec/', NULL, 'cuadrada', 'rayada', 4, 7, 46, NULL, 100, NULL, '2024-10-25 19:30:19'),
(145, 7, 'ecuador', 'deportivo quito', 2, 1, 15, 23, 15, 'ligas/ecuador/equipos/deportivo_quito/', NULL, 'grande', 'circular', 5, 6, 58, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(146, 7, 'ecuador', 'liga de loja', 15, 1, 3, 15, 1, 'ligas/ecuador/equipos/liga_de_loja/', NULL, 'grande', 'circular', 6, 5, 56, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(147, 7, 'ecuador', 'deportivo cuenca', 1, 14, 14, 1, 15, 'ligas/ecuador/equipos/deportivo_cuenca/', NULL, 'mediana', 'romboide', 7, 4, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(148, 7, 'ecuador', 'independiente del valle', 2, 14, 4, 32, 15, 'ligas/ecuador/equipos/independiente_del_valle/', NULL, 'chica', 'lisa', 8, 4, 47, NULL, 100, NULL, '2024-10-25 19:30:19'),
(149, 7, 'ecuador', 'deportivo olmedo', 10, 15, 1, 10, 4, 'ligas/ecuador/equipos/deportivo_olmedo/', NULL, 'chica', 'circular', 9, 3, 47, NULL, 100, NULL, '2024-10-25 19:30:18'),
(150, 7, 'ecuador', 'manta fc', 6, 10, 10, 6, 15, 'ligas/ecuador/equipos/manta_fc/', NULL, 'cuadrada', 'rayada', 10, 3, 55, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(151, 7, 'ecuador', 'macara', 6, 15, 10, 6, 15, 'ligas/ecuador/equipos/macara/', NULL, 'chica', 'romboide', 11, 2, 50, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(152, 7, 'ecuador', 'deportivo azogues', 3, 15, 1, 3, 15, 'ligas/ecuador/equipos/deportivo_azogues/', NULL, 'chica', 'cuadriculada', 12, 2, 35, NULL, 100, NULL, '2024-10-25 19:30:18'),
(153, 7, 'ecuador', 'tecnico universitario', 1, 15, 15, 24, 27, 'ligas/ecuador/equipos/tecnico_universitario/', NULL, 'chica', 'cuadriculada', 13, 1, 27, NULL, 100, NULL, '2024-10-25 19:30:18'),
(154, 7, 'ecuador', 'aucas', 4, 1, 1, 4, 16, 'ligas/ecuador/equipos/aucas/', NULL, 'chica', 'lisa', 14, 1, 37, NULL, 100, NULL, '2024-10-25 19:30:18'),
(155, 8, 'bolivia', 'bolivar', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/bolivar/', NULL, 'grande', 'rayada', 1, 10, 52, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(156, 8, 'bolivia', 'oriente petrolero', 3, 15, 15, 3, 15, 'ligas/bolivia/equipos/oriente_petrolero/', NULL, 'grande', 'cuadriculada', 2, 9, 50, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(157, 8, 'bolivia', 'blooming', 6, 15, 2, 6, 15, 'ligas/bolivia/equipos/blooming/', NULL, 'grande', 'romboide', 3, 8, 48, 'sudamericana', 8, NULL, '2024-10-25 19:30:19'),
(158, 8, 'bolivia', 'the stronguest', 4, 14, 14, 31, 15, 'ligas/bolivia/equipos/the_stronguest/', NULL, 'grande', 'rayada', 4, 7, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(159, 8, 'bolivia', 'real potosi', 12, 15, 15, 12, 15, 'ligas/bolivia/equipos/real_potosi/', NULL, 'grande', 'circular', 5, 6, 54, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(160, 8, 'bolivia', 'la paz fc', 2, 1, 15, 23, 15, 'ligas/bolivia/equipos/la_paz_fc/', NULL, 'grande', 'rayada', 6, 5, 56, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(161, 8, 'bolivia', 'jorge wilsterman', 1, 15, 10, 1, 15, 'ligas/bolivia/equipos/jorge_wilsterman/', NULL, 'grande', 'cuadriculada', 7, 4, 53, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(162, 8, 'bolivia', 'san jose', 15, 2, 2, 15, 2, 'ligas/bolivia/equipos/san_jose/', NULL, 'grande', 'cuadriculada', 8, 3, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(163, 8, 'bolivia', 'universitario sucre', 2, 1, 15, 2, 15, 'ligas/bolivia/equipos/universitario_sucre/', NULL, 'grande', 'lisa', 9, 2, 41, NULL, 100, NULL, '2024-10-25 19:30:19'),
(164, 8, 'bolivia', 'aurora', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/aurora/', NULL, 'grande', 'cuadriculada', 10, 2, 50, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(165, 8, 'bolivia', 'guabira', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/guabira/', NULL, 'chica', 'lisa', 11, 1, 18, NULL, 100, NULL, '2024-10-25 19:30:18'),
(166, 8, 'bolivia', 'santa cruz', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/santa_cruz/', NULL, 'chica', 'romboide', 12, 1, 35, NULL, 100, NULL, '2024-10-25 19:30:18'),
(167, 9, 'peru', 'sporting cristal', 6, 15, 4, 6, 15, 'ligas/peru/equipos/sporting_cristal/', NULL, 'mediana', 'rayada', 1, 10, 42, NULL, 100, NULL, '2024-10-25 19:30:19'),
(168, 9, 'peru', 'alianza lima', 10, 15, 15, 28, 15, 'ligas/peru/equipos/alianza_lima/', NULL, 'mediana', 'cuadriculada', 2, 9, 56, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(169, 9, 'peru', 'universitario', 8, 1, 14, 8, 1, 'ligas/peru/equipos/universitario/', NULL, 'mediana', 'circular', 3, 8, 58, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(170, 9, 'peru', 'cienciano', 1, 15, 15, 1, 15, 'ligas/peru/equipos/cienciano/', NULL, 'mediana', 'romboide', 4, 7, 60, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(171, 9, 'peru', 'juan aurich', 1, 15, 15, 1, 15, 'ligas/peru/equipos/juan_aurich/', NULL, 'grande', 'lisa', 5, 6, 50, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(172, 9, 'peru', 'cesar vallejo', 10, 6, 15, 2, 5, 'ligas/peru/equipos/cesar_vallejo/', NULL, 'mediana', 'circular', 6, 5, 49, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(173, 9, 'peru', 'sport huancayo', 1, 4, 3, 1, 3, 'ligas/peru/equipos/sport_huancayo/', NULL, 'grande', 'romboide', 7, 4, 55, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(174, 9, 'peru', 'real garcilaso', 6, 15, 15, 6, 15, 'ligas/peru/equipos/real_garcilaso/', NULL, 'grande', 'cuadriculada', 8, 3, 42, NULL, 100, NULL, '2024-10-25 19:30:18'),
(175, 9, 'peru', 'alianza atletico', 15, 2, 2, 15, 2, 'ligas/peru/equipos/alianza_atletico/', NULL, 'grande', 'romboide', 9, 2, 48, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(176, 9, 'peru', 'sport boys', 9, 14, 14, 9, 14, 'ligas/peru/equipos/sport_boys/', NULL, 'grande', 'romboide', 10, 2, 42, NULL, 100, NULL, '2024-10-25 19:30:18'),
(177, 9, 'peru', 'fc melgar', 14, 1, 1, 34, 15, 'ligas/peru/equipos/fc_melgar/', NULL, 'chica', 'lisa', 11, 1, 26, NULL, 100, NULL, '2024-10-25 19:30:18'),
(178, 9, 'peru', 'sport ancash', 3, 4, 4, 3, 4, 'ligas/peru/equipos/sport_ancash/', NULL, 'cuadrada', 'cuadriculada', 12, 1, 25, NULL, 100, NULL, '2024-10-25 19:30:18'),
(179, 10, 'venezuela', 'caracas fc', 1, 15, 14, 1, 15, 'ligas/venezuela/equipos/caracas_fc/', NULL, 'grande', 'lisa', 1, 10, 60, 'libertadores', 2, NULL, '2024-10-25 19:30:19'),
(180, 10, 'venezuela', 'minerven', 10, 15, 15, 10, 15, 'ligas/venezuela/equipos/minerven/', NULL, 'grande', 'cuadriculada', 2, 9, 60, 'libertadores', 3, NULL, '2024-10-25 19:30:19'),
(181, 10, 'venezuela', 'deportivo tachira', 4, 14, 15, 31, 15, 'ligas/venezuela/equipos/deportivo_tachira/', NULL, 'grande', 'romboide', 3, 8, 62, 'libertadores', 1, NULL, '2024-10-25 19:30:19'),
(182, 10, 'venezuela', 'atletico maracaibo', 2, 1, 1, 23, 15, 'ligas/venezuela/equipos/atletico_maracaibo/', NULL, 'grande', 'cuadriculada', 4, 7, 50, 'sudamericana', 7, NULL, '2024-10-25 19:30:19'),
(183, 10, 'venezuela', 'estudiantes merida', 1, 15, 2, 24, 36, 'ligas/venezuela/equipos/estudiantes_merida/', NULL, 'grande', 'circular', 5, 6, 59, 'libertadores', 4, NULL, '2024-10-25 19:30:19'),
(184, 10, 'venezuela', 'deportivo anzoategui', 1, 4, 4, 26, 15, 'ligas/venezuela/equipos/deportivo_anzoategui/', NULL, 'grande', 'cuadriculada', 6, 5, 52, 'sudamericana', 6, NULL, '2024-10-25 19:30:19'),
(185, 10, 'venezuela', 'zamora fc', 15, 14, 14, 33, 15, 'ligas/venezuela/equipos/zamora_fc/', NULL, 'mediana', 'lisa', 7, 4, 58, 'libertadores', 5, NULL, '2024-10-25 19:30:19'),
(186, 10, 'venezuela', 'carabobo fc', 20, 4, 2, 20, 15, 'ligas/venezuela/equipos/carabobo_fc/', NULL, 'mediana', 'cuadriculada', 8, 3, 50, NULL, 100, NULL, '2024-10-25 19:30:18'),
(187, 10, 'venezuela', 'trujillanos', 4, 13, 13, 30, 15, 'ligas/venezuela/equipos/trujillanos/', NULL, 'grande', 'lisa', 9, 2, 50, NULL, 100, NULL, '2024-10-25 19:30:18'),
(188, 10, 'venezuela', 'pepeganga', 12, 15, 15, 12, 15, 'ligas/venezuela/equipos/pepeganga/', NULL, 'mediana', 'circular', 10, 2, 49, NULL, 100, NULL, '2024-10-25 19:30:19'),
(189, 10, 'venezuela', 'mineros de guayana', 2, 14, 14, 32, 15, 'ligas/venezuela/equipos/mineros_de_guayana/', NULL, 'grande', 'cuadriculada', 11, 1, 27, NULL, 100, NULL, '2024-10-25 19:30:18'),
(190, 10, 'venezuela', 'portuguesa fc', 1, 14, 14, 34, 15, 'ligas/venezuela/equipos/portuguesa_fc/', NULL, 'chica', 'romboide', 12, 1, 36, NULL, 100, NULL, '2024-10-25 19:30:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_grupo`
--

CREATE TABLE `equipos_grupo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `equipo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `equipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `j` int(11) NOT NULL DEFAULT 0,
  `g` int(11) NOT NULL DEFAULT 0,
  `e` int(11) NOT NULL DEFAULT 0,
  `p` int(11) NOT NULL DEFAULT 0,
  `gf` int(11) NOT NULL DEFAULT 0,
  `gc` int(11) NOT NULL DEFAULT 0,
  `gv` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `pts` int(11) NOT NULL DEFAULT 0,
  `pos` int(11) NOT NULL DEFAULT 0,
  `penales` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `nivel` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipos_grupo`
--

INSERT INTO `equipos_grupo` (`id`, `grupo_id`, `equipo_id`, `equipo`, `j`, `g`, `e`, `p`, `gf`, `gc`, `gv`, `d`, `pts`, `pos`, `penales`, `order`, `nivel`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'san pablo fc', 2, 1, 0, 1, 3, 3, 0, 0, 3, 1, 1, 1, 10, 2, '2024-11-03 04:28:47', '2024-11-24 16:41:37'),
(2, 1, 69, 'atletico nacional', 2, 1, 0, 1, 3, 3, 1, 0, 3, 2, 0, 2, 8, -1, '2024-11-03 04:28:48', '2024-11-24 16:41:37'),
(3, 2, 29, 'huracan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(4, 2, 35, 'argentinos juniors', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 7, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(5, 2, 54, 'boca unidos', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(6, 2, 67, 'deportivo moron', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(7, 3, 21, 'river plate', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(8, 3, 44, 'arsenal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(9, 3, 56, 'independiente rivadavia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(10, 3, 57, 'gimnasia jujuy', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(11, 4, 28, 'rosario central', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(12, 4, 37, 'colon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(13, 4, 45, 'aldosivi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(14, 4, 61, 'patronato', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(15, 5, 31, 'estudiantes la plata', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(16, 5, 41, 'belgrano cordoba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(17, 5, 55, 'temperley', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(18, 5, 63, 'almagro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(19, 6, 25, 'independiente', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(20, 6, 39, 'talleres cordoba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(21, 6, 52, 'nueva chicago', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(22, 6, 60, 'sarmiento', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(23, 7, 22, 'boca juniors', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(24, 7, 33, 'lanus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 7, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(25, 7, 49, 'san martin san juan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(26, 7, 68, 'crucero del norte', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(27, 8, 27, 'newells old boys', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(28, 8, 38, 'union', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(29, 8, 46, 'defensa y justicia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(30, 8, 65, 'racing cordoba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(31, 9, 30, 'ferrocarril oeste', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(32, 9, 40, 'instituto cordoba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(33, 9, 53, 'platense', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(34, 9, 64, 'almirante brown', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(35, 10, 26, 'racing club', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(36, 10, 36, 'godoy cruz', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 7, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(37, 10, 47, 'tigre', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(38, 10, 58, 'atletico tucuman', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(39, 11, 32, 'gimnasia la plata', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(40, 11, 43, 'quilmes', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(41, 11, 50, 'all boys', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(42, 11, 59, 'atlanta', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(43, 12, 23, 'san lorenzo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(44, 12, 34, 'banfield', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 7, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(45, 12, 51, 'chacarita juniors', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(46, 12, 62, 'san martin tucuman', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(47, 13, 24, 'velez sarsfield', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(48, 13, 42, 'atletico rafaela', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(49, 13, 48, 'olimpo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(50, 13, 66, 'douglas haid', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(51, 14, 31, 'estudiantes la plata', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(52, 14, 81, 'envigado', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 4, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(53, 14, 143, 'liga deportiva', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 8, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(54, 14, 182, 'atletico maracaibo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 7, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(55, 15, 12, 'botafogo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(56, 15, 100, 'racing montevideo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(57, 15, 131, 'cobresal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 5, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(58, 15, 151, 'macara', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(59, 16, 27, 'newells old boys', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(60, 16, 75, 'millonarios', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 7, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(61, 16, 113, 'guarani', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 6, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(62, 16, 175, 'alianza atletico', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(63, 17, 6, 'corinthians', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(64, 17, 80, 'boyaca chico', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(65, 17, 138, 'audax italiano', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(66, 17, 164, 'aurora', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(67, 18, 7, 'santos fc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 7, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(68, 18, 91, 'defensor sporting', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 9, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(69, 18, 130, 'deportes concepcion', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 6, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(70, 18, 184, 'deportivo anzoategui', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(71, 19, 32, 'gimnasia la plata', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(72, 19, 104, 'bella vista', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(73, 19, 115, 'tacuari', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 5, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(74, 19, 156, 'oriente petrolero', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 9, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(75, 20, 16, 'chapecoense', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(76, 20, 70, 'america', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(77, 20, 150, 'manta fc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(78, 20, 157, 'blooming', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 8, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(79, 21, 28, 'rosario central', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(80, 21, 99, 'atenas', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(81, 21, 119, 'sportivo san lorenzo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(82, 21, 172, 'cesar vallejo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(83, 22, 1, 'san pablo fc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(84, 22, 78, 'cucuta deportivo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(85, 22, 134, 'deportes iquique', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(86, 22, 168, 'alianza lima', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 9, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(87, 23, 10, 'internacional', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 6, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(88, 23, 76, 'deportes tolima', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 7, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(89, 23, 142, 'el nacional', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 9, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(90, 23, 173, 'sport huancayo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(91, 24, 21, 'river plate', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(92, 24, 95, 'river montevideo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 7, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(93, 24, 118, 'sportivo carapegüa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(94, 24, 161, 'jorge wilsterman', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(95, 25, 2, 'cruzeiro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(96, 25, 92, 'montevideo wanderers', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 9, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(97, 25, 141, 'barcelona', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(98, 25, 183, 'estudiantes merida', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 6, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(99, 26, 11, 'atletico mineiro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(100, 26, 74, 'independiente santa fe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 8, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(101, 26, 127, 'universidad catolica', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 8, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(102, 26, 169, 'universitario', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 8, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(103, 27, 8, 'vasco da gama', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 7, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(104, 27, 30, 'ferrocarril oeste', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 8, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(105, 27, 112, 'libertad', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 7, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(106, 27, 170, 'cienciano', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 7, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(107, 28, 23, 'san lorenzo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(108, 28, 89, 'peñarol', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(109, 28, 125, 'colo colo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(110, 28, 158, 'the stronguest', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 7, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(111, 29, 25, 'independiente', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(112, 29, 71, 'deportivo cali', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 9, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(113, 29, 120, 'rubio ñu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(114, 29, 159, 'real potosi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 6, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(115, 30, 69, 'atletico nacional', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(116, 30, 26, 'racing club', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 9, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(117, 30, 110, 'cerro porteño', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 9, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(118, 30, 146, 'liga de loja', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(119, 31, 4, 'gremio', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(120, 31, 90, 'nacional', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 10, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(121, 31, 129, 'union española', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 6, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(122, 31, 160, 'la paz fc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(123, 32, 24, 'velez sarsfield', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(124, 32, 79, 'atletico huila', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 5, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(125, 32, 132, 'huachipato', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 5, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(126, 32, 171, 'juan aurich', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 6, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(127, 33, 22, 'boca juniors', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(128, 33, 73, 'independiente medellin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 8, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(129, 33, 116, 'sol de america', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 5, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(130, 33, 155, 'bolivar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(131, 34, 9, 'fluminense', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 6, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(132, 34, 94, 'liverpool', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 8, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(133, 34, 147, 'deportivo cuenca', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(134, 34, 181, 'deportivo tachira', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 8, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(135, 35, 29, 'huracan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(136, 35, 98, 'cerro largo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(137, 35, 114, 'sportivo luqueño', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 6, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(138, 35, 185, 'zamora fc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(139, 36, 3, 'flamengo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 9, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(140, 36, 101, 'cerro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 4, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(141, 36, 145, 'deportivo quito', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 6, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(142, 36, 180, 'minerven', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 9, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(143, 37, 5, 'palmeiras', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 8, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(144, 37, 72, 'junior', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 9, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(145, 37, 126, 'universidad de chile', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 9, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(146, 37, 179, 'caracas fc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 10, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goleadores`
--

CREATE TABLE `goleadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `equipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `goles` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `goleadores`
--

INSERT INTO `goleadores` (`id`, `equipo_id`, `equipo`, `anio`, `copa`, `zona`, `numero`, `goles`, `created_at`, `updated_at`) VALUES
(1, 69, 'atletico nacional', 2000, 'recopa', NULL, 10, 1, '2024-11-21 03:12:00', '2024-11-21 03:12:00'),
(2, 69, 'atletico nacional', 2000, 'recopa', NULL, 9, 1, '2024-11-21 03:12:00', '2024-11-21 03:12:00'),
(3, 1, 'san pablo fc', 2000, 'recopa', NULL, 9, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37'),
(4, 69, 'atletico nacional', 2000, 'recopa', NULL, 7, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37'),
(5, 1, 'san pablo fc', 2000, 'recopa', NULL, 7, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37'),
(6, 1, 'san pablo fc', 2000, 'recopa', NULL, 5, 1, '2024-11-24 16:41:37', '2024-11-24 16:41:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fase` int(11) NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `anio`, `grupo`, `copa`, `fase`, `zona`, `completed`, `created_at`, `updated_at`) VALUES
(1, 2000, 1, 'recopa', 5, NULL, 1, '2024-11-03 04:28:47', '2024-11-24 16:41:37'),
(2, 2000, 1, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(3, 2000, 2, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(4, 2000, 3, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(5, 2000, 4, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(6, 2000, 5, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(7, 2000, 6, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(8, 2000, 7, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(9, 2000, 8, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(10, 2000, 9, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(11, 2000, 10, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(12, 2000, 11, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(13, 2000, 12, 'afa', -2, 'A', 0, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(14, 2000, 1, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(15, 2000, 2, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:07', '2024-11-25 00:42:07'),
(16, 2000, 3, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(17, 2000, 4, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(18, 2000, 5, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(19, 2000, 6, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(20, 2000, 7, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(21, 2000, 8, 'sudamericana', 0, NULL, 0, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(22, 2000, 1, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(23, 2000, 2, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(24, 2000, 3, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(25, 2000, 4, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(26, 2000, 5, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(27, 2000, 6, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(28, 2000, 7, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(29, 2000, 8, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(30, 2000, 9, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:09', '2024-11-25 00:42:09'),
(31, 2000, 10, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(32, 2000, 11, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(33, 2000, 12, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(34, 2000, 13, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(35, 2000, 14, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(36, 2000, 15, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(37, 2000, 16, 'libertadores', 0, NULL, 0, '2024-11-25 00:42:10', '2024-11-25 00:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bandera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a` bigint(20) UNSIGNED DEFAULT NULL,
  `b` bigint(20) UNSIGNED DEFAULT NULL,
  `c` bigint(20) UNSIGNED DEFAULT NULL,
  `copas` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ligas`
--

INSERT INTO `ligas` (`id`, `name`, `bandera`, `a`, `b`, `c`, `copas`, `created_at`, `updated_at`) VALUES
(1, 'brasil', 'ligas/brasil/bandera.png', 4, 3, 2, 0, '2023-08-14 02:37:09', '2023-08-14 02:37:09'),
(2, 'argentina', 'ligas/argentina/bandera.png', 6, 15, 14, 0, '2023-08-14 03:35:26', '2023-08-14 03:35:26'),
(3, 'colombia', 'ligas/colombia/bandera.png', 4, 1, 2, 0, '2023-08-14 03:36:23', '2023-08-14 03:36:23'),
(4, 'uruguay', 'ligas/uruguay/bandera.png', 6, 14, 15, 0, '2023-08-14 03:37:11', '2023-08-14 03:37:11'),
(5, 'paraguay', 'ligas/paraguay/bandera.png', 1, 15, 2, 0, '2023-08-14 03:37:34', '2023-08-14 03:37:34'),
(6, 'chile', 'ligas/chile/bandera.png', 1, 2, 15, 0, '2023-08-14 03:37:59', '2023-08-14 03:37:59'),
(7, 'ecuador', 'ligas/ecuador/bandera.png', 4, 2, 1, 0, '2023-08-14 03:38:21', '2023-08-14 03:38:21'),
(8, 'bolivia', 'ligas/bolivia/bandera.png', 3, 4, 1, 0, '2023-08-14 03:38:42', '2023-08-14 03:38:42'),
(9, 'peru', 'ligas/peru/bandera.png', 15, 1, 1, 0, '2023-08-14 03:39:06', '2023-08-14 03:39:06'),
(10, 'venezuela', 'ligas/venezuela/bandera.png', 40, 4, 10, 0, '2023-08-14 03:39:36', '2023-08-14 03:39:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `main`
--

CREATE TABLE `main` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio` int(11) NOT NULL,
  `lib` bigint(20) UNSIGNED DEFAULT NULL,
  `sud` bigint(20) UNSIGNED DEFAULT NULL,
  `rec` bigint(20) UNSIGNED DEFAULT NULL,
  `afa_a` bigint(20) UNSIGNED DEFAULT NULL,
  `afa_b` bigint(20) UNSIGNED DEFAULT NULL,
  `afa_c` bigint(20) UNSIGNED DEFAULT NULL,
  `arg` bigint(20) UNSIGNED DEFAULT NULL,
  `last_partido` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `main`
--

INSERT INTO `main` (`id`, `anio`, `lib`, `sud`, `rec`, `afa_a`, `afa_b`, `afa_c`, `arg`, `last_partido`, `created_at`, `updated_at`) VALUES
(1, 2000, 1, 69, 1, 21, 22, 23, 24, NULL, NULL, '2024-11-24 16:41:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_10_21_185658_create_grupos_table', 1),
(7, '2024_10_21_190106_create_equipos_grupo_table', 1),
(8, '2024_10_21_190735_create_partidos_table', 1),
(9, '2024_10_21_191635_create_goleadores_table', 1),
(10, '2024_10_21_225756_create_cupos_afa_table', 1),
(11, '2024_10_21_225757_create_main_table', 1),
(12, '2024_10_30_170449_update_partidos_table', 2),
(15, '2024_11_14_000038_add_column_completed_to_grupos_table', 3),
(16, '2024_11_14_000651_change_column_winner_to_partidos_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `loc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anio` int(11) NOT NULL,
  `copa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fase` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia` int(11) NOT NULL DEFAULT 0,
  `relevancia` int(11) NOT NULL DEFAULT 0,
  `hora` int(11) NOT NULL DEFAULT 0,
  `gl` int(11) NOT NULL DEFAULT 0,
  `gv` int(11) NOT NULL DEFAULT 0,
  `pa` int(11) NOT NULL DEFAULT 0,
  `pb` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `s` int(11) NOT NULL DEFAULT 0,
  `is_vuelta` tinyint(1) NOT NULL DEFAULT 0,
  `is_define` tinyint(1) NOT NULL DEFAULT 0,
  `is_final` tinyint(1) NOT NULL DEFAULT 0,
  `is_jugado` tinyint(1) NOT NULL DEFAULT 0,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `grupo_id`, `loc_id`, `vis_id`, `local`, `visitante`, `anio`, `copa`, `fase`, `fecha`, `zona`, `dia`, `relevancia`, `hora`, `gl`, `gv`, `pa`, `pb`, `d`, `s`, `is_vuelta`, `is_define`, `is_final`, `is_jugado`, `winner_id`, `detalle`, `created_at`, `updated_at`) VALUES
(1, 1, 69, 1, 'atletico nacional', 'san pablo fc', 2000, 'recopa', 5, 1, NULL, 2, 18, 21, 2, 0, 0, 0, 2, 2, 0, 0, 1, 1, 69, '[\"2\' - N\\u00ba 10 - de palomita\",\"14\' - N\\u00ba 9 - de jugada\"]', '2024-11-03 04:28:48', '2024-11-21 03:12:00'),
(2, 1, 1, 69, 'san pablo fc', 'atletico nacional', 2000, 'recopa', 5, 2, NULL, 2, 18, 21, 3, 0, 5, 4, 2, 4, 1, 1, 1, 1, 1, '[\"6\' - N\\u00ba 9 - de palomita\",\"13\' - N\\u00ba 7 - de chilena\",\"25\' - N\\u00ba 7 - de jugada\",\"11\' - N\\u00ba 5 - de volea\"]', '2024-11-03 04:28:48', '2024-11-24 16:41:37'),
(3, 2, 67, 29, 'deportivo moron', 'huracan', 2000, 'afa', -2, 1, 'A', 4, 9, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(4, 2, 54, 35, 'boca unidos', 'argentinos juniors', 2000, 'afa', -2, 1, 'A', 6, 9, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(5, 2, 29, 54, 'huracan', 'boca unidos', 2000, 'afa', -2, 2, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(6, 2, 35, 67, 'argentinos juniors', 'deportivo moron', 2000, 'afa', -2, 2, 'A', 4, 8, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(7, 2, 35, 29, 'argentinos juniors', 'huracan', 2000, 'afa', -2, 3, 'A', 5, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(8, 2, 67, 54, 'deportivo moron', 'boca unidos', 2000, 'afa', -2, 3, 'A', 7, 3, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(9, 2, 29, 35, 'huracan', 'argentinos juniors', 2000, 'afa', -2, 4, 'A', 5, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(10, 2, 54, 67, 'boca unidos', 'deportivo moron', 2000, 'afa', -2, 4, 'A', 7, 3, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(11, 2, 54, 29, 'boca unidos', 'huracan', 2000, 'afa', -2, 5, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(12, 2, 67, 35, 'deportivo moron', 'argentinos juniors', 2000, 'afa', -2, 5, 'A', 4, 8, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(13, 2, 29, 67, 'huracan', 'deportivo moron', 2000, 'afa', -2, 6, 'A', 4, 9, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(14, 2, 35, 54, 'argentinos juniors', 'boca unidos', 2000, 'afa', -2, 6, 'A', 6, 9, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(15, 3, 57, 21, 'gimnasia jujuy', 'river plate', 2000, 'afa', -2, 1, 'A', 6, 12, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(16, 3, 56, 44, 'independiente rivadavia', 'arsenal', 2000, 'afa', -2, 1, 'A', 7, 7, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(17, 3, 21, 56, 'river plate', 'independiente rivadavia', 2000, 'afa', -2, 2, 'A', 6, 12, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(18, 3, 44, 57, 'arsenal', 'gimnasia jujuy', 2000, 'afa', -2, 2, 'A', 5, 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(19, 3, 44, 21, 'arsenal', 'river plate', 2000, 'afa', -2, 3, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(20, 3, 57, 56, 'gimnasia jujuy', 'independiente rivadavia', 2000, 'afa', -2, 3, 'A', 5, 4, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(21, 3, 21, 44, 'river plate', 'arsenal', 2000, 'afa', -2, 4, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(22, 3, 56, 57, 'independiente rivadavia', 'gimnasia jujuy', 2000, 'afa', -2, 4, 'A', 5, 4, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(23, 3, 56, 21, 'independiente rivadavia', 'river plate', 2000, 'afa', -2, 5, 'A', 6, 12, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(24, 3, 57, 44, 'gimnasia jujuy', 'arsenal', 2000, 'afa', -2, 5, 'A', 5, 7, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(25, 3, 21, 57, 'river plate', 'gimnasia jujuy', 2000, 'afa', -2, 6, 'A', 6, 12, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(26, 3, 44, 56, 'arsenal', 'independiente rivadavia', 2000, 'afa', -2, 6, 'A', 7, 7, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(27, 4, 61, 28, 'patronato', 'rosario central', 2000, 'afa', -2, 1, 'A', 6, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(28, 4, 45, 37, 'aldosivi', 'colon', 2000, 'afa', -2, 1, 'A', 6, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(29, 4, 28, 45, 'rosario central', 'aldosivi', 2000, 'afa', -2, 2, 'A', 6, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(30, 4, 37, 61, 'colon', 'patronato', 2000, 'afa', -2, 2, 'A', 5, 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(31, 4, 37, 28, 'colon', 'rosario central', 2000, 'afa', -2, 3, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(32, 4, 61, 45, 'patronato', 'aldosivi', 2000, 'afa', -2, 3, 'A', 4, 5, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(33, 4, 28, 37, 'rosario central', 'colon', 2000, 'afa', -2, 4, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(34, 4, 45, 61, 'aldosivi', 'patronato', 2000, 'afa', -2, 4, 'A', 4, 5, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(35, 4, 45, 28, 'aldosivi', 'rosario central', 2000, 'afa', -2, 5, 'A', 6, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(36, 4, 61, 37, 'patronato', 'colon', 2000, 'afa', -2, 5, 'A', 5, 7, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(37, 4, 28, 61, 'rosario central', 'patronato', 2000, 'afa', -2, 6, 'A', 6, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(38, 4, 37, 45, 'colon', 'aldosivi', 2000, 'afa', -2, 6, 'A', 6, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(39, 5, 63, 31, 'almagro', 'estudiantes la plata', 2000, 'afa', -2, 1, 'A', 6, 9, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(40, 5, 55, 41, 'temperley', 'belgrano cordoba', 2000, 'afa', -2, 1, 'A', 7, 7, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(41, 5, 31, 55, 'estudiantes la plata', 'temperley', 2000, 'afa', -2, 2, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(42, 5, 41, 63, 'belgrano cordoba', 'almagro', 2000, 'afa', -2, 2, 'A', 4, 6, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(43, 5, 41, 31, 'belgrano cordoba', 'estudiantes la plata', 2000, 'afa', -2, 3, 'A', 5, 13, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(44, 5, 63, 55, 'almagro', 'temperley', 2000, 'afa', -2, 3, 'A', 7, 3, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(45, 5, 31, 41, 'estudiantes la plata', 'belgrano cordoba', 2000, 'afa', -2, 4, 'A', 5, 13, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(46, 5, 55, 63, 'temperley', 'almagro', 2000, 'afa', -2, 4, 'A', 7, 3, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(47, 5, 55, 31, 'temperley', 'estudiantes la plata', 2000, 'afa', -2, 5, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(48, 5, 63, 41, 'almagro', 'belgrano cordoba', 2000, 'afa', -2, 5, 'A', 4, 6, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(49, 5, 31, 63, 'estudiantes la plata', 'almagro', 2000, 'afa', -2, 6, 'A', 6, 9, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(50, 5, 41, 55, 'belgrano cordoba', 'temperley', 2000, 'afa', -2, 6, 'A', 7, 7, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(51, 6, 60, 25, 'sarmiento', 'independiente', 2000, 'afa', -2, 1, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(52, 6, 52, 39, 'nueva chicago', 'talleres cordoba', 2000, 'afa', -2, 1, 'A', 5, 9, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(53, 6, 25, 52, 'independiente', 'nueva chicago', 2000, 'afa', -2, 2, 'A', 6, 12, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(54, 6, 39, 60, 'talleres cordoba', 'sarmiento', 2000, 'afa', -2, 2, 'A', 7, 7, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(55, 6, 39, 25, 'talleres cordoba', 'independiente', 2000, 'afa', -2, 3, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(56, 6, 60, 52, 'sarmiento', 'nueva chicago', 2000, 'afa', -2, 3, 'A', 5, 4, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(57, 6, 25, 39, 'independiente', 'talleres cordoba', 2000, 'afa', -2, 4, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(58, 6, 52, 60, 'nueva chicago', 'sarmiento', 2000, 'afa', -2, 4, 'A', 5, 4, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(59, 6, 52, 25, 'nueva chicago', 'independiente', 2000, 'afa', -2, 5, 'A', 6, 12, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(60, 6, 60, 39, 'sarmiento', 'talleres cordoba', 2000, 'afa', -2, 5, 'A', 7, 7, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(61, 6, 25, 60, 'independiente', 'sarmiento', 2000, 'afa', -2, 6, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(62, 6, 39, 52, 'talleres cordoba', 'nueva chicago', 2000, 'afa', -2, 6, 'A', 5, 9, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(63, 7, 68, 22, 'crucero del norte', 'boca juniors', 2000, 'afa', -2, 1, 'A', 6, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(64, 7, 49, 33, 'san martin san juan', 'lanus', 2000, 'afa', -2, 1, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(65, 7, 22, 49, 'boca juniors', 'san martin san juan', 2000, 'afa', -2, 2, 'A', 5, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(66, 7, 33, 68, 'lanus', 'crucero del norte', 2000, 'afa', -2, 2, 'A', 6, 8, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(67, 7, 33, 22, 'lanus', 'boca juniors', 2000, 'afa', -2, 3, 'A', 6, 17, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(68, 7, 68, 49, 'crucero del norte', 'san martin san juan', 2000, 'afa', -2, 3, 'A', 7, 4, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(69, 7, 22, 33, 'boca juniors', 'lanus', 2000, 'afa', -2, 4, 'A', 6, 17, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(70, 7, 49, 68, 'san martin san juan', 'crucero del norte', 2000, 'afa', -2, 4, 'A', 7, 4, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(71, 7, 49, 22, 'san martin san juan', 'boca juniors', 2000, 'afa', -2, 5, 'A', 5, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(72, 7, 68, 33, 'crucero del norte', 'lanus', 2000, 'afa', -2, 5, 'A', 6, 8, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(73, 7, 22, 68, 'boca juniors', 'crucero del norte', 2000, 'afa', -2, 6, 'A', 6, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(74, 7, 33, 49, 'lanus', 'san martin san juan', 2000, 'afa', -2, 6, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(75, 8, 65, 27, 'racing cordoba', 'newells old boys', 2000, 'afa', -2, 1, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(76, 8, 46, 38, 'defensa y justicia', 'union', 2000, 'afa', -2, 1, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(77, 8, 27, 46, 'newells old boys', 'defensa y justicia', 2000, 'afa', -2, 2, 'A', 5, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(78, 8, 38, 65, 'union', 'racing cordoba', 2000, 'afa', -2, 2, 'A', 7, 7, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(79, 8, 38, 27, 'union', 'newells old boys', 2000, 'afa', -2, 3, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(80, 8, 65, 46, 'racing cordoba', 'defensa y justicia', 2000, 'afa', -2, 3, 'A', 6, 5, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(81, 8, 27, 38, 'newells old boys', 'union', 2000, 'afa', -2, 4, 'A', 6, 15, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(82, 8, 46, 65, 'defensa y justicia', 'racing cordoba', 2000, 'afa', -2, 4, 'A', 6, 5, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(83, 8, 46, 27, 'defensa y justicia', 'newells old boys', 2000, 'afa', -2, 5, 'A', 5, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(84, 8, 65, 38, 'racing cordoba', 'union', 2000, 'afa', -2, 5, 'A', 7, 7, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(85, 8, 27, 65, 'newells old boys', 'racing cordoba', 2000, 'afa', -2, 6, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(86, 8, 38, 46, 'union', 'defensa y justicia', 2000, 'afa', -2, 6, 'A', 5, 10, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(87, 9, 64, 30, 'almirante brown', 'ferrocarril oeste', 2000, 'afa', -2, 1, 'A', 5, 9, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(88, 9, 53, 40, 'platense', 'instituto cordoba', 2000, 'afa', -2, 1, 'A', 7, 9, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(89, 9, 30, 53, 'ferrocarril oeste', 'platense', 2000, 'afa', -2, 2, 'A', 5, 11, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(90, 9, 40, 64, 'instituto cordoba', 'almirante brown', 2000, 'afa', -2, 2, 'A', 4, 7, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(91, 9, 40, 30, 'instituto cordoba', 'ferrocarril oeste', 2000, 'afa', -2, 3, 'A', 5, 14, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(92, 9, 64, 53, 'almirante brown', 'platense', 2000, 'afa', -2, 3, 'A', 7, 4, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(93, 9, 30, 40, 'ferrocarril oeste', 'instituto cordoba', 2000, 'afa', -2, 4, 'A', 5, 14, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(94, 9, 53, 64, 'platense', 'almirante brown', 2000, 'afa', -2, 4, 'A', 7, 4, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(95, 9, 53, 30, 'platense', 'ferrocarril oeste', 2000, 'afa', -2, 5, 'A', 5, 11, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(96, 9, 64, 40, 'almirante brown', 'instituto cordoba', 2000, 'afa', -2, 5, 'A', 4, 7, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(97, 9, 30, 64, 'ferrocarril oeste', 'almirante brown', 2000, 'afa', -2, 6, 'A', 5, 9, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(98, 9, 40, 53, 'instituto cordoba', 'platense', 2000, 'afa', -2, 6, 'A', 7, 9, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(99, 10, 58, 26, 'atletico tucuman', 'racing club', 2000, 'afa', -2, 1, 'A', 5, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(100, 10, 47, 36, 'tigre', 'godoy cruz', 2000, 'afa', -2, 1, 'A', 5, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(101, 10, 26, 47, 'racing club', 'tigre', 2000, 'afa', -2, 2, 'A', 6, 13, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(102, 10, 36, 58, 'godoy cruz', 'atletico tucuman', 2000, 'afa', -2, 2, 'A', 4, 9, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(103, 10, 36, 26, 'godoy cruz', 'racing club', 2000, 'afa', -2, 3, 'A', 5, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(104, 10, 58, 47, 'atletico tucuman', 'tigre', 2000, 'afa', -2, 3, 'A', 4, 6, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(105, 10, 26, 36, 'racing club', 'godoy cruz', 2000, 'afa', -2, 4, 'A', 5, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(106, 10, 47, 58, 'tigre', 'atletico tucuman', 2000, 'afa', -2, 4, 'A', 4, 6, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(107, 10, 47, 26, 'tigre', 'racing club', 2000, 'afa', -2, 5, 'A', 6, 13, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(108, 10, 58, 36, 'atletico tucuman', 'godoy cruz', 2000, 'afa', -2, 5, 'A', 4, 9, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(109, 10, 26, 58, 'racing club', 'atletico tucuman', 2000, 'afa', -2, 6, 'A', 5, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(110, 10, 36, 47, 'godoy cruz', 'tigre', 2000, 'afa', -2, 6, 'A', 5, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(111, 11, 59, 32, 'atlanta', 'gimnasia la plata', 2000, 'afa', -2, 1, 'A', 7, 9, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(112, 11, 50, 43, 'all boys', 'quilmes', 2000, 'afa', -2, 1, 'A', 4, 8, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(113, 11, 32, 50, 'gimnasia la plata', 'all boys', 2000, 'afa', -2, 2, 'A', 5, 11, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(114, 11, 43, 59, 'quilmes', 'atlanta', 2000, 'afa', -2, 2, 'A', 7, 6, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(115, 11, 43, 32, 'quilmes', 'gimnasia la plata', 2000, 'afa', -2, 3, 'A', 5, 13, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(116, 11, 59, 50, 'atlanta', 'all boys', 2000, 'afa', -2, 3, 'A', 4, 4, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(117, 11, 32, 43, 'gimnasia la plata', 'quilmes', 2000, 'afa', -2, 4, 'A', 5, 13, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(118, 11, 50, 59, 'all boys', 'atlanta', 2000, 'afa', -2, 4, 'A', 4, 4, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(119, 11, 50, 32, 'all boys', 'gimnasia la plata', 2000, 'afa', -2, 5, 'A', 5, 11, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(120, 11, 59, 43, 'atlanta', 'quilmes', 2000, 'afa', -2, 5, 'A', 7, 6, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(121, 11, 32, 59, 'gimnasia la plata', 'atlanta', 2000, 'afa', -2, 6, 'A', 7, 9, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(122, 11, 43, 50, 'quilmes', 'all boys', 2000, 'afa', -2, 6, 'A', 4, 8, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(123, 12, 62, 23, 'san martin tucuman', 'san lorenzo', 2000, 'afa', -2, 1, 'A', 6, 11, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(124, 12, 51, 34, 'chacarita juniors', 'banfield', 2000, 'afa', -2, 1, 'A', 4, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(125, 12, 23, 51, 'san lorenzo', 'chacarita juniors', 2000, 'afa', -2, 2, 'A', 6, 13, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(126, 12, 34, 62, 'banfield', 'san martin tucuman', 2000, 'afa', -2, 2, 'A', 6, 8, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(127, 12, 34, 23, 'banfield', 'san lorenzo', 2000, 'afa', -2, 3, 'A', 6, 17, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(128, 12, 62, 51, 'san martin tucuman', 'chacarita juniors', 2000, 'afa', -2, 3, 'A', 4, 4, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(129, 12, 23, 34, 'san lorenzo', 'banfield', 2000, 'afa', -2, 4, 'A', 6, 17, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(130, 12, 51, 62, 'chacarita juniors', 'san martin tucuman', 2000, 'afa', -2, 4, 'A', 4, 4, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(131, 12, 51, 23, 'chacarita juniors', 'san lorenzo', 2000, 'afa', -2, 5, 'A', 6, 13, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(132, 12, 62, 34, 'san martin tucuman', 'banfield', 2000, 'afa', -2, 5, 'A', 6, 8, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(133, 12, 23, 62, 'san lorenzo', 'san martin tucuman', 2000, 'afa', -2, 6, 'A', 6, 11, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(134, 12, 34, 51, 'banfield', 'chacarita juniors', 2000, 'afa', -2, 6, 'A', 4, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(135, 13, 66, 24, 'douglas haid', 'velez sarsfield', 2000, 'afa', -2, 1, 'A', 6, 11, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(136, 13, 48, 42, 'olimpo', 'atletico rafaela', 2000, 'afa', -2, 1, 'A', 4, 9, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(137, 13, 24, 48, 'velez sarsfield', 'olimpo', 2000, 'afa', -2, 2, 'A', 6, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(138, 13, 42, 66, 'atletico rafaela', 'douglas haid', 2000, 'afa', -2, 2, 'A', 7, 6, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(139, 13, 42, 24, 'atletico rafaela', 'velez sarsfield', 2000, 'afa', -2, 3, 'A', 5, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(140, 13, 66, 48, 'douglas haid', 'olimpo', 2000, 'afa', -2, 3, 'A', 6, 5, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(141, 13, 24, 42, 'velez sarsfield', 'atletico rafaela', 2000, 'afa', -2, 4, 'A', 5, 15, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(142, 13, 48, 66, 'olimpo', 'douglas haid', 2000, 'afa', -2, 4, 'A', 6, 5, 14, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(143, 13, 48, 24, 'olimpo', 'velez sarsfield', 2000, 'afa', -2, 5, 'A', 6, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(144, 13, 66, 42, 'douglas haid', 'atletico rafaela', 2000, 'afa', -2, 5, 'A', 7, 6, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(145, 13, 24, 66, 'velez sarsfield', 'douglas haid', 2000, 'afa', -2, 6, 'A', 6, 11, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(146, 13, 42, 48, 'atletico rafaela', 'olimpo', 2000, 'afa', -2, 6, 'A', 4, 9, 17, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:06', '2024-11-25 00:42:06'),
(147, 14, 182, 31, 'atletico maracaibo', 'estudiantes la plata', 2000, 'sudamericana', 0, 1, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(148, 14, 143, 81, 'liga deportiva', 'envigado', 2000, 'sudamericana', 0, 1, NULL, 1, 12, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(149, 14, 31, 143, 'estudiantes la plata', 'liga deportiva', 2000, 'sudamericana', 0, 2, NULL, 1, 16, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(150, 14, 81, 182, 'envigado', 'atletico maracaibo', 2000, 'sudamericana', 0, 2, NULL, 1, 11, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(151, 14, 81, 31, 'envigado', 'estudiantes la plata', 2000, 'sudamericana', 0, 3, NULL, 1, 12, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(152, 14, 182, 143, 'atletico maracaibo', 'liga deportiva', 2000, 'sudamericana', 0, 3, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(153, 14, 31, 81, 'estudiantes la plata', 'envigado', 2000, 'sudamericana', 0, 4, NULL, 1, 12, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(154, 14, 143, 182, 'liga deportiva', 'atletico maracaibo', 2000, 'sudamericana', 0, 4, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(155, 14, 143, 31, 'liga deportiva', 'estudiantes la plata', 2000, 'sudamericana', 0, 5, NULL, 1, 16, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(156, 14, 182, 81, 'atletico maracaibo', 'envigado', 2000, 'sudamericana', 0, 5, NULL, 1, 11, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(157, 14, 31, 182, 'estudiantes la plata', 'atletico maracaibo', 2000, 'sudamericana', 0, 6, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(158, 14, 81, 143, 'envigado', 'liga deportiva', 2000, 'sudamericana', 0, 6, NULL, 1, 12, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(159, 15, 151, 12, 'macara', 'botafogo', 2000, 'sudamericana', 0, 1, NULL, 1, 7, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(160, 15, 131, 100, 'cobresal', 'racing montevideo', 2000, 'sudamericana', 0, 1, NULL, 1, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(161, 15, 12, 131, 'botafogo', 'cobresal', 2000, 'sudamericana', 0, 2, NULL, 1, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(162, 15, 100, 151, 'racing montevideo', 'macara', 2000, 'sudamericana', 0, 2, NULL, 1, 7, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(163, 15, 100, 12, 'racing montevideo', 'botafogo', 2000, 'sudamericana', 0, 3, NULL, 1, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(164, 15, 151, 131, 'macara', 'cobresal', 2000, 'sudamericana', 0, 3, NULL, 1, 7, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(165, 15, 12, 100, 'botafogo', 'racing montevideo', 2000, 'sudamericana', 0, 4, NULL, 1, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(166, 15, 131, 151, 'cobresal', 'macara', 2000, 'sudamericana', 0, 4, NULL, 1, 7, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(167, 15, 131, 12, 'cobresal', 'botafogo', 2000, 'sudamericana', 0, 5, NULL, 1, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:07', '2024-11-25 00:42:08'),
(168, 15, 151, 100, 'macara', 'racing montevideo', 2000, 'sudamericana', 0, 5, NULL, 1, 7, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(169, 15, 12, 151, 'botafogo', 'macara', 2000, 'sudamericana', 0, 6, NULL, 1, 7, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(170, 15, 100, 131, 'racing montevideo', 'cobresal', 2000, 'sudamericana', 0, 6, NULL, 1, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(171, 16, 175, 27, 'alianza atletico', 'newells old boys', 2000, 'sudamericana', 0, 1, NULL, 2, 11, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(172, 16, 113, 75, 'guarani', 'millonarios', 2000, 'sudamericana', 0, 1, NULL, 2, 13, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(173, 16, 27, 113, 'newells old boys', 'guarani', 2000, 'sudamericana', 0, 2, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(174, 16, 75, 175, 'millonarios', 'alianza atletico', 2000, 'sudamericana', 0, 2, NULL, 2, 9, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(175, 16, 75, 27, 'millonarios', 'newells old boys', 2000, 'sudamericana', 0, 3, NULL, 2, 16, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(176, 16, 175, 113, 'alianza atletico', 'guarani', 2000, 'sudamericana', 0, 3, NULL, 2, 8, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(177, 16, 27, 75, 'newells old boys', 'millonarios', 2000, 'sudamericana', 0, 4, NULL, 2, 16, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(178, 16, 113, 175, 'guarani', 'alianza atletico', 2000, 'sudamericana', 0, 4, NULL, 2, 8, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(179, 16, 113, 27, 'guarani', 'newells old boys', 2000, 'sudamericana', 0, 5, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(180, 16, 175, 75, 'alianza atletico', 'millonarios', 2000, 'sudamericana', 0, 5, NULL, 2, 9, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(181, 16, 27, 175, 'newells old boys', 'alianza atletico', 2000, 'sudamericana', 0, 6, NULL, 2, 11, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(182, 16, 75, 113, 'millonarios', 'guarani', 2000, 'sudamericana', 0, 6, NULL, 2, 13, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(183, 17, 164, 6, 'aurora', 'corinthians', 2000, 'sudamericana', 0, 1, NULL, 2, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(184, 17, 138, 80, 'audax italiano', 'boyaca chico', 2000, 'sudamericana', 0, 1, NULL, 2, 7, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(185, 17, 6, 138, 'corinthians', 'audax italiano', 2000, 'sudamericana', 0, 2, NULL, 2, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(186, 17, 80, 164, 'boyaca chico', 'aurora', 2000, 'sudamericana', 0, 2, NULL, 2, 7, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(187, 17, 80, 6, 'boyaca chico', 'corinthians', 2000, 'sudamericana', 0, 3, NULL, 2, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(188, 17, 164, 138, 'aurora', 'audax italiano', 2000, 'sudamericana', 0, 3, NULL, 2, 4, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(189, 17, 6, 80, 'corinthians', 'boyaca chico', 2000, 'sudamericana', 0, 4, NULL, 2, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(190, 17, 138, 164, 'audax italiano', 'aurora', 2000, 'sudamericana', 0, 4, NULL, 2, 4, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(191, 17, 138, 6, 'audax italiano', 'corinthians', 2000, 'sudamericana', 0, 5, NULL, 2, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(192, 17, 164, 80, 'aurora', 'boyaca chico', 2000, 'sudamericana', 0, 5, NULL, 2, 7, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(193, 17, 6, 164, 'corinthians', 'aurora', 2000, 'sudamericana', 0, 6, NULL, 2, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(194, 17, 80, 138, 'boyaca chico', 'audax italiano', 2000, 'sudamericana', 0, 6, NULL, 2, 7, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(195, 18, 184, 7, 'deportivo anzoategui', 'santos fc', 2000, 'sudamericana', 0, 1, NULL, 2, 12, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(196, 18, 130, 91, 'deportes concepcion', 'defensor sporting', 2000, 'sudamericana', 0, 1, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(197, 18, 7, 130, 'santos fc', 'deportes concepcion', 2000, 'sudamericana', 0, 2, NULL, 2, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(198, 18, 91, 184, 'defensor sporting', 'deportivo anzoategui', 2000, 'sudamericana', 0, 2, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(199, 18, 91, 7, 'defensor sporting', 'santos fc', 2000, 'sudamericana', 0, 3, NULL, 2, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(200, 18, 184, 130, 'deportivo anzoategui', 'deportes concepcion', 2000, 'sudamericana', 0, 3, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(201, 18, 7, 91, 'santos fc', 'defensor sporting', 2000, 'sudamericana', 0, 4, NULL, 2, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(202, 18, 130, 184, 'deportes concepcion', 'deportivo anzoategui', 2000, 'sudamericana', 0, 4, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(203, 18, 130, 7, 'deportes concepcion', 'santos fc', 2000, 'sudamericana', 0, 5, NULL, 2, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(204, 18, 184, 91, 'deportivo anzoategui', 'defensor sporting', 2000, 'sudamericana', 0, 5, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(205, 18, 7, 184, 'santos fc', 'deportivo anzoategui', 2000, 'sudamericana', 0, 6, NULL, 2, 12, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(206, 18, 91, 130, 'defensor sporting', 'deportes concepcion', 2000, 'sudamericana', 0, 6, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(207, 19, 156, 32, 'oriente petrolero', 'gimnasia la plata', 2000, 'sudamericana', 0, 1, NULL, 3, 17, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(208, 19, 115, 104, 'tacuari', 'bella vista', 2000, 'sudamericana', 0, 1, NULL, 3, 8, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(209, 19, 32, 115, 'gimnasia la plata', 'tacuari', 2000, 'sudamericana', 0, 2, NULL, 3, 13, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(210, 19, 104, 156, 'bella vista', 'oriente petrolero', 2000, 'sudamericana', 0, 2, NULL, 3, 12, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(211, 19, 104, 32, 'bella vista', 'gimnasia la plata', 2000, 'sudamericana', 0, 3, NULL, 3, 11, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(212, 19, 156, 115, 'oriente petrolero', 'tacuari', 2000, 'sudamericana', 0, 3, NULL, 3, 14, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(213, 19, 32, 104, 'gimnasia la plata', 'bella vista', 2000, 'sudamericana', 0, 4, NULL, 3, 11, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(214, 19, 115, 156, 'tacuari', 'oriente petrolero', 2000, 'sudamericana', 0, 4, NULL, 3, 14, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(215, 19, 115, 32, 'tacuari', 'gimnasia la plata', 2000, 'sudamericana', 0, 5, NULL, 3, 13, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(216, 19, 156, 104, 'oriente petrolero', 'bella vista', 2000, 'sudamericana', 0, 5, NULL, 3, 12, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(217, 19, 32, 156, 'gimnasia la plata', 'oriente petrolero', 2000, 'sudamericana', 0, 6, NULL, 3, 17, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(218, 19, 104, 115, 'bella vista', 'tacuari', 2000, 'sudamericana', 0, 6, NULL, 3, 8, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(219, 20, 157, 16, 'blooming', 'chapecoense', 2000, 'sudamericana', 0, 1, NULL, 3, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(220, 20, 150, 70, 'manta fc', 'america', 2000, 'sudamericana', 0, 1, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(221, 20, 16, 150, 'chapecoense', 'manta fc', 2000, 'sudamericana', 0, 2, NULL, 3, 6, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(222, 20, 70, 157, 'america', 'blooming', 2000, 'sudamericana', 0, 2, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(223, 20, 70, 16, 'america', 'chapecoense', 2000, 'sudamericana', 0, 3, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(224, 20, 157, 150, 'blooming', 'manta fc', 2000, 'sudamericana', 0, 3, NULL, 3, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(225, 20, 16, 70, 'chapecoense', 'america', 2000, 'sudamericana', 0, 4, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(226, 20, 150, 157, 'manta fc', 'blooming', 2000, 'sudamericana', 0, 4, NULL, 3, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(227, 20, 150, 16, 'manta fc', 'chapecoense', 2000, 'sudamericana', 0, 5, NULL, 3, 6, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(228, 20, 157, 70, 'blooming', 'america', 2000, 'sudamericana', 0, 5, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(229, 20, 16, 157, 'chapecoense', 'blooming', 2000, 'sudamericana', 0, 6, NULL, 3, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(230, 20, 70, 150, 'america', 'manta fc', 2000, 'sudamericana', 0, 6, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(231, 21, 172, 28, 'cesar vallejo', 'rosario central', 2000, 'sudamericana', 0, 1, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(232, 21, 119, 99, 'sportivo san lorenzo', 'atenas', 2000, 'sudamericana', 0, 1, NULL, 3, 8, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(233, 21, 28, 119, 'rosario central', 'sportivo san lorenzo', 2000, 'sudamericana', 0, 2, NULL, 3, 12, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(234, 21, 99, 172, 'atenas', 'cesar vallejo', 2000, 'sudamericana', 0, 2, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(235, 21, 99, 28, 'atenas', 'rosario central', 2000, 'sudamericana', 0, 3, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(236, 21, 172, 119, 'cesar vallejo', 'sportivo san lorenzo', 2000, 'sudamericana', 0, 3, NULL, 3, 8, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(237, 21, 28, 99, 'rosario central', 'atenas', 2000, 'sudamericana', 0, 4, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(238, 21, 119, 172, 'sportivo san lorenzo', 'cesar vallejo', 2000, 'sudamericana', 0, 4, NULL, 3, 8, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(239, 21, 119, 28, 'sportivo san lorenzo', 'rosario central', 2000, 'sudamericana', 0, 5, NULL, 3, 12, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(240, 21, 172, 99, 'cesar vallejo', 'atenas', 2000, 'sudamericana', 0, 5, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(241, 21, 28, 172, 'rosario central', 'cesar vallejo', 2000, 'sudamericana', 0, 6, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(242, 21, 99, 119, 'atenas', 'sportivo san lorenzo', 2000, 'sudamericana', 0, 6, NULL, 3, 8, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:08', '2024-11-25 00:42:08'),
(243, 22, 168, 1, 'alianza lima', 'san pablo fc', 2000, 'libertadores', 0, 1, NULL, 1, 19, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(244, 22, 134, 78, 'deportes iquique', 'cucuta deportivo', 2000, 'libertadores', 0, 1, NULL, 1, 10, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(245, 22, 1, 134, 'san pablo fc', 'deportes iquique', 2000, 'libertadores', 0, 2, NULL, 1, 14, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(246, 22, 78, 168, 'cucuta deportivo', 'alianza lima', 2000, 'libertadores', 0, 2, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(247, 22, 78, 1, 'cucuta deportivo', 'san pablo fc', 2000, 'libertadores', 0, 3, NULL, 1, 16, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(248, 22, 168, 134, 'alianza lima', 'deportes iquique', 2000, 'libertadores', 0, 3, NULL, 1, 13, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(249, 22, 1, 78, 'san pablo fc', 'cucuta deportivo', 2000, 'libertadores', 0, 4, NULL, 1, 16, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(250, 22, 134, 168, 'deportes iquique', 'alianza lima', 2000, 'libertadores', 0, 4, NULL, 1, 13, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(251, 22, 134, 1, 'deportes iquique', 'san pablo fc', 2000, 'libertadores', 0, 5, NULL, 1, 14, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(252, 22, 168, 78, 'alianza lima', 'cucuta deportivo', 2000, 'libertadores', 0, 5, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(253, 22, 1, 168, 'san pablo fc', 'alianza lima', 2000, 'libertadores', 0, 6, NULL, 1, 19, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(254, 22, 78, 134, 'cucuta deportivo', 'deportes iquique', 2000, 'libertadores', 0, 6, NULL, 1, 10, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(255, 23, 173, 10, 'sport huancayo', 'internacional', 2000, 'libertadores', 0, 1, NULL, 1, 10, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(256, 23, 142, 76, 'el nacional', 'deportes tolima', 2000, 'libertadores', 0, 1, NULL, 1, 16, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(257, 23, 10, 142, 'internacional', 'el nacional', 2000, 'libertadores', 0, 2, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(258, 23, 76, 173, 'deportes tolima', 'sport huancayo', 2000, 'libertadores', 0, 2, NULL, 1, 11, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(259, 23, 76, 10, 'deportes tolima', 'internacional', 2000, 'libertadores', 0, 3, NULL, 1, 13, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(260, 23, 173, 142, 'sport huancayo', 'el nacional', 2000, 'libertadores', 0, 3, NULL, 1, 13, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(261, 23, 10, 76, 'internacional', 'deportes tolima', 2000, 'libertadores', 0, 4, NULL, 1, 13, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(262, 23, 142, 173, 'el nacional', 'sport huancayo', 2000, 'libertadores', 0, 4, NULL, 1, 13, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(263, 23, 142, 10, 'el nacional', 'internacional', 2000, 'libertadores', 0, 5, NULL, 1, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(264, 23, 173, 76, 'sport huancayo', 'deportes tolima', 2000, 'libertadores', 0, 5, NULL, 1, 11, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(265, 23, 10, 173, 'internacional', 'sport huancayo', 2000, 'libertadores', 0, 6, NULL, 1, 10, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(266, 23, 76, 142, 'deportes tolima', 'el nacional', 2000, 'libertadores', 0, 6, NULL, 1, 16, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(267, 24, 161, 21, 'jorge wilsterman', 'river plate', 2000, 'libertadores', 0, 1, NULL, 1, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(268, 24, 118, 95, 'sportivo carapegüa', 'river montevideo', 2000, 'libertadores', 0, 1, NULL, 1, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(269, 24, 21, 118, 'river plate', 'sportivo carapegüa', 2000, 'libertadores', 0, 2, NULL, 1, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(270, 24, 95, 161, 'river montevideo', 'jorge wilsterman', 2000, 'libertadores', 0, 2, NULL, 1, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(271, 24, 95, 21, 'river montevideo', 'river plate', 2000, 'libertadores', 0, 3, NULL, 1, 17, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(272, 24, 161, 118, 'jorge wilsterman', 'sportivo carapegüa', 2000, 'libertadores', 0, 3, NULL, 1, 8, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(273, 24, 21, 95, 'river plate', 'river montevideo', 2000, 'libertadores', 0, 4, NULL, 1, 17, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(274, 24, 118, 161, 'sportivo carapegüa', 'jorge wilsterman', 2000, 'libertadores', 0, 4, NULL, 1, 8, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(275, 24, 118, 21, 'sportivo carapegüa', 'river plate', 2000, 'libertadores', 0, 5, NULL, 1, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(276, 24, 161, 95, 'jorge wilsterman', 'river montevideo', 2000, 'libertadores', 0, 5, NULL, 1, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(277, 24, 21, 161, 'river plate', 'jorge wilsterman', 2000, 'libertadores', 0, 6, NULL, 1, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(278, 24, 95, 118, 'river montevideo', 'sportivo carapegüa', 2000, 'libertadores', 0, 6, NULL, 1, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11');
INSERT INTO `partidos` (`id`, `grupo_id`, `loc_id`, `vis_id`, `local`, `visitante`, `anio`, `copa`, `fase`, `fecha`, `zona`, `dia`, `relevancia`, `hora`, `gl`, `gv`, `pa`, `pb`, `d`, `s`, `is_vuelta`, `is_define`, `is_final`, `is_jugado`, `winner_id`, `detalle`, `created_at`, `updated_at`) VALUES
(279, 25, 183, 2, 'estudiantes merida', 'cruzeiro', 2000, 'libertadores', 0, 1, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(280, 25, 141, 92, 'barcelona', 'montevideo wanderers', 2000, 'libertadores', 0, 1, NULL, 1, 19, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(281, 25, 2, 141, 'cruzeiro', 'barcelona', 2000, 'libertadores', 0, 2, NULL, 1, 20, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(282, 25, 92, 183, 'montevideo wanderers', 'estudiantes merida', 2000, 'libertadores', 0, 2, NULL, 1, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(283, 25, 92, 2, 'montevideo wanderers', 'cruzeiro', 2000, 'libertadores', 0, 3, NULL, 1, 19, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(284, 25, 183, 141, 'estudiantes merida', 'barcelona', 2000, 'libertadores', 0, 3, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(285, 25, 2, 92, 'cruzeiro', 'montevideo wanderers', 2000, 'libertadores', 0, 4, NULL, 1, 19, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(286, 25, 141, 183, 'barcelona', 'estudiantes merida', 2000, 'libertadores', 0, 4, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(287, 25, 141, 2, 'barcelona', 'cruzeiro', 2000, 'libertadores', 0, 5, NULL, 1, 20, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(288, 25, 183, 92, 'estudiantes merida', 'montevideo wanderers', 2000, 'libertadores', 0, 5, NULL, 1, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(289, 25, 2, 183, 'cruzeiro', 'estudiantes merida', 2000, 'libertadores', 0, 6, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(290, 25, 92, 141, 'montevideo wanderers', 'barcelona', 2000, 'libertadores', 0, 6, NULL, 1, 19, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(291, 26, 169, 11, 'universitario', 'atletico mineiro', 2000, 'libertadores', 0, 1, NULL, 1, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(292, 26, 127, 74, 'universidad catolica', 'independiente santa fe', 2000, 'libertadores', 0, 1, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(293, 26, 11, 127, 'atletico mineiro', 'universidad catolica', 2000, 'libertadores', 0, 2, NULL, 1, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(294, 26, 74, 169, 'independiente santa fe', 'universitario', 2000, 'libertadores', 0, 2, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(295, 26, 74, 11, 'independiente santa fe', 'atletico mineiro', 2000, 'libertadores', 0, 3, NULL, 1, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(296, 26, 169, 127, 'universitario', 'universidad catolica', 2000, 'libertadores', 0, 3, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(297, 26, 11, 74, 'atletico mineiro', 'independiente santa fe', 2000, 'libertadores', 0, 4, NULL, 1, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(298, 26, 127, 169, 'universidad catolica', 'universitario', 2000, 'libertadores', 0, 4, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(299, 26, 127, 11, 'universidad catolica', 'atletico mineiro', 2000, 'libertadores', 0, 5, NULL, 1, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(300, 26, 169, 74, 'universitario', 'independiente santa fe', 2000, 'libertadores', 0, 5, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(301, 26, 11, 169, 'atletico mineiro', 'universitario', 2000, 'libertadores', 0, 6, NULL, 1, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(302, 26, 74, 127, 'independiente santa fe', 'universidad catolica', 2000, 'libertadores', 0, 6, NULL, 1, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(303, 27, 170, 8, 'cienciano', 'vasco da gama', 2000, 'libertadores', 0, 1, NULL, 2, 14, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(304, 27, 112, 30, 'libertad', 'ferrocarril oeste', 2000, 'libertadores', 0, 1, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(305, 27, 8, 112, 'vasco da gama', 'libertad', 2000, 'libertadores', 0, 2, NULL, 2, 14, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(306, 27, 30, 170, 'ferrocarril oeste', 'cienciano', 2000, 'libertadores', 0, 2, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(307, 27, 30, 8, 'ferrocarril oeste', 'vasco da gama', 2000, 'libertadores', 0, 3, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(308, 27, 170, 112, 'cienciano', 'libertad', 2000, 'libertadores', 0, 3, NULL, 2, 14, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(309, 27, 8, 30, 'vasco da gama', 'ferrocarril oeste', 2000, 'libertadores', 0, 4, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(310, 27, 112, 170, 'libertad', 'cienciano', 2000, 'libertadores', 0, 4, NULL, 2, 14, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(311, 27, 112, 8, 'libertad', 'vasco da gama', 2000, 'libertadores', 0, 5, NULL, 2, 14, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(312, 27, 170, 30, 'cienciano', 'ferrocarril oeste', 2000, 'libertadores', 0, 5, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(313, 27, 8, 170, 'vasco da gama', 'cienciano', 2000, 'libertadores', 0, 6, NULL, 2, 14, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(314, 27, 30, 112, 'ferrocarril oeste', 'libertad', 2000, 'libertadores', 0, 6, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(315, 28, 158, 23, 'the stronguest', 'san lorenzo', 2000, 'libertadores', 0, 1, NULL, 2, 17, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(316, 28, 125, 89, 'colo colo', 'peñarol', 2000, 'libertadores', 0, 1, NULL, 2, 20, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(317, 28, 23, 125, 'san lorenzo', 'colo colo', 2000, 'libertadores', 0, 2, NULL, 2, 20, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(318, 28, 89, 158, 'peñarol', 'the stronguest', 2000, 'libertadores', 0, 2, NULL, 2, 17, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(319, 28, 89, 23, 'peñarol', 'san lorenzo', 2000, 'libertadores', 0, 3, NULL, 2, 20, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(320, 28, 158, 125, 'the stronguest', 'colo colo', 2000, 'libertadores', 0, 3, NULL, 2, 17, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(321, 28, 23, 89, 'san lorenzo', 'peñarol', 2000, 'libertadores', 0, 4, NULL, 2, 20, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(322, 28, 125, 158, 'colo colo', 'the stronguest', 2000, 'libertadores', 0, 4, NULL, 2, 17, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(323, 28, 125, 23, 'colo colo', 'san lorenzo', 2000, 'libertadores', 0, 5, NULL, 2, 20, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(324, 28, 158, 89, 'the stronguest', 'peñarol', 2000, 'libertadores', 0, 5, NULL, 2, 17, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(325, 28, 23, 158, 'san lorenzo', 'the stronguest', 2000, 'libertadores', 0, 6, NULL, 2, 17, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(326, 28, 89, 125, 'peñarol', 'colo colo', 2000, 'libertadores', 0, 6, NULL, 2, 20, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(327, 29, 159, 25, 'real potosi', 'independiente', 2000, 'libertadores', 0, 1, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(328, 29, 120, 71, 'rubio ñu', 'deportivo cali', 2000, 'libertadores', 0, 1, NULL, 2, 12, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(329, 29, 25, 120, 'independiente', 'rubio ñu', 2000, 'libertadores', 0, 2, NULL, 2, 12, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(330, 29, 71, 159, 'deportivo cali', 'real potosi', 2000, 'libertadores', 0, 2, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(331, 29, 71, 25, 'deportivo cali', 'independiente', 2000, 'libertadores', 0, 3, NULL, 2, 18, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(332, 29, 159, 120, 'real potosi', 'rubio ñu', 2000, 'libertadores', 0, 3, NULL, 2, 9, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(333, 29, 25, 71, 'independiente', 'deportivo cali', 2000, 'libertadores', 0, 4, NULL, 2, 18, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(334, 29, 120, 159, 'rubio ñu', 'real potosi', 2000, 'libertadores', 0, 4, NULL, 2, 9, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(335, 29, 120, 25, 'rubio ñu', 'independiente', 2000, 'libertadores', 0, 5, NULL, 2, 12, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(336, 29, 159, 71, 'real potosi', 'deportivo cali', 2000, 'libertadores', 0, 5, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(337, 29, 25, 159, 'independiente', 'real potosi', 2000, 'libertadores', 0, 6, NULL, 2, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(338, 29, 71, 120, 'deportivo cali', 'rubio ñu', 2000, 'libertadores', 0, 6, NULL, 2, 12, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(339, 30, 146, 69, 'liga de loja', 'atletico nacional', 2000, 'libertadores', 0, 1, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(340, 30, 110, 26, 'cerro porteño', 'racing club', 2000, 'libertadores', 0, 1, NULL, 2, 18, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(341, 30, 69, 110, 'atletico nacional', 'cerro porteño', 2000, 'libertadores', 0, 2, NULL, 2, 19, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(342, 30, 26, 146, 'racing club', 'liga de loja', 2000, 'libertadores', 0, 2, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(343, 30, 26, 69, 'racing club', 'atletico nacional', 2000, 'libertadores', 0, 3, NULL, 2, 19, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(344, 30, 146, 110, 'liga de loja', 'cerro porteño', 2000, 'libertadores', 0, 3, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:10'),
(345, 30, 69, 26, 'atletico nacional', 'racing club', 2000, 'libertadores', 0, 4, NULL, 2, 19, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:09', '2024-11-25 00:42:11'),
(346, 30, 110, 146, 'cerro porteño', 'liga de loja', 2000, 'libertadores', 0, 4, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(347, 30, 110, 69, 'cerro porteño', 'atletico nacional', 2000, 'libertadores', 0, 5, NULL, 2, 19, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(348, 30, 146, 26, 'liga de loja', 'racing club', 2000, 'libertadores', 0, 5, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(349, 30, 69, 146, 'atletico nacional', 'liga de loja', 2000, 'libertadores', 0, 6, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(350, 30, 26, 110, 'racing club', 'cerro porteño', 2000, 'libertadores', 0, 6, NULL, 2, 18, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(351, 31, 160, 4, 'la paz fc', 'gremio', 2000, 'libertadores', 0, 1, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(352, 31, 129, 90, 'union española', 'nacional', 2000, 'libertadores', 0, 1, NULL, 2, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(353, 31, 4, 129, 'gremio', 'union española', 2000, 'libertadores', 0, 2, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(354, 31, 90, 160, 'nacional', 'la paz fc', 2000, 'libertadores', 0, 2, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(355, 31, 90, 4, 'nacional', 'gremio', 2000, 'libertadores', 0, 3, NULL, 2, 19, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(356, 31, 160, 129, 'la paz fc', 'union española', 2000, 'libertadores', 0, 3, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(357, 31, 4, 90, 'gremio', 'nacional', 2000, 'libertadores', 0, 4, NULL, 2, 19, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(358, 31, 129, 160, 'union española', 'la paz fc', 2000, 'libertadores', 0, 4, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(359, 31, 129, 4, 'union española', 'gremio', 2000, 'libertadores', 0, 5, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(360, 31, 160, 90, 'la paz fc', 'nacional', 2000, 'libertadores', 0, 5, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(361, 31, 4, 160, 'gremio', 'la paz fc', 2000, 'libertadores', 0, 6, NULL, 2, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(362, 31, 90, 129, 'nacional', 'union española', 2000, 'libertadores', 0, 6, NULL, 2, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(363, 32, 171, 24, 'juan aurich', 'velez sarsfield', 2000, 'libertadores', 0, 1, NULL, 2, 16, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(364, 32, 132, 79, 'huachipato', 'atletico huila', 2000, 'libertadores', 0, 1, NULL, 2, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(365, 32, 24, 132, 'velez sarsfield', 'huachipato', 2000, 'libertadores', 0, 2, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(366, 32, 79, 171, 'atletico huila', 'juan aurich', 2000, 'libertadores', 0, 2, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(367, 32, 79, 24, 'atletico huila', 'velez sarsfield', 2000, 'libertadores', 0, 3, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(368, 32, 171, 132, 'juan aurich', 'huachipato', 2000, 'libertadores', 0, 3, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(369, 32, 24, 79, 'velez sarsfield', 'atletico huila', 2000, 'libertadores', 0, 4, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(370, 32, 132, 171, 'huachipato', 'juan aurich', 2000, 'libertadores', 0, 4, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(371, 32, 132, 24, 'huachipato', 'velez sarsfield', 2000, 'libertadores', 0, 5, NULL, 2, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(372, 32, 171, 79, 'juan aurich', 'atletico huila', 2000, 'libertadores', 0, 5, NULL, 2, 11, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(373, 32, 24, 171, 'velez sarsfield', 'juan aurich', 2000, 'libertadores', 0, 6, NULL, 2, 16, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(374, 32, 79, 132, 'atletico huila', 'huachipato', 2000, 'libertadores', 0, 6, NULL, 2, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(375, 33, 155, 22, 'bolivar', 'boca juniors', 2000, 'libertadores', 0, 1, NULL, 3, 20, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(376, 33, 116, 73, 'sol de america', 'independiente medellin', 2000, 'libertadores', 0, 1, NULL, 3, 13, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(377, 33, 22, 116, 'boca juniors', 'sol de america', 2000, 'libertadores', 0, 2, NULL, 3, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(378, 33, 73, 155, 'independiente medellin', 'bolivar', 2000, 'libertadores', 0, 2, NULL, 3, 18, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(379, 33, 73, 22, 'independiente medellin', 'boca juniors', 2000, 'libertadores', 0, 3, NULL, 3, 18, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(380, 33, 155, 116, 'bolivar', 'sol de america', 2000, 'libertadores', 0, 3, NULL, 3, 15, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(381, 33, 22, 73, 'boca juniors', 'independiente medellin', 2000, 'libertadores', 0, 4, NULL, 3, 18, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(382, 33, 116, 155, 'sol de america', 'bolivar', 2000, 'libertadores', 0, 4, NULL, 3, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(383, 33, 116, 22, 'sol de america', 'boca juniors', 2000, 'libertadores', 0, 5, NULL, 3, 15, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(384, 33, 155, 73, 'bolivar', 'independiente medellin', 2000, 'libertadores', 0, 5, NULL, 3, 18, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(385, 33, 22, 155, 'boca juniors', 'bolivar', 2000, 'libertadores', 0, 6, NULL, 3, 20, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(386, 33, 73, 116, 'independiente medellin', 'sol de america', 2000, 'libertadores', 0, 6, NULL, 3, 13, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(387, 34, 181, 9, 'deportivo tachira', 'fluminense', 2000, 'libertadores', 0, 1, NULL, 3, 14, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(388, 34, 147, 94, 'deportivo cuenca', 'liverpool', 2000, 'libertadores', 0, 1, NULL, 3, 12, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(389, 34, 9, 147, 'fluminense', 'deportivo cuenca', 2000, 'libertadores', 0, 2, NULL, 3, 10, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(390, 34, 94, 181, 'liverpool', 'deportivo tachira', 2000, 'libertadores', 0, 2, NULL, 3, 16, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(391, 34, 94, 9, 'liverpool', 'fluminense', 2000, 'libertadores', 0, 3, NULL, 3, 14, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(392, 34, 181, 147, 'deportivo tachira', 'deportivo cuenca', 2000, 'libertadores', 0, 3, NULL, 3, 12, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(393, 34, 9, 94, 'fluminense', 'liverpool', 2000, 'libertadores', 0, 4, NULL, 3, 14, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(394, 34, 147, 181, 'deportivo cuenca', 'deportivo tachira', 2000, 'libertadores', 0, 4, NULL, 3, 12, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(395, 34, 147, 9, 'deportivo cuenca', 'fluminense', 2000, 'libertadores', 0, 5, NULL, 3, 10, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(396, 34, 181, 94, 'deportivo tachira', 'liverpool', 2000, 'libertadores', 0, 5, NULL, 3, 16, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(397, 34, 9, 181, 'fluminense', 'deportivo tachira', 2000, 'libertadores', 0, 6, NULL, 3, 14, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(398, 34, 94, 147, 'liverpool', 'deportivo cuenca', 2000, 'libertadores', 0, 6, NULL, 3, 12, 19, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(399, 35, 185, 29, 'zamora fc', 'huracan', 2000, 'libertadores', 0, 1, NULL, 3, 12, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(400, 35, 114, 98, 'sportivo luqueño', 'cerro largo', 2000, 'libertadores', 0, 1, NULL, 3, 12, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(401, 35, 29, 114, 'huracan', 'sportivo luqueño', 2000, 'libertadores', 0, 2, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(402, 35, 98, 185, 'cerro largo', 'zamora fc', 2000, 'libertadores', 0, 2, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(403, 35, 98, 29, 'cerro largo', 'huracan', 2000, 'libertadores', 0, 3, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(404, 35, 185, 114, 'zamora fc', 'sportivo luqueño', 2000, 'libertadores', 0, 3, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(405, 35, 29, 98, 'huracan', 'cerro largo', 2000, 'libertadores', 0, 4, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(406, 35, 114, 185, 'sportivo luqueño', 'zamora fc', 2000, 'libertadores', 0, 4, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(407, 35, 114, 29, 'sportivo luqueño', 'huracan', 2000, 'libertadores', 0, 5, NULL, 3, 14, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(408, 35, 185, 98, 'zamora fc', 'cerro largo', 2000, 'libertadores', 0, 5, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(409, 35, 29, 185, 'huracan', 'zamora fc', 2000, 'libertadores', 0, 6, NULL, 3, 12, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(410, 35, 98, 114, 'cerro largo', 'sportivo luqueño', 2000, 'libertadores', 0, 6, NULL, 3, 12, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(411, 36, 180, 3, 'minerven', 'flamengo', 2000, 'libertadores', 0, 1, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(412, 36, 145, 101, 'deportivo quito', 'cerro', 2000, 'libertadores', 0, 1, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(413, 36, 3, 145, 'flamengo', 'deportivo quito', 2000, 'libertadores', 0, 2, NULL, 3, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(414, 36, 101, 180, 'cerro', 'minerven', 2000, 'libertadores', 0, 2, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(415, 36, 101, 3, 'cerro', 'flamengo', 2000, 'libertadores', 0, 3, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(416, 36, 180, 145, 'minerven', 'deportivo quito', 2000, 'libertadores', 0, 3, NULL, 3, 15, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(417, 36, 3, 101, 'flamengo', 'cerro', 2000, 'libertadores', 0, 4, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(418, 36, 145, 180, 'deportivo quito', 'minerven', 2000, 'libertadores', 0, 4, NULL, 3, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(419, 36, 145, 3, 'deportivo quito', 'flamengo', 2000, 'libertadores', 0, 5, NULL, 3, 15, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(420, 36, 180, 101, 'minerven', 'cerro', 2000, 'libertadores', 0, 5, NULL, 3, 13, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(421, 36, 3, 180, 'flamengo', 'minerven', 2000, 'libertadores', 0, 6, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(422, 36, 101, 145, 'cerro', 'deportivo quito', 2000, 'libertadores', 0, 6, NULL, 3, 10, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(423, 37, 179, 5, 'caracas fc', 'palmeiras', 2000, 'libertadores', 0, 1, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(424, 37, 126, 72, 'universidad de chile', 'junior', 2000, 'libertadores', 0, 1, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(425, 37, 5, 126, 'palmeiras', 'universidad de chile', 2000, 'libertadores', 0, 2, NULL, 3, 17, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(426, 37, 72, 179, 'junior', 'caracas fc', 2000, 'libertadores', 0, 2, NULL, 3, 19, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(427, 37, 72, 5, 'junior', 'palmeiras', 2000, 'libertadores', 0, 3, NULL, 3, 17, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(428, 37, 179, 126, 'caracas fc', 'universidad de chile', 2000, 'libertadores', 0, 3, NULL, 3, 19, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:10'),
(429, 37, 5, 72, 'palmeiras', 'junior', 2000, 'libertadores', 0, 4, NULL, 3, 17, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(430, 37, 126, 179, 'universidad de chile', 'caracas fc', 2000, 'libertadores', 0, 4, NULL, 3, 19, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(431, 37, 126, 5, 'universidad de chile', 'palmeiras', 2000, 'libertadores', 0, 5, NULL, 3, 17, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(432, 37, 179, 72, 'caracas fc', 'junior', 2000, 'libertadores', 0, 5, NULL, 3, 19, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(433, 37, 5, 179, 'palmeiras', 'caracas fc', 2000, 'libertadores', 0, 6, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11'),
(434, 37, 72, 126, 'junior', 'universidad de chile', 2000, 'libertadores', 0, 6, NULL, 3, 18, 21, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-11-25 00:42:10', '2024-11-25 00:42:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'charly', 'charlyzz68@gmail.com', NULL, '$2y$10$u/4YzZjUFAS69MCpFOjTbOLqzPb241lpw0eWJl1GznXTWzWY7M8li', NULL, '2024-10-25 01:19:05', '2024-10-25 01:19:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `back_calendar`
--
ALTER TABLE `back_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `back_colores`
--
ALTER TABLE `back_colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `back_cupos_afa`
--
ALTER TABLE `back_cupos_afa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cupos_afa_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `back_equipos`
--
ALTER TABLE `back_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipos_liga_id_foreign` (`liga_id`),
  ADD KEY `equipos_a_foreign` (`a`),
  ADD KEY `equipos_b_foreign` (`b`),
  ADD KEY `equipos_c_foreign` (`c`),
  ADD KEY `equipos_combinado_foreign` (`combinado`),
  ADD KEY `equipos_clasico_id_foreign` (`clasico_id`),
  ADD KEY `equipos_alternativo_foreign` (`alternativo`);

--
-- Indices de la tabla `back_equipos_grupo`
--
ALTER TABLE `back_equipos_grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipos_grupo_grupo_id_foreign` (`grupo_id`),
  ADD KEY `equipos_grupo_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `back_goleadores`
--
ALTER TABLE `back_goleadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goleadores_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `back_grupos`
--
ALTER TABLE `back_grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `back_ligas`
--
ALTER TABLE `back_ligas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ligas_a_foreign` (`a`),
  ADD KEY `ligas_b_foreign` (`b`),
  ADD KEY `ligas_c_foreign` (`c`);

--
-- Indices de la tabla `back_main`
--
ALTER TABLE `back_main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_lib_foreign` (`lib`),
  ADD KEY `main_sud_foreign` (`sud`),
  ADD KEY `main_rec_foreign` (`rec`),
  ADD KEY `main_afa_a_foreign` (`afa_a`),
  ADD KEY `main_afa_b_foreign` (`afa_b`),
  ADD KEY `main_afa_c_foreign` (`afa_c`),
  ADD KEY `main_arg_foreign` (`arg`),
  ADD KEY `main_last_partido_foreign` (`last_partido`);

--
-- Indices de la tabla `back_partidos`
--
ALTER TABLE `back_partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partidos_grupo_id_foreign` (`grupo_id`),
  ADD KEY `partidos_loc_id_foreign` (`loc_id`),
  ADD KEY `partidos_vis_id_foreign` (`vis_id`),
  ADD KEY `partidos_winner_id_foreign` (`winner_id`);

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupos_afa`
--
ALTER TABLE `cupos_afa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cupos_afa_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipos_liga_id_foreign` (`liga_id`),
  ADD KEY `equipos_a_foreign` (`a`),
  ADD KEY `equipos_b_foreign` (`b`),
  ADD KEY `equipos_c_foreign` (`c`),
  ADD KEY `equipos_combinado_foreign` (`combinado`),
  ADD KEY `equipos_clasico_id_foreign` (`clasico_id`),
  ADD KEY `equipos_alternativo_foreign` (`alternativo`);

--
-- Indices de la tabla `equipos_grupo`
--
ALTER TABLE `equipos_grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipos_grupo_grupo_id_foreign` (`grupo_id`),
  ADD KEY `equipos_grupo_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `goleadores`
--
ALTER TABLE `goleadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goleadores_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ligas_a_foreign` (`a`),
  ADD KEY `ligas_b_foreign` (`b`),
  ADD KEY `ligas_c_foreign` (`c`);

--
-- Indices de la tabla `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_lib_foreign` (`lib`),
  ADD KEY `main_sud_foreign` (`sud`),
  ADD KEY `main_rec_foreign` (`rec`),
  ADD KEY `main_afa_a_foreign` (`afa_a`),
  ADD KEY `main_afa_b_foreign` (`afa_b`),
  ADD KEY `main_afa_c_foreign` (`afa_c`),
  ADD KEY `main_arg_foreign` (`arg`),
  ADD KEY `main_last_partido_foreign` (`last_partido`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partidos_grupo_id_foreign` (`grupo_id`),
  ADD KEY `partidos_loc_id_foreign` (`loc_id`),
  ADD KEY `partidos_vis_id_foreign` (`vis_id`),
  ADD KEY `partidos_winner_id_foreign` (`winner_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `back_calendar`
--
ALTER TABLE `back_calendar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `back_colores`
--
ALTER TABLE `back_colores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `back_cupos_afa`
--
ALTER TABLE `back_cupos_afa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `back_equipos`
--
ALTER TABLE `back_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `back_equipos_grupo`
--
ALTER TABLE `back_equipos_grupo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `back_goleadores`
--
ALTER TABLE `back_goleadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `back_grupos`
--
ALTER TABLE `back_grupos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `back_ligas`
--
ALTER TABLE `back_ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `back_main`
--
ALTER TABLE `back_main`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `back_partidos`
--
ALTER TABLE `back_partidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `cupos_afa`
--
ALTER TABLE `cupos_afa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `equipos_grupo`
--
ALTER TABLE `equipos_grupo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `goleadores`
--
ALTER TABLE `goleadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `main`
--
ALTER TABLE `main`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
