CREATE TABLE `entreprise` 
( 
	`entreprise_id` INT NOT NULL AUTO_INCREMENT , 
	`entreprise_nom` VARCHAR(255) NOT NULL , 
	`entreprise_description` VARCHAR(255) NOT NULL , PRIMARY KEY (`entreprise_id`)
) ENGINE = InnoDB;

CREATE TABLE `entreprise_user` 
( 
	`entreprise_user_id` INT NOT NULL AUTO_INCREMENT , 
	`user_id` INT NOT NULL , 
	`entreprise_id` INT NOT NULL , 
	PRIMARY KEY (`entreprise_user_id`)
) ENGINE = InnoDB;

ALTER TABLE `entreprise_user` ADD INDEX `idx_entreprise_user` (`user_id`, `entreprise_id`);


ALTER TABLE `entreprise_user` 
ADD CONSTRAINT `fk_ue_u_id` 
FOREIGN KEY (`user_id`) 
REFERENCES `user`(`user_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `entreprise_user` 
ADD CONSTRAINT `fk_ue_e_id` 
FOREIGN KEY (`entreprise_id`) 
REFERENCES `entreprise`(`entreprise_id`) 
ON DELETE RESTRICT ON UPDATE RESTRICT;