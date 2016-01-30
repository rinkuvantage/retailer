DROP TABLE IF EXISTS `ret_usermeta`;  CREATE TABLE `ret_usermeta` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `meta_key` varchar(300) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;