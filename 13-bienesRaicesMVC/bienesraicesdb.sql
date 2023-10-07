/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedor_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendedor_id` (`vendedor_id`),
  CONSTRAINT `vendedores_fk` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Jose', 'Rivas', '86354178');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(2, 'Juan', 'Torres', '12345678');

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedor_id`) VALUES
(1, 'Casa Playa', 120000.00, '51a72e0366999677d501ec42437045e5.jpg', 'Casa Playa en Promocion', 1, 1, 1, '2023-06-21', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedor_id`) VALUES
(2, 'Casa Playa 2', 130000.00, '51a72e0366999677d501ec42437045e5.jpg', 'Casa Playa en Promocion', 1, 1, 1, '2023-06-21', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedor_id`) VALUES
(3, 'Casa Playa 3', 140000.00, '51a72e0366999677d501ec42437045e5.jpg', 'Casa Playa en Promocion', 2, 2, 2, '2023-06-21', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedor_id`) VALUES
(4, 'Casa Playa 4', 150000.00, '51a72e0366999677d501ec42437045e5.jpg', 'Casa Playa en Promocion', 3, 3, 3, '2023-06-21', 2),
(5, 'Casa Playa 5', 160000.00, '51a72e0366999677d501ec42437045e5.jpg', 'Casa Playa en Promocion', 2, 2, 2, '2023-06-21', 2),
(6, 'Casa Playa 6', 170000.00, '51a72e0366999677d501ec42437045e5.jpg', 'Casa Playa en Promocion', 3, 3, 3, '2023-06-21', 2);

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'jose@gmail.com', '$2y$10$S5k.qvrfXEZxQmvfBW5oZObTQSZfuZGxLbQCv/S2VQTuoBdmj5Y4G');






/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;