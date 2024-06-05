-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2024 alle 10:50
-- Versione del server: 5.6.15-log
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `attore`
--

CREATE TABLE `attore` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `datanascita` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `attore`
--

INSERT INTO `attore` (`id`, `nome`, `cognome`, `datanascita`) VALUES
(1, 'Roberto', 'Benigni', '1952-10-27'),
(2, 'Nicoletta', 'Braschi', '1960-04-19'),
(3, 'Giorgio', 'Cantarini', '1992-04-12'),
(4, 'Sergio', 'Castelletto', '1953-08-18'),
(5, 'Alessandro', 'Sperduti', '1987-07-08'),
(6, 'Carlotta', 'Gamba', '1997-04-16'),
(7, 'Robin', 'Williams', '0000-00-00'),
(8, 'Ethan', 'Hawke', '1970-11-06'),
(9, 'Robert Sean', 'Leonard', '1969-02-28'),
(10, 'Tom', 'Hanks', '1956-07-09'),
(11, 'Robin', 'Wright', '1966-04-08'),
(12, 'Gary', 'Sinise', '1955-03-17'),
(13, 'Micheal J', 'Fox', '1961-06-09'),
(14, 'Christopher', 'Lloyd', '1938-10-22'),
(15, 'Lea', 'Thompson', '1961-05-31');

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) DEFAULT NULL,
  `sinossi` text,
  `durata` int(11) DEFAULT NULL,
  `datauscita` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`id`, `titolo`, `sinossi`, `durata`, `datauscita`) VALUES
(1, 'La vita e bella', 'Nel 1939 un giovane ebreo si innamora di una maestrina, che tenta in ogni modo di conquistare: riesce persino a entrare nella scuola dove lei insegna, improvvisando un discorso fitto di battute esilaranti, che svelano la natura ridicola delle leggi razziali.', 122, '1997-12-20'),
(2, 'Dante', 'Nel 1350, a distanza di trent\'anni dalla morte di Dante Alighieri, a Giovanni Boccaccio viene assegnato il compito di recarsi a Ravenna, per consegnare a Suor Beatrice, figlia del poeta, dieci fiorini d\'oro a nome dei capitani della compagnia di Orsanmichele.', 94, '2022-09-29'),
(3, 'L attimo fuggente', 'Nell\'estate del 1959, il professor John Keating, docente di letteratura, viene trasferito nel collegio maschile di Welton (Vermont); Keating ha un approccio didattico originale che spinge gli alunni a distinguersi dagli altri e a seguire la propria strada.', 128, '1989-09-29'),
(4, 'Forrest Gump', 'Nel 1982 Forrest Gump, un uomo di circa quarant\'anni, inizia a raccontare la storia della sua vita ad ascoltatori occasionali mentre attende un autobus seduto su una panchina a una fermata di Savannah (Georgia).', 142, '1994-10-06'),
(5, 'Ritorno al futuro', 'Marty e Doc sono due scienziati alle prese con una macchina del tempo in grado di riportare le persone ad anni addietro. ', 116, '1985-10-18');

-- --------------------------------------------------------

--
-- Struttura della tabella `genere`
--

CREATE TABLE `genere` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `genere`
--

INSERT INTO `genere` (`id`, `nome`) VALUES
(1, 'Guerra, Commedia, Romantico, Melodramma, Avventura'),
(2, 'Biografico, Storico'),
(3, 'Drammatico'),
(4, 'Commedia, Drammatico'),
(5, 'Commedia, Fantascienza, Avventura');

-- --------------------------------------------------------

--
-- Struttura della tabella `regista`
--

CREATE TABLE `regista` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `datanascita` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `regista`
--

INSERT INTO `regista` (`id`, `nome`, `cognome`, `datanascita`) VALUES
(1, 'Roberto', 'Benigni', '1952-10-27'),
(2, 'Pupi', 'Avati', '1938-11-03'),
(3, 'Peter', 'Weir', '1944-08-21'),
(4, 'Robert Lee', 'Zemeckis', '1952-05-14'),
(5, 'Robert Lee', 'Zemeckis', '1952-05-14');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dataregistrazione` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `attore`
--
ALTER TABLE `attore`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `genere`
--
ALTER TABLE `genere`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `regista`
--
ALTER TABLE `regista`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
