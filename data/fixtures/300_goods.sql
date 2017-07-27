DROP TABLE IF EXISTS goods;
CREATE TABLE `goods` (
`id` int UNSIGNED AUTO_INCREMENT,
`created_at` datetime,
`updated_at` datetime,
`name` varchar(512),
`price` float,
`description` text,
`category` int,
`status` int(2) UNSIGNED,
PRIMARY KEY (`id`)
);
TRUNCATE TABLE goods;
INSERT INTO goods (name, price, category, status) VALUES ('Good 1', 100.2, 1, 1);
INSERT INTO goods (name, price, category, status) VALUES ('Good 2', 120, 2, 1);
INSERT INTO goods (name, price, category, status) VALUES ('Good 3', 47.8, 2, 1);
INSERT INTO goods (name, price, category, status) VALUES ('Good 4', 100500, 2, 1);
INSERT INTO goods (name, price, category, status) VALUES ('Good 5', 2001, 3, 4);
INSERT INTO goods (name, price, category, status) VALUES ('Good 6', 1020.2, 4, 1);
INSERT INTO goods (name, price, category, status) VALUES ('Good 7', 1.2, 4, 1);
INSERT INTO goods (name, price, category, status) VALUES ('Good 8', 800.1, 5, 1);