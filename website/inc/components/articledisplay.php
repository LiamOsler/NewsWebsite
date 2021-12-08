<?php
  if(empty($_GET["articleID"])){
    header("Location: index.php");
  }
  $articleID = $_GET["articleID"];

  $querySQL = "   SELECT * FROM articles
                  JOIN outlets ON articles.outletID = outlets.outletID 
                  AND articles.articleID = {$articleID}";

  $result = $dbconn->query($querySQL);
  foreach($result as $article){
?>
  <!--Edited by Adam Melvin - B00597004-->
  <div class="container">
    <div class = "row">
      <div class = "col-md-12">
      <br>
      <h1 class="display-4"><?php echo($article["articleHeadline"]); ?></h1>
      <p class="lead">Published By: <a href = "#"><?php echo($article["outletName"]); ?></a></p>
      <hr>
      <p class="display-6"><?php echo($article["articleText"]); ?></p>
      <br>
      <hr>
      </div>
  <?php
  }
?>
<div class = "col-md-12">
    <h4 class="display-5">Comments</h2>
</div>
<?php
  // If the user is logged in, display form for submitting comments
  
  if(isset($_SESSION["userID"])) {
?>
<div class = "col-md-12">
  <div class="card bg-light mb-3">
    <div class="card-header">New Comment</a></div>
    <div class="card-body">
      <form action="inc/components/postcomment.php" method="POST">
        <div class="mb-3">
          <label for="new-comment-text" class="form-label">Write a new comment</label>
          <textarea class="form-control" rows="3" name="new-comment-text" id="new-comment-text" required></textarea>
        </div>
        <input type="text" name="comment-article-id" id="comment-article-id" value="<?php echo $articleID; ?>" hidden>
        <button class="btn btn-info" type="submit" name="post-comment" action="postcomment.php" method="POST">Post Comment</button>
      </form>
    </div>
  </div>
</div>

<?php
  // Close if statement checking for user login status
  }

  // Display comments regardless of login status
  $querySQL = "   SELECT commentID, commentText, userName, users.userID as commenterID FROM articleComments
                  JOIN articles ON articleComments.articleID = articles.articleID
                  JOIN users ON articleComments.userID = users.userID 
                  AND articles.articleID = {$articleID}";

  $result = $dbconn->query($querySQL);
  $resultCount = 0;

  foreach($result as $comment){
    $resultCount++;
      ?>
        <div class = "col-lg-12">
          <div class="card bg-light mb-3">
            <div class="card-header"><a href = "users.php?userID=<?php echo($comment["commenterID"]); ?>">@<?php echo($comment["userName"]); ?></a></div>
            <div class="card-body">
              <p class="card-text display-6"><?php echo($comment["commentText"]); ?></p>
            </div>
          </div>
        </div>
        <?php
        }
      ?>
    </div>
  </div>
<<<<<<< HEAD
=======
</div>
>>>>>>> 35ace7e997e2b2f0249bfec8579a11b32fc782e3
