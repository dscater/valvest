-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-09-2023 a las 18:50:36
-- Versión del servidor: 8.0.30
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `valvest_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accionistas`
--

CREATE TABLE `accionistas` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accionistas`
--

INSERT INTO `accionistas` (`id`, `empresa_id`, `nombre`, `porcentaje`, `created_at`, `updated_at`) VALUES
(3, 3, 'ACCIONISTA #1', 20.00, '2023-08-27 00:00:28', '2023-08-27 00:19:56'),
(5, 5, 'ACCIONISTA#1', 40.00, '2023-08-27 00:09:48', '2023-08-27 00:09:48'),
(6, 5, 'ACCIONSTA2', 40.00, '2023-08-27 00:21:13', '2023-08-27 00:21:13'),
(7, 6, 'ACCIONISTA 1 EMP.3', 100.00, '2023-08-28 20:35:11', '2023-08-28 20:35:11'),
(8, 7, 'ACCIONISTA 1', 50.00, '2023-08-28 20:35:44', '2023-08-28 20:35:44'),
(9, 7, 'ACCIONISTA 2', 50.00, '2023-08-28 20:35:44', '2023-08-28 20:35:44'),
(10, 8, 'ACCIONISTA #1', 30.00, '2023-08-29 14:09:56', '2023-08-29 14:09:56'),
(11, 8, 'ACCIONIOSTA # 2', 30.00, '2023-08-29 14:09:56', '2023-08-29 14:09:56'),
(12, 8, 'ACCIONISTA#3', 30.00, '2023-08-29 14:09:56', '2023-08-29 14:09:56'),
(15, 10, 'JORGE CASTRO', 50.00, '2023-09-09 18:03:47', '2023-09-09 18:03:47'),
(16, 10, 'FERNANDO CONDORI', 50.00, '2023-09-09 18:03:47', '2023-09-09 18:03:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competidores`
--

CREATE TABLE `competidores` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `competidores`
--

