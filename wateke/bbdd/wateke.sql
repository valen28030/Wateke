-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2024 a las 18:09:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wateke`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_city` int(11) NOT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_city`, `city`) VALUES
(1, 'Madrid'),
(2, 'Barcelona'),
(3, 'Valencia'),
(4, 'Sevilla'),
(5, 'Zaragoza'),
(6, 'Málaga'),
(7, 'Murcia'),
(8, 'Palma'),
(9, 'Las Palmas de Gran Canaria'),
(10, 'Bilbao'),
(11, 'Alicante'),
(12, 'Córdoba'),
(13, 'Valladolid'),
(14, 'Vigo'),
(15, 'Gijón'),
(16, 'Hospitalet de Llobregat'),
(17, 'Vitoria-Gasteiz'),
(18, 'La Coruña'),
(19, 'Granada'),
(20, 'Elche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discotecas`
--

CREATE TABLE `discotecas` (
  `id_discoteca` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `estilo_musica` varchar(100) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `pagina_web` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `discotecas`
--

INSERT INTO `discotecas` (`id_discoteca`, `nombre`, `direccion`, `ciudad`, `id_city`, `estilo_musica`, `id_genero`, `pagina_web`) VALUES
(1, 'Silikona', 'Pza. del encuentro N1', 'Madrid', 1, 'reggaeton', 4, 'https://www.instagram.com/salasilikona/?hl=es'),
(2, 'Moondance', 'C. de la aduana 21', 'Madrid', 1, 'reggaeton', 4, 'https://www.moondancemadrid.com/'),
(3, 'Sala B', 'C. de Trafalgar, 6', 'Madrid', 1, 'reggaeton', 4, 'https://www.fourvenues.com/es/sala-b'),
(4, 'Teatro Kapital', 'C. de Atocha, 125', 'Madrid', 1, 'reggaeton', 4, 'https://teatrokapital.com/'),
(5, 'Shoko', 'C. de Toledo, 86', 'Madrid', 1, 'reggaeton', 4, 'https://shokomadrid.com/'),
(6, 'La Cartuja', 'C. de la Cruz, 10', 'Madrid', 1, 'reggaeton', 4, 'https://lacartujamadrid.com/#calendar@'),
(7, 'The Bassement', 'C. de Galileo, 26', 'Madrid', 1, 'techno', 11, 'https://bassmntclub.com/'),
(8, 'LAB theCLUB', 'Estación de Chamartín Planta Ático', 'Madrid', 1, 'techno', 11, 'https://www.labtheclub.com/'),
(9, 'Fabrik', 'Av. de la Industria, 82', 'Madrid', 1, 'techno', 11, 'https://fabrikclub.com/'),
(10, 'X Private Club', 'C. de la Cerámica, 76', 'Madrid', 1, 'techno', 11, 'https://www.instagram.com/xprivateclub/?hl=es'),
(11, 'Octogon', 'C. de la Cerámica, 16', 'Madrid', 1, 'techno', 11, 'https://www.instagram.com/octogon360/?hl=es'),
(12, 'Mondo Disko', 'C. de Alcalá, 20', 'Madrid', 1, 'techno', 11, 'https://www.mondodisko.es/'),
(13, 'Goya Social Club', 'Calle de Goya, 43, Salamanca, 28001 Madrid', 'Madrid', 1, 'techno', 11, 'https://goyasocialclub.com/'),
(14, 'Specka', 'C. de Orense, 26, bajos, Tetuán, 28020 Madrid', 'Madrid', 1, 'techno', 11, 'https://www.specka.es/'),
(15, 'Stardust Club', 'C. de Isabel la Católica, 6, Centro, 28013 Madrid', 'Madrid', 0, 'techno', 11, 'http://www.stardustclub.es/'),
(16, 'Club Trueno', 'C. de los Jardines, 3, Centro, 28013 Madrid', 'Madrid', 1, 'techno', 11, 'https://salaelsol.com/'),
(17, 'Siroco', 'C. de San Dimas, 3, Centro, 28015 Madrid', 'Madrid', 1, 'techno', 11, 'https://siroco.es/'),
(18, 'Cassette Club', 'C. de Tetuán, 27, Centro, 28013 Madrid', 'Madrid', 1, 'techno', 11, 'https://www.cassetteclubmadrid.es/'),
(19, 'Stella', 'C. de Arlabán, 7, Centro, 28014 Madrid', 'Madrid', 1, 'techno', 11, 'https://m.facebook.com/pages/category/Dance---Night-Club/Stella-Club-497379157281040/?locale2=es_ES'),
(20, 'El Sótano', 'C. de las Maldonadas, 6, Centro, 28005 Madrid', 'Madrid', 1, 'techno', 11, 'https://www.salaelsotano.com/'),
(21, 'Ballesta Club', 'C. de la Ballesta, 12, Centro, 28004 Madrid', 'Madrid', 1, 'techno', 11, 'https://es.ra.co/promoters/83635'),
(22, 'Hangar 48', 'C. de Bailén, 24, Centro, 28005 Madrid', 'Madrid', 1, 'techno', 11, 'https://www.hangar48.es/'),
(23, 'Lula Club', 'C.Gran Vía, 54, Centro, 28013 Madrid', 'Madrid', 1, 'techno', 11, 'https://lula.club/'),
(24, 'Soniquete', 'C. de Boix y Morer, 22, Chamberí, 28003 Madrid', 'Madrid', 1, 'techno', 11, 'https://www.facebook.com/groups/146596602139731/?locale=es_ES'),
(25, 'Studio76', 'C. de la Cerámica, 68, Puente de Vallecas, 28038 Madrid', 'Madrid', 1, 'techno', 11, 'https://www.instagram.com/studio76ofc/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_style` int(11) NOT NULL,
  `genero` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_style`, `genero`) VALUES
(1, 'Electrónica'),
(2, 'Rock'),
(3, 'Pop'),
(4, 'Reggaeton'),
(5, 'Hip-Hop'),
(6, 'Indie'),
(7, 'Reggae'),
(8, 'Salsa'),
(9, 'Bachata'),
(10, 'Flamenco'),
(11, 'Techno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id_reseña` int(11) NOT NULL,
  `id_discoteca` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id_reseña`, `id_discoteca`, `calificacion`, `comentario`, `nombre`) VALUES
(1, 1, 2, 'Garrafon', 'Carlos'),
(16, 1, 3, 'El alcohol era horroroso', 'Agustín');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_city`);

--
-- Indices de la tabla `discotecas`
--
ALTER TABLE `discotecas`
  ADD PRIMARY KEY (`id_discoteca`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_style`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reseña`),
  ADD KEY `id_discoteca` (`id_discoteca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `discotecas`
--
ALTER TABLE `discotecas`
  MODIFY `id_discoteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_style` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reseña` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_discoteca`) REFERENCES `discotecas` (`id_discoteca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
