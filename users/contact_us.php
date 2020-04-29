<?php
include("../db/dbconnect.php");
include("../include/url_users.php");
 ?>

<?php
    if (isset($_POST["submit"])) {
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $msg=htmlspecialchars(strip_tags($_POST['message']));

          $query="INSERT INTO messages (name , email , message )
          VALUES (' $name' , '$email' , '$msg' )";

          $result=mysqli_query($conn , $query);

          if($result) {
            echo "Message sent successfully";
          } else {
            echo "Please enter valid inut";
          }
      }

      else {
          include("../include/frame_contact_us.php");
      }
?>
