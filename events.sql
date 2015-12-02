PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE `Users` (
  `id` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL,
  `picture` VARCHAR(255) NULL ,
  `created_at` DATETIME NOT NULL ,
  `birthdate` DATE NULL ,
  `gender` INT NULL,
  PRIMARY KEY (`id`)  );
CREATE TABLE `Types` (
  `id` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)  );
CREATE TABLE `Events` (
  `id` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `image` VARCHAR(255) NULL ,
  `description` VARCHAR(255) NULL ,
  `type_id` VARCHAR(45) NOT NULL ,
  `owner_id` VARCHAR(45) NOT NULL ,
  `visibility` INT NOT NULL DEFAULT 1 ,
  `date` DATE NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`)  ,
 
  CONSTRAINT `fk_Events_Types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `Types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Events_Users1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
CREATE TABLE `Comments` (
  `id` VARCHAR(45) NOT NULL ,
  `content` VARCHAR(255) NOT NULL ,
  `event_id` VARCHAR(45) NOT NULL,
  `author_id` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL ,
  PRIMARY KEY (`id`)  ,
  CONSTRAINT `fk_Comments_Events1`
    FOREIGN KEY (`id`)
    REFERENCES `Events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
CREATE TABLE `User_event` (
  `event_id` VARCHAR(45) NOT NULL ,
  `user_id` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`event_id`, `user_id`)  ,

  CONSTRAINT `fk_User_event_Events`
    FOREIGN KEY (`event_id`)
    REFERENCES `Events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_event_Users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
COMMIT;
