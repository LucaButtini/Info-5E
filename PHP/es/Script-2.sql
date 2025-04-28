-- 0) Creazione del database
CREATE DATABASE IF NOT EXISTS db_registro;
USE db_registro;

-- 1) Credenziali
CREATE TABLE IF NOT EXISTS credenziali (
                                           username VARCHAR(200) PRIMARY KEY,
    password VARCHAR(200) NOT NULL
    );

-- 2) Persona (super‐tipo)
CREATE TABLE IF NOT EXISTS persona (
                                       id INT AUTO_INCREMENT PRIMARY KEY,
                                       username VARCHAR(200) UNIQUE NOT NULL,
    FOREIGN KEY (username) REFERENCES credenziali(username)
    );

-- 3) Sottotipi senza dipendenze extra
CREATE TABLE IF NOT EXISTS insegnanti (
                                          id INT PRIMARY KEY,
                                          FOREIGN KEY (id) REFERENCES persona(id)
    );
CREATE TABLE IF NOT EXISTS genitori (
                                        id INT PRIMARY KEY,
                                        FOREIGN KEY (id) REFERENCES persona(id)
    );
CREATE TABLE IF NOT EXISTS personale (
                                         id INT PRIMARY KEY,
                                         FOREIGN KEY (id) REFERENCES persona(id)
    );

-- 4) Materie
CREATE TABLE IF NOT EXISTS materie (
                                       id INT AUTO_INCREMENT PRIMARY KEY,
                                       nome VARCHAR(100) NOT NULL
    );

-- 5) Indirizzi di studio
CREATE TABLE IF NOT EXISTS indirizzi (
                                         id INT AUTO_INCREMENT PRIMARY KEY,
                                         nome VARCHAR(100) NOT NULL
    );

-- 6) Articolazioni
CREATE TABLE IF NOT EXISTS articolazioni (
                                             id INT AUTO_INCREMENT PRIMARY KEY,
                                             nome VARCHAR(100) NOT NULL,
    indirizzo_id INT NOT NULL,
    FOREIGN KEY (indirizzo_id) REFERENCES indirizzi(id)
    );

-- 7) Piano di studio
CREATE TABLE IF NOT EXISTS piano_studio (
                                            id INT AUTO_INCREMENT PRIMARY KEY,
                                            articolazione_id INT NOT NULL,
                                            FOREIGN KEY (articolazione_id) REFERENCES articolazioni(id)
    );

-- 8) Classi
CREATE TABLE IF NOT EXISTS classi (
                                      id INT AUTO_INCREMENT PRIMARY KEY,
                                      nome VARCHAR(100) NOT NULL,
    articolazione_id INT NOT NULL,
    FOREIGN KEY (articolazione_id) REFERENCES articolazioni(id)
    );

-- 9) Student (ora che esistono piano_studio e classi)
CREATE TABLE IF NOT EXISTS studenti (
                                        id INT PRIMARY KEY,
                                        piano_id INT UNIQUE NOT NULL,
                                        classe_id INT NOT NULL,
                                        FOREIGN KEY (id) REFERENCES persona(id),
    FOREIGN KEY (piano_id) REFERENCES piano_studio(id),
    FOREIGN KEY (classe_id) REFERENCES classi(id)
    );

-- 10) Associazione Materia ⇆ Piano di studio
CREATE TABLE IF NOT EXISTS piano_materia (
                                             materia_id INT,
                                             piano_id    INT,
                                             PRIMARY KEY(materia_id, piano_id),
    FOREIGN KEY (materia_id) REFERENCES materie(id),
    FOREIGN KEY (piano_id)    REFERENCES piano_studio(id)
    );

-- 11) Associazione Classe ⇆ Docente ⇆ Materia
CREATE TABLE IF NOT EXISTS classi_docenti_materia (
                                                      docente_id INT,
                                                      materia_id INT,
                                                      classe_id  INT,
                                                      PRIMARY KEY(docente_id, materia_id, classe_id),
    FOREIGN KEY (docente_id) REFERENCES insegnanti(id),
    FOREIGN KEY (materia_id) REFERENCES materie(id),
    FOREIGN KEY (classe_id)  REFERENCES classi(id)
    );

