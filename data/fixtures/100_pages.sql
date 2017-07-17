DROP TABLE IF EXISTS pages;
CREATE TABLE pages (
     id INT NOT NULL AUTO_INCREMENT,
     name VARCHAR(256) NOT NULL,
     PRIMARY KEY (id)
);
INSERT INTO pages (`name`) VALUES ('Главная');
INSERT INTO pages (`name`) VALUES ('О Магазине');
INSERT INTO pages (`name`) VALUES ('Каталог');
