CREATE TABLE `salon` 
( 
	`salon_id` INT NOT NULL AUTO_INCREMENT , 
	`groupes_id` INT NULL , 
	`evenement_id` INT NULL , 
	`type` INT NOT NULL COMMENT 'type = ??' , 
	PRIMARY KEY (`salon_id`)
) ENGINE = InnoDB;


ALTER TABLE `salon` ADD UNIQUE `fk_groupe_event` (`groupes_id`, `evenement_id`);


ALTER TABLE `salon` 
ADD CONSTRAINT `fk_event_salonn` 
FOREIGN KEY (`evenement_id`) 
REFERENCES `evenements`(`evenement_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `salon` 
ADD CONSTRAINT `fk_event` 
FOREIGN KEY (`groupes_id`) 
REFERENCES `groupes`(`groupes_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;



CREATE TABLE `message` 
( 
	`message_id` INT NOT NULL AUTO_INCREMENT , 
	`user_id` INT NOT NULL , 
	`salon_id` INT NOT NULL , 
	`message_text` TEXT NOT NULL , 
	`date` DATETIME NOT NULL , 
	PRIMARY KEY (`message_id`)
) ENGINE = InnoDB;

ALTER TABLE `message` ADD INDEX `idx_chat` (`user_id`, `salon_id`);

ALTER TABLE `message` ADD CONSTRAINT `user_id_fk_chat` 
FOREIGN KEY (`user_id`) 
REFERENCES `user`(`user_id`) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION;

ALTER TABLE `message` ADD CONSTRAINT `salon_id_fk_chat` 
FOREIGN KEY (`salon_id`) 
REFERENCES `salon`(`salon_id`) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION;


ALTER TABLE `message` ADD CONSTRAINT `fk_salon_` FOREIGN KEY (`salon_id`) REFERENCES `salon`(`salon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION; ALTER TABLE `message` ADD CONSTRAINT `fk_msg-` FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;