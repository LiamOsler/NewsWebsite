-- Get the contents of the articles and their reaction and comment counts:
SELECT * FROM articles
JOIN outlets ON articles.outletID = outlets.outletID
LEFT JOIN (
SELECT COUNT(DISTINCT(reactionID)) AS articleReactionCount
FROM articlereactions
GROUP BY articleID) articlereactions on articles.articleID = articlereactions.articleID;





