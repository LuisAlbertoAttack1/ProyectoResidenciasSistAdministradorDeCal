-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2024 a las 13:45:33
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
-- Base de datos: `sac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_alumno`
--

CREATE DATABASE sac;
USE sac;

CREATE TABLE `t_alumno` (
  `id_alumno` int(11) NOT NULL,
  `fk_persona` int(11) NOT NULL,
  `fk_carrera` int(11) NOT NULL,
  `semestre` int(11) NOT NULL DEFAULT 1,
  `fecha_ingreso` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_carrera`
--

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

--
-- Volcado de datos para la tabla `t_ciclo_escolar`
--

INSERT INTO `t_ciclo_escolar` (`id_ciclo_escolar`, `inicio`, `fin`) VALUES
(1, 2015, 2016),
(2, 2016, 2017),
(3, 2017, 2018),
(4, 2018, 2019),
(5, 2019, 2020),
(6, 2020, 2021),
(7, 2021, 2022),
(8, 2022, 2023),
(9, 2023, 2024);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_domicilio`
--

CREATE TABLE `t_domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `domicilio` varchar(450) NOT NULL,
  `municipio` varchar(250) NOT NULL,
  `poblado` varchar(250) NOT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_domicilio`
--

INSERT INTO `t_domicilio` (`id_domicilio`, `domicilio`, `municipio`, `poblado`, `fk_usuario`) VALUES
(1, 'calle #15', 'nnknk', 'nonn', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_formato_uno`
--

CREATE TABLE `t_formato_uno` (
  `id_formato_uno` int(11) NOT NULL,
  `fk_horario` int(11) NOT NULL,
  `falta1` int(11) NOT NULL,
  `falta2` int(11) NOT NULL,
  `falta3` int(11) NOT NULL,
  `falta_total` int(11) NOT NULL,
  `cal1` double NOT NULL,
  `cal2` double NOT NULL,
  `cal3` double NOT NULL,
  `cal_sum` double NOT NULL,
  `cal_final` double NOT NULL,
  `nom_alumno` varchar(355) NOT NULL,
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_formato_uno`
--

INSERT INTO `t_formato_uno` (`id_formato_uno`, `fk_horario`, `falta1`, `falta2`, `falta3`, `falta_total`, `cal1`, `cal2`, `cal3`, `cal_sum`, `cal_final`, `nom_alumno`, `sexo`) VALUES
(1, 3, 7, 7, 7, 7, 10, 10, 10, 30, 10, 'test', 'H'),
(2, 3, 9, 9, 9, 9, 9, 9, 9, 27, 9, 'test2', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horario`
--

CREATE TABLE `t_horario` (
  `id_horario` int(11) NOT NULL,
  `fk_materia` int(11) NOT NULL,
  `lunes` varchar(15) NOT NULL,
  `martes` varchar(15) NOT NULL,
  `miercoles` varchar(15) NOT NULL,
  `jueves` varchar(15) NOT NULL,
  `viernes` varchar(15) NOT NULL,
  `semestre` int(11) NOT NULL,
  `fk_ciclo_escolar` int(11) NOT NULL,
  `grupo` varchar(255) NOT NULL,
  `fk_carrera` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_horario`
--

INSERT INTO `t_horario` (`id_horario`, `fk_materia`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `semestre`, `fk_ciclo_escolar`, `grupo`, `fk_carrera`, `fk_usuario`) VALUES
(3, 18, '-', '09:30-10:20', '-', '10:20-11:10', '-', 2, 9, 'test', 2, 24);

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
  `apellido_materno` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL DEFAULT 'I'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `nombre`, `apellido_paterno`, `apellido_materno`, `sexo`) VALUES
(1, 'Maria De Lourdes', 'Martinez', 'Anzures', 'I'),
(2, 'Lizeth', 'Labarrios', 'Medina', 'I'),
(8, 'Diana', 'Perez', 'Nolasco', 'I'),
(9, 'Marina', 'Ramirez', 'Vallejo', 'I'),
(10, 'Maria Luisa', 'Cortes', 'Soto', 'I'),
(11, 'Edith', 'Cayetano', 'Zamora', 'I'),
(12, 'Maria Fernanda', 'Ledo', 'Jalpa', 'I'),
(13, 'Michel', 'Martinez', 'Sandoval', 'I'),
(14, 'Virginia', 'Urbina', 'Hernandez', 'I'),
(15, 'Blanca Estela', 'Vega', 'Teran', 'I'),
(16, 'Roman', 'Velazquez', 'Carmona', 'I'),
(17, 'Roberto', 'Alonso', 'Quiroz', 'I'),
(18, 'Gonzalo', 'Gonzalo', 'Arellano', 'I'),
(19, 'Lucia', 'Avila', 'Martinez', 'I'),
(20, 'Maribel', 'Arenas', 'Toledano', 'I'),
(21, 'Emilio', 'Castañeda', 'Alcantara', 'I'),
(22, 'Selene', 'Castillo', 'Camacho', 'I'),
(23, 'Leticia', 'Castro', 'Camacho', 'I'),
(24, 'Pascual', 'Cayetano', 'Vela', 'I'),
(25, 'Marco Antonio', 'Cervantes', 'Aparicio', 'I'),
(26, 'Martha', 'Galicia', 'Hernandez', 'I'),
(27, 'Berenice', 'Galicia', 'Vazquez', 'I'),
(28, 'Janet', 'García', 'Espejel', 'I'),
(29, 'David', 'Garcia', 'Garcia', 'I'),
(30, 'Norma', 'Garrido', 'Garrido', 'I'),
(31, 'Veronica', 'Hernandez', 'Rivero', 'I'),
(32, 'Julio Esteban', 'Islas', 'Reyes', 'I'),
(33, 'Marco Antonio', 'Lopez', 'Rojas', 'I'),
(34, 'Martha Leticia', 'Martinez', 'Leon', 'I'),
(35, 'Nancy', 'Meza', 'Cruz', 'I'),
(36, 'Sandra Ivonne', 'Neri', 'Talavera', 'I'),
(37, 'Eva', 'Perez', 'Lara', 'I'),
(38, 'David Mauro', 'Perez', 'Villegas', 'I'),
(39, 'Maria Del Carmen', 'Ramirez', 'Mejia', 'I'),
(40, 'Faustino', 'Rojas', 'Bautista', 'I'),
(41, 'Maria Angelica', 'Rojas', 'Rodriguez', 'I'),
(42, 'John', 'Salas', 'Garcia', 'I'),
(43, 'Linda Adoracion', 'Saldraña', 'Xolalpa', 'I'),
(44, 'Geminiano Arturo', 'Sanchez', 'De tagle', 'I'),
(45, 'Ricardo', 'Silva', 'Garcia', 'I'),
(46, 'Maria Lizeeth', 'Tapia', 'Nava', 'I'),
(47, 'Enedina', 'Valeriano', 'López', 'I'),
(48, 'Pedro', 'Vargas', 'Delgado', 'I'),
(49, 'Maday', 'Velasco', 'Huitron', 'I'),
(50, 'Marisa', 'Xala', 'Hernandez', 'I');

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
(5, 'Docente.DianaPN', '$2y$10$07jcKRFYD5UxQTJsNBfn7e5f9rkHqXW48lXAx4znc7hlk/xpWXZqy', 3, 8, 2),
(6, 'Docente.MarianaRV', '$2y$10$Xxqk0jTdyH0pE/zdz8hlq.leqFd4hac0PgNHA9gWrL1S60S5Sbqli', 3, 9, 2),
(7, 'Docente.MariaLuisaCS', '$2y$10$RfqJen4TZQAEvz3tFtgM3.Iv3lqj3X8LpoC301TceDj6aThYHQRx2', 3, 10, 2),
(8, 'Docente.EdithCZ', '$2y$10$/LPUgK6ZRSfHkJXR13kHN.77lLPUpln6309DAN0uLgutQp7i69mYi', 3, 11, 2),
(9, 'Docente.MariaFernandaLJ', '$2y$10$YyQrgwPqwz7KkUXnA6wI8uE1YxiMHge/PIiAsZNQ7OKNgFimvl3sy', 3, 12, 2),
(10, 'Docente.MichelMS', '$2y$10$aQ9x0HsVET8TvysCepnN/emkuCZ1OGGB9y7fGHXtMinCas0FYZM82', 3, 13, 2),
(11, 'Docente.VirginiaUH', '$2y$10$6Xp0AlVbCGnr/6WabW63Ieec4/VnEEgf9cu5La4tBQ7N5NQFDMxAK', 3, 14, 2),
(12, 'Docente.BlancaEstelaVT', '$2y$10$GJFahY9zyGLMRSjRZvJohOjbI5K.dPkwdP2JhgP/4mX/HAPgVYCzm', 3, 15, 2),
(13, 'Docente.RomanVC', '$2y$10$XNk9pVV4KsMnNve.QIPBe.ToLWfq9xiEWQxd6jEfArM895QzW.xja', 3, 16, 2),
(14, 'Docente.Roberto', '$2y$10$gBKJ63cJy0G6Hh85XsRo8OAIx3WlGRSd1YMJfb1j/Q0VcpIn/iuKS', 3, 17, 2),
(15, 'Docente.GonzaloGA', '$2y$10$SnLXGEHrlNX3Dgs8mWsUTunm3N0dUXW/jBWimyENWvCL96fWqTSz2', 3, 18, 2),
(16, 'Docente.LuciaAM', '$2y$10$6CmgDXkzY522uuCRMysLGuNsyNRWPZuF7u.urgXSnqf1xoP7m9k0q', 3, 19, 2),
(17, 'Docente.MaribelAT', '$2y$10$UmpjzuIJx.wHQAI5zVYGnORbsV6o7lAZUR14CHk8vJ67eCXIq4kJW', 3, 20, 2),
(18, 'Docente.EmilioCA', '$2y$10$KKdQofvhQ90LUm9Ow/RxhOMe.ZvZZaJJoWT5tVHA/H8LIJlrctgki', 3, 21, 2),
(19, 'Docente.SeleneCC', '$2y$10$iAMW/OlTn/8pmVW5ENTqL.pjw3za01xxL1q7aobC.OzMGomTISvLy', 3, 22, 2),
(20, 'Docente.LeticiaCC', '$2y$10$xuzj9.PLF9SDCuLknSaUaeXLwTRIR/4rhJQkqRi6arKzlVxVkrm7m', 3, 23, 2),
(21, 'Docente.PascualCV', '$2y$10$2k1p1UfAp7BZSpr4Tm60x.ntXQ67QnFb6OUeSwWXWtJ7fLJJmKwcC', 3, 24, 2),
(22, 'Docente.MarcoAntonioCA', '$2y$10$LyinpToQfmvSexZysFlbouZQsMoAVPVh56V/.uWcoOmCrily5RydO', 3, 25, 2),
(23, 'Docente.MarthaGH', '$2y$10$VVLLCK4sRMknjIiJvbJJ6.8/EnPlp.ifd.YqYMyRF4Y8vJijVifwS', 3, 26, 2),
(24, 'Docente.BereniceGV', '$2y$10$rEzuJIvOWtR3aFtcjeO3.uXr3dh5NAJ71wNBG4YtlGY1oozmCo9j.', 3, 27, 2),
(25, 'Docente.JanetGE', '$2y$10$ylQ.zph1SWZNVPhusHNkZOs46FUh7HmCL2ipAYJpZWiohx2gsOs/C', 3, 28, 2),
(26, 'Docente.DavidGG', '$2y$10$jV3ChDZgUMBbXCmnIyZa1eONzaXr2k7OtWsn.ezbhG9DCYklZMDb6', 3, 29, 2),
(27, 'Docente.NormaGG', '$2y$10$AXHRNFDGA4hNo0kcvNoz/eW8lJAgnJHUIr5DKM.SCpzYgqN8PRJ5i', 3, 30, 2),
(28, 'Docente.VeronicaHR', '$2y$10$/Qc5yM/15JgXDD2K.Tz2Iu0.00malCxHTGSUVblThUm5lXh016s56', 3, 31, 2),
(29, 'Docente.JulioEstebanIR', '$2y$10$sH5ingV9b/jcpgBrgwIlgeabqfuUEWJ.tX94tOQ7EFmhj/xVGQ/fG', 3, 32, 2),
(30, 'Docente.MarcoAntonioLR', '$2y$10$b0ced.H40YOPiAILlEtQJ.Cvy9ERMhjw1vfv9OUny56iDg34dVAVm', 3, 33, 2),
(31, 'Docente.MarthaLeticiaML', '$2y$10$j0WPgRgMztesDU.6ymJ1Au6iRAxX./k9IPw5PwHLdmpAiZ4jNFQOC', 3, 34, 2),
(32, 'Docente.NancyMC', '$2y$10$fXHxpNkwl0tB77F.J6C.ZeN53hKG3tA083GMT/rTaTSE7gcIHrOom', 3, 35, 2),
(33, 'Docente.SandraIvoneNT', '$2y$10$Mq01d0yVTkLn7v2rxMRFOeyHutPkdU0gMDDEUyNqrnEBc8lahleoO', 3, 36, 2),
(34, 'Docente.EvaPL', '$2y$10$pT2ogJHcT8gTLt.ofpDLSOW8AWH8gi6zZnXnhG9PEgPa1dsFcPIZO', 3, 37, 2),
(35, 'Docente.DavidMauro', '$2y$10$Uh5rgg9yShNX.KVjHwDO0uz67oxwv4IMj4EsD7b9P5pdXf/VPc7/e', 3, 38, 2),
(36, 'Docente.MariaDelCarmenRM', '$2y$10$MbB72z0nrex/WmUHdOxRr.Bhqc8WqX.3Ox2JmmHHN5bNJWI7V0vcS', 3, 39, 2),
(37, 'Docente.FaustinoRB', '$2y$10$XS.Oxwl1u.uWb2nibT8Ad.A5Nujvu0ljy9fQS3EmT89EtEIEAJ7Bq', 3, 40, 2),
(38, 'Docente.MariaAngelicaRR', '$2y$10$x6VFBrlG1pR4yhI1e/y2v.Y5018Pv6NWt.Cm0MX2Qpp5o79MFkHDm', 3, 41, 2),
(39, 'Docente.JohnSG', '$2y$10$sz0SgPkVNk.EtEQLlT0SmeqiDmJc7OIpDUaooVexZUSG.Sm3yOpV.', 3, 42, 2),
(40, 'Docente.LindaAdoracionSX', '$2y$10$HF0VaY7G8LWbcmwW1lyFVu8npOuk4HZtKbIeYOlIBwmVQ/AwFPHQe', 3, 43, 2),
(41, 'Docente.GeminianoArturoST', '$2y$10$0/VP2mEmReddccSve024SOyYhosSRR0JF12xumONRLjEtxMnGOUBy', 3, 44, 2),
(42, 'Docente.RicardoSG', '$2y$10$AUFgAsybMcB8SUWo0fyeG.AseL8.oYUjf7yQWPkI81BtUX.VdNkz.', 3, 45, 2),
(43, 'Docente.MariaLizeethTN', '$2y$10$EuTT1i57jqgDhh1HfxTb5.9i7O8LDKwJHUlpLj8zJjX5gnAm1WjKK', 3, 46, 2),
(44, 'Docente.EnedinaVL', '$2y$10$H0i1msH/kbQLmdrOldO/s.GK8F/WRlOIiWam8EWBZVpaR13FglTsO', 3, 47, 2),
(45, 'Docente.PedroVD', '$2y$10$HGQIIn1io/0o0vsU49Ao2uiHG8ZRHeiVQNIEuoecP/Ho6zeJ1pk2a', 3, 48, 2),
(46, 'Docente.MadayVH', '$2y$10$xYqwPkhkl3n0.QDW/0gpnOs/t2I6vOeD0Du85uyZf1BfTnKh6pnIm', 3, 49, 2),
(47, 'Docente.MarisaXH', '$2y$10$jKBGxaOz7HWqZ6q1b6nsZ.IQ89n3uy/gjgIjDeQA9R/82f2Srnqjm', 3, 50, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_alumno`
--
ALTER TABLE `t_alumno`
  ADD PRIMARY KEY (`id_alumno`);

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
-- Indices de la tabla `t_domicilio`
--
ALTER TABLE `t_domicilio`
  ADD PRIMARY KEY (`id_domicilio`);

--
-- Indices de la tabla `t_formato_uno`
--
ALTER TABLE `t_formato_uno`
  ADD PRIMARY KEY (`id_formato_uno`);

--
-- Indices de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  ADD PRIMARY KEY (`id_horario`);

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
-- AUTO_INCREMENT de la tabla `t_alumno`
--
ALTER TABLE `t_alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_ciclo_escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_domicilio`
--
ALTER TABLE `t_domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_formato_uno`
--
ALTER TABLE `t_formato_uno`
  MODIFY `id_formato_uno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_materia`
--
ALTER TABLE `t_materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
