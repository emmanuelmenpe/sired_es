-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2020 a las 01:17:53
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
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
(1, 'equipo1', 0, 0, 0, 1, 2, 4, NULL, NULL),
(2, 'equipo2', 0, 0, 0, 1, 2, 4, NULL, NULL);

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
(24, 2, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadors`
--

CREATE TABLE `jugadors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `jugadors` (`id`, `nombre`, `curp`, `fotografia`, `sancion`, `motivo`, `fecha_sancion`, `fecha_fin`, `created_at`, `updated_at`) VALUES
(1, 'jugador1', '1yrt3rw6dgrt46eyrt', 'fotografia1', 0, NULL, NULL, NULL, NULL, NULL),
(2, 'jugador2', '3e4t5t6y8u8o9i', 'fotografia2', 1, 'insultos al arbitro', '2020-07-01', '2020-07-26', NULL, NULL),
(3, 'jugador3', 'hh6g6frd4f5h78', 'fotografia3', 0, NULL, NULL, NULL, NULL, NULL),
(4, 'jugador4', 'ih7tt6f5rcmlm', 'fotografia4', 0, NULL, NULL, NULL, NULL, NULL),
(5, 'jugador5', 'ki8j7h6g5fdd', 'fotografia5', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'jugador6', 'i8u76t5r4e3', 'fotografia6', 0, NULL, NULL, NULL, NULL, NULL),
(7, 'jugador7', 'o9i9j8n7g6v5', 'fotografia7', 0, NULL, NULL, NULL, NULL, NULL),
(8, 'jugador8', '0polmnbcxs2', 'fotografia8', 0, NULL, NULL, NULL, NULL, NULL),
(9, 'jugador9', '9b6v5c3s2a1', 'fotografia9', 0, NULL, NULL, NULL, NULL, NULL),
(10, 'jugador10', 'm9m8j7g6f', 'fotografia10', 0, NULL, NULL, NULL, NULL, NULL),
(11, 'jugador11', '9i8u7y6f5f5d', 'fotografia11', 1, 'lesiono a jugador', '2020-07-02', '2020-07-31', NULL, NULL),
(12, 'jugador12', '98i8y6t5f54d4', 'fotografia12', 0, NULL, NULL, NULL, NULL, NULL),
(13, 'jugador13', 'qwer654e4r44r4', 'fotografia13', 0, NULL, NULL, NULL, NULL, NULL),
(14, 'jugador14', 'jt7urt6uet6y', 'fotografia14', 0, NULL, NULL, NULL, NULL, NULL),
(15, 'jugador15', '12eq455gwr57', 'fotografia15', 0, NULL, NULL, NULL, NULL, NULL),
(16, 'jugador16', '12e1q435245t3y', 'fotografia16', 0, NULL, NULL, NULL, NULL, NULL),
(17, 'jugador17', '12edq34t245y', 'fotografia17', 0, NULL, NULL, NULL, NULL, NULL),
(18, 'jugador18', '12edq3t4w5y6', 'fotografia18', 0, NULL, NULL, NULL, NULL, NULL),
(19, 'jugador19', 'fuit7kmyui7y', 'fotografia19', 0, NULL, NULL, NULL, NULL, NULL),
(20, 'jugador20', 'bdfngh0p0pkjn', 'fotografia20', 0, NULL, NULL, NULL, NULL, NULL),
(21, 'jugador21', 'zxdvs5yvbe6ugf', 'fotografia21', 0, NULL, NULL, NULL, NULL, NULL),
(22, 'jugador22', 'cbvnugjt789gn', 'fotografia22', 1, 'agresividad en el juego', '2020-07-05', '2020-07-19', NULL, NULL),
(23, 'jugador23', 'sdvfvbyjgik0', 'fotografia23', 0, NULL, NULL, NULL, NULL, NULL),
(24, 'jugador24', 'asefe5tthtyu', 'fotografia24', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liga`
--

CREATE TABLE `liga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `liga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `liga`
--

INSERT INTO `liga` (`id`, `liga`, `created_at`, `updated_at`) VALUES
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
(1, 1, 2, 'cancha del centro', '2020-07-19', '16:00:00', 'Armando Esteban Quito Palma', NULL, NULL);

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
-- Estructura de tabla para la tabla `rama`
--

CREATE TABLE `rama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rama`
--

INSERT INTO `rama` (`id`, `rama`, `created_at`, `updated_at`) VALUES
(1, 'femenil', NULL, NULL),
(2, 'varonil', NULL, NULL);

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
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
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
-- Indices de la tabla `liga`
--
ALTER TABLE `liga`
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
-- Indices de la tabla `rama`
--
ALTER TABLE `rama`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `jugadors`
--
ALTER TABLE `jugadors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `liga`
--
ALTER TABLE `liga`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rama`
--
ALTER TABLE `rama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `equipo_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `equipo_id_liga_foreign` FOREIGN KEY (`id_liga`) REFERENCES `liga` (`id`),
  ADD CONSTRAINT `equipo_id_rama_foreign` FOREIGN KEY (`id_rama`) REFERENCES `rama` (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
