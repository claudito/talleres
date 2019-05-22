create database dompdf_db;

use dompdf_db;


CREATE TABLE ventas
(

id int auto_increment primary key,
mes varchar(20),
valor decimal(15,6)

)ENGINE=INNODB;

INSERT INTO ventas(mes,valor)VALUES
('ENERO',2000),
('FEBRERO',1000),
('MARZO',5000),
('ABRIL',4000),
('MAYO',2000),
('JUNIO',6010),
('JULIO',2570),
('AGOSTO',1500),
('SEPTIEMBRE',7800),
('OCTUBRE',1800),
('NOVIEMBRE',3700),
('DICIEMBRE',4700);

---

SELECT  
id,
mes,
valor
FROM dompdf_db.ventas


SELECT 

id,
vendedor,
mes,
valor
FROM db_ventas.vendedores


SELECT 

t1.id,
t1.vendedor,
t1.mes,
t1.valor,
t2.valor total,

(t1.valor*100)/(t2.valor) porcentaje



FROM db_ventas.vendedores t1

INNER JOIN 
(

SELECT  
id,
mes,
valor
FROM dompdf_db.ventas


) t2 ON t1.mes=t2.mes
