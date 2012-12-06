<div class="span12 well">
  <li class="nav-header">set ingame nick</li>
  <form class="form-horizontal" action="action/user/setInGameNick.php" method="POST">
    <div class="control-group">
      <label class="control-label" for="selectGameNick">Nickname</label>
      <div class="controls">
        <input type="text" for="selectGameNick" name="nick">
        <input type="hidden" name="GID" value="<?php echo $_GET['GID']; ?>">
      </div>
      <br>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn">Set nickname</button>
        </div>
      </div>
    </div>
  </form>
</div>