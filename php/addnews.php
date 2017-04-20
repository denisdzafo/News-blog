<?php


    header('Content-Type: text/html; charset=utf-8');

    $naslovbool=false;
    $tekstbool=false;
    $slikabool=false;
    if (isset($_POST['submitted'])&& isset($_FILES['image'])) {

      $tekst='';
      $naslov='';

      if (empty($_POST['naslov'])) {
        echo '<p><font color="red">You forget to enter title </font></p>';
      }
      else {
          $naslov = htmlspecialchars($_REQUEST['naslov'], ENT_QUOTES, 'UTF-8');
          $naslovbool=true;
      }

      if (empty($_POST['tekst'])) {
        echo '<p><font color="red">You forget to enter text.</font></p>';
      }
      else {
          $tekst = htmlspecialchars($_REQUEST['tekst'], ENT_QUOTES, 'UTF-8');
          $tekstbool=true;
      }

      if(@getimagesize($_FILES['image']['tmp_name'])==FALSE){
          echo '<p><font color="red">Please upload image.</font></p>';
      }
      else{
          $image=addslashes($_FILES['image']['tmp_name']);
          $pictureName=addslashes($_FILES['image']['name']);
          $image=file_get_contents($image);
          $image=base64_encode($image);
          $slikabool=true;
          saveimage($naslov, $tekst, $image, $pictureName,$naslovbool,$tekstbool,$slikabool);
      }
    }

    function saveimage($naslov, $tekst, $image, $pictrureName,$naslovbool,$tekstbool,$slikabool){
      include ('mysql_connect.php');

      if ($naslovbool &&  $tekstbool && $slikabool) {
        $query = "INSERT INTO news_posts (title, date, text, picture, pictureName) VALUES ('$naslov', now(), '$tekst', '$image','$pictrureName')";
        $result = @mysql_query($query);
        if ($result) {
          echo '<p><font color="red">Adding news was successful!</font></p>';
        }
        else {
          echo '<font color="red"><p>News cannot be added! Please try leater.</p></font>';
        }
      }
      else {
        echo '<p><font color="red">Plese enter valid information</font></p>';
      }
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
<body>
  <div class="container">
    <div class="row">
      <h1>Add new blog post</h1>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-2">

          <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" class="form">

            <div class="form-group">
              <label name="title">Title</label>
              <input type="text" name="naslov" class="form-control" value="<?php if(isset($_POST['naslov'])) echo $_POST['naslov']; ?>" />
            </div>
            <div class="form-group">
              <label name="tekst">Text</label>
              <textarea  name="tekst" class="form-control" style="min-width: 100%"><?php if(isset($_POST['tekst'])) echo $_POST['tekst']; ?></textarea>
            </div>

            <div class="form-group">
              <label name="picture">Picture</label>
              <br>
              <label class="btn btn-default btn-file">
                <input type="file" name="image" hidden>
              </label>
            </div>

            <br><br>
            <p><input type="submit" name="submit" value="Dodaj vijesti" class="btn btn-success btn-lg"/></p>
            <input type="hidden" name="submitted" value="TRUE" /></p>

          </form>

      </div>


    </div>
  </div>

</body>


<div align="center">
  <?php
    $ime='admin';
    $_SESSION['admin'] = $ime;
    echo '<a href="../index.php">Close this window</a>'
   ?>
</div>
