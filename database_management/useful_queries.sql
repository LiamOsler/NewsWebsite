-- Get the contents of the articles and their reaction and comment counts
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
ORDER BY articles.articleID DESC;





