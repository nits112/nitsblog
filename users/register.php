	<?php
include("../include/url_users.php");

/* If already logged in then redirect to previous page */
if(isset($_SESSION['username'])) {
		header('Location:../index.php');
}

if(isset($_POST['submit'])) {

	$username=htmlspecialchars($_POST['username']);
	$firstname=htmlspecialchars($_POST['firstname']);
	$emailid=htmlspecialchars($_POST['emailid']);
	$password=$_POST['password'];
	$confpassword=$_POST['confpassword'];

	include("../db/dbconnect.php");
	
	if($password == $confpassword) {

	/* CHECK if same user or email exists or not ? */
	$query="SELECT * from users_buffer t WHERE t.username = '$username' OR t.emailid = '$emailid'";
	$query2="SELECT * from users t WHERE t.username = '$username' OR t.emailid = '$emailid'";
	$result=mysqli_query($conn , $query);
	$result2=mysqli_query($conn , $query2);
	$rows=mysqli_num_rows($result);
	$rows2=mysqli_num_rows($result2);

	if($rows > 0) {
		
		echo "<script>alert('User exists please select new username or email id');
		window.location.href='register.php';</script>";
	}else { 
		if($rows2 > 0){
		echo "<script>alert('User exists please select new username or email id');
		window.location.href='register.php';</script>";
		
		}else {
		$hashpass=password_hash($password, PASSWORD_BCRYPT);		
		$query="INSERT INTO users_buffer (username, firstname, password, emailid)
		VALUES ('$username','$firstname','$hashpass','$emailid')";
		mysqli_query($conn , $query);
	
	
			echo "<script>alert('Your account have been registered and pending for approval with Admin');
			window.location.href='../index.php';</script>";
		}
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
