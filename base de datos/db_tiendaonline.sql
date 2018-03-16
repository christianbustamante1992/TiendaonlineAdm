
create table Tipo_usuario(

	id int(2) auto_increment primary key,
    nombre varchar(100) not null

);

create table Tipo_producto(

	id int(2) auto_increment primary key,
    nombre varchar(100) not null

);


create table Marca_producto(

	id int(2) auto_increment primary key,
    nombre varchar(100) not null

);


create table Usuario(
    id int(10) auto_increment primary key,
    id_tipousuario int(2) not null,
    cedula varchar(10) unique not null,
    nombre varchar(200) not null,
    apellido varchar(200) not null,
    correo varchar(100) unique not null,
    telefono varchar(10) unique not null,
    fecha_nacimiento date,
    contrasena varchar(30) not null,
    foreign key (id_tipousuario) references Tipo_usuario (id)
     
);

create table Producto(

	id int(10) auto_increment primary key,
	id_tipoproducto int(2) not null,
	id_marcaproducto int(2) not null,
    nombre varchar(200) not null,
    stock int(5) not null,
    precio_a decimal(4,2) not null,
    precio_b decimal(4,2) not null,
    precio_c decimal(4,2) not null,
    foreign key (id_tipoproducto) references Tipo_producto(id),
    foreign key (id_marcaproducto) references Marca_producto(id)

);




