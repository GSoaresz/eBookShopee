CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR(255) NOT NULL,
  `category` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `passwd` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Enter a user with the category "system administrator" to access other resources.*/
INSERT INTO `users` (name,category,email,passwd) VALUES ('Gabriel Soares','System Admin','gs@admin.com', 'admin');

CREATE TABLE `books` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `author` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `publisher` VARCHAR(255) NOT NULL,
  `price` DOUBLE(10,2) NOT NULL,
  `user_id` INT NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `books` ADD CONSTRAINT `fk_id_user` FOREIGN KEY ( `user_id` ) REFERENCES `users` ( `id` ) ;
