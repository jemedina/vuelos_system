CREATE DATABASE VUELOS_DB;
use VUELOS_DB;

create table AEREOPUERTOS (
	id int primary key not null auto_increment,
	nombre varchar(80)
);

create table VUELOS_ESPECIFICOS (
	id int primary key not null auto_increment,
	origen int,
	destino int,
	escala int,
    FOREIGN KEY(origen) REFERENCES AEREOPUERTOS(id),
    FOREIGN KEY(destino) REFERENCES AEREOPUERTOS(id),
    FOREIGN KEY(escala) REFERENCES AEREOPUERTOS(id)
);

create table VUELOS_DISPONIBLES (
	id int primary key not null auto_increment,
	id_vuelo_especifico int,
	hora_salida time,
	hore_llegada time,
    FOREIGN KEY(id_vuelo_especifico) REFERENCES VUELOS_ESPECIFICOS(id)
);

create table CLIENTES (
	id int primary key not null auto_increment,
	email varchar(80),
	telefono varchar(40),
	domicilio varchar(120),
	titular varchar(70)
);

create table DETALLE_ASIENTOS (
	id_vuelo_disponible int,
	id_titular int,
	numero int,
	estado boolean,
    FOREIGN KEY(id_vuelo_disponible) REFERENCES VUELOS_DISPONIBLES(id),
    FOREIGN KEY(id_titular) REFERENCES CLIENTES(id)
);



create table RESERVA (
	folio int primary key not null auto_increment,
	id_vuelo_disponible int,
	nro_pasajeros int,
	tipo_vuelo varchar(40),
	costo int,
	costo_extra int,
	metodo_pago varchar(30),
	id_cliente int,
    FOREIGN KEY(id_cliente) REFERENCES CLIENTES(id),
    FOREIGN KEY(id_vuelo_disponible) REFERENCES VUELOS_DISPONIBLES(id)
);

create table OTROS_PASAJEROS (
	folio_reserva int,
	nombre varchar(80),
    FOREIGN KEY(folio_reserva) REFERENCES RESERVA(folio)
);


create table ADMINS (
	username varchar(30),
	password varchar(30)
);

INSERT INTO ADMINS (username,password) VALUES ('admin','admin');
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Aguascalientes");--1
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Guadalajara");--2
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Dubai");--3
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Madrid");--4
INSERT INTO AEREOPUERTOS (nombre) VALUES ("New York");--5
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Paris");--6
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Toronto");--7
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Las Vegas");--8
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Mexico DF");--9
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Sydney");--10
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Hong Kong");--11
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Venecia");--12
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Tokyo");--13
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Roma");--14
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Buenos Aires");--15
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Cairo");--16
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Cancun");--17
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Rio de Janeiro");--18
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Londres");--19
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Barcelona");--20
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Los Angeles CA");--21
INSERT INTO AEREOPUERTOS (nombre) VALUES ("San Francisco");--22
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Amsterdam");--23
INSERT INTO AEREOPUERTOS (nombre) VALUES ("Vaticano");--24


INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (1, 6, 9);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (4, 9, null);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (20, 23, null);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (7, 10, 21);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (24, 19, null);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (1, 17, 9);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (19, 18, 9);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (20, 22, 8);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (22, 13, null);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (13, 11, null);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (9, 10, null);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (5, 6, null);
INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES (9, 5, 21);

INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (1,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (2,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (3,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (4,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (5,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (6,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (7,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (8,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (9,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (10,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (11,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (12,sysdate(),sysdate());
INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada) VALUES (13,sysdate(),sysdate());