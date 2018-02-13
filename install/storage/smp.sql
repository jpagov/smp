CREATE TABLE `{{prefix}}branchs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}categories` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `slug` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `redirect` text NOT NULL,
  `hierarchy` int(6) NOT NULL,
  `view` int(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}divisions` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `view` int(11) NOT NULL,
  `order` int(3) NOT NULL DEFAULT '99',
  `staff` int(11) NOT NULL,
  `street` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `telephone` text NOT NULL,
  `fax` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}extend` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `type` enum('post','page','staff') NOT NULL,
  `field` enum('text','html','image','file') NOT NULL,
  `key` varchar(160) NOT NULL,
  `label` varchar(160) NOT NULL,
  `attributes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}hierarchies` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `staff` int(6) NOT NULL,
  `division` int(6) NOT NULL,
  `branch` int(6) NOT NULL,
  `sector` int(6) NOT NULL,
  `unit` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `division` (`division`),
  KEY `staff` (`staff`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}messages` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `staff` int(6) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(320) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staff` (`staff`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}meta` (
  `key` varchar(140) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}pages` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `parent` int(6) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `name` varchar(64) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `status` enum('draft','published','archived') NOT NULL,
  `redirect` text NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `menu_order` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}page_meta` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `page` int(6) NOT NULL,
  `extend` int(6) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page` (`page`),
  KEY `extend` (`extend`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}ratings` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `staff` int(6) NOT NULL,
  `score` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}roles` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `staff` int(6) NOT NULL,
  `division` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staff` (`staff`),
  KEY `division` (`division`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}schemes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `slug` varchar(40) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}search` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `search` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}sectors` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}sessions` (
  `id` char(32) NOT NULL,
  `expire` int(10) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}staffs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `salutation` text NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `display_name` text NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `job_title` varchar(150) NULL,
  `position` varchar(16) NULL,
  `management` tinyint(1) NULL,
  `jusa` varchar(10) NULL,
  `report_to` int(6) NULL,
  `personal_assistant` int(6) NULL,
  `description` text NULL,
  `scheme` int(6) NULL,
  `grade` tinyint(3) NULL,
  `division` int(6) NULL,
  `branch` int(6) NULL,
  `sector` int(6) NULL,
  `unit` int(6) NULL,
  `email` varchar(140) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `fax` varchar(32) NULL,
  `status` enum('inactive','active') NOT NULL,
  `role` enum('administrator','editor','staff') NOT NULL,
  `account` tinyint(1) NOT NULL DEFAULT '0',
  `sort` tinyint(2) NULL,
  `view` int(8) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` datetime NULL,
  `rating` tinyint(1) NOT NULL DEFAULT '1',
  `message` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}staff_meta` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `staff` int(6) NOT NULL,
  `extend` int(6) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staff` (`staff`),
  KEY `extend` (`extend`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}stats` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `trend` int(6) NOT NULL,
  `created` datetime NOT NULL,
  `type` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

CREATE TABLE `{{prefix}}units` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET={{charset}};

INSERT INTO `{{prefix}}divisions` (`title`, `title_en`, `slug`, `parent`, `description`, `view`, `order`, `staff`, `street`, `city`, `state`, `zip`, `telephone`, `fax`) VALUES ('Bahagian Pengurusan Maklumat', 'Information Management Division', 'bpm', 1, 'Description', 11, 99, 1, 'Adress', 'Cyberjaya', 'Selangor', '63000', 'Phone', 'Fax');

INSERT INTO `{{prefix}}roles` (`staff`, `division`) VALUES (1, 1);

INSERT INTO `{{prefix}}hierarchies` (`staff`, `division`, `branch`, `sector`, `unit`) VALUES (1, 1, 1, 1, 1);

INSERT INTO `{{prefix}}categories` (`title`, `slug`, `description`, `redirect`, `hierarchy`, `view`) VALUES ('Other', 'other', 'Other', '', 1, 1);

INSERT INTO `{{prefix}}meta` (`key`, `value`) VALUES
('auto_published_comments', '0'),
('comment_moderation_keys', '0'),
('comment_notifications', '0'),
('date_format', 'jS M, Y'),
('home_page', '1'),
('staffs_page',  '1'),
('staffs_per_page',  '10');

INSERT INTO `{{prefix}}pages` (`slug`, `name`, `title`, `content`, `status`, `redirect`, `show_in_menu`, `menu_order`) VALUES
('posts', 'Posts', 'My posts and thoughts', 'Welcome!', 'published', '', '1', '0');

INSERT INTO `{{prefix}}posts` (`title`, `slug`, `description`, `html`, `css`, `js`, `created`, `author`, `category`, `status`, `comments`) VALUES
('Hello World', 'hello-world', 'This is the first post.', 'Hello World!\r\n\r\nThis is the first post.', '', '', '{{now}}', '1', '1', 'published', '0');
