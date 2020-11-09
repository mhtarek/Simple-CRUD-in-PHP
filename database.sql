CREATE TABLE login (
  id int(9) NOT NULL auto_increment,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (login_id) REFERENCES login(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE `crud2`.`doctor` (
  `doc_id` INT NOT NULL ,
   `doc_name` VARCHAR(50) NOT NULL ,
    `doc_age` INT NOT NULL ,
     `doc_speciality` VARCHAR(50) NOT NULL ,
      PRIMARY KEY (`doc_id`)
) ENGINE = InnoDB;
