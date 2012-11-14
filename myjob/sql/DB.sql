SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `miempleodb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `miempleodb` ;

-- -----------------------------------------------------
-- Table `miempleodb`.`pais`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`pais` (
  `idpais` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`idpais`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`departamento_estado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`departamento_estado` (
  `iddepartamento_estado` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(50) NOT NULL ,
  `fk_idPais` INT NOT NULL ,
  PRIMARY KEY (`iddepartamento_estado`) ,
  INDEX `fk_idPais` (`fk_idPais` ASC) ,
  CONSTRAINT `fk_idPais`
    FOREIGN KEY (`fk_idPais` )
    REFERENCES `miempleodb`.`pais` (`idpais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`area_empleo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`area_empleo` (
  `idarea_empleo` INT NOT NULL AUTO_INCREMENT COMMENT 'Guarda la llave primaria de la tabla.' ,
  `descripcion` VARCHAR(50) NOT NULL COMMENT 'Guarda la descripcion del area de empleo.' ,
  PRIMARY KEY (`idarea_empleo`) )
ENGINE = InnoDB
COMMENT = 'Guarda el catalogo de las areas en que se puede generar o bu' /* comment truncated */;


-- -----------------------------------------------------
-- Table `miempleodb`.`cargo_empleo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`cargo_empleo` (
  `idcargo_empleo` INT NOT NULL COMMENT 'Guarda la llave primaria de la tabla.' ,
  `descripcion` VARCHAR(50) NULL COMMENT 'Guarda la descripcion del cargo de empleo. Ejemplo: Analista Programador, DBA, Cosmetologa, etc.' ,
  `fk_areaEmpledo` INT NOT NULL COMMENT 'Contiene  la llave o indice del area de empleo. Este campo esta relacionado con la tabla \"area_empleo\"' ,
  PRIMARY KEY (`idcargo_empleo`) ,
  INDEX `fk_areaEmpledo` (`fk_areaEmpledo` ASC) ,
  CONSTRAINT `fk_areaEmpledo`
    FOREIGN KEY (`fk_areaEmpledo` )
    REFERENCES `miempleodb`.`area_empleo` (`idarea_empleo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Registra la información del tipo de cargo de empleo generado' /* comment truncated */;


-- -----------------------------------------------------
-- Table `miempleodb`.`tipo_documento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`tipo_documento` (
  `idtipo_documento` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipo_documento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`datos_personales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`datos_personales` (
  `iddatos_personales` INT NOT NULL AUTO_INCREMENT ,
  `nombres` VARCHAR(45) NOT NULL ,
  `apellidos` VARCHAR(45) NOT NULL ,
  `fechaNacimiento` DATE NOT NULL ,
  `genero` CHAR(1) NOT NULL ,
  `estadoCivil` CHAR(1) NOT NULL ,
  `foto` TEXT NULL ,
  `fk_tipoDocumento` INT NOT NULL ,
  `noDocumento` VARCHAR(50) NOT NULL ,
  `fk_pais` INT NOT NULL ,
  `fk_departamento` INT NOT NULL ,
  `direccion` VARCHAR(100) NOT NULL ,
  `telefonoCasa` VARCHAR(25) NOT NULL ,
  `telefonoCelular` VARCHAR(25) NOT NULL ,
  `telefonoOficina` VARCHAR(25) NULL ,
  `extOficina` VARCHAR(10) NULL ,
  `email` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`iddatos_personales`) ,
  INDEX `fk_tipoDocumento` (`fk_tipoDocumento` ASC) ,
  INDEX `fk_paisDatosPersonales` (`fk_pais` ASC) ,
  INDEX `fk_departamentoDatosPersonales` (`fk_departamento` ASC) ,
  CONSTRAINT `fk_tipoDocumento`
    FOREIGN KEY (`fk_tipoDocumento` )
    REFERENCES `miempleodb`.`tipo_documento` (`idtipo_documento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paisDatosPersonales`
    FOREIGN KEY (`fk_pais` )
    REFERENCES `miempleodb`.`pais` (`idpais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_departamentoDatosPersonales`
    FOREIGN KEY (`fk_departamento` )
    REFERENCES `miempleodb`.`departamento_estado` (`iddepartamento_estado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`nivel_estudio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`nivel_estudio` (
  `idnivel_estudio` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idnivel_estudio`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`institucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`institucion` (
  `idinstitucion` INT NOT NULL ,
  `descripcion` VARCHAR(50) NOT NULL ,
  `fk_nivelEstudio` INT NOT NULL ,
  `fk_pais` INT NOT NULL ,
  `fk_departamento` INT NOT NULL ,
  PRIMARY KEY (`idinstitucion`) ,
  INDEX `fk_nivelEstudio` (`fk_nivelEstudio` ASC) ,
  INDEX `fk_pais` (`fk_pais` ASC) ,
  INDEX `fk_departamento` (`fk_departamento` ASC) ,
  CONSTRAINT `fk_nivelEstudio`
    FOREIGN KEY (`fk_nivelEstudio` )
    REFERENCES `miempleodb`.`nivel_estudio` (`idnivel_estudio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pais`
    FOREIGN KEY (`fk_pais` )
    REFERENCES `miempleodb`.`pais` (`idpais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_departamento`
    FOREIGN KEY (`fk_departamento` )
    REFERENCES `miempleodb`.`departamento_estado` (`iddepartamento_estado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`carrera` (
  `idcarrera` INT NOT NULL COMMENT 'Contiene la llave primaria de la tabla.' ,
  `descripcion` VARCHAR(45) NOT NULL COMMENT 'Guarda la descripcion de la carrera estudiada por la persona.' ,
  `fk_institucion` INT NOT NULL ,
  PRIMARY KEY (`idcarrera`) ,
  INDEX `fk_institucion` (`fk_institucion` ASC) ,
  CONSTRAINT `fk_institucion`
    FOREIGN KEY (`fk_institucion` )
    REFERENCES `miempleodb`.`institucion` (`idinstitucion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Guarda la informacion de la carrera estudiada por el aspiran' /* comment truncated */;


-- -----------------------------------------------------
-- Table `miempleodb`.`estado_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`estado_carrera` (
  `idestado_carrera` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idestado_carrera`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`tipo_equipo_herramienta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`tipo_equipo_herramienta` (
  `idtipo_equipo_herramienta` INT NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipo_equipo_herramienta`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`herramienta_equipo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`herramienta_equipo` (
  `idherramienta_equipo` INT NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  `fk_equipo` INT NOT NULL ,
  PRIMARY KEY (`idherramienta_equipo`) ,
  INDEX `fk_equipo` (`fk_equipo` ASC) ,
  CONSTRAINT `fk_equipo`
    FOREIGN KEY (`fk_equipo` )
    REFERENCES `miempleodb`.`tipo_equipo_herramienta` (`idtipo_equipo_herramienta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`catalogo_empresa_curriculum`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`catalogo_empresa_curriculum` (
  `idcatalogo_empresa_curriculum` INT NOT NULL ,
  `descripcion` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`idcatalogo_empresa_curriculum`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`estudios_realizados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`estudios_realizados` (
  `idestudio_realizado` INT NOT NULL ,
  `fk_nivelEstudio` INT NOT NULL ,
  `fk_institucion` INT NOT NULL ,
  `fk_carrera` INT NOT NULL ,
  `fk_estadoCarrera` INT NOT NULL ,
  `observaciones` VARCHAR(100) NULL ,
  `anioInicio` YEAR NULL ,
  `anioFinalizacion` YEAR NULL ,
  `fk_datosPersonales` INT NOT NULL ,
  PRIMARY KEY (`idestudio_realizado`) ,
  INDEX `fk_nivelEstudioRealizados` (`fk_nivelEstudio` ASC) ,
  INDEX `fk_institucionEstudioRealizados` (`fk_institucion` ASC) ,
  INDEX `fk_carreraEstudioRealizados` (`fk_carrera` ASC) ,
  INDEX `fk_estadoCarrera` (`fk_estadoCarrera` ASC) ,
  INDEX `fk_DatosPersonalesEstudio` (`fk_datosPersonales` ASC) ,
  CONSTRAINT `fk_nivelEstudioRealizados`
    FOREIGN KEY (`fk_nivelEstudio` )
    REFERENCES `miempleodb`.`nivel_estudio` (`idnivel_estudio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_institucionEstudioRealizados`
    FOREIGN KEY (`fk_institucion` )
    REFERENCES `miempleodb`.`institucion` (`idinstitucion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carreraEstudioRealizados`
    FOREIGN KEY (`fk_carrera` )
    REFERENCES `miempleodb`.`carrera` (`idcarrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estadoCarrera`
    FOREIGN KEY (`fk_estadoCarrera` )
    REFERENCES `miempleodb`.`estado_carrera` (`idestado_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DatosPersonalesEstudio`
    FOREIGN KEY (`fk_datosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`experiencia_equipo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`experiencia_equipo` (
  `idexperiencia_equipo` INT NOT NULL AUTO_INCREMENT ,
  `fk_tipoEquipo` INT NOT NULL ,
  `fk_herramientaEquipo` INT NOT NULL ,
  `fk_DatosPersonales` INT NOT NULL ,
  PRIMARY KEY (`idexperiencia_equipo`) ,
  INDEX `fk_tipoEquipoExperiencia` (`fk_tipoEquipo` ASC) ,
  INDEX `fk_herramientaExperiencia` (`fk_herramientaEquipo` ASC) ,
  INDEX `fk_DatosPersonalesExperiencia` (`fk_DatosPersonales` ASC) ,
  CONSTRAINT `fk_tipoEquipoExperiencia`
    FOREIGN KEY (`fk_tipoEquipo` )
    REFERENCES `miempleodb`.`tipo_equipo_herramienta` (`idtipo_equipo_herramienta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_herramientaExperiencia`
    FOREIGN KEY (`fk_herramientaEquipo` )
    REFERENCES `miempleodb`.`herramienta_equipo` (`idherramienta_equipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DatosPersonalesExperiencia`
    FOREIGN KEY (`fk_DatosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`experiencia_laboral`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`experiencia_laboral` (
  `idexperiencia_laboral` INT NOT NULL AUTO_INCREMENT ,
  `fk_empresa` INT NOT NULL ,
  `periodoInicio` DATE NULL ,
  `periodoFinalizacion` DATE NULL ,
  `cargo` VARCHAR(45) NOT NULL ,
  `jefeInmediato` VARCHAR(45) NOT NULL ,
  `telefono` VARCHAR(25) NOT NULL ,
  `ext` VARCHAR(10) NULL ,
  `fk_datosPersonales` INT NOT NULL ,
  PRIMARY KEY (`idexperiencia_laboral`) ,
  INDEX `fk_catalogoEmpresa` (`fk_empresa` ASC) ,
  INDEX `fk_datosPersonalesLaboral` (`fk_datosPersonales` ASC) ,
  CONSTRAINT `fk_catalogoEmpresa`
    FOREIGN KEY (`fk_empresa` )
    REFERENCES `miempleodb`.`catalogo_empresa_curriculum` (`idcatalogo_empresa_curriculum` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_datosPersonalesLaboral`
    FOREIGN KEY (`fk_datosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`capacitaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`capacitaciones` (
  `idcapacitaciones` INT NOT NULL AUTO_INCREMENT COMMENT 'Almacena la llave primaria de la tabla.' ,
  `descripcion` VARCHAR(45) NOT NULL COMMENT 'Guarda la información de las capacitaciones o diplomas obtenidos por las personas. Ejemplo: Diplomado en Computación.' ,
  `anioCapacitacion` YEAR NULL COMMENT 'Registra el año en que se obtuvieron dichas capacitaciones.' ,
  `fk_datosPersonales` INT NOT NULL COMMENT 'Contiene la llave o indice de la persona. Este campo esta relacionado con la tabla \"datos_personales\"' ,
  PRIMARY KEY (`idcapacitaciones`) ,
  INDEX `fk_datosPersonalesCapacitacion` (`fk_datosPersonales` ASC) ,
  CONSTRAINT `fk_datosPersonalesCapacitacion`
    FOREIGN KEY (`fk_datosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Guarda la información de las capacitaciones obtenidad por la' /* comment truncated */;


-- -----------------------------------------------------
-- Table `miempleodb`.`referencia_laboral`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`referencia_laboral` (
  `idreferencia_laboral` INT NOT NULL ,
  `nombre` VARCHAR(100) NOT NULL ,
  `telefono` VARCHAR(25) NOT NULL ,
  `ext` VARCHAR(10) NULL ,
  `fk_datosPersonales` INT NOT NULL ,
  PRIMARY KEY (`idreferencia_laboral`) ,
  INDEX `fk_datosPersonalesReferenciaL` (`fk_datosPersonales` ASC) ,
  CONSTRAINT `fk_datosPersonalesReferenciaL`
    FOREIGN KEY (`fk_datosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`parentesco`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`parentesco` (
  `idparentesco` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idparentesco`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`referencia_personal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`referencia_personal` (
  `idreferencia_personal` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NULL ,
  `telefono` VARCHAR(25) NULL ,
  `fk_parentesco` INT NULL ,
  `fk_datosPersonales` INT NULL ,
  PRIMARY KEY (`idreferencia_personal`) ,
  INDEX `fk_parentescoReferenciaP` (`fk_parentesco` ASC) ,
  INDEX `fk_datosPersonalesReferenciaP` (`fk_datosPersonales` ASC) ,
  CONSTRAINT `fk_parentescoReferenciaP`
    FOREIGN KEY (`fk_parentesco` )
    REFERENCES `miempleodb`.`parentesco` (`idparentesco` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_datosPersonalesReferenciaP`
    FOREIGN KEY (`fk_datosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`diplomas_conocimiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`diplomas_conocimiento` (
  `iddiplomas_conocimiento` INT NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  `fk_datosPersonales` INT NOT NULL ,
  PRIMARY KEY (`iddiplomas_conocimiento`) ,
  INDEX `fk_datosPersonalesDiplomas` (`fk_datosPersonales` ASC) ,
  CONSTRAINT `fk_datosPersonalesDiplomas`
    FOREIGN KEY (`fk_datosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`empresa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(100) NOT NULL ,
  `mision` VARCHAR(45) NOT NULL ,
  `vision` VARCHAR(45) NOT NULL ,
  `logo` TEXT NOT NULL ,
  `fk_pais` INT NOT NULL ,
  `fk_departamento` INT NOT NULL ,
  `direccion` VARCHAR(100) NOT NULL ,
  `telefono` VARCHAR(25) NOT NULL ,
  `email` VARCHAR(50) NOT NULL ,
  `paginaWeb` TEXT NULL ,
  PRIMARY KEY (`idempresa`) ,
  INDEX `fk_paisEmpresa` (`fk_pais` ASC) ,
  INDEX `fk_departamentoEmpresa` (`fk_departamento` ASC) ,
  CONSTRAINT `fk_paisEmpresa`
    FOREIGN KEY (`fk_pais` )
    REFERENCES `miempleodb`.`pais` (`idpais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_departamentoEmpresa`
    FOREIGN KEY (`fk_departamento` )
    REFERENCES `miempleodb`.`departamento_estado` (`iddepartamento_estado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`anuncio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`anuncio` (
  `idanuncio` INT NOT NULL AUTO_INCREMENT COMMENT 'Llave principal de la tabla' ,
  `titulo` VARCHAR(45) NOT NULL COMMENT 'Guarda el titulo del anuncio' ,
  `fk_areaEmpleo` INT NOT NULL COMMENT 'LLave secundaria que tiene relacion con la tabla area_empleo' ,
  `fk_cargoEmpleo` INT NOT NULL COMMENT 'LLave secundaria que tiene relacion con la tabla cargo_empleo' ,
  `puestoVacantes` INT NOT NULL COMMENT 'Guardar la cantidad de puestos vacantes para la plaza de trabajo' ,
  `tipoContratacion` VARCHAR(45) NOT NULL COMMENT 'Guarda la información de la clase de contratacion que se va a realizar en la plaza de empleo. Ejemplo: Tiempo Completo, Por Proyecto, Medio Tiempo, etc.' ,
  `nivelExperiencia` VARCHAR(45) NOT NULL COMMENT 'Guardar el nivel de experiencia requerido para la plaza de empleo. Ejemplo: 1 año, 2 años, 3-4 años, ect.' ,
  `genero` VARCHAR(25) NOT NULL COMMENT 'Guarda la información para el tipo de genero requerido en el empleo. Ejemplo: Masculino, Femenino, Ambos Sexos, etc.' ,
  `rangoEdad` VARCHAR(20) NOT NULL COMMENT 'Guarda el rango de edad que se requiere en la oferta de trabajo. Ejemplo: 21-35 años, 25-30 años, 20-25 años, etc.' ,
  `salarioMinimo` DECIMAL(10,2) NULL COMMENT 'Guardar la información del salario minimo a pagar en la oferta de trabajo. Ejemplo: 250.00, 350.00, 600.00, etc.' ,
  `salarioMaximo` DECIMAL(10,2) NULL COMMENT 'Guardar la información del salario maximo a pagar en la oferta de trabajo. Ejemplo: 250.00, 350.00, 600.00, etc.' ,
  `fk_pais` INT NOT NULL COMMENT 'Llave secundaria que permite guardar la localidad del pais al que esta dirigida la oferta de empleo. Esta relacionada con la tabla \"pais\".' ,
  `fk_departamento` INT NOT NULL COMMENT 'Llave secundaria que permite guardar la localidad del departamento o estado al que esta dirigida la oferta de empleo. Esta relacionada con la tabla \"departamento_estado\".' ,
  `requisitos` TEXT NULL COMMENT 'Guarda la información de requisitos adicionales para poder aplicar en la oferta de empleo.' ,
  `descripcionOferta` TEXT NULL COMMENT 'Guarda el detalle o descripcion de la oferta de empleo.' ,
  `fk_empresa` INT NOT NULL COMMENT 'Llave secundaria que guarda el id de la empresa que ha generado el empleo. Esta relacionada con la tabla empresa.' ,
  PRIMARY KEY (`idanuncio`) ,
  INDEX `fk_areaEmpletoAnuncio` (`fk_areaEmpleo` ASC) ,
  INDEX `fk_cargoAnuncio` (`fk_cargoEmpleo` ASC) ,
  INDEX `fk_paisAnuncio` (`fk_pais` ASC) ,
  INDEX `fk_departamentoAnuncio` (`fk_departamento` ASC) ,
  INDEX `fk_empresaAnuncio` (`fk_empresa` ASC) ,
  CONSTRAINT `fk_areaEmpletoAnuncio`
    FOREIGN KEY (`fk_areaEmpleo` )
    REFERENCES `miempleodb`.`area_empleo` (`idarea_empleo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cargoAnuncio`
    FOREIGN KEY (`fk_cargoEmpleo` )
    REFERENCES `miempleodb`.`cargo_empleo` (`idcargo_empleo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paisAnuncio`
    FOREIGN KEY (`fk_pais` )
    REFERENCES `miempleodb`.`pais` (`idpais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_departamentoAnuncio`
    FOREIGN KEY (`fk_departamento` )
    REFERENCES `miempleodb`.`departamento_estado` (`iddepartamento_estado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresaAnuncio`
    FOREIGN KEY (`fk_empresa` )
    REFERENCES `miempleodb`.`empresa` (`idempresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Guarda la información de los anuncios de empleos que las emp' /* comment truncated */;


-- -----------------------------------------------------
-- Table `miempleodb`.`bolsa_trabajo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`bolsa_trabajo` (
  `idbolsa_trabajo` INT NOT NULL COMMENT 'Contiene la llave primaria' ,
  `fk_DatosPersonales` INT NOT NULL COMMENT 'Contiene la llave o indice de la persona que ha presentado su curriculum. Campo relacionado con la tabla \"datos_personales\"' ,
  `fk_anuncio` INT NOT NULL COMMENT 'Contiene la llave o indice del anuncio generado por las empresas.' ,
  PRIMARY KEY (`idbolsa_trabajo`) ,
  INDEX `fk_datosPersonalesBolsa` (`fk_DatosPersonales` ASC) ,
  INDEX `fk_anuncioBolsa` (`fk_anuncio` ASC) ,
  CONSTRAINT `fk_datosPersonalesBolsa`
    FOREIGN KEY (`fk_DatosPersonales` )
    REFERENCES `miempleodb`.`datos_personales` (`iddatos_personales` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_anuncioBolsa`
    FOREIGN KEY (`fk_anuncio` )
    REFERENCES `miempleodb`.`anuncio` (`idanuncio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Guarda la información de las personas que han presentado su ' /* comment truncated */;


-- -----------------------------------------------------
-- Table `miempleodb`.`datos_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`datos_usuario` (
  `usuario` VARCHAR(50) NOT NULL ,
  `password` VARCHAR(50) NOT NULL ,
  `tipoUsuario` CHAR(1) NOT NULL ,
  `estado` CHAR(1) NOT NULL ,
  `accesoBusqueda` CHAR(1) NOT NULL ,
  `fechaCreacion` DATE NOT NULL ,
  `ultimoAcceso` DATE NOT NULL ,
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miempleodb`.`bitacora`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miempleodb`.`bitacora` (
  `idbitacora` INT NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla' ,
  `descripcionAccion` TEXT NOT NULL COMMENT 'Guarda la accion realizada en el sistema. Ejemplo: La empresa pajarito agrego un nuevo anuncio.' ,
  `tipoAccion` CHAR(1) NOT NULL COMMENT 'Guarda el tipo de accion realizada en el sistema. Ejemplo: D=Delete, U=Update, I=Insert, A=Activo y I=Inactivo.' ,
  `fechaAccion` DATETIME NOT NULL COMMENT 'Registra la fecha y hora en que se realizo la accion.' ,
  `fk_usuario` VARCHAR(50) NOT NULL COMMENT 'Guarda el id del usuario que realizo la accion. Este campo esta relacionado con la tabla \"datos_usuario\".' ,
  PRIMARY KEY (`idbitacora`) ,
  INDEX `fk_usuario` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_usuario`
    FOREIGN KEY (`fk_usuario` )
    REFERENCES `miempleodb`.`datos_usuario` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'LLeva el control de los cambios realizados en el sistema.';



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
