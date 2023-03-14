<?php 

include "config.php";
 
if (isset($_POST['wid'])){

$selection_id = $_POST['wid'];

$sql_statement = "DELETE FROM movies WHERE wid = $selection_id";

$result = mysqli_query($db, $sql_statement);

header ("Location: admin.php");

}

else
{

	echo "The form is not set.";

}

?>