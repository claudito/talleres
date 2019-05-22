CREATE DATABASE tallerphp;

USE tallerphp;

CREATE TABLE usuario(

id int auto_increment PRIMARY KEY,
nombres   varchar(100),
apellidos varchar(100),
dni       char(8),
direccion text,
fecha_nacimiento date,
fecha_creacion timestamp default current_timestamp

)ENGINE=INNODB;

-- INSERTAR 
INSERT INTO usuario(nombres,apellidos,dni,direccion,fecha_nacimiento)
VALUES
('LUIS','CLAUDIO','46794282','SAN JUAN DE LURIGANCHO','1990-07-15'),
('JOSE','PEREZ','12345678','ATE','1989-09-12'),
('JUAN','TORRES','00004444','SAN MIGUEL','1987-06-06');


-- CONSULTA

SELECT * FROM usuario;

SELECT * FROM usuario WHERE dni='46794282';




