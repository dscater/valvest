-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-08-2023 a las 19:21:49
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
(6, 5, 'ACCIONSTA2', 40.00, '2023-08-27 00:21:13', '2023-08-27 00:21:13');

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
(4, 5, 'COMPETIDOR2', 'URL2', '2023-08-27 00:21:25', '2023-08-27 00:21:25');

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
(5, 'EMPRESA #2', 'ACT. EMPRESA #2', 'WEB EMPRESA 2', 'EMPRESA2@GMAIL.COM', 'LOS OLIVOS', '2023-08-26', 1, '2023-08-27 00:09:48', '2023-08-27 00:09:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finanzas`
--

CREATE TABLE `finanzas` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `ganancia` decimal(24,2) NOT NULL,
  `costo_bienes_vendidos` decimal(24,2) NOT NULL,
  `salarios` decimal(24,2) NOT NULL,
  `otros_gastos_operativos` decimal(24,2) NOT NULL,
  `ebitda` decimal(24,2) NOT NULL,
  `da` decimal(24,2) NOT NULL,
  `ebit` decimal(24,2) NOT NULL,
  `interes` decimal(24,2) NOT NULL,
  `impuestos` decimal(24,2) NOT NULL,
  `beneficio_neto` decimal(24,2) NOT NULL,
  `cuentas_cobrar` decimal(24,2) NOT NULL,
  `inventario` decimal(24,2) NOT NULL,
  `cuentas_pagar` decimal(24,2) NOT NULL,
  `capital_trabajo` decimal(24,2) NOT NULL,
  `cambio_capital_trabajo` decimal(24,2) NOT NULL,
  `gastos_capital` decimal(24,2) NOT NULL,
  `deuda_final_anio` decimal(24,2) NOT NULL,
  `cambio_deuda_pendiente` decimal(24,2) NOT NULL,
  `flujo_caja_libre_capital` decimal(24,2) NOT NULL,
  `recaudacion_fondos_futura` decimal(24,2) NOT NULL,
  `flujo_caja_libre` decimal(24,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, 1, 'MODIFICACIÓN', 'EL USUARIO admin@gmail.com MODIFICÓ UNA EMPRESA', 'id: 5<br/>nombre: EMPRESA #2<br/>descripcion_actividad: ACT. EMPRESA #2<br/>web: WEB EMPRESA 2<br/>correo: EMPRESA2@GMAIL.COM<br/>dir: LOS OLIVOS<br/>fecha_registro: 2023-08-26<br/>created_at: 2023-08-26 20:09:48<br/>updated_at: 2023-08-26 20:09:48<br/>', NULL, 'EMPRESAS', '2023-08-26', '20:21:25', '2023-08-27 00:21:25', '2023-08-27 00:21:25');

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
(2, 'juan@gmail.com', 'JUAN', 'PERES', 'MAMANI', '1234', 'LP', 'LOS OLIVOS', 'juan@gmail.com', '22222', 'ADMINISTRADOR', 'default.png', '$2y$10$f4V6/MUpgHV.N0UCfRb6JeuXGLnwVDvDaWAApyVtuo9iiXvE/olj6', 1, 0, '2023-08-25', '2023-08-25 16:48:59', '2023-08-25 16:56:56'),
(3, 'fernando@gmail.com', 'FERNANDO', 'MARTINEZ', 'MARTINEZ', '2222', 'LP', 'LOS OLIVOS', 'fernando@gmail.com', '777777', 'EMPRESA', 'default.png', '$2y$10$akqq1V5JTxatJHy029ljseOO4o7l5qzPHrIqNe//0q0olgaADoj7i', 1, 0, '2023-08-25', '2023-08-25 19:11:17', '2023-08-25 19:14:57'),
(4, 'maria@gmail.com', 'MARIA', 'MAMANI', 'MAMANI', '3333', 'CB', 'LOS OLIVOS', 'maria@gmail.com', '6666666', 'INVERSIONISTA', '1692991233_maria@gmail.com.jpg', '$2y$10$6TyHSNf8exRQhqwc/1j7/.t0ETWZG/ma6bf5XosY5slxD/NsdEyVW', 1, 0, '2023-08-25', '2023-08-25 19:16:30', '2023-08-25 19:20:33'),
(5, 'alfredo@gmail.com', 'ALFREDO', 'GONZALES', 'CHOQUE', '4444', 'LP', 'LOS OLIVOS', 'alfredo@gmail.com', '888888', 'EMPRESA', 'default.png', '$2y$10$0w66/mkaxmvMP15qW4ztiuDwpL10Y6JLpZVLMPjENHhc2yl88AIPi', 1, 0, '2023-08-25', '2023-08-25 19:18:24', '2023-08-25 19:18:25');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `competidores`
--
ALTER TABLE `competidores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fondos`
--
ALTER TABLE `fondos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_accions`
--
ALTER TABLE `historial_accions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoracion_users`
--
ALTER TABLE `valoracion_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
