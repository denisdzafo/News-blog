<?php

  if (isset($_GET['id'])) {
    include('mysql_connect.php');

    if (is_numeric($_GET['id'])) {
      $id = $_GET['id'];
      $query = "DELETE FROM news_posts WHERE id = $id";
      $result = mysql_query($query);

      if ($result) {
        echo '<h3>Successful!</h3><br />
        News has been deleted.<br /><br />';
      }
      else {
        echo 'News that you choose can not be deleted, please try leter';
      }
    }
    else {
      echo 'You pick up the wrong news.';
    }
  }
  else {
    echo 'Before you enter this page, please first chose news that you want to delete!';
    exit();
  }

?>


<div align="center"><a href="../index.php">Close this window</a></div>
