DROP DATABASE IF EXISTS wf3_php_intermediaire_ludivine;
CREATE DATABASE wf3_php_intermediaire_ludivine CHARACTER SET utf8;
USE wf3_php_intermediaire_ludivine;


CREATE TABLE advert (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR (255) NOT NULL,
    description TEXT NOT NULL,
    postal_code INT (5) NOT NULL,
    city VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    reservation_message TEXT,
);


INSERT INTO advert (title,description,postal_code,city,type,price) VALUES
('Chalet', 'Magnifique chalet en haute montagne', 31110,'Luchon','Chalet','250'),