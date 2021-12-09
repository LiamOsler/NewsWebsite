<div class = "row">

<h1>Latest News</h1>


    <?php
        $querySQL = "   SELECT articles.articleID, articletext, articlecommentcount, authorname, outletname, articleheadline FROM articles
                        JOIN outlets ON articles.outletID = outlets.outletID
                        LEFT JOIN (
                        SELECT articleID, COUNT(DISTINCT(commentID)) AS articlecommentcount
                        FROM articlecomments
                        GROUP BY articleID) articlecomments on articles.articleID = articlecomments.articleID
                        ORDER BY articles.articleID DESC;";
        $result = $dbconn->query($querySQL);

        while($article = $result->fetch_assoc()){
        ?>
        <div class="col-md-6">
            <div class="card bg-light mb-3">
                <div class="card-header"> 
                    <a href = "article.php?articleID=<?php echo($article["articleID"])?>">
                        <h5 class="card-title"><?php echo($article["articleheadline"])?></h5>
                    </a><?php echo($article["authorname"])?></div>
                    <div class="card-body">
                    
                        <p class="card-text"><?php echo($article["articletext"])?></p>

                        <a href= "article.php?articleID=<?php echo($article["articleID"])?>">
                            <?php
                                if($article["articlecommentcount"]){
                                    echo($article["articlecommentcount"] . " comments");
                                }else{
                                    echo("0 comments");
                                }
                            ?>
                        </a>
                    </div>
            </div>
        </div>
        

    <?php
        } //Close while($result as $article)
    ?>


</div>