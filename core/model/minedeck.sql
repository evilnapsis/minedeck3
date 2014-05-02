create table gender(
	id int not null auto_increment primary key,
	name varchar(100) not null
);

insert into gender (name) value ("Hombre");
insert into gender (name) value ("Mujer");


create table user (
	id int not null auto_increment primary key,
	name varchar(100) not null,
	lastname varchar(100) not null,
	mail varchar(100) not null,
	image varchar(200),
	password varchar(50) not null,
	is_admin boolean not null default 0,
	is_active boolean not null default 0,
	gender_id int,
	created_at datetime not null,
	foreign key (gender_id) references gender(id)
);


insert into user (name,lastname,mail,password,is_admin,is_active,created_at) value ("Agustin","Ramos","evilnapsis@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e",1,1,NOW());



create table category(
	id int not null auto_increment primary key,
	name varchar(100) not null
);

insert into category (name) value ("Construcciones");
insert into category (name) value ("Telefonia");
insert into category (name) value ("Alimentos");
insert into category (name) value ("Computacion");
insert into category (name) value ("Servicios Legales");
insert into category (name) value ("Medicina");
insert into category (name) value ("Transportes");
insert into category (name) value ("Hospedaje");
insert into category (name) value ("Servicios de Belleza");
insert into category (name) value ("Servicios de Eventos");

create table subcategory(
	id int not null auto_increment primary key,
	name varchar(100) not null,
	category_id int not null,
	foreign key (category_id) references category(id)
);

insert into subcategory (name,category_id) value ("Constructora",1);
insert into subcategory (name,category_id) value ("Venta de Materiales",1);
insert into subcategory (name,category_id) value ("Venta de Equipos",2);
insert into subcategory (name,category_id) value ("Reparacion de Equipos",2);
insert into subcategory (name,category_id) value ("Restaurant",3);
insert into subcategory (name,category_id) value ("Fonda",3);
insert into subcategory (name,category_id) value ("Hamburgesas",3);
insert into subcategory (name,category_id) value ("Carnes",3);
insert into subcategory (name,category_id) value ("Taquerias",3);
insert into subcategory (name,category_id) value ("Tortillerias",3);
insert into subcategory (name,category_id) value ("Pizzeria",3);

insert into subcategory (name,category_id) value ("Venta de Equipos",4);
insert into subcategory (name,category_id) value ("Reparacion de Equipos",4);
insert into subcategory (name,category_id) value ("Abogados",5);
insert into subcategory (name,category_id) value ("Contaduria",5);
insert into subcategory (name,category_id) value ("Notario",5);
insert into subcategory (name,category_id) value ("Farmacia",6);
insert into subcategory (name,category_id) value ("Dentista",6);
insert into subcategory (name,category_id) value ("Ortopedista",6);
insert into subcategory (name,category_id) value ("Medico Genral",6);
insert into subcategory (name,category_id) value ("Primeros Auxilios",6);
insert into subcategory (name,category_id) value ("Taller Mecanico",7);
insert into subcategory (name,category_id) value ("Servicio Electrico",7);
insert into subcategory (name,category_id) value ("Muelles y Mofles",7);
insert into subcategory (name,category_id) value ("Viajes",7);
insert into subcategory (name,category_id) value ("Renta de Autos",7);
insert into subcategory (name,category_id) value ("Venta de Refacciones",7);
insert into subcategory (name,category_id) value ("Hoteles",8);
insert into subcategory (name,category_id) value ("Departamentos",8);
insert into subcategory (name,category_id) value ("Autohoteles",8);
insert into subcategory (name,category_id) value ("Locales",8);

insert into subcategory (name,category_id) value ("Estilista",9);
insert into subcategory (name,category_id) value ("Peinados",9);
insert into subcategory (name,category_id) value ("Pedicure y Manicure",9);

insert into subcategory (name,category_id) value ("Banquetes",10);
insert into subcategory (name,category_id) value ("Cumplea&ntilde;os",10);
insert into subcategory (name,category_id) value ("Quincea&ntilde;os",10);
insert into subcategory (name,category_id) value ("Payasos",10);



