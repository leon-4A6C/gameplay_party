DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
    `id` int NOT NULL UNIQUE AUTO_INCREMENT,

    `name` varchar(255) NOT NULL
);

CREATE TABLE `users` (
    `id` int NOT NULL UNIQUE AUTO_INCREMENT,
    `username` varchar(255) UNIQUE NOT NULL,
    `password` char(60) NOT NULL,
    `role_id` int,

    PRIMARY KEY(`id`),
    FOREIGN KEY(`role_id`) REFERENCES `roles`(id)
);

INSERT INTO `roles`(`name`) VALUES
("admin");

INSERT INTO `users`(`username`, `password`, `role_id`) VALUES
("test", "$2y$10$hRGDvVyEgqMv.gBMKHlpauW/Vzzu/dK/qwJs7.J4KElDfMII1C0nu", 1);