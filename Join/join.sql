create database db_join;

create table db_join.studenti(
codice_fiscale varchar(50),
nome varchar(50),
cognome varchar(50)
);

create table db_join.interrogazioni(
codice_fiscale varchar(50),
voto int
);

insert into db_join.studenti(codice_fiscale, nome, cognome) values
('MZZ', 'Alessandro', 'Mizzon'),
('BTT', 'Luca', 'Buttini');

insert into db_join.interrogazioni(codice_fiscale, voto) values
('MZZ', 9),
('MZZ', 6),
('MZZ', 5),
('BTT', 5),
('BTT', 8),
('BTT', 7);

select *
from db_join.studenti s inner join db_join.interrogazioni i 
on s.codice_fiscale = i.codice_fiscale;