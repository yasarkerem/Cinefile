<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Playlists</title>
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

    <div class=but10 style=><a href="./badges.php"class="fas fa-coins">
    <span class="glyphicon glyphicon-log-out"></span> My Badges</a></div>
    
<div class=but10><a href="./logout.php" class="btn btn-info btn-lg">
    <span class="glyphicon glyphicon-log-out"></span> Log out</a></div></div>


   
        <div class="box-form">
            <div class="left">
                <div class="overlay" >
                    
                    <h1 >Playlists</h1>
                </div>
            </div>
            <div class="right" >
                <h5>Description</h5>

                <?php

                include "config.php";
                session_start();

                $uid = $_SESSION["uid"];
                $sql_statement = "SELECT pid, name, description FROM created  WHERE uid = $uid";

                $result = mysqli_query($db, $sql_statement);

         

                while ($row = mysqli_fetch_assoc($result))  {
                    $pid = $row["pid"];
                    $name = $row["name"];
                    $description = $row["description"];

                    echo "
    
               <a href=\"listview.php?pid=$pid\"><h3>$name</h3></a>
               <p>$description</p>

               <br>
            ";
                }


                ?>

</div></div>

<br>
  <form action="playlist.php" method="POST" style= "text-align:center;">
         
         <select name="del">";
    <?php
  
   
       include "config.php";
       $uid = $_SESSION["uid"];
       $sql_statement = "SELECT pid, name FROM created WHERE uid = $uid";
   
       $result = mysqli_query($db, $sql_statement);
   
  
   
       while ($row = mysqli_fetch_assoc($result)) {
         $name = $row['name'];
         $pid = $row['pid'];
   
         echo "<option value=$pid>$name</option>";
      
        
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
$pid = $_POST["del"];

$sql_statement = "DELETE FROM created WHERE pid = $pid";

$result = mysqli_query($db, $sql_statement);
echo "My result is " . $result;

}




?>

</body>

</html>