CREATE DATABASE db_test;

use db_test;

CREATE TABLE empleados
(

id int auto_increment PRIMARY KEY,
codigo varchar(100),
nombres varchar(100),
apellidos varchar(100),
dni varchar(100),
fecha_ingreso date

)