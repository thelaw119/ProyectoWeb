/*Autor: The Law*/

create database fungames;
use fungames;

create table Perfiles(
codigo_perfil int not null auto_increment,
nombre_perfil varchar(20) not null,
primary key(codigo_perfil));

create table Usuarios(
codigo_usuario int not null auto_increment,
nombre_usuario varchar(50) not null,
apellido_usuario varchar(50) not null,
direccion_usuario varchar(200) not null,
email_usuario varchar(200) not null,
nick_usuario varchar(20) not null,
clave_usuario varchar(20) not null,
codigo_perfil int not null,
primary key(codigo_usuario),
foreign key(codigo_perfil) references Perfiles(codigo_perfil));

create table categorias(
codigo_categoria int not null auto_increment,
nombre_categoria varchar(50) not null,
descripcion_categoria varchar(100) not null,
primary key(codigo_categoria));

create table productos(
codigo_producto int not null auto_increment,
nombre_producto varchar(100) not null,
descripcion_producto varchar(200) not null,
precio_producto int not null,
codigo_categoria int not null,
primary key(codigo_producto),
foreign key(codigo_categoria) references categorias (codigo_categoria));


insert into perfiles values(1,"Administrador"),(2,"Cliente");

insert into Usuarios(`codigo_usuario`,`nombre_usuario`,`apellido_usuario`,`direccion_usuario`,`email_usuario`,`nick_usuario`,`clave_usuario`,`codigo_perfil`) 
values("001","Pedro","Gatica G","Santiago","pgaticaguajardo@gmail.com","admin","123",2);

insert into Usuarios(`codigo_usuario`,`nombre_usuario`,`apellido_usuario`,`direccion_usuario`,`email_usuario`,`nick_usuario`,`clave_usuario`,`codigo_perfil`) 
values("002","Darlyn","Soazo Lara","BIO BIO","dsoazolara@gmail.com","dsoazo","123",2);

