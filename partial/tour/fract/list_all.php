<?php
  $allTours = $u->getTournaments();
  switch ($allTours) {
    case 10022:
      echo '<li class="nav-header">No tournaments found.</li>';
      break;

    case 10001:
    case 10021:
      echo '<li class="nav-header">Error occured, please retry.</li>';
      break;

    default:
?>
  <table class="table table-hover table-condensed">
    <thead>
      <tr>
        <th>TournamentID</th>
        <th>Name</th>
        <th>Game</th>
        <th>Status</th>
        <th>Publisher</th>
        <th>Start</th>
      </tr>
    </thead>
    <tbody>
<?php foreach ($allTours as $tour) { ?>
      <tr>
        <td><?php echo $tour->getID(); ?></td>
        <td><a href="index.php?f=tour&s=tournament&id=<?php echo $tour->getID(); ?>"><?php echo $tour->name; ?></a></td>
        <td><?php echo $tour->getGame()->name; ?></td>
        <td><?php
          switch ($tour->status) {
            case 0:
?>
          <span class="label label-success">Not started yet</span>
<?php
              break;
            case 1:
?>
          <span class="label label-info">Currently running</span>
<?php

              break;
            case 2:
?>
          <span class="label label-important">Tournament finished</span>
<?php
              break;
          }
        ?></td>
        <td><a href="index.php?f=user&s=profile&id=<?php $user = User::getUser($tour->owner); echo $user->getID(); ?>"><?php echo $user->username; ?></a></td>
        <td><?php
          switch ($tour->status) {
            case 0:
?>
          <span class="label label-success"><?php echo date("D, d.m.Y H:i", strtotime($tour->start)); ?></span>
<?php
              break;
            case 1:
?>
          <span class="label label-info">Currently running</span>
<?php

              break;
            case 2:
?>
          <span class="label label-important">Tournament finished</span>
<?php
              break;
          }
        ?></td>
      </tr>
<?php } ?>
    </tbody>
  </table>
<?php
      break;
  }
?>