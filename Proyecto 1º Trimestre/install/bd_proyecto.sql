-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2022 a las 19:28:44
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

CREATE TABLE `comunidades` (
  `codComunidad` int(4) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comunidades`
--

INSERT INTO `comunidades` (`codComunidad`, `nombre`) VALUES
(1, 'Andalucía'),
(2, 'Aragón'),
(3, 'Asturias (Principado de)'),
(4, 'Balears (IIles)'),
(5, 'Canarias'),
(6, 'Cantabria'),
(7, 'Castilla-La Mancha'),
(8, 'Castilla y León'),
(9, 'Cataluña'),
(10, 'Comunidad Valenciana'),
(11, 'Extremadura'),
(12, 'Galicia'),
(13, 'Madrid (Comunidad de)'),
(14, 'Murcia (Región de)'),
(15, 'Navarra (Comunidad Foral de)'),
(16, 'País Vasco'),
(17, 'Rioja (La)'),
(18, 'Ceuta'),
(19, 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `cod` int(5) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `codComunidad` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`cod`, `nombre`, `codComunidad`) VALUES
(1, 'Alava', 16),
(2, 'Albacete', 7),
(3, 'Alicante', 10),
(4, 'Almería', 1),
(5, 'Avila', 8),
(6, 'Badajoz', 11),
(7, 'Balears (Illes)', 4),
(8, 'Barcelona', 9),
(9, 'Burgos', 8),
(10, 'Cáceres', 11),
(11, 'Cádiz', 1),
(12, 'Castellón', 10),
(13, 'Ciudad Real', 7),
(14, 'Córdoba', 1),
(15, 'Coruña (A)', 12),
(16, 'Cuenca', 7),
(17, 'Girona', 9),
(18, 'Granada', 1),
(19, 'Guadalajara', 7),
(20, 'Guipzcoa', 16),
(21, 'Huelva', 1),
(22, 'Huesca', 2),
(23, 'Jaén', 1),
(24, 'León', 8),
(25, 'Lleida', 9),
(26, 'Rioja (La)', 17),
(27, 'Lugo', 12),
(28, 'Madrid', 13),
(29, 'Málaga', 1),
(30, 'Murcia', 14),
(31, 'Navarra', 15),
(32, 'Ourense', 12),
(33, 'Asturias', 3),
(34, 'Palencia', 8),
(35, 'Palmas (Las)', 5),
(36, 'Pontevedra', 12),
(37, 'Salamanca', 8),
(38, 'Santa Cruz de Tenerife', 5),
(39, 'Cantabria', 6),
(40, 'Segovia', 8),
(41, 'Sevilla', 1),
(42, 'Soria', 8),
(43, 'Tarragona', 9),
(44, 'Teruel', 2),
(45, 'Toledo', 7),
(46, 'Valencia', 10),
(47, 'Valladolid', 8),
(48, 'Vizcaya', 16),
(49, 'Zamora', 8),
(50, 'Zaragoza', 2),
(51, 'Ceuta', 18),
(52, 'Melilla', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(5) NOT NULL,
  `nif_cif` varchar(9) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `poblacion` varchar(30) DEFAULT NULL,
  `codigo_postal` int(5) DEFAULT NULL,
  `provincias` int(5) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `operario_encargado` varchar(30) DEFAULT NULL,
  `fecha_realizacion` date DEFAULT NULL,
  `anotaciones_anteriores` text NOT NULL,
  `anotaciones_posteriores` text NOT NULL,
  `fichero_resumen` varchar(100) NOT NULL,
  `foto_trabajo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nif_cif`, `nombre`, `apellidos`, `telefono`, `descripcion`, `email`, `direccion`, `poblacion`, `codigo_postal`, `provincias`, `estado`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotaciones_anteriores`, `anotaciones_posteriores`, `fichero_resumen`, `foto_trabajo`) VALUES
