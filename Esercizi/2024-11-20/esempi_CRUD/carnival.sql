DROP DATABASE IF EXISTS exam;
CREATE DATABASE exam;
USE exam;

DROP TABLE IF EXISTS exam.regions;
CREATE TABLE exam.regions
(
    id   int auto_increment primary key,
    name varchar(32) not null
);

insert into exam.regions(name) values
('Abruzzo'),
('Basilicata'),
('Calabria'),
('Campania'),
('Emilia-Romagna'),
('Friuli-Venezia Giulia'),
('Lazio'),
('Liguria'),
('Lombardia'),
('Marche'),
('Molise'),
('Piemonte'),
('Puglia'),
('Sardegna'),
('Sicilia'),
('Toscana'),
('Trentino-Alto Adige'),
('Umbria'),
('Valle d''Aosta'),
('Veneto');

DROP TABLE IF EXISTS exam.costumes;
CREATE TABLE exam.costumes (
    id        	int auto_increment primary key,
    name      	varchar(32) not null,
    job      	varchar(64)  null,
    img      	varchar(512)  null,
    price       float default 0,
    region_id   int
);

insert into exam.costumes(name, job, img, price, region_id) values('Arlecchino','Servitore','https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/SAND_Maurice_Masques_et_bouffons_01.jpg/134px-SAND_Maurice_Masques_et_bouffons_01.jpg',10,9);
insert into exam.costumes(name, job, img, price, region_id) values('Pulcinella','Contadino','https://upload.wikimedia.org/wikipedia/commons/8/88/Pulcinella_–_The_humour_of_Italy_%281892%29_%2814783341015%29.jpg',5,4);
insert into exam.costumes(name, job, img, price, region_id) values('Peppe Nappa','Servitore','https://www.teatrodinessuno.it/sites/default/files/inline-images/peppe-nappa.jpg',7,15);
insert into exam.costumes(name, job, img, price, region_id) values('Meneghino','Servitore','https://upload.wikimedia.org/wikipedia/commons/e/e7/Meneghino_-_stampa_ottocento.jpg',12,9);
insert into exam.costumes(name, job, img, price, region_id) values('Gianduja','Galantuomo','https://upload.wikimedia.org/wikipedia/it/4/4c/Gianduja.jpg',20,12);
insert into exam.costumes(name, job, img, price, region_id) values('Vulon','Menestrello','https://destinazionefano.it/wp-content/uploads/2021/04/vulon-2-3-1-1.jpg',7,10);
insert into exam.costumes(name, job, img, price, region_id) values('Balanzone','Avvocato','https://upload.wikimedia.org/wikipedia/commons/b/b1/SAND_Maurice_Masques_et_bouffons_04.jpg',12,5);
insert into exam.costumes(name, job, img, price, region_id) values('Pantalone','Mercante','https://upload.wikimedia.org/wikipedia/commons/c/c3/SAND_Maurice_Masques_et_bouffons_06.jpg',20,20);