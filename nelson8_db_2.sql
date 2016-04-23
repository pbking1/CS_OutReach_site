use nelson8_db;

create table K12_REQUESTOR_EVENT(
	requestor_name varchar(255),
	requestor_contact varchar(255),
	event_title varchar(255),
	month integer,
	day integer,
	year integer,
	startHour integer,
	startMin integer,
	startAMPM varchar(5),
	endHour integer,
	endMin integer,
	endAMPM varchar(5),
	note varchar(255)
);

DELIMITER $$

CREATE DEFINER=`nelson8`@`localhost` PROCEDURE `K12_REQUESTOR_INSERT_EVENT` (IN `requestor_name` varchar(255), IN `requestor_contact` varchar(255), IN `event_title` varchar(255), IN `month` integer, IN `day` integer, IN `year` integer, IN `startHour` integer, IN `startMin` integer, IN `startAMPM` varchar(5), IN `endHour` integer, IN `endMin` integer, IN `endAMPM` varchar(5), IN `note` varchar(255))
INSERT INTO `nelson8_db`.`K12_REQUESTOR_EVENT`  (`requestor_name`, `requestor_contact`, `event_title`, `month`, `day`, `year`, `startHour`, `startMin`, `startAMPM`, `endHour`, `endMin`, `endAMPM`, `note`) VALUES (requestor_name, requestor_contact, event_title, month, day, year, startHour, startMin, startAMPM, endHour, endMin, endAMPM, note)$$


