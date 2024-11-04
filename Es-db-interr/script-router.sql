create database dbnet;

create table dbnet.router(
marca varchar(50),
num_interfaccie int,
data_firmware datetime,
wireless boolean
);

insert into dbnet.router (marca,num_interfaccie,data_firmware,wireless) values
('cisco', 10, '2023-05-16', true),
('marca2', 20, '2024-11-04', true),
('cisco', 30, '2014-02-09', false),
('marca4', 40, '2023-08-25', false);


select *
from dbnet.router r;

-- cambia tipo attributo
alter table dbnet.router
modify column vecchiotipo nuovotipo;

-- cambia nome di un attributo
alter table dbnet.router 
change column nomevecchio nomenuovo tipo

-- data da ultimo aggiornamento del firmware
select r.marca, datediff(now(),data_firmware) as giorni_da_ultimo_aggiornamento 
from dbnet.router r;

-- router che hanno interfaccia wireless
select *
from dbnet.router r
where r.wireless is true;


update dbnet.router 
set num_interfaccie = 16
where wireless = 1 and marca = 'cisco';

delete from dbnet.router;
drop table dbnet.router;


