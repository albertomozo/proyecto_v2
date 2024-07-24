-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2024 a las 08:30:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `publica_estado` enum('A','D') NOT NULL,
  `publica_aviso` tinyint(4) NOT NULL,
  `publica_aviso_texto` text NOT NULL,
  `publica_head_titulo` varchar(256) NOT NULL,
  `publica_footer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`publica_estado`, `publica_aviso`, `publica_aviso_texto`, `publica_head_titulo`, `publica_footer`) VALUES
('', 0, 'Volvemos despues del fin de semana!!!!', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_privada`
--

CREATE TABLE `config_privada` (
  `id` bigint(20) NOT NULL,
  `meta` varchar(255) DEFAULT NULL,
  `valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `config_privada`
--

INSERT INTO `config_privada` (`id`, `meta`, `valor`) VALUES
(1, 'mensaje_bienvenida', 'Hasta luego lukas'),
(2, 'version', '1.1.2.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` bigint(20) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(12, 'Aventura'),
(14, 'Fantasía'),
(16, 'Animación'),
(18, 'Drama'),
(27, 'Terror'),
(28, 'Acción'),
(35, 'Comedia'),
(36, 'Historia'),
(37, 'Western'),
(53, 'Suspense'),
(80, 'Crimen'),
(99, 'Documental'),
(878, 'Ciencia ficción'),
(9648, 'Misterio'),
(10402, 'Música'),
(10749, 'Romance'),
(10751, 'Familia'),
(10752, 'Bélica'),
(10770, 'Pelicula TV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` bigint(20) NOT NULL,
  `tmdb_id` varchar(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `estado` enum('A','D','B') NOT NULL COMMENT 'A-activo D-desactivado  B-Borrar',
  `estreno` date NOT NULL,
  `overview` text DEFAULT NULL,
  `opinion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peli_genero`
--

CREATE TABLE `peli_genero` (
  `id` bigint(20) NOT NULL,
  `peliculaid` bigint(20) NOT NULL,
  `generoid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `rol` enum('A','I','U','E') NOT NULL COMMENT 'A : Administrador U : usuario  I : invitado E: Editor',
  `estado` enum('A','P','B','D') NOT NULL COMMENT 'A : Activo P: Preinscrito D: Desactivado B: Borrado',
  `token` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `boletin` char(1) DEFAULT NULL,
  `creado` bigint(20) NOT NULL COMMENT 'fecha creacion',
  `modificado` bigint(20) NOT NULL COMMENT 'fecha ultima modificacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `mail`, `usuario`, `password`, `telefono`, `rol`, `estado`, `token`, `imagen`, `boletin`, `creado`, `modificado`) VALUES
(10004, 'admin', 'Administrador', 'admin@admin.com', 'admin', '12345678', '', 'A', 'A', '', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones`
--

CREATE TABLE `votaciones` (
  `usuarioid` bigint(20) NOT NULL,
  `elemento_votado` int(10) UNSIGNED NOT NULL,
  `valoracion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `config_privada`
--
ALTER TABLE `config_privada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peli_genero`
--
ALTER TABLE `peli_genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `config_privada`
--
ALTER TABLE `config_privada`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peli_genero`
--
ALTER TABLE `peli_genero`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
