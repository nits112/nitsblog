<?php

include("../db/dbconnect.php");

include("../include/url_users.php");
if(!isset($_SESSION['username']))
{
	header("location:login.php");
}
if(!isset($_REQUEST['user'])) {
	header('Location:../index.php');
} else {
	$user=$_REQUEST['user'];
}

/* fetch user detail */
$query="SELECT *
		FROM users
		WHERE username='$user'
		";

$result=mysqli_query($conn , $query );

if($result) {
	if(mysqli_num_rows($result)==1) {
		while($row=mysqli_fetch_assoc($result)) {
			if($row['usertype']=='admin') {
					header("location:admin.php");
			}
			include("../include/frame_profile_detail.php");
		}
	}else
	{
		echo "<script>alert('Sorry! This user account is deleted..');
			window.location.href='../posts/posts.php';</script>";
	}
} else {
	echo "<script>alert('Sorry! Error in fetching..');
			window.location.href='../posts/posts.php';</script>";
}

?>
