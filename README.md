### Nova Scotia Court News Website

#### Early concept homepage design:
<img src="READMEimg/concept1.png" height="400">
--- 

### Contributors:

- Adam Melvin 
- Liam Osler 
- Sarah Pollock-Jordan
- Rachel Woodside
---

### Website goals: 

- Aggregate rulings from the Courts of Nova Scotia, present them in an accessible and easy to read fashion for users from a broad range of demographics.
- Index page "newsfeed" that aggregates sources such as the Courts of Nova Scotia's RSS Feed, CanLII's Nova Scotia RSS Feeds and other local news outlets for stories relevant to the court rulings and legislation in Nova Scotia.
- Means for users to add comments and/or reactions to the content on the Index page.
- Means for users to "follow" a certain topic, ruling, user, or other items.
- Provide a forum for discussions about Nova Scotia court rulings, legislation and legal affairs.

---

### Website Users: 

- #### Administrators:
    - Elevated user privileges
    - Manages other user accounts
    - Manages moderators and users
    
- #### Moderators:
    - Moderates discussion boards
        - May hide content as deemed appropriate by the terms of acceptable behaviour outlined in the user agreement to terms and conditions.

- #### Registered users (general users or not yet verified users):
    - Anyone can register for account
        - Must agree to terms and conditions during registration
        - User can upload a profile picture that creates their user icon
    - Can follow a topic or a ruling
    - Has a userpage that displays the user's activity feed
        - Items the user has commented on
        - Items the user has reacted to
        - Activity feed can be set to public/private according to user preference 

- #### Verified users (Law professionals, politicians, journalists, etc.)
    - Must be verified by the website (akin to Twitter verification)
        - User icon shows a verification symbol
        - Same features as registered users, but may also publish opinion pieces/articles/announcements 

---

### Technology Stack:
- PHP
- MySQL
- JavaScript
- CSS
- Libraries:
    - [Bootstrap 4.0](https://getbootstrap.com/docs/4.0/getting-started/introduction/)

    
### Website file structure:
```
website
├── db
│   ├── db.php
│   └── functions.php
├── inc
│   ├── components
│   │   ├── articledisplay.php
│   │   ├── latestnews.php
│   │   ├── login.php
│   │   ├── searcharea.php
│   │   └── userdisplay.php
│   ├── footer.php
│   └── header.php
├── styles
│   └── main.css
├── about.php
├── article.php
├── index.php
├── loginpage.php
├── newuser.php
├── test.php
└── users.php
```

### Database Schema:
![Image of Schema](READMEimg/dbschema-2.png)


## Sample Code:
### Creating tables for the users, their salt and peppers: 
```sql
CREATE TABLE users (
    userID int AUTO_INCREMENT,
    privateID varchar(255),
	userName varchar(255),
	firstName varchar(255),
    lastName varchar(255),
	emailAddress varchar(255),
	registrationDate datetime,
    verificationStatus bool,
    profileVisibility bool,
    PRIMARY KEY (userID),
	INDEX NAME (privateID)
);

CREATE TABLE userSaltAndPepper(
	privateID varchar(255),
    userSalt varchar(32),
    userPepper varchar(32),
    PRIMARY KEY (privateID),
    FOREIGN KEY (privateID) REFERENCES users(privateID)
    );
    
CREATE TABLE userHashes(
	privateID varchar(255),
	passwordHash varchar(32),
    PRIMARY KEY (privateID),
    FOREIGN KEY (privateID) REFERENCES users(privateID)
    );
```

Note: the user has both a public "userID", which is a simple incremental value used for the purposes of posting content on the website, and for following other users. The user also has a "privateID" which is used only for the password related purposes.

### Populating the tables:


### Password input check salting routine (with print output) in PHP:
```php
<?php
    $usernameInput = sanitizeData($_POST["username"]);
    $passwordInput = sanitizeData($_POST["password"]);

    echo "User Input:";
    echo "<br>";
    echo($usernameInput);
    echo "<br>";
    echo($passwordInput);

    $querySQL = "   SELECT userName, privateID from users 
                    WHERE userName = '{$usernameInput}'";
    $result = $dbconn->query($querySQL);
    $rowcount = mysqli_num_rows($result); 
    echo "<br>";

    if($rowcount < 1){
        echo("Username or Password Incorrect");
    }  
    else{
        foreach($result as $current){
            $privateID = $current["privateID"];
            echo "<br>";
            echo("Username found, privateID " );
            echo "<br>";
            echo($current["userName"] . ", " . $privateID );
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
        }else{
            echo "Username or Password Incorrect";
        }
    } 
?>
```

### User enters their password in the login modal:
![Image of login salt, pepper and hashing](READMEimg/login-2.png)
### The output of the code above:
![Image of login salt, pepper and hashing](READMEimg/login-3.png)
### Explanation:
1. The user's input is displayed (as shown in the figure above, "Art" is the username and "password" is the password)
2. The database is queried for the username, and if it is found the username and the user's privateID are displayed. If the username is not found the string "Username or Password Incorrect" is displayed.
3. The user salt and pepper table is queried for the privateID, and the privateID, the userSalt and the userPepper are displayed on the screen.
4. The user's salt is concatenated to the password input (in this case just the word "password", as above) and the user's pepper, which is written as  ``` $saltAndPepperPasswordInput = $userSalt . $passwordInput . $userPepper;``` in the code above.
5. This salt and peppered password is hashed with MD5
6. The userHash database is queried using the username's corresponding privateID and the stored password hash is displayed.
7. A parity check is performed. If the checksum of the salted and peppered input matches the stored password hash, "Password is correct" is displayed. If not "Username or Password is Incorrect" is displayed.
