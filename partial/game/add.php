<div class="well">
  <div class="box">
    <div><strong>New Game</strong></div>
    <div style="color: red;">All fields with a (*) are required!</div>
    <div class="box">
      <form class="form-horizontal" action="action/game/add.php" method="POST">
        <div class="control-group">
          <label class="control-label" for="inputGameName">Name*</label>
          <div class="controls">
            <input type="text" id="inputGameName" placeholder="Game Name" name="name">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputRelease">Release year</label>
          <div class="controls">
            <input type="text" id="inputRelease" value="<?php echo date("Y");?>" name="release">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputUSK">USK</label>
          <div class="controls">
            <input type="text" id="inputUSK" value="16" name="usk">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputDesc">Description*</label>
          <div class="controls">
            <textarea type="email" id="inputDesc" placeholder="Description" name="description"></textarea>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-mini">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>