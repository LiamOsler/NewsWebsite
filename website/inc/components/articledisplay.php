<?php
$articleID = $_GET["articleID"];

$querySQL = "   SELECT * FROM articles
                JOIN outlets ON articles.outletID = outlets.outletID 
                AND articles.articleID = {$articleID}";

$result = $dbconn->query($querySQL);
foreach($result as $article){
?>
<h1><?php echo($article["articleHeadline"]); ?></h1>
<p><?php echo($article["outletName"]); ?></p>
<p><?php echo($article["articleText"]); ?></p>

<?php
}
?>