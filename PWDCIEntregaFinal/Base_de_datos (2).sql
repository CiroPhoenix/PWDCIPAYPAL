
CREATE database IF NOT exists Proyecto_BDM;
use Proyecto_BDM;
DROP DATABASE proyecto_bdm;
/*CREATE TABLE IF NOT EXISTS `Usuario`*/

/*DROP TABLE IF EXISTS `usuario`;*/

drop table usuario;
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`usuario` (
   `ID_Usuario` INT NOT NULL AUTO_INCREMENT,
  `Foto_Usuario` BLOB NULL,
  `Nombre_Usuario` VARCHAR(45) NOT NULL,
  `NomPatr_Usuario` VARCHAR(45) NOT NULL,
  `NomMatr_Usuario` VARCHAR(45) NOT NULL,
  `Rol_Usuario` enum ('Maestro','Estudiante','Administrador'),
  `Genero_Usuario` enum('Masculino','Femenino'),
  `Nacimiento_Usuario` DATETIME NOT NULL,
  `Nombre_usuario_Usuario` VARCHAR(45) NOT NULL,
  `Correo_Usuario` VARCHAR(45) NOT NULL,
  `Contrasena_Usuario` VARCHAR(45) NOT NULL,
  `Fecha_registro_Usuario` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (`ID_Usuario`));
  
  INSERT INTO usuario (`Foto_Usuario`,`Nombre_Usuario`, `NomPatr_Usuario`, `NomMatr_Usuario`,`Rol_Usuario`, `Genero_Usuario`, `Nacimiento_Usuario`, `Correo_Usuario`,  `Nombre_usuario_Usuario`,`Contrasena_Usuario`) VALUE (NULL,'Julio2', 'Zepeda', 'Soraya', 'Estudiante','Masculino', '1999-01-01 00:00:00', 'juliozep2@gmail.com', 'Phoenix', 'boxing');
  
  select * from usuario;
 
 select Contrasena_Usuario from usuario;
  

  SELECT * FROM usuario WHERE 
Contrasena_Usuario='John4';

 SELECT * FROM usuario WHERE Nombre_Usuario='Jameson'and
Rol_Usuario='Maestro';
  
  ALTER TABLE `proyecto_bdm`.`usuario` MODIFY `Foto_Usuario` BLOB NULL;
  ALTER TABLE `proyecto_bdm`.`usuario` MODIFY `Rol_Usuario` enum ('Maestro','Estudiante','Administrador');
  
  INSERT INTO `proyecto_bdm`.`usuario` (`Nombre_Usuario`, `NomPatr_Usuario`, `NomMatr_Usuario`, `Genero_Usuario`, `Nacimiento_Usuario`, `Correo_Usuario`, `Contrasena_Usuario`, `Nombre_usuario_Usuario`) VALUES ('Julio', 'Zepeda', 'Soraya', 'M', '1999-01-01 00:00:00', 'juliozep@gmail.com', 'Admin?123', 'Admin');
  
  
ALTER TABLE `proyecto_bdm`.`usuario` ADD `Nickname_Usuario` VARCHAR(45) NOT NULL;

ALTER TABLE `proyecto_bdm`.`usuario` MODIFY COLUMN`Contrasena_Usuario` VARCHAR(45);

select * from `proyecto_bdm`.`usuario` where `Password_Usuario` ='John4';


