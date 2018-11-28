DROP DATABASE moviedatabase;
CREATE DATABASE moviedatabase;
USE moviedatabase;

-- Create the db

CREATE TABLE location (
        	id INT NOT NULL AUTO_INCREMENT,
        	address VARCHAR (64),
        	address2 VARCHAR (64),
        	city VARCHAR (64) NOT NULL,
        	state CHAR(2),
        	country VARCHAR (32) NOT NULL,
        	PRIMARY KEY(id)
);

CREATE TABLE person (
	id INT AUTO_INCREMENT,
        	firstName VARCHAR (64) NOT NULL,
            lastName VARCHAR(64) NOT NULL,
        	age INTEGER(3),
        	height INT,
        	sex CHAR(1),
        	birthdate DATE,
        	birthplace INT,
            picture TEXT,
	FOREIGN KEY (birthplace) REFERENCES location(id),
        	PRIMARY KEY(id)
);

CREATE TABLE media (
		id INT NOT NULL AUTO_INCREMENT,
		name VARCHAR(64) NOT NULL,
		releaseDate DATE,
        type VARCHAR(1),
        duration TIME,
		boxOffice BIGINT,
        seasons INT,
		episodes INT,
		rating varchar(10),
        picture TEXT,
		PRIMARY KEY (id)
);

CREATE TABLE mediaGenre(
        mediaId INT NOT NULL,
        genre varchar(20),
        FOREIGN KEY (mediaId) REFERENCES media(id),
        PRIMARY KEY (mediaId,genre)
);

CREATE TABLE distributor (
	id INT AUTO_INCREMENT,
        	name VARCHAR (64),
        	location INT,
            picture TEXT,
	FOREIGN KEY (location) REFERENCES location(id),
        	PRIMARY KEY (id)
);

CREATE TABLE distributes (
	distributorId INT,
	mediaId INT,
        	FOREIGN KEY (distributorId) REFERENCES distributor(id),
        	FOREIGN KEY (mediaId) REFERENCES media(id),
        	PRIMARY KEY (distributorId, mediaId)
);
 
CREATE TABLE casts (
        	role VARCHAR (64),
	mediaId INT,
	personId INT,
        	FOREIGN KEY (mediaId) REFERENCES media(id),
        	FOREIGN KEY (personId) REFERENCES person(id)
);

CREATE TABLE awards (
	personId INTEGER NOT NULL,
	award VARCHAR(64) NOT NULL,
	year_awarded INT NOT NULL,
	FOREIGN KEY (personId) REFERENCES person(id),
	PRIMARY KEY (personId, award, year_awarded)
);