(1, 'V06506992', 'Rafael', 'Hinestrosa', '643890213', 'Casa Roto', 'rafael@gmail.com', 'Rociana del Condado', 'Moguer', 21006, 11, 'P', '2022-12-11', '47309935Q', '2022-12-12', 'asasasas', 'sasa', '', ''),
(2, '88228230T', 'Angelica', 'Angelica', '644890123', 'El techo se ha caido', 'angelica@gmail.com', 'Calle Candado', 'Rociana del Condado', 21720, 21, 'B', '2022-12-11', '49208121N', '2022-12-25', '', '', '', ''),
(3, '88228230T', 'Nicolae', 'Adrian', '+34644571921', 'El castillo se ha derrumbado y hay que comprar cemento', 'machismono@gmail.com', 'calle numancia', 'Rociana del Condado 9', 21720, 1, 'R', '2022-12-11', '20264587T', '2022-12-12', 'Muro Rotisimo', 'Muro Arreglado', '', ''),
(4, '49061848L', 'Andrés', 'López', '644561923', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ut iure velit iusto esse repellendus totam cupiditate Voluptatem facilis id aperiam veniam necessitatibus odit earum Labore atque quo molestias expedita0', 'correo@gmail.com', 'Calle Perdida', 'Pueblo Perdido', 21006, 20, 'B', '2022-12-11', '20264587T', '2022-12-29', '', '', '', ''),
(5, '49061848L', 'Andrés', 'López', '644561923', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ut iure velit iusto esse repellendus totam cupiditate Voluptatem facilis id aperiam veniam necessitatibus odit earum Labore atque quo molestias expedita', 'correo@gmail.com', 'Calle Perdida', 'Pueblo Perdido', 21006, 20, 'B', '2022-12-11', '47309935Q', '2022-12-29', '', '', '', ''),
(7, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', 'Lorem ', 'Lorem ', '', ''),
(8, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '47309935Q', '2022-12-15', 'Lorem ', ' Lorem ', '', ''),
(9, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '20264587T', '2022-12-15', 'Lorem ', 'Lorem ', 'Tarea-9-documentacion.pdf', 'Tarea-9-fotocasa.png'),
(10, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '20264587T', '2022-12-15', 'Lorem', 'Lorem', 'Tarea-10-documentacion.pdf', ''),
(11, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '47309935Q', '2022-12-15', 'Lorem', 'Lorem', '', ''),
(12, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(13, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(14, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(15, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'B', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(16, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(17, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(18, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(19, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(20, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(21, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(22, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(23, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(25, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(26, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(27, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(28, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(29, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(30, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(31, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(32, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(33, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(34, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(35, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(36, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(37, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(38, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'R', '2022-12-11', '49208121N', '2022-12-15', 'aa', 'aa', '', ''),
(39, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(40, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(41, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(44, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(45, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(46, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(47, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(48, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', ''),
(49, '88228230T', 'Angelica', 'Garcia', '+34644571921', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Aut culpa dolores eveniet sapiente libero est amet quas earum veniam ute ', 'machismono@gmail.com', 'Calle Numancia 9', 'Bollullos del Condado', 21006, 51, 'P', '2022-12-11', '49208121N', '2022-12-15', '', '', '', '');

--
-- Disparadores `tareas`
--
DELIMITER $$
CREATE TRIGGER `inserta_fecha` BEFORE INSERT ON `tareas` FOR EACH ROW SET new.fecha_creacion = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `es_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nif`, `nombre`, `clave`, `correo`, `telefono`, `es_admin`) VALUES
('10072953B', 'Rosa', 'Rosa2003!', 'rosas@gmail.com', '645736834', 0),
('20264587T', 'Irene Montero', '12345', 'machismono@gmail.com', '645372912', 0),
('47309935Q', 'Santiago Abascal', 'Santiago2004!', 'menasfuera@gmail.com', '644571921', 0),
('49208121N', 'Pedro Sanchez', '12345', 'pedropedrito@gmail.com', '644571921', 0),
('52926096Z', 'Alba', 'Alba2005!', 'alba@gmail.com', '644556999', 0),
('65921366P', 'Juan', 'Juan2003!', 'juan@gmail.com', '645327845', 0),
('66017650Z', 'Mariano Rajoy', '12345', 'sandidadprivada@gmail.com', '906784563', 1),
('67000254N', 'Angélica', 'Angelica30$', 'angelica@gmail.com', '653123512', 1),
('76193744B', 'Victor', 'Victor200!', 'victor@gmail.com', '+34644571921', 1),
('82700661K', 'Corvo Attano', 'Corvo2005!', 'corvo@gmail.com', '655333222', 1),
('84043231N', 'Mihai Eminescu', 'Mihai1932!', 'mihai@gmail.com', '642234567', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`codComunidad`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `comAutonoma_fk` (`codComunidad`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operarioEncargado` (`operario_encargado`),
  ADD KEY `provincias` (`provincias`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nif`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `comAutonoma_fk` FOREIGN KEY (`codComunidad`) REFERENCES `comunidades` (`codComunidad`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`provincias`) REFERENCES `provincias` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
