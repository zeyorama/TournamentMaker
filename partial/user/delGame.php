<?php
  /**
   * @author Frank Kevin Zey
   */

  $i = 0;
  $b = true;
  $games = array();

  foreach ($u->getGames() as $game) {
    if ($game instanceof int) continue;
    $games[$i++] = $game;
  }

  if (count($games) < 1) $b = false;
?>
<div class="span12 well">
  <li class="nav-header">Remove game from list</li>
<?php
  if ($b) {
?>
  <form class="form-horizontal" action="action/user/delGame.php" method="GET">
    <div class="control-group">
      <label class="control-label" for="selectGame">Select game</label>
      <div class="controls">
        <select for="selectGame" name="id">
          <?php foreach ($games as $g) {?>
            <option value="<?php echo $g->getID(); ?>"><?php echo $g->name; ?></option>
          <?php } ?>
        </select>
      </div>
      <br>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn">Remove</button>
        </div>
      </div>
    </div>
  </form>
<?php } else { ?>
  No additional Games to remove.
<?php } ?>
</div>