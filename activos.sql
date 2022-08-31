--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-06-2022 a las 13:31:02
-- Versión del servidor: 5.7.38-cll-lve
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS = 0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- ----------------------------------------------------------------------------
-- Schema activos_DataBase
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `activos` ;
CREATE SCHEMA IF NOT EXISTS `activos` ;
USE `activos` ;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `activos`.`modulos` (`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modulo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id` (`id` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`modulo`, `descripcion`) VALUES
('Usuarios', 'CRUD Usuarios'),
('Roles', 'CRUD Roles'),
('Configuracion', ''),
('Permisos', 'Modulo donde se conceden o niegan los accesos de los roles')

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `activos`.`permisos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `ins` tinyint(4) NOT NULL,
  `updt` tinyint(4) NOT NULL,
  `dlt` tinyint(4) NOT NULL,
  `vw` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id` (`id` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_rol`, `id_modulo`, `ins`, `updt`, `dlt`, `vw`) VALUES
(3, 1, 0, 0, 0, 0),
(3, 2, 0, 0, 0, 0),
(3, 3, 1, 1, 1, 1),
(3, 4, 0, 0, 0, 0),
(1, 1, 1, 1, 1, 1),
(1, 2, 1, 1, 1, 1),
(1, 3, 1, 1, 1, 1),
(1, 4, 1, 1, 1, 1),
(2, 1, 1, 0, 0, 1),
(2, 2, 0, 0, 0, 0),
(2, 3, 1, 1, 1, 1),
(2, 4, 1, 1, 0, 1)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `activos`.`roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rol` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id` (`id` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol`, `descripcion`, `estado`) VALUES
('Administrador', '', 1),
('Supervisor', '', 1),
('Operador', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `activos`.`sesiones` (
  `id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `datos` text CHARACTER SET latin1 NOT NULL,
  `ultimo_acceso` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `datos`, `ultimo_acceso`) VALUES
('ul6q38f22joqqsb19njvqn303d', 'token_csrf|s:40:\"88e3ac2264a06339fddf1a1df8dad5326ab80039\";idUsuario|i:1;', 1649688563);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `activos`.`usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_rol` int(15) NOT NULL,
  `token` varchar(254) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaCreado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id` (`id` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `correo`, `pass`, `id_rol`, `token`, `fechaCreado`, `estado`) VALUES
('Reinaldo Blanco', 'reinaldo.blanco@rbservicios.cl', '$2y$10$neWF56BCrNKzZZCilP.dm.NEGC6ekTZH1jaYhZGGgSrgfCxKi5qFa', 1, '', '2022-05-21 15:58:20', 1)

--
-- Índices para tablas volcadas
--

-- Indices de la tabla `modulos`
--
-- ALTER TABLE `modulos`
--   ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD KEY `fk_permiso_rol` (`id_rol`),
  ADD KEY `fk_permiso_modulo` (`id_modulo`);

--
-- Indices de la tabla `roles`
--
-- ALTER TABLE `roles`
--   ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesiones`
--
-- ALTER TABLE `sesiones`
--   ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
-- ALTER TABLE `usuarios`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
-- ALTER TABLE `modulos`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
-- ALTER TABLE `permisos`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
-- ALTER TABLE `roles`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
-- ALTER TABLE `usuarios`
--   MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_permiso_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permiso_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
