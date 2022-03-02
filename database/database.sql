-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2021 a las 17:31:22
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `precisoo_effiecollege`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attacheds`
--

CREATE TABLE `attacheds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `base_models`
--

CREATE TABLE `base_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_class` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Entel Perú', 'images/logo-entel.png', NULL, NULL, NULL),
(2, 'Sodimac', 'images/logo-sodimac.png', NULL, NULL, NULL),
(3, 'UNACEM', 'images/logo-unacem.png', NULL, NULL, NULL),
(4, 'Alicorp', 'images/logo-alicorp.png', NULL, NULL, NULL),
(5, 'Pilsen Trujillo', 'images/logo-pilsen.png', NULL, NULL, NULL),
(6, 'BCP', 'images/logo-bcp.png', NULL, NULL, NULL),
(7, 'Mibanco', 'images/mibanco.png', NULL, NULL, NULL),
(8, 'Tottus', 'images/tottus.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Comunicaciones', NULL, NULL, NULL),
(2, 'Marketing', NULL, NULL, NULL),
(3, 'Publicidad', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edition_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whole` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `edition_id`, `brand_id`, `description`, `brief`, `audio`, `visual`, `whole`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'https://www.entel.pe/', '', '', '', '', NULL, NULL, NULL),
(2, 1, 2, 'https://www.sodimac.com.pe/', '', '', '', '', NULL, NULL, NULL),
(3, 1, 3, 'https://www.unacem.com.pe/', '', '', '', '', NULL, NULL, NULL),
(4, 1, 5, 'https://www.pilsentrujillo.com.pe/', '', '', '', '', NULL, NULL, NULL),
(5, 1, 6, 'https://www.viabcp.com/', '', '', '', '', NULL, NULL, NULL),
(6, 2, 1, 'https://www.entel.pe/', '', '', '', '', NULL, NULL, NULL),
(7, 2, 3, 'https://www.unacem.com.pe/', '', '', '', '', NULL, NULL, NULL),
(8, 2, 4, 'https://www.alicorp.com.pe/pe/es/', '', '', '', '', NULL, NULL, NULL),
(9, 3, 1, 'https://www.entel.pe/', '', '', '', '', NULL, NULL, NULL),
(10, 3, 7, 'https://www.alicorp.com.pe/pe/es/', '', '', '', '', NULL, NULL, NULL),
(11, 3, 8, 'https://www.pilsentrujillo.com.pe/', '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `businessname`, `ruc`, `address`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Universidad de Lima', 'UNIVERSIDAD DE LIMA', '20107798049', 'Av. Javier Prado Este Nro. 4600 - Urb. Fundo Monterrico Chico - Santiago de Surco', '(01) 4376767', NULL, NULL, NULL),
(2, 'Universidad Peruana de Ciencias Aplicadas (UPC)', 'UNIVERSIDAD PERUANA DE CIENCIAS APLICADAS S.A.C.', '20211614545', 'Prolongación Primavera 2390, Lima 15023 - Urb. Monterrico - Santiago de Surco', '(01) 6303333', NULL, NULL, NULL),
(3, 'Instituto Peruano de Publicidad (IPP)', 'INSTITUTO DE EDUCACION SUPERIOR TECNOLOGICO PRIVADO \"INSTITUTO PERUANO DE PUBLICIDAD\"', '20109733092', 'Av. Juan de Aliaga Nro. 421 - Magdalena del Mar', '(01) 2727695', NULL, NULL, NULL),
(4, 'Universidad ESAN', 'UNIVERSIDAD ESAN', '20136507720', 'Jr. Alonso de Molina 1652 - Urb. Monterrico chico - Santiago de Surco', '(01) 3177200', NULL, NULL, NULL),
(5, 'Instituto Toulouse Lautrec', 'INSTITUCIONES TOULOUSE LAUTREC DE EDUCACION SUPERIOR S.A.C. - ITLS S.A.C.', '20520869655', 'Av. Primavera Nro. 607 (Oficina 508) - San Borja', '(01) 6172400', NULL, NULL, NULL),
(6, 'Pontificia Universidad Católica del Perú (PUCP)', 'PONTIFICIA UNIVERSIDAD CATOLICA DEL PERU', '20155945860', 'Av. Universitaria Nro. 1801 - Urb. Pando - San Miguel', '(01) 6262000', NULL, NULL, NULL),
(7, 'Universidad de Ciencias y Artes de América Latina (UCAL)', 'UNIVERSIDAD DE CIENCIAS Y ARTES DE AMERICA LATINA S.A.C. - UCAL S.A.C.', '20537886618', 'Av. La Molina 3755, Urb. Sol de La Molina - La Molina', '(01) 6222222', NULL, NULL, NULL),
(8, 'Universidad del Pacífico', 'UNIVERSIDAD DEL PACIFICO', '20109705129', 'Jr. Gral. Luis M. Sánchez Cerro Nro. 2141 - Jesús María', '(01) 2190100', NULL, NULL, NULL),
(9, 'Universidad Católica de Santa María', 'UNIVERSIDAD CATOLICA DE SANTA MARIA', '20141637941', 'Urb. San José s/n Umacollo', '054-382038', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cycles`
--

CREATE TABLE `cycles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cycles`
--

INSERT INTO `cycles` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Noveno', '09', NULL, NULL, NULL),
(2, 'Décimo', '10', NULL, NULL, NULL),
(3, 'Acabé en 2020-2', '11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `is_number` tinyint(1) NOT NULL,
  `is_exact` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `code`, `length`, `is_number`, `is_exact`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Doc. Nacional de Identidad', '01', 8, 1, 1, NULL, NULL, NULL),
(2, 'Carnet de extranjería', '04', 12, 0, 0, NULL, NULL, NULL),
(3, 'Reg. Único de Contribuyente', '06', 11, 1, 1, NULL, NULL, '2021-03-09 00:00:00'),
(4, 'Pasaporte', '07', 12, 0, 0, NULL, NULL, NULL),
(5, 'Partida de nacimiento-identidad', '11', 15, 0, 0, NULL, NULL, '2021-03-13 00:00:00'),
(6, 'Otros', '99', 15, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editions`
--

CREATE TABLE `editions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `editions`
--

INSERT INTO `editions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2019', NULL, NULL, NULL),
(2, '2020', NULL, NULL, NULL),
(3, '2021', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1970_01_01_000000_create_base_models_table', 1),
(2, '2014_10_12_000000_create_colleges_table', 1),
(3, '2020_05_12_190936_create_brands_table', 1),
(4, '2020_05_12_232036_create_careers_table', 1),
(5, '2020_05_12_232036_create_cycles_table', 1),
(6, '2020_05_12_232036_create_editions_table', 1),
(7, '2020_05_13_090113_create_cases_table', 1),
(8, '2020_05_13_090113_create_document_types_table', 1),
(9, '2020_05_20_153540_create_students_table', 1),
(10, '2020_05_20_153540_create_teachers_table', 1),
(11, '2020_05_27_000000_create_users_table', 1),
(12, '2020_05_28_090113_create_student_user_table', 1),
(13, '2020_05_29_210000_create_attacheds_table', 1),
(14, '2020_05_30_100000_create_password_resets_table', 1),
(15, '2020_05_31_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `student_document` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_college_id` bigint(20) UNSIGNED NOT NULL,
  `student_career_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_cycle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_lastname`, `student_email`, `student_document_type_id`, `student_document`, `student_mobile`, `student_college_id`, `student_career_id`, `student_cycle_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Roxana', 'Escate', 'rescate@preciso.pe', 1, '00000000', '975 423 987', 3, 1, 1, '2020-07-29 09:28:12', '2021-03-17 11:22:18', NULL),
(3, 'Joan', 'Borjas', 'rbejar@preciso.pe', 1, '11111111', '984 758 783', 3, 2, 2, '2020-07-29 09:28:13', '2021-03-17 11:22:18', NULL),
(4, 'Elio', 'Bachani', 'adrian@gmail.com', 1, '22222222', '999 999 999', 3, 3, 3, '2020-07-29 09:28:13', '2021-03-17 11:22:18', NULL),
(6, 'Joan', 'Borjas', '20171036@ipp.pe', 1, '71424531', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(7, 'Elio', 'Bachani', '20162020@ipp.pe', 1, '70674683', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(8, 'Camila', 'Gallardo', '20171042@ipp.pe', 1, '77131874', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(9, 'María Camila', 'Vidal', '20171066@ipp.pe', 1, '71248873', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(11, 'Camila', 'Tudela', '20161009@ipp.pe', 1, '77073359', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(12, 'Andrés', 'Chipana', '20152049@ipp.pe', 1, '70745534', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(13, 'Frida', 'Cabrera', '20161010@ipp.pe', 1, '70558582', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(14, 'María Roxana', 'Arias', '20162505@ipp.pe', 1, '74729345', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(15, 'María Isabel', 'Cavassa', '20171517@ipp.pe', 1, '72017013', '', 3, NULL, NULL, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(17, 'Farley', 'Chacalianza', 'u201520569@upc.edu.pe', 1, '76538699', '', 2, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(18, 'Jimena', 'Aranda', 'u201612564@upc.edu.pe', 1, '70616396', '', 2, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(19, 'Andrea', 'Sanjinés', 'u201611350@upc.edu.pe', 1, '72943310', '', 2, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(20, 'Carlos', 'Valdivia', 'u201522121@upc.edu.pe', 1, '48880204', '', 2, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(21, 'Fiorella', 'Best', 'u201522833@upc.edu.pe', 1, '76577762', '', 2, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(22, 'Juana', 'Zegarra', '20162001@ipp.pe', 1, '76814119', '', 3, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(23, 'Diego', 'Mesones', '20131089@ipp.pe', 1, '48205296', '', 3, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(24, 'Pablo', 'Temoche', '20161039@ipp.pe', 1, '75228037', '', 3, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(25, 'Mariana', 'Berrocal', '20162509@ipp.pe', 1, '73040536', '', 3, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(27, 'María Fernanda', 'Castrillón', '20141683@aloe.ulima.edu.pe', 1, '74447587', '', 1, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(28, 'Gianella', 'Castro', '20141686@aloe.ulima.edu.pe', 1, '77165556', '', 1, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(29, 'Greysi', 'Cebrián', '20140288@aloe.ulima.edu.pe', 1, '73189522', '', 1, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(31, 'Kevin', 'Takuma', '20111228@aloe.ulima.edu.pe', 1, '70504065', '', 1, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(32, 'Diego', 'Ponce', '20141048@aloe.ulima.edu.pe', 1, '70326592', '', 1, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(33, 'Samantha', 'Sánchez', '20152336@aloe.ulima.edu.pe', 1, '46480717', '', 1, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(34, 'Juan', 'Carranza', '20171049@ipp.pe', 1, '70268721', '', 3, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(35, 'Flavio', 'Ramos', '20152004@ipp.pe', 1, '75446456', '', 3, NULL, NULL, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(36, 'Lucía', 'Acasuzo', '20171006@ipp.pe', 1, '73091853', '', 3, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(37, 'Mitsuo', 'Higa', '20171525@ipp.pe', 1, '47431228', '', 3, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(39, 'Maricielo', 'Rodríguez', 'mjrodriguez@pucp.pe', 1, '72857366', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(40, 'Leslie', 'Caldas', 'leslie.caldas@pucp.pe', 1, '76029183', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(41, 'Jimena', 'Arce', 'a20143316@pucp.pe', 1, '73069781', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(42, 'Aracelly', 'Manchego', 'aracelly.manchego@pucp.pe', 1, '72488728', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(43, 'Diego', 'Ortega', 'dortegad@pucp.pe', 1, '74020719', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(45, 'Carmen', 'Meneses', 'carmen.meneses@pucp.pe', 1, '07093598', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(46, 'Rubí', 'Medina', 'rubi.medina@pucp.pe', 1, '72207869', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(47, 'Carlos Felipe', 'Puza', 'a20152816@pucp.pe', 1, '74415620', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(48, 'Kiara', 'Burbano', 'kburbano@pucp.pe', 1, '71426233', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(49, 'Jasmine', 'Tantaleán', 'a20140733@pucp.pe', 1, '70076332', '', 6, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(51, 'Diana', 'Ayala', 'dianaayalag@gmail.com', 1, '71305143', '', 1, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(52, 'Caleria', 'Lizaraso', 'vale_lizaraso11@hotmail.com', 1, '73190881', '', 1, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(53, 'Ronaldo', 'Ortiz', 'ronaldoandree@hotmail.com', 1, '76386746', '', 1, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(54, 'Sebastián', 'Valdivia', 'sebas.valdivia@hotmail.com', 1, '73592174', '', 1, NULL, NULL, '2020-07-29 09:28:15', '2020-07-29 09:28:15', NULL),
(55, 'Erika', 'Castro', 'erikacastrolingan@gmail.com', 1, '70384643', '', 1, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(57, 'Celso', 'Zuleta', 'u201617985@upc.edu.pe', 1, '71452062', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(58, 'Kiara', 'Yarleque', 'u201515795@upc.edu.pe', 1, '70001480', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(59, 'Nesmar', 'Galindo', 'u201513932@upc.edu.pe', 1, '70148939', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(60, 'Rodney', 'Guzman', 'u201514522@upc.edu.pe', 1, '70148939X', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(61, 'Royce', 'Chumpitaz', 'u201511197@upc.edu.pe', 1, '73390473', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(62, 'Marco', 'Morales', 'u201611219@upc.edu.pe', 1, '74741771', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(64, 'Gabriel', 'Flores', 'gabriel.flores@pucp.pe', 1, '73184348', '', 6, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(65, 'Ana', 'Berrospi', 'a.berrospic@pucp.pe', 1, '73042775', '', 6, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(66, 'Deysi', 'Melgarejo', 'dmelgarejo@pucp.pe', 1, '74231597', '', 6, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(67, 'Andrea', 'Medina', 'a20130664@pucp.pe', 1, '70001485', '', 6, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(68, 'Giuliana', 'Francis', 'groldan@pucp.pe', 1, '72649475', '', 6, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(70, 'Camila', 'León', 'u201520073@upc.edu.pe', 1, '74118910', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(71, 'Álvaro', 'Gutiérrez', 'u201610459@upc.edu.pe', 1, '72012298', '', 2, NULL, NULL, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(72, 'Berko', 'Heringman', 'u201319957@upc.edu.pe', 1, '73128548', '', 2, NULL, NULL, '2020-07-29 09:28:17', '2020-07-29 09:28:17', NULL),
(73, 'Macarena', 'Ramírez', 'u201522850@upc.edu.pe', 1, '74024234', '', 2, NULL, NULL, '2020-07-29 09:28:17', '2020-07-29 09:28:17', NULL),
(74, 'Manuel', 'Villar', 'u201511651@upc.edu.pe', 1, '74610893', '', 2, NULL, NULL, '2020-07-29 09:28:17', '2020-07-29 09:28:17', NULL),
(75, 'Nathaly', 'Alor', 'u20141a534@upc.edu.pe', 1, '72033909', '', 2, NULL, NULL, '2020-07-29 09:28:17', '2020-07-29 09:28:17', NULL),
(76, 'Miguel Francisco', 'Ju Zhu', 'migueljuzhu@gmail.com', 1, '77565280', '994741273', 1, 2, 2, '2020-08-12 02:46:29', '2020-08-12 02:46:29', NULL),
(77, 'Marcelo Fabrizio', 'Noblecilla Rubio', 'marcelonob@hotmail.com', 1, '74299150', '987116688', 1, 1, 2, '2020-08-12 02:46:29', '2020-08-12 02:46:29', NULL),
(78, 'Flavia', 'Venero Tupayachi', 'fvenerotupayachi@gmail.com', 1, '73032889', '977159214', 1, 2, 2, '2020-08-12 02:46:29', '2020-08-12 02:46:29', NULL),
(80, 'Alisson Daniela', 'Barrientos Mendoza', 'alissondaniela11@gmail.com', 1, '72803593', '991857871', 2, 3, 3, '2020-08-13 03:27:42', '2020-08-13 03:27:42', NULL),
(81, 'Melanie Jasmín', 'Chumacero Flores', 'jasminmelanie31@gmail.com', 1, '76045985', '921609592', 2, 3, 2, '2020-08-13 03:27:42', '2020-08-13 03:27:42', NULL),
(82, 'Laura Belén', 'Vizcarra Urquizo', 'lauravizcarra21@gmail.com', 1, '72931372', '952603303', 2, 3, 3, '2020-08-13 03:27:42', '2020-08-13 03:27:42', NULL),
(84, 'Jesús Manuel', 'Araujo Raurau', 'araujo2491@gmail.com', 1, '70441594', '961229867', 2, 2, 2, '2020-08-14 18:27:16', '2020-08-14 18:27:16', NULL),
(85, 'Rita Carolina', 'Pichilingue Fasíl', 'carolinapf15@gmail.com', 1, '43805909', '940165795', 2, 2, 2, '2020-08-14 18:27:16', '2020-08-14 18:27:16', NULL),
(86, 'Luiggi Jahir', 'zapata severino', 'luiggi.zp@gmail.com', 1, '45051773', '989922018', 2, 2, 2, '2020-08-14 18:27:16', '2020-08-14 18:27:16', NULL),
(87, 'MEGHIE FRANCESCA', 'ROSELL ZAMORA', 'meghierz@gmail.com', 1, '45536638', '961362244', 2, 2, 2, '2020-08-14 18:27:16', '2020-08-14 18:27:16', NULL),
(88, 'Andrea Fernanda', 'De la Cruz Díaz', 'andreadlcd26@gmail.com', 1, '71329915', '984763170', 2, 2, 2, '2020-08-14 18:27:16', '2020-08-14 18:27:16', NULL),
(90, 'Ana lucia', 'Gomez Villanueva', 'analugomez1298@gmail.com', 1, '73217677', '991654556', 1, 2, 2, '2020-08-14 21:07:51', '2020-08-14 21:07:51', NULL),
(91, 'Romina Paola', 'Lindley Llanos', '20162192@aloe.ulima.edu.pe', 1, '73385205', '999989036', 1, 2, 1, '2020-08-14 21:07:51', '2020-08-14 21:07:51', NULL),
(92, 'Claudia', 'Nuñez  Travi', 'cnuneztravi@gmail.com', 1, '70361948', '990015374', 1, 2, 1, '2020-08-14 21:07:51', '2020-08-14 21:07:51', NULL),
(93, 'Valeria', 'Camino Zuñiga', '20160268@gmail.com', 1, '75426675', '996598162', 1, 2, 1, '2020-08-14 21:07:51', '2020-08-14 21:07:51', NULL),
(95, 'Tania Isabel', 'Herrero Flores', 'taniaherrero15@gmail.com', 1, '72183274', '957210275', 1, 1, 2, '2020-08-15 03:02:43', '2020-08-15 03:02:43', NULL),
(96, 'Carla Cecilia', 'Fernandez Torres', 'carlafernandezto@gmail.com', 1, '77668716', '992641421', 1, 1, 2, '2020-08-15 03:02:43', '2020-08-15 03:02:43', NULL),
(97, 'Alejandra Stephania', 'Santa Cruz Escobedo', 'alejandra251097@gmail.com', 1, '74556792', '993326708', 1, 1, 2, '2020-08-15 03:02:43', '2020-08-15 03:02:43', NULL),
(98, 'Lorena', 'Gambini Avila', 'lorenagambini1@gmail.com', 1, '77570433', '940410276', 1, 1, 2, '2020-08-15 03:02:43', '2020-08-15 03:02:43', NULL),
(99, 'Leydi Pilar', 'Velasquez Leva', 'Leydiv13@gmail.com', 1, '72647682', '948435316', 1, 1, 2, '2020-08-15 03:02:43', '2020-08-15 03:02:43', NULL),
(101, 'Silvana Lisbeth', 'Cuba Farias', 'silvacf2405@gmail.com', 1, '76355383', '994270417', 1, 2, 1, '2020-08-15 16:41:46', '2020-08-15 16:41:46', NULL),
(102, 'Ana Andrea Gabriela', 'Agama Saavedra', 'gabrielaagama20@gmail.com', 1, '71395140', '951329876', 1, 2, 1, '2020-08-15 16:41:46', '2020-08-15 16:41:46', NULL),
(103, 'Daniela Alessandra', 'Tamayo Vernal', 'danielatamayovernal@gmail.com', 1, '75851953', '944432081', 1, 2, 1, '2020-08-15 16:41:46', '2020-08-15 16:41:46', NULL),
(105, 'Jimena Andrea', 'La Rosa Sánchez', 'jimena.larosa@pucp.pe', 1, '70319056', '986620031', 6, 3, 3, '2020-08-15 21:41:20', '2020-08-15 21:41:20', NULL),
(106, 'Samantha Maricielo', 'Hidalgo Anhuamán', 'smhidalgoa@pucp.edu.pe', 1, '71251097', '965369504', 6, 3, 3, '2020-08-15 21:41:20', '2020-08-15 21:41:20', NULL),
(107, 'Antonella Belen', 'Reyes Mendoza', 'antonella.reyesm@pucp.pe', 1, '73453312', '992594627', 6, 3, 3, '2020-08-15 21:41:21', '2020-08-15 21:41:21', NULL),
(108, 'Luciano Jesús', 'Nalvarte Cervantes', 'lnalvarte@pucp.pe', 1, '72759467', '914129325', 6, 3, 3, '2020-08-15 21:41:21', '2020-08-15 21:41:21', NULL),
(109, 'Jimena', 'La Puente Pita', 'jlapuente@pucp.pe', 1, '74647973', '990010230', 6, 3, 3, '2020-08-15 21:41:21', '2020-08-15 21:41:21', NULL),
(111, 'Lorena', 'Rodríguez Orihuela', 'a20140086@pucp.pe', 1, '72606251', '942644270', 6, 3, 3, '2020-08-15 22:40:04', '2020-08-15 22:40:04', NULL),
(112, 'Maria Lissell', 'Alva Quiroz', 'lissell.alva@pucp.edu.pe', 1, '73676751', '945127356', 6, 3, 3, '2020-08-15 22:40:04', '2020-08-15 22:40:04', NULL),
(113, 'Rayza Renata', 'Robles Roncal', 'renata.robles@pucp.edu.pe', 1, '73007011', '992656570', 6, 3, 3, '2020-08-15 22:40:05', '2020-08-15 22:40:05', NULL),
(114, 'Silvia Adriana', 'Carrillo Gutiérrez', 'silviacarrillog@pucp.edu.pe', 1, '73108148', '966425646', 6, 3, 3, '2020-08-15 22:40:05', '2020-08-15 22:40:05', NULL),
(115, 'Diego Arturo', 'Vasquez Flores', 'dvasquezf@pucp.edu.pe', 1, '73704482', '987890203', 6, 3, 2, '2020-08-15 22:40:05', '2020-08-15 22:40:05', NULL),
(116, 'Marco Antonio', 'Bravo Gonzales', 'm.bravog@pucp.edu.pe', 1, '73453919', '994449519', 6, 3, 1, '2020-08-15 23:01:34', '2020-08-15 23:01:34', NULL),
(117, 'Karina Gabriela', 'López Santiago', 'karina.lopez@pucp.edu.pe', 1, '76952932', '942643156', 6, 3, 1, '2020-08-15 23:01:35', '2020-08-15 23:01:35', NULL),
(118, 'Paola Elizabeth', 'Barrera Cabello', 'paola.barrera@pucp.edu.pe', 1, '76055015', '938918798', 6, 3, 2, '2020-08-15 23:01:35', '2020-08-15 23:01:35', NULL),
(119, 'Patricia Estela', 'Chullunquia Contreras', 'a20122530@pucp.pe', 1, '73063111', '996998138', 6, 1, 1, '2020-08-15 23:01:35', '2020-08-15 23:01:35', NULL),
(120, 'Sandra Valeria', 'Alarcón Sánchez', 'alarcon.sandra@pucp.pe', 1, '73656005', '952156343', 6, 3, 2, '2020-08-15 23:01:35', '2020-08-15 23:01:35', NULL),
(122, 'Sergio Arturo', 'Rojas Gallegos', 's.rojas@pucp.edu.pe', 1, '72533659', '933088176', 6, 3, 3, '2020-08-16 18:59:01', '2020-08-16 18:59:01', NULL),
(123, 'Belen Judit', 'Mata Oyola', 'b.mata@pucp.pe', 1, '70799208', '942726595', 6, 3, 2, '2020-08-16 18:59:01', '2020-08-16 18:59:01', NULL),
(124, 'Solange Antoanette', 'Cáceres Vela', 'a20145350@pucp.pe', 1, '74049104', '999042653', 6, 3, 3, '2020-08-16 18:59:01', '2020-08-16 18:59:01', NULL),
(125, 'Angella Cristina', 'Delgado Pereyra', 'Cristina.delgado@pucp.pe', 1, '75191165', '932025018', 6, 3, 2, '2020-08-16 18:59:01', '2020-08-16 18:59:01', NULL),
(126, 'Ernesto Raúl', 'Albán Saal', 'a20145353@pucp.pe', 1, '73675177', '959362322', 6, 3, 2, '2020-08-16 18:59:01', '2020-08-16 18:59:01', NULL),
(128, 'David Alonso', 'Berrocal Vicente', 'aurorastudioperu@gmail.com', 1, '74803073', '954425338', 6, 3, 2, '2020-08-17 00:11:20', '2020-08-17 00:11:20', NULL),
(129, 'Jorge Renzo', 'Villareal Sánchez', 'rvillareals@pucp.pe', 1, '73034199', '989417322', 6, 3, 2, '2020-08-17 00:11:20', '2020-08-17 00:11:20', NULL),
(130, 'Yamile Mirella', 'Guillén Gamarra', 'yguillen@pucp.pe', 1, '70349407', '944251050', 6, 3, 3, '2020-08-17 00:11:20', '2020-08-17 00:11:20', NULL),
(131, 'Jean Carlos', 'Silvestre Villanueva', 'jcsilvestre@pucp.edu.pe', 1, '46737498', '986122589', 6, 3, 3, '2020-08-17 00:11:20', '2020-08-17 00:11:20', NULL),
(132, 'Brenda Violeta', 'Llanos Acuña', 'vllanos@pucp.pe', 1, '72184839', '991037985', 6, 3, 2, '2020-08-17 00:11:21', '2020-08-17 00:11:21', NULL),
(133, 'Irma Angeline', 'Orihuela Alvarez', 'a20150889@pucp.pe', 1, '72365182', '955709090', 6, 3, 2, '2020-08-17 01:39:54', '2020-08-17 01:39:54', NULL),
(134, 'Lucyana Belen', 'Ortiz Sousa', 'lucyana.ortiz@pucp.pe', 1, '72573453', '941359920', 6, 3, 2, '2020-08-17 01:39:54', '2020-08-17 01:39:54', NULL),
(135, 'Karina Milagros', 'Cuello Apaza', 'karina.cuello@pucp.pe', 1, '77439048', '977372516', 6, 3, 1, '2020-08-17 01:39:54', '2020-08-17 01:39:54', NULL),
(136, 'Joselyn Carolina', 'Lévano Almeyda', 'levano.joselyn@pucp.edu.pe', 1, '71460726', '940355818', 6, 3, 2, '2020-08-17 01:39:54', '2020-08-17 01:39:54', NULL),
(137, 'Alessandra Caterina del Carmen', 'Zegarra Mancusi', 'a20145361@pucp.pe', 1, '70001587', '999660344', 6, 3, 1, '2020-08-17 01:39:54', '2020-08-17 01:39:54', NULL),
(139, 'a', 'a', 'a@gmail.com', 1, 'aaaaaaaa', '980980980', 9, 1, 2, '2020-08-17 14:13:15', '2020-08-17 14:13:15', NULL),
(140, 'b', 'b', 'b@gmail.com', 1, 'bbbbbbbb', '999875435', 9, 2, 2, '2020-08-17 14:13:15', '2020-08-17 14:13:15', NULL),
(141, 'c', 'c', 'c@gmail.com', 1, 'cccccccc', '999985734', 9, 3, 1, '2020-08-17 14:13:15', '2020-08-17 14:13:15', NULL),
(142, 'Ricardo', 'Bejar', 'ricardo_jbl2010@hotmail.com', 1, '70689935', '991267284', 9, 2, 1, '2020-08-17 14:13:15', '2020-08-17 14:13:15', NULL),
(144, 'Gabriel Antonio', 'Martinez Sarazú', 'gasaru2@gmail.com', 1, '76680380', '997089199', 6, 3, 1, '2020-08-17 15:09:09', '2020-08-17 15:09:09', NULL),
(145, 'Diana Lucía', 'García Martínez', 'a20150402@pucp.pe', 1, '72934467', '999770332', 6, 3, 1, '2020-08-17 15:09:09', '2020-08-17 15:09:09', NULL),
(146, 'José Alejandro', 'Márquez Zapata', 'jose.marquez@pucp.pe', 1, '73040796', '944269015', 6, 3, 1, '2020-08-17 15:09:09', '2020-08-17 15:09:09', NULL),
(147, 'Ximena', 'Aguilar Huayanca', 'aguilar.ximena@pucp.edu.pe', 1, '71405664', '968277772', 6, 3, 1, '2020-08-17 15:09:09', '2020-08-17 15:09:09', NULL),
(148, 'Caroline Jackelyn', 'Vicente Aliaga', 'caroline.vicente@pucp.edu.pe', 1, '72564210', '991419686', 6, 3, 1, '2020-08-17 15:09:09', '2020-08-17 15:09:09', NULL),
(150, 'Nicole Sarit', 'Litmanowicz Figueroa', 'nicole.litma@gmail.com', 1, '73649026', '956232029', 1, 2, 2, '2020-08-17 15:55:02', '2020-08-17 15:55:02', NULL),
(151, 'Franco', 'Pastorelli Rojas', 'franco.pastorelli98@gmail.com', 1, '72074772', '986816091', 1, 1, 2, '2020-08-17 15:55:02', '2020-08-17 15:55:02', NULL),
(152, 'Chiara Giuliana', 'Hermoza Pelizzoli', 'hermozachiara@gmail.com', 1, '76319968', '954605225', 1, 2, 2, '2020-08-17 15:55:02', '2020-08-17 15:55:02', NULL),
(157, 'Pamela Janice', 'Navarro Huerta', 'pnavarroh@pucp.pe', 1, '75387542', '985778135', 6, 3, 3, '2020-08-17 19:48:51', '2020-08-17 19:48:51', NULL),
(158, 'Brenda Mirella', 'Cervantes Mendoza', 'bcervantesm@pucp.edu.pe', 1, '71466452', '993100841', 6, 3, 3, '2020-08-17 19:48:51', '2020-08-17 19:48:51', NULL),
(159, 'Daniela Stephanie', 'Ramos Castellanos', 'dsramos@pucp.edu.pe', 1, '70780239', '995550500', 6, 3, 3, '2020-08-17 19:48:51', '2020-08-17 19:48:51', NULL),
(160, 'Zarela Yahaira', 'Chuquillanqui Samaniego', 'zarela.chuquillanqui@pucp.pe', 1, '70883591', '984179420', 6, 3, 3, '2020-08-17 19:48:51', '2020-08-17 19:48:51', NULL),
(162, 'a', 'a', 'ax@gmail.com', 1, 'axaxaxax', '999999999', 5, 1, 2, '2020-08-17 20:20:40', '2020-08-17 20:20:40', NULL),
(163, 'b', 'b', 'bx@gmail.com', 1, 'bxbxbxbx', '999983283', 5, 2, 2, '2020-08-17 20:20:40', '2020-08-17 20:20:40', NULL),
(164, 'c', 'c', 'cx@gmail.com', 1, 'cxcxcxcx', '342223499', 5, 2, 2, '2020-08-17 20:20:40', '2020-08-17 20:20:40', NULL),
(165, 'ab', 'ab', 'ab@gmail.com', 1, 'abababab', '989432809', 6, 2, 2, '2020-08-17 20:25:01', '2020-08-17 20:25:01', NULL),
(166, 'bb', 'bb', 'bb@gmail.com', 1, 'bbbbbbb1', '998847293', 6, 2, 3, '2020-08-17 20:25:01', '2020-08-17 20:25:01', NULL),
(167, 'cc', 'cc', 'bejar@pucp.pe', 1, 'ccccccc1', '987384972', 6, 2, 2, '2020-08-17 20:25:01', '2020-08-17 20:25:01', NULL),
(168, 'zz', 'zz', 'zz@gmail.com', 1, 'zzzzzzz1', '987439827', 5, 1, 1, '2020-08-17 20:27:55', '2020-08-17 20:27:55', NULL),
(169, 'yy', 'yy', 'yy@gmail.com', 1, 'yyyyyyy1', '943287428', 5, 2, 1, '2020-08-17 20:27:55', '2020-08-17 20:27:55', NULL),
(170, 'fjsdk', 'fosd', 'ricardo.jbl2011@gmail.com', 1, 'fffffff1', '999843984', 5, 2, 2, '2020-08-17 20:27:55', '2020-08-17 20:27:55', NULL),
(172, 'dcASDS', 'DKCNDSCKJ', 'rosa@gmail.com', 1, 'sssssss1', '999999991', 8, 2, 1, '2020-08-17 20:34:43', '2020-08-17 20:34:43', NULL),
(173, 'roxana', 'dijcnsdvkbk', 'roxana.escate@insolutions.pe', 1, 'ooooooo1', '999999996', 8, 2, 2, '2020-08-17 20:34:43', '2020-08-17 20:34:43', NULL),
(174, 'kjvdskflg', 'ekjsnsdjkf', 'res@gmail.com', 1, 'eeeeeee1', '999999990', 8, 2, 3, '2020-08-17 20:34:43', '2020-08-17 20:34:43', NULL),
(175, 'Ricardito', 'Bejar', 'bejar.ricardo@pucp.pe', 1, 'rrrrrrr1', '947283472', 3, 2, 1, '2020-08-17 20:34:44', '2020-08-17 20:34:44', NULL),
(176, 'gg', 'gg', 'gg@gmail.com', 1, 'ggggggg1', '998472398', 3, 2, 3, '2020-08-17 20:34:44', '2020-08-17 20:34:44', NULL),
(177, 'hh', 'hh', 'hh@gmail.com', 1, 'hhhhhhh1', '998904820', 3, 2, 2, '2020-08-17 20:34:44', '2020-08-17 20:34:44', NULL),
(179, 'Yamile Gissella', 'Misich Salazar', 'misich.yamile@pucp.pe', 1, '77539621', '902355571', 6, 3, 2, '2020-08-17 21:41:16', '2020-08-17 21:41:16', NULL),
(180, 'Allison Sofia', 'Livia Dominguez', 'allison.livia@pucp.pe', 1, '70327267', '999094744', 6, 3, 3, '2020-08-17 21:41:16', '2020-08-17 21:41:16', NULL),
(181, 'Ximena Alexandra', 'Calderón Herrera', 'ximena.calderon@pucp.edu.pe', 1, '71466214', '991601170', 6, 3, 3, '2020-08-17 23:16:46', '2020-08-17 23:16:46', NULL),
(182, 'Melany Roxana', 'Rivera Guerrero', 'melany.riverag@pucp.edu.pe', 1, '73187652', '973878588', 6, 3, 3, '2020-08-17 23:16:46', '2020-08-17 23:16:46', NULL),
(183, 'Diana Isabel', 'Ccorimanya Fernández', 'diccorimanyaf@pucp.edu.pe', 1, '71710513', '962578600', 6, 3, 2, '2020-08-17 23:16:46', '2020-08-17 23:16:46', NULL),
(184, 'Brandon Dylan', 'Lara Soto', 'blara@pucp.edu.pe', 1, '74051171', '963213234', 6, 3, 3, '2020-08-17 23:16:46', '2020-08-17 23:16:46', NULL),
(185, 'Vanessa Stefany', 'Lozano Dulanto', 'vanessa.lozano@pucp.edu.pe', 1, '74303255', '977187408', 6, 3, 2, '2020-08-17 23:16:46', '2020-08-17 23:16:46', NULL),
(187, 'Briana', 'Gubbins Griffiths', 'a20150777@pucp.pe', 1, '77163115', '974630754', 6, 3, 1, '2020-08-17 23:34:13', '2020-08-17 23:34:13', NULL),
(188, 'Rodrigo Eduardo', 'Manchego Rosado', 'rodrigo.manchego@pucp.edu.pe', 1, '70348931', '990015355', 6, 3, 1, '2020-08-17 23:34:13', '2020-08-17 23:34:13', NULL),
(189, 'Paula', 'Pérez Del Solar Zegarra', 'pperezdelsolar@pucp.edu.pe', 1, '74608125', '949193162', 6, 3, 1, '2020-08-17 23:34:13', '2020-08-17 23:34:13', NULL),
(190, 'Claudia Cristina', 'Lara Sarapura', 'cristina.lara@pucp.pe', 1, '75286376', '997026694', 6, 1, 1, '2020-08-17 23:34:13', '2020-08-17 23:34:13', NULL),
(192, 'Claudia Jireh', 'Contreras Donayre', 'clau.jireh@hotmail.com', 1, '71463764', '953709020', 1, 2, 1, '2020-08-17 23:54:39', '2020-08-17 23:54:39', NULL),
(193, 'Mariana del Carmen', 'Casalino Piñeiro', '20160297@aloe.ulima.edu.pe', 1, '73686254', '987981001', 1, 2, 2, '2020-08-17 23:54:39', '2020-08-17 23:54:39', NULL),
(194, 'Maria Fernanda', 'Zamudio Quinteros', 'mfer161996@gmail.com', 1, '70001837', '997931357', 1, 2, 1, '2020-08-17 23:54:39', '2020-08-17 23:54:39', NULL),
(195, 'John Joshua', 'Berrospi Gálvez', '20142595@aloe.ulima.edu.pe', 1, '73035570', '993246981', 1, 3, 2, '2020-08-18 19:10:46', '2020-08-18 19:10:46', NULL),
(196, 'Niccole Allison', 'Martínez Ramírez', '20151545@aloe.ulima.edu.pe', 1, '76534466', '940396841', 1, 3, 2, '2020-08-18 19:10:46', '2020-08-18 19:10:46', NULL),
(197, 'Karla Milagros', 'Yarlequé Donayre', '20143326@aloe.ulima.edu.pe', 1, '72929982', '936349373', 1, 3, 1, '2020-08-18 19:10:46', '2020-08-18 19:10:46', NULL),
(199, 'Andrés Alonso', 'Villavicencio Arguedas', '20151460@aloe.ulima.edu.pe', 1, '73466809', '993206836', 1, 2, 2, '2020-08-18 21:57:40', '2020-08-18 21:57:40', NULL),
(200, 'Manuel Humberto', 'Ahumada Rojas', '20150022@aloe.ulima.edu.pe', 1, '73065731', '991493609', 1, 2, 2, '2020-08-18 21:57:40', '2020-08-18 21:57:40', NULL),
(201, 'Thalia', 'Egocheaga Meza  Cuadra', '20150463@aloe.ulima.edu.pe', 1, '71939619', '952505601', 1, 2, 2, '2020-08-18 21:57:40', '2020-08-18 21:57:40', NULL),
(202, 'Maria Alejandra', 'Palacios Zavaleta', '20151023@aloe.ulima.edu.pe', 1, '75747050', '956282740', 1, 2, 3, '2020-08-18 21:57:40', '2020-08-18 21:57:40', NULL),
(203, 'Karen Patricia', 'Bueno Cobo', '20150194@aloe.ulima.edu.pe', 1, '76245566', '962315114', 1, 2, 3, '2020-08-18 21:57:40', '2020-08-18 21:57:40', NULL),
(213, 'Antonella Fiorella', 'Huamán Gomero', 'antonella.huamang@pucp.edu.pe', 1, '72048275', '974150461', 6, 3, 3, '2020-08-19 03:48:09', '2020-08-19 03:48:09', NULL),
(214, 'Alexandra Annelise', 'Yrala Medrano', 'aayrala@pucp.edu.pe', 1, '76331675', '942343909', 6, 3, 3, '2020-08-19 03:48:09', '2020-08-19 03:48:09', NULL),
(215, 'Elena Lourdes', 'Lizana Aliaga', 'e.lizana@pucp.edu.pe', 1, '74927011', '984297929', 6, 3, 3, '2020-08-19 03:48:09', '2020-08-19 03:48:09', NULL),
(216, 'Catherine Celia', 'Amésquita Rupire', 'c.amesquita@pucp.edu.pe', 1, '46894112', '996373833', 6, 3, 1, '2020-08-19 03:48:09', '2020-08-19 03:48:09', NULL),
(217, 'Fiorella Clarissa', 'Herrera Córdova', 'fiorella.herrera@pucp.pe', 1, '72543945', '998352345', 6, 3, 2, '2020-08-19 22:39:19', '2020-08-19 22:39:19', NULL),
(218, 'Kristel Stephany', 'Reyes Girón', 'kristel.reyes@pucp.edu.pe', 1, '72485853', '991358427', 6, 3, 3, '2020-08-19 22:39:19', '2020-08-19 22:39:19', NULL),
(219, 'Rocío Alexandra', 'Jara Almonte Ríos', 'alexandra.jaraalmonte@pucp.edu.pe', 1, '74986492', '959197639', 6, 3, 3, '2020-08-19 22:39:19', '2020-08-19 22:39:19', NULL),
(220, 'Gabriella', 'García Cárdenas', 'gabriella.garcia@pucp.pe', 1, '74298712', '991499287', 6, 3, 3, '2020-08-19 22:39:19', '2020-08-19 22:39:19', NULL),
(221, 'Jose Antonio', 'Saavedra Dextre', 'a20135420@pucp.pe', 1, '72648988', '952900153', 6, 3, 2, '2020-08-19 22:39:19', '2020-08-19 22:39:19', NULL),
(222, 'Pamela Magi', 'Llanos Vilca', 'pamela.llanosv@pucp.edu.pe', 1, '72164468', '910883217', 6, 3, 1, '2020-08-20 00:03:27', '2020-08-20 00:03:27', NULL),
(223, 'Claudia Ximena', 'Palomino Meléndez', 'claudia.palominom@pucp.edu.pe', 1, '72437237', '997928944', 6, 3, 1, '2020-08-20 00:03:27', '2020-08-20 00:03:27', NULL),
(224, 'María Andrea', 'Quispe Galiano', 'mquispeg@pucp.edu.pe', 1, '74770938', '959436770', 6, 3, 1, '2020-08-20 00:03:27', '2020-08-20 00:03:27', NULL),
(225, 'María de los Ángeles', 'Guillermo Godoy', 'a20140368@pucp.edu.pe', 1, '72386552', '984308605', 6, 3, 1, '2020-08-20 00:03:27', '2020-08-20 00:03:27', NULL),
(226, 'Fiorella Nairem', 'Segura Rengifo', 'fsegura@pucp.edu.pe', 1, '74134797', '951020880', 6, 3, 1, '2020-08-20 00:03:27', '2020-08-20 00:03:27', NULL),
(228, 'Ana Lucía', 'Pezo Maya', 'anipezo98@gmail.com', 1, '73308665', '943860251', 1, 1, 1, '2020-08-20 00:11:28', '2020-08-20 00:11:28', NULL),
(229, 'Daniela Ariana', 'Rodríguez Sandoval', 'drodriguez1399@gmail.com', 1, '73247910', '965658965', 1, 1, 1, '2020-08-20 00:11:28', '2020-08-20 00:11:28', NULL),
(230, 'Kimberly Franschesca', 'Barriga Meza', 'kfbm112@gmail.com', 1, '70130190', '947472160', 1, 1, 1, '2020-08-20 00:11:28', '2020-08-20 00:11:28', NULL),
(231, 'Brunela', 'Tuesta Váscones', 'tuestabrunela@gmail.com', 1, '74708747', '999945654', 1, 1, 1, '2020-08-20 00:11:28', '2020-08-20 00:11:28', NULL),
(233, 'LINDA ESMERALDA', 'CHAVEZ SALAZAR', 'lieschavez12@gmail.com', 1, '75157314', '938592010', 9, 3, 1, '2020-08-20 01:34:10', '2020-08-20 01:34:10', NULL),
(234, 'DANIELA MARGOT', 'SEGUIL CORTEZ', 'danielamargotseguilcortez@gmail.com', 1, '70941337', '984793568', 9, 3, 2, '2020-08-20 01:34:10', '2020-08-20 01:34:10', NULL),
(235, 'JR RAFFO', 'RODRIGUEZ DIOSES', 'raffo.rod@gmail.com', 1, '45760962', '917805211', 9, 3, 3, '2020-08-20 01:34:10', '2020-08-20 01:34:10', NULL),
(236, 'MARCOS ADOLFO', 'CONDOR MENDOZA', 'marcos_condor_123@hotmail.com', 1, '75404896', '933870212', 9, 3, 2, '2020-08-20 01:34:11', '2020-08-20 01:34:11', NULL),
(237, 'Miguel Alexis', 'Grau Aquino', 'alexis.grau@pucp.edu.pe', 1, '72016610', '997227491', 6, 3, 1, '2020-08-20 16:54:33', '2020-08-20 16:54:33', NULL),
(238, 'Andrea Julia', 'Palomino Pérez Luna', 'andrea.palomino@pucp.pe', 1, '76183912', '922238365', 6, 3, 3, '2020-08-20 16:54:33', '2020-08-20 16:54:33', NULL),
(239, 'María Fernanda', 'Apaza Cueva', 'maria.apaza@pucp.edu.pe', 1, '71324798', '986968799', 6, 3, 2, '2020-08-20 16:54:33', '2020-08-20 16:54:33', NULL),
(240, 'Andrea Carolina', 'Romero Pizango', 'carolina.romerop@pucp.edu.pe', 1, '72545646', '971173271', 6, 3, 1, '2020-08-20 16:54:33', '2020-08-20 16:54:33', NULL),
(242, 'Brigitte Chantal', 'Diaz Cruzado', 'bridiaz1802@gmail.com', 1, '76915014', '992297571', 2, 1, 2, '2020-08-20 19:00:25', '2020-08-20 19:00:25', NULL),
(243, 'Valeria Tatiana', 'Rodriguez Marin', 'valroma.3099@gmail.com', 1, '72634583', '958977648', 2, 1, 2, '2020-08-20 19:00:25', '2020-08-20 19:00:25', NULL),
(244, 'Rogger André', 'Rojas Duffoó', 'andreduffoo@gmail.com', 1, '71835275', '941366637', 2, 1, 1, '2020-08-20 19:00:25', '2020-08-20 19:00:25', NULL),
(245, 'Valeria Alessandra Elisa', 'Aquino Flores', 'vaeliaf@gmail.com', 1, '72552763', '936706129', 2, 1, 1, '2020-08-20 19:00:25', '2020-08-20 19:00:25', NULL),
(246, 'Luis Miguel', 'Pérez Chuctaya', 'luismiguelperezch222@gmail.com', 1, '46364481', '965350080', 2, 1, 2, '2020-08-20 19:00:25', '2020-08-20 19:00:25', NULL),
(250, 'Vanessa Carolina', 'Flores Fernández', 'vanessa.flores@pucp.edu.pe', 1, '75714051', '992729230', 6, 3, 1, '2020-08-20 23:37:43', '2020-08-20 23:37:43', NULL),
(251, 'Sofia Esther', 'Luna Ortega', 'sofia.luna@pucp.edu.pe', 1, '76091053', '986203169', 6, 3, 1, '2020-08-20 23:37:43', '2020-08-20 23:37:43', NULL),
(252, 'Adriana', 'Huanca Mercado', 'huanca.adriana@pucp.edu.pe', 1, '72220323', '989806163', 6, 3, 1, '2020-08-20 23:37:43', '2020-08-20 23:37:43', NULL),
(253, 'Gianina Lucía', 'Chávarry Minaya', 'gchavarry@pucp.edu.pe', 1, '73172590', '999979220', 6, 3, 1, '2020-08-20 23:37:43', '2020-08-20 23:37:43', NULL),
(254, 'Kryszia Eilleen', 'Salcedo Fuentes', 'ksalcedof@pucp.edu.pe', 1, '72647860', '990035029', 6, 3, 1, '2020-08-20 23:37:44', '2020-08-20 23:37:44', NULL),
(256, 'Cynthia Alexandra', 'Espinoza Richard', 'cynthia.alexandra21@gmail.com', 1, '70083147', '943033676', 9, 1, 2, '2020-08-21 00:06:00', '2020-08-21 00:06:00', NULL),
(257, 'Cristina Araceli', 'Saavedra Bernal', 'cristinaaraceli1999@gmail.com', 1, '75895776', '988851847', 9, 1, 2, '2020-08-21 00:06:00', '2020-08-21 00:06:00', NULL),
(258, 'Diana Regina', 'Consiglieri Ontaneda', 'dianiconsiglieriontaneda@hotmail.com', 1, '71400937', '999986741', 9, 1, 2, '2020-08-21 00:06:01', '2020-08-21 00:06:01', NULL),
(259, 'Martha Katherine', 'Saenz Casas', 'katherinesaenzcasas@gmail.com', 1, '70863098', '934529734', 9, 1, 2, '2020-08-21 00:06:01', '2020-08-21 00:06:01', NULL),
(260, 'Aldo Joel', 'Arbildo Rodríguez', 'aldoarbildo1897@gmail.com', 1, '76279703', '982790066', 9, 1, 2, '2020-08-21 00:06:01', '2020-08-21 00:06:01', NULL),
(262, 'Christian Gerson', 'Gutierrez Coba', 'chrizg9@gmail.com', 1, '73419653', '923290596', 9, 3, 3, '2020-08-21 01:45:08', '2020-08-21 01:45:08', NULL),
(263, 'Paula', 'Candiotty Chang', 'paulacandiotty98@gmail.com', 1, '70990229', '934006592', 9, 3, 2, '2020-08-21 01:45:08', '2020-08-21 01:45:08', NULL),
(264, 'Julio cesar', 'peña yarahuaman', 'Juliope.9708@gmail.com', 1, '75551819', '949193238', 9, 3, 1, '2020-08-21 01:45:08', '2020-08-21 01:45:08', NULL),
(265, 'Guillermo Rafael', 'Del Rio Ortiz', 'guillermopublicitariocreativo@gmail.com', 1, '70898208', '920346116', 9, 3, 1, '2020-08-21 01:45:08', '2020-08-21 01:45:08', NULL),
(266, 'Kristel', 'Borjas Suárez', 'kristelborjas01@gmail.com', 1, '72543612', '991399953', 9, 3, 1, '2020-08-21 03:35:03', '2020-08-21 03:35:03', NULL),
(267, 'Maria Alessandra', 'Nolasco Calle', 'marianolasco155@gmail.com', 1, '72287234', '999106200', 9, 3, 2, '2020-08-21 03:35:03', '2020-08-21 03:35:03', NULL),
(268, 'Breisner Andree', 'Camacho Villanueva', 'breisner02@gmail.com', 1, '72214046', '932947528', 9, 3, 2, '2020-08-21 03:35:03', '2020-08-21 03:35:03', NULL),
(269, 'Victor Irak', 'Peredo Peralta', 'vippcomc@gmail.com', 1, '73150713', '932132654', 9, 3, 2, '2020-08-21 03:35:03', '2020-08-21 03:35:03', NULL),
(270, 'Fernando Enrique', 'Castillo Ozejo', 'fernandocastillo4230@gmail.com', 1, '74298699', '969755018', 9, 3, 1, '2020-08-21 03:35:03', '2020-08-21 03:35:03', NULL),
(271, 'Alexander', 'Rios Weis', 'alexander.riosw@gmail.com', 1, '48404944', '999334537', 1, 1, 2, '2020-08-21 03:50:51', '2020-08-21 03:50:51', NULL),
(272, 'Francheska Isabel', 'Rivera Abanto', 'francheska181197@gmail.com', 1, '70375692', '994758173', 1, 1, 2, '2020-08-21 03:50:51', '2020-08-21 03:50:51', NULL),
(273, 'Diana Cecilia', 'Dávila León', 'contacto.dianadavila@gmail.com', 1, '74252967', '993405144', 1, 1, 2, '2020-08-21 03:50:51', '2020-08-21 03:50:51', NULL),
(274, 'Ethel Ingrid', 'Estrella Moreno', 'ethelestrellam@gmail.com', 1, '74312393', '960147455', 1, 1, 2, '2020-08-21 03:50:51', '2020-08-21 03:50:51', NULL),
(275, 'Valeria Ximena', 'Perez Malla', 'valeria.ximena99@gmail.com', 1, '72512454', '944213051', 1, 1, 2, '2020-08-21 03:50:51', '2020-08-21 03:50:51', NULL),
(276, 'Geraldine Giovanna', 'Castañeda Mercado', 'geraldinecastaeda@gmail.com', 1, '77542003', '911355823', 9, 1, 2, '2020-08-21 14:39:25', '2020-08-21 14:39:25', NULL),
(277, 'Paul Santiago', 'Balvin Castillo', 'santiago.balvin.01@gmail.com', 1, '71830789', '982332043', 9, 1, 1, '2020-08-21 14:39:25', '2020-08-21 14:39:25', NULL),
(278, 'Carlos Eduardo', 'Del Castillo Caceres', 'ugkcali@gmail.com', 1, '40789838', '982443098', 9, 1, 2, '2020-08-21 14:39:25', '2020-08-21 14:39:25', NULL),
(280, 'Miriam', 'Vega Paucar', 'mimi.vega2808@gmail.com', 1, '70041234', '969746025', 2, 2, 2, '2020-08-21 16:10:46', '2020-08-21 16:10:46', NULL),
(281, 'Anthony Cristian', 'Fernandez Ochoa', 'anthony.fernandez.eirl@gmail.com', 1, '75014674', '955144010', 2, 2, 1, '2020-08-21 16:10:46', '2020-08-21 16:10:46', NULL),
(282, 'Joseph Wilmer', 'Cachay Yactayo', 'joseph.cy6@gmail.com', 1, '77020226', '987423318', 2, 2, 1, '2020-08-21 16:10:46', '2020-08-21 16:10:46', NULL),
(283, 'Laura Angie', 'Leon Yausin', 'laly241198@gmail.com', 1, '74125429', '955263773', 2, 2, 1, '2020-08-21 16:10:46', '2020-08-21 16:10:46', NULL),
(284, 'Valeria Nicole', 'Gamarra Asencios', 'valegamarra95@gmail.com', 1, '72173200', '949234176', 2, 3, 1, '2020-08-21 16:10:46', '2020-08-21 16:10:46', NULL),
(285, 'Angie Gianella', 'Lopez Quevedo', 'angielopezq19@gmail.com', 1, '77205163', '923603571', 2, 2, 1, '2020-08-21 16:50:51', '2020-08-21 16:50:51', NULL),
(286, 'Benji Alexander', 'Cortez More', 'benjiacm@outlook.com', 1, '75218306', '997480756', 2, 2, 2, '2020-08-21 16:50:51', '2020-08-21 16:50:51', NULL),
(287, 'Gladys Adriana', 'Meza Vargas', 'adriana.meza.vargas@gmail.com', 1, '72651929', '963769423', 2, 2, 2, '2020-08-21 16:50:51', '2020-08-21 16:50:51', NULL),
(288, 'Ana Paula Elizabeth', 'Gamboa Arevalo', 'anapaulagamboaa@gmail.com', 1, '70857233', '942111248', 2, 3, 2, '2020-08-21 16:50:51', '2020-08-21 16:50:51', NULL),
(289, 'Gwendolyne Nicole', 'Madueño Huayre', 'gwendolynegrey23@gmail.com', 1, '70653254', '939644688', 2, 1, 1, '2020-08-21 16:50:51', '2020-08-21 16:50:51', NULL),
(291, 'Brenda Ariana', 'Alvarado Anaya', 'ariana.alvarado@pucp.edu.pe', 1, '74027277', '995227303', 6, 3, 2, '2020-08-21 17:21:20', '2020-08-21 17:21:20', NULL),
(292, 'Rodrigo Alonso', 'Montes Dioses', 'rodrigo.montes@pucp.pe', 1, '73065861', '961900317', 6, 3, 2, '2020-08-21 17:21:20', '2020-08-21 17:21:20', NULL),
(293, 'Maria Claudia', 'Pinglo Perea', 'mcpinglo@pucp.pe', 1, '75592936', '950944024', 6, 3, 2, '2020-08-21 17:21:20', '2020-08-21 17:21:20', NULL),
(294, 'Nataly Guadalupe', 'Sulca Guerra', 'nataly.sulca@pucp.pe', 1, '72713042', '953564239', 6, 3, 2, '2020-08-21 17:21:20', '2020-08-21 17:21:20', NULL),
(295, 'Dory Valeria', 'Prieto Camacho', 'dvprieto@pucp.pe', 1, '71205656', '946855092', 6, 3, 2, '2020-08-21 17:21:20', '2020-08-21 17:21:20', NULL),
(297, 'Claudia Andrea', 'Chávez Barboza', 'claudiachbarboza@gmail.com', 1, '75664232', '974136094', 2, 2, 1, '2020-08-21 17:34:53', '2020-08-21 17:34:53', NULL),
(298, 'María Katherine', 'Sanchez Gagó', 'sanchezgago.mk@gmail.com', 1, '76567138', '951563443', 2, 2, 1, '2020-08-21 17:34:53', '2020-08-21 17:34:53', NULL),
(299, 'Nickol Alessandra', 'Cruz Aquino', 'Alessandra080597@gmail.com', 1, '77029808', '988802459', 2, 2, 2, '2020-08-21 17:34:53', '2020-08-21 17:34:53', NULL),
(300, 'Shirley Denis', 'Tenorio Quispe', 'shirleytenorio44@gmail.com', 1, '77220844', '983467651', 2, 2, 1, '2020-08-21 17:34:53', '2020-08-21 17:34:53', NULL),
(301, 'Gabriela Giselle', 'Villarroel Poma', 'gabygisell.gg@gmail.com', 1, '72929794', '991287981', 2, 2, 1, '2020-08-21 17:34:53', '2020-08-21 17:34:53', NULL),
(303, 'Diego Andrés', 'Ramirez Morán', 'diegor147@hotmail.com', 1, '72716112', '953797951', 9, 2, 1, '2020-08-21 17:40:45', '2020-08-21 17:40:45', NULL),
(304, 'Marcela Mitshy Sarahy', 'Del Carpio Sebastian', 'marcela.delcarpio@usil.pe', 1, '75568410', '938114697', 9, 2, 1, '2020-08-21 17:40:45', '2020-08-21 17:40:45', NULL),
(305, 'Percy Manuel', 'Román Valencia', 'percy_roman_manuel@hotmail.com', 1, '72775253', '953503367', 9, 2, 1, '2020-08-21 17:40:45', '2020-08-21 17:40:45', NULL),
(306, 'Hansel Roberto', 'Alarcón Milart', 'hansel.alarcon@usil.pe', 1, '70424692', '942070463', 9, 2, 1, '2020-08-21 17:40:45', '2020-08-21 17:40:45', NULL),
(307, 'Maricel Fabiola', 'Jara Zorrilla', 'u201424460@upc.edu.pe', 1, '73304395', '986788131', 2, 2, 1, '2020-08-21 17:49:12', '2020-08-21 17:49:12', NULL),
(308, 'Andrea Romina', 'Maldonado Fabian', 'u20151b417@upc.edu.pe', 1, '75369321', '995341662', 2, 2, 2, '2020-08-21 17:49:12', '2020-08-21 17:49:12', NULL),
(309, 'Mariluna Carmen', 'Dávila Pajares', 'u201619634@upc.edu.pe', 1, '74086924', '941059608', 2, 2, 2, '2020-08-21 17:49:12', '2020-08-21 17:49:12', NULL),
(310, 'Daniel Alejandro', 'Fuentes Molina', 'U201522961@upc.edu.pe', 1, '73477010', '984286502', 2, 2, 2, '2020-08-21 17:49:12', '2020-08-21 17:49:12', NULL),
(311, 'Eduardo Alejandro', 'Cipriani Aquise', 'U201510789@upc.edu.pe', 1, '73106673', '980693288', 2, 2, 1, '2020-08-21 17:49:12', '2020-08-21 17:49:12', NULL),
(312, 'Christian Alexander', 'Melgar Gutierrez', 'cmelgargut@gmail.com', 1, '75731066', '997853644', 2, 2, 1, '2020-08-21 18:37:50', '2020-08-21 18:37:50', NULL),
(313, 'Lizbeth Ester', 'Orellano Espinoza', 'Lizbeth.ester129@gmail.com', 1, '76745726', '987659289', 2, 2, 1, '2020-08-21 18:37:50', '2020-08-21 18:37:50', NULL),
(314, 'Juan Luis', 'Wong Campos', 'juanluisw96@gmail.com', 1, '73442258', '980710510', 2, 2, 1, '2020-08-21 18:37:50', '2020-08-21 18:37:50', NULL),
(315, 'Joyce Tamara', 'Arce Sardón', 'Joyce.arce15@gmail.com', 1, '70767593', '986098186', 2, 2, 3, '2020-08-21 18:37:50', '2020-08-21 18:37:50', NULL),
(316, 'Alexis', 'Chiu Dadic', 'alexthespartan71@gmail.com', 1, '70784616', '950433414', 2, 3, 2, '2020-08-21 18:37:50', '2020-08-21 18:37:50', NULL),
(317, 'ANY YANELA', 'CAYLLAHUA PRADO', 'U201613969@UPC.EDU.PE', 1, '73799086', '933813745', 2, 2, 1, '2020-08-21 18:48:35', '2020-08-21 18:48:35', NULL),
(318, 'SOFIA', 'SULOPULOS KAZAKOS', 'U201615560@UPC.EDU.PE', 1, '72111911', '996284744', 2, 2, 2, '2020-08-21 18:48:36', '2020-08-21 18:48:36', NULL),
(319, 'IANA MARIE', 'VELASQUEZ LAZO', 'U201618146@UPC.EDU.PE', 1, '73067705', '991457072', 2, 2, 1, '2020-08-21 18:48:36', '2020-08-21 18:48:36', NULL),
(320, 'BRUNO PABLO', 'BELTRÁN ESPINOZA', 'U201610958@UPC.EDU.PE', 1, '70777225', '974631369', 2, 2, 1, '2020-08-21 18:48:36', '2020-08-21 18:48:36', NULL),
(321, 'KAREN LILIANA', 'BALBIN FLORES', 'U201319306@UPC.EDU.PE', 1, '74660999', '978611989', 2, 1, 3, '2020-08-21 18:48:36', '2020-08-21 18:48:36', NULL),
(322, 'NICOLE MARIA', 'VEGA BIANCHI', 'U201618510@UPC.EDU.PE', 1, '71327075', '968051008', 2, 2, 1, '2020-08-21 18:59:17', '2020-08-21 18:59:17', NULL),
(323, 'NAHOMY', 'HOYOS FIGUEROA', 'U201614719@UPC.EDU.PE', 1, '62449162', '940401691', 2, 2, 2, '2020-08-21 18:59:17', '2020-08-21 18:59:17', NULL),
(324, 'CARLOS MANUEL', 'MAYOR GUZMAN', 'U201610530@UPC.EDU.PE', 1, '47961582', '932855447', 2, 2, 1, '2020-08-21 18:59:17', '2020-08-21 18:59:17', NULL),
(325, 'FERNANDO', 'GIRALDO MORENO', 'U201619091@UPC.EDU.PE', 1, '72956492', '938110910', 2, 2, 2, '2020-08-21 18:59:17', '2020-08-21 18:59:17', NULL),
(326, 'VALERIA MELISA', 'GENG MONTOYA', 'U201523736@UPC.EDU.PE', 1, '71926872', '945993933', 2, 2, 2, '2020-08-21 18:59:17', '2020-08-21 18:59:17', NULL),
(327, 'Carlos Enrique', 'Rodriguez Saldarriaga', 'carlos-enrique1974@hotmail.com', 1, '73042928', '992351367', 2, 2, 2, '2020-08-21 19:56:06', '2020-08-21 19:56:06', NULL),
(328, 'Juan Manuel', 'Weston Prevost', 'juanm.weston@gmail.com', 1, '70424502', '984125613', 2, 2, 2, '2020-08-21 19:56:06', '2020-08-21 19:56:06', NULL),
(329, 'Sandra', 'Huanuco Figueroa', 'sandrahuanuco@gmail.com', 1, '75198203', '950694603', 2, 2, 1, '2020-08-21 19:56:06', '2020-08-21 19:56:06', NULL),
(330, 'Carla Isabel', 'Valenzuela Aliaga', 'carlavalenzuela1896@gmail.com', 1, '72909934', '981990259', 2, 1, 1, '2020-08-21 19:56:07', '2020-08-21 19:56:07', NULL),
(331, 'Daniela', 'Zaharia Seinfeld', 'daniela.zaharia.s@gmail.com', 1, '75668301', '943494300', 2, 1, 2, '2020-08-21 19:56:07', '2020-08-21 19:56:07', NULL),
(333, 'Alejandra Cristina', 'Vidal Castillo', 'a.vidalcastillo@alum.up.edu.pe', 1, '74913589', '981403910', 8, 2, 2, '2020-08-21 21:32:43', '2020-08-21 21:32:43', NULL),
(334, 'Diana Carolina', 'Huamán Torres', 'dc.huamant@alum.up.edu.pe', 1, '72767457', '968076354', 8, 2, 2, '2020-08-21 21:32:43', '2020-08-21 21:32:43', NULL),
(335, 'Samantha Su Ling', 'Pacheco Portal', 'S.pachecoportal@alum.up.edu.pe', 1, '74285617', '940987823', 8, 2, 2, '2020-08-21 21:32:43', '2020-08-21 21:32:43', NULL),
(336, 'Sarita Beatriz', 'Sullón Morán', 'sb.sullonm@alum.up.edu.pe', 1, '71228752', '993068419', 8, 2, 3, '2020-08-21 21:32:43', '2020-08-21 21:32:43', NULL),
(337, 'María Fernanda', 'Ahumada Vásquez', '20181045@ipp.pe', 1, '76191966', '942888288', 3, 3, 1, '2020-08-21 21:52:21', '2020-08-21 21:52:21', NULL),
(338, 'Davis Jánsel', 'López Bancovich', '20172036@ipp.pe', 1, '48892619', '936022185', 3, 3, 1, '2020-08-21 21:52:21', '2020-08-21 21:52:21', NULL),
(339, 'Alessandro', 'Marini Alcalde', '20181041@ipp.pe', 1, '47161859', '942897666', 3, 3, 1, '2020-08-21 21:52:21', '2020-08-21 21:52:21', NULL),
(340, 'Eduardo Fernando', 'Mundaca Paredes', '20181071@ipp.pe', 1, '70849025', '981345541', 3, 3, 1, '2020-08-21 21:52:21', '2020-08-21 21:52:21', NULL),
(341, 'Franco', 'Vidal Llanos', '20181044@ipp.pe', 1, '75069188', '993422778', 3, 3, 1, '2020-08-21 21:52:21', '2020-08-21 21:52:21', NULL),
(342, 'Sebastian', 'Ishii Nishii', '20182015@ipp.pe', 1, '72930478', '988800405', 3, 3, 1, '2020-08-21 21:56:59', '2020-08-21 21:56:59', NULL),
(343, 'Eduardo Gonzalo', 'Rojas Paco', '20182039@ipp.pe', 1, '70668695', '995740895', 3, 3, 1, '2020-08-21 21:56:59', '2020-08-21 21:56:59', NULL),
(344, 'Sebastián', 'Boza Ruiz', '20182037@ipp.pe', 1, '76374443', '964250851', 3, 3, 1, '2020-08-21 21:56:59', '2020-08-21 21:56:59', NULL),
(345, 'Rosa Patricia', 'Martínez Cuadros', '20182009@ipp.pe', 1, '72419028', '948084517', 3, 3, 1, '2020-08-21 21:56:59', '2020-08-21 21:56:59', NULL),
(346, 'María Jacinta', 'Gildemeister Franco', '20181010@ipp.pe', 1, '76726764', '961704695', 3, 3, 2, '2020-08-21 22:05:47', '2020-08-21 22:05:47', NULL),
(347, 'Farhy Rodrigo', 'López Raa', '20181064@ipp.pe', 1, '77349722', '928266896', 3, 3, 2, '2020-08-21 22:05:47', '2020-08-21 22:05:47', NULL),
(348, 'Vanesa Paola', 'Vegas Albino', '20181019@ipp.pe', 1, '72914445', '987115607', 3, 3, 2, '2020-08-21 22:05:47', '2020-08-21 22:05:47', NULL),
(349, 'Gonzalo Ivan', 'Zúñiga Figueroa', '20181023@ipp.pe', 1, '75415774', '979770586', 3, 3, 2, '2020-08-21 22:05:47', '2020-08-21 22:05:47', NULL),
(350, 'Kyomi Nicole', 'Vidaurre Valencia', '20181061@ipp.pe', 1, '74167132', '998276844', 3, 3, 1, '2020-08-21 22:05:47', '2020-08-21 22:05:47', NULL),
(351, 'Alejandro Martin', 'Vicuña Pilco', 'u201513306@upc.edu.pe', 1, '70405562', '945344051', 2, 3, 1, '2020-08-21 22:11:14', '2020-08-21 22:11:14', NULL),
(352, 'Miguel Angel', 'Navarro Aliaga', 'u201616272@upc.edu.pe', 1, '75568569', '980461821', 2, 2, 1, '2020-08-21 22:11:14', '2020-08-21 22:11:14', NULL),
(353, 'César Ándres', 'Santiago Miranda', 'u20151b525@upc.edu.pe', 1, '72683276', '987860120', 2, 3, 1, '2020-08-21 22:11:14', '2020-08-21 22:11:14', NULL),
(354, 'Claudia Vanessa', 'Valdivia Guevara', 'u201511280@upc.edu.pe', 1, '70380713', '993227604', 2, 2, 3, '2020-08-21 22:11:14', '2020-08-21 22:11:14', NULL),
(355, 'Diane Antoinette', 'Sotomayor Camacho', 'u201510521@upc.edu.pe', 1, '73715063', '983510044', 2, 2, 3, '2020-08-21 22:11:14', '2020-08-21 22:11:14', NULL),
(357, 'Andrés Leandro', 'Quintanilla Rodríguez', '20131002@ipp.pe', 1, '45475142', '987796056', 3, 3, 3, '2020-08-21 22:32:30', '2020-08-21 22:32:30', NULL),
(358, 'Paola Priscila', 'Padilla Sandoval', '20172011@ipp.pe', 1, '76412399', '933534580', 3, 3, 3, '2020-08-21 22:32:30', '2020-08-21 22:32:30', NULL),
(359, 'Keyshey Shyna', 'Torres Oliveros', '20172029@ipp.pe', 1, '73046893', '933534580', 3, 3, 3, '2020-08-21 22:32:30', '2020-08-21 22:32:30', NULL),
(360, 'Francisco Alberto', 'Gordillo Céspedes', '20171015@ipp.pe', 1, '71901174', '947200536', 3, 3, 3, '2020-08-21 22:32:30', '2020-08-21 22:32:30', NULL),
(361, 'Gonzalo Miguel', 'Rios Moscoso', 'gonza5389@gmail.com', 1, '74999270', '982091805', 3, 3, 2, '2020-08-21 22:33:11', '2020-08-21 22:33:11', NULL),
(362, 'Jesús Steven', 'Sánchez Valencia', 'jesus.sv6@gmail.com', 1, '72529342', '949949359', 3, 3, 2, '2020-08-21 22:33:11', '2020-08-21 22:33:11', NULL),
(363, 'Allison Kellie', 'Torres Zapata', 'kellie.9422@gmail.com', 1, '72920261', '949829633', 3, 3, 2, '2020-08-21 22:33:11', '2020-08-21 22:33:11', NULL),
(364, 'Anthonny Abdel', 'Flores Tananta', 'anthonny.ft@gmail.com', 1, '46712374', '980493133', 3, 3, 2, '2020-08-21 22:33:12', '2020-08-21 22:33:12', NULL),
(365, 'Almendra Azucena', 'Ezeta Pradell', 'almendra.ezeta.pradell@gmail.com', 1, '72491597', '987768140', 3, 3, 2, '2020-08-21 22:33:12', '2020-08-21 22:33:12', NULL),
(367, 'Enrique Alexis', 'Carbajal Encarnación', 'alexiscarbajal89@gmail.com', 1, '48443552', '983150771', 2, 1, 2, '2020-08-21 22:39:49', '2020-08-21 22:39:49', NULL),
(368, 'Marlen Barbara', 'Gonzalez Bilkowskij', 'marlenbgb@gmail.com', 1, '72028467', '993238849', 2, 1, 2, '2020-08-21 22:39:49', '2020-08-21 22:39:49', NULL),
(369, 'Mijhail Jurgen', 'Maierhanser Robles', 'mijhailmr@yahoo.es', 1, '70254748', '945191188', 2, 2, 1, '2020-08-21 22:39:49', '2020-08-21 22:39:49', NULL),
(370, 'Nicole Annette', 'Seperak Tavara', 'nicoleseperak16@gmail.com', 1, '75922539', '955329458', 2, 2, 3, '2020-08-21 22:39:49', '2020-08-21 22:39:49', NULL),
(371, 'Milagros Josselin', 'Vargas Sánchez', 'vsmilagros@outlook.es', 1, '72885250', '968470622', 2, 2, 3, '2020-08-21 22:39:49', '2020-08-21 22:39:49', NULL),
(372, 'Marianela', 'Guerrero Carranza', 'marianel1906@gmail.com', 1, '73311843', '996451811', 2, 2, 2, '2020-08-21 22:57:37', '2020-08-21 22:57:37', NULL),
(373, 'Jesús Estuardo', 'Pérez Núñez', 'jesusestuardo.perez@gmail.com', 1, '71142947', '999093129', 2, 2, 3, '2020-08-21 22:57:37', '2020-08-21 22:57:37', NULL),
(374, 'Mirtha Mayra', 'Quiróz Monzón', 'mayraquirozmo@gmail.com', 1, '72721545', '989998842', 2, 2, 1, '2020-08-21 22:57:37', '2020-08-21 22:57:37', NULL),
(375, 'Aaron Manuel', 'Díaz Yataco', 'aarondiazy.mkt@gmail.com', 1, '72158235', '971602866', 2, 1, 2, '2020-08-21 22:57:37', '2020-08-21 22:57:37', NULL),
(376, 'Yamile Alexandra', 'García Carlos', 'yamile.alexa.30@gmail.com', 1, '71481737', '993575733', 2, 2, 1, '2020-08-21 23:06:47', '2020-08-21 23:06:47', NULL),
(377, 'Fernanda', 'Gómez De La Torre', 'fernandagomezdelatorre@gmail.com', 1, '70451888', '952886943', 2, 2, 2, '2020-08-21 23:06:47', '2020-08-21 23:06:47', NULL),
(378, 'José Miguel', 'Guerra Tacilla', 'josegt66@gmail.com', 1, '73193000', '987209523', 2, 1, 2, '2020-08-21 23:06:47', '2020-08-21 23:06:47', NULL),
(379, 'Jorge Kenyi', 'Sánchez Sulca', 'jsanchez.sul@gmail.com', 1, '74228388', '913047350', 2, 2, 1, '2020-08-21 23:06:47', '2020-08-21 23:06:47', NULL),
(380, 'Andrea Pamela', 'Tuya Mori', 'andreapamelac@gmail.com', 1, '77416163', '987289811', 2, 1, 1, '2020-08-21 23:06:47', '2020-08-21 23:06:47', NULL),
(382, 'Dafna Fernanda', 'Flores Rengifo', 'u201612354@upc.edu.pe', 1, '71715266', '979348355', 2, 2, 2, '2020-08-21 23:21:09', '2020-08-21 23:21:09', NULL),
(383, 'Fiorella Beatriz', 'Espino Espino', 'u201512468@upc.edu.pe', 1, '73374798', '979348355', 2, 2, 3, '2020-08-21 23:21:09', '2020-08-21 23:21:09', NULL),
(384, 'Majory Alejandra', 'Espinoza Marce,', 'u201425297@upc.edu.pe', 1, '72147632', '902015423', 2, 2, 3, '2020-08-21 23:21:09', '2020-08-21 23:21:09', NULL),
(385, 'Andrea Elizabeth', 'Apari Muñante', 'U201414645@upc.edu.pe', 1, '71395733', '950171901', 2, 3, 3, '2020-08-21 23:21:09', '2020-08-21 23:21:09', NULL),
(386, 'Sofia Alejandra', 'Rodriguez Muñante', 'u201617434@upc.edu.pe', 1, '70806934', '950305268', 2, 2, 1, '2020-08-21 23:21:09', '2020-08-21 23:21:09', NULL),
(387, 'Jazmín Irma', 'Sierra Yupanqui', '20172022@ipp.pe', 1, '72274503', '991337599', 3, 3, 3, '2020-08-21 23:31:14', '2020-08-21 23:31:14', NULL),
(388, 'Isabella', 'Boggio De las Casas', '20172012@ipp.pe', 1, '72000101', '941378832', 3, 3, 3, '2020-08-21 23:31:14', '2020-08-21 23:31:14', NULL),
(389, 'Jimena Esther', 'Quijada Marcas', '20172038@ipp.pe', 1, '71226987', '912316046', 3, 3, 3, '2020-08-21 23:31:14', '2020-08-21 23:31:14', NULL);
INSERT INTO `students` (`id`, `student_name`, `student_lastname`, `student_email`, `student_document_type_id`, `student_document`, `student_mobile`, `student_college_id`, `student_career_id`, `student_cycle_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(390, 'Alessia', 'De Cossio Moncloa', '20171013@ipp.pe', 1, '71490775', '936292782', 3, 3, 3, '2020-08-21 23:31:14', '2020-08-21 23:31:14', NULL),
(391, 'Davidalonso Manuel', 'Garibay Vertiz', '20172014@ipp.pe', 1, '70365071', '934389737', 3, 3, 1, '2020-08-21 23:32:27', '2020-08-21 23:32:27', NULL),
(392, 'Jorge Sebastián', 'Galarza Pasco', '20182035@ipp.pe', 1, '70656761', '948186118', 3, 3, 1, '2020-08-21 23:32:27', '2020-08-21 23:32:27', NULL),
(393, 'José David', 'Alcántara García', '20171014@ipp.pe', 1, '47515567', '959173087', 3, 3, 1, '2020-08-21 23:32:27', '2020-08-21 23:32:27', NULL),
(394, 'Johifer Hugo', 'Ortiz Sandoval', '20182036@ipp.pe', 1, '75152501', '933610609', 3, 3, 1, '2020-08-21 23:32:27', '2020-08-21 23:32:27', NULL),
(395, 'Anderson Joed', 'Salazar Reynoso', '20182029@ipp.pe', 1, '73601131', '934965501', 3, 3, 1, '2020-08-21 23:32:27', '2020-08-21 23:32:27', NULL),
(397, 'Fabriccio', 'Butron Moran', 'fabricciobutron@gmail.com', 1, '72635094', '996023208', 2, 2, 1, '2020-08-21 23:32:54', '2020-08-21 23:32:54', NULL),
(398, 'Alejandro', 'Elias Duarte', 'alejandroeliasd@gmail.com', 1, '74238960', '990207400', 2, 2, 2, '2020-08-21 23:32:54', '2020-08-21 23:32:54', NULL),
(399, 'Silvana', 'Fernandez Maldonado Tincopa', 'silvanafernandezmaldonado@gmail.com', 1, '75851586', '989432776', 2, 1, 1, '2020-08-21 23:32:54', '2020-08-21 23:32:54', NULL),
(400, 'Maria Fernanda', 'Pereira Reina', 'mariapereira1798@gmail.com', 1, '75816195', '942901502', 2, 3, 2, '2020-08-21 23:32:55', '2020-08-21 23:32:55', NULL),
(401, 'Valeria Ximena', 'Pool Bayona', 'valeria.pool@hotmail.com', 1, '74968365', '949483313', 2, 2, 1, '2020-08-21 23:32:55', '2020-08-21 23:32:55', NULL),
(402, 'Daniela Lizeth', 'Sanchez Herrera', '20171045@ipp.pe', 1, '75580440', '960443039', 3, 3, 2, '2020-08-21 23:54:06', '2020-08-21 23:54:06', NULL),
(403, 'Alma Luisa', 'Alcázar Vega', '20171033@ipp.pe', 1, '73265171', '954845606', 3, 3, 2, '2020-08-21 23:54:06', '2020-08-21 23:54:06', NULL),
(404, 'Jhoe Humberto', 'Pacora Aleman', '20172005@ipp.pe', 1, '71079175', '989791768', 3, 3, 2, '2020-08-21 23:54:06', '2020-08-21 23:54:06', NULL),
(405, 'Lucas Alejandro', 'Henostroza Ulpiano', '20171047@ipp.pe', 1, '73240689', '922560065', 3, 3, 2, '2020-08-21 23:54:06', '2020-08-21 23:54:06', NULL),
(406, 'Patricia Sofia', 'Muñoz Tincopa', '20172004@ipp.pe', 1, '74654781', '949179518', 3, 3, 2, '2020-08-21 23:54:06', '2020-08-21 23:54:06', NULL),
(407, 'Andrea Esmeralda', 'Morocho Rodriguez', 'u201521491@upc.edu.pe', 1, '73785052', '980673327', 2, 2, 2, '2020-08-22 00:06:18', '2020-08-22 00:06:18', NULL),
(408, 'David Miguel', 'Felipe Bances', 'u201511813@upc.edu.pe', 1, '71387599', '970435648', 2, 2, 2, '2020-08-22 00:06:18', '2020-08-22 00:06:18', NULL),
(409, 'Karla Alessandra', 'Irribarren Chumpitaz', 'u201411226@upc.edu.pe', 1, '70084885', '944570405', 2, 3, 2, '2020-08-22 00:06:18', '2020-08-22 00:06:18', NULL),
(410, 'Sheyla', 'Díaz Guzmán', 'u201522249@upc.edu.pe', 1, '70342747', '951806537', 2, 1, 2, '2020-08-22 00:06:18', '2020-08-22 00:06:18', NULL),
(411, 'Mauricio Gonzalo', 'Carbajal Vargas', 'u201510765@upc.edu.pe', 1, '75192488', '969438881', 2, 2, 2, '2020-08-22 00:06:18', '2020-08-22 00:06:18', NULL),
(412, 'Yhair', 'Egoavil Araujo', 'yhair.egoavil@gmail.com', 1, '71835453', '924251831', 2, 2, 1, '2020-08-22 00:06:58', '2020-08-22 00:06:58', NULL),
(413, 'Reneé Alessandra', 'Garcia Landa', 'reglan.3818@gmail.com', 1, '70441292', '981914326', 2, 2, 1, '2020-08-22 00:06:58', '2020-08-22 00:06:58', NULL),
(414, 'Valeria Alejandra', 'Torres Vilchez', 'vatorresvilchez@gmail.com', 1, '73109462', '922494577', 2, 2, 1, '2020-08-22 00:06:58', '2020-08-22 00:06:58', NULL),
(415, 'Jesús Arles', 'Hernández Villavicencio', 'jesusarles26@gmail.com', 1, '72758295', '999999999', 2, 1, 1, '2020-08-22 00:06:58', '2020-08-22 00:06:58', NULL),
(416, 'Maria José', 'Higinio Zevallos', 'mariajosehiginio@hotmail.com', 1, '070254748', '999999999', 2, 1, 1, '2020-08-22 00:06:58', '2020-08-22 00:06:58', NULL),
(417, 'Paula Alessandra', 'Bellido Valencia', 'U201622848@upc.edu.pe', 1, '75427741', '986666113', 2, 2, 1, '2020-08-22 00:14:57', '2020-08-22 00:14:57', NULL),
(418, 'Hilda Nelly', 'Arista Bardales', 'u201518957@upc.edu.pe', 1, '71323557', '941857431', 2, 1, 1, '2020-08-22 00:14:57', '2020-08-22 00:14:57', NULL),
(419, 'Eddy Hiroshi', 'Ley Gushiken', 'u201621113@upc.edu.pe', 1, '76409334', '923861418', 2, 2, 1, '2020-08-22 00:14:57', '2020-08-22 00:14:57', NULL),
(420, 'Luis Adrián', 'Maeda Rivadeneyra', 'u20151b966@upc.edu.pe', 1, '73312079', '950271932', 2, 2, 1, '2020-08-22 00:14:57', '2020-08-22 00:14:57', NULL),
(421, 'Marco Antonio Pool', 'Tapia Cervantes', 'u201618874@upc.edu.pe', 1, '48133805', '977140957', 2, 2, 1, '2020-08-22 00:14:57', '2020-08-22 00:14:57', NULL),
(422, 'Alison', 'Nuñez Mego', 'alisonmelina28@gmail.com', 1, '74693391', '973348851', 2, 2, 2, '2020-08-22 00:43:37', '2020-08-22 00:43:37', NULL),
(423, 'Diana', 'Surco Ramos', 'carola_5_10@hotmail.com', 1, '72526642', '964304776', 2, 2, 2, '2020-08-22 00:43:37', '2020-08-22 00:43:37', NULL),
(424, 'Claudia Araceli', 'Vargas Flores', 'U201515790@upc.edu.pe', 1, '71219703', '999999999', 2, 1, 1, '2020-08-22 00:43:37', '2020-08-22 00:43:37', NULL),
(425, 'Alejandra', 'Valdez Cifuentes', 'U201512140@upc.edu.pe', 1, '76243740', '999999999', 2, 1, 1, '2020-08-22 00:43:37', '2020-08-22 00:43:37', NULL),
(426, 'Camila Sofia', 'Aparcana Aparcana', 'camila.aparcana9@hotmail.com', 1, '72437568', '969755736', 2, 2, 1, '2020-08-22 00:43:37', '2020-08-22 00:43:37', NULL),
(428, 'Julio Abraham', 'Antezana Febres', 'julio.antezanaf@gmail.com', 1, '74283712', '999731980', 2, 2, 2, '2020-08-22 00:57:12', '2020-08-22 00:57:12', NULL),
(429, 'Olenka Massiel', 'Betancourt Paredes', 'loshua_zp@hotmail.com', 1, '76276453', '999999999', 2, 1, 1, '2020-08-22 00:57:12', '2020-08-22 00:57:12', NULL),
(430, 'Melanie Lizbeth', 'Quiñones Rojas', 'melanieqr17@gmail.com', 1, '72168917', '954768347', 2, 2, 2, '2020-08-22 00:57:12', '2020-08-22 00:57:12', NULL),
(431, 'Georgett', 'Vidal Pacheco', 'geovidalp@gmail.com', 1, '72606569', '999999999', 2, 1, 1, '2020-08-22 00:57:12', '2020-08-22 00:57:12', NULL),
(432, 'Karen Danitza', 'Zavala Paiva', 'zavala.karend@gmail.com', 1, '72876328', '991828099', 2, 2, 2, '2020-08-22 00:57:12', '2020-08-22 00:57:12', NULL),
(433, 'José Antonio', 'Medina Escobar', 'JORGEMEDINAPH@GMAIL.COM', 1, '74830187', '910804344', 2, 1, 1, '2020-08-22 01:00:08', '2020-08-22 01:00:08', NULL),
(434, 'Renata', 'Vargas Tapia', 'RENATAVARGAS14@GMAIL.COM', 1, '73417637', '941978907', 2, 1, 1, '2020-08-22 01:00:08', '2020-08-22 01:00:08', NULL),
(435, 'CAROLYNE LUCIA', 'UGARTE CASADO', 'CAROUGARTE9826@GMAIL.COM', 1, '72613218', '999042100', 2, 2, 1, '2020-08-22 01:00:08', '2020-08-22 01:00:08', NULL),
(436, 'Mariana', 'Miñan Ñiño', 'marianaamn98@gmail.com', 1, '75395191', '955512134', 2, 2, 2, '2020-08-22 01:00:08', '2020-08-22 01:00:08', NULL),
(437, 'Yanira Arlet', 'Zeña Blascano', 'YANIRA.ZB16@GMAIL.COM', 1, '74870502', '965749674', 2, 2, 1, '2020-08-22 01:00:08', '2020-08-22 01:00:08', NULL),
(438, 'Diego Alonso', 'Cuba Velasco', 'diegocubamkt@gmail.com', 1, '74648261', '965136122', 2, 2, 1, '2020-08-22 01:04:29', '2020-08-22 01:04:29', NULL),
(439, 'Margot Rosario', 'Gálvez Loayza', 'rosariogalvz@gmail.com', 1, '72030331', '960618254', 2, 1, 2, '2020-08-22 01:04:29', '2020-08-22 01:04:29', NULL),
(440, 'Diego', 'Machuca Hurtado', 'diegomac181@gmail.com', 1, '75002326', '945005474', 2, 2, 2, '2020-08-22 01:04:30', '2020-08-22 01:04:30', NULL),
(441, 'Tatiana', 'Montenegro Vera', 'tatimontenegro98@gmail.com', 1, '74901757', '997501132', 2, 2, 3, '2020-08-22 01:04:30', '2020-08-22 01:04:30', NULL),
(442, 'Franco Miguel Ángel', 'Veláquez Torres', 'miguelvetor15@gmail.com', 1, '75431715', '943404213', 2, 2, 3, '2020-08-22 01:04:30', '2020-08-22 01:04:30', NULL),
(443, 'Bruno Javier', 'Aparicio Guzmán', 'brunoag2107@gmail.com', 1, '70863076', '933161240', 2, 2, 1, '2020-08-22 01:08:41', '2020-08-22 01:08:41', NULL),
(444, 'Omar Marcelo', 'Ayllón Cárdenas', 'omarayllon98@gmail.com', 1, '76232712', '953699220', 2, 2, 1, '2020-08-22 01:08:42', '2020-08-22 01:08:42', NULL),
(445, 'Sandra Rafaela', 'Cotrina Salcedo', 'u201512351@upc.edu.pe', 1, '73003535', '999999999', 2, 1, 2, '2020-08-22 01:08:42', '2020-08-22 01:08:42', NULL),
(446, 'Andrea Lucia', 'Hurtado Mandujano', 'andrea.hurtado.man@gmail.com', 1, '70149699', '987780960', 2, 2, 1, '2020-08-22 01:08:42', '2020-08-22 01:08:42', NULL),
(447, 'Erika del Pilar', 'Neyra Panduro', 'erika97neyra@gmail.com', 1, '72300945', '944694234', 2, 1, 2, '2020-08-22 01:08:42', '2020-08-22 01:08:42', NULL),
(448, 'Fiorella Shellel', 'Vega Valverde', '20182506@ipp.pe', 1, '72896982', '988011129', 3, 3, 1, '2020-08-22 01:33:57', '2020-08-22 01:33:57', NULL),
(449, 'Irina', 'Masgo Contreras', '20182032@ipp.pe', 1, '77054498', '970515298', 3, 3, 1, '2020-08-22 01:33:57', '2020-08-22 01:33:57', NULL),
(450, 'Diego Armando', 'Garriazo Armas', '20182011@ipp.pe', 1, '71337360', '947967868', 3, 3, 1, '2020-08-22 01:33:57', '2020-08-22 01:33:57', NULL),
(451, 'Carla Sofía', 'Blas Cáceres', '20182502@ipp.pe', 1, '77131986', '962758798', 3, 3, 1, '2020-08-22 01:33:57', '2020-08-22 01:33:57', NULL),
(452, 'David', 'Moreano', '20172033@ipp.pe', 1, '76992100', '966397172', 3, 3, 2, '2020-08-22 03:50:28', '2020-08-22 03:50:28', NULL),
(453, 'Ken', 'Elcorrobarrutia', '20181034@ipp.pe', 1, '72074950', '936045992', 3, 3, 2, '2020-08-22 03:50:28', '2020-08-22 03:50:28', NULL),
(454, 'Gonzalo', 'Retamozo', '20172007@ipp.pe', 1, '75658475', '983991768', 3, 3, 2, '2020-08-22 03:50:28', '2020-08-22 03:50:28', NULL),
(455, 'Laura', 'Rojas', '20181039@ipp.pe', 1, '70125251', '978462723', 3, 3, 2, '2020-08-22 04:24:04', '2020-08-22 04:24:04', NULL),
(456, 'Juan José', 'Soria', '20181063@ipp.pe', 1, '76230643', '927824251', 3, 3, 2, '2020-08-22 04:24:04', '2020-08-22 04:24:04', NULL),
(457, 'Mariagracia', 'Jimeno Aguirre', '20181022@ipp.pe', 1, '73831506', '958536300', 3, 3, 2, '2020-08-22 04:24:04', '2020-08-22 04:24:04', NULL),
(458, 'Fabrizio', 'Huallpa Guerra', '20181059@ipp.pe', 1, '77087498', '993369620', 3, 3, 2, '2020-08-22 04:24:04', '2020-08-22 04:24:04', NULL),
(459, 'Caroline', 'Castro Laura', '20181021@ipp.pe', 1, '72552580', '916199902', 3, 3, 2, '2020-08-22 04:24:05', '2020-08-22 04:24:05', NULL),
(461, 'Kimberli Leonor', 'López Romero', 'kimberli.lopezr@pucp.edu.pe', 1, '72201252', '922206982', 6, 3, 1, '2020-08-24 10:55:53', '2020-08-24 10:55:53', NULL),
(462, 'Carlos Ernesto', 'De la Vega Valverde', 'cdelavega@pucp.edu.pe', 1, '72439435', '989391340', 6, 3, 1, '2020-08-24 10:55:53', '2020-08-24 10:55:53', NULL),
(463, 'Franco César', 'Segovia Flores', 'franco.segovia@pucp.edu.pe', 1, '76813158', '992602782', 6, 3, 1, '2020-08-24 10:55:53', '2020-08-24 10:55:53', NULL),
(464, 'Katerine', 'Soldevilla Suárez', 'ksoldevilla@pucp.edu.pe', 1, '73258216', '963605837', 6, 3, 1, '2020-08-24 10:55:53', '2020-08-24 10:55:53', NULL),
(465, 'Shina Andrea', 'Ortiz Tsuda', 's.ortiz@pucp.edu.pe', 1, '72306730', '942415846', 6, 3, 1, '2020-08-24 10:55:53', '2020-08-24 10:55:53', NULL),
(466, 'Isabel Milagros', 'Palpa Micuilla', '20142116@aloe.ulima.edu.pe', 1, '73572104', '994765644', 1, 3, 2, '2020-08-26 17:14:22', '2020-08-26 17:14:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_user`
--

CREATE TABLE `student_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `student_user`
--

INSERT INTO `student_user` (`id`, `student_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(2, 3, 2, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(3, 4, 2, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(4, 6, 3, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(5, 7, 3, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(6, 8, 3, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(7, 9, 3, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(8, 11, 4, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(9, 12, 4, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(10, 13, 4, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(11, 14, 4, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(12, 15, 4, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(13, 17, 5, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(14, 18, 5, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(15, 19, 5, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(16, 20, 5, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(17, 21, 5, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(18, 22, 6, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(19, 23, 6, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(20, 24, 6, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(21, 25, 6, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(22, 27, 7, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(23, 28, 7, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(24, 29, 7, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(25, 31, 8, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(26, 32, 8, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(27, 33, 8, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(28, 34, 9, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(29, 35, 9, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(30, 36, 9, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(31, 37, 9, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(32, 39, 10, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(33, 40, 10, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(34, 41, 10, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(35, 42, 10, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(36, 43, 10, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(37, 45, 11, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(38, 46, 11, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(39, 47, 11, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(40, 48, 11, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(41, 49, 11, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(42, 51, 12, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(43, 52, 12, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(44, 53, 12, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(45, 54, 12, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(46, 55, 12, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(47, 57, 13, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(48, 58, 13, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(49, 59, 13, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(50, 60, 13, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(51, 61, 13, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(52, 62, 13, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(53, 64, 14, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(54, 65, 14, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(55, 66, 14, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(56, 67, 14, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(57, 68, 14, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(58, 70, 15, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(59, 71, 15, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(60, 72, 15, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(61, 73, 15, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(62, 74, 15, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(63, 75, 15, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(64, 76, 16, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(65, 77, 16, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(66, 78, 16, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(67, 80, 17, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(68, 81, 17, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(69, 82, 17, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(70, 84, 18, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(71, 85, 18, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(72, 86, 18, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(73, 87, 18, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(74, 88, 18, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(75, 90, 19, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:00:00'),
(76, 91, 19, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:00:00'),
(77, 92, 19, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:00:00'),
(78, 93, 19, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:00:00'),
(79, 95, 20, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(80, 96, 20, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(81, 97, 20, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(82, 98, 20, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(83, 99, 20, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(84, 101, 21, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:00:00'),
(85, 102, 21, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:00:00'),
(86, 103, 21, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:00:00'),
(87, 105, 22, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(88, 106, 22, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(89, 107, 22, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(90, 108, 22, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(91, 109, 22, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(92, 111, 23, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(93, 112, 23, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(94, 113, 23, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(95, 114, 23, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(96, 115, 23, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(97, 116, 24, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(98, 117, 24, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(99, 118, 24, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(100, 119, 24, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(101, 120, 24, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(102, 122, 25, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(103, 123, 25, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(104, 124, 25, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(105, 125, 25, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(106, 126, 25, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(107, 128, 26, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(108, 129, 26, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(109, 130, 26, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(110, 131, 26, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(111, 132, 26, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(112, 133, 27, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(113, 134, 27, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(114, 135, 27, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(115, 136, 27, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(116, 137, 27, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(117, 139, 28, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(118, 140, 28, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(119, 141, 28, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(120, 142, 28, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(121, 144, 29, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(122, 145, 29, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(123, 146, 29, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(124, 147, 29, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(125, 148, 29, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(126, 150, 30, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(127, 151, 30, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(128, 152, 30, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(132, 157, 32, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(133, 158, 32, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(134, 159, 32, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(135, 160, 32, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(136, 162, 33, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(137, 163, 33, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(138, 164, 33, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(139, 165, 34, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(140, 166, 34, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(141, 167, 34, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(142, 168, 35, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(143, 169, 35, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(144, 170, 35, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(145, 172, 36, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(146, 173, 36, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(147, 174, 36, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(148, 175, 37, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(149, 176, 37, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(150, 177, 37, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(151, 179, 38, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(152, 46, 38, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(153, 47, 38, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(154, 180, 38, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(155, 45, 38, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(156, 181, 39, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(157, 182, 39, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(158, 183, 39, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(159, 184, 39, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(160, 185, 39, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(161, 187, 40, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(162, 188, 40, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(163, 189, 40, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(164, 190, 40, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(165, 192, 41, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(166, 193, 41, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(167, 194, 41, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(168, 195, 42, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(169, 196, 42, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(170, 197, 42, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(171, 199, 43, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(172, 200, 43, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(173, 201, 43, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(174, 202, 43, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(175, 203, 43, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(188, 213, 48, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(189, 214, 48, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(190, 215, 48, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(191, 216, 48, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(192, 217, 49, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(193, 218, 49, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(194, 219, 49, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(195, 220, 49, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(196, 221, 49, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(197, 222, 50, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(198, 223, 50, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(199, 224, 50, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(200, 225, 50, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(201, 226, 50, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(202, 228, 51, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(203, 229, 51, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(204, 230, 51, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(205, 231, 51, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(206, 233, 52, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(207, 234, 52, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(208, 235, 52, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(209, 236, 52, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(210, 237, 53, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(211, 238, 53, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(212, 239, 53, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(213, 240, 53, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(214, 242, 54, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(215, 243, 54, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(216, 244, 54, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(217, 245, 54, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(218, 246, 54, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(225, 250, 57, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(226, 251, 57, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(227, 252, 57, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(228, 253, 57, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(229, 254, 57, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(230, 256, 58, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(231, 257, 58, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(232, 258, 58, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(233, 259, 58, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(234, 260, 58, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(235, 262, 59, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(236, 263, 59, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(237, 264, 59, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(238, 265, 59, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(239, 266, 60, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(240, 267, 60, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(241, 268, 60, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(242, 269, 60, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(243, 270, 60, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(244, 271, 61, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(245, 272, 61, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(246, 273, 61, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(247, 274, 61, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(248, 275, 61, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(249, 276, 62, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(250, 277, 62, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(251, 278, 62, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(252, 280, 63, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(253, 281, 63, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(254, 282, 63, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(255, 283, 63, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(256, 284, 63, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(257, 285, 64, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(258, 286, 64, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(259, 287, 64, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(260, 288, 64, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(261, 289, 64, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(262, 291, 65, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(263, 292, 65, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(264, 293, 65, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(265, 294, 65, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(266, 295, 65, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(267, 297, 66, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(268, 298, 66, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(269, 299, 66, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(270, 300, 66, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(271, 301, 66, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(272, 303, 67, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(273, 304, 67, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(274, 305, 67, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(275, 306, 67, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(276, 307, 68, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(277, 308, 68, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(278, 309, 68, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(279, 310, 68, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(280, 311, 68, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(281, 312, 69, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(282, 313, 69, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(283, 314, 69, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(284, 315, 69, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(285, 316, 69, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(286, 317, 70, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(287, 318, 70, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(288, 319, 70, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(289, 320, 70, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(290, 321, 70, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(291, 322, 71, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(292, 323, 71, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(293, 324, 71, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(294, 325, 71, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(295, 326, 71, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(296, 327, 72, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(297, 328, 72, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(298, 329, 72, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(299, 330, 72, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(300, 331, 72, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(301, 333, 73, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(302, 334, 73, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(303, 335, 73, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(304, 336, 73, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(305, 337, 74, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(306, 338, 74, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(307, 339, 74, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(308, 340, 74, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(309, 341, 74, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(310, 342, 75, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(311, 343, 75, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(312, 344, 75, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(313, 345, 75, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(314, 346, 76, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(315, 347, 76, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(316, 348, 76, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(317, 349, 76, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(318, 350, 76, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(319, 351, 77, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(320, 352, 77, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(321, 353, 77, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(322, 354, 77, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(323, 355, 77, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(324, 357, 78, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(325, 358, 78, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(326, 359, 78, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(327, 360, 78, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(328, 361, 79, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(329, 362, 79, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(330, 363, 79, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(331, 364, 79, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(332, 365, 79, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(333, 367, 80, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(334, 368, 80, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(335, 369, 80, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(336, 370, 80, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(337, 371, 80, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(338, 372, 81, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(339, 373, 81, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(340, 374, 81, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(341, 375, 81, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(342, 376, 82, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(343, 377, 82, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(344, 378, 82, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(345, 379, 82, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(346, 380, 82, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(347, 382, 83, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(348, 383, 83, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(349, 384, 83, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(350, 385, 83, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(351, 386, 83, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(352, 387, 84, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(353, 388, 84, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(354, 389, 84, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(355, 390, 84, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(356, 391, 85, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(357, 392, 85, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(358, 393, 85, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(359, 394, 85, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(360, 395, 85, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(361, 397, 86, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(362, 398, 86, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(363, 399, 86, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(364, 400, 86, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(365, 401, 86, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(366, 402, 87, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(367, 403, 87, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(368, 404, 87, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(369, 405, 87, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(370, 406, 87, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(371, 407, 88, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(372, 408, 88, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(373, 409, 88, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(374, 410, 88, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(375, 411, 88, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(376, 412, 89, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(377, 413, 89, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(378, 414, 89, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(379, 415, 89, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:59:08'),
(380, 416, 89, '2020-08-25 16:00:00', '2020-08-25 16:00:00', '2020-08-25 16:59:20'),
(381, 417, 90, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(382, 418, 90, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(383, 419, 90, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(384, 420, 90, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(385, 421, 90, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(386, 422, 91, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(387, 423, 91, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(388, 424, 91, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(389, 425, 91, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(390, 426, 91, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(391, 428, 92, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(392, 429, 92, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(393, 430, 92, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(394, 431, 92, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(395, 432, 92, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(396, 433, 93, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(397, 434, 93, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(398, 435, 93, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(399, 436, 93, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(400, 437, 93, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(401, 438, 94, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(402, 439, 94, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(403, 440, 94, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(404, 441, 94, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(405, 442, 94, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(406, 443, 95, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(407, 444, 95, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(408, 445, 95, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(409, 446, 95, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(410, 447, 95, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(411, 448, 96, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(412, 449, 96, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(413, 450, 96, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(414, 451, 96, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(415, 452, 97, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(416, 453, 97, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(417, 454, 97, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(418, 455, 98, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(419, 456, 98, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(420, 457, 98, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(421, 458, 98, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(422, 459, 98, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(423, 461, 99, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(424, 462, 99, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(425, 463, 99, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(426, 464, 99, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(427, 465, 99, '2020-08-25 16:00:00', '2020-08-25 16:00:00', NULL),
(428, 466, 42, '2020-08-26 17:18:49', '2020-08-26 17:18:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_document` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_profession` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_college_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_lastname`, `teacher_email`, `teacher_document_type_id`, `teacher_document`, `teacher_mobile`, `teacher_profession`, `teacher_college_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'José', 'Olivera', 'ricardo_jbl2011@hotmail.com', 2, '123456AB', '948 758 795', 'Barrendero', 3, '2020-07-29 09:28:12', '2021-03-17 11:22:18', NULL),
(5, 'Juan José', 'Tirado Gamarra', 'jtirado@ipp.pe', 1, '07810981', '964735308', 'Publicista', 3, '2020-07-29 09:28:13', '2020-08-21 21:56:59', NULL),
(10, 'Ricardo', 'Majka', 'rmajka@ipp.pe', 1, '000221573', '999008188', 'Publicista', 3, '2020-07-29 09:28:13', '2020-08-22 04:24:04', NULL),
(16, 'Ana María', 'Barbero', 'anabarbero@hotmail.com', 1, '29641932', '', '', 2, '2020-07-29 09:28:13', '2020-07-29 09:28:13', NULL),
(26, 'Luis Fernando', 'Terry', 'lterry@ulima.edu.pe', 1, '41722250', '', '', 1, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(30, 'Juan Miguel', 'Coriat', 'jcoriat@ulima.edu.pe', 1, '08194108', '', '', 1, '2020-07-29 09:28:14', '2020-07-29 09:28:14', NULL),
(38, 'Ángela Nelly', 'Domínguez Vergara', 'adominguezv@pucp.edu.pe', 1, '45862920', '994695686', 'Comunicación Social', 6, '2020-07-29 09:28:15', '2020-08-20 16:54:33', NULL),
(44, 'Anaís Consuelo', 'Gonzales Vilela', 'anais.gonzales@pucp.pe', 1, '47548501', '955346970', 'Publicista', 6, '2020-07-29 09:28:15', '2020-08-19 03:48:09', NULL),
(50, 'Luis Ernesto', 'Velezmoro Morales', 'lvelezmo@ulima.edu.pe', 1, '10545162', '997921629', 'Docente Universitario', 1, '2020-07-29 09:28:15', '2020-08-21 03:50:51', NULL),
(56, 'Carlos Enrique', 'Mory Olivares', 'pcadcmor@upc.edu.pe', 1, '10341734', '995076426', 'Licenciado en administración y marketing', 2, '2020-07-29 09:28:16', '2020-08-21 17:49:12', NULL),
(63, 'Iván', 'Quiquia', 'ivan.quiquia@pucp.edu.pe', 1, '42230002', '979345787', 'Marketing', 6, '2020-07-29 09:28:16', '2020-08-20 00:03:27', NULL),
(69, 'Nilda', 'Manco', 'pcamnman@upc.edu.pe', 1, '45462088', '', '', 2, '2020-07-29 09:28:16', '2020-07-29 09:28:16', NULL),
(79, 'Carlos', 'Bernal Arredondo', 'carlos.bernal@gmail.com', 1, '40332432', '992575743', 'Publicista', 2, '2020-08-13 03:27:42', '2020-08-13 03:27:42', NULL),
(83, 'Miguel', 'Jopen', 'mjopen@gmail.com', 1, '07261893', '939282501', 'Administrador', 2, '2020-08-14 18:27:16', '2020-08-22 01:00:08', NULL),
(89, 'Claudia', 'Aguilar Iparraguirre', 'claudia@orekan.pe', 1, '40954910', '993473344', 'Managing Director', 1, '2020-08-14 21:07:51', '2020-08-14 21:07:51', NULL),
(94, 'Daniel', 'Cárdenas Arroyo', 'dcardena@ulima.edu.pe', 1, '10809160', '947488257', 'Docente / Publicista - Marketing y Comunicación', 1, '2020-08-15 03:02:43', '2020-08-15 03:02:43', NULL),
(100, 'Aldo', 'Arata Farach', 'aldoarata7@gmail.com', 1, '40303188', '996792661', 'Ingeniería Industrial', 1, '2020-08-15 16:41:46', '2020-08-15 16:41:46', NULL),
(104, 'Vicky Inés', 'Montero Mattos', 'vmonteromattos@gmail.com', 1, '47537655', '951711195', 'Publicista', 6, '2020-08-15 21:41:20', '2020-08-15 21:41:20', NULL),
(110, 'Karla Diana', 'Chen Ramos', 'karla.chen@pucp.pe', 1, '70897302', '946548952', 'Publicidad', 6, '2020-08-15 22:40:04', '2020-08-15 22:40:04', NULL),
(121, 'Carmen Roxane', 'Rodriguez Daneri', 'crodriguez@pucp.pe', 1, '07390801', '982553062', 'Maestría en Sociología concluida y docente', 6, '2020-08-16 18:59:01', '2020-08-16 18:59:01', NULL),
(127, 'Javier Augusto', 'Andrade Borda', 'Jandradeb@pucp.edu.pe', 1, '43332863', '992705449', 'Publicista', 6, '2020-08-17 00:11:20', '2020-08-17 00:11:20', NULL),
(138, 'José', 'Olivar', 'joseolivar@gmail.com', 1, 'vvvvvvvv', '999999999', 'Profesor', 6, '2020-08-17 14:13:15', '2020-08-20 23:18:37', NULL),
(143, 'Marissa Esther', 'Pozo García', 'marissa.pozo@havasmg.com', 1, '07970530', '967704254', 'Ingeniería Estadística', 6, '2020-08-17 15:09:09', '2020-08-19 22:39:19', NULL),
(149, 'Rodolfo', 'Muente', 'rmuente@ulima.edu.pe', 1, '07778185', '959791642', 'Profesor de la Universidad de Lima', 1, '2020-08-17 15:55:02', '2020-08-17 15:55:02', NULL),
(161, 'fksahk', 'lkfdlkfdjs', 'e@gmail.com', 1, 'kkkkkkk1', '998493228', 'Profesor', 5, '2020-08-17 20:20:40', '2020-08-17 20:20:40', NULL),
(171, 'Ricardo', 'Ramos', 'ricardo@gmail.com', 1, 'mmmmmmm1', '999999999', 'Marketing', 8, '2020-08-17 20:34:43', '2020-08-17 20:34:43', NULL),
(178, 'Gary', 'Méndez Salvador', 'gamedor@gmail.com', 1, '43344585', '987716569', 'Publicista redactor creativo', 6, '2020-08-17 21:41:16', '2020-08-17 21:41:16', NULL),
(186, 'Patricia', 'Díaz Murillo', 'pdiazm@pucp.edu.pe', 1, '07634286', '987421332', 'Comunicación Audiovisual', 6, '2020-08-17 23:34:13', '2020-08-17 23:34:13', NULL),
(191, 'Rafael', 'Penny de Armero', 'rafael@insight.pe', 1, '40561845', '991714533', 'Administrador de Empresas', 1, '2020-08-17 23:54:39', '2020-08-17 23:54:39', NULL),
(198, 'Marybel', 'Mollo Flores', 'mmollo@ulima.edu.pe', 1, '42421724', '987187569', 'Marketing', 1, '2020-08-18 21:57:40', '2020-08-18 21:57:40', NULL),
(227, 'Laura Sara', 'Caro Vela', 'lcarov07@gmail.com', 1, '07967572', '986959256', 'Comunicadora', 1, '2020-08-20 00:11:28', '2020-08-20 00:11:28', NULL),
(232, 'ANGELA NESSY', 'VALDIVIA MURGUEYTIO', 'angelavaldivia@gmail.com', 1, '40912755', '987928181', 'Publicista-docente', 9, '2020-08-20 01:34:10', '2020-08-20 01:34:10', NULL),
(241, 'Jorge', 'Jara Salas', 'jjara@qimic.pe', 1, '08146081', '986604140', 'Publicista', 2, '2020-08-20 19:00:25', '2020-08-20 19:00:25', NULL),
(255, 'Willy Cesar', 'Chero Salazar', 'willy.chero@usil.pe', 1, '40589142', '997134164', 'Publicista', 9, '2020-08-21 00:06:00', '2020-08-21 14:39:25', NULL),
(261, 'María del Carmen', 'Rodríguez Rossi', 'mariadelcarmen.rossi@upn.pe', 1, '41133926', '994668848', 'Marketing y publicidad', 9, '2020-08-21 01:45:08', '2020-08-21 01:45:08', NULL),
(279, 'Joela', 'Alva Vergara', 'pccmjoal@upc.edu.pe', 1, '40153438', '997368218', 'Administracion', 2, '2020-08-21 16:10:46', '2020-08-21 16:10:46', NULL),
(290, 'Héctor', 'Mendoza Cuéllar', 'hmendozac@gmail.com', 1, '06805496', '988009979', 'Publicista', 6, '2020-08-21 17:21:20', '2020-08-21 17:21:20', NULL),
(296, 'Marta Cecilia', 'Vásquez Llerena', 'martacvasquezll@gmail.com', 1, '09541140', '989256169', 'Marketing', 2, '2020-08-21 17:34:53', '2020-08-21 17:34:53', NULL),
(302, 'Carla Eloisa', 'Arriola Alvarado', 'carla.arriola@usil.pe', 1, '41161858', '997313977', 'Marketing', 9, '2020-08-21 17:40:45', '2020-08-21 17:40:45', NULL),
(332, 'Ana María', 'Cano Lanza', 'am.canol@up.edu.pe', 1, '07259394', '995226390', 'Administración/ Marketing', 8, '2020-08-21 21:32:43', '2020-08-21 21:32:43', NULL),
(356, 'Rendo', 'Salazar', 'rsalazar@ipp.pe', 1, '08156977', '953698788', 'Publicista', 3, '2020-08-21 22:32:30', '2020-08-22 03:50:27', NULL),
(366, 'Karina Janeth', 'García Bravo', 'kgarciabravoc@gmail.com', 1, '40240548', '999443181', 'Magíster en Marketing / Publicidad', 2, '2020-08-21 22:39:49', '2020-08-21 22:39:49', NULL),
(381, 'Jenny', 'Vega Mondragón', 'pcamjveg@upc.edu.pe', 1, '10559021', '987111388', 'Marketing', 2, '2020-08-21 23:21:09', '2020-08-21 23:21:09', NULL),
(396, 'Patricio Alfonso', 'Corrales Dextre', 'pcampaco@upc.edu.pe', 1, '10263834', '997919342', 'Administrador', 2, '2020-08-21 23:32:54', '2020-08-21 23:32:54', NULL),
(427, 'Daniel', 'Varela Llanos', 'varelallanos.daniel@gmail.com', 1, '40387036', '993491915', 'Docente', 2, '2020-08-22 00:57:12', '2020-08-22 00:57:12', NULL),
(460, 'Melva Inés', 'Tamayo Huamán', 'melva.tamayo@gmail.com', 1, '43162520', '963763248', 'Publicidad', 6, '2020-08-24 10:55:53', '2020-08-24 10:55:53', NULL),
(467, 'Jorge Jannick', 'Eulert Bello', 'jannickeulert@gmail.com', 1, '45940463', '', '', 1, '2020-10-15 17:30:42', '2020-10-15 17:30:42', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_viewed` tinyint(1) NOT NULL,
  `is_completed` tinyint(1) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caso_id` bigint(20) UNSIGNED DEFAULT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `is_admin`, `is_viewed`, `is_completed`, `username`, `email`, `school`, `situation`, `password`, `confirmation_code`, `caso_id`, `college_id`, `teacher_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, 'ADMIN2020', NULL, NULL, 'ADMINISTRADOR', '$2y$10$JvBR1ydbK017wle5mNLl4uqJClbf3O9tVrT/qfzf/vWvYlzeZNsim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 1, 0, 'E2020001', 'ricardo_jbl2011@hotmail.com', 'Marketing y Publicidad', 'PARTICIPANTE', '$2y$10$lz3ld9dXx8W33Z5V58FHDudg/PzXJ0Z9uUX8SrNw9rxTgVbJKO4sK', 'fsjxGO4H5WnwgjAK9l63qnG2hknP7tez9cL6uFkH3oJpO81Nk1gy5FjPHEq6', 6, 6, 1, NULL, 'qVBUKU932aa0yIeWkv5X8gsdP34O16ViB7ysJT0B8uiilkDUJdKHYSyTgTV1', '2020-07-29 09:28:17', '2020-09-30 19:46:32', NULL),
(3, 0, 1, 0, 'E2019001', '', NULL, 'GANADOR', NULL, '6zens3pEg7wDdIsYJRVuyj7dLTpovBBPhm7zIwvvXGRFyL11ycyAvok7tQPt', 3, 3, 5, NULL, NULL, '2020-07-29 09:28:17', '2020-08-27 21:44:23', NULL),
(4, 0, 1, 0, 'E2019002', '', NULL, 'FINALISTA', NULL, 'PkMTpfgkaWxkoWpwfZgeiVKrzQW5Gx8yhK56Btqctar6zDS8v94vixGDE1o1', 3, 3, 10, NULL, NULL, '2020-07-29 09:28:18', '2020-08-27 21:44:59', NULL),
(5, 0, 1, 0, 'E2019003', '', NULL, 'FINALISTA', NULL, 'y5qdNYDuhVCkzRFG8YGtVU25t8mfGw0YNsahO8UEDGqhjgTrblOnf3p5PKDq', 3, 2, 16, NULL, NULL, '2020-07-29 09:28:18', '2021-02-26 09:56:06', NULL),
(6, 0, 0, 0, 'E2019004', '', NULL, 'GANADOR', NULL, 'QMATcio7r3VLyScjVdVRnm1bIQ5fVsG5a85RnGL7nqcPRcPAgp4OIRiwrYTU', 1, 3, 10, NULL, NULL, '2020-07-29 09:28:18', '2020-07-29 09:28:18', NULL),
(7, 0, 0, 0, 'E2019005', '', NULL, 'FINALISTA', NULL, '4g2tIOrTNFRnUoA2UJgSif1lTMZMfJkVGfeVCPjEJxbAABfzZvkdGNzKqqTE', 1, 1, 26, NULL, NULL, '2020-07-29 09:28:18', '2020-07-29 09:28:18', NULL),
(8, 0, 0, 0, 'E2019006', '', NULL, 'GANADOR', NULL, 'quVqBLwXsOAEWIgW4nY2FumyFhrp3SwscVMuil93kyNVkoGZkXL4F8j89gAf', 4, 1, 30, NULL, NULL, '2020-07-29 09:28:18', '2020-07-29 09:28:18', NULL),
(9, 0, 0, 0, 'E2019007', '', NULL, 'FINALISTA', NULL, '4VdtkHwI14TDcdYGZtyo5Blxc5KAhX3JRhI9W95vmv3IByrh0ilPDUPWf4jS', 4, 3, 5, NULL, NULL, '2020-07-29 09:28:18', '2020-07-29 09:28:18', NULL),
(10, 0, 0, 0, 'E2019008', '', NULL, 'FINALISTA', NULL, 'gNSHBOweVixMkoO6qGer4MzlaiFFDvheMcaDEjlGQMpwM9UTicpYkuiyd7qd', 4, 6, 38, NULL, NULL, '2020-07-29 09:28:18', '2020-07-29 09:28:18', NULL),
(11, 0, 0, 0, 'E2019009', '', NULL, 'GANADOR', NULL, 'OvJOUJk6S5mMMW29aQlghZTjAKw2S0k4bJKPrUI9uuIgBY1nTbqVNnWiZomy', 2, 6, 44, NULL, NULL, '2020-07-29 09:28:18', '2020-07-29 09:28:19', NULL),
(12, 0, 0, 0, 'E2019010', '', NULL, 'FINALISTA', NULL, 'rvNS0YYqBumZrs8t7bK3cIESDswDDq7LvfI0Wt8BUDfA1WYBQyeKFoJeIvDO', 2, 1, 50, NULL, NULL, '2020-07-29 09:28:19', '2020-07-29 09:28:19', NULL),
(13, 0, 0, 0, 'E2019011', '', NULL, 'FINALISTA', NULL, 'J6d8iTRpFrviVntgnotyHtSF2qOk3OCBD9aGgMiyspbphH7KwUNHV78Y5RMr', 2, 2, 56, NULL, NULL, '2020-07-29 09:28:19', '2020-07-29 09:28:19', NULL),
(14, 0, 0, 0, 'E2019012', '', NULL, 'GANADOR', NULL, 'CmXIeOrcIjxb0edKVBSrjTCC5TJ7NLI46SAr062TSgUGpYh6vLQ6mJO0hkVa', 5, 6, 63, NULL, NULL, '2020-07-29 09:28:19', '2020-07-29 09:28:19', NULL),
(15, 0, 1, 0, 'E2019013', '', NULL, 'FINALISTA', NULL, 'wk3B21O5s49sAEkKC65RAxkG7fK8zvwrvqjQjVMb1z2hLqF0PpujS4Vwx5C5', 5, 2, 69, NULL, NULL, '2020-07-29 09:28:19', '2020-08-27 21:44:47', NULL),
(16, 0, 1, 0, 'E2020002', '', 'Ciencias Empresariales y Económicas', 'FINALISTA', '$2y$10$AU9HH9n1UGU5fgcf7Wd5zufACbsxVqu.OXdX9ZO0LMJesbCXkjdbm', 'enUeVEDzhrxct1VRgFSnFzZ0aNd3rblBr46KRC2bJYHxCjEK4gKbqWzfFH9m', 6, 1, 30, '2020-08-12 02:47:46', NULL, '2020-08-12 02:46:29', '2020-08-15 05:20:46', NULL),
(17, 0, 1, 1, 'E2020003', '', 'Facultad de Comunicaciones', 'PARTICIPANTE', '$2y$10$HjeaIEorrAwmQg6xZVx87O77rblnuZH1gybcGdLINT2ByK.T7H.da', '0aIgnernXVqXq16MjU7olXNPgDu77JlucBfBy2oAsBLcPCVV3cfNY2PqQLlt', 7, 2, 79, '2020-08-13 03:30:16', NULL, '2020-08-13 03:27:42', '2020-09-22 14:47:28', NULL),
(18, 0, 1, 1, 'E2020004', '', 'negocios', 'PARTICIPANTE', '$2y$10$oG45rjlU/prPP3/O2ggK3uMNRCF8p9eHaDbJ4SXILoUTIPJkYph.S', 'UNgKIGmNYB7NLr0JOxvRDIkhe9y4wsLMf46waBS9ed9ZVrsyTVBZTlIjHzyM', 7, 2, 83, '2020-08-14 18:28:40', NULL, '2020-08-14 18:27:17', '2020-08-18 18:01:14', NULL),
(19, 0, 1, 0, 'E2020005', '', 'Marketing', 'NO VALIDADO', '$2y$10$v4SP2K6S8UWIyR92i5vEAOF0iGPGtFsmrWPqiH7teh/CLsns4SEiW', '3z4UBLKU8ZlrqYL8TInv0NvyrbcxGaAlgSSz5f52OpWo1kRE8fMiP1j9mWmP', 8, 1, 89, '2020-08-14 21:09:34', NULL, '2020-08-14 21:07:51', '2020-08-18 18:01:00', NULL),
(20, 0, 1, 1, 'E2020006', '', 'Facultad de Comunicación', 'PARTICIPANTE', '$2y$10$LAS6/kpwKTI1q1MBGDmhOuSkp7.ustzmHIxtN2Z4JMjehZtpvqUrq', 'vsPgkj2ujhAfKaWjK7gb0E0RGw61nKM2Olqz0qcB6NpKRid72AyCb1pnFOZa', 7, 1, 94, '2020-08-15 03:04:48', NULL, '2020-08-15 03:02:43', '2020-08-18 18:01:25', NULL),
(21, 0, 1, 0, 'E2020007', '', 'Ciencias Empresariales y Económicas', 'NO VALIDADO', '$2y$10$eb0UR3NYhteEsQTabhoBbeEqm0KZTLWO35iyROVRuZRlp8QolX15a', 'blPbafDXRzTLnMwHowVap9QGNfBURzvwU6OcSvRAkTNcwsdNyofLu4GLL4hr', 6, 1, 100, '2020-08-15 16:44:17', NULL, '2020-08-15 16:41:46', '2020-08-18 18:02:08', NULL),
(22, 0, 1, 1, 'E2020008', '', 'Comunicaciones', 'FINALISTA', '$2y$10$OrHCmYneW8AdTwtBB9dzR.2UnPn61peh85H5zxTXO9fDhJCyxEwle', 'RRuc1XrjSYyzpGaNlzPJiNIjrf9SX9pzuom2PCoBw1Q3Fu3IHk5vW1n7Uavx', 7, 6, 104, '2020-08-15 21:42:06', NULL, '2020-08-15 21:41:21', '2020-08-18 17:57:49', NULL),
(23, 0, 1, 0, 'E2020009', '', 'Ciencias de la Comunicación - Publicidad', 'PARTICIPANTE', '$2y$10$pXAfuY9Er5JrLod1gN0IRu2nnEwcAg2WXFBJ0ozTeJ7Nm8Ijd4s.W', 'H8hI8f8Vo4RSOtDuPx50K1OIE7cpxDviZSKBrVpCR01ndhjOOsTF3vZrqBOs', 6, 6, 110, '2020-08-15 22:41:30', NULL, '2020-08-15 22:40:05', '2020-08-18 18:02:17', NULL),
(24, 0, 1, 0, 'E2020010', '', 'Facultad de Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$KfH/GYfO0E1lhH9rK2C4ouvfV5yjS2dfaaIizJAqvOyl1cDSy1Vfy', 'dGejePBxZJ5ZtMwXMRAgAZ9rNDnuXJrj9m0tRH33FCxDQCJIixSPisKbYVum', 6, 6, 63, '2020-08-15 23:04:46', NULL, '2020-08-15 23:01:35', '2020-08-18 17:58:14', NULL),
(25, 0, 1, 1, 'E2020011', '', 'Facultad de Ciencias y Artes de la Comunicación', 'FINALISTA', '$2y$10$XnwF/DVy7/5PVsrWBT5zO.Xwkocm/.rduHqOOfSahf2pM/Zb.Oo4q', 'tyhz3VCZg6jnDaFsbgAhNZ899wAezSsk7qQFAne2dNb9D4sw4WZZ5XAXlYae', 8, 6, 121, '2020-08-16 19:00:56', NULL, '2020-08-16 18:59:01', '2020-08-18 18:02:28', NULL),
(26, 0, 1, 1, 'E2020012', '', 'Facultad de Ciencias y Artes de la Comunicación', 'FINALISTA', '$2y$10$Rug9QCKQyOtv19Dwb7P9WOL1WtjwZZnewzIvy3x6Fm2WqP5yGkvh6', 'L17VQItQz4p6tOJgG97e8mwNIwcacgRycS7nGrxPwTGelmrr5QOQkQN3IWyX', 7, 6, 127, '2020-08-17 00:13:19', NULL, '2020-08-17 00:11:21', '2020-08-18 17:58:27', NULL),
(27, 0, 1, 1, 'E2020013', 'a20150889@pucp.pe', 'Ciencias y Artes de la Comunicación', 'FINALISTA', '$2y$10$.4gmH5ys3EhUNveUk4WENO9HBp1tZUtOnGzeQsA6dFiWbYdYg9Wxa', '9ip1dBGxO2Idoisc4iZPcUIkCwUB6YEtyzXl42LJjoRSeWKVgRiSe7GYfLGp', 8, 6, 63, '2020-08-17 01:45:30', 'rAnSC9IFucYpwu03DiJySIhXpqW78h5uKwXwHIFjJI3toQWrQqkwjB6h1RGf', '2020-08-17 01:39:54', '2020-09-22 04:20:57', NULL),
(28, 0, 1, 0, 'E2020014', '', 'lkfjsdkfsjal', 'PRUEBA', '$2y$10$S3Nk.PmylgcMsv0XkAH4YOri6/chrDxn8ZNm/Z81y8Czqm.yt5uA2', 'DDVIvwlAul0ZFs6AvGonmpaswnLzHnSnAGHpn2wBQUe8fcXgbPMkS8avV3a7', 8, 9, 138, '2020-08-17 14:14:29', NULL, '2020-08-17 14:13:15', '2020-08-17 14:22:33', NULL),
(29, 0, 1, 0, 'E2020015', '', 'Facultad de Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$SLX/qeOYwDLXVic0y54WJ.wvPR./WGjHzXAmFXSCFMGyCLa3EFr1u', '38E7tgDCUXPpyHpzkra6FxcGSQuniHnxhLxF2qHFRpivmXgjNKeeZCDgGIZc', 6, 6, 143, '2020-08-17 15:16:20', NULL, '2020-08-17 15:09:09', '2020-08-17 17:37:33', NULL),
(30, 0, 1, 1, 'E2020016', '', 'Marketing y Comunicaciones', 'FINALISTA', '$2y$10$1iKGtNtEzGbt5HjCEM0MTuAzxSnFbWJHAkrlhe7Bj1dhNA1Y/w7iO', 'bqOUKfxQju8qACxs232R4YpGcn6dDCb6qYtO83kuqvxkBaKBdBubuMYqX99M', 8, 1, 149, '2020-08-17 16:00:48', NULL, '2020-08-17 15:55:02', '2020-09-21 16:52:29', NULL),
(32, 0, 1, 0, 'E2020017', '', 'Faculta de Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$VH6pWphCDSIGkTo/d1EM.eiM/TyLS6w7A2e5Nxt5uGhregwDi9TDG', 'FIURrEKOZ5kEZuz5OyaxahzT7uii0lzA8uJMb5Jk5Qth6J52v2lXaiEgwjSN', 6, 6, 127, '2020-08-17 19:50:05', NULL, '2020-08-17 19:48:51', '2020-08-18 17:58:42', NULL),
(33, 0, 0, 0, 'E2020018', '', 'faskjaksjl', 'PRUEBA', NULL, 'tpoaDAGKOAiut1FPSnaMK0AlUzMEuhrdPOcV4l2ZzKPNJjlKgq998M7UboRv', 6, 5, 161, NULL, NULL, '2020-08-17 20:20:40', '2020-08-17 20:20:40', NULL),
(34, 0, 0, 0, 'E2020019', '', 'lkfjsdkfsjal', 'PRUEBA', NULL, 'eQzLITUOIFo1T2qLHtqHKHHcdKBIcOx4Zks29rMNYGT0x6vgEJHyz9x7DGtC', 6, 6, 138, NULL, NULL, '2020-08-17 20:25:01', '2020-08-17 20:25:01', NULL),
(35, 0, 0, 0, 'E2020020', '', 'lkfjsdkfsjal', 'PRUEBA', NULL, 'YvyJlSTeUjmQnJNSwwoYgPDc6ZxM5ueWQ6rE3f9cVTE6TDcaejcq6hfy98QA', 6, 5, 138, NULL, NULL, '2020-08-17 20:27:55', '2020-08-17 20:27:55', NULL),
(36, 0, 0, 0, 'E2020021', '', 'Marketing', 'PRUEBA', NULL, 'iKbrkvmXptpRNTj8qvsKKGD8DYe3XlyH5siuXjKnJky7AIv1kRuh83ArpnvS', 8, 8, 171, NULL, NULL, '2020-08-17 20:34:43', '2020-08-17 20:34:43', NULL),
(37, 0, 0, 0, 'E2020022', '', 'lkfjsdkfsjal', 'PRUEBA', NULL, 'KpRsYOwWN1l0PNxkMDyATXKCNiAcCEMIrwg7nZm9IfPOBg8gHUERtSrqqZK2', 6, 3, 138, NULL, NULL, '2020-08-17 20:34:44', '2020-08-17 20:34:44', NULL),
(38, 0, 1, 1, 'E2020023', '', 'Ciencias y Artes de la Comunicación - Especialidad', 'PARTICIPANTE', '$2y$10$1yZCHzbqquHUPRcrXGyRdONte5YOpJBaGg4qENwGMOeAAbMuaK6py', 'O7zCjd3GEK6OR3ZgdAhRetKxfPzRQZLivYarOOVYE3rcjDk561Q10864moQe', 8, 6, 178, '2020-08-17 21:43:31', NULL, '2020-08-17 21:41:16', '2020-08-18 18:02:52', NULL),
(39, 0, 1, 1, 'E2020024', '', 'Facultad de Ciencias y Artes de la Comunicación', 'GANADOR', '$2y$10$6nafvhiaSmWpBpezxXjlQuQxGvTdeIOb5IsQ5Cah0AuDV9N.bsydG', 'dVIb8KWOustE6RsNqMLXswCcm9Bp0c9xBWB2R8YE75W20sdp9i6qprvBqhVk', 8, 6, 127, '2020-08-17 23:42:08', NULL, '2020-08-17 23:16:46', '2020-09-22 02:06:18', NULL),
(40, 0, 1, 0, 'E2020025', '', 'Facultad de Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$BkRY/ySDrYsrhu9wo35HpumW1uGqYkuMekk6bBUjo3Nmg/X8.BVzO', 'wlL0RaQ9SaoxDNzAsHHgqzbpZoqIO55my6PYWf9AtiU2jM2zsFlQF8wXsJDr', 6, 6, 186, '2020-08-17 23:36:38', NULL, '2020-08-17 23:34:13', '2020-08-18 18:53:15', NULL),
(41, 0, 1, 0, 'E2020026', '', 'Marketing', 'PARTICIPANTE', '$2y$10$LCU3yXuDn9VPUjOR/6HqVO.9ACk/TWYXWPcc8Bi/kUrJpiDWr.4lu', 'W1z5Og5IGH3nx1yZ9oNq11UOZ76d980A2uMoZoq87mHvqKPyuvzX3NoRpm9k', 6, 1, 191, '2020-08-17 23:56:05', NULL, '2020-08-17 23:54:39', '2020-08-18 18:01:40', NULL),
(42, 0, 1, 0, 'E2020027', 'dcardena@ulima.edu.pe', 'Comunicación', 'GANADOR', '$2y$10$vak3kKFgb.XYggSQPLa5QOHNEQABioosrLqBGXrDJlIN5tlp/2FPq', '92K6joCGger9GBHU9lZLYpebivutTFfsPOx3pQhN7kvFAfeTzrXhPEFsbaMP', 6, 1, 467, '2020-08-18 19:13:38', NULL, '2020-08-18 19:10:46', '2020-09-04 01:09:33', NULL),
(43, 0, 1, 1, 'E2020028', '', 'Facultad Ciencias Empresariales y Económicas', 'PARTICIPANTE', '$2y$10$QjMKUln5nCzyxdrLLcjGkOlF8MIbLQ8ocNCfMok9qBm3.yito/ua.', 'txnQqXgOuApuNPoM19cqKEbldGSLdEGlKrStp1yLmQJ5LoHI7FtXrZTYngx8', 7, 1, 198, '2020-08-18 21:59:07', NULL, '2020-08-18 21:57:40', '2020-08-20 20:05:39', NULL),
(48, 0, 1, 0, 'E2020029', '', 'Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$KvE5.Amol6pH2J.w.KdOEuuRSzFpUrNR8.9cqbzEf86lFVRVYlTO6', 'mQglBH0Fy57qAKlMrJlRtLCfEmtCnQQSJQI4s4y0aMRbxhcBZekjDykwtUgQ', 6, 6, 44, '2020-08-19 03:57:26', NULL, '2020-08-19 03:48:09', '2020-08-20 03:27:06', NULL),
(49, 0, 1, 0, 'E2020030', '', 'Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$6e/jsumQ1dxMFGebqsR29uv6WWA3ZkKSGcF5zBURAw1EkqjYj.sMi', 'rZm3LPXpwuumdDjQgSMle5eRAWNaCVxp9pkwZ4nQvD4iTiOD9qjx7FYX1XAT', 8, 6, 143, '2020-08-19 22:40:44', NULL, '2020-08-19 22:39:19', '2020-08-20 19:53:45', NULL),
(50, 0, 1, 1, 'E2020031', '', 'Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$5edKg8WUKrfkwbOP2JepPOdA9odRhG7/V9gkixxnAETJ4TRFQu6lO', 'olFrb9EsCnlZVZfXlZmotNi3BSBhuJvPt6lmFcNXkfWOaLQ0ZgATGeFxsiEM', 7, 6, 63, '2020-08-20 00:07:07', NULL, '2020-08-20 00:03:27', '2020-09-22 04:19:39', NULL),
(51, 0, 1, 1, 'E2020032', '', 'Comunicaciones', 'PARTICIPANTE', '$2y$10$ijVEnj.1i4aTEbvYoJDtO.g2FQJ1zttGDRqS4GEBVEXtALV/iJgR2', 'zcwgeF4iDxo57zcHUvTJHuZokZuyIwlqpi9bUfCLiYcymow9Pm54SnUKVsgX', 8, 1, 227, '2020-08-20 00:15:37', NULL, '2020-08-20 00:11:28', '2020-09-22 04:02:56', NULL),
(52, 0, 1, 1, 'E2020033', '', 'COMUNICACION Y PUBLICIDAD', 'PARTICIPANTE', '$2y$10$InJm/lDooQ5xmpFCSeFzkumVjzzB7aS2HXpnOjhkwO4.0vOQBX45m', 'YeWLFh1aAaMTNS7SCwGQiyKjE6EJWmN9eGVcDHUB41Ga4jMQTVMD4ZeBt0Gh', 7, 9, 232, '2020-08-20 01:35:42', NULL, '2020-08-20 01:34:11', '2020-08-20 19:59:12', NULL),
(53, 0, 1, 1, 'E2020034', '', 'Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$.IQtCDGw0nJH6AfYABLqw.XYbq8bSNDOsm1d4zdEQCHQt1r.yd/XK', 'akl4W8tYGIthWNraddvpdjLR7fZ9Xgps1c2nlLY8rSEFVU4HgMbG07abQ585', 7, 6, 38, '2020-08-20 16:56:13', NULL, '2020-08-20 16:54:33', '2020-08-20 19:53:29', NULL),
(54, 0, 1, 0, 'E2020035', '', 'Comunicaciones', 'PARTICIPANTE', '$2y$10$chSWMDqkzOmrhSx/CSwssus9C5uzf3posA5UL1vluvaluExZQ.KP6', 'yVqMLXs56lOE8KGu5yZaprcKpfY6WhBbl5vOMGxvSnp1eh4Q2TDftWO8FUYt', 6, 2, 241, '2020-08-20 19:08:48', NULL, '2020-08-20 19:00:25', '2020-08-20 19:52:34', NULL),
(57, 0, 1, 1, 'E2020036', '', 'Facultad de Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$9ZYrjJcvPjBQFgMJCJW9RuNKGs5kOaPhGLSjokIJ6aGFdz7lEo.im', 'NcckhRkXX1fRmX3HDHjjeb0806vLYuwGh2gUFnbBU9wVNozSqD75WNtIOBEL', 8, 6, 110, '2020-08-20 23:39:50', NULL, '2020-08-20 23:37:44', '2020-09-21 18:15:31', NULL),
(58, 0, 1, 1, 'E2020037', '', 'Comunicaciones', 'PARTICIPANTE', '$2y$10$hIB/cpsUU843TMq333.5D.GmUHyNtXLe7xFtrZCmyM4/UjKQl6TAC', 'PaYH4M4SZV9S2i1HaRwhC9huUE40s7Q1Q6cwqu68jLNaFntNCuI7l9EtanXw', 8, 9, 255, '2020-08-21 00:08:12', NULL, '2020-08-21 00:06:01', '2020-08-27 02:32:23', NULL),
(59, 0, 1, 0, 'E2020038', '', 'Comunicación', 'PARTICIPANTE', '$2y$10$BWvQmdUoCZsf17P/kfBzKuVL/5WYjffsJ7Kc1H6yn3w5hJXd8Rqle', '0D7H6gW1XTkUz4oewWvuqjxOaUT0z8tbkCMc6WczaRZDCPUAXX1U3wjQkLUE', 6, 9, 261, '2020-08-21 02:48:00', NULL, '2020-08-21 01:45:08', '2020-08-21 17:53:32', NULL),
(60, 0, 1, 1, 'E2020039', 'vippcomc@gmail.com', 'Facultad de Humanidades', 'PARTICIPANTE', '$2y$10$GmMBrsfqynp/O/mbg3uJk.u9ZdTDKYYxxQkEGJeMrtOndPNiqjUAG', '2oA2FtdyFQsSi2sqCpeGn6lIAc3INfKZl20oLhgUuJJ5eF6JNF5eERQt4roS', 7, 9, 255, '2020-08-21 03:36:23', 'pkTuP0LDpqmbG4JZgTduUDU61u6vQy5cznWox3gjDSnsPay3xDSBzSr1xdwh', '2020-08-21 03:35:03', '2020-08-27 21:38:30', NULL),
(61, 0, 1, 1, 'E2020040', '', 'Comunicación', 'PARTICIPANTE', '$2y$10$k.G76Vl3/VN1QauCB.PYiuzCA3.fZXc7cVTao8RpYh6HtfCvupV3m', 'XnJXMq4D4DPxUtuBMwBIFGwZz4wk15H7NmSmGhJsPw2iRVgriDsp5t8W21sq', 6, 1, 50, '2020-08-21 03:54:14', NULL, '2020-08-21 03:50:51', '2020-10-01 00:17:08', NULL),
(62, 0, 1, 0, 'E2020041', 'santiago.balvin.01@gmail.com', 'comunicaciones', 'PARTICIPANTE', '$2y$10$0wCHdTAEcNJqmCC0s0cZ/.AoOgr5KBGyXMGhmdXbuU/kffhZEUSwe', 'vTiTa8waBy5aqR4qyXb9dRfjtnWkCEYgpdZ7gUVjLYD3Ux4EJpzObRzcOdN4', 6, 9, 255, '2020-08-21 14:41:07', '8GZ2Bkh1FXLJt0ESlDWR5Vu6nzcq7J326EmtIg3QpXdMbQ90mz67z7z4L5hP', '2020-08-21 14:39:25', '2020-09-23 03:19:58', NULL),
(63, 0, 1, 1, 'E2020042', '', 'Administracion y Marketing', 'DESCALIFICADO', '$2y$10$KpPSM/exVZ0gGEUOregpWu3fQ0Ip58.qbF1Fa0ShWjPEUkzplcAhW', 'B5nyQxsK1gGpAKQa8QtJ7tfABIMTrQKsQ2UjarnFNFZ52M8KWLlvo8l0QEIv', 7, 2, 279, '2020-08-21 16:13:24', NULL, '2020-08-21 16:10:46', '2020-09-22 03:07:07', NULL),
(64, 0, 1, 0, 'E2020043', '', 'Administracion y Marketing', 'PARTICIPANTE', '$2y$10$2v8/zmLqh4CZj3x5FX8b/Op839glV.X1FMRf7l16njCgukar3wPeK', 'Pc5BkvMSNoQYgbPDuarhlhimVsHg6A2rMeyLsyanB2SHaaEy6UKVQwguoI6z', 6, 2, 279, '2020-08-21 16:52:18', NULL, '2020-08-21 16:50:51', '2020-08-22 10:31:54', NULL),
(65, 0, 1, 1, 'E2020044', '', 'Facultad de Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$ykK0JkREy/ropqumZx761OvLR90iRg9YsVjqDDBrFWNDxn7FniOuy', 'E6dWGiVVaY6tIxY1MvWNg276bwt4eh63XGbm8ImN6L1MdBHoiRmAf1IY3eZb', 7, 6, 290, '2020-08-21 17:22:34', NULL, '2020-08-21 17:21:20', '2020-09-22 22:39:03', NULL),
(66, 0, 1, 1, 'E2020045', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$6VNDVZPUkjQOoIH/2ZfvC.f.LhVZQouoxL6eutzoYF8eUFsNkGDYS', 'qT7n6morIv5GRcEjy8OgeWcQC3lkXEpjGkpSwFJUB34VHjy4eCTrEX5r0HTD', 8, 2, 296, '2020-08-21 17:39:45', NULL, '2020-08-21 17:34:53', '2020-09-22 04:58:31', NULL),
(67, 0, 1, 0, 'E2020046', '', 'Ciencias Empresariales', 'PARTICIPANTE', '$2y$10$KK9/W4Mu48OZyul0isoh2uqWDkbhqZwbUQCeqAMDJtGikeG379hRG', 'kPohUglogaeYoXze4y6pveFixaGuxASKP48VT3OxLkeS28Qgguq3CwFvBxRS', 6, 9, 302, '2020-08-21 17:42:18', NULL, '2020-08-21 17:40:45', '2020-08-27 21:39:57', NULL),
(68, 0, 1, 0, 'E2020047', '', 'Negocios', 'PARTICIPANTE', '$2y$10$dsk7w7AxtoSZZVsA8sCD5u/Lvq1wjfCFkiKY9WLAox/OUhwnVCNGi', 'QHWX2DdO9YkMl0JiLZKbF37XeUzgNoSRM2Wr6QzFjgheTl4V9xgyDwAttrWG', 6, 2, 56, '2020-08-21 17:50:53', NULL, '2020-08-21 17:49:12', '2020-08-27 21:40:08', NULL),
(69, 0, 1, 1, 'E2020048', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$Rcl/4Y8Fxxt8xm8m5hZ9ouCbEvO0mBb9oPAxI..xUfjOra3JFSlFK', 'bygBzb5x9yk8yMM55P92pGcwItcaDnAC25OKQkiT1WkKXEEuPGaCgHtSPtm7', 7, 2, 296, '2020-08-21 18:38:44', NULL, '2020-08-21 18:37:50', '2020-09-22 03:51:23', NULL),
(70, 0, 1, 1, 'E2020049', '', 'Negocios', 'PARTICIPANTE', '$2y$10$HlGp/Vr7tiFmOLXn0YgyguQiF6tdLE7.rIB3TMwcxChdIXGxOTfQK', 'Cu0aVfQR455jcZ86lXHlfK9tjA8ZSXSAXkyKcJ4aCqDMRnF35ZN6pIBwyAn0', 7, 2, 56, '2020-08-21 19:01:57', NULL, '2020-08-21 18:48:36', '2020-08-21 19:01:57', NULL),
(71, 0, 1, 1, 'E2020050', '', 'Negocios', 'PARTICIPANTE', '$2y$10$4eNvYQkmrhLw6fs6SXiTFeKtrzC5NdLUcHKC5b/kDmnfcRZzhsGKu', 'a67qYPvCPRNILD9g9apIAPkSGhM6Oc8uxXjyUUzHdFXu7XLa5BIq5tfyTf53', 8, 2, 56, '2020-08-21 19:01:26', NULL, '2020-08-21 18:59:17', '2020-08-27 21:40:22', NULL),
(72, 0, 1, 0, 'E2020051', '', 'Administracion y Marketing', 'PARTICIPANTE', '$2y$10$2PNz5L1rfhHkMRFbUIVZ0OUbn6/0/3/YX/.tEBwx7.yM.GH6LZ0oK', 'yUhW8zVitcwhUvxqcUXJrdz31gK1potlJcMyArZzVl3qb9e2k5pU9pcfpCeW', 8, 2, 279, '2020-08-21 19:57:59', NULL, '2020-08-21 19:56:07', '2020-08-27 21:40:30', NULL),
(73, 0, 1, 1, 'E2020052', 'a.vidalcastillo@alum.up.edu.pe', 'Facultad de Ciencias Empresariales', 'PARTICIPANTE', '$2y$10$MmC9vnwdcIcKLHb1rZwpEeNXKHj36x0usT9UEDAxyRuQp7yXZNLgu', 'zKEMeatAVmFD92ke0TUGvnsxs1pqKS0MUqENeaEURxdEGV0CdMzsbFkmUO7s', 8, 8, 332, '2020-08-21 21:34:41', 'tzfkoVoTEY8IgiYkpB0ENvyl6e4jwYxDLjQaAfkSEWz29omAG4DJB2aXOCnb', '2020-08-21 21:32:44', '2020-09-21 03:42:35', NULL),
(74, 0, 1, 1, 'E2020053', '', 'Ciencias Publicitarias', 'PARTICIPANTE', '$2y$10$Ea1alKHVFQ3ZU1L7A.kWF.T.aqP6t2X2zTv8q9Rp5WWLNThWd2F2S', 'd1rUk3jRIw6eFOp2cZ7SiAZpd1lqUWge7k4kxXhHugDwAOfF5lXnsQMbNw6O', 8, 3, 10, '2020-08-21 21:56:21', NULL, '2020-08-21 21:52:21', '2020-08-27 21:40:47', NULL),
(75, 0, 1, 1, 'E2020054', '', 'Ciencias Publicitarias', 'GANADOR', '$2y$10$kW9/Q.74wu/ZE7RUER7otOicTmdpyb6FxBm8VRq4IcoXtbj7x5wQu', 'cr6vcrUInpmZuAFUOUAEkfxwahcgDlkRDEmqZK8ZcYkjOrHoePeSBNd0wCKA', 7, 3, 5, '2020-08-21 22:00:46', NULL, '2020-08-21 21:56:59', '2020-09-20 21:53:27', NULL),
(76, 0, 1, 1, 'E2020055', '', 'Ciencias Publicitarias', 'PARTICIPANTE', '$2y$10$lXQQYAO41hyp6kMkqSdrGeNrj2qSn4q02dvdgrt9yemmvcmaCFFIG', '7ab3lKWDfTSxhNSX7hCC4LoCrhyPyRhzkofHGhoN0ptoNGrGjcyBJGzjDs0r', 8, 3, 10, '2020-08-21 22:08:48', NULL, '2020-08-21 22:05:47', '2020-09-22 02:50:43', NULL),
(77, 0, 1, 1, 'E2020056', '', 'Marketing', 'PARTICIPANTE', '$2y$10$Jy7lJKNebUAuFbo3eXqQv.qR71eP.Py6ctIviAHNy/ScG6dMdh40m', 'CJyYHcFsSsosLLCdIVMw2qmVhq0E7lN6GhEqyzshnzX0HobA9BOs8ocr4gnS', 8, 2, 83, '2020-08-21 22:28:05', NULL, '2020-08-21 22:11:14', '2020-08-27 21:43:41', NULL),
(78, 0, 1, 1, 'E2020057', '', 'Ciencias Publicitarias', 'PARTICIPANTE', '$2y$10$j82num.9DuQmUurMK2LeNOR8ldVTvDs8AOyPwjVOlOQJzsbHJbr6W', 'nBNl0BNDGJTTOKmBocbZuDyIDNq0douB1l2sh2qGmRyM5Mgl46OFUyFEa2S4', 8, 3, 356, '2020-08-21 22:33:43', NULL, '2020-08-21 22:32:30', '2020-09-22 03:24:34', NULL),
(79, 0, 1, 1, 'E2020058', '', 'Ciencias publicitarias', 'PARTICIPANTE', '$2y$10$n.8Y5GTp.or1aj/FR999J.pqQu/Nzp1lYy6Xj6p7qJ5pGqPpTDCdS', 'VvGDepOzDOBYPB9sXoz2aHPIup0IwJo85ZSlPXvPNpMI3xHU3nhrzXbMr9pQ', 8, 3, 10, '2020-08-21 22:35:13', NULL, '2020-08-21 22:33:12', '2020-09-22 16:32:31', NULL),
(80, 0, 1, 0, 'E2020059', 'mijhailmr@yahoo.es', 'Administración y Marketing', 'FINALISTA', '$2y$10$Q26mL3bZm24jC6riuGAogeDDGfk/mI4ZrD7Ybxq0Crzn9Kqb/sRGG', '4f3W0f6qcIgxRLGSdgK4YJF2YQmvowc4FhpMq4Glr8P1wES7vijUcQ8TR1zn', 6, 2, 366, '2020-08-21 22:41:38', '4XkfCaNaRR2HoVeO0EzkTQLVSPdUFYSKooRBHxYpzz0LMuJB1leUXANePijr', '2020-08-21 22:39:49', '2020-08-27 21:43:22', NULL),
(81, 0, 1, 0, 'E2020060', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$hWoqIQ5vTlgs1LU15QTb2ONss5Uukb4lY9U59zKOMAgT6LIkYYHHu', 'LPtxDnryJIdCSnIgEZSQXSorwUERyuVgJjkvGLq3Wa67IFaqPSoa19cDhL3F', 6, 2, 296, '2020-08-21 22:59:01', NULL, '2020-08-21 22:57:37', '2020-08-27 21:43:15', NULL),
(82, 0, 1, 1, 'E2020061', 'fernandagomezdelatorre@gmail.com', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$fI5onimjz5AnD41lvlYqR./ORrmGy5C9Je9oVajhVMCKdxg6rEI02', 'F9tlqj4gpVEFCoWmcwd5DJwL8jnA6lgqitgoevK2cVZ7s38v8pnEg7eoRFRZ', 8, 2, 366, '2020-08-21 23:08:20', 'n2CQ0Qpuom9GREv8qD2AA6euSlnxGysMBScYkvdzsvV0KmZF5Y4fmBfQDLEU', '2020-08-21 23:06:47', '2020-10-01 05:02:36', NULL),
(83, 0, 1, 0, 'E2020062', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$ilCntCVyoJ/KSoYskSvHy.L0Fm4q/J/QV.ELII87r.QeSFFaiGM/e', 'xLXxUljvkBQesBQvtjyfAVXg2CaLRF71XEbrN1c4GnWxgYGfWVtUDx5ADYMp', 6, 2, 381, '2020-08-21 23:25:30', NULL, '2020-08-21 23:21:09', '2020-08-27 21:43:08', NULL),
(84, 0, 1, 0, 'E2020063', '20172022@ipp.pe', 'Ciencias Publicitarias', 'PARTICIPANTE', '$2y$10$BPF03GVAEIjWv869P9HmDel.FTyp8wJbIYMo8/89ulREo8p7ziOVO', '27Mt0ZC4MoZR1IGwXrBrI7LeL6d5AFkbEribi2MbXDlat14CkqC7vkyLCDKD', 6, 3, 356, NULL, '4W12u5poOyIV94ZRpsvsWli6c6EIbdnHUtRKs5NSKtccuCqAOUAQwQ9tQyjD', '2020-08-21 23:31:14', '2020-09-01 03:36:57', NULL),
(85, 0, 1, 0, 'E2020064', '', 'Ciencas Publicitarias', 'PARTICIPANTE', '$2y$10$JBrd9xlMgSWVkcYzCgq5GeobapYrzHCdDGZ8aC8CaDqGoAwjqJtpy', 'xVtZZI7YTNfBnJA1UXyO0ssUHsIwfv4a7nYFSlBFmpPpykcglvJEoNTiiIpV', 6, 3, 5, '2020-08-21 23:41:26', NULL, '2020-08-21 23:32:27', '2020-08-27 21:41:03', NULL),
(86, 0, 1, 0, 'E2020065', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$BCAXHuiW0Nypv5/EAqx1KupVYoR.2Fau3BlXwmb2uXyUAshbyX33u', 'U7FYSsCMjS8qn7zocsYp08V8XVCSvbYPY6usG2OL8HsQDJt31wdfVEGQqDzn', 8, 2, 396, '2020-08-21 23:34:25', NULL, '2020-08-21 23:32:55', '2020-08-27 21:41:10', NULL),
(87, 0, 1, 1, 'E2020066', '', 'Ciencias Publicitarias', 'FINALISTA', '$2y$10$QC.0BDmpN0vfs5KmaQZLgO8Ax7a/zPpIl8.sjvB9BAWpdroSzaD26', 'wsm2yowI6WdgXqTBNUIeZeUaTMmF8W3ySLkwRpMBdBfElc2uaA8IEiox0WJA', 8, 3, 356, '2020-08-22 00:04:40', NULL, '2020-08-21 23:54:06', '2020-08-27 21:41:18', NULL),
(88, 0, 1, 1, 'E2020067', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$SteX8TDv8OUKNKhvZoU/iuvLtdo7XaAWyONhq.NnXcKXrqHclianu', '0zKacaETpwuWi6x3jSDzjrc0lXtea1q6dRVLudLIHkrveUpu0wmmEA9Lx6RR', 8, 2, 381, '2020-08-22 00:10:57', NULL, '2020-08-22 00:06:18', '2020-09-22 16:55:50', NULL),
(89, 0, 1, 0, 'E2020068', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$c7AC5gBcUhr6RgNLnBRdb.tYqWPQe/J/XCDg5wWSG4TUbA5PO7jwy', 'FkJkGC0y7qKriiv9mMK133l8PPPmeteBuYM6L4dnQdLI7rdylYuMVLFGAzqt', 6, 2, 396, '2020-08-22 00:08:35', NULL, '2020-08-22 00:06:58', '2020-08-25 22:02:28', NULL),
(90, 0, 1, 1, 'E2020069', '', 'ADMINISTRACIÓN Y MARKETING', 'PARTICIPANTE', '$2y$10$pTNDYLUD6ZwcJwntwd2ZOOfGryrU.w1Z8kegwu0cRzVBsZusuidsK', 'ELQPHjqJoGEOFQSnArzZjPj9E8q7o0ctEtVKDmy4ZK39O9JqloT6z6li4mBX', 7, 2, 381, '2020-08-22 00:16:39', NULL, '2020-08-22 00:14:57', '2020-08-27 21:41:51', NULL),
(91, 0, 1, 0, 'E2020070', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$i.aRfQQFrNBZ5/zKjaB54uMGCJWkEdyLUA6VZo7pG0uRIX5jnR0RC', 'ZcwKFOE0SIAcmmfR6lsKpiHJm9NSZfIox5ZFYziVDHTPRCjmE2QJBn6AJnmz', 7, 2, 396, '2020-08-22 00:44:17', NULL, '2020-08-22 00:43:37', '2020-08-27 21:41:45', NULL),
(92, 0, 1, 0, 'E2020071', 'zavala.karend@gmail.com', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$W/qApclUZTTmymQ1QUkjiuzjc1ZAgVVfS1VQu8oBe9IU71nfdRqhO', 'tC5cyBHfBQlsBeQ4XlIWY5xmiXPcmNA0JInWvd0svwNg7qTj3EWjJ3MgDquB', 6, 2, 427, '2020-08-22 01:01:11', 'BRxlUE1bIQ8ZY2ihR0mAkDQZan1WqtYwtDhzFsrGtGQCM4Q4ixqXGgmcxIcc', '2020-08-22 00:57:12', '2020-08-27 21:41:58', NULL),
(93, 0, 1, 0, 'E2020072', '', 'Marketing', 'PARTICIPANTE', '$2y$10$CvHOqXfyn68Kvmr8vhN24OzfFPUht9e3AC4CA/Q7waSTtW15Du0ta', 'NiysBWhh54Gue42AIOx3BXsF5XAR32NNj55ZxfaxCmQbsykfdvIpvJyVwwL2', 6, 2, 83, '2020-08-22 01:02:33', NULL, '2020-08-22 01:00:08', '2020-08-27 21:42:58', NULL),
(94, 0, 1, 1, 'E2020073', '', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$iDaecSckK.L7F1NbDX11puhlzZ9GUSVm/40geqwmfb9qUMjoUpkbW', 'DIXCRM9co1zoB8hm7dsBTVRmEclG3zX7s9KYB6pqv2Maw3faxwjJ4hhvVpHh', 8, 2, 427, '2020-08-22 01:05:44', NULL, '2020-08-22 01:04:30', '2020-08-27 21:42:41', NULL),
(95, 0, 1, 0, 'E2020074', 'brunoag2107@gmail.com', 'Administración y Marketing', 'PARTICIPANTE', '$2y$10$1STJkFCIXqDidylMURbAkOcuCjq0YcDcedpnCzy02PcdCjmcPvCge', 'CyBSNJB3rrkEM1rGnH6faeUuonrY3gpnONmRYxNnIcVL9T55a1qdIkz5vX9d', 7, 2, 427, '2020-08-22 01:31:28', 'UdbJhGSc1m5FVJ8aQwPFTb0QFjYFxAeGA2wKVfTZru2bHy0CfHV2tjfE1lne', '2020-08-22 01:08:42', '2020-08-27 21:42:28', NULL),
(96, 0, 1, 1, 'E2020075', '', 'Comunicación', 'PARTICIPANTE', '$2y$10$NiG2S6FZP6mZeCCSwozU4u.bpnhDJ8FarbIGBOXrOQBwdVkgqSvyq', '0dAAURhG2OyqoiSlhjk1yOGDSH5fI7nKodviQJbwnGgyzUA4dSifn9EbGp0I', 8, 3, 5, '2020-08-22 01:36:34', NULL, '2020-08-22 01:33:57', '2020-09-21 18:20:06', NULL),
(97, 0, 1, 1, 'E2020076', '', 'Ciencias Publicitarias', 'FINALISTA', '$2y$10$oaU6Vc8aSVKHYOcVRDoYI.zTFfxVfKV4d9mXqsOr0fQEshE0BIRD2', 'hzZS0mGpQz64tJMkqfuBbayfvsmtqDtcmwSPlrFiQrhQcVA8ZN5H0cSHDOSQ', 7, 3, 356, '2020-08-22 03:53:47', NULL, '2020-08-22 03:50:28', '2020-09-22 01:29:47', NULL),
(98, 0, 1, 0, 'E2020077', '', 'Ciencias Publicitarias', 'PARTICIPANTE', '$2y$10$uO.tDqLtqFMOM/Gzj6/u3eTgFAbMxFS52bzX5xkagnjJe7m3f9Oii', 'UpVsj8kD7fizV8E6WMLKVugfCYR6P5nA6j1qcJR1wD19Rj03nN4mkCm3onEi', 6, 3, 10, '2020-08-22 04:26:33', NULL, '2020-08-22 04:24:05', '2020-08-27 21:38:14', NULL),
(99, 0, 1, 1, 'E2020078', 's.ortiz@pucp.edu.pe', 'Facultad de Ciencias y Artes de la Comunicación', 'PARTICIPANTE', '$2y$10$rTdV7k74AwRDR2qKLlU6we0Yun4KfhPmge53qJZH91pcZ79SJthNS', NULL, 7, 6, 460, '2020-08-24 10:55:53', 'KjNSqan4nxezNveMZBNV99N12lcntFdLNE8JxXxnrINeoiFIsx0DNK3whkPB', '2020-08-24 10:55:53', '2020-09-21 22:34:36', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attacheds`
--
ALTER TABLE `attacheds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attacheds_name_deleted_at_unique` (`name`,`deleted_at`),
  ADD KEY `attacheds_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `base_models`
--
ALTER TABLE `base_models`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_deleted_at_unique` (`name`,`deleted_at`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `careers_name_deleted_at_unique` (`name`,`deleted_at`);

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `casos_edition_id_brand_id_deleted_at_unique` (`edition_id`,`brand_id`,`deleted_at`) USING BTREE,
  ADD KEY `casos_brand_id_foreign` (`brand_id`) USING BTREE;

--
-- Indices de la tabla `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colleges_name_ruc_deleted_at_unique` (`name`,`ruc`,`deleted_at`);

--
-- Indices de la tabla `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cycles_name_deleted_at_unique` (`name`,`deleted_at`);

--
-- Indices de la tabla `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `document_types_name_code_deleted_at_unique` (`name`,`code`,`deleted_at`);

--
-- Indices de la tabla `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `editions_name_deleted_at_unique` (`name`,`deleted_at`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_student_document_type_id_foreign` (`student_document_type_id`),
  ADD KEY `students_student_college_id_foreign` (`student_college_id`),
  ADD KEY `students_student_career_id_foreign` (`student_career_id`),
  ADD KEY `students_student_cycle_id_foreign` (`student_cycle_id`);

--
-- Indices de la tabla `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_user_student_id_foreign` (`student_id`),
  ADD KEY `student_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_teacher_document_type_id_foreign` (`teacher_document_type_id`),
  ADD KEY `teachers_teacher_college_id_foreign` (`teacher_college_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_college_id_foreign` (`college_id`),
  ADD KEY `users_teacher_id_foreign` (`teacher_id`),
  ADD KEY `users_caso_id_foreign` (`caso_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attacheds`
--
ALTER TABLE `attacheds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `base_models`
--
ALTER TABLE `base_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `editions`
--
ALTER TABLE `editions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT de la tabla `student_user`
--
ALTER TABLE `student_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attacheds`
--
ALTER TABLE `attacheds`
  ADD CONSTRAINT `attacheds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `casos`
--
ALTER TABLE `casos`
  ADD CONSTRAINT `cases_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cases_edition_id_foreign` FOREIGN KEY (`edition_id`) REFERENCES `editions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_student_career_id_foreign` FOREIGN KEY (`student_career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_student_college_id_foreign` FOREIGN KEY (`student_college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_student_cycle_id_foreign` FOREIGN KEY (`student_cycle_id`) REFERENCES `cycles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_student_document_type_id_foreign` FOREIGN KEY (`student_document_type_id`) REFERENCES `document_types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `student_user`
--
ALTER TABLE `student_user`
  ADD CONSTRAINT `student_user_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_teacher_college_id_foreign` FOREIGN KEY (`teacher_college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_teacher_document_type_id_foreign` FOREIGN KEY (`teacher_document_type_id`) REFERENCES `document_types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_case_id_foreign` FOREIGN KEY (`caso_id`) REFERENCES `casos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
