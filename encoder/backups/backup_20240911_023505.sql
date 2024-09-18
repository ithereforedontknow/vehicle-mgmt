

CREATE TABLE `arrival` (
  `arrival_id` int(11) NOT NULL AUTO_INCREMENT,
  `arrival_date` date NOT NULL,
  `arrival_time` datetime NOT NULL,
  PRIMARY KEY (`arrival_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_fname` varchar(255) NOT NULL,
  `driver_mname` varchar(255) DEFAULT NULL,
  `driver_lname` varchar(255) DEFAULT NULL,
  `driver_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO driver VALUES('1','mygoat',NULL,NULL,NULL);
INSERT INTO driver VALUES('3','fontanilla',NULL,NULL,NULL);
INSERT INTO driver VALUES('4','driver',NULL,NULL,NULL);
INSERT INTO driver VALUES('5','32','32','32','32');
INSERT INTO driver VALUES('6','42','4','42','42');
INSERT INTO driver VALUES('7','ffa','fa','fa','fa');
INSERT INTO driver VALUES('8','3251','1352','123512','123521');


CREATE TABLE `hauler` (
  `hauler_id` int(11) NOT NULL AUTO_INCREMENT,
  `hauler_name` varchar(255) NOT NULL,
  `hauler_address` varchar(255) NOT NULL,
  PRIMARY KEY (`hauler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO hauler VALUES('1','hauler1',NULL);
INSERT INTO hauler VALUES('2','hauler','12');
INSERT INTO hauler VALUES('3','123',NULL);
INSERT INTO hauler VALUES('4','122',NULL);
INSERT INTO hauler VALUES('5','1231','124');
INSERT INTO hauler VALUES('6','5555',NULL);
INSERT INTO hauler VALUES('7','ulpi','421');
INSERT INTO hauler VALUES('8','jvc trucking',NULL);
INSERT INTO hauler VALUES('9',NULL,'42');
INSERT INTO hauler VALUES('10','1','1');
INSERT INTO hauler VALUES('11','bro','bro');
INSERT INTO hauler VALUES('12','i mean','i mean');
INSERT INTO hauler VALUES('13','42','42');
INSERT INTO hauler VALUES('14','4','4');


CREATE TABLE `helper` (
  `helper_id` int(11) NOT NULL AUTO_INCREMENT,
  `helper_fname` varchar(255) DEFAULT NULL,
  `helper_mname` varchar(255) DEFAULT NULL,
  `helper_lname` varchar(255) DEFAULT NULL,
  `helper_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`helper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO helper VALUES('1','3','32','32','32');
INSERT INTO helper VALUES('2','424','24','42','42');
INSERT INTO helper VALUES('3','fa','fa','fa','fa');
INSERT INTO helper VALUES('4','152','1351','1351','51235');


CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO project VALUES('1','134');
INSERT INTO project VALUES('2','443');


CREATE TABLE `queue` (
  `ordinal` enum('1st','2nd','3rd','3rd/1st') DEFAULT NULL,
  `shift` enum('day','night','day/night') DEFAULT NULL,
  `schedule` enum('6am-2pm','2pm-6am','6am-2pm/2pm-6am') DEFAULT NULL,
  `transfer_in_line` enum('Line 3','Line 4','Line 5','Line 6','GLAD WHSE','WHSE 2-BAY 2','WHSE 2-BAY 3') DEFAULT NULL,
  `queue_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`queue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_reference` varchar(50) NOT NULL,
  `hauler_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `transfer_in_line_id` int(11) DEFAULT NULL,
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
  `status` enum('done','ongoing','arrived','departed','queue') DEFAULT 'departed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_spent_waiting_area` time DEFAULT NULL,
  `queue_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `hauler_id` (`hauler_id`),
  KEY `vehicle_id` (`vehicle_id`),
  KEY `driver_id` (`driver_id`),
  KEY `project_id` (`project_id`),
  KEY `transaction_ibfk_5` (`transfer_in_line_id`),
  KEY `transaction_ibfk_6` (`queue_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`hauler_id`) REFERENCES `hauler` (`hauler_id`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`),
  CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO transaction VALUES('26','456654','7','4','3','2','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-06','2024-09-06 14:45:53',NULL,'2024-07-09','2024-07-09 09:38:00','2024-07-09 09:38:00','2024-07-09 09:39:00','2024-07-09 09:39:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('28',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-07','2024-09-07 04:02:00',NULL,'2024-07-11','2024-07-11 23:47:00','2024-07-11 23:47:00','2024-07-11 23:47:00','2024-07-11 23:47:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('29',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-07','2024-09-07 03:02:00',NULL,'2024-07-11','2024-07-11 21:48:00','2024-07-11 23:48:00','2024-07-11 23:48:00','2024-07-11 23:48:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('30',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','0000-00-00','2024-08-25 05:04:00',NULL,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('31',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-07','2024-09-07 03:02:00',NULL,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('32','1241241','1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','0000-00-00','2024-08-26 20:25:00',NULL,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('33','12421','1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','2024-09-02','2024-09-02 05:09:26',NULL,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('34','12345','1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','2024-09-02','2024-09-02 04:42:27',NULL,'2024-09-11','2024-09-11 00:52:19','2024-09-11 00:52:19','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('35','55132','1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','2024-09-02','2024-09-02 04:42:01',NULL,'2024-09-11','2024-09-11 00:52:21','2024-09-11 00:52:21','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-01 11:26:37',NULL,NULL);
INSERT INTO transaction VALUES('36',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','2024-09-02','2024-09-02 04:42:01',NULL,'2024-09-11','2024-09-11 01:53:18','2024-09-11 01:53:18','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-01 11:26:37','00:00:00',NULL);
INSERT INTO transaction VALUES('37',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'0000-00-00','2024-08-28 02:12:00',NULL,'2024-09-11','2024-09-11 01:53:27','2024-09-11 01:53:27','2024-08-28 02:24:00','2024-08-28 02:24:00','ongoing','2024-09-01 11:26:37','00:00:00',NULL);
INSERT INTO transaction VALUES('38',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-02','2024-09-02 04:42:01',NULL,'2024-09-11','2024-09-11 01:53:36','2024-09-11 01:53:36','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-02 11:26:37','00:00:00',NULL);
INSERT INTO transaction VALUES('39',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-02','2024-09-02 04:41:48',NULL,'2024-09-11','2024-09-11 01:53:58','2024-09-11 01:53:58','0000-00-00 00:00:00','0000-00-00 00:00:00','ongoing','2024-09-02 11:26:37','00:00:00',NULL);
INSERT INTO transaction VALUES('40',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-07','2024-09-07 03:02:00',NULL,'2024-09-11','2024-09-11 01:55:24','2024-09-11 01:55:24',NULL,NULL,'ongoing','2024-09-02 11:26:37','00:00:00',NULL);
INSERT INTO transaction VALUES('41',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-06','2024-09-06 14:48:15',NULL,'2024-09-11','2024-09-11 01:59:27','2024-09-11 01:59:27',NULL,NULL,'ongoing','2024-09-02 11:26:37','00:00:00',NULL);
INSERT INTO transaction VALUES('42',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','2024-09-06','2024-09-06 14:47:40',NULL,'2024-09-11','2024-09-11 02:00:19','2024-09-11 02:00:19',NULL,NULL,'ongoing','2024-09-02 11:26:37','107:12:39',NULL);
INSERT INTO transaction VALUES('43',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','2024-09-06','2024-09-06 14:47:36',NULL,'2024-09-11','2024-09-11 02:00:25','2024-09-11 02:00:25',NULL,NULL,'ongoing','2024-09-02 11:26:37','107:12:49',NULL);
INSERT INTO transaction VALUES('44','4242','1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,'candon','2024-09-06','2024-09-06 14:45:44',NULL,'2024-09-11','2024-09-11 01:55:39','2024-09-11 01:55:39',NULL,NULL,'ongoing','2024-09-02 11:27:47','00:00:00',NULL);
INSERT INTO transaction VALUES('45',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-06','2024-09-06 14:45:13',NULL,NULL,NULL,NULL,NULL,NULL,'queue','2024-09-03 12:43:33',NULL,NULL);
INSERT INTO transaction VALUES('46','44','12','8','7','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-06','2024-09-06 14:44:23',NULL,NULL,NULL,NULL,NULL,NULL,'arrived','2024-09-03 12:44:21',NULL,NULL);
INSERT INTO transaction VALUES('49',NULL,'1','3','1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-07','2024-09-07 02:04:00',NULL,NULL,NULL,NULL,NULL,NULL,'arrived','2024-09-07 11:17:29',NULL,NULL);
INSERT INTO transaction VALUES('50',NULL,'1','3','1','1','1','1st','day','6am-2pm',NULL,NULL,NULL,'2024-09-07','2024-09-07 11:09:00',NULL,NULL,NULL,NULL,NULL,NULL,'queue','2024-09-07 11:19:42',NULL,NULL);
INSERT INTO transaction VALUES('51',NULL,'1','3','1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'departed','2024-09-07 11:20:46',NULL,NULL);
INSERT INTO transaction VALUES('52',NULL,'1','3','1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'departed','2024-09-07 11:20:47',NULL,NULL);
INSERT INTO transaction VALUES('53',NULL,'1','3','1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'departed','2024-09-07 11:20:48',NULL,NULL);
INSERT INTO transaction VALUES('54',NULL,'1','3','1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'departed','2024-09-07 11:49:26',NULL,NULL);


CREATE TABLE `unloading` (
  `unloading_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_of_entry` datetime NOT NULL,
  `unloading_time_start` datetime NOT NULL,
  `unloading_time_end` datetime NOT NULL,
  `time_of_departure` datetime NOT NULL,
  PRIMARY KEY (`unloading_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES('1','1','2','3','4','$2y$10$.DrIxugTs.Wyt2mx2se4K.ze7xBjbc966ryr3LB5/QkBzGgQwLB3q','encoder','1');
INSERT INTO users VALUES('2',NULL,'hm','wtf11','hm1','$2y$10$J4svuFcXZpb731LoJb4WF.fPOZlO7LlYRaoqhKwubvP','admin','1');
INSERT INTO users VALUES('3','techer1','mahrex1','bunagan bruh','lerio','$2y$10$LEtWXMinO/.1wkTJGzjmMOl.C8qg6XK/incDQADSbCxUpMlorKTNS','admin','1');
INSERT INTO users VALUES('10','admin','admin','admin','admin','$2y$10$FBwDsl7q/8XU7mv6buRLFOr9A9cYWUhOWwZF1vWsUPaSci9hHtL/W','admin','1');
INSERT INTO users VALUES('11',NULL,'ethan','1234','fontanilla','$2y$10$4FEkUlIyhXrAFbLyq24FeOj/lp.ERZ94xyxznFXAAS.eexKmxkzIW','admin','1');
INSERT INTO users VALUES('12',NULL,'1111','1111','1111','$2y$10$ResD1exdsoiMLFgtYAeoiurVSUdSQuqhIlkI1ELbZRVCTKT.3qIrO','admin',NULL);
INSERT INTO users VALUES('13',NULL,'5555','5555','5555','$2y$10$MDEhpVWcQPeQGoHwj/Kjs.LyyEfwukz39hpCcDBkjr2hL9aN85a/W','admin','1');
INSERT INTO users VALUES('14',NULL,'ethan','fontanilla','fontanilla','$2y$10$74wMdGbyWPEh2WHxb.v8SOQN84Bdc5V5FALfq5K1SZlGWXoypAQKq','admin','1');
INSERT INTO users VALUES('15',NULL,'a','a','a','$2y$10$Xd9VcesSKEs.XkVq69EQV.Swc5RniOzFs5XVbi3VDi6JovppJGaP.','admin',NULL);
INSERT INTO users VALUES('16',NULL,'b','b','a','$2y$10$ia5/0YHdfvY1uUg.Q9wrA.xDiogH/nfqbrpks21nRYykK.qvH45Oe','admin','1');
INSERT INTO users VALUES('17',NULL,'c','c','c','$2y$10$yXGwEXvnk6U5dM0dNm0Pleg369eQvJowjpiPi/pF.xbjSc5XVqmeO','admin','1');
INSERT INTO users VALUES('18',NULL,NULL,NULL,NULL,'$2y$10$2y5HtuV8wVPKpXjgJkw71eZagSEOQLsG3E/xDyTh4975opykeOm7u','admin','1');
INSERT INTO users VALUES('19',NULL,'e',NULL,NULL,'$2y$10$rY9WuXMZSxyY/.7XbqIZWuJBXus53F7.FyYf9EORKiOnOdlmDmXZy','admin',NULL);
INSERT INTO users VALUES('20',NULL,'asdf','asdf','dgasdg','$2y$10$oz1lVGIIUt4adtorPxAOIeP9oQLSNYJJcdsRAf/0iM7AjhB5yS4dC',NULL,'1');
INSERT INTO users VALUES('21',NULL,'asdfasdg','asdf','dgasdg','$2y$10$Q.9CKzviAYws/7XJl4ZSZeC80dqjxSVPqjeHbNGhfYIeA03L7z7V2','admin','1');
INSERT INTO users VALUES('22',NULL,'lerio','mahrex','asf','$2y$10$/dn7U1MLbnX6mPGF7qwAUePo1E.OCeS/nPyGcko2P7JS8/foi/TWW','admin','1');
INSERT INTO users VALUES('23',NULL,'ethan1','fbos','okf','$2y$10$2es1GVBpum.5GZ0hiODoHeknDJn8Iet1eduzkMtxrwcp2HzUaGF/q','admin',NULL);
INSERT INTO users VALUES('24',NULL,'baro','baro','baro','$2y$10$mTNe3w4UYYHIi.vVU9NVHe9.uT7MmbOGKZ6sHHMDxWa/6AYLGO04y','admin','1');
INSERT INTO users VALUES('25',NULL,'john3','doe3','d3','$2y$10$FnzCYJaVXYu75SUDSZX05OhoZj7yrQ8tAVNXQFktVLx2xbOTfH0E6','admin','1');
INSERT INTO users VALUES('26','JohnDoe','Joe','Mama','Mama','$2y$10$DV.6pNxmQBh21kthVOuXruXvMHAgjMd1MZT6PecqhjecbV7z/vpsO','admin','1');
INSERT INTO users VALUES('27','JohnDoe1','John','John','Doe','$2y$10$jHQYGR7YseOwD0xJRzAJ/OlvyEOj3eSVFX3S0OmBq3zOXnKBlNMzG','admin','1');
INSERT INTO users VALUES('28','1235','1351','135','12351','$2y$10$uSlZrt1p1IniiIEFv61cuOVkqZTLcqEZ9ERAIf19P8W9QsjxWYrpK','admin','1');
INSERT INTO users VALUES('29','dsag','adf','sag','ad','$2y$10$fmIgMEtR/CZJv0WeIEAq8uJK2B3ZjaYIisazyYwXuzk1rms8Yncm2','admin','1');
INSERT INTO users VALUES('30','encoder','encoder','encoder','encoder','$2y$10$btcSfbbQPFUTSzd17HbUXuc6M.utU/CjT2P.ZyHj3ySPPbiknNmcG','encoder','1');
INSERT INTO users VALUES('31','tech','tech','tech','tech','$2y$10$qboPgnu1n5SrXxTbmD1eduvNHF9VF.n.YXFFlfZ0yoRtb0ke/bF2W','traffic(main)','1');
INSERT INTO users VALUES('32','traffic','traffic','traffic','traffic','$2y$10$N2c71yTTaTeeNP6h36RktO3C91PtdKy/r9kqcVa5tnXzFZ6zuwrqi','traffic(branch)','1');
INSERT INTO users VALUES('33','4124124','124','124','14','$2y$10$JDQt771MgVgVnYYSwyZNJ.8N/GgTbcavasTPELe0PxUTu/4O.ycvG','admin','1');
INSERT INTO users VALUES('34','42421','412421','412412','124214','$2y$10$OdHv20j0oqHd5xDDtMDnueS3oKF9zCHJ50y4Ditb0XtfDLGyTlz1a','admin','1');
INSERT INTO users VALUES('35','421421','4124124','2141','21421','$2y$10$OwhCAGNdGsK4iiOX1mYlk.pLZy3GYvOJdyqC7Q1ZXjWRLJmCOQ7la','admin','1');
INSERT INTO users VALUES('36','you','youy','you','you','$2y$10$8GAl.eSKnUui8baetatIIOtiCbkrSe1eJiDWlxFgNcG1oYSOxDYfa','admin','1');
INSERT INTO users VALUES('37','421','12','31','131','$2y$10$6yuJ.fYDgpJFCj.CUHPMWuJvmpBQeaXVToJFwp7ePMhNpEDZpBV0S','admin','1');
INSERT INTO users VALUES('38','123','123','123','23','$2y$10$ee/P/sSNfUsLGUOQkNk8Vu9hAGzkDUNzmEf.xaaGfVwFgrU2rNKIG','admin','1');


CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(50) NOT NULL,
  `truck_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vehicle VALUES('3','1234','trailer');
INSERT INTO vehicle VALUES('4','4545','4545');
INSERT INTO vehicle VALUES('5','412','Trailer');
INSERT INTO vehicle VALUES('6','32','Others');
INSERT INTO vehicle VALUES('7','421','124');
INSERT INTO vehicle VALUES('8','43','Elf');
INSERT INTO vehicle VALUES('9','521','Trailer');
INSERT INTO vehicle VALUES('10','443','others');
INSERT INTO vehicle VALUES('11','124','Trailer');
