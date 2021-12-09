<?php
    // Check for existing session
    session_name("legalnews");
    session_start();

    require_once "../../db/db.php";

    // Check if the user is logged in
    if (isset($_SESSION["userID"])) {
        // Check if the user is an admin
        $userID = $_SESSION["userID"];
        echo $userID;

        $checkAdminSQL =    "SELECT *
                            FROM `administrators`
                            WHERE `userID` = {$userID}";
        $adminResult = $dbconn->query($checkAdminSQL);
        echo $checkAdminSQL;
        print_r($adminResult);
        
        // If no rows are returned from the check admin query, the user is not an admin
        if ($adminResult->num_rows < 1) {
            // Redirect to index.php
            header("Location: ../../index.php");
            die();
        // Otherwise, redirect them to the admin.php page
        } else {
            header("Location: ../../admin.php");
            die();
        }
    // If the user is not logged in
    } else {
        // Redirect and kill the script
        header("Location: ../../index.php");
        die();
    }
?>