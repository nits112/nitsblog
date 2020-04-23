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

	include("../db/dbconnect.php");

	$confpass = $_POST['confirm_password'];

	if ($password==$confpass) then {

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
		echo "<script>
			alert('Your account has been successfully registered and request is pending with Admin.');
			window.location.href='../index.php';
			</script>";

		
	}

} else {
	echo "<script>
	alert('Passwords do not match');
	window.location.href='../include/frame_register.php';
	</script>";
}


}

/* * * * * Registeration Form * * * * */
else {
	include("../include/frame_register.php");

}


?>
