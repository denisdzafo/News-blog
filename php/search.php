<?php

include('mysql_connect.php');
$query = "SELECT id, title, text FROM news_posts ORDER BY id DESC";
$result = @mysql_query($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
<body class="body">
  <nav class="navbar navbar-default">
    <a href="../index.php" class="btn btn-default btn-sm btn pull-right">
      <span class="glyphicon glyphicon-log-out"></span> Back
    </a>
  </nav>

  <br>


<div class="container">
  <div class="row">
    <?php
        if (!empty($_REQUEST['term'])) {

          $term = mysql_real_escape_string($_REQUEST['term']);

          $sql = "SELECT * FROM news_posts WHERE title LIKE '%".$term."%'";
          $r_query = mysql_query($sql);
          echo '<h1>Serach result for word '.$term.'</h1><br />';
          while ($row = mysql_fetch_array($r_query)){
            echo '<br />Title: ' .$row['title'] ;
            echo '<br /> Text: ' .$row['text'].'<br />';
            echo '<img height="300" width="300" src="data:image;base64,'. $row['picture'].'"/>';
            echo '<hr>';
          }

        }
    ?>
  </div>
</div>

    </body>
</html>
