# Gestione Esami in PHP

Questo progetto utilizza un database MySQL per gestire informazioni sugli esami. Segui le istruzioni qui sotto per configurare il database.

```sql
-- Creazione del database e della tabella
CREATE DATABASE L31_esami;

USE L31_esami;

CREATE TABLE esami (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    voto INT
);

-- Popolamento della tabella con le materie del corso
INSERT INTO esami (nome, voto) VALUES
('Fondamenti di Informatica', 28),
('Algebra Lineare', 30),
('Analisi Matematica', 27),
('Sistemi Operativi', 29),
('Basi di Dati', 30),
('Reti di Calcolatori', 26),
('Programmazione Orientata agli Oggetti', 28),
('Intelligenza Artificiale', 27),
('Sicurezza Informatica', 30),
('Calcolo Numerico', 29);
```