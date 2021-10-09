<?php ?>

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

    <link href="styles/main.css" rel="stylesheet">

    <title>Nova Scotia Courts Website</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="#">Nova Scotia Legal News</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="#">Rulings</a>
        <a class="nav-item nav-link" href="#">Legislation</a>
        <a class="nav-item nav-link" href="#">News & Opinion</a>
        <a class="nav-item nav-link" href="#">About</a>
      
    </div>
  </div>


</nav>


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Nova Scotia Legal News</h1>
    <p class="lead">A place to find and comment on the latest rulings, legislation and other legal affairs in Nova Scotia</p>
    <form>
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="submit"><i class="bi-search" style="font-size: 1.5rem;"></i></button>
                </div>
            </div>
    </form>

    <br>
  </div>
</div>

<form>
    <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login <i class="bi-person-circle" style="font-size: 1rem;"></i></button>
</form>