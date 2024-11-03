CREATE DATABASE IF NOT EXISTS quizdb;
USE quizdb;

CREATE TABLE users (
    uId		INT AUTO_INCREMENT PRIMARY KEY,
	fullName 	VARCHAR(50) NOT NULL,
    userName 	VARCHAR(50) NOT NULL UNIQUE,
	email	 	VARCHAR(50) NOT NULL UNIQUE,
	country		VARCHAR(50),
	password	VARCHAR(255) NOT NULL,
	role		ENUM('admin','tacher','user') DEFAULT 'user',
	create_at	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	update_at 	TIMESTAMP
);

CREATE TABLE quizCatacory (
	cId 		INT AUTO_INCREMENT PRIMARY KEY,
	title 		VARCHAR(50) NOT NULL,
	description VARCHAR(100) NOT NULL,
	image		VARCHAR(255) NOT NULL
);

CREATE TABLE quizType(
	tId 		INT AUTO_INCREMENT PRIMARY KEY,
	type 		VARCHAR(50) NOT NULL
);

CREATE TABLE questions (
	qId 		INT AUTO_INCREMENT PRIMARY KEY,
	question	VARCHAR(255) NOT NULL,
	correctAnswer VARCHAR(50) NOT NULL,
	timeLimit	INT NOT NULL,
	catagoryId	INT,
	typeId 		INT,
	create_at	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	update_at	TIMESTAMP,
	create_by	INT,
	CONSTRAINT question_catagory FOREIGN KEY(catagoryId) REFERENCES quizCatacory(cId) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT question_type     FOREIGN KEY(typeId) 	 REFERENCES quizType(tId) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT create_by  		 FOREIGN KEY(create_by)	 REFERENCES users(uId)
);

CREATE TABLE answers(
	aId INT 	AUTO_INCREMENT PRIMARY KEY,
	answer 		VARCHAR(255) NOT NULL,
	questionId	INT,
	CONSTRAINT question_answers FOREIGN KEY(questionId) REFERENCES questions(qId) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE userAnswers (
	uaId		INT AUTO_INCREMENT PRIMARY KEY,
	userAnswer	VARCHAR(50) NOT NULL,
	score		INT DEFAULT 0,
	attemptDate	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	userId		INT,
	questionId	INT,
	CONSTRAINT user_answer 		FOREIGN KEY(userId) 	REFERENCES users(uId) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT question_answer	FOREIGN KEY(questionId) REFERENCES questions(qId)
);

CREATE TABLE message (
	mId			INT AUTO_INCREMENT PRIMARY KEY,
	senderName	VARCHAR(50) NOT NULL,
	senderEmail	VARCHAR(100) NOT NULL,
	message 	TEXT NOT NULL,
	status		INT DEFAULT 1,
	create_at	TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);