<?php if (isset($_GET['e'])) { ?>
              <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php
            switch ($_GET['e']) {
              # user specific
              case 10001:
              case 10002:
              case 10015:
              case 10016:
              case 10018:
                echo 'Database error, please retry.';
                break;
              case 10003:
                echo 'Username or password wrong, please retry.';
                break;
              case 10004:
                echo 'User not found.';
                break;
              case 10012:
                echo 'No games found.';
                break;
              case 10013:
                echo 'Game already in list.';
                break;
              case 10014:
                echo 'Game could not be added to your profile, sorry about that.';
                break;
              case 10017:
                echo 'Empty game list.';
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
              case 10121:
              case 10122:
              case 10131:
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
              case 10107:
                echo 'Update failed, please try again or contact an admin.';
                break;
              case 10120:
                echo 'Game already reviewed.';
                break;
              case 10121:
                echo 'Review failed.';
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

              case 'user_game_add':
                echo 'Game successfully added to my list.';
                break;

              case 'ingame_add':
                echo 'Ingame nickname added to game.';
                break;

              case 'user_game_del':
                echo 'Game successfully removed from my list.';
                break;

              case 'game_add':
                echo 'New game successfully added.';
                break;

              case 'game_del':
                echo 'Game successfully removed.';
                break;

              case 'game_edit':
                echo 'Game successfully edited.';
                break;

              case 'add_review':
                echo 'Review successful.';
                break;
            }
?>
              </div>
<?php } ?>