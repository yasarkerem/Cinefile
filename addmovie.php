<?php

include "config.php";
session_start();
echo "a";

if (isset($_POST["playlists"]) && (isset($_POST["wid"]))) {

  echo "b";
  $inpid = $_POST["playlists"];
  $mywid = $_POST["wid"];
  
  echo $wid;
  $sql_statement = "INSERT INTO contains(wid,pid) VALUES ('$mywid','$inpid')";
  $result = mysqli_query($db, $sql_statement);
  

}

?>
