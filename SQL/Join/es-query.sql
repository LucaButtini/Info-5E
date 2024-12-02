create database query_es;

/*Date tre tabelle - DOCENTI,MATERIE,LEZIONI - eseguire la seguente interrogazione (unica query!) ipotizzanto gli schemi comprensivi di PK e FK.
- Congiunzione di MATERIE e DOCENTI su CodiceMat
- Congiunzione della precedente  (punto1) con LEZIONI  su CodiceDoc
- Raggruppamento della precedente (punto2) per materia e conteggio(*)
- Selezione dalla precedente (punto3) per conteggio > 3
- proiezione della precedente( punto 4) su CodiceMat, Nome Mat.
(*)numero di lezioni
Suggerimento: due delle tre tabelle hanno FK*/


-- creazione tabelle ed inserimento dati
create table query_es.docenti(
codiceDoc varchar(10) primary key ,
codiceMat varchar(10),
nome varchar(50),
foreign key (codiceMat) references query_es.materie(codiceMat)
);

create table query_es.materie(
codiceMat varchar(10) primary key,
nome_materia varchar(50)
);

create table query_es.lezioni(
id_lezione int primary key auto_increment,
codiceMat varchar(10),
codiceDoc varchar(10),
aula varchar(20),
foreign key (codiceMat) references query_es.materie(codiceMat),
foreign key (codiceDoc) references query_es.docenti(codiceDoc)
);


INSERT INTO query_es.materie (codiceMat, nome_materia) VALUES
('MAT01', 'Matematica'),
('SCI01', 'Scienze'),
('ENG01', 'Inglese');

select *
from query_es.materie m ;

INSERT INTO query_es.docenti (codiceDoc, codiceMat, nome) VALUES
('DOC01', 'MAT01', 'Mario Rossi'),
('DOC02', 'SCI01', 'Giulia Bianchi'),
('DOC03', 'ENG01', 'John Doe');

select *
from query_es.docenti d ;

INSERT INTO query_es.lezioni (codiceMat, codiceDoc, aula) VALUES
('MAT01', 'DOC01', 'Aula 1'),
('MAT01', 'DOC01', 'Aula 2'),
('MAT01', 'DOC01', 'Aula 3'),
('MAT01', 'DOC01', 'Aula 4'),
('SCI01', 'DOC02', 'Aula 5'),
('SCI01', 'DOC02', 'Aula 6'),
('ENG01', 'DOC03', 'Aula 7');


select *
from query_es.lezioni l ;


-- query richiesta
/*
 * 
 * */
select m.codiceMat, m.nome_materia, count(l.id_lezione)
from query_es.materie m inner join query_es.docenti d on m.codiceMat = d.codiceMat inner join query_es.lezioni l on d.codiceDoc = l.codiceDoc
group by m.codiceMat, m.nome_materia
having count(l.id_lezione) > 3;









