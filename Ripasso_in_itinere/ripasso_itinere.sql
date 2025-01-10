create database ripasso_5e;
use ripasso_5e;

CREATE TABLE ripasso_5e.produttori (
    codice_fiscale VARCHAR(20) PRIMARY KEY,
    nome VARCHAR(50),
    cognome VARCHAR(50),
    data_nascita DATE
);

CREATE TABLE ripasso_5e.access_points (
    id_point INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(50),
    modello VARCHAR(50),
    anno DATE,
    produttore VARCHAR(20),
    FOREIGN KEY (produttore) REFERENCES ripasso_5e.produttori(codice_fiscale)
);

-- Inserimento dati nella tabella produttori
INSERT INTO ripasso_5e.produttori (codice_fiscale, nome, cognome, data_nascita) VALUES
('CF11223344556677', 'Marco', 'Neri', '1982-01-25'),
('CF22334455667788', 'Anna', 'Gialli', '1995-03-12'),
('CF33445566778899', 'Francesco', 'Marrone', '1987-09-30'),
('CF44556677889900', 'Lucia', 'Azzurra', '1983-04-19'),
('CF55667788990011', 'Stefano', 'Blu', '1992-12-04');

-- Inserimento dati nella tabella access_points con riferimenti ai produttori
INSERT INTO ripasso_5e.access_points (marca, modello, anno, produttore) VALUES
('Cisco', 'Aironet 1800', '2020-02-10', 'CF11223344556677'),
('Cisco', 'Aironet 3800', '2022-11-05', 'CF11223344556677'),
('Netgear', 'WAX620', '2023-01-20', 'CF22334455667788'),
('Ubiquiti', 'UniFi 6 Long Range', '2021-08-30', 'CF33445566778899'),
('Ubiquiti', 'UniFi 6 Pro', '2023-02-12', 'CF33445566778899'),
('Netgear', 'WAX630', '2023-02-15', 'CF22334455667788'),
('Ubiquiti', 'UniFi 6 LR', '2022-07-17', 'CF33445566778899'),
('Cisco', 'Aironet 2800', '2021-05-01', 'CF11223344556677'),
('Ubiquiti', 'UniFi 6 Long Range', '2022-08-23', 'CF55667788990011'),
('Netgear', 'WAX630', '2023-02-15', 'CF22334455667788'),
('Ubiquiti', 'UniFi 6 Long Range', '2023-03-10', 'CF44556677889900'),
('Ubiquiti', 'UniFi 6 LR', '2021-07-30', 'CF22334455667788');


select *
from ripasso_5e.produttori p;

select *
from ripasso_5e.access_points ap;

select *
from ripasso_5e.access_points ap
where ap.produttore like "%0%";

update ripasso_5e.access_points
set anno = '2020-05-13' 
where id_point = 3;

select*
from ripasso_5e.access_points ap inner join ripasso_5e.produttori p
on p.codice_fiscale = ap.produttore;

select*
from ripasso_5e.access_points ap left join ripasso_5e.produttori p
on p.codice_fiscale = ap.produttore;

select*
from ripasso_5e.access_points ap right join ripasso_5e.produttori p
on p.codice_fiscale = ap.produttore;

select*
from ripasso_5e.access_points ap left join ripasso_5e.produttori p
on p.codice_fiscale = ap.produttore
union 
select*
from ripasso_5e.access_points ap right join ripasso_5e.produttori p
on p.codice_fiscale = ap.produttore;

-- Trova i produttori che hanno almeno 2 access points e la loro data di nascita è successiva al 1985
select p.nome, p.cognome, count(ap.id_point) as num_access_points
from ripasso_5e.access_points ap
join ripasso_5e.produttori p on p.codice_fiscale = ap.produttore
group by p.codice_fiscale
having count(ap.id_point) >= 2 and min(p.data_nascita) > '1985-01-01';

