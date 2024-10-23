-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 05:34:49
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestión_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `numero_documento` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ciudad_nacimiento` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `tipo_documento`, `numero_documento`, `fecha_nacimiento`, `ciudad_nacimiento`, `telefono`, `usuario`, `contraseña`) VALUES
(1, 'Daniel', 'Soler', '(CC) Cédula de Ciudadanía', '1192801420', '2024-10-24', 'Bogota', '3124122466', 'Danielsoler', '1234'),
(2, 'Daniel', 'sd', 'sd', '12121212', '2024-10-22', 'sd', '312', 'sd', '$2y$10$rU7.7I18RExFcylLFQCoNugK.Opq8Od6Xgt/wSmXhsVwGuRfIweAS'),
(3, 'SA', 'AS', 'CC', '1111', '2024-10-22', 'SAS', '121', 'AS', '$2y$10$UUHwS5PwSF/jPGB8Bp2w6uaEUnGKVnikCYUhlJ0dyR6gOVU9CIEsu'),
(5, 'Daniel', 'Soler', 'CE', '1192801420', '2024-10-22', 'Bogotas', '3124122466', 'Dan', '$2y$10$.HoFOZWBJXXV5AjVBezW4.jBHRPmuUyVNuSLO/KHCFU4kgtsnX3se');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
