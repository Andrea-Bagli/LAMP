CREATE DATABASE IF NOT EXIST esercitazione verifica;
use studenti



CREATE TABLE IF NOT EXISTS corsi(
    id_corso INT AUTO_INCREMENT PRIMARY KEY not null,
    nome_corso varchar(20) not null
);

CREATE TABLE IF NOT EXISTS disciplina(
    id_disciplina INT AUTO_INCREMENT PRIMARY KEY not null,
    nome_disciplina varchar(20) not null
);

create table if not exists studenti(
    matricola int AUTO_INCREMENT PRIMARY KEY not null,
    cognome varchar(20) not null,
    data_nascita date not null,
    capogruppo varchar(20) not null,
    FK_CORSO INT NOT NULL,
    FOREIGN KEY (FK_CORSO) REFERENCES corsi(id_corso)
);

CREATE TABLE IF NOT EXISTS valutazioni(
    id_valutazione int PRIMARY KEY AUTO_INCREMENT not null,
    voto int,
    data_voto date,
    FK_studenti int not null,
    FK_disciplina int not null,

    FOREIGN KEY(FK_studenti) REFERENCES studenti(matricola) ON DELETE CASCADE,
    FOREIGN KEY(FK_disciplina) REFERENCES disciplina(id_disciplina) ON DELETE CASCADE
);

INSERT INTO corsi(nome_corso)
VALUES 
('linguistico'),
('classico'),
('informatica'),
('artistico');


INSERT INTO studenti(cognome, data_nascita, capogruppo, FK_CORSO )
VALUES
('bagli', '2006-08-05', 'bagli', 1),
('menicucci', '2007-02-09', 'bagli', 3),
('santoro', '2007-02-26', 'lupo', 2);

INSERT INTO disciplina(nome_disciplina)
VALUES 
('matematica'),
('italiano'),
('informatica');

INSERT INTO valutazioni(voto, data_voto, FK_studenti, FK_disciplina)
VALUES
('4', CURDATE(), 3, 3),
('9', CURDATE(), 1, 3),
('8', CURDATE(), 2, 1);

ALTER TABLE studenti ADD COLUMN nome varchar(20) not null;

ALTER TABLE studenti
MODIFY COLUMN nome varchar(20) not null after matricola;

INSERT INTO studenti(nome)
VALUES 
('andrea'),
('daniele'),
('alessandro');

truncate TABLE studenti;

SELECT nome
FROM studenti
WHERE cognome= 'menicucci';

SELECT matricola, cognome,
    FLOOR(DATEDIFF(CURDATE(), data_nascita) /365) AS eta
FROM studenti;

SELECT *
FROM studenti
WHERE cognome LIKE 'm%';

SELECT cognome, voto, nome_disciplina
FROM studenti 
JOIN valutazioni ON studenti.matricola =  valutazioni.FK_studenti
JOIN disciplina ON valutazioni.FK_disciplina = disciplina.id_disciplina
WHERE cognome='menicucci';


SELECT cognome, avg(voto), count(voto)
FROM valutazioni
JOIN studenti ON studenti.matricola = valutazioni.FK_studenti
WHERE cognome='menicucci';

--per gli studenti il cui cognome inizia per una data lettera visualizzzare cognome intero, voti, Nome materia, data nascita e eta effettiva. 
--data la matricola visualizzare inoltre visualizza il cognome quanti voti ha media dei voti, voto piu alto, voto piu basso, somma voti.
-- visualizza quanti studenti hanno piu di 18 anni
-- visualizza i cognomi degli studenmti senza voti

SELECT cognome, voto, nome_disciplina, data_nascita,
    FLOOR(DATEDIFF(CURDATE(), data_nascita) /365) AS eta
FROM studenti
JOIN valutazioni ON studenti.matricola = valutazioni.FK_studenti
JOIN disciplina ON valutazioni.FK_disciplina = disciplina.id_disciplina
WHERE cognome LIKE 'b%';

SELECT cognome, avg(voto), max(voto), min(voto), sum(voto), count(voto)
FROM studenti
JOIN valutazioni ON studenti.matricola = valutazioni.FK_studenti
WHERE matricola=2;

SELECT *
FROM studenti
WHERE FLOOR(DATEDIFF(CURDATE(), data_nascita)/365)>=18;

SELECT *
FROM studenti
LEFT JOIN valutazioni ON studenti.matricola = valutazioni.FK_studenti
WHERE valutazioni.voto IS NULL;