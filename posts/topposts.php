<?php
include("../include/url_posts.php");
include_once("../include/algos.php");

 ?>

<style media="screen">

.bg {
background: url('img/no post.png');
background-repeat: no-repeat;
background-position: top;
background-size: contain;
height: 1010px;
}

</style>
<?php

/* SHOWS MOST VIEWED POSTS */


include("../db/dbconnect.php");
?>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}
</style>
</head>
<body>

<h2 style="text-align:center">Author's Desk</h2>

<div class="card">
  <img src="img/23.jpeg" alt="Admin Pic" style="width:100%">
  <h1>Nitin Sankhe</h1>
  <p class="title">Blog Admin</p>
  <p>I am passionate about sharing the food secrets.</p>
  <p>E-mail Id: xxxxx@xyz.com</p>
  <p>Hobby: Cooking</p>
  <p>Contact: +353 XXXXXXXX</p>

  <div style="margin: 24px 0;">
   
  </div>
 
</div>

</body>
</html>
