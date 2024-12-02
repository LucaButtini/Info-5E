-- visualizzare il contenuto della tabella test
select *
from mydb.test t;

-- eseguire una proiezione sulla tabella test
select t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione 
from mydb.test t;

-- non fare ripetere le tuple che hanno lo stesso contenuto
-- tramite la clausola distinct
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione 
from mydb.test t;

-- verifica distinct
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, t.ingresso 
from mydb.test t;

-- calcolo del numero di giorni
-- si usa la funzione datediff(data1, data2) = data1 - data2 = giorni
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, datediff(now(), t.data_assunzione) 
from mydb.test t;

-- introduzione alias
-- clausola  as
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, datediff(now(), t.data_assunzione) as giorni_servizio 
from mydb.test t;

-- ordinamento su attributi
-- clausola order by (ricordare che mettiamo la formula non l'alias)
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, datediff(now(), t.data_assunzione) as giorni_servizio
from mydb.test t
order by datediff(now(), t.data_assunzione);

-- clausola order by con desc
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, datediff(now(), t.data_assunzione) as giorni_servizio
from mydb.test t
order by datediff(now(), t.data_assunzione) desc;

-- clausola order by con asc (quella di default praticamente)
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, datediff(now(), t.data_assunzione) as giorni_servizio
from mydb.test t
order by datediff(now(), t.data_assunzione) asc;

-- calcolo anni mesi giorni trascorsi dall'assunzione
SELECT DISTINCT 
    t.codice_fiscale,                -- Codice fiscale del dipendente
    t.nome,                          -- Nome del dipendente
    t.cognome,                       -- Cognome del dipendente
    t.fascia_stipendio,              -- Fascia di stipendio del dipendente
    t.data_assunzione,               -- Data di assunzione del dipendente
    -- Calcola i giorni totali di servizio dalla data di assunzione fino ad oggi
    DATEDIFF(NOW(), t.data_assunzione) AS giorni_servizio,
    -- Calcola gli anni di servizio come valore decimale (approssimativo)
    DATEDIFF(NOW(), t.data_assunzione) / 365 AS anni_decimali,
    -- Calcola gli anni interi di servizio (senza decimali)
    DATEDIFF(NOW(), t.data_assunzione) DIV 365 AS anni,
    -- Calcola i giorni restanti dopo aver sottratto gli anni completi
    DATEDIFF(NOW(), t.data_assunzione) MOD 365 AS giorni_restanti,
    -- Calcola i mesi completi nei giorni rimanenti, assumendo ogni mese ha circa 30 giorni
    DATEDIFF(NOW(), t.data_assunzione) MOD 365 DIV 30 AS mesi,
    -- Calcola i giorni rimanenti dopo aver sottratto sia gli anni sia i mesi completi
    DATEDIFF(NOW(), t.data_assunzione) MOD 365 MOD 30 AS giorni
FROM 
    mydb.test t  -- Nome della tabella contenente i dati dei dipendenti
-- Ordina i risultati in ordine decrescente di giorni di servizio, mostrando prima i dipendenti con più anni di servizio
ORDER BY 
    DATEDIFF(NOW(), t.data_assunzione) DESC;

-- cambiamo il formato della data 
-- date_format
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, date_format(t.data_assunzione, '%d %M %Y') 
from mydb.test t;

-- oppure con la D maiuscola per formato esteso
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, date_format(t.data_assunzione, '%D %M %Y')
from mydb.test t;


-- estrazione timbrature
select t.codice_fiscale, t.ingresso, t.uscita 
from mydb.test t;

-- mia opzione ore lavorative
-- help --> secondi lavorati                   
/*select t.codice_fiscale, datediff(t.uscita, t.ingresso)  
from mydb.test t;*/
-- second è l'unità di misura
select t.codice_fiscale, TIMESTAMPDIFF(second , t.ingresso, t.uscita) as secondi_lavorati
from mydb.test t;

-- orario di uscita e entrata associato al codice fiscale
select t.codice_fiscale, t.ingresso, t.uscita
from mydb.test t ;

-- versione fatta in classe
-- quanto tempo è trascorso fra ingresso e uscita 
-- datefiff() non va bene perchè restituisce i giorni
select t.codice_fiscale, t.ingresso, t.uscita,
datediff(t.uscita, t.ingresso) as tempo_lavortivo 
from mydb.test t ;

-- abbiamo bisogno dei secondi trascorsi con la funzione unix_timestamp()
-- calcolo dei secondi trascorsi e guadagno maggiore
select t.codice_fiscale ,
unix_timestamp(t.uscita) - unix_timestamp(t.ingresso) as secondi_totali,
(unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600 as ore_totali,
(unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60 as minuti_totali,
((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60) as guadagno_orario
from mydb.test t
order by ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60) desc;


-- visualizzo solo n tuple, con la clausola LIMIT
select t.codice_fiscale ,
unix_timestamp(t.uscita) - unix_timestamp(t.ingresso) as secondi_totali,
(unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600 as ore_totali,
(unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60 as mintui_totali,
((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60) as guadagno_orario
from mydb.test t
order by ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60) desc
limit 10;


-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-- funzioni di aggregazione 
select *
from mydb.personale p ;
-- aggregano una certa quantità di dati 
-- non possiamo mettere campi non appropriati alle funzioni di aggregazioni
-- funzione count() conta le tuple
select count(*)
from mydb.personale p ;

-- funzione max() estrae la tupla che ha il valore massimo di un espressione o attributo
select
max(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_orario 
from mydb.test t;

-- min()
select
min(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as guadagno_orario 
from mydb.test t;

-- sum() somma tutte le tuple 
select count(*),
sum(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as spesa_totale 
from mydb.test t;


-- avg() calcola la media
select
avg(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))div 3600) * 12 + ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 mod 60) * (12/60)) as pagati_a_turno 
from mydb.test t;

-- dividiamo per persona guadagno totale con il codice fiscale, mettendo gli attributi del valore presente nel gropu by e le funzioni di aggregazione
-- quando si usa la group by, si usa la clausola having, non è ammesso il where con una funzione di aggregazione
select t.codice_fiscale, count(*),
sum(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))
div 3600) * 12 
+ ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 
mod 60) * (12/60)) as guadagno_orario,
avg(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))
div 3600) * 12 
+ ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 
mod 60) * (12/60)) as guadagno_medio
from mydb.test t
group by t.codice_fiscale
having avg(((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))
div 3600) * 12 
+ ((unix_timestamp(t.uscita) - unix_timestamp(t.ingresso))mod 3600 
mod 60) * (12/60)) between 100 and 120;

-- timbrature per persona
select t.codice_fiscale, count(*)
from mydb.test t 
group by t.codice_fiscale;



-- -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-- copiare le tuple del comando select su una nuova tabella
-- ci serve intanto la tabella che contenga i campi con gli stessi attributi
create table mydb.personale(
codiceFiscale varchar(16),
nome varchar(50),
cognome varchar(50),
fascia_stipendio int,
data_assunzione datetime
);
insert into mydb.personale
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione 
from mydb.test t; 

delete from mydb.personale ;

drop table mydb.personale;

