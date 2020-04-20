<? include("../db/dbconnect.php"); ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
	  <a class="collapse navbar-collapse" href= <?php echo "$index_url" ?> ><img src="img/logo.png" alt="logo"> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href=<?php echo $posts_url; ?> >  <!--All posts-->
         View Posts
        </a></li>
		
		<li><a href=<?php echo $top_posts_url; ?>  >About Me</a></li>
		
        <li><a href=<?php echo $contact_us_url; ?>  >Feedback</a></li>
      </ul>

      

      <ul class="nav navbar-nav navbar-right">

       <?php
            if(!isset($_SESSION['username'])) {
                include("loginform.php");
              }
            else {
                include("userdetail.php");
              }
       ?>


      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--  HEADER -->
