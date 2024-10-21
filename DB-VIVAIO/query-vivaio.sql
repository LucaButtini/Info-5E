select *
from vivaio.report r;

-- quali sono le piante nel vivaio
select distinct r.id, count(*)
from vivaio.report r;

-- chi sono i fornitori in totale
select distinct r.fornitore_id, r.nome, r.cognome
from vivaio.report r;

-- quante piante sono fornite da ogni fornitore
select r.fornitore_id, count(*)
from vivaio.report r
group by r.fornitore_id;

-- se la stessa pianta è fornita più fornitori
select r.id, count(*)
from vivaio.report r
group by r.id
order by count(*) desc;

-- creare tabella piante e fornitori
-- piante 
create table vivaio.piante(
id int,
 nome_latino varchar(100),
 nome_comune varchar(100),
 esotica boolean
);

-- inserisco dati della piante nella tabella piante
insert into vivaio.piante
select distinct r.id, r.nome_latino, r.nome_comune, r.esotica
from vivaio.report r;

-- visualizzo tabella piante
select *
from vivaio.piante p;

-- fornitori
create table vivaio.fornitori(
fornitore_id int,
 partita_iva VARCHAR(11),
 codice_fiscale VARCHAR(16),
 nome VARCHAR(50),
 cognome VARCHAR(50),
 indirizzo VARCHAR(100),
 cap VARCHAR(5),
 comune VARCHAR(50),
 provincia VARCHAR(2)
);

-- inserimento dei fornitori nella tabella fornitori
insert into vivaio.fornitori 
select distinct r.fornitore_id, r.partita_iva, r.codice_fiscale, r.nome, r.cognome, r.indirizzo,r.cap, r.comune, r.provincia
from vivaio.report r;

-- visualizzo tabella fornitori
select	*
from vivaio.fornitori f;

