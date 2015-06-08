-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2015 a las 19:23:10
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19
 
---
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `barcos`
--
CREATE DATABASE IF NOT EXISTS `barcos` DEFAULT CHARACTER SET latin1 COLLATE utf8_spanish_ci;
USE `barcos`;

-- ----------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nick` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_ganadas` int(11) NOT NULL,
  `p_perdidas` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `peticion` int(11) NOT NULL,
  `tablero` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_partida` int(11) NOT NULL,
  PRIMARY KEY (`nick`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nick`, `password`, `id`, `p_ganadas`, `p_perdidas`, `estado`, `peticion`, `tablero`, `id_partida`) VALUES
('asd', 'asd', 3, 0, 0, 1, 1, '', 0),
('balls', '123', 5, 0, 0, 0, 0, '', 0),
('hola', 'asd', 4, 0, 0, 0, 0, '', 0),
('jaime', 'jaimerg', 1, 0, 0, 3, 3, '[["0","0","0","0","0","0","0","0","0","0"],["0","0","0","0","0","0","0","0","0","0"],["0","0","0","0","0","1","1","1","0","0"],["0","0","0","0","0","0","0","0","0","0"],["0","0","1","0","0","0","0","0","0","0"],["0","0","1","0","0","0","0","0","0","0', 0),
('usuario', 'usuario', 6, 0, 0, 1, 0, '', 0);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `id_partida` int(11) NOT NULL AUTO_INCREMENT,
  `id_usu1` int(11) NOT NULL,
  `id_usu2` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  PRIMARY KEY (`id_partida`),
  constraint `fk_partida_usuarios` foreign key (id_usu1) references usuarios (id),
  constraint `fk_partida_usuarios2` foreign key (id_usu2) references usuarios (id),
  constraint `fk_partida_usuarios_turno` foreign key (turno) references usuarios (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`id_partida`, `id_usu1`, `id_usu2`, `turno`) VALUES
(1, 1, 3, 1);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
