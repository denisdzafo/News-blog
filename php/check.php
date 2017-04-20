<?php


  header('Content-Type: text/html; charset=utf-8');
  include_once('mysql_connect.php');
  $ime=$_POST['ime'];
  $pass=$_POST['pass'];
  $query = "SELECT * FROM users";

    $provjera=false;


  $result = @mysql_query($query);

  if(is_resource($result)){
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
              if($ime==$row['username'] && $pass==$row['password']){
                $provjera=true;
                $_SESSION['admin'] = $ime;
                include('adminPage.php');
                //echo'<a href="adminPage.php?id='.$row['id'].'">Login successful, continue</a>';
              }
            }
  }
  if(!$provjera){
      header("location:../index.php");
  }
?>
