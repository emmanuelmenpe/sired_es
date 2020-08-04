-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2020 a las 23:56:03
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sired`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 'mini', NULL, NULL),
(2, 'pasarela', NULL, NULL),
(3, 'juvenil', NULL, NULL),
(4, '2nd fuerza', NULL, NULL),
(5, '1rt fuerza', NULL, NULL),
(6, 'veteranos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `victorias` int(11) NOT NULL DEFAULT 0,
  `empates` int(11) NOT NULL DEFAULT 0,
  `derrotas` int(11) NOT NULL DEFAULT 0,
  `id_liga` bigint(20) UNSIGNED NOT NULL,
  `id_rama` bigint(20) UNSIGNED NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `victorias`, `empates`, `derrotas`, `id_liga`, `id_rama`, `id_categoria`, `created_at`, `updated_at`) VALUES
(1, 'equipo1', 5, 2, 1, 1, 2, 4, NULL, '2020-08-02 02:00:25'),
(2, 'equipo2', 0, 0, 0, 1, 2, 4, NULL, NULL),
(3, 'equipo3', 0, 0, 0, 1, 2, 4, '2020-07-18 18:26:19', '2020-07-18 18:26:19'),
(4, 'equipo4', 1, 0, 0, 1, 2, 4, '2020-07-19 17:39:52', '2020-07-25 18:05:27'),
(8, 'equipo5', 10, 5, 4, 1, 2, 4, '2020-07-19 19:56:04', '2020-07-25 02:44:58'),
(9, 'equipo6', 9, 8, 7, 1, 2, 4, '2020-07-19 19:56:20', '2020-07-19 19:56:20'),
(12, 'equipo15', 5, 4, 3, 1, 2, 5, '2020-07-27 05:54:05', '2020-07-27 05:54:05'),
(13, 'equipo16', 8, 5, 3, 1, 1, 3, '2020-07-27 06:08:33', '2020-07-27 06:08:33'),
(14, 'BasquetbolTeam', 8, 2, 1, 2, 1, 3, '2020-08-01 02:09:10', '2020-08-01 02:09:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_equipo` bigint(20) UNSIGNED NOT NULL,
  `id_jugador` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id`, `id_equipo`, `id_jugador`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 1, 11, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 2, 13, NULL, NULL),
(14, 2, 14, NULL, NULL),
(15, 2, 15, NULL, NULL),
(16, 2, 16, NULL, NULL),
(17, 2, 17, NULL, NULL),
(18, 2, 18, NULL, NULL),
(19, 2, 19, NULL, NULL),
(20, 2, 20, NULL, NULL),
(21, 2, 21, NULL, NULL),
(22, 2, 22, NULL, NULL),
(23, 2, 23, NULL, NULL),
(25, 3, 33, '2020-07-26 22:19:08', '2020-07-26 22:19:08'),
(26, 3, 34, '2020-07-26 22:21:38', '2020-07-26 22:21:38'),
(27, 3, 35, '2020-07-26 22:24:32', '2020-07-26 22:24:32'),
(33, 3, 42, '2020-07-26 22:56:32', '2020-07-26 22:56:32'),
(34, 3, 43, '2020-07-26 22:58:45', '2020-07-26 22:58:45'),
(37, 13, 47, '2020-08-01 03:48:22', '2020-08-01 03:48:22'),
(38, 14, 48, '2020-08-01 03:50:02', '2020-08-01 03:50:02'),
(39, 14, 49, '2020-08-01 04:22:45', '2020-08-01 04:22:45'),
(40, 14, 50, '2020-08-02 01:45:53', '2020-08-02 01:45:53'),
(41, 14, 51, '2020-08-02 02:09:35', '2020-08-02 02:09:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadors`
--

