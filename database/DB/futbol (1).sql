-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2024 a las 00:18:10
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

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
(1, 'INICIO', '[]', NULL, NULL, NULL, NULL, 0, 1, NULL, '2024-10-23 14:27:28'),
(2, 'SORTEO', '[\"recopa\"]', NULL, NULL, 'marzo', 2, 0, 1, NULL, '2024-10-23 14:27:38'),
(3, 'FECHA', '[\"recopa\"]', 5, 1, 'marzo', 3, 1, 0, NULL, '2024-10-23 14:27:47'),
(4, 'FECHA', '[\"recopa\"]', 5, 2, 'marzo', 4, 0, 0, NULL, '2024-10-23 14:27:14'),
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

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de las tablas volcadas
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
