DROP SCHEMA IF EXISTS legalWebsite;

CREATE SCHEMA IF NOT EXISTS legalWebsite;

USE legalWebsite;

CREATE TABLE users (
    userID int AUTO_INCREMENT,
    privateID varchar(255),
	userName varchar(255),
	firstName varchar(255),
    lastName varchar(255),
	emailAddress varchar(255),
	registrationDate datetime,
    verificationStatus bool,
    profileVisibility bool,
    PRIMARY KEY (userID),
	INDEX NAME (privateID)
);

CREATE TABLE userSaltAndPepper(
	privateID varchar(255),
    userSalt varchar(32),
    userPepper varchar(32),
    PRIMARY KEY (privateID),
    FOREIGN KEY (privateID) REFERENCES users(privateID)
    );
    
CREATE TABLE userHashes(
	privateID varchar(255),
	passwordHash varchar(32),
    PRIMARY KEY (privateID),
    FOREIGN KEY (privateID) REFERENCES users(privateID)
    );



CREATE TABLE usersFollowsUsers(
    userID int,
    followID int,
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (followID) REFERENCES users(userID)
);

CREATE TABLE administrators (
    adminID int AUTO_INCREMENT,
	userID int,
    PRIMARY KEY (adminID),
    FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE moderators (
    modID int AUTO_INCREMENT,
	userID int,
    PRIMARY KEY (modID),
    FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE outlets(
    outletID int AUTO_INCREMENT,
    outletName varchar(255),
    PRIMARY KEY (outletID)
);

CREATE TABLE usersFollowsOutlets(
	userID int,
    outletID int,
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (outletID) REFERENCES outlets(outletID)
);

CREATE TABLE articles(
	articleID int AUTO_INCREMENT,
    outletID int,
    authorName varchar(255),
    articleURL varchar(255),
    articleHeadline varchar(2047),
    articleText varchar(2047),
    publicationDate datetime,
    PRIMARY KEY (articleID),
    FOREIGN KEY (outletID) REFERENCES outlets(outletID)
);

CREATE TABLE articleReactions(
	reactionID int AUTO_INCREMENT,
    reactionType varchar(8),
    userID int,
    articleID int,
    PRIMARY KEY (reactionID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (articleID) REFERENCES articles(articleID)
);

CREATE TABLE articleComments(
	commentID int AUTO_INCREMENT,
    commentText varchar(1024),
    userID int,
    articleID int,
    PRIMARY KEY (commentID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (articleID) REFERENCES articles(articleID)
);

CREATE TABLE commentReactions(
	reactionID int AUTO_INCREMENT,
    reactionType varchar(8),
    userID int,
    commentID int,
    PRIMARY KEY (reactionID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (commentID) REFERENCES articleComments(commentID)
);


