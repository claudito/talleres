
create database test;
use test;

create table ventas
(

id int auto_increment PRIMARY KEY,
campo varchar(100),
valor decimal(8,2)

);

INSERT INTO ventas (campo,valor) VALUES
('Juan Perez',1250.89),
('Maria Torres',3450.90),
('Luis Claudio',2560.89);