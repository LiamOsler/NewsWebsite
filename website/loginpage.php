<?php include "inc/header.php" ?>

<div class = "container">

<?php
    if(isset($_SESSION["userName"]))
    {
        echo "Hello ".  $_SESSION["userName"] . " " . $_SESSION["userID"];
        echo "<br>";
    }
    else
    {
        echo "Hello";
        echo "<br>";
    }

    $usernameInput = sanitizeData($_POST["username"]);
    $passwordInput = sanitizeData($_POST["password"]);

    echo "User Input:";
    echo "<br>";
    echo($usernameInput);
    echo "<br>";
    echo($passwordInput);

    $querySQL = "   SELECT userName, userID, privateID from users 
                    WHERE userName = '{$usernameInput}'";
    $result = $dbconn->query($querySQL);
    $rowcount = mysqli_num_rows($result); 
    echo "<br>";

    if($rowcount < 1){
        echo("Username or Password Incorrect");
    }  
    else{
        foreach($result as $current){
            $userID = $current["userID"];
            $userName = $current["userName"];
            $privateID = $current["privateID"];
            echo "<br>";
            echo("Username found, privateID " );
            echo "<br>";
            echo($userName . ", " . $privateID );
            echo "<br>";

            //Get the user's salt and peppers for password spicing:
            $querySQL = "   SELECT privateID, userSalt, userPepper from userSaltAndPepper 
                            WHERE privateID = '{$privateID}'";
            $result = $dbconn->query($querySQL);

            foreach($result as $current){
                $userSalt = $current["userSalt"];
                $userPepper = $current["userPepper"] ;
                echo "<br>";
                echo("privateID, userSalt, userPepper" );
                echo "<br>";
                echo($current["privateID"] . ", " . $current["userSalt"] . ", " . $current["userPepper"] );
                
                echo "<br>";
                echo "<br>";
                echo("Salted and peppered password input:" );
                $saltAndPepperPasswordInput = $userSalt . $passwordInput . $userPepper;
                echo "<br>";
                echo($saltAndPepperPasswordInput);
                
                echo "<br>";
                echo "<br>";
                echo("MD5 checksum of salted and peppered input:" );
                echo "<br>";
                $saltAndPepperPasswordInputChecksum = md5($saltAndPepperPasswordInput);
                echo($saltAndPepperPasswordInputChecksum);

                //Get the user's password from the database:
                $querySQL = "   SELECT privateID, passwordHash from userHashes
                                WHERE privateID = '{$privateID}'";
                $result = $dbconn->query($querySQL);
                foreach($result as $current){
                    $passwordHash = $current["passwordHash"];
                    echo "<br>";
                    echo "<br>";
                    echo("Stored user hash:" );
                    echo "<br>";
                    echo($passwordHash);
                }

            }
        }
        echo "<br>";
        echo "<br>";
        echo("Parity Check:");
        echo "<br>";
        if($saltAndPepperPasswordInputChecksum == $passwordHash){
            echo "Password is correct";
            $_SESSION["userName"] = $userName;
            $_SESSION["userID"] = $userID;

        }else{
            echo "Username or Password Incorrect";
        }
    } 
?>    


<main>
    <div class = "container">



    </div>
</main>

<script>
</script>

</div>

<?php include "inc/footer.php" ?>