DROP DATABASE IF EXISTS voting;
CREATE DATABASE voting;
USE voting;

CREATE TABLE users (
	username VARCHAR(255),
	password VARCHAR(255),
	PRIMARY KEY (username)
) ENGINE = INNODB;

CREATE TABLE votings (
	title VARCHAR(255),
	description VARCHAR(255),
	creator VARCHAR(255),
	PRIMARY KEY (title),
	FOREIGN KEY (creator)
		REFERENCES users (username),
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE mitgliedschaften (
	username VARCHAR(255),
	voting VARCHAR(255),
	hasAccepted BOOLEAN,
	PRIMARY KEY (username, voting),
	FOREIGN KEY (username)
		REFERENCES users (username)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (voting)
		REFERENCES votings (title)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE kommentare (
	id INT AUTO_INCREMENT,
	username VARCHAR(255),
	voting VARCHAR(255),
	text VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY (username)
		REFERENCES users (username)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (voting)
		REFERENCES votings (title)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE votables (
	text VARCHAR(255),
	voting VARCHAR(255),
	PRIMARY KEY (text, voting),
	FOREIGN KEY (voting)
		REFERENCES votings (title)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE users_votables (
	username VARCHAR(255),
	text VARCHAR(255),
	voting VARCHAR(255),
	PRIMARY KEY (username, voting),
	FOREIGN KEY (username)
		REFERENCES users (username)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (text, voting)
		REFERENCES votables (text, voting)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE = INNODB;