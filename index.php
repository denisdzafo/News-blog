<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHP news</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">
      $(document).ready(function(){
          $('#tugl').click(function(){
          $('#nesto').toggle();
        });
      });
    </script>
  </head>
  <body style="background-image:url(image.jpg)">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Blog</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <form action="php/search.php" class="navbar-form navbar-right" style="margin-right:3px;">
            <div class="form-group">
              <input type="text" name="term" class="form-control" placeholder="Search title" >
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
            <div class="form-group">
                <button type="button" name="button" class="btn btn-default"  id="tugl">Login </button>
            </div>

          </form>

        </div>

        <div class="row" id="nesto" style="display:none;" class="pull-right">
              <div class="col-md-6 col-md-offset-6">
                <form action="php/check.php" method="post" class="form-inline">
                  <div class="form-group">
                    <label name="email">Username:</label>
                    <input type="text" id="email" name="ime" class="form-control">
                    <label name="subject">Password:</label>
                    <input type="password" id="subject" name="pass" class="form-control">
                  </div>
                  <input type="submit" value="Log In" class="btn btn-success">
                </form>
              </div>
          </div>
      </div>
    </nav>

    <div class="container" >
        <div class="row" >
                  <div class="col-md-7 col-md-offset-2"style="background:white;">
                      <div class="post">
                          <?php include 'php/news.php';?>
                      </div>
                      <hr>
                  </div>
        </div>
    </div>


    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
