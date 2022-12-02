DROP DATABASE IF EXISTS TravelAgencyDB;
CREATE DATABASE TravelAgencyDB;
USE TravelAgencyDB;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `id` INT unsigned AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL ,
    `password` VARCHAR(255) NOT NULL ,
    `date_created` DATETIME NOT NULL ,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

INSERT INTO `user` VALUES('id', 'testuserusername', 'password123', SYSDATE());

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
    `id` INT unsigned AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `date_of_birth` DATE NOT NULL ,
    `age` INT(3),
    `gender` VARCHAR(8) NOT NULL ,
    `phonenumber` BIGINT(50),
    `email` VARCHAR(50) NOT NULL ,
    `checkin` DATE NOT NULL ,
    `checkout` DATE NOT NULL ,
    `hotel` VARCHAR(255) NOT NULL ,
    `rooms` INT(3),
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8;

INSERT INTO `booking` VALUES(0,'testfirstname', 'testlastname', DATE('2001-03-20'), 20, 'Male', 87682384521, 'myemail.address@gmail.com', DATE('2022-01-20'), DATE('2022-01-30'), 'Half Moon, Jamaica', 1),
(1,'Khan', 'Yunis', DATE('2001-03-20'), 20, 'Male', 87682384521, 'myemail.address@gmail.com', DATE('2022-03-10'), DATE('2022-03-15'), 'Sugar Beach, A Viceroy Resort, St Lucia', 1),
(2,'Kyle', 'Pottinger', DATE('2001-03-20'), 20, 'Male', 87696754521, 'myemail.address@gmail.com', DATE('2022-03-10'), DATE('2022-03-20'), 'Hermitage Bay Hotel, Antigua', 2),
(3,'Tuseef', 'Graham', DATE('2001-03-20'), 20, 'Male', 87609094521, 'myemail.address@gmail.com', DATE('2022-05-9'), DATE('2022-03-13'),  'Half Moon, Jamaica', 2),
(4,'Dayna', 'Thomas', DATE('2001-03-20'), 20, 'Male', 87607074521, 'myemail.address@gmail.com', DATE('2022-07-01'), DATE('2022-07-05'), 'Sugar Beach, A Viceroy Resort, St Lucia', 1),
(5,'Janai', 'Anderson', DATE('2001-03-20'), 20, 'Male', 87667454521, 'myemail.address@gmail.com', DATE('2022-04-12'), DATE('2022-04-14'), 'Jade Mountain, St Lucia', 1),
(6,'Talia', 'Baker', DATE('2001-03-20'), 20, 'Female', 87655794521, 'myemail.address@gmail.com', DATE('2022-06-06'), DATE('2022-06-10'), 'Fairmont Royal Pavilion, Barbados', 2),
(7,'Gabrielle', 'Scott', DATE('2001-03-20'), 20, 'Female', 87688644521, 'myemail.address@gmail.com', DATE('2022-03-19'), DATE('2022-03-21'), 'Hermitage Bay Hotel, Antigua', 1),
(8,'Carl', 'Heron',DATE('2001-03-20'), 20, 'Male', 87680968521, 'myemail.address@gmail.com', DATE('2022-08-15'), DATE('2022-03-20'), 'Half Moon, Jamaica', 2),
(9,'Chris', 'Green', DATE('2001-03-20'), 20, 'Male', 8769278521, 'myemail.address@gmail.com', DATE('2022-08-03'), DATE('2022-08-06'), 'Fairmont Royal Pavilion, Barbados', 1),
(10,'Anthony', 'James', DATE('2001-03-20'), 20, 'Male', 87643814521, 'myemail.address@gmail.com', DATE('2022-01-09'), DATE('2022-01-14'),  'Sandals Emerald Bay,Bahamas', 1),
(11,'Angela', 'James', DATE('2001-03-20'), 20, 'Female', 87676214521, 'myemail.address@gmail.com', DATE('2022-10-10'), DATE('2022-10-13'), 'Jade Mountain, St Lucia', 2),
(12,'Ryan', 'Ebanks',  DATE('2001-03-20'), 20, 'Male', 87676494521, 'myemail.address@gmail.com', DATE('2022-09-19'), DATE('2022-03-22'), 'Half Moon, Jamaica', 2),
(13,'Jet', 'Blevins', DATE('2001-03-20'), 20, 'Male', 87612424521, 'myemail.address@gmail.com', DATE('2022-11-03'), DATE('2022-11-06'), 'Hermitage Bay Hotel, Antigua', 2),
(14,'Ramon', 'Cheesom', DATE('2001-03-20'), 20, 'Male', 87688764921, 'myemail.address@gmail.com', DATE('2022-03-20'), DATE('2022-03-22'), 'Fairmont Royal Pavilion, Barbados', 1),
(15,'Quintin', 'Wu', DATE('2001-03-20'), 20, 'Male', 87656729521, 'myemail.address@gmail.com', DATE('2022-12-23'), DATE('2022-12-26'), 'Sandals Emerald Bay, Bahamas', 1),
(16,'Joshua', 'Dixon', DATE('2001-03-20'), 20, 'Male', 87632144521, 'myemail.address@gmail.com', DATE('2022-02-11'), DATE('2022-02-13'), 'Jade Mountain, St Lucia', 1),
(17,'UI', 'Lewise',  DATE('2001-03-20'), 20, 'female', 87667894221, 'myemail.address@gmail.com', DATE('2022-10-14'), DATE('2022-10-16'), 'Half Moon, Jamaica', 2),
(18,'Carl-Christopher', 'Blane', DATE('2001-03-20'), 20, 'Male', 87687592521, 'myemail.address@gmail.com', DATE('2022-04-01'), DATE('2022-04-05'),  'Sandals Emerald Bay,Bahamas', 1),
(19,'Sydeon', 'Brown', DATE('2001-03-20'), 20, 'Female', 8768749521 , 'myemail.address@gmail.com', DATE('2022-01-01'), DATE('2022-01-05'), 'Hermitage Bay Hotel, Antigua', 2),
(20,'Sarah', 'Allen',  DATE('2001-03-20'), 20, 'Female', 8768749521, 'myemail.address@gmail.com', DATE('2022-05-05'), DATE('2022-05-10'),  'Sugar Beach, A Viceroy Resort, St Lucia', 2);

