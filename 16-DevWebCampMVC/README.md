# AMP App Docker

## Levantar contenedores
docker-compose up

## See the results
http://localhost:8093







## Queries necesarias

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  `token` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `ponentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `ciudad` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `imagen` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tags` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `redes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `dias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `horas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hora` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descripcion` text,
  `disponibles` int DEFAULT NULL,
  `categoria_id` int NOT NULL,
  `dia_id` int NOT NULL,
  `hora_id` int NOT NULL,
  `ponente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventos_categorias_idx` (`categoria_id`),
  KEY `fk_eventos_dias1_idx` (`dia_id`),
  KEY `fk_eventos_horas1_idx` (`hora_id`),
  KEY `fk_eventos_ponentes1_idx` (`ponente_id`),
  CONSTRAINT `fk_eventos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_eventos_dias1` FOREIGN KEY (`dia_id`) REFERENCES `dias` (`id`),
  CONSTRAINT `fk_eventos_horas1` FOREIGN KEY (`hora_id`) REFERENCES `horas` (`id`),
  CONSTRAINT `fk_eventos_ponentes1` FOREIGN KEY (`ponente_id`) REFERENCES `ponentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `paquetes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `regalos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paquete_id` int DEFAULT NULL,
  `pago_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `token` varchar(8) DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `regalo_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarioId` (`usuario_id`),
  KEY `paquete_id` (`paquete_id`),
  KEY `regalo_id` (`regalo_id`),
  CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`paquete_id`) REFERENCES `paquetes` (`id`),
  CONSTRAINT `registros_ibfk_3` FOREIGN KEY (`regalo_id`) REFERENCES `regalos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `eventos_registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento_id` int DEFAULT NULL,
  `registro_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evento_id` (`evento_id`),
  KEY `registro_id` (`registro_id`),
  CONSTRAINT `eventos_registros_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`),
  CONSTRAINT `eventos_registros_ibfk_2` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;








INSERT INTO usuarios ( nombre, apellido, email, password, admin, confirmado ) VALUES
    ('Jose', 'Rivas', 'jose@gmail.com', '$2y$10$S5k.qvrfXEZxQmvfBW5oZObTQSZfuZGxLbQCv/S2VQTuoBdmj5Y4G', 1, 1);
INSERT INTO usuarios ( nombre, apellido, email, password, admin, confirmado ) VALUES
    ('Stefany', 'Camacho', 'stefany@gmail.com', '$2y$10$S5k.qvrfXEZxQmvfBW5oZObTQSZfuZGxLbQCv/S2VQTuoBdmj5Y4G', 0, 1);
INSERT INTO usuarios ( nombre, apellido, email, password, admin, confirmado ) VALUES
    ('Barry', 'Block', 'barry@gmail.com', '$2y$10$S5k.qvrfXEZxQmvfBW5oZObTQSZfuZGxLbQCv/S2VQTuoBdmj5Y4G', 0, 1);
INSERT INTO usuarios ( nombre, apellido, email, password, admin, confirmado ) VALUES
    ('Tommy', 'Shelby', 'tommy@gmail.com', '$2y$10$S5k.qvrfXEZxQmvfBW5oZObTQSZfuZGxLbQCv/S2VQTuoBdmj5Y4G', 0, 1);

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Conferencias'),
(2, 'Workshops');

INSERT INTO `dias` (`id`, `nombre`) VALUES
(1, 'Viernes'),
(2, 'Sábado');

INSERT INTO `horas` (`id`, `hora`) VALUES
(1, '10:00 - 10:55'),
(2, '11:00 - 11:55'),
(3, '12:00 - 12:55'),
(4, '13:00 - 13:55'),
(5, '16:00 - 16:55'),
(6, '17:00 - 17:55'),
(7, '18:00 - 18:55'),
(8, '19:00 - 19:55');

INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(1, ' Julian', 'Muñoz', 'Madrid', 'España', '6764a74ccf2b4b5b74e333016c13388a', 'React,PHP,Laravel', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(2, ' Israel', 'González', 'CDMX', 'México', '6497c66bcc464e26871c046dd5bb86c8', 'Vue,Node.js,MongoDB', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'),
(3, ' Isabella', 'Tassis', 'Buenos Aires', 'Argentina', '55c7866df31370ec3299eed6eb63daa1', 'UX / UI,HTML,CSS,TailwindCSS', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'),
(4, ' Jazmín', 'Hurtado', 'CDMX', 'México', 'de6e3fa0cde8402de4c28e6be0903ada', 'Django,React, Vue.js', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(5, ' María Camila', 'Murillo', 'Guadalajara', 'México', 'cec8c9d7bcb4c19e87d1164bce8fe176', 'Devops,Git,CI CD', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(6, ' Tomas', 'Aleman', 'Bogotá', 'Colombia', '5332118b8d7690a1b992431802eafab1', 'WordPress,PHP,React', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(7, ' Lucía', 'Velázquez', 'Buenos Aires', 'Argentina', '90956ece4adbd9f9ccb8f4ae80dc1537', 'React,Angular,Svelte', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'),
(8, ' Catarina', 'Pardo', 'Lima', 'Perú', '9886ffc0d31e4c20a04acc1464630527', 'Next.js,Laravel,MERN', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'),
(9, ' Raquel', 'Ros', 'Madrid', 'España', 'd697f6c454c36252d70abacd7599566c', 'Next.js,Remix,Vue.js', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(10, ' Sofía', 'Amengual', 'Santiago', 'Chile', '414ffd61380bbf0e9f45cbde4d0cbb7f', 'UX / UI,Figma,TailwindCSS', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(11, ' María José', 'Leoz', 'NY', 'Estados Unidos', 'c8b3a77bce7a6efb6e6872db67cfa553', 'React,TypeScript,JavaScript', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(12, ' Alexa', 'Mina', 'Bogotá', 'Colombia', '6eac63d88743bbb9ee0bfd8c60cf4186', 'HTML,CSS,React,TailwindCSS', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'),
(13, ' Jesus', 'López', 'Madrid', 'España', 'e481bca0c512f5b4d8f76ccea2548f0d', 'PHP,WordPress,HTML,CSS', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'),
(14, ' Irene ', 'Dávalos', 'CDMX', 'México', '6727e8ee7f6c642026247fe0556d866d', 'Node.js,Vue.js,Angular', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(15, ' Brenda', ' Ocampo', 'Santiago', 'Chile', '40e01f5c023c7e74c9c372a8126edd97', 'Laravel,Next.js,GraphQL,Flutter', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(16, ' Julián ', 'Noboa', 'Las Vegas', 'EU', '6d4629dacbed2e4f5a344282ec2f4f76', 'iOS,Figma,REST API\'s', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'),
(17, ' Vicente ', 'Figueroa', 'CDMX', 'México', '2a41a781d8ae8f0f7a1969c766276b08', 'React,Tailwind,JavaScript,TypeScript,Node', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(18, ' Nico ', 'Fraga', 'Buenos Aires', 'Argentina', '222dc6502643afa2f4a55acaecd93221', 'PHP,Laravel,Flutter,React Native', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}');


INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `disponibles`, `categoria_id`, `dia_id`, `hora_id`, `ponente_id`) VALUES
(1, 'Next.js - Aplicaciones con gran performance', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 50, 2, 2, 1, 1),
(2, 'MongoDB - Base de Datos a gran escala', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 50, 2, 2, 2, 2),
(3, 'Tailwind y Figma', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 50, 1, 1, 2, 3),
(4, 'MERN - MongoDB Express React y Node.js - Ejemplo Real', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 2, 4, 8),
(5, 'Vue.js con Django para gran Performance', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 50, 2, 1, 1, 4),
(6, 'DevOps - Primeros Pasos', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 1, 1, 1, 5),
(7, 'WordPress y React - Gran Performance a costo 0', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 40, 2, 1, 2, 6),
(8, 'React, Angular y Svelte - Creando un Proyecto', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 1, 1, 3, 7),
(9, 'Laravel y Next.js - Aplicaciones Full Stack en Tiempo Record', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 40, 1, 2, 1, 8),
(10, 'Remix - El Nuevo Framework de React', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 2, 1, 3, 9),
(11, 'TailwindCSS - Crear Sitios Accesibles', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 1, 1, 4, 10),
(12, 'TypeScript en React', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 2, 2, 3, 11),
(13, 'Presente y Futuro del Frontend', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 2, 2, 8, 12),
(14, 'Extiende la API de WordPress con PHP', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 20, 1, 1, 8, 13),
(15, 'Node y Vue.js - Proyecto Práctico', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 1, 2, 2, 14),
(16, 'GraphQL y Flutter - Gran Performance para Android y iOS', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 1, 5, 15),
(17, 'REST API\'s - Backend para Web y Móvil', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 20, 2, 1, 4, 16),
(18, 'JavaScript - Apps para Web, Desktop y Escritorio', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 50, 2, 1, 8, 17),
(19, 'Flutter y React Native - ¿Cómo elegir?', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 40, 2, 1, 6, 18),
(20, 'Laravel y Flutter - Creando Un Proyecto Real', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 2, 5, 18),
(21, 'Laravel y React Native - Creando un Proyecto Real', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 50, 1, 2, 7, 18),
(22, 'PHP 8 - ¿Qué es Nuevo y que cambió?', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 50, 2, 1, 7, 1),
(23, 'MEVN Stack - Mongo Express  Vue.js y Node.js', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 50, 2, 1, 5, 2),
(24, 'Introducción a TailwindCSS', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 2, 2, 4, 3),
(25, 'WPGraphQL y GatsbyJS - Headless WordPress', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 40, 2, 2, 5, 6),
(26, 'Svelte - El Nuevo Framework de JS ', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 40, 2, 2, 6, 7),
(27, 'Next.js - El Mejor Framework para React', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 40, 2, 2, 7, 8),
(28, 'React 18 - Una Introducción Práctica', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 1, 6, 9),
(29, 'Vue.js - Composition API', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 20, 1, 1, 7, 14),
(30, 'Vue.js - Pinia para reemplazar Vuex', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 25, 1, 2, 3, 14),
(31, 'GraphQL - Introducción Práctica', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 2, 8, 15),
(32, 'React y TailwindCSS - Frontend Moderno', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 2, 6, 17);
 
INSERT INTO `paquetes` (`id`, `nombre`) VALUES
(1, 'Presencial'),
(2, 'Virtual'),
(3, 'Gratis');

INSERT INTO `registros` (`id`, `paquete_id`, `pago_id`, `token`, `usuario_id`, `regalo_id`) VALUES
(1, 3, '', 'd659dac5', 11, 1),
(2, 1, '7AP10820V51402607', '7e0315d3', 12, 9),
(3, 2, '2SU13800A97041802', '4093e8d0', 13, 1);

INSERT INTO `eventos_registros` (`id`, `evento_id`, `registro_id`) VALUES
(7, 16, 2),
(8, 28, 2),
(9, 29, 2),
(10, 10, 2),
(11, 17, 2);

INSERT INTO `regalos` (`id`, `nombre`) VALUES
(1, 'Paquete Stickers'),
(2, 'Camisa Mujer - Chica'),
(3, 'Camisa Mujer - Mediana'),
(4, 'Camisa Mujer - Grande'),
(5, 'Camisa Mujer - XL'),
(6, 'Camisa Hombre - Chica'),
(7, 'Camisa Hombre - Mediana'),
(8, 'Camisa Hombre - Grande'),
(9, 'Camisa Hombre - XL');









## Get the name of your MySQL container
docker ps --format '{{.Names}}'

## Connection to the MySQL container
docker exec -ti test-php-mysql-docker-mysql-1 bash

## Connect to MySQL server
mysql -uroot -pmyrootpassword

## We go to the database created when the container is launched
use mysqldb;

## Creation of a "Persons" Table, with a few columns
CREATE TABLE Persons (PersonID int, LastName varchar(255), FirstName varchar(255), Address varchar(255), City varchar(255));

## Insert some data into this table
INSERT INTO Persons VALUES (1, 'John', 'Doe', '51 Birchpond St.', 'New York');
INSERT INTO Persons VALUES (2, 'Jack', 'Smith', '24 Stuck St.', 'Los Angeles');
INSERT INTO Persons VALUES (3, 'Michele', 'Sparrow', '23 Lawyer St.', 'San Diego');





## DB Intro

docker container ls

docker exec -it fb98c92a909f bash

mysql -u root -p myrootpassword

show databases;

create database appsalon;

use appsalon;

show tables;

create table servicios (
	id int(11) not null auto_increment,
    nombre varchar(60) not null,
    precio decimal(8,2) not null,
    primary key (id)
    );

describe servicios;

insert into servicios (nombre, precio) values ("Corte de Cabello de Adulto", 80);
insert into servicios (nombre, precio) values ("Corte de Cabello de Ninyo", 60);
insert into servicios (nombre, precio) values ("Corte de Cabello de Mujer", 70);
insert into servicios (nombre, precio) values
    ("Peinado Hombre", 40),
    ("Peinado Ninyo", 30),
    ("Peinado Mujer", 35);

select * from servicios;
select nombre, precio from servicios;
select * from servicios order by precio desc;
select * from servicios limit 2;
select * from servicios where id = 3;

update servicios set precio = 70 where id = 2;
update servicios set nombre = "Peinado Hombre Actualizado" where id = 4;
update servicios set nombre = "Peinado Mujer Actualizado", precio = 36 where id = 6;

delete from servicios where id = 1;

alter table servicios add descripcion varchar(100) not null;
alter table servicios change descripcion nueva_descripcion varchar(150) not null;
alter table servicios drop column descripcion;

drop table servicios;

create table reservaciones (
    id int(11) not null auto_increment,
    nombre varchar(60) not null,
    apellido varchar(60) not null,
    hora time default null,
    fecha date default null,
    servicios varchar(255) not null,
    primary key (id)
    );

INSERT INTO servicios ( nombre, precio ) VALUES
    ('Corte de Cabello Niño', 60),
    ('Corte de Cabello Hombre', 80),
    ('Corte de Barba', 60),
    ('Peinado Mujer', 80),
    ('Peinado Hombre', 60),
    ('Tinte',300),
    ('Uñas', 400),
    ('Lavado de Cabello', 50),
    ('Tratamiento Capilar', 150);

INSERT INTO reservaciones (nombre, apellido, hora, fecha, servicios) VALUES
    ('Juan', 'De la torre', '10:30:00', '2021-06-28', 'Corte de Cabello Adulto, Corte de Barba' ),
    ('Antonio', 'Hernandez', '14:00:00', '2021-07-30', 'Corte de Cabello Niño'),
    ('Pedro', 'Juarez', '20:00:00', '2021-06-25', 'Corte de Cabello Adulto'),
    ('Mireya', 'Perez', '19:00:00', '2021-06-25', 'Peinado Mujer'),
    ('Jose', 'Castillo', '14:00:00', '2021-07-30', 'Peinado Hombre'),
    ('Maria', 'Diaz', '14:30:00', '2021-06-25', 'Tinte'),
    ('Clara', 'Duran', '10:00:00', '2021-07-01', 'Uñas, Tinte, Corte de Cabello Mujer'),
    ('Miriam', 'Ibañez', '09:00:00', '2021-07-01', 'Tinte'),
    ('Samuel', 'Reyes', '10:00:00', '2021-07-02', 'Tratamiento Capilar'),
    ('Joaquin', 'Muñoz', '19:00:00', '2021-06-28', 'Tratamiento Capilar'),
    ('Julia', 'Lopez', '08:00:00', '2021-06-25', 'Tinte'),
    ('Carmen', 'Ruiz', '20:00:00', '2021-07-01', 'Uñas'),
    ('Isaac', 'Sala', '09:00:00', '2021-07-30', 'Corte de Cabello Adulto'),
    ('Ana', 'Preciado', '14:30:00', '2021-06-28', 'Corte de Cabello Mujer'),
    ('Sergio', 'Iglesias', '10:00:00', '2021-07-02', 'Corte de Cabello Adulto'),
    ('Aina', 'Acosta', '14:00:00', '2021-07-30', 'Uñas'),
    ('Carlos', 'Ortiz', '20:00:00', '2021-06-25', 'Corte de Cabello Niño'),
    ('Roberto', 'Serrano', '10:00:00', '2021-07-30', 'Corte de Cabello Niño'),
    ('Carlota', 'Perez', '14:00:00', '2021-07-01', 'Uñas'),
    ('Ana Maria', 'Igleias', '14:00:00', '2021-07-02', 'Uñas, Tinte'),
    ('Jaime', 'Jimenez', '14:00:00', '2021-07-01', 'Corte de Cabello Niño'),
    ('Roberto', 'Torres', '10:00:00', '2021-07-02', 'Corte de Cabello Adulto'),
    ('Juan', 'Cano', '09:00:00', '2021-07-02', 'Corte de Cabello Niño'),
    ('Santiago', 'Hernandez', '19:00:00', '2021-06-28', 'Corte de Cabello Niño'),
    ('Berta', 'Gomez', '09:00:00', '2021-07-01', 'Uñas'),
    ('Miriam', 'Dominguez', '19:00:00', '2021-06-28', 'Corte de Cabello Niño'),
    ('Antonio', 'Castro', '14:30:00', '2021-07-02', 'Corte de Cabello Adulti'),
    ('Hugo', 'Alonso', '09:00:00', '2021-06-28', 'Corte de Barba'),
    ('Victoria', 'Perez', '10:00:00', '2021-07-02', 'Uñas, Tinte'),
    ('Jimena', 'Leon', '10:30:00', '2021-07-30', 'Uñas, Corte de Cabello Mujer'),
    ('Raquel' ,'Peña', '20:30:00', '2021-06-25', 'Corte de Cabello Mujer');

select * from servicios where precio <= 90;
select * from servicios where precio between 100 and 200;
select count(id), fecha from reservaciones group by fecha order by count(id) desc;
select sum(precio) as totalServicios from servicios;
select min(precio) as precioMenor from servicios;
select max(precio) as precioMayor from servicios;
select * from servicios where nombre like 'Corte%';
select * from servicios where nombre like '%Cabello%';
select * from servicios where nombre like '%Hombre';
select concat(nombre, ' ', apellido) as nombre_completo from reservaciones;
select * from reservaciones where concat(nombre, " ", apellido) like '%Ana Preciado%';
select hora, fecha, concat(nombre, " ", apellido) as 'Nombre Completo' from reservaciones where concat(nombre, " ", apellido) like '%Ana Preciado%';
select * from reservaciones where id in(1,3);
select * from reservaciones where fecha = "2021-06-28" AND id = 1;

drop table reservaciones;

create table clientes (
    id int(11) not null auto_increment,
    nombre varchar(60) not null,
    apellido varchar(60) not null,
    telefono varchar(9) not null,
    email varchar(30) not null unique,
    primary key (id)
    );

insert into clientes (nombre, apellido, telefono, email) values ("Jose", "Rivas", "86354178", "jose@gmail.com");
insert into clientes (nombre, apellido, telefono, email) values ("Juan", "Torres", "12345678", "juan@gmail.com");

create table citas (
    id int(11) not null auto_increment,
    fecha date not null,
    hora time not null,
    cliente_id int(11) not null,
    primary key (id),
    key cliente_id (cliente_id),
    constraint cliente_fk foreign key (cliente_id) references clientes (id)
    );

insert into citas (fecha, hora, cliente_id) values ('2021-06-28', '10:30:00', 1);
insert into citas (fecha, hora, cliente_id) values ('2021-07-28', '12:30:00', 2);

select * from citas a
    inner join clientes b on b.id = a.cliente_id;

create table citasServicios (
    id int(11) not null auto_increment,
    cita_id int(11) not null,
    servicio_id int(11) not null,
    primary key (id),
    key cita_id (cita_id),
    constraint cita_fk foreign key (cita_id) references citas (id),
    key servicio_id (servicio_id),
    constraint servicio_fk foreign key (servicio_id) references servicios (id)
    );

insert into citasServicios (cita_id, servicio_id) values (2, 8);
insert into citasServicios (cita_id, servicio_id) values (2, 3);

select * from citasServicios a
    left join citas b on b.id = a.cita_id
    left join servicios c on c.id = a.servicio_id
    left join clientes d on d.id = b.cliente_id;

