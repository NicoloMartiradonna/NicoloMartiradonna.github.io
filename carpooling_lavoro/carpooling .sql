-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 02, 2024 alle 22:39
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
-- Database: `carpooling`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `autista`
--

CREATE TABLE `autista` (
  `ID` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `recapito_telefonico` varchar(30) DEFAULT NULL,
  `dati_auto` varchar(30) DEFAULT NULL,
  `generalita` varchar(30) DEFAULT NULL,
  `scadenza_patente` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `autista`
--

INSERT INTO `autista` (`ID`, `email`, `numero`, `recapito_telefonico`, `dati_auto`, `generalita`, `scadenza_patente`, `password`, `nome`) VALUES
(11, 'ciao@mail.com', 3456890, '349675432', 'br07g789', 'cofano capiente ', '2030-09-12', '567re4', 'Eva');

-- --------------------------------------------------------

--
-- Struttura della tabella `passeggero`
--

CREATE TABLE `passeggero` (
  `ID` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `recapito_telefonicopasseggero` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `documento_identita` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `passeggero`
--

INSERT INTO `passeggero` (`ID`, `nome`, `cognome`, `recapito_telefonicopasseggero`, `email`, `documento_identita`, `password`) VALUES
(18, 'gerardo', 'Lovisa', '213659867', 'gl@mail.com', '7U912I', 'qwerty');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `ID` int(11) NOT NULL,
  `effettuata` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`ID`, `effettuata`) VALUES
(49, 'Prenotazione avvenuta con successo');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `ID` int(11) NOT NULL,
  `voto` float DEFAULT NULL,
  `descrizione` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`ID`, `voto`, `descrizione`) VALUES
(65, 5, 'Stimolante');

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE `viaggio` (
  `ID` int(11) NOT NULL,
  `datainizioViaggio` date DEFAULT NULL,
  `datafine` date DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `npostiviaggio` int(11) DEFAULT NULL,
  `bagaglio` varchar(30) DEFAULT NULL,
  `animali` double DEFAULT NULL,
  `fumatori` double DEFAULT NULL,
  `cittaPartenza` varchar(30) DEFAULT NULL,
  `cittaArrivo` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `viaggio`
--

INSERT INTO `viaggio` (`ID`, `datainizioViaggio`, `datafine`, `prezzo`, `npostiviaggio`, `bagaglio`, `animali`, `fumatori`, `cittaPartenza`, `cittaArrivo`) VALUES
(49, '2024-06-28', '2024-07-07', 98, 4, 'valigie', 1, 1, 'Milano', 'Reggio Emilia');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `autista`
--
ALTER TABLE `autista`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `passeggero`
--
ALTER TABLE `passeggero`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `viaggio`
--
ALTER TABLE `viaggio`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `autista`
--
ALTER TABLE `autista`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `passeggero`
--
ALTER TABLE `passeggero`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT per la tabella `viaggio`
--
ALTER TABLE `viaggio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
