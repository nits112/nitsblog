<?php include("../db/dbconnect.php");
 ?>
<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>

<form class="navbar-form navbar-left" action=<?php echo $login_url; ?> method="POST">
        <div class="form-group">
          	<input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
          	<input type="password" class="form-control" placeholder="Password" name="password">
        </div>
		 <div class="g-recaptcha" data-sitekey="6LeH0ewUAAAAAPV0cXZY5ppF5reFfzyO0vH9W97t"></div>
      
		
        <button type="submit" class="btn btn-default" name="submit">Sign In</button>

        <a href=<?php echo $register_url; ?> class="btn btn-default">Sign Up</a>
		
 </form>
 

 
