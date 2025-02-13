create database utopia;

use utopia;


create table sovrani (
                         numero int not null,
                         nome varchar(250) not null,
                         inizio_regno date not null,
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
