use db_join;

create table db_join.libri(
titolo varchar(50),
autore varchar(50),
numero_pag int,
data_pubblicazione date
);

create table db_join.autori(
cognome varchar(50),
nome varchar(50),
nazione varchar(20),
data_nascita date
);

insert into db_join.libri(titolo, autore,numero_pag, data_pubblicazione) values 
('libro1', 'autore1', 10, '1954-04-18'),
('libro2', 'autore2', 10, '2014-11-05'),
('libro3', 'autore3', 10, '2001-04-22'),
('libro4', 'autore4', 10, '1993-04-19'),
('libro5', 'autore5', 10, '1894-01-01');

insert into db_join.autori(cognome, nome, nazione, data_nascita) values
('autore1', 'nome1', 'italiana', '1945-05-13'),
('autore2', 'nome2', 'marocchina', '1945-05-13'),
('berna', 'nome3', 'germanica', '1987-05-13'),
('autore1', 'nome4', 'italiana', '1945-05-13'),
('sova', 'nome5', 'italiana', '1945-05-13');

select *
from db_join.autori a;

select *
from db_join.libri l ;

-- inner join
select *
from db_join.libri l inner join db_join.autori a 
on l.autore = a.cognome;

-- left join
select *
from db_join.libri l left join db_join.autori a 
on l.autore = a.cognome;

-- right join
select *
from db_join.libri l right join db_join.autori a 
on l.autore = a.cognome;

-- full join 
select *
from db_join.libri l left join db_join.autori a 
on l.autore = a.cognome
union 
select *
from db_join.libri l right join db_join.autori a 
on l.autore = a.cognome;
