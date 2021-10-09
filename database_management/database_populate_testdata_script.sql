-- Script for 

-- Create values for the news outlets:
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

INSERT INTO `users` VALUES
(NULL, "Site Administator", "", "", "admin@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Art", "Arthur", "Kirkland", "kirkland@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Frank", "Francis", "Rayford", "rayford@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Henry", "Henry", "Fleming", "fleming@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "JayP", "Jay", "Porter", "jayp@gmail.com", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "DJ", "Dave", "Jameson", "dj@gmail.com", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Windy", "Gail", "Packer", "windy12345@yahoo.com", CURRENT_TIMESTAMP, TRUE, TRUE);

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



select * from outlets;

select * from articles;

select * from users;

select * from usersFollowsOutlets;