-- Drop tables
DROP TABLE Kategoria_plodin;
DROP TABLE Objednavka;
DROP TABLE Ponuka;
DROP TABLE Registrovany_uzivatel;
DROP TABLE Samozber;

-- Create tables
CREATE TABLE Samozber (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATE,
    cas TIME,
    miesto VARCHAR(100),
    cena INT,
    druh_tovaru VARCHAR(100)
);

CREATE TABLE Objednavka (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mnozstvo INT,
    druh_tovaru VARCHAR(100),
    cena INT
);

CREATE TABLE Ponuka (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mnozstvo INT,
    druh_tovaru VARCHAR(100),
    cena INT
);

CREATE TABLE Kategoria_plodin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    druh_tovaru VARCHAR(100),
    cena INT
);

CREATE TABLE Registrovany_uzivatel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(100),
    password VARCHAR(100)
);
