CREATE DATABASE IF NOT EXISTS TACOSPIPEV1;
USE TACOSPIPEV1;

CREATE TABLE IF NOT EXISTS USUARIOS(

ID int NOT NULL AUTO_INCREMENT,
CORREO VARCHAR(255) NOT NULL UNIQUE ,
CONTRASENA VARCHAR(40) NOT NULL,
NOMBRE VARCHAR(100),
TELEFONO VARCHAR(12),
DIRECCION varchar(100),
ACTIVO BOOLEAN default TRUE,


PRIMARY KEY (ID)


);



SELECT * FROM USUARIOS;

create table productos(
id int auto_increment primary key,
nombre varchar(100),
descripcion text,
imagen varchar(255),
costo decimal(13,2),
activo tinyint default 1,
categoria varchar(50)
);
drop table productos;
select * from productos;
insert into productos (nombre,descripcion,imagen, costo, categoria) values ("tacotrompo","tacoooooooos", "../../resource/menu/menu2.jpg", 18.50, "Platillo");
insert into productos (nombre,descripcion,imagen, costo, categoria) values ("tacobistk","tacooooooooscarn", "../../resource/menu/menu3.jpg", 38.50, "Platillo");
