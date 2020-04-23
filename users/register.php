	<?php
include("../include/url_users.php");

/* If already logged in then redirect to previous page */
if(isset($_SESSION['username'])) {
		header('Location:../index.php');
}

if(isset($_POST['submit'])) {

	$username=$_POST['username'];
	$firstname=$_POST['firstname'];
	$emailid=$_POST['emailid'];
	$password=$_POST['password'];
	$confpassword=$_POST['confpassword'];

	include("../db/dbconnect.php");
	
	if($password == $confpassword) {

	/* CHECK if same user or email exists or not ? */
	$query="SELECT * FROM users , users_buffer WHERE username='$username' OR emailid='$emailid' ";
	$result=mysqli_query($conn , $query);
	$rows=mysqli_num_rows($result);

	if($rows > 0) {
		header("location:register.php");
	}
	else {
		$password = md5($password);
		$query="INSERT INTO users_buffer (username, firstname, password, emailid)
				VALUES ('$username','$firstname','$password','$emailid')";
		mysqli_query($conn , $query);
	
	
			echo "<script>alert('Your account have been registered and pending for approval with Admin');
			window.location.href='../index.php';</script>";
	}
	} 
	else
	{
		echo "<script>alert('Password do not match');
		window.location.href='register.php';</script>";
		
		
	}


}

/* * * * * Registeration Form * * * * */
else {
	include("../include/frame_register.php");

}


?>
