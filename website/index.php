<?php include "db/db.php" ?>

<?php include "inc/header.php" ?>

<main>

<div class = "container">
    <div class = "row">

    <h1>Latest News</h1>


        <?php
            $querySQL = "   SELECT * FROM articles
                            JOIN outlets ON articles.outletID = outlets.outletID
                            LEFT JOIN (
                            SELECT articleID, COUNT(DISTINCT(reactionID)) AS articleReactionCount
                            FROM articlereactions
                            GROUP BY articleID) articlereactions on articles.articleID = articlereactions.articleID
                            LEFT JOIN (
                            SELECT articleID, COUNT(DISTINCT(commentID)) AS articleCommentCount
                            FROM articlecomments
                            GROUP BY articleID) articlecomments on articles.articleID = articlecomments.articleID";
            $result = $dbconn->query($querySQL);

            foreach($result as $article){
            ?>
            <div class="col-md-6">
                <div class="card bg-light mb-3">
                    <div class="card-header"> 
                        <a href = "<?php echo($article["articleURL"])?>">
                            <h5 class="card-title"><?php echo($article["articleHeadline"])?></h5>
                        </a><?php echo($article["authorName"])?></div>
                        <div class="card-body">
                        
                            <p class="card-text"><?php echo($article["articleText"])?></p>

                            <p>
                                <?php 
                                    if($article["articleReactionCount"]){
                                        echo($article["articleReactionCount"] . " Reactions");
                                    }
                                    else{
                                        echo("No Reactions");
                                    }
                                ?>
                                and
                                <?php 
                                    if($article["articleCommentCount"]){
                                        echo($article["articleCommentCount"] . " Comments");
                                    }
                                    else{
                                        echo("No comments");
                                    }
                                ?>
                            </p>

                        </div>
                </div>
            </div>
            

        <?php
            } //Close foreach($result as $article)
        ?>


    </div>
</div>
</main>

<script>
</script>

<?php include "inc/footer.php" ?>