ALTER TABLE `user` ADD `user_img` VARCHAR(255) NOT NULL AFTER `user_status`;
ALTER TABLE `user` CHANGE `user_img` `user_img` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;