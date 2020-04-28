<?php
include("../db/dbconnect.php");

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
$query = $conn->prepare("SELECT * FROM users_buffer");
$query->execute();

$result = $query->get_result();

if($result) {
  if($result->num_rows == 0) {
      echo "No more requests to show";
  }

  else if($result->num_rows > 0) {
    echo "
    <table class='table'>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Accept</th>
          <th>Delete</th>
        </tr>

    <tbody>
    ";


    while($row = $result->fetch_assoc()) {
      //include("../include/frame_profile_detail.php");
      echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['firstname']."</td>";
        echo "<td>".$row['emailid']."</td>";
        echo "<td>".$row['password']."</td>";

        $accept_requested_user_link='../include/accept_requested_user.php?username='.$row['username'];
        echo "<td><a href=$accept_requested_user_link ><button type=\"button\" class=\"btn btn-success\">Accept</button></a></td>";

        $delete_requested_user_link='../include/delete_requested_user.php?username='.$row['username'];
        echo "<td><a href=$delete_requested_user_link ><button type=\"button\" class=\"btn btn-danger\">Delete</button></a></td>";

      echo "</tr>";

    }
    echo "
    </tbody>
  </table>
   ";

  }
} else {
  echo "failed";
}

?>
