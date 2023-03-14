<?php
include "config.php";

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
  <title>Admin</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>movieCard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<style>
   /* Buttons styles start */
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

    
    .uptab{
     
      text-align: right;
    }

    .but10 {
      display: inline-block;
      text-align: right;
      margin-left: 3px;
      margin-right: 3px;
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






/* Ignore these presentational styles */
html {
    height: 100%;
}

body {
    height: 100%;
    display: grid;
    place-items: center;
    background: #f3f3f3;
    font-family: -apple-system, BlinkMacSystemFont, 
                    "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", 
                    "Fira Sans", "Droid Sans", "Helvetica Neue", 
                    sans-serif;
    line-height: 1.5;
    color: #333;
}

article {
    max-width: 60ch;
    padding: 2rem 1rem;
}



h1, h2 {
    font-weight: 300;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

h2 {
    padding-top: 0.5rem;
}

a {
    color: #017171;
    text-decoration-skip-ink: auto;
}
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

    .movie_id {
      color: #5e5c5c;
      margin-left: 90px ;
    }

    .movie_id i {
      font-size: 20px;
      margin-left: 90px ;
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
<div class=uptab><div class=but10><a href="./index.php" class="fas fa-plus">
    <span class="glyphicon glyphicon-log-out"></span> Add New Movie
  </a>
</div>

<div class=but10 ><a href="./b4supportadmin.php" class="fas fa-headset" >
Customer Support</a></div>

<div class=but10 style=><a href="./sqlform.php" class="fas fa-list">
    <span class="glyphicon glyphicon-log-out"></span> SQL Filter</a></div>
  

<div class=but10><a href="./logout.php" class="btn btn-info btn-lg">
    <span class="glyphicon glyphicon-log-out"></span> Log out</a></div></div>

  <script src="" async defer></script>
</body>
<div class="container mt-5">
<h2 class="text-center">
  <b><p style="font-family:century gothic; color: rgba(157, 24, 11, 0.59);">MOVIES</p></b></h2>
  <div style="text-align: center">
  <form action="admin.php" method="POST">
    
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
      if($_POST["orders"] == "yas"){
        $sql_statement = "SELECT  wid, title, year, rating, image FROM movies ORDER BY year ASC";
      }
      else if($_POST["orders"] == "ydes"){
        $sql_statement = "SELECT  wid, title, year, rating, image FROM movies ORDER BY year DESC";
      }
      else if($_POST["orders"] == "ras"){
        $sql_statement = "SELECT  wid, title, year, rating, image FROM movies ORDER BY rating ASC";
      }
      else if($_POST["orders"] == "rdes"){
        $sql_statement = "SELECT  wid, title, year, rating, image FROM movies ORDER BY rating DESC";
      }
    }
    
    $result = mysqli_query($db, $sql_statement);

    while ($row = mysqli_fetch_assoc($result)) {
      $mywid = $row['wid'];
      $mytitle = $row['title'];
      $myyear = $row['year'];
      $myrating = $row['rating'];
      $myimage = $row['image'];


      echo "<div class=\"card movie_card\">";
      echo "<img src=$myimage alt=\"...\">";
      echo "<div class=\"card-body\">";
      echo "</i>
    <h5 class=\"card-title\"> $mytitle </h5>
      <span class=\"movie_info\">$myyear</span>
      <span class=\"movie_id \">ID: $mywid</span>
      <span class=\"movie_info float-right\"><i class=\"fas fa-star\" style=\"color:#ffd700\"></i> $myrating</span>
  </div>
</div>";
    }

    ?>

  </div>
<div style="text-align:center;">
<form action="sendadmin.php" method="POST">
<div style="text-align:center;">
<label for="movies" >Choose a movie:</label>

<select name="wid">

<?php 
$sql_command = "SELECT wid FROM movies";
$myresult = mysqli_query($db,$sql_command);
while($id_rows = mysqli_fetch_assoc($myresult)){
  $myid = $id_rows['wid'];
  echo "<option value=$myid>$myid</option>";
}
?>

</select>
</div>

<button>
<span class="fas fa-trash"></span>
  <span>Delete</span>
</button>


</form>
</div>
</html>