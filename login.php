

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Creepster" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>

<div class=but10 ><a href="./b4support.php" >
<img src="https://cdn-icons-png.flaticon.com/512/190/190119.png" alt="Avatar">
Customer Support</a></div>
<form action="login.php" method="POST">
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Cinefile</h1>
		</div>
	</div>
	
	
		<div class="right">
		<h5>Login</h5>
		<p>Don't have an account? <a href="./register.php">Create Your Account</a> it takes less than a minute</p>
		<div class="inputs">
			<input type="text" name="username" placeholder="username">
			<br>
			<input type="password"  name="password" placeholder="password">
		</div>
			
			<br><br>
			
		<div class="remember-me--forget-password">
		
	<label>
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Remember me</span>
	</label>
			<p>forget password?</p>
		</div>
			
			<br>
			<button>Login</button>
	</div>
	
</div>
</form>

<?php
session_start();
include "config.php";

$username = $password = "";
$hashed_password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT uid, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
        
                // Check if username exists, if yes then verify password
				
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
					$hashed_password = password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_result($stmt, $uid, $username, $password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["uid"] = $uid;
                            $_SESSION["username"] = $username;
                            $_SESSION["wid"] = "";                           
                            
                            // Redirect user to welcome page

                            if($username != "admin"){
                            header("location:./movies.php");}
                            else{
                                header("location:./admin.php");
                            }
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($db);
}
?>

<?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }   
		     
        ?>
		<span class="invalid-feedback"><?php echo $username_err; ?>
<span class="invalid-feedback"><?php echo $password_err; ?>



</body>
</html>
