CREATE TABLE `quiz` (
  `id` id PRIMARY KEY,
  `title` varchar(191) NOT NULL,
  `description` varchar(191),
  `type` ENUM ('1', '2', '3') DEFAULT '1', // 1- Normal , 2 - Avaliar, 3 Custom
  `body` longtext, // default null 
  `number_options` int DEFAULT 5,
  `status` ENUM('1','9') DEFAULT '1' // 1 - ativo, 9 - inativo 
);

CREATE TABLE `quiz_item` (
  `id` id PRIMARY KEY,
  `quiz_id` bigint,
  `type` ENUM ('1', '2', '3') DEFAULT '1', // 1 - questions , 2 - advertise  , 3  freetext
  `order` integer NOT NULL DEFAULT 1
);

ALTER TABLE `quiz_item` ADD FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`);


CREATE TABLE `quiz_item_options` (
  `id` id PRIMARY KEY,
  `title` varchar(191) NOT NULL,
  `quiz_item_id` bigint,
  `order` integer NOT NULL DEFAULT 1,
  `value` VARCHAR(100) NOT NULL DEFAULT 'a'
);

ALTER TABLE `quiz_item_options` ADD FOREIGN KEY (`quiz_item_id`) REFERENCES `quiz_item` (`id`);

CREATE TABLE `results` (
  `id` id PRIMARY KEY,
  `quiz_id` bigint,
  `title` varchar(191) NOT NULL,
  `value` VARCHAR(100) NOT NULL DEFAULT 'a',
  `body` longtext, // default null
  `url` longtext  // default null
);

ALTER TABLE `results` ADD FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`);


