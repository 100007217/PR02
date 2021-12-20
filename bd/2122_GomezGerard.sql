CREATE TABLE `tbl_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_user` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password_user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol_user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbl_users`
--


/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'Dani','Ruano','dani.ruano@gmail.com','dani.ruano','Camarero'),(2,'Miguel','Gras','miguel.gras@gmail.com','miguel.gra','Camarero'),(3,'Marc','Diaz','marc.diaz@gmail.com','marc.diaz','Camarero'),(4,'Alfredo','Blum','alfredo.blum@gmail.com','alfredo.bl','Camarero'),(5,'Pol','Garcia','pol.garcia@gmail.com','pol.garcia','Camarero'),(6,'admin','Admin','admin@gmail.com','admin','Admin'),(7,'Gerard','Gomez','gerard.gomez@gmail.com','gerard.gom','Admin'),(8,'Camarero1','Apellido1','camarero1@res.com','ca1','Camarero'),(9,'Camarero2','Apellido2','camarero2@res.com','ca2','Camarero'),(10,'Camarero3','Apellido3','camarero3@res.com','ca3','Camarero'),(11,'Camarero4','Apellido4','camarero4@res.com','ca4','Camarero'),(13,'Admin1','Apellido1','admin1@res.com','ad1','Admin'),(14,'Admin2','Apellido2','admin2@res.com','ad2','Admin'),(15,'Admin3','Apellido3','admin3@res.com','ad3','Admin'),(16,'Admin4','Apellido4','admin4@res.com','ad4','Admin'),(17,'Admin5','Apellido5','admin5@res.com','ad5','Admin');


CREATE TABLE `tbl_ubicacion` (
  `id_ubi` int NOT NULL AUTO_INCREMENT,
  `tipo_ubi` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_ubi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbl_ubicacion`
--

/*!40000 ALTER TABLE `tbl_ubicacion` DISABLE KEYS */;
INSERT INTO `tbl_ubicacion` VALUES (1,'Terraza'),(2,'Comedor');


CREATE TABLE `tbl_mesa` (
  `id_mesa` int NOT NULL AUTO_INCREMENT,
  `num_silla_dispo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `reservada` tinyint DEFAULT NULL,
  `id_ubi` int DEFAULT NULL,
  `incidencia` tinyint DEFAULT NULL,
  `desc_incidencia` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_sillas_actuales` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img_mesa` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_mesa`),
  KEY `fk_ubi_mesa_idx` (`id_ubi`),
  CONSTRAINT `fk_ubi_mesa` FOREIGN KEY (`id_ubi`) REFERENCES `tbl_ubicacion` (`id_ubi`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;


--
-- Dumping data for table `tbl_mesa`
--

/*!40000 ALTER TABLE `tbl_mesa` DISABLE KEYS */;
INSERT INTO `tbl_mesa` VALUES (1,'4',1,1,0,'','4','mesa1.jpg'),(2,'3',0,1,1,'La mesa se ha partido','0','mesa2.jpg'),(3,'6',0,1,0,'','6','mesa3.jpg'),(4,'2',1,1,0,NULL,'2','mesa4.jpg'),(5,'2',0,1,0,NULL,'2','mesa5.jpg'),(6,'4',0,2,1,'Dos sillas bailan','2','mesa6.jpg'),(7,'2',1,2,0,NULL,'2','mesa7.jpg'),(8,'4',1,2,0,NULL,'4','mesa8.jpg'),(9,'4',0,2,1,'Mesa partida','0','mesa9.jpg'),(10,'4',1,2,0,'','4','mesa10.jpg');


CREATE TABLE `tbl_reserva` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `nombre_cliente` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_personas` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_mesa` int DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_mesa_reserva_idx` (`id_mesa`),
  CONSTRAINT `fk_mesa_reserva` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbl_reserva`
--


/*!40000 ALTER TABLE `tbl_reserva` DISABLE KEYS */;
INSERT INTO `tbl_reserva` VALUES (1,'2021-11-10 11:00:00','2021-11-08 15:27:50','Arnau','4',10),(2,'2021-11-10 17:56:00','2021-11-04 19:17:16','Arnau','4',10),(3,'2021-11-10 14:00:00','2021-11-05 17:48:55','Jose','2',3),(4,'2021-11-10 15:00:00','2021-11-05 17:26:49','Marc','4',9),(10,'2021-11-05 15:44:50','2021-11-08 15:26:41','Luis','2',2),(12,'2021-11-05 16:27:16','2021-11-08 15:28:32','Esteban','2',1),(15,'2021-11-05 17:24:29','2021-11-08 15:10:53','Joselito','4',6),(16,'2021-11-05 17:26:39','2021-11-05 17:28:38','Marquitos','2',4),(20,'2021-11-05 19:38:32','2021-11-08 15:27:42','Tina','2',5),(26,'2021-11-08 15:19:28','2021-11-08 15:19:00','Maria','2',5),(27,'2021-11-08 15:25:53','2021-11-08 17:19:00','Josefina','1',2),(29,'2021-11-08 15:31:32','2021-11-08 15:32:15','Lerrad','2',1),(30,'2021-11-08 15:51:19','2021-11-08 15:53:48','Zambito','2',1),(33,'2021-11-08 16:37:16','2021-11-08 16:37:31','Gerard','2',1),(34,'2021-11-08 16:39:10','2021-11-08 18:07:39','Marquitos','1',10),(35,'2021-11-08 18:07:30','2021-11-08 18:07:35','Alfredo','2',6),(36,'2021-11-08 18:37:01','2021-11-08 18:37:12','Luis','2',2),(37,'2021-11-08 19:59:22','2021-11-08 19:59:26','Gerard','3',1),(38,'2021-11-09 15:34:31','2021-11-09 16:05:11','Josefina','3',6),(39,'2021-11-09 16:16:08','2021-11-09 16:17:10','Dani','4',1),(40,'2021-11-09 16:29:36','2021-11-09 16:29:39','Gerard','4',1),(41,'2021-11-09 16:30:05','2021-11-09 16:30:09','Pol','3',1),(42,'2021-11-09 16:35:47','2021-11-09 16:35:58','Marga','1',2),(43,'2021-11-09 17:18:13','2021-11-10 19:24:29','Chaves','1',1),(44,'2021-11-09 17:18:24','2021-12-19 17:30:14','Susana','3',4),(45,'2021-11-09 17:18:47',NULL,'Luis','1',7),(46,'2021-11-09 17:19:15',NULL,'Carlos','4',10),(47,'2021-11-10 19:23:46','2021-11-10 19:33:46','MARC','3',2),(48,'2021-11-10 19:26:04',NULL,'Agnes','3',1),(49,'2021-12-19 17:27:50',NULL,'Armando','4',8),(50,'2021-12-02 03:00:00','2021-12-02 05:00:00','Chatina','3',8),(51,'2021-12-20 03:00:00','2021-12-20 04:00:00','Manuel','2',5),(52,'2021-12-20 04:00:00','2021-12-20 04:15:00','Tomas','1',3),(53,'2021-12-20 04:00:00','2021-12-20 06:00:00','Julio','1',4);

