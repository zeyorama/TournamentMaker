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

  $u = current_user();
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/formate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">
    <!-- JavaScripts -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
  <body class="tmwb_main">
    <div class="container">
      <div class="row">
        <!-- HEADER -->
        <div class="span12">
          <center>
            <h1>TournamentMaker</h1>
          </center>
          <div class="row">
            <div class="span2 offset3"><font style="font-family: monospace;">Establish your events</font></div>
          </div>
          <hr>
          <div class="row-fluid">
            <!-- Login/Logout/Register -->
            <div class="span3">
              Logged in as: <?php echo $u==NULL ? "Guest" : "<a href='index.php?f=user&s=profile'>".$u->username."</a>"; ?>
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
        </div>
      </div>
      <div class="container-fluid">
        <div class="row-fluid">
          <!-- left NAVbar -->
          <div class="span3">
            <?php include 'partial/_nav.php'; ?>
          </div>
          <div class="span9">
            <?php
              # alerts
              include 'partial/_alert.php';
            ?>
            <div class="span12">
<?php
            if (isset($_GET['f'])) {

              switch($_GET['f']) {
                case 'user':
                  include 'partial/_user.php';
                  break;

                case 'tournament':
                  include 'partial/_tour.php';
                  break;

                case 'setting':
                  include 'partial/_setting.php';
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
    <footer> </footer>
  </body>
</html>