-- Get the contents of the articles and their reaction and comment counts, order with newest posts first
SELECT articles.articleID, articleText, articleCommentCount, articleReactionCount, authorName, outletName, articleHeadline FROM articles
JOIN outlets ON articles.outletID = outlets.outletID
LEFT JOIN (
SELECT articleID, COUNT(DISTINCT(reactionID)) AS articleReactionCount
FROM articlereactions
GROUP BY articleID) articlereactions on articles.articleID = articlereactions.articleID
LEFT JOIN (
SELECT articleID, COUNT(DISTINCT(commentID)) AS articleCommentCount
FROM articlecomments
GROUP BY articleID) articlecomments on articles.articleID = articlecomments.articleID
ORDER BY articles.articleID DESC;

-- Get the 4 most articles and their reaction and comment counts, order with newest posts first
SELECT * FROM articles
JOIN outlets ON articles.outletID = outlets.outletID
LEFT JOIN (
SELECT articleID, COUNT(DISTINCT(reactionID)) AS articleReactionCount
FROM articlereactions
GROUP BY articleID) articlereactions on articles.articleID = articlereactions.articleID
LEFT JOIN (
SELECT articleID, COUNT(DISTINCT(commentID)) AS articleCommentCount
FROM articlecomments
GROUP BY articleID) articlecomments on articles.articleID = articlecomments.articleID
ORDER BY articles.articleID DESC
LIMIT 4;

-- Get all the columns of an article and its outlet information
SELECT * FROM articles
JOIN outlets ON articles.outletID = outlets.outletID 
AND articles.articleID = 1;

-- Get the count of total reactions for a specific article:
SELECT articleID, COUNT(reactionID) AS articleReactionCount
FROM articleReactions
WHERE articleID = 1;

-- Get the comments and commenter usernames for a specific articles:
SELECT commentID, commentText, userName FROM articleComments
JOIN articles ON articleComments.articleID = articles.articleID
JOIN users ON articleComments.userID = users.userID 
AND articles.articleID = 1;

-- Get the count of likes for the article:
SELECT articleID, COUNT(reactionID) AS "LIKES"
FROM articleReactions
WHERE reactionType = "LIKE"
AND articleID = 1;

-- Get the count of dislikes for the article:
SELECT articleID, COUNT(reactionID) AS "DISLIKES"
FROM articleReactions
WHERE reactionType = "DISLIKE"
AND articleID = 1;

-- Get both the counts of the likes and dislikes as seperate colums in one query for a specific article:
SELECT articleID,
COUNT(CASE WHEN reactionType = "LIKE" THEN 1 END)  AS "LIKES",
COUNT(CASE WHEN reactionType = "DISLIKE" THEN 1 END) AS "DISLIKES"
FROM articleReactions
WHERE articleID = 1;

-- List all the users that follow a specific user:
SELECT userFollower.userName as userFollowerName, userFollows.userName as userFollowsName, userFollower.userID as followsID  FROM usersFollowsUsers
JOIN users userFollower ON userFollower.userID = usersFollowsUsers.userID
JOIN users userFollows ON userFollows.userID = usersFollowsUsers.followID
AND userFollows.userID = 1;

-- Get the list of all the users that user follows::
SELECT userFollower.userName as userFollowerName, userFollows.userName as userFollowsName, userFollows.userID as followerID  FROM usersFollowsUsers
JOIN users userFollower ON userFollower.userID = usersFollowsUsers.userID
AND userFollower.userID = 1
JOIN users userFollows ON userFollows.userID = usersFollowsUsers.followID;




