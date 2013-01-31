<form class="form-horizontal" method="POST" action="setup/setupDB.php">
  <div class="row" id="setup">
    <p>
      <i>First of all, type in your current access to the database.</i>
    </p>
    <div class="box">
      <div class="box-header">
        <li class="nav-header">ROOT access</li>
      </div>
      <div class="box-content well">
        <p>Type in an username and password for root user, who can create new users and databases.</p>
        <div class="control-group">
          <label class="control-label">Root username</label>
          <div class="controls">
            <input name="rootUsername" class="input-text" type="text" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Root password</label>
          <div class="controls">
            <input name="rootPassword" class="input-password" type="password" required>
          </div>
        </div>
      </div>
    </div>
    <p>
      <i>Now, type in the new user, who will be created and the database name, where all TournamentMaker datas will be stored.</i>
    </p>
    <div class="box">
      <div class="box-header">
        <li class="nav-header">TournamentMaker access</li>
      </div>
      <div class="box-content well">
        <p>Type in an username and password for root user, who can create new users and databases.</p>
        <div class="control-group">
          <label class="control-label">Username</label>
          <div class="controls">
            <input name="username" class="input-text" type="text" required><info>Username for user, who will be used by TournamentMaker for accessing the database.</info> 
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Password</label>
          <div class="controls">
            <input name="password" class="input-password" type="password" required><info>Password for TournamentMaker to access database.</info>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Database</label>
          <div class="controls">
            <input name="DBName" class="input-text" type="text" required><info>Name of the database, which will be used by TournamentMaker.</info>
          </div>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input class="btn" type="submit" value="Create">
      </div>
    </div>
  </div>
</form>