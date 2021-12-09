
<?php
include "../../db/db.php";
include "../../db/functions.php";


$xmlDoc=new DOMDocument();

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$username = sanitizeData($_GET["username"]);
$resultCount = 0;
//lookup all links from the xml file if length of q>0
if (strlen($username)>0) {
    $querySQL = "   SELECT username, userID 
                    FROM users
                    WHERE `username` = '{$username}'";
    $result = $dbconn->query($querySQL);

    while ($current = $result->fetch_assoc()){
        $resultCount+=1;
    }


}

if($resultCount > 0){
    echo "Username is already taken";
}

else{
    echo "Username is valid";
}

?>