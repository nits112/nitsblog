<?php
include("../include/url_posts.php");
include_once("../include/algos.php");


 ?>
 
 <style media="screen">

.bg {
background: url('no post.png');
background-repeat: no-repeat;
background-position: top;
background-size: contain;
height: 1010px;
}
</style>

<?php

	/* CHECK if same user or email exists or not ? */
	$query = $conn->prepare("SELECT * FROM posts ORDER BY postTime DESC");
	$query->execute();
	$result = $query->get_result();
	
	if($result->num_rows > 0) {
		while($post = $result->fetch_assoc()) {
					$id=$post['postID'];
					$title=$post['postTitle'];
					$desc=$post['postDesc'];
					$tags=$post['postTag'];
					$author=$post['postAuthor'];
					$time=$post['postTime'];
					$shortpost=1;  /* short post with read more  */
          $views=showViews($id,$author);

					include("../include/frame_post.php");
		}
	}
	else
	{
		 ?>
		
		<div class="row">
	<div class="bg"></div>
</div>
<?php	}
?>
