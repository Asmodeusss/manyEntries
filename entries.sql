-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 10:06 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP PROCEDURE IF EXISTS `dowhile`;
DROP TABLE IF EXISTS `entries`;


CREATE TABLE `entries` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELIMITER //

CREATE PROCEDURE dowhile()
BEGIN
  DECLARE v1 INT DEFAULT 1;

  START TRANSACTION;
    WHILE v1 <= 1000000 DO
        INSERT INTO `entries` (`a`, `b`, `c`) VALUES(v1, v1%3, v1%5);
        SET v1 = v1 + 1;
    END WHILE;
  COMMIT;
END//

DELIMITER ;

CALL dowhile();

