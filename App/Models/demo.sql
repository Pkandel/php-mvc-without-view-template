CREATE DATABASE mvc;

USE mvc;

	CREATE TABLE posts 
	(
		id int PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(50),
		description VARCHAR(5000)
	)
INSERT INTO posts (name, description) VALUES 
	("first post", "description for firs post"),
	("second post", "description for second post"),
	("third post", "description for third post"),
	("fourth post", "description for fourth post"),
	("fifth post", "description for fifth post"),
	("sixth post", "description for sixth post"),
	("seventh post", "description for seventh post");
	