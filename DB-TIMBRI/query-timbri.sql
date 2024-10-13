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
select distinct t.codice_fiscale, t.nome, t.cognome, t.fascia_stipendio, t.data_assunzione, 
datediff(now(), t.data_assunzione) as giorni_servizio, 
datediff(now(), t.data_assunzione) / 365 as anni_decimali, 
datediff(now(), t.data_assunzione) div 365 as anni, 
datediff(now(), t.data_assunzione) mod 365 as giorni_restanti, 
datediff(now(), t.data_assunzione) mod 365 div 30 as mesi,
datediff(now(), t.data_assunzione) mod 365 mod 30 as giorni
from mydb.test t
order by datediff(now(), t.data_assunzione) desc;

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
select t.codice_fiscale, datediff(t.uscita, t.ingresso)  
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