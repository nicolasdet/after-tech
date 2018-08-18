CREATE TABLE `root`.`user`
 ( 
 	`user_id` INT NOT NULL AUTO_INCREMENT , 
 	`user_nom` VARCHAR(255) NOT NULL , 
 	`user_prenom` VARCHAR(255) NOT NULL , 
 	`user_password` TEXT NOT NULL , 
 	`user_email` VARCHAR(255) NOT NULL , 
 	`user_status` INT NOT NULL , PRIMARY KEY (`user_id`)
 ) ENGINE = InnoDB;