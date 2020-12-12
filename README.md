# Reserva de Habitaciones
Desarrollo de una Pagina Web de Reservaciones 

------------

HERRAMIENTAS :
- Base de Datos: MySQL.
- Estilos: CSS3 y Bootstrap 4.
- Lenguaje : Lenguaje PHP.

## Arquitectura MVC
1. MODELO: representación de los datos que maneja el sistema, su lógica de negocio, y sus mecanismos de persistencia.
2. VISTA: Información que se envía al cliente y los mecanismos interacción con éste.
3. CONTROLADOR: intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y las transformaciones para adaptar los datos a las necesidades de cada uno.

## Imagenes
Vitas:
- 1
![1](https://user-images.githubusercontent.com/68178186/101994904-1f20c600-3c94-11eb-8d8e-cf65c412638b.PNG)
- 2
![2](https://user-images.githubusercontent.com/68178186/101994906-234ce380-3c94-11eb-9a36-43f24bc02d89.PNG)
- 3
![3](https://user-images.githubusercontent.com/68178186/101994907-25af3d80-3c94-11eb-9a14-5eb60e8c6df7.PNG)
- 4
![4](https://user-images.githubusercontent.com/68178186/101994911-28119780-3c94-11eb-92b3-76592e221d54.PNG)
- 5
![6](https://user-images.githubusercontent.com/68178186/101995056-301e0700-3c95-11eb-8358-6e5c87e64526.PNG)
- 5
![5](https://user-images.githubusercontent.com/68178186/101994914-2b0c8800-3c94-11eb-9a49-43c39722531d.PNG)


### SCRIPT DE LA BASE DE DATOS
```sql
CREATE DATABASE hotel DEFAULT CHARACTER SET utf8;
SET default_storage_engine = INNODB;

USE hotel;

#TABLE TIPO HABITACION
CREATE TABLE Tipohabitacion(
  idtipohabitacion tinyint auto_increment PRIMARY KEY,
  tipocama varchar(100) not null,
  categoria varchar(40) not null,
  imagenPrincipal blob not null,
  imagen1 blob not null,
  imagen2 blob not null,
  imagen3 blob not null
)ENGINE=InnoDB default charset=utf8mb4;


#TABLE HABITACION
CREATE TABLE Habitacion(
  numeroHabitacion tinyint auto_increment PRIMARY KEY,
  costodia double,
  area varchar(10),
  numPersonas tinyint,
  Tipohabitacion_idtipohabitacion tinyint not null#id tipo habitacion
)ENGINE=InnoDB default charset=utf8mb4;


#TABLE RESERVACION
CREATE TABLE reservacion(
  idreservacion tinyint auto_increment PRIMARY KEY,
  FechaEntrada date not null,
  FechaSalida date not null,
  Habitacion_numeroHabitacion tinyint not null, #id habitacion
  cliente_idclienteDNI int not null #id cliente
)ENGINE=InnoDB default charset=UTF8MB4;


#TABLE CLIENTE
CREATE TABLE cliente(
  idclienteDNI int PRIMARY KEY,
  nombre varchar(40) not null,
  apellido varchar(40) not null,
  celular char(9) not null,
  email varchar(100) not null,
  direccion varchar(100) not null,
  recado varchar(150) not null
)ENGINE=InnoDB default charset=UTF8MB4;
#----------------------------------------------------------------------
#LLAVES UNICAS
#----------------------------------------------------------------------
ALTER TABLE Tipohabitacion
ADD CONSTRAINT UK_idtipohabitacion UNIQUE KEY(idtipohabitacion);

ALTER TABLE Habitacion
ADD CONSTRAINT UK_numeroHabitacion UNIQUE KEY(numeroHabitacion);

ALTER TABLE reservacion
ADD CONSTRAINT UK_idreservacion UNIQUE KEY(idreservacion);

ALTER TABLE cliente
ADD CONSTRAINT UK_idclienteDNI UNIQUE KEY(idclienteDNI);



#----------------------------------------------------------------------
#LLAVES PRIMARIAS
#----------------------------------------------------------------------
ALTER TABLE Tipohabitacion
ADD CONSTRAINT PK_idtipohabitacion PRIMARY KEY(idtipohabitacion);

ALTER TABLE Habitacion
ADD CONSTRAINT PK_numeroHabitacion PRIMARY KEY(numeroHabitacion);

ALTER TABLE reservacion
ADD CONSTRAINT PK_idreservacion PRIMARY KEY(idreservacion);

ALTER TABLE cliente
ADD CONSTRAINT PK_idclienteDNI PRIMARY KEY(idclienteDNI);



#----------------------------------------------------------------------
#LLAVES FORANEAS
#----------------------------------------------------------------------
ALTER TABLE Habitacion #habitacion con tipo habitacion
ADD CONSTRAINT FK_Tipohabitacion_idtipohabitacion FOREIGN KEY (Tipohabitacion_idtipohabitacion)
REFERENCES `Tipohabitacion`(idtipohabitacion) 
ON DELETE CASCADE
ON UPDATE CASCADE;


ALTER TABLE reservacion #Reservacion con habitacion
ADD CONSTRAINT FK_Habitacion_numeroHabitacion FOREIGN KEY (Habitacion_numeroHabitacion)
REFERENCES `Habitacion`(numeroHabitacion)
ON DELETE CASCADE
ON UPDATE CASCADE;


ALTER TABLE reservacion #Reservacion con Cliente
ADD CONSTRAINT FK_cliente_idclienteDNI FOREIGN KEY (cliente_idclienteDNI) 
REFERENCES `cliente`(idclienteDNI) 
ON DELETE CASCADE
ON UPDATE CASCADE;

 

#----------------------------------------------------------------------
#SELECT
#----------------------------------------------------------------------
SELECT * FROM Tipohabitacion;
SELECT * FROM Habitacion;
SELECT * FROM reservacion;
SELECT * FROM cliente;



#----------------------------------------------------------------------
#INSERT
#----------------------------------------------------------------------
INSERT INTO Tipohabitacion(tipocama,categoria,imagenPrincipal,imagen1,imagen2,imagen3)
VALUES('Cama una Plaza y 1/2','Habitacion Personal','personal.jpg','personal1.jpg','personal2.jpg','personal3.jpg');
INSERT INTO Tipohabitacion(tipocama,categoria,imagenPrincipal,imagen1,imagen2,imagen3)
VALUES('Cama dos Plaza queen','Habitacion Matrimonial','matrimonial.jpg','matrimonial1.jpg','matrimonial2.jpg','matrimonial3.jpg');
INSERT INTO Tipohabitacion(tipocama,categoria,imagenPrincipal,imagen1,imagen2,imagen3)
VALUES('2 Cama de una dos plazas','Habitacion Familiar','familiar.jpg','familiar1.jpg','familiar2.jpg','familiar3.jpg');

INSERT INTO Habitacion(costodia,area,numPersonas,Tipohabitacion_idtipohabitacion)
VALUES('40.00','5 mt*2','1','1');
INSERT INTO Habitacion(costodia,area,numPersonas,Tipohabitacion_idtipohabitacion)
VALUES('75.00','10 mt*2','2','2');
INSERT INTO Habitacion(costodia,area,numPersonas,Tipohabitacion_idtipohabitacion)
VALUES('90.00','5 mt*2','4','3');

INSERT INTO cliente(idclienteDNI,nombre,apellido,celular,email,direccion,recado) 
            VALUES('123456','edu','nuñez','123456789','edu@gmail.com','collique 3 zn','habitar');
INSERT INTO reservacion(FechaEntrada,FechaSalida,Habitacion_numeroHabitacion,cliente_idclienteDNI) 
            VALUES('2020-10-09','2020-10-10','1','123456');
          
          
#----------------------------------------------------------------------
#INNER JOIN Habitacion Personal
#----------------------------------------------------------------------           
SELECT th.imagenPrincipal,th.categoria,th.tipocama,th.idtipohabitacion,
	   hb.numPersonas,hb.area
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '1';
                    
                    
#----------------------------------------------------------------------
#INNER JOIN Habitacion Matrimonial
#---------------------------------------------------------------------- 
SELECT th.imagenPrincipal,th.categoria,th.tipocama,th.idtipohabitacion,
	   hb.numPersonas,hb.area
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '2';
  
  
#----------------------------------------------------------------------
#INNER JOIN Habitacion amiliar
#---------------------------------------------------------------------- 
SELECT th.imagenPrincipal,th.categoria,th.tipocama,th.idtipohabitacion,
	   hb.numPersonas,hb.area
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '3';
              
              
#----------------------------------------------------------------------
#INNER JOIN VER HABITACION Y TIPO HABITACION
#---------------------------------------------------------------------- 			
SELECT th.imagenPrincipal,th.imagen1,th.imagen2,th.imagen3,th.categoria,
	   hb.numPersonas,hb.area,hb.costodia,hb.Tipohabitacion_idtipohabitacion
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '1';

#----------------------------------------------------------------------
#INNER JOIN VER CLIENTE Y RESERVACION
#----------------------------------------------------------------------                     
SELECT c.idclienteDNI,c.nombre,c.email,
       r.FechaEntrada,r.FechaSalida
       FROM cliente c
       INNER JOIN reservacion r
       on c.idclienteDNI = r.cliente_idclienteDNI
       WHERE c.idclienteDNI = '12346';

```
