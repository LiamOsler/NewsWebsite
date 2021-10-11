<?php include "db/db.php" ?>

<?php include "inc/header.php" ?>

<main>

<div class = "container">
    <div class = "row">
    <h1>Latest News</h1>


        <?php
            $querySQL = "SELECT * FROM articles";
            $result = $dbconn->query($querySQL);

            foreach($result as $article){
            ?>
            <div class="col-sm-16 col-md-4 col-lg-3">
            <div class="card bg-light mb-3">
                <div class="card-header"><?php echo($article["authorName"])?></div>
                    <div class="card-body">
                        <a href = "<?php echo($article["articleURL"])?>">
                            <h5 class="card-title"><?php echo($article["articleText"])?></h5>
                        </a>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
            </div>
            </div>
            

        <?php
            } //Close foreach($result as $article)
        ?>


    </div>
</div>
</main>

<?php include "inc/footer.php" ?>