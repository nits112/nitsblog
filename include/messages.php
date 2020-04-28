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
$query=$conn->prepare("SELECT * FROM messages ORDER BY id DESC");
$query->execute();
$result=$query->get_result();

echo "
<table class='table'>
    <tr>
      <th>Name </th>
      <th>E mail</th>
      <th>Message </th>
      <th>Time</th>
    </tr>

<tbody>
";

if($result) {

  if($result->num_rows >0) {
    while($row=$result->fetch_assoc()) {
      //include("../include/frame_profile_detail.php");
      echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['message']."</td>";
        echo "<td>".$row['time']."</td>";
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