DROP TABLE IF EXISTS `priority1`;
CREATE TABLE `priority1` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `date_of_birth` DATE NOT NULL ,
    `age` INT(3),
    `gender` VARCHAR(8) NOT NULL ,
    `phonenumber` BIGINT(50),
    `email` VARCHAR(50) NOT NULL ,
    `checkin` DATE NOT NULL ,
    `checkout` DATE NOT NULL ,
    `hotel` VARCHAR(255) NOT NULL ,
    `rooms` INT(3),
    `priority` INT(11) NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `priority1` VALUES(0,'testfirstname', 'testlastname', DATE('2001-03-20'), 20, 'Male', 87682384521, 'myemail.address@gmail.com', DATE('2022-01-20'), DATE('2022-01-30'), 'Half Moon, Jamaica', 1, 0),
(1,'Khan', 'Yunis', DATE('2001-03-20'), 20, 'Male', 87682384521, 'myemail.address@gmail.com', DATE('2022-03-10'), DATE('2022-03-15'), 'Sugar Beach, A Viceroy Resort, St Lucia', 1, 0),
(2,'Kyle', 'Pottinger', DATE('2001-03-20'), 20, 'Male', 87696754521, 'myemail.address@gmail.com', DATE('2022-03-10'), DATE('2022-03-20'), 'Hermitage Bay Hotel, Antigua', 2, 0),
(3,'Tuseef', 'Graham', DATE('2001-03-20'), 20, 'Male', 87609094521, 'myemail.address@gmail.com', DATE('2022-05-9'), DATE('2022-03-13'),  'Half Moon, Jamaica', 2, 0),
(4,'Dayna', 'Thomas', DATE('2001-03-20'), 20, 'Male', 87607074521, 'myemail.address@gmail.com', DATE('2022-07-01'), DATE('2022-07-05'), 'Sugar Beach, A Viceroy Resort, St Lucia', 1, 0),
(5,'Janai', 'Anderson', DATE('2001-03-20'), 20, 'Male', 87667454521, 'myemail.address@gmail.com', DATE('2022-04-12'), DATE('2022-04-14'), 'Jade Mountain, St Lucia', 1, 0),
(6,'Talia', 'Baker', DATE('2001-03-20'), 20, 'Female', 87655794521, 'myemail.address@gmail.com', DATE('2022-06-06'), DATE('2022-06-10'), 'Fairmont Royal Pavilion, Barbados', 2, 0),
(7,'Gabrielle', 'Scott', DATE('2001-03-20'), 20, 'Female', 87688644521, 'myemail.address@gmail.com', DATE('2022-03-19'), DATE('2022-03-21'), 'Hermitage Bay Hotel, Antigua', 1, 0),
(8,'Carl', 'Heron',DATE('2001-03-20'), 20, 'Male', 87680968521, 'myemail.address@gmail.com', DATE('2022-08-15'), DATE('2022-03-20'), 'Half Moon, Jamaica', 2, 0),
(9,'Chris', 'Green', DATE('2001-03-20'), 20, 'Male', 8769278521, 'myemail.address@gmail.com', DATE('2022-08-03'), DATE('2022-08-06'), 'Fairmont Royal Pavilion, Barbados', 1, 0),
(10,'Anthony', 'James', DATE('2001-03-20'), 20, 'Male', 87643814521, 'myemail.address@gmail.com', DATE('2022-01-09'), DATE('2022-01-14'),  'Sandals Emerald Bay,Bahamas', 1, 0),
(11,'Angela', 'James', DATE('2001-03-20'), 20, 'Female', 87676214521, 'myemail.address@gmail.com', DATE('2022-10-10'), DATE('2022-10-13'), 'Jade Mountain, St Lucia', 2, 0),
(12,'Ryan', 'Ebanks',  DATE('2001-03-20'), 20, 'Male', 87676494521, 'myemail.address@gmail.com', DATE('2022-09-19'), DATE('2022-03-22'), 'Half Moon, Jamaica', 2, 0),
(13,'Jet', 'Blevins', DATE('2001-03-20'), 20, 'Male', 87612424521, 'myemail.address@gmail.com', DATE('2022-11-03'), DATE('2022-11-06'), 'Hermitage Bay Hotel, Antigua', 2, 0),
(14,'Ramon', 'Cheesom', DATE('2001-03-20'), 20, 'Male', 87688764921, 'myemail.address@gmail.com', DATE('2022-03-20'), DATE('2022-03-22'), 'Fairmont Royal Pavilion, Barbados', 1, 0),
(15,'Quintin', 'Wu', DATE('2001-03-20'), 20, 'Male', 87656729521, 'myemail.address@gmail.com', DATE('2022-12-23'), DATE('2022-12-26'), 'Sandals Emerald Bay, Bahamas', 1, 0),
(16,'Joshua', 'Dixon', DATE('2001-03-20'), 20, 'Male', 87632144521, 'myemail.address@gmail.com', DATE('2022-02-11'), DATE('2022-02-13'), 'Jade Mountain, St Lucia', 1, 0),
(17,'UI', 'Lewise',  DATE('2001-03-20'), 20, 'female', 87667894221, 'myemail.address@gmail.com', DATE('2022-10-14'), DATE('2022-10-16'), 'Half Moon, Jamaica', 2, 0),
(18,'Carl-Christopher', 'Blane', DATE('2001-03-20'), 20, 'Male', 87687592521, 'myemail.address@gmail.com', DATE('2022-04-01'), DATE('2022-04-05'),  'Sandals Emerald Bay,Bahamas', 1, 0),
(19,'Sydeon', 'Brown', DATE('2001-03-20'), 20, 'Female', 8768749521 , 'myemail.address@gmail.com', DATE('2022-01-01'), DATE('2022-01-05'), 'Hermitage Bay Hotel, Antigua', 2, 0),
(20,'Sarah', 'Allen',  DATE('2001-03-20'), 20, 'Female', 8768749521, 'myemail.address@gmail.com', DATE('2022-05-05'), DATE('2022-05-10'),  'Sugar Beach, A Viceroy Resort, St Lucia', 2, 0);


