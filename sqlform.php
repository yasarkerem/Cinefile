<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SQLForm</title>
  <button onclick="history.back()">Go Back</button>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>movieCard</title>
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

    img {
      -webkit-user-drag: none;
      -moz-user-drag: none;
      -o-user-drag: none;
      -user-drag: none;
    }

    input[type=submit] {
      /*helal olsun be!! */
      margin:auto;
      display:block;

      width: 30%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
    
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
    }

    input[type=submit]:hover {
      background-color: #45a049;
      
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

<body>

  <script src="" async defer></script>
</body>
<div class="container mt-5">
<h2 class="text-center">
  <b><p style="font-family:century gothic; color: rgba(157, 24, 11, 0.59);">You can filter with SQL statements!</p></b></h2>


  <div class="row justify-content-center">
    <form action="sqlform.php" method="POST">
      <textarea name="command" rows="2" cols="100" placeholder="Type your command here!">SELECT title, year, rating, image FROM movies WHERE</textarea><br>
      <input type="submit" value="Filter">
    </form>
    <?php

    include "config.php";

    $sql_statement = "SELECT title, year, rating, image FROM movies";

    if (isset($_POST["command"])) {
      $sql_statement = $_POST["command"];
    }
    $result = mysqli_query($db, $sql_statement);
    while ($row = mysqli_fetch_assoc($result)) {
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
      <span class=\"movie_info float-right\"><i class=\"fas fa-star\" style=\"color:#ffd700\"></i> $myrating</span>
  </div>
</div>";
    }

    ?>

  </div>




</html>