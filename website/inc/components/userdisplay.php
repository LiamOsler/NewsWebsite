<div class = "row">
    <?php
        //Get the posted userID from the URL:
        
        if(isset($_GET['userID'])) {
            $userID = $_GET['userID'];
        } else {
            $userID = NULL;
        }

        if (!$userID){

            $querySQL = " SELECT userName, userID from users";
            $result = $dbconn->query($querySQL);

            //Print the user's information on the page:
            foreach($result as $user){
        ?>
        
        <div class = "col-lg-2 col-md-3 col-sm-4 col-4 d-flex align-items-stretch">
                <div class="card user-grid">
                <a href = "users.php?userID=<?php echo($user["userID"]);?>">
                    <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg"  height="10vh" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                    </svg>
                    <hr>
                    <h6 class="card-title">@<?php echo($user["userName"]);?></h6>
                    </div>
                </a>
                </div>
        </div>


        <?php
            }
        } else {

            // Determine whether this user follows the user whose page they are looking at
            $isFollowing = false;
            $followingSQL = "SELECT *
                            FROM `usersfollowsusers`
                            WHERE `userID` = {$_SESSION["userID"]}
                            AND `followID` = {$userID}";
            $result = $dbconn->query($followingSQL);
            if ($result->num_rows > 0) {
                $isFollowing = true;
            }

            //Query that gets all of the columns for the posted user's table
            $querySQL = "   SELECT * from users 
                            WHERE userID = {$userID}";
            $result = $dbconn->query($querySQL);

        //Print the user's information on the page:
        foreach($result as $user){
    ?>
        <div class = "col-lg-6">
            <div class="card text-center">
                <div class="card-header">
                <h1 class="card-title">@<?php echo($user["userName"]);?></h1>
                </div>
                <div class="card-body">
                <p class="card-text">
                    <?php echo($user["firstName"] . " " . $user["lastName"] );?>
                </p>
                    <svg xmlns="http://www.w3.org/2000/svg"  height="20vh" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                    </svg>
                <?php
                    // If the user is logged in, not looking at their own profile and does not already follow the user
                    if(isset($_SESSION["userID"]) && $_GET["userID"] !== $_SESSION["userID"] && !$isFollowing) {
                        // Display the follow button
                ?>
                    <hr>
                    <form method="POST" action="inc/components/follow.php">
                        <label for="id-to-follow" hidden>User to Follow</label>
                        <input type="text" name="id-to-follow" id="id-to-follow" value="<?php echo $_GET["userID"];?>" hidden>
                        <button class="btn btn-lg btn-info" type="submit" name="follow">Follow</button>
                    </form>
                <?php
                    // If the user already follows this user
                    } else if ($isFollowing) {
                ?>
                    <hr>
                    <form method="POST" action="inc/components/unfollow.php">
                        <label for="id-to-unfollow" hidden>User to Follow</label>
                        <input type="text" name="id-to-unfollow" id="id-to-unfollow" value="<?php echo $_GET["userID"];?>" hidden>
                        <button class="btn btn-lg btn-outline-secondary" type="submit" name="unfollow">Unfollow</button>
                    </form>
                <?php
                    }
                    // Close if statement checking for whether which follow button to show, if any
                ?>
                </div>
            </div> 
        </div>
        <?php
            }
        ?>

    <div class = "col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                Followers <i class="bi bi-arrow-bar-down"></i>
            </div>
    
            <ul class="list-group list-group-flush">
                <?php
                    $querySQL = "   SELECT userFollower.userName as userFollowerName, userFollows.userName as userFollowsName, userFollower.userID as followsID  FROM usersFollowsUsers
                                    JOIN users userFollower ON userFollower.userID = usersFollowsUsers.userID
                                    JOIN users userFollows ON userFollows.userID = usersFollowsUsers.followID
                                    AND userFollows.userID = {$userID}";
                    $result = $dbconn->query($querySQL);

                    foreach($result as $userFollowers){
                ?>
            <li class="list-group-item"> <a href = "users.php?userID=<?php echo($userFollowers["followsID"]);?>">@<?php echo($userFollowers["userFollowerName"]);?></a></li>

            <?php
                }
            ?>
            </ul>
        </div>
    </div>

    <div class = "col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                Following <i class="bi bi-arrow-bar-up"></i>
            </div>
    
            <ul class="list-group list-group-flush">
                <?php
                    $querySQL = "   SELECT userFollower.userName as userFollowerName, userFollows.userName as userFollowsName, userFollows.userID as followerID  FROM usersFollowsUsers
                                    JOIN users userFollower ON userFollower.userID = usersFollowsUsers.userID
                                    AND userFollower.userID = {$userID}
                                    JOIN users userFollows ON userFollows.userID = usersFollowsUsers.followID";
                    $result = $dbconn->query($querySQL);

                    foreach($result as $userFollowers){
                ?>
            <li class="list-group-item"><a href = "users.php?userID=<?php echo($userFollowers["followerID"]);?>">@<?php echo($userFollowers["userFollowsName"]);?></a></li>

            <?php
                }
            ?>
            </ul>
        </div>
    </div>
<?php
        }
?>
</div>