create database campionato;

use campionato;

create table campionato.case_automobilistiche(
nome_casa varchar(20) primary key, 
livrea varchar(20)
);


create table campionato.piloti(
numero int primary key, 
nome varchar(20), 
cognome varchar(20),
nazionalita varchar(20), 
punteggio int, 
nome_casa varchar(20), 
foreign key (nome_casa) references campionato.case_automobilistiche(nome_casa)
);

create table campionato.gare(
id_gara int primary key auto_increment,
luogo varchar(20),
data date,
giro_veloce decimal(10,2)
);


create table campionato.partecipare(

);



drop table campionato.case_automobilistiche;
drop table campionato.piloti;