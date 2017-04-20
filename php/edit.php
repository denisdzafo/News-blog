<?php

    include('mysql_connect.php');
    if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
      $id = $_GET['id'];
    }
    elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
      $id = $_POST['id'];
    }
    else {
      echo 'Please frist choose news that you want to change';
      exit();
    }

    if (isset($_POST['submitted'])) {
      $errors = array();
      if (empty($_POST['naslov'])) {
        $errors[] = 'You forget to enter title';
      }
      else {
        $naslov = $_POST['naslov'];
      }

      if (empty($_POST['tekst'])) {
        $errors[] = 'You forget to enter text';
      }
      else {
        $tekst = $_POST['tekst'];
      }

      if (empty($errors)) {
        $query = "UPDATE news_posts SET  title='$naslov', text='$tekst' WHERE id=$id";
        $result = mysql_query($query);

        if ($result) {
          echo "News has been changed";
        }
        else {
          echo "News cannot be changed";
        }
      }
      else {
        echo 'News cannot be changed because -<br />';

        foreach ($errors as $msg) {
          echo " - $msg<br />\n";
        }
      }

    }
    else {
      $query = "SELECT  title, text, id FROM news_posts WHERE id=$id";
      $result = mysql_query($query);
      $num = mysql_num_rows($result);
      $row = mysql_fetch_array ($result, MYSQL_NUM);

      $naslov = $row['0'];
      $tekst = $row['1'];
      ?>
      <div class="container">
        <div class="col-md-6 col-md-offset-2">
          <h1>Edit news</h1>
          <?php
            if ($num == 1) {
              echo '<h3>Change news</h3>
              <form action="?id=edit_news&num='.$id.'" method="post" >
              <p>Title : <input type="text" name="naslov" size="53" maxlength="255" value="'.$naslov.'" /></p>
              <p>Text : <br /><textarea rows="7" cols="55" name="tekst">'.$tekst.'</textarea></p>
              <p><input type="submit" name="submit" value="Change" /></p>
              <input type="hidden" name="submitted" value="TRUE" /></p>
              <input type="hidden" name="id" value="'.$id.'" />';
            }
            else {
              echo 'News cannot be changer, please try leater';
            }
          }
           ?>
        </div>
      </div>


<div align="center"><a href="../index.php">Close this window</a></div>
