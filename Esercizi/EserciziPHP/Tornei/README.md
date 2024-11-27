# Gestione Tornei in PHP

Questo progetto utilizza un database MySQL per gestire informazioni sui tornei. Segui le istruzioni qui sotto per configurare il database.

```sql
-- Creazione del database e della tabella
CREATE DATABASE Tornei
USE Tornei

CREATE TABLE tournaments ( id INT auto_increment PRIMARY KEY, name VARCHAR(15) UNIQUE NOT NULL, logo VARCHAR(128), champion VARCHAR(64), year INT );
 
/* -- Inserting data into the tournaments table with full URLs for logos*/ 
INSERT INTO tournaments (name, logo, champion, year) VALUES
('UEFA Euro 2020', 'https://data2.nssmag.com/images/galleries/28283/2020.png', 'Italy', 2021), 
('UEFA Euro 2016', 'https://data2.nssmag.com/images/galleries/28283/2016.png', 'Portugal', 2016),
('UEFA Euro 2012', 'https://data2.nssmag.com/images/galleries/28283/2012.png', 'Spain', 2012),
('UEFA Euro 2008', 'https://data2.nssmag.com/images/galleries/28283/2008.png', 'Spain', 2008),
('UEFA Euro 2004', 'https://data2.nssmag.com/images/galleries/28283/2004.png', 'Greece', 2004),
('UEFA Euro 2000', 'https://data2.nssmag.com/images/galleries/28283/2000.png', 'France', 2000),
('UEFA Euro 1996', 'https://data2.nssmag.com/images/galleries/28283/1996.png', 'Germany', 1996),
('UEFA Euro 1992', NULL, 'Denmark', 1992),
('UEFA Euro 1988', NULL, 'Netherlands', 1988),
('UEFA Euro 1984', NULL, 'France', 1984);
```