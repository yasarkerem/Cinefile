
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

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>List</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>movieCard</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
      -webkit-user-select: none;
      -moz-user-select: -moz-none;
      -o-user-select: none;
      user-select: none;
    }

    .homebutton {
    right: 0px;
    width: 125px;
    padding-top: 20px;
    padding-right: 20px;
    position: fixed;
    z-index: 2;}
	
.homebutton a {
    display: block;
    margin-bottom: 1em;
    padding: 0.3em 1.25em;
    border: 1px solid #c2c7cc;
    font-family: 'Open-Sans', sans-serif;
    font-size: 1.1em;
    line-height: 1.667em;
    text-decoration: none;
    color: #8a9199;
    cursor: pointer;
    background: #fff;
    transition: color,border-color ease 0.3s;
    border-radius: 2em;
}
.homebutton a:hover {
    border-color: #42B6F3;
    color: #42B6F3;
    text-decoration: none;
}

    button {


      display: inline-block;
      border: none;
      padding: 1rem 2rem;
      border-radius: 5px;
      text-decoration: none;
      background: #8F9CF6;
      color: #ffffff;
      font-family: sans-serif;
      font-size: 1rem;
      line-height: 1;
      cursor: pointer;
      text-align: center;
      transition: background 250ms ease-in-out, transform 150ms ease;
      -webkit-appearance: none;
      -moz-appearance: none;
      margin-bottom: 10px;




    }

 

    button:hover,
    button:focus {
      background: #0053ba;
    }

    button:focus {
      outline: 1px solid #fff;
      outline-offset: -4px;
    }

    button:active {
      transform: scale(0.99);
    }

    /* Button styles end */

    .uptab{
     
      text-align: right;
    }

    .but10 {
      display: inline-block;
      text-align: right;
      margin-left: 3px;
      margin-right: 3px;
    }

    img {
      -webkit-user-drag: none;
      -moz-user-drag: none;
      -o-user-drag: none;
      -user-drag: none;
    }

    img {
      pointer-events: none;
    }

    .movie_card {
      padding: 0 !important;
      width: 22rem;
      margin: 14px;
      border-radius: 10px;
      box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0 rgba(0, 0, 0, 0.19);
    }

    .movie_card img {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      height: 33rem;
    }

    .movie_info {
      color: #5e5c5c;
      
    }

    .movie_info i {
      font-size: 20px;
      
    }

    .card-title {
      width: 80%;
      height: 4rem;
      text-align: left;
    }

    .play_button {
      background-color: #ff3d49;
      position: absolute;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      right: 20px;
      bottom: 111px;
      font-size: 27px;
      padding-left: 21px;
      padding-top: 16px;
      color: #FFFFFF;
      cursor: pointer;
    }

    .credits {
      margin-top: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 2px solid #8e24aa;
      font-size: 18px;
    }

    .credits .card-body {
      padding: 0;
    }

    .credits p {
      padding-top: 15px;
      padding-left: 18px;
    }

    .credits .card-body i {
      color: #8e24aa;
    }
  </style>
</head>





</body>


<div class=uptab><div class=but10><a href="./create.php" class="fas fa-plus">
    <span class="glyphicon glyphicon-log-out"></span> Create a Playlist
  </a>
</div>

<div class=but10 style=><a href="./movies.php" class="fas fa-home">
    <span class="glyphicon glyphicon-log-out"></span>Home</a></div>

<div class=but10 style=><a href="./playlist.php" class="fas fa-list">
    <span class="glyphicon glyphicon-log-out"></span> My Playlists</a></div>

    <div class=but10 style=><a href="./badges.php"class="fas fa-coins">
    <span class="glyphicon glyphicon-log-out"></span> My Badges</a></div>
    
