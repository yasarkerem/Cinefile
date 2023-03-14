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
    <title>Add Movie</title>
    <button onclick="history.back()">Go Back</button>
</head>
<body>
    <div align="center">
        <b>MOVIES</b>
    <br>
    Check out the newest movies!
    <br>
    <br>
    <form action="sendmovie.php" method="POST">
  <label for="title">Movie title:</label><br>
  <input type="text" id="title" name="title" ><br>
  <label for="description">Description:</label><br>
  <textarea name="description"  placeholder="Type the description here!"></textarea><br>

  <label for="year">Year:</label><br>
  <input type="number" id="year" name="year" ><br>
  <label for="duration">Duration:</label><br>
  <input type="number" id="duration" name="duration" ><br>
  <label for="rating">Rating:</label><br>
  <input type="number" step=0.01 id="rating" name="rating" ><br>
  <label for="country">Country:</label><br>
  <input type="text" id="country" name="country" ><br>
  <label for="genre">Genre:</label><br>
  <input type="text" id="genre" name="genre" ><br>
  <label for="language">Language:</label><br>
  <input type="text" id="language" name="language" ><br>
  <label for="producer">Producer:</label><br>
  <input type="text" id="producer" name="producer" ><br>
  <label for="image">Image Link:</label><br>
  <input type="text" id="image" name="image" ><br>
  <br>
  <input type="submit" value="Submit">
</form> 
    </div>


    
    
</body>
</html>