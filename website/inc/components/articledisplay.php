<?php
$articleID = $_GET["articleID"];

$querySQL = "   SELECT * FROM articles
                JOIN outlets ON articles.outletID = outlets.outletID 
                AND articles.articleID = {$articleID}";

$result = $dbconn->query($querySQL);
foreach($result as $article){
?>
<h1><?php echo($article["articleHeadline"]); ?></h1>
<hr>
<p><?php echo($article["outletName"]); ?></p>
<p><?php echo($article["articleText"]); ?></p>
<hr>
<?php
}
?>
<h2>Reactions</h2>
<hr>

<h2>Comments</h2>
<hr>

<?php
$querySQL = "   SELECT commentID, commentText, userName FROM articleComments
                JOIN articles ON articleComments.articleID = articles.articleID
                JOIN users ON articleComments.userID = users.userID 
                AND articles.articleID = {$articleID}";

$result = $dbconn->query($querySQL);
foreach($result as $comment){
?>

<div class="card bg-light mb-3" style="">
  <div class="card-header"><?php echo($comment["userName"]); ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo($comment["commentText"]); ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<h2></h2>

<?php
}
?>