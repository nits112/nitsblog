<?php

include("../db/dbconnect.php");

/* If form is submitted then authenticate it*/

include("../include/url_users.php");

if(isset($_POST['submit'])) {

	$username=htmlspecialchars($_POST['username']);
	$password=$_POST['password'];
	$captcha;
	if(isset($_POST['g-recaptcha-response']))
		{
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha)
		{
         
		  echo "
						<div class=\"alert alert-danger container\" role=\"alert\">
						<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
						<span class=\"sr-only\">Error:</span>
							Please check the the captcha form.
						</div>
						";
          exit;
        }
        $secretKey = "6LeH0ewUAAAAALNq09oJkn6YtIbdN8x3PAnY3GFM";
        $ip = $_SERVER['REMOTE_ADDR'];

        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);




        // should return JSON with success as true
        if($responseKeys["success"]) {
			
			/* Check login  correctness*/
			$query="SELECT * FROM users WHERE username='$username'";
			$result=mysqli_query($conn , $query);
			$deta=mysqli_fetch_assoc($result);
			$hashpass=$deta['password'];

			/* query failed */
			if($result==FALSE) {
				printf("Query failed \n");
				header("location:login.php");
			}

			if(password_verify($password,$hashpass)) {
				$_SESSION['username']=$username;
				
				/* user type */
				
				$_SESSION['usertype']=$deta['usertype'];

				/* Redirect to current / previous page*/
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				
			} else {
					echo "<div class=\"alert alert-danger container\" role=\"alert\">
						<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
						<span class=\"sr-only\">Error:</span>
							Invalid Username or Password
						</div>";					}            } 
		else {
               
				echo "<div class=\"alert alert-danger container\" role=\"alert\">
						<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
						<span class=\"sr-only\">Error:</span>
							You are spammer ! 
						</div>";        }
	
} else {
			if(!isset($_SESSION['username'])) {
			echo "
			<div class=\"alert alert-danger\" role=\"alert\">
		  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
		  <span class=\"sr-only\">Error:</span>
		   Please Login
			</div>			";
			} else {
				header("location:../index.php");			}}
?>
