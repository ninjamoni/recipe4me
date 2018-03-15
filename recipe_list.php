<?php 
session_start();

require_once 'dbconnect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="custom.css">
  </head>
    <title>Recipe Me</title>
  </head>
  <body>
    
<!-- #####################    FIXED NAVBAR     ############################ -->
    <nav class="navbar navbar-custom navbar-expand-md fixed-top">
      <a class="navbar-brand" href="#">Recipe Me</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>

<main role="main" class="container">  <!-- MAIN CONTAINER  -->
 
 <!-- #####################    JUMBOTRON HEADER     ############################ -->
  <div class="container-full-bg" style="background-image:url('img/header.jpg');">
    <div class="container special">
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-s-12 col-md-12">
          <h1 class="display-3 white">Asian Noodlebowl</h1>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- #####################    2nd NAVIGATION     ############################ -->
  <div>
      <ul class="nav nav-pills red flex-column flex-sm-row justify-content-center nav-fill mt-3">
    <li class="nav-item pill-1">
      <a class="nav-link active" href="#">Summery</a>
    </li>
    <li class="nav-item pill-2">
      <a class="nav-link" href="#">Ingredients</a>
    </li>
    <li class="nav-item pill-3">
      <a class="nav-link" href="#">Recipe</a>
    </li>
    </ul>
  </div>

<div><hr class="style5"></div>

<!-- #####################    View: all recipes as cards     ############################ -->
<div class="row">
    <h3 class="text-center">All our recipes</h3>  
</div>

<div class="row" id="recipe">
  <?php 
      $sql = "SELECT `recipe`.`idRecipe`, `images`.`image`, `recipe`.`name` FROM `images`
    LEFT JOIN `recipe` ON `recipe`.`fk_idImage` = `images`.`idImage` ORDER BY `recipe`.`idRecipe` ASC
      ";
      $sql1 = "SELECT `recipe`.`idRecipe`, `tags`.`category` FROM `recipe`
      LEFT JOIN `recipe_tags` ON `recipe_tags`.`fk_idRecipe` = `recipe`.`idRecipe`
      LEFT JOIN `tags` ON `recipe_tags`.`fk_idTag` = `tags`.`idTag` WHERE (`recipe`.`idRecipe` IS NOT NULL)
  ";
      $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
      echo"
      <div class='col-sm-3'>
        <div class='card' style='width: 18rem; padding: 1em; minimum-height:'18rem'; maximum-height:'18rem'>
          <img class='card-img-top' src='img/".$row['image']."'>
          <div class='card-body'>
            <h5 class='card-title'>".$row['name']."</h5>
            <a href='#'class='btn btn-primary'>View Recipe</a>
            <p class='card-text'>Tags: </p><span>
        ";

      $result1 = $conn->query($sql1);
        while($row1 = $result1->fetch_assoc()) {
          echo "
          ".$row1['category']."&nbsp;&nbsp;&nbsp;</span>
 
       ";
      }
      echo"
              </div><!--<div class='card-body> -->
            </div><!--<div class='card' style='width: 18rem;'> -->
          </div><!--<div class=col-sm-3> -->
          ";   
         }    
  ?> 
  
</div> <!--<div class="row" id="recipe"> -->




</main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>