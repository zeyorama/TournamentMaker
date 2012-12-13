<?php
  /**
   * @author Frank Kevin Zey
   */
?>
<div class="box">
  <li class="nav-header">Register</li>
  <form class="form-horizontal" action="action/user/register.php" method="POST">
    <div class="control-group">
      <label class="control-label" for="inputUsername">Username</label>
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on"><i class="icon-user"></i></span>
          <input type="text" id="inputUsername" placeholder="Username" name="user_username" required>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email</label>
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on"><i class="icon-envelope"></i></span>
          <input type="email" id="inputUsername" placeholder="Email" name="user_email" required>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputPassword">Password</label>
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on"><i class="icon-lock"></i></span>
          <input type="password" id="inputPassword" placeholder="Password" name="user_pass" required>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn">Sign up</button>
      </div>
    </div>
  </form>
</div>