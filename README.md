# DEMO WEB Pagina Hotelera de Reservaciones
## Arquitectura MVC
- Controller : intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y redireccionando las vistas o interfaces al usuario.
- Modelo : contiene una representación de los datos que maneja el sistema, su lógica de negocio.
- Vista : interfaz de usuario, que compone la información que se envía al cliente y los mecanismos interacción con éste.
## Base de Datos
```sql
create database hotel DEFAULT CHARACTER SET utf8;
SET default_storage_engine = INNODB;

use hotel;

#TABLE TIPOHABITACION
create table Tipohabitacion(
 idtipohabitacion tinyint auto_increment not null,
 tipocama varchar(100) not null,
 categoria varchar(40) not null,
 imagenPrincipal blob not null,
 imagen1 blob not null,
 imagen2 blob not null,
 imagen3 blob not null,
 
 unique key `idtipohabitacion`(idtipohabitacion),
 primary key (idtipohabitacion)
)ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;


#TABLE HABITACION
create table Habitacion(
numeroHabitacion tinyint auto_increment not null,
costodia double,
area varchar(10),
numPersonas tinyint,
#foreing key
Tipohabitacion_idtipohabitacion tinyint not null,
FOREIGN KEY (Tipohabitacion_idtipohabitacion) REFERENCES `Tipohabitacion`(idtipohabitacion) ON DELETE NO ACTION ON UPDATE NO ACTION,

unique key `numeroHabitacion`(numeroHabitacion),
primary key (numeroHabitacion)
)ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;


#TABLE RESERVACION
create table reservacion(
 idreservacion tinyint auto_increment not null,
 FechaEntrada date not null,
 FechaSalida date not null,
 
 #foreing key
 Habitacion_numeroHabitacion tinyint not null,
 FOREIGN KEY (Habitacion_numeroHabitacion) REFERENCES `Habitacion`(numeroHabitacion) ON DELETE NO ACTION ON UPDATE NO ACTION,
 
 #foreing key
 cliente_idclienteDNI int not null,
 FOREIGN KEY (cliente_idclienteDNI) REFERENCES `cliente`(idclienteDNI) ON DELETE NO ACTION ON UPDATE NO ACTION,

 unique key `idreservacion`(idreservacion),
 primary key (idreservacion)
)ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;


#TABLE CLIENTE
create table cliente(
idclienteDNI int not null,
nombre varchar(40) not null,
apellido varchar(40) not null,
celular char(9) not null,
email varchar(100) not null,
direccion varchar(100) not null,
recado varchar(150) not null,

unique key `idclienteDNI`(idclienteDNI),
 primary key (idclienteDNI)
)ENGINE=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;


#SELECT
SELECT * FROM Tipohabitacion;
SELECT * FROM Habitacion;
SELECT * FROM reservacion;
SELECT * FROM cliente;

#INSERT
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
            
            
#INNER JOIN
#Habitacion Personal
SELECT th.imagenPrincipal,th.categoria,th.tipocama,th.idtipohabitacion,
	   hb.numPersonas,hb.area
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '1';
				
#Habitacion Matrimonial
SELECT th.imagenPrincipal,th.categoria,th.tipocama,th.idtipohabitacion,
	   hb.numPersonas,hb.area
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '2';
                    
#Habitacion Familiar
SELECT th.imagenPrincipal,th.categoria,th.tipocama,th.idtipohabitacion,
	   hb.numPersonas,hb.area
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '3';
                    
                    
#VER HABITACION Y TIPO HABITACION
SELECT th.imagenPrincipal,th.imagen1,th.imagen2,th.imagen3,th.categoria,
	   hb.numPersonas,hb.area,hb.costodia,hb.Tipohabitacion_idtipohabitacion
                    FROM Habitacion hb
                    INNER JOIN Tipohabitacion th
                    on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                    WHERE th.idtipohabitacion = '1';
                    
#FER CLIENTE Y RESERVACION
SELECT c.idclienteDNI,c.nombre,c.email,
       r.FechaEntrada,r.FechaSalida
       FROM cliente c
       INNER JOIN reservacion r
       on c.idclienteDNI = r.cliente_idclienteDNI
       WHERE c.idclienteDNI = '12346';
```
## Imagenes
- Incio
![HOMEHOTEL](https://user-images.githubusercontent.com/68178186/95648724-362e1680-0a9f-11eb-841a-a939c5ca24ae.PNG)
- Habitaciones
![HABITACION](https://user-images.githubusercontent.com/68178186/95648729-39c19d80-0a9f-11eb-8821-0d63bfd9d351.PNG)
- Habitacion
![cuarto](https://user-images.githubusercontent.com/68178186/95648733-3b8b6100-0a9f-11eb-8a8a-23af9b3e39c8.PNG)
- Registrar Reserva
![registros](https://user-images.githubusercontent.com/68178186/95648734-3dedbb00-0a9f-11eb-8b84-c12359227d2c.PNG)


## Pagina de Referencia
- [Pagina de Referencia](https://practical-johnson-b72bbf.netlify.app/index.html "Pagina de Referencia")
