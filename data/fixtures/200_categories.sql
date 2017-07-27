DROP TABLE IF EXISTS categories;
CREATE TABLE `categories` (
`id` int UNSIGNED AUTO_INCREMENT,
`created_at` datetime,
`updated_at` datetime,
`name` varchar(512),
`parent_id` int,
`status` int(2) UNSIGNED,
PRIMARY KEY (`id`)
);
TRUNCATE TABLE categories;
INSERT INTO categories (status, name, parent_id) VALUES (1,'Category 1', 0);
INSERT INTO categories (status, name, parent_id) VALUES (1,'Category 2', 1);
INSERT INTO categories (status, name, parent_id) VALUES (1,'Category 3', 1);
INSERT INTO categories (status, name, parent_id) VALUES (1,'Category 4', 0);
INSERT INTO categories (status, name, parent_id) VALUES (1,'Category 5', 2);
INSERT INTO categories (status, name, parent_id) VALUES (1,'Category 6', 5);