DROP TABLE IF EXISTS driver;

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(255) NOT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO driver VALUES("1","mygoat");
INSERT INTO driver VALUES("3","4441");



DROP TABLE IF EXISTS hauler;

CREATE TABLE `hauler` (
  `hauler_id` int(11) NOT NULL AUTO_INCREMENT,
  `hauler_name` varchar(255) NOT NULL,
  PRIMARY KEY (`hauler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO hauler VALUES("1","hauler1");
INSERT INTO hauler VALUES("2","hauler");
INSERT INTO hauler VALUES("3","123");
INSERT INTO hauler VALUES("4","122");
INSERT INTO hauler VALUES("5","1231");
INSERT INTO hauler VALUES("6","5555");
INSERT INTO hauler VALUES("7","455456");



DROP TABLE IF EXISTS project;

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO project VALUES("1","134");
INSERT INTO project VALUES("2","443");



DROP TABLE IF EXISTS tbl_user;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_user VALUES("1","","1","1","1","$2y$10$.HPsUhAJJb/KkagUWfbs.eqbvO0wg1lGZ4UG12Ocisb","admin","0");
INSERT INTO tbl_user VALUES("2","","hm","wtf11","hm1","$2y$10$J4svuFcXZpb731LoJb4WF.fPOZlO7LlYRaoqhKwubvP","admin","0");
INSERT INTO tbl_user VALUES("3","techer1","mahrex1","bunagan bruh","lerio","$2y$10$LEtWXMinO/.1wkTJGzjmMOl.C8qg6XK/incDQADSbCxUpMlorKTNS","admin","1");
INSERT INTO tbl_user VALUES("10","admin","admin","admin","admin","$2y$10$FBwDsl7q/8XU7mv6buRLFOr9A9cYWUhOWwZF1vWsUPaSci9hHtL/W","admin","1");
INSERT INTO tbl_user VALUES("11","","ethan","1234","fontanilla","$2y$10$4FEkUlIyhXrAFbLyq24FeOj/lp.ERZ94xyxznFXAAS.eexKmxkzIW","admin","0");
INSERT INTO tbl_user VALUES("12","","1111","1111","1111","$2y$10$ResD1exdsoiMLFgtYAeoiurVSUdSQuqhIlkI1ELbZRVCTKT.3qIrO","admin","0");
INSERT INTO tbl_user VALUES("13","","5555","5555","5555","$2y$10$MDEhpVWcQPeQGoHwj/Kjs.LyyEfwukz39hpCcDBkjr2hL9aN85a/W","admin","1");
INSERT INTO tbl_user VALUES("14","","ethan","fontanilla","fontanilla","$2y$10$74wMdGbyWPEh2WHxb.v8SOQN84Bdc5V5FALfq5K1SZlGWXoypAQKq","admin","1");
INSERT INTO tbl_user VALUES("15","","a","a","a","$2y$10$Xd9VcesSKEs.XkVq69EQV.Swc5RniOzFs5XVbi3VDi6JovppJGaP.","admin","0");
INSERT INTO tbl_user VALUES("16","","b","b","a","$2y$10$ia5/0YHdfvY1uUg.Q9wrA.xDiogH/nfqbrpks21nRYykK.qvH45Oe","admin","1");
INSERT INTO tbl_user VALUES("17","","c","c","c","$2y$10$yXGwEXvnk6U5dM0dNm0Pleg369eQvJowjpiPi/pF.xbjSc5XVqmeO","admin","1");
INSERT INTO tbl_user VALUES("18","","","","","$2y$10$2y5HtuV8wVPKpXjgJkw71eZagSEOQLsG3E/xDyTh4975opykeOm7u","admin","1");
INSERT INTO tbl_user VALUES("19","","e","","","$2y$10$rY9WuXMZSxyY/.7XbqIZWuJBXus53F7.FyYf9EORKiOnOdlmDmXZy","admin","0");
INSERT INTO tbl_user VALUES("20","","asdf","asdf","dgasdg","$2y$10$oz1lVGIIUt4adtorPxAOIeP9oQLSNYJJcdsRAf/0iM7AjhB5yS4dC","","1");
INSERT INTO tbl_user VALUES("21","","asdfasdg","asdf","dgasdg","$2y$10$Q.9CKzviAYws/7XJl4ZSZeC80dqjxSVPqjeHbNGhfYIeA03L7z7V2","admin","1");
INSERT INTO tbl_user VALUES("22","","lerio","mahrex","asf","$2y$10$/dn7U1MLbnX6mPGF7qwAUePo1E.OCeS/nPyGcko2P7JS8/foi/TWW","admin","1");
INSERT INTO tbl_user VALUES("23","","ethan1","fbos","okf","$2y$10$2es1GVBpum.5GZ0hiODoHeknDJn8Iet1eduzkMtxrwcp2HzUaGF/q","admin","0");
INSERT INTO tbl_user VALUES("24","","baro","baro","baro","$2y$10$mTNe3w4UYYHIi.vVU9NVHe9.uT7MmbOGKZ6sHHMDxWa/6AYLGO04y","admin","1");
INSERT INTO tbl_user VALUES("25","","john3","doe3","d3","$2y$10$FnzCYJaVXYu75SUDSZX05OhoZj7yrQ8tAVNXQFktVLx2xbOTfH0E6","admin","1");
INSERT INTO tbl_user VALUES("26","JohnDoe","Joe","Mama","Mama","$2y$10$B5RPOqt/mUvGqwe5srpKNeieShgME3jO8R.CAgee9SagYhqu4Wjoy","admin","1");
INSERT INTO tbl_user VALUES("27","JohnDoe1","John","John","Doe","$2y$10$jHQYGR7YseOwD0xJRzAJ/OlvyEOj3eSVFX3S0OmBq3zOXnKBlNMzG","admin","1");
INSERT INTO tbl_user VALUES("28","1235","1351","135","12351","$2y$10$uSlZrt1p1IniiIEFv61cuOVkqZTLcqEZ9ERAIf19P8W9QsjxWYrpK","admin","1");
INSERT INTO tbl_user VALUES("29","dsag","adf","sag","ad","$2y$10$XuKAuMtWRSTp1XxH84WBbO88kFsL0PZI6uD8P9RkHDN98NJtcPcxu","admin","1");



DROP TABLE IF EXISTS transaction;

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_reference` varchar(50) NOT NULL,
  `hauler_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `transfer_in_line` enum('Line 3','Line 4','Line 5','Line 6','Line 7','GLAD WHSE','WHSE 2-BAY 2','WHSE 2-BAY 3') DEFAULT NULL,
  `ordinal` enum('1st','2nd','3rd','3rd/1st') DEFAULT NULL,
  `shift` enum('day','night','day/night') DEFAULT NULL,
  `schedule` enum('6am-2pm','2pm-6am','6am-2pm/2pm-6am') DEFAULT NULL,
  `no_of_bales` int(11) DEFAULT NULL,
  `kilos` int(11) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_time` datetime DEFAULT NULL,
  `backlog` varchar(255) DEFAULT NULL,
  `unloading_date` date DEFAULT NULL,
  `time_of_entry` datetime DEFAULT NULL,
  `unloading_time_start` datetime DEFAULT NULL,
  `unloading_time_end` datetime DEFAULT NULL,
  `time_of_departure` datetime DEFAULT NULL,
  `status` enum('done','ongoing') DEFAULT 'ongoing',
  PRIMARY KEY (`transaction_id`),
  KEY `hauler_id` (`hauler_id`),
  KEY `vehicle_id` (`vehicle_id`),
  KEY `driver_id` (`driver_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`hauler_id`) REFERENCES `hauler` (`hauler_id`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`),
  CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO transaction VALUES("23","","1","3","1","1","Line 3","1st","day","6am-2pm","0","0","","0000-00-00","0000-00-00 00:00:00","","2024-07-06","2024-07-06 17:57:00","2024-07-06 17:57:00","2024-07-06 17:57:00","2024-07-06 17:57:00","ongoing");
INSERT INTO transaction VALUES("24","","1","3","1","1","Line 3","1st","day","6am-2pm","0","0","","2024-07-06","2024-07-06 17:59:00","","2024-07-06","2024-07-06 17:58:00","2024-07-06 17:58:00","2024-07-06 17:58:00","2024-07-06 17:58:00","ongoing");



DROP TABLE IF EXISTS vehicle;

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(50) NOT NULL,
  `truck_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vehicle VALUES("3","1234","trailer");
INSERT INTO vehicle VALUES("4","4545","4545");



