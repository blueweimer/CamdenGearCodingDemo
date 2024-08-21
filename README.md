# camdengeardemo

1. Decompress master file, and open in code editor of choice

2. In MySQL, I created the following table which is compatable with my code:

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


3. Change database settings in "config/app_local.php"
   
4. Navigate, using the terminal, to the cakephpcrud location.
  
5. Enter: "bin/cake bake all posts"

6. Do not override the prompts given to you

7. Enter: "bin/cake server."

8. Use the following link to access the localhost application in a browser: http://localhost:8765/posts?bedrooms=&bathrooms=&zip_code=&price_range=


  
