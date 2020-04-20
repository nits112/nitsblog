<?php

include("../db/dbconnect.php");

/* If form is submitted then authenticate it*/

include("../include/url_users.php");

if(isset($_POST['submit'])) {
$response = $_POST["g-recaptcha-response"];

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => 'YOUR_SECRET',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);

	if ($captcha_success->success==false) {
		echo "
		<div class=\"alert alert-danger container\" role=\"alert\">
	  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
	  <span class=\"sr-only\">Error:</span>
	   You are a bot!! Go Away
		</div>
		";
	} 
	
	
	
	$username=$_POST['username'];
	$password=$_POST['password'];


	/* Check login  correctness*/
	$password = md5($password);
	$query="SELECT * FROM users WHERE username='$username' AND password='$password' ";
	$result=mysqli_query($conn , $query);
	//$rows=1;

	/* query failed */
	if($result==FALSE) {
		printf("Query failed \n");
		header("location:login.php");
	}

	if(mysqli_num_rows($result) == 1) {
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		/* user type */
		$detail=mysqli_fetch_assoc($result);
		$_SESSION['usertype']=$detail['usertype'];

		/* Redirect to current / previous page*/
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		//header("location:../index.php");
	} else {
		echo "
		<div class=\"alert alert-danger container\" role=\"alert\">
	  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
	  <span class=\"sr-only\">Error:</span>
	   Invalid Username or Password
		</div>
		";
	}
} else {
			if(!isset($_SESSION['username'])) {
			echo "
			<div class=\"alert alert-danger\" role=\"alert\">
		  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
		  <span class=\"sr-only\">Error:</span>
		   Please Login
			</div>
			";
			} else {
				header("location:../index.php");
			}
}


?>
