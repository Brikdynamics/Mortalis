CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) NOT NULL AUTO_INCREMENT,
'nickname' varchar(255) NOT NULL,
'email' varchar(255) NOT NULL,
'password' varchar(255) NOT NULL,
'date' varchar(255) NOT NULL,
'character' varchar(255) NOT NULL,
'validate' varchar(255) NOT NULL,
'valid' varchar(255) NOT NULL,
'vip' varchar(255) NOT NULL,
'power' varchar(255) NOT NULL,
'defense' varchar(255) NOT NULL,
'gold' varchar(255) NOT NULL,
'stamina' varchar(255) NOT NULL,
'experience' varchar(255) NOT NULL,
'tokens' varchar(255) NOT NULL,
'crew' varchar(255) NOT NULL,
'crewname' varchar(255) NOT NULL,
'crewstatus' varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `characters` (
`ID` int(11) NOT NULL AUTO_INCREMENT,
'name1' varchar(255) NOT NULL,
'name2' varchar(255) NOT NULL,
'name3' varchar(255) NOT NULL,
'type' varchar(255) NOT NULL,
'information1' varchar(255) NOT NULL,
'information2' varchar(255) NOT NULL,
'information3' varchar(255) NOT NULL,
'attack' varchar(255) NOT NULL,
'defense' varchar(255) NOT NULL,
'working' varchar(255) NOT NULL,
'tracking' varchar(255) NOT NULL,
'diving' varchar(255) NOT NULL,
'fishing' varchar(255) NOT NULL,
'hunting' varchar(255) NOT NULL,
'digging' varchar(255) NOT NULL,
'picture1' varchar(255) NOT NULL,
'picture2' varchar(255) NOT NULL,
'picture3' varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name1` (`name1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `characters` (
`ID` int(11) NOT NULL AUTO_INCREMENT,
'name1' varchar(255) NOT NULL,
'name2' varchar(255) NOT NULL,
'name3' varchar(255) NOT NULL,
'type' varchar(255) NOT NULL,
'information1' varchar(255) NOT NULL,
'information2' varchar(255) NOT NULL,
'information3' varchar(255) NOT NULL,
'attack' varchar(255) NOT NULL,
'defense' varchar(255) NOT NULL,
'working' varchar(255) NOT NULL,
'tracking' varchar(255) NOT NULL,
'diving' varchar(255) NOT NULL,
'fishing' varchar(255) NOT NULL,
'hunting' varchar(255) NOT NULL,
'digging' varchar(255) NOT NULL,
'picture1' varchar(255) NOT NULL,
'picture2' varchar(255) NOT NULL,
'picture3' varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name1` (`name1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;