CREATE DATABASE ArchivioMuseale;
USE ArchivioMuseale;

CREATE TABLE Artisti (
    ID_Artista INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Nazionalita VARCHAR(100),
    Data_Nascita DATE,
    Data_Morte DATE
);


CREATE TABLE Correnti_Artistiche (
    ID_Corrente INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL
);

CREATE TABLE Artista_Corrente (
    ID_Artista INT,
    ID_Corrente INT,
    Periodo_Start DATE,
    Periodo_End DATE,
    PRIMARY KEY (ID_Artista, ID_Corrente),
    FOREIGN KEY (ID_Artista) REFERENCES Artisti(ID_Artista),
    FOREIGN KEY (ID_Corrente) REFERENCES Correnti_Artistiche(ID_Corrente)
);

CREATE TABLE Musei (
    ID_Museo INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Città VARCHAR(255),
    Orari_Apertura VARCHAR(100),
    Sconto ENUM('Sì', 'No'),
    Direttore INT,
    FOREIGN KEY (Direttore) REFERENCES Direttori(ID_Direttore)
);

CREATE TABLE Direttori (
    ID_Direttore INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Città_Responsabilita VARCHAR(255)
);

CREATE TABLE Opere_d_Arte (
    ID_Opera INT AUTO_INCREMENT PRIMARY KEY,
    Titolo VARCHAR(255) NOT NULL,
    ID_Artista INT,
    ID_Museo INT,
    Tipo ENUM('Dipinto', 'Scultura'),
    Corrente_Artistica VARCHAR(255),
    Stato_Conservazione ENUM('Pessimo', 'Discreto', 'Buono', 'Ottimo'),
    Tecnica VARCHAR(255),  -- Solo per i dipinti
    Dimensioni VARCHAR(255),  -- Solo per i dipinti
    Materia VARCHAR(255),  -- Solo per le sculture
    Peso DECIMAL(10, 2),  -- Solo per le sculture
    FOREIGN KEY (ID_Artista) REFERENCES Artisti(ID_Artista),
    FOREIGN KEY (ID_Museo) REFERENCES Musei(ID_Museo)
);


INSERT INTO Artisti (Nome, Nazionalita, Data_Nascita, Data_Morte)
VALUES ('Sandro Botticelli', 'Italiana', '1445-03-01', '1510-05-17'),
       ('Michelangelo Buonarroti', 'Italiana', '1475-03-06', '1564-02-18');

INSERT INTO Correnti_Artistiche (Nome)
VALUES ('Rinascimento'), 
       ('Manierismo');

INSERT INTO Artista_Corrente (ID_Artista, ID_Corrente, Periodo_Start, Periodo_End)
VALUES (1, 1, '1460-01-01', '1490-12-31'),
       (2, 1, '1480-01-01', '1530-12-31'),
       (1, 2, '1490-01-01', '1510-05-17');


INSERT INTO Direttori (Nome, Città_Responsabilita)
VALUES ('Marco Rossi', 'Firenze'),
       ('Anna Bianchi', 'Parigi');



INSERT INTO Musei (Nome, Città, Orari_Apertura, Sconto, Direttore)
VALUES ('Museo Uffizi', 'Firenze', '9:00 - 19:00', 'Sì', 1),
       ('Museo del Louvre', 'Parigi', '10:00 - 18:00', 'No', 2);



INSERT INTO Opere_d_Arte (Titolo, ID_Artista, ID_Museo, Tipo, Corrente_Artistica, Stato_Conservazione, Tecnica, Dimensioni)
VALUES ('La Nascita di Venere', 1, 1, 'Dipinto', 'Rinascimento', 'Ottimo', 'Olio su tela', '150x200 cm'),
       ('David', 2, 2, 'Scultura', 'Rinascimento', 'Buono', NULL, NULL);

--INIZIO QUERY

--QUERY 1
SELECT m.Città, m.Nome AS NomeMuseo, d.Nome AS NomeDirettore
FROM Musei m
JOIN Direttori d ON m.Direttore = d.ID_Direttore;

--QUERY 2
SELECT a.Nome AS NomeArtista, COUNT(o.ID_Opera) AS NumeroOpere
FROM Opere_d_Arte o
JOIN Artisti a ON o.ID_Artista = a.ID_Artista
JOIN Musei m ON o.ID_Museo = m.ID_Museo
WHERE m.Città= 'parigi'
GROUP BY a.ID_Artista;

--QUERY 2.0
SELECT a.Nome AS NomeArtista, m.Nome AS NomeMuseo, COUNT(o.ID_Opera) AS NumeroOpere
FROM Opere_d_Arte o
JOIN Artisti a ON o.ID_Artista = a.ID_Artista
JOIN Musei m ON o.ID_Museo = m.ID_Museo
GROUP BY a.ID_Artista, m.ID_Museo;