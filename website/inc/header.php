<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

session_name('legalnews');
session_start();
include "db/db.php";
include "db/functions.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load in Bootstrap: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link href="css/main.css" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <title>Nova Scotia Courts Website</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Nova Scotia Legal News</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Latest News</a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link" href="users.php">Users</a>
      </li>
    </ul>

    <?php
    if(isset($_SESSION["userName"])){
      ?>
      <button id="logout-button" class="btn btn-outline-secondary btn-lg btn-lg"><a href="logout.php" style = "text-decoration: none">Logout <i class="bi-door-open" style="font-size: 1em"></i></i></a>  </button>  
        <button  id = "profile-button" class="btn btn-success btn-lg"><a href="users.php?userID=<?php echo($_SESSION["userID"])?>" style = "text-decoration: none">My Profile <i class="bi-person-circle" style="font-size: 1em"></i></i></a>  </button>  
      </span>
      <?php
    }
    else{
      ?>
      <button id = "newuser-button" class="btn btn-outline-secondary btn-lg login-button"  data-toggle="modal" data-target="#newAccountModal">New User <i class="bi-person-plus" style="font-size: 1rem;"></i></button>
      <button id = "login-button" class="btn btn-success btn-lg"  data-toggle="modal" data-target="#loginModal"> <a href="#" style = "text-decoration: none">Login &nbsp;<i class="bi-person-circle" style="font-size: 1em"></i></i></a>  </button>  


      <?php
    }
    ?>

  </div>
</nav>

<?php
include "inc/components/loginmodal.php";?>


