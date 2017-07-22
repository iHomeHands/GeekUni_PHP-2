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
)