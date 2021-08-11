-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2021 a las 22:28:00
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
-- Estructura de tabla para la tabla `campos_dinamicos`
--

CREATE TABLE `campos_dinamicos` (
  `id_campos_dinamicos` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `estado_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `campos_dinamicos`
--

INSERT INTO `campos_dinamicos` (`id_campos_dinamicos`, `nombre`, `tipo`, `estado_activo`) VALUES
(1, 'input', 'input', 1),
(3, 'select', 'selector', 1);

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
(3, 'Perifericos', 1),
(4, 'Prueba', 0),
(5, 'Accesorios', 0);

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
  `seleccion_dinamica` varchar(100) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `aprobado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `fecha`, `ip`, `id_producto`, `descripcion`, `seleccion_dinamica`, `calificacion`, `email`, `aprobado`) VALUES
(1, '2021-05-02', '123', 1, 'Excelente producto', ' Rojo', 2, 'admin@kyz.com.ar', 0),
(2, '2021-05-02', '124', 1, 'Muy recomendable', '', 3, 'luis--ao@hotmail.com', 1),
(3, '2021-05-11', '123', 1, 'Muy bueno', '', 4, 'luipso@gmail.com', 1),
(5, '2021-06-29', '124', 1, 'Probando con duki', '', 5, 'colo96@gmail.com', 0),
(6, '2021-06-30', '124', 9, 'Magnifico!!', '', 3, 'colo96@gmail.com', 1),
(7, '2021-06-30', '124', 9, 'Genial!!', '', 4, 'colo96@gmail.com', 1),
(8, '2021-06-30', '124', 2, 'Pense que era mejor!!!', '', 3, 'colo96@gmail.com', 1),
(9, '2021-06-30', '124', 2, 'Bien hasta ahi', '', 4, 'colo96@gmail.com', 1),
(10, '2021-06-30', '124', 3, 'La memoria anda lenta', '', 3, 'colo96@gmail.com', 1),
(11, '2021-06-30', '124', 3, 'Bien ponele', '', 4, 'colo96@gmail.com', 1),
(12, '2021-06-30', '124', 4, 'Buenisimooo, me cambio la vida!!', '', 5, 'colo96@gmail.com', 1),
(13, '2021-06-30', '124', 4, 'Mas rapido que una ferrari!!', '', 5, 'colo96@gmail.com', 1),
(14, '2021-06-30', '124', 5, 'Vuelaaaaaaaaa', '', 4, 'colo96@gmail.com', 1),
(15, '2021-06-30', '124', 5, 'Niceeee', '', 4, 'colo96@gmail.com', 1),
(16, '2021-06-30', '124', 6, 'Esperaba mas velocidad', '', 2, 'colo96@gmail.com', 1),
(17, '2021-06-30', '124', 7, 'Extraordinario!!!!', '', 4, 'colo96@gmail.com', 1),
(18, '2021-06-30', '124', 8, 'La verdad me cambio la vida!', '', 5, 'colo96@gmail.com', 1),
(19, '2021-06-30', '124', 10, 'Con este programa parezco lindo!', '', 5, 'colo96@gmail.com', 1),
(20, '2021-06-30', '124', 11, 'Magia pura', '', 4, 'colo96@gmail.com', 1),
(21, '2021-06-30', '124', 12, 'Me saco todas las arrugas!!', '', 3, 'colo96@gmail.com', 1),
(22, '2021-06-30', '124', 13, 'Gran Sistema operativo, igual aguante linux', '', 5, 'colo96@gmail.com', 1),
(23, '2021-06-30', '124', 14, 'Juega en primera', '', 4, 'colo96@gmail.com', 1),
(24, '2021-06-30', '124', 15, 'PERO QUE JUEGAZOOOO', '', 4, 'colo96@gmail.com', 1),
(25, '2021-06-30', '124', 16, 'CON ESTO PUEDO LLEVAR MIS FINANZAS', '', 4, 'colo96@gmail.com', 1),
(26, '2021-06-30', '124', 17, 'Parece musica real!!!!!!', '', 5, 'colo96@gmail.com', 1),
(27, '2021-06-30', '124', 18, 'Una locuraggggg', '', 4, 'colo96@gmail.com', 1),
(28, '2021-06-30', '124', 19, 'No se desliza del todo bien!!', '', 2, 'colo96@gmail.com', 1),
(29, '2021-06-30', '124', 20, 'Pego todos head con este, una bomba.', '', 4, 'colo96@gmail.com', 1),
(30, '2021-06-30', '124', 21, 'ALTO PADDD', '', 5, 'colo96@gmail.com', 1),
(31, '2021-06-30', '124', 22, 'Uffff me encanto, juega en primera.', '', 4, 'colo96@gmail.com', 1),
(32, '2021-06-30', '124', 23, 'Las luces no son rgb como dicen, ESTAFADORESSSSS!!!!', '', 1, 'colo96@gmail.com', 1),
(33, '2021-06-30', '124', 24, 'ESTAS LUCES SON RGB??? ME ES TA FA RON!!!!!!!!!!!!!!!', '', 1, 'colo96@gmail.com', 1),
(34, '2021-06-30', '124', 5, 'Muy bueno!', '', 3, 'luipso@gmail.com', 1),
(35, '2021-06-30', '124', 5, 'No fue lo que esperaba', '', 2, 'luipso@gmail.com', 0),
(36, '2021-06-30', '124', 5, 'Me sorprendio la calidad', '', 4, 'luipso@gmail.com', 0),
(37, '2021-06-30', '124', 5, 'Espectacular', '', 5, 'luipso@gmail.com', 0),
(38, '2021-06-30', '124', 5, 'Funcional', '', 3, 'luipso@gmail.com', 0),
(39, '2021-06-30', '124', 5, 'Correcto', '', 4, 'luis--ao@hotmail.coms', 0),
(40, '2021-06-30', '124', 5, 'Eficiente', '', 4, 'luis--ao@hotmail.coms', 1),
(41, '2021-06-30', '124', 5, 'Relacion precio producto ok', '', 3, 'luis--ao@hotmail.coms', 0),
(42, '2021-07-01', '124', 1, '100% conforme', '', 5, 'luipso@gmail.com', 1),
(43, '2021-08-07', '124', 8, 'Una locura', '', 5, 'luipso@gmail.com', 1),
(44, '2021-08-11', '124', 16, 'Prueba previa entrega', '', 5, 'luipso@gmail.com', 1),
(49, '2021-08-11', '124', 1, 'Me interesa consultar stock de color', '', 4, 'admin@kyz.com.ar', 0),
(50, '2021-08-11', '124', 8, 'Rendimiento Excelente!!!', '', 5, 'admin@kyz.com.ar', 1),
(51, '2021-08-11', '124', 1, 'Me dijeron que es bueno el producto, me gustaría saber variedad de colores.', 'Color Rojo', 3, 'luis--ao@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_campo_dinamico`
--

CREATE TABLE `comentarios_campo_dinamico` (
  `id_comentario_campo_dinamico` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `value` varchar(250) NOT NULL,
  `palabras` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios_campo_dinamico`
--

INSERT INTO `comentarios_campo_dinamico` (`id_comentario_campo_dinamico`, `id_producto`, `nombre`, `value`, `palabras`, `type`, `activo`) VALUES
(1, 16, 'Licencia', ', Licencia 12 meses, Licencia 6 meses, Licencia 3 meses', 3, 3, 1),
(2, 16, 'Comodato', ', Compra Anual, Compra definitiva', 2, 3, 0),
(3, 16, 'Testeo', ', Tes 1, Tes 2', 2, 3, 0),
(4, 18, 'Colores', ', Color Rojo, Color Verde', 2, 3, 0),
(5, 1, 'Colores', ', Color Rojo, Color Negro', 2, 3, 1);

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
(5, 'AMD', 0),
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
(1, 'Disco en estado solido, producto interface Serial ATA III.', 1, 1, 'Disco SSD 120 GB', 'true', '3157.00', 'public/img/Hardware/0.jpg', 'img/Hardware/Max/0.jpg', 1, 1),
(2, 'Disco en estado solido de interface SerialATA III, con 545 MB/s de velocidad de lectura lectura y 525 MB/s de escritura', 1, 1, 'Disco SSD 120 GB', 'true', '4760.00', 'public/img/Hardware/1.jpg', 'img/Hardware/Max/1.jpg', 1, 1),
(3, 'Memoria con factor de forma UDIMM, la mejor opcion a la hora de buscar un producto confiable y a un precio competitivo', 3, 1, 'Memoria DDR4 2666Mhz-4GB', 'false', '2146.00', 'public/img/Hardware/2.jpg', 'img/Hardware/Max/2.jpg', 0, 1),
(4, 'Velocidad de 2666MHz a 4600MHz y compatible con las plataformas Intel? X299 2666MHz y AMD AM4 / Ryzen', 4, 1, 'Memoria DDR4 3000Mhz - 8GB', 'false', '4637.00', 'public/img/Hardware/3.jpg', 'img/Hardware/Max/3.jpg', 0, 1),
(5, 'Incorpora graficos Radeon Vega 8 el 3200G llega y ofrece 4 CPU fisicos y 4 Virtuales, capaces de alcanzar velocidades de  hasta 4GHz', 5, 1, 'Micro Procesador RYZEN 3 3200G', 'true', '13158.00', 'public/img/Hardware/4.jpg', 'img/Hardware/Max/4.jpg', 0, 0),
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
(18, 'Audifonos Cloud con sonido envolvente 7.1 y con microfono con cancelacion de ruido', 1, 3, 'HyperX Cloud II Gaming Headset', 'false', '210000.00', 'public/img/Perifericos/17.jpg', 'img/Perifericos/Max/17.jpg', 0, 1),
(19, 'Mouse ?ptico ideal para viedojuegos, cuenta con el sensor Pixart pmw 3360', 10, 3, 'Zowie Gear FK2 Wired', 'false', '12250.00', 'public/img/Perifericos/18.jpg', 'img/Perifericos/Max/18.jpg', 0, 1),
(20, 'Dise?o Ergon?mico exclusivamente para usuarios diestros', 10, 3, 'Zowie Gear ZA11 Wired', 'false', '13000.00', 'public/img/Perifericos/19.jpg', 'img/Perifericos/Max/19.jpg', 0, 1),
(21, 'Alfombrilla de raton Logitech G240 de tela para juegos para juegos de bajo DPI', 9, 3, 'Logitech G240 ', 'false', '3500.00', 'public/img/Perifericos/20.jpg', 'img/Perifericos/Max/20.jpg', 0, 1),
(22, 'FURY S cuenta con bordes con costura uniforme antidesgaste para una mayor resistencia.', 1, 3, 'HyperX Fury S L', 'false', '3799.00', 'public/img/Perifericos/21.jpg', 'img/Perifericos/Max/21.jpg', 0, 1),
(23, 'Ofrece m?s espacio para el movimiento del mouse, cuenta con un receptor USB se puede guardar en la parte posterior del teclado para facilitar el transporte.', 9, 3, 'Logitech G915 Mechanical Gaming Keyboard', 'false', '29500.00', 'public/img/Perifericos/22.jpg', 'img/Perifericos/Max/22.jpg', 0, 1),
(24, 'Interruptores rojos lineales: garantizados para 50 millones de pulsaciones de teclas, los interruptores rojos proporcionan un movimiento uniforme y uniforme sin ning?n golpe.', 11, 3, 'SteelSeries Apex 7 Mechanical Gaming Keyboard', 'false', '42000.00', 'public/img/Perifericos/23.jpg', 'img/Perifericos/Max/23.jpg', 0, 1),
(26, 'Primera prueba', 1, 1, 'Alta desde ABM', 'false', '222.00', ' public/img/Hardware/WhatsApp Image 2021-08-06 at 1.06.06 PM.jpeg', 'img/Hardware/Max/WIN_20210701_19_49_28_Pro.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_campo_dinamico`
--

CREATE TABLE `productos_campo_dinamico` (
  `id_producto_campo_dinamico` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_campo_dinamico` int(11) NOT NULL,
  `value` varchar(250) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_campo_dinamico`
--

INSERT INTO `productos_campo_dinamico` (`id_producto_campo_dinamico`, `id_producto`, `id_campo_dinamico`, `value`, `nombre`, `estado_activo`) VALUES
(1, 1, 1, 'Velocidad de lectura 550 MB/s', '', 1),
(2, 1, 1, 'Velocidad de escritura 500 MB/s', '', 1),
(3, 1, 1, 'test3', '', 0),
(4, 5, 1, 'Apto overclock', '', 1),
(6, 1, 1, 'Tipo serial ATA', '', 0),
(7, 1, 1, 'Colo Rojo', '', 0),
(8, 16, 1, 'Excel gratis de por vida', '', 1),
(9, 16, 1, 'Word por 12 meses', '', 1),
(10, 16, 1, 'Testeo tercer item', '', 0);

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
(0, 'Usado', 1),
(1, 'Nuevo', 1),
(6, 'A reparar', 0);

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
(3, 'Daniela', 'Lema', 'comentarios.daniela@kyz.com.ar', '635291f581573aabfb587eb9ff8f3972', 3, 'dQJt8zMSS*aBzHj', 1),
(4, 'Emmanuel', 'Lopez', 'admin.emmanuel@kyz.com.ar', '47da5fc46b36c880e21309192799fa5c', 1, 'mNMA2jpWS7VbCCy', 1),
(8, 'Romina', 'Bassani', 'comentarios.romina@kyz.com.ar', '0fecc615e7f2ac48cb9db24fac571166', 3, 'RIc1ffKi13l1oE7', 1),
(11, 'Juan', 'Ramirez', 'jramirez@yz.com.ar', 'eb17ecbbb74a965f070e247d4e1179df', 2, 'uygHM1A1i*AJcY7', 1),
(12, 'Diego', 'Juarez', 'diego.juarez@kyz.com.ar', '9e68dad5830018aacba5a79783ae6e28', 4, 'LBcNuL9x22Kzk1I', 1),
(13, 'Ramiro', 'Sanguineti', 'admin.ramiro@kyz.com.ar', '2649ea15aac216ef783cc99917792cdc', 1, '5lcf5i9SB3bDMLL', 1);

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
(3, 3, 3),
(4, 4, 5),
(13, 8, 3),
(14, 11, 2),
(15, 12, 4),
(16, 13, 5);

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
(1, 'Gestion de Usuarios', 'userAdd'),
(2, 'Gestion de Productos', 'productEdit'),
(3, 'Gestion de Comentarios', 'commentAccecs'),
(4, 'Gestion de Rotulos', 'labelAcces'),
(5, 'Control Absoluto', 'fullAdmin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campos_dinamicos`
--
ALTER TABLE `campos_dinamicos`
  ADD PRIMARY KEY (`id_campos_dinamicos`);

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
-- Indices de la tabla `comentarios_campo_dinamico`
--
ALTER TABLE `comentarios_campo_dinamico`
  ADD PRIMARY KEY (`id_comentario_campo_dinamico`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `type` (`type`);

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
-- Indices de la tabla `productos_campo_dinamico`
--
ALTER TABLE `productos_campo_dinamico`
  ADD PRIMARY KEY (`id_producto_campo_dinamico`),
  ADD KEY `listarProductos` (`id_producto`),
  ADD KEY `listarCampos` (`id_campo_dinamico`);

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
-- AUTO_INCREMENT de la tabla `campos_dinamicos`
--
ALTER TABLE `campos_dinamicos`
  MODIFY `id_campos_dinamicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `comentarios_campo_dinamico`
--
ALTER TABLE `comentarios_campo_dinamico`
  MODIFY `id_comentario_campo_dinamico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos_campo_dinamico`
--
ALTER TABLE `productos_campo_dinamico`
  MODIFY `id_producto_campo_dinamico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id_sub_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios_visibilidad`
--
ALTER TABLE `usuarios_visibilidad`
  MODIFY `id_usuario_visibilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `visibilidad`
--
ALTER TABLE `visibilidad`
  MODIFY `id_visibilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios_campo_dinamico`
--
ALTER TABLE `comentarios_campo_dinamico`
  ADD CONSTRAINT `comentarios_campo_dinamico_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_campo_dinamico_ibfk_2` FOREIGN KEY (`type`) REFERENCES `campos_dinamicos` (`id_campos_dinamicos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_campo_dinamico`
--
ALTER TABLE `productos_campo_dinamico`
  ADD CONSTRAINT `productos_campo_dinamico_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_campo_dinamico_ibfk_2` FOREIGN KEY (`id_campo_dinamico`) REFERENCES `campos_dinamicos` (`id_campos_dinamicos`) ON DELETE CASCADE ON UPDATE CASCADE;

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
