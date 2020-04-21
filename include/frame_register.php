<?php include("../db/dbconnect.php"); ?>

<div class="container">

<form class="form-horizontal col-sm-offset-2" role="form" action="register.php" method="post">

 <div class="form-group">
    <label class="control-label col-sm-2" for="email">User name </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="username" placeholder="" name="username" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">First Name </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">E mail </label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email" placeholder="" name="emailid" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="pwd" placeholder="" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z\d])(?=.*[A-Z]).{10,}" title="Must contain at least one number and one uppercase and lowercase letter,one special character and at least 10 or more characters" required>
    </div>
  </div>
				
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default" name="submit">Register</button>
    </div>
  </div>


</form>

</div>
