# camdengeardemo

1. Decompress master file, and open in code editor of choice

2. Navigate, using the terminal, to the cakephpcrud location.
   
3. Enter: "bin/cake bake all posts"

4. Do not override the prompts given to you

5. Enter: "bin/cake server" and follow the link to localhost.


In MySQL, I created the following table which is compatable with my code:

CREATE TABLE `CamdenGearDemo`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `state` VARCHAR(45) NULL,
  `zipCode` INT NULL,
  `price` DOUBLE NULL,
  `bedrooms` DOUBLE NULL,
  `bathrooms` DOUBLE NULL,
  `picture` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

  You will also have to change the SQL credintials in app_local.php to successfully connect to MySQL

  