DROP TABLE IF EXISTS `customerlist`;
CREATE TABLE `customerlist` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `date_of_birth` DATE NOT NULL ,
    `age` INT(3),
    `gender` VARCHAR(8) NOT NULL ,
    `phonenumber` BIGINT(50),
    `email` VARCHAR(50) NOT NULL ,
    `checkin` DATE NOT NULL ,
    `checkout` DATE NOT NULL ,
    `hotel` VARCHAR(255) NOT NULL ,
    `rooms` INT(3),
    `priority` INT(11) NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `confirmed`;
CREATE TABLE `confirmed` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `checkin` DATE NOT NULL ,
    `checkout` DATE NOT NULL ,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `confirmed` VALUES(0,'testfirstname', 'testlastname', DATE('2022-01-20'), DATE('2022-01-30'));

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
    `hotel` VARCHAR(255) NOT NULL ,
    `checkout` DATE NOT NULL ,
    `avail_rooms` INT(3),
    `price` VARCHAR(255) NOT NULL ,
    `rating` FLOAT(3),
    PRIMARY KEY  (`hotel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `hotels` VALUES('Hermitage Bay Hotel, Antigua', DATE('2022-11-30'), 7, '$250 USD', 4.0),
('Fairmont Royal Pavilion, Barbados', DATE('2022-12-10'), 10, '$239 USD', 3.5),
('Sugar Beach, A Viceroy Resort, St Lucia', DATE('2022-11-15'), 9, '$179 USD', 4.5),
('Jamaica Inn, Jamaica', DATE('2022-12-30'), 11, '$299 USD', 3.2),
('Half Moon, Jamaica', DATE('2023-01-05'), 5, '$300 USD', 4.3),
('Jade Mountain, St Lucia', DATE('2022-11-25'), 8, '$275 USD', 4.5),
('Sandals Emerald Bay,Bahamas', DATE('2022-12-23'), 6, '$199 USD', 3.5);

/* GRANT ALL PRIVILEGES ON user.* TO 'new_user'@'localhost'IDENTIFIED BY 'password123';*/
/* GRANT ALL PRIVILEGES ON TravelAgencyDB.* TO 'new_user'@'localhost'IDENTIFIED BY 'password123';*/