create table country (
	id int not null auto_increment primary key,
	name varchar(100) not null
);

insert into country (name) value ("Mexico");
create table state(
	id int not null auto_increment primary key,
	name varchar(100) not null,
	country_id int not null,
	foreign key (country_id) references country(id)
);

insert into state (name,country_id) value ("Tabasco",1);
insert into state (name,country_id) value ("Veracruz",1);
insert into state (name,country_id) value ("Chiapas",1);
insert into state (name,country_id) value ("Quientana Roo",1);
insert into state (name,country_id) value ("Yucatan",1);
insert into state (name,country_id) value ("Campeche",1);
insert into state (name,country_id) value ("Mexico D.F.",1);



create table deck (
	id int not null auto_increment primary key,
	user_id int not null,
	image varchar(500),
	title varchar(200) not null,
	biografy varchar(5000) not null,
	skills varchar(500) not null,
	subcategory_id int not null,
	address varchar(100) not null,
	state_id int not null,
	latitud varchar(50),
	longitud varchar(50),
	phone varchar(15),
	mail varchar(150),
	website varchar(255),
	fburl varchar(255),
	twurl varchar(255),
	gpurl varchar(255),
	tumblr varchar(255),
	blogger varchar(255),
	youtube varchar(255),
	about varchar(1000),
	mision varchar(1000),
	vision varchar(1000),
	founded_at date,
	created_at datetime not null,
	is_public boolean not null default 1,
	is_verified boolean not null default 0,
	foreign key (user_id) references user(id),
	foreign key (subcategory_id) references subcategory(id),
	foreign key (state_id) references state(id)
);


create table deckview(
	id int not null auto_increment primary key,
	viewer_id int,
	deck_id int null,
	created_at int not null,
	realip varchar(16) not null,
	foreign key (viewer_id) references user(id),
	foreign key (deck_id) references deck(id)
);

create table notification(
	id int not null auto_increment primary key,
	content varchar(500) not null,
	user_id int not null,
	prospect_id int,
	is_read boolean not null default 0,
	created_at int not null,
	foreign key (user_id) references user(id),
	foreign key (prospect_id) references user(id)
);


create table deck_follower(
	id int not null auto_increment primary key,
	follower_id int not null,
	deck_id int not null,
	created_at int not null,
	foreign key (follower_id) references user(id),
	foreign key (deck_id) references deck(id)
);

create table notification_type(
	id int not null auto_increment primary key,
	name varchar(200) not null,
	icon varchar(200) not null
);

insert into notification_type (name,icon) value ("like","icon-heart");

create table notification(
	id int not null auto_increment primary key,
	title varchar(200),
	content varchar(500) not null,
	notification_type_id int not null,
	deck_id int not null,
	is_readed boolean not null default 0,
	created_at int not null,
	foreign key (notification_type_id) references notification_type(id),
	foreign key (deck_id) references deck(id)
);

create table product(
	id int not null auto_increment primary key,
	name varchar(200) not null,
	description varchar(5000) not null,
	image varchar(500),
	tags varchar(500) not null,
	area_id int not null,
	deck_id int not null,
	price float not null,
	created_at int ,
	is_public boolean not null default 1,
	foreign key (deck_id) references deck(id),
	foreign key (area_id) references area(id)
);


create table conversation(
	id int not null auto_increment primary key,
	user_id int not null,
	deck_id int not null,
	created_at datetime not null,
	foreign key (user_id) references user(id),
	foreign key (deck_id) references deck(id)
);

create table question(
	id int not null auto_increment primary key,
	conversation_id int not null,
	content varchar(500) not null,
	created_at datetime not null,
	foreign key (conversation_id) references conversation(id)
);

create table answer(
	id int not null auto_increment primary key,
	question_id int not null,
	deck_id int not null,
	content varchar(500) not null,
	created_at datetime not null,
	foreign key (question_id) references question(id),
	foreign key (deck_id) references deck(id)
);