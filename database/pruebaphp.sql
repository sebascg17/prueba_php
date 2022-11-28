
--
-- Base de datos: `pruebaphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `descripcion`) VALUES
(1, 'Café de mañana'),
(2, 'Premium'),
(3, 'Café de origen'),
(4, 'Café con leche'),
(5, 'Café descafeinado'),
(6, 'Cremadores de café');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(200) COLLATE utf8_bin NOT NULL,
  `referencia` varchar(200) COLLATE utf8_bin NOT NULL,
  `precio` float NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `estado`, `fecha_c`) VALUES
(7, 'JUAN VALDEZ', 'JV-1564898', 10000, '90', 2, 0, 0, '2022-11-26 22:25:21'),
(8, 'COLCAFE 3EN1', 'CCF-59159', 3000, '50', 2, 0, 0, '2022-11-26 23:12:59'),
(9, 'NESCAFE', 'NCF-1548456', 5000, '80', 3, 50, 1, '2022-11-26 23:52:19'),
(10, 'TOSTAO', 'TT-687687687', 8000, '55', 1, 45, 1, '2022-11-28 18:38:13'),
(11, 'COLCAFE', 'CC-56456', 6500, '1', 1, 0, 0, '2022-11-28 18:48:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `vendidos` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `id_producto`, `vendidos`, `valor`) VALUES
(40, 7, 2, 20000),
(41, 7, 43, 430000),
(42, 11, 2, 13000),
(43, 11, 1, 6500),
(44, 8, 3, 9000),
(45, 8, 3, 9000),
(46, 8, 3, 9000),
(47, 8, 2, 6000),
(48, 8, 2, 6000),
(49, 8, 1, 3000),
(50, 8, 6, 18000),
(51, 10, 5, 40000),
(52, 9, 5, 25000),
(53, 9, 10, 50000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_categorias_producto` (`categoria`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `producto_producto_ventas` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `categorias_categorias_producto` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `producto_producto_ventas` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
