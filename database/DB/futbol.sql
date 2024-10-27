-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2024 a las 21:58:37
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
(1, 1, 'brasil', 'san pablo fc', 15, 1, 14, 15, 34, 'ligas/brasil/equipos/san_pablo_fc/', NULL, 'grande', 'circular', 1, 10, 60, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(2, 1, 'brasil', 'cruzeiro', 2, 15, 15, 2, 15, 'ligas/brasil/equipos/cruzeiro/', NULL, 'grande', 'cuadriculada', 2, 10, 42, NULL, 100, NULL, '2024-10-23 14:27:28'),
(3, 1, 'brasil', 'flamengo', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/flamengo/', NULL, 'grande', 'rayada', 3, 9, 56, 'libertadores', 6, NULL, '2024-10-23 14:27:28'),
(4, 1, 'brasil', 'gremio', 6, 14, 15, 41, 15, 'ligas/brasil/equipos/gremio/', NULL, 'mediana', 'rayada', 4, 9, 44, NULL, 100, NULL, '2024-10-23 14:27:28'),
(5, 1, 'brasil', 'palmeiras', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/palmeiras/', NULL, 'mediana', 'circular', 5, 8, 60, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(6, 1, 'brasil', 'corinthians', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/corinthians/', NULL, 'cuadrada', 'rayada', 6, 8, 56, 'libertadores', 7, NULL, '2024-10-23 14:27:28'),
(7, 1, 'brasil', 'santos fc', 15, 14, 14, 15, 33, 'ligas/brasil/equipos/santos_fc/', NULL, 'mediana', 'romboide', 7, 7, 58, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(8, 1, 'brasil', 'vasco da gama', 15, 14, 14, 15, 14, 'ligas/brasil/equipos/vasco_da_gama/', NULL, 'grande', 'romboide', 8, 7, 60, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(9, 1, 'brasil', 'fluminense', 20, 3, 15, 25, 15, 'ligas/brasil/equipos/fluminense/', NULL, 'mediana', 'rayada', 9, 6, 54, 'sudamericana', 9, NULL, '2024-10-23 14:27:28'),
(10, 1, 'brasil', 'internacional', 1, 15, 15, 1, 15, 'ligas/brasil/equipos/internacional/', NULL, 'grande', 'cuadriculada', 10, 6, 58, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(11, 1, 'brasil', 'atletico mineiro', 14, 15, 15, 33, 15, 'ligas/brasil/equipos/atletico_mineiro/', NULL, 'grande', 'cuadriculada', 11, 5, 53, 'sudamericana', 12, NULL, '2024-10-23 14:27:28'),
(12, 1, 'brasil', 'botafogo', 14, 15, 15, 33, 16, 'ligas/brasil/equipos/botafogo/', NULL, 'grande', 'lisa', 12, 5, 54, 'sudamericana', 10, NULL, '2024-10-23 14:27:28'),
(13, 1, 'brasil', 'paranaense', 1, 14, 15, 34, 15, 'ligas/brasil/equipos/paranaense/', NULL, 'cuadrada', 'cuadriculada', 13, 4, 53, NULL, 100, NULL, '2024-10-23 14:27:26'),
(14, 1, 'brasil', 'goias', 3, 15, 15, 3, 15, 'ligas/brasil/equipos/goias/', NULL, 'mediana', 'cuadriculada', 14, 4, 46, NULL, 100, NULL, '2024-10-23 14:27:28'),
(15, 1, 'brasil', 'bahia', 15, 2, 1, 15, 23, 'ligas/brasil/equipos/bahia/', NULL, 'grande', 'rayada', 15, 3, 45, NULL, 100, NULL, '2024-10-23 14:27:28'),
(16, 1, 'brasil', 'chapecoense', 3, 15, 7, 3, 15, 'ligas/brasil/equipos/chapecoense/', NULL, 'cuadrada', 'romboide', 16, 3, 56, 'libertadores', 8, NULL, '2024-10-23 14:27:28'),
(17, 1, 'brasil', 'coritiba', 15, 3, 3, 15, 36, 'ligas/brasil/equipos/coritiba/', NULL, 'grande', 'cuadriculada', 17, 2, 44, NULL, 100, NULL, '2024-10-23 14:27:28'),
(18, 1, 'brasil', 'ponte preta', 15, 14, 14, 33, 14, 'ligas/brasil/equipos/ponte_preta/', NULL, 'grande', 'lisa', 18, 2, 54, 'sudamericana', 11, NULL, '2024-10-23 14:27:28'),
(19, 1, 'brasil', 'avai', 2, 15, 15, 28, 15, 'ligas/brasil/equipos/avai/', NULL, 'grande', 'romboide', 19, 1, 30, NULL, 100, NULL, '2024-10-23 14:27:26'),
(20, 1, 'brasil', 'portuguesa', 1, 3, 15, 25, 15, 'ligas/brasil/equipos/portuguesa/', NULL, 'mediana', 'cuadriculada', 20, 1, 34, NULL, 100, NULL, '2024-10-23 14:27:26'),
(21, 2, 'argentina', 'river plate', 15, 1, 14, 15, 14, 'ligas/argentina/equipos/river_plate/', 22, 'grande', 'rayada', 1, 10, 31, NULL, 10, NULL, '2024-10-23 14:27:26'),
(22, 2, 'argentina', 'boca juniors', 2, 4, 4, 2, 15, 'ligas/argentina/equipos/boca_juniors/', 21, 'mediana', 'rayada', 2, 10, 30, NULL, 6, NULL, '2024-10-23 14:27:26'),
(23, 2, 'argentina', 'san lorenzo', 2, 1, 1, 23, 15, 'ligas/argentina/equipos/san_lorenzo/', 29, 'mediana', 'cuadriculada', 3, 10, 31, NULL, 3, NULL, '2024-10-23 14:27:26'),
(24, 2, 'argentina', 'velez sarsfield', 15, 2, 2, 15, 2, 'ligas/argentina/equipos/velez_sarsfield/', 30, 'cuadrada', 'rayada', 4, 10, 12, NULL, 4, NULL, '2024-10-23 14:27:26'),
(25, 2, 'argentina', 'independiente', 1, 15, 10, 1, 15, 'ligas/argentina/equipos/independiente/', 26, 'cuadrada', 'cuadriculada', 5, 9, 12, NULL, 7, NULL, '2024-10-23 14:27:26'),
(26, 2, 'argentina', 'racing club', 6, 15, 10, 29, 10, 'ligas/argentina/equipos/racing_club/', 25, 'grande', 'cuadriculada', 6, 9, 36, 'sudamericana', 11, NULL, '2024-10-23 14:27:28'),
(27, 2, 'argentina', 'newells old boys', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/newells_old_boys/', 28, 'cuadrada', 'cuadriculada', 7, 9, 39, NULL, 10, NULL, '2024-10-23 14:27:27'),
(28, 2, 'argentina', 'rosario central', 4, 2, 2, 27, 15, 'ligas/argentina/equipos/rosario_central/', 27, 'mediana', 'romboide', 8, 9, 41, NULL, 9, NULL, '2024-10-23 14:27:27'),
(29, 2, 'argentina', 'huracan', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/huracan/', 23, 'mediana', 'lisa', 9, 8, 9, NULL, 7, NULL, '2024-10-23 14:27:27'),
(30, 2, 'argentina', 'ferrocarril oeste', 3, 15, 12, 3, 15, 'ligas/argentina/equipos/ferrocarril_oeste/', 24, 'cuadrada', 'romboide', 10, 8, 35, NULL, 12, NULL, '2024-10-23 14:27:27'),
(31, 2, 'argentina', 'estudiantes la plata', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/estudiantes_la_plata/', 32, 'grande', 'circular', 11, 8, 38, NULL, 11, NULL, '2024-10-23 14:27:27'),
(32, 2, 'argentina', 'gimnasia la plata', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/gimnasia_la_plata/', 31, 'grande', 'circular', 12, 8, 46, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(33, 2, 'argentina', 'lanus', 20, 15, 15, 20, 15, 'ligas/argentina/equipos/lanus/', 34, 'cuadrada', 'cuadriculada', 13, 7, 30, NULL, 11, NULL, '2024-10-23 14:27:27'),
(34, 2, 'argentina', 'banfield', 15, 3, 5, 15, 5, 'ligas/argentina/equipos/banfield/', 33, 'chica', 'rayada', 14, 7, 32, 'sudamericana', 9, NULL, '2024-10-23 14:27:28'),
(35, 2, 'argentina', 'argentinos juniors', 1, 15, 2, 1, 15, 'ligas/argentina/equipos/argentinos_juniors/', 53, 'cuadrada', 'lisa', 15, 7, 22, NULL, 3, NULL, '2024-10-23 14:27:27'),
(36, 2, 'argentina', 'godoy cruz', 2, 15, 15, 2, 15, 'ligas/argentina/equipos/godoy_cruz/', 56, 'grande', 'circular', 16, 7, 28, NULL, 16, NULL, '2024-10-23 14:27:27'),
(37, 2, 'argentina', 'colon', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/colon/', 38, 'chica', 'circular', 17, 6, 37, NULL, 2, NULL, '2024-10-23 14:27:27'),
(38, 2, 'argentina', 'union', 1, 15, 2, 24, 2, 'ligas/argentina/equipos/union/', 37, 'chica', 'cuadriculada', 18, 6, 23, NULL, 18, NULL, '2024-10-23 14:27:27'),
(39, 2, 'argentina', 'talleres cordoba', 10, 15, 20, 28, 20, 'ligas/argentina/equipos/talleres_cordoba/', 41, 'grande', 'romboide', 19, 6, 27, NULL, 19, NULL, '2024-10-23 14:27:27'),
(40, 2, 'argentina', 'instituto cordoba', 1, 15, 14, 24, 16, 'ligas/argentina/equipos/instituto_cordoba/', 65, 'grande', 'romboide', 20, 6, 36, NULL, 1, NULL, '2024-10-23 14:27:27'),
(41, 2, 'argentina', 'belgrano cordoba', 6, 14, 14, 6, 15, 'ligas/argentina/equipos/belgrano_cordoba/', 39, 'grande', 'romboide', 21, 5, 35, 'sudamericana', 12, NULL, '2024-10-23 14:27:28'),
(42, 2, 'argentina', 'atletico rafaela', 6, 15, 4, 29, 2, 'ligas/argentina/equipos/atletico_rafaela/', 49, 'cuadrada', 'cuadriculada', 22, 5, 20, NULL, 22, NULL, '2024-10-23 14:27:27'),
(43, 2, 'argentina', 'quilmes', 15, 10, 10, 15, 10, 'ligas/argentina/equipos/quilmes/', 44, 'cuadrada', 'rayada', 23, 5, 27, NULL, 23, NULL, '2024-10-23 14:27:27'),
(44, 2, 'argentina', 'arsenal', 6, 1, 15, 6, 15, 'ligas/argentina/equipos/arsenal/', 43, 'chica', 'lisa', 24, 5, 20, NULL, 5, NULL, '2024-10-23 14:27:27'),
(45, 2, 'argentina', 'aldosivi', 4, 3, 14, 35, 15, 'ligas/argentina/equipos/aldosivi/', 48, 'grande', 'circular', 25, 4, 33, NULL, 25, NULL, '2024-10-23 14:27:27'),
(46, 2, 'argentina', 'defensa y justicia', 4, 3, 3, 4, 3, 'ligas/argentina/equipos/defensa_y_justicia/', 55, 'chica', 'lisa', 26, 4, 40, 'libertadores', 6, NULL, '2024-10-23 14:27:28'),
(47, 2, 'argentina', 'tigre', 2, 1, 1, 2, 15, 'ligas/argentina/equipos/tigre/', 63, 'chica', 'romboide', 27, 4, 28, NULL, 8, NULL, '2024-10-23 14:27:27'),
(48, 2, 'argentina', 'olimpo', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/olimpo/', 45, 'chica', 'rayada', 28, 4, 37, NULL, 28, NULL, '2024-10-23 14:27:27'),
(49, 2, 'argentina', 'san martin san juan', 3, 14, 14, 37, 15, 'ligas/argentina/equipos/san_martin_san_juan/', 42, 'cuadrada', 'rayada', 29, 3, 41, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(50, 2, 'argentina', 'all boys', 15, 14, 14, 15, 14, 'ligas/argentina/equipos/all_boys/', 52, 'cuadrada', 'cuadriculada', 30, 3, 39, 'sudamericana', 10, NULL, '2024-10-23 14:27:28'),
(51, 2, 'argentina', 'chacarita juniors', 14, 1, 15, 34, 15, 'ligas/argentina/equipos/chacarita_juniors/', 59, 'cuadrada', 'cuadriculada', 31, 3, 34, NULL, 31, NULL, '2024-10-23 14:27:27'),
(52, 2, 'argentina', 'nueva chicago', 3, 14, 15, 37, 15, 'ligas/argentina/equipos/nueva_chicago/', 50, 'chica', 'circular', 32, 3, 35, NULL, 32, NULL, '2024-10-23 14:27:27'),
(53, 2, 'argentina', 'platense', 15, 13, 13, 15, 13, 'ligas/argentina/equipos/platense/', 35, 'chica', 'lisa', 33, 3, 31, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(54, 2, 'argentina', 'boca unidos', 4, 1, 10, 26, 15, 'ligas/argentina/equipos/boca_unidos/', 61, 'chica', 'lisa', 34, 2, 31, NULL, 34, NULL, '2024-10-23 14:27:27'),
(55, 2, 'argentina', 'temperley', 6, 15, 15, 6, 15, 'ligas/argentina/equipos/temperley/', 46, 'chica', 'romboide', 35, 2, 44, 'libertadores', 7, NULL, '2024-10-23 14:27:28'),
(56, 2, 'argentina', 'independiente rivadavia', 10, 15, 15, 10, 15, 'ligas/argentina/equipos/independiente_rivadavia/', 36, 'grande', 'circular', 36, 2, 17, NULL, 36, NULL, '2024-10-23 14:27:27'),
(57, 2, 'argentina', 'gimnasia jujuy', 15, 6, 10, 29, 2, 'ligas/argentina/equipos/gimnasia_jujuy/', 68, 'grande', 'romboide', 37, 2, 40, 'libertadores', 8, NULL, '2024-10-23 14:27:28'),
(58, 2, 'argentina', 'atletico tucuman', 6, 15, 4, 29, 32, 'ligas/argentina/equipos/atletico_tucuman/', 62, 'chica', 'cuadriculada', 38, 2, 34, NULL, 38, NULL, '2023-10-08 00:01:49'),
(59, 2, 'argentina', 'atlanta', 2, 4, 4, 27, 15, 'ligas/argentina/equipos/atlanta/', 51, 'cuadrada', 'lisa', 39, 1, 27, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(60, 2, 'argentina', 'sarmiento', 3, 15, 15, 3, 15, 'ligas/argentina/equipos/sarmiento/', 66, 'chica', 'rayada', 40, 1, 16, NULL, 40, NULL, '2024-10-23 14:27:27'),
(61, 2, 'argentina', 'patronato', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/patronato/', 54, 'chica', 'lisa', 41, 1, 27, NULL, 41, NULL, '2024-10-23 14:27:27'),
(62, 2, 'argentina', 'san martin tucuman', 1, 15, 15, 24, 15, 'ligas/argentina/equipos/san_martin_tucuman/', 58, 'chica', 'romboide', 42, 1, 27, NULL, 42, NULL, '2024-10-23 14:27:27'),
(63, 2, 'argentina', 'almagro', 6, 14, 15, 41, 15, 'ligas/argentina/equipos/almagro/', 47, 'chica', 'lisa', 43, 1, 18, NULL, 43, NULL, '2024-10-23 14:27:27'),
(64, 2, 'argentina', 'almirante brown', 4, 14, 14, 31, 15, 'ligas/argentina/equipos/almirante_brown/', 67, 'chica', 'rayada', 44, 1, 31, NULL, 44, NULL, '2024-10-23 14:27:27'),
(65, 2, 'argentina', 'racing cordoba', 6, 15, 15, 29, 2, 'ligas/argentina/equipos/racing_cordoba/', 40, 'grande', 'romboide', 45, 1, 27, NULL, 45, NULL, '2024-10-23 14:27:27'),
(66, 2, 'argentina', 'douglas haid', 1, 14, 14, 34, 15, 'ligas/argentina/equipos/douglas_haid/', 60, 'chica', 'romboide', 46, 1, 28, NULL, 46, NULL, '2024-10-23 14:27:27'),
(67, 2, 'argentina', 'deportivo moron', 15, 1, 1, 15, 1, 'ligas/argentina/equipos/deportivo_moron/', 64, 'chica', 'lisa', 47, 1, 30, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(68, 2, 'argentina', 'crucero del norte', 4, 5, 2, 4, 2, 'ligas/argentina/equipos/crucero_del_norte/', 57, 'chica', 'lisa', 48, 1, 27, NULL, 48, NULL, '2024-10-23 14:27:27'),
(69, 3, 'colombia', 'atletico nacional', 3, 15, 15, 36, 14, 'ligas/colombia/equipos/atletico_nacional/', NULL, 'grande', 'rayada', 1, 10, 64, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(70, 3, 'colombia', 'america', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/america/', NULL, 'grande', 'cuadriculada', 2, 10, 56, 'sudamericana', 8, NULL, '2024-10-23 14:27:28'),
(71, 3, 'colombia', 'deportivo cali', 3, 15, 15, 3, 15, 'ligas/colombia/equipos/deportivo_cali/', NULL, 'mediana', 'rayada', 3, 9, 50, NULL, 100, NULL, '2024-10-23 14:27:28'),
(72, 3, 'colombia', 'junior', 1, 15, 10, 24, 10, 'ligas/colombia/equipos/junior/', NULL, 'grande', 'cuadriculada', 4, 9, 46, NULL, 100, NULL, '2024-10-23 14:27:28'),
(73, 3, 'colombia', 'independiente medellin', 1, 2, 15, 1, 15, 'ligas/colombia/equipos/independiente_medellin/', NULL, 'grande', 'cuadriculada', 5, 8, 51, NULL, 100, NULL, '2024-10-23 14:27:27'),
(74, 3, 'colombia', 'independiente santa fe', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/independiente_santa_fe/', NULL, 'mediana', 'romboide', 6, 8, 62, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(75, 3, 'colombia', 'millonarios', 2, 15, 15, 2, 15, 'ligas/colombia/equipos/millonarios/', NULL, 'mediana', 'cuadriculada', 7, 7, 60, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(76, 3, 'colombia', 'deportes tolima', 4, 1, 1, 26, 15, 'ligas/colombia/equipos/deportes_tolima/', NULL, 'grande', 'circular', 8, 7, 56, 'sudamericana', 9, NULL, '2024-10-23 14:27:28'),
(77, 3, 'colombia', 'once caldas', 15, 3, 1, 15, 14, 'ligas/colombia/equipos/once_caldas/', NULL, 'grande', 'circular', 9, 6, 53, 'sudamericana', 10, NULL, '2024-10-23 14:27:28'),
(78, 3, 'colombia', 'cucuta deportivo', 1, 14, 14, 34, 15, 'ligas/colombia/equipos/cucuta_deportivo/', NULL, 'grande', 'romboide', 10, 6, 60, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(79, 3, 'colombia', 'atletico huila', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_huila/', NULL, 'grande', 'cuadriculada', 11, 5, 57, 'libertadores', 7, NULL, '2024-10-23 14:27:28'),
(80, 3, 'colombia', 'boyaca chico', 5, 10, 15, 5, 28, 'ligas/colombia/equipos/boyaca_chico/', NULL, 'mediana', 'cuadriculada', 12, 5, 53, 'sudamericana', 11, NULL, '2024-10-23 14:27:28'),
(81, 3, 'colombia', 'envigado', 5, 3, 15, 5, 15, 'ligas/colombia/equipos/envigado/', NULL, 'cuadrada', 'rayada', 13, 4, 65, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(82, 3, 'colombia', 'deportivo pasto', 1, 2, 4, 1, 4, 'ligas/colombia/equipos/deportivo_pasto/', NULL, 'grande', 'cuadriculada', 14, 4, 48, NULL, 100, NULL, '2024-10-23 14:27:28'),
(83, 3, 'colombia', 'la equidad', 15, 3, 4, 15, 3, 'ligas/colombia/equipos/la_equidad/', NULL, 'chica', 'romboide', 15, 3, 37, NULL, 100, NULL, '2024-10-23 14:27:27'),
(84, 3, 'colombia', 'aguilas doradas', 4, 14, 14, 4, 14, 'ligas/colombia/equipos/aguilas_doradas/', NULL, 'grande', 'romboide', 16, 3, 60, 'libertadores', 6, NULL, '2024-10-23 14:27:28'),
(85, 3, 'colombia', 'atletico bucaramanga', 4, 3, 3, 4, 3, 'ligas/colombia/equipos/atletico_bucaramanga/', NULL, 'grande', 'romboide', 17, 2, 40, NULL, 100, NULL, '2024-10-23 14:27:27'),
(86, 3, 'colombia', 'real cartagena', 4, 3, 1, 4, 3, 'ligas/colombia/equipos/real_cartagena/', NULL, 'grande', 'lisa', 18, 2, 48, NULL, 100, NULL, '2024-10-23 14:27:27'),
(87, 3, 'colombia', 'alianza petrolera', 4, 14, 14, 31, 15, 'ligas/colombia/equipos/alianza_petrolera/', NULL, 'chica', 'lisa', 19, 1, 28, NULL, 100, NULL, '2024-10-23 14:27:27'),
(88, 3, 'colombia', 'patriotas', 1, 15, 15, 1, 15, 'ligas/colombia/equipos/patriotas/', NULL, 'chica', 'lisa', 20, 1, 31, NULL, 100, NULL, '2024-10-23 14:27:27'),
(89, 4, 'uruguay', 'peñarol', 4, 14, 14, 31, 16, 'ligas/uruguay/equipos/peñarol/', NULL, 'grande', 'cuadriculada', 1, 10, 46, NULL, 100, NULL, '2024-10-23 14:27:27'),
(90, 4, 'uruguay', 'nacional', 15, 1, 2, 15, 1, 'ligas/uruguay/equipos/nacional/', NULL, 'grande', 'cuadriculada', 2, 10, 50, NULL, 100, NULL, '2024-10-23 14:27:28'),
(91, 4, 'uruguay', 'defensor sporting', 12, 15, 1, 12, 15, 'ligas/uruguay/equipos/defensor_sporting/', NULL, 'grande', 'cuadriculada', 3, 9, 56, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(92, 4, 'uruguay', 'montevideo wanderers', 14, 15, 15, 33, 16, 'ligas/uruguay/equipos/montevideo_wanderers/', NULL, 'grande', 'cuadriculada', 4, 9, 52, 'sudamericana', 11, NULL, '2024-10-23 14:27:28'),
(93, 4, 'uruguay', 'danubio', 15, 14, 14, 15, 14, 'ligas/uruguay/equipos/danubio/', NULL, 'cuadrada', 'rayada', 5, 8, 60, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(94, 4, 'uruguay', 'liverpool', 2, 14, 15, 32, 15, 'ligas/uruguay/equipos/liverpool/', NULL, 'mediana', 'cuadriculada', 6, 8, 56, 'libertadores', 6, NULL, '2024-10-23 14:27:28'),
(95, 4, 'uruguay', 'river montevideo', 15, 1, 1, 24, 14, 'ligas/uruguay/equipos/river_montevideo/', NULL, 'grande', 'cuadriculada', 7, 7, 62, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(96, 4, 'uruguay', 'fenix', 15, 12, 4, 28, 32, 'ligas/uruguay/equipos/fenix/', NULL, 'chica', 'romboide', 8, 7, 56, 'libertadores', 7, NULL, '2024-10-23 14:27:28'),
(97, 4, 'uruguay', 'central español', 1, 2, 15, 1, 15, 'ligas/uruguay/equipos/central_español/', NULL, 'grande', 'cuadriculada', 9, 6, 54, 'sudamericana', 9, NULL, '2024-10-23 14:27:28'),
(98, 4, 'uruguay', 'cerro largo', 2, 15, 15, 28, 15, 'ligas/uruguay/equipos/cerro_largo/', NULL, 'chica', 'lisa', 10, 6, 58, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(99, 4, 'uruguay', 'atenas', 10, 1, 15, 10, 15, 'ligas/uruguay/equipos/atenas/', NULL, 'chica', 'cuadriculada', 11, 5, 57, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(100, 4, 'uruguay', 'racing montevideo', 15, 3, 14, 36, 15, 'ligas/uruguay/equipos/racing_montevideo/', NULL, 'chica', 'rayada', 12, 5, 54, 'sudamericana', 10, NULL, '2024-10-23 14:27:28'),
(101, 4, 'uruguay', 'cerro', 15, 6, 6, 29, 14, 'ligas/uruguay/equipos/cerro/', NULL, 'grande', 'lisa', 13, 4, 50, NULL, 100, NULL, '2024-10-23 14:27:28'),
(102, 4, 'uruguay', 'tacuarembo', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/tacuarembo/', NULL, 'cuadrada', 'rayada', 14, 4, 48, NULL, 100, NULL, '2024-10-23 14:27:28'),
(103, 4, 'uruguay', 'rentistas', 1, 15, 15, 1, 15, 'ligas/uruguay/equipos/rentistas/', NULL, 'chica', 'rayada', 15, 3, 51, NULL, 100, NULL, '2024-10-23 14:27:28'),
(104, 4, 'uruguay', 'bella vista', 15, 4, 2, 8, 2, 'ligas/uruguay/equipos/bella_vista/', NULL, 'chica', 'cuadriculada', 16, 3, 44, NULL, 100, NULL, '2024-10-23 14:27:28'),
(105, 4, 'uruguay', 'rocha', 6, 14, 4, 6, 15, 'ligas/uruguay/equipos/rocha/', NULL, 'chica', 'romboide', 17, 2, 28, NULL, 100, NULL, '2024-10-23 14:27:27'),
(106, 4, 'uruguay', 'el tanque sisley', 3, 14, 15, 37, 15, 'ligas/uruguay/equipos/el_tanque_sisley/', NULL, 'chica', 'lisa', 18, 2, 55, 'sudamericana', 8, NULL, '2024-10-23 14:27:28'),
(107, 4, 'uruguay', 'deportivo colonia', 1, 15, 10, 1, 15, 'ligas/uruguay/equipos/deportivo_colonia/', NULL, 'chica', 'circular', 19, 1, 31, NULL, 100, NULL, '2024-10-23 14:27:27'),
(108, 4, 'uruguay', 'cerrito', 4, 3, 3, 4, 3, 'ligas/uruguay/equipos/cerrito/', NULL, 'chica', 'lisa', 20, 1, 38, NULL, 100, NULL, '2024-10-23 14:27:27'),
(109, 5, 'paraguay', 'olimpia', 15, 14, 14, 15, 14, 'ligas/paraguay/equipos/olimpia/', NULL, 'mediana', 'cuadriculada', 1, 10, 58, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(110, 5, 'paraguay', 'cerro porteño', 10, 1, 15, 23, 15, 'ligas/paraguay/equipos/cerro_porteño/', NULL, 'grande', 'romboide', 2, 9, 58, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(111, 5, 'paraguay', 'club nacional', 15, 1, 2, 15, 1, 'ligas/paraguay/equipos/club_nacional/', NULL, 'mediana', 'cuadriculada', 3, 8, 60, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(112, 5, 'paraguay', 'libertad', 15, 14, 14, 33, 1, 'ligas/paraguay/equipos/libertad/', NULL, 'chica', 'rayada', 4, 7, 52, NULL, 6, NULL, '2024-10-23 14:27:27'),
(113, 5, 'paraguay', 'guarani', 4, 14, 14, 31, 15, 'ligas/paraguay/equipos/guarani/', NULL, 'mediana', 'cuadriculada', 5, 6, 53, 'sudamericana', 7, NULL, '2024-10-23 14:27:28'),
(114, 5, 'paraguay', 'sportivo luqueño', 2, 4, 4, 27, 15, 'ligas/paraguay/equipos/sportivo_luqueño/', NULL, 'mediana', 'romboide', 6, 6, 55, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(115, 5, 'paraguay', 'tacuari', 14, 15, 15, 33, 15, 'ligas/paraguay/equipos/tacuari/', NULL, 'chica', 'rayada', 7, 5, 49, NULL, 100, NULL, '2024-10-23 14:27:28'),
(116, 5, 'paraguay', 'sol de america', 2, 15, 15, 2, 15, 'ligas/paraguay/equipos/sol_de_america/', NULL, 'chica', 'circular', 8, 5, 55, 'libertadores', 6, NULL, '2024-10-23 14:27:28'),
(117, 5, 'paraguay', 'deportivo capiata', 4, 2, 15, 27, 15, 'ligas/paraguay/equipos/deportivo_capiata/', NULL, 'chica', 'circular', 9, 4, 46, NULL, 100, NULL, '2024-10-23 14:27:28'),
(118, 5, 'paraguay', 'sportivo carapegüa', 1, 15, 15, 24, 15, 'ligas/paraguay/equipos/sportivo_carapegüa/', NULL, 'mediana', 'cuadriculada', 10, 4, 56, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(119, 5, 'paraguay', 'sportivo san lorenzo', 15, 1, 2, 15, 2, 'ligas/paraguay/equipos/sportivo_san_lorenzo/', NULL, 'mediana', 'lisa', 11, 3, 46, NULL, 100, NULL, '2024-10-23 14:27:28'),
(120, 5, 'paraguay', 'rubio ñu', 15, 3, 3, 36, 3, 'ligas/paraguay/equipos/rubio_ñu/', NULL, 'chica', 'romboide', 12, 3, 52, 'sudamericana', 8, NULL, '2024-10-23 14:27:28'),
(121, 5, 'paraguay', '12 de octubre', 15, 2, 2, 28, 15, 'ligas/paraguay/equipos/12_de_octubre/', NULL, 'chica', 'cuadriculada', 13, 2, 43, NULL, 100, NULL, '2024-10-23 14:27:28'),
(122, 5, 'paraguay', '3 de febrero', 1, 15, 15, 1, 15, 'ligas/paraguay/equipos/3_de_febrero/', NULL, 'chica', 'lisa', 14, 2, 50, 'sudamericana', 9, NULL, '2024-10-23 14:27:28'),
(123, 5, 'paraguay', 'trinidense', 2, 4, 4, 2, 4, 'ligas/paraguay/equipos/trinidense/', NULL, 'chica', 'romboide', 15, 1, 32, NULL, 100, NULL, '2024-10-23 14:27:28'),
(124, 5, 'paraguay', 'cerro cora', 1, 14, 14, 34, 15, 'ligas/paraguay/equipos/cerro_cora/', NULL, 'chica', 'lisa', 16, 1, 35, NULL, 100, NULL, '2024-10-23 14:27:28'),
(125, 6, 'chile', 'colo colo', 15, 14, 14, 15, 14, 'ligas/chile/equipos/colo_colo/', NULL, 'mediana', 'circular', 1, 10, 53, 'sudamericana', 7, NULL, '2024-10-23 14:27:28'),
(126, 6, 'chile', 'universidad de chile', 2, 15, 1, 2, 15, 'ligas/chile/equipos/universidad_de_chile/', NULL, 'grande', 'cuadriculada', 2, 9, 58, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(127, 6, 'chile', 'universidad catolica', 15, 2, 1, 15, 1, 'ligas/chile/equipos/universidad_catolica/', NULL, 'chica', 'romboide', 3, 8, 56, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(128, 6, 'chile', 'cobreloa', 5, 14, 15, 5, 15, 'ligas/chile/equipos/cobreloa/', NULL, 'cuadrada', 'rayada', 4, 7, 56, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(129, 6, 'chile', 'union española', 1, 4, 10, 1, 4, 'ligas/chile/equipos/union_española/', NULL, 'cuadrada', 'cuadriculada', 5, 6, 50, NULL, 100, NULL, '2024-10-23 14:27:28'),
(130, 6, 'chile', 'deportes concepcion', 12, 15, 4, 12, 15, 'ligas/chile/equipos/deportes_concepcion/', NULL, 'grande', 'rayada', 6, 6, 54, 'libertadores', 6, NULL, '2024-10-23 14:27:28'),
(131, 6, 'chile', 'cobresal', 15, 5, 3, 15, 5, 'ligas/chile/equipos/cobresal/', NULL, 'grande', 'rayada', 7, 5, 57, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(132, 6, 'chile', 'huachipato', 2, 14, 14, 32, 15, 'ligas/chile/equipos/huachipato/', NULL, 'cuadrada', 'rayada', 8, 5, 42, NULL, 100, NULL, '2024-10-23 14:27:28'),
(133, 6, 'chile', 'palestino', 15, 3, 1, 15, 37, 'ligas/chile/equipos/palestino/', NULL, 'grande', 'romboide', 9, 4, 52, 'sudamericana', 8, NULL, '2024-10-23 14:27:28'),
(134, 6, 'chile', 'deportes iquique', 6, 14, 14, 6, 14, 'ligas/chile/equipos/deportes_iquique/', NULL, 'grande', 'romboide', 10, 4, 58, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(135, 6, 'chile', 'coquimbo unido', 4, 14, 14, 4, 14, 'ligas/chile/equipos/coquimbo_unido/', NULL, 'grande', 'circular', 11, 3, 51, 'sudamericana', 9, NULL, '2024-10-23 14:27:28'),
(136, 6, 'chile', 'everton', 10, 4, 4, 10, 4, 'ligas/chile/equipos/everton/', NULL, 'grande', 'lisa', 12, 3, 47, NULL, 100, NULL, '2024-10-23 14:27:28'),
(137, 6, 'chile', 'deportes antofagasta', 15, 2, 1, 15, 2, 'ligas/chile/equipos/deportes_antofagasta/', NULL, 'grande', 'rayada', 13, 2, 45, NULL, 100, NULL, '2024-10-23 14:27:28'),
(138, 6, 'chile', 'audax italiano', 3, 15, 15, 3, 15, 'ligas/chile/equipos/audax_italiano/', NULL, 'cuadrada', 'rayada', 14, 2, 41, NULL, 100, NULL, '2024-10-23 14:27:28'),
(139, 6, 'chile', 'santiago wanderers', 3, 15, 15, 3, 15, 'ligas/chile/equipos/santiago_wanderers/', NULL, 'grande', 'romboide', 15, 1, 32, NULL, 100, NULL, '2024-10-23 14:27:28'),
(140, 6, 'chile', 'ohiggins', 6, 14, 4, 6, 4, 'ligas/chile/equipos/ohiggins/', NULL, 'grande', 'lisa', 16, 1, 34, NULL, 100, NULL, '2024-10-23 14:27:28'),
(141, 7, 'ecuador', 'barcelona', 4, 1, 14, 4, 1, 'ligas/ecuador/equipos/barcelona/', NULL, 'mediana', 'rayada', 1, 10, 46, 'sudamericana', 8, NULL, '2024-10-23 14:27:28'),
(142, 7, 'ecuador', 'el nacional', 1, 2, 15, 1, 15, 'ligas/ecuador/equipos/el_nacional/', NULL, 'grande', 'circular', 2, 9, 58, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(143, 7, 'ecuador', 'liga deportiva', 15, 10, 1, 15, 10, 'ligas/ecuador/equipos/liga_deportiva/', NULL, 'mediana', 'cuadriculada', 3, 8, 58, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(144, 7, 'ecuador', 'emelec', 2, 15, 6, 2, 15, 'ligas/ecuador/equipos/emelec/', NULL, 'cuadrada', 'rayada', 4, 7, 60, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(145, 7, 'ecuador', 'deportivo quito', 2, 1, 15, 23, 15, 'ligas/ecuador/equipos/deportivo_quito/', NULL, 'grande', 'circular', 5, 6, 57, NULL, 5, NULL, '2024-10-23 14:27:28'),
(146, 7, 'ecuador', 'liga de loja', 15, 1, 3, 15, 1, 'ligas/ecuador/equipos/liga_de_loja/', NULL, 'grande', 'circular', 6, 5, 55, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(147, 7, 'ecuador', 'deportivo cuenca', 1, 14, 14, 1, 15, 'ligas/ecuador/equipos/deportivo_cuenca/', NULL, 'mediana', 'romboide', 7, 4, 54, 'sudamericana', 6, NULL, '2024-10-23 14:27:28'),
(148, 7, 'ecuador', 'independiente del valle', 2, 14, 4, 32, 15, 'ligas/ecuador/equipos/independiente_del_valle/', NULL, 'chica', 'lisa', 8, 4, 48, 'sudamericana', 7, NULL, '2024-10-23 14:27:28'),
(149, 7, 'ecuador', 'deportivo olmedo', 10, 15, 1, 10, 4, 'ligas/ecuador/equipos/deportivo_olmedo/', NULL, 'chica', 'circular', 9, 3, 40, NULL, 100, NULL, '2023-10-08 00:01:50'),
(150, 7, 'ecuador', 'manta fc', 6, 10, 10, 6, 15, 'ligas/ecuador/equipos/manta_fc/', NULL, 'cuadrada', 'rayada', 10, 3, 55, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(151, 7, 'ecuador', 'macara', 6, 15, 10, 6, 15, 'ligas/ecuador/equipos/macara/', NULL, 'chica', 'romboide', 11, 2, 44, NULL, 100, NULL, '2024-10-23 14:27:28'),
(152, 7, 'ecuador', 'deportivo azogues', 3, 15, 1, 3, 15, 'ligas/ecuador/equipos/deportivo_azogues/', NULL, 'chica', 'cuadriculada', 12, 2, 40, NULL, 100, NULL, '2024-10-23 14:27:28'),
(153, 7, 'ecuador', 'tecnico universitario', 1, 15, 15, 24, 27, 'ligas/ecuador/equipos/tecnico_universitario/', NULL, 'chica', 'cuadriculada', 13, 1, 16, NULL, 100, NULL, '2024-10-23 14:27:28'),
(154, 7, 'ecuador', 'aucas', 4, 1, 1, 4, 16, 'ligas/ecuador/equipos/aucas/', NULL, 'chica', 'lisa', 14, 1, 26, NULL, 100, NULL, '2024-10-23 14:27:28'),
(155, 8, 'bolivia', 'bolivar', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/bolivar/', NULL, 'grande', 'rayada', 1, 10, 52, 'sudamericana', 8, NULL, '2024-10-23 14:27:28'),
(156, 8, 'bolivia', 'oriente petrolero', 3, 15, 15, 3, 15, 'ligas/bolivia/equipos/oriente_petrolero/', NULL, 'grande', 'cuadriculada', 2, 9, 62, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(157, 8, 'bolivia', 'blooming', 6, 15, 2, 6, 15, 'ligas/bolivia/equipos/blooming/', NULL, 'grande', 'romboide', 3, 8, 60, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(158, 8, 'bolivia', 'the stronguest', 4, 14, 14, 31, 15, 'ligas/bolivia/equipos/the_stronguest/', NULL, 'grande', 'rayada', 4, 7, 54, 'sudamericana', 7, NULL, '2024-10-23 14:27:28'),
(159, 8, 'bolivia', 'real potosi', 12, 15, 15, 12, 15, 'ligas/bolivia/equipos/real_potosi/', NULL, 'grande', 'circular', 5, 6, 64, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(160, 8, 'bolivia', 'la paz fc', 2, 1, 15, 23, 15, 'ligas/bolivia/equipos/la_paz_fc/', NULL, 'grande', 'rayada', 6, 5, 62, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(161, 8, 'bolivia', 'jorge wilsterman', 1, 15, 10, 1, 15, 'ligas/bolivia/equipos/jorge_wilsterman/', NULL, 'grande', 'cuadriculada', 7, 4, 49, NULL, 100, NULL, '2024-10-23 14:27:28'),
(162, 8, 'bolivia', 'san jose', 15, 2, 2, 15, 2, 'ligas/bolivia/equipos/san_jose/', NULL, 'grande', 'cuadriculada', 8, 3, 60, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(163, 8, 'bolivia', 'universitario sucre', 2, 1, 15, 2, 15, 'ligas/bolivia/equipos/universitario_sucre/', NULL, 'grande', 'lisa', 9, 2, 58, 'sudamericana', 6, NULL, '2024-10-23 14:27:28'),
(164, 8, 'bolivia', 'aurora', 6, 15, 15, 6, 15, 'ligas/bolivia/equipos/aurora/', NULL, 'grande', 'cuadriculada', 10, 2, 49, NULL, 100, NULL, '2024-10-23 14:27:28'),
(165, 8, 'bolivia', 'guabira', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/guabira/', NULL, 'chica', 'lisa', 11, 1, 21, NULL, 100, NULL, '2024-10-23 14:27:28'),
(166, 8, 'bolivia', 'santa cruz', 1, 15, 15, 1, 15, 'ligas/bolivia/equipos/santa_cruz/', NULL, 'chica', 'romboide', 12, 1, 26, NULL, 100, NULL, '2024-10-23 14:27:28'),
(167, 9, 'peru', 'sporting cristal', 6, 15, 4, 6, 15, 'ligas/peru/equipos/sporting_cristal/', NULL, 'mediana', 'rayada', 1, 10, 58, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(168, 9, 'peru', 'alianza lima', 10, 15, 15, 28, 15, 'ligas/peru/equipos/alianza_lima/', NULL, 'mediana', 'cuadriculada', 2, 9, 54, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(169, 9, 'peru', 'universitario', 8, 1, 14, 8, 1, 'ligas/peru/equipos/universitario/', NULL, 'mediana', 'circular', 3, 8, 52, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(170, 9, 'peru', 'cienciano', 1, 15, 15, 1, 15, 'ligas/peru/equipos/cienciano/', NULL, 'mediana', 'romboide', 4, 7, 59, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(171, 9, 'peru', 'juan aurich', 1, 15, 15, 1, 15, 'ligas/peru/equipos/juan_aurich/', NULL, 'grande', 'lisa', 5, 6, 51, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(172, 9, 'peru', 'cesar vallejo', 10, 6, 15, 2, 5, 'ligas/peru/equipos/cesar_vallejo/', NULL, 'mediana', 'circular', 6, 5, 48, 'sudamericana', 6, NULL, '2024-10-23 14:27:28'),
(173, 9, 'peru', 'sport huancayo', 1, 4, 3, 1, 3, 'ligas/peru/equipos/sport_huancayo/', NULL, 'grande', 'romboide', 7, 4, 45, 'sudamericana', 7, NULL, '2024-10-23 14:27:28'),
(174, 9, 'peru', 'real garcilaso', 6, 15, 15, 6, 15, 'ligas/peru/equipos/real_garcilaso/', NULL, 'grande', 'cuadriculada', 8, 3, 44, NULL, 100, NULL, '2024-10-23 14:27:28'),
(175, 9, 'peru', 'alianza atletico', 15, 2, 2, 15, 2, 'ligas/peru/equipos/alianza_atletico/', NULL, 'grande', 'romboide', 9, 2, 41, NULL, 100, NULL, '2024-10-23 14:27:28'),
(176, 9, 'peru', 'sport boys', 9, 14, 14, 9, 14, 'ligas/peru/equipos/sport_boys/', NULL, 'grande', 'romboide', 10, 2, 34, NULL, 100, NULL, '2024-10-23 14:27:28'),
(177, 9, 'peru', 'fc melgar', 14, 1, 1, 34, 15, 'ligas/peru/equipos/fc_melgar/', NULL, 'chica', 'lisa', 11, 1, 31, NULL, 100, NULL, '2024-10-23 14:27:28'),
(178, 9, 'peru', 'sport ancash', 3, 4, 4, 3, 4, 'ligas/peru/equipos/sport_ancash/', NULL, 'cuadrada', 'cuadriculada', 12, 1, 28, NULL, 100, NULL, '2024-10-23 14:27:28'),
(179, 10, 'venezuela', 'caracas fc', 1, 15, 14, 1, 15, 'ligas/venezuela/equipos/caracas_fc/', NULL, 'grande', 'lisa', 1, 10, 56, 'libertadores', 5, NULL, '2024-10-23 14:27:28'),
(180, 10, 'venezuela', 'minerven', 10, 15, 15, 10, 15, 'ligas/venezuela/equipos/minerven/', NULL, 'grande', 'cuadriculada', 2, 9, 60, 'libertadores', 2, NULL, '2024-10-23 14:27:28'),
(181, 10, 'venezuela', 'deportivo tachira', 4, 14, 15, 31, 15, 'ligas/venezuela/equipos/deportivo_tachira/', NULL, 'grande', 'romboide', 3, 8, 66, 'libertadores', 1, NULL, '2024-10-23 14:27:28'),
(182, 10, 'venezuela', 'atletico maracaibo', 2, 1, 1, 23, 15, 'ligas/venezuela/equipos/atletico_maracaibo/', NULL, 'grande', 'cuadriculada', 4, 7, 52, 'sudamericana', 6, NULL, '2024-10-23 14:27:28'),
(183, 10, 'venezuela', 'estudiantes merida', 1, 15, 2, 24, 36, 'ligas/venezuela/equipos/estudiantes_merida/', NULL, 'grande', 'circular', 5, 6, 58, 'libertadores', 4, NULL, '2024-10-23 14:27:28'),
(184, 10, 'venezuela', 'deportivo anzoategui', 1, 4, 4, 26, 15, 'ligas/venezuela/equipos/deportivo_anzoategui/', NULL, 'grande', 'cuadriculada', 6, 5, 59, 'libertadores', 3, NULL, '2024-10-23 14:27:28'),
(185, 10, 'venezuela', 'zamora fc', 15, 14, 14, 33, 15, 'ligas/venezuela/equipos/zamora_fc/', NULL, 'mediana', 'lisa', 7, 4, 41, NULL, 100, NULL, '2024-10-23 14:27:28'),
(186, 10, 'venezuela', 'carabobo fc', 20, 4, 2, 20, 15, 'ligas/venezuela/equipos/carabobo_fc/', NULL, 'mediana', 'cuadriculada', 8, 3, 39, NULL, 100, NULL, '2024-10-23 14:27:28'),
(187, 10, 'venezuela', 'trujillanos', 4, 13, 13, 30, 15, 'ligas/venezuela/equipos/trujillanos/', NULL, 'grande', 'lisa', 9, 2, 35, NULL, 100, NULL, '2024-10-23 14:27:28'),
(188, 10, 'venezuela', 'pepeganga', 12, 15, 15, 12, 15, 'ligas/venezuela/equipos/pepeganga/', NULL, 'mediana', 'circular', 10, 2, 45, 'sudamericana', 7, NULL, '2024-10-23 14:27:28'),
(189, 10, 'venezuela', 'mineros de guayana', 2, 14, 14, 32, 15, 'ligas/venezuela/equipos/mineros_de_guayana/', NULL, 'grande', 'cuadriculada', 11, 1, 41, NULL, 100, NULL, '2024-10-23 14:27:28'),
(190, 10, 'venezuela', 'portuguesa fc', 1, 14, 14, 34, 15, 'ligas/venezuela/equipos/portuguesa_fc/', NULL, 'chica', 'romboide', 12, 1, 22, NULL, 100, NULL, '2024-10-23 14:27:28');

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

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ligas_a_foreign` (`a`),
  ADD KEY `ligas_b_foreign` (`b`),
  ADD KEY `ligas_c_foreign` (`c`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
