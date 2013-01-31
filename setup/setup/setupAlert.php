<?php if (isset($_GET['e'])) { ?>
<div class="row">
  <div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php

  switch ($_GET['e']) {

    case 1:
      echo 'Your root username or password are wrong. Access denied to database.';
      break;

    case 2:
      echo 'Generation of new user and/or database failed, please try again or contact <a href="mailto: fkz.dev@hotmail.de?subject:Creation%20Error%20TournamentMaker%20Setup">Developer Team</a>.';
      break;

    case 3:
      echo 'Generating of tables failed, please try again or contact <a href="mailto: fkz.dev@hotmail.de?subject:Table%20creation%20Error%20TournamentMaker%20Setup">Developer Team</a>.';
      break;

    default:
      echo 'Unknown error occured, please contact <a href="mailto: fkz.dev@hotmail.de?subject:Unknown%20Error%20TournamentMaker%20Setup">Developer Team</a>.';
      echo '<br>Please write all, you have done, so we can fix it better.';
      break;

  }

?>
  </div>
</div>
<?php }
      if (isset($_GET['confirm'])) { ?>
<div class="row">
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php

  switch ($_GET['confirm']) {

    case 'createDB':
      echo 'Database successfully created!';
      break;

  }

?>
  </div>
</div>
<?php } ?>