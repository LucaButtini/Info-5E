CREATE DATABASE db_registro;

USE db_registro;

create table insegnanti(
id int primary key auto_increment,
username varchar(200),
password varchar(200)
);

create table studenti(
id int primary key auto_increment,
username varchar(200),
password varchar(200)
);


create table genitori(
id int primary key auto_increment,
username varchar(200),
password varchar(200)
);

create table personale(
id int primary key auto_increment,
username varchar(200),
password varchar(200)
);


