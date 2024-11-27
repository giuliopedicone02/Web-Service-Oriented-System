# Gestione Prodotti in JDBC

Questo progetto utilizza un database MySQL per gestire informazioni sui prodotti. Segui le istruzioni qui sotto per configurare il database.

```sql
CREATE DATABASE GestioneProdotti;

-- Uso del database appena creato
USE GestioneProdotti;

-- Creazione della tabella
CREATE TABLE Prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Campo ID autoincrementato
    nome_prodotto VARCHAR(255) NOT NULL, -- Campo per il nome del prodotto
    prezzo_prodotto INT NOT NULL -- Campo per il prezzo del prodotto
);

-- Inserimento di dati reali nella tabella
INSERT INTO Prodotti (nome_prodotto, prezzo_prodotto)
VALUES 
('iPhone 15', 1200),
('Samsung Galaxy S23', 999),
('Laptop Dell XPS 13', 1500),
('Scarpe Nike Air Max', 150),
('Giacca North Face', 300),
('Bistecca di Manzo', 25),
('Latte Parmalat 1L', 2),
('Pasta Barilla 500g', 1),
('Televisore LG OLED 55"', 1200),
('Smartwatch Garmin Fenix 7', 800);
```