-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-08-2017 a las 12:02:00
-- Versión del servidor: 5.5.52-MariaDB
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `directorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE IF NOT EXISTS `trabajadores` (
  `id_usuario` int(100) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `cel` varchar(100) DEFAULT NULL,
  `extencion` varchar(100) NOT NULL,
  `puesto` text,
  `dependencia` text
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_usuario`, `nombre`, `apellidos`, `cel`, `extencion`, `puesto`, `dependencia`) VALUES
(1, 'Humberto', 'Romero y Pelayo ', '1561', '1561', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(2, 'Marisol', 'Camacho Quevedo ', '1561', '1561', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(3, 'Paulina', 'Cota ', '3100', '3100', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(4, 'Nancy Vianey', 'Espinoza Garcia ', '1564', '1564', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(5, 'Carmen Alicia', 'Mungarro Cota', '1562', '1562', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(6, 'Luis Donaldo', 'Ochoa ', '1562', '1562', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(7, 'JosÃ© Alfredo', 'JuÃ¡rez Vega ', '0', '44-38179', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(8, 'Eva Lilia', 'Esparza Soto', '1589', '1589', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(9, 'Sergio', 'Rivera', '1589', '1589', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(10, 'Refugio', 'Sandoval Rochin ', '1571', '1571', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(11, 'Carmen AÃ­da', 'MillÃ¡n LÃ³pez', '1568', '1568', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(12, 'Juan Manuel', 'JimÃ©nez Cervantes', '1568', '1568', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(13, 'Juan Manuel ', 'Carrillo Rojo ', '6672224438', '1572 y 38178', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(14, 'Edith', 'Gonzalez Vega', '1572', '1572', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(15, 'Joel YabÃ­n', 'DÃ­az Soto', '1595', '1595', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(16, 'Oscar Vladimir', 'Meza Camacho', '1571', '1571', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(17, 'Martin', 'Barajas Coronado', '1571', '1571', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(18, 'Miguel Adolfo', 'Quintero Morales', '6672327609', '44-38166', 'Asistente A', 'SecretarÃ­a de InnovaciÃ³n'),
(19, 'kenia', 'Murillo Aguilar', '38166', '38166', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(20, 'JosÃ© Manuel', 'Cazarez Alderete', '1595', '1595', 'JEFE DE DEPARTAMENTO', 'SecretarÃ­a de InnovaciÃ³n'),
(21, 'Manuel Alfredo', 'Aguirre GonzÃ¡lez', '1582', '1582', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(22, 'Rafael', 'Macias fuentes', '1576', '1578', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(23, 'Carlos', 'Sandoval Castellanos', '1578', '1578', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(25, 'Rafael', 'Macias NuÃ±ez', '3756', '3756', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(26, 'Alfonso', 'Duarte JÃ­menez', '44-38160', '44-38160', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(27, 'Alfredo', 'Escalante Moreno', '1583', '1583', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(28, 'JesÃºs Fernando', 'BeltrÃ¡n RodrÃ­guez', '3754', '3754', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(29, 'SaÃºl', 'RodrÃ­guez GarcÃ­a', '1584', '1584', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(31, 'JosÃ© Angel', 'Bernal Coca', '6672036597', '1592, (44)38167', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(32, 'Enrique Oliver', 'AvilÃ©s Manzanares', '3754', '3754', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(33, 'NoÃ©', 'SÃ¡nchez Camacho', '1586', '1586', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(34, 'Edgardo', 'Puga CastaÃ±os', '1576', '1576', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(35, 'Julio CÃ©sar', 'Morales Ibarra', '3759', '3759', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(36, 'Ramona', 'Ortega Jimenez', '1596', '1596', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(37, 'Isidro', 'Urias Montoya', '1596', '1596', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(38, 'Alejandra Lizeth', 'Madero Cota', '44-38180', '44-38180', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(39, 'Wilber', 'Flores LÃ³pez', 'SOPORTE', '38171', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(40, 'Marco ', 'Arizmendi VelÃ¡zquez', '1596', '1596', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(41, 'Rosa Graciela', 'Gutierrez Carreras', '1596', '1596', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(42, 'MarÃ­a Elena Guadalupe', 'Vazquez Borrego', '44-38156', '44-38156', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(43, 'Ricardo', 'Cristerna SÃ¡nchez', '3759', '3759', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(44, 'Omar Antonio', 'Guerrero Zavala', '1566', '1566', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(45, 'Manuela Yuriana', 'DÃ­az MillÃ¡n', '1566', '1566', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(46, 'Magdalena', 'Flores Vega', '1566', '1566', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(47, 'HÃ©ctor Enrique', 'NÃ¡jera Careaga', '3720', '3720', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(48, 'Jenifer', 'Favela', '3720', '3720', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(49, 'Cristina Jakeline', 'Mungia Quintero', '1569', '1569', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(50, 'Dennise', 'Castilla Gastelum', '3345', '3345', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(51, 'Julio CÃ©sar', 'SolÃ­s VelÃ¡zquez', '1570', '1570', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(53, 'Fernando', 'Ruz Flores', '1569', '1569', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(54, 'Claudia', 'BojÃ³rquez Palma', '1590', '1590', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(55, 'Gabriel Armando', 'Ontiveros CataÃ±o', '1753', '1753', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(56, 'Alba Elena', 'Escalante Moreno', '1071', '1072', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(57, 'Rolando', 'Palazuelos', '1849', '1849', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(58, 'Cesar', 'Lugo Medrano', '1918', '1918', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(59, 'Anabel', 'Palazuelos Zazueta', '1947', '1947', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(60, 'Patricia', 'Rea Castro', '1908 ', '1908 ', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(61, 'Isis', 'Carrasco LeÃ³n', '1907', '1931', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(62, 'Sandra ', 'Angulo Cazarez', '1946', '1946', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(63, 'Roberto RamÃ³n', 'RodrÃ­guez Ochoa', '44-38110', '44-38110', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(64, 'Lourdes Guadalupe', 'Barrancas Uriarte', '1917', '1917', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(65, 'Alfredo', 'Barron Soto', '1904', '1904', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(66, 'JosÃ© Manuel', 'Yassen Campomanes', '1907', '1907', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(67, 'Benjamin', 'Berrelleza Aldapa', '1907', '1907', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(68, 'Jorge Walterio', 'Palazuelos Garibaldi', '3755', '3755', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(69, 'Isela Elizabeth', 'BeltrÃ¡n Vega', '1847', '1847', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(70, 'Joaquin', 'Amarillas Medina', '1949', '1949', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(71, 'Eduardo', 'Avitia Aguilar', '44-38153', '44-38153', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(72, 'Miguel Angel ', 'Noriega Niebla', '38162', '3754', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(73, 'Renee Francisco', 'Torrontegui Petrix', '44-38187', '44-38187', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(74, 'JosÃ© de JesÃºs', 'GÃ¡lvez CÃ¡zarez', '1070', '1070', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(75, 'Brenda', 'Rodriguez', '0000', '44-38802', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(77, 'JosÃ© Ricardo', 'Cristerna Sanchez', NULL, '38191', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(78, 'HÃ©ctor MartÃ­n', 'Acedo Quezada', '(44)38174', '(44)38174', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(79, 'Alberto Vladimir', 'Ramirez Mira', '6671320505', '1596', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(80, 'JosÃ© RamÃ³n', 'Romero Ochoa', '1921', '1921', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(81, 'PRISCY', 'LOPEZ', NULL, '3759', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(83, 'Rocio Adriana', 'RodrÃ­guez VillagÃ³mez', '1907', '1931', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(84, 'Esau Heli', 'Zazueta Niebla', NULL, '38801', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(85, 'Joel Yabin', 'Diaz Soto', '1595', '1595', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(88, 'Ana karina ', 'Ochoa Galindo', '38185', '1573', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(90, 'Jorge Manuel', 'Fierro Bonifant', NULL, '38189', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(91, 'Contact Center', 'Contact Center', '38190', '38190', NULL, 'SecretarÃ­a de InnovaciÃ³n'),
(92, 'Ahida Yamilette', 'Mancilla Ontiveros', '3345', '3345', 'Jefe de departamento ', 'SecretarÃ­a de InnovaciÃ³n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `apellidos` (`apellidos`(100));

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
