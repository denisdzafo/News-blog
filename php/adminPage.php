<?php

  header('Content-Type: text/html; charset=utf-8');
  if (isset($_SESSION['admin'])){
  }
  else {
    echo 'You are not admin';
  exit();
  }
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
    <a href="../index.php" class="btn btn-default btn-sm btn pull-right" style="margin-top:7px;">
      <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
  </nav>

  <div class="row">
     <div class="col-md-3 col-md-offset-1">
       <h1>All news</h1>
     </div>

     <div class="col-md-2 col-md-offset-5" style="margin-top:7px;">
       <a href="addnews.php" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create new post</a>
     </div>

  </div>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Text</th>
            <th></th>
          </thead>
          <tbody>

           <?php
              // include('mysql_connect.php');
               $query = "SELECT id, title, text FROM news_posts ORDER BY id DESC";
               $result = @mysql_query($query);
               if ($result) {

                 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                   $pomocna=substr($row['text'],0,50);
                   echo '<tr>
                   <td>'.$row['id'].'</td>
                   <td>'.$row['title'].'</td>
                   <td>'.$pomocna.'</td>
                   <td><a href="edit.php?id='.$row['id'].'" class="btn btn-default btn-sm"> Edit</a> <a href="delete.php?id='.$row['id'].'" class="btn btn-default btn-sm">Delete</a></td></tr>';
                 }
               }else{
                 echo 'Sorry but there is not any new news';
               }
           ?>

         </tbody>
         </table>
       </div>
     </div>
  </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
