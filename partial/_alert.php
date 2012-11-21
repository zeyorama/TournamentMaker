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