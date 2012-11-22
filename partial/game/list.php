<div class="row-fluid">
  <div class="span12 well">
    <div class="box">
      <div><strong>Global options</strong></div>
      <ul class="nav nav-pills">
        <li><a href="index.php?f=game&s=add">Add game</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span12 well">
    <ul class="nav">
      <li class="nav-header">Games</li>
    </ul>
    <h4>This is a list of all registered games on TournamentMaker</h4>
    <table class="table">
      <colgroup>
        <col>
        <col>
        <col>
        <col>
      </colgroup>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Release</th>
        <th>Actions</th>
      </tr>
<?php
  $gameList = Game::getAllGamesArray();
  switch ($gameList) {
    case 10101:
    case 10105:
    case 10106:
      if (!isset($_GET['e'])) {
        header("Location: index.php?f=game&s=list&e=$gameList");
        break;
      }
      break;

    default: 
      foreach ($gameList as $game) {
?>
      <tr>
        <td><?php echo $game->getID(); ?></td>
        <td><?php echo $game->name; ?></td>
        <td><?php echo $game->release; ?></td>
        <td>
          <ul class="nav nav-pills">
            <?php if ($u->hasGame($game->getID())) {?>
            <li class="disabled"><a href="action/user/delGame.php?id=<?php echo $game->getID(); ?>">Remove game from my list</a></li>
            <?php } else {?>
            <li><a href="action/user/addGame.php?id=<?php echo $game->getID(); ?>">Add game to my list</a></li>
            <?php } ?>
<?php if ($u->isAdmin()) { ?>
            <li><a href="action/game/delete.php?id=<?php echo $game->getID(); ?>">Remove game</a></li>
            <!-- Additional actions for admin only -->            
<?php } ?>
            <li><a href="index.php?f=game&s=review&id=<?php echo $game->getID(); ?>">Review game</a></li>
          </ul>
        </td>
      </tr>
<?php
      }
      break;
  }
?>
    </table>
  </div>
</div>