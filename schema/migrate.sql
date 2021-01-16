--usersテーブル作成
CREATE TABLE `users` (
`id` int(11) auto_increment NOT NULL,
`name` varchar(30) NOT NULL,
`age` int(3) NOT NULL,
`created_at` datetime NOT NULL,
`updated_at` datetime NOT NULL,
`login_id` int(20),
`password` int(20),
PRIMARY KEY (`id`)
) CHARSET=utf8;

--ユーザー登録した際の記述
INSERT INTO users (name,age,created_at,updated_at,login_id,password) VALUES ("maiko",2222,NOW(),NOW(),1010,1100);

--todosテーブル作成
CREATE TABLE `todos` (
`id` int auto_increment NOT NULL,
`user_id` int(20) NOT NULL,
`title` varchar(255) NOT NULL DEFAULT 0,
`detail` text DEFAULT NULL,
`status` tinyint NOT NULL DEFAULT 0,
`completed_at` datetime,
`created_at` datetime NOT NULL,
`updated_at` datetime NOT NULL,
`deleted_at` datetime,
PRIMARY KEY (`id`)
) CHARSET=utf8;
