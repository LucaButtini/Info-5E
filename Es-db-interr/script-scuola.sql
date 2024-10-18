create database scuola;

create table scuola.smartboards(
marca varchar(20),
numero_serie int,
size int,
data_creazione date
);

insert into scuola.smartboards (marca, numero_serie, size, data_creazione) values 
('marca 1', 1, 90, '2024/2/21'),
('marca 2', 2, 85, '2024/12/16'),
('marca 1', 3, 70, '2014/2/25'),
('marca 2', 4, 95, '2023/2/23'),
('marca 4', 5, 90, '2024/2/10'),
('marca 4', 5, 90, '2024/2/10')

select *
from scuola.smartboards s ;

select *
from scuola.smartboards s 
where s.size > 85;

select s.marca, datediff(now(), s.data_creazione) as eta
from scuola.smartboards s;

-- raggruppo per marca le smarboard con size maggiore di 85
select s.marca, count(*) as numero_smarboard
from scuola.smartboards s
where s.size >85
group by s.marca ;




-- per cancellare dati da una tabella 
delete from scuola.smartboards;




-- ------------------------------------------------------------------------------------------------------------------


select *
from scuola.mock_data md ;

select md.first_name ,md.last_name , md.ip_address, count(*)
from scuola.mock_data md 
where md.ip_address like '%/24' or md.ip_address like '%/16'
group by md.first_name, md.last_name;

-- non funziona questa query??????
select md.first_name, md.last_name, md.ip_address, count(*)
from scuola.mock_data md 
where md.ip_address like "%/27"
group by md.first_name, md.last_name ;

drop database scuola;


