create table db_amazon.vendite(
prezzo int,
data datetime
);

-- tutte i dati che hanno una specifica data come esempio
select *
from db_amazon.vendite v
where v.data like '2023-07-28 00:00:00'; 

-- mostra i dati che hanno prezzi compresi fra 5000 e 7000
select *
from db_amazon.vendite v 
where v.prezzo > 5000 and v.prezzo < 7000;

-- mostra dati compresi fra due date
select *
from db_amazon.vendite v
where v.data between '2023-05-07 18:05:00' and '2023-09-31 23:59:59';

-- mostro tutte le date senza duplicato
select distinct v.data 
from db_amazon.vendite v ;

-- mostro tutti i prezzi senza duplicati
select distinct v.prezzo
from db_amazon.vendite v ;

-- mostro tutte le date con duplicati
select v.data 
from db_amazon.vendite v ;

-- mostro tutti i prezzi con duplicati
select v.prezzo
from db_amazon.vendite v ;

