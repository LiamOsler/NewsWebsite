<div class = "row">
    <?php
        //Get the posted userID from the URL:
        $userID = $_GET["userID"];

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
                <h1 class="card-title"><?php echo($user["userName"]);?></h1>
                </div>
                <div class="card-body">
                <p class="card-text">
                    <?php echo($user["firstName"] . " " . $user["lastName"] );?>
                </p>
                    <svg xmlns="http://www.w3.org/2000/svg"  height="20vh" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                    </svg>
                <hr>
                <a href="#" class="btn btn-lg btn-info">Follow</a>

                </div>
            </div> 
        </div>
        <?php
            }
        ?>

    <div class = "col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                Followers
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
            <li class="list-group-item"> <a href = "users.php?userID=<?php echo($userFollowers["followsID"]);?>"><?php echo($userFollowers["userFollowerName"]);?></a></li>

            <?php
                }
            ?>
            </ul>
        </div>
    </div>

    <div class = "col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-header">
                Following
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
            <li class="list-group-item"><a href = "users.php?userID=<?php echo($userFollowers["followerID"]);?>"><?php echo($userFollowers["userFollowsName"]);?></a></li>

            <?php
                }
            ?>
            </ul>
        </div>
    </div>

</div>