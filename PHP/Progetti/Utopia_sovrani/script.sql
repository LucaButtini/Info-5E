create database utopia;

use utopia;


CREATE TABLE sovrani (
                         nome VARCHAR(250) PRIMARY KEY,
                         inizio_regno DATE NOT NULL,
                         fine_regno DATE,
                         immagine VARCHAR(250) NOT NULL,
                         predecessore_nome VARCHAR(250) NULL,
                         successore_nome VARCHAR(250) NULL,
                         FOREIGN KEY (predecessore_nome) REFERENCES sovrani(nome) ON DELETE SET NULL,
                         FOREIGN KEY (successore_nome) REFERENCES sovrani(nome) ON DELETE SET NULL
);


select *
from sovrani s;

