<?php
  $tour = Tournament::getTournament($_GET['id']);

  $players = $tour->getPlayers();

  if (count($players) < 1) {
?>
<center><h5>Currently no players joined the tournament.</h5></center>
<?php
  } else {
    foreach ($players as $p) {
?>
<div class="span3 well">
  <a href="index.php?f=user&s=profile&id=<?php echo $p->getID(); ?>" target="about:blank">
    <big><strong><?php echo $p->username; ?></strong></big>
  </a>
</div>
<?php
    }
  }
?>