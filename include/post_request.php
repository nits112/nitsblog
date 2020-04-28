<?php

if(!isset($_SESSION['username'])){
	header('Location:../index.php');
}
else if($_SESSION['usertype']!='admin') {
  header('Location:../index.php');
}
else {
	$user=$_SESSION['username'];
}

/* fetch user detail */
$query=$conn->prepare("SELECT * FROM posts_buffer");
$query->execute();
$result=$query->get_result();

if($result) {
  if($result->num_rows == 0) {
      echo "No more requests to show";
  }

	else if($result->num_rows >0) {
		while($row=$result->fetch_assoc()) {
		    include("frame_post_requested.php");
    }
  }
} else {
	echo "failed";
}

?>
