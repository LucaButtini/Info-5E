-- visualizzazione tabella
select *
from fc.report r;

-- aggiornare quotazione null a valore null NON FUNZIONA
update fc.report 
set Quotazione = 1
where Quotazione = null;

-- eliminare tutti i calciatori che non hanno ruolo (eliminare delle tuple con una determinata condizione) 
delete from fc.report
where Ruolo= '';

-- visualizzare i ruoli distinct
select distinct r.Ruolo
from fc.report r;

-- visualizzo tutti i giocatori che terminano per 'a'
select *
from fc.report r
where r.Nome like '%a';

-- o come seconda lettere del nome
select *
from fc.report r
where r.Nome like '_o%';

-- quotazione compresa fra 10 e 15
select *
from fc.report r
where r.Quotazione between 10 and 15
order by r.Quotazione;

-- quotazione media per ruolo
select r.Ruolo, avg(r.Quotazione) as media_quotazione 
from fc.report r
group by r.Ruolo;

-- quotazioni maggiori di 6
select r.Ruolo, avg(r.Quotazione) as media_quotazione 
from fc.report r
group by r.Ruolo
having avg(r.Quotazione) > 6;

-- quotazioni squadre che iniziano per M 
select r.Squadra r.Ruolo, avg(r.Quotazione) as media_quotazione 
from fc.report r
where r.Squadra like "m%"
group by r.Ruolo
having avg(r.Quotazione) > 6;

-- visualizzo id ruolo e ruolo, otteniamo praticamente una tabella
select distinct r.Id_ruolo, r.Ruolo 
from fc.report r;

-- id squadra e squadra
select distinct r.Id_squadra , r.Squadra 
from fc.report r;

-- nome e quotazione
select distinct r.Nome , r.Quotazione 
from fc.report r;

-- facciamo il conteggio di nome e quotazione (deve risultare tutto 1)
select distinct r.Nome , r.Quotazione, count(*) 
from fc.report r
group by r.Nome , r.Quotazione
order by count(*) desc;

-- creare tabella calciatori
create table fc.calciatori(
id int primary key auto_increment,
nome varchar(50),
quotazione int
);

-- popolo tabella calciatori
insert into fc.calciatori(nome, quotazione)
select distinct r.Nome, r.Quotazione
from fc.report r;

-- visualizzo calciatori
select *
from fc.calciatori c;

-- creare tabella dei ruoli
create table fc.ruoli(
id int primary key, 
ruolo varchar(50)
);

-- popolo ruoli 
insert into fc.ruoli(id, ruolo)
select distinct r.Id_ruolo , r.Ruolo 
from fc.report r;

select *
from fc.ruoli r;