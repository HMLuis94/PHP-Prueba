
--
-- Base de datos: `indra_prueba`
--
CREATE DATABASE IF NOT EXISTS `indra_prueba`;
USE `indra_prueba`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `dni` varchar(10)  NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `clientes_productos`
--

CREATE TABLE `clientes_productos` (
  `id` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes_productos`
--
ALTER TABLE `clientes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codcliente` (`cod_cliente`),
  ADD KEY `codproductos` (`cod_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);


--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes_productos`
--
ALTER TABLE `clientes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;


--
-- Filtros para la tabla `clientes_productos`
--
ALTER TABLE `clientes_productos`
  ADD CONSTRAINT `codcliente` FOREIGN KEY (`cod_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `codproductos` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


