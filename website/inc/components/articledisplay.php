<?php
  $articleID = $_GET["articleID"];

  $querySQL = "   SELECT * FROM articles
                  JOIN outlets ON articles.outletID = outlets.outletID 
                  AND articles.articleID = {$articleID}";

  $result = $dbconn->query($querySQL);
  foreach($result as $article){
?>

    <!--Edited by Adam Melvin - B00597004-->
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
  // If the user is logged in, display form for submitting comments
  //if(isset($_SESSION["userID"])) {
    /* OPTION TO FILL IN THE LOGGED IN USER'S ID AS THE CARD HEADER TO MATCH OTHER COMMENTS */
?>
  <div class="card bg-light mb-3">
  <div class="card-header">New Comment</a></div>
  <div class="card-body">
    <form action="postcomment.php" method="POST">
      <div class="mb-3">
        <label for="new-comment-text" class="form-label">Write a new comment</label>
        <textarea class="form-control" rows="3" name="new-comment-text" id="new-comment-text" required></textarea>
      </div>
      <input type="text" name="comment-article-id" id="comment-article-id" value="<?php echo $articleID; ?>" hidden>
      <button class="btn btn-info" type="submit" value="post-comment" action="postcomment.php" method="POST">Post Comment</button>
    </form>
  </div>
</div>

<?php
  // Close if statement checking for user login status
  //}

  // Display comments regardless of login status
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