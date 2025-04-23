CREATE DATABASE db_registro_v2;

USE db_registro_v2;

create table credenziali(
username varchar(200) primary key,
password varchar(200)
);


create table materie(
id int primary key auto_increment,
nome varchar(100)
);




create table insegnanti(
id int primary key auto_increment,
username varchar(200),
foreign key (username) references credenziali(username)
);

create table studenti(
id int primary key auto_increment,
username varchar(200),
foreign key (username) references credenziali(username)
);


create table genitori(
id int primary key auto_increment,
username varchar(200),
foreign key (username) references credenziali(username)
);

create table personale(
id int primary key auto_increment,
username varchar(200),
foreign key (username) references credenziali(username)
);


create table genitori_studenti(
	studente int,
	genitore int,
	primary key(studente, genitore),
	foreign key (studente) references studenti(id),
	foreign key (genitore) references genitori(id)
);


create table piano_materia(
	materia int,
	piano int,
	primary key(materia, piano),
	foreign key (materia) references studenti(id),
	foreign key (piano) references genitori(id)
);



create table indirizzi(
id int primary key auto_increment,
nome varchar(100)
);


create table articolazioni(
id int primary key auto_increment,
nome varchar(100),
indirizzo int,
foreign key (indirizzo) references indirizzi(id)
);


create table piano_studio(
id int primary key auto_increment,
articolazione int,
foreign key (articolazione) references articolazioni(id)
);

create table classi(
id int primary key auto_increment,
nome varchar(100),
articolazione int,
foreign key (articolazione) references articolazioni(id)
);



create table classi_docenti_materia(
id int primary key auto_increment,
docente int,
materia int, 
classe int,
foreign key (docente) references studenti(id),
foreign key (materia) references genitori(id),
foreign key (classe) references genitori(id)
);



select *
from insegnanti;

select *
from genitori;

select *
from personale;

select *
from studenti;