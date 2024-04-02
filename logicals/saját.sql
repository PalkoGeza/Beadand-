CREATE DATABASE IF NOT EXISTS`labor7`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `labor7`;

CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `utonev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(256) NOT NULL default '',
  PRIMARY KEY  (`id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;
