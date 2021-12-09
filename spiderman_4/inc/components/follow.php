<?php

    // If the user has pressed the follow button on someone's profile
    if (isset($_POST["follow"])) {

        // Include the db file -- no functions necessary because there is no user-submitted data
        require_once "../../db/db.php";

        // Retrieve existing session -- the user has to be logged in to see the button to follow
        session_name('legalnews');
        session_start();

        // Retrieve the following user's ID and the ID of the user to follow
        $userID = $_SESSION["userID"];
        $followID = $_POST["id-to-follow"];

        // Insert pair of values into database table usersfollowsusers
        $followSQL =    "INSERT INTO `usersfollowsusers`(`userID`, `followID`)
                        VALUES ('{$userID}', '{$followID}')";
        $dbconn->query($followSQL);
        $dbconn->close();

        // Redirect to the page the user just followed
        header("Location: ../../users.php?userID=" . $followID);
        die();
    }
    // Redirect if the user has not submitted the form
    else {
        header("Location: ../../index.php");
        die();
    }

?>