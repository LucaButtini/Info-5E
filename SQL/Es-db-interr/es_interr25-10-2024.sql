 create database es_db;
 
create table es_db.riviste(
titolo varchar(50),
editore varchar(50),
prezzo int,
data_pubblicazione datetime
);

insert into es_db.riviste (titolo, editore, prezzo,data_pubblicazione) values 
('rivista 1', 'editore 1', 10, '2016-07-15'),
('rivista 2', 'editore 3', 20, '2017-08-22'),
('rivista 3', 'editore 3', 30, '2018-06-24'),
('rivista 4', 'editore 4', 40, '2019-11-05'),
('rivista 5', 'editore 5', 50, '2020-12-17'),
('rivista 5', 'editore 5', 80, '2020-12-17'),
('rivista 5', 'editore 5', 90, '2020-12-17');


select *
from es_db.riviste r ;

select count(*)
from es_db.riviste r
group by r.editore ;

select r.data_pubblicazione , datediff(now(), r.data_pubblicazione) as tempo 
from es_db.riviste r;

select r.editore, count(*) as riviste_pubblicate 
from es_db.riviste r
group by r.editore 
having count(*) > 1;

delete from es_db.riviste;

-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


create table es_db.sedie(
tipologia varchar(50),
colore varchar(20),
n_inventario int not null,
data_fabbricazione datetime
);

insert into es_db.sedie(tipologia, colore,n_inventario, data_fabbricazione) values
('legno', 'marrone', 102, '2004-05-18'),
('plastica', 'giallo', 152, '2024-03-29'),
('braccioli', 'nero', 109, '2004-05-18'),
('legno', 'arancioni', 268, '2004-05-18'),
('legno', 'giallo', 185, '2024-03-29'),
('braccioli', 'verdi', 83, '2004-05-18');

select *
from es_db.sedie s ;

-- scrittura estesa
select *
from es_db.sedie s
where s.colore = 'marrone' or s.colore='giallo' or s.colore = 'verdi'; 

-- scrittura con IN
select *
from es_db.sedie s
where s.colore in ('marrone', 'giallo', 'verdi');

select *
from es_db.sedie s
where s.n_inventario between 100 and 170;

select s.tipologia, count(s.tipologia) as numero_tipologie
from es_db.sedie s
where s.tipologia in ('braccioli');

select s.tipologia, count(s.tipologia) as numero_tipologie
from es_db.sedie s 
group by s.tipologia;

select s.tipologia, count(s.tipologia) as numero_tipologie
from es_db.sedie s 
group by s.tipologia
having count(s.tipologia) > 2;

