DROP SCHEMA IF EXISTS legalWebsite;

CREATE SCHEMA IF NOT EXISTS legalWebsite;

USE legalWebsite;

CREATE TABLE users (
    userID int,
	userName varchar(255),
	firstName varchar(255),
    lastName varchar(255),
	emailAddress varchar(255),
	registrationDate date,
    verificationStatus bool,
    profileVisibility bool,
    PRIMARY KEY (userID)
);

CREATE TABLE usersFollowsUsers(
	userID int,
    followID int,
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (followID) REFERENCES users(userID)
);

CREATE TABLE adminstrators (
	adminID int,
	userID int,
    PRIMARY KEY (adminID),
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);

CREATE TABLE moderators (
	modID int,
	userID int,
    PRIMARY KEY (modID),
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);

CREATE TABLE outlets(
	outletID int,
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
	articleID int,
    outletID int,
    authorName varchar(255),
    articleURL varchar(255),
    publicationDate date,
    PRIMARY KEY (articleID),
    FOREIGN KEY (outletID) REFERENCES outlets(outletID)
);

CREATE TABLE articleReactions(
	reactionID int,
    reactionType varchar(8),
    userID int,
    articleID int,
    PRIMARY KEY (reactionID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (articleID) REFERENCES articles(articleID)
);

CREATE TABLE articleComments(
	commentID int,
    commentText varchar(1024),
    userID int,
    articleID int,
    PRIMARY KEY (commentID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (articleID) REFERENCES articles(articleID)
);

CREATE TABLE commentReactions(
	reactionID int,
    reactionType varchar(8),
    userID int,
    commentID int,
    PRIMARY KEY (reactionID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (commentID) REFERENCES articleComments(commentID)
);


