# Gestione Viaggi in PHP

Questo progetto utilizza un database MySQL per gestire informazioni sui viaggi. Segui le istruzioni qui sotto per configurare il database.

```sql
-- Creazione del database
CREATE DATABASE SistemaPrenotazioni;

-- Utilizzo del database appena creato
USE SistemaPrenotazioni;

-- Creazione della tabella
CREATE TABLE Prenotazioni_Viaggi (
    ID_Prenotazione INT AUTO_INCREMENT PRIMARY KEY,
    Nome_Utente VARCHAR(100) NOT NULL,
    Destinazione VARCHAR(100) NOT NULL,
    Data_Partenza DATE NOT NULL,
    Data_Ritorno DATE NOT NULL,
    Costo_Totale DECIMAL(10, 2) NOT NULL
);

-- Inserimento dati di esempio
INSERT INTO Prenotazioni_Viaggi (Nome_Utente, Destinazione, Data_Partenza, Data_Ritorno, Costo_Totale)
VALUES 
('Mario Rossi', 'Roma', '2023-12-20', '2023-12-27', 2100.00),
('Giulia Bianchi', 'New York', '2024-01-10', '2024-01-15', 1250.00),
('Luca Verdi', 'Parigi', '2024-03-15', '2024-03-20', 800.00),
('Anna Neri', 'Tokyo', '2024-05-01', '2024-05-10', 3000.00),
('Francesca Bianchi', 'Londra', '2024-02-10', '2024-02-14', 950.00),
('Alessandro Rossi', 'Barcellona', '2024-04-05', '2024-04-10', 700.00),
('Chiara Galli', 'Dubai', '2024-06-20', '2024-06-27', 2500.00),
('Marco Esposito', 'Bangkok', '2024-07-15', '2024-07-25', 2200.00);
```