CREATE DATABASE test,
use test;

CREATE TABLE trabajadores (
  id int auto_increment PRIMARY KEY NOT NULL,
  empresa varchar(100) DEFAULT NULL,
  dni varchar(100) DEFAULT NULL,
  apellidos_nombres varchar(100) DEFAULT NULL,
  cargo varchar(100) DEFAULT NULL,
  fecha_ingreso varchar(100) DEFAULT NULL,
  tienda varchar(100) DEFAULT NULL
) ENGINE=InnoDB;



SELECT  * FROM trabajadores;