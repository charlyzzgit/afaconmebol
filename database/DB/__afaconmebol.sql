-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2024 a las 01:03:48
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
(1, 'INICIO', '[]', NULL, NULL, NULL, NULL, 0, 0, NULL, '2023-10-08 00:01:51'),
(2, 'SORTEO', '[\"recopa\"]', NULL, NULL, 'marzo', 2, 0, 0, NULL, '2023-10-08 00:02:20'),
(3, 'FECHA', '[\"recopa\"]', 5, 1, 'marzo', 3, 0, 0, NULL, '2023-10-08 00:02:50'),
(4, 'FECHA', '[\"recopa\"]', 5, 2, 'marzo', 4, 0, 0, NULL, '2023-10-08 00:02:50'),
(5, 'SORTEO', '[\"afa\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'marzo', 5, 0, 0, NULL, '2023-10-08 00:05:36'),
(6, 'FECHA', '[\"afa\"]', -2, 1, 'abril', 1, 0, 0, NULL, '2023-10-10 01:41:06'),
(7, 'FECHA', '[\"sudamericana\"]', 0, 1, 'abril', 1, 0, 0, NULL, '2023-10-10 01:41:08'),
(8, 'FECHA', '[\"afa\"]', -2, 2, 'abril', 2, 0, 0, NULL, '2023-10-10 01:41:09'),
(9, 'FECHA', '[\"libertadores\"]', 0, 1, 'abril', 2, 0, 0, NULL, '2023-10-10 01:41:12'),
(10, 'FECHA', '[\"afa\"]', -2, 3, 'abril', 3, 0, 0, NULL, '2023-10-10 01:41:13'),
(11, 'FECHA', '[\"sudamericana\"]', 0, 2, 'abril', 3, 0, 0, NULL, '2023-10-10 01:41:15'),
(12, 'FECHA', '[\"afa\"]', -2, 4, 'abril', 4, 0, 0, NULL, '2023-10-10 01:41:16'),
(13, 'FECHA', '[\"libertadores\"]', 0, 2, 'abril', 4, 0, 0, NULL, '2023-10-10 01:41:18'),
(14, 'FECHA', '[\"afa\"]', -2, 5, 'mayo', 1, 0, 0, NULL, '2023-10-10 01:41:20'),
(15, 'FECHA', '[\"sudamericana\"]', 0, 3, 'mayo', 1, 0, 0, NULL, '2023-10-10 01:41:21'),
(16, 'FECHA', '[\"afa\"]', -2, 6, 'mayo', 2, 0, 0, NULL, '2023-10-10 01:41:23'),
(17, 'FECHA', '[\"libertadores\"]', 0, 3, 'mayo', 2, 0, 0, NULL, '2023-10-10 01:41:25'),
(18, 'SORTEO', '[\"afa\"]', NULL, NULL, 'mayo', 2, 0, 0, NULL, '2023-10-10 01:43:38'),
(19, 'FECHA', '[\"afa\"]', -1, 1, 'mayo', 3, 0, 0, NULL, '2023-10-10 01:44:16'),
(20, 'FECHA', '[\"sudamericana\"]', 0, 4, 'mayo', 3, 0, 0, NULL, '2023-10-10 01:44:17'),
(21, 'FECHA', '[\"afa\"]', -1, 2, 'mayo', 4, 0, 0, NULL, '2023-10-10 01:44:18'),
(22, 'FECHA', '[\"libertadores\"]', 0, 4, 'mayo', 4, 0, 0, NULL, '2023-10-10 01:44:20'),
(23, 'FECHA', '[\"afa\"]', -1, 3, 'junio', 1, 0, 0, NULL, '2023-10-10 01:44:22'),
(24, 'FECHA', '[\"sudamericana\"]', 0, 5, 'junio', 1, 0, 0, NULL, '2023-10-10 01:44:23'),
(25, 'FECHA', '[\"afa\"]', -1, 4, 'junio', 2, 0, 0, NULL, '2023-10-10 01:44:25'),
(26, 'FECHA', '[\"libertadores\"]', 0, 5, 'junio', 2, 0, 0, NULL, '2023-10-10 01:44:27'),
(27, 'FECHA', '[\"afa\"]', -1, 5, 'junio', 3, 0, 0, NULL, '2023-10-10 01:44:29'),
(28, 'FECHA', '[\"sudamericana\"]', 0, 6, 'junio', 3, 0, 0, NULL, '2023-10-10 01:44:30'),
(29, 'FECHA', '[\"afa\"]', -1, 6, 'abril', 4, 0, 0, NULL, '2023-10-10 01:44:32'),
(30, 'FECHA', '[\"libertadores\"]', 0, 6, 'junio', 4, 0, 0, NULL, '2023-10-10 01:44:34'),
(31, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'julio', 1, 0, 0, NULL, '2023-10-10 01:45:33'),
(32, 'FECHA', '[\"argentina\"]', 1, 1, 'julio', 1, 0, 0, NULL, '2023-10-10 01:46:31'),
(33, 'FECHA', '[\"sudamericana\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2023-10-10 01:46:32'),
(34, 'FECHA', '[\"libertadores\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2023-10-10 01:46:33'),
(35, 'FECHA', '[\"argentina\"]', 1, 2, 'julio', 3, 0, 0, NULL, '2023-10-10 01:46:34'),
(36, 'FECHA', '[\"sudamericana\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2023-10-10 01:46:36'),
(37, 'FECHA', '[\"libertadores\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2023-10-10 01:46:37'),
(38, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'agosto', 1, 0, 0, NULL, '2023-10-10 01:47:17'),
(39, 'FECHA', '[\"afa\"]', 0, 1, 'agosto', 1, 0, 0, NULL, '2023-10-10 01:48:06'),
(40, 'FECHA', '[\"argentina\"]', 2, 1, 'agosto', 1, 0, 0, NULL, '2023-10-10 01:48:06'),
(41, 'FECHA', '[\"afa\"]', 0, 2, 'agosto', 2, 0, 0, NULL, '2023-10-10 01:48:08'),
(42, 'FECHA', '[\"sudamericana\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2023-10-10 01:48:09'),
(43, 'FECHA', '[\"libertadores\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2023-10-10 01:48:09'),
(44, 'FECHA', '[\"afa\"]', 0, 3, 'agosto', 3, 0, 0, NULL, '2023-10-10 01:48:11'),
(45, 'FECHA', '[\"argentina\"]', 2, 2, 'agosto', 3, 0, 0, NULL, '2023-10-10 01:48:12'),
(46, 'FECHA', '[\"afa\"]', 0, 4, 'agosto', 4, 0, 0, NULL, '2023-10-10 01:48:13'),
(47, 'FECHA', '[\"sudamericana\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2023-10-10 01:48:14'),
(48, 'FECHA', '[\"libertadores\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2023-10-10 01:48:15'),
(49, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'septiembre', 1, 0, 0, NULL, '2023-10-10 01:48:39'),
(50, 'FECHA', '[\"afa\"]', 0, 5, 'septiembre', 1, 0, 0, NULL, '2023-10-10 01:49:06'),
(51, 'FECHA', '[\"argentina\"]', 3, 1, 'septiembre', 1, 0, 0, NULL, '2023-10-10 01:49:07'),
(52, 'FECHA', '[\"afa\"]', 0, 6, 'septiembre', 2, 0, 0, NULL, '2023-10-10 01:49:08'),
(53, 'FECHA', '[\"sudamericana\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2023-10-10 01:49:09'),
(54, 'FECHA', '[\"libertadores\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2023-10-10 01:49:09'),
(55, 'SORTEO', '[\"afa\"]', NULL, NULL, 'septiembre', 3, 0, 0, NULL, '2023-10-10 01:49:33'),
(56, 'FECHA', '[\"afa\"]', 1, 1, 'septiembre', 3, 0, 0, NULL, '2023-10-10 01:50:03'),
(57, 'FECHA', '[\"argentina\"]', 3, 2, 'septiembre', 3, 0, 0, NULL, '2023-10-10 01:50:04'),
(58, 'FECHA', '[\"afa\"]', 1, 2, 'septiembre', 4, 0, 0, NULL, '2023-10-10 01:50:05'),
(59, 'FECHA', '[\"sudamericana\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2023-10-10 01:50:06'),
(60, 'FECHA', '[\"libertadores\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2023-10-10 01:50:06'),
(61, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'octubre', 1, 0, 0, NULL, '2023-10-10 01:50:24'),
(62, 'FECHA', '[\"afa\"]', 1, 3, 'octubre', 1, 0, 0, NULL, '2023-10-10 01:51:04'),
(63, 'FECHA', '[\"argentina\"]', 4, 1, 'octubre', 1, 0, 0, NULL, '2023-10-10 01:51:04'),
(64, 'FECHA', '[\"afa\"]', 1, 4, 'octubre', 2, 0, 0, NULL, '2023-10-10 01:51:06'),
(65, 'FECHA', '[\"sudamericana\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2023-10-10 01:51:06'),
(66, 'FECHA', '[\"libertadores\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2023-10-10 01:51:06'),
(68, 'FECHA', '[\"afa\"]', 1, 5, 'octubre', 3, 0, 0, NULL, '2023-10-10 01:51:08'),
(69, 'FECHA', '[\"argentina\"]', 4, 2, 'octubre', 3, 0, 0, NULL, '2023-10-10 01:51:08'),
(70, 'FECHA', '[\"afa\"]', 1, 6, 'octubre', 4, 0, 0, NULL, '2023-10-10 01:51:09'),
(71, 'FECHA', '[\"sudamericana\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2023-10-10 01:51:09'),
(72, 'FECHA', '[\"libertadores\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2023-10-10 01:51:10'),
(73, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:51:31'),
(74, 'FECHA', '[\"afa\"]', 2, 1, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:52:47'),
(75, 'FECHA', '[\"afa\"]', 2, 2, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:52:49'),
(76, 'FECHA', '[\"argentina\"]', 5, 1, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:52:49'),
(77, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:07'),
(78, 'FECHA', '[\"afa\"]', 3, 1, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:28'),
(79, 'FECHA', '[\"afa\"]', 3, 2, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:29'),
(80, 'FECHA', '[\"sudamericana\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:29'),
(81, 'FECHA', '[\"libertadores\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:29'),
(82, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 3, 0, 0, NULL, '2023-10-10 01:53:50'),
(83, 'FECHA', '[\"afa\"]', 4, 1, 'noviembre', 3, 0, 0, NULL, '2023-10-10 01:54:15'),
(84, 'FECHA', '[\"argentina\"]', 5, 2, 'noviembre', 3, 0, 0, NULL, '2023-10-10 01:54:15'),
(85, 'FECHA', '[\"afa\"]', 4, 2, 'noviembre', 4, 0, 0, NULL, '2023-10-10 01:54:16'),
(86, 'FECHA', '[\"sudamericana\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2023-10-10 01:54:16'),
(87, 'FECHA', '[\"libertadores\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2023-10-10 01:54:16'),
(88, 'SORTEO', '[\"afa\"]', NULL, NULL, 'diciembre', 1, 0, 0, NULL, '2023-10-10 01:55:07'),
(89, 'FECHA', '[\"afa\"]', 5, 1, 'diciembre', 1, 0, 0, NULL, '2023-10-10 14:55:11'),
(90, 'FECHA', '[\"afa\"]', 5, 2, 'diciembre', 2, 0, 0, NULL, '2023-10-11 01:21:44');

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
(1, 1, 'brasil', 'san pablo fc', 15, 1, 14, 15, 34, 'ligas/brasil/equipos/san_pablo_fc/', NULL, 'grande', 'circular', 1, 10, 62, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(2, 1, 'brasil', 'cruzeiro', 2, 15, 15, 2, 15, 'ligas/brasil/equipos/cruzeiro/', NULL, 'grande', 'cuadriculada', 2, 10, 58, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(3, 1, 'brasil', 'flamengo', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/flamengo/', NULL, 'grande', 'rayada', 3, 9, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(4, 1, 'brasil', 'gremio', 6, 14, 15, 41, 15, 'ligas/brasil/equipos/gremio/', NULL, 'mediana', 'rayada', 4, 9, 53, 'libertadores', 8, NULL, '2023-10-08 00:01:50'),
(5, 1, 'brasil', 'palmeiras', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/palmeiras/', NULL, 'mediana', 'circular', 5, 8, 52, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(6, 1, 'brasil', 'corinthians', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/corinthians/', NULL, 'cuadrada', 'rayada', 6, 8, 56, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(7, 1, 'brasil', 'santos fc', 15, 14, 14, 15, 33, 'ligas/brasil/equipos/santos_fc/', NULL, 'mediana', 'romboide', 7, 7, 54, 'libertadores', 7, NULL, '2023-10-08 00:01:50'),
(8, 1, 'brasil', 'vasco da gama', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/vasco_da_gama/', NULL, 'grande', 'romboide', 8, 7, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(9, 1, 'brasil', 'fluminense', 20, 3, 15, 25, 15, 'ligas/brasil/equipos/fluminense/', NULL, 'mediana', 'rayada', 9, 6, 61, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(10, 1, 'brasil', 'internacional', 1, 15, 15, 1, 15, 'ligas/brasil/equipos/internacional/', NULL, 'grande', 'cuadriculada', 10, 6, 58, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(11, 1, 'brasil', 'atletico mineiro', 14, 15, 15, 33, 15, 'ligas/brasil/equipos/atletico_mineiro/', NULL, 'grande', 'cuadriculada', 11, 5, 65, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(12, 1, 'brasil', 'botafogo', 14, 15, 15, 33, 16, 'ligas/brasil/equipos/botafogo/', NULL, 'grande', 'lisa', 12, 5, 49, NULL, 100, NULL, '2023-10-08 00:01:49'),
(13, 1, 'brasil', 'paranaense', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/paranaense/', NULL, 'cuadrada', 'cuadriculada', 13, 4, 51, NULL, 100, NULL, '2023-10-08 00:01:50'),
(14, 1, 'brasil', 'goias', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/goias/', NULL, 'mediana', 'cuadriculada', 14, 4, 52, 'sudamericana', 10, NULL, '2023-10-08 00:01:50'),
(15, 1, 'brasil', 'bahia', 15, 2, 1, 15, 23, 'ligas/brasil/equipos/bahia/', NULL, 'grande', 'rayada', 15, 3, 52, 'sudamericana', 11, NULL, '2023-10-08 00:01:50'),
(16, 1, 'brasil', 'chapecoense', 3, 15, 7, 3, 15, 'ligas/brasil/equipos/chapecoense/', NULL, 'cuadrada', 'romboide', 16, 3, 45, NULL, 100, NULL, '2023-10-08 00:01:49'),
(17, 1, 'brasil', 'coritiba', 15, 3, 3, 15, 36, 'ligas/brasil/equipos/coritiba/', NULL, 'grande', 'cuadriculada', 17, 2, 52, 'sudamericana', 12, NULL, '2023-10-08 00:01:50'),
(18, 1, 'brasil', 'ponte preta', 15, 14, 14, 33, 14, 'ligas/brasil/equipos/ponte_preta/', NULL, 'grande', 'lisa', 18, 2, 36, NULL, 100, NULL, '2023-10-08 00:01:49'),
(19, 1, 'brasil', 'avai', 2, 15, 15, 28, 15, 'ligas/brasil/equipos/avai/', NULL, 'grande', 'romboide', 19, 1, 23, NULL, 100, NULL, '2023-10-08 00:01:49'),
(20, 1, 'brasil', 'portuguesa', 1, 3, 15, 25, 15, 'ligas/brasil/equipos/portuguesa/', NULL, 'mediana', 'cuadriculada', 20, 1, 25, NULL, 100, NULL, '2023-10-08 00:01:49'),
(21, 2, 'argentina', 'river plate', 15, 1, 14, 15, 14, 'ligas/argentina/equipos/river_plate/', 22, 'grande', 'rayada', 1, 10, 34, 'sudamericana', 10, NULL, '2023-10-08 00:01:51'),
(22, 2, 'argentina', 'boca juniors', 2, 4, 4, 2, 15, 'ligas/argentina/equipos/boca_juniors/', 21, 'mediana', 'rayada', 2, 10, 33, 'libertadores', 6, NULL, '2023-10-08 00:01:51'),
(23, 2, 'argentina', 'san lorenzo', 2, 1, 1, 23, 15, 'ligas/argentina/equipos/san_lorenzo/', 29, 'mediana', 'cuadriculada', 3, 10, 42, NULL, 3, NULL, '2023-10-08 00:01:49'),
(24, 2, 'argentina', 'velez sarsfield', 15, 2, 2, 15, 2, 'ligas/argentina/equipos/velez_sarsfield/', 30, 'cuadrada', 'rayada', 4, 10, 39, NULL, 4, NULL, '2023-10-08 00:01:49'),
(25, 2, 'argentina', 'independiente', 1, 15, 10, 1, 15, 'ligas/argentina/equipos/independiente/', 26, 'cuadrada', 'cuadriculada', 5, 9, 38, 'libertadores', 7, NULL, '2023-10-08 00:01:51'),
(26, 2, 'argentina', 'racing club', 6, 15, 10, 29, 10, 'ligas/argentina/equipos/racing_club/', 25, 'grande', 'cuadriculada', 6, 9, 27, NULL, 6, NULL, '2023-10-08 00:01:49'),
(27, 2, 'argentina', 'newells old boys', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/newells_old_boys/', 28, 'cuadrada', 'cuadriculada', 7, 9, 32, NULL, 10, NULL, '2023-10-08 00:01:49'),
(28, 2, 'argentina', 'rosario central', 4, 2, 2, 27, 15, 'ligas/argentina/equipos/rosario_central/', 27, 'mediana', 'romboide', 8, 9, 21, NULL, 9, NULL, '2023-10-08 00:01:49'),
(29, 2, 'argentina', 'huracan', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/huracan/', 23, 'mediana', 'lisa', 9, 8, 27, NULL, 7, NULL, '2023-10-08 00:01:49'),
(30, 2, 'argentina', 'ferrocarril oeste', 3, 15, 12, 3, 15, 'ligas/argentina/equipos/ferrocarril_oeste/', 24, 'cuadrada', 'romboide', 10, 8, 44, 'sudamericana', 12, NULL, '2023-10-08 00:01:51'),
(31, 2, 'argentina', 'estudiantes la plata', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/estudiantes_la_plata/', 32, 'grande', 'circular', 11, 8, 36, NULL, 11, NULL, '2023-10-08 00:01:49'),
(32, 2, 'argentina', 'gimnasia la plata', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/gimnasia_la_plata/', 31, 'grande', 'circular', 12, 8, 18, NULL, 12, NULL, '2023-10-08 00:01:49'),
(33, 2, 'argentina', 'lanus', 20, 15, 15, 20, 15, 'ligas/argentina/equipos/lanus/', 34, 'cuadrada', 'cuadriculada', 13, 7, 38, 'sudamericana', 11, NULL, '2023-10-08 00:01:51'),
(34, 2, 'argentina', 'banfield', 15, 3, 5, 15, 5, 'ligas/argentina/equipos/banfield/', 33, 'chica', 'rayada', 14, 7, 36, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(35, 2, 'argentina', 'argentinos juniors', 1, 15, 2, 1, 15, 'ligas/argentina/equipos/argentinos_juniors/', 53, 'cuadrada', 'lisa', 15, 7, 33, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(36, 2, 'argentina', 'godoy cruz', 2, 15, 15, 2, 15, 'ligas/argentina/equipos/godoy_cruz/', 56, 'grande', 'circular', 16, 7, 22, NULL, 16, NULL, '2023-10-08 00:01:49'),
(37, 2, 'argentina', 'colon', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/colon/', 38, 'chica', 'circular', 17, 6, 32, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(38, 2, 'argentina', 'union', 1, 15, 2, 24, 2, 'ligas/argentina/equipos/union/', 37, 'chica', 'cuadriculada', 18, 6, 31, NULL, 18, NULL, '2023-10-08 00:01:49'),
(39, 2, 'argentina', 'talleres cordoba', 10, 15, 20, 28, 20, 'ligas/argentina/equipos/talleres_cordoba/', 41, 'grande', 'romboide', 19, 6, 31, NULL, 19, NULL, '2023-10-08 00:01:49'),
(40, 2, 'argentina', 'instituto cordoba', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/instituto_cordoba/', 65, 'grande', 'romboide', 20, 6, 45, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(41, 2, 'argentina', 'belgrano cordoba', 6, 14, 14, 6, 15, 'ligas/argentina/equipos/belgrano_cordoba/', 39, 'grande', 'romboide', 21, 5, 34, NULL, 21, NULL, '2023-10-08 00:01:49'),
(42, 2, 'argentina', 'atletico rafaela', 6, 15, 4, 29, 2, 'ligas/argentina/equipos/atletico_rafaela/', 49, 'cuadrada', 'cuadriculada', 22, 5, 18, NULL, 22, NULL, '2023-10-08 00:01:49'),
(43, 2, 'argentina', 'quilmes', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/quilmes/', 44, 'cuadrada', 'rayada', 23, 5, 20, NULL, 23, NULL, '2023-10-08 00:01:49'),
(44, 2, 'argentina', 'arsenal', 6, 1, 15, 6, 15, 'ligas/argentina/equipos/arsenal/', 43, 'chica', 'lisa', 24, 5, 39, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(45, 2, 'argentina', 'aldosivi', 4, 3, 14, 35, 15, 'ligas/argentina/equipos/aldosivi/', 48, 'grande', 'circular', 25, 4, 20, NULL, 25, NULL, '2023-10-08 00:01:49'),
(46, 2, 'argentina', 'defensa y justicia', 4, 3, 3, 4, 3, 'ligas/argentina/equipos/defensa_y_justicia/', 55, 'chica', 'lisa', 26, 4, 31, NULL, 26, NULL, '2023-10-08 00:01:49'),
(47, 2, 'argentina', 'tigre', 2, 1, 1, 2, 15, 'ligas/argentina/equipos/tigre/', 63, 'chica', 'romboide', 27, 4, 33, 'libertadores', 8, NULL, '2023-10-08 00:01:51'),
(48, 2, 'argentina', 'olimpo', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/olimpo/', 45, 'chica', 'rayada', 28, 4, 47, NULL, 28, NULL, '2023-10-08 00:01:49'),
(49, 2, 'argentina', 'san martin san juan', 3, 14, 14, 37, 15, 'ligas/argentina/equipos/san_martin_san_juan/', 42, 'cuadrada', 'rayada', 29, 3, 25, NULL, 29, NULL, '2023-10-08 00:01:49'),
(50, 2, 'argentina', 'all boys', 15, 14, 14, 15, 14, 'ligas/argentina/equipos/all_boys/', 52, 'cuadrada', 'cuadriculada', 30, 3, 37, NULL, 30, NULL, '2023-10-08 00:01:49'),
(51, 2, 'argentina', 'chacarita juniors', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/chacarita_juniors/', 59, 'cuadrada', 'cuadriculada', 31, 3, 33, NULL, 31, NULL, '2023-10-08 00:01:49'),
(52, 2, 'argentina', 'nueva chicago', 3, 14, 15, 37, 15, 'ligas/argentina/equipos/nueva_chicago/', 50, 'chica', 'circular', 32, 3, 38, NULL, 32, NULL, '2023-10-08 00:01:49'),
(53, 2, 'argentina', 'platense', 15, 13, 13, 15, 13, 'ligas/argentina/equipos/platense/', 35, 'chica', 'lisa', 33, 3, 29, NULL, 33, NULL, '2023-10-08 00:01:49'),
(54, 2, 'argentina', 'boca unidos', 4, 1, 10, 26, 15, 'ligas/argentina/equipos/boca_unidos/', 61, 'chica', 'lisa', 34, 2, 29, NULL, 34, NULL, '2023-10-08 00:01:49'),
(55, 2, 'argentina', 'temperley', 6, 15, 15, 6, 15, 'ligas/argentina/equipos/temperley/', 46, 'chica', 'romboide', 35, 2, 34, NULL, 35, NULL, '2023-10-08 00:01:49'),
(56, 2, 'argentina', 'independiente rivadavia', 10, 15, 15, 10, 15, 'ligas/argentina/equipos/independiente_rivadavia/', 36, 'grande', 'circular', 36, 2, 35, NULL, 36, NULL, '2023-10-08 00:01:49'),
(57, 2, 'argentina', 'gimnasia jujuy', 15, 6, 10, 29, 2, 'ligas/argentina/equipos/gimnasia_jujuy/', 68, 'grande', 'romboide', 37, 2, 19, NULL, 37, NULL, '2023-10-08 00:01:49'),
(58, 2, 'argentina', 'atletico tucuman', 6, 15, 4, 29, 32, 'ligas/argentina/equipos/atletico_tucuman/', 62, 'chica', 'cuadriculada', 38, 2, 34, NULL, 38, NULL, '2023-10-08 00:01:49'),
(59, 2, 'argentina', 'atlanta', 2, 4, 4, 27, 15, 'ligas/argentina/equipos/atlanta/', 51, 'cuadrada', 'lisa', 39, 1, 25, NULL, 39, NULL, '2023-10-08 00:01:49'),
(60, 2, 'argentina', 'sarmiento', 3, 15, 15, 3, 15, 'ligas/argentina/equipos/sarmiento/', 66, 'chica', 'rayada', 40, 1, 24, NULL, 40, NULL, '2023-10-08 00:01:49'),
(61, 2, 'argentina', 'patronato', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/patronato/', 54, 'chica', 'lisa', 41, 1, 25, NULL, 41, NULL, '2023-10-08 00:01:49'),
(62, 2, 'argentina', 'san martin tucuman', 1, 15, 15, 24, 15, 'ligas/argentina/equipos/san_martin_tucuman/', 58, 'chica', 'romboide', 42, 1, 21, NULL, 42, NULL, '2023-10-08 00:01:49'),
(63, 2, 'argentina', 'almagro', 6, 14, 15, 41, 15, 'ligas/argentina/equipos/almagro/', 47, 'chica', 'lisa', 43, 1, 31, NULL, 43, NULL, '2023-10-08 00:01:49'),
(64, 2, 'argentina', 'almirante brown', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/almirante_brown/', 67, 'chica', 'rayada', 44, 1, 23, NULL, 44, NULL, '2023-10-08 00:01:49'),
(65, 2, 'argentina', 'racing cordoba', 6, 15, 15, 29, 2, 'ligas/argentina/equipos/racing_cordoba/', 40, 'grande', 'romboide', 45, 1, 18, NULL, 45, NULL, '2023-10-08 00:01:49'),
(66, 2, 'argentina', 'douglas haid', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/douglas_haid/', 60, 'chica', 'romboide', 46, 1, 11, NULL, 46, NULL, '2023-10-08 00:01:49'),
(67, 2, 'argentina', 'deportivo moron', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/deportivo_moron/', 64, 'chica', 'lisa', 47, 1, 27, 'sudamericana', 9, NULL, '2023-10-08 00:01:51'),
(68, 2, 'argentina', 'crucero del norte', 4, 5, 2, 4, 2, 'ligas/argentina/equipos/crucero_del_norte/', 57, 'chica', 'lisa', 48, 1, 29, NULL, 48, NULL, '2023-10-08 00:01:50'),
(69, 3, 'colombia', 'atletico nacional', 3, 15, 15, 36, 14, 'ligas/colombia/equipos/atletico_nacional/', NULL, 'grande', 'rayada', 1, 10, 52, 'sudamericana', 10, NULL, '2023-10-08 00:01:50'),
(70, 3, 'colombia', 'america', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/america/', NULL, 'grande', 'cuadriculada', 2, 10, 60, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(71, 3, 'colombia', 'deportivo cali', 3, 15, 15, 3, 15, 'ligas/colombia/equipos/deportivo_cali/', NULL, 'mediana', 'rayada', 3, 9, 62, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(72, 3, 'colombia', 'junior', 1, 15, 10, 24, 10, 'ligas/colombia/equipos/junior/', NULL, 'grande', 'cuadriculada', 4, 9, 50, 'sudamericana', 11, NULL, '2023-10-08 00:01:50'),
(73, 3, 'colombia', 'independiente medellin', 1, 2, 15, 1, 15, 'ligas/colombia/equipos/independiente_medellin/', NULL, 'grande', 'cuadriculada', 5, 8, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(74, 3, 'colombia', 'independiente santa fe', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/independiente_santa_fe/', NULL, 'mediana', 'romboide', 6, 8, 54, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(75, 3, 'colombia', 'millonarios', 2, 15, 15, 2, 15, 'ligas/colombia/equipos/millonarios/', NULL, 'mediana', 'cuadriculada', 7, 7, 50, NULL, 100, NULL, '2023-09-02 16:19:02'),
(76, 3, 'colombia', 'deportes tolima', 4, 1, 1, 26, 15, 'ligas/colombia/equipos/deportes_tolima/', NULL, 'grande', 'circular', 8, 7, 66, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(77, 3, 'colombia', 'once caldas', 15, 3, 1, 15, 14, 'ligas/colombia/equipos/once_caldas/', NULL, 'grande', 'circular', 9, 6, 60, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(78, 3, 'colombia', 'cucuta deportivo', 1, 14, 14, 34, 15, 'ligas/colombia/equipos/cucuta_deportivo/', NULL, 'grande', 'romboide', 10, 6, 50, NULL, 100, NULL, '2023-10-08 00:01:50'),
(79, 3, 'colombia', 'atletico huila', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_huila/', NULL, 'grande', 'cuadriculada', 11, 5, 64, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(80, 3, 'colombia', 'boyaca chico', 5, 10, 15, 5, 28, 'ligas/colombia/equipos/boyaca_chico/', NULL, 'mediana', 'cuadriculada', 12, 5, 54, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(81, 3, 'colombia', 'envigado', 5, 3, 15, 5, 15, 'ligas/colombia/equipos/envigado/', NULL, 'cuadrada', 'rayada', 13, 4, 56, 'libertadores', 7, NULL, '2023-10-08 00:01:50'),
(82, 3, 'colombia', 'deportivo pasto', 1, 2, 4, 1, 4, 'ligas/colombia/equipos/deportivo_pasto/', NULL, 'grande', 'cuadriculada', 14, 4, 58, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(83, 3, 'colombia', 'la equidad', 15, 3, 4, 15, 3, 'ligas/colombia/equipos/la_equidad/', NULL, 'chica', 'romboide', 15, 3, 43, NULL, 100, NULL, '2023-10-08 00:01:50'),
(84, 3, 'colombia', 'aguilas doradas', 4, 14, 14, 4, 14, 'ligas/colombia/equipos/aguilas_doradas/', NULL, 'grande', 'romboide', 16, 3, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(85, 3, 'colombia', 'atletico bucaramanga', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_bucaramanga/', NULL, 'grande', 'romboide', 17, 2, 35, NULL, 100, NULL, '2023-10-08 00:01:50'),
(86, 3, 'colombia', 'real cartagena', 4, 3, 1, 4, 3, 'ligas/colombia/equipos/real_cartagena/', NULL, 'grande', 'lisa', 18, 2, 43, NULL, 100, NULL, '2023-10-08 00:01:50'),
(87, 3, 'colombia', 'alianza petrolera', 4, 14, 14, 31, 15, 'ligas/colombia/equipos/alianza_petrolera/', NULL, 'chica', 'lisa', 19, 1, 37, NULL, 100, NULL, '2023-10-08 00:01:50'),
(88, 3, 'colombia', 'patriotas', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/patriotas/', NULL, 'chica', 'lisa', 20, 1, 25, NULL, 100, NULL, '2023-10-08 00:01:50'),
(89, 4, 'uruguay', 'peñarol', 4, 14, 14, 31, 16, 'ligas/uruguay/equipos/peñarol/', NULL, 'grande', 'cuadriculada', 1, 10, 52, NULL, 100, NULL, '2023-10-08 00:01:50'),
(90, 4, 'uruguay', 'nacional', 15, 1, 2, 15, 1, 'ligas/uruguay/equipos/nacional/', NULL, 'grande', 'cuadriculada', 2, 10, 58, 'libertadores', 7, NULL, '2023-10-08 00:01:50'),
(91, 4, 'uruguay', 'defensor sporting', 12, 15, 1, 12, 15, 'ligas/uruguay/equipos/defensor_sporting/', NULL, 'grande', 'cuadriculada', 3, 9, 54, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(92, 4, 'uruguay', 'montevideo wanderers', 14, 15, 15, 33, 16, 'ligas/uruguay/equipos/montevideo_wanderers/', NULL, 'grande', 'cuadriculada', 4, 9, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(93, 4, 'uruguay', 'danubio', 15, 14, 14, 15, 14, 'ligas/uruguay/equipos/danubio/', NULL, 'cuadrada', 'rayada', 5, 8, 61, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(94, 4, 'uruguay', 'liverpool', 2, 14, 15, 32, 15, 'ligas/uruguay/equipos/liverpool/', NULL, 'mediana', 'cuadriculada', 6, 8, 64, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(95, 4, 'uruguay', 'river montevideo', 15, 1, 1, 24, 14, 'ligas/uruguay/equipos/river_montevideo/', NULL, 'grande', 'cuadriculada', 7, 7, 54, 'sudamericana', 10, NULL, '2023-10-08 00:01:50'),
(96, 4, 'uruguay', 'fenix', 15, 12, 4, 28, 32, 'ligas/uruguay/equipos/fenix/', NULL, 'chica', 'romboide', 8, 7, 54, 'sudamericana', 11, NULL, '2023-10-08 00:01:50'),
(97, 4, 'uruguay', 'central español', 1, 2, 15, 1, 15, 'ligas/uruguay/equipos/central_español/', NULL, 'grande', 'cuadriculada', 9, 6, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(98, 4, 'uruguay', 'cerro largo', 2, 15, 15, 28, 15, 'ligas/uruguay/equipos/cerro_largo/', NULL, 'chica', 'lisa', 10, 6, 54, NULL, 100, NULL, '2023-10-08 00:01:50'),
(99, 4, 'uruguay', 'atenas', 10, 1, 15, 10, 15, 'ligas/uruguay/equipos/atenas/', NULL, 'chica', 'cuadriculada', 11, 5, 56, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(100, 4, 'uruguay', 'racing montevideo', 15, 3, 14, 36, 15, 'ligas/uruguay/equipos/racing_montevideo/', NULL, 'chica', 'rayada', 12, 5, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(101, 4, 'uruguay', 'cerro', 15, 6, 6, 29, 14, 'ligas/uruguay/equipos/cerro/', NULL, 'grande', 'lisa', 13, 4, 59, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(102, 4, 'uruguay', 'tacuarembo', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/tacuarembo/', NULL, 'cuadrada', 'rayada', 14, 4, 59, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(103, 4, 'uruguay', 'rentistas', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/rentistas/', NULL, 'chica', 'rayada', 15, 3, 60, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(104, 4, 'uruguay', 'bella vista', 15, 4, 2, 8, 2, 'ligas/uruguay/equipos/bella_vista/', NULL, 'chica', 'cuadriculada', 16, 3, 64, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(105, 4, 'uruguay', 'rocha', 6, 14, 4, 6, 15, 'ligas/uruguay/equipos/rocha/', NULL, 'chica', 'romboide', 17, 2, 44, NULL, 100, NULL, '2023-10-08 00:01:50'),
(106, 4, 'uruguay', 'el tanque sisley', 3, 14, 15, 37, 15, 'ligas/uruguay/equipos/el_tanque_sisley/', NULL, 'chica', 'lisa', 18, 2, 34, NULL, 100, NULL, '2023-10-08 00:01:50'),
(107, 4, 'uruguay', 'deportivo colonia', 1, 15, 10, 1, 15, 'ligas/uruguay/equipos/deportivo_colonia/', NULL, 'chica', 'circular', 19, 1, 22, NULL, 100, NULL, '2023-10-08 00:01:50'),
(108, 4, 'uruguay', 'cerrito', 4, 3, 3, 4, 3, 'ligas/uruguay/equipos/cerrito/', NULL, 'chica', 'lisa', 20, 1, 27, NULL, 100, NULL, '2023-10-08 00:01:50'),
(109, 5, 'paraguay', 'olimpia', 15, 14, 14, 15, 14, 'ligas/paraguay/equipos/olimpia/', NULL, 'mediana', 'cuadriculada', 1, 10, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(110, 5, 'paraguay', 'cerro porteño', 10, 1, 15, 23, 15, 'ligas/paraguay/equipos/cerro_porteño/', NULL, 'grande', 'romboide', 2, 9, 56, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(111, 5, 'paraguay', 'club nacional', 15, 1, 2, 15, 1, 'ligas/paraguay/equipos/club_nacional/', NULL, 'mediana', 'cuadriculada', 3, 8, 58, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(112, 5, 'paraguay', 'libertad', 15, 14, 14, 33, 1, 'ligas/paraguay/equipos/libertad/', NULL, 'chica', 'rayada', 4, 7, 56, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(113, 5, 'paraguay', 'guarani', 4, 14, 14, 31, 15, 'ligas/paraguay/equipos/guarani/', NULL, 'mediana', 'cuadriculada', 5, 6, 58, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(114, 5, 'paraguay', 'sportivo luqueño', 2, 4, 4, 27, 15, 'ligas/paraguay/equipos/sportivo_luqueño/', NULL, 'mediana', 'romboide', 6, 6, 66, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(115, 5, 'paraguay', 'tacuari', 14, 15, 15, 33, 15, 'ligas/paraguay/equipos/tacuari/', NULL, 'chica', 'rayada', 7, 5, 56, 'sudamericana', 7, NULL, '2023-10-08 00:01:50'),
(116, 5, 'paraguay', 'sol de america', 2, 15, 15, 2, 15, 'ligas/paraguay/equipos/sol_de_america/', NULL, 'chica', 'circular', 8, 5, 56, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(117, 5, 'paraguay', 'deportivo capiata', 4, 2, 15, 27, 15, 'ligas/paraguay/equipos/deportivo_capiata/', NULL, 'chica', 'circular', 9, 4, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(118, 5, 'paraguay', 'sportivo carapegüa', 1, 15, 15, 24, 15, 'ligas/paraguay/equipos/sportivo_carapegüa/', NULL, 'mediana', 'cuadriculada', 10, 4, 61, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(119, 5, 'paraguay', 'sportivo san lorenzo', 15, 1, 2, 15, 2, 'ligas/paraguay/equipos/sportivo_san_lorenzo/', NULL, 'mediana', 'lisa', 11, 3, 49, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(120, 5, 'paraguay', 'rubio ñu', 15, 3, 3, 36, 3, 'ligas/paraguay/equipos/rubio_ñu/', NULL, 'chica', 'romboide', 12, 3, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(121, 5, 'paraguay', '12 de octubre', 15, 2, 2, 28, 15, 'ligas/paraguay/equipos/12_de_octubre/', NULL, 'chica', 'cuadriculada', 13, 2, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(122, 5, 'paraguay', '3 de febrero', 1, 15, 15, 1, 15, 'ligas/paraguay/equipos/3_de_febrero/', NULL, 'chica', 'lisa', 14, 2, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(123, 5, 'paraguay', 'trinidense', 2, 4, 4, 2, 4, 'ligas/paraguay/equipos/trinidense/', NULL, 'chica', 'romboide', 15, 1, 39, NULL, 100, NULL, '2023-10-08 00:01:50'),
(124, 5, 'paraguay', 'cerro cora', 1, 14, 14, 34, 15, 'ligas/paraguay/equipos/cerro_cora/', NULL, 'chica', 'lisa', 16, 1, 38, NULL, 100, NULL, '2023-10-08 00:01:50'),
(125, 6, 'chile', 'colo colo', 15, 14, 14, 15, 14, 'ligas/chile/equipos/colo_colo/', NULL, 'mediana', 'circular', 1, 10, 52, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(126, 6, 'chile', 'universidad de chile', 2, 15, 1, 2, 15, 'ligas/chile/equipos/universidad_de_chile/', NULL, 'grande', 'cuadriculada', 2, 9, 50, NULL, 100, NULL, '2023-10-08 00:01:50'),
(127, 6, 'chile', 'universidad catolica', 15, 2, 1, 15, 1, 'ligas/chile/equipos/universidad_catolica/', NULL, 'chica', 'romboide', 3, 8, 64, NULL, 5, NULL, '2023-10-08 00:01:50'),
(128, 6, 'chile', 'cobreloa', 5, 14, 15, 5, 15, 'ligas/chile/equipos/cobreloa/', NULL, 'cuadrada', 'rayada', 4, 7, 56, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(129, 6, 'chile', 'union española', 1, 4, 10, 1, 4, 'ligas/chile/equipos/union_española/', NULL, 'cuadrada', 'cuadriculada', 5, 6, 56, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(130, 6, 'chile', 'deportes concepcion', 12, 15, 4, 12, 15, 'ligas/chile/equipos/deportes_concepcion/', NULL, 'grande', 'rayada', 6, 6, 54, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(131, 6, 'chile', 'cobresal', 15, 5, 3, 15, 5, 'ligas/chile/equipos/cobresal/', NULL, 'grande', 'rayada', 7, 5, 64, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(132, 6, 'chile', 'huachipato', 2, 14, 14, 32, 15, 'ligas/chile/equipos/huachipato/', NULL, 'cuadrada', 'rayada', 8, 5, 65, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(133, 6, 'chile', 'palestino', 15, 3, 1, 15, 37, 'ligas/chile/equipos/palestino/', NULL, 'grande', 'romboide', 9, 4, 62, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(134, 6, 'chile', 'deportes iquique', 6, 14, 14, 6, 14, 'ligas/chile/equipos/deportes_iquique/', NULL, 'grande', 'romboide', 10, 4, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(135, 6, 'chile', 'coquimbo unido', 4, 14, 14, 4, 14, 'ligas/chile/equipos/coquimbo_unido/', NULL, 'grande', 'circular', 11, 3, 56, 'sudamericana', 7, NULL, '2023-10-08 00:01:50'),
(136, 6, 'chile', 'everton', 10, 4, 4, 10, 4, 'ligas/chile/equipos/everton/', NULL, 'grande', 'lisa', 12, 3, 58, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(137, 6, 'chile', 'deportes antofagasta', 15, 2, 1, 15, 2, 'ligas/chile/equipos/deportes_antofagasta/', NULL, 'grande', 'rayada', 13, 2, 40, NULL, 100, NULL, '2023-10-08 00:01:50'),
(138, 6, 'chile', 'audax italiano', 3, 15, 15, 3, 15, 'ligas/chile/equipos/audax_italiano/', NULL, 'cuadrada', 'rayada', 14, 2, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(139, 6, 'chile', 'santiago wanderers', 3, 15, 15, 3, 15, 'ligas/chile/equipos/santiago_wanderers/', NULL, 'grande', 'romboide', 15, 1, 38, NULL, 100, NULL, '2023-10-08 00:01:50'),
(140, 6, 'chile', 'ohiggins', 6, 14, 4, 6, 4, 'ligas/chile/equipos/ohiggins/', NULL, 'grande', 'lisa', 16, 1, 20, NULL, 100, NULL, '2023-10-08 00:01:50'),
(141, 7, 'ecuador', 'barcelona', 4, 1, 14, 4, 1, 'ligas/ecuador/equipos/barcelona/', NULL, 'mediana', 'rayada', 1, 10, 62, NULL, 4, NULL, '2023-10-08 00:01:50'),
(142, 7, 'ecuador', 'el nacional', 1, 2, 15, 1, 15, 'ligas/ecuador/equipos/el_nacional/', NULL, 'grande', 'circular', 2, 9, 56, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(143, 7, 'ecuador', 'liga deportiva', 15, 10, 1, 15, 10, 'ligas/ecuador/equipos/liga_deportiva/', NULL, 'mediana', 'cuadriculada', 3, 8, 48, NULL, 100, NULL, '2023-10-08 00:01:51'),
(144, 7, 'ecuador', 'emelec', 2, 15, 6, 2, 15, 'ligas/ecuador/equipos/emelec/', NULL, 'cuadrada', 'rayada', 4, 7, 58, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(145, 7, 'ecuador', 'deportivo quito', 2, 1, 15, 23, 15, 'ligas/ecuador/equipos/deportivo_quito/', NULL, 'grande', 'circular', 5, 6, 56, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(146, 7, 'ecuador', 'liga de loja', 15, 1, 3, 15, 1, 'ligas/ecuador/equipos/liga_de_loja/', NULL, 'grande', 'circular', 6, 5, 60, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(147, 7, 'ecuador', 'deportivo cuenca', 1, 14, 14, 1, 15, 'ligas/ecuador/equipos/deportivo_cuenca/', NULL, 'mediana', 'romboide', 7, 4, 60, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(148, 7, 'ecuador', 'independiente del valle', 2, 14, 4, 32, 15, 'ligas/ecuador/equipos/independiente_del_valle/', NULL, 'chica', 'lisa', 8, 4, 52, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(149, 7, 'ecuador', 'deportivo olmedo', 10, 15, 1, 10, 4, 'ligas/ecuador/equipos/deportivo_olmedo/', NULL, 'chica', 'circular', 9, 3, 40, NULL, 100, NULL, '2023-10-08 00:01:50'),
(150, 7, 'ecuador', 'manta fc', 6, 10, 10, 6, 15, 'ligas/ecuador/equipos/manta_fc/', NULL, 'cuadrada', 'rayada', 10, 3, 54, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(151, 7, 'ecuador', 'macara', 6, 15, 10, 6, 15, 'ligas/ecuador/equipos/macara/', NULL, 'chica', 'romboide', 11, 2, 40, NULL, 100, NULL, '2023-10-08 00:01:50'),
(152, 7, 'ecuador', 'deportivo azogues', 3, 15, 1, 3, 15, 'ligas/ecuador/equipos/deportivo_azogues/', NULL, 'chica', 'cuadriculada', 12, 2, 51, 'sudamericana', 8, NULL, '2023-10-08 00:01:51'),
(153, 7, 'ecuador', 'tecnico universitario', 1, 15, 15, 24, 27, 'ligas/ecuador/equipos/tecnico_universitario/', NULL, 'chica', 'cuadriculada', 13, 1, 34, NULL, 100, NULL, '2023-10-08 00:01:50'),
(154, 7, 'ecuador', 'aucas', 4, 1, 1, 4, 16, 'ligas/ecuador/equipos/aucas/', NULL, 'chica', 'lisa', 14, 1, 30, NULL, 100, NULL, '2023-10-08 00:01:50'),
(155, 8, 'bolivia', 'bolivar', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/bolivar/', NULL, 'grande', 'rayada', 1, 10, 54, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(156, 8, 'bolivia', 'oriente petrolero', 3, 15, 15, 3, 15, 'ligas/bolivia/equipos/oriente_petrolero/', NULL, 'grande', 'cuadriculada', 2, 9, 44, 'sudamericana', 8, NULL, '2023-10-08 00:01:51'),
(157, 8, 'bolivia', 'blooming', 6, 15, 2, 6, 15, 'ligas/bolivia/equipos/blooming/', NULL, 'grande', 'romboide', 3, 8, 60, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(158, 8, 'bolivia', 'the stronguest', 4, 14, 14, 31, 15, 'ligas/bolivia/equipos/the_stronguest/', NULL, 'grande', 'rayada', 4, 7, 60, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(159, 8, 'bolivia', 'real potosi', 12, 15, 15, 12, 15, 'ligas/bolivia/equipos/real_potosi/', NULL, 'grande', 'circular', 5, 6, 54, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(160, 8, 'bolivia', 'la paz fc', 2, 1, 15, 23, 15, 'ligas/bolivia/equipos/la_paz_fc/', NULL, 'grande', 'rayada', 6, 5, 49, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(161, 8, 'bolivia', 'jorge wilsterman', 1, 15, 10, 1, 15, 'ligas/bolivia/equipos/jorge_wilsterman/', NULL, 'grande', 'cuadriculada', 7, 4, 55, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(162, 8, 'bolivia', 'san jose', 15, 2, 2, 15, 2, 'ligas/bolivia/equipos/san_jose/', NULL, 'grande', 'cuadriculada', 8, 3, 46, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(163, 8, 'bolivia', 'universitario sucre', 2, 1, 15, 2, 15, 'ligas/bolivia/equipos/universitario_sucre/', NULL, 'grande', 'lisa', 9, 2, 39, NULL, 100, NULL, '2023-10-08 00:01:50'),
(164, 8, 'bolivia', 'aurora', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/aurora/', NULL, 'grande', 'cuadriculada', 10, 2, 36, NULL, 100, NULL, '2023-10-08 00:01:50'),
(165, 8, 'bolivia', 'guabira', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/guabira/', NULL, 'chica', 'lisa', 11, 1, 24, NULL, 100, NULL, '2023-10-08 00:01:50'),
(166, 8, 'bolivia', 'santa cruz', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/santa_cruz/', NULL, 'chica', 'romboide', 12, 1, 25, NULL, 100, NULL, '2023-10-08 00:01:50'),
(167, 9, 'peru', 'sporting cristal', 6, 15, 4, 6, 15, 'ligas/peru/equipos/sporting_cristal/', NULL, 'mediana', 'rayada', 1, 10, 62, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(168, 9, 'peru', 'alianza lima', 10, 15, 15, 28, 15, 'ligas/peru/equipos/alianza_lima/', NULL, 'mediana', 'cuadriculada', 2, 9, 50, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(169, 9, 'peru', 'universitario', 8, 1, 14, 8, 1, 'ligas/peru/equipos/universitario/', NULL, 'mediana', 'circular', 3, 8, 42, NULL, 100, NULL, '2023-10-08 00:01:51'),
(170, 9, 'peru', 'cienciano', 1, 15, 15, 1, 15, 'ligas/peru/equipos/cienciano/', NULL, 'mediana', 'romboide', 4, 7, 58, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(171, 9, 'peru', 'juan aurich', 1, 15, 15, 1, 15, 'ligas/peru/equipos/juan_aurich/', NULL, 'grande', 'lisa', 5, 6, 56, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(172, 9, 'peru', 'cesar vallejo', 10, 6, 15, 2, 5, 'ligas/peru/equipos/cesar_vallejo/', NULL, 'mediana', 'circular', 6, 5, 53, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(173, 9, 'peru', 'sport huancayo', 1, 4, 3, 1, 3, 'ligas/peru/equipos/sport_huancayo/', NULL, 'grande', 'romboide', 7, 4, 44, NULL, 100, NULL, '2023-10-08 00:01:50'),
(174, 9, 'peru', 'real garcilaso', 6, 15, 15, 6, 15, 'ligas/peru/equipos/real_garcilaso/', NULL, 'grande', 'cuadriculada', 8, 3, 55, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(175, 9, 'peru', 'alianza atletico', 15, 2, 2, 15, 2, 'ligas/peru/equipos/alianza_atletico/', NULL, 'grande', 'romboide', 9, 2, 30, NULL, 100, NULL, '2023-10-08 00:01:51'),
(176, 9, 'peru', 'sport boys', 9, 14, 14, 9, 14, 'ligas/peru/equipos/sport_boys/', NULL, 'grande', 'romboide', 10, 2, 50, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(177, 9, 'peru', 'fc melgar', 14, 1, 1, 34, 15, 'ligas/peru/equipos/fc_melgar/', NULL, 'chica', 'lisa', 11, 1, 26, NULL, 100, NULL, '2023-10-08 00:01:50'),
(178, 9, 'peru', 'sport ancash', 3, 4, 4, 3, 4, 'ligas/peru/equipos/sport_ancash/', NULL, 'cuadrada', 'cuadriculada', 12, 1, 27, NULL, 100, NULL, '2023-10-08 00:01:50'),
(179, 10, 'venezuela', 'caracas fc', 1, 15, 14, 1, 15, 'ligas/venezuela/equipos/caracas_fc/', NULL, 'grande', 'lisa', 1, 10, 52, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(180, 10, 'venezuela', 'minerven', 10, 15, 15, 10, 15, 'ligas/venezuela/equipos/minerven/', NULL, 'grande', 'cuadriculada', 2, 9, 54, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(181, 10, 'venezuela', 'deportivo tachira', 4, 14, 15, 31, 15, 'ligas/venezuela/equipos/deportivo_tachira/', NULL, 'grande', 'romboide', 3, 8, 62, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(182, 10, 'venezuela', 'atletico maracaibo', 2, 1, 1, 23, 15, 'ligas/venezuela/equipos/atletico_maracaibo/', NULL, 'grande', 'cuadriculada', 4, 7, 60, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(183, 10, 'venezuela', 'estudiantes merida', 1, 15, 2, 24, 36, 'ligas/venezuela/equipos/estudiantes_merida/', NULL, 'grande', 'circular', 5, 6, 54, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(184, 10, 'venezuela', 'deportivo anzoategui', 1, 4, 4, 26, 15, 'ligas/venezuela/equipos/deportivo_anzoategui/', NULL, 'grande', 'cuadriculada', 6, 5, 61, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(185, 10, 'venezuela', 'zamora fc', 15, 14, 14, 33, 15, 'ligas/venezuela/equipos/zamora_fc/', NULL, 'mediana', 'lisa', 7, 4, 50, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(186, 10, 'venezuela', 'carabobo fc', 20, 4, 2, 20, 15, 'ligas/venezuela/equipos/carabobo_fc/', NULL, 'mediana', 'cuadriculada', 8, 3, 47, NULL, 100, NULL, '2023-10-08 00:01:51'),
(187, 10, 'venezuela', 'trujillanos', 4, 13, 13, 30, 15, 'ligas/venezuela/equipos/trujillanos/', NULL, 'grande', 'lisa', 9, 2, 43, NULL, 100, NULL, '2023-10-08 00:01:50'),
(188, 10, 'venezuela', 'pepeganga', 12, 15, 15, 12, 15, 'ligas/venezuela/equipos/pepeganga/', NULL, 'mediana', 'circular', 10, 2, 45, NULL, 100, NULL, '2023-10-08 00:01:50'),
(189, 10, 'venezuela', 'mineros de guayana', 2, 14, 14, 32, 15, 'ligas/venezuela/equipos/mineros_de_guayana/', NULL, 'grande', 'cuadriculada', 11, 1, 27, NULL, 100, NULL, '2023-10-08 00:01:50'),
(190, 10, 'venezuela', 'portuguesa fc', 1, 14, 14, 34, 15, 'ligas/venezuela/equipos/portuguesa_fc/', NULL, 'chica', 'romboide', 12, 1, 36, NULL, 100, NULL, '2023-10-08 00:01:50');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `dia` int(11) NOT NULL,
  `relevancia` int(11) NOT NULL,
  `hora` int(11) NOT NULL,
  `gl` int(11) NOT NULL,
  `gv` int(11) NOT NULL,
  `pa` int(11) NOT NULL,
  `pb` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `is_vuelta` tinyint(1) NOT NULL DEFAULT 0,
  `is_define` tinyint(1) NOT NULL DEFAULT 0,
  `is_final` tinyint(1) NOT NULL DEFAULT 0,
  `is_jugado` tinyint(1) NOT NULL DEFAULT 0,
  `winner` int(11) NOT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'INICIO', '[]', NULL, NULL, NULL, NULL, 0, 0, NULL, '2023-10-08 00:01:51'),
(2, 'SORTEO', '[\"recopa\"]', NULL, NULL, 'marzo', 2, 0, 0, NULL, '2023-10-08 00:02:20'),
(3, 'FECHA', '[\"recopa\"]', 5, 1, 'marzo', 3, 0, 0, NULL, '2023-10-08 00:02:50'),
(4, 'FECHA', '[\"recopa\"]', 5, 2, 'marzo', 4, 0, 0, NULL, '2023-10-08 00:02:50'),
(5, 'SORTEO', '[\"afa\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'marzo', 5, 0, 0, NULL, '2023-10-08 00:05:36'),
(6, 'FECHA', '[\"afa\"]', -2, 1, 'abril', 1, 0, 0, NULL, '2023-10-10 01:41:06'),
(7, 'FECHA', '[\"sudamericana\"]', 0, 1, 'abril', 1, 0, 0, NULL, '2023-10-10 01:41:08'),
(8, 'FECHA', '[\"afa\"]', -2, 2, 'abril', 2, 0, 0, NULL, '2023-10-10 01:41:09'),
(9, 'FECHA', '[\"libertadores\"]', 0, 1, 'abril', 2, 0, 0, NULL, '2023-10-10 01:41:12'),
(10, 'FECHA', '[\"afa\"]', -2, 3, 'abril', 3, 0, 0, NULL, '2023-10-10 01:41:13'),
(11, 'FECHA', '[\"sudamericana\"]', 0, 2, 'abril', 3, 0, 0, NULL, '2023-10-10 01:41:15'),
(12, 'FECHA', '[\"afa\"]', -2, 4, 'abril', 4, 0, 0, NULL, '2023-10-10 01:41:16'),
(13, 'FECHA', '[\"libertadores\"]', 0, 2, 'abril', 4, 0, 0, NULL, '2023-10-10 01:41:18'),
(14, 'FECHA', '[\"afa\"]', -2, 5, 'mayo', 1, 0, 0, NULL, '2023-10-10 01:41:20'),
(15, 'FECHA', '[\"sudamericana\"]', 0, 3, 'mayo', 1, 0, 0, NULL, '2023-10-10 01:41:21'),
(16, 'FECHA', '[\"afa\"]', -2, 6, 'mayo', 2, 0, 0, NULL, '2023-10-10 01:41:23'),
(17, 'FECHA', '[\"libertadores\"]', 0, 3, 'mayo', 2, 0, 0, NULL, '2023-10-10 01:41:25'),
(18, 'SORTEO', '[\"afa\"]', NULL, NULL, 'mayo', 2, 0, 0, NULL, '2023-10-10 01:43:38'),
(19, 'FECHA', '[\"afa\"]', -1, 1, 'mayo', 3, 0, 0, NULL, '2023-10-10 01:44:16'),
(20, 'FECHA', '[\"sudamericana\"]', 0, 4, 'mayo', 3, 0, 0, NULL, '2023-10-10 01:44:17'),
(21, 'FECHA', '[\"afa\"]', -1, 2, 'mayo', 4, 0, 0, NULL, '2023-10-10 01:44:18'),
(22, 'FECHA', '[\"libertadores\"]', 0, 4, 'mayo', 4, 0, 0, NULL, '2023-10-10 01:44:20'),
(23, 'FECHA', '[\"afa\"]', -1, 3, 'junio', 1, 0, 0, NULL, '2023-10-10 01:44:22'),
(24, 'FECHA', '[\"sudamericana\"]', 0, 5, 'junio', 1, 0, 0, NULL, '2023-10-10 01:44:23'),
(25, 'FECHA', '[\"afa\"]', -1, 4, 'junio', 2, 0, 0, NULL, '2023-10-10 01:44:25'),
(26, 'FECHA', '[\"libertadores\"]', 0, 5, 'junio', 2, 0, 0, NULL, '2023-10-10 01:44:27'),
(27, 'FECHA', '[\"afa\"]', -1, 5, 'junio', 3, 0, 0, NULL, '2023-10-10 01:44:29'),
(28, 'FECHA', '[\"sudamericana\"]', 0, 6, 'junio', 3, 0, 0, NULL, '2023-10-10 01:44:30'),
(29, 'FECHA', '[\"afa\"]', -1, 6, 'abril', 4, 0, 0, NULL, '2023-10-10 01:44:32'),
(30, 'FECHA', '[\"libertadores\"]', 0, 6, 'junio', 4, 0, 0, NULL, '2023-10-10 01:44:34'),
(31, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'julio', 1, 0, 0, NULL, '2023-10-10 01:45:33'),
(32, 'FECHA', '[\"argentina\"]', 1, 1, 'julio', 1, 0, 0, NULL, '2023-10-10 01:46:31'),
(33, 'FECHA', '[\"sudamericana\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2023-10-10 01:46:32'),
(34, 'FECHA', '[\"libertadores\"]', 1, 1, 'julio', 2, 0, 0, NULL, '2023-10-10 01:46:33'),
(35, 'FECHA', '[\"argentina\"]', 1, 2, 'julio', 3, 0, 0, NULL, '2023-10-10 01:46:34'),
(36, 'FECHA', '[\"sudamericana\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2023-10-10 01:46:36'),
(37, 'FECHA', '[\"libertadores\"]', 1, 2, 'julio', 4, 0, 0, NULL, '2023-10-10 01:46:37'),
(38, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'agosto', 1, 0, 0, NULL, '2023-10-10 01:47:17'),
(39, 'FECHA', '[\"afa\"]', 0, 1, 'agosto', 1, 0, 0, NULL, '2023-10-10 01:48:06'),
(40, 'FECHA', '[\"argentina\"]', 2, 1, 'agosto', 1, 0, 0, NULL, '2023-10-10 01:48:06'),
(41, 'FECHA', '[\"afa\"]', 0, 2, 'agosto', 2, 0, 0, NULL, '2023-10-10 01:48:08'),
(42, 'FECHA', '[\"sudamericana\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2023-10-10 01:48:09'),
(43, 'FECHA', '[\"libertadores\"]', 2, 1, 'agosto', 2, 0, 0, NULL, '2023-10-10 01:48:09'),
(44, 'FECHA', '[\"afa\"]', 0, 3, 'agosto', 3, 0, 0, NULL, '2023-10-10 01:48:11'),
(45, 'FECHA', '[\"argentina\"]', 2, 2, 'agosto', 3, 0, 0, NULL, '2023-10-10 01:48:12'),
(46, 'FECHA', '[\"afa\"]', 0, 4, 'agosto', 4, 0, 0, NULL, '2023-10-10 01:48:13'),
(47, 'FECHA', '[\"sudamericana\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2023-10-10 01:48:14'),
(48, 'FECHA', '[\"libertadores\"]', 2, 2, 'agosto', 4, 0, 0, NULL, '2023-10-10 01:48:15'),
(49, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'septiembre', 1, 0, 0, NULL, '2023-10-10 01:48:39'),
(50, 'FECHA', '[\"afa\"]', 0, 5, 'septiembre', 1, 0, 0, NULL, '2023-10-10 01:49:06'),
(51, 'FECHA', '[\"argentina\"]', 3, 1, 'septiembre', 1, 0, 0, NULL, '2023-10-10 01:49:07'),
(52, 'FECHA', '[\"afa\"]', 0, 6, 'septiembre', 2, 0, 0, NULL, '2023-10-10 01:49:08'),
(53, 'FECHA', '[\"sudamericana\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2023-10-10 01:49:09'),
(54, 'FECHA', '[\"libertadores\"]', 3, 1, 'septiembre', 2, 0, 0, NULL, '2023-10-10 01:49:09'),
(55, 'SORTEO', '[\"afa\"]', NULL, NULL, 'septiembre', 3, 0, 0, NULL, '2023-10-10 01:49:33'),
(56, 'FECHA', '[\"afa\"]', 1, 1, 'septiembre', 3, 0, 0, NULL, '2023-10-10 01:50:03'),
(57, 'FECHA', '[\"argentina\"]', 3, 2, 'septiembre', 3, 0, 0, NULL, '2023-10-10 01:50:04'),
(58, 'FECHA', '[\"afa\"]', 1, 2, 'septiembre', 4, 0, 0, NULL, '2023-10-10 01:50:05'),
(59, 'FECHA', '[\"sudamericana\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2023-10-10 01:50:06'),
(60, 'FECHA', '[\"libertadores\"]', 3, 2, 'septiembre', 4, 0, 0, NULL, '2023-10-10 01:50:06'),
(61, 'SORTEO', '[\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'octubre', 1, 0, 0, NULL, '2023-10-10 01:50:24'),
(62, 'FECHA', '[\"afa\"]', 1, 3, 'octubre', 1, 0, 0, NULL, '2023-10-10 01:51:04'),
(63, 'FECHA', '[\"argentina\"]', 4, 1, 'octubre', 1, 0, 0, NULL, '2023-10-10 01:51:04'),
(64, 'FECHA', '[\"afa\"]', 1, 4, 'octubre', 2, 0, 0, NULL, '2023-10-10 01:51:06'),
(65, 'FECHA', '[\"sudamericana\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2023-10-10 01:51:06'),
(66, 'FECHA', '[\"libertadores\"]', 4, 1, 'octubre', 2, 0, 0, NULL, '2023-10-10 01:51:06'),
(68, 'FECHA', '[\"afa\"]', 1, 5, 'octubre', 3, 0, 0, NULL, '2023-10-10 01:51:08'),
(69, 'FECHA', '[\"argentina\"]', 4, 2, 'octubre', 3, 0, 0, NULL, '2023-10-10 01:51:08'),
(70, 'FECHA', '[\"afa\"]', 1, 6, 'octubre', 4, 0, 0, NULL, '2023-10-10 01:51:09'),
(71, 'FECHA', '[\"sudamericana\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2023-10-10 01:51:09'),
(72, 'FECHA', '[\"libertadores\"]', 4, 2, 'octubre', 4, 0, 0, NULL, '2023-10-10 01:51:10'),
(73, 'SORTEO', '[\"afa\",\"argentina\",\"sudamericana\",\"libertadores\"]', NULL, NULL, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:51:31'),
(74, 'FECHA', '[\"afa\"]', 2, 1, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:52:47'),
(75, 'FECHA', '[\"afa\"]', 2, 2, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:52:49'),
(76, 'FECHA', '[\"argentina\"]', 5, 1, 'noviembre', 1, 0, 0, NULL, '2023-10-10 01:52:49'),
(77, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:07'),
(78, 'FECHA', '[\"afa\"]', 3, 1, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:28'),
(79, 'FECHA', '[\"afa\"]', 3, 2, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:29'),
(80, 'FECHA', '[\"sudamericana\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:29'),
(81, 'FECHA', '[\"libertadores\"]', 5, 1, 'noviembre', 2, 0, 0, NULL, '2023-10-10 01:53:29'),
(82, 'SORTEO', '[\"afa\"]', NULL, NULL, 'noviembre', 3, 0, 0, NULL, '2023-10-10 01:53:50'),
(83, 'FECHA', '[\"afa\"]', 4, 1, 'noviembre', 3, 0, 0, NULL, '2023-10-10 01:54:15'),
(84, 'FECHA', '[\"argentina\"]', 5, 2, 'noviembre', 3, 0, 0, NULL, '2023-10-10 01:54:15'),
(85, 'FECHA', '[\"afa\"]', 4, 2, 'noviembre', 4, 0, 0, NULL, '2023-10-10 01:54:16'),
(86, 'FECHA', '[\"sudamericana\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2023-10-10 01:54:16'),
(87, 'FECHA', '[\"libertadores\"]', 5, 2, 'noviembre', 4, 0, 0, NULL, '2023-10-10 01:54:16'),
(88, 'SORTEO', '[\"afa\"]', NULL, NULL, 'diciembre', 1, 0, 0, NULL, '2023-10-10 01:55:07'),
(89, 'FECHA', '[\"afa\"]', 5, 1, 'diciembre', 1, 0, 0, NULL, '2023-10-10 14:55:11'),
(90, 'FECHA', '[\"afa\"]', 5, 2, 'diciembre', 2, 0, 0, NULL, '2023-10-11 01:21:44');

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
(1, 1, 'brasil', 'san pablo fc', 15, 1, 14, 15, 34, 'ligas/brasil/equipos/san_pablo_fc/', NULL, 'grande', 'circular', 1, 10, 62, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(2, 1, 'brasil', 'cruzeiro', 2, 15, 15, 2, 15, 'ligas/brasil/equipos/cruzeiro/', NULL, 'grande', 'cuadriculada', 2, 10, 58, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(3, 1, 'brasil', 'flamengo', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/flamengo/', NULL, 'grande', 'rayada', 3, 9, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(4, 1, 'brasil', 'gremio', 6, 14, 15, 41, 15, 'ligas/brasil/equipos/gremio/', NULL, 'mediana', 'rayada', 4, 9, 53, 'libertadores', 8, NULL, '2023-10-08 00:01:50'),
(5, 1, 'brasil', 'palmeiras', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/palmeiras/', NULL, 'mediana', 'circular', 5, 8, 52, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(6, 1, 'brasil', 'corinthians', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/corinthians/', NULL, 'cuadrada', 'rayada', 6, 8, 56, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(7, 1, 'brasil', 'santos fc', 15, 14, 14, 15, 33, 'ligas/brasil/equipos/santos_fc/', NULL, 'mediana', 'romboide', 7, 7, 54, 'libertadores', 7, NULL, '2023-10-08 00:01:50'),
(8, 1, 'brasil', 'vasco da gama', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/vasco_da_gama/', NULL, 'grande', 'romboide', 8, 7, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(9, 1, 'brasil', 'fluminense', 20, 3, 15, 25, 15, 'ligas/brasil/equipos/fluminense/', NULL, 'mediana', 'rayada', 9, 6, 61, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(10, 1, 'brasil', 'internacional', 1, 15, 15, 1, 15, 'ligas/brasil/equipos/internacional/', NULL, 'grande', 'cuadriculada', 10, 6, 58, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(11, 1, 'brasil', 'atletico mineiro', 14, 15, 15, 33, 15, 'ligas/brasil/equipos/atletico_mineiro/', NULL, 'grande', 'cuadriculada', 11, 5, 65, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(12, 1, 'brasil', 'botafogo', 14, 15, 15, 33, 16, 'ligas/brasil/equipos/botafogo/', NULL, 'grande', 'lisa', 12, 5, 49, NULL, 100, NULL, '2023-10-08 00:01:49'),
(13, 1, 'brasil', 'paranaense', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/paranaense/', NULL, 'cuadrada', 'cuadriculada', 13, 4, 51, NULL, 100, NULL, '2023-10-08 00:01:50'),
(14, 1, 'brasil', 'goias', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/goias/', NULL, 'mediana', 'cuadriculada', 14, 4, 52, 'sudamericana', 10, NULL, '2023-10-08 00:01:50'),
(15, 1, 'brasil', 'bahia', 15, 2, 1, 15, 23, 'ligas/brasil/equipos/bahia/', NULL, 'grande', 'rayada', 15, 3, 52, 'sudamericana', 11, NULL, '2023-10-08 00:01:50'),
(16, 1, 'brasil', 'chapecoense', 3, 15, 7, 3, 15, 'ligas/brasil/equipos/chapecoense/', NULL, 'cuadrada', 'romboide', 16, 3, 45, NULL, 100, NULL, '2023-10-08 00:01:49'),
(17, 1, 'brasil', 'coritiba', 15, 3, 3, 15, 36, 'ligas/brasil/equipos/coritiba/', NULL, 'grande', 'cuadriculada', 17, 2, 52, 'sudamericana', 12, NULL, '2023-10-08 00:01:50'),
(18, 1, 'brasil', 'ponte preta', 15, 14, 14, 33, 14, 'ligas/brasil/equipos/ponte_preta/', NULL, 'grande', 'lisa', 18, 2, 36, NULL, 100, NULL, '2023-10-08 00:01:49'),
(19, 1, 'brasil', 'avai', 2, 15, 15, 28, 15, 'ligas/brasil/equipos/avai/', NULL, 'grande', 'romboide', 19, 1, 23, NULL, 100, NULL, '2023-10-08 00:01:49'),
(20, 1, 'brasil', 'portuguesa', 1, 3, 15, 25, 15, 'ligas/brasil/equipos/portuguesa/', NULL, 'mediana', 'cuadriculada', 20, 1, 25, NULL, 100, NULL, '2023-10-08 00:01:49'),
(21, 2, 'argentina', 'river plate', 15, 1, 14, 15, 14, 'ligas/argentina/equipos/river_plate/', 22, 'grande', 'rayada', 1, 10, 34, 'sudamericana', 10, NULL, '2023-10-08 00:01:51'),
(22, 2, 'argentina', 'boca juniors', 2, 4, 4, 2, 15, 'ligas/argentina/equipos/boca_juniors/', 21, 'mediana', 'rayada', 2, 10, 33, 'libertadores', 6, NULL, '2023-10-08 00:01:51'),
(23, 2, 'argentina', 'san lorenzo', 2, 1, 1, 23, 15, 'ligas/argentina/equipos/san_lorenzo/', 29, 'mediana', 'cuadriculada', 3, 10, 42, NULL, 3, NULL, '2023-10-08 00:01:49'),
(24, 2, 'argentina', 'velez sarsfield', 15, 2, 2, 15, 2, 'ligas/argentina/equipos/velez_sarsfield/', 30, 'cuadrada', 'rayada', 4, 10, 39, NULL, 4, NULL, '2023-10-08 00:01:49'),
(25, 2, 'argentina', 'independiente', 1, 15, 10, 1, 15, 'ligas/argentina/equipos/independiente/', 26, 'cuadrada', 'cuadriculada', 5, 9, 38, 'libertadores', 7, NULL, '2023-10-08 00:01:51'),
(26, 2, 'argentina', 'racing club', 6, 15, 10, 29, 10, 'ligas/argentina/equipos/racing_club/', 25, 'grande', 'cuadriculada', 6, 9, 27, NULL, 6, NULL, '2023-10-08 00:01:49'),
(27, 2, 'argentina', 'newells old boys', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/newells_old_boys/', 28, 'cuadrada', 'cuadriculada', 7, 9, 32, NULL, 10, NULL, '2023-10-08 00:01:49'),
(28, 2, 'argentina', 'rosario central', 4, 2, 2, 27, 15, 'ligas/argentina/equipos/rosario_central/', 27, 'mediana', 'romboide', 8, 9, 21, NULL, 9, NULL, '2023-10-08 00:01:49'),
(29, 2, 'argentina', 'huracan', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/huracan/', 23, 'mediana', 'lisa', 9, 8, 27, NULL, 7, NULL, '2023-10-08 00:01:49'),
(30, 2, 'argentina', 'ferrocarril oeste', 3, 15, 12, 3, 15, 'ligas/argentina/equipos/ferrocarril_oeste/', 24, 'cuadrada', 'romboide', 10, 8, 44, 'sudamericana', 12, NULL, '2023-10-08 00:01:51'),
(31, 2, 'argentina', 'estudiantes la plata', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/estudiantes_la_plata/', 32, 'grande', 'circular', 11, 8, 36, NULL, 11, NULL, '2023-10-08 00:01:49'),
(32, 2, 'argentina', 'gimnasia la plata', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/gimnasia_la_plata/', 31, 'grande', 'circular', 12, 8, 18, NULL, 12, NULL, '2023-10-08 00:01:49'),
(33, 2, 'argentina', 'lanus', 20, 15, 15, 20, 15, 'ligas/argentina/equipos/lanus/', 34, 'cuadrada', 'cuadriculada', 13, 7, 38, 'sudamericana', 11, NULL, '2023-10-08 00:01:51'),
(34, 2, 'argentina', 'banfield', 15, 3, 5, 15, 5, 'ligas/argentina/equipos/banfield/', 33, 'chica', 'rayada', 14, 7, 36, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(35, 2, 'argentina', 'argentinos juniors', 1, 15, 2, 1, 15, 'ligas/argentina/equipos/argentinos_juniors/', 53, 'cuadrada', 'lisa', 15, 7, 33, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(36, 2, 'argentina', 'godoy cruz', 2, 15, 15, 2, 15, 'ligas/argentina/equipos/godoy_cruz/', 56, 'grande', 'circular', 16, 7, 22, NULL, 16, NULL, '2023-10-08 00:01:49'),
(37, 2, 'argentina', 'colon', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/colon/', 38, 'chica', 'circular', 17, 6, 32, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(38, 2, 'argentina', 'union', 1, 15, 2, 24, 2, 'ligas/argentina/equipos/union/', 37, 'chica', 'cuadriculada', 18, 6, 31, NULL, 18, NULL, '2023-10-08 00:01:49'),
(39, 2, 'argentina', 'talleres cordoba', 10, 15, 20, 28, 20, 'ligas/argentina/equipos/talleres_cordoba/', 41, 'grande', 'romboide', 19, 6, 31, NULL, 19, NULL, '2023-10-08 00:01:49'),
(40, 2, 'argentina', 'instituto cordoba', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/instituto_cordoba/', 65, 'grande', 'romboide', 20, 6, 45, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(41, 2, 'argentina', 'belgrano cordoba', 6, 14, 14, 6, 15, 'ligas/argentina/equipos/belgrano_cordoba/', 39, 'grande', 'romboide', 21, 5, 34, NULL, 21, NULL, '2023-10-08 00:01:49'),
(42, 2, 'argentina', 'atletico rafaela', 6, 15, 4, 29, 2, 'ligas/argentina/equipos/atletico_rafaela/', 49, 'cuadrada', 'cuadriculada', 22, 5, 18, NULL, 22, NULL, '2023-10-08 00:01:49'),
(43, 2, 'argentina', 'quilmes', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/quilmes/', 44, 'cuadrada', 'rayada', 23, 5, 20, NULL, 23, NULL, '2023-10-08 00:01:49'),
(44, 2, 'argentina', 'arsenal', 6, 1, 15, 6, 15, 'ligas/argentina/equipos/arsenal/', 43, 'chica', 'lisa', 24, 5, 39, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(45, 2, 'argentina', 'aldosivi', 4, 3, 14, 35, 15, 'ligas/argentina/equipos/aldosivi/', 48, 'grande', 'circular', 25, 4, 20, NULL, 25, NULL, '2023-10-08 00:01:49'),
(46, 2, 'argentina', 'defensa y justicia', 4, 3, 3, 4, 3, 'ligas/argentina/equipos/defensa_y_justicia/', 55, 'chica', 'lisa', 26, 4, 31, NULL, 26, NULL, '2023-10-08 00:01:49'),
(47, 2, 'argentina', 'tigre', 2, 1, 1, 2, 15, 'ligas/argentina/equipos/tigre/', 63, 'chica', 'romboide', 27, 4, 33, 'libertadores', 8, NULL, '2023-10-08 00:01:51'),
(48, 2, 'argentina', 'olimpo', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/olimpo/', 45, 'chica', 'rayada', 28, 4, 47, NULL, 28, NULL, '2023-10-08 00:01:49'),
(49, 2, 'argentina', 'san martin san juan', 3, 14, 14, 37, 15, 'ligas/argentina/equipos/san_martin_san_juan/', 42, 'cuadrada', 'rayada', 29, 3, 25, NULL, 29, NULL, '2023-10-08 00:01:49'),
(50, 2, 'argentina', 'all boys', 15, 14, 14, 15, 14, 'ligas/argentina/equipos/all_boys/', 52, 'cuadrada', 'cuadriculada', 30, 3, 37, NULL, 30, NULL, '2023-10-08 00:01:49'),
(51, 2, 'argentina', 'chacarita juniors', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/chacarita_juniors/', 59, 'cuadrada', 'cuadriculada', 31, 3, 33, NULL, 31, NULL, '2023-10-08 00:01:49'),
(52, 2, 'argentina', 'nueva chicago', 3, 14, 15, 37, 15, 'ligas/argentina/equipos/nueva_chicago/', 50, 'chica', 'circular', 32, 3, 38, NULL, 32, NULL, '2023-10-08 00:01:49'),
(53, 2, 'argentina', 'platense', 15, 13, 13, 15, 13, 'ligas/argentina/equipos/platense/', 35, 'chica', 'lisa', 33, 3, 29, NULL, 33, NULL, '2023-10-08 00:01:49'),
(54, 2, 'argentina', 'boca unidos', 4, 1, 10, 26, 15, 'ligas/argentina/equipos/boca_unidos/', 61, 'chica', 'lisa', 34, 2, 29, NULL, 34, NULL, '2023-10-08 00:01:49'),
(55, 2, 'argentina', 'temperley', 6, 15, 15, 6, 15, 'ligas/argentina/equipos/temperley/', 46, 'chica', 'romboide', 35, 2, 34, NULL, 35, NULL, '2023-10-08 00:01:49'),
(56, 2, 'argentina', 'independiente rivadavia', 10, 15, 15, 10, 15, 'ligas/argentina/equipos/independiente_rivadavia/', 36, 'grande', 'circular', 36, 2, 35, NULL, 36, NULL, '2023-10-08 00:01:49'),
(57, 2, 'argentina', 'gimnasia jujuy', 15, 6, 10, 29, 2, 'ligas/argentina/equipos/gimnasia_jujuy/', 68, 'grande', 'romboide', 37, 2, 19, NULL, 37, NULL, '2023-10-08 00:01:49'),
(58, 2, 'argentina', 'atletico tucuman', 6, 15, 4, 29, 32, 'ligas/argentina/equipos/atletico_tucuman/', 62, 'chica', 'cuadriculada', 38, 2, 34, NULL, 38, NULL, '2023-10-08 00:01:49'),
(59, 2, 'argentina', 'atlanta', 2, 4, 4, 27, 15, 'ligas/argentina/equipos/atlanta/', 51, 'cuadrada', 'lisa', 39, 1, 25, NULL, 39, NULL, '2023-10-08 00:01:49'),
(60, 2, 'argentina', 'sarmiento', 3, 15, 15, 3, 15, 'ligas/argentina/equipos/sarmiento/', 66, 'chica', 'rayada', 40, 1, 24, NULL, 40, NULL, '2023-10-08 00:01:49'),
(61, 2, 'argentina', 'patronato', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/patronato/', 54, 'chica', 'lisa', 41, 1, 25, NULL, 41, NULL, '2023-10-08 00:01:49'),
(62, 2, 'argentina', 'san martin tucuman', 1, 15, 15, 24, 15, 'ligas/argentina/equipos/san_martin_tucuman/', 58, 'chica', 'romboide', 42, 1, 21, NULL, 42, NULL, '2023-10-08 00:01:49'),
(63, 2, 'argentina', 'almagro', 6, 14, 15, 41, 15, 'ligas/argentina/equipos/almagro/', 47, 'chica', 'lisa', 43, 1, 31, NULL, 43, NULL, '2023-10-08 00:01:49'),
(64, 2, 'argentina', 'almirante brown', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/almirante_brown/', 67, 'chica', 'rayada', 44, 1, 23, NULL, 44, NULL, '2023-10-08 00:01:49'),
(65, 2, 'argentina', 'racing cordoba', 6, 15, 15, 29, 2, 'ligas/argentina/equipos/racing_cordoba/', 40, 'grande', 'romboide', 45, 1, 18, NULL, 45, NULL, '2023-10-08 00:01:49'),
(66, 2, 'argentina', 'douglas haid', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/douglas_haid/', 60, 'chica', 'romboide', 46, 1, 11, NULL, 46, NULL, '2023-10-08 00:01:49'),
(67, 2, 'argentina', 'deportivo moron', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/deportivo_moron/', 64, 'chica', 'lisa', 47, 1, 27, 'sudamericana', 9, NULL, '2023-10-08 00:01:51'),
(68, 2, 'argentina', 'crucero del norte', 4, 5, 2, 4, 2, 'ligas/argentina/equipos/crucero_del_norte/', 57, 'chica', 'lisa', 48, 1, 29, NULL, 48, NULL, '2023-10-08 00:01:50'),
(69, 3, 'colombia', 'atletico nacional', 3, 15, 15, 36, 14, 'ligas/colombia/equipos/atletico_nacional/', NULL, 'grande', 'rayada', 1, 10, 52, 'sudamericana', 10, NULL, '2023-10-08 00:01:50'),
(70, 3, 'colombia', 'america', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/america/', NULL, 'grande', 'cuadriculada', 2, 10, 60, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(71, 3, 'colombia', 'deportivo cali', 3, 15, 15, 3, 15, 'ligas/colombia/equipos/deportivo_cali/', NULL, 'mediana', 'rayada', 3, 9, 62, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(72, 3, 'colombia', 'junior', 1, 15, 10, 24, 10, 'ligas/colombia/equipos/junior/', NULL, 'grande', 'cuadriculada', 4, 9, 50, 'sudamericana', 11, NULL, '2023-10-08 00:01:50'),
(73, 3, 'colombia', 'independiente medellin', 1, 2, 15, 1, 15, 'ligas/colombia/equipos/independiente_medellin/', NULL, 'grande', 'cuadriculada', 5, 8, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(74, 3, 'colombia', 'independiente santa fe', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/independiente_santa_fe/', NULL, 'mediana', 'romboide', 6, 8, 54, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(75, 3, 'colombia', 'millonarios', 2, 15, 15, 2, 15, 'ligas/colombia/equipos/millonarios/', NULL, 'mediana', 'cuadriculada', 7, 7, 50, NULL, 100, NULL, '2023-09-02 16:19:02'),
(76, 3, 'colombia', 'deportes tolima', 4, 1, 1, 26, 15, 'ligas/colombia/equipos/deportes_tolima/', NULL, 'grande', 'circular', 8, 7, 66, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(77, 3, 'colombia', 'once caldas', 15, 3, 1, 15, 14, 'ligas/colombia/equipos/once_caldas/', NULL, 'grande', 'circular', 9, 6, 60, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(78, 3, 'colombia', 'cucuta deportivo', 1, 14, 14, 34, 15, 'ligas/colombia/equipos/cucuta_deportivo/', NULL, 'grande', 'romboide', 10, 6, 50, NULL, 100, NULL, '2023-10-08 00:01:50'),
(79, 3, 'colombia', 'atletico huila', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_huila/', NULL, 'grande', 'cuadriculada', 11, 5, 64, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(80, 3, 'colombia', 'boyaca chico', 5, 10, 15, 5, 28, 'ligas/colombia/equipos/boyaca_chico/', NULL, 'mediana', 'cuadriculada', 12, 5, 54, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(81, 3, 'colombia', 'envigado', 5, 3, 15, 5, 15, 'ligas/colombia/equipos/envigado/', NULL, 'cuadrada', 'rayada', 13, 4, 56, 'libertadores', 7, NULL, '2023-10-08 00:01:50'),
(82, 3, 'colombia', 'deportivo pasto', 1, 2, 4, 1, 4, 'ligas/colombia/equipos/deportivo_pasto/', NULL, 'grande', 'cuadriculada', 14, 4, 58, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(83, 3, 'colombia', 'la equidad', 15, 3, 4, 15, 3, 'ligas/colombia/equipos/la_equidad/', NULL, 'chica', 'romboide', 15, 3, 43, NULL, 100, NULL, '2023-10-08 00:01:50'),
(84, 3, 'colombia', 'aguilas doradas', 4, 14, 14, 4, 14, 'ligas/colombia/equipos/aguilas_doradas/', NULL, 'grande', 'romboide', 16, 3, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(85, 3, 'colombia', 'atletico bucaramanga', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_bucaramanga/', NULL, 'grande', 'romboide', 17, 2, 35, NULL, 100, NULL, '2023-10-08 00:01:50'),
(86, 3, 'colombia', 'real cartagena', 4, 3, 1, 4, 3, 'ligas/colombia/equipos/real_cartagena/', NULL, 'grande', 'lisa', 18, 2, 43, NULL, 100, NULL, '2023-10-08 00:01:50'),
(87, 3, 'colombia', 'alianza petrolera', 4, 14, 14, 31, 15, 'ligas/colombia/equipos/alianza_petrolera/', NULL, 'chica', 'lisa', 19, 1, 37, NULL, 100, NULL, '2023-10-08 00:01:50'),
(88, 3, 'colombia', 'patriotas', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/patriotas/', NULL, 'chica', 'lisa', 20, 1, 25, NULL, 100, NULL, '2023-10-08 00:01:50'),
(89, 4, 'uruguay', 'peñarol', 4, 14, 14, 31, 16, 'ligas/uruguay/equipos/peñarol/', NULL, 'grande', 'cuadriculada', 1, 10, 52, NULL, 100, NULL, '2023-10-08 00:01:50'),
(90, 4, 'uruguay', 'nacional', 15, 1, 2, 15, 1, 'ligas/uruguay/equipos/nacional/', NULL, 'grande', 'cuadriculada', 2, 10, 58, 'libertadores', 7, NULL, '2023-10-08 00:01:50'),
(91, 4, 'uruguay', 'defensor sporting', 12, 15, 1, 12, 15, 'ligas/uruguay/equipos/defensor_sporting/', NULL, 'grande', 'cuadriculada', 3, 9, 54, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(92, 4, 'uruguay', 'montevideo wanderers', 14, 15, 15, 33, 16, 'ligas/uruguay/equipos/montevideo_wanderers/', NULL, 'grande', 'cuadriculada', 4, 9, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(93, 4, 'uruguay', 'danubio', 15, 14, 14, 15, 14, 'ligas/uruguay/equipos/danubio/', NULL, 'cuadrada', 'rayada', 5, 8, 61, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(94, 4, 'uruguay', 'liverpool', 2, 14, 15, 32, 15, 'ligas/uruguay/equipos/liverpool/', NULL, 'mediana', 'cuadriculada', 6, 8, 64, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(95, 4, 'uruguay', 'river montevideo', 15, 1, 1, 24, 14, 'ligas/uruguay/equipos/river_montevideo/', NULL, 'grande', 'cuadriculada', 7, 7, 54, 'sudamericana', 10, NULL, '2023-10-08 00:01:50'),
(96, 4, 'uruguay', 'fenix', 15, 12, 4, 28, 32, 'ligas/uruguay/equipos/fenix/', NULL, 'chica', 'romboide', 8, 7, 54, 'sudamericana', 11, NULL, '2023-10-08 00:01:50'),
(97, 4, 'uruguay', 'central español', 1, 2, 15, 1, 15, 'ligas/uruguay/equipos/central_español/', NULL, 'grande', 'cuadriculada', 9, 6, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(98, 4, 'uruguay', 'cerro largo', 2, 15, 15, 28, 15, 'ligas/uruguay/equipos/cerro_largo/', NULL, 'chica', 'lisa', 10, 6, 54, NULL, 100, NULL, '2023-10-08 00:01:50'),
(99, 4, 'uruguay', 'atenas', 10, 1, 15, 10, 15, 'ligas/uruguay/equipos/atenas/', NULL, 'chica', 'cuadriculada', 11, 5, 56, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(100, 4, 'uruguay', 'racing montevideo', 15, 3, 14, 36, 15, 'ligas/uruguay/equipos/racing_montevideo/', NULL, 'chica', 'rayada', 12, 5, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(101, 4, 'uruguay', 'cerro', 15, 6, 6, 29, 14, 'ligas/uruguay/equipos/cerro/', NULL, 'grande', 'lisa', 13, 4, 59, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(102, 4, 'uruguay', 'tacuarembo', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/tacuarembo/', NULL, 'cuadrada', 'rayada', 14, 4, 59, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(103, 4, 'uruguay', 'rentistas', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/rentistas/', NULL, 'chica', 'rayada', 15, 3, 60, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(104, 4, 'uruguay', 'bella vista', 15, 4, 2, 8, 2, 'ligas/uruguay/equipos/bella_vista/', NULL, 'chica', 'cuadriculada', 16, 3, 64, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(105, 4, 'uruguay', 'rocha', 6, 14, 4, 6, 15, 'ligas/uruguay/equipos/rocha/', NULL, 'chica', 'romboide', 17, 2, 44, NULL, 100, NULL, '2023-10-08 00:01:50'),
(106, 4, 'uruguay', 'el tanque sisley', 3, 14, 15, 37, 15, 'ligas/uruguay/equipos/el_tanque_sisley/', NULL, 'chica', 'lisa', 18, 2, 34, NULL, 100, NULL, '2023-10-08 00:01:50'),
(107, 4, 'uruguay', 'deportivo colonia', 1, 15, 10, 1, 15, 'ligas/uruguay/equipos/deportivo_colonia/', NULL, 'chica', 'circular', 19, 1, 22, NULL, 100, NULL, '2023-10-08 00:01:50'),
(108, 4, 'uruguay', 'cerrito', 4, 3, 3, 4, 3, 'ligas/uruguay/equipos/cerrito/', NULL, 'chica', 'lisa', 20, 1, 27, NULL, 100, NULL, '2023-10-08 00:01:50'),
(109, 5, 'paraguay', 'olimpia', 15, 14, 14, 15, 14, 'ligas/paraguay/equipos/olimpia/', NULL, 'mediana', 'cuadriculada', 1, 10, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(110, 5, 'paraguay', 'cerro porteño', 10, 1, 15, 23, 15, 'ligas/paraguay/equipos/cerro_porteño/', NULL, 'grande', 'romboide', 2, 9, 56, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(111, 5, 'paraguay', 'club nacional', 15, 1, 2, 15, 1, 'ligas/paraguay/equipos/club_nacional/', NULL, 'mediana', 'cuadriculada', 3, 8, 58, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(112, 5, 'paraguay', 'libertad', 15, 14, 14, 33, 1, 'ligas/paraguay/equipos/libertad/', NULL, 'chica', 'rayada', 4, 7, 56, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(113, 5, 'paraguay', 'guarani', 4, 14, 14, 31, 15, 'ligas/paraguay/equipos/guarani/', NULL, 'mediana', 'cuadriculada', 5, 6, 58, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(114, 5, 'paraguay', 'sportivo luqueño', 2, 4, 4, 27, 15, 'ligas/paraguay/equipos/sportivo_luqueño/', NULL, 'mediana', 'romboide', 6, 6, 66, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(115, 5, 'paraguay', 'tacuari', 14, 15, 15, 33, 15, 'ligas/paraguay/equipos/tacuari/', NULL, 'chica', 'rayada', 7, 5, 56, 'sudamericana', 7, NULL, '2023-10-08 00:01:50'),
(116, 5, 'paraguay', 'sol de america', 2, 15, 15, 2, 15, 'ligas/paraguay/equipos/sol_de_america/', NULL, 'chica', 'circular', 8, 5, 56, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(117, 5, 'paraguay', 'deportivo capiata', 4, 2, 15, 27, 15, 'ligas/paraguay/equipos/deportivo_capiata/', NULL, 'chica', 'circular', 9, 4, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(118, 5, 'paraguay', 'sportivo carapegüa', 1, 15, 15, 24, 15, 'ligas/paraguay/equipos/sportivo_carapegüa/', NULL, 'mediana', 'cuadriculada', 10, 4, 61, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(119, 5, 'paraguay', 'sportivo san lorenzo', 15, 1, 2, 15, 2, 'ligas/paraguay/equipos/sportivo_san_lorenzo/', NULL, 'mediana', 'lisa', 11, 3, 49, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(120, 5, 'paraguay', 'rubio ñu', 15, 3, 3, 36, 3, 'ligas/paraguay/equipos/rubio_ñu/', NULL, 'chica', 'romboide', 12, 3, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(121, 5, 'paraguay', '12 de octubre', 15, 2, 2, 28, 15, 'ligas/paraguay/equipos/12_de_octubre/', NULL, 'chica', 'cuadriculada', 13, 2, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(122, 5, 'paraguay', '3 de febrero', 1, 15, 15, 1, 15, 'ligas/paraguay/equipos/3_de_febrero/', NULL, 'chica', 'lisa', 14, 2, 48, NULL, 100, NULL, '2023-10-08 00:01:50'),
(123, 5, 'paraguay', 'trinidense', 2, 4, 4, 2, 4, 'ligas/paraguay/equipos/trinidense/', NULL, 'chica', 'romboide', 15, 1, 39, NULL, 100, NULL, '2023-10-08 00:01:50'),
(124, 5, 'paraguay', 'cerro cora', 1, 14, 14, 34, 15, 'ligas/paraguay/equipos/cerro_cora/', NULL, 'chica', 'lisa', 16, 1, 38, NULL, 100, NULL, '2023-10-08 00:01:50'),
(125, 6, 'chile', 'colo colo', 15, 14, 14, 15, 14, 'ligas/chile/equipos/colo_colo/', NULL, 'mediana', 'circular', 1, 10, 52, 'sudamericana', 9, NULL, '2023-10-08 00:01:50'),
(126, 6, 'chile', 'universidad de chile', 2, 15, 1, 2, 15, 'ligas/chile/equipos/universidad_de_chile/', NULL, 'grande', 'cuadriculada', 2, 9, 50, NULL, 100, NULL, '2023-10-08 00:01:50'),
(127, 6, 'chile', 'universidad catolica', 15, 2, 1, 15, 1, 'ligas/chile/equipos/universidad_catolica/', NULL, 'chica', 'romboide', 3, 8, 64, NULL, 5, NULL, '2023-10-08 00:01:50'),
(128, 6, 'chile', 'cobreloa', 5, 14, 15, 5, 15, 'ligas/chile/equipos/cobreloa/', NULL, 'cuadrada', 'rayada', 4, 7, 56, 'libertadores', 5, NULL, '2023-10-08 00:01:50'),
(129, 6, 'chile', 'union española', 1, 4, 10, 1, 4, 'ligas/chile/equipos/union_española/', NULL, 'cuadrada', 'cuadriculada', 5, 6, 56, 'libertadores', 6, NULL, '2023-10-08 00:01:50'),
(130, 6, 'chile', 'deportes concepcion', 12, 15, 4, 12, 15, 'ligas/chile/equipos/deportes_concepcion/', NULL, 'grande', 'rayada', 6, 6, 54, 'sudamericana', 8, NULL, '2023-10-08 00:01:50'),
(131, 6, 'chile', 'cobresal', 15, 5, 3, 15, 5, 'ligas/chile/equipos/cobresal/', NULL, 'grande', 'rayada', 7, 5, 64, 'libertadores', 2, NULL, '2023-10-08 00:01:50'),
(132, 6, 'chile', 'huachipato', 2, 14, 14, 32, 15, 'ligas/chile/equipos/huachipato/', NULL, 'cuadrada', 'rayada', 8, 5, 65, 'libertadores', 1, NULL, '2023-10-08 00:01:50'),
(133, 6, 'chile', 'palestino', 15, 3, 1, 15, 37, 'ligas/chile/equipos/palestino/', NULL, 'grande', 'romboide', 9, 4, 62, 'libertadores', 3, NULL, '2023-10-08 00:01:50'),
(134, 6, 'chile', 'deportes iquique', 6, 14, 14, 6, 14, 'ligas/chile/equipos/deportes_iquique/', NULL, 'grande', 'romboide', 10, 4, 47, NULL, 100, NULL, '2023-10-08 00:01:50'),
(135, 6, 'chile', 'coquimbo unido', 4, 14, 14, 4, 14, 'ligas/chile/equipos/coquimbo_unido/', NULL, 'grande', 'circular', 11, 3, 56, 'sudamericana', 7, NULL, '2023-10-08 00:01:50'),
(136, 6, 'chile', 'everton', 10, 4, 4, 10, 4, 'ligas/chile/equipos/everton/', NULL, 'grande', 'lisa', 12, 3, 58, 'libertadores', 4, NULL, '2023-10-08 00:01:50'),
(137, 6, 'chile', 'deportes antofagasta', 15, 2, 1, 15, 2, 'ligas/chile/equipos/deportes_antofagasta/', NULL, 'grande', 'rayada', 13, 2, 40, NULL, 100, NULL, '2023-10-08 00:01:50'),
(138, 6, 'chile', 'audax italiano', 3, 15, 15, 3, 15, 'ligas/chile/equipos/audax_italiano/', NULL, 'cuadrada', 'rayada', 14, 2, 46, NULL, 100, NULL, '2023-10-08 00:01:50'),
(139, 6, 'chile', 'santiago wanderers', 3, 15, 15, 3, 15, 'ligas/chile/equipos/santiago_wanderers/', NULL, 'grande', 'romboide', 15, 1, 38, NULL, 100, NULL, '2023-10-08 00:01:50'),
(140, 6, 'chile', 'ohiggins', 6, 14, 4, 6, 4, 'ligas/chile/equipos/ohiggins/', NULL, 'grande', 'lisa', 16, 1, 20, NULL, 100, NULL, '2023-10-08 00:01:50'),
(141, 7, 'ecuador', 'barcelona', 4, 1, 14, 4, 1, 'ligas/ecuador/equipos/barcelona/', NULL, 'mediana', 'rayada', 1, 10, 62, NULL, 4, NULL, '2023-10-08 00:01:50'),
(142, 7, 'ecuador', 'el nacional', 1, 2, 15, 1, 15, 'ligas/ecuador/equipos/el_nacional/', NULL, 'grande', 'circular', 2, 9, 56, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(143, 7, 'ecuador', 'liga deportiva', 15, 10, 1, 15, 10, 'ligas/ecuador/equipos/liga_deportiva/', NULL, 'mediana', 'cuadriculada', 3, 8, 48, NULL, 100, NULL, '2023-10-08 00:01:51'),
(144, 7, 'ecuador', 'emelec', 2, 15, 6, 2, 15, 'ligas/ecuador/equipos/emelec/', NULL, 'cuadrada', 'rayada', 4, 7, 58, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(145, 7, 'ecuador', 'deportivo quito', 2, 1, 15, 23, 15, 'ligas/ecuador/equipos/deportivo_quito/', NULL, 'grande', 'circular', 5, 6, 56, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(146, 7, 'ecuador', 'liga de loja', 15, 1, 3, 15, 1, 'ligas/ecuador/equipos/liga_de_loja/', NULL, 'grande', 'circular', 6, 5, 60, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(147, 7, 'ecuador', 'deportivo cuenca', 1, 14, 14, 1, 15, 'ligas/ecuador/equipos/deportivo_cuenca/', NULL, 'mediana', 'romboide', 7, 4, 60, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(148, 7, 'ecuador', 'independiente del valle', 2, 14, 4, 32, 15, 'ligas/ecuador/equipos/independiente_del_valle/', NULL, 'chica', 'lisa', 8, 4, 52, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(149, 7, 'ecuador', 'deportivo olmedo', 10, 15, 1, 10, 4, 'ligas/ecuador/equipos/deportivo_olmedo/', NULL, 'chica', 'circular', 9, 3, 40, NULL, 100, NULL, '2023-10-08 00:01:50'),
(150, 7, 'ecuador', 'manta fc', 6, 10, 10, 6, 15, 'ligas/ecuador/equipos/manta_fc/', NULL, 'cuadrada', 'rayada', 10, 3, 54, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(151, 7, 'ecuador', 'macara', 6, 15, 10, 6, 15, 'ligas/ecuador/equipos/macara/', NULL, 'chica', 'romboide', 11, 2, 40, NULL, 100, NULL, '2023-10-08 00:01:50'),
(152, 7, 'ecuador', 'deportivo azogues', 3, 15, 1, 3, 15, 'ligas/ecuador/equipos/deportivo_azogues/', NULL, 'chica', 'cuadriculada', 12, 2, 51, 'sudamericana', 8, NULL, '2023-10-08 00:01:51'),
(153, 7, 'ecuador', 'tecnico universitario', 1, 15, 15, 24, 27, 'ligas/ecuador/equipos/tecnico_universitario/', NULL, 'chica', 'cuadriculada', 13, 1, 34, NULL, 100, NULL, '2023-10-08 00:01:50'),
(154, 7, 'ecuador', 'aucas', 4, 1, 1, 4, 16, 'ligas/ecuador/equipos/aucas/', NULL, 'chica', 'lisa', 14, 1, 30, NULL, 100, NULL, '2023-10-08 00:01:50'),
(155, 8, 'bolivia', 'bolivar', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/bolivar/', NULL, 'grande', 'rayada', 1, 10, 54, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(156, 8, 'bolivia', 'oriente petrolero', 3, 15, 15, 3, 15, 'ligas/bolivia/equipos/oriente_petrolero/', NULL, 'grande', 'cuadriculada', 2, 9, 44, 'sudamericana', 8, NULL, '2023-10-08 00:01:51'),
(157, 8, 'bolivia', 'blooming', 6, 15, 2, 6, 15, 'ligas/bolivia/equipos/blooming/', NULL, 'grande', 'romboide', 3, 8, 60, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(158, 8, 'bolivia', 'the stronguest', 4, 14, 14, 31, 15, 'ligas/bolivia/equipos/the_stronguest/', NULL, 'grande', 'rayada', 4, 7, 60, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(159, 8, 'bolivia', 'real potosi', 12, 15, 15, 12, 15, 'ligas/bolivia/equipos/real_potosi/', NULL, 'grande', 'circular', 5, 6, 54, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(160, 8, 'bolivia', 'la paz fc', 2, 1, 15, 23, 15, 'ligas/bolivia/equipos/la_paz_fc/', NULL, 'grande', 'rayada', 6, 5, 49, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(161, 8, 'bolivia', 'jorge wilsterman', 1, 15, 10, 1, 15, 'ligas/bolivia/equipos/jorge_wilsterman/', NULL, 'grande', 'cuadriculada', 7, 4, 55, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(162, 8, 'bolivia', 'san jose', 15, 2, 2, 15, 2, 'ligas/bolivia/equipos/san_jose/', NULL, 'grande', 'cuadriculada', 8, 3, 46, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(163, 8, 'bolivia', 'universitario sucre', 2, 1, 15, 2, 15, 'ligas/bolivia/equipos/universitario_sucre/', NULL, 'grande', 'lisa', 9, 2, 39, NULL, 100, NULL, '2023-10-08 00:01:50'),
(164, 8, 'bolivia', 'aurora', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/aurora/', NULL, 'grande', 'cuadriculada', 10, 2, 36, NULL, 100, NULL, '2023-10-08 00:01:50'),
(165, 8, 'bolivia', 'guabira', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/guabira/', NULL, 'chica', 'lisa', 11, 1, 24, NULL, 100, NULL, '2023-10-08 00:01:50'),
(166, 8, 'bolivia', 'santa cruz', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/santa_cruz/', NULL, 'chica', 'romboide', 12, 1, 25, NULL, 100, NULL, '2023-10-08 00:01:50'),
(167, 9, 'peru', 'sporting cristal', 6, 15, 4, 6, 15, 'ligas/peru/equipos/sporting_cristal/', NULL, 'mediana', 'rayada', 1, 10, 62, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(168, 9, 'peru', 'alianza lima', 10, 15, 15, 28, 15, 'ligas/peru/equipos/alianza_lima/', NULL, 'mediana', 'cuadriculada', 2, 9, 50, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(169, 9, 'peru', 'universitario', 8, 1, 14, 8, 1, 'ligas/peru/equipos/universitario/', NULL, 'mediana', 'circular', 3, 8, 42, NULL, 100, NULL, '2023-10-08 00:01:51'),
(170, 9, 'peru', 'cienciano', 1, 15, 15, 1, 15, 'ligas/peru/equipos/cienciano/', NULL, 'mediana', 'romboide', 4, 7, 58, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(171, 9, 'peru', 'juan aurich', 1, 15, 15, 1, 15, 'ligas/peru/equipos/juan_aurich/', NULL, 'grande', 'lisa', 5, 6, 56, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(172, 9, 'peru', 'cesar vallejo', 10, 6, 15, 2, 5, 'ligas/peru/equipos/cesar_vallejo/', NULL, 'mediana', 'circular', 6, 5, 53, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(173, 9, 'peru', 'sport huancayo', 1, 4, 3, 1, 3, 'ligas/peru/equipos/sport_huancayo/', NULL, 'grande', 'romboide', 7, 4, 44, NULL, 100, NULL, '2023-10-08 00:01:50'),
(174, 9, 'peru', 'real garcilaso', 6, 15, 15, 6, 15, 'ligas/peru/equipos/real_garcilaso/', NULL, 'grande', 'cuadriculada', 8, 3, 55, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(175, 9, 'peru', 'alianza atletico', 15, 2, 2, 15, 2, 'ligas/peru/equipos/alianza_atletico/', NULL, 'grande', 'romboide', 9, 2, 30, NULL, 100, NULL, '2023-10-08 00:01:51'),
(176, 9, 'peru', 'sport boys', 9, 14, 14, 9, 14, 'ligas/peru/equipos/sport_boys/', NULL, 'grande', 'romboide', 10, 2, 50, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(177, 9, 'peru', 'fc melgar', 14, 1, 1, 34, 15, 'ligas/peru/equipos/fc_melgar/', NULL, 'chica', 'lisa', 11, 1, 26, NULL, 100, NULL, '2023-10-08 00:01:50'),
(178, 9, 'peru', 'sport ancash', 3, 4, 4, 3, 4, 'ligas/peru/equipos/sport_ancash/', NULL, 'cuadrada', 'cuadriculada', 12, 1, 27, NULL, 100, NULL, '2023-10-08 00:01:50'),
(179, 10, 'venezuela', 'caracas fc', 1, 15, 14, 1, 15, 'ligas/venezuela/equipos/caracas_fc/', NULL, 'grande', 'lisa', 1, 10, 52, 'sudamericana', 6, NULL, '2023-10-08 00:01:51'),
(180, 10, 'venezuela', 'minerven', 10, 15, 15, 10, 15, 'ligas/venezuela/equipos/minerven/', NULL, 'grande', 'cuadriculada', 2, 9, 54, 'libertadores', 4, NULL, '2023-10-08 00:01:51'),
(181, 10, 'venezuela', 'deportivo tachira', 4, 14, 15, 31, 15, 'ligas/venezuela/equipos/deportivo_tachira/', NULL, 'grande', 'romboide', 3, 8, 62, 'libertadores', 1, NULL, '2023-10-08 00:01:51'),
(182, 10, 'venezuela', 'atletico maracaibo', 2, 1, 1, 23, 15, 'ligas/venezuela/equipos/atletico_maracaibo/', NULL, 'grande', 'cuadriculada', 4, 7, 60, 'libertadores', 3, NULL, '2023-10-08 00:01:51'),
(183, 10, 'venezuela', 'estudiantes merida', 1, 15, 2, 24, 36, 'ligas/venezuela/equipos/estudiantes_merida/', NULL, 'grande', 'circular', 5, 6, 54, 'libertadores', 5, NULL, '2023-10-08 00:01:51'),
(184, 10, 'venezuela', 'deportivo anzoategui', 1, 4, 4, 26, 15, 'ligas/venezuela/equipos/deportivo_anzoategui/', NULL, 'grande', 'cuadriculada', 6, 5, 61, 'libertadores', 2, NULL, '2023-10-08 00:01:51'),
(185, 10, 'venezuela', 'zamora fc', 15, 14, 14, 33, 15, 'ligas/venezuela/equipos/zamora_fc/', NULL, 'mediana', 'lisa', 7, 4, 50, 'sudamericana', 7, NULL, '2023-10-08 00:01:51'),
(186, 10, 'venezuela', 'carabobo fc', 20, 4, 2, 20, 15, 'ligas/venezuela/equipos/carabobo_fc/', NULL, 'mediana', 'cuadriculada', 8, 3, 47, NULL, 100, NULL, '2023-10-08 00:01:51'),
(187, 10, 'venezuela', 'trujillanos', 4, 13, 13, 30, 15, 'ligas/venezuela/equipos/trujillanos/', NULL, 'grande', 'lisa', 9, 2, 43, NULL, 100, NULL, '2023-10-08 00:01:50'),
(188, 10, 'venezuela', 'pepeganga', 12, 15, 15, 12, 15, 'ligas/venezuela/equipos/pepeganga/', NULL, 'mediana', 'circular', 10, 2, 45, NULL, 100, NULL, '2023-10-08 00:01:50'),
(189, 10, 'venezuela', 'mineros de guayana', 2, 14, 14, 32, 15, 'ligas/venezuela/equipos/mineros_de_guayana/', NULL, 'grande', 'cuadriculada', 11, 1, 27, NULL, 100, NULL, '2023-10-08 00:01:50'),
(190, 10, 'venezuela', 'portuguesa fc', 1, 14, 14, 34, 15, 'ligas/venezuela/equipos/portuguesa_fc/', NULL, 'chica', 'romboide', 12, 1, 36, NULL, 100, NULL, '2023-10-08 00:01:50');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 2000, 1, 69, NULL, 21, 22, 23, 24, NULL, NULL, NULL);

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
(16, '2024_10_21_185658_create_grupos_table', 2),
(17, '2024_10_21_190106_create_equipos_grupo_table', 2),
(18, '2024_10_21_190735_create_partidos_table', 2),
(19, '2024_10_21_191635_create_goleadores_table', 2),
(20, '2024_10_21_225756_create_cupos_afa_table', 2),
(21, '2024_10_21_225757_create_main_table', 2);

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
  `dia` int(11) NOT NULL,
  `relevancia` int(11) NOT NULL,
  `hora` int(11) NOT NULL,
  `gl` int(11) NOT NULL,
  `gv` int(11) NOT NULL,
  `pa` int(11) NOT NULL,
  `pb` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `is_vuelta` tinyint(1) NOT NULL DEFAULT 0,
  `is_define` tinyint(1) NOT NULL DEFAULT 0,
  `is_final` tinyint(1) NOT NULL DEFAULT 0,
  `is_jugado` tinyint(1) NOT NULL DEFAULT 0,
  `winner` int(11) NOT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Charly', 'charlyzz68@gmail.com', NULL, '$2y$10$b0M6Di2ApUQcGu5yoANYQ.KLNCYJ5NwRRiMRD4zAH.GiI3/PgjfOO', NULL, '2024-10-21 22:32:54', '2024-10-21 22:32:54');

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
  ADD KEY `partidos_vis_id_foreign` (`vis_id`);

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
  ADD KEY `partidos_vis_id_foreign` (`vis_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `back_equipos`
--
ALTER TABLE `back_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `back_equipos_grupo`
--
ALTER TABLE `back_equipos_grupo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `back_goleadores`
--
ALTER TABLE `back_goleadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `back_grupos`
--
ALTER TABLE `back_grupos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `back_ligas`
--
ALTER TABLE `back_ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `back_main`
--
ALTER TABLE `back_main`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `back_partidos`
--
ALTER TABLE `back_partidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `equipos_grupo`
--
ALTER TABLE `equipos_grupo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `goleadores`
--
ALTER TABLE `goleadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupos_afa`
--
ALTER TABLE `cupos_afa`
  ADD CONSTRAINT `cupos_afa_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `equipos_grupo`
--
ALTER TABLE `equipos_grupo`
  ADD CONSTRAINT `equipos_grupo_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `equipos_grupo_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `goleadores`
--
ALTER TABLE `goleadores`
  ADD CONSTRAINT `goleadores_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `main`
--
ALTER TABLE `main`
  ADD CONSTRAINT `main_afa_a_foreign` FOREIGN KEY (`afa_a`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_afa_b_foreign` FOREIGN KEY (`afa_b`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_afa_c_foreign` FOREIGN KEY (`afa_c`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_arg_foreign` FOREIGN KEY (`arg`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_last_partido_foreign` FOREIGN KEY (`last_partido`) REFERENCES `partidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_lib_foreign` FOREIGN KEY (`lib`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_rec_foreign` FOREIGN KEY (`rec`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_sud_foreign` FOREIGN KEY (`sud`) REFERENCES `equipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `partidos_loc_id_foreign` FOREIGN KEY (`loc_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `partidos_vis_id_foreign` FOREIGN KEY (`vis_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
