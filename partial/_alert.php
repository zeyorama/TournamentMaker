<?php if (isset($_GET['e'])) { ?>
              <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php
            switch ($_GET['e']) {
              # user specific
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
              #game specific
              case 10101:
              case 10103:
              case 10105:
                echo 'Database error, please retry!';
                break;
              case 10102:
                echo 'Something went wrong, please check your datas.';
                break;
              case 10104:
                echo 'Game not found.';
                break;
              case 10106:
                echo 'No games found.';
                break;
            }
?>                
              </div>
<?php } ?>
<?php if (isset($_GET['n'])) { ?>
              <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php
            switch ($_GET['n']) {
              case 'value':
                # code...
                break;
            }
?>
              </div>
<?php } ?>
<?php if (isset($_GET['confirm'])) { ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php
            switch ($_GET['confirm']) {
              case 'user_registration':
                echo 'Registered successfully, please log in.';
                break;

              case 'user_login':
                echo 'Successfully logged in, good luck have fun.';
                break;

              case 'game_add':
                echo 'New game successfully added.';
                break;
            }
?>
              </div>
<?php } ?>