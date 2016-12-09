CREATE DATABASE ecommerce;

USE ecommerce;

	CREATE TABLE users 
	(
		username VARCHAR(50) PRIMARY KEY,
		email VARCHAR(50),
		pass VARCHAR(256),
		phone VARCHAR(15),
		address VARCHAR(300)
	)
INSERT INTO users (username, email, pass, phone,address) VALUES 
("prasam","unique_prakash2002@yahoo.com","123","0415174274","7/129 Epsom Road Ascot Vale, VIC 3032"),
("prasam","unique_prakash2002@yahoo.com","123","0415174274","7/129 Epsom Road Ascot Vale, VIC 3032");
	