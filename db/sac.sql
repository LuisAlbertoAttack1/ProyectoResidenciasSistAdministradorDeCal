-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2023 a las 07:59:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_carrera`
--

CREATE DATABASE sac;
USE sac;

CREATE TABLE `t_carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_carrera`
--

INSERT INTO `t_carrera` (`id_carrera`, `nombre_carrera`, `estado`) VALUES
(0, 'General', 1),
(1, 'Contabilidad', 1),
(2, 'Informática', 1),
(3, 'Asistido por Computadora', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_rol`
--

CREATE TABLE `t_cat_rol` (
  `id_cat_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `permiso` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_rol`
--

INSERT INTO `t_cat_rol` (`id_cat_rol`, `rol`, `permiso`) VALUES
(1, 'Subdirectora', 1),
(2, 'Servicios Escolares', 2),
(3, 'Docente', 3),
(4, 'Secretaria', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ciclo_escolar`
--

CREATE TABLE `t_ciclo_escolar` (
  `id_ciclo_escolar` int(11) NOT NULL,
  `inicio` int(11) NOT NULL,
  `fin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_docente`
--

CREATE TABLE `t_docente` (
  `id_docente` int(11) NOT NULL,
  `fk_persona` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_domicilio`
--

CREATE TABLE `t_domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `municipio` varchar(250) NOT NULL,
  `poblado` varchar(250) NOT NULL,
  `Codigo_Postal` int(11) NOT NULL,
  `calle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_materia`
--

CREATE TABLE `t_materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(250) NOT NULL,
  `fk_carrera` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `creditos` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_materia`
--

INSERT INTO `t_materia` (`id_materia`, `nombre_materia`, `fk_carrera`, `horas`, `creditos`, `semestre`, `estado`) VALUES
(1, 'Lengua y Comunicación I', 0, 3, 6, 1, 1),
(3, 'Ingles I', 0, 3, 6, 1, 1),
(5, 'Pensamiento Matemático I', 0, 4, 8, 1, 1),
(6, 'Humanidades I', 0, 4, 8, 1, 1),
(7, 'Cultura Digital I', 0, 3, 4, 6, 1),
(8, 'La Materia Y Sus Interacciones', 0, 4, 8, 1, 1),
(9, 'Ciencias Sociales I', 0, 2, 4, 1, 1),
(10, 'Dinámicas Productivas Regionales', 0, 4, 8, 1, 1),
(11, 'Igualdad de Generó I', 0, 1, 2, 1, 1),
(12, 'Orientación Educativa I', 0, 1, 2, 1, 1),
(13, 'Recursos Socioemocionales I\r\nActividades Físicas y Deportivas', 0, 2, 4, 1, 1),
(14, 'Recursos Socioemocionales I\r\nEducación Para La Salud', 0, 1, 2, 1, 1),
(15, 'Lengua y Comunicación II', 0, 3, 6, 2, 1),
(16, 'Inglés II', 0, 3, 6, 2, 1),
(17, 'Pensamiento Matemático II', 0, 4, 8, 2, 1),
(18, 'Ciencias Sociales II', 0, 2, 4, 2, 1),
(19, 'Cultura Digital II', 0, 2, 4, 2, 1),
(20, 'La Conservación de la Energía y su Interacción Con La Materia', 0, 4, 8, 2, 1),
(21, 'La Conservación De La Energía Y Su Interacción Con LA Matería', 1, 4, 8, 2, 1),
(22, 'Módulo I\r\nSubmódulo I. Registra Información Contable De Documentos Fuente De Entidades Económicas', 1, 5, 10, 2, 1),
(23, 'Módulo I\r\nSubmódulo II. Registra Operaciones Mediante Métodos De Control De Mercancías', 1, 5, 10, 2, 1),
(24, 'Módulo I\r\nSubmódulo III. Formula Estados Financieros De Las Empresas', 1, 3, 6, 2, 1),
(25, 'Módulo I\r\nSubmódulo IV. Instrumenta La Practica', 1, 2, 4, 2, 1),
(26, 'Módulo I\r\nSubmódulo V. Diferencia El Perfil Profesional En EL Escenario Real', 1, 2, 4, 2, 1),
(27, 'Recursos Socioemocionales II\r\nActividades Físicas Y Deportivas', 0, 2, 4, 2, 1),
(28, 'Recursos Socioemocionales II\r\nEducación para la Salud', 0, 1, 2, 2, 1),
(29, 'Igualdad De Género II', 0, 1, 2, 2, 1),
(31, 'Lenguaje y Comunicación III', 0, 3, 6, 3, 1),
(32, 'Inglés III', 0, 3, 6, 3, 1),
(33, 'Pensamiento Matemático III', 0, 4, 8, 3, 1),
(34, 'Humanidades II', 0, 4, 8, 3, 1),
(35, 'Ecosistemas: Interacciones, Energía Y Dinámica', 0, 4, 8, 3, 1),
(36, 'Módulo II\r\nSubmódulo I. Registra Información Contable En Forma Electrónica', 1, 5, 10, 3, 1),
(37, 'Módulo II\r\nSubmódulo II. Registra Información De Los Recursos Materiales', 1, 4, 8, 3, 1),
(38, 'Módulo II\r\nSubmódulo III. Registra Información De Los Recursos Financieros', 1, 4, 8, 3, 1),
(39, 'Módulo II\r\nSubmódulo IV. Problematiza La Práctica', 1, 2, 4, 3, 1),
(40, 'Módulo II\r\nSubmódulo V. Aplica Los Aprendizajes En Una Actividad Laboral', 1, 2, 4, 3, 1),
(41, 'Recursos Socioemocionales III\r\nActividades Físicas Y Deportivas', 0, 2, 4, 3, 1),
(42, 'Recursos Socioemocionales 3\r\nEducación Para La Salud', 0, 1, 2, 3, 1),
(43, 'Igualdad De Género III', 0, 1, 2, 3, 1),
(44, 'Orientación Educativa II', 0, 1, 2, 3, 1),
(45, 'Conciencia Histórica I. Perspectivas Del México Antiguo En Los Contextos Globales', 0, 3, 6, 4, 1),
(46, 'Inglés IV', 0, 3, 6, 4, 1),
(47, 'Temas Selectos De Matemáticas I', 0, 4, 8, 4, 1),
(48, 'Ciencias Sociales III', 0, 2, 4, 4, 1),
(49, 'Reacciones Químicas: Conservación De La Materia En La Formación De Nuevas Sustancias', 0, 4, 8, 4, 1),
(50, 'Módulo III\r\nSubmódulo I. Maneja Técnicas Para El Registro Y Control De Los Elementos De Costos', 1, 5, 10, 4, 1),
(51, 'Módulo III\r\nSubmódulo II. Estructura Y Registra Información Contable De Entidades Fabriles ', 1, 4, 8, 4, 1),
(52, 'Módulo III\r\nSubmódulo III. Genera Nóminas En Forma Electrónica', 1, 4, 8, 4, 1),
(53, 'Módulo III\r\nSubmódulo IV. Sistematiza Y Gestiona Proyectos 1', 1, 2, 4, 4, 1),
(54, 'Módulo III\r\nSubmódulo V. Demuestra Las Habilidades En Un Puesto Laboral', 1, 2, 4, 4, 1),
(55, 'Recursos Socioemocionales IV\r\nActividades Artísticas Y Culturales', 0, 2, 4, 4, 1),
(56, 'Recursos Socioemocionales IV\r\nEducación Integral En Sexualidad', 0, 1, 2, 4, 1),
(57, 'Conciencia Histórica II\r\nMéxico Durante El Expansionismo Capitalista', 0, 3, 6, 5, 1),
(58, 'Inglés V', 0, 5, 10, 5, 1),
(59, 'Temas Selectos De Matemáticas II', 0, 5, 10, 5, 1),
(60, 'Temas De Ciencias Sociales ', 0, 3, 6, 5, 1),
(61, 'La Energía En Los Procesos De La Vida Diaria', 0, 4, 8, 5, 1),
(62, 'Módulo IV\r\nSubmódulo I. Aplica Las Disposiciones Para El Pago De Contribuciones De Personas Físicas ', 1, 3, 6, 5, 1),
(63, 'Módulo IV\r\nSubmódulo II. Genera Información Fiscal De Personas Físicas Y Morales', 1, 3, 6, 5, 1),
(64, 'Módulo IV\r\nSubmódulo III. Aplica Las Disposiciones Para El Pago De Contribuciones De Personas Morales', 1, 2, 4, 5, 1),
(65, 'Módulo IV\r\nSubmódulo IV. Sistematiza Y Gestiona Proyectos 2', 1, 2, 4, 5, 1),
(66, 'Módulo IV\r\nSubmódulo V. Explica Los Saberes De Un Proceso Productivo', 1, 2, 4, 5, 1),
(67, 'Recursos Socioemocionales V\r\nActividades Artísticas Y Culturales', 0, 2, 4, 5, 1),
(68, 'Recursos Socioemocionales V\r\nPráctica Y Colaboración Ciudadana', 0, 1, 2, 5, 1),
(69, 'Igualdad De Género V\r\n', 0, 1, 2, 5, 1),
(70, 'Orientación Educativa III', 0, 1, 2, 5, 1),
(71, 'Conciencia Histórica III\r\nLa Realidad Actual En Perspectiva Histórica', 0, 3, 6, 6, 1),
(72, 'Literatura', 0, 3, 6, 6, 1),
(73, 'Temas Selectos De Matemáticas III', 0, 5, 10, 6, 1),
(74, 'Humanidades III', 0, 5, 10, 6, 1),
(75, 'Organismos: Estructuras Y Procesos, Herencia Y Evolución Biológica', 0, 4, 8, 6, 1),
(76, 'Módulo V\r\nSubmódulo I. Realiza La Estadía', 1, 10, 20, 6, 1),
(77, 'Módulo V\r\nSubmódulo II. Estructura Los Elementos Teórico-Metodológicos Del Proyecto Académico Laboral', 1, 2, 4, 6, 1),
(78, 'Recursos Socioemocionales VI\r\nActividades Artísticas Y Culturales', 0, 2, 4, 6, 1),
(79, 'Recursos Socioemocionales VI\r\nPráctica Y Colaboración', 0, 1, 2, 6, 1),
(80, 'Igualdad De Género VI\r\n', 0, 1, 2, 6, 1),
(81, 'Orientación Educativa VI', 0, 1, 2, 6, 1),
(82, 'Igualdad De Género IV', 0, 1, 2, 4, 1),
(83, 'Módulo I\r\nSubmódulo I. Desarrolla Software Utilizado Programación Estructurada', 2, 7, 14, 2, 1),
(84, 'Módulo I\r\nSubmódulo II. Diseña Y Administra Base De Datos Simples', 2, 6, 12, 2, 1),
(85, 'Módulo I\r\nSubmódulo III. Instrumenta La Práctica', 2, 2, 4, 2, 1),
(86, 'Módulo I\r\nSubmódulo IV. Diferencia El Perfil Profesional En El Escenario Real', 2, 2, 4, 2, 1),
(87, 'Módulo II\r\nSubmódulo I. Desarrolla Software De Aplicación Utilizando Programación Orientada A Objetos ', 2, 8, 16, 3, 1),
(88, 'Módulo II\r\nSubmódulo II. Diseña Y Administra Base De Datos Avanzadas', 2, 5, 10, 3, 1),
(89, 'Módulo II\r\nSubmódulo III. Problematiza La Práctica', 2, 2, 4, 3, 1),
(90, 'Módulo II\r\nSubmódulo IV. Aplica Los Aprendizajes En Una Actividad Laboral ', 2, 2, 4, 3, 1),
(91, 'Módulo III\r\nSubmódulo I. Desarrolla Aplicaciones Web', 2, 5, 10, 4, 1),
(92, 'Módulo III\r\nSubmódulo II. Desarrolla Aplicaciones Móviles', 2, 4, 8, 4, 1),
(93, 'Módulo III\r\nSubmódulo III. Administra Y Configura Plataformas De Elearging', 2, 4, 8, 4, 1),
(94, 'Módulo III\r\nSubmódulo IV. Sistematiza Y Gestiona Proyectos I', 2, 2, 4, 4, 1),
(95, 'Módulo III\r\nSubmódulo V. Demuestra Las Habilidades En Un Puesto Laboral', 2, 2, 4, 4, 1),
(96, 'Módulo IV\r\nSubmódulo I. Administra Sistemas Operativos', 2, 3, 6, 5, 1),
(97, 'Módulo IV\r\nSubmódulo II. Instala Y Configura Aplicaciones Y Servicios', 2, 3, 6, 5, 1),
(98, 'Módulo IV\r\nSubmódulo III. Desarrolla Soluciones De Comercio Electrónico', 2, 2, 4, 5, 1),
(99, 'Módulo IV\r\nSubmódulo IV. Sistematiza Y Gestiona Proyectos II', 2, 2, 4, 5, 1),
(100, 'Módulo IV\r\nSubmódulo V. Explica Los Saberes De Un Proceso Productivo', 2, 2, 4, 5, 1),
(101, 'Módulo V\r\nSubmódulo I. Realiza La Estadía', 2, 10, 20, 6, 1),
(102, 'Módulo V\r\nSubmódulo II. Estructura Los Elementos Teóricos Metodológicos Del Proyecto Académico Laboral', 2, 2, 4, 6, 1),
(103, 'Módulo I\r\nSubmódulo I. Realiza Ilustraciones', 3, 5, 10, 2, 1),
(104, 'Módulo I\r\nSubmódulo II. Dibuja Objetos Vectoriales', 3, 5, 10, 2, 1),
(105, 'Módulo I\r\nSubmódulo III. Dibuja Gráficos Para Animación', 3, 3, 6, 2, 1),
(106, 'Módulo I\r\nSubmódulo IV. Instrumenta La Práctica', 3, 2, 4, 2, 1),
(107, 'Módulo I\r\nSubmódulo V. Diferencia El Perfil Profesional En El Escenario Real', 3, 2, 4, 2, 1),
(108, 'Módulo II\r\nSubmódulo I. Produce Elementos Gráficos PAra KA Comunicación Visual', 3, 4, 8, 3, 1),
(109, 'Módulo II\r\nSubmódulo I. Produce Elementos Digitales Para LA Comunicación Visual ', 3, 4, 8, 3, 1),
(110, 'Módulo II\r\nSubmódulo III. Produce Animaciones Para Aplicaciones Multimedia', 3, 5, 10, 3, 1),
(111, 'Módulo II\r\nSubmódulo IV. Problematiza La Práctica', 3, 2, 4, 3, 1),
(112, 'Módulo II\r\nSubmódulo V. Aplica Los Aprendizajes En Una Actividad Laboral ', 3, 2, 4, 3, 1),
(113, 'Módulo III\r\nSubmódulo I. Obtiene Imágenes Fijas Para El Diseño', 3, 4, 8, 4, 1),
(114, 'Módulo III\r\nSubmódulo II. Realiza Maquetación De Medios Gráficos', 3, 5, 10, 4, 1),
(115, 'Módulo III\r\nSubmódulo III. Obtiene Imágenes En Movimiento Para Multimedia', 3, 4, 8, 4, 1),
(116, 'Módulo III\r\nSubmódulo IV. Sistematiza Y Gestiona Proyectos I', 3, 2, 4, 4, 1),
(117, 'Módulo III\r\nSubmódulo V. Demuestra Las Habilidades En Un Puesto Laboral ', 3, 2, 4, 4, 1),
(118, 'Módulo IV\r\nSubmódulo I. Diseña Objetos Tridimensionales', 3, 4, 8, 5, 1),
(119, 'Módulo IV\r\nSubmódulo II. Construye Objetos Virtuales En 3D', 3, 4, 8, 5, 1),
(120, 'Módulo IV\r\nSubmódulo III. Sistematiza Y Gestiona Proyectos II', 3, 2, 4, 5, 1),
(121, 'Módulo IV\r\nSubmódulo IV. Explica Los Saberes De Un Proceso Productivo', 3, 2, 4, 5, 1),
(122, 'Módulo V\r\nSubmódulo I. Realiza La Estadía ', 3, 10, 20, 6, 1),
(123, 'Módulo V\r\nSubmódulo II. Estructura Los Elementos Teóricos Metodológicos Del Proyecto Académico Laboral ', 3, 2, 4, 6, 1),
(124, 'Prueba2', 1, 3, 5, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `nombre`, `apellido_paterno`, `apellido_materno`) VALUES
(1, 'Maria De Lourdes', 'Martinez', 'Anzures'),
(2, 'Lizeth', 'Labarrios', 'Medina'),
(7, 'diego', 'bollas', 'paredes'),
(8, 'Diana', 'Perez', 'Nolasco'),
(9, 'Yakumo', 'Saito', 'Uchiha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(800) NOT NULL,
  `fk_cat_rol` int(11) NOT NULL,
  `fk_persona` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`id_usuario`, `usuario`, `password`, `fk_cat_rol`, `fk_persona`, `estado`) VALUES
(1, 'Mtra.LourdesMtz', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', 1, 1, 2),
(2, 'Mtra.LizethLabarriosMedina', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', 2, 2, 2),
(5, 'Docente.DianaPerez', '$2y$10$4TPoUL0n3orz0Y3n6tSuu.toOaMhm7WT5KjZ6IHeKYIfYnuIvUqFC', 3, 8, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_carrera`
--
ALTER TABLE `t_carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `t_cat_rol`
--
ALTER TABLE `t_cat_rol`
  ADD PRIMARY KEY (`id_cat_rol`);

--
-- Indices de la tabla `t_ciclo_escolar`
--
ALTER TABLE `t_ciclo_escolar`
  ADD PRIMARY KEY (`id_ciclo_escolar`);

--
-- Indices de la tabla `t_docente`
--
ALTER TABLE `t_docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `t_domicilio`
--
ALTER TABLE `t_domicilio`
  ADD PRIMARY KEY (`id_domicilio`);

--
-- Indices de la tabla `t_materia`
--
ALTER TABLE `t_materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_carrera`
--
ALTER TABLE `t_carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_cat_rol`
--
ALTER TABLE `t_cat_rol`
  MODIFY `id_cat_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_ciclo_escolar`
--
ALTER TABLE `t_ciclo_escolar`
  MODIFY `id_ciclo_escolar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_docente`
--
ALTER TABLE `t_docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_domicilio`
--
ALTER TABLE `t_domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_materia`
--
ALTER TABLE `t_materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
