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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/formate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <!-- JavaScripts -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </head>
  <body class="tmwb_main">
    <div class="container">
      <div class="row-fluid">
        <!-- HEADER -->
        <div class="span12">
          <p class="">HEADER</p>
          <hr>
          <div class="row-fluid">
            <!-- Login/Logout/Register -->
            <div class="span4">
              Logged in as: <?php echo ($u = current_user())==NULL? "Guest" : $u->username; ?>
            </div>
            <div class="span4 offset4">
              <p class="pull-right">
                <?php
                  if ($u == NULL) {
                ?>
                <a href="index.php?f=user&s=login" class="btn">Login</a> | <a href="index.php?f=user&s=register" class="btn">Register</a>
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
          <div class="span2">
            <?php include 'partial/_nav.php'; ?>
          </div>
          <div class="span10">
            <?php
              if (isset($_GET['f'])) {

                switch($_GET['f']) {
                  case 'user':
                    include 'partial/_user.php';
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
  </body>
</html>