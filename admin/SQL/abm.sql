-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2021 a las 02:58:45
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `tipo` int(11) NOT NULL,
  `salt` varchar(250) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `tipo`, `salt`, `activo`) VALUES
(1, 'Emmanuel', 'Lopez', 'Admin', 'asd', 1, 'salt', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipos`
--

CREATE TABLE `usuarios_tipos` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_tipos`
--

INSERT INTO `usuarios_tipos` (`id_tipo`, `nombre`) VALUES
(1, 'Super Admin'),
(2, 'Gestion de Productos'),
(3, 'Control de Comentarios'),
(4, 'Gestion de Rotulos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_visibilidad`
--

CREATE TABLE `usuarios_visibilidad` (
  `id_usuario_visibilidad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_visibilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_visibilidad`
--

INSERT INTO `usuarios_visibilidad` (`id_usuario_visibilidad`, `id_usuario`, `id_visibilidad`) VALUES
(1, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visibilidad`
--

CREATE TABLE `visibilidad` (
  `id_visibilidad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visibilidad`
--

INSERT INTO `visibilidad` (`id_visibilidad`, `nombre`, `codigo`) VALUES
(1, 'Crear Usuarios', 'userAdd'),
(2, 'Modificar - Eliminar Usuarios', 'userEdit'),
(3, 'Visualizar Productos', 'productView'),
(4, 'Editar - Agregar Productos', 'productEdit'),
(5, 'Gestion de Comentarios', 'commentAccecs'),
(6, 'Gestion de Rotulos', 'labelAcces'),
(7, 'Control Absoluto', 'fullAdmin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipoUsuario` (`tipo`);

--
-- Indices de la tabla `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios_visibilidad`
--
ALTER TABLE `usuarios_visibilidad`
  ADD PRIMARY KEY (`id_usuario_visibilidad`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_visibilidad` (`id_visibilidad`);

--
-- Indices de la tabla `visibilidad`
--
ALTER TABLE `visibilidad`
  ADD PRIMARY KEY (`id_visibilidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios_visibilidad`
--
ALTER TABLE `usuarios_visibilidad`
  MODIFY `id_usuario_visibilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `visibilidad`
--
ALTER TABLE `visibilidad`
  MODIFY `id_visibilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `usuarios_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_visibilidad`
--
ALTER TABLE `usuarios_visibilidad`
  ADD CONSTRAINT `usuarios_visibilidad_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuarios_visibilidad_ibfk_2` FOREIGN KEY (`id_visibilidad`) REFERENCES `visibilidad` (`id_visibilidad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
