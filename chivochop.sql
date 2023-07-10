-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2023 a las 19:40:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chivochop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `talla` varchar(250) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `id_producto`, `id_user`, `cantidad`, `talla`, `estado`) VALUES
(3, 14, 8, 1, 'XS', ''),
(4, 17, 8, 3, 'L', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_fecha`
--

CREATE TABLE `carrito_fecha` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `img`) VALUES
(12, 'Fernan El Crack', '9.99', '¡¡¡¡CHORIZO CARAJOOOOO!!!', 'chorizo-fernanfloo.jpg'),
(13, 'Camisa de botones Morada', '19.99', 'Solo para belicones', 'producto2.png'),
(14, 'Fortnite T-Shirt', '10.99', 'Me encanta el fortnite, lo juego todos los días', '33d3eec43fed46d993d9c8cd88a3156e.webp'),
(15, 'Camisa F1', '35.00', 'Camisa tematica sobre el equipo redbull racing', 'zul_pl_2022-Red-Bull-Racing-Kids-Team-T-Shirt-18181_1.webp'),
(16, 'Gorra F1 RB', '119.99', 'Gorra tematica sobre el equipo redbull racing', '816tdHHkbmL._AC_UY1100_.jpg'),
(17, 'Jersey Ja Morant', '79.99', 'Its a paradise inside my city YEAH', 'Nike_Ja_Morant_Memphis_Grizzlies_Statement_Edition_Swingman_Jersey_DO9531-422_Blue_hover.webp'),
(18, 'Messi T-Shirt ', '50.00', 'La camisa de la selección del G.O.A.T Messi', 'WWCPH014.jpg'),
(19, ' Short tipo Jeans', '19.99', 'Para andar comodo o comoda en tus salidas', 'istockphoto-498252412-612x612.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `email`, `pass`, `rol`) VALUES
(2, 'Marcelo', 'marcelo@gmail.com', '12345', 'admin'),
(3, 'saz', 'saz@gmail.com', '123', 'user'),
(4, 'renecito', 'renecito@gmail.com', '123', 'user'),
(5, 'ivan', 'ivan@gmail.com', '123', 'user'),
(6, 'chele', 'chele@gmail.com', '12345', 'user'),
(7, 'Mayra', 'mayra@gmail.com', '123', 'user'),
(8, 'Axellll', 'axel@gmail.com', '12345', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
