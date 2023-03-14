
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
  <title>Movies</title>
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

    .selcont{
      text-align: center;
      padding-top: 10px;
      padding-bottom: 10px;
      
    }
    .fa-plus-circle {
      color: #430131ad;
      display: block;
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

<div class=but10 ><a href="./support.php" class="fas fa-headset" >
Customer Support</a></div>

<div class=but10 style=><a href="./playlist.php" class="fas fa-list">
    <span class="glyphicon glyphicon-log-out"></span> My Playlists</a></div>
  
    <div class=but10 style=><a href="./badges.php"class="fas fa-coins">
    <span class="glyphicon glyphicon-log-out"></span> My Badges</a></div>

<div class=but10><a href="./logout.php" class="btn btn-info btn-lg">
    <span class="glyphicon glyphicon-log-out"></span> Log out</a></div></div>


<div class="container mt-5">
  <h2 class="text-center">
    <b>
      <p style="font-family:century gothic; color: rgba(157, 24, 11, 0.59);">MOVIES</p>
    </b>
  </h2>
  <div style="text-align: center">
    <form action="movies.php" method="POST">

      <select name="orders">
        <option value="yas">year (ascending)</option>
        <option value="ydes">year (descending)</option>
        <option value="ras">rating (ascending)</option>
        <option value="rdes">rating (descending)</option>

      </select>
      <br>
      <br>

      <button> <span>Order</span></button>
    </form>
  </div>
  <div class="row justify-content-center">

    <?php

    include "config.php";

    $sql_statement = "SELECT wid, title, year, rating, image FROM movies";



    if (isset($_POST["orders"])) {
      if ($_POST["orders"] == "yas") {
        $sql_statement = "SELECT wid, title, year, rating, image FROM movies ORDER BY year ASC";
      } else if ($_POST["orders"] == "ydes") {
        $sql_statement = "SELECT wid, title, year, rating, image FROM movies ORDER BY year DESC";
      } else if ($_POST["orders"] == "ras") {
        $sql_statement = "SELECT wid, title, year, rating, image FROM movies ORDER BY rating ASC";
      } else if ($_POST["orders"] == "rdes") {
        $sql_statement = "SELECT  wid, title, year, rating, image FROM movies ORDER BY rating DESC";
      }
    }

    $result = mysqli_query($db, $sql_statement);

    
    function updateSession($wid)
    {
      $_SESSION["wid"] = $wid ;
      }

    while ($row = mysqli_fetch_assoc($result)) {
      $mytitle = $row['title'];
      $myyear = $row['year'];
      $myrating = $row['rating'];
      $myimage = $row['image'];
      $mywid = $row['wid'];

      echo "<div class=\"card movie_card\">";
      echo "<img src=$myimage alt=\"...\">";
      echo "<div class=\"card-body\">";
      echo "</i>
     
      <form action=\"movies.php\" method=\"POST\">
      <div class=\"movie_info float-right\" >
      <div class=\"fas fa-plus-circle\" style=\"font-size:44px\"  data-toggle=\"modal\" data-target=\"#myModal\"   >
      
  
 </div></div>
      </form>



    <h5 class=\"card-title\"> $mytitle </h5>
      <span class=\"movie_info\">$myyear</span>
      <span class=\"movie_info float-right\"><i class=\"fas fa-star\"  style=\"color:#ffd700\"></i> $myrating</span>
      
  </div>
  
</div>";
    }
    ?>
  </div>
 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Select a playlist</h4>
        </div>

        <div class="selcont">

        <form action="movies.php" method="POST">
         
         <select name="playlists">
           
   
         <?php
   
       include "config.php";
       $uid = $_SESSION["uid"];
       $sql_statement = "SELECT pid, name FROM created WHERE uid = $uid";
   
       $result = mysqli_query($db, $sql_statement);
   
  
   
       while ($row = mysqli_fetch_assoc($result)) {
         $myname = $row['name'];
         $pid = $row['pid'];
   
         echo "<option value=$pid>$myname</option>";
      
        
       }
       
       ?>

   
         </select>
         <br>
         <br>
   
         <button > <span>Add</span></button>
       </form>

       <?php

include "config.php";


if (isset($_POST["playlists"]) && (isset($_POST["wid"]))) {
  $inpid = $_POST["playlists"];
  $mywid = $_POST["wid"];

  $sql_statement = "INSERT INTO contains(wid,pid) VALUES ('$mywid','$inpid')";
  $result = mysqli_query($db, $sql_statement);
  

}

?>
        </div>      
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



</html>