alter table `proyecto_bdm`.`usuario` drop column `Password_Usuario`;
  
  select * from `proyecto_bdm`.`usuario`;
  
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`alumno` (
  `ID_Alumno` INT NOT NULL AUTO_INCREMENT,
  `Datos_Alumno` INT NOT NULL,
  `Bloqueo_Alumno` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_Alumno`),
  INDEX `Datos_Alumno_FK_idx` (`Datos_Alumno` ASC) VISIBLE,
  FOREIGN KEY (`Datos_Alumno`)
  REFERENCES `proyecto_bdm`.`usuario` (`ID_Usuario`));
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`instructor` (
`ID_Instructor` INT NOT NULL AUTO_INCREMENT,
`Datos_Instructor` INT NOT NULL,
`Bloqueo_Instructor` TINYINT(1) NOT NULL DEFAULT 1,
PRIMARY KEY (`ID_Instructor`),
UNIQUE INDEX `Datos_Instructor_UNIQUE` (`Datos_Instructor` ASC) VISIBLE,
FOREIGN KEY (`Datos_Instructor`)
REFERENCES `proyecto_bdm`.`usuario` (`ID_Usuario`));

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`curso` (
  `ID_Curso` INT NOT NULL AUTO_INCREMENT,
  `Instructor_Curso` INT NOT NULL,
  `Niveles_Curso` INT NOT NULL,
  `Costo_Curso` DECIMAL NOT NULL,
  `Descripcion_Curso` VARCHAR(100) NOT NULL,
  `Calificacion_Curso` INT(2) NOT NULL,
  `Foto_Curso` BLOB NOT NULL,
  `Titulo_Curso` VARCHAR(45) NOT NULL,
  `Activo_Curso` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_Curso`),
  FOREIGN KEY (`Instructor_Curso`)
  REFERENCES `proyecto_bdm`.`instructor` (`ID_Instructor`));

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`kardex` (
  `ID_Kardex` INT NOT NULL AUTO_INCREMENT,
  `Alumno_Kardex` INT NOT NULL,
  `Curso_Kardex` INT NOT NULL,
  `Fecha_ingreso_nivel_Kardex` DATETIME NULL,
  `Curso_terminado_Kardex` DATETIME NULL,
  `Avance_Kardex` INT NOT NULL DEFAULT 1,
  `Fecha_inscripcion_curso_Kardex` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Metodo_pago_Kardex` VARCHAR(45) NOT NULL,
  `Costo_Kardex` DECIMAL NOT NULL,
  PRIMARY KEY (`ID_Kardex`),
    FOREIGN KEY (`Alumno_Kardex`)
    REFERENCES `proyecto_bdm`.`alumno` (`ID_Alumno`),
    FOREIGN KEY (`Curso_Kardex`)
    REFERENCES `proyecto_bdm`.`curso` (`ID_Curso`));
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`diploma` (
  `Alumno_Diploma` INT NOT NULL,
  `Curso_Diploma` INT NOT NULL,
  `Instructor_Diploma` VARCHAR(100) NOT NULL,
  `Fecha_terminacion_curso_Diploma` DATETIME NOT NULL,
  PRIMARY KEY (`Alumno_Diploma`, `Curso_Diploma`),
    FOREIGN KEY (`Alumno_Diploma`)
    REFERENCES `proyecto_bdm`.`alumno` (`ID_Alumno`),
    FOREIGN KEY (`Curso_Diploma`)
    REFERENCES `proyecto_bdm`.`curso` (`ID_Curso`));
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`venta` (
  `Instructor_Venta` INT NOT NULL,
  `Curso_Venta` INT NOT NULL,
  `Alumnos_inscritos_Venta` INT NULL,
  `Promedio_niveles_Venta` FLOAT NULL,
  `Total_ingresos_Venta` DECIMAL NULL,
  PRIMARY KEY (`Instructor_Venta`, `Curso_Venta`),
    FOREIGN KEY (`Instructor_Venta`)
    REFERENCES `proyecto_bdm`.`instructor` (`ID_Instructor`),
    FOREIGN KEY (`Curso_Venta`)
    REFERENCES `proyecto_bdm`.`curso` (`ID_Curso`));
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`categoria` (
  `ID_Categoria` INT NOT NULL AUTO_INCREMENT,
  `Descripcion_Categoria` VARCHAR(100) NOT NULL,
  `Instructor_Categoria` INT NOT NULL,
  `Fecha_creacion_Categoria` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Activo_Categoria` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`ID_Categoria`),
  FOREIGN KEY (`Instructor_Categoria`)
  REFERENCES `proyecto_bdm`.`instructor` (`ID_Instructor`));
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`curso_categoria` (
  `Curso_Curso_Categoria` INT NOT NULL,
  `Categoria_Curso_Categoria` INT NOT NULL,
  PRIMARY KEY (`Curso_Curso_Categoria`, `Categoria_Curso_Categoria`),
    FOREIGN KEY (`Curso_Curso_Categoria`)
    REFERENCES `proyecto_bdm`.`curso` (`ID_Curso`),
    FOREIGN KEY (`Categoria_Curso_Categoria`)
    REFERENCES `proyecto_bdm`.`categoria` (`ID_Categoria`));

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`clase` (
  `ID_Clase` INT NOT NULL AUTO_INCREMENT,
  `Costo_Clase` DECIMAL NULL DEFAULT 0,
  `Foto_Clase` BLOB NOT NULL,
  `Titulo_Clase` VARCHAR(45) NOT NULL,
  `Descripcion_Clase` VARCHAR(100) NOT NULL,
  `Curso_Clase` INT NOT NULL,
  `Nivel_Clase` INT NOT NULL,
  PRIMARY KEY (`ID_Clase`),
    FOREIGN KEY (`Curso_Clase`)
    REFERENCES `proyecto_bdm`.`curso` (`ID_Curso`));

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`administrador` (
  `ID_Admin` INT NOT NULL AUTO_INCREMENT,
  `Datos_Administrador` INT NOT NULL,
  PRIMARY KEY (`ID_Admin`),
  UNIQUE INDEX `Datos_Administrador_UNIQUE` (`Datos_Administrador` ASC) VISIBLE,
    FOREIGN KEY (`Datos_Administrador`)
    REFERENCES `proyecto_bdm`.`usuario` (`ID_Usuario`));
    
