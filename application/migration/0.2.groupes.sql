CREATE TABLE `root`.`groupes` 
( 
	`groupes_id` INT NOT NULL AUTO_INCREMENT , 
	`groupes_nom` VARCHAR(255) NOT NULL , 
	`groupes_description` TEXT NOT NULL , 
	`entreprise_id` INT NOT NULL , 
	PRIMARY KEY (`groupes_id`)
) ENGINE = InnoDB;

CREATE TABLE `root`.`user_groupes` 
( 
	`user_id` INT NOT NULL , 
	`groupes_id` INT NOT NULL , 
	`status` INT NOT NULL 
) ENGINE = InnoDB;

ALTER TABLE `root`.`user_groupes` ADD UNIQUE `index groupes user` (`user_id`, `groupes_id`);

ALTER TABLE `user_groupes` ADD
 CONSTRAINT `user_` 
 FOREIGN KEY (`user_id`) 
 REFERENCES `user`(`user_id`) 
 ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `user_groupes` ADD 
CONSTRAINT `groupe_` 
FOREIGN KEY (`groupes_id`) 
REFERENCES `groupes`(`groupes_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;