<div class=but10><a href="./logout.php" class="btn btn-info btn-lg">
    <span class="glyphicon glyphicon-log-out"></span> Log out</a></div></div>






    <?php

    include "config.php";

    $pid = $_GET['pid'];

    $sql_statement = "SELECT name, description FROM created WHERE pid = $pid";
    $result = mysqli_query($db, $sql_statement);

    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $description = $row["description"];

   
    
    echo "<div class=\"container mt-5\">
    <h2 class=\"text-center\">
      <b>
        <p style=\"font-family:century gothic; color: rgba(157, 24, 11, 0.59);\">$name</p>
      </b>
      <p style=\"font-family: century gothic; color: rgba(157, 24, 11, 0.59); font-size: medium;\">Description: $description</p>
    </h2>
    <div style=\"text-align: center\">
    
    <div class=\"row justify-content-center\">";


    
    $sql_statement = "SELECT movies.wid, movies.title, movies.year, movies.rating, movies.image FROM movies, contains WHERE contains.pid = $pid AND movies.wid = contains.wid";




    $result = mysqli_query($db, $sql_statement);

    


    while ($row = mysqli_fetch_assoc($result)) {
      $mytitle = $row['title'];
      $myyear = $row['year'];
      $myrating = $row['rating'];
      $myimage = $row['image'];
      $mywid = $row['wid'];
/*
      <form action=\"movies.php\" method=\"POST\">
      <div class=\"movie_info float-right\" >
      <div class=\"fas fa-plus-circle\" style=\"font-size:44px\" > 
      <input  type=\"button\" name=\"wid\" value=\"$mywid\" data-toggle=\"modal\" data-target=\"#myModal\"   >
      
  

      </input> </div></div>
      </form> */
      echo "<div class=\"card movie_card\">";
      echo "<img src=$myimage alt=\"...\">";
      echo "<div class=\"card-body\">";
      echo "</i>
     



    <h5 class=\"card-title\"> $mytitle </h5>
      <span class=\"movie_info float-left\">$myyear</span>
      <span class=\"movie_info float-right\"><i class=\"fas fa-star\"  style=\"color:#ffd700\"></i> $myrating</span>
      
  </div>
  
</div>";
    }
    ?>
    <?php
  echo "</div>
  <form action=\"listview.php?pid=$pid\" method=\"POST\">
  <br>
         <select name=\"add\">";
           
   
         
   
       include "config.php";
       $pid = $_GET["pid"];
       $sql_statement = "SELECT wid, title FROM movies WHERE wid NOT IN( SELECT contains.wid FROM contains WHERE contains.pid = $pid);";
   
       $result = mysqli_query($db, $sql_statement);
   
  
   
       while ($row = mysqli_fetch_assoc($result)) {
         $title = $row['title'];
         $wid = $row['wid'];
   
         echo "<option value=$wid>$title</option>";
      
        
       }
       
       ?>
         </select>
         <br>
         <br>
   
         <button > <span>Add</span></button>
       </form>

       <?php 

include "config.php";


if(isset($_POST["add"])){
$wid = $_POST["add"];
$pid = $_GET["pid"];

$sql_statement = "INSERT INTO contains(wid,pid) VALUES ('$wid','$pid')";

$result = mysqli_query($db, $sql_statement);
echo "My result is " . $result;

}




?>
<br>


<?php
  echo "</div>
  <form action=\"listview.php?pid=$pid\" method=\"POST\" style= \"text-align:center;\">
         
         <select name=\"del\">";
           
   
         
   
       include "config.php";
       $pid = $_GET["pid"];
       $sql_statement = "SELECT movies.wid, movies.title FROM movies, contains WHERE movies.wid = contains.wid AND contains.pid = $pid";
   
       $result = mysqli_query($db, $sql_statement);
   
  
   
       while ($row = mysqli_fetch_assoc($result)) {
         $title = $row['title'];
         $wid = $row['wid'];
   
         echo "<option value=$wid>$title</option>";
      
        
       }
       
       ?>
         </select>
         <br>
         <br>
   
         <button > <span>Delete</span></button>
       </form>
       
       <?php 

include "config.php";


if(isset($_POST["del"])){
$wid = $_POST["del"];
$pid = $_GET["pid"];

$sql_statement = "DELETE FROM contains WHERE wid = $wid";

$result = mysqli_query($db, $sql_statement);
echo "My result is " . $result;

}




?>
    


</html>