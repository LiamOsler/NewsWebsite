-- Script for inserting test values in to the database:

-- Create values for the news outlets:
INSERT INTO `users` VALUES
(NULL, "Site Administator", "", "", "admin@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Art", "Arthur", "Kirkland", "kirkland@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Frank", "Francis", "Rayford", "rayford@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Henry", "Henry", "Fleming", "fleming@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "JayP", "Jay", "Porter", "jayp@gmail.com", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "DJ", "Dave", "Jameson", "dj@gmail.com", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Windy", "Gail", "Packer", "windy12345@yahoo.com", CURRENT_TIMESTAMP, TRUE, TRUE);

INSERT INTO `administrators` VALUES
(NULL, 1);

INSERT INTO `moderators` VALUES
(NULL, 1),
(NULL, 2),
(NULL, 3);

INSERT INTO `outlets` VALUES
(NULL, "Small Claims Court of Nova Scotia"),
(NULL, "Provincial Court of Nova Scotia"),
(NULL, "Supreme Court of Nova Scotia");

-- Create values for the news articles:
INSERT INTO `articles` VALUES
(NULL, 1, "John Doe", "https://www.courts.ns.ca/", "This is Small Claims Court sample article 1", CURRENT_TIMESTAMP),
(NULL, 1, "John Doe", "https://www.courts.ns.ca/", "This is Small Claims Court sample article 2", CURRENT_TIMESTAMP),
(NULL, 1, "John Doe", "https://www.courts.ns.ca/", "This is Small Claims Court sample article 3", CURRENT_TIMESTAMP),
(NULL, 2, "Jane Doe", "https://www.courts.ns.ca/", "This is Provincial Court sample article 1", CURRENT_TIMESTAMP),
(NULL, 2, "Jane Doe", "https://www.courts.ns.ca/", "This is Provincial Court sample article 2", CURRENT_TIMESTAMP),
(NULL, 2, "Jane Doe", "https://www.courts.ns.ca/", "This is Provincial Court sample article 3", CURRENT_TIMESTAMP),
(NULL, 3, "Joe Doe", "https://www.courts.ns.ca/", "This is Supreme Court sample article 1", CURRENT_TIMESTAMP),
(NULL, 3, "Joe Doe", "https://www.courts.ns.ca/", "This is Supreme Court sample article 2", CURRENT_TIMESTAMP),
(NULL, 3, "Joe Doe", "https://www.courts.ns.ca/", "This is Supreme Court sample article 3", CURRENT_TIMESTAMP);

INSERT INTO `articleReactions` VALUES
(NULL, "LIKE", 1, 1),
(NULL, "LIKE", 2, 1),
(NULL, "LIKE", 3, 1),
(NULL, "DISLIKE", 4, 8),
(NULL, "DISLIKE", 5, 8),
(NULL, "LIKE", 6, 9);

INSERT INTO `articleComments` VALUES
(NULL, "This is a great story!", 1, 1),
(NULL, "I really like this story!", 2, 1),
(NULL, "Excellent writing!", 3, 1),
(NULL, "Not sure about this one!", 4, 8),
(NULL, "Me neither!", 5, 8);

INSERT INTO `commentReactions` VALUES
(NULL, "LIKE", 1, 2),
(NULL, "LIKE", 1, 3),
(NULL, "LIKE", 2, 1),
(NULL, "LIKE", 2, 3),
(NULL, "DISLIKE", 3, 4);

INSERT INTO `usersFollowsOutlets` VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(5, 2),
(5, 3),
(6, 2),
(7, 1);

INSERT INTO `usersFollowsUsers` VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 6),
(4, 7),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(7, 1);


-- Show the full contents of each of the tables:
select * from outlets;
select * from articles;
select * from users;
select * from administrators;
select * from moderators;
select * from articleComments;
select * from commentReactions;
select * from articleReactions;
select * from usersFollowsOutlets;
select * from usersFollowsUsers;


-- Join the article with the outlet to get the title:
SELECT articles.articleText, articles.articleURL, articles.authorName, outlets.outletName FROM articles
JOIN outlets on articles.outletID = outlets.outletID;

