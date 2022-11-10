CREATE TABLE persona (
pk_persona SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR (50) NOT NULL,
apellidop VARCHAR (50) NOT NULL,
apellidom VARCHAR (50) NOT NULL,
telefono VARCHAR (25)  NULL,
direccion VARCHAR (100)  NULL,
correo VARCHAR (80) NOT NULL,
cuenta_num VARCHAR (30)  NULL,
tipo VARCHAR(15) NOT NULL
);
CREATE TABLE cliente (
pk_cliente SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
numero_cliente VARCHAR (50)  NULL,

pk_persona SMALLINT NOT NULL,
FOREIGN KEY (pk_persona) REFERENCES persona(pk_persona)
);
CREATE TABLE vendedor(
pk_vendedor SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
numero_vendedor VARCHAR (50) NULL,
pk_persona SMALLINT NOT NULL,
FOREIGN KEY (pk_persona) REFERENCES persona (pk_persona)
);
CREATE TABLE login(
pk_login SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
usuario VARCHAR (100) NOT NULL,
contraseña VARCHAR (100) NOT NULL,
pk_persona SMALLINT NOT NULL,
FOREIGN KEY (pk_persona) REFERENCES persona (pk_persona)
);
CREATE TABLE ventas (
pk_venta SMALLINT NOT NULL PRIMARY KEU AUTO_INCREMENT,
fecha Date NOT NULL,
descripcion varchar (100) NULL,


pk_cliente int not null,
pk_vendedor int not null,

FOREIGN KEY (pk_cliente) REFERENCES cliente (pk_cliente),
FOREIGN KEY (pk_vendedor) REFERENCES vendedor (pk_vendedor)

);
CREATE TABLE productos(
pk_productos SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nombre varchar (50) not null,
precio int not null,
descripcion varchar (50) not null,
stock int not null
pk_vendedor int not null,
FOREIGN KEY (pk_vendedor) REFERENCES vendedor (pk_vendedor)
);

CREATE table venta_producto(
pk_ventaproducto SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
pk_venta int not null,
pk_producto int not null,

FOREIGN KEY (pk_producto) REFERENCES productos (pk_productos),
FOREIGN KEY (pk_venta) REFERENCES ventas (pk_venta)
);
