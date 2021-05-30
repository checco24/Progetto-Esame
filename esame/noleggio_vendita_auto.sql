
--
-- Database: `noleggio_vendita_auto`
--
CREATE DATABASE IF NOT EXISTS `noleggio_vendita_auto` ;
USE `noleggio_vendita_auto`;


-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `id_utente` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `anno_nascita` date NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_utente`)
);

-- --------------------------------------------------------

--
-- Struttura della tabella `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(5) NOT NULL AUTO_INCREMENT,
  `nome_marca` varchar(50) NOT NULL,
  PRIMARY KEY (`id_marca`)
);

-- --------------------------------------------------------

--
-- Struttura della tabella `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `id_sede` int(5) NOT NULL AUTO_INCREMENT,
  `cap` char(5) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `via` varchar(50) NOT NULL,
  `civico` varchar(10) NOT NULL,
  PRIMARY KEY (`id_sede`)
);

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendente`
--

CREATE TABLE IF NOT EXISTS `dipendente` (
  `id_dipendente` int(5) NOT NULL AUTO_INCREMENT,
  `id_utente` int(5) NOT NULL,
  `super` int(1) DEFAULT 0,
  `id_sede` int(5) NOT NULL,
  PRIMARY KEY (`id_dipendente`),
  FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON UPDATE CASCADE
);

-- --------------------------------------------------------
--
-- Struttura della tabella `automobile`
--

CREATE TABLE IF NOT EXISTS `automobile` (
  `id_automobile` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `prezzo` varchar(50) NOT NULL,
  `cambio` varchar(50) NOT NULL,
  `km_percorsi` varchar(50) NOT NULL,
  `anno_prod` int(4) NOT NULL,
  `condizione` varchar(50) NOT NULL,
  `operazione` varchar(10) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_marca` int(5) NOT NULL,
  `id_sede` int(5) NOT NULL,
  `id_dipendente` int(5) NOT NULL,
  PRIMARY KEY (`id_automobile`),
  FOREIGN KEY (`id_dipendente`) REFERENCES `dipendente` (`id_dipendente`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON UPDATE CASCADE
);

-- --------------------------------------------------------
--
-- Struttura della tabella `noleggio`
--

CREATE TABLE IF NOT EXISTS `noleggio` (
  `id_noleggio` int(5) NOT NULL AUTO_INCREMENT,
  `id_automobile` int(5) NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date NOT NULL,
  `id_utente` int(5) NOT NULL,
  `id_sede` int(5) NOT NULL,
  PRIMARY KEY (`id_noleggio`),
  FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_automobile`) REFERENCES `automobile` (`id_automobile`) ON UPDATE CASCADE
);

-- --------------------------------------------------------

--
-- Struttura della tabella `vendita`
--

CREATE TABLE IF NOT EXISTS `vendita` (
  `id_vendita` int(5) NOT NULL AUTO_INCREMENT,
  `data_vendita` date NOT NULL,
  `id_automobile` int(5) NOT NULL,
  `id_utente` int(5) NOT NULL,
  `id_sede` int(5) NOT NULL,
  PRIMARY KEY (`id_vendita`),
  FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_automobile`) REFERENCES `automobile` (`id_automobile`) ON UPDATE CASCADE
);


