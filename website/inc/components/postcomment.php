<?
    // Require access to the database
    require_once "db.php";

    // Check to ensure the form was submitted in order to post a comment
    if (isset($_POST["post-comment"])) {
        // Store submitted user info, with sanitization
        $commentText = sanitizeData($_POST["new-comment-text"]);
        $userID = $_SESSION["userID"];
        $articleID = $_POST["comment-article-id"];

        // If the comment is empty, redirect with an error message in the query string
        if (empty($email) && empty($password)) {
            header("Location: ../article.php?articleID={$articleID}&error=emptycomment");
            die();
        }

        // Insert the comment into the articleComments table with a prepared statement
        $newCommentSQL = " INSERT INTO `e_login` (`commentText`, `userID`, `articleID`)
                            VALUES (?, ?, ?);";

        $newCommentStmt = mysqli_stmt_init($dbconn);

        // If the prepared statement fails, redirect with an error
        if (!mysqli_stmt_prepare($newCommentStmt, $newCommentSQL)) {
            header("Location: ../article.php?articleID={$articleID}&error=dberror");
            die();
        }
        
        // Bind, execute, and close the statement
        mysqli_stmt_bind_param($newCommentStmt, "sss", $commentText, $userID, $articleID);
        mysqli_stmt_execute($newCommentStmt);
        mysqli_stmt_close($newCommentStmt);

        // Redirect to the article page, which should contain the newly posted comment
        header("Location: ../article.php?articleID={$articleID}");
        die();
    }
    // If the comment posting form has not been submitted, redirect to the article and kill the script
    else {
        header("Location: ../article.php?articleID={$articleID}");
        die();
    }
    