CREATE TABLE `jugadors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goles` int(11) NOT NULL DEFAULT 0,
  `sancion` tinyint(1) NOT NULL DEFAULT 0,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_sancion` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `jugadors`
--

INSERT INTO `jugadors` (`id`, `nombre`, `curp`, `fotografia`, `goles`, `sancion`, `motivo`, `fecha_sancion`, `fecha_fin`, `created_at`, `updated_at`) VALUES
(1, 'jugador1', '1yrt3rw6dgrt46eyrt', 'interfaz_posiciones.png', 3, 0, NULL, NULL, NULL, NULL, '2020-07-26 21:40:21'),
(2, 'jugador2Edit', '3e4t5t6y8u8o9i', 'fotografia2', 0, 1, 'insultos al arbitro', '2020-07-01', '2020-07-26', NULL, '2020-07-26 22:34:23'),
(3, 'jugador3', 'hh6g6frd4f5h78', 'fotografia3', 0, 0, NULL, NULL, NULL, NULL, NULL),
(4, 'jugador4', 'ih7tt6f5rcmlm', 'fotografia4', 0, 0, NULL, NULL, NULL, NULL, NULL),
(5, 'jugador5', 'ki8j7h6g5fdd', 'fotografia5', 0, 0, NULL, NULL, NULL, NULL, NULL),
(6, 'jugador6', 'i8u76t5r4e3', 'fotografia6', 0, 0, NULL, NULL, NULL, NULL, NULL),
(7, 'jugador7', 'o9i9j8n7g6v5', 'fotografia7', 0, 0, NULL, NULL, NULL, NULL, NULL),
(8, 'jugador8', '0polmnbcxs2', 'fotografia8', 0, 0, NULL, NULL, NULL, NULL, NULL),
(9, 'jugador9', '9b6v5c3s2a1', 'fotografia9', 5, 0, NULL, NULL, NULL, NULL, NULL),
(10, 'jugador10', 'm9m8j7g6f', 'fotografia10', 0, 0, NULL, NULL, NULL, NULL, NULL),
(11, 'jugador11', '9i8u7y6f5f5d', 'fotografia11', 0, 1, 'lesiono a jugador', '2020-07-02', '2020-07-31', NULL, NULL),
(12, 'jugador12', '98i8y6t5f54d4', 'fotografia12', 0, 0, NULL, NULL, NULL, NULL, NULL),
(13, 'jugador13', 'qwer654e4r44r4', 'interfaz_agregar_equipo.png', 0, 0, NULL, NULL, NULL, NULL, '2020-07-27 03:51:13'),
(14, 'jugador14', 'jt7urt6uet6y', 'fotografia14', 0, 0, NULL, NULL, NULL, NULL, NULL),
(15, 'jugador15', '12eq455gwr57', 'fotografia15', 0, 0, NULL, NULL, NULL, NULL, NULL),
(16, 'jugador16', '12e1q435245t3y', 'fotografia16', 0, 0, NULL, NULL, NULL, NULL, NULL),
(17, 'jugador17', '12edq34t245y', 'fotografia17', 0, 0, NULL, NULL, NULL, NULL, NULL),
(18, 'jugador18', '12edq3t4w5y6', 'fotografia18', 0, 0, NULL, NULL, NULL, NULL, NULL),
(19, 'jugador19', 'fuit7kmyui7y', 'fotografia19', 0, 0, NULL, NULL, NULL, NULL, NULL),
(20, 'jugador20', 'bdfngh0p0pkjn', 'fotografia20', 0, 0, NULL, NULL, NULL, NULL, NULL),
(21, 'jugador21', 'zxdvs5yvbe6ugf', 'fotografia21', 0, 0, NULL, NULL, NULL, NULL, NULL),
(22, 'jugador22', 'cbvnugjt789gn', 'fotografia22', 0, 1, 'agresividad en el juego', '2020-07-05', '2020-07-19', NULL, NULL),
(23, 'jugador23', 'sdvfvbyjgik0', 'fotografia23', 0, 0, NULL, NULL, NULL, NULL, NULL),
(26, 'jugador laravel E', '3ertyuio5yg7', 'interfaz_agregar_partido.png', 0, 1, 'aukscbUYBCUye', '2020-06-22', '2020-07-25', '2020-07-23 05:16:07', '2020-07-23 05:51:54'),
(27, 'jugador jugador', 'asdfghy', 'interfaz_partidos.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:15:07', '2020-07-26 22:15:07'),
(28, 'jugador jugador', 'asdfghy', 'interfaz_partidos.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:15:19', '2020-07-26 22:15:19'),
(29, 'jugador jugador', 'asdfghy', 'interfaz_partidos.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:15:40', '2020-07-26 22:15:40'),
(30, 'jugador jugador', 'asdfghy', 'interfaz_partidos.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:15:56', '2020-07-26 22:15:56'),
(31, 'jugador jugador', 'asdfghy', 'interfaz_partidos.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:16:29', '2020-07-26 22:16:29'),
(32, 'jugador E3', 'xdcfvgbhnj', 'interfaz_inicio.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:17:32', '2020-07-26 22:17:32'),
(33, 'jugador E3 editado', 'xdcfvgbhnj', 'interfaz_inicio.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:19:08', '2020-07-26 23:21:18'),
(34, 'jugador2 E3', 'sxdcfvgbh', 'interfaz_inicio - copia.png', 0, 1, 'wsdfvgbh', '2020-07-27', '2020-07-30', '2020-07-26 22:21:38', '2020-07-26 22:21:38'),
(35, 'jugador3 E3', 'xdcfvgbhnjm', 'interfaz_anotaciones.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:24:32', '2020-07-26 22:24:32'),
(37, 'jugador5 E3', ',lmkonjihbugvycfx', 'interfaz_agregar_equipo.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:29:11', '2020-07-26 22:29:11'),
(42, 'jugador7 E3', 'derfghj', 'interfaz_inicio - copia.png', 0, 0, NULL, NULL, NULL, '2020-07-26 22:56:32', '2020-07-26 22:56:32'),
(43, 'jugador8 E3', 'cwj673r', 'interfaz_agregar_equipo.png', 0, 1, 'sedrftgyhu', '2020-07-20', '2020-07-28', '2020-07-26 22:58:45', '2020-07-26 23:27:10'),
(46, 'erewr', 'ererer', 'interfaz_agregar_equipo.png', 0, 0, NULL, NULL, NULL, '2020-07-27 17:49:07', '2020-07-27 17:49:07'),
(47, 'jugadorEFemenil', 'sdfgh', 'interfaz_resultados.png', 0, 0, NULL, NULL, NULL, '2020-08-01 03:48:22', '2020-08-01 03:48:22'),
(48, 'jugadorBasquetbol', 'sdfgbhn', 'interfaz_inicio.png', 4, 0, NULL, NULL, NULL, '2020-08-01 03:50:02', '2020-08-01 03:50:02'),
(49, 'basquetboljugador', 'cdfvghj', 'interfaz_anotaciones.png', 0, 1, 'algún motivo', '2020-07-29', '2020-08-01', '2020-08-01 04:22:44', '2020-08-02 02:21:18'),
(50, 'jugadorbas', 'awsedrfghj', 'interfaz_agregar_partido.png', 5, 1, 'algún motivo', '2020-07-31', '2020-08-05', '2020-08-02 01:45:53', '2020-08-02 01:55:13'),
(51, 'jugadorjugador', 'q3q4w5w6sdwqwe2e3d', 'interfaz_estadisticas.png', 3, 0, NULL, NULL, NULL, '2020-08-02 02:09:34', '2020-08-02 02:18:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `liga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ligas`
--

INSERT INTO `ligas` (`id`, `liga`, `created_at`, `updated_at`) VALUES
(1, 'fútbol soccer', NULL, NULL),
(2, 'basquetbol', NULL, NULL),
(3, 'fútbol rápido ', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_12_122315_create_categoria_table', 1),
(5, '2020_07_12_123008_create_jugador_table', 1),
(6, '2020_07_12_123030_create_liga_table', 1),
(7, '2020_07_12_123048_create_rama_table', 1),
(8, '2020_07_12_123133_create_equipo_table', 1),
(9, '2020_07_12_123147_create_integrantes_table', 1),
(10, '2020_07_12_153237_create_partido_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_local` bigint(20) UNSIGNED NOT NULL,
  `id_visitante` bigint(20) UNSIGNED NOT NULL,
  `cancha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `arbitro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `id_local`, `id_visitante`, `cancha`, `fecha`, `hora`, `arbitro`, `created_at`, `updated_at`) VALUES
