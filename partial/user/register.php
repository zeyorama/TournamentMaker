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
        <input type="text" id="inputUsername" placeholder="Username" name="user_username">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email</label>
      <div class="controls">
        <input type="email" id="inputUsername" placeholder="Email" name="user_email">
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
        <button type="submit" class="btn">Sign up</button>
      </div>
    </div>
  </form>
</div>