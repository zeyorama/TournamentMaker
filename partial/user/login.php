<?php
  /**
   * @author Frank Kevin Zey
   */
?>
<div class="box">
  <p>Login</p>
  <form class="form-horizontal" action="action/user/login.php" method="POST">
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email</label>
      <div class="controls">
        <input type="text" id="inputEmail" placeholder="Username" name="user_username">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputPassword">Password</label>
      <div class="controls">
        <input type="password" id="inputPassword" placeholder="Password" name="user_pass">
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn">Sign in</button>
      </div>
    </div>
  </form>
</div>