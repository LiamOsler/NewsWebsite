
<?php
include "db/db.php";
include "db/functions.php"; 

session_name('legalnews');
session_start();

//Before proceeding, ensure that the posted values are valid for entry in to database:
$registrationValid = TRUE;
$email = sanitizeData($_POST["email"]);
$resultCount = 0;
if (strlen($email)>0) {
    $querySQL = "   SELECT `emailAddress`
                    FROM `users`
                    WHERE `emailAddress` = '{$email}'";
    $result = $dbconn->query($querySQL);

    foreach($result as $current){
        $resultCount+=1;
    }
}

//If the email address exists:
if($resultCount > 0){
    $registrationValid = FALSE;
}

$username = sanitizeData($_POST["username"]);
$resultCount = 0;
if (strlen($username)>0) {
    $querySQL = "   SELECT userName, userID 
                    FROM users
                    WHERE `userName` = '{$username}'";
    $result = $dbconn->query($querySQL);

    foreach($result as $current){
        $resultCount+=1;
    }
}
//If the username address exists:
if($resultCount > 0){
    $registrationValid = FALSE;
}

//Otherwise let the user register:
if($registrationValid == TRUE){
    $password = sanitizeData($_POST["password"]);
    $fName = sanitizeData($_POST["fName"]);
    $lName = sanitizeData($_POST["lName"]);
    $street = sanitizeData($_POST["street"]);
    $city = sanitizeData($_POST["city"]);
    $zip = sanitizeData($_POST["zip"]);

    $querySQL = "   INSERT INTO `users` VALUES
                    (NULL, MD5(UUID()), '{$username}', '{$fName}', '{$lName}', '{$email}', CURRENT_TIMESTAMP, TRUE, TRUE)";

    $result = $dbconn->query($querySQL);

    $querySQL = "   SELECT userName, userID, privateID
                    FROM users
                    WHERE `userName` = '{$username}'";
    $result = $dbconn->query($querySQL);

    foreach($result as $current){
        $privateID = $current["privateID"];
        $querySQL = "   INSERT INTO `userSaltAndPepper` VALUES 
                        ('{$privateID}', LEFT(MD5(UUID()), 8), LEFT(MD5(UUID()), 8))
                    ";
        $dbconn->query($querySQL);

        $querySQL = "   SELECT `userSalt`, `userPepper`, `privateID`
                        FROM userSaltAndPepper
                        WHERE `privateID` = '{$privateID}'";
        $saltresult = $dbconn->query($querySQL);

        foreach($saltresult as $saltcurrent){
            $userSalt = $saltcurrent["userSalt"];
            $userPepper = $saltcurrent["userPepper"]; 
            $querySQL = "   INSERT INTO `userHashes` VALUES
                            ('{$privateID}', MD5(CONCAT('{$userSalt}', MD5('{$password}'), '{$userPepper}')))
                            ";
                        

            $_SESSION["userName"] = $username;
            $_SESSION["userID"] = $userID;

            $dbconn->query($querySQL);
            $dbconn->close();
        }
    }

}

header("Location: index.php");

?>