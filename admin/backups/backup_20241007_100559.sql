

CREATE TABLE `arrival` (
  `arrival_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`arrival_id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `arrival_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO arrival VALUES('11','67','2024-09-22','2024-09-22 10:27:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('12','68','2024-09-22','2024-09-22 10:28:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('13','69','2024-09-22','2024-09-22 10:56:25','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('14','70','2024-09-23','2024-09-23 12:44:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('15','71','2024-09-23','2024-09-23 18:51:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('16','72','2024-09-23','2024-09-23 06:42:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('17','73','2024-09-23','2024-09-23 07:58:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('18','74','2024-09-23','2024-09-23 05:56:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('19','75','2024-09-25','2024-09-25 05:55:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('20','76','2024-09-25','2024-09-25 05:05:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('21','77','2024-09-25','2024-09-25 06:23:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('22','78','2024-09-25','2024-09-25 05:23:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('23','79','2024-09-25','2024-09-25 05:05:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('24','80','2024-09-25','2024-09-25 04:02:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('25','81','2024-09-25','2024-09-25 05:05:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('26','82','2024-09-25','2024-09-25 05:02:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('27','83','2024-09-22','2024-09-22 08:45:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('28','84','2024-09-23','2024-09-23 05:05:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('29','85','2024-09-25','2024-09-25 05:02:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('30','86','2024-10-02','2024-10-02 00:09:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('31','87','2024-10-02','2024-10-02 13:01:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('32','88','2024-10-02','2024-10-02 13:42:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('33','89','2024-10-02','2024-10-02 21:03:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('34','93','2024-10-02','2024-10-02 10:30:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('35','100','2024-09-30','2024-09-30 16:10:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('36','99','2024-09-30','2024-09-30 16:10:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('37','98','2024-09-30','2024-09-30 15:30:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('38','97','2024-10-02','2024-10-02 18:21:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('39','101','2024-10-02','2024-10-02 07:44:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('40','96','2024-10-04','2024-10-04 08:53:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('41','95','2024-10-04','2024-10-04 12:45:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('42','94','2024-10-04','2024-10-04 13:00:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('43','102','2024-10-04','2024-10-04 22:03:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('44','103','2024-10-04','2024-10-04 23:02:00','2024-10-04 13:11:19');
INSERT INTO arrival VALUES('45','104','2024-10-04','2024-10-04 12:01:00','2024-10-04 13:21:44');


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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO driver VALUES('9','d','s','2','32','2024-10-04 13:11:41');
INSERT INTO driver VALUES('10','mm','ss','saa','29391019','2024-10-04 13:11:41');


CREATE TABLE `hauler` (
  `hauler_id` int(11) NOT NULL AUTO_INCREMENT,
  `hauler_name` varchar(255) NOT NULL,
  `hauler_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`hauler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO hauler VALUES('15','jvc trucking','agoo','2024-10-04 13:11:58');
INSERT INTO hauler VALUES('16','mygoat truck','agoo','2024-10-04 13:11:58');


CREATE TABLE `helper` (
  `helper_id` int(11) NOT NULL AUTO_INCREMENT,
  `helper_fname` varchar(255) DEFAULT NULL,
  `helper_mname` varchar(255) DEFAULT NULL,
  `helper_lname` varchar(255) DEFAULT NULL,
  `helper_phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`helper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO helper VALUES('5','sd','fs','21','2','2024-10-04 13:12:28');
INSERT INTO helper VALUES('6','jfjf','jgjgh','jhdhhd','1212124','2024-10-04 13:12:28');


CREATE TABLE `origin` (
  `origin_id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`origin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO origin VALUES('1','origin','2024-10-04 13:12:41');
INSERT INTO origin VALUES('2','orignal','2024-10-04 13:12:41');
INSERT INTO origin VALUES('3','nayon','2024-10-04 13:12:41');


CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO project VALUES('3','lp','project','2024-10-04 13:12:54');
INSERT INTO project VALUES('4','pro','myproject','2024-10-04 13:12:54');


CREATE TABLE `queue` (
  `queue_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `queue_number` int(11) DEFAULT NULL,
  `ordinal` enum('1st','2nd','3rd','3rd/1st') DEFAULT NULL,
  `shift` enum('day','night','day/night') DEFAULT NULL,
  `schedule` enum('6am-2pm','2pm-6am','6am-2pm/2pm-6am') DEFAULT NULL,
  `transfer_in_line` enum('Line 3','Line 4','Line 5','Line 6','GLAD WHSE','WHSE 2-BAY 2','WHSE 2-BAY 3') DEFAULT NULL,
  `priority` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`queue_id`),
  KEY `transaction_id` (`transaction_id`) USING BTREE,
  CONSTRAINT `queue_transaction_fk` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO queue VALUES('9','67','3','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('10','68','2','1st','day','6am-2pm','Line 4','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('11','69','69','3rd','night','6am-2pm/2pm-6am','WHSE 2-BAY 2',NULL,'2024-10-03 13:13:06');
INSERT INTO queue VALUES('12','70','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('13','71','11','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('14','72','11','2nd','night','2pm-6am','Line 5',NULL,'2024-10-03 13:13:06');
INSERT INTO queue VALUES('15','73','11','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('16','74','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('17','75','12','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('18','76','42','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('19','77','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('20','78','12','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('21','79','42','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('22','80','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('23','81','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('24','82','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('25','83','21','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('26','84','4','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('27','85','12','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('28','86','23','2nd','night','2pm-6am','Line 6','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('29','87','6','1st','day','6am-2pm','Line 3',NULL,'2024-10-03 13:13:06');
INSERT INTO queue VALUES('30','88','32','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('31','89','66','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('32','93','88','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('33','100','22','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('34','99','21','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('35','98','42','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('36','97','55','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('37','101','3','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('38','96','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('39','95','22','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('40','94','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('41','102','23','1st','day','6am-2pm','Line 3','1','2024-10-03 13:13:06');
INSERT INTO queue VALUES('42','103','55','1st','day','6am-2pm','Line 3','1','2024-10-04 13:19:33');
INSERT INTO queue VALUES('43','104','12','1st','day','6am-2pm','Line 3',NULL,'2024-10-04 14:32:07');


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
  `time_spent_waiting_area` varchar(255) DEFAULT NULL,
  `demurrage` varchar(255) DEFAULT NULL,
  `status` enum('done','ongoing','arrived','departed','queue','standby') DEFAULT 'departed',
  `time_of_departure` datetime DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO transaction VALUES('67','42','15','13','9','5','3','1','42442','42',NULL,NULL,'done',NULL,'2024-09-22 10:27:29');
INSERT INTO transaction VALUES('68','324','15','13','9','5','3','1','33','22',NULL,NULL,'done',NULL,'2024-09-22 10:28:36');
INSERT INTO transaction VALUES('69',NULL,'15','13','9','5','3','1',NULL,NULL,'00:00:00','1428','done',NULL,'2024-09-22 10:55:34');
INSERT INTO transaction VALUES('70','42','15','13','9','5','3','1','42','42','00:00:37',NULL,'ongoing',NULL,'2024-09-23 12:45:02');
INSERT INTO transaction VALUES('71','3242','15','13','9','5','3','1','22','33','00:00:05',NULL,'ongoing',NULL,'2024-09-25 07:48:33');
INSERT INTO transaction VALUES('72','4242','15','13','9','5','3','1','22','22','00:00:43',NULL,'ongoing',NULL,'2024-09-23 06:42:44');
INSERT INTO transaction VALUES('73','42','15','13','9','5','3','1','22','22','00:00:43',NULL,'ongoing',NULL,'2024-09-23 06:40:50');
INSERT INTO transaction VALUES('74','222','15','13','9','5','3','1','33','44','-00:00:06',NULL,'ongoing',NULL,'2024-09-25 08:01:36');
INSERT INTO transaction VALUES('75','21','15','13','9','5','3','1','32','44','-00:00:04',NULL,'ongoing',NULL,'2024-09-25 08:04:36');
INSERT INTO transaction VALUES('76','12','15','13','9','5','3','1','42','32','-00:00:03',NULL,'ongoing',NULL,'2024-09-25 08:09:44');
INSERT INTO transaction VALUES('77','22','15','13','9','5','3','1','11','23','-00:00:07',NULL,'done',NULL,'2024-09-25 08:16:34');
INSERT INTO transaction VALUES('78','42','15','13','9','5','3','1','42','12','00:00:02',NULL,'done',NULL,'2024-09-25 08:22:08');
INSERT INTO transaction VALUES('79','42','15','13','9','5','3','1','12','31','00:00:03',NULL,'ongoing',NULL,'2024-09-25 08:24:08');
INSERT INTO transaction VALUES('80','42','15','13','9','5','3','1','13','213','00:00:04',NULL,'ongoing',NULL,'2024-09-25 08:35:28');
INSERT INTO transaction VALUES('81','242','15','13','9','5','3','1','412','12412','-00:00:03',NULL,'ongoing',NULL,'2024-09-25 08:40:43');
INSERT INTO transaction VALUES('82','42','15','13','9','5','3','1','412','421','00:00:03',NULL,'ongoing',NULL,'2024-09-25 08:44:38');
INSERT INTO transaction VALUES('83','42','15','13','9','5','3','1','1241','4124','00:00:00','2448','done',NULL,'2024-09-25 08:45:16');
INSERT INTO transaction VALUES('84','42','15','13','9','5','3','1','12','32','00:00:51','306','done',NULL,'2024-09-25 08:48:21');
INSERT INTO transaction VALUES('85','32','15','13','9','5','3','1','42','42','3',NULL,'done',NULL,'2024-09-25 08:50:11');
INSERT INTO transaction VALUES('86','3242','15','13','9','5','3','1','421','2132','16',NULL,'standby',NULL,'2024-10-02 13:29:25');
INSERT INTO transaction VALUES('87','242','15','13','9',NULL,'3','1','321','421',NULL,NULL,'ongoing',NULL,'2024-10-02 13:30:43');
INSERT INTO transaction VALUES('88','42','15','13','9','5','3','1','21','32','3',NULL,'standby',NULL,'2024-10-02 13:34:37');
INSERT INTO transaction VALUES('89','242','15','13','9',NULL,'3','1','321','421','-4',NULL,'standby',NULL,'2024-10-02 13:43:27');
INSERT INTO transaction VALUES('93','69','15','13','9','5','3','1','69','69','6',NULL,'standby',NULL,'2024-10-02 15:40:20');
INSERT INTO transaction VALUES('94','32','15','13','9',NULL,'3','1','42','12',NULL,NULL,'queue','0000-00-00 00:00:00','2024-10-02 16:31:33');
INSERT INTO transaction VALUES('95','699','15','13','9',NULL,'3','1','32','32',NULL,NULL,'ongoing','2024-10-02 04:33:00','2024-10-02 16:33:34');
INSERT INTO transaction VALUES('96','699','15','13','9',NULL,'3','1','32','32','4',NULL,'ongoing','2024-10-02 04:33:00','2024-10-02 16:33:34');
INSERT INTO transaction VALUES('97','221','15','13','9','5','3','1','32','32','2',NULL,'standby','2024-10-02 09:09:00','2024-10-02 16:37:46');
INSERT INTO transaction VALUES('98','69999','15','13','9','5','3','1','69','69','49','200.005','ongoing','2024-10-02 16:39:00','2024-10-02 16:39:40');
INSERT INTO transaction VALUES('99','499999','15','13','9','5','3','1','494','4949','49','109.82','ongoing','2024-10-24 16:41:00','2024-10-02 16:41:12');
INSERT INTO transaction VALUES('100','9992','15','13','9','5','3','1','92','92','49',NULL,'ongoing','2024-10-02 16:43:00','2024-10-02 16:43:45');
INSERT INTO transaction VALUES('101','13','15','13','9','5','3','1','42','42','53','579.785','ongoing',NULL,'2024-10-02 19:44:18');
INSERT INTO transaction VALUES('102','321','15','13','9','5','3','1','23','23','-9',NULL,'ongoing',NULL,'2024-10-04 13:03:13');
INSERT INTO transaction VALUES('103','23','15','13','9','5','3','1','23','23',NULL,NULL,'queue',NULL,'2024-10-04 13:05:37');
INSERT INTO transaction VALUES('104','12','15','13','9','5','3','1','32','42',NULL,NULL,'queue',NULL,'2024-10-04 13:21:44');


CREATE TABLE `unloading` (
  `unloading_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `time_of_entry` datetime DEFAULT NULL,
  `unloading_time_start` datetime DEFAULT NULL,
  `unloading_time_end` datetime DEFAULT NULL,
  `time_of_departure` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`unloading_id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `unloading_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO unloading VALUES('19','68','2024-09-23 07:11:44','2024-09-23 07:11:44','2024-09-23 14:01:00','2024-09-23 14:01:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('20','67','2024-09-25 00:49:03','2024-09-25 00:49:03','2024-09-25 08:34:00','2024-09-25 08:34:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('21','69','2024-09-25 01:45:04','2024-09-25 01:45:04','2024-09-25 08:34:00','2024-09-25 08:34:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('22','70','2024-09-25 01:47:48','2024-09-25 01:47:48',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('23','71','2024-09-25 01:49:35','2024-09-25 01:49:35',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('24','72','2024-09-25 01:52:14','2024-09-25 01:52:14',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('25','73','2024-09-25 01:59:15','2024-09-25 01:59:15',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('26','73','2024-09-25 01:59:15','2024-09-25 01:59:15',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('27','74','2024-09-25 02:01:44','2024-09-25 02:01:44',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('28','75','2024-09-25 02:04:47','2024-09-25 02:04:47',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('29','76','2024-09-25 06:10:00','2024-09-25 06:10:00',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('30','77','2024-09-25 00:17:12','2024-09-25 00:17:12','2024-09-25 08:34:00','2024-09-25 08:34:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('31','78','0000-00-00 00:00:00','0000-00-00 00:00:00','2024-09-25 08:34:00','2024-09-25 08:34:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('32','79','2024-09-25 08:26:00','2024-09-25 08:26:00',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('33','80','2024-09-25 08:35:00','2024-09-25 08:35:00',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('34','81','2024-09-25 02:40:56','2024-09-25 02:40:56',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('35','82','2024-09-25 08:44:45','2024-09-25 08:44:45',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('36','83','2024-09-25 08:45:22','2024-09-25 08:45:22','2024-09-25 08:54:00','2024-09-25 08:54:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('37','84','2024-09-25 08:48:27','2024-09-25 08:48:27','2024-09-25 08:54:00','2024-09-25 08:54:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('38','85','2024-09-25 08:50:43','2024-09-25 08:50:43','2024-09-25 08:54:00','2024-09-25 08:54:00','2024-10-04 13:13:19');
INSERT INTO unloading VALUES('39','87','2024-10-02 13:38:27','2024-10-02 13:38:27',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('40','86','2024-10-02 16:57:03','2024-10-02 16:57:03',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('41','88','2024-10-02 17:03:23','2024-10-02 17:03:23',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('42','89','2024-10-02 17:06:50','2024-10-02 17:06:50',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('43','93','2024-10-02 17:07:11','2024-10-02 17:07:11',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('44','100','2024-10-02 17:13:32','2024-10-02 20:37:00',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('45','99','2024-10-02 17:14:36','2024-10-02 20:35:00',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('46','98','2024-10-02 17:27:39','2024-10-02 20:33:00',NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('47','97','2024-10-02 20:43:56',NULL,NULL,NULL,'2024-10-04 13:13:19');
INSERT INTO unloading VALUES('48','101','2024-10-04 13:25:03','2024-10-07 16:05:00',NULL,NULL,'2024-10-07 16:05:26');
INSERT INTO unloading VALUES('49','96','2024-10-04 13:28:35','2024-10-04 13:31:00',NULL,NULL,'2024-10-04 13:31:43');
INSERT INTO unloading VALUES('50','95','2024-10-04 13:29:00','2024-10-04 13:30:00',NULL,NULL,'2024-10-04 13:31:30');
INSERT INTO unloading VALUES('51','102','2024-10-04 13:29:30','2024-10-04 13:30:00',NULL,NULL,'2024-10-04 13:30:20');


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES('1','134','242','31','412','$2y$10$L6HLKGSrM88OLBfOSTTziuG6kQVD8JWckoTbDZuazTcjzKx.DNjCK','traffic(branch)','1','2024-10-04 14:51:06');
INSERT INTO users VALUES('3','techer1','mahrex1','bunagan bruh','lerio','$2y$10$LEtWXMinO/.1wkTJGzjmMOl.C8qg6XK/incDQADSbCxUpMlorKTNS','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('10','admin','admin','admin','admin','$2y$10$FBwDsl7q/8XU7mv6buRLFOr9A9cYWUhOWwZF1vWsUPaSci9hHtL/W','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('26','JohnDoe','Joe','Mama','Mama','$2y$10$DV.6pNxmQBh21kthVOuXruXvMHAgjMd1MZT6PecqhjecbV7z/vpsO','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('27','JohnDoe1','John','John','Doe','$2y$10$jHQYGR7YseOwD0xJRzAJ/OlvyEOj3eSVFX3S0OmBq3zOXnKBlNMzG','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('28','1235','1351','135','12351','$2y$10$uSlZrt1p1IniiIEFv61cuOVkqZTLcqEZ9ERAIf19P8W9QsjxWYrpK','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('29','dsag','adf','sag','ad','$2y$10$fmIgMEtR/CZJv0WeIEAq8uJK2B3ZjaYIisazyYwXuzk1rms8Yncm2','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('30','encoder','encoder','encoder','encoder','$2y$10$btcSfbbQPFUTSzd17HbUXuc6M.utU/CjT2P.ZyHj3ySPPbiknNmcG','encoder','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('31','tech','tech','tech','tech','$2y$10$qboPgnu1n5SrXxTbmD1eduvNHF9VF.n.YXFFlfZ0yoRtb0ke/bF2W','traffic(main)','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('32','traffic','traffic','traffic','traffic','$2y$10$N2c71yTTaTeeNP6h36RktO3C91PtdKy/r9kqcVa5tnXzFZ6zuwrqi','traffic(branch)','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('33','4124124','124','124','14','$2y$10$JDQt771MgVgVnYYSwyZNJ.8N/GgTbcavasTPELe0PxUTu/4O.ycvG','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('34','42421','412421','412412','124214','$2y$10$OdHv20j0oqHd5xDDtMDnueS3oKF9zCHJ50y4Ditb0XtfDLGyTlz1a','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('35','421421','4124124','2141','21421','$2y$10$OwhCAGNdGsK4iiOX1mYlk.pLZy3GYvOJdyqC7Q1ZXjWRLJmCOQ7la','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('36','you','youy','you','you','$2y$10$8GAl.eSKnUui8baetatIIOtiCbkrSe1eJiDWlxFgNcG1oYSOxDYfa','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('37','421','12','31','131','$2y$10$6yuJ.fYDgpJFCj.CUHPMWuJvmpBQeaXVToJFwp7ePMhNpEDZpBV0S','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('38','123','123','123','23','$2y$10$ee/P/sSNfUsLGUOQkNk8Vu9hAGzkDUNzmEf.xaaGfVwFgrU2rNKIG','admin','1','2024-10-04 13:13:34');
INSERT INTO users VALUES('39','asfas','asfs','ds','sasf','$2y$10$Xfn50Su7llqBJbjSsNdu2eay8VVlw14Rm6kNtM7GKw4SZyoRnjBNq','encoder','1','2024-10-04 14:45:20');
INSERT INTO users VALUES('40','geoge','geoge','geoge','geoge','$2y$10$8VXqPpi67uQk/SEjO9EKNew0mYQL.8qV0JQqyVJdhNUuWHkPDrMFK','traffic(branch)','1','2024-10-04 14:46:50');
INSERT INTO users VALUES('41','asd','ff','dd','aa','$2y$10$qDMez64VbjGX5E6xQ6K5XebuPBMYbUuhgx0ehTfovD1nf9UGFN14S','admin','1','2024-10-04 14:47:37');
INSERT INTO users VALUES('42','vzx','xcx','vzx','v','$2y$10$xS0Tgujhowu9bmiVQNR00.hPCJ8QoCFj96qc7YJEjS7U/zwBk0/0.','admin','1','2024-10-04 14:47:48');


CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(50) NOT NULL,
  `truck_type` varchar(50) DEFAULT NULL,
  `hauler_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`vehicle_id`),
  KEY `hauler_id` (`hauler_id`),
  CONSTRAINT `hauler_id` FOREIGN KEY (`hauler_id`) REFERENCES `hauler` (`hauler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vehicle VALUES('13','59','Trailer','15','2024-10-04 13:13:44');
INSERT INTO vehicle VALUES('14','99291','Forward','16','2024-10-04 13:13:44');
