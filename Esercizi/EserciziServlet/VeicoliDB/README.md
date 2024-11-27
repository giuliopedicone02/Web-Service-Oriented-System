-- Creazione del database
CREATE DATABASE VehicleDB;

-- Utilizzo del database appena creato
USE VehicleDB;

-- Creazione della tabella Auto
CREATE TABLE Auto (
    ID_Auto INT AUTO_INCREMENT PRIMARY KEY,       -- Identificativo univoco per ogni auto
    Marca VARCHAR(50) NOT NULL,                   -- Marca dell'auto
    Modello VARCHAR(50) NOT NULL,                 -- Modello dell'auto
    Anno INT NOT NULL,                            -- Anno di produzione
    Cilindrata INT NOT NULL,                      -- Cilindrata in cc
    Alimentazione ENUM('Benzina', 'Diesel', 'Elettrico', 'Ibrido', 'GPL', 'Metano') NOT NULL, -- Tipo di alimentazione
    Prezzo DECIMAL(10, 2) NOT NULL                -- Prezzo dell'auto
);

INSERT INTO Auto (Marca, Modello, Anno, Cilindrata, Alimentazione, Prezzo)
VALUES
('Ford', 'Focus', 2020, 1500, 'Benzina', 20000.00),
('BMW', 'Serie 3', 2023, 2000, 'Diesel', 35000.00),
('Audi', 'A4', 2022, 2000, 'Ibrido', 40000.00),
('Fiat', 'Panda', 2021, 1200, 'GPL', 13000.00),
('Mercedes', 'Classe C', 2023, 2200, 'Elettrico', 48000.00),
('Renault', 'Clio', 2021, 1300, 'Diesel', 18000.00),
('Peugeot', '208', 2022, 1400, 'Metano', 19000.00),
('Kia', 'Sportage', 2023, 1600, 'Ibrido', 30000.00);

INSERT INTO Auto (Marca, Modello, Anno, Cilindrata, Alimentazione, Prezzo)
VALUES 
('Toyota', 'Corolla', 2022, 1600, 'Ibrido', 23000.50),
('Volkswagen', 'Golf', 2021, 2000, 'Diesel', 25000.00),
('Tesla', 'Model 3', 2023, 0, 'Elettrico', 45000.00);