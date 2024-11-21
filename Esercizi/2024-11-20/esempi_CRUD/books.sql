-- CREATE USER "user"@"localhost" IDENTIFIED BY "password";
-- CREATE DATABASE IF NOT EXISTS exam;
-- GRANT ALL PRIVILEGES ON exam.* TO "user"@"localhost";

-- precedenti gia` eseguiti da script di avvio

use exam;

drop table if exists books;
create table books (
    id        int auto_increment primary key,
    isbn      varchar(15) unique not null,
    title     varchar(128) not null,
    author    varchar(64),
    publisher varchar(64),
    ranking   int,
    year      int,
    price     float
);
-- Source https://www.ilpost.it/2022/12/07/libri-piu-venduti-italia-2022/
insert into books(isbn, title, author, publisher, ranking, year, price)
values
    ('979-1259570277','Fabbricante di lacrime','Eric Doom','Magazzini Salani',1,2021,15.10),
    ('978-8834610572','Il caso Alaska Sanders','Joel Dicker','La Nave di Teseo',2,2022,20.90),
    ('978-8820072940','It ends with us. Siamo noi a dire basta','Colleen Hoover','Sperling & Kupfer',3,2022,15.10),
    ('978-8807034800','Violeta','Isabel Allende','Feltrinelli',4,2022,19),
    ('978-8806252410','Rancore','Gianrico Carofiglio','Einaudi',5,2022,17.57)
