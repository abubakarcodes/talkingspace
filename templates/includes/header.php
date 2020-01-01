<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Welcome To TalkingSpace</title>

  <!-- Bootstrap core CSS -->
  <link href="templates/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="templates/css/custom.css" rel="stylesheet">

  <?php 
  if(!isset($title)){
    $title = site_title;
  }

  ?>
</head>

<body>
     <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="templates/js/bootstrap.js"></script>
      <script type="text/javascript" src="templates/js/ckeditor/ckeditor.js"></script>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-uppercase" href="index.php">TalkingSpace</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse text-uppercase">
            <ul class="nav navbar-nav pull-right">
              <li class="active"><a href="index.php">Home</a></li>
              <?php if(!isLoggedIn()) : ?>
              <li><a href="register.php">Create An Account</a></li>
              <?php else: ?>
              <li><a href="create.php">Create a topic</a></li>
            <?php endif; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="main-col">
              <div class="block">
                <h1 class="pull-left text-uppercase"><?php echo $title; ?></h1>
                <h4 class="pull-right text-uppercase">A simple PHP Forum engine</h4>
                <div class="clearfix"></div>
                <hr>
                <?php displayMessage(); ?>