<form class="form-horizontal" action="action/user/resetPassword.php" method="POST">
  <div class="control-group">
    <label class="control-label" for="input-old1">Old password</label>
    <div class="controls">
      <div class="input-prepend">
        <span class="add-on"><i class="icon-star-empty"></i></span>
        <input type="password" id="input-old1" name="oldPass" required>
      </div>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="input-old2">Repeat old password</label>
    <div class="controls">
      <div class="input-prepend">
        <span class="add-on"><i class="icon-star-empty"></i></span>
        <input type="password" id="input-old2" name="oldPassRepeat" required>
      </div>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="input-new">New Password</label>
    <div class="controls">
      <div class="input-prepend">
        <span class="add-on"><i class="icon-star"></i></span>
        <input type="password" id="input-new" name="newPass" min-length="5" required>
      </div>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <div class="input-prepend">
        <span class="add-on"><i class="icon-thumbs-up"></i></span>
        <button type="submit" class="btn">Modify</button>
      </div>
    </div>
  </div>
</form>