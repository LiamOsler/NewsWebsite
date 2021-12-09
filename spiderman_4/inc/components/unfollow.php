<?php

    // If the user has pressed the follow button on someone's profile
    if (isset($_POST["unfollow"])) {

        // Include the db file -- no functions necessary because there is no user-submitted data
        require_once "../../db/db.php";

        // Retrieve existing session -- the user has to be logged in to see the button to follow
        session_name('legalnews');
        session_start();

        // Retrieve the following user's ID and the ID of the user to follow
        $userID = $_SESSION["userID"];
        $unfollowID = $_POST["id-to-unfollow"];

        // Insert pair of values into database table usersfollowsusers
        $unfollowSQL =  "DELETE FROM `usersfollowsusers`
                        WHERE `userID` = {$userID}
                        AND `followID` = {$unfollowID}";
        echo $unfollowSQL;
        $dbconn->query($unfollowSQL);
        $dbconn->close();

        // Redirect to the page the user just followed
        header("Location: ../../users.php?userID=" . $unfollowID);
        die();
    }
    // Redirect if the user has not submitted the form
    else {
        header("Location: ../../index.php");
        die();
    }

?>