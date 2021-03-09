CREATE DATABASE source_it_project;
USE source_it_project;

CREATE TABLE role (
  `id`   INT(5) PRIMARY KEY AUTO_INCREMENT,
  `role` VARCHAR(20)
);

CREATE TABLE user (
  `id`         INT PRIMARY KEY AUTO_INCREMENT,
  `firstname`  VARCHAR(50)  NOT NULL,
  `lastname`   VARCHAR(50)  NOT NULL,
  `email`      VARCHAR(50)  NOT NULL,
  `password`   VARCHAR(100) NOT NULL,
  `phone`      VARCHAR(30),
  `created_at` DATETIME
);

CREATE TABLE user_role (
`id` INT(5) PRIMARY KEY auto_increment,
`user_id` INT(5) NOT NULL,
`role_id` INT(5) NOT NULL
);

ALTER TABLE user_role
    ADD CONSTRAINT fk_user
FOREIGN KEY (`user_id`)
      REFERENCES user(`id`)
ON UPDATE CASCADE
ON DELETE CASCADE
;

ALTER TABLE user_role
    ADD CONSTRAINT fk_role
FOREIGN KEY (`role_id`)
      REFERENCES role(`id`)
ON UPDATE CASCADE
ON DELETE CASCADE
;

CREATE TABLE gallery(
  `id` INT(5) AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(70) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  `created_at` DATETIME NOT NULL
);

CREATE TABLE article(
  `id` INT(5) PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(70) NOT NULL ,
  `description` VARCHAR(250) NOT NULL ,
  `created_at` DATETIME NOT NULL
);

CREATE TABLE tags (
  `id`  INT(5) PRIMARY KEY AUTO_INCREMENT,
  `tag` VARCHAR(50)
);

CREATE TABLE article_tag(
    `id` INT(5) PRIMARY KEY AUTO_INCREMENT,
    `article_id` INT(50), INDEX(article_id),
    `tag_id` INT(50), INDEX(tag_id),
    FOREIGN KEY (article_id) REFERENCES article(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title1','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title2','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title3','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title4','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title5','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title6','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title7','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title8','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title9','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title10','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title11','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title12','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title13','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title14','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title15','Sample description', NOW());
INSERT INTO `article` (`title`, `description`, `created_at`) VALUES ('Sample title16','Sample description', NOW());

INSERT INTO `tags` (`tag`) VALUES ('JavaScript');
INSERT INTO `tags` (`tag`) VALUES ('WordPress');
INSERT INTO `tags` (`tag`) VALUES ('Joomla');
INSERT INTO `tags` (`tag`) VALUES ('HTML');
INSERT INTO `tags` (`tag`) VALUES ('CSS');
INSERT INTO `tags` (`tag`) VALUES ('AJAX');
INSERT INTO `tags` (`tag`) VALUES ('C++');
INSERT INTO `tags` (`tag`) VALUES ('C#');
INSERT INTO `tags` (`tag`) VALUES ('JSON');
INSERT INTO `tags` (`tag`) VALUES ('paint');
INSERT INTO `tags` (`tag`) VALUES ('Adobe');
INSERT INTO `tags` (`tag`) VALUES ('Visual studio');
INSERT INTO `tags` (`tag`) VALUES ('PHP');
INSERT INTO `tags` (`tag`) VALUES ('MYSQL');

INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('1', '8');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('1', '4');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('1', '12');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('1', '4');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('2', '4');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('2', '8');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('2', '1');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('2', '4');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('3', '6');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('3', '12');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('4', '1');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('4', '12');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('4', '2');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('5', '2');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('5', '3');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('6', '3');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('6', '2');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('6', '7');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('7', '7');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('7', '5');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('7', '9');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('8', '8');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('8', '13');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('8', '14');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('9', '13');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('9', '14');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('9', '1');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('10', '4');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('10', '9');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('11', '12');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('12', '11');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('12', '13');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('13', '14');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('14', '10');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('14', '9');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('15', '9');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('15', '8');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('16', '7');
INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES ('16', '13');
