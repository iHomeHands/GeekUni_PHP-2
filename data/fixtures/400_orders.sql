DROP TABLE IF EXISTS orders;
CREATE TABLE `orders` (
`id` int UNSIGNED AUTO_INCREMENT,
`created_at` datetime,
`updated_at` datetime,
`name` varchar(512),
`address` varchar(512),
`phone` varchar(512),
`status` int(2) UNSIGNED,
PRIMARY KEY (`id`)
)