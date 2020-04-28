<?php
    /* fetch comments from db */
      $query = $conn->prepare("SELECT * FROM comments WHERE postID = ?");
    $query->bind_param('i',$id);
    $query->execute();
      $result = $query->get_result();

      if($result) {
        echo "
        <div class='panel-footer'>
        Comments
        </div>
        ";
           if($result->num_rows > 0) {
            while($comment = $result->fetch_assoc()) {
                include("../include/frame_comment.php");
            }
          }
      } else {
        echo "Query failed";
      }
?>
