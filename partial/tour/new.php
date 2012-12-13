<script>
  $(function(){
    window.prettyPrint && prettyPrint();
    var startDate = new Date(<?php echo date('Y'); ?>,1,1);
    var endDate = new Date(<?php echo ((int)date('Y') + 1); ?>,12,31);
    $( '#dp3' ).datepicker()
      .on('changeDate', function(ev){
        if (ev.date.valueOf() > endDate.valueOf()){
          $('#alert').show().find('strong').text('The start date can not be greater then the end date');
        } else {
          $('#alert').hide();
          startDate = new Date(ev.date);
          $('#startDate').text($('#dp3').data('date'));
        }
        $('#dp3').datepicker('hide');
      });
  });
</script>
<div class="box well">
  <li class="nav-header"><strong>Create a new tournament</strong></li>
  <div class="box">
    <form class="form-horizontal" action="action/tour/new.php" method="POST">
      <div class="control-group">
        <label for="inputTourName" class="control-label">Name</label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-flag"></i></span>
            <input id="inputTourName" class="control-input" type="text" maxlength="255" name="tourName">
          </div>
        </div>
      </div>
      <div class="control-group">
        <label for="selectTourGame" class="control-label">Select game</label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-chevron-up"></i></span>
            <select class="control-select" id="selectTourGame" name="tourGame">
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
            <select class="control-select" id="selectTourMaxPlayer" name="tourMaxPlayer">
            <?php
              echo printOption(16, "16 Players");
              echo printOption(32, "32 Players");
              echo printOption(64, "64 Players");
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
            <select class="control-select" id="selectTourGrid" name="tourGrid">
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
          <div class="input-prepend date datepicker" id="dp3" data-date="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
            <span class="add-on"><i class="icon-calendar"></i></span>
            <input class="span6" size="16" type="datetime" value="<?php echo date('d-m-Y'); ?>" name="tourStart" readonly>
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