CREATE DATABASE source_it_project;
USE source_it_project;

CREATE TABLE role(
  `id` INT(5) PRIMARY KEY AUTO_INCREMENT,
  `role` VARCHAR(20)
);

CREATE TABLE user(
	`id` int primary key auto_increment,
	`firstname` varchar(50) NOT NULL,
	`lastname` varchar(50) NOT NULL,
	`email` varchar(50) NOT NULL,
	`password` varchar(100) NOT NULL,
	`phone` varchar(30),
	`created_at` datetime
 );