INSERT INTO `proyecto_bdm`.`administrador` (`Datos_Administrador`) VALUES (1);

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`archivo` (
  `ID_Archivo` INT NOT NULL AUTO_INCREMENT,
  `Archivo_Archivo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID_Archivo`));
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`clase_archivo` (
  `Clase_Clase_Archivo` INT NOT NULL,
  `Archivo_Clase_Archivo` INT NOT NULL,
  PRIMARY KEY (`Clase_Clase_Archivo`, `Archivo_Clase_Archivo`),
    FOREIGN KEY (`Clase_Clase_Archivo`)
    REFERENCES `proyecto_bdm`.`clase` (`ID_Clase`),
    FOREIGN KEY (`Archivo_Clase_Archivo`)
    REFERENCES `proyecto_bdm`.`archivo` (`ID_Archivo`));
  
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`imagen` (
`ID_Imagen` INT NOT NULL AUTO_INCREMENT,
`Imagen_Imagen` BLOB NOT NULL,
PRIMARY KEY (`ID_Imagen`));

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`clase_imagen` (
  `Clase_Clase_Imagen` INT NOT NULL,
  `Imagen_Clase_Imagen` INT NOT NULL,
  PRIMARY KEY (`Clase_Clase_Imagen`, `Imagen_Clase_Imagen`),
    FOREIGN KEY (`Clase_Clase_Imagen`)
    REFERENCES `proyecto_bdm`.`clase` (`ID_Clase`),
    FOREIGN KEY (`Imagen_Clase_Imagen`)
    REFERENCES `proyecto_bdm`.`imagen` (`ID_Imagen`));

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`video` (
`ID_Video` INT NOT NULL AUTO_INCREMENT,
`Video_Video` VARCHAR(100) NOT NULL,
PRIMARY KEY (`ID_Video`));

CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`clase_video` (
  `Clase_Clase_Video` INT NOT NULL,
  `Video_Clase_Video` INT NOT NULL,
  PRIMARY KEY (`Clase_Clase_Video`, `Video_Clase_Video`),
    FOREIGN KEY (`Clase_Clase_Video`)
    REFERENCES `proyecto_bdm`.`clase` (`ID_Clase`),
    FOREIGN KEY (`Video_Clase_Video`)
    REFERENCES `proyecto_bdm`.`video` (`ID_Video`));
    
CREATE TABLE IF NOT EXISTS `proyecto_bdm`.`comentario` (
  `ID_Comentario` INT NOT NULL AUTO_INCREMENT,
  `Calificacion_Comentario` INT(2) NOT NULL,
  `Alumno_Comentario` INT NOT NULL,
  `Curso_Comentario` INT NOT NULL,
  `Fecha_creacion_Comentario` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_Comentario`),
    FOREIGN KEY (`Alumno_Comentario`)
    REFERENCES `proyecto_bdm`.`alumno` (`ID_Alumno`),
    FOREIGN KEY (`Curso_Comentario`)
    REFERENCES `proyecto_bdm`.`curso` (`ID_Curso`));