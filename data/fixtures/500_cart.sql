CREATE TABLE `cart` (
`id` int UNSIGNED AUTO_INCREMENT,
`created_at` datetime,
`updated_at` datetime,
`goods_id` int(2) UNSIGNED,
`status` int(2) UNSIGNED,
PRIMARY KEY (`id`)
)