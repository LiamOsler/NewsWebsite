<?php
$articleID = $_GET["articleID"];

$querySQL = "   SELECT * FROM articles
                JOIN outlets ON articles.outletID = outlets.outletID 
                AND articles.articleID = {$articleID}";

$result = $dbconn->query($querySQL);
foreach($result as $article){
?>
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4"><?php echo($article["articleHeadline"]); ?></h1>
        <p class="lead"><?php echo($article["outletName"]); ?></p>
    </div>
</div>
<div class="container">
    <p class="lead"><?php echo($article["articleText"]); ?></p>
    <hr>
<?php
}
?>
    <h2>Reactions</h2>
    <hr>

    <h2>Comments</h2>
    <hr>
</div>
<?php
$querySQL = "   SELECT commentID, commentText, userName, users.userID as commenterID FROM articleComments
                JOIN articles ON articleComments.articleID = articles.articleID
                JOIN users ON articleComments.userID = users.userID 
                AND articles.articleID = {$articleID}";

$result = $dbconn->query($querySQL);
foreach($result as $comment){
?>

<div class="card bg-light mb-3">
  <div class="card-header"><a href = "users.php?userID=<?php echo($comment["commenterID"]); ?>">@<?php echo($comment["userName"]); ?></a></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo($comment["commentText"]); ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<h2></h2>

<?php
}
?>