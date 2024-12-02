use test;

create table test.studenti(
nome varchar(50),
cognome varchar(50),
matricola varchar(10) primary key,
data_iscrizione date default('2020-11-01'),
media int check(media between 1 and 10),
constraint c_nomecognome unique (nome, cognome)
);

insert into test.studenti (nome, cognome, matricola, data_iscrizione, media) values
('nome1', 'cognome1', '00001', '2021-04-28', 9),
('nome2', 'cognome2', '00002', '2021-04-28', 8),
('nome3', 'cognome3', '00003', '2021-11-13', 10),
('nome4', 'cognome4', '00004', '2023-12-18', 3),
('nome5', 'cognome5', '00005', '2021-04-02', 8),
('nome6', 'cognome6', '00006', '2022-06-29', 7);

select *
from test.studenti s;

select *
from test.studenti s
order by s.media desc
limit 1;

select s.data_iscrizione, count(s.matricola) as iscrizioni
from test.studenti s
group by s.data_iscrizione;

delete 
from test.studenti;

drop table test.studenti;
