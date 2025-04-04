create database prod_elettronica;

use prod_elettronica;

create table prodotti(
                         codice int primary key,
                         descrizione varchar(200),
                         costo decimal(10,2),
                         quantita int ,
                         data_produzione date
);

create table amministratori(
                               email varchar(150) primary key,
                               password varchar(255)
);


insert into amministratori (username, email, password)

CREATE TABLE utenti (
                        username varchar(50) primary key,
                        email VARCHAR(150),
                        password VARCHAR(255)
);

select * from prodotti;

select * from utenti;

select * from amministratori;

delete from utenti;


INSERT INTO prodotti (codice, descrizione, costo, quantita, data_produzione) VALUES
                                                                                 (1, 'Smartphone Samsung Galaxy S23', 899.99, 15, '2024-02-10'),
                                                                                 (2, 'Laptop HP Pavilion 15', 749.50, 10, '2023-11-25'),
                                                                                 (3, 'Smart TV LG 55" OLED 4K', 1299.99, 8, '2024-01-05'),
                                                                                 (4, 'Auricolari Bluetooth Sony WF-1000XM4', 199.90, 20, '2023-09-15'),
                                                                                 (5, 'Mouse Wireless Logitech MX Master 3', 99.99, 25, '2023-10-30'),
                                                                                 (6, 'Tastiera Meccanica Corsair K70 RGB', 149.50, 12, '2023-12-12'),
                                                                                 (7, 'Monitor Gaming ASUS 27" 144Hz', 279.00, 10, '2023-08-20'),
                                                                                 (8, 'Console PlayStation 5', 549.99, 5, '2024-03-01'),
                                                                                 (9, 'Stampante Multifunzione Epson EcoTank', 299.90, 7, '2023-07-18'),
                                                                                 (10, 'SSD NVMe Samsung 1TB', 129.99, 30, '2023-06-22');
