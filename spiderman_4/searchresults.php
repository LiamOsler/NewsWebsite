<?php include "inc/header.php" ?>
<?php include "inc/components/advsearch.php" ?>

<main class="container">
    <div class="row">
    <h1>Search Results</h1>

<?php
    // If the search query string is set
    if (isset($_GET["search-text"])) {
        $searchText = $_GET["search-text"];

        // If the search-by criterion set, alter the SQL query to match the search terms with the specified criterion
        if (isset($_GET["search-by"])) {

            // Alter the SQL query to match the search terms with the specified criterion
            $searchCriterion = $_GET["search-by"];
            
            $searchSQL = "  SELECT articles.articleID, articleText, articleCommentCount, articleReactionCount, authorName, outletName, articleHeadline FROM articles
                            JOIN outlets ON articles.outletID = outlets.outletID
                            LEFT JOIN (
                            SELECT articleID, COUNT(DISTINCT(reactionID)) AS articleReactionCount
                            FROM articlereactions
                            GROUP BY articleID) articlereactions on articles.articleID = articlereactions.articleID
                            LEFT JOIN (
                            SELECT articleID, COUNT(DISTINCT(commentID)) AS articleCommentCount
                            FROM articlecomments
                            GROUP BY articleID) articlecomments on articles.articleID = articlecomments.articleID
                            WHERE {$searchCriterion} LIKE '%{$searchText}%'
                            ORDER BY articles.articleID DESC;";             

        // Otherwise, perform the default search by article title
        } else {
            
            $searchSQL = "  SELECT articles.articleID, articleText, articleCommentCount, articleReactionCount, authorName, outletName, articleHeadline FROM articles
                        JOIN outlets ON articles.outletID = outlets.outletID
                        LEFT JOIN (
                        SELECT articleID, COUNT(DISTINCT(reactionID)) AS articleReactionCount
                        FROM articlereactions
                        GROUP BY articleID) articlereactions on articles.articleID = articlereactions.articleID
                        LEFT JOIN (
                        SELECT articleID, COUNT(DISTINCT(commentID)) AS articleCommentCount
                        FROM articlecomments
                        GROUP BY articleID) articlecomments on articles.articleID = articlecomments.articleID
                        WHERE articleHeadline LIKE '%{$searchText}%'
                        ORDER BY articles.articleID DESC;";   
        }

        $results = $dbconn->query($searchSQL);        

        // If there are no results
        if (mysqli_num_rows($results) == 0) {
            echo "<p>This search returned no results.</p>";
        }
        else { 
            foreach($results as $article){
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
                                    if($article["articleReactionCount"]){
                                        echo($article["articleReactionCount"] . " reactions | ");
                                    }else{
                                        echo("0 reactions | ");
                                    }
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
        } // Close else check for query returning results
    } // Close if check for search-text being set
?>
        
    </div>
</main>

<script>
</script>

<?php include "inc/footer.php" ?>