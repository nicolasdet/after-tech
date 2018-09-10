CREATE TABLE `evenements_groupes` 
( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`evenement_id` INT NOT NULL , 
	`groupes_id` INT NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `evenements_groupes` 
ADD UNIQUE `index_event_groupe` (`evenement_id`, `groupes_id`);


ALTER TABLE `evenements_groupes` ADD 
CONSTRAINT `fk_env` 
FOREIGN KEY (`evenement_id`) 
REFERENCES `evenements`(`evenement_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `evenements_groupes` ADD 
CONSTRAINT `fk_groupes` 
FOREIGN KEY (`groupes_id`) 
REFERENCES `groupes`(`groupes_id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION;