DROP DATABASE if EXISTS DB_Transfers;
CREATE DATABASE IF NOT EXISTS DB_Transfers;
USE DB_Transfers;

DROP User 'user'@'localhost';
create user 'user'@'localhost';
SET PASSWORD FOR 'user'@'localhost' = PASSWORD('password');

GRANT SELECT, INSERT, UPDATE ON DB_Transfers.* TO 'user'@'localhost';
FLUSH PRIVILEGES;

Drop table if exists transfers;
Create table transfers (
	od VARCHAR(1000),
    kwota INT,
    do VARCHAR(1000)
);

Drop table if exists users;
Create table users (
  login VARCHAR(1000),
    passwd VARCHAR(1000),
    PRIMARY KEY (login)
);
