CREATE TABLE `evenements` 
(
 `evenement_id` INT NOT NULL AUTO_INCREMENT , 
 `evenement_nom` VARCHAR(255) NOT NULL , 
 `evenemnt_description` TEXT NOT NULL , 
 `evenement_adresse` VARCHAR(255) NOT NULL , 
 `evement_ville` VARCHAR(255) NOT NULL , 
 `evenement_debut` DATE NOT NULL , 
 `evenement_duree` INT NOT NULL COMMENT 'durée en seconde, on se ferra une fonction de conversion' , 
 PRIMARY KEY (`evenement_id`)
) ENGINE = InnoDB;


ALTER TABLE `evenements` 
ADD `evenement_type` INT NOT NULL 
COMMENT 'type = 1 = public || 2 == priver' 
AFTER `evenement_duree`;


ALTER TABLE `evenements` CHANGE `evenemnt_description` `evenement_description` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;