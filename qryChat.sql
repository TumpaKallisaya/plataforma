
-- tabla para el registro del chat
CREATE TABLE `tb_chat` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tema` int(10) NOT NULL,
  `id_usuario_de` int(10) NOT NULL,
  `mensaje` TEXT NOT NULL,
  `path` TEXT NOT NULL,
  `archivo` TEXT NOT NULL,
  `tamano` TEXT NOT NULL,
  `fecha_envio` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `timestamp` int(11) NOT NULL,
  `id_tema_hist` int(10) NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

-- tabla para el tema del chat
CREATE TABLE `tb_chat_tema` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `cod_seccion` int(10) NOT NULL,
  `id_operador` int(10) NOT NULL,
  `tema` VARCHAR(255) NOT NULL DEFAULT '',
  `estado` VARCHAR(50) NOT NULL DEFAULT '',
  `fecha_creacion` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

-- tabla para relacionar las tablas tb_usuarios y tb_seccion
CREATE TABLE `tb_usuario_seccion` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `cod_seccion` int(10) NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;


-- Tabla de secciones
DROP TABLE IF EXISTS `tb_seccion`;
CREATE TABLE `tb_seccion` (
  `cod_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `desc_seccion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `seccion_matriz` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `secretaria` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `jefe_seccion` int(11) DEFAULT NULL,
  `activo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `sigla` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `usuario_reg` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fecha_reg` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `usuario_mod` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fecha_mod` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ve_reporte` int(11) DEFAULT NULL,
  `ve_reporte2` int(11) DEFAULT NULL,
  `ve_reporte3` int(11) DEFAULT NULL,
  `ve_reporte4` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_seccion`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- inserts de seccion
INSERT INTO `tb_seccion` VALUES ('1', 'DIRECCION TECNICA DE TELECOMUNICACIONES Y TIC', 'LP', 'nachavez', '2342', 'True', 'DTL', '', '', 'alencinas', '2015-11-04 11:49:43', '65', '68', '71', '597');
INSERT INTO `tb_seccion` VALUES ('2', 'DIRECCION TECNICA SECTORIAL DE TRANSPORTES Y SERVICIO POSTAL', 'LP', 'shvillarroel', '2005', 'True', 'DTR', '', '', 'juchoque', '2013-04-09 07:32:23', '2005', '41', null, null);

-- relacionando al usuario postal con la seccion 1 (direccion tecnica de telecomunicaciones y tic)
-- este usuario solo atendera temas de esa seccion
insert into tb_usuario_seccion (id_usuario, cod_seccion) values(11, 1);

-- Relaciones de usuarios y operadoras (empresas)
insert into tb_usuario_operador (id_usuario, id_operador) values(6, 276); -- relacionamos al usuario ope3 que es de nuevatel con su operador
insert into tb_usuario_operador (id_usuario, id_operador) values(2, 293); -- relacionamos al usuario admin que es de entel con su operador ()