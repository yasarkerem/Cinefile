
<?php
// Initialize the session
session_start();
//echo $_SESSION["username"];
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
} else {
  $username = $_SESSION["username"];

  echo "<!DOCTYPE html>
  <html lang=\"en\" >
  <head>
    <meta charset=\"UTF-8\">

    
    <style>
    
    h1 {
      font-family: \"papyrus\";
      font-size: large;
      color: #430131ad;
      text-align: center;
      
  }
  .boxo {
    display: inline-block;
    padding-top: 10px;
    padding-left: 10px;
    padding-right: 10px;
    box-sizing: content-box;
    background: #EDFEF2;
    border-radius: 10px;
    box-shadow: 0 0 20px 6px #090b6f85;
    position:absolute;
}
    
    </style>
    </head>
<body>
<div class=\"boxo\"><h1 style= \"font-weight: bold\">$username</h1></div>

</body>
    
    ";
}

?>
<!DOCTYPE html>
<html lang="en">
<style>

img {
    border: 2px solid;
  border-radius: 50%;
  width: 50px;
  border-color:black;
  
  border-width: 2px;
}
</style>
<head>
    <meta charset="UTF-8">
    <title>Badges</title>
    <link href="https://fonts.googleapis.com/css?family=Creepster" rel="stylesheet">


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>

<body>

<div class=uptab><div class=but10><a href="./create.php" class="fas fa-plus">
    <span class="glyphicon glyphicon-log-out"></span> Create a Playlist
  </a>
</div>

<div class=but10 style=><a href="./movies.php" class="fas fa-home">
    <span class="glyphicon glyphicon-log-out"></span>Home</a></div>

    <div class=but10 style=><a href="./playlist.php" class="fas fa-list">
    <span class="glyphicon glyphicon-log-out"></span> My Playlists</a></div>
    
<div class=but10><a href="./logout.php" class="btn btn-info btn-lg">
    <span class="glyphicon glyphicon-log-out"></span> Log out</a></div></div>


   
        <div class="box-form">
            <div class="left">
                <div class="overlay" >
                    
                    <h1 >Badges</h1>
                </div>
            </div>
            <div class="right" >
                <h5>Description</h5>

                <?php

                include "config.php";


                $uid = $_SESSION["uid"];
                $sql_statement = "SELECT badge.name, badge.desc, badge.img  FROM badge,earned  WHERE earned.uid = $uid AND badge.name = earned.name";

                $result = mysqli_query($db, $sql_statement);

         

                while ($row = mysqli_fetch_assoc($result))  {
                 
                    $name = $row["name"];
                    $description = $row["desc"];
                    $img = $row["img"];

                    echo "

                    <img src=$img alt=\"Avatar\">
               <h3>$name</h3>
               <p>$description</p>

               <br>
            ";
                }


                ?>

</div></div>



</body>

</html>