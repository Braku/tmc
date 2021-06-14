-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2021 a las 06:45:05
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tmcdatabase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `foto`, `id_post`) VALUES
(8, 'Fast and Furious', 'banners/fastandfurious.jpg', 52),
(13, 'Zack Snyderâ€™s Justice League', '../banners/justiceleague.jpg', 58),
(14, 'Harry Potter y la cÃ¡mara secreta', '../banners/hp.jpg', 59),
(15, 'Star Wars', '../banners/Sin tÃ­tulo.png', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `contenido` varchar(300) NOT NULL,
  `autor` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `contenido`, `autor`, `id_post`, `fecha`) VALUES
(1, 'Muy buena reseña, totalmente cierto que se pasaron de lanza con los guiones de todas las peliculas despues de la 3', 1, 52, '2021-06-06 18:37:53'),
(2, 'Estoy totalmente de acuerdo en la postura que tomas, pero te faltaron algunos puntos de vista', 1, 59, '2021-06-07 12:59:31'),
(5, 'Muy buena reseÃ±a :)', 1, 59, '2021-06-07 14:30:02'),
(6, 'Opino diferente, tus puntos no me parecen muy validos', 1, 52, '2021-06-07 14:30:52'),
(7, 'Buena reseÃ±a', 1, 58, '2021-06-07 16:19:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(4) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `resenia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `resenia`) VALUES
(52, 'Fast and Furious', 'En esta pelicula o mas bien, saga de peliculas se puede observar un desarrollo impresionande por parte de los personajes y sus profesiones. Ya que comenzaron siendo simples corredores de carreras a ser espias internacionales.'),
(58, 'Zack Snyderâ€™s Justice League', 'El Snyder Cut es una de las pelÃ­culas mÃ¡s esperadas de la historia, sobre todo porque es una que parecÃ­a imposible que viera la luz. SÃ­, esta pelÃ­cula no deberÃ­a existir y sin embargo existe. Se impuso a un estudio que buscaba crear una pelÃ­cula familiar, muy alejada a la visiÃ³n original de Snyder; se impuso a las tragedias familiares del director y se impuso al peor villano del universo cinematogrÃ¡fico de DC Comics: Joss Whedon.\r\nÂ¿CÃ³mo pasÃ³ esto? Todo fue gracias a los fans, a su buena organizaciÃ³n e insistencia. Antes de iniciar la pelÃ­cula aparece Snyder para agradecer a los fans por hacer su visiÃ³n realidad y yo tambiÃ©n lo agradezco porque es la primera vez en mucho tiempo que la fanaticada se impone para hacer el bien, apoyar algo que ama, rescatar algo que les interesa de una forma â€œno tÃ³xicaâ€. Que se dieron cuenta de que lo que tenÃ­an, que de raÃ­z estaba mal y se esforzaron por traer algo que ellos pensaban que estaba bien, que sÃ­ amaban. Eso es lo que deben hacer los fans: apoyar lo que aman, no hundir todo lo que no pueden poseer.'),
(59, 'Harry Potter y la cÃ¡mara secreta', 'Harry Potter y la cÃ¡mara secreta comienza a fines de verano en la casa de los Dursley, donde Harry pasa sus dÃ­as, esperando cartas de sus amigos, que no llegan, y contando los dÃ­as para el comienzo de su segundo aÃ±o en Hogwarts, el Colegio de Magia y HechicerÃ­a. \r\nComo de costumbre, los Dursley le hacen pasar los dÃ­as mÃ¡s terribles y desgraciados de su existencia. Una noche en la que sus tÃ­os tienen unas visitas importantes, Harry se va a su habitaciÃ³n a fingir que no existe, pero notarÃ¡ que hay algo diferente, y que nada mÃ¡s y nada menos, se encuentra con un elfo domÃ©stico sentado en su cama. Y es que Dobby, ha roto todas las normas posibles para ir a dÃ³nde Harry para advertirle que no debe volver a Hogwarts porque en este nuevo aÃ±o escolar se avecinan cosas terribles. Al oÃ­r esto Harry se pone como loco, imaginate no quieren que vaya al colegio, Dobby hace lo imposible con tal de que no pueda ir, incluyendo un desastre con las visitas de sus tÃ­os. A consecuencia de esto, TÃ­o Vernon pone barrotes en su ventana, pero lo que Vernon no se espera es que lleguen los chicos Weasley al rescate de Harry en un coche volador.'),
(60, 'Star Wars', 'Buena pelicula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(1) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'colab');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contra` varchar(32) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contra`, `mail`, `rol`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 1),
(2, 'Baruk', 'baruk', 'barukbumer@gmail.com', 2),
(5, 'juan', 'juan', 'juan2@gmail.com', 2),
(4, 'juan', 'juan', 'juan@gmail.com', 2),
(3, 'juan', 'juan', 'juan@gmial.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`mail`),
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
