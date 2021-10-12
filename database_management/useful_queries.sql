-- Get the contents of the articles and their reaction and comment counts, order with newest posts first
SELECT articles.articleID, articles.articleText articles.articleCommentCount FROM articles
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

-- Get the comments, and usernames for a specific post:
SELECT commentID, commentText, userName FROM articleComments
JOIN articles ON articleComments.articleID = articles.articleID
JOIN users ON articleComments.userID = users.userID 
AND articles.articleID = 1;

-- Get the count of total reactions for the article:
SELECT articleID, COUNT(reactionID) AS articleReactionCount
FROM articleReactions
WHERE articleID = 1;

-- Get the count of likes for the post:
SELECT articleID, COUNT(reactionID) AS "LIKES"
FROM articleReactions
WHERE reactionType = "LIKE"
AND articleID = 1;

-- Get the count of likes for the post:
SELECT articleID, COUNT(reactionID) AS "DISLIKES"
FROM articleReactions
WHERE reactionType = "DISLIKE"
AND articleID = 1;

-- Get both the counts of the likes and dislikes as seperate colums in one query:
SELECT articleID,
COUNT(CASE WHEN reactionType = "LIKE" THEN 1 END)  AS "LIKES",
COUNT(CASE WHEN reactionType = "DISLIKE" THEN 1 END) AS "DISLIKES"
FROM articleReactions
WHERE articleID = 1;

SELECT * FROM articles
WHERE articleID = 1;

SELECT * FROM articles
JOIN outlets ON articles.outletID = outlets.outletID 
AND articles.articleID = 1;




