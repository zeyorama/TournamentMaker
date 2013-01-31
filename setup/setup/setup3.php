<?php if (isset($_GET['e']) && $_GET['e'] == 8) { ?>
<div class="alert alert-error">
  It seems, you cann't create a file. You can try it again or create a file on your server and add this lines into it!<br>
  <br>
  Filename: config.php<br>
  Put htis file in the same directory as the epic.php file.<br>
  <code>
&lt;?php<br>
  define("DB_HOST", 'localhost');<br>
  define("DB_USER", '<?php echo $_SESSION['db']['username']; ?>');<br>
  define("DB_PASS", '<?php echo $_SESSION['db']['password']; ?>');<br>
  define("DB_SCHEMA", '<?php echo $_SESSION['db']['DBName']; ?>');<br>
?&gt;
  </code>
</div>
<a href="index.php">Exit Setup</a>
<?php } ?>
<form class="form-horizontal" method="POST" action="setup/setupAdmin.php">
  <?php if (isset($_GET['e']) && $_GET['e'] == 7) { ?>
    <input type="hidden" name="error" value="">
  <?php } ?>
  <div class="row" id="setup">
    <p>
      <i>Now, you create the first user of all, this will be the admin.</i>
    </p>
    <div class="box">
      <div class="box-header">
        <li class="nav-header">Admin account</li>
      </div>
      <div class="box-content well">
        <p>Type in an username and password for root user, who can create new users and databases.</p>
        <div class="control-group">
          <label class="control-label">Admin username</label>
          <div class="controls">
            <input name="adminUsername" class="input-text" type="text" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Admin email</label>
          <div class="controls">
            <input name="adminEmail" class="input-email" type="email" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Admin password</label>
          <div class="controls">
            <input name="adminPassword" class="input-password" type="password" required>
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