<!--Edited by Adam Melvin - B00597004-->
<?php

    include "inc/header.php";

    // If the admin has opted to delete an article
    if (isset($_POST["delete"])) {
        $articleID = $_POST["articleID"];
        $deleteCommentsSQL = "DELETE FROM `articlecomments`
                            WHERE `articleID` = {$articleID}";

        $deleteArticleSQL = "DELETE FROM `articles`
                            WHERE `articleID` = {$articleID}";

        // echo $deleteCommentsSQL;
        // echo "<br>";
        // echo $deleteArticleSQL;
        $dbconn->query($deleteCommentsSQL);
        $dbconn->query($deleteArticleSQL);
    }

?>
<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Admin Page</h1>
            
        </div>
    </div>

    <div class ="row container">
        <h1>Article List</h1>
        <?php
            $querySQL = "   SELECT articles.articleID, articleText, articleCommentCount, authorName, outletName, articleHeadline FROM articles
                            JOIN outlets ON articles.outletID = outlets.outletID
                            LEFT JOIN (
                            SELECT articleID, COUNT(DISTINCT(commentID)) AS articleCommentCount
                            FROM articlecomments
                            GROUP BY articleID) articlecomments on articles.articleID = articlecomments.articleID
                            ORDER BY articles.articleID DESC;";
            $result = $dbconn->query($querySQL);

            foreach($result as $article){
            ?>
            <div class="col-md-6">
                <div class="card bg-light mb-3">
                    <div class="card-header"> 
                        <a href = "article.php?articleID=<?php echo($article["articleID"])?>">
                            <h5 class="card-title"><?php echo($article["articleHeadline"])?></h5>
                        </a><?php echo($article["authorName"])?></div>
                        <div class="card-body">
                            <form method="POST" action="admin.php">
                                <?php // Take the article id and use it to delete the article ?>
                                <input type="text" name="articleID" value="<?php echo($article['articleID']);?>" hidden>
                                <button class="btn btn-info" type="submit" method="POST" action="admin.php" name="delete">Delete this article</button>
                            </form>
                            
                        </div>
                </div>
            </div>
        <?php
            } //Close foreach($result as $article)
        ?>
    </div> 
</main>

<?php include "inc/footer.php" ?>
