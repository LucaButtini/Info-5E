CREATE DATABASE utopia;

USE utopia;

CREATE TABLE sovrani (
                         numero INT,
                         nome VARCHAR(250),
                         inizio_regno DATE,
                         fine_regno DATE,
                         immagine VARCHAR(250),
                         predecessore_numero INT,
                         predecessore_nome VARCHAR(250),
                         successore_numero INT,
                         successore_nome VARCHAR(250),
                         PRIMARY KEY (numero, nome),
                         FOREIGN KEY (predecessore_numero, predecessore_nome)
                             REFERENCES sovrani (numero, nome) ON DELETE SET NULL,
                         FOREIGN KEY (successore_numero, successore_nome)
                             REFERENCES sovrani (numero, nome) ON DELETE SET NULL
);
