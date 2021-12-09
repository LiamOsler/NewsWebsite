<div class = "row">

<h1>Latest News</h1>


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
                    
                        <p class="card-text"><?php echo($article["articleText"])?></p>

                        <a href= "article.php?articleID=<?php echo($article["articleID"])?>">
                            <?php
                                if($article["articleCommentCount"]){
                                    echo($article["articleCommentCount"] . " comments");
                                }else{
                                    echo("0 comments");
                                }
                            ?>
                        </a>
                    </div>
            </div>
        </div>
        

    <?php
        } //Close foreach($result as $article)
    ?>


</div>