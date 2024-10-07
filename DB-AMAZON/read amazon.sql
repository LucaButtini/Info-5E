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