(4, 1, 9, 'cancha de matamoros', '2020-01-15', '12:00:00', 'jose diaz diaz', '2020-07-23 06:02:04', '2020-07-23 06:02:04'),
(6, 2, 3, 'cancha del centro', '2020-01-22', '13:00:00', 'fcgvhb cgvh', '2020-07-25 18:15:57', '2020-07-25 18:15:57'),
(7, 8, 1, 'cancha mariano matamoros', '2020-01-30', '18:00:00', 'sdfgbhnjk', '2020-07-25 18:16:34', '2020-07-25 18:16:34'),
(8, 9, 2, 'cancha benito juarez', '2020-01-28', '15:00:00', 'arbitro apelldo', '2020-07-25 18:17:23', '2020-07-25 18:17:23'),
(9, 4, 2, 'cancha león', '2020-01-16', '16:00:00', 'julio diaz diaz', '2020-07-25 18:18:01', '2020-07-25 18:18:01'),
(12, 13, 12, 'cancha de casa blanca', '2020-07-29', '12:00:00', 'santiago tejeda', '2020-07-29 06:52:02', '2020-07-29 06:52:02');

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
-- Estructura de tabla para la tabla `ramas`
--

CREATE TABLE `ramas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ramas`
--

INSERT INTO `ramas` (`id`, `rama`, `created_at`, `updated_at`) VALUES
(1, 'femenil', NULL, NULL),
(2, 'varonil', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ganador` bigint(20) NOT NULL,
  `id_perdedor` bigint(20) NOT NULL,
  `goles_ganador` bigint(20) NOT NULL,
  `goles_perdedor` bigint(20) NOT NULL,
  `id_partido` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `id_ganador`, `id_perdedor`, `goles_ganador`, `goles_perdedor`, `id_partido`, `created_at`, `updated_at`) VALUES
(2, 9, 1, 1, 0, 4, NULL, NULL),
(3, 3, 2, 3, 2, 6, NULL, NULL),
(4, 8, 1, 1, 0, 7, NULL, NULL),
(6, 0, 0, 2, 2, 9, NULL, NULL),
(7, 2, 9, 3, 2, 8, '2020-07-29 06:38:16', '2020-07-29 06:38:16');

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id_liga_foreign` (`id_liga`),
  ADD KEY `equipo_id_rama_foreign` (`id_rama`),
  ADD KEY `equipo_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `integrantes_id_equipo_foreign` (`id_equipo`),
  ADD KEY `integrantes_id_jugador_foreign` (`id_jugador`);

--
-- Indices de la tabla `jugadors`
--
ALTER TABLE `jugadors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `partido_id_local_foreign` (`id_local`),
  ADD KEY `partido_id_visitante_foreign` (`id_visitante`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `ramas`
--
ALTER TABLE `ramas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_partido` (`id_partido`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `jugadors`
--
ALTER TABLE `jugadors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ramas`
--
ALTER TABLE `ramas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipo_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `equipo_id_liga_foreign` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id`),
  ADD CONSTRAINT `equipo_id_rama_foreign` FOREIGN KEY (`id_rama`) REFERENCES `ramas` (`id`);

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrantes_id_equipo_foreign` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `integrantes_id_jugador_foreign` FOREIGN KEY (`id_jugador`) REFERENCES `jugadors` (`id`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partido_id_local_foreign` FOREIGN KEY (`id_local`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `partido_id_visitante_foreign` FOREIGN KEY (`id_visitante`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
