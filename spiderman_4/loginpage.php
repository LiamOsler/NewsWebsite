<?php
session_name('legalnews');
session_start();

include "db/db.php";
include "db/functions.php"; 


//Sanitize the username and password input:
$usernameInput = sanitizeData($_POST["username"]);
$passwordInput = sanitizeData($_POST["password"]);

//echo("userNameInput: ");
//echo($usernameInput  );
//echo("<br>");
//echo("passwordInput: ");
//echo($passwordInput );
//echo("<br>");

$passwordInput = md5($passwordInput);
//Query the users table for the username that was inputted 
$querySQL = "   SELECT userName, userID, privateID from users 
                WHERE userName = '{$usernameInput}'";
$result = $dbconn->query($querySQL);
$rowcount = mysqli_num_rows($result); 

//If the username isn't found no rows will be returned
if($rowcount < 1){
    //If no username found then Set the username or password incorrect value to TRUE
    $incorrect = TRUE;
}  
else{
    //Get the first result as the current item:
    while ($current = $result->fetch_assoc()){
        //Set the userID, userName and privateID to their own variables:
        $userID = $current["userID"];
        $username = $current["userName"];
        $privateID = $current["privateID"];

        //echo("userID: ");
        //echo($userID );
        //echo("<br>");
        //echo("username: ");
        //echo($username );
        //echo("<br>");
        //echo("privateID: ");
        //echo($privateID );
        //echo("<br>");
        //Get the user's salt and peppers for password spicing:
        $querySQL = "   SELECT privateID, userSalt, userPepper from userSaltAndPepper 
                        WHERE privateID = '{$privateID}'";
        $result = $dbconn->query($querySQL);
        //Get the first result as the current item:
        while ($current = $result->fetch_assoc()){
            //Set the user's salt and peppers to their own variables:
            $userSalt = $current["userSalt"];
            $userPepper = $current["userPepper"] ;

            //echo("Salt: ");
            //echo( $userSalt); 
            //echo("<br>");
            //echo("Pepper: ");
            //echo( $userPepper);
            //echo("<br>");
            //echo("Hashed Password Input: ");
            //echo($passwordInput);
            //echo("<br>");

            //Conatenate the salt, password input and the pepper together
            $saltAndPepperPasswordInput = $userSalt . $passwordInput . $userPepper;

            //echo("Salt + Hash + Pepper: ");
            //echo($saltAndPepperPasswordInput);
            //echo("<br>");


            //Get the MD5 checksum of $saltAndPepperPasswordInput and set it to a variable:
            $saltAndPepperPasswordInputChecksum = md5($saltAndPepperPasswordInput);
            //Get the user's hashed password (with salt and pepper) from the database:

            echo($saltAndPepperPasswordInput);
            
            $querySQL = "   SELECT privateID, passwordHash from userHashes
                            WHERE privateID = '{$privateID}'";
            $result = $dbconn->query($querySQL);
            while ($current = $result->fetch_assoc()){
                //Set the user's hashed password to variable:
                $passwordHash = $current["passwordHash"];
                //echo($passwordHash);
            }
        }
    }
    //Check if the hashed input matches the user's hashed password:
    if($saltAndPepperPasswordInputChecksum == $passwordHash){
        //If the password is correct, we can set the SESSION userName and userID values:
        $_SESSION["userName"] = $username;
        $_SESSION["userID"] = $userID;

        //echo("hello");
        header("Location: index.php");
        die();
    }else{
        //If password incorrect then Set the username or password incorrect value to TRUE
        $incorrect = TRUE;
        
    }
}
    if($incorrect){
        header("Location: loginfailed.php");
} 
?>    