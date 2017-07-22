CREATE TABLE `categories` (
`id` int UNSIGNED AUTO_INCREMENT,
`created_at` datetime,
`updated_at` datetime,
`name` varchar(512),
`parent_id` int,
`status` int(2) UNSIGNED,
PRIMARY KEY (`id`)
)