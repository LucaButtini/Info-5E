create database utopia;

use utopia;


create table sovrani (
numero int,
nome varchar(250),
inizio_regno date,
fine_regno date,
immagine varchar(250),
predecessore_numero int,
predecessore_nome varchar(250),
successore_numero int,
successore_nome varchar(250),
primary key (numero, nome),
foreign key (predecessore_numero, predecessore_nome) references sovrani(numero, nome),
foreign key (successore_numero, successore_nome) references sovrani(numero, nome)
);