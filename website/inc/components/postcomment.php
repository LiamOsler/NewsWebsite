<?php
    // Require access to the database
    require_once "../../db/db.php";
    require_once "../../db/functions.php";

    // Check for a session to access session variables
    session_name('legalnews');
    session_start();

    // Check to ensure the form was submitted in order to post a comment
    if (isset($_POST["post-comment"])) {
        // Store submitted user info, with sanitization
        $commentText = sanitizeData($_POST["new-comment-text"]);
        $userID = $_SESSION["userID"]; 
        $articleID = $_POST["comment-article-id"];

        // If the comment is empty, redirect with an error message in the query string
        if (empty($email) && empty($password)) {
            header("Location: ../../article.php?articleID={$articleID}");
            die();
        }

        // Insert the comment into the articleComments table with a prepared statement
        $newCommentSQL = " INSERT INTO `articlecomments` (`commentText`, `userID`, `articleID`)
                            VALUES (?, ?, ?);";

        $newCommentStmt = mysqli_stmt_init($dbconn);

        // If the prepared statement fails, redirect with an error
        if (!mysqli_stmt_prepare($newCommentStmt, $newCommentSQL)) {
            header("Location: ../../article.php?articleID={$articleID}&error=dberror");
            die();
        }
        
        // Bind, execute, and close the statement
        mysqli_stmt_bind_param($newCommentStmt, "sii", $commentText, $userID, $articleID);
        mysqli_stmt_execute($newCommentStmt);
        mysqli_stmt_close($newCommentStmt);

        // Redirect to the article page, which should contain the newly posted comment
        header("Location: ../../article.php?articleID={$articleID}");
        die();
    }
    // If the comment posting form has not been submitted, the script is being accessed improperly - redirect to index.php
    else {
        header("Location: ../../index.php");
        die();
    }
?>