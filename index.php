<?php
  /**
   * @author Frank Kevin Zey
   */

  include 'epic.php';

  /*
    f is function like
      'user' - user specific
      'tournament' - tournament specifiec
    etc.

    s is the site, for example f=user&s=login for loginscreen
  */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php SYSNAME(); ?></title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/formate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-timepicker.css">
    
    <!-- JavaScripts -->
    <script type="text/javascript" src="js/jquery.183.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap-timepicker.js"></script>
  </head>
  <body class="tmwb_main">
    <div class="container">
      <div class="row">
        <!-- HEADER -->
        <div class="span12" style="letter-spacing: 2px;">
          <center>
            <h1><?php SYSNAME(); ?></h1>
          </center>
          <div class="row">
            <div class="span3 offset3">
              <font style="font-family: monospace; border-bottom: 1px dotted black;">
                <?php printMotto(); ?>
              </font>
            </div>
          </div>
          <hr>
          <div class="row-fluid">
            <!-- Login/Logout/Register -->
            <div class="span3">
              Logged in as: <?php echo $u == NULL ? "Guest" : "<a href='index.php?f=user&s=profile'>".$u->username."</a>"; ?>
            </div>
            <div class="span3 pull-right">
              <p class="pull-right">
                <?php
                  if ($u == NULL) {
                ?>
                <a href="index.php?f=user&s=login" class="btn">Login</a> <a href="index.php?f=user&s=register" class="btn">Register</a>
                <?php
                  } else {
                ?>
                <a href="action/user/logout.php" class="btn">Logout</a>
                <?php
                  }
                ?>
              </p>
            </div>
          </div>
          <hr>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row-fluid">
          <!-- left NAVbar -->
          <div class="span3">
            <?php include 'partial/main/nav.php'; ?>
            <hr>
            <?php include 'partial/main/news.php'; ?>
          </div>
          <div class="span9">
            <div class="row-fluid">
            <?php
              # alerts
              include 'partial/_alert.php';
            ?>
            </div>
            <div class="row-fluid">
              <div class="span12">
<?php
              if (isset($_GET['f'])) {

                switch($_GET['f']) {
                  case 'user':
                    include 'partial/_user.php';
                    break;

                  case 'tour':
                    include 'partial/_tour.php';
                    break;

                  case 'setting':
                    include 'partial/_setting.php';
                    break;

                  case 'game':
                    include 'partial/_game.php';
                    break;

                  case 'main':
                    include 'partial/_main.php';
                    break;

                  default:
                    include 'partial/_index.php';
                    break;
                }

              } else {
                include 'partial/_index.php';
              }
?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer><center><?php printName();?> <?php printVersion(); ?><br>&copy; by <a href="mailto:fkz.dev@hotmail.de?subject=TournamentMaker">Frank Kevin Zey</a> 2012-<?php echo date("Y"); ?></center></footer>
  </body>
</html>
