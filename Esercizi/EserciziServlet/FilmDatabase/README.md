## Film Database in JDBC

Questo progetto utilizza un database MySQL per gestire informazioni sui film. Segui le istruzioni qui sotto per configurare il database.

```sql
-- Creazione del database
CREATE DATABASE FilmDatabase;

-- Utilizzo del database
USE FilmDatabase;

-- Creazione della tabella Film
CREATE TABLE Film (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Chiave primaria unica
    nome_film VARCHAR(255) NOT NULL,   -- Nome del film
    nome_regista VARCHAR(255) NOT NULL, -- Nome del regista
    anno_uscita INT NOT NULL          -- Anno di uscita
);

-- Inserimento di alcuni dati di esempio
INSERT INTO Film (nome_film, nome_regista, anno_uscita) 
VALUES 
    ('Inception', 'Christopher Nolan', 2010),
    ('La vita è bella', 'Roberto Benigni', 1997),
    ('Parasite', 'Bong Joon-ho', 2019),
    ('Il padrino', 'Francis Ford Coppola', 1972);

-- Inserimento di altri dati nella tabella Film
INSERT INTO Film (nome_film, nome_regista, anno_uscita) 
VALUES 
    ('Pulp Fiction', 'Quentin Tarantino', 1994),
    ('Interstellar', 'Christopher Nolan', 2014),
    ('Schindler\'s List', 'Steven Spielberg', 1993),
    ('Forrest Gump', 'Robert Zemeckis', 1994),
    ('Titanic', 'James Cameron', 1997),
    ('Star Wars: Episodio IV - Una nuova speranza', 'George Lucas', 1977),
    ('The Dark Knight', 'Christopher Nolan', 2008),
    ('Avatar', 'James Cameron', 2009),
    ('Il Signore degli Anelli: Il Ritorno del Re', 'Peter Jackson', 2003),
    ('Matrix', 'Lana Wachowski, Lilly Wachowski', 1999),
    ('La grande bellezza', 'Paolo Sorrentino', 2013),
    ('C\'era una volta in America', 'Sergio Leone', 1984),
    ('Joker', 'Todd Phillips', 2019),
    ('La città incantata', 'Hayao Miyazaki', 2001),
    ('Fight Club', 'David Fincher', 1999);
```