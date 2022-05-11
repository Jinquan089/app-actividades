-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2022 a las 15:42:30
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id` int(11) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `descripcion` longtext NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `likes` smallint(6) NOT NULL,
  `fecha_su` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_foto`
--

INSERT INTO `tbl_foto` (`id`, `foto_user`, `user_id`, `descripcion`, `titulo`, `likes`, `fecha_su`) VALUES
(1, 'jin.jpg', 1, '', '', 11, '2022-05-11 06:35:58'),
(2, 'pepe.jpg', 1, '', '', 0, '2022-05-11 06:35:58'),
(3, 'twitter-cronologia-vida-homer-simpson.jpg', 1, '', '', 3, '2022-05-11 06:35:58'),
(4, 'amarilloc.jpg', 1, '', '', 1, '2022-05-11 06:38:05'),
(5, 'cat-gato.gif', 2, '', '', 0, '2022-05-11 06:47:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_megusta`
--

CREATE TABLE `tbl_megusta` (
  `id` int(11) NOT NULL,
  `foto_me` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_megusta`
--

INSERT INTO `tbl_megusta` (`id`, `foto_me`, `user`) VALUES
(87, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_userlogin`
--

CREATE TABLE `tbl_userlogin` (
  `id` int(11) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `password_login` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_userlogin`
--

INSERT INTO `tbl_userlogin` (`id`, `user_login`, `password_login`) VALUES
(1, 'jin', '123'),
(2, 'pepe', '123'),
(3, 'xinnuo', '123321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `tbl_megusta`
--
ALTER TABLE `tbl_megusta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_me` (`foto_me`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_megusta`
--
ALTER TABLE `tbl_megusta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD CONSTRAINT `tbl_foto_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_userlogin` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_megusta`
--
ALTER TABLE `tbl_megusta`
  ADD CONSTRAINT `tbl_megusta_ibfk_1` FOREIGN KEY (`foto_me`) REFERENCES `tbl_foto` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_megusta_ibfk_2` FOREIGN KEY (`user`) REFERENCES `tbl_userlogin` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
