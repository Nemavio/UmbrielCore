<?php
date_default_timezone_set('Europe/Paris');
$year = date('Y');
$serveur="127.0.0.1";
$identifiant="cmj";
$password="catherine";
$base="cmj";
$tableparam="umbrielsystem";
$rami = "oui"; //Retour à l'index après modification sur un utilisateur (entrée/sorti)
/*
-------
-MYSQL-
-------


--
-- Structure de la table `umbrielsystem`
--

CREATE TABLE IF NOT EXISTS `umbrielsystem` (
  `uid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(255) NOT NULL,
  `valeur1` varchar(255) NOT NULL,
  `valeur2` varchar(255) NOT NULL,
  `valeur3` varchar(255) NOT NULL,
  `valeur4` varchar(255) NOT NULL,
  `valeur5` varchar(255) NOT NULL,
  `valeur6` varchar(255) NOT NULL,
  `valeur7` varchar(255) NOT NULL,
  `valeur8` varchar(255) NOT NULL,
  `valeur9` varchar(255) NOT NULL,
  `valeur10` varchar(255) NOT NULL,
  `valeur11` varchar(255) NOT NULL,
  `valeur12` varchar(255) NOT NULL,
  `valeur13` varchar(255) NOT NULL,
  `valeur14` varchar(255) NOT NULL,
  `valeur15` varchar(255) NOT NULL,
  `valeur16` varchar(255) NOT NULL,
  `valeur17` varchar(255) NOT NULL,
  `valeur18` varchar(255) NOT NULL,
  `valeur19` varchar(255) NOT NULL,
  `valeur20` varchar(255) NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `umbrielsystem`
--

INSERT INTO `umbrielsystem` (`uid`, `type`, `valeur1`, `valeur2`, `valeur3`, `valeur4`, `valeur5`, `valeur6`, `valeur7`, `valeur8`, `valeur9`, `valeur10`, `valeur11`, `valeur12`, `valeur13`, `valeur14`, `valeur15`, `valeur16`, `valeur17`, `valeur18`, `valeur19`, `valeur20`) VALUES
('2014-03-02 20:28:16', 'utilisateur', '1', 'Administrateur', '', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'sa', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


*/
?>