create database libreria;

use libreria;

create table libreria.libri(
ISBN int primary key auto_increment,
title varchar(50) not null,
autore varchar(50) not null,
genere varchar(30),
prezzo decimal(10,2),
anno_pubblicazione date
);

