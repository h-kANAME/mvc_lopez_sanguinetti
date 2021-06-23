-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2021 a las 23:19:33
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `estado_activo`) VALUES
(1, 'Hardware', 1),
(2, 'Software', 1),
(3, 'Perifericos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(50) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `aprobado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `fecha`, `ip`, `id_producto`, `descripcion`, `calificacion`, `email`, `aprobado`) VALUES
(1, '2021-05-02', '123', 1, 'Comentario Uno', 2, 'admin@kyz.com.ar', 0),
(2, '2021-05-02', '124', 1, 'Cambie la ip a 125', 3, 'luis--ao@hotmail.com', 1),
(3, '2021-05-11', '123', 1, 'asd', 4, 'luipso@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_sector` int(11) NOT NULL,
  `nombre_sector` varchar(50) NOT NULL,
  `mail_sector` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_sector`, `nombre_sector`, `mail_sector`) VALUES
(1, 'Ventas', 'luis.lopez@davinci.edu.ar'),
(2, 'Soporte', 'luis--ao@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `estado_activo`) VALUES
(1, 'HYPERX', 1),
(2, 'WD BLUE', 1),
(3, 'CRUCIAL', 1),
(4, 'CORSAIR', 1),
(5, 'AMD', 1),
(6, 'GIGABYTE ', 1),
(7, 'ADOBE', 1),
(8, 'WINDOWS', 1),
(9, 'LOGITECH', 1),
(10, 'ZOWIE', 1),
(11, 'STEEL SERIES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `destacado` varchar(5) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `imagen_max` varchar(250) NOT NULL,
  `id_sub_categoria` int(11) NOT NULL,
  `estado_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `descripcion`, `id_marca`, `id_categoria`, `modelo`, `destacado`, `precio`, `imagen`, `imagen_max`, `id_sub_categoria`, `estado_activo`) VALUES
(1, 'Disco en estado solido, producto de interface SerialATA III con 560MB/s de velocidad de lectura lectura y 360MB/s de escritura', 1, 1, 'Disco SSD 120 GB', 'true', '3157.00', 'public/img/Hardware/0.jpg', 'img/Hardware/Max/0.jpg', 1, 1),
(2, 'Disco en estado solido de interface SerialATA III, con 545 MB/s de velocidad de lectura lectura y 525 MB/s de escritura', 2, 1, 'Disco SSD 120 GB', 'true', '4760.00', 'public/img/Hardware/1.jpg', 'img/Hardware/Max/1.jpg', 1, 1),
(3, 'Memoria con factor de forma UDIMM, la mejor opcion a la hora de buscar un producto confiable y a un precio competitivo', 3, 1, 'Memoria DDR4 2666Mhz-4GB', 'false', '2146.00', 'public/img/Hardware/2.jpg', 'img/Hardware/Max/2.jpg', 0, 1),
(4, 'Velocidad de 2666MHz a 4600MHz y compatible con las plataformas Intel? X299 2666MHz y AMD AM4 / Ryzen', 4, 1, 'Memoria DDR4 3000Mhz - 8GB', 'false', '4637.00', 'public/img/Hardware/3.jpg', 'img/Hardware/Max/3.jpg', 0, 1),
(5, 'Incorpora graficos Radeon Vega 8 el 3200G llega y ofrece 4 CPU fisicos y 4 Virtuales, capaces de alcanzar velocidades de  hasta 4GHz', 5, 1, 'Micro Procesador RYZEN 3 3200G', 'true', '13158.00', 'public/img/Hardware/4.jpg', 'img/Hardware/Max/4.jpg', 0, 1),
(6, 'Es capaz de soportar hasta una temperatura de 95?c, ofrece 4 CPU fisicos y 8 Viruales, capaces de alcanzar velocidades de hasta 4,2GHz', 5, 1, 'Micro Procesador RYZEN 5 3400G', 'true', '17053.00', 'public/img/Hardware/5.jpg', 'img/Hardware/Max/5.jpg', 0, 1),
(7, 'Microprocersador de alto rendimiento, ofrece 8CPU fisicos y 16 Virtuales, capaz de alcazar velocidades de hasta 4,4GHz', 5, 1, 'Micro Procesador RYZEN 7 3700X', 'true', '44719.00', 'public/img/Hardware/6.jpg', 'img/Hardware/Max/6.jpg', 0, 1),
(8, 'Tipo de memoria  GDDR6 con 6GB de memoria y Boos Clok de hasta 1620MHz', 6, 1, 'Placa de Video RADEON RX 5600 XT', 'true', '51308.00', 'public/img/Hardware/7.jpg', 'img/Hardware/Max/7.jpg', 0, 1),
(9, 'Funciones del software: Editor de Imagen', 7, 2, 'Illustrator', 'false', '10000.00', 'public/img/Software/8.jpg', 'img/Software/Max/8.jpg', 0, 1),
(10, 'Platonic: Con tonos azul oscuro y sombras naranja oscuro.', 7, 2, 'Lightroom', 'false', '8000.00', 'public/img/Software/9.jpg', 'img/Software/Max/9.jpg', 0, 1),
(11, 'El Curso Dise?o Grafico Multimedia es para PC/ MAC, y no requiere de ninguna instalacion! solo coloca el disco y listo!', 7, 2, 'InDesign', 'false', '5000.00', 'public/img/Software/10.jpg', 'img/Software/Max/10.jpg', 0, 1),
(12, 'Excelente programa de dise?o para aquella personas que se inician  recientemente en la edici?n de im?genes y creaci?n de dise?os.', 7, 2, 'Photoshop', 'false', '1500.00', 'public/img/Software/11.jpg', 'img/Software/Max/11.jpg', 0, 1),
(13, 'Tipo de sistema operativo: 2020', 8, 2, 'Windows 10 Pro', 'false', '37000.00', 'public/img/Software/12.jpg', 'img/Software/Max/12.jpg', 0, 1),
(14, 'Enterprise Development with Visual Studio .NET, UML, and MSF', 8, 2, 'Visual Studio Enterprise', 'false', '5000.00', 'public/img/Software/13.jpg', 'img/Software/Max/13.jpg', 0, 1),
(15, 'Pack XBOX GAME PASS + GOLD 30 D?AS    100 % original Xbox One', 8, 2, 'Xbox Live Gold', 'false', '13000.00', 'public/img/Software/14.jpg', 'img/Software/Max/14.jpg', 0, 1),
(16, 'Office 365 professional plus', 8, 2, 'Microsoft 365', 'false', '8000.00', 'public/img/Software/15.jpg', 'img/Software/Max/15.jpg', 1, 1),
(17, 'Aud?fonos con microfono PRO X para juegos, incorporta la tecnologia Blue Voice', 9, 3, 'Logitech G Pro X', 'false', '34000.00', 'public/img/Perifericos/16.jpg', 'img/Perifericos/Max/16.jpg', 0, 1),
(18, 'Audifonos Cloud con sonido envolvente 7.1 y con microfono con cancelacion de ruido', 1, 3, 'HyperX Cloud II Gaming Headset', 'false', '20000.00', 'public/img/Perifericos/17.jpg', 'img/Perifericos/Max/17.jpg', 0, 1),
(19, 'Mouse ?ptico ideal para viedojuegos, cuenta con el sensor Pixart pmw 3360', 10, 3, 'Zowie Gear FK2 Wired', 'false', '12250.00', 'public/img/Perifericos/18.jpg', 'img/Perifericos/Max/18.jpg', 0, 1),
(20, 'Dise?o Ergon?mico exclusivamente para usuarios diestros', 10, 3, 'Zowie Gear ZA11 Wired', 'false', '13000.00', 'public/img/Perifericos/19.jpg', 'img/Perifericos/Max/19.jpg', 0, 1),
(21, 'Alfombrilla de raton Logitech G240 de tela para juegos para juegos de bajo DPI', 9, 3, 'Logitech G240 ', 'false', '3500.00', 'public/img/Perifericos/20.jpg', 'img/Perifericos/Max/20.jpg', 0, 1),
(22, 'FURY S cuenta con bordes con costura uniforme antidesgaste para una mayor resistencia.', 1, 3, 'HyperX Fury S L', 'false', '3799.00', 'public/img/Perifericos/21.jpg', 'img/Perifericos/Max/21.jpg', 0, 1),
(23, 'Ofrece m?s espacio para el movimiento del mouse, cuenta con un receptor USB se puede guardar en la parte posterior del teclado para facilitar el transporte.', 9, 3, 'Logitech G915 Mechanical Gaming Keyboard', 'false', '29500.00', 'public/img/Perifericos/22.jpg', 'img/Perifericos/Max/22.jpg', 0, 1),
(24, 'Interruptores rojos lineales: garantizados para 50 millones de pulsaciones de teclas, los interruptores rojos proporcionan un movimiento uniforme y uniforme sin ning?n golpe.', 11, 3, 'SteelSeries Apex 7 Mechanical Gaming Keyboard', 'false', '42000.00', 'public/img/Perifericos/23.jpg', 'img/Perifericos/Max/23.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id_sub_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id_sub_categoria`, `nombre`, `estado_activo`) VALUES
(1, 'Usado', 1);

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
(1, 'Emmanuel', 'Lopez', 'Admin', 'asd', 1, 'salt', 1),
(2, 'Juan', 'Rodriguez', 'jrodriguez@kyz.com.ar', 'asd', 2, 'asd', 1);

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
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id_sub_categoria`);

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id_sub_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
