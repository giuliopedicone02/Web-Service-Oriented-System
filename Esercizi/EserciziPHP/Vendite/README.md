# Gestione Vendite in PHP

Questo progetto utilizza un database MySQL per gestire informazioni sulle vendite. Segui le istruzioni qui sotto per configurare il database.

```sql
-- Creazione del database (se non esiste)
CREATE DATABASE IF NOT EXISTS VenditeProdottiUsati;

-- Selezione del database
USE VenditeProdottiUsati;

-- Creazione della tabella
CREATE TABLE IF NOT EXISTS Vendite (
    id INTEGER PRIMARY KEY AUTO_INCREMENT, -- Identificativo univoco della vendita
    prodotto TEXT NOT NULL,                -- Nome o descrizione del prodotto
    prezzo REAL NOT NULL,                  -- Prezzo del prodotto venduto
    data_vendita DATE NOT NULL             -- Data della vendita
);

-- Inserimento di dati di esempio
INSERT INTO Vendite (prodotto, prezzo, data_vendita)
VALUES 
    ('Laptop usato', 450.00, '2024-12-01'),
    ('Smartphone', 200.00, '2024-12-05'),
    ('Bicicletta', 120.00, '2024-12-10'),
    ('Tavolo da pranzo', 80.00, '2024-12-11');
```