<?php 

include "config.php";


if(isset($_POST["title"])){
$title = $_POST["title"];
$description = $_POST["description"];
$year = $_POST["year"];
$duration = $_POST["duration"];
$rating = $_POST["rating"];
$country = $_POST["country"];
$genre = $_POST["genre"];
$language = $_POST["language"];
$producer = $_POST["producer"];
$image = $_POST["image"];
echo $title . " " . $year . " ". $rating . "<br>";
$sql_statement = "INSERT INTO movies(title,description,year,duration,rating,country,genre,language,producer,image) VALUES ('$title','$description' ,
'$year' ,'$duration' ,'$rating' ,'$country','$genre' ,'$language' ,'$producer','$image')";

$result = mysqli_query($db, $sql_statement);
echo "My result is " . $result;

}
else{
    echo "The form is not set.";
}



?>