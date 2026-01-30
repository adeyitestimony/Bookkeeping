CREATE TABLE signup (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(255),
    `firstname` VARCHAR(100),
    `lastname` VARCHAR(100),
    `companyname` VARCHAR(200),
    `companycategory` VARCHAR(100),
    `password` VARCHAR(255),
);
ALTER TABLE signup ADD (
    `created at`TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE signup ADD UNIQUE(
    email
)
INSERT INTO signup(
    `email`,`firstname`,`lastname`,`companyname`,`companycategory`,`password`
)VALUES('test','yomi','blessinf','be','a','a');
CREATE TABLE income(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `recipientname` VARCHAR(255),
    `service` VARCHAR(255),
    `time` VARCHAR(255),
    `created at`TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
ALTER TABLE income ADD (`user_id` INT NOT NULL);

 CREATE TABLE expense(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `recipientname` VARCHAR(255),
    `service` VARCHAR(255),
    `time` VARCHAR(255),
    `created at`TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `user_id` INT NOT NULL
)


 
