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
codigo_usuario int not null,
cantidad_compra int not null,
precio_compra float not null,
estado_compra boolean not null,
codigo_metodo_pago int not null,
primary key(codigo_compra),
foreign key(codigo_usuario) references usuarios(codigo_usuario),
foreign key(codigo_metodo_pago) references metodo_pago(codigo_metodo_pago));


create table detalle_compra(
codigo_factura int not null auto_increment,
codigo_compra int not null,
codigo_producto int not null,
/*numero_orden_pedido int not null,*/
monto_total float not null,
fecha_transaccion DATE not null,
primary key(codigo_factura),
foreign key(codigo_compra) references carro_compra(codigo_compra),
foreign key(codigo_producto) references productos(codigo_producto));

/*create table detalle_compra(
codigo_factura int not null auto_increment,
codigo_compra int not null,
codigo_usuario int not null,
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
foreign key(codigo_producto) references productos(codigo_producto));*/

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





/***********LO DE ABAJO SI QUIERES LO AGREGAS************/
select * from metodo_pago;

insert into metodo_pago(nombre_metodo_pago, descripcion_metodo_pago) values("Debito","Pago con tarjeta Nacional"),("Credito","Pago con tarjeta Internacional");

insert into perfiles values(1,"Administrador"),(2,"Cliente");

select detalle_compra.numero_orden_pedido from detalle_compra
inner join carro_compra on detalle_compra.codigo_compra = carro_compra.codigo_compra
inner join usuarios on carro_compra.codigo_usuario = usuarios.codigo_usuario 
inner join productos on detalle_compra.codigo_producto = productos.codigo_producto

select * from detalle_compra;


select * from detalle_eventos;
select * from detalle_compra;

select usuarios.nombre_usuario, productos.nombre_producto, carro_compra.cantidad_compra, carro_compra.precio_compra, detalle_compra.monto_total, detalle_compra.codigo_factura from detalle_compra
inner join carro_compra on detalle_compra.codigo_compra = carro_compra.codigo_compra
inner join usuarios on carro_compra.codigo_usuario = usuarios.codigo_usuario 
inner join productos on detalle_compra.codigo_producto = productos.codigo_producto


select * from detalle_eventos
select * from eventos

select detalle_eventos.codigo_detalle_eventos,eventos.nombre_evento, usuarios.nombre_usuario, detalle_eventos.fecha_inicio_evento, detalle_eventos.fecha_termino_evento
from detalle_eventos
inner join eventos on detalle_eventos.codigo_evento = eventos.codigo_evento
inner join usuarios on detalle_eventos.codigo_usuario = usuarios.codigo_usuario;


insert into metodo_pago(nombre_metodo_pago,descripcion_metodo_pago) values("Debito","Pago con tarjeta debito"),("credito","Pago contarjeta de credito");


select * from usuarios;
insert into perfiles values(1,"Administrador"),(2,"Cliente");

insert into Usuarios(`codigo_usuario`,`nombre_usuario`,`apellido_usuario`,`direccion_usuario`,`email_usuario`,`nick_usuario`,`clave_usuario`,`codigo_perfil`) 
values("1","Pedro","Gatica G","Santiago","admin@admin.com","admin","123",1);

insert into Usuarios(`codigo_usuario`,`nombre_usuario`,`apellido_usuario`,`direccion_usuario`,`email_usuario`,`nick_usuario`,`clave_usuario`,`codigo_perfil`) 
values("002","Darlyn","Soazo Lara","BIO BIO","dsoazolara@gmail.com","dsoazo","123",2);
SELECT COUNT(*) FROM productos;
select * from productos;



INSERT INTO productos
(`codigo_producto`,
`nombre_producto`,
`descripcion_producto`,
`precio_producto`,
`codigo_categoria`)
VALUES(1,'Zelda','The Legend of Zelda es una serie de videojuegos de acción-aventura creada por los diseñadores japoneses Shigeru Miyamoto y Takashi Tezuka, ​ y desarrollada por Nintendo, empresa que también se encarga de su distribución internacional.',15000,1);

select categorias.nombre_categoria, productos.codigo_producto,
productos.nombre_producto,
productos.descripcion_producto,
productos.precio_producto,
productos.codigo_categoria from productos 
inner join categorias on productos.codigo_categoria = categorias.codigo_categoria

insert into eventos(nombre_evento, descripcion_evento) values('Descuentos','Descuentos de productos'),('Promociones','Promociones de productos'),('Actualizaciones','Actualizacion de plataforma');

select * from detalle_eventos;

delete from detalle_eventos where codigo_detalle_eventos = 4



INSERT INTO categorias
(`nombre_categoria`,
`descripcion_categoria`)VALUES('asdasd','asdasdd');



select * from detalle_compra;
UPDATE `fungames`.`detalle_eventos`
SET
`codigo_detalle_eventos` = <{codigo_detalle_eventos: }>,
`codigo_evento` = <{codigo_evento: }>,
`codigo_usuario` = <{codigo_usuario: }>,
`fecha_inicio_evento` = <{fecha_inicio_evento: }>,
`fecha_termino_evento` = <{fecha_termino_evento: }>
WHERE `codigo_detalle_eventos` = <{expr}>;


select * from detalle_eventos;

UPDATE detalle_eventos SET codigo_evento=1, codigo_usuario=2,
             fecha_inicio_evento='25-11-2020', SET fecha_termino_evento='25-11-2020'
            WHERE codigo_detalle_eventos =2


select eventos.nombre_evento,eventos.descripcion_evento, detalle_eventos.fecha_inicio_evento, detalle_eventos.fecha_termino_evento, usuarios.codigo_usuario 
from detalle_eventos 
inner join eventos on detalle_eventos.codigo_evento = eventos.codigo_evento
inner join usuarios on detalle_eventos.codigo_usuario = usuarios.codigo_usuario
where usuarios.codigo_usuario = 3 order  by  eventos.nombre_evento desc


select count(*)
from detalle_eventos 
inner join eventos on detalle_eventos.codigo_evento = eventos.codigo_evento
inner join usuarios on detalle_eventos.codigo_usuario = usuarios.codigo_usuario
where codigo_detalle_eventos = 1

select * from usuarios where email_usuario = 'pgaticaguajardo@gmail.com';
select clave_usuario from usuarios where email_usuario = 'pgaticaguajardo@gmail.com';

select * from usuarios where email_usuario = 'pgaticaguajardo@gmail.com'



select * from usuarios where email_usuario = 'dsoazolara@gmail.com';
delete from usuarios where codigo_usuario = 2


select * from usuarios where email_usuario = 'admin@admin.com' and codigo_perfil = 2