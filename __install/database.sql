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

create table DETALLE_ASIENTOS (
	id_vuelo_disponible int,
	id_titular int,
	numero int,
	estado boolean,
    FOREIGN KEY(id_vuelo_disponible) REFERENCES VUELOS_DISPONIBLES(id),
    FOREIGN KEY(id_titular) REFERENCES CLIENTES(id)
);

create table CLIENTES (
	id int primary key not null auto_increment,
	email varchar(80),
	telefono varchar(40),
	domicilio varchar(120),
	titular varchar(70)
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
    FOREIGN KEY(folio_reserva) REFERENCES RESERVA(folio),

);


create table ADMINS (
	username varchar(30),
	password varchar(30)
);
