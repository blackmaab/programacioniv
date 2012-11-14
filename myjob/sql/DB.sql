-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2012 a las 17:10:57
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `miempleodb`
--
CREATE DATABASE `miempleodb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `miempleodb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `idanuncio` int(11) NOT NULL auto_increment COMMENT 'Llave principal de la tabla',
  `titulo` varchar(45) NOT NULL COMMENT 'Guarda el titulo del anuncio',
  `fk_areaEmpleo` int(11) NOT NULL COMMENT 'LLave secundaria que tiene relacion con la tabla area_empleo',
  `fk_cargoEmpleo` int(11) NOT NULL COMMENT 'LLave secundaria que tiene relacion con la tabla cargo_empleo',
  `puestoVacantes` int(11) NOT NULL COMMENT 'Guardar la cantidad de puestos vacantes para la plaza de trabajo',
  `tipoContratacion` varchar(45) NOT NULL COMMENT 'Guarda la información de la clase de contratacion que se va a realizar en la plaza de empleo. Ejemplo: Tiempo Completo, Por Proyecto, Medio Tiempo, etc.',
  `nivelExperiencia` varchar(45) NOT NULL COMMENT 'Guardar el nivel de experiencia requerido para la plaza de empleo. Ejemplo: 1 año, 2 años, 3-4 años, ect.',
  `genero` varchar(25) NOT NULL COMMENT 'Guarda la información para el tipo de genero requerido en el empleo. Ejemplo: Masculino, Femenino, Ambos Sexos, etc.',
  `rangoEdad` varchar(20) NOT NULL COMMENT 'Guarda el rango de edad que se requiere en la oferta de trabajo. Ejemplo: 21-35 años, 25-30 años, 20-25 años, etc.',
  `salarioMinimo` decimal(10,2) default NULL COMMENT 'Guardar la información del salario minimo a pagar en la oferta de trabajo. Ejemplo: 250.00, 350.00, 600.00, etc.',
  `salarioMaximo` decimal(10,2) default NULL COMMENT 'Guardar la información del salario maximo a pagar en la oferta de trabajo. Ejemplo: 250.00, 350.00, 600.00, etc.',
  `fk_pais` int(11) NOT NULL COMMENT 'Llave secundaria que permite guardar la localidad del pais al que esta dirigida la oferta de empleo. Esta relacionada con la tabla "pais".',
  `fk_departamento` int(11) NOT NULL COMMENT 'Llave secundaria que permite guardar la localidad del departamento o estado al que esta dirigida la oferta de empleo. Esta relacionada con la tabla "departamento_estado".',
  `requisitos` text COMMENT 'Guarda la información de requisitos adicionales para poder aplicar en la oferta de empleo.',
  `descripcionOferta` text COMMENT 'Guarda el detalle o descripcion de la oferta de empleo.',
  `fk_empresa` int(11) NOT NULL COMMENT 'Llave secundaria que guarda el id de la empresa que ha generado el empleo. Esta relacionada con la tabla empresa.',
  PRIMARY KEY  (`idanuncio`),
  KEY `fk_areaEmpletoAnuncio` (`fk_areaEmpleo`),
  KEY `fk_cargoAnuncio` (`fk_cargoEmpleo`),
  KEY `fk_paisAnuncio` (`fk_pais`),
  KEY `fk_departamentoAnuncio` (`fk_departamento`),
  KEY `fk_empresaAnuncio` (`fk_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guarda la información de los anuncios de empleos que las emp' AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `anuncio`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_empleo`
--

CREATE TABLE `area_empleo` (
  `idarea_empleo` int(11) NOT NULL auto_increment COMMENT 'Guarda la llave primaria de la tabla.',
  `descripcion` varchar(50) NOT NULL COMMENT 'Guarda la descripcion del area de empleo.',
  PRIMARY KEY  (`idarea_empleo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Guarda el catalogo de las areas en que se puede generar o bu' AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `area_empleo`
--

INSERT INTO `area_empleo` (`idarea_empleo`, `descripcion`) VALUES
(2, 'INFORMATICA'),
(3, 'CONTABILIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idbitacora` int(11) NOT NULL auto_increment COMMENT 'Llave primaria de la tabla',
  `descripcionAccion` text NOT NULL COMMENT 'Guarda la accion realizada en el sistema. Ejemplo: La empresa pajarito agrego un nuevo anuncio.',
  `tipoAccion` char(1) NOT NULL COMMENT 'Guarda el tipo de accion realizada en el sistema. Ejemplo: D=Delete, U=Update, I=Insert, A=Activo y I=Inactivo.',
  `fechaAccion` datetime NOT NULL COMMENT 'Registra la fecha y hora en que se realizo la accion.',
  `fk_usuario` varchar(50) NOT NULL COMMENT 'Guarda el id del usuario que realizo la accion. Este campo esta relacionado con la tabla "datos_usuario".',
  PRIMARY KEY  (`idbitacora`),
  KEY `fk_usuario` (`fk_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='LLeva el control de los cambios realizados en el sistema.' AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `bitacora`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsa_trabajo`
--

CREATE TABLE `bolsa_trabajo` (
  `idbolsa_trabajo` int(11) NOT NULL COMMENT 'Contiene la llave primaria',
  `fk_DatosPersonales` int(11) NOT NULL COMMENT 'Contiene la llave o indice de la persona que ha presentado su curriculum. Campo relacionado con la tabla "datos_personales"',
  `fk_anuncio` int(11) NOT NULL COMMENT 'Contiene la llave o indice del anuncio generado por las empresas.',
  PRIMARY KEY  (`idbolsa_trabajo`),
  KEY `fk_datosPersonalesBolsa` (`fk_DatosPersonales`),
  KEY `fk_anuncioBolsa` (`fk_anuncio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guarda la información de las personas que han presentado su ';

--
-- Volcar la base de datos para la tabla `bolsa_trabajo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `idcapacitaciones` int(11) NOT NULL auto_increment COMMENT 'Almacena la llave primaria de la tabla.',
  `descripcion` varchar(45) NOT NULL COMMENT 'Guarda la información de las capacitaciones o diplomas obtenidos por las personas. Ejemplo: Diplomado en Computación.',
  `anioCapacitacion` year(4) default NULL COMMENT 'Registra el año en que se obtuvieron dichas capacitaciones.',
  `fk_datosPersonales` int(11) NOT NULL COMMENT 'Contiene la llave o indice de la persona. Este campo esta relacionado con la tabla "datos_personales"',
  PRIMARY KEY  (`idcapacitaciones`),
  KEY `fk_datosPersonalesCapacitacion` (`fk_datosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guarda la información de las capacitaciones obtenidad por la' AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `capacitaciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_empleo`
--

CREATE TABLE `cargo_empleo` (
  `idcargo_empleo` int(11) NOT NULL auto_increment COMMENT 'Guarda la llave primaria de la tabla.',
  `descripcion` varchar(50) default NULL COMMENT 'Guarda la descripcion del cargo de empleo. Ejemplo: Analista Programador, DBA, Cosmetologa, etc.',
  `fk_areaEmpleo` int(11) NOT NULL COMMENT 'Contiene  la llave o indice del area de empleo. Este campo esta relacionado con la tabla "area_empleo"',
  PRIMARY KEY  (`idcargo_empleo`),
  KEY `fk_areaEmpledo` (`fk_areaEmpleo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Registra la información del tipo de cargo de empleo generado' AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `cargo_empleo`
--

INSERT INTO `cargo_empleo` (`idcargo_empleo`, `descripcion`, `fk_areaEmpleo`) VALUES
(2, 'ASISTENTE', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idcarrera` int(11) NOT NULL auto_increment COMMENT 'Contiene la llave primaria de la tabla.',
  `descripcion` varchar(45) NOT NULL COMMENT 'Guarda la descripcion de la carrera estudiada por la persona.',
  `fk_institucion` int(11) NOT NULL,
  PRIMARY KEY  (`idcarrera`),
  KEY `fk_institucion` (`fk_institucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Guarda la informacion de la carrera estudiada por el aspiran' AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idcarrera`, `descripcion`, `fk_institucion`) VALUES
(1, 'LICENCIATURA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_empresa_curriculum`
--

CREATE TABLE `catalogo_empresa_curriculum` (
  `idcatalogo_empresa_curriculum` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY  (`idcatalogo_empresa_curriculum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `catalogo_empresa_curriculum`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `iddatos_personales` int(11) NOT NULL auto_increment,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` char(1) NOT NULL,
  `estadoCivil` char(1) NOT NULL,
  `foto` text,
  `fk_tipoDocumento` int(11) NOT NULL,
  `noDocumento` varchar(50) NOT NULL,
  `fk_pais` int(11) NOT NULL,
  `fk_departamento` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefonoCasa` varchar(25) NOT NULL,
  `telefonoCelular` varchar(25) NOT NULL,
  `telefonoOficina` varchar(25) default NULL,
  `extOficina` varchar(10) default NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY  (`iddatos_personales`),
  KEY `fk_tipoDocumento` (`fk_tipoDocumento`),
  KEY `fk_paisDatosPersonales` (`fk_pais`),
  KEY `fk_departamentoDatosPersonales` (`fk_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `datos_personales`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario`
--

CREATE TABLE `datos_usuario` (
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipoUsuario` char(1) NOT NULL,
  `estado` char(1) NOT NULL,
  `accesoBusqueda` char(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `ultimoAcceso` date NOT NULL,
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `datos_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_estado`
--

CREATE TABLE `departamento_estado` (
  `iddepartamento_estado` int(11) NOT NULL auto_increment,
  `descripcion` varchar(50) NOT NULL,
  `fk_idPais` int(11) NOT NULL,
  PRIMARY KEY  (`iddepartamento_estado`),
  KEY `fk_idPais` (`fk_idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `departamento_estado`
--

INSERT INTO `departamento_estado` (`iddepartamento_estado`, `descripcion`, `fk_idPais`) VALUES
(2, 'MANAGUA', 6),
(3, 'SAN SALVADOR', 1),
(4, 'HONDURAS', 5),
(6, 'MEXICO DF', 7),
(7, 'CHIAPAS DOS', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diplomas_conocimiento`
--

CREATE TABLE `diplomas_conocimiento` (
  `iddiplomas_conocimiento` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fk_datosPersonales` int(11) NOT NULL,
  PRIMARY KEY  (`iddiplomas_conocimiento`),
  KEY `fk_datosPersonalesDiplomas` (`fk_datosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `diplomas_conocimiento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL auto_increment,
  `descripcion` varchar(100) NOT NULL,
  `mision` varchar(45) NOT NULL,
  `vision` varchar(45) NOT NULL,
  `logo` text NOT NULL,
  `fk_pais` int(11) NOT NULL,
  `fk_departamento` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `paginaWeb` text,
  PRIMARY KEY  (`idempresa`),
  KEY `fk_paisEmpresa` (`fk_pais`),
  KEY `fk_departamentoEmpresa` (`fk_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `empresa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_carrera`
--

CREATE TABLE `estado_carrera` (
  `idestado_carrera` int(11) NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY  (`idestado_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `estado_carrera`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios_realizados`
--

CREATE TABLE `estudios_realizados` (
  `idestudio_realizado` int(11) NOT NULL,
  `fk_nivelEstudio` int(11) NOT NULL,
  `fk_institucion` int(11) NOT NULL,
  `fk_carrera` int(11) NOT NULL,
  `fk_estadoCarrera` int(11) NOT NULL,
  `observaciones` varchar(100) default NULL,
  `anioInicio` year(4) default NULL,
  `anioFinalizacion` year(4) default NULL,
  `fk_datosPersonales` int(11) NOT NULL,
  PRIMARY KEY  (`idestudio_realizado`),
  KEY `fk_nivelEstudioRealizados` (`fk_nivelEstudio`),
  KEY `fk_institucionEstudioRealizados` (`fk_institucion`),
  KEY `fk_carreraEstudioRealizados` (`fk_carrera`),
  KEY `fk_estadoCarrera` (`fk_estadoCarrera`),
  KEY `fk_DatosPersonalesEstudio` (`fk_datosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `estudios_realizados`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_equipo`
--

CREATE TABLE `experiencia_equipo` (
  `idexperiencia_equipo` int(11) NOT NULL auto_increment,
  `fk_tipoEquipo` int(11) NOT NULL,
  `fk_herramientaEquipo` int(11) NOT NULL,
  `fk_DatosPersonales` int(11) NOT NULL,
  PRIMARY KEY  (`idexperiencia_equipo`),
  KEY `fk_tipoEquipoExperiencia` (`fk_tipoEquipo`),
  KEY `fk_herramientaExperiencia` (`fk_herramientaEquipo`),
  KEY `fk_DatosPersonalesExperiencia` (`fk_DatosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `experiencia_equipo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `idexperiencia_laboral` int(11) NOT NULL auto_increment,
  `fk_empresa` int(11) NOT NULL,
  `periodoInicio` date default NULL,
  `periodoFinalizacion` date default NULL,
  `cargo` varchar(45) NOT NULL,
  `jefeInmediato` varchar(45) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `ext` varchar(10) default NULL,
  `fk_datosPersonales` int(11) NOT NULL,
  PRIMARY KEY  (`idexperiencia_laboral`),
  KEY `fk_catalogoEmpresa` (`fk_empresa`),
  KEY `fk_datosPersonalesLaboral` (`fk_datosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `experiencia_laboral`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta_equipo`
--

CREATE TABLE `herramienta_equipo` (
  `idherramienta_equipo` int(11) NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  `fk_equipo` int(11) NOT NULL,
  PRIMARY KEY  (`idherramienta_equipo`),
  KEY `fk_equipo` (`fk_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `herramienta_equipo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `idinstitucion` int(11) NOT NULL auto_increment,
  `descripcion` varchar(50) NOT NULL,
  `fk_nivelEstudio` int(11) NOT NULL,
  `fk_pais` int(11) NOT NULL,
  `fk_departamento` int(11) NOT NULL,
  PRIMARY KEY  (`idinstitucion`),
  KEY `fk_nivelEstudio` (`fk_nivelEstudio`),
  KEY `fk_pais` (`fk_pais`),
  KEY `fk_departamento` (`fk_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idinstitucion`, `descripcion`, `fk_nivelEstudio`, `fk_pais`, `fk_departamento`) VALUES
(2, 'UNIVERSIDAD GAVIDIA', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_estudio`
--

CREATE TABLE `nivel_estudio` (
  `idnivel_estudio` int(11) NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY  (`idnivel_estudio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `nivel_estudio`
--

INSERT INTO `nivel_estudio` (`idnivel_estudio`, `descripcion`) VALUES
(1, 'PRIMARIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL auto_increment,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY  (`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `descripcion`) VALUES
(1, 'EL SALVADOR'),
(5, 'HONDURAS'),
(6, 'NICARAGUA'),
(7, 'MEXICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `idparentesco` int(11) NOT NULL auto_increment,
  `descripcion` varchar(45) default NULL,
  PRIMARY KEY  (`idparentesco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `parentesco`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_laboral`
--

CREATE TABLE `referencia_laboral` (
  `idreferencia_laboral` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `ext` varchar(10) default NULL,
  `fk_datosPersonales` int(11) NOT NULL,
  PRIMARY KEY  (`idreferencia_laboral`),
  KEY `fk_datosPersonalesReferenciaL` (`fk_datosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `referencia_laboral`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_personal`
--

CREATE TABLE `referencia_personal` (
  `idreferencia_personal` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) default NULL,
  `telefono` varchar(25) default NULL,
  `fk_parentesco` int(11) default NULL,
  `fk_datosPersonales` int(11) default NULL,
  PRIMARY KEY  (`idreferencia_personal`),
  KEY `fk_parentescoReferenciaP` (`fk_parentesco`),
  KEY `fk_datosPersonalesReferenciaP` (`fk_datosPersonales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `referencia_personal`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idtipo_documento` int(11) NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY  (`idtipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tipo_documento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo_herramienta`
--

CREATE TABLE `tipo_equipo_herramienta` (
  `idtipo_equipo_herramienta` int(11) NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY  (`idtipo_equipo_herramienta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `tipo_equipo_herramienta`
--

INSERT INTO `tipo_equipo_herramienta` (`idtipo_equipo_herramienta`, `descripcion`) VALUES
(4, 'MECANICO'),
(5, 'INDUSTRIAL');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_areaEmpletoAnuncio` FOREIGN KEY (`fk_areaEmpleo`) REFERENCES `area_empleo` (`idarea_empleo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cargoAnuncio` FOREIGN KEY (`fk_cargoEmpleo`) REFERENCES `cargo_empleo` (`idcargo_empleo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paisAnuncio` FOREIGN KEY (`fk_pais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_departamentoAnuncio` FOREIGN KEY (`fk_departamento`) REFERENCES `departamento_estado` (`iddepartamento_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresaAnuncio` FOREIGN KEY (`fk_empresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `datos_usuario` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bolsa_trabajo`
--
ALTER TABLE `bolsa_trabajo`
  ADD CONSTRAINT `fk_datosPersonalesBolsa` FOREIGN KEY (`fk_DatosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_anuncioBolsa` FOREIGN KEY (`fk_anuncio`) REFERENCES `anuncio` (`idanuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD CONSTRAINT `fk_datosPersonalesCapacitacion` FOREIGN KEY (`fk_datosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo_empleo`
--
ALTER TABLE `cargo_empleo`
  ADD CONSTRAINT `fk_areaEmpledo` FOREIGN KEY (`fk_areaEmpleo`) REFERENCES `area_empleo` (`idarea_empleo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `fk_institucion` FOREIGN KEY (`fk_institucion`) REFERENCES `institucion` (`idinstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `fk_tipoDocumento` FOREIGN KEY (`fk_tipoDocumento`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paisDatosPersonales` FOREIGN KEY (`fk_pais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_departamentoDatosPersonales` FOREIGN KEY (`fk_departamento`) REFERENCES `departamento_estado` (`iddepartamento_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento_estado`
--
ALTER TABLE `departamento_estado`
  ADD CONSTRAINT `fk_idPais` FOREIGN KEY (`fk_idPais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `diplomas_conocimiento`
--
ALTER TABLE `diplomas_conocimiento`
  ADD CONSTRAINT `fk_datosPersonalesDiplomas` FOREIGN KEY (`fk_datosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_paisEmpresa` FOREIGN KEY (`fk_pais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_departamentoEmpresa` FOREIGN KEY (`fk_departamento`) REFERENCES `departamento_estado` (`iddepartamento_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudios_realizados`
--
ALTER TABLE `estudios_realizados`
  ADD CONSTRAINT `fk_nivelEstudioRealizados` FOREIGN KEY (`fk_nivelEstudio`) REFERENCES `nivel_estudio` (`idnivel_estudio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_institucionEstudioRealizados` FOREIGN KEY (`fk_institucion`) REFERENCES `institucion` (`idinstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carreraEstudioRealizados` FOREIGN KEY (`fk_carrera`) REFERENCES `carrera` (`idcarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estadoCarrera` FOREIGN KEY (`fk_estadoCarrera`) REFERENCES `estado_carrera` (`idestado_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DatosPersonalesEstudio` FOREIGN KEY (`fk_datosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencia_equipo`
--
ALTER TABLE `experiencia_equipo`
  ADD CONSTRAINT `fk_tipoEquipoExperiencia` FOREIGN KEY (`fk_tipoEquipo`) REFERENCES `tipo_equipo_herramienta` (`idtipo_equipo_herramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_herramientaExperiencia` FOREIGN KEY (`fk_herramientaEquipo`) REFERENCES `herramienta_equipo` (`idherramienta_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DatosPersonalesExperiencia` FOREIGN KEY (`fk_DatosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD CONSTRAINT `fk_catalogoEmpresa` FOREIGN KEY (`fk_empresa`) REFERENCES `catalogo_empresa_curriculum` (`idcatalogo_empresa_curriculum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datosPersonalesLaboral` FOREIGN KEY (`fk_datosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `herramienta_equipo`
--
ALTER TABLE `herramienta_equipo`
  ADD CONSTRAINT `fk_equipo` FOREIGN KEY (`fk_equipo`) REFERENCES `tipo_equipo_herramienta` (`idtipo_equipo_herramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `fk_departamento` FOREIGN KEY (`fk_departamento`) REFERENCES `departamento_estado` (`iddepartamento_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nivelEstudio` FOREIGN KEY (`fk_nivelEstudio`) REFERENCES `nivel_estudio` (`idnivel_estudio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pais` FOREIGN KEY (`fk_pais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencia_laboral`
--
ALTER TABLE `referencia_laboral`
  ADD CONSTRAINT `fk_datosPersonalesReferenciaL` FOREIGN KEY (`fk_datosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencia_personal`
--
ALTER TABLE `referencia_personal`
  ADD CONSTRAINT `fk_parentescoReferenciaP` FOREIGN KEY (`fk_parentesco`) REFERENCES `parentesco` (`idparentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datosPersonalesReferenciaP` FOREIGN KEY (`fk_datosPersonales`) REFERENCES `datos_personales` (`iddatos_personales`) ON DELETE NO ACTION ON UPDATE NO ACTION;
