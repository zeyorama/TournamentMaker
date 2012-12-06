<div class="box well">
  <li class="nav-header"><strong>Create a new tournament</strong></li>
  <div class="box">
    <form class="form-horizontal" action="" method="POST">
      <div class="control-group">
        <label for="inputTourName" class="control-label">Name</label>
        <div class="controls">
          <input id="inputTourName" class="control-input" type="text" maxlength="255" name="tourName">
        </div>
      </div>
      <div class="control-group">
        <label for="selectTourGame" class="control-label">Select game</label>
        <div class="controls">
          <select class="control-select" id="selectTourGame" name="tourGame">
<?php
          foreach (Game::getAllGamesArray() as $game) {
            echo printOption($game->getID(), $game->name);
          }  
?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label for="selectTourMaxPlayer" class="control-label">Maximum player count</label>
        <div class="controls">
          <select class="control-select" id="selectTourMaxPlayer" name="tourMaxPlayer">
          <?php
            echo printOption(16, "16 Players");
            echo printOption(32, "32 Players");
            echo printOption(64, "64 Players");
          ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label for="selectTourGrid" class="control-label">Select bracket type</label>
        <div class="controls">
          <select class="control-select" id="selectTourGrid" name="tourGrid">
          <?php
            echo printOption(TOUR_TYPE_SINGLE_ELIMINATION, "Single Elimination");
            echo printOption(TOUR_TYPE_DOUBLE_ELIMINATION, "Double Elimination");
          ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button class="btn" type="submit">Create tournament</button>
        </div>
      </div>
    </form>
  </div>
</div>