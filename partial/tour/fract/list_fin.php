<?php
  $allTours = $u->getTournamentsFinished();
  switch ($allTours) {
    case 10204:
    case 10022:
      echo '<li class="nav-header">No tournaments found.</li>';
      break;

    case 10001:
    case 10021:
    case 10201:
    case 10206:
      echo '<li class="nav-header">Error occured, please retry.</li>';
      break;

    default:
?>
  <table class="table table-hover table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Game</th>
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
        <td><a href="index.php?f=user&s=profile&id=<?php $user = User::getUser($tour->owner); echo $user->getID(); ?>"><?php echo $user->username; ?></a></td>
        <td><?php echo date("D, d.m.Y H:i", strtotime($tour->start)); ?></td>
      </tr>
<?php } ?>
    </tbody>
  </table>
<?php
      break;
  }
?>