-- 12) Relazione Genitori ⇆ Studenti
CREATE TABLE IF NOT EXISTS genitori_studenti (
                                                 studente_id INT,
                                                 genitore_id INT,
                                                 PRIMARY KEY(studente_id, genitore_id),
    FOREIGN KEY (studente_id) REFERENCES studenti(id),
    FOREIGN KEY (genitore_id)  REFERENCES genitori(id)
    );

-- --------------------------------------------------
-- 1) Popolamento UTENTI DI DEFAULT
-- --------------------------------------------------
SET FOREIGN_KEY_CHECKS = 0;

-- 1.a) credenziali (password = "prova", hash bcrypt)
INSERT INTO credenziali(username,password) VALUES
                                               ('insegnante1','\$2b\$12\$tvBQj.XVWkmjA/IIlnQBzeVHZS5349.R3jg0TDznJ/qoBaU5Au5NS'),
                                               ('studente1',  '\$2b\$12\$tvBQj.XVWkmjA/IIlnQBzeVHZS5349.R3jg0TDznJ/qoBaU5Au5NS'),
                                               ('genitore1',  '\$2b\$12\$tvBQj.XVWkmjA/IIlnQBzeVHZS5349.R3jg0TDznJ/qoBaU5Au5NS'),
                                               ('personale1', '\$2b\$12\$tvBQj.XVWkmjA/IIlnQBzeVHZS5349.R3jg0TDznJ/qoBaU5Au5NS');

-- 1.b) persona
INSERT INTO persona(username)
SELECT username FROM credenziali
WHERE username IN('insegnante1','studente1','genitore1','personale1');

-- 1.c) sottotipi
INSERT INTO insegnanti(id)
SELECT id FROM persona WHERE username='insegnante1';
INSERT INTO genitori(id)
SELECT id FROM persona WHERE username='genitore1';
INSERT INTO personale(id)
SELECT id FROM persona WHERE username='personale1';
-- studente: assumiamo piano_id=1, classe_id=1
INSERT INTO studenti(id,piano_id,classe_id)
SELECT id,1,1 FROM persona WHERE username='studente1';

SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------
-- 2) Popolamento di esempio
-- --------------------------------------------------
INSERT INTO indirizzi(nome) VALUES
                                ('Liceo Scientifico'),
                                ('Liceo Classico'),
                                ('Istituto Tecnico'),
                                ('Istituto Professionale');

INSERT INTO articolazioni(nome,indirizzo_id) VALUES
                                                 ('Fisico-matematico',1),
                                                 ('Biologico',        1),
                                                 ('Scienze umane',     2),
                                                 ('Informatica',       3),
                                                 ('Meccanica',         4);

INSERT INTO piano_studio(articolazione_id) VALUES
                                               (1),(2),(3),(4),(5);

INSERT INTO materie(nome) VALUES
                              ('Matematica'),
                              ('Fisica'),
                              ('Chimica'),
                              ('Storia'),
                              ('Italiano'),
                              ('Informatica'),
                              ('Meccanica applicata');

INSERT INTO piano_materia(materia_id,piano_id) VALUES
                                                   (1,1),(2,1),(3,1),
                                                   (2,2),(3,2),
                                                   (4,3),(5,3),
                                                   (6,4),
                                                   (7,5);

INSERT INTO classi(nome,articolazione_id) VALUES
                                              ('1A',1),('1B',2),('2A',3),('3A',4),('4A',5);

INSERT INTO classi_docenti_materia(docente_id,materia_id,classe_id) VALUES
                                                                        ((SELECT id FROM persona WHERE username='insegnante1'),1,1),
                                                                        ((SELECT id FROM persona WHERE username='insegnante1'),2,1),
                                                                        ((SELECT id FROM persona WHERE username='insegnante1'),6,4);

INSERT INTO genitori_studenti(studente_id,genitore_id) VALUES
    ((SELECT id FROM persona WHERE username='studente1'),
     (SELECT id FROM persona WHERE username='genitore1'));

-- --------------------------------------------------
-- 3) Query di controllo
-- --------------------------------------------------
SELECT * FROM credenziali;
SELECT * FROM persona;
SELECT * FROM insegnanti;
SELECT * FROM studenti;
SELECT * FROM genitori;
SELECT * FROM personale;
SELECT * FROM materie;
SELECT * FROM indirizzi;
SELECT * FROM articolazioni;
SELECT * FROM piano_studio;
SELECT * FROM piano_materia;
SELECT * FROM classi;
SELECT * FROM classi_docenti_materia;
SELECT * FROM genitori_studenti;