INSERT INTO `competidores` (`id`, `empresa_id`, `nombre`, `web`, `created_at`, `updated_at`) VALUES
(1, 3, 'COMPETIDOR 1', 'URL_COMP1', '2023-08-27 00:00:28', '2023-08-27 00:19:56'),
(3, 5, 'COMPETIDOR', 'URL', '2023-08-27 00:09:48', '2023-08-27 00:09:48'),
(4, 5, 'COMPETIDOR2', 'URL2', '2023-08-27 00:21:25', '2023-08-27 00:21:25'),
(5, 6, 'COMPEDITOR 1', 'URL', '2023-08-28 20:35:11', '2023-08-28 20:35:11'),
(6, 7, 'COMPETIDOR1', 'URL1', '2023-08-28 20:35:44', '2023-08-28 20:35:44'),
(7, 8, 'COMPETIDOR #1', 'URL COMP1', '2023-08-29 14:09:56', '2023-08-29 14:09:56'),
(8, 8, 'COMPETIDOR#2', 'URL COMP2', '2023-08-29 14:09:56', '2023-08-29 14:09:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_sistema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `nombre_sistema`, `alias`, `ciudad`, `dir`, `fono`, `web`, `correo`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'VALVEST', 'VALVEST', 'LA PAZ', 'LA PAZ', '222222', '', '', 'logo.png', NULL, '2023-07-29 15:57:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `cuestionario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`id`, `empresa_id`, `cuestionario`, `created_at`, `updated_at`) VALUES
(2, 3, '3|1700000|1|1|1|7|1|2|1|1|1|1|3|1|1|2|1|1|Belarus|9;0|1|1|30000|50|1|1|0|1|1|1|1|1|1|2013|1||0|1|1|1|1|1', '2023-08-28 20:16:24', '2023-09-07 15:51:21'),
(3, 8, '2|300000|1|2|1|30|1|4|1|1|1|0|5|0|1|6|1|0|Bolivia|9;1|2|2|450000|10000|2|2|0|0|0|0|0|0|0|2010|0|2014|0|0|0|0|0|0', '2023-08-29 14:11:28', '2023-08-29 14:11:28'),
(6, 10, '2|100000|2|2|1|15|2|2|2|1|0|0|4|0|2||0|2|Bolivia|17;4|2|2|100000|40|0|2|1|1|0|0|0|0|0|21010|1||0|0|0|0|0|0', '2023-09-09 18:05:53', '2023-09-09 18:05:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_actividad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `descripcion_actividad`, `web`, `correo`, `dir`, `fecha_registro`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'EMPRESA #1', 'DESC. EMPRESA#1', '', 'EMPRESA1@GMAIL.COM', 'LOS OLIVOS', '2023-08-26', 1, '2023-08-27 00:00:28', '2023-08-27 00:00:28'),
(5, 'EMPRESA #2', 'ACT. EMPRESA #2', 'WEB EMPRESA 2', 'EMPRESA2@GMAIL.COM', 'LOS OLIVOS', '2023-08-26', 1, '2023-08-27 00:09:48', '2023-08-27 00:09:48'),
(6, 'EMPRESA #3', 'ACTIVIDAD EMP. 3', '', 'EMPRESA3@GMAIL.COM', 'LOS OLIVOS', '2023-08-28', 1, '2023-08-28 20:35:11', '2023-08-28 20:35:11'),
(7, 'EMPRESA #4', 'DESC. ACT. #4', '', 'EMPRESA4@GMAIL.COM', 'LOS OLIVOS', '2023-08-28', 1, '2023-08-28 20:35:44', '2023-08-28 20:35:44'),
(8, 'EMPRESA #5', 'ACTIVIDAD EMP. 5', '', 'EMPRESA5@GMAIL.COM', 'LOS OLIVOS', '2023-08-29', 1, '2023-08-29 14:09:56', '2023-08-29 14:09:56'),
(10, 'CASTRO S.A', 'ACTIVIDAD CASTRO S.A.', '', 'CASTROSA@GMAIL.COM', 'LOS OLIVSO', '2023-09-09', 7, '2023-09-09 18:03:47', '2023-09-09 18:03:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finanzas`
--

CREATE TABLE `finanzas` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `gestion` int NOT NULL,
  `ganancia` decimal(24,2) DEFAULT NULL,
  `costo_bienes_vendidos` decimal(24,2) DEFAULT NULL,
  `salarios` decimal(24,2) DEFAULT NULL,
  `otros_gastos_operativos` decimal(24,2) DEFAULT NULL,
  `ebitda` decimal(24,2) DEFAULT NULL,
  `da` decimal(24,2) DEFAULT NULL,
  `ebit` decimal(24,2) DEFAULT NULL,
  `interes` decimal(24,2) DEFAULT NULL,
  `impuestos` decimal(24,2) DEFAULT NULL,
  `beneficio_neto` decimal(24,2) DEFAULT NULL,
  `cuentas_cobrar` decimal(24,2) DEFAULT NULL,
  `inventario` decimal(24,2) DEFAULT NULL,
  `cuentas_pagar` decimal(24,2) DEFAULT NULL,
  `capital_trabajo` decimal(24,2) DEFAULT NULL,
  `cambio_capital_trabajo` decimal(24,2) DEFAULT NULL,
  `gastos_capital` decimal(24,2) DEFAULT NULL,
  `deuda_final_anio` decimal(24,2) DEFAULT NULL,
  `cambio_deuda_pendiente` decimal(24,2) DEFAULT NULL,
  `flujo_caja_libre_capital` decimal(24,2) DEFAULT NULL,
  `recaudacion_fondos_futura` decimal(24,2) DEFAULT NULL,
  `flujo_caja_libre` decimal(24,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `finanzas`
--

INSERT INTO `finanzas` (`id`, `empresa_id`, `gestion`, `ganancia`, `costo_bienes_vendidos`, `salarios`, `otros_gastos_operativos`, `ebitda`, `da`, `ebit`, `interes`, `impuestos`, `beneficio_neto`, `cuentas_cobrar`, `inventario`, `cuentas_pagar`, `capital_trabajo`, `cambio_capital_trabajo`, `gastos_capital`, `deuda_final_anio`, `cambio_deuda_pendiente`, `flujo_caja_libre_capital`, `recaudacion_fondos_futura`, `flujo_caja_libre`, `created_at`, `updated_at`) VALUES
(1, 3, 2022, 91710.00, 83485.00, NULL, 7782.00, 443.00, NULL, 443.00, NULL, 109.00, 334.00, 63826.00, 7184.00, 61627.00, 9383.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-04 15:57:43', '2023-09-07 16:50:39'),
(2, 3, 2023, 6296429.00, 5963773.00, 173138.00, 259203.00, -99685.00, NULL, -99685.00, NULL, NULL, -99685.00, 4381991.00, 7184.00, 4395219.00, -6044.00, -15427.00, 66310.00, NULL, 0.00, -150568.00, 200000.00, 49432.00, '2023-09-04 16:19:44', '2023-09-07 16:42:26'),
(3, 3, 2024, 20702058.00, 19645603.00, 202866.00, 782060.00, 71529.00, NULL, 71529.00, NULL, NULL, 71529.00, 14407569.00, 7184.00, 14478540.00, -63787.00, -57743.00, 13000.00, NULL, 0.00, 116272.00, NULL, 116272.00, '2023-09-04 17:29:14', '2023-09-07 15:45:12'),
(7, 10, 2022, 100000.00, 10000.00, 12000.00, 0.00, 78000.00, 0.00, 78000.00, 0.00, 1000.00, 77000.00, 5000.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 77000.00, 0.00, 77000.00, '2023-09-09 18:08:11', '2023-09-09 18:08:11'),
(8, 10, 2023, 100000.00, 10000.00, 12000.00, 0.00, 78000.00, 0.00, 78000.00, 0.00, 1000.00, 77000.00, 5000.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 77000.00, 100000.00, 177000.00, '2023-09-09 18:08:18', '2023-09-09 18:08:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondos`
--

CREATE TABLE `fondos` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `producto` decimal(24,2) NOT NULL,
  `p_producto` double(8,2) NOT NULL,
  `venta_marketing` decimal(24,2) NOT NULL,
  `p_venta_marketing` double(8,2) NOT NULL,
  `inventario` decimal(24,2) NOT NULL,
  `p_inventario` double(8,2) NOT NULL,
  `operacion` decimal(24,2) NOT NULL,
  `p_operacion` double(8,2) NOT NULL,
  `gastos` decimal(24,2) NOT NULL,
  `p_gastos` double(8,2) NOT NULL,
  `otros` decimal(24,2) NOT NULL,
  `p_otros` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fondos`
--

INSERT INTO `fondos` (`id`, `empresa_id`, `producto`, `p_producto`, `venta_marketing`, `p_venta_marketing`, `inventario`, `p_inventario`, `operacion`, `p_operacion`, `gastos`, `p_gastos`, `otros`, `p_otros`, `created_at`, `updated_at`) VALUES
(2, 3, 10000.00, 40.00, 5000.00, 30.00, 2500.00, 20.00, 0.00, 0.00, 0.00, 0.00, 1500.00, 10.00, '2023-08-30 15:45:39', '2023-08-30 15:47:29'),
(4, 10, 200000.00, 50.00, 20000.00, 15.00, 20000.00, 15.00, 10000.00, 10.00, 10000.00, 10.00, 0.00, 0.00, '2023-09-09 18:06:24', '2023-09-09 18:06:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_accions`
--

CREATE TABLE `historial_accions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `accion` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `datos_original` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `datos_nuevo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `modulo` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_accions`
--

INSERT INTO `historial_accions` (`id`, `user_id`, `accion`, `descripcion`, `datos_original`, `datos_nuevo`, `modulo`, `fecha`, `hora`, `created_at`, `updated_at`) VALUES
(1, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UNA EMPRESA', 'id: 3<br/>nombre: EMPRESA #1<br/>descripcion_actividad: DESC. EMPRESA#1<br/>web: <br/>correo: EMPRESA1@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:00:28<br/>updated_at: 2023-08-26 20:00:28<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:00:28', '2023-08-27 00:00:28', '2023-08-27 00:00:28'),
(2, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UNA EMPRESA', 'id: 5<br/>nombre: EMPRESA #2<br/>descripcion_actividad: ACT. EMPRESA #2<br/>web: WEB EMPRESA 2<br/>correo: EMPRESA2@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:09:48<br/>updated_at: 2023-08-26 20:09:48<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:09:48', '2023-08-27 00:09:48', '2023-08-27 00:09:48'),
(3, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com MODIFICÓ UNA EMPRESA', 'id: 3<br/>nombre: EMPRESA #1<br/>descripcion_actividad: DESC. EMPRESA#1<br/>web: <br/>correo: EMPRESA1@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:00:28<br/>updated_at: 2023-08-26 20:00:28<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:19:56', '2023-08-27 00:19:56', '2023-08-27 00:19:56'),
(4, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com MODIFICÓ UNA EMPRESA', 'id: 3<br/>nombre: EMPRESA #1<br/>descripcion_actividad: DESC. EMPRESA#1<br/>web: <br/>correo: EMPRESA1@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:00:28<br/>updated_at: 2023-08-26 20:00:28<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:20:08', '2023-08-27 00:20:08', '2023-08-27 00:20:08'),
(5, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com MODIFICÓ UNA EMPRESA', 'id: 3<br/>nombre: EMPRESA #1<br/>descripcion_actividad: DESC. EMPRESA#1<br/>web: <br/>correo: EMPRESA1@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:00:28<br/>updated_at: 2023-08-26 20:00:28<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:20:46', '2023-08-27 00:20:46', '2023-08-27 00:20:46'),
(6, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com MODIFICÓ UNA EMPRESA', 'id: 3<br/>nombre: EMPRESA #1<br/>descripcion_actividad: DESC. EMPRESA#1<br/>web: <br/>correo: EMPRESA1@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:00:28<br/>updated_at: 2023-08-26 20:00:28<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:20:51', '2023-08-27 00:20:51', '2023-08-27 00:20:51'),
(7, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com MODIFICÓ UNA EMPRESA', 'id: 5<br/>nombre: EMPRESA #2<br/>descripcion_actividad: ACT. EMPRESA #2<br/>web: WEB EMPRESA 2<br/>correo: EMPRESA2@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:09:48<br/>updated_at: 2023-08-26 20:09:48<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:21:13', '2023-08-27 00:21:13', '2023-08-27 00:21:13'),
(8, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com MODIFICÓ UNA EMPRESA', 'id: 5<br/>nombre: EMPRESA #2<br/>descripcion_actividad: ACT. EMPRESA #2<br/>web: WEB EMPRESA 2<br/>correo: EMPRESA2@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:09:48<br/>updated_at: 2023-08-26 20:09:48<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:21:25', '2023-08-27 00:21:25', '2023-08-27 00:21:25'),
(9, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 2|20000|0|0|0|6|0|1|0|0|0|0|0|0|0|2|0|0|Bolivia|1;1|0|0|20000|10000|0|0|0|0|0|0|0|0|0|2012|0|2013|0|0|0|0|0|0<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-08-28 16:16:24<br/>', NULL, 'USUARIOS', '2023-08-28', '16:16:24', '2023-08-28 20:16:24', '2023-08-28 20:16:24'),
(10, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 2|20000|0|0|0|6|0|1|0|0|0|0|0|0|0|2|0|0|Bolivia|1;1|0|0|20000|10000|0|0|0|0|0|0|0|0|0|2012|0|2013|0|0|0|0|0|0<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-08-28 16:28:49<br/>', NULL, 'USUARIOS', '2023-08-28', '16:28:49', '2023-08-28 20:28:49', '2023-08-28 20:28:49'),
(11, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 3|30000|1|1|1|7|1|2|1|1|1|1|1|1|1|2|1|1|Bhutan|2;0|1|1|30000|20000|1|1|1|1|1|1|1|1|1|2013|1|2014|0|1|1|1|1|0<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-08-28 16:30:07<br/>', NULL, 'USUARIOS', '2023-08-28', '16:30:07', '2023-08-28 20:30:07', '2023-08-28 20:30:07'),
(12, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 3|30000|1|1|1|7|1|2|1|1|1|1|1|1|1|2|1|1|Bhutan|2;0|1|1|30000|20000|1|1|1|1|1|1|1|1|1|2013|1||1|1|1|1|1|0<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-08-28 16:31:06<br/>', NULL, 'USUARIOS', '2023-08-28', '16:31:06', '2023-08-28 20:31:06', '2023-08-28 20:31:06'),
(13, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 3|30000|1|1|1|7|1|2|1|1|1|1|1|1|1|2|1|1|Bhutan|2;0|1|1|30000|20000|1|1|1|1|1|1|1|1|1|2013|1||0|1|1|1|1|0<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-08-28 16:31:14<br/>', NULL, 'USUARIOS', '2023-08-28', '16:31:14', '2023-08-28 20:31:14', '2023-08-28 20:31:14'),
(14, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 3|30000|1|1|1|7|1|2|1|1|1|1|1|1|1|2|1|1|Bhutan|2;0|1|1|30000|20000|1|1|1|1|1|1|1|1|1|2013|1||0|1|1|1|1|1<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-08-28 16:32:59<br/>', NULL, 'USUARIOS', '2023-08-28', '16:32:59', '2023-08-28 20:32:59', '2023-08-28 20:32:59'),
(15, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UNA EMPRESA', 'id: 6<br/>nombre: EMPRESA #3<br/>descripcion_actividad: ACTIVIDAD EMP. 3<br/>web: <br/>correo: EMPRESA3@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-28<br/>user_id: 1<br/>created_at: 2023-08-28 16:35:11<br/>updated_at: 2023-08-28 16:35:11<br/>', NULL, 'EMPRESAS', '2023-08-28', '16:35:11', '2023-08-28 20:35:11', '2023-08-28 20:35:11'),
(16, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UNA EMPRESA', 'id: 7<br/>nombre: EMPRESA #4<br/>descripcion_actividad: DESC. ACT. #4<br/>web: <br/>correo: EMPRESA4@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-28<br/>user_id: 1<br/>created_at: 2023-08-28 16:35:44<br/>updated_at: 2023-08-28 16:35:44<br/>', NULL, 'EMPRESAS', '2023-08-28', '16:35:44', '2023-08-28 20:35:44', '2023-08-28 20:35:44'),
(17, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 3|30000|1|1|1|7|1|2|1|1|1|1|1|1|1|2|1|1|Bhutan|2;0|1|1|30000|20000|1|1|0|1|1|1|1|1|1|2013|1||0|1|1|1|1|1<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-08-29 09:50:11<br/>', NULL, 'USUARIOS', '2023-08-29', '09:50:11', '2023-08-29 13:50:11', '2023-08-29 13:50:11'),
(18, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UNA EMPRESA', 'id: 8<br/>nombre: EMPRESA #5<br/>descripcion_actividad: ACTIVIDAD EMP. 5<br/>web: <br/>correo: EMPRESA5@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-29<br/>user_id: 1<br/>created_at: 2023-08-29 10:09:56<br/>updated_at: 2023-08-29 10:09:56<br/>', NULL, 'EMPRESAS', '2023-08-29', '10:09:56', '2023-08-29 14:09:56', '2023-08-29 14:09:56'),
(19, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO EL CUESTIONARIO DE LA EMPRESA EMPRESA #5', 'id: 3<br/>empresa_id: 8<br/>cuestionario: 2|300000|1|2|1|30|1|4|1|1|1|0|5|0|1|6|1|0|Bolivia|9;1|2|2|450000|10000|2|2|0|0|0|0|0|0|0|2010|0|2014|0|0|0|0|0|0<br/>created_at: 2023-08-29 10:11:28<br/>updated_at: 2023-08-29 10:11:28<br/>', NULL, 'CUESTIONARIOS', '2023-08-29', '10:11:28', '2023-08-29 14:11:28', '2023-08-29 14:11:28'),
(20, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com LE ASIGNÓ LA CONFIGURACIÓN DEL SISTEMA AL USUARIO juan@gmail.com', 'id: 2<br/>usuario: juan@gmail.com<br/>nombre: JUAN<br/>paterno: PERES<br/>materno: MAMANI<br/>ci: 1234<br/>ci_exp: LP<br/>dir: LOS OLIVOS<br/>correo: juan@gmail.com<br/>fono: 22222<br/>tipo: ADMINISTRADOR<br/>foto: default.png<br/>password: $2y$10$f4V6/MUpgHV.N0UCfRb6JeuXGLnwVDvDaWAApyVtuo9iiXvE/olj6<br/>acceso: 1<br/>configuracion: 0<br/>fecha_registro: 2023-08-25<br/>created_at: 2023-08-25 12:48:59<br/>updated_at: 2023-08-25 12:56:56<br/>', 'id: 2<br/>usuario: juan@gmail.com<br/>nombre: JUAN<br/>paterno: PERES<br/>materno: MAMANI<br/>ci: 1234<br/>ci_exp: LP<br/>dir: LOS OLIVOS<br/>correo: juan@gmail.com<br/>fono: 22222<br/>tipo: ADMINISTRADOR<br/>foto: default.png<br/>password: $2y$10$f4V6/MUpgHV.N0UCfRb6JeuXGLnwVDvDaWAApyVtuo9iiXvE/olj6<br/>acceso: 1<br/>configuracion: 1<br/>fecha_registro: 2023-08-25<br/>created_at: 2023-08-25 12:48:59<br/>updated_at: 2023-08-30 11:25:48<br/>', 'USUARIOS', '2023-08-30', '11:25:48', '2023-08-30 15:25:48', '2023-08-30 15:25:48'),
(21, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO LOS FONDOS DE LA EMPRESA EMPRESA #1', 'id: 1<br/>empresa_id: 3<br/>producto: 0<br/>p_producto: 0<br/>venta_marketing: 0<br/>p_venta_marketing: 0<br/>inventario: 0<br/>p_inventario: 0<br/>operacion: 0<br/>p_operacion: 0<br/>gastos: 0<br/>p_gastos: 0<br/>otros: 0<br/>p_otros: 100<br/>created_at: 2023-08-30 11:42:12<br/>updated_at: 2023-08-30 11:42:12<br/>', NULL, 'FONDOS', '2023-08-30', '11:42:12', '2023-08-30 15:42:12', '2023-08-30 15:42:12'),
(22, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO LOS FONDOS DE LA EMPRESA EMPRESA #1', 'id: 2<br/>empresa_id: 3<br/>producto: 10000<br/>p_producto: 40<br/>venta_marketing: 5000<br/>p_venta_marketing: 40<br/>inventario: 2500<br/>p_inventario: 20<br/>operacion: 0.00<br/>p_operacion: 0<br/>gastos: 0.00<br/>p_gastos: 0<br/>otros: 0.00<br/>p_otros: 0<br/>created_at: 2023-08-30 11:45:39<br/>updated_at: 2023-08-30 11:45:39<br/>', NULL, 'FONDOS', '2023-08-30', '11:45:39', '2023-08-30 15:45:39', '2023-08-30 15:45:39'),
(23, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com ACTUALIZÓ LOS FONDOS DE LA EMPRESA EMPRESA #1', 'id: 2<br/>empresa_id: 3<br/>producto: 10000.00<br/>p_producto: 40<br/>venta_marketing: 5000.00<br/>p_venta_marketing: 30<br/>inventario: 2500.00<br/>p_inventario: 20<br/>operacion: 0.00<br/>p_operacion: 0<br/>gastos: 0.00<br/>p_gastos: 0<br/>otros: 1500<br/>p_otros: 10<br/>created_at: 2023-08-30 11:45:39<br/>updated_at: 2023-08-30 11:47:29<br/>', NULL, 'FONDOS', '2023-08-30', '11:47:29', '2023-08-30 15:47:29', '2023-08-30 15:47:29'),
(24, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com ACTUALIZÓ LOS FONDOS DE LA EMPRESA EMPRESA #1', 'id: 2<br/>empresa_id: 3<br/>producto: 10000.00<br/>p_producto: 40<br/>venta_marketing: 5000.00<br/>p_venta_marketing: 30<br/>inventario: 2500.00<br/>p_inventario: 20<br/>operacion: 0.00<br/>p_operacion: 0<br/>gastos: 0.00<br/>p_gastos: 0<br/>otros: 1500.00<br/>p_otros: 10<br/>created_at: 2023-08-30 11:45:39<br/>updated_at: 2023-08-30 11:47:29<br/>', NULL, 'FONDOS', '2023-08-30', '11:51:22', '2023-08-30 15:51:22', '2023-08-30 15:51:22'),
(25, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA EMPRESA #1', 'id: 1<br/>empresa_id: 3<br/>gestion: 2023<br/>ganancia: 100000<br/>costo_bienes_vendidos: 1000<br/>salarios: 5000<br/>otros_gastos_operativos: 1500<br/>ebitda: 92500<br/>da: 1300<br/>ebit: 91200<br/>interes: 1200<br/>impuestos: 1500<br/>beneficio_neto: 88500<br/>cuentas_cobrar: 1000<br/>inventario: 1000<br/>cuentas_pagar: 1000<br/>capital_trabajo: 1000<br/>cambio_capital_trabajo: 0<br/>gastos_capital: 1000<br/>deuda_final_anio: 1000<br/>cambio_deuda_pendiente: 0<br/>flujo_caja_libre_capital: 88800<br/>recaudacion_fondos_futura: 100000<br/>flujo_caja_libre: 188800<br/>created_at: 2023-09-04 11:57:43<br/>updated_at: 2023-09-04 11:57:43<br/>', NULL, 'FINANZAS', '2023-09-04', '11:57:43', '2023-09-04 15:57:43', '2023-09-04 15:57:43'),
(26, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA EMPRESA #1', 'id: 2<br/>empresa_id: 3<br/>gestion: 2023<br/>ganancia: 100000<br/>costo_bienes_vendidos: 1000<br/>salarios: 5000<br/>otros_gastos_operativos: 1500<br/>ebitda: 92500<br/>da: 1300<br/>ebit: 91200<br/>interes: 1200<br/>impuestos: 1500<br/>beneficio_neto: 88500<br/>cuentas_cobrar: 1000<br/>inventario: 1000<br/>cuentas_pagar: 1000<br/>capital_trabajo: 1000<br/>cambio_capital_trabajo: 0<br/>gastos_capital: 1000<br/>deuda_final_anio: 1000<br/>cambio_deuda_pendiente: 0<br/>flujo_caja_libre_capital: 88800<br/>recaudacion_fondos_futura: 100000<br/>flujo_caja_libre: 188800<br/>created_at: 2023-09-04 12:19:44<br/>updated_at: 2023-09-04 12:19:44<br/>', NULL, 'FINANZAS', '2023-09-04', '12:19:44', '2023-09-04 16:19:44', '2023-09-04 16:19:44'),
(27, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA EMPRESA #1', 'id: 3<br/>empresa_id: 3<br/>gestion: 2024<br/>ganancia: 100253.5<br/>costo_bienes_vendidos: 1000<br/>salarios: 5000<br/>otros_gastos_operativos: 1500<br/>ebitda: 92500<br/>da: 1300<br/>ebit: 91200<br/>interes: 1200<br/>impuestos: 1500<br/>beneficio_neto: 88500<br/>cuentas_cobrar: 1000<br/>inventario: 1000<br/>cuentas_pagar: 1000<br/>capital_trabajo: 1000<br/>cambio_capital_trabajo: 0<br/>gastos_capital: 1000<br/>deuda_final_anio: 1000<br/>cambio_deuda_pendiente: 0<br/>flujo_caja_libre_capital: 88800<br/>recaudacion_fondos_futura: 100000<br/>flujo_caja_libre: 188800<br/>created_at: 2023-09-04 13:29:14<br/>updated_at: 2023-09-04 13:29:14<br/>', NULL, 'FINANZAS', '2023-09-04', '13:29:14', '2023-09-04 17:29:14', '2023-09-04 17:29:14'),
(28, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com ACTUALIZÓ EL CUESTIONARIO DE LA EMPRESA EMPRESA #1', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 3|30000|1|1|1|7|1|2|1|1|1|1|1|1|1|2|1|1|Belarus|9;0|1|1|30000|20000|1|1|0|1|1|1|1|1|1|2013|1||0|1|1|1|1|1<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-09-06 20:01:21<br/>', NULL, 'CUESTIONARIOS', '2023-09-06', '20:01:22', '2023-09-07 00:01:22', '2023-09-07 00:01:22'),
(29, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com ACTUALIZÓ EL CUESTIONARIO DE LA EMPRESA EMPRESA #1', 'id: 2<br/>empresa_id: 3<br/>cuestionario: 3|30000|1|1|1|7|1|2|1|1|1|1|3|1|1|2|1|1|Belarus|9;0|1|1|30000|50|1|1|0|1|1|1|1|1|1|2013|1||0|1|1|1|1|1<br/>created_at: 2023-08-28 16:16:24<br/>updated_at: 2023-09-06 22:53:08<br/>', NULL, 'CUESTIONARIOS', '2023-09-06', '22:53:08', '2023-09-07 02:53:08', '2023-09-07 02:53:08'),
(30, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com ACTUALIZÓ EL CUESTIONARIO DE LA EMPRESA EMPRESA #1', 'created_at: 2023-08-28 16:16:24<br/>cuestionario: 3|2000000|1|1|1|7|1|2|1|1|1|1|3|1|1|2|1|1|Belarus|9;0|1|1|30000|50|1|1|0|1|1|1|1|1|1|2013|1||0|1|1|1|1|1<br/>empresa_id: 3<br/>id: 2<br/>updated_at: 2023-09-07 11:51:00<br/>', NULL, 'CUESTIONARIOS', '2023-09-07', '11:51:00', '2023-09-07 15:51:00', '2023-09-07 15:51:00'),
(31, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com ACTUALIZÓ EL CUESTIONARIO DE LA EMPRESA EMPRESA #1', 'created_at: 2023-08-28 16:16:24<br/>cuestionario: 3|1700000|1|1|1|7|1|2|1|1|1|1|3|1|1|2|1|1|Belarus|9;0|1|1|30000|50|1|1|0|1|1|1|1|1|1|2013|1||0|1|1|1|1|1<br/>empresa_id: 3<br/>id: 2<br/>updated_at: 2023-09-07 11:51:21<br/>', NULL, 'CUESTIONARIOS', '2023-09-07', '11:51:21', '2023-09-07 15:51:21', '2023-09-07 15:51:21'),
(32, 1, 'CREACIÓN', 'EL USUARIO admin@gmail.com REGISTRO UN USUARIO', 'id: 8<br/>usuario: gonzalo@gmail.com<br/>nombre: GONZALO<br/>paterno: CHOQUE<br/>materno: CHOQUE<br/>ci: 232323<br/>ci_exp: LP<br/>dir: LOS OLIVOS<br/>correo: gonzalo@gmail.com<br/>fono: 5555<br/>tipo: ADMINISTRADOR<br/>foto: default.png<br/>password: $2y$10$xSu1FbUiPoavQnZHcRO.Vu4UKNKU5fmQObHDpuRoa3z6kEJowLElC<br/>acceso: 1<br/>configuracion: 0<br/>fecha_registro: 2023-09-09<br/>created_at: 2023-09-09 13:14:57<br/>updated_at: 2023-09-09 13:14:57<br/>', NULL, 'USUARIOS', '2023-09-09', '13:14:57', '2023-09-09 17:14:57', '2023-09-09 17:14:57'),
(33, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com REGISTRO UNA EMPRESA', 'id: 9<br/>nombre: CASTROM S.A.<br/>descripcion_actividad: ACTIVADAD CASTROM S,A,<br/>web: <br/>correo: CASTROM@GMAIL.COM<br/>dir: LOS OLIVSO<br/>fecha_registro: 2023-09-09<br/>user_id: 7<br/>created_at: 2023-09-09 13:23:20<br/>updated_at: 2023-09-09 13:23:20<br/>', NULL, 'EMPRESAS', '2023-09-09', '13:23:20', '2023-09-09 17:23:20', '2023-09-09 17:23:20'),
(34, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com REGISTRO EL CUESTIONARIO DE LA EMPRESA CASTROM S.A.', 'id: 4<br/>empresa_id: 9<br/>cuestionario: 2|100000|0|0|0|20|0|1|0|0|0|0|0|0|2||0|0|Bolivia|5;2|0|2|200000|30|2|4|0|0|0|1|1|0|0|2011|1||1|0|0|0|0|0<br/>created_at: 2023-09-09 13:30:51<br/>updated_at: 2023-09-09 13:30:51<br/>', NULL, 'CUESTIONARIOS', '2023-09-09', '13:30:51', '2023-09-09 17:30:51', '2023-09-09 17:30:51'),
(35, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com REGISTRO EL CUESTIONARIO DE LA EMPRESA CASTROM S.A.', 'id: 5<br/>empresa_id: 9<br/>cuestionario: 2|200000|0|2|1|20|1|2|4|0|0|0|5|0|2||4|0|Bolivia|6;2|0|0|100000|40|2|4|1|0|0|0|0|0|0|2011|1||0|0|0|0|0|0<br/>created_at: 2023-09-09 13:33:16<br/>updated_at: 2023-09-09 13:33:16<br/>', NULL, 'CUESTIONARIOS', '2023-09-09', '13:33:16', '2023-09-09 17:33:16', '2023-09-09 17:33:16'),
(36, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com REGISTRO LOS FONDOS DE LA EMPRESA CASTROM S.A.', 'id: 3<br/>empresa_id: 9<br/>producto: 1400000<br/>p_producto: 70<br/>venta_marketing: 200000<br/>p_venta_marketing: 20<br/>inventario: 10000<br/>p_inventario: 10<br/>operacion: 0<br/>p_operacion: 0<br/>gastos: 0<br/>p_gastos: 0<br/>otros: 0<br/>p_otros: 0<br/>created_at: 2023-09-09 13:34:04<br/>updated_at: 2023-09-09 13:34:04<br/>', NULL, 'FONDOS', '2023-09-09', '13:34:04', '2023-09-09 17:34:04', '2023-09-09 17:34:04'),
(37, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA CASTROM S.A.', 'id: 4<br/>empresa_id: 9<br/>gestion: 2022<br/>ganancia: 375000<br/>costo_bienes_vendidos: 10000<br/>salarios: 10000<br/>otros_gastos_operativos: 0<br/>ebitda: 355000.00<br/>da: 0<br/>ebit: 355000.00<br/>interes: 0<br/>impuestos: 1000<br/>beneficio_neto: 354000.00<br/>cuentas_cobrar: 20000<br/>inventario: 5000<br/>cuentas_pagar: 10000<br/>capital_trabajo: 15000.00<br/>cambio_capital_trabajo: 0.00<br/>gastos_capital: 20000<br/>deuda_final_anio: 5000<br/>cambio_deuda_pendiente: 5000.00<br/>flujo_caja_libre_capital: 339000.00<br/>recaudacion_fondos_futura: 0<br/>flujo_caja_libre: 339000.00<br/>created_at: 2023-09-09 13:35:04<br/>updated_at: 2023-09-09 13:35:04<br/>', NULL, 'FINANZAS', '2023-09-09', '13:35:04', '2023-09-09 17:35:04', '2023-09-09 17:35:04'),
(38, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA CASTROM S.A.', 'id: 5<br/>empresa_id: 9<br/>gestion: 2023<br/>ganancia: 375000.00<br/>costo_bienes_vendidos: 10000.00<br/>salarios: 10000.00<br/>otros_gastos_operativos: 0.00<br/>ebitda: 355000.00<br/>da: 0.00<br/>ebit: 355000.00<br/>interes: 0.00<br/>impuestos: 1000.00<br/>beneficio_neto: 354000.00<br/>cuentas_cobrar: 20000.00<br/>inventario: 5000.00<br/>cuentas_pagar: 10000.00<br/>capital_trabajo: 15000.00<br/>cambio_capital_trabajo: 15000.00<br/>gastos_capital: 20000.00<br/>deuda_final_anio: 5000.00<br/>cambio_deuda_pendiente: 5000.00<br/>flujo_caja_libre_capital: 324000.00<br/>recaudacion_fondos_futura: 0.00<br/>flujo_caja_libre: 324000.00<br/>created_at: 2023-09-09 13:35:10<br/>updated_at: 2023-09-09 13:35:10<br/>', NULL, 'FINANZAS', '2023-09-09', '13:35:10', '2023-09-09 17:35:10', '2023-09-09 17:35:10'),
(39, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA CASTROM S.A.', 'id: 6<br/>empresa_id: 9<br/>gestion: 2024<br/>ganancia: 375000.00<br/>costo_bienes_vendidos: 10000.00<br/>salarios: 10000.00<br/>otros_gastos_operativos: 0.00<br/>ebitda: 355000.00<br/>da: 0.00<br/>ebit: 355000.00<br/>interes: 0.00<br/>impuestos: 1000.00<br/>beneficio_neto: 354000.00<br/>cuentas_cobrar: 20000.00<br/>inventario: 5000.00<br/>cuentas_pagar: 10000.00<br/>capital_trabajo: 15000.00<br/>cambio_capital_trabajo: 15000.00<br/>gastos_capital: 20000.00<br/>deuda_final_anio: 5000.00<br/>cambio_deuda_pendiente: 5000.00<br/>flujo_caja_libre_capital: 324000.00<br/>recaudacion_fondos_futura: 0.00<br/>flujo_caja_libre: 324000.00<br/>created_at: 2023-09-09 13:35:16<br/>updated_at: 2023-09-09 13:35:16<br/>', NULL, 'FINANZAS', '2023-09-09', '13:35:16', '2023-09-09 17:35:16', '2023-09-09 17:35:16'),
(40, 7, 'ELIMINACIÓN', 'EL USUARIO jorge@gmail.com ELIMINÓ UNA EMPRESA', 'correo: CASTROM@GMAIL.COM<br/>created_at: 2023-09-09 13:23:20<br/>descripcion_actividad: ACTIVADAD CASTROM S,A,<br/>dir: LOS OLIVSO<br/>fecha_registro: 2023-09-09<br/>id: 9<br/>nombre: CASTROM S.A.<br/>updated_at: 2023-09-09 13:23:20<br/>user_id: 7<br/>web: <br/>', NULL, 'EMPRESAS', '2023-09-09', '14:03:00', '2023-09-09 18:03:00', '2023-09-09 18:03:00'),
(41, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com REGISTRO UNA EMPRESA', 'correo: CASTROSA@GMAIL.COM<br/>created_at: 2023-09-09 14:03:47<br/>descripcion_actividad: ACTIVIDAD CASTRO S.A.<br/>dir: LOS OLIVSO<br/>fecha_registro: 2023-09-09<br/>id: 10<br/>nombre: CASTRO S.A<br/>updated_at: 2023-09-09 14:03:47<br/>user_id: 7<br/>web: <br/>', NULL, 'EMPRESAS', '2023-09-09', '14:03:47', '2023-09-09 18:03:47', '2023-09-09 18:03:47'),
(42, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com REGISTRO EL CUESTIONARIO DE LA EMPRESA CASTRO S.A', 'created_at: 2023-09-09 14:05:53<br/>cuestionario: 2|100000|2|2|1|15|2|2|2|1|0|0|4|0|2||0|2|Bolivia|17;4|2|2|100000|40|0|2|1|1|0|0|0|0|0|21010|1||0|0|0|0|0|0<br/>empresa_id: 10<br/>id: 6<br/>updated_at: 2023-09-09 14:05:53<br/>', NULL, 'CUESTIONARIOS', '2023-09-09', '14:05:53', '2023-09-09 18:05:53', '2023-09-09 18:05:53'),
(43, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com REGISTRO LOS FONDOS DE LA EMPRESA CASTRO S.A', 'created_at: 2023-09-09 14:06:24<br/>empresa_id: 10<br/>gastos: 10000<br/>id: 4<br/>inventario: 20000<br/>operacion: 10000<br/>otros: 0<br/>p_gastos: 10<br/>p_inventario: 15<br/>p_operacion: 10<br/>p_otros: 0<br/>p_producto: 50<br/>p_venta_marketing: 15<br/>producto: 200000<br/>updated_at: 2023-09-09 14:06:24<br/>venta_marketing: 20000<br/>', NULL, 'FONDOS', '2023-09-09', '14:06:24', '2023-09-09 18:06:24', '2023-09-09 18:06:24'),
(44, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA CASTRO S.A', 'beneficio_neto: 77000.00<br/>cambio_capital_trabajo: 0.00<br/>cambio_deuda_pendiente: 0.00<br/>capital_trabajo: 5000.00<br/>costo_bienes_vendidos: 10000<br/>created_at: 2023-09-09 14:08:11<br/>cuentas_cobrar: 5000<br/>cuentas_pagar: 0<br/>da: 0<br/>deuda_final_anio: 0<br/>ebit: 78000.00<br/>ebitda: 78000.00<br/>empresa_id: 10<br/>flujo_caja_libre: 77000.00<br/>flujo_caja_libre_capital: 77000.00<br/>ganancia: 100000<br/>gastos_capital: 0<br/>gestion: 2022<br/>id: 7<br/>impuestos: 1000<br/>interes: 0<br/>inventario: 0<br/>otros_gastos_operativos: 0<br/>recaudacion_fondos_futura: 0<br/>salarios: 12000<br/>updated_at: 2023-09-09 14:08:11<br/>', NULL, 'FINANZAS', '2023-09-09', '14:08:11', '2023-09-09 18:08:11', '2023-09-09 18:08:11'),
(45, 7, 'CREACIÓN', 'EL USUARIO jorge@gmail.com AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA CASTRO S.A', 'beneficio_neto: 77000.00<br/>cambio_capital_trabajo: 5000.00<br/>cambio_deuda_pendiente: 0.00<br/>capital_trabajo: 5000.00<br/>costo_bienes_vendidos: 10000.00<br/>created_at: 2023-09-09 14:08:18<br/>cuentas_cobrar: 5000.00<br/>cuentas_pagar: 0.00<br/>da: 0.00<br/>deuda_final_anio: 0.00<br/>ebit: 78000.00<br/>ebitda: 78000.00<br/>empresa_id: 10<br/>flujo_caja_libre: 72000.00<br/>flujo_caja_libre_capital: 72000.00<br/>ganancia: 100000.00<br/>gastos_capital: 0.00<br/>gestion: 2023<br/>id: 8<br/>impuestos: 1000.00<br/>interes: 0.00<br/>inventario: 0.00<br/>otros_gastos_operativos: 0.00<br/>recaudacion_fondos_futura: 0.00<br/>salarios: 12000.00<br/>updated_at: 2023-09-09 14:08:18<br/>', NULL, 'FINANZAS', '2023-09-09', '14:08:18', '2023-09-09 18:08:18', '2023-09-09 18:08:18'),
(46, 7, 'MODIFICACIÓN', 'EL USUARIO jorge@gmail.com MODIFICÓ UNA EMPRESA', 'correo: CASTROSA@GMAIL.COM<br/>created_at: 2023-09-09 14:03:47<br/>descripcion_actividad: ACTIVIDAD CASTRO S.A.<br/>dir: LOS OLIVSO<br/>fecha_registro: 2023-09-09<br/>id: 10<br/>nombre: CASTRO S.A<br/>updated_at: 2023-09-09 14:03:47<br/>user_id: 7<br/>web: <br/>', NULL, 'EMPRESAS', '2023-09-09', '14:13:01', '2023-09-09 18:13:01', '2023-09-09 18:13:01'),
(47, 7, 'MODIFICACIÓN', 'EL USUARIO jorge@gmail.com MODIFICÓ UNA EMPRESA', 'correo: CASTROSA@GMAIL.COM<br/>created_at: 2023-09-09 14:03:47<br/>descripcion_actividad: ACTIVIDAD CASTRO S.A.<br/>dir: LOS OLIVSO<br/>fecha_registro: 2023-09-09<br/>id: 10<br/>nombre: CASTRO S.A<br/>updated_at: 2023-09-09 14:03:47<br/>user_id: 7<br/>web: <br/>', NULL, 'EMPRESAS', '2023-09-09', '14:13:04', '2023-09-09 18:13:04', '2023-09-09 18:13:04'),
(48, 7, 'MODIFICACIÓN', 'EL USUARIO jorge@gmail.com MODIFICÓ UNA EMPRESA', 'correo: CASTROSA@GMAIL.COM<br/>created_at: 2023-09-09 14:03:47<br/>descripcion_actividad: ACTIVIDAD CASTRO S.A.<br/>dir: LOS OLIVSO<br/>fecha_registro: 2023-09-09<br/>id: 10<br/>nombre: CASTRO S.A<br/>updated_at: 2023-09-09 14:03:47<br/>user_id: 7<br/>web: <br/>', NULL, 'EMPRESAS', '2023-09-09', '14:13:19', '2023-09-09 18:13:19', '2023-09-09 18:13:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000002_create_users_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_10_13_132625_create_configuracions_table', 1),
(11, '2023_08_24_121830_create_empresas_table', 1),
(12, '2023_08_24_121854_create_accionistas_table', 1),
(13, '2023_08_24_121927_create_competidores_table', 1),
(14, '2023_08_24_121955_create_cuestionarios_table', 1),
(15, '2023_08_24_122015_create_fondos_table', 1),
(16, '2023_08_24_122046_create_finanzas_table', 1),
(17, '2023_08_24_122226_create_valoracion_table', 1),
(18, '2023_08_24_122322_create_valoracion_users_table', 1),
(19, '2023_08_26_190801_create_historial_accions_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` enum('ADMINISTRADOR','EMPRESA','INVERSIONISTA') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceso` int NOT NULL,
  `configuracion` int NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `nombre`, `paterno`, `materno`, `ci`, `ci_exp`, `dir`, `correo`, `fono`, `tipo`, `foto`, `password`, `acceso`, `configuracion`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', NULL, '0', '', '', 'admin@gmail.com', NULL, 'ADMINISTRADOR', NULL, '$2y$10$RrCZZySOwPej2gMFWsrjMe6dLzfaL5Q88h4J75I1FesEBRNPwq1x.', 1, 1, '2023-07-23', NULL, NULL),
(2, 'juan@gmail.com', 'JUAN', 'PERES', 'MAMANI', '1234', 'LP', 'LOS OLIVOS', 'juan@gmail.com', '22222', 'ADMINISTRADOR', 'default.png', '$2y$10$f4V6/MUpgHV.N0UCfRb6JeuXGLnwVDvDaWAApyVtuo9iiXvE/olj6', 1, 0, '2023-08-25', '2023-08-25 16:48:59', '2023-08-30 15:25:48'),
(3, 'fernando@gmail.com', 'FERNANDO', 'MARTINEZ', 'MARTINEZ', '2222', 'LP', 'LOS OLIVOS', 'fernando@gmail.com', '777777', 'EMPRESA', 'default.png', '$2y$10$akqq1V5JTxatJHy029ljseOO4o7l5qzPHrIqNe//0q0olgaADoj7i', 1, 0, '2023-08-25', '2023-08-25 19:11:17', '2023-08-25 19:14:57'),
(4, 'maria@gmail.com', 'MARIA', 'MAMANI', 'MAMANI', '3333', 'CB', 'LOS OLIVOS', 'maria@gmail.com', '6666666', 'INVERSIONISTA', '1692991233_maria@gmail.com.jpg', '$2y$10$6TyHSNf8exRQhqwc/1j7/.t0ETWZG/ma6bf5XosY5slxD/NsdEyVW', 1, 0, '2023-08-25', '2023-08-25 19:16:30', '2023-08-25 19:20:33'),
(5, 'alfredo@gmail.com', 'ALFREDO', 'GONZALES', 'CHOQUE', '4444', 'LP', 'LOS OLIVOS', 'alfredo@gmail.com', '888888', 'EMPRESA', 'default.png', '$2y$10$0w66/mkaxmvMP15qW4ztiuDwpL10Y6JLpZVLMPjENHhc2yl88AIPi', 1, 0, '2023-08-25', '2023-08-25 19:18:24', '2023-08-25 19:18:25'),
(6, 'martin@gmail.com', 'MARTIN', 'PAREDES', '', '5555', 'LP', 'LOS OLIVOS', 'martin@gmail.com', '666666', 'INVERSIONISTA', 'default.png', '$2y$10$YN1bvf1QwPQEci/wPRV3geEcb0iLmE7yYi3RCyVqOyNJVXAzNuSDK', 1, 0, '2023-08-29', '2023-08-29 14:08:38', '2023-08-29 14:08:38'),
(7, 'jorge@gmail.com', 'JORGE', 'CASTRO', 'MARTINEZ', '121212', 'LP', 'LOS OLIVOS', 'jorge@gmail.com', '6666666', 'EMPRESA', 'default.png', '$2y$10$IwU3UnH6aHzSWWfwcFCbSOZdPVmM2o3.oxaM3sHMmMncRXKkIePbC', 1, 0, '2023-09-09', '2023-09-09 17:14:13', '2023-09-09 17:14:13'),
(8, 'gonzalo@gmail.com', 'GONZALO', 'CHOQUE', 'CHOQUE', '232323', 'LP', 'LOS OLIVOS', 'gonzalo@gmail.com', '5555', 'ADMINISTRADOR', 'default.png', '$2y$10$xSu1FbUiPoavQnZHcRO.Vu4UKNKU5fmQObHDpuRoa3z6kEJowLElC', 1, 0, '2023-09-09', '2023-09-09 17:14:57', '2023-09-09 17:14:57'),
(9, 'alex@gmail.com', 'ALEX', 'CAMPOS', '', '343334', 'SC', 'LOS OLIVOS', 'alex@gmail.com', '777777', 'INVERSIONISTA', 'default.png', '$2y$10$2iPKciQNtm179PkldZzQb.hVducaMCxlmdUcEx5wBdk5nPIHcrTOS', 1, 0, '2023-09-09', '2023-09-09 18:24:24', '2023-09-09 18:24:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `fondos` decimal(24,2) NOT NULL,
  `valoracion_previa` decimal(24,2) NOT NULL,
  `limite_bajo` decimal(24,2) NOT NULL,
  `limite_alto` decimal(24,2) NOT NULL,
  `valuacion` decimal(24,2) DEFAULT NULL,
  `ultimo_ebitda` decimal(24,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id`, `empresa_id`, `fondos`, `valoracion_previa`, `limite_bajo`, `limite_alto`, `valuacion`, `ultimo_ebitda`, `created_at`, `updated_at`) VALUES
(1, 3, 200000.00, 2500000.00, 1875000.00, 3125000.00, 165704.00, 71529.00, '2023-09-06 23:29:30', '2023-09-09 18:30:39'),
(3, 10, 100000.00, 500000.00, 375000.00, 625000.00, 254000.00, 78000.00, '2023-09-09 18:08:25', '2023-09-09 18:13:54'),
(4, 8, 0.00, 300000.00, 225000.00, 375000.00, 0.00, 0.00, '2023-09-09 18:24:36', '2023-09-09 18:29:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion_users`
--

CREATE TABLE `valoracion_users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `cantidad` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `valoracion_users`
--

INSERT INTO `valoracion_users` (`id`, `user_id`, `empresa_id`, `cantidad`, `created_at`, `updated_at`) VALUES
(2, 7, 10, 3, '2023-09-09 18:08:25', '2023-09-09 18:13:54'),
(3, 9, 8, 10, '2023-09-09 18:24:36', '2023-09-09 18:29:33'),
(4, 9, 3, 2, '2023-09-09 18:25:04', '2023-09-09 18:30:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accionistas`
--
ALTER TABLE `accionistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accionistas_empresa_id_foreign` (`empresa_id`);

--
-- Indices de la tabla `competidores`
--
ALTER TABLE `competidores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competidores_empresa_id_foreign` (`empresa_id`);

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuestionarios_empresa_id_foreign` (`empresa_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finanzas_empresa_id_foreign` (`empresa_id`);

--
-- Indices de la tabla `fondos`
--
ALTER TABLE `fondos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fondos_empresa_id_foreign` (`empresa_id`);

--
-- Indices de la tabla `historial_accions`
--
ALTER TABLE `historial_accions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`),
  ADD UNIQUE KEY `users_correo_unique` (`correo`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoracion_empresa_id_foreign` (`empresa_id`);

--
-- Indices de la tabla `valoracion_users`
--
ALTER TABLE `valoracion_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoracion_users_user_id_foreign` (`user_id`),
  ADD KEY `valoracion_users_empresa_id_foreign` (`empresa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accionistas`
--
ALTER TABLE `accionistas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `competidores`
--
ALTER TABLE `competidores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fondos`
--
ALTER TABLE `fondos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial_accions`
--
ALTER TABLE `historial_accions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `valoracion_users`
--
ALTER TABLE `valoracion_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accionistas`
--
ALTER TABLE `accionistas`
  ADD CONSTRAINT `accionistas_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `competidores`
--
ALTER TABLE `competidores`
  ADD CONSTRAINT `competidores_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD CONSTRAINT `cuestionarios_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD CONSTRAINT `finanzas_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `fondos`
--
ALTER TABLE `fondos`
  ADD CONSTRAINT `fondos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `valoracion_users`
--
ALTER TABLE `valoracion_users`
  ADD CONSTRAINT `valoracion_users_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `valoracion_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
