use uniro;

select *
from uniro.report r ;

create table uniro.studenti(
matricola_studente int primary key,
nome varchar(50),
cognome varchar(50),
data_nascita date
);

create table uniro.insegnamenti(
codice_insegnamento int primary key, 
nome_insegnamento varchar(50),
crediti int
);

create table uniro.esami(
matricola_studente int,
codice_insegnamento int,
id_esame int primary key auto_increment,
data_esame datetime,
voto int,
lode boolean,
foreign key (matricola_studente) references uniro.studenti(matricola_studente),
foreign key (codice_insegnamento) references uniro.insegnamenti(codice_insegnamento)
);


insert into uniro.studenti(matricola_studente, nome, cognome, data_nascita)
select distinct r.matricola_studente , r.nome , r.cognome , r.datadinascita 
from uniro.report r;

select *
from uniro.studenti;

insert into uniro.insegnamenti (codice_insegnamento, nome_insegnamento, crediti)
select distinct r.codice_insegnamento, r.codice_insegnamento , r.crediti
from uniro.report r;

select *
from uniro.insegnamenti i;

insert into uniro.esami(matricola_studente, codice_insegnamento, data_esame, voto, lode)
select distinct r.matricola_studente, r.codice_insegnamento, r.data, r.voto, r.lode
from uniro.report r;

select *
from uniro.esami e;
