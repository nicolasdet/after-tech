CREATE TABLE `root`.`user_groupes_invitation` 
( 	`id` INT NOT NULL AUTO_INCREMENT , 
	`user_id` INT NOT NULL , 
	`groupes_id` INT NOT NULL , 
	`type` INT NOT NULL , 
	`status` INT NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


ALTER TABLE `root`.`user_grouppes_invitation` 
ADD INDEX `index_user_invit` (`user_id`, `groupes_id`);


ALTER TABLE `user_grouppes_invitation` 
ADD CONSTRAINT `user_invit_fk` 
FOREIGN KEY (`user_id`) 
REFERENCES `user`(`user_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `user_grouppes_invitation` 
ADD CONSTRAINT `groupe_fk` 
FOREIGN KEY (`groupes_id`) 
REFERENCES `groupes`(`groupes_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;

