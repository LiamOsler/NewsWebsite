<?php include "db/db.php" ?>

<?php include "inc/header.php" ?>

<main>
<h1>Latest News</h1>

<pre>
<?php
    $querySQL = "SELECT * FROM articles";
    $result = $dbconn->query($querySQL);

    print_r($result);

    foreach($result as $article){
        print_r($article);
    }
?>
</pre>

</main>

<?php include "inc/footer.php" ?>