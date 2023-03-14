<?php 

$db = mysqli_connect('localhost','root','','cinefile_db');

if($db->connect_errno > 0){
    die("Unable to connect to database [" . $db->connect_error . "]");
}

//Support Turkish characters
$db->set_charset("utf8");

?>