<style media="screen">

.bg {
background: url('img/login_background.jpeg');
background-repeat: no-repeat;
background-position: top;
background-size: contain;
height: 1010px;
}
</style>

<?php
$index_url='index.php';
$posts_url='posts/posts.php';
$top_posts_url='posts/topposts.php';
$post_url='posts/post.php';
$newpost_url='posts/newpost.php';
$login_url='users/login.php';
$logout_url='users/logout.php';
$register_url='users/register.php';
$search_url='posts/search.php';
$contact_us_url='users/contact_us.php';
$profile_url='../users/profile.php';

session_start();
include("include/bootstrap_cdn.php");
include("include/navbar.php");

include("../db/dbconnect.php");
if(isset($_SESSION['username'])){
include("include/url_posts.php");
}
?>

<div class="row">
	<div class="bg"></div>
</div>
