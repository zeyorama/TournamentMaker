<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TournamentMaker Setup Script</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="setup/setup.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    
    <!-- JavaScripts -->
    <script type="text/javascript" src="js/jquery.183.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </head>
  <body>
    <div class="hero-unit">
      <center>TournamentMaker Setup Script</center>
    </div>
    <div class="container">
<?php
  include 'setupAlert.php';
?>
      <div class="row">
<?php

  if (isset($_GET['s']))
    switch ($_GET['s']) {
      case 'createDB':
        include 'setup2.php';
        break;

      case 'createAdmin':
        include 'setup3.php';
        break;

      case 'finish':
        include 'finish.php';
        break;
      
      default:
        include 'setup1.php';
        break;
    }

  else
    include 'setup1.php';

?>
      </div>
    </div>
  </body>
</html>