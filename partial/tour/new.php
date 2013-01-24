<div class="box well">
  <li class="nav-header"><strong>Create a new tournament</strong></li>
  <div class="box">
    <form class="form-horizontal" action="action/tour/new.php" method="POST">
      <div class="control-group">
        <label for="inputTourName" class="control-label">Name</label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-flag"></i></span>
            <input id="inputTourName" class="control-input" type="text" maxlength="255" name="tourName" required>
          </div>
        </div>
      </div>
      <div class="control-group">
        <label for="selectTourGame" class="control-label">Select game</label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-chevron-up"></i></span>
            <select class="control-select" id="selectTourGame" name="tourGame" required>
<?php
            foreach (Game::getAllGamesArray() as $game) {
              echo printOption($game->getID(), $game->name);
            }  
?>
            </select>
          </div>
        </div>
      </div>
      <div class="control-group">
        <label for="selectTourMaxPlayer" class="control-label">Maximum player count</label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-th"></i></span>
            <select class="control-select" id="selectTourMaxPlayer" name="tourMaxPlayer" required>
            <?php
              echo printOption(16, "16 Players or Teams");
              echo printOption(32, "32 Players or Teams");
              echo printOption(64, "64 Players or Teams");
            ?>
            </select>
          </div>
        </div>
      </div>
      <div class="control-group">
        <label for="selectTourGrid" class="control-label">Select bracket type</label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-tasks"></i></span>
            <select class="control-select" id="selectTourGrid" name="tourGrid" required>
            <?php
              echo printOption(TOUR_TYPE_SINGLE_ELIMINATION, "Single Elimination");
              echo printOption(TOUR_TYPE_DOUBLE_ELIMINATION, "Double Elimination");
            ?>
            </select>
          </div>
        </div>
      </div>
      <div class="control-group">
        <label for="dateSelect" class="control-label">When will the tournament begins</label>
        <div class="controls">
          <div class="input-prepend date datepicker" data-behaviour="datepicker"  data-date="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
            <span class="add-on"><i class="icon-calendar"></i></span>
            <input class="span6" size="16" type="text" id="datepicker" value="<?php echo date('d-m-Y'); ?>" name="tourStart" required readonly>
          </div>
          <div class="input-prepend bootstrap-timepicker-component">
            <span class="add-on"><i class="icon-play"></i></span>
            <input class="span6 timepicker" size="16" type="text" id="timepicker" name="tourTime" value="<?php echo date("H:i"); ?>" required readonly>
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls input-append">
          <button class="btn" type="submit">
            Create tournament
            <span><i class="icon-ok-sign"></i></span>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () { 
    $('#datepicker').datepicker();
  
    $('#timepicker').timepicker({
        minuteStep: 5,
        defaultTime: 'value',
        showMeridian: false
    });
  });
</script>