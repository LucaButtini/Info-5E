select *
from db_amazon.prodotti p ;

select *
from db_amazon.prodotti p 
where p.famiglia like "1%";-- tutte le famiglie che iniziano per 1

select *
from db_amazon.prodotti p 
where p.marca = "varie"; 

-- visualizzo tutto anche in modo duplicato
select p.marca 
from db_amazon.prodotti p;

-- senza duplicati
select distinct p.marca 
from db_amazon.prodotti p;

-- visualizzo prezzo e iva
select p.prezzo, p.iva
from db_amazon.prodotti p ;

-- operatori numerici
-- quelli compresi in una fascia di prezzo
select p.prezzo
from db_amazon.prodotti p 
-- where p.prezzo >= 70 and p.prezzo <= 100;
-- esiste un operatore between che da lo stesso risultato
where (p.prezzo between 70 and 10) or (p.prezzo between 10 and 20);

select p.prezzo , p.iva, p.prezzo + p.prezzo * p.iva / 100 as lordo -- formula per trovare il prezzo lordo, ritorna il campo "lordo", che non aggiunge colonne, è solo di visualizzazione
from db_amazon.prodotti p;


select p.prezzo , p.iva, p.prezzo + p.prezzo * p.iva / 100 as lordo 
from db_amazon.prodotti p
where  p.prezzo + p.prezzo * p.iva / 100 > 100; -- devo usare la formula essendo una vista e non è collegata alla tabella