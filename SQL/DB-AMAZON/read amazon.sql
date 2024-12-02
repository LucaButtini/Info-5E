select * 
from db_amazon.prodotti p ;

select p.famiglia, p.marca
from db_amazon.prodotti p 
where p.famiglia <>"";

/*Cambia il valore nelle colonne vuote in null*/
update db_amazon.prodotti p
set p.famiglia = null 
where p.famiglia ="";

select p.famiglia, p.marca
from db_amazon.prodotti p 
where p.famiglia is null;

/*Ricerchiamo chi ha la stessa marca,
 * Questo database è case Insensitive
 * se volessi posso che sia case sensitive posso modificare dal dbvear
 * */
select p.descrizione, p.marca 
from db_amazon.prodotti p 
where p.marca="TICINO-ABB";


/*operatori di confronto fra le stringhe*/
/*
 * opearatore "like" confronta se una stringa assomiglia ad un'altra
 * */

/*marche che iniziano con la lettera t*/
select p.descrizione, p.marca
from db_amazon.prodotti p 
-- where p.descrizione like "q%";
-- where p.marca like "T%";
where p.descrizione like "q%" and p.marca  like "T%";

-- aggiornare il campo descrizione eliminando tutti gli spazi
update db_amazon.prodotti p
set p.descrizione = trim(p.descrizione); -- toglie gli spazi 


/*-- aggiorniamo il solo col nome dell'attributo
update db_amazon.prodotti
set descrizione = trim(descrizione);*/

-- visualizzo l'attributo che voglio della tabella senza duplicati
select distinct descrizione 
from db_amazon.prodotti;

drop database db_amazon;
