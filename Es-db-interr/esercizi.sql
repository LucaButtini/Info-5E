create database es_prova;

select *
from es_prova.mock_data md ;

-- seleziono ip che siano /29 e che contengano un 34 nel loro indirizzo, gli riordino poi per nome e ip
select md.email, md.ip_address
from es_prova.mock_data md 
where md.ip_address like "%/29" or md.ip_address like "%34%"
group by md.email, md.ip_address;

--  ------------------------------------------------------------------------------------------------------------------------
select *
from es_prova.test t;

select distinct t.codice_fiscale, t.nome, t.cognome, t.data_assunzione 
from es_prova.test t;

SELECT t.codice_fiscale, COUNT(t.codice_fiscale) AS conta_codici
FROM es_prova.test t
group BY t.codice_fiscale;


select t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, t.ingresso, t.uscita, datediff(now(), t.data_assunzione) as giorni_in_servizio 
from es_prova.test t
order by datediff(now(), t.data_assunzione) asc;

select t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, t.ingresso, t.uscita, datediff(now(), t.data_assunzione) as giorni_in_servizio,
datediff(now(), t.data_assunzione) / 365 as anni_decimali,
datediff(now(), t.data_assunzione) div 365 as anni,
datediff(now(), t.data_assunzione) mod 355 as giorni_rimanenti,
datediff(now(), t.data_assunzione) mod 355 div 30 as mesi,
datediff(now(), t.data_assunzione) mod 355 mod 30 as giorni
from es_prova.test t
order by datediff(now(), t.data_assunzione) asc;

select  t.codice_fiscale, t.fascia_stipendio, date_format(t.ingresso, '%D %M %Y'), date_format(t.uscita, '%d %M %Y')  
from es_prova.test t ;


select t.codice_fiscale, unix_timestamp(t.uscita) - unix_timestamp(t.ingresso) as secondi,
(unix_timestamp(t.uscita) - unix_timestamp(t.ingresso)) div 3600 as ore,
(unix_timestamp(t.uscita) - unix_timestamp(t.ingresso)) div 3600 mod 60 as minuti,
((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso)) div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60) as guadagno_orario
from es_prova.test t;

select max(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_orario 
from es_prova.test t;

select min(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_orario 
from es_prova.test t;

select sum(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_orario 
from es_prova.test t;

select avg(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_orario 
from es_prova.test t;


select t.codice_fiscale, count(*),
sum(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))
div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_orario,
avg(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_medio
from mydb.test t
group by t.codice_fiscale
having avg(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso)) mod 3600 mod 60) * (12/60)) between 100 and 120;


