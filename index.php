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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <!-- JavaScripts -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
  <body class="tmwb_main">
    <div class="container">
      <div class="row-fluid">
        <!-- HEADER -->
        <div class="span12">
          <center>SITENAME</center>
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
            <div class="row-fluid">
<?php if (isset($_GET['e'])) { ?>
              <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">x</button>
<?php
            switch ($_GET['e']) {
              case 10001:
              case 10002:
                echo 'Database error, please retry.';
                break;
              case 10003:
                echo 'Username or password wrong, please retry.';
                break;
              case 10098:
                echo 'Database error while registration, please retry!';
                break;
              case 10099:
                echo 'Your registration informations are wrong, please retry!';
                break;
            }
?>                
              </div>
<?php } ?>
<?php if (isset($_GET['n'])) { ?>
              <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">x</button>
<?php
            switch ($_GET['n']) {
              case 10099:
                # code...
                break;
            }
?>
              </div>
<?php } ?>
<?php if (isset($_GET['confirm'])) { ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
<?php
            switch ($_GET['confirm']) {
              case 'user_registration':
                echo 'Registered successfully, please log in.';
                break;

              case 'user_login':
                echo 'Successfully logged in, good luck have fun.';
                break;
            }
?>
              </div>
<?php } ?>
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
    </div>
    <footer> </footer>
  </body>
</html>