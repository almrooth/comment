-- Ensure UTF8 on the database connection
SET NAMES utf8;

--
-- Table rv1_users
--
DROP TABLE IF EXISTS rv1_users;
CREATE TABLE `rv1_users` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `role` VARCHAR(20) NOT NULL,
    `username` VARCHAR(100) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `created` DATETIME,
    `updated` DATETIME,
    `deleted` DATETIME
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

--
-- Table rv1_comments
--
DROP TABLE IF EXISTS rv1_comments;
CREATE TABLE `rv1_comments` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `user_id` INTEGER NOT NULL,
    `content` TEXT NOT NULL,
    `created` DATETIME,
    `updated` DATETIME,
    `deleted` DATETIME
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

-- 
-- Default users
--
INSERT INTO `rv1_users` (`role`, `username`, `password`, `email`) VALUES
    ('admin', 'admin', '$2y$10$uZx4liCNftH1yDJYKnycu.TBOwQ6X09cdGgT53RX38baUYZTJRG56', 'admin@comment.com'),
    ('user', 'doe', '$2y$10$Q4Y6zom7KP1EiGcKjFg0K.pFfRsf5.XeTrarffeB.Ug89LanDFeXO', 'doe@comment.com');

--
-- Default comments
--
INSERT INTO `rv1_comments` (`user_id`, `content`) VALUES
    ('1', 'This is a comment by an admin, admin.'),
    ('2', 'This is a comment by a user, doe.');