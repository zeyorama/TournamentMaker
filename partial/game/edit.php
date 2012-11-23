<?php
  /**
   * @author Frank Kevin Zey
   */

  $game = Game::getGame($_GET['id']);  
?>
<div class="box well">
  <form class="form-horizontal" action="action/game/edit.php" method="POST">
    <div class="control-group">
      <label class="control-label" for="inputGameName">Name*</label>
      <div class="controls">
        <input type="text" id="inputGameName" placeholder="Game Name" name="name" <?php setValue($game->name);?>>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputRelease">Release year</label>
      <div class="controls">
        <input type="text" id="inputRelease" <?php setValue($game->release); ?> name="release">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputUSK">USK</label>
      <div class="controls">
        <input type="text" id="inputUSK" <?php setValue($game->usk); ?> name="usk">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputDesc">Description*</label>
      <div class="controls">
        <textarea type="email" id="inputDesc" placeholder="Description" name="description"><?php echo $game->description; ?></textarea>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="hidden" name="id" <?php setValue($game->getID()); ?>>
        <button type="submit" class="btn btn-mini">Edit</button>
      </div>
    </div>
  </form>
</div>