

CREATE TABLE `arrival` (
  `arrival_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_time` datetime DEFAULT NULL,
  PRIMARY KEY (`arrival_id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `arrival_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO arrival VALUES('11','67','2024-09-22','2024-09-22 10:27:00');
INSERT INTO arrival VALUES('12','68','2024-09-22','2024-09-22 10:28:00');
INSERT INTO arrival VALUES('13','69','2024-09-22','2024-09-22 10:56:25');
INSERT INTO arrival VALUES('14','70','2024-09-23','2024-09-23 12:44:00');


CREATE TABLE `demurrage` (
  `demurrage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO demurrage VALUES('102');


CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_fname` varchar(255) NOT NULL,
  `driver_mname` varchar(255) DEFAULT NULL,
  `driver_lname` varchar(255) DEFAULT NULL,
  `driver_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO driver VALUES('9','d','s','2','32');


CREATE TABLE `hauler` (
  `hauler_id` int(11) NOT NULL AUTO_INCREMENT,
  `hauler_name` varchar(255) NOT NULL,
  `hauler_address` varchar(255) NOT NULL,
  PRIMARY KEY (`hauler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO hauler VALUES('15','jvc trucking','agoo');


CREATE TABLE `helper` (
  `helper_id` int(11) NOT NULL AUTO_INCREMENT,
  `helper_fname` varchar(255) DEFAULT NULL,
  `helper_mname` varchar(255) DEFAULT NULL,
  `helper_lname` varchar(255) DEFAULT NULL,
  `helper_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`helper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO helper VALUES('5','sd','fs','21','2');


CREATE TABLE `origin` (
  `origin_id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`origin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO origin VALUES('1','origin');


CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO project VALUES('3','lp','project');


CREATE TABLE `queue` (
  `queue_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `queue_number` int(11) DEFAULT NULL,
  `ordinal` enum('1st','2nd','3rd','3rd/1st') DEFAULT NULL,
  `shift` enum('day','night','day/night') DEFAULT NULL,
  `schedule` enum('6am-2pm','2pm-6am','6am-2pm/2pm-6am') DEFAULT NULL,
  `transfer_in_line` enum('Line 3','Line 4','Line 5','Line 6','GLAD WHSE','WHSE 2-BAY 2','WHSE 2-BAY 3') DEFAULT NULL,
  `priority` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`queue_id`),
  KEY `transaction_id` (`transaction_id`) USING BTREE,
  CONSTRAINT `queue_transaction_fk` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO queue VALUES('9','67','3','1st','day','6am-2pm','Line 3','1');
INSERT INTO queue VALUES('10','68','2','1st','day','6am-2pm','Line 4','1');
INSERT INTO queue VALUES('11','69','69','3rd','night','6am-2pm/2pm-6am','WHSE 2-BAY 2',NULL);


CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_reference` varchar(50) NOT NULL,
  `hauler_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `helper_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `no_of_bales` int(11) DEFAULT NULL,
  `kilos` int(11) DEFAULT NULL,
  `time_spent_waiting_area` time DEFAULT NULL,
  `status` enum('done','ongoing','arrived','departed','queue') DEFAULT 'departed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`transaction_id`),
  KEY `hauler_id` (`hauler_id`),
  KEY `vehicle_id` (`vehicle_id`),
  KEY `driver_id` (`driver_id`),
  KEY `project_id` (`project_id`),
  KEY `origin_id` (`origin_id`) USING BTREE,
  KEY `helper_id` (`helper_id`) USING BTREE,
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`hauler_id`) REFERENCES `hauler` (`hauler_id`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`),
  CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  CONSTRAINT `transaction_ibfk_5` FOREIGN KEY (`origin_id`) REFERENCES `origin` (`origin_id`),
  CONSTRAINT `transaction_ibfk_6` FOREIGN KEY (`helper_id`) REFERENCES `helper` (`helper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO transaction VALUES('67','42','15','13','9','5','3','1','42442','42',NULL,'queue','2024-09-22 10:27:29');
INSERT INTO transaction VALUES('68','324','15','13','9','5','3','1','33','22',NULL,'done','2024-09-22 10:28:36');
INSERT INTO transaction VALUES('69',NULL,'15','13','9','5','3','1',NULL,NULL,NULL,'queue','2024-09-22 10:55:34');
INSERT INTO transaction VALUES('70','42','15','13','9','5','3','1','42','42',NULL,'arrived','2024-09-23 12:45:02');


CREATE TABLE `unloading` (
  `unloading_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `time_of_entry` datetime DEFAULT NULL,
  `unloading_time_start` datetime DEFAULT NULL,
  `unloading_time_end` datetime DEFAULT NULL,
  `time_of_departure` datetime DEFAULT NULL,
  PRIMARY KEY (`unloading_id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `unloading_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO unloading VALUES('19','68','2024-09-23 07:11:44','2024-09-23 07:11:44','2024-09-23 14:01:00','2024-09-23 14:01:00');


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
INSERT INTO users VALUES('3','techer1','mahrex1','bunagan bruh','lerio','$2y$10$LEtWXMinO/.1wkTJGzjmMOl.C8qg6XK/incDQADSbCxUpMlorKTNS','admin','1');
INSERT INTO users VALUES('10','admin','admin','admin','admin','$2y$10$FBwDsl7q/8XU7mv6buRLFOr9A9cYWUhOWwZF1vWsUPaSci9hHtL/W','admin','1');
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
  `hauler_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`),
  KEY `hauler_id` (`hauler_id`),
  CONSTRAINT `hauler_id` FOREIGN KEY (`hauler_id`) REFERENCES `hauler` (`hauler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vehicle VALUES('13','59','Trailer','15');
