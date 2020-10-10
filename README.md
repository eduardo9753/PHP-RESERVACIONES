# DEMO WEB Pagina de Venta de Jeans
## Arquitectura MVC
- Controller : intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y redireccionando las vistas o interfaces al usuario.
- Modelo : contiene una representación de los datos que maneja el sistema, su lógica de negocio.
- Vista : interfaz de usuario, que compone la información que se envía al cliente y los mecanismos interacción con éste.
## Base de Datos
```sql
sql
CREATE DATABASE IF NOT EXISTS `LetsyRopa`
DEFAULT CHARACTER SET utf8;
use `LetsyRopa`;


SET default_storage_engine = INNODB;

CREATE TABLE `LetsyRopa`.`usuario`(
  `idusuario`  INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45),
  `fechaNacimiento` DATE,
  `nombreUser` VARCHAR(45) NOT NULL,
  `passUser` VARCHAR(45),
   PRIMARY KEY(`idusuario`),
   UNIQUE KEY (`idusuario`)
);
 

CREATE TABLE `LetsyRopa`.`recados`(
  `idrecados`  INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45),
  `celular` CHAR(9) NOT NULL,
  `recado` varchar(280),
   PRIMARY KEY(`idrecados`),
   UNIQUE KEY (`idrecados`)
);

#tabla marca
CREATE TABLE `LetsyRopa`.`brands`(
 `idbrans` INT UNSIGNED NOT NULL AUTO_INCREMENT,
 `name` VARCHAR(250) NOT NULL,
  PRIMARY KEY(`idbrans`),
  UNIQUE KEY (`idbrans`)
);


#tabla categorias
CREATE TABLE `LetsyRopa`.`categoria`(
  `idcategoria` INT UNSIGNED NOT NULL auto_increment,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY(`idcategoria`), 
  UNIQUE KEY (`idcategoria`)
);
 

#table product
CREATE TABLE `letsyropa`.`productos`(
 `id_producto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
 `nameproduct` VARCHAR(60) NOT NULL,
 `imagen` BLOB NOT NULL,
 `precio` DOUBLE NOT NULL ,
 `brands_idbrans` INT UNSIGNED NOT NULL,
 `categoria_idcategoria` INT UNSIGNED NOT NULL,
 `description` TEXT(600) NOT NULL,
  PRIMARY KEY (`id_producto`),
  #index de las llaves foraneas
  INDEX `IDX_idbrans` (`brands_idbrans` ASC),
  INDEX `IDX_idcategoria` (`categoria_idcategoria` ASC),
  
  CONSTRAINT `brands_idbrans` FOREIGN KEY (`brands_idbrans`) 
  REFERENCES `LetsyRopa`.`brands`(`idbrans`)ON DELETE RESTRICT ON UPDATE CASCADE ,
  
  CONSTRAINT `categoria_idcategoria` FOREIGN KEY (`categoria_idcategoria`)
  REFERENCES `LetsyRopa`.`categoria`(`idcategoria`)ON DELETE RESTRICT ON UPDATE CASCADE
);

#insert usuario
INSERT INTO `LetsyRopa`.`usuario`( `nombre`,`fechaNacimiento`,`nombreUser`,`passUser`) 
VALUES('Anthony','1997-05/03','Eduardo123','123');
INSERT INTO `LetsyRopa`.`usuario`( `nombre`,`fechaNacimiento`,`nombreUser`,`passUser`) 
VALUES('frank','1992-05/05','frank','123');

#insert categoria
INSERT INTO `letsyropa`.`categoria`(`name`) VALUES('jeans');
INSERT INTO `letsyropa`.`categoria`(`name`) VALUES('pantalon');
INSERT INTO `letsyropa`.`categoria`(`name`) VALUES('Unisex');


#insert marca
INSERT INTO `letsyropa`.`brands`(`name`) VALUES('Parada 101');
INSERT INTO `letsyropa`.`brands`(`name`) VALUES('Let`Styles');
INSERT INTO `letsyropa`.`brands`(`name`) VALUES('Jean`s90');


#INSERT PRODUCTO
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('jeans de invierno','pantalon1.jpg','35.99','1','1','pantalon Jeans de buena calidad');
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('jeans de invierno azul','pantalon2.jpg','30.89','1','1','Jeans calentador de invierno en oferta');
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('jeans de invierno femenino','pantalon3.jpg','40.99','1','1','Pantalon jeans con acabados modernos');
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('jeans de invierno masculino','pantalon4.jpg','43.59','1','1','Jenas de buena calidad en oferta');
 
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('Pantalon jeans temporada invierno','pantalon3.jpg','40.99','2','2','Pantalon Jenas termino');
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('Pantalon jeans en oferta','pantalon4.jpg','35.99','2','2','Pantalon Jenas estilo 2020');
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('Pantalon jeans Femenino','pantalon5.jpg','30.99','2','2','Pantalon Jenas con finos acabados');
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('Pantalon jeans temporada invierno/y otoño','pantalon6.jpg','37.99','2','2','Pantalon Jenas para otoño');
 
 INSERT INTO `letsyropa`.`productos`(`nameproduct`,`imagen`,`precio`,`brands_idbrans`,`categoria_idcategoria`,`description`)
 VALUES('Pantalon Unisex Invierno,Verano','pantalon3.jpg','30.99','3','3','Pantalon para inviernos');
 
```
## Imagenes
- 1
![jeans1](https://user-images.githubusercontent.com/68178186/91236658-29777e00-e6fe-11ea-811b-da884a4a410d.PNG)
- 2
![jeans2](https://user-images.githubusercontent.com/68178186/91236716-5a57b300-e6fe-11ea-90ee-7f2e1dda46cd.PNG)
- 3
![jeans3](https://user-images.githubusercontent.com/68178186/91236800-90953280-e6fe-11ea-8238-d9712e2a7622.PNG)

## Pagina de Referencia
- [Pagina de Referencia](https://practical-johnson-b72bbf.netlify.app/index.html "Pagina de Referencia")
