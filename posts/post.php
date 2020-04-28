33<?php

include("../db/dbconnect.php");
include("../include/url_posts.php");
include_once("../include/algos.php");

	/* post.php?id=2 */
	if(isset($_REQUEST['id'])) {
		$id=$_REQUEST['id'];

		$query=$conn->prepare("SELECT * FROM posts WHERE postID = ?");
		$query->bind_param('i',$id);
		$query->execute();
		$result=$query->get_result();

		if($post = $result->fetch_assoc()) {
				$id=$post['postID'];
				$title=$post['postTitle'];
				$desc=$post['postDesc'];
				$tags=$post['postTag'];
				$author=$post['postAuthor'];
				$time=$post['postTime'];
				$shortpost=0;
				/* increament view by 1 */
				$views=increament_views($id, $author);

				include("../include/frame_post.php");
		}
	}

		/* post.php?tags=dp */
	if(isset($_REQUEST['tags'])) {
		$tag=$_REQUEST['tags'];

		$query=$conn->prepare("SELECT * FROM posts WHERE postTag= ?");
		$query->bind_param('i',$tag);
		$query->execute();
		$result=$query->get_result();

		if($result->num_rows > 0) {
			while($post = $result->fetch_assoc()) {
				$id=$post['postID'];
				$title=$post['postTitle'];
				$desc=$post['postDesc'];
				$tags=$post['postTag'];
				$author=$post['postAuthor'];
				$time=$post['postTime'];


				include("../include/frame_post.php");
			}

		}

	}

	/* post.php?user=qt */
if(isset($_REQUEST['user'])) {
	$user=$_REQUEST['user'];

	$query=$conn->prepare("SELECT * FROM posts WHERE postAuthor= ?");
	$query->bind_param('i',$user);
	$query->execute();
	$result=$query->get_result();

	if($result->num_rows > 0) {
			while($post = $result->fetch_assoc()) {
			$id=$post['postID'];
			$title=$post['postTitle'];
			$desc=$post['postDesc'];
			$tags=$post['postTag'];
			$author=$post['postAuthor'];
			$time=$post['postTime'];
			$shortpost=0;  /*  Full post with without read more */

			include("../include/frame_post.php");
		}

	}

}

?>
