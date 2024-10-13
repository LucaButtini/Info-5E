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
-- 
-- Seleziona solo righe uniche (elimina i duplicati)
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

-- oppure con la D maiuscola per formato simile
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, date_format(t.data_assunzione, '%D %M %Y') 
from mydb.test t;


-- estrazione timbrature
select t.codice_fiscale, t.ingresso, t.uscita 
from mydb.test t;

-- calcolare le ore di lavoro
-- DA RISOLVERE         
-- help --> secondi lavorati                   
/*select t.codice_fiscale, datediff(t.uscita, t.ingresso)  
from mydb.test t;*/
-- second è l'unità di misura
select t.codice_fiscale, TIMESTAMPDIFF(second , t.ingresso, t.uscita) as secondi_lavorati
from mydb.test t;

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
