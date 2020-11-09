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

create table metodo_pago(
codigo_metodo_pago int not null auto_increment,
nombre_metodo_pago varchar(50) not null,
descripcion_metodo_pago varchar(50) not null,
primary key(codigo_metodo_pago));

create table Carro_compra(
codigo_compra int not null auto_increment,
cantidad_compra int not null,
codigo_producto int not null,
primary key(codigo_compra),
foreign key(codigo_producto) references productos(codigo_producto));

create table detalle_compra(
codigo_factura int not null auto_increment,
codigo_compra int not null,
codigo_metodo_pago int not null,
numero_orden_pedido int not null,
nombre_comercio varchar(100) not null,
monto_total float not null,
codigo_autorizacion int not null,
fecha_transaccion DATE not null,
tipo_cuota int not null,
monto_cuota float,
digito_tarjeta int not null,
descripcion varchar(200) not null,
primary key(codigo_factura),
foreign key(codigo_compra) references Carro_Compra(codigo_compra),
foreign key(codigo_metodo_pago) references metodo_pago(codigo_metodo_pago));

create table eventos(
codigo_evento int not null auto_increment,
nombre_evento varchar(100) not null,
descripcion_evento varchar(200) not null,
primary key(codigo_evento));

create table detalle_eventos(
codigo_detalle_eventos int not null auto_increment,
codigo_evento int not null,
codigo_usuario int not null,
fecha_inicio_evento date,
fecha_termino_evento date,
primary key(codigo_detalle_eventos));


insert into metodo_pago(nombre_metodo_pago,descripcion_metodo_pago) values("Debito","Pago con tarjeta debito"),("credito","Pago contarjeta de credito");



insert into perfiles values(1,"Administrador"),(2,"Cliente");

insert into Usuarios(`codigo_usuario`,`nombre_usuario`,`apellido_usuario`,`direccion_usuario`,`email_usuario`,`nick_usuario`,`clave_usuario`,`codigo_perfil`) 
values("001","Pedro","Gatica G","Santiago","pgaticaguajardo@gmail.com","admin","123",2);

insert into Usuarios(`codigo_usuario`,`nombre_usuario`,`apellido_usuario`,`direccion_usuario`,`email_usuario`,`nick_usuario`,`clave_usuario`,`codigo_perfil`) 
values("002","Darlyn","Soazo Lara","BIO BIO","dsoazolara@gmail.com","dsoazo","123",2);

