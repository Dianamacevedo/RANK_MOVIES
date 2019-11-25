-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2019 a las 00:41:02
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rak_moviles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `ID_GENERO` int(7) NOT NULL,
  `GENERO` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`ID_GENERO`, `GENERO`) VALUES
(1, 'AVENTURA'),
(2, 'COMEDIA'),
(3, 'DRAMA'),
(4, 'TERROR'),
(6, 'CIENCIA FICCION'),
(7, 'ACCION'),
(8, 'INFANTILES'),
(10, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `ID_PELICULAS` int(7) NOT NULL,
  `NOM_PELI` varchar(100) NOT NULL,
  `DESC_PELI` varchar(150) DEFAULT NULL,
  `ID_GENERO` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`ID_PELICULAS`, `NOM_PELI`, `DESC_PELI`, `ID_GENERO`) VALUES
(1, 'Gintama', 'Película proveniente de japón, tratando de una espada.', 1),
(2, 'Profesor en Goenlandia', 'película recomendada para todo tipo de edad, proveniente de Francia.', 1),
(3, 'Dragon 3', 'película para todo tipo de edad, tratada de dos dragones que se enamoran.', 1),
(4, 'Turbulencia Zombi', 'Película recomendada parra mayores de 16 años.', 2),
(5, 'Dedicada a mi ex', 'Recomendada para mayores de 7 años.', 2),
(6, 'Malefica', 'Recomendada para mayores de 7 años.', 1),
(7, 'Un día lluvioso en Nueva york', 'Recomendada para mayores de 12 años.', 2),
(8, 'Feliz Cumpleaños', 'Recomendada para mayores de 15 Años', 2),
(9, 'la Maldición de la Ouija', 'Recomendada para  mayores de 12 Años', 4),
(10, 'Downton Abbey', 'Recomendada para mayores de 12 Años', 3),
(11, 'Huerfanos de Brooklyn', 'Recomendada para mayores de 12 años', 3),
(12, 'Terminator', 'Recomendada para mayores de 15 años', 7),
(13, 'El rey leon', 'Para todas las edades', 8),
(14, 'Playmobil', 'Para todo el publico', 10),
(15, 'Afuera del tiempo', 'Recomendada para mayores de 7 años', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE `voto` (
  `ID_VOTO` int(11) NOT NULL,
  `VOTO` int(2) NOT NULL,
  `ID_PELICULA` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `voto`
--

INSERT INTO `voto` (`ID_VOTO`, `VOTO`, `ID_PELICULA`) VALUES
(1, 5, 1),
(2, 3, 2),
(3, 2, 3),
(4, 2, 3),
(5, 5, 2),
(6, 4, 1),
(7, 5, 6),
(8, 5, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_GENERO`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`ID_PELICULAS`),
  ADD UNIQUE KEY `NOM_PELI` (`NOM_PELI`),
  ADD KEY `PELICULAS_fk0` (`ID_GENERO`);

--
-- Indices de la tabla `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`ID_VOTO`),
  ADD KEY `VOTO_fk0` (`ID_PELICULA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_GENERO` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `ID_PELICULAS` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `voto`
--
ALTER TABLE `voto`
  MODIFY `ID_VOTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `PELICULAS_fk0` FOREIGN KEY (`ID_GENERO`) REFERENCES `genero` (`ID_GENERO`);

--
-- Filtros para la tabla `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `VOTO_fk0` FOREIGN KEY (`ID_PELICULA`) REFERENCES `peliculas` (`ID_PELICULAS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
