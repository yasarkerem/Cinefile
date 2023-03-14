<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  max-width: 300px;
  text-align: center;
  margin: 0 auto;
}
</style>
    <title>Create Playlist</title>
    <button onclick="history.back()">Go Back</button>
</head>
<body>
    <div align="center">
        <b>PLAYLIST CREATION</b>
    <br>
    Add Movies!

    <br>
    <br>
    <form action="create.php" method="POST">
  <label for="title">Playlist Name:</label><br>
  <input type="text" id="title" name="title" ><br>
  <label for="description">Description:</label><br>
  <textarea name="description"  placeholder="Type the description here!"></textarea><br>
  <br>
  <input type="submit" value="Submit">
</form> 
    </div>


    <?php 

include "config.php";
session_start();

if(isset($_POST["title"])){
$title = $_POST["title"];
$description = $_POST["description"];
$uid = $_SESSION["uid"];
echo $title . " ";
$sql_statement = "INSERT INTO created(uid,name,description) VALUES ('$uid', '$title','$description')";
$result = mysqli_query($db, $sql_statement);
/*echo "<script>
if($result==1){history.back();}
</script>";*/
echo "My result is " . $result;

}




?>

    
</body